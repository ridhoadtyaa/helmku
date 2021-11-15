<?= $this->extend('templates/main/main-template') ?>


<?= $this->section('content') ?>
<section class="detail mb-4" style="margin-top: 150px;">
    <div class="container">
    <div class="card">
       <div class="card-body">
       <div class="row">
            <div class="col-md-5">
                <img src="/assets/img/produk/helm1.png" alt="" width="400" class="rounded">
            </div>
            <div class="col-md-7">
                <h3>Bogo Retro</h3>
                <hr>
                <p><strong>Kategori</strong> : Bogo </p>
                <h5>Rp 300.000</h5>
                <p class="mt-5"><Strong>Deskripsi</Strong> : </p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit corporis, at rem beatae voluptates cumque nihil eaque quas tenetur eos blanditiis ullam, error expedita earum in quisquam id aliquid ad cum repudiandae necessitatibus! Sunt, similique voluptas necessitatibus cupiditate minus, quam eligendi ratione rerum iure commodi dignissimos tenetur distinctio repudiandae ea a id numquam corporis totam possimus dolore nihil? Quisquam officia ratione quae rerum delectus tempore accusamus, aspernatur in culpa id tenetur eligendi ducimus voluptatum. Aliquid, alias modi error vitae accusantium delectus ex aperiam sequi, quibusdam dolores ipsam quaerat a quos doloribus, atque harum autem ea praesentium nam beatae ipsum earum iste doloremque! Quam ratione<br>mollitia consequuntur cum obcaecati? Suscipit sed excepturi quae, ullam possimus nulla impedit voluptatem laboriosam fugiat magnam ipsam tempora? Aperiam, exercitationem fuga quisquam pariatur explicabo cupiditate ducimus iste facere laudantium cum sequi consequatur consequuntur eum cumque dolores et minima officiis, voluptate tenetur! Reprehenderit consequatur accusamus molestiae.</p>

                <button class="btn btn-dark" onclick="addCart()">Beli</button>
            </div>
       </div>
       </div>
   </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
const cart = document.querySelector('.cart');

const addCart = () => {
    let cartTotal = Number(cart.dataset.totalitems);
    newCartTotal = cartTotal + 1
    cart.setAttribute('data-totalitems', newCartTotal);
}
</script>
<?= $this->endSection() ?>
