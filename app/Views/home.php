<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="/assets/css/pages/home.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="hero"></div>
<section class="featured-products d-flex align-items-center flex-column">
    <h2 class="text-center text-uppercase">Produk Unggulan</h2>
    <div class="card-wrapper justify-content-center">
        <div class="card border-0 text-center">
            <div class="card-body">
                <a href="/detail"><img class="card-img mb-2" src="/assets/img/produk/helm1.png"></a>
                <div class="card-title">Full Face Black</div>
                <div class="card-price d-inline">Rp 350.000</div>
                <button class="card-button d-inline bg-white text-uppercase" onclick="addCart()">Beli</button>
            </div>
        </div>
        <div class="card border-0 text-center">
            <div class="card-body">
                <a href="/detail"><img class="card-img mb-2" src="/assets/img/produk/helm2.png"></a>
                <div class="card-title">Full Face Black</div>
                <div class="card-price d-inline">Rp 350.000</div>
                <button class="card-button d-inline bg-white text-uppercase" onclick="addCart()">Beli</button>
            </div>
        </div>
    </div>

    <div class="card-wrapper justify-content-center">
        <div class="card border-0 text-center">
            <div class="card-body">
                <a href="/detail"><img class="card-img mb-2" src="/assets/img/produk/helm3.png"></a>
                <div class="card-title">Full Face Black</div>
                <div class="card-price d-inline">Rp 350.000</div>
                <button class="card-button d-inline bg-white text-uppercase" onclick="addCart()">Beli</button>
            </div>
        </div>
        <div class="card border-0 text-center">
            <div class="card-body">
                <a href="/detail"><img class="card-img mb-2" src="/assets/img/produk/helm4.png"></a>
                <div class="card-title">Full Face Black</div>
                <div class="card-price d-inline">Rp 350.000</div>
                <button class="card-button d-inline bg-white text-uppercase" onclick="addCart()">Beli</button>
            </div>
        </div>
    </div>
</section>

<section class="helm">
    <div class="helm-wrapper d-flex">
        <img class="helm-img mb-2 align-self-center" src="/assets/img/hero2.png">
        <div class="helm-text position-relative">
            <h2 class="helm-header">Ambil kontrol untuk memilih helm yang anda sukai.</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, ipsa a tempora molestias doloremque quae veniam consectetur alias corrupti iure eum, assumenda ducimus eligendi unde officia impedit, perferendis praesentium laboriosam voluptas. Enim eligendi porro ratione esse rerum, eum reprehenderit dicta architecto facilis, totam, dolor ducimus!</p>
            <div class="helm-extra-text">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo sapiente, in, excepturi facere repellat earum distinctio exercitationem vitae aut quam autem possimus quo, veniam a esse magnam facilis cupiditate? Molestias, maiores veniam aliquam illum optio, alias repudiandae laudantium quae earum repellendus eligendi explicabo nobis nihil.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident natus maiores excepturi voluptatum et corporis, eius delectus itaque ab, dolor totam error amet. Earum ullam sed, officia enim, dolorem quas nostrum vitae, odio accusamus debitis aspernatur?</p>
            </div>
            <p class="helm-read-more">Baca selengkapnya...</p>
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
                <img src="/assets/img/produk/helm1.png" alt="" class="rounded img-thumbnail border-0">
            </div>
            <div class="col-md-8">
                <h3>Bogo Retro</h3>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary">Keranjang</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
const readMore = () => {
    const readMore = document.querySelector(".helm-read-more");
    const extraText = document.getElementsByClassName("helm-extra-text")[0];

    readMore.addEventListener("click", () => {
        if (extraText.style.display === "") {
            readMore.textContent = "Baca sedikit..."
            extraText.style.display = "block";
        } else {
            extraText.style.display = "";
            readMore.textContent = "Baca selengkapnya..."
        }
    });
}

const cart = document.querySelector('.cart');

const addCart = () => {
    let cartTotal = Number(cart.dataset.totalitems);
    newCartTotal = cartTotal + 1
    cart.setAttribute('data-totalitems', newCartTotal);
    $('#cartModal').modal('show');
}

readMore();
</script>
<?= $this->endSection() ?>