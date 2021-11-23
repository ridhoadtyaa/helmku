<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1>Data Pelanggan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Pelanggan</div>
    </div>
    </div>

    <?= $this->include('templates/dashboard/partials/alert') ?>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
            <table id="tabel-pelanggan" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Handphone</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($pelanggan as $p) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $p['nama'] ?></td>
                        <td><?= $p['email'] ?></td>
                        <td><?= $p['no_hp'] ?? '-' ?></td>
                        <td>
                            <a href="/dashboard/data-pelanggan/edit/<?= $p['users_id'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>  <!-- tambahin /id -->
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $p['users_id'] ?>"><i class="fas fa-trash-alt"></i></button> 
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tfoot>
            </table>
            </div>
        </div>
    </div>
</section>

<!-- delete Modal -->
<?php foreach($pelanggan as $p) : ?>
<div class="modal fade" id="deleteModal<?= $p['users_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form action="/dashboard/data-pelanggan/<?= $p['users_id'] ?>" method="post"> 
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Ya</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $(document).ready(function() {
        $('#tabel-pelanggan').DataTable();
    } );
</script>
<?= $this->endSection() ?>