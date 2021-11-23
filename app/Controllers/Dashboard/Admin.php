<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $adminModel;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Admin'
        ];

        return view('dashboard/admin/index', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit Admin'
        ];

        return view('dashboard/admin/edit', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Admin'
        ];

        return view('dashboard/admin/create', $data);
    }

    public function edit_profile()
    {
        $data = [
            'title' => 'Edit Profile',
            'validation' => \Config\Services::validation(),
            'admin' => $this->adminModel->where('username', session('username'))->first()
        ];

        return view('dashboard/admin/edit-profile', $data);
    }

    public function update_profile()
    {
        if(!$this->validate([
			'nama' => [
				'rules' => 'required|max_length[100]|min_length[3]|alpha_space',
				'errors' => [
					'required' => 'nama wajib diisi',
                    'max_length' => 'nama tidah boleh lebih dari 100 karakter',
                    'min_length' => 'nama setidaknya harus berisi 3 karakter',
                    'alpha_space' => 'nama hanya boleh berisi alphabet dan spasi'
				]
			],
			'email' => [
				'rules' => 'required|min_length[3]|max_length[100]|valid_email',
				'errors' => [
					'required' => '{field} wajib diisi',
                    'valid_email' => 'email tidak valid',
                    'max_length' => '{field} tidah boleh lebih dari 100 karakter',
                    'min_length' => '{field} setidaknya harus berisi 3 karakter',
				]
			],
			'username' => [
				'rules' => 'required|min_length[5]|max_length[15]',
				'errors' => [
					'required' => '{field} wajib diisi',
                    'min_length' => '{field} setidaknya harus berisi 5 karakter',
                    'max_length' => '{field} tidah boleh lebih dari 15 karakter',
				]
			],
		])) {
			return redirect()->to('/dashboard/admin/edit-profile')->withInput();
		}

        $this->adminModel->save([
            'id' => $this->adminModel->where('username', session('username'))->first()['id'],
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->back();
    }

    public function password()
    {
        $data = [
            'title' => 'Ubah Password'
        ];

        return view('dashboard/admin/ubah-password', $data);
    }
}
