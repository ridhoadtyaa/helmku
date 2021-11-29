<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('styles') ?>
<style>
    .tanggal-beli {
        margin-top: -10px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section-pages">
    <div class="pages-wrapper">
        <div class="py-3 align-right">
            <a href="/akun" class="text-decoration-none text-dark"><i class="fas fa-chevron-left"></i> Kembali</a>
        </div>
        <?= $this->include('templates/dashboard/partials/alert') ?>
        <h4>Detail Order #<?= $data_trx[0]['kode_trx'] ?></h4>
        <p class="text-muted"><?= $data_trx[0]['status'] ?></p>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between tanggal-beli">
                <p class="text-muted">Tanggal Pembelian</p>
                <p><?= date("d F Y H:i:s", strtotime($data_trx[0]['created_at'])) ?> WIB</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Variasi</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; $harga = 0; foreach($data_trx as $d): ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $d['nama_produk'] ?></td>
                            <td><?= $d['kuantitas'] ?></td>
                            <td><?= $d['variasi'] ?></td>
                            <td><?= format_rupiah($d['harga']) ?></td>
                        </tr>
                        <?php $i++; $harga += $d['harga']; endforeach; ?>
                        <tr>
                            <td colspan="4" class="text-center">Total Bayar</td>
                            <td><?= format_rupiah($harga) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 col-lg-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Info Pengiriman</h5>
                        <div class="row">
                            <div class="col-md-6 col-6 text-muted">
                                <p class="mt-3">Kurir</p>
                                <p>No Resi</p>
                                <p>Alamat</p>
                            </div>
                            <div class="col-md-6 col-6">
                                <p class="mt-3"><?= $data_trx[0]['status'] == 'Sedang dikirim' && $data_trx[0]['status'] == 'Selesai' ? $data_trx[0]['kurir'] : '-' ?></p>
                                <p><?= $data_trx[0]['status'] == 'Sedang dikirim' && $data_trx[0]['status'] == 'Selesai' ? $data_trx[0]['no_resi'] : '-' ?></p>
                                <p><?= $data_trx[0]['alamat_jalan'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <?php if(preg_match("/Menunggu Pembayaran/i", $data_trx[0]['status'])): ?>
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#bayarModal">Bayar</button> 
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#batalModal">Batalkan</button>  
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if(preg_match("/Menunggu Pembayaran/i", $data_trx[0]['status'])): ?>
<!-- Bayar Modal -->
<div class="modal fade" id="bayarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bayar Pesanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="/detail-order/bayar/<?= $data_trx[0]['kode_trx'] ?>" method="post" enctype="multipart/form-data">
          <div class="row">
              <div class="col-md-6">
                <p>Foto bukti transfer harus terlihat jelas</p>
                <label for="bukti_bayar" class="form-label">Masukkan bukti transfer</label>
                <input class="form-control" type="file" id="bukti_bayar" name="bukti_bayar">
            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item bg-dark text-white" aria-current="true">Bank Tujuan Transfer</li>
                    <li class="list-group-item"><strong>BCA</strong> 9012401421</li>
                    <li class="list-group-item"><strong>BNI</strong> 12400124</li>
                    <li class="list-group-item">a.n. Muhammad Deva Pahlevi</li>
                </ul>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-dark">Bayar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Batal Modal -->
<div class="modal fade" id="batalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Batalkan Pesanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin membatalkan pesanan ?</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="<?= base_url('cancel-order') ?>">
            <input type="hidden" name="kode_trx" value="<?= $data_trx[0]['kode_trx'] ?>">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-danger">Batalkan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endif ?>
<?= $this->endSection() ?>