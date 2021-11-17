<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="/assets/css/selectric.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1>Tambah Admin</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="/dashboard/admin">Admin</a></div>
        <div class="breadcrumb-item">Tambah Admin</div>
    </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                Data admin berhasil di tambahkan
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="/dashboard/admin" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_telp" class="col-sm-2 col-form-label">No. Handphone</label>
                        <div class="col-sm-10">
                            <input type="number" name="no_telp" id="no_telp" placeholder="Masukkan no handphone" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/js/jquery.selectric.min.js"></script>
<script>
    $("select").selectric();
</script>
<?= $this->endSection() ?>