<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1>Laporan Penjualan <?= date('F Y') ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Laporan Penjualan</div>
    </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-3">
        <div class="input-group date" id="datepicker">
                <input type="text" class="form-control" name="tglLaporan" id="tglLaporan" autocomplete="off" data-date-end-date="0d" placeholder="Pilih tanggal laporan">
                <span class="input-group-append">
                    <span class="input-group-text bg-white d-block">
                        <i class="fas fa-calendar"></i>
                    </span>
                </span>
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
            <table id="tabel-laporan" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Terjual</th>
                        <th>Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1242-4424-5244-4252</td>
                        <td>Bogo Retro</td>
                        <td>3</td>
                        <td>Rp 600.000</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1242-4424-5244-4252</td>
                        <td>Bogo Supra</td>
                        <td>3</td>
                        <td>Rp 600.000</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>1242-4424-5244-4252</td>
                        <td>GM</td>
                        <td>3</td>
                        <td>Rp 600.000</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center">Total</td>
                        <td class="d-none"></td>
                        <td class="d-none"></td>
                        <td>9</td>
                        <td>Rp 1.800.000</td>
                    </tr>
                </tfoot>
            </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabel-laporan').DataTable();
    } );

    $(function() {
        $('#datepicker').datepicker({
            format: "mm-yyyy",
            startView: "months", 
            minViewMode: "months"
        });
    })
</script>
<?= $this->endSection() ?>