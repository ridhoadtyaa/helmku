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
            'title' => 'Daftar Produk',
            'validation' => \Config\Services::validation(),
        ];
        $data['data_produk'] = [];
        $i = 0;
        foreach($this->produkModel->findAll() as $data_produk){
            $data['data_produk'][$i++] = [
                'data_produk' => $data_produk,
                'data_stok' => $this->stokModel->where('id_produk', $data_produk['id'])->findAll()
            ];
        }
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

    public function edit($urlSlug = false)
    {
        $data = [
            'title' => 'Edit Produk',
        ];
        $data['data_produk']    = $this->produkModel->where('url_slug', $urlSlug)->first();
        if(!$data['data_produk']){
            return view('errors/errors-404');
        }
        $data['kategori']       = $this->kategoriModel->findAll();
        $data['stok']           = $this->stokModel->where('id_produk', $data['data_produk']['id'])->findAll();
        return view('dashboard/produk/edit', $data);
    }

    public function editSave()
    {
        $validation =  \Config\Services::validation();
        $id = $this->request->getPost('id');
        $data_produk = $this->produkModel->where('id', $id)->first();
        if(!$data_produk){
            return view('errors/errors-404');
        }
        // dd($this->request->getPost());
        $data_update = [
            'nama'      => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kategori'  => $this->request->getPost('kategori'), 
        ];
        if($this->request->getFile('foto')->getSize() > 0 && $this->validate([
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
                'rules'     => 'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image/jfif]|max_size[foto,2048]',
                'errors'    => [
					'uploaded'  => 'Harus Ada File yang diupload',
					'mime_in'   => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'  => 'Ukuran File Maksimal 2 MB'
				]
            ],
            'variasi'   => [
                'rules'     => 'required',
                'errors'    => '{field} tidak boleh kosong'
            ]
        ])){
            $foto = $this->request->getFile('foto');
            $namaFoto = $foto->getRandomName();
            unlink('assets/img/produk/'.$data_produk['gambar']);
            if($foto->move('assets/img/produk/', $namaFoto)){
                $data_update['gambar'] = $namaFoto;
                session()->setFlashdata('info', "Sukses update gambar");
            }else{
                session()->setFlashdata('info', "Gagal update gambar");
            }
            $update = $this->produkModel->update($id, $data_update);
        }else if($this->validate([
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
            'variasi'   => [
                'rules'     => 'required',
                'errors'    => '{field} tidak boleh kosong'
            ]
        ])){
            $update = $this->produkModel->update($id, $data_update);
        }
        if($update){
            foreach($this->request->getPost('variasi') as $variasi){
                if(isset($variasi['id'])){
                    if($this->stokModel->update($variasi['id'], [
                        'ukuran'    => $variasi['nama'],
                        'stok'      => $variasi['stok'],
                        'harga'     => $variasi['harga']
                    ])){
                        session()->setFlashdata('success', 'Sukses update produk & stok');
                    }else{
                        session()->setFlashdata('warning', 'Sukses update produk tetapi gagal mengupdate stok');
                    }
                }else{
                    if($this->stokModel->insert([
                        'id_produk' => $id,
                        'ukuran'    => $variasi['nama'],
                        'stok'      => $variasi['stok'],
                        'harga'     => $variasi['harga']
                    ])){
                        session()->setFlashdata('success', 'Sukses update produk & stok');
                    }else{
                        session()->setFlashdata('warning', 'Sukses update produk tetapi gagal mengupdate/insert stok');
                    }
                }
            }
        }else{
            session()->setFlashdata('success', 'Gagal update produk');
        }
        return redirect()->to('dashboard/produk/edit/'.$data_produk['url_slug']);
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
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image/jfif]|max_size[foto,2048]',
                'errors' => [
					'uploaded'  => 'Harus Ada File yang diupload',
					'mime_in'   => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'  => 'Ukuran File Maksimal 2 MB'
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

    public function hapusVariasi($id = false, $idProduk = false)
    {
        $data['data_produk']    = $this->stokModel->where('id', $id)->where('id_produk', $idProduk)->first();
        if(!$data['data_produk']){
            return view('errors/errors-404');
        }
        if($this->stokModel->where('id_produk', $idProduk)->countAllResults() < 2){
            session()->setFlashdata('danger', 'Tidak dapat menghapus data karena data pada stok minimal 1');
        }else{
            if($this->stokModel->delete(['id' => $id])){
                session()->setFlashdata('success', 'Sukses menghapus variasi '.$data['data_produk']['ukuran']);
            }else{
                session()->setFlashdata('danger', 'Gagal menghapus variasi '.$data['data_produk']['ukuran']);
            }
        }
        return redirect()->to('dashboard/produk/edit/'.$this->produkModel->where('id', $idProduk)->first()['url_slug']);
    }

    public function hapusProduk($id)
    {
        $data['data_produk'] = $this->produkModel->where('id', $id)->first();
        if(!$data['data_produk']){
            return view('errors/errors-404');
        }
        if($this->stokModel->where('id_produk', $id)->first()){
            $this->stokModel->where('id_produk', $id)->delete();
        }
        if($this->produkModel->where('id', $id)->delete()){
            unlink('assets/img/produk/'.$data['data_produk']['gambar']);
            session()->setFlashdata('success', 'Sukses menghapus produk '.$data['data_produk']['nama']);
        }else{
            session()->setFlashdata('danger', 'Gagal menghapus produk '.$data['data_produk']['nama']);
        }
        return redirect()->to('dashboard/produk');
    }
}
