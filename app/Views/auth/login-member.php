<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('content') ?>
<section class="section-pages">
    <div class="pages-wrapper">
    <?= $this->include('templates/dashboard/partials/alert') ?>
        <div class="card">
            <div class="card-body py-5 pe-5">
                <div class="row">
                    <div class="col-md-5 text-center mb-3">
                        <img src="<?= base_url('assets/img/logo/login.png') ?>" alt="" width="300" height="300" class="rounded img-thumbnail border-0">
                    </div>
                    <div class="col-md-7">
                        <div class="py-4">
                            <form method="POST" action="">
                                <h3 class="card-title">Login Member</h3>
                                <?= csrf_field() ?>
                                <div class="form-group py-1">
                                    <label>Email :</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label>Password :</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group mt-2">
                                    <p class="text-muted">
                                        Belum punya akun? <a href="<?= base_url('register-member') ?>">Daftar</a>
                                    </p>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" name="submit" class="btn btn-dark"><i class="bx bxs-log-in"></i> Login</button>
                                </div>
                            </form>
                        </div>
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
    $('#cartModal').modal('show');
}
</script>
<?= $this->endSection() ?>
