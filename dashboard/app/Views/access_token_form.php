<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="card col-md-6 mx-auto mt-5">
  <div class="card-body">
    <h5 class="mb-3">Masukkan Token Akses</h5>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session('error') ?></div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('access-token/submit') ?>">
      <?= csrf_field() ?>
      <div class="form-group">
        <input type="text" name="token" class="form-control" placeholder="Masukkan token" required>
      </div>
      <button class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<?= $this->endSection() ?>
