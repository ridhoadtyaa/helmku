<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->adminModel   = new AdminModel();
        $this->userModel    = new UserModel();
    }

    public function login()
    {
        if(session()->isUserLogin){
            return redirect()->to('akun');
        }
        $data = [
            'title' => 'Login member',
            'validation' => \Config\Services::validation()
        ];
        if(session()->isUserLogin){
            return redirect()->to('akun');
        }
        return view('auth/login-member', $data);
    }

    public function loginPost()
    {
        if(session()->isUserLogin){
            return redirect()->to('akun');
        }
        if($this->validate([
            'email'     => [
                'rules'     => 'required|valid_email',
                'errors'    => [
                    'required' => '{field} tidak boleh kosong',
                    'valid_email' => '{field} yang anda masukkan tidak valid'
                ]
            ],
            'password'  => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ])){
            $cek = $this->userModel->where('email', $this->request->getPost('email'))->first();
            if($cek){
                if(password_verify($this->request->getPost('password'), $cek['password'])){
                    session()->set([
                        'userid'        => $cek['users_id'],
                        'isUserLogin'   => true,
                        'userEmail'     => $this->request->getPost('email'),
                        'cartList'      => []
                    ]);
                    session()->setFlashdata('success', 'Sukses masuk ke dalam akun.');
                    return redirect()->to('akun');
                }else{
                    session()->setFlashdata('danger', 'Email atau Password tidak tepat.');
                    return redirect()->to('login-member');
                }
            }else{
                session()->setFlashdata('danger', 'Email atau Password tidak tepat.');
                return redirect()->to('login-member');
            }
        }else{
            $data['validation'] = \Config\Services::validation();
            return view('auth/login-member', $data);
        }
    }

    public function register()
    {
        if(session()->isUserLogin){
            return redirect()->to('akun');
        }
        $data = [
            'title' => 'Registrasi Akun',
            'validation' => \Config\Services::validation()
        ]; 
        return view('auth/register-member', $data);
    }

    public function registerPost()
    {
        if(session()->isUserLogin){
            return redirect()->to('akun');
        }
        if($this->validate([
            'nama'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'email'     => [
                'rules'     => 'required|valid_email',
                'errors'    => [
                    'required' => '{field} tidak boleh kosong',
                    'valid_email' => '{field} yang anda masukkan tidak valid'
                ]
            ],
            'password'  => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ])){
            $cek = $this->userModel->where('email', $this->request->getPost('email'))->first();
            if($cek){
                session()->setFlashdata('warning', 'Email sudah terdaftar!');
                return redirect()->to('register-member')->withInput();
            }else{
                if($this->userModel->insert([
                    'nama'      => $this->request->getPost('nama'),
                    'email'     => $this->request->getPost('email'),
                    'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
                ])){
                    session()->setFlashdata('success', 'Sukses mendaftar akun, selamat datang!');
                    session()->set([
                        'userid'        => $this->userModel->insertID(),
                        'isUserLogin'   => true,
                        'userEmail'     => $this->request->getPost('email'),
                        'cartList'      => []
                    ]);
                    return redirect()->to('akun');
                }else{
                    session()->setFlashdata('danger', 'Gagal mendaftar akun, silahkan hubungi CS');
                    return redirect()->to('register-member');
                }
            }
        }else{
            $data['validation'] = \Config\Services::validation();
            return view('auth/register-member', $data);
        }
    }

    public function logout()
    {
        session()->remove([
            'isUserLogin',
            'userEmail',
            'cartList'
        ]);
        return redirect()->to('login-member');
    }

    public function loginAdmin()
    {
        if(session()->isAdmin){
            return redirect()->to('dashboard');
            exit();
        }

        $data['title'] = 'Login';
        if($this->validate([
            'email'     => [
                'rules'     => 'required|valid_email',
                'errors'    => [
                    'required' => '{field} tidak boleh kosong',
                    'valid_email' => '{field} yang anda masukkan tidak valid'
                ]
            ],
            'password'  => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ])){
            $cek = $this->adminModel->where('email', $this->request->getPost('email'))->first();
            if($cek){
                if(password_verify($this->request->getPost('password'), $cek['password'])){
                    session()->set(
                        [
                            'isAdmin'   => true,
                            'username'  => $cek['username'],
                            'nama'      => $cek['nama']
                        ]
                    );
                    session()->setFlashdata('success', 'Sukses login, Selamat datang!');
                    return redirect()->to('dashboard')->withInput();
                }else{
                    session()->setFlashdata('danger', 'Email atau Password tidak tepat.');
                    return redirect()->to('momod/login')->withInput();
                }
            }else{
                session()->setFlashdata('danger', 'Email atau Password tidak tepat.');
                return redirect()->to('momod/login');
            }
        }
        return view('auth/login-admin', $data);
    }

    public function logoutAdmin()
    {
        session()->remove([
            'isAdmin',
            'username'
        ]);
        return redirect()->to('momod/login');
    }
}
