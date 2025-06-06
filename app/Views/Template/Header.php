<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title; ?></title>
  <base href="<?php echo base_url('assets') ?>/">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- My css -->
  <link rel="stylesheet" href="css/adminstyle.css">
</head>
<style>
  th,
  td {
    height: 60px;
    vertical-align: middle;
  }
</style>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-dark cust-nav">
      <!-- Left navbar links -->
      <ul class="navbar-nav" style="width: 90%; display: flex; position: relative; align-items: center;">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/admin" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
        <li class="nav-item" style="display: flex; align-items: center; position: absolute; right: 0;">
          <a href="/logout" class="fst-italic"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 cust-sidenav">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold" style="color: #1b325b;">Puskesmas Karimun</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block" style="color: #1b325b;"><?= session()->get('username') ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active" style="color: #fff; background-color: #ef444d;">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item list-cust">
                  <a href="/admin/dokter" class="nav-link">
                    <i class="fas fa-solid fa-user-md" style="color: #1b325b; margin-right: 0.5rem; margin-left: 0.3rem;"></i>
                    <p class="nav-text">Data Dokter</p>
                  </a>
                </li>

                <li class="nav-item list-cust">
                  <a href="/admin/suster" class="nav-link">
                    <i class="fas fa-solid fa-user-nurse" style="color: #1b325b; margin-right: 0.5rem; margin-left: 0.3rem;"></i>
                    <p class="nav-text">Data Suster</p>
                  </a>
                </li>

                <li class="nav-item list-cust">
                  <a href="/admin/pasien" class="nav-link">
                    <i class="fas fa-solid fa-user-injured" style="color: #1b325b; margin-right: 0.5rem; margin-left: 0.3rem;"></i>
                    <p class="nav-text">Data Pasien</p>
                  </a>
                </li>

                <li class="nav-item list-cust">
                  <a href="/admin/kamar" class="nav-link">
                    <i class="fas fa-solid fa-hospital" style="color: #1b325b; margin-right: 0.5rem; margin-left: 0.3rem;"></i>
                    <p class="nav-text">Data Kamar</p>
                  </a>
                </li>

                <li class="nav-item list-cust">
                  <a href="/admin/obat" class="nav-link">
                    <i class="fas fa-solid fa-briefcase-medical" style="color: #1b325b; margin-right: 0.4rem; margin-left: 0.3rem;"></i>
                    <p class="nav-text">Data Obat</p>
                  </a>
                </li>

                <li class="nav-item list-cust">
                  <a href="/admin/laporan" class="nav-link">
                    <i class="fas fa-solid fa-book-medical" style="color: #1b325b; margin-right: 0.4rem; margin-left: 0.3rem;"></i>
                    <p class="nav-text">Data Laporan</p>
                  </a>
                </li>
              </ul>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>