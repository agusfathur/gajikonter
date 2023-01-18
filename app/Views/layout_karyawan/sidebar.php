<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3"> Penggajian </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('karyawan/dashboard') ?>">
          <i class="fa-solid fa-gauge-high"></i>
          <span>Dashboard</span></a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('karyawan/data-gaji/') ?>">
          <i class="fa-solid fa-credit-card"></i>
          <span>Data Gaji</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('karyawan/ubah-password') ?>">
          <i class="fa-solid fa-lock"></i>
          <span>Ubah Password</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout');?>">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          <span>Logout</span></a>
      </li>


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <h4 class="font-weight-bold mt-2 "><?= $title; ?></h4>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <h5 class="font-weight-bold mt-4 text-gray">Konter Niam Cell </h5>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $karyawan['nama_karyawan']; ?> &nbsp;</span>
                <img class="img-profile rounded-circle" src="<?= base_url('img/'.$karyawan['foto']); ?>">
              </a>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->