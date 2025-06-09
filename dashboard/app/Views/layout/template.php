<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> &bullet; Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('favicon.ico') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('favicon.ico') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('favicon.ico') ?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

  <?= $this->renderSection('styles') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake rounded-circle shadow" src="<?= base_url('logo.png'); ?>" alt="Logo" height="460" width="460" style="object-fit:cover;">
</div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            New guest added <span class="float-right text-muted text-sm">2 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url() ?>" class="brand-link">
      <img src="<?= base_url('favicon.ico'); ?>" alt="Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">My Wedding</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/images/bajuadat-indahgery-03.jpg') ?>" class="rounded elevation-2" alt="User">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= session('username') ?? 'Indah & Gery' ?></a>
        </div>
      </div>

    <nav class="mt-2">
      <?php $uri = service('uri'); ?>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
        <li class="nav-item">
            <a href="<?= site_url('invited-guests') ?>" 
            class="nav-link <?= $uri->getSegment(1) == 'invited-guests' && $uri->getSegment(2) == '' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>Daftar Tamu</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('invited-guests/create') ?>" 
            class="nav-link <?= $uri->getSegment(1) == 'invited-guests' && $uri->getSegment(2) == 'create' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-user-plus"></i>
            <p>Tambah Tamu</p>
            </a>
        </li>
        <?php if (session('access_granted')): ?>
            <li class="nav-item mt-3">
              <hr class="mb-2 mt-0" style="border-top: 1px solid #4f5962;">
              <a href="<?= site_url('access-token/logout') ?>" class="nav-link text-danger">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
            </li>
        <?php endif; ?>
      </ul>
    </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h1><?= esc($title) ?></h1>
          </div> -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?= $this->renderSection('breadcrumb') ?>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <?php if(session()->getFlashdata('success')): ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
      </div>
    </section>
  </div>

  <footer class="main-footer">
    <strong>&copy; <?= date('Y') ?> <a href="<?= base_url() ?>">My Wedding</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline">Version 1.0.0</div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<?= $this->renderSection('scripts') ?>
</body>
</html>