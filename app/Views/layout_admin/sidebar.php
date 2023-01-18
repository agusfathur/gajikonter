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
        <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
         <i class="fa-solid fa-gauge-high"></i>
          <span class="menu-collapsed">Dashboard</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa-solid fa-database"></i>
          <span>Master Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('admin/data-karyawan') ?>">Data Karyawan</a>
            <a class="collapse-item" href="<?= base_url('admin/data-divisi') ?>">Data Divisi</a>
            <a class="collapse-item" href="<?= base_url('admin/rekap-absen') ?>">Rekap Absensi</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fa-solid fa-credit-card"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('admin/gaji-perhari') ?>">Gaji Perhari</a>
            <a class="collapse-item" href="<?= base_url('admin/potong-gaji') ?>">Potongan Gaji</a>
            <a class="collapse-item" href="<?= base_url('admin/pinjaman') ?>">Pinjaman Gaji</a>
            <a class="collapse-item" href="<?= base_url('admin/data-gaji') ?>">Data Gaji</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa-solid fa-copy"></i>
          <span>Laporan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('admin/laporan-gaji') ?>">Laporan Gaji</a>
            <a class="collapse-item" href="<?= base_url('admin/laporan-absensi') ?>">Laporan Absensi</a>
            <a class="collapse-item" href="<?= base_url('admin/slip-gaji') ?>">Slip Gaji</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/ubah-password') ?>">
          <i class="fa-solid fa-lock"></i>
          <span>Ubah Password</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('login/logout')?>">
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

          <h4 class="font-weight-bold mt-2 "><?= $title; ?></h4>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <h5 class="font-weight-bold mt-4 text-gray">Konter Niam Cell </h5>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#">
                <span class="mr-2 d-none d-lg-inline text-gray-600 medium"><?= $karyawan['nama_karyawan']; ?></span>
                 <img class="img-profile rounded-circle" src="<?= base_url('img/'.$karyawan['foto']); ?>">
              </a>
              
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->