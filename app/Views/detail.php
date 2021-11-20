<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('content') ?>
<section class="section-pages">
    <div class="pages-wrapper">
    <div class="card">
       <div class="card-body py-5 pe-5">
       <div class="row">
            <div class="col-md-5 text-center mb-3">
                <img src="<?= base_url('assets/img/produk/'.$data_produk['gambar']) ?>" alt="" width="400" class="rounded img-thumbnail border-0">
            </div>
            <div class="col-md-7">
                <h3><?= $data_produk['nama_produk'] ?></h3>
                <hr>
                <p><strong>Kategori</strong> : <?= $data_produk['nama_kategori'] ?></p>
                <p><strong>Stok</strong> : 69 </p>
                <h5>Rp 300.000</h5>
                <p class="mt-5"><Strong>Deskripsi</Strong> : </p>
                <p class="text-justify"><?= $data_produk['deskripsi'] ?></p>
                
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                                <select class="form-select" aria-label="Default select example">
                                    <option value="M">M, Stok : 4</option>
                                    <option value="L">L, Stok : 5</option>
                                    <option value="XL">XL, Stok : 5</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-dark" onclick="addCart()"><i class='bx bxs-cart-add'></i> Keranjang</button>
                            </div>
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <img src="/assets/img/produk/helm1.png" class="rounded img-thumbnail border-0">
            </div>
            <div class="col-md-8">
                <h3>Bogo Retro</h3>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-dark">Keranjang</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
const cart = document.querySelector('.cart');

const addCart = () => {
    let cartTotal = Number(cart.dataset.totalitems);
    newCartTotal = cartTotal + 1
    cart.setAttribute('data-totalitems', newCartTotal);
    $('#cartModal').modal('show');
}
</script>
<?= $this->endSection() ?>
