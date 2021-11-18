<?php

namespace App\Controllers;

use App\Models\Produk;
use App\Models\Stok;

class Pages extends BaseController
{
    public function __construct()
    {
        $this->produkModel  = new Produk();
        $this->stokModel    = new Stok();
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
        $data['data_produk']    = $this->produkModel->get()->getResultArray()[0];
        if(!$data['data_produk']){
            return view('errors/errors-404');
        }
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
        // dd(format_rupiah(400000));
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

        return view('akun', $data);
    }
}
