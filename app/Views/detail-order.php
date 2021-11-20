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
        <h4># Detail order 812488124</h4>
        <p class="text-muted">Menunggu pembayaran</p>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-between tanggal-beli">
                <p class="text-muted">Tanggal Pembelian</p>
                <p>1 November 2021, 09:00:12</p>
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
                            <th scope="col">Ukuran</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>KYT Black</td>
                            <td>1</td>
                            <td>M</td>
                            <td>Rp. 499.999</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>KYT Black</td>
                            <td>1</td>
                            <td>L</td>
                            <td>Rp. 499.999</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center">Total Bayar</td>
                            <td>Rp. 69696969</td>
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
                                <p class="mt-3">-</p>
                                <p>-</p>
                                <p>Jl Purwakarta 169, Jawa Barat, Bandung, 40291</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#bayarModal">Bayar</button>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#batalModal">Batalkan</button>  <!-- kalo dah bayar jadiin btn-secondary aja -->
        </div>
    </div>
</section>

<!-- Bayar Modal -->
<div class="modal fade" id="bayarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bayar Pesanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Foto bukti transfer harus terlihat jelas</p>
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="formFile" class="form-label">Masukkan bukti transfer</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="col-md-6 mt-3">
                <ul class="list-group">
                    <li class="list-group-item bg-dark text-white" aria-current="true">Bank Tujuan Transfer</li>
                    <li class="list-group-item"><strong>BCA</strong> 9012401421</li>
                    <li class="list-group-item"><strong>BNI</strong> 12400124</li>
                    <li class="list-group-item">a.n. Akbar Syarifudin</li>
                </ul>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark">Bayar</button>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-dark">Batalkan</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>