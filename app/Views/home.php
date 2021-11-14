<?= $this->extend('templates/main/main-template') ?>
<?= $this->section('content') ?>
<div class="container mb-5">
    <div id="carouselExampleControls" class="carousel slide mt-3" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/img/carousel/1.png') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/img/carousel/2.png') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/img/carousel/3.png') ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <h5 class="title py-1">Flash Sale!!!</h5>
            <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <img src="<?= base_url('assets/img/produk/helm2.png') ?>"  class="card-img-top" alt="...">
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">KYT</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="card-text text-decoration-line-through">200.000</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="card-text">100.000</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="py-1">
                                        <a href="#" class="btn btn-primary btn-sm form-control py-2"><i class="fas fa-cart-plus"></i> Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <img src="<?= base_url('assets/img/produk/helm2.png') ?>"  class="card-img-top" alt="...">
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">KYT</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="card-text text-decoration-line-through">200.000</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="card-text">100.000</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="py-1">
                                        <a href="#" class="btn btn-primary btn-sm form-control py-2"><i class="fas fa-cart-plus"></i> Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <img src="<?= base_url('assets/img/produk/helm2.png') ?>"  class="card-img-top" alt="...">
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">KYT</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="card-text text-decoration-line-through">200.000</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="card-text">100.000</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="py-1">
                                        <a href="#" class="btn btn-primary btn-sm form-control py-2"><i class="fas fa-cart-plus"></i> Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <img src="<?= base_url('assets/img/produk/helm2.png') ?>"  class="card-img-top" alt="...">
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">KYT</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="card-text text-decoration-line-through">200.000</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="card-text">100.000</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="py-1">
                                        <a href="#" class="btn btn-primary btn-sm form-control py-2"><i class="fas fa-cart-plus"></i> Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="title py-1">Produk</h5>
                </div>
                <div class="col-md-6">
                    <form class="d-flex">
                        <input id="form_search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success btn" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <img src="<?= base_url('assets/img/produk/helm2.png') ?>"  class="card-img-top" alt="...">
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">KYT</h5>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text py-1">200.000</p>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-primary btn-sm form-control"><i class="fas fa-cart-plus"></i> Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <img src="<?= base_url('assets/img/produk/helm2.png') ?>"  class="card-img-top" alt="...">
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">Cakil</h5>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text py-1">100.000</p>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-primary btn-sm form-control"><i class="fas fa-cart-plus"></i> Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <img src="<?= base_url('assets/img/produk/helm2.png') ?>"  class="card-img-top" alt="...">
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">Cakil</h5>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text py-1">100.000</p>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-primary btn-sm form-control"><i class="fas fa-cart-plus"></i> Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <img src="<?= base_url('assets/img/produk/helm2.png') ?>"  class="card-img-top" alt="...">
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">Cakil</h5>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text py-1">100.000</p>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-primary btn-sm form-control"><i class="fas fa-cart-plus"></i> Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <img src="<?= base_url('assets/img/produk/helm2.png') ?>"  class="card-img-top" alt="...">
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">Cakil</h5>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text py-1">100.000</p>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-primary btn-sm form-control"><i class="fas fa-cart-plus"></i> Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <img src="<?= base_url('assets/img/produk/helm2.png') ?>"  class="card-img-top" alt="...">
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">Cakil</h5>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text py-1">100.000</p>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-primary btn-sm form-control"><i class="fas fa-cart-plus"></i> Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end mt-3">
            <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script type="text/javascript">
    let myCarousel = document.querySelector('#myCarousel')
    let carousel = new bootstrap.Carousel(myCarousel)
    $(document).ready(function(){
        const keyword = ['Helm cakil', 'Kyt', 'dj maru'];
        let form_search = $('#form_search');
        setInterval(function(){
            let random = Math.floor(Math.random() * keyword.length);
            form_search.attr("placeholder", (keyword[random]).toString()); 
        }, 2000);
    });
</script>
<?= $this->endSection() ?>