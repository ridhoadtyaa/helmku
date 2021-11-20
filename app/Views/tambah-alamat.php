<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('content') ?>
<section class="section-pages">
    <div class="pages-wrapper">
        <h4 class="mb-5 fw-bold">Tambah Alamat</h4>
        <form action="" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="namaPenerima" class="form-label">Nama Penerima</label>
                    <input type="text" class="form-control" id="namaPenerima" name="namaPenerima">
                </div>
                <div class="mb-3">
                    <label for="noHp" class="form-label">Nomor HP</label>
                    <input type="number" class="form-control" id="noHp" name="noHp">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kota" class="form-label">Kota</label>
                            <input type="text" class="form-control" id="kota" name="kota">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                    <textarea class="form-control" id="alamatLengkap" name="alamatLengkap" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="kodepos" class="form-label">Kode Pos</label>
                    <input type="number" class="form-control" id="kodepos" name="kodepos">
                </div>
            </div>
            <button class="btn btn-dark mt-3">Tambah</button>
        </div>
        </form>
    </div>
</section>
<?= $this->endSection() ?>