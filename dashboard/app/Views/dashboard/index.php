<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="row">
  <div class="col-md-3 col-6 mb-3">
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?= $totalGuests ?></h3>
        <p>Total Tamu</p>
      </div>
      <div class="icon"><i class="fas fa-users"></i></div>
    </div>
  </div>
  <div class="col-md-3 col-6 mb-3">
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?= $totalSent ?></h3>
        <p>Undangan Terkirim</p>
      </div>
      <div class="icon"><i class="fas fa-paper-plane"></i></div>
    </div>
  </div>
  <div class="col-md-3 col-6 mb-3">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?= $totalOpened ?></h3>
        <p>Undangan Dibuka</p>
      </div>
      <div class="icon"><i class="fas fa-envelope-open"></i></div>
    </div>
  </div>
  <div class="col-md-3 col-6 mb-3">
    <div class="small-box bg-primary">
      <div class="inner">
        <h3><?= $totalRSVP ?></h3>
        <p>Total RSVP</p>
      </div>
      <div class="icon"><i class="fas fa-clipboard-check"></i></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-3 col-6 mb-3">
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?= $totalRSVPYes ?></h3>
        <p>RSVP Hadir</p>
      </div>
      <div class="icon"><i class="fas fa-check"></i></div>
    </div>
  </div>
  <div class="col-md-3 col-6 mb-3">
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?= $totalRSVPNo ?></h3>
        <p>RSVP Tidak Hadir</p>
      </div>
      <div class="icon"><i class="fas fa-times"></i></div>
    </div>
  </div>
  <div class="col-md-3 col-6 mb-3">
    <div class="small-box bg-secondary">
      <div class="inner">
        <h3><?= $totalRSVPMaybe ?></h3>
        <p>RSVP Mungkin</p>
      </div>
      <div class="icon"><i class="fas fa-question"></i></div>
    </div>
  </div>
  <div class="col-md-3 col-6 mb-3">
    <div class="small-box bg-light">
      <div class="inner">
        <h3><?= $totalRSVPPending ?></h3>
        <p>RSVP Pending</p>
      </div>
      <div class="icon"><i class="fas fa-clock"></i></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-3 col-6 mb-3">
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?= $totalRsvpMessages ?></h3>
        <p>Pesan RSVP</p>
      </div>
      <div class="icon"><i class="fas fa-comments"></i></div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
