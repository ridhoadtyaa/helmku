<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Kategori as ModelsKategori;

class Kategori extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
        $this->kategoriModel = new ModelsKategori();
    }
    public function index()
    {
        $data['title'] = 'Daftar Kategori';
        $data['data_kategori'] = $this->kategoriModel->orderBy('nama', 'ASC')->findAll();
        return view('dashboard/kategori/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Kategori';
        if($this->validate([
            'nama_kategori' => [
                'rules'     => 'required',
                'errors'    => '{field} Wajib di isi'
            ]
        ])){
            if($this->kategoriModel->insert(['nama' => $this->request->getPost('nama_kategori')]))
            {
                session()->setFlashdata('success', 'Sukses menambah kategori ' . $this->request->getPost('nama_kategori'));
            }else{
                session()->setFlashdata('danger', 'Gagal menambah kategori ' . $this->request->getPost('nama_kategori'));
            }
        }
        return view('dashboard/kategori/create', $data);
    }

    public function edit($id = false)
    {
        $data['title'] = 'Edit Kategori';
        $data['data_kategori'] = $this->kategoriModel->where('id_kategori', $id)->first();
        if(!$data['data_kategori']){
            return view('errors/errors-404');
        }
        if($this->validate([
            'nama_kategori' => [
                'rules'     => 'required',
                'errors'    => '{field} Wajib di isi'
            ]
        ])){
            if($this->kategoriModel->update($id, ['nama' => $this->request->getPost('nama_kategori')])){
                session()->setFlashdata('success', 'Sukses update kategori dari ' . $data['data_kategori']['nama'] . ' menjadi ' . $this->request->getPost('nama_kategori'));
            }else{
                session()->setFlashdata('danger', 'Gagal update kategori dari ' . $data['data_kategori']['nama'] . ' menjadi ' . $this->request->getPost('nama_kategori'));
            }
            return redirect()->to('dashboard/kategori/edit-kategori/'.$id);
        }
        return view('dashboard/kategori/edit', $data);
    }
}
