<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class LaporanPenjualan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Laporan Penjualan'
        ];

        return view('dashboard/laporan-penjualan/index', $data);
    }
}
