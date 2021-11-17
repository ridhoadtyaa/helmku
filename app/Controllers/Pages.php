<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        return view('home', $data);
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

    public function produk()
    {
        $data = [
            'title' => 'Produk'
        ];  

        return view('produk', $data);
    }
}
