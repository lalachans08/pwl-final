<?php 
    session_start();
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['Level']==""){
      header("location:../session/index.php?pesan=akses");
    }
    if($_SESSION['Level']=="Admin Peminjaman"){
      header("location:../Peminjaman/dashboard.php?pesan=akses");
    }
    if($_SESSION['Level']=="Anggota"){
      header("location:../Anggota/dashboard.php?pesan=akses");
    }
    include "../session/koneksi.php";
    include "../asset/tgl_indo.php";
?>
<html>
<head>

  <title>Perpustakaan</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <!-- <link href="../asset/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="../asset/bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom Icon -->
    <link rel="icon" type="image/png" href="../asset/card-2.jpg">
   
    <!-- Custom Icon -->
    <link rel="stylesheet" href="../asset/icon/css/all.min.css">
   
    <!-- Custom styles for this template -->
    <link href="../asset/project.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="../asset/jquery/jquery.min.js"></script> 
    <script src="../asset/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/jquery/popper.min.js"></script>
    <script src="../asset/jquery/alert.js"></script>
    <script src="../asset/password.js"></script>
    
    
    <!-- Data table script -->
        	
        <link rel="stylesheet" type="text/css" href="../asset/DataTables/datatables.min.css"/>
 
        <script type="text/javascript" src="../asset/DataTables/datatables.min.js"></script>
        <script>
          $(document).ready(function () {
              $('#dataTables-example').dataTable();
          });
        </script>
     <!-- Data table -->

</head>

<body>
<div class="sidebar-container">
  <div class="sidebar-logo border-dark bg-info shadow-lg">
    Perpustakaan
  </div>
  
  <ul class="sidebar-navigation">
    <li class="header">Navigation</li>
    
    <!-- Home -->
    <li class="active">
      <a href="dashboard.php">
        <i class="fa fa-home" aria-hidden="true"></i> Dashboard
      </a>

    </li>

    <!-- Master Data -->
    <li class="active">
      <a href="#datasubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <i class="fa fa-list" aria-hidden="true"></i> Data
      </a>
      <ul class="collapse list-unstyled" id="datasubmenu">
        
        <li><a href="kategori_buku.php">Daftar Buku</a></li>
        <li><a href="data_admin.php">Daftar Admin</a></li>
        <!-- <li><a href="data_aktifitas.php">Aktifitas</a></li> -->

      </ul>
    </li>
    
  </ul>
</div>

<div class="content-container">

  <nav class="navbar navbar-expand border bg-white shadow-sm">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="badges">
        Selamat datang <?php echo $_SESSION['Username']; ?> 
        </a>
        
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link active text-dark bg-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-user"></i>
                <?php echo $_SESSION['Level']; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profil_penerimaan.php">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-dark"></i>
                Profil</a>
                <a class="dropdown-item text-danger" href="../session/logout.php?act=logout">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                Log-out</a>
              </div>
            </li>
        </ul>
    </div>
  </nav>

