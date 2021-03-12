<?php

namespace App\Controllers;

use App\Models\UserModel;

class PagesController
{
    public function home()
    {
        return view('index');
    }

    public function dashboard()
    {
        $files = UserModel::getOneById($_SESSION['user']['id'])->files();
        
        return view('dashboard', compact('files'));
    }
}
