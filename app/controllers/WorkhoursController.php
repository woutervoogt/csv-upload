<?php

namespace App\Controllers;

use App\Models\WorkhoursModel;

class WorkhoursController
{
    public function update()
    {
        // check if logged in user is owner of file
        if ($_SESSION['user']['id'] != WorkhoursModel::getOneById($_REQUEST['row_id'])->user_id) {
            echo "Je bent niet gemachtigd.";
        } else {
            WorkhoursModel::update($_REQUEST['row_id'], $_POST);

            redirect("dashboard/files/show?file_id={$_REQUEST['file_id']}");
        }
    }

    public function destroy()
    {
        WorkhoursModel::destroy($_GET['row_id']);
        
        redirect("dashboard/files/show?file_id={$_GET['file_id']}");
    }
}
