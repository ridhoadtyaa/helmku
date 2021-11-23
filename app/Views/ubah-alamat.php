<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('content') ?>
<section class="section-pages">
    <div class="pages-wrapper">
        <?= $this->include('templates/dashboard/partials/alert') ?>
        <h4 class="mb-5 fw-bold">Ubah Alamat</h4>
        <form action="<?= base_url('ubah-alamat') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="namaPenerima" class="form-label">Nama Penerima</label>
                        <input type="text" class="form-control" id="namaPenerima" name="namaPenerima" value="<?= $user_data['nama'] ?>" required="">
                    </div>
                    <div class="mb-3">
                        <label for="noHp" class="form-label">Nomor HP</label>
                        <input type="number" class="form-control" id="noHp" name="noHp" placeholder="Ex: 08969999999" value="<?= $user_data['no_hp'] ?>" required="">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kota" class="form-label">Kota</label>
                                <input type="text" class="form-control" id="kota" name="kota" placeholder="Ex: Tangerang" value="<?= $user_data['kota'] ?>" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Ex: Cipondoh" value="<?= $user_data['kecamatan'] ?>" required="">
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Ex: Petir" value="<?= $user_data['kelurahan'] ?>" required="">
                    </div>
                    <div class="mb-3">
                        <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" id="alamatLengkap" name="alamatLengkap" rows="3" placeholder="Format: Nama Jalan, No. Rumah, RT/RW, Kelurahan, Kecamatan, Kota, Kode Pos" required=""><?= $user_data['alamat_jalan'] ?></textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-dark mt-3 form-control"><i class='bx bxs-edit-alt'></i> Ubah</button>
        </form>
    </div>
</section>
<?= $this->endSection() ?>