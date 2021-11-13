<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Transaksi extends BaseController
{
    public function belum_membayar()
    {
        $data = [
            'title' => 'Data Transaksi Belum Membayar'
        ];  

        return view('dashboard/transaksi/belum-membayar', $data);
    }

    public function sudah_membayar()
    {
        $data = [
            'title' => 'Data Transaksi Sudah Membayar'
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
