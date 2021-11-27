<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('styles') ?>
<style>
    .wait, .pay, .send, .done {
        cursor: pointer;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1 wait">
            <div class="card-icon bg-primary">
                <i class="far fa-bookmark"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Menunggu Pembayaran</h4>
                </div>
                <div class="card-body">
                <?= $count['menunggu'] ?>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1 pay">
            <div class="card-icon bg-danger">
                <i class="far fa-credit-card"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Sudah Membayar</h4>
                </div>
                <div class="card-body">
                    <?= $count['sudah_membayar'] ?>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1 send">
            <div class="card-icon bg-warning">
                <i class="far fa-paper-plane"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Sedang dikirim</h4>
                </div>
                <div class="card-body">
                <?= $count['sedang_dikirim'] ?>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1 done">
            <div class="card-icon bg-success">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Transaksi Selesai</h4>
                </div>
                <div class="card-body">
                <?= $count['selesai'] ?>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
            <div class="card">
            <div class="card-header">
                <h4>Statistik Laporan Penjualan <?= date('Y') ?></h4>
                <div class="card-header-action">
                </div>
            </div>
            <div class="card-body">
                <canvas id="myChart" height="182"></canvas>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
            <div class="card-header">
                <h4>Recent Orders</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    <?php $rnd = [1,2,3,4]; foreach($recent_orders as $order): ?>
                    <li class="media">
                        <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-<?= $rnd[array_rand($rnd)] ?>.png" alt="avatar">
                        <div class="media-body">
                            <div class="float-right text-primary"><?= date('d/m/Y H:i:s', strtotime($order['tgl_pesan'])) ?></div>
                            <div class="media-title"><?= $order['nama'] ?></div>
                            <span class="text-small text-muted">Kode TRX : <?= $order['kode_trx'] ?></span>
                        </div>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    <?php
        $arrBulan = "["; $arrCount = "[";
        foreach($trx_selesai as $key => $val){
            $arrBulan .= "'".$key."', ";
            $arrCount .= "'".$val."', ";
        }
        $arrBulan .= "]"; $arrCount .= "]";
    ?>

    const wait = document.querySelector('.wait');
    const pay = document.querySelector('.pay');
    const send = document.querySelector('.send');
    const done = document.querySelector('.done');

    wait.addEventListener('click', () => {
        window.location = '<?= base_url('dashboard/data-transaksi/belum-membayar') ?>';
    });

    pay.addEventListener('click', () => {
        window.location = '<?= base_url('dashboard/data-transaksi/sudah-membayar') ?>';
    });

    send.addEventListener('click', () => {
        window.location = '<?= base_url('dashboard/data-transaksi/dikirim') ?>';
    });

    done.addEventListener('click', () => {
        window.location = '<?= base_url('dashboard/data-transaksi/selesai') ?>';
    });

    const statistics_chart = document.getElementById("myChart").getContext('2d');
    const myChart = new Chart(statistics_chart, {
    type: 'line',
    data: {
        labels: <?= $arrBulan ?>,
        datasets: [{
        label: 'Penjualan',
        data: <?= $arrCount ?>,
        borderWidth: 5,
        borderColor: '#6777ef',
        backgroundColor: 'transparent',
        pointBackgroundColor: '#fff',
        pointBorderColor: '#6777ef',
        pointRadius: 7
        }]
    },
    options: {
        legend: {
        display: false
        },
        scales: {
        yAxes: [{
            gridLines: {
            display: false,
            drawBorder: false,
            },
            ticks: {
            stepSize: 150
            }
        }],
        xAxes: [{
            gridLines: {
            color: '#fbfbfb',
            lineWidth: 2
            }
        }]
        },
    }
    });

</script>
<?= $this->endSection() ?>

