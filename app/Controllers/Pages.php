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
        helper(['rupiah']);
    }

    public function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_r($needle, $item, $strict))) {
                return true;
            }
        }
        return false;
    }

    public function searchUkuranIndex($ukuran, $array) {
        foreach ($array as $key => $val) {
            if ($val['ukuran'] === $ukuran) {
                return $key;
            }
        }
        return null;
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
        $data['stok'] = $this->stokModel->where('id_produk', $prod[0]['id'])->findAll();
        if(session()->has('cartList') && count(session()->get('cartList')) > 0 && isset(session()->get('cartList')[$slug])) {
            $cartList = session()->cartList;
            $i = 0;
            foreach($data['stok'] as $s){
                if($this->in_array_r($s['ukuran'], $cartList[$slug])){
                    $searchKey = $this->searchUkuranIndex($s['ukuran'], $cartList[$slug]);
                    $data['stok'][$i]['stok'] -= $cartList[$slug][$searchKey]['qty'];
                    $data['stok'][$i]['in_cart'] = true;
                }else{
                    $data['stok'][$i]['in_cart'] = false;
                }
                $i++;
            }
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
        $cartList = session()->cartList;
        $data['cartList'] = [];
        $data['cartList_sold'] = [];
        $data['cartCount'] = 0;
        $data['cartCountSold'] = 0;
        $i = 0;
        foreach($cartList as $key => $value){
            $data['cartList'][$key] = [];
            $data['cartList_sold'][$key] = [];
            foreach($value as $v){
                $this->stokModel->select('*');
                $this->stokModel->select('data_produk.*');
                $this->stokModel->join('data_produk', 'data_stok_produk.id_produk = data_produk.id');
                $this->stokModel->where('url_slug', $key);
                $this->stokModel->where('ukuran', $v['ukuran']);
                $stokInfo = $this->stokModel->get()->getResultArray()[0];
                $newV = array_merge($v, [
                    'nama_barang' => $stokInfo['nama'],
                    'gambar'      => $stokInfo['gambar'],
                    'harga'       => $stokInfo['harga']
                ]);
                if($v['qty'] <= $stokInfo['stok']){
                    $data['cartCount'] += 1;
                    array_push($data['cartList'][$key], $newV);
                }else{
                    $data['cartCountSold'] += 1;
                    array_push($data['cartList_sold'][$key], $newV);
                }
                $i++;
            }
            $i = 0;
        }
        return view('cart', $data);
    }

    public function removeFromCart()
    {
        if(!session()->isUserLogin){
            return "need_login";
        }
        if($this->validate([
            'idBarang'  => 'required',
            'variasi'    => 'required'
        ])){
            $idBarang = $this->request->getPost('idBarang');
            $variasi = $this->request->getPost('variasi');
        }
    }
    public function tambahCart()
    {
        if(!session()->isUserLogin){
            return "need_login";
        }else{
            if($this->validate([
                'idBarang' => 'required',
                'quantity' => 'required',
                'ukuran'   => 'required'
            ])){
                $cartList = session()->get('cartList');
                $idBarang = $this->request->getPost('idBarang');
                $quantity = $this->request->getPost('quantity');
                $ukuran   = $this->request->getPost('ukuran');

                $this->stokModel->select('*');
                $this->stokModel->select('data_produk.*');
                $this->stokModel->join('data_produk', 'data_stok_produk.id_produk = data_produk.id');
                $this->stokModel->where('url_slug', $idBarang);
                $this->stokModel->where('ukuran', $ukuran);
                $stokInfo = $this->stokModel->get()->getResultArray();
                if(!$stokInfo){
                    return "0000";
                }
                $stokInfo = $stokInfo[0];
                if($quantity > $stokInfo['stok']){
                    return "4004";
                }
                if(count($cartList) > 0){
                    if(isset($cartList[$idBarang])){
                        if($this->in_array_r($ukuran, $cartList[$idBarang])){ // barang udah ada dan di update data quantitynya.
                            $searchKey = $this->searchUkuranIndex($ukuran, $cartList[$idBarang]);
                            if($cartList[$idBarang][$searchKey]['qty'] > $stokInfo['stok']){
                                return "4005";
                            }
                            $cartList[$idBarang][$searchKey] = [
                                'qty'       => $quantity + $cartList[$idBarang][$searchKey]['qty'],
                                'ukuran'    => $ukuran
                            ];
                            session()->push('cartList', $cartList);
                        }else{ // kalo belum ada push barang baru
                            array_push($cartList[$idBarang], [
                                'qty'       => $quantity,
                                'ukuran'    => $ukuran
                            ]);
                            session()->push('cartList', $cartList);
                        }
                    }else{
                        session()->push('cartList', [$idBarang => [
                                [
                                    'qty'       => $quantity,
                                    'ukuran'    => $ukuran
                                ]
                            ]
                        ]);
                    }
                }else{
                    session()->push('cartList', [ $idBarang => [
                        [
                            'qty'       => $quantity,
                            'ukuran'    => $ukuran
                            ]
                        ]
                    ]);
                }
            }else{
                return "400";
            }
        }
    }

    public function produk()
    {
        $data = [
            'title'     => 'Produk',
        ];

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
        $data['akun'] = $this->userModel->where('email', session()->userEmail)->first();
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
