<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1>Data Transaksi Sudah Membayar</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Transaksi Sudah Membayar</div>
    </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
            <table id="tabel-transaksi" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No. Pesanan</th>
                        <th>Tanggal Order</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Nama</th>
                        <th>Detail Pesanan</th>
                        <th>Bukti Transfer</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($transaksi as $t) : ?>
                      <tr>
                        <td>#<b><?= $t['kode_trx'] ?></b></td>
                        <td><?= date('d F Y H:i:s', strtotime($t['tgl_pesan'])) ?></td>
                        <td><?= date('d F Y H:i:s', strtotime($t['tgl_pembayaran'])) ?></td>
                        <td><?= $t['nama'] ?></td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#keranjangModal<?= $t['kode_trx'] ?>"><i class="fas fa-shopping-bag"></i></i></button></td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#buktiModal<?= $t['kode_trx'] ?>"><i class="fas fa-image"></i></button></td>
                        <td>
                            <button class="btn btn-success" title="Valid"><i class="fas fa-check"></i></button>
                            <button class="btn btn-danger" title="Tidak Valid / Batalkan"><i class="fas fa-times"></i></button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                </tfoot>
            </table>
            </div>
        </div>
    </div>
</section>

<!-- keranjang Modal -->
<?php foreach($transaksi as $t) : ?>
<div class="modal fade" id="keranjangModal<?= $t['kode_trx'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Alamat : </strong><?= $t['alamat_jalan'] ?></li>
      </ul>
      <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Produk</th>
            <th scope="col">Variasi</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>1241-4125-1555-1525</td>
                <td>Bogo</td>
                <td>1</td>
                <td>Rp 200.000</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>1241-4125-1555-1525</td>
                <td>Bogo</td>
                <td>1</td>
                <td>Rp 200.000</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>1241-4125-1555-1525</td>
                <td>Bogo</td>
                <td>1</td>
                <td>Rp 200.000</td>
            </tr>
            <tr>
                <td colspan="3" class="text-center">Jumlah</td>
                <td>3</td>
                <td>Rp 600.000</td>
            </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- bukti Modal -->
<?php foreach($transaksi as $t) : ?>
<div class="modal fade" id="buktiModal<?= $t['kode_trx'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img src="/assets/img/bukti-bayar/<?= $t['bukti_bayar'] ?>" class="img-fluid">
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $(document).ready(function() {
        $('#tabel-transaksi').DataTable();
    } );
</script>
<?= $this->endSection() ?>