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
    <div class="section-body">
        <div class="card">
            <div class="card-body">
            <table id="tabel-produk" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach($data_kategori as $kat) : ?>
                    <tr>
                        <td><?= $kat['nama'] ?></td>
                        <td>
                            <a href="<?= base_url('dashboard/kategori/edit-kategori/'.$kat['id_kategori']) ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>  
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                </tfoot>
            </table>
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
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat nam perferendis sint? Quo animi a magnam architecto corporis sunt nisi qui ut, incidunt ea unde rerum aut necessitatibus consequatur explicabo voluptatum optio. Obcaecati veniam, praesentium laboriosam porro quod culpa veritatis doloribus pariatur nobis harum quaerat eligendi ea beatae, fuga placeat aut commodi eius quasi in tenetur iusto. Ea labore tempora vero accusantium exercitationem optio possimus saepe doloribus quasi, nulla, consequuntur, quaerat ducimus quo porro maiores quia deserunt corporis? Qui amet libero vitae temporibus quasi aspernatur. Perspiciatis voluptatibus delectus maxime tempora, quas ea, quaerat placeat veritatis corrupti, pariatur reiciendis distinctio fuga?</p>
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
        <img src="/assets/img/produk/helm.png">
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
        <form action="/dashboard/produk/" method="post">  <!-- Tambahin /id -->
            <input type="hidden" name="_method" value="DELETE">
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
    } );
</script>
<?= $this->endSection() ?>