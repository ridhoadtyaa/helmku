<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Kategori;
use App\Models\Produk as ProdukModel;
use App\Models\Stok;

class Produk extends BaseController
{
    public function __construct()
    {
        $this->kategoriModel    = new Kategori();
        $this->produkModel      = new ProdukModel();
        $this->stokModel        = new Stok();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Produk'
        ];

        return view('dashboard/produk/index', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah Produk',
            'kategori'  => $this->kategoriModel->findAll()
        ];
        return view('dashboard/produk/create', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit Produk'
        ];

        return view('dashboard/produk/edit', $data);
    }

    public function save()
    {
        $validation =  \Config\Services::validation();
        if($this->validate([
            'nama'      => [
                'rules'     => 'required',
                'errors'    => '{field} tidak boleh kosong'
            ],
            'kategori'  => [
                'rules'     => 'required',
                'errors'    => '{field} tidak boleh kosong'
            ],
            'deskripsi' => [
                'rules'     => 'required',
                'errors'    => '{field} tidak boleh kosong'
            ],
            'foto'      => [
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
                'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size' => 'Ukuran File Maksimal 2 MB'
				]
            ],
            'variasi'   => [
                'rules'     => 'required',
                'errors'    => '{field} tidak boleh kosong'
            ]
        ])){
            $foto = $this->request->getFile('foto');
            $namaFoto = $foto->getRandomName();
            if($foto->move('assets/img/produk/', $namaFoto)){
                $this->produkModel->insert([
                    'nama'      => $this->request->getPost('nama'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'gambar'    => $namaFoto,
                    'kategori'  => $this->request->getPost('kategori'),
                    'url_slug'  => str_replace(" ", "-", $this->request->getPost('nama'))."-".uniqid(),
                ]);
                $productId = $this->produkModel->insertID();
                foreach($this->request->getPost('variasi') as $variasi){
                    $this->stokModel->insert([
                        'id_produk' => $productId,
                        'ukuran'    => $variasi['nama'],
                        'stok'      => $variasi['stok'],
                        'harga'     => $variasi['harga']
                    ]);
                }
                session()->setFlashdata('success', 'Sukses menambah produk '.$this->request->getPost('nama'));
            }else{
                session()->setFlashdata('danger', 'Gagal menambah produk '.$this->request->getPost('nama').' karena gambar');
            }
        }else{
            session()->setFlashdata('danger', 'Gagal menambah produk '.$validation->listErrors());
        }
        return redirect()->to('dashboard/produk/tambah-produk');
    }
}
