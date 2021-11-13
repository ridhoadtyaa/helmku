<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1>Edit Produk</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="/dashboard/produk">Produk</a></div>
        <div class="breadcrumb-item">Edit Produk</div>
    </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                Produk berhasil di ubah
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
                            <input type="email" name="nama" class="form-control" id="nama" placeholder="Masukkan nama produk" value="Bogo retro">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok Produk</label>
                        <div class="col-sm-10">
                            <input type="number" name="stok" class="form-control" id="stok" placeholder="Masukkan stok produk" value="69">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga Produk</label>
                        <div class="col-sm-10">
                            <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan harga produk" value="2000000">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi produk" class="form-control">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, suscipit?</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="foto" id="foto" value="foto.jpg">
                            <!-- <div class="invalid-feedback">
                            </div> -->
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
