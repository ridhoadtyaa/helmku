<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="/assets/css/pages/produk.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section-pages">
    <div class="pages-wrapper">
        <h4 class="mb-4 fw-bold">Produk HELMKU</h4>
        <div class="row d-flex justify-content-between">
            <div class="col-md-6 col-sm-6 col-lg-4 mb-3">
                <select class="form-select kategori d-inline" id="kategoriS">
                    <option selected disabled>Pilih Kategori</option>
                    <option value="">Semua kategori</option>
                    <?php foreach($kategori as $k) : ?>
                    <option value="<?= $k ?>"><?= $k ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-4">
               <form action="">
                <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari produk" name="keyword">
                        <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
                    </div>
               </form>
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
        <?= isset($pager) ? $pager->links('produk_pagers', 'produk_pagers') : '' ?>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    const kategori = document.querySelector('.kategori');
    kategori.addEventListener('change', e => {
        window.location = '<?= base_url('produk?kategori=') ?>' + e.target.value
    });
    $(document).ready(function(){
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const kategori = (urlParams.get('kategori'));
        if(kategori != "" && kategori != null){
            $('#kategoriS').val(kategori);
        }else{
            $('#kategoriS').val(kategori);
        }
    });
</script>
<?= $this->endSection() ?>
