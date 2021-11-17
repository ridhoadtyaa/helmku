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
            </div>
        </div>
        <div class="card border-0 text-center">
            <div class="card-body">
                <a href="/detail"><img class="card-img mb-2" src="/assets/img/produk/helm2.png"></a>
                <div class="card-title">Full Face Black</div>
                <div class="card-price d-inline">Rp 350.000</div>
            </div>
        </div>
    </div>

    <div class="card-wrapper justify-content-center">
        <div class="card border-0 text-center">
            <div class="card-body">
                <a href="/detail"><img class="card-img mb-2" src="/assets/img/produk/helm3.png"></a>
                <div class="card-title">Full Face Black</div>
                <div class="card-price d-inline">Rp 350.000</div>
            </div>
        </div>
        <div class="card border-0 text-center">
            <div class="card-body">
                <a href="/detail"><img class="card-img mb-2" src="/assets/img/produk/helm4.png"></a>
                <div class="card-title">Full Face Black</div>
                <div class="card-price d-inline">Rp 350.000</div>
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

readMore();
</script>
<?= $this->endSection() ?>