<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('styles') ?>
<style>
    .keranjang {
        margin-top: 150px;
        padding-bottom: 100px;
    }

    .keranjang-wrapper {
        width: 74%;
    }

    .keranjang .card img {
        width: 100px;
    }

    @media screen and (max-width: 576px) {
        .keranjang {
            margin-top: 50px;
        }
    }

    @media screen and (max-width: 992px) {
        .keranjang {
            margin-top: 50px;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="keranjang d-flex justify-content-center">
    <div class="keranjang-wrapper">
        <!-- no cart -->
        <div class="text-center">
            <img src="/assets/img/nocart.png" width="180" alt="">
            <h3 class="text-muted my-3">Keranjangmu masih kosong.</h3>
            <a href="/produk" class="btn btn-dark">Belanja</a>
        </div>
        <!--  -->
    </div>
</section>
<?= $this->endSection() ?>

<!-- Kalo ada barang  -->
<!-- <div class="row">
    <div class="col-md-6  mb-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-3">
                        <img src="/assets/img/produk/helm1.png" class="img-thumbnail rounded border-0">
                    </div>
                    <div class="col-md-5 col-sm-5 col-5">
                        <p>Bogo Retro x1</p>
                        <p>L</p>
                        <i class='bx bx-trash'></i>
                    </div>
                    <div class="col-md-4 col-sm-4 col-4">
                        <p>Rp 300.000</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-3">
                        <img src="/assets/img/produk/helm1.png" class="img-thumbnail rounded border-0">
                    </div>
                    <div class="col-md-5 col-sm-5 col-5">
                        <p>Bogo Retro x1</p>
                        <p>L</p>
                        <i class='bx bx-trash'></i>
                    </div>
                    <div class="col-md-4 col-sm-4 col-4">
                        <p>Rp 300.000</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-3">
                        <img src="/assets/img/produk/helm1.png" class="img-thumbnail rounded border-0">
                    </div>
                    <div class="col-md-5 col-sm-5 col-5">
                        <p>Bogo Retro x1</p>
                        <p>L</p>
                        <i class='bx bx-trash'></i>
                    </div>
                    <div class="col-md-4 col-sm-4 col-4">
                        <p>Rp 300.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="justify-content-between d-flex">
                    <h3>Total</h3>
                    <h4>Rp 300.000</h4>
                </div>
                <div class="justify-content-end d-flex">
                    <button class="btn btn-dark mt-2">Beli</button>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- no cart -->
<!-- <div class="text-center">
    <img src="/assets/img/nocart.png" width="180" alt="">
    <h3 class="text-muted my-3">Keranjangmu masih kosong.</h3>
    <a href="/produk" class="btn btn-dark">Belanja</a>
</div> -->
<!--  -->