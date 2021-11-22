<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('styles') ?>
<style>
    .minmargin {
        margin-bottom: -11px;
    }

    .form-check-input:checked {
        background-color: #000;
        box-shadow: inset 0 1px 1px #000, 0 0 8px #000;
    }

    .button-bayar {
        width: 100%;
    }

    .ongkir {
        font-weight: 600;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section-pages">
    <div class="pages-wrapper">
        <div class="row">
            <h3>CHECKOUT</h3>
            <div class="col-md-7">
                <div class="card mt-3 mb-5">
                    <div class="card-body">
                    <div class="row minmargin">
                        <div class="col-md-3 col-lg-2">
                            <p class="text-muted">Kontak</p>
                        </div>
                        <div class="col-md-9 col-lg-8">
                            <p>0812344912 | danang@gmai.com</p>
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <a href="/edit-alamat" class="text-decoration-none text-muted">Ubah</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row minmargin">
                            <div class="col-md-3 col-lg-2">
                                <p class="text-muted">Alamat</p>
                            </div>
                            <div class="col-md-9 col-lg-8">
                                <p>ewrwerwer, werwer, Tangerang, North Sumatra 15119, Indonesia</p>
                            </div>
                            <div class="col-md-4 col-lg-2">
                                <a href="/edit-alamat" class="text-decoration-none text-muted">Ubah</a>
                            </div>
                       </div>
                    </div>
                </div>
                <h5 class="mb-3">Pilih pengiriman</h5>
                <div class="card">
                    <div class="card-body">
                        <div class="row minmargin">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kurir" id="jne">
                                    <label class="form-check-label" for="jne">
                                        JNE
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-lg-4 col-3"></div>
                            <div class="col-md-3 col-sm-3 col-lg-2 col-3">
                                <p class="ongkir">Gratis</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row minmargin">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kurir" id="sicepat">
                                    <label class="form-check-label" for="sicepat">
                                        SiCepat
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-lg-4 col-3"></div>
                            <div class="col-md-3 col-sm-3 col-lg-2 col-3">
                                <p class="ongkir">Gratis</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row minmargin">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kurir" id="jnt">
                                    <label class="form-check-label" for="jnt">
                                        JNT
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-lg-4 col-3"></div>
                            <div class="col-md-3 col-sm-3 col-lg-2 col-3">
                                <p class="ongkir">Gratis</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-3">
                <div class="card">
                    <div class="card-body">
                        <p class="fw-bold">Ringkasan belanja</p>
                        <div class="row">
                            <div class="col-6">
                                <p>Total Harga</p>
                            </div>
                            <div class="col-6">
                                <p>Rp 696.696</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Ongkos Kirim</p>
                            </div>
                            <div class="col-6">
                                <p>Rp 0</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <h5>Total Tagihan</h5>
                            </div>
                            <div class="col-6">
                                <h5>Rp 696.696</h5>
                            </div>
                        </div>
                        <a href="/pembayaran" class="btn btn-dark button-bayar fw-bold mt-4">Pilih Pembayaran</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <a href="/keranjang" class="text-decoration-none text-dark"><i class="fas fa-chevron-left"></i> Kembali ke keranjang</a>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>