<?php

namespace App\Controllers;

use App\Models\FilesModel;
use App\Models\WorkhoursModel;

class FilesController
{
    public function show()
    {
        $file = FilesModel::getOneById($_GET['file_id']);
        $fileRows = $file->rows();

        return view('file', compact('file', 'fileRows'));
    }

    public function create()
    {
        return view('file-upload');
    }
    
    public function store()
    {
        $user_id = $_SESSION['user']['id'];

        // Create a file in DB
        $file_id = FilesModel::store([
            'user_id' => $user_id,
            'name' => $_POST['file_name'],
            'created' => date('Y-m-d H:i:s'),
            ]);

        // Store rows in DB and assign them to a file
        if (isset($_POST['csv_import'])) {
            $tmpFileName = $_FILES['csv_file']['tmp_name'];
    
            if ($_FILES['csv_file']['size'] > 0) {
                $tmpFile = fopen($tmpFileName, 'r');
        
                $row = 0;
                while (($data = fgetcsv($tmpFile, 0, ';')) !== false) {
                    echo($data[0]);
                    // Skip header row
                    if ($row != 0) {
                        WorkhoursModel::store([
                            'user_id'   => $user_id,
                            'file_id'   => $file_id,
                            'created'   => date('Y-m-d H:i:s'),
                            'boekjaar'  => (isset($data[0])) ? $data[0] : '' ,
                            'week'      => (isset($data[1])) ? $data[1] : '' ,
                            'datum'     => (isset($data[2])) ? $data[2] : '' ,
                            'persnr'    => (isset($data[3])) ? $data[3] : '' ,
                            'uren'      => (isset($data[4])) ? $data[4] : '' ,
                            'uurcode'   => (isset($data[5])) ? $data[5] : ''
                        ]);
                    }

                    $row ++;
                }

                fclose($tmpFile);
            }
        }
        return redirect('dashboard');
    }

    public function destroy()
    {
        FilesModel::destroy($_GET['file_id']);

        redirect('dashboard');
    }

    public function download()
    {
        //get file info from database
        $file = FilesModel::getOneById($_GET['file_id']);
        $fileRows = $file->rows();

        $filename = $file->name . '_' . date('Ymd-His') . '.csv';
    
        //set headers to download file rather than displayed
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename={$filename};");

        //create a file pointer
        $f = fopen('php://output', 'w');
    
        //set column headers
        $fields = array('Boekjaar', 'Week', 'Datum', 'Persnr', 'Uren', 'Uurcode');
        fputcsv($f, $fields, ';');
    
        //output each row of the data, format line as csv and write to file pointer
        foreach ($fileRows as $row) {
            $lineData = array($row->boekjaar, $row->week, $row->datum, $row->persnr, $row->uren, $row->uurcode);
            fputcsv($f, $lineData, ';');
        }
    }
}
