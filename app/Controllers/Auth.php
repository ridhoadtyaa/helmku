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
        if($this->validate([
            'first_name'    => [
                'rules'     => 'required',
                'errors'    => '{field} tidak boleh kosong'
            ],
            'last_name'     => [
                'rules'     => 'required',
                'errors'    => '{field} tidak boleh kosong'
            ],
            'email'    
        ]))
        return view('auth/register', $data);
    }
}
