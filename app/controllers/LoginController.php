<?php

namespace App\Controllers;

use App\Core\Database\QueryBuilder;
use App\Models\UserModel;

class LoginController
{
    public function __construct($function = null)
    {
        if (!empty($function)) {
            if (method_exists(get_class(), $function)) {
                $this->$function();
            }
        }
    }

    /**
     * Return the login view or,
     * when there's already a login session (user), then
     * redirect to the dashboard
     */
    public function index()
    {
        if (isset($_SESSION['user'])) {
            return redirect('dashboard');
        }

        return view('login');
    }

    /**
     * Check user credentials
     */
    public function login()
    {
        if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
            $sql = "SELECT * FROM users WHERE email='{$_REQUEST['email']}'";
            $res = QueryBuilder::query($sql)->fetch();
            if ($res !== false) {
                if (password_verify($_REQUEST['password'], $res['password'])) {
                    UserModel::setUserSession($res);
                    redirect('dashboard');
                } else {
                    echo 'Wrong password';
                    return;
                }
            }
            redirect('login');
        }
    }

    /**
     * Remove user data from session
     */
    public function logout()
    {
        session_destroy();

        return redirect('');
    }
}
