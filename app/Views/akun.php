<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('content') ?>
<section class="section-pages">
    <div class="pages-wrapper">
        <div class="d-flex justify-content-between">
                <div>
                    <h4 class="fw-bold">Akun saya</h4>
                    <p>Selamat datang, <?= $akun['nama'] ?>!</p>
                </div>
                <div>
                    <a class="btn btn-dark" href="<?= base_url('logout-member') ?>">Keluar <i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-8 mb-5">
                    <p class="text-muted"><i class="fas fa-tasks"></i> Orderan Saya</p>
                    <hr>
                    <!-- Kalo blm ada pesanan -->
                    <!-- <p class="py-3">Anda belum melakukan pemesanan apa pun</p> -->
                    <!--  -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No. Orderan</th>
                                <th scope="col">Status</th>
                                <th scope="col">No. Resi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">19129409</th>
                                <td>Menunggu pembayaran</td>
                                <td>-</td>
                                <td>
                                    <a href="/detail-order" class="badge rounded-pill bg-dark text-decoration-none text-white">Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <p class="text-muted"><i class="fas fa-map-marked-alt"></i> Alamat</p>
                    <hr>
                    <?php if($akun['alamat_jalan'] != NULL) { ?>
                    <!-- when sudah ada -->
                    <p class="py-3">Agung</p>
                    <p>0812459124</p>
                    <p>Jl bangau no 26, Kota, Kecamatan, Kode Pos</p>

                    <a href="/ubah-alamat" class="btn btn-dark mt-3">Ubah Alamat</a>
                    <?php } else { ?>
                        <!-- jika alamat blm ada -->
                        <a href="/tambah-alamat" class="btn btn-dark mt-3"><i class="bx bxs-map"></i> Tambah Alamat</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>