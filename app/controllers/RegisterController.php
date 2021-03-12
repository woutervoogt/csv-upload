<?php

namespace App\Controllers;

use App\Models\UserModel;

class RegisterController
{
    public function index()
    {
        return view('register');
    }

    public function store()
    {
        // Check if user exists
        if (UserModel::exists($_REQUEST['email']) === true) {
            echo 'Email is al in gebruik';
            return;
        } else {
            // create password hash and set required fields
            $data = [
                'name' => $_REQUEST['name'],
                'email'      => $_REQUEST['email'],
                'password'   => password_hash($_REQUEST['password'], PASSWORD_DEFAULT),
                'created'    => $_REQUEST['created'] = date('Y-m-d H:i:s'),
            ];
            
            $data['id'] = UserModel::store($data);

            UserModel::setUserSession($data);

            redirect('dashboard');
        }
    }
}
