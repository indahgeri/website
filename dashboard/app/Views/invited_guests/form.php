<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><?= esc($title) ?></h3>
  </div>
  <form action="<?= isset($guest) ? base_url("invited-guests/update/{$guest['id']}") : base_url('invited-guests/store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="card-body">
      <!-- Nama -->
      <div class="form-group">
        <label for="name">Nama</label>
        <div class="input-group">
          <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
          <input type="text" name="name" id="name"
            class="form-control <?= session('errors.name') ? 'is-invalid':'' ?>"
            value="<?= old('name', $guest['name'] ?? '') ?>">
          <div class="invalid-feedback"><?= session('errors.name') ?></div>
        </div>
      </div>

      <!-- Phone -->
      <div class="form-group">
        <label for="phone">No. HP</label>
        <div class="input-group">
          <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
          <input type="text" name="phone" id="phone"
            class="form-control <?= session('errors.phone') ? 'is-invalid':'' ?>"
            value="<?= old('phone', $guest['phone'] ?? '') ?>">
          <div class="invalid-feedback"><?= session('errors.phone') ?></div>
        </div>
      </div>

    <!-- Detail -->
    <div class="form-group">
      <label for="detail">Detail</label>
      <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-info-circle"></i></span></div>
        <input type="text" name="detail" id="detail"
        class="form-control <?= session('errors.detail') ? 'is-invalid':'' ?>"
        value="<?= old('detail', $guest['detail'] ?? '') ?>">
        <div class="invalid-feedback"><?= session('errors.detail') ?></div>
      </div>
    </div>

      <!-- Checkbox -->
      <div class="form-group">
        <div class="icheck-primary d-inline mr-3">
          <input type="checkbox" id="is_sent" name="is_sent" <?= old('is_sent', $guest['is_sent'] ?? 0) ? 'checked':'' ?>>
          <label for="is_sent">Sudah Dikirim</label>
        </div>
        <div class="icheck-success d-inline">
          <input type="checkbox" id="is_opened" name="is_opened" <?= old('is_opened', $guest['is_opened'] ?? 0) ? 'checked':'' ?>>
          <label for="is_opened">Sudah Dibuka</label>
        </div>
      </div>

      <!-- RSVP -->
      <div class="form-group">
        <label for="rsvp_status">Status RSVP</label>
        <select name="rsvp_status" id="rsvp_status"
                class="form-control select2 <?= session('errors.rsvp_status') ? 'is-invalid':'' ?>">
          <?php foreach (['pending', 'yes', 'no', 'maybe'] as $status): ?>
            <option value="<?= $status ?>" <?= old('rsvp_status', $guest['rsvp_status'] ?? '') === $status ? 'selected':'' ?>>
              <?= ucfirst($status) ?>
            </option>
          <?php endforeach ?>
        </select>
        <div class="invalid-feedback"><?= session('errors.rsvp_status') ?></div>
      </div>
    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> <?= isset($guest) ? 'Update' : 'Simpan' ?>
      </button>
      <a href="<?= base_url('invited-guests') ?>" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<!-- Select2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function () {
    $('.select2').select2({
      width: '100%',
      placeholder: "Pilih status RSVP"
    });
  });
</script>
<?= $this->endSection() ?>
