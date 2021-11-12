<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        $data['title'] = 'Login';
        return view('auth/login', $data);
    }

    public function register()
    {
        $data['title'] = 'Registrasi Akun';
        return view('auth/register', $data);
    }
}
