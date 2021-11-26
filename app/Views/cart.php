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

    .produkOrder::-webkit-scrollbar {
        width: 12px;
    }
    .produkOrder::-webkit-scrollbar-track {
        background-color: white;
    }
    .produkOrder::-webkit-scrollbar-thumb {
        background-color: #000;
        border-radius: 20px;
        border: 3px solid white;
    } 
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section-pages keranjang">
    <div class="pages-wrapper">
        <?= $this->include('templates/dashboard/partials/alert') ?>
        <!-- no cart -->
        <?php if($cartCount < 1 and $cartCountSold < 1): ?>
        <div class="text-center">
            <img src="/assets/img/nocart.png" width="180" alt="">
            <h3 class="text-muted my-3">Keranjangmu masih kosong.</h3>
            <a href="/produk" class="btn btn-dark">Belanja</a>
        </div>
        <?php endif ?>
        <!--  -->
        <?php if ($cartCount > 0 or $cartCountSold > 0): ?>
        <div class="row">
            <div class="col-md-6 mb-3 y">
                <div class="row">
                    <?php if ($cartCount > 0) : ?>
                    <div class="col-md-12">
                        <div class="card">
                            <h4 class="cart-title px-3 mt-3"><i class="bx bxs-cart"></i> Daftar Item</h4>
                            <div class="card-body produkOrder">
                                <?php 
                                    $harga = 0; 
                                    foreach($cartList as $key => $val): 
                                        foreach($val as $v):
                                            $harga += $v['harga']*$v['qty'];
                                ?>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-3">
                                        <img src="<?= base_url('assets/img/produk/'.$v['gambar']) ?>" class="img-thumbnail rounded border-0">
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-5">
                                        <p><?= $v['nama_barang'] ?></p>
                                        <p>Variasi : <?= $v['ukuran'] ?></p>
                                        <i type="button" idBarang="<?= $key ?>" variasi="<?= $v['ukuran'] ?>" class='removeFromCart bx bx-trash'></i>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-4">
                                        <p>x<?= $v['qty'] ?></p>
                                        <p class="harga"><?= format_rupiah($v['harga']*$v['qty']) ?></p>
                                    </div>
                                </div>
                                <hr>
                                <?php endforeach; endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if ($cartCountSold > 0) : ?>
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
                    <?php endif ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="justify-content-between d-flex">
                            <h3># Total</h3>
                            <h4><?= format_rupiah($harga) ?></h4>
                        </div>
                        <div class="justify-content-end d-flex">
                            <form method="POST" action="<?= base_url('checkout') ?>">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-dark mt-2"><i class="bx bx-money"></i> Check Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<div class="modal fade" id="removeCart" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Berhasil menghapus barang dari keranjang</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $('.removeFromCart').on('click', function(){
        let idBarang = $(this).attr('idBarang');
        let variasi = $(this).attr('variasi');
        $.post('<?= base_url('remove-keranjang') ?>', {
            idBarang: idBarang,
            variasi: variasi
        }, function(data){
            if(data == "need_login"){
                window.location.href = '<?= base_url('login-member') ?>';
            }else if(data == "ok" || data == "okk"){
                $('#removeCart').modal('show');
                $("#removeCart").on('hide.bs.modal', () => {
                    window.location = '<?= base_url('keranjang') ?>'
                });
            }
        });
    })
</script>
<?= $this->endSection() ?>