<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1>Daftar Produk</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Produk</div>
    </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
            <table id="tabel-produk" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1241-1411-4512-2000</td>
                        <td>Bogo Retro</td>
                        <td>12</td>
                        <td>Rp 200.000</td>
                        <td><button class="btn btn-primary"><i class="fas fa-sticky-note"></i></button></td>
                        <td><button class="btn btn-primary"><i class="fas fa-image"></i></button></td>
                        <td>
                            <button class="btn btn-success">Edit</button>
                            <button class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1241-1411-4512-2452</td>
                        <td>Bogo Retro</td>
                        <td>12</td>
                        <td>Rp 200.000</td>
                        <td><button class="btn btn-primary"><i class="fas fa-sticky-note"></i></button></td>
                        <td><button class="btn btn-primary"><i class="fas fa-image"></i></button></td>
                        <td>
                            <button class="btn btn-success">Edit</button>
                            <button class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1241-1411-4512-2452</td>
                        <td>Bogo Retro</td>
                        <td>12</td>
                        <td>Rp 200.000</td>
                        <td><button class="btn btn-primary"><i class="fas fa-sticky-note"></i></button></td>
                        <td><button class="btn btn-primary"><i class="fas fa-image"></i></button></td>
                        <td>
                            <button class="btn btn-success">Edit</button>
                            <button class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $(document).ready(function() {
        $('#tabel-produk').DataTable();
    } );
</script>
<?= $this->endSection() ?>