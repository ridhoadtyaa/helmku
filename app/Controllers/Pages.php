<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('home');
    }

    public function detail()
    {
        $data = [
            'title' => 'Bogo retro' // nama produk
        ];

        return view('detail', $data);
    }

    public function cart()  
    {
        $data = [
            'title' => 'Keranjang'
        ];

        return view('cart', $data);
    }
}
