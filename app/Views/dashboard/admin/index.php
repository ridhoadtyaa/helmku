<?= $this->extend('templates/dashboard/dashboard-template') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
    <h1>Daftar Admin</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Admin</div>
    </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
            <table id="tabel-admin" class="table table-striped table-bordered" style="width:100%">
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
                    <!-- yang login lg login gausah -->
                    <tr>
                        <td>1</td>
                        <td>Dede Inoen</td>
                        <td>dede@gmail.com</td>
                        <td>0841245125</td>
                        <td>
                            <a href="/dashboard/admin/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>  <!-- tambahin /id -->
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></button> 
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Dede Inoen</td>
                        <td>dede@gmail.com</td>
                        <td>0841245125</td>
                        <td>
                            <a href="/dashboard/admin/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>  <!-- tambahin /id -->
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Dede Inoen</td>
                        <td>dede@gmail.com</td>
                        <td>0841245125</td>
                        <td>
                            <a href="/dashboard/admin/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>  <!-- tambahin /id -->
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tfoot>
            </table>
            </div>
        </div>
    </div>
</section>

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
        <form action="/dashboard/admin/" method="post">  <!-- Tambahin /id -->
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
        $('#tabel-admin').DataTable();
    } );
</script>
<?= $this->endSection() ?>