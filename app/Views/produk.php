<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="/assets/css/pages/produk.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="produk">
    <div class="container">
        <div class="row mb-3">
            <div class="d-flex justify-content-between">
                <h4>⚡ FLASH SALE</h4>
                <div class="timewarp rounded text-white pt-3 pb-1 px-3">
                    <h4 id="flashTime">00:00:00</h4>
                </div>
            </div>
            <div class="row text-center justify-content-center">
                <div class="col-md-4 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <a href="/detail"><img src="/assets/img/produk/helm1.png" class="img-thumbnail border-0 helm-img"></a>
                            <p>Black Bogo</p>
                            <p class="price"><s>Rp 300.000</s> Rp 250.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <a href="/detail"><img src="/assets/img/produk/helm1.png" class="img-thumbnail border-0 helm-img"></a>
                            <p>Black Bogo</p>
                            <p class="price"><s>Rp 300.000</s> Rp 250.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <a href="/detail"><img src="/assets/img/produk/helm1.png" class="img-thumbnail border-0 helm-img"></a>
                            <p>Black Bogo</p>
                            <p class="price"><s>Rp 300.000</s> Rp 250.000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h4 class="my-3">Produk HELMKU</h4>
            <div class="col-md-4">
                <select class="form-select kategori d-inline">
                    <option selected>Semua kategori</option>
                    <option value="1">Bogo</option>
                    <option value="2">Sport</option>
                </select>
            </div>
        </div>
        <div class="row text-center justify-content-center">
            <div class="col-md-4 col-6">
                <div class="card border-0">
                    <div class="card-body">
                        <a href="/detail"><img src="/assets/img/produk/helm1.png" class="img-thumbnail border-0 helm-img"></a>
                        <p>Black Bogo</p>
                        <p class="price">Rp 300.000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="card border-0">
                    <div class="card-body">
                        <a href="/detail"><img src="/assets/img/produk/helm1.png" class="img-thumbnail border-0 helm-img"></a>
                        <p>Black Bogo</p>
                        <p class="price">Rp 300.000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="card border-0">
                    <div class="card-body">
                        <a href="/detail"><img src="/assets/img/produk/helm1.png" class="img-thumbnail border-0 helm-img"></a>
                        <p>Black Bogo</p>
                        <p class="price">Rp 300.000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="card border-0">
                    <div class="card-body">
                        <a href="/detail"><img src="/assets/img/produk/helm1.png" class="img-thumbnail border-0 helm-img"></a>
                        <p>Black Bogo</p>
                        <p class="price">Rp 300.000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="card border-0">
                    <div class="card-body">
                        <a href="/detail"><img src="/assets/img/produk/helm1.png" class="img-thumbnail border-0 helm-img"></a>
                        <p>Black Bogo</p>
                        <p class="price">Rp 300.000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="card border-0">
                    <div class="card-body">
                        <a href="/detail"><img src="/assets/img/produk/helm1.png" class="img-thumbnail border-0 helm-img"></a>
                        <p>Black Bogo</p>
                        <p class="price">Rp 300.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
// Set the date we're counting down to
const countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();

// Update the count down every 1 second
const x = setInterval(function() {

  // Get today's date and time
  const now = new Date().getTime();
    
  // Find the distance between now and the count down date
  const distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("flashTime").innerHTML = `${hours} : ${minutes} : ${seconds}`;
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("flashTime").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<?= $this->endSection() ?>
