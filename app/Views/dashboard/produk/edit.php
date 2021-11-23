<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('styles') ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
    .foto-now {
        position: relative;
        left: 16px;
    }

    @media screen and (max-width: 992px) {
        .foto-now {
            position: static;
        }
    }

    @media screen and (max-width: 576px) {
        .foto-now {
            position: static;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1><?= $title ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="/dashboard/produk">Produk</a></div>
        <div class="breadcrumb-item"><?= $title ?></div>
    </div>
    </div>

    <?= $this->include('templates/dashboard/partials/alert') ?>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('dashboard/produk/edit/save') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id" value="<?= $data_produk['id'] ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama produk" value="<?= $data_produk['nama'] ?>" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select name="kategori" class="form-control" required="">
                                        <?php if(!$kategori) : ?>
                                            <option>Harap tambah Kategori dahulu!</option>
                                        <?php endif; ?>
                                        <?php 
                                            if($kategori) : 
                                                foreach($kategori as $kat) :
                                                    if($kat['id_kategori'] == $data_produk['kategori']){
                                        ?>
                                                        <option value="<?= $kat['id_kategori'] ?>" selected><?= $kat['nama'] ?></option>
                                        <?php
                                                    } else {
                                        ?>
                                                        <option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama'] ?></option>
                                        <?php   
                                                    }
                                                endforeach;
                                            endif;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="summernote-simple" name="deskripsi" id="deskripsi" required=""><?= $data_produk['deskripsi'] ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg">
                                    <div class="form-group">
                                        <label for="foto" class="col-form-label">Foto Sekarang :</label>
                                        <div class="float-right py-2 mb-4 foto-now">
                                            <img src="<?= base_url('assets/img/produk') ?>/<?= $data_produk['gambar'] ?>" width="250px" height="250px" class="img-fluid img-thumbnail">
                                            <!-- <div class="invalid-feedback">
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg mb-2">
                                    <div class="form-group">
                                        <label for="foto" class="col-form-label">Update Foto : </label>
                                        <div class="float-right py-2">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Pilih Foto</label>
                                                <input type="file" name="foto" id="image-upload" />
                                            </div>
                                            <!-- <div class="invalid-feedback">
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php $i = 0; foreach($stok as $s) : 
                                if(count($stok) - 1 != $i){    
                            ?>
                                <div class="form-group row">
                                    <input type="hidden" name="variasi[<?= $i ?>][id]" value="<?= $s['id'] ?>">
                                    <label for="namavariasi" class="col-sm-4 col-form-label">Variasi Produk</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="variasi[<?= $i ?>][nama]" class="form-control" id="namavariasi" placeholder="XL" value="<?= $s['ukuran'] ?>" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stok" class="col-sm-4 col-form-label">Harga Variasi Produk</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="variasi[<?= $i ?>][harga]" class="form-control" id="stok" placeholder="400000" value="<?= $s['harga'] ?>" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stok" class="col-sm-4 col-form-label">Stok Variasi Produk</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="variasi[<?= $i ?>][stok]" class="form-control" id="stok" placeholder="10" value="<?= $s['stok'] ?>" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stok" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                    <a href="<?= base_url('dashboard/produk/hapus-variasi/'.$s['id'].'/'.$data_produk['id']) ?>" class="btn btn-outline-danger float-right"><i class="fas fa-trash"></i> Hapus Variasi</a>
                                    </div>
                                </div>
                                <hr>
                            <?php 
                                } else {
                            ?>
                                <div class="form-group row">
                                    <input type="hidden" name="variasi[<?= $i ?>][id]" value="<?= $s['id'] ?>">
                                    <label for="namavariasi" class="col-sm-4 col-form-label">Variasi Produk</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="variasi[<?= $i ?>][nama]" class="form-control" id="namavariasi" placeholder="XL" value="<?= $s['ukuran'] ?>" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stok" class="col-sm-4 col-form-label">Harga Variasi Produk</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="variasi[<?= $i ?>][harga]" class="form-control" id="stok" placeholder="400000" value="<?= $s['harga'] ?>" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stok" class="col-sm-4 col-form-label">Stok Variasi Produk</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="variasi[<?= $i ?>][stok]" class="form-control" id="stok" placeholder="10" value="<?= $s['stok'] ?>" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stok" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <a href="<?= base_url('dashboard/produk/hapus-variasi/'.$s['id'].'/'.$data_produk['id']) ?>" class="btn btn-outline-danger float-right"><i class="fas fa-trash"></i> Hapus Variasi</a>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php $i++; endforeach ?>
                            <tambah></tambah>
                            <div class="form-group row">
                                <button type="button" class="col-sm-6 offset-sm-3 btn btn-outline-primary" onclick="tambahVariasi();"><i class="fas fa-plus"></i> Tambah Variasi</button>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary form-control mt-3" type="submit"><i class="fas fa-sync"></i> Update Produk </button>
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
    let jmlVariasiNow = <?= $i ?>;
    function tambahVariasi()
    {
        if(jmlVariasiNow > 4){
            alert("Maksimal variasi yang dapat ditambahkan adalah 5!")
        }else{
            $('tambah').append(`
            <div id="form${jmlVariasiNow}">
                <hr>
                <div class="form-group row">
                    <label for="namavariasi" class="col-sm-4 col-form-label">Variasi Produk</label>
                    <div class="col-sm-8">
                        <input type="text" name="variasi[${jmlVariasiNow}][nama]" class="form-control" id="namavariasi" placeholder="XL" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok" class="col-sm-4 col-form-label">Harga Variasi Produk</label>
                    <div class="col-sm-8">
                        <input type="number" name="variasi[${jmlVariasiNow}][harga]" class="form-control" id="stok" placeholder="400000" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok" class="col-sm-4 col-form-label">Stok Variasi Produk</label>
                    <div class="col-sm-8">
                        <input type="number" name="variasi[${jmlVariasiNow}][stok]" class="form-control" id="stok" placeholder="10" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok" class="col-sm-4 col-form-label"></label>
                    <div class="col-sm-8">
                    <button type="button" onclick="deleteKlik($(this).data('id'));" class="btn btn-outline-danger float-right" data-id="${jmlVariasiNow}"><i class="fas fa-trash"></i> Hapus Variasi</button>
                    </div>
                </div>
            </div>
            `);
            jmlVariasiNow += 1;
        }
    }

    function deleteKlik(clickedId)
    {
        $('#form'+clickedId.toString()).remove();
        jmlVariasiNow -= 1;
    }

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
