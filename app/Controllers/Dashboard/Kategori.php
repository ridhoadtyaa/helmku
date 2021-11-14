<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Kategori extends BaseController
{
    public function index()
    {
        $data['title'] = 'Daftar Kategori';
        return view('dashboard/kategori/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Kategori';
        return view('dashboard/kategori/create', $data);
    }

    public function edit()
    {
        $data['title'] = 'Edit Kategori';
        return view('dashboard/kategori/edit', $data);
    }
}
