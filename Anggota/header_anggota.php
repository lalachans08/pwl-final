<?php 
    session_start();
    if($_SESSION['Level']==""){
      header("location:../index.php?pesan=akses");}
    if($_SESSION['Level']=="Admin Penerimaan"){
      header("location:../Penerimaan/dashboard.php?pesan=akses");}
    if($_SESSION['Level']=="Admin Peminjaman"){
      header("location:../Peminjaman/dashboard.php?pesan=akses");} 
    include "../session/koneksi.php"; include "../asset/tgl_indo.php"; 
?>
<!DOCTYPE html>
<html>
<head>

 <title>Perpustakaan</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <!-- <link href="../asset/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="../asset/bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
   
    <!-- Custom Icon -->
    <link rel="stylesheet" href="../asset/icon/css/all.min.css">
   
    <!-- Custom Icon -->
    <link rel="icon" type="image/png" href="../asset/card-2.jpg">

    <!-- Custom styles for this template -->
    <link href="../asset/anggota.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="../asset/jquery/jquery.min.js"></script> 
    <script src="../asset/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/jquery/popper.min.js"></script>
    <script src="../asset/jquery/alert.js"></script>
   
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
<!-- Content container -->
<div class="content-container">
  
  <!-- Navbar -->
  <nav class="navbar navbar-expand border bg-white shadow-sm">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <a class="badges">
      <?php echo $_SESSION['Username']; ?> 
      </a>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link active text-dark bg-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="far fa-user-circle"></i>
              <?php echo $_SESSION['Level']; ?> Perpustakaan
            </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="profil_anggota.php">
              <i class="fa fa-user fa-sm fa-fw mr-2 text-dark"></i>
              Profil</a>
              <a class="dropdown-item text-danger" href="../session/logout.php?act=logout">
              <i class="fa fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
              Log-out</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- end Navbar -->

