<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Transaksi extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Transaksi'
        ];  

        return view('dashboard/transaksi/index', $data);
    }
}
