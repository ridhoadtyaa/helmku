<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('styles') ?>
<style>
    .detail {
        margin-top: 150px;
        padding-bottom: 100px;
    }

    .form-select:focus {
        border-color: #000;
        box-shadow: inset 0 1px 1px #000, 0 0 8px #000;
    }

    @media screen and (max-width: 576px) {
        .detail {
            margin-top: 50px;
        }
    }

    @media screen and (max-width: 992px) {
        .detail {
            margin-top: 50px;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="detail">
    <div class="container">
    <div class="card">
       <div class="card-body py-5 pe-5">
       <div class="row">
            <div class="col-md-5 text-center mb-3">
                <img src="/assets/img/produk/helm1.png" alt="" width="400" class="rounded img-thumbnail border-0">
            </div>
            <div class="col-md-7">
                <h3>Bogo Retro</h3>
                <hr>
                <p><strong>Kategori</strong> : Bogo </p>
                <p><strong>Stok</strong> : 69 </p>
                <h5>Rp 300.000</h5>
                <p class="mt-5"><Strong>Deskripsi</Strong> : </p>
                <p style="text-align: justify;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit corporis, at rem beatae voluptates cumque nihil eaque quas tenetur eos blanditiis ullam, error expedita earum in quisquam id aliquid ad cum repudiandae necessitatibus! Sunt, similique voluptas necessitatibus cupiditate minus, quam eligendi ratione rerum iure commodi dignissimos tenetur distinctio repudiandae ea a id numquam corporis totam possimus dolore nihil? Quisquam officia ratione quae rerum delectus tempore accusamus, aspernatur in culpa id tenetur eligendi ducimus voluptatum. Aliquid, alias modi error vitae accusantium delectus ex aperiam sequi, quibusdam dolores ipsam quaerat a quos doloribus, atque harum autem ea praesentium nam beatae ipsum earum iste doloremque! Quam ratione<br>mollitia consequuntur cum obcaecati? Suscipit sed excepturi quae, ullam possimus nulla impedit voluptatem laboriosam fugiat magnam ipsam tempora? Aperiam, exercitationem fuga quisquam pariatur explicabo cupiditate ducimus iste facere laudantium cum sequi consequatur consequuntur eum cumque dolores et minima officiis, voluptate tenetur! Reprehenderit consequatur accusamus molestiae.</p>
                
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
