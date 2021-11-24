<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
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
            'transaksi' => $this->getAllTransactionByStatus('Terverifikasi'),
            'validation' => \Config\Services::validation()
        ];  

        return view('dashboard/transaksi/terverifikasi', $data);
    }

    public function dikirim()
    {
        $data = [
            'title' => 'Data Transaksi Sedang Dikirim',
        ];  

        return view('dashboard/transaksi/dikirim', $data);
    }

    public function selesai()
    {
        $data = [
            'title' => 'Data Transaksi Selesai'
        ];  

        return view('dashboard/transaksi/selesai', $data);
    }
}
