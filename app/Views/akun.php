<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('styles') ?>
<style>
    .akun {
        margin-top: 150px;
        padding-bottom: 100px;
    }

    .akun-wrapper {
        width: 74%;
    }

    @media screen and (max-width: 576px) {
        .akun {
            margin-top: 50px;
        }
    }

    @media screen and (max-width: 992px) {
        .akun {
            margin-top: 50px;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="akun d-flex justify-content-center">
    <div class="akun-wrapper">
        <div class="d-flex justify-content-between">
                <div>
                    <h4 class="fw-bold">Akun saya</h4>
                    <p>Selamat datang, <?= $akun['nama'] ?>!</p>
                </div>
                <div>
                    <a href="<?= base_url('logout-member') ?>" class="btn btn-dark"><i class='bx bx-log-out'></i> Keluar</a>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-8 mb-5">
                    <p class="text-muted">Orderan Saya</p>
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
                    <p class="text-muted">Alamat</p>
                    <hr>
                    <!-- when sudah ada -->
                    <p class="py-3">Agung</p>
                    <p>Jl bangau no 26</p>
                    <p>Tangerang</p>
                    <p>Banteng 15119</p>
                    <p>Indonesia</p>

                    <button class="btn btn-dark mt-3">Edit Alamat</button>
                    <!-- jika alamat blm ada -->
                    <!-- <button class="btn btn-dark mt-3">Tambah Alamat</button> -->
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>