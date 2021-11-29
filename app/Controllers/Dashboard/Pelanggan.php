<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Pelanggan extends BaseController
{
    protected $pelangganModel;
    public function __construct()
    {
        $this->pelangganModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pelanggan',
            'pelanggan' => $this->pelangganModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('dashboard/pelanggan/index', $data);
    }

    public function edit($id)
    {
        
        $data = [
            'title' => 'Edit Data Pelanggan',
            'validation' => \Config\Services::validation(),
            'pelanggan' => $this->pelangganModel->where('users_id', $id)->first()
        ];

        return view('dashboard/pelanggan/edit', $data);
    }

    public function update($id)
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
                    'is_unique' => '{field} sudah dipakai',
                    'valid_email' => 'email tidak valid',
                    'max_length' => '{field} tidah boleh lebih dari 100 karakter',
                    'min_length' => '{field} setidaknya harus berisi 3 karakter',
				]
			],
			'no_telp' => [
				'rules' => 'required|numeric|min_length[5]|max_length[15]',
				'errors' => [
					'required' => 'No.Handphone wajib diisi',
                    'numeric' => 'No.Handphone hanya boleh berisi angka',
                    'min_length' => 'No.Handphone setidaknya harus berisi 5 karakter',
                    'max_length' => 'No.Handphone tidah boleh lebih dari 15 karakter',
				]
			],
		])) {
			return redirect()->to('/dashboard/data-pelanggan/edit/' . $id)->withInput();
		}

        $this->pelangganModel->save([
            'users_id' => $id,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_telp'),
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->back();
    }

    public function delete($id)
    {
        $this->pelangganModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
		return redirect()->to('/dashboard/data-pelanggan');
    }
}
