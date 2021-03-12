<?php

namespace App\Core\Middleware;

class IsLoggedIn
{
    private $isLoggedIn = false;

    public function __construct()
    {
        $this->isLoggedIn = isset($_SESSION) && isset($_SESSION['user']);

        $this->redirect();
    }

    private function redirect()
    {
        if (!$this->isLoggedIn) {
            redirect('login');
        }
    }
}
