<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="/assets/css/pages/produk.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section-pages">
    <div class="pages-wrapper">
        <div class="row">
            <h4 class="my-3">Produk HELMKU</h4>
            <div class="col-md-4">
                <select class="form-select kategori d-inline">
                    <option selected>Semua kategori</option>
                    <option value="1">Bogo</option>
                    <option value="2">Sport</option>
                </select>
            </div>
        </div>
        <div class="row text-center justify-content-center">
            <?php foreach($data_produk as $pd) : ?>
            <div class="col-md-4 col-6">
                <div class="card border-0">
                    <div class="card-body">
                        <a href="<?= base_url('detail/'.$pd['data_produk']['url_slug']) ?>"><img src="<?= base_url('assets/img/produk/'.$pd['data_produk']['gambar']) ?>" class="img-thumbnail border-0 helm-img"></a>
                        <p><?= $pd['data_produk']['nama'] ?></p>
                        <p class="price"><?= format_rupiah($pd['data_stok'][0]['harga']) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?= $pager->links('produk_pagers', 'produk_pagers') ?>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<?= $this->endSection() ?>
