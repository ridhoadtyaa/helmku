<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1><?= $title ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Produk</div>
    </div>
    </div>
    <?= $this->include('templates/dashboard/partials/alert') ?>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table id="tabel-produk" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Total Stok</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; $z = 0; $ukuran = ""; foreach($data_produk as $produk) : ?>
                        <?php 
                          foreach($produk['data_stok'] as $stok) {
                            if((count($produk['data_stok']) - 1) != $z){
                              $ukuran .= $stok['ukuran']."\t: ".$stok['stok']."</br>";
                            }else{
                              $ukuran .= $stok['ukuran']."\t: ".$stok['stok'];
                            }
                            $z++;
                          }
                        ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $produk['data_produk']['nama'] ?></td>
                            <td><?= $ukuran ?></td>
                            <td><button class="openDeskripsi btn btn-primary" data-toggle="modal" data-target="#deskripsiModal" data-deskripsi="<?= $produk['data_produk']['deskripsi'] ?>"><i class="fas fa-sticky-note"></i></button></td>
                            <td><button class="openGambar btn btn-primary" data-toggle="modal" data-target="#fotoModal" data-alamatgambar="<?= $produk['data_produk']['gambar'] ?>"><i class="fas fa-image"></i></button></td>
                            <td>
                                <a href="<?= base_url('dashboard/produk/edit/'.$produk['data_produk']['url_slug']) ?> " class="btn btn-success"><i class="fas fa-edit"></i></a>  <!-- tambahin /kodeproduk -->
                                <button class="deleteProduct btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="<?= $produk['data_produk']['id'] ?>"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                      <?php $ukuran = ""; endforeach; ?>
                    </tfoot>
                </table>
              </div>
            </div>
        </div>
    </div>
</section>

<!-- deskripsi Modal -->
<div class="modal fade" id="deskripsiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p id="textDeskripsi"></p>
      </div>
    </div>
  </div>
</div>

<!-- foto Modal -->
<div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img id="srcGambar" width="300px" height="300px" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<!-- delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Yakin ingin menghapusnya ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <form id="deleteForm" method="GET">  <!-- Tambahin /id -->
            <button type="submit" class="btn btn-danger">Ya</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $(document).ready(function() {
        $('#tabel-produk').DataTable();
        $('.openGambar').on("click", function(){
          $('#srcGambar').attr("src", "<?= base_url('assets/img/produk') ?>" + "/" + ($(this).data('alamatgambar')).toString());
        });
        $('.openDeskripsi').on("click", function(){
          $("#textDeskripsi").empty();
          $("#textDeskripsi").append($(this).data('deskripsi'));
        });
        $('.deleteProduct').on('click', function(){
          $('#deleteForm').attr("action", "<?= base_url('dashboard/produk/hapus-produk') ?>/" + ($(this).data('id')));
        })
    } );
</script>
<?= $this->endSection() ?>