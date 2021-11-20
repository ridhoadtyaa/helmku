<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('styles') ?>
<style>
    .alamat {
        margin-top: 150px;
        padding-bottom: 100px;
    }

    .alamat-wrapper {
        width: 74%;
    }

    @media screen and (max-width: 576px) {
        .alamat {
            margin-top: 50px;
        }
    }

    @media screen and (max-width: 992px) {
        .alamat {
            margin-top: 50px;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="alamat d-flex justify-content-center">
    <div class="alamat-wrapper">
        <h4 class="mb-5 fw-bold">Ubah Alamat</h4>
        <form action="" method="post">
            <div class="mb-3">
                <label for="namaPenerima" class="form-label">Nama Penerima</label>
                <input type="text" class="form-control" id="namaPenerima" name="namaPenerima">
            </div>
            <div class="mb-3">
                <label for="noHp" class="form-label">Nomor HP</label>
                <input type="number" class="form-control" id="noHp" name="noHp">
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota">
            </div>
            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan">
            </div>
            <div class="mb-3">
                <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                <textarea class="form-control" id="alamatLengkap" name="alamatLengkap" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="kodepos" class="form-label">Kode Pos</label>
                <input type="number" class="form-control" id="kodepos" name="kodepos">
            </div>
            <button class="btn btn-dark mt-3">Simpan</button>
        </form>
    </div>
</section>
<?= $this->endSection() ?>