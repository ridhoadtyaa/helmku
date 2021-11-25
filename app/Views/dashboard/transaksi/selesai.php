<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1><?= $title ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><?= $title ?></div>
    </div>
    </div>

    <?= $this->include('templates/dashboard/partials/alert') ?>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
            <table id="tabel-transaksi" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No. Pesanan</th>
                        <th>Tanggal Order</th>
                        <th>Tanggal Selesai</th>
                        <th>Nama</th>
                        <th>Detail Pesanan</th>
                        <th>Bukti Transfer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($transaksi as $t) : ?>
                      <tr>
                        <td>#<b><?= $t['kode_trx'] ?></b></td>
                        <td><?= date('d F Y H:i:s', strtotime($t['tgl_pesan'])) ?></td>
                        <td><?= date('d F Y H:i:s', strtotime($t['tgl_pembayaran'])) ?></td>
                        <td><?= $t['nama'] ?></td>
                        <td><button class="btnBag btn btn-primary" data-alamat="<?= $t['alamat_pengiriman'] ?>" data-pengiriman="<?= $t['kurir'].' - '.$t['no_resi'] ?>" data-items="<?= base64_encode(json_encode($t['items'])) ?>"><i class="fas fa-shopping-bag"></i></i></button></td>
                        <td><button class="btnBukti btn btn-primary" data-gambar="<?= $t['bukti_bayar'] ?>"><i class="fas fa-image"></i></button></td>
                      </tr>
                    <?php endforeach; ?>
                </tfoot>
            </table>
            </div>
        </div>
    </div>
</section>

<!-- keranjang Modal -->
<div class="modal fade" id="keranjangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Alamat : </strong><j id="alamatJalan"></j></li>
        <li class="list-group-item"><strong>Pengiriman : </strong><j id="pengiriman"></j></li>
      </ul>
      <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Produk</th>
            <th scope="col">Variasi</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody id="dataPesanan">
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- bukti Modal -->
<div class="modal fade" id="buktiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img id="buktiBayarSrc" class="img-fluid">
      </div>
    </div>
  </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $(document).ready(function() {
        $('#tabel-transaksi').DataTable();
        $('.btnBukti').on('click', function(){
          $('#buktiBayarSrc').attr("src", "<?= base_url('assets/img/bukti-bayar') ?>/" + $(this).data('gambar'));
          $('#buktiModal').modal('show');
        });
        $('.btnBag').on('click', function(){
          $('#dataPesanan').empty();
          $('#alamatJalan').empty();
          $('#pengiriman').empty();
          let items = $.parseJSON(atob($(this).data('items')));
          let harga = 0; let jmlItem = 0;
          $.each(items, function(key, val){
            $('#dataPesanan').append(`
            <tr>
                <th scope="row"></th>
                <td>${val['nama_produk']}</td>
                <td>${val['variasi']}</td>
                <td>${val['kuantitas']}</td>
                <td>${val['harga']}</td>
            </tr>
            `);
            harga += Number(val['harga']);
            jmlItem += Number(val['kuantitas']);
          });
          $('#dataPesanan').append(`
            <tr>
                <td colspan="3" class="text-center">Total</td>
                <td>${jmlItem}</td>
                <td>Rp ${harga}</td>
            </tr>
          `);
          $('#alamatJalan').append($(this).data('alamat'));
          $('#pengiriman').append($(this).data('pengiriman'));
          $('#keranjangModal').modal('show');
        })
    } );
</script>
<?= $this->endSection() ?>