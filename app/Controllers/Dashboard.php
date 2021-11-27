<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }
    public function getRecentOrders($limit = 10)
    {
        $this->transaksiModel->select('*, data_transaksi.alamat_jalan AS alamat_pengiriman, data_transaksi.created_at AS tgl_pesan, data_transaksi.updated_at AS tgl_pembayaran');
        $this->transaksiModel->selectMin('id');
        $this->transaksiModel->groupBy('kode_trx');
        $this->transaksiModel->select('data_pengguna.*');
        $this->transaksiModel->join('data_pengguna', 'id_buyer = data_pengguna.users_id');
        return $this->transaksiModel->orderBy('tgl_pesan', 'DESC')->limit($limit)->get()->getResultArray();
    }
    public function getAllTransactionByStatus($status = 'Menunggu Pembayaran', $limit = 0)
    {
        $this->transaksiModel->select('*, data_transaksi.alamat_jalan AS alamat_pengiriman, data_transaksi.created_at AS tgl_pesan, data_transaksi.updated_at AS tgl_pembayaran');
        $this->transaksiModel->selectMin('id');
        $this->transaksiModel->groupBy('kode_trx');
        $this->transaksiModel->select('data_pengguna.*');
        $this->transaksiModel->join('data_pengguna', 'id_buyer = data_pengguna.users_id');
        $this->transaksiModel->where('status', $status);
        $this->transaksiModel->orderBy('tgl_pembayaran', 'DESC');
        if($limit > 0){
            $this->transaksiModel->limit($limit);
        }
        return $this->transaksiModel->get()->getResultArray();
    }
    public function getAllTransactionByMonth($bln = "")
    {
        $this->transaksiModel->select('*, data_transaksi.alamat_jalan AS alamat_pengiriman, data_transaksi.created_at AS tgl_pesan, data_transaksi.updated_at AS tgl_pembayaran');
        $this->transaksiModel->selectMin('id');
        $this->transaksiModel->groupBy('kode_trx');
        $this->transaksiModel->select('data_pengguna.*');
        $this->transaksiModel->join('data_pengguna', 'id_buyer = data_pengguna.users_id');
        $this->transaksiModel->where('status', 'Selesai');
        $this->transaksiModel->like('data_transaksi.updated_at', date('Y').'-'.$bln);
        $this->transaksiModel->orderBy('tgl_pembayaran', 'DESC');
        return $this->transaksiModel->get()->getResultArray();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'count' => [
                'menunggu'          => count($this->getAllTransactionByStatus('Menunggu Pembayaran')),
                'sudah_membayar'    => count($this->getAllTransactionByStatus('Sudah Membayar')),
                'sedang_dikirim'    => count($this->getAllTransactionByStatus('Sedang dikirim')),
                'selesai'           => count($this->getAllTransactionByStatus('Selesai'))
            ],
            'trx_selesai'   => [
                'Januari'   => count($this->getAllTransactionByMonth('01')),
                'Februari'  => count($this->getAllTransactionByMonth('02')),
                'Maret'     => count($this->getAllTransactionByMonth('03')),
                'April'     => count($this->getAllTransactionByMonth('04')),
                'Mei'       => count($this->getAllTransactionByMonth('05')),
                'Juni'      => count($this->getAllTransactionByMonth('06')),
                'Juli'      => count($this->getAllTransactionByMonth('07')),
                'Agustus'   => count($this->getAllTransactionByMonth('08')),
                'September' => count($this->getAllTransactionByMonth('09')),
                'Oktober'   => count($this->getAllTransactionByMonth('10')),
                'November'  => count($this->getAllTransactionByMonth('11')),
                'Desember'  => count($this->getAllTransactionByMonth('12')) 
            ],
            'recent_orders' => $this->getRecentOrders(5)
        ];
        return view('dashboard/index', $data);
    }
}
