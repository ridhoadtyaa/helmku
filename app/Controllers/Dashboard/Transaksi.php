<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Stok;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    public function __construct()
    {
        $this->transaksiModel   = new TransaksiModel();
        $this->stokModel        = new Stok();
    }
    
    public function getAllTransactionByStatus($status = 'Menunggu Pembayaran')
    {
        $this->transaksiModel->select('*, data_transaksi.alamat_jalan AS alamat_pengiriman, data_transaksi.created_at AS tgl_pesan, data_transaksi.updated_at AS tgl_pembayaran');
        $this->transaksiModel->selectMin('id');
        $this->transaksiModel->groupBy('kode_trx');
        $this->transaksiModel->select('data_pengguna.*');
        $this->transaksiModel->join('data_pengguna', 'id_buyer = data_pengguna.users_id');
        $this->transaksiModel->where('status', $status);
        $this->transaksiModel->orderBy('tgl_pembayaran', 'DESC');
        return $this->transaksiModel->get()->getResultArray();
    }

    public function belum_membayar()
    {
        // dd($this->transaksiModel->where('kode_trx', 'HLM619DC17B84691')->findAll());
        $data = [
            'title' => 'Data Transaksi Belum Membayar',
            'validation' => \Config\Services::validation()
        ];
        $data['transaksi'] = [];
        $allData = $this->getAllTransactionByStatus('Menunggu Pembayaran');
        $i = 0;
        foreach($allData as $d){
            $data['transaksi'][$i++] = array_merge(
                $d, ['items' => $this->transaksiModel->select('nama_produk, variasi, kuantitas, harga')->where('kode_trx', $d['kode_trx'])->findAll()]
            );
        }  
    
        return view('dashboard/transaksi/belum-membayar', $data);
    }

    public function sudah_membayar()
    {
        $data = [
            'title' => 'Data Transaksi Sudah Membayar',
            'validation' => \Config\Services::validation()
        ];  
        $data['transaksi'] = [];
        $allData = $this->getAllTransactionByStatus('Sudah Membayar');
        $i = 0;
        foreach($allData as $d){
            $data['transaksi'][$i++] = array_merge(
                $d, ['items' => $this->transaksiModel->select('nama_produk, variasi, kuantitas, harga')->where('kode_trx', $d['kode_trx'])->findAll()]
            );
        }  

        return view('dashboard/transaksi/sudah-membayar', $data);
    }

    public function validTransaction($kode_trx)
    {
        foreach($this->transaksiModel->where('kode_trx', $kode_trx)->findAll() as $trx){
            $this->stokModel->select('*, data_stok_produk.id AS id_stok');
            $this->stokModel->join('data_produk', 'id_produk = data_produk.id');
            $this->stokModel->where('ukuran', $trx['variasi']);
            $this->stokModel->where('nama', $trx['nama_produk']);
            $cari = $this->stokModel->first();
            if($cari){
                $upd = $this->stokModel->update($cari['id_stok'], ['stok' => ($cari['stok'] - $trx['kuantitas']) > 0 ? $cari['stok'] - $trx['kuantitas'] : 0 ]);
                // dd($upd);
            }
        }
        $this->transaksiModel->set('status', 'Terverifikasi');
        $this->transaksiModel->where('kode_trx', $kode_trx);
        $this->transaksiModel->update();
        session()->setFlashdata('success', 'Transaksi berhasil terverifikasi');
		return redirect()->to('/dashboard/data-transaksi/sudah-membayar');
    }

    public function notValidTransaction($kode_trx)
    {
        if(!$this->validate([
            'alasan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu alasan'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        
        $this->transaksiModel->set('status', 'Dibatalkan - ' . $this->request->getPost('alasan'));
        $this->transaksiModel->where('kode_trx', $kode_trx);
        $this->transaksiModel->update();

        // unlink("assets/img/bukti-bayar/" . $this->transaksiModel->where('kode_trx', $kode_trx)->findAll()[0]['bukti_bayar']);

        session()->setFlashdata('success', 'Transaksi berhasil dibatalkan dengan alasan <strong>' . strtolower($this->request->getPost('alasan')) . '<strong>');
		return redirect()->to('/dashboard/data-transaksi/sudah-membayar');
    }

    public function terverifikasi()
    {
        $data = [
            'title' => 'Data Transaksi Terverifikasi',
            'validation' => \Config\Services::validation()
        ];  
        $data['transaksi'] = [];
        $allData = $this->getAllTransactionByStatus('Terverifikasi');
        $i = 0;
        foreach($allData as $d){
            $data['transaksi'][$i++] = array_merge(
                $d, ['items' => $this->transaksiModel->select('nama_produk, variasi, kuantitas, harga')->where('kode_trx', $d['kode_trx'])->findAll()]
            );
        }  
        return view('dashboard/transaksi/terverifikasi', $data);
    }
    
    public function shipSave($kode_trx)
    {
        if($this->validate([
            'kurir' => 'required',
            'resi'  => 'required'
        ])){
            $this->transaksiModel->set('status', 'Sedang dikirim');
            $this->transaksiModel->set('kurir', $this->request->getPost('kurir'));
            $this->transaksiModel->set('no_resi', $this->request->getPost('resi'));
            $this->transaksiModel->where('kode_trx', $kode_trx);
            $this->transaksiModel->update();
            session()->setFlashdata('success', 'Sukses mengupdate status Transaksi '.$kode_trx.' menjadi <strong>sedang dikirim</strong>');
        }
        return redirect()->back();
    }

    public function dikirim()
    {
        $data = [
            'title' => 'Data Transaksi Sedang Dikirim',
        ];  
        $data['transaksi'] = [];
        $allData = $this->getAllTransactionByStatus('Sedang dikirim');
        $i = 0;
        foreach($allData as $d){
            $data['transaksi'][$i++] = array_merge(
                $d, ['items' => $this->transaksiModel->select('nama_produk, variasi, kuantitas, harga')->where('kode_trx', $d['kode_trx'])->findAll()]
            );
        }  
        return view('dashboard/transaksi/dikirim', $data);
    }

    public function transaksiSelesai($kode_trx)
    {
        $this->transaksiModel->set('status', 'Selesai');
        $this->transaksiModel->where('kode_trx', $kode_trx);
        $this->transaksiModel->update();
        session()->setFlashdata('success', 'Sukses mengupdate status Transaksi '.$kode_trx.' menjadi <strong>Selesai</strong>');
		return redirect()->back();
    }

    public function selesai()
    {
        $data = [
            'title' => 'Data Transaksi Selesai'
        ];  
        $data['transaksi'] = [];
        $allData = $this->getAllTransactionByStatus('Selesai');
        $i = 0;
        foreach($allData as $d){
            $data['transaksi'][$i++] = array_merge(
                $d, ['items' => $this->transaksiModel->select('nama_produk, variasi, kuantitas, harga')->where('kode_trx', $d['kode_trx'])->findAll()]
            );
        }  
        return view('dashboard/transaksi/selesai', $data);
    }
}
