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
                        <th>Tanggal Pembayaran</th>
                        <th>Nama</th>
                        <th>Detail Pesanan</th>
                        <th>Bukti Transfer</th>
                        <th>Input Resi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($transaksi as $t) : ?>
                      <tr>
                        <td>#<b><?= $t['kode_trx'] ?></b></td>
                        <td><?= date('d F Y H:i:s', strtotime($t['tgl_pesan'])) ?></td>
                        <td><?= date('d F Y H:i:s', strtotime($t['tgl_pembayaran'])) ?></td>
                        <td><?= $t['nama'] ?></td>
                        <td><button class="btnBag btn btn-primary" data-alamat="<?= $t['alamat_pengiriman'] ?>" data-items="<?= base64_encode(json_encode($t['items'])) ?>"><i class="fas fa-shopping-bag"></i></i></button></td>
                        <td><button class="btnBukti btn btn-primary" data-gambar="<?= $t['bukti_bayar'] ?>"><i class="fas fa-image"></i></button></td>
                        <td>
                            <button class="btnShip btn btn-success" data-kodetrx="<?= $t['kode_trx'] ?>" title="Resi"><i class="fas fa-shipping-fast"></i></button>
                        </td>
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

<!-- resi Modal -->
<div class="modal fade" id="resiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Resi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formActionResi" method="POST">
        <?= csrf_field() ?>
        <div class="modal-body text-center">
          <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="kurir">Kurir</label>
                  <input type="text" class="form-control" name="kurir" id="kurir" placeholder="JNE" required>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label for="resi">No. Resi</label>
                  <input type="text" class="form-control" name="resi" id="resi" placeholder="JNE9329131023" required>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Input</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $(document).ready(function() {
        $('#tabel-transaksi').DataTable({
          "order": [[1, 'desc']]
        });
        $('.btnBukti').on('click', function(){
          $('#buktiBayarSrc').attr("src", "<?= base_url('assets/img/bukti-bayar') ?>/" + $(this).data('gambar'));
          $('#buktiModal').modal('show');
        });
        $('.btnShip').on('click', function(){
          $('#formActionResi').attr("action", "<?= base_url('dashboard/data-transaksi/shipSave') ?>/" + $(this).data('kodetrx'));
          $('#resiModal').modal('show');
        });
        $('.btnBag').on('click', function(){
          $('#dataPesanan').empty();
          $('#alamatJalan').empty();
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
          $('#keranjangModal').modal('show');
        });
    } );
</script>
<?= $this->endSection() ?>