<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1>Ubah Password</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Ubah Password</div>
    </div>
    </div>

    <?= $this->include('templates/dashboard/partials/alert') ?>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="/dashboard/admin/ubah-password" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label for="oldPassword" class="col-sm-2 col-form-label">Password lama</label>
                        <div class="col-sm-10">
                            <input type="password" name="oldPassword" class="form-control" id="oldPassword" placeholder="Masukkan password lama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="newPassword" class="col-sm-2 col-form-label">Password baru</label>
                        <div class="col-sm-10">
                            <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="Masukkan password baru">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="confPassword" class="col-sm-2 col-form-label">Konfirmasi password baru</label>
                        <div class="col-sm-10">
                            <input type="password" name="confPassword" class="form-control" id="confPassword" placeholder="Konfirmasi password baru">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
