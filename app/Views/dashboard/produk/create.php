<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1>Tambah Produk</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="/dashboard/produk">Produk</a></div>
        <div class="breadcrumb-item">Tambah Produk</div>
    </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                Produk berhasil ditambahkan
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="/dashboard/produk" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-10">
                            <input type="email" name="nama" class="form-control" id="nama" placeholder="Masukkan nama produk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok Produk</label>
                        <div class="col-sm-10">
                            <input type="number" name="stok" class="form-control" id="stok" placeholder="Masukkan stok produk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga Produk</label>
                        <div class="col-sm-10">
                            <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan harga produk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi produk" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="foto" id="foto">
                            <!-- <div class="invalid-feedback">
                            </div> -->
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
