<?php 
define("BASEPATH", dirname(__FILE__));
include("../config.php");
session_start();

if (!isset($_SESSION['login'])) {
  echo "<script>alert('Silakan login terlebih dahulu');window.location='../admin';</script>";
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/vendor/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
         <img src="../assets/img/logo.txt" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-Voting</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../assets/img/avatar.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $_SESSION['nama']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="admin.php" <?php if ($page == 'DS') { echo "class='nav-link active'"; }else{ echo "class='nav-link'"; } ?>>
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="managepetugas.php" <?php if ($page == 'MP') { echo "class='nav-link active'"; }else{ echo "class='nav-link'"; } ?>>
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Manajemen Petugas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="siswa.php" <?php if ($page == 'MS') { echo "class='nav-link active'"; }else{ echo "class='nav-link'"; } ?>>
              <i class="nav-icon fas fa-user"></i>
              <p>
                Manajemen Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kandidat.php" <?php if ($page == 'MK') { echo "class='nav-link active'"; }else{ echo "class='nav-link'"; } ?>>
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Manajemen Kandidat
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
