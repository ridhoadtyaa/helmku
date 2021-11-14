<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('styles') ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1>?= $title ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="/dashboard/produk"><?= $title ?></a></div>
        <div class="breadcrumb-item"><?= $title ?></div>
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
                            <textarea class="summernote-simple" name="deskripsi" id="deskripsi"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Pilih Foto</label>
                                <input type="file" name="foto" id="image-upload" />
                            </div>
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

<?= $this->section('javascript') ?>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="/assets/js/jquery.uploadPreview.min.js"></script>
<script>
$.uploadPreview({
  input_field: "#image-upload",   // Default: .image-upload
  preview_box: "#image-preview",  // Default: .image-preview
  label_field: "#image-label",    // Default: .image-label
  label_default: "Pilih Foto",   // Default: Choose File
  label_selected: "Ganti Foto",  // Default: Change File
  no_label: false,                // Default: false
  success_callback: null          // Default: null
});
</script>
<?= $this->endSection() ?>
