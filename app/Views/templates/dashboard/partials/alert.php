<?php if(isset($validation)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<?php if (session()->has('danger')) : ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('danger') ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->has('warning')) : ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('warning') ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->has('success')) : ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    </div>
<?php endif; ?>