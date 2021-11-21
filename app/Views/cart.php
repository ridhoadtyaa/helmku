<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('styles') ?>
<style>
    .keranjang .card img {
        width: 100px;
    }

    .produkOrder {
        overflow-y: scroll;
        <?= $cartCount > 2 ? "height: 400px;" : "height: 200px;"; ?>
    }

    .produkSold {
        overflow-y: scroll;
        <?= $cartCountSold > 2 ? "height: 400px;" : "height: 200px;"; ?>
    }

    /* .produkOrder::-webkit-scrollbar {
        background-color: white;
    }

    .produkOrder::-webkit-scrollbar-thumb {
        background-color: #000;
        border-radius: 20px;
        border: 3px solid white;
    } */
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section-pages keranjang">
    <div class="pages-wrapper">
        <!-- no cart -->
        <!-- <div class="text-center">
            <img src="/assets/img/nocart.png" width="180" alt="">
            <h3 class="text-muted my-3">Keranjangmu masih kosong.</h3>
            <a href="/produk" class="btn btn-dark">Belanja</a>
        </div> -->
        <!--  -->
        <div class="row">
            <div class="col-md-6 mb-3 y">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <h4 class="cart-title px-3 mt-3"><i class="bx bxs-cart"></i> Daftar Item</h4>
                            <div class="card-body produkOrder">
                                <?php 
                                    foreach($cartList as $key => $val): 
                                        foreach($val as $v):
                                ?>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-3">
                                        <img src="<?= base_url('assets/img/produk/'.$v['gambar']) ?>" class="img-thumbnail rounded border-0">
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-5">
                                        <p><?= $v['nama_barang'] ?></p>
                                        <p>Variasi : <?= $v['ukuran'] ?></p>
                                        <i class='bx bx-trash'></i>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-4">
                                        <p>x<?= $v['qty'] ?></p>
                                        <p><?= format_rupiah($v['harga']*$v['qty']) ?></p>
                                    </div>
                                </div>
                                <hr>
                                <?php endforeach; endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <h4 class="cart-title px-3 mt-3"><i class="bx bxs-x-circle"></i> Produk Habis</h4>
                            <div class="card-body produkSold">
                                <?php 
                                    foreach($cartList_sold as $key => $val): 
                                        foreach($val as $v):
                                ?>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-3">
                                        <img src="<?= base_url('assets/img/produk/'.$v['gambar']) ?>" class="img-thumbnail rounded border-0">
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-5">
                                        <p><?= $v['nama_barang'] ?> x<?= $v['qty'] ?></p>
                                        <p><?= $v['ukuran'] ?></p>
                                        <i class='bx bx-trash'></i>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-4">
                                        <p>Rp 300.000</p>
                                    </div>
                                </div>
                                <hr>
                                <?php endforeach; endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="justify-content-between d-flex">
                            <h3># Total</h3>
                            <h4>Rp 300.000</h4>
                        </div>
                        <div class="justify-content-end d-flex">
                            <button class="btn btn-dark mt-2">Beli</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<!-- Kalo ada barang  -->
<div class="row">
    <div class="col-md-6 mb-3">
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
</div>

<!-- no cart -->
<!-- <div class="text-center">
    <img src="/assets/img/nocart.png" width="180" alt="">
    <h3 class="text-muted my-3">Keranjangmu masih kosong.</h3>
    <a href="/produk" class="btn btn-dark">Belanja</a>
</div> -->
<!--  -->