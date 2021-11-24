<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('content') ?>
<?php 
    if(count($stok) > 1){
        $lowestPrice = $stok[0]['harga'];
        $highestPrice = $lowestPrice;
        for($i=1; $i <= count($stok) - 1; $i++){
            if($stok[$i]['harga'] <= $lowestPrice){
                $lowestPrice = $stok[$i]['harga'];
            }
            if($stok[$i]['harga'] >= $highestPrice){
                $highestPrice = $stok[$i]['harga'];
            }
        }
    }else{
        $lowestPrice = $stok[0]['harga'];
    }
?>
<section class="section-pages">
    <div class="pages-wrapper">
    <a href="/produk" class="text-decoration-none text-dark"><i class="fas fa-chevron-left"></i> Kembali ke halaman produk</a>
    <div class="card mt-3">
       <div class="card-body py-5 pe-5">
       <div class="row">
            <div class="col-md-5 text-center mb-3">
                <img src="<?= base_url('assets/img/produk/'.$data_produk['gambar']) ?>" alt="" width="400" class="rounded img-thumbnail border-0">
            </div>
            <div class="col-md-7">
                <h3><?= $data_produk['nama_produk'] ?></h3>
                <hr>
                <p><strong>Kategori</strong> : <?= $data_produk['nama_kategori'] ?></p>
                <!-- <p><strong>Stok</strong> : 69 </p> -->
                <h5><?= format_rupiah($lowestPrice)?><?= isset($highestPrice) ? $lowestPrice != $highestPrice ? ' - '.format_angka($highestPrice) : '' : '' ?></h5>
                <p class="mt-5"><Strong>Deskripsi</Strong> : </p>
                <p class="text-justify"><?= $data_produk['deskripsi'] ?></p>
                
                <div class="row">
                    <div class="col-12">
                        <div class="row mb-3">
                            <div class="col-md-9 col-lg-6 col-sm-6 col-6">
                                <select class="form-select" id="ukuran" aria-label="Default select example">
                                    <?php 
                                        $stokS = 0; foreach($stok as $s) {
                                            $cartMsg = isset($s['in_cart']) ? $s['in_cart'] ? "[Dalam Keranjang]" : "" : "";
                                            if($s['stok'] != 0){
                                                echo "<option value=\"".$s['ukuran']."\" data-ukuran=\"".$s['ukuran']."\">".$s['ukuran'].", Stok : ".$s['stok']." | ".format_rupiah($s['harga'])." ".$cartMsg."</option>";
                                                $stokS += $s['stok'];
                                            }else{
                                                echo "<option value=\"".$s['ukuran']."\" data-ukuran=\"".$s['ukuran']."\" disabled=\"\">".$s['ukuran'].", Stok : ".$s['stok']." | ".format_rupiah($s['harga'])." ".$cartMsg."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-3 col-3">
                                <input type="number" id="quantity" class="form-control text-center" value="1" min="1">
                            </div>
                        </div>
                        <div class="row">
                            <?php if($stokS > 0) { ?>
                                <div class="col-md-6">
                                    <button class="btn btn-dark" id="tambahKeranjang" data-idBarang="<?= $data_produk['url_slug'] ?>"><i class='bx bxs-cart-add'></i> Keranjang</button>
                                </div>
                            <?php } else { ?>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-outline-dark" disabled=""><i class='bx bxs-cart-add'></i> Stok Habis</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
       </div>
       </div>
   </div>
    </div>
</section>

<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Berhasil di tambahkan ke keranjang</h5>
        <button type="button" class="btn-close" aria-label="Close" onclick="location.reload();"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/produk/'.$data_produk['gambar']) ?>" class="rounded img-thumbnail border-0">
            </div>
            <div class="col-md-8">
                <h3><?= $data_produk['nama_produk'] ?></h3>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="location.reload();">Tutup</button>
        <a href="<?= base_url('keranjang') ?>" class="btn btn-dark">Keranjang</a>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    const cart = document.querySelector('.cart');
    $('#tambahKeranjang').on('click', function(){
        let id_barang = $(this).attr('data-idBarang');
        let qty = $('#quantity').val();
        let size = $('#ukuran').val();
        $.post('<?= base_url('tambah-keranjang') ?>', {
            idBarang: id_barang, 
            quantity: qty,
            ukuran: size
        }, function(data){
            console.log(data);
            if(data == "need_login"){
                window.location.href = '<?= base_url('login-member') ?>';
            }else if(data == "400"){
                alert(data);
            }else if(data == "0000"){
                alert("Barang tidak ditemukan!");
            }else if(data == "4004"){
                alert("Kuantitas barang yang ingin dibeli melebihi stok, mohon dikurangi sesuai stok yang tersedia.");
            }else if(data == "4005"){
                alert("Kamu sudah menambahkan barang ini ke dalam keranjang.");
            }else{
                let cartTotal = Number(<?= session()->has('cartList') ? count(session()->get('cartList')) : 0 ?>);
                newCartTotal = cartTotal + Number(qty)
                cart.setAttribute('data-totalitems', newCartTotal);
                $('#cartModal').modal('show');
            }
        });
    })
    
</script>
<?= $this->endSection() ?>
 