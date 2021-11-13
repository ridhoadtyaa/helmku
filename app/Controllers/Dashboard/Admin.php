<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Admin'
        ];

        return view('dashboard/admin/index', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit Admin'
        ];

        return view('dashboard/admin/edit', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Admin'
        ];

        return view('dashboard/admin/create', $data);
    }

    public function edit_profile()
    {
        $data = [
            'title' => 'Edit Profile'
        ];

        return view('dashboard/admin/edit-profile', $data);
    }

    public function password()
    {
        $data = [
            'title' => 'Ubah Password'
        ];

        return view('dashboard/admin/ubah-password', $data);
    }
}
