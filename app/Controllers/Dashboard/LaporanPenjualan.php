<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class LaporanPenjualan extends BaseController
{
    public function __construct()
    {
        helper('tgl');
        $this->transaksiModel = new TransaksiModel();
    }
    public function index()
    { 
        $dataLaporanByTanggal = [];
    
        if($this->request->getGet('tglLaporan')) {
            for($i = 0; $i < count($this->transaksiModel->where('status', 'Selesai')->findAll()); $i++) {
                if(join('-', array_slice(explode('-', $this->transaksiModel->where('status', 'Selesai')->findAll()[$i]['updated_at']), 0, 2)) == $this->request->getGet('tglLaporan')) {
                    array_push($dataLaporanByTanggal, $this->transaksiModel->where('status', 'Selesai')->findAll()[$i]);
                }
            }
        } else {
            for($i = 0; $i < count($this->transaksiModel->where('status', 'Selesai')->findAll()); $i++) {
                if(join('-', array_slice(explode('-', $this->transaksiModel->where('status', 'Selesai')->findAll()[$i]['updated_at']), 0, 2)) == date('Y-m')) {
                    array_push($dataLaporanByTanggal, $this->transaksiModel->where('status', 'Selesai')->findAll()[$i]);
                }
            }
        }

        $data = [
            'laporan_penjualan' => $dataLaporanByTanggal,
            'header' => $this->request->getGet('tglLaporan') ? tgl_bulanTahun($this->request->getGet('tglLaporan')) : tgl_bulanTahun(date('Y-m'))
        ];
        $data['title'] = "Laporan Penjualan - ".$data['header'];
        return view('dashboard/laporan-penjualan/index', $data);
    }
}
