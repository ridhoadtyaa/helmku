<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('styles') ?>
<style>
    .pages-wrapper .bx {
        font-size: 100px;
    }

    .pages-wrapper .card {
        transition: all .2s ease-in-out;
    }

    .pages-wrapper .card:hover {
        transform: scale(1.2);
        border: 2px solid #000;
        z-index: 999;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section-pages">
    <div class="pages-wrapper">
        <h3 class="fw-bold text-center">Kontak Kami</h3>
        <p class="text-center mb-5">Hubungi kami untuk segala pertanyaan Anda</p>
        <div class="row">
            <div class="col-md-4 mb-3">
                <a href="https://api.whatsapp.com/send/?phone=6282112614370&text&app_absent=0" class="text-dark">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bxl-whatsapp'></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="https://www.facebook.com/helmku" class="text-dark">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bxl-facebook-circle'></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
               <a href="https://instagram.com/helmku" class="text-dark">
                <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bxl-instagram' ></i>
                        </div>
                    </div>
               </a>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>