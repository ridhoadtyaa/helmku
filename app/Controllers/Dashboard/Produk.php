<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Produk extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Produk'
        ];

        return view('dashboard/produk/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Produk'
        ];

        return view('dashboard/produk/create', $data);
    }
}
