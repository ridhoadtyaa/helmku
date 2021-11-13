<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Pelanggan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Pelanggan'
        ];

        return view('dashboard/pelanggan/index', $data);
    }
}
