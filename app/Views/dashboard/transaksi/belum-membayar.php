<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1>Data Transaksi Belum Membayar</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Transaksi Belum Membayar</div>
    </div>
    </div>

    <?= $this->include('templates/dashboard/partials/alert') ?>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
            <table id="tabel-transaksi" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No. Pesanan</th>
                        <th>Tanggal Order</th>
                        <th>Nama</th>
                        <th>Detail Pesanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach($transaksi as $trx): ?>
                    <tr>
                        <td>#<b><?= $trx['kode_trx'] ?></b></td>
                        <td><?= date('d F Y H:i:s', strtotime($trx['tgl_pesan'])) ?></td>
                        <td><?= $trx['nama'] ?></td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#keranjangModal<?= $trx['kode_trx'] ?>"><i class="fas fa-shopping-bag"></i></i></button></td>
                        <td><button class="btn btn-danger" data-toggle="modal" data-target="#batalModal<?= $trx['kode_trx'] ?>" title="Batalkan"><i class="fas fa-times"></i></button></td>
                    </tr>
                  <?php endforeach ?>
                </tfoot>
            </table>
            </div>
        </div>
    </div>
</section>

<!-- keranjang Modal -->
<?php $i = 1 ?>
<?php foreach($transaksi as $trx): ?>
<div class="modal fade" id="keranjangModal<?= $trx['kode_trx'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <li class="list-group-item"><strong>Alamat : </strong><?= $trx['alamat_jalan'] ?></li>
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
                <th scope="row"><?= $i++ ?></th>
                <td><?= $trx['nama_produk'] ?></td>
                <td><?= $trx['variasi'] ?></td>
                <td><?= $trx['kuantitas'] ?></td>
                <td><?= $trx['harga'] ?></td>
            </tr>
            <tr>
                <td colspan="3" class="text-center">Total</td>
                <td>3</td>
                <td>Rp 600.000</td>
            </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

<!-- batal Modal -->
<?php foreach($transaksi as $trx): ?>
<div class="modal fade" id="batalModal<?= $trx['kode_trx'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/dashboard/data-transaksi/tidak-valid/<?= $trx['kode_trx'] ?>" method="post">
        <p>Alasan dibatalkan : </p>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="alasan" id="stokKosong" value="Stok Kosong">
          <label class="form-check-label" for="stokKosong">
            Stok Kosong
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="alasan" id="spam" value="Spam">
          <label class="form-check-label" for="spam">
            Spam
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="alasan" id="aktivitasTidakWajar" value="Aktifitas Tidak Wajar">
          <label class="form-check-label" for="aktivitasTidakWajar">
            Aktifitas Tidak Wajar
          </label>
        </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Ya</button>
        </form>
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