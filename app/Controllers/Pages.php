<?php

namespace App\Controllers;

use App\Models\Produk;
use App\Models\Stok;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function __construct()
    {
        $this->produkModel  = new Produk();
        $this->stokModel    = new Stok();
        $this->userModel    = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        return view('home', $data);
    }

    public function detail($slug)
    {
        $this->produkModel->select('*, data_produk.nama AS nama_produk');
        $this->produkModel->select('data_kategori.nama AS nama_kategori');
        $this->produkModel->join('data_kategori', 'data_produk.kategori = data_kategori.id_kategori');
        $this->produkModel->where('url_slug', $slug);
        $prod = $this->produkModel->get()->getResultArray();
        if(!isset($prod[0])){
            return view('errors/errors-404');
        }
        $data['data_produk'] = $prod[0];
        $data['title'] = $data['data_produk']['nama_produk'];

        return view('detail', $data);
    }

    public function cart()  
    {
        $data = [
            'title' => 'Keranjang'
        ];

        return view('cart', $data);
    }

    public function produk()
    {
        $data = [
            'title'     => 'Produk',
        ];
        helper(['rupiah']);

        $data['produks']     = $this->produkModel->paginate(5);
        $data['pager']       = $this->produkModel->pager;
        $data['data_produk'] = [];
        $i = 0;
        foreach($data['produks'] as $data_produk){
            $dataStok = $this->stokModel->where('id_produk', $data_produk['id'])->findAll();
            $stokS = 0;
            foreach($dataStok as $stok){
                if($stok['stok'] != 0){
                    $stokS += $stok['stok'];
                }
            }
            if($stokS != 0){
                $data['data_produk'][$i++] = [
                    'data_produk' => $data_produk,
                    'data_stok' => $dataStok
                ];
            }
        }
        return view('produk', $data);
    }

    public function akun()
    {
        $data = [
            'title' => 'Akun'
        ];
        $data['akun'] = $this->userModel->where('email', session()->email)->first();
        return view('akun', $data);
    }

    public function detailOrder()
    {
        $data = [
            'title' => 'Detail order'
        ];

        return view('detail-order', $data);
    }

    public function tambahAlamat()
    {
        $data = [
            'title' => 'Tambah Alamat'
        ];

        return view('tambah-alamat', $data);
    }

    public function ubahAlamat()
    {
        $data = [
            'title' => 'Ubah Alamat'
        ];

        return view('ubah-alamat', $data);
    }
}
