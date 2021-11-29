<?= $this->extend('templates/dashboard/dashboard-template') ?>
<?php helper('rupiah') ?>
<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
   <!-- datatables css -->
<link rel="stylesheet" href="https://evote.ijel.me/assets/DataTables/DataTables/css/dataTables.bootstrap4.min.css">

<!-- select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1>Laporan Penjualan <?= $header ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Laporan Penjualan</div>
    </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-3 mb-3">
            <form action="" method="get">
                <div class="input-group date" id="datepicker">
                    <input type="text" class="form-control" name="tglLaporan" id="tglLaporan" autocomplete="off" data-date-end-date="0d" placeholder="Pilih tanggal laporan">
                    <span class="input-group-append">
                        <span class="input-group-text bg-white d-block">
                            <i class="fas fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body overflow-auto">
            <table id="tabel-laporan" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Tangggal Transaksi</th>
                        <th>No. Pesanan</th>
                        <th>Produk</th>
                        <th>Variasi</th>
                        <th>Terjual</th>
                        <th>Jumlah Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($laporan_penjualan) > 0) { ?>
                        <?php $totalTerjual = 0; $totalHarga = 0; ?>
                        <?php foreach($laporan_penjualan as $lp) : ?>
                        <tr>
                            <td><?= date('d F Y H:i:s', strtotime($lp['created_at'])) ?></td>
                            <td><?= $lp['kode_trx'] ?></td>
                            <td><?= $lp['nama_produk'] ?></td>
                            <td><?= $lp['variasi'] ?></td>
                            <td><?= $lp['kuantitas'] ?></td>
                            <td><?= format_rupiah($lp['harga']) ?></td>
                        </tr>
                        <?php 
                        $totalTerjual += $lp['kuantitas'];
                        $totalHarga += $lp['harga'];
                        ?>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4" class="text-center">Total</td>
                            <td class="d-none"></td>
                            <td class="d-none"></td>
                            <td class="d-none"></td>
                            <td><?= $totalTerjual ?></td>
                            <td><?= format_rupiah($totalHarga) ?></td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td colspan="6" class="text-center">
                                <div class="alert alert-danger" role="alert">
                                    Data laporan penjualan pada <strong><?= $header ?></strong> tidak ada.
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tfoot>
            </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabel-laporan').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    } );

    $(function() {
        $('#datepicker').datepicker({
            format: "mm-yyyy",
            startView: "months", 
            minViewMode: "months"
        }).on('changeDate', () => {
            const tglLaporan = $('#tglLaporan').val().split('-').reverse().join('-');
            window.open('<?= base_url('dashboard/laporan-penjualan?tglLaporan=') ?>' + tglLaporan, '_self');
        });
    })
</script>
<?= $this->endSection() ?>