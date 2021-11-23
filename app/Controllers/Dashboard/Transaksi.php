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
        $data = [
            'title'     => 'Data Transaksi Belum Membayar',
            'transaksi' => $this->getAllTransactionByStatus('Menunggu Pembayaran')
        ];  
        return view('dashboard/transaksi/belum-membayar', $data);
    }

    public function sudah_membayar()
    {
        $data = [
            'title' => 'Data Transaksi Sudah Membayar',
            'transaksi' => $this->getAllTransactionByStatus('Sudah Membayar')
        ];  

        return view('dashboard/transaksi/sudah-membayar', $data);
    }

    public function terverifikasi()
    {
        $data = [
            'title' => 'Data Transaksi Terverifikasi'
        ];  

        return view('dashboard/transaksi/terverifikasi', $data);
    }

    public function dikirim()
    {
        $data = [
            'title' => 'Data Transaksi Sedang Dikirim'
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
