<?php

namespace App\Controllers;

use App\Models\Produk;
use App\Models\Stok;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function __construct()
    {
        $this->produkModel      = new Produk();
        $this->stokModel        = new Stok();
        $this->userModel        = new UserModel();
        $this->transaksiModel   = new TransaksiModel();
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

    public function searchStokBySlugAndVariasi($slug, $variasi)
    {
        $this->stokModel->select('*');
        $this->stokModel->select('data_produk.*');
        $this->stokModel->join('data_produk', 'data_stok_produk.id_produk = data_produk.id');
        $this->stokModel->where('url_slug', $slug);
        $this->stokModel->where('ukuran', $variasi);
        return $this->stokModel->get()->getResultArray();
    }

    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        $data['produk'] = $this->produkModel->orderBy('id', 'RANDOM')->limit(3)->get()->getResultArray();
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
                $stokInfo = $this->searchStokBySlugAndVariasi($key, $v['ukuran'])[0];
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
            $cartList = session()->get('cartList');
            if(isset($cartList[$idBarang])){
                if($this->in_array_r($variasi, $cartList[$idBarang])){
                    $searchKey = $this->searchUkuranIndex($variasi, $cartList[$idBarang]);
                    if(count($cartList[$idBarang]) > 1){
                        unset($cartList[$idBarang][$searchKey]);
                    }else{
                        unset($cartList[$idBarang]);
                    }
                    session()->set('cartList', $cartList);
                    return "ok";
                }else{
                    unset($cartList[$idBarang]);
                    session()->push($cartList);
                    return "ok";
                }
            }else{
                return "okk";
            }
        }else{
            return "400";
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
                $stokInfo = $this->searchStokBySlugAndVariasi($idBarang, $ukuran);
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
                        session()->push('cartList', [$idBarang => [[
                            'qty'       => $quantity,
                            'ukuran'    => $ukuran
                        ]]]);
                    }
                }else{
                    session()->push('cartList', [$idBarang => [[
                        'qty'       => $quantity,
                        'ukuran'    => $ukuran
                    ]]]);
                }
            }else{
                return "400";
            }
        }
    }

    public function checkout()
    {
        if($this->request->getPost()){
            $cartList = session()->get('cartList');
            if(count($cartList) < 1){
                session()->setFlashdata('danger', 'Gagal Checkout karena tidak ada barang didalam keranjang.');
                return redirect()->to('keranjang');
            }else{
                $produkKosong = 0;
                $produkFixCart = [];
                $generateTrxID = "HLM".strtoupper(uniqid());
                foreach($cartList as $key => $val){
                    foreach($val as $v){
                        $stokInfo = $this->searchStokBySlugAndVariasi($key, $v['ukuran']);
                        if(!$stokInfo){
                            if(isset($cartList[$key])){
                                if($this->in_array_r($v['ukuran'], $cartList[$key])){
                                    $searchKey = $this->searchUkuranIndex($v['ukuran'], $cartList[$key]);
                                    if(count($cartList[$key]) > 1){
                                        unset($cartList[$key][$searchKey]);
                                    }else{
                                        unset($cartList[$key]);
                                    }
                                    session()->set('cartList', $cartList);
                                }else{
                                    unset($cartList[$key]);
                                    session()->set('cartList', $cartList);
                                }
                            }
                            $produkKosong = 1;
                        }else{
                            array_push($produkFixCart, [
                                'kode_trx'      => $generateTrxID,
                                'id_buyer'      => session()->userid,
                                'nama_produk'   => $stokInfo[0]['nama'],
                                'variasi'       => $v['ukuran'],
                                'kuantitas'     => $v['qty'],
                                'status'        => 'Menunggu Pembayaran',
                                'harga'         => $stokInfo[0]['harga'],
                                'alamat_jalan'  => $this->userModel->where('users_id', session()->userid)->first()['alamat_jalan']
                            ]);
                        }
                    }
                }
                if($produkKosong > 0){
                    session()->setFlashdata('danger', 'Gagal Checkout karena beberapa barang tidak tersedia saat ini, mohon coba kembali.');
                    return redirect()->to('keranjang');
                }else{
                    $cek = $this->userModel->where('email', session()->userEmail)->first();
                    if(!$cek['no_hp'] || !$cek['alamat_jalan'] || !$cek['kecamatan'] || !$cek['kelurahan']){
                        $data = [
                            'title' => 'Tambah Alamat'
                        ];
                        $data['user_data'] = $this->userModel->where('email', session()->userEmail)->first();
                        session()->setFlashdata('danger', 'Jika kamu ingin melakukan Checkout, harap isi alamat terlebih dahulu!');
                        return view('tambah-alamat', $data);
                    }else{
                        if($this->transaksiModel->insertBatch($produkFixCart)){
                            session()->set('cartList', []);
                            session()->setFlashdata('success', 'Sukses melakukan checkout produk, harap melakukan pembayaran sebelum terjadi pembatalan otomatis 1x24 jam');
                            return redirect()->to('detail-order/'.$generateTrxID);
                        }else{
                            session()->setFlashdata('danger', 'Gagal melakukan checkout');
                            return redirect()->to('akun');
                        }
                    }
                }
            }
        }
    }

    public function getProductByKategori($kategori)
    {
        $this->produkModel->select('*, data_produk.nama AS nama');
        $this->produkModel->select('data_produk.id AS id');
        $this->produkModel->select('data_kategori.nama AS nama_kategori');
        $this->produkModel->select('data_stok_produk.harga AS harga');
        $this->produkModel->join('data_kategori', 'data_produk.kategori = data_kategori.id_kategori');
        $this->produkModel->join('data_stok_produk', 'data_produk.id = data_stok_produk.id_produk');
        $this->produkModel->where('data_kategori.nama', $kategori);
        $this->produkModel->selectMin('data_produk.id');
        $this->produkModel->groupBy('url_slug');
        $getResult = $this->produkModel->findAll();
        return $getResult;
    }

    public function produk()
    {
        $data = [
            'title' => 'Produk',
        ];

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $data['produks'] = $this->produkModel->search($keyword);
            $data['pager']   = $this->produkModel->pager;
        } else if($this->request->getGet('kategori')) {
            $data['produks'] = $this->getProductByKategori($this->request->getGet('kategori'));
        } else {
            $data['produks'] = $this->produkModel->paginate(5, 'produk_pagers');
            $data['pager']   = $this->produkModel->pager;
        }
        
        $this->produkModel->select('data_kategori.nama AS nama_kategori');
        $this->produkModel->join('data_kategori', 'data_produk.kategori = data_kategori.id_kategori');
        $kategori = $this->produkModel->findAll();
        $kategoriUnique = [];
        foreach($kategori as $k) {
            array_push($kategoriUnique, $k['nama_kategori']);
        }
        $data['kategori'] = array_unique($kategoriUnique);

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
    //    dd($data['data_produk']);

        return view('produk', $data);
    }

    public function akun()
    {
        $data['title'] = "Akun";
        $data['akun'] = $this->userModel->where('email', session()->userEmail)->first();
        $this->transaksiModel->select('*');
        $this->transaksiModel->selectMin('id');
        $this->transaksiModel->groupBy('kode_trx');
        $this->transaksiModel->where('id_buyer', session()->userid);
        // $this->transaksiModel->orderBy('created_at', 'ASC');
        $data['data_trx'] = $this->transaksiModel->orderBy('created_at', 'ASC')->findAll();
        return view('akun', $data);
    }

    public function detailOrder($kode_trx = false)
    {
        $data = [
            'title' => 'Detail order'
        ];

        $data['data_trx'] = $this->transaksiModel->where('kode_trx', $kode_trx)->findAll();
        if(!$data['data_trx']){
            return view('errors/errors-404');
        }
        return view('detail-order', $data);
    }

    public function cancelOrder()
    {
        if($this->validate([
            'kode_trx' => 'required'
        ])){
            if(!$this->transaksiModel->where('kode_trx', $this->request->getPost('kode_trx'))->first()){
                session()->setFlashdata('danger', 'Data transaksi tidak ditemukan');
                return redirect()->to('akun');
            }
            if($this->transaksiModel->set('status', 'Dibatalkan')->where('kode_trx', $this->request->getPost('kode_trx'))->update()){
                session()->setFlashdata('success', 'Sukses membatalkan pesanan');
            }else{
                session()->setFlashdata('danger', 'Gagal membatalkan pesanan');
            }
            return redirect()->to('detail-order/'.$this->request->getPost('kode_trx'));
        }
    }

    public function bayar($kode_trx)
    {
        if(!$this->validate([
			'bukti_bayar' => [
				'rules' => 'uploaded[bukti_bayar]|max_size[bukti_bayar,2048]|mime_in[bukti_bayar,image/png,image/jpeg,image/jpg]|is_image[bukti_bayar]',
				'errors' => [
                    'uploaded' => 'Bukti transfer wajib di upload',
					'max_size' => 'Ukuran gambar terlalu besar, max 2MB',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Yang anda pilih bukan gambar'
				]
			],
		])) {
			return redirect()->back();
		}

        $buktiBayar = $this->request->getFile('bukti_bayar');
        $namaFile = $buktiBayar->getRandomName();
        $buktiBayar->move('assets/img/bukti-bayar', $namaFile);

        $this->transaksiModel->set('bukti_bayar', $namaFile);
        $this->transaksiModel->set('status', 'Sudah Membayar');
        $this->transaksiModel->where('kode_trx', $kode_trx);
        $this->transaksiModel->update();

        session()->setFlashdata('success', 'Pembayaran telah berhasil, kami akan memverifikasi pesanan anda, terimakasih.');
		return redirect()->to('detail-order/'.$kode_trx);
    }

    public function tambahAlamat()
    {
        $data = [
            'title' => 'Tambah Alamat'
        ];
        $data['user_data'] = $this->userModel->where('email', session()->userEmail)->first();
        if($this->validate([
            'namaPenerima'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama penerima wajib diisi'
                ]
            ],
            'noHp'         =>  [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'No. Handphone wajib diisi',
                    'integer' => 'Hanya boleh berisi angka'
                ]
            ],
            'kota'          =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota wajib diisi'
                ]
            ],
            'kecamatan'     =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kecamantan wajib diisi'
                ]
            ],
            'kelurahan'     =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelurahan wajib diisi'
                ]
            ],
            'alamatLengkap' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Lengkap wajib diisi'
                ]
            ],
        ])){
            if($this->userModel->where('email', session()->userEmail)->update(session()->userid, [
                'nama'          => $this->request->getPost('namaPenerima'),
                'no_hp'         => $this->request->getPost('noHp'),
                'kota'          => $this->request->getPost('kota'),
                'alamat_jalan'  => $this->request->getPost('alamatLengkap'),
                'kecamatan'     => $this->request->getPost('kecamatan'),
                'kelurahan'     => $this->request->getPost('kelurahan')
            ])){
                session()->setFlashdata('success', 'Sukses menambahkan alamat');
                return redirect()->to('akun');
            }else{
                session()->setFlashdata('danger', 'Gagal menambahkan alamat');
                return redirect()->to('tambah-alamat');
            }
        }
        return view('tambah-alamat', $data);
    }

    public function ubahAlamat()
    {
        $data = [
            'title' => 'Ubah Alamat'
        ];
        $data['user_data'] = $this->userModel->where('email', session()->userEmail)->first();
        if($this->validate([
            'namaPenerima'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama penerima wajib diisi'
                ]
            ],
            'noHp'         =>  [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'No. Handphone wajib diisi',
                    'integer' => 'Hanya boleh berisi angka'
                ]
            ],
            'kota'          =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota wajib diisi'
                ]
            ],
            'kecamatan'     =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kecamantan wajib diisi'
                ]
            ],
            'kelurahan'     =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelurahan wajib diisi'
                ]
            ],
            'alamatLengkap' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Lengkap wajib diisi'
                ]
            ],
        ])){
            if($this->userModel->where('email', session()->userEmail)->update(session()->userid, [
                'nama'          => $this->request->getPost('namaPenerima'),
                'no_hp'         => $this->request->getPost('noHp'),
                'kota'          => $this->request->getPost('kota'),
                'alamat_jalan'  => $this->request->getPost('alamatLengkap'),
                'kecamatan'     => $this->request->getPost('kecamatan'),
                'kelurahan'     => $this->request->getPost('kelurahan')
            ])){
                session()->setFlashdata('success', 'Sukses mengubah alamat');
                return redirect()->to('akun');
            }else{
                session()->setFlashdata('danger', 'Gagal mengubah alamat');
                return redirect()->to('ubah-alamat');
            }
        }

        return view('ubah-alamat', $data);
    }

    public function tentang()
    {
        $data['title'] = 'Tentang Kami';

        return view('tentang', $data);
    }

    public function bantuan()
    {
        $data['title'] = 'Bantuan';

        return view('bantuan', $data);
    }
}
