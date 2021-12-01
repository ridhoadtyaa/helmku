<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="/assets/css/pages/auth-member.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section-pages">
    <div class="pages-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
            <?= $this->include('templates/dashboard/partials/alert') ?>
            </div>
        </div>
        <h3 class="text-center title">Registrasi Member</h3>
        <p class="text-center">Buat akun untuk melihat dan melacak pesanan anda.</p>
        <form action="<?= base_url('register-member-post') ?>" method="post">
            <?= csrf_field() ?>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-md-8">
                    <div class="form__group field position-relative">
                        <input type="text" class="form__field <?= $validation->hasError('nama') ? 'is-invalid' : '' ?>" placeholder="Nama" name="nama" id='nama'/>
                        <label for="nama" class="form__label">Nama</label>
                        <div class="invalid-feedback pt-1">
                            <?= $validation->getError('nama') ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form__group field position-relative">
                        <input type="email" class="form__field <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" placeholder="Email" name="email" id='email'/>
                        <label for="email" class="form__label">Email</label>
                        <div class="invalid-feedback pt-1">
                            <?= $validation->getError('email') ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form__group field position-relative">
                        <input type="password" class="form__field <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" placeholder="Password" name="password" id='password'/>
                        <label for="password" class="form__label">Password</label>
                        <div class="invalid-feedback pt-1">
                            <?= $validation->getError('password') ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <button class="btn btn-dark d-block mt-4 " type="submit">DAFTAR</button>
                    <p class="text-center mt-3 text-muted">Sudah mempunyai akun ? <a href="<?= base_url('login-member') ?>" class="text-decoration-none text-dark">Login</a></p>
                </div>
            </div>
        </form>  
    </div>
</section>
<?= $this->endSection() ?>