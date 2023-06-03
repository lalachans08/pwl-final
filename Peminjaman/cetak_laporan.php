<?php 
    session_start();
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['Level']==""){
      header("location:../session/index.php?pesan=akses");
    }
    if($_SESSION['Level']=="Admin Penerimaan"){
      header("location:../Penerimaan/dashboard.php?pesan=akses");
    }
    if($_SESSION['Level']=="Anggota"){
      header("location:../Peminjaman/dashboard.php?pesan=akses");
    }
    include "../session/koneksi.php";
    include "../asset/tgl_indo.php";
?>
<link href="../asset/bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
<!-- Buat laporan peminjaman -->
<style>
    .borderless th, .borderless td{
    border: none;
    }
    .font{
        font-size:13px;
    }
    /* .font th, .font td{
        border:solid 1px black;
    } */
</style>
<?php
    $lp=mysqli_query($koneksi, "SELECT * FROM laporan_peminjaman 
    WHERE ID_laporan='$_GET[id]'");
    $e=mysqli_fetch_array($lp);
    
    // Formating tanggal
    $date_pinjam      = bulan_pinjam(date($e['Tanggal_Pinjam']),true);
    $date_selesai     = bulan_pinjam(date($e['Tanggal_Selesai']),true);
    $date_konfirmasi  = bulan_pinjam(date($e['Tanggal_Konfirmasi']),true);
?>
<div class="container p-5 text-gray-900 border border-dark">
    <h5 class="text-center">LAPORAN PEMINJAMAN BUKU PERPUSTAKAAN</h5>
    <hr class="bg-gray">
    <div class="col-md-5 mt-5 mb-5">
        <table class="text-gray-900 borderless table">
            <tr>
                <th class='none'>Nama Peminjam</th>
                <th class='none'>:</th>
                <td><?= $e['Nama']; ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th class='none'>:</th>
                <td><?= bulan_pinjam(date('Y-m-d'),true); ?></td>
            </tr>
            <tr>
                <th>ID Laporan</th>
                <th class='none'>:</th>
                <td><?= $e['ID_Laporan']; ?></td>
            </tr>
        </table>
    </div>
    <div class="table-responsive col-md-12 mb-5">
        <table id="example1" class="text-gray-900 table table-bordered font">
            <tr>
                <th>ID Pinjam</th>
                <th>ID Exemplar</th>
                <th>ID Anggota</th>
                <th>Username</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Selesai</th>
                <th>Tanggal Konfirmasi</th>
                <th>Denda (Rp)</th>
            </tr>
            <tr class="">
                <td><?= $e['ID_Laporan']; ?></td>
                <td><?= $e['ID_Exemplar']; ?></td>
                <td><?= $e['ID_User']; ?></td>
                <td><?= $e['Username']; ?></td>
                <td><?= $e['Judul_Buku']; ?></td>
                <td><?= $date_pinjam; ?></td>
                <td><?= $date_selesai; ?></td>
                <td><?= $date_konfirmasi; ?></td>
                <td><?= $e['Denda']; ?></td>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="col-md-3 text-center">
            <p><?= $_SESSION['Level']; ?></p>
            <br>
            <br>
            <p>( <?= $_SESSION['Username']; ?> )</p>
        </div>
        <div class="col-md-6">
           
        </div>
        <div class="col-md-3 text-center">
            <p>Bogor, <?= bulan_pinjam(date('Y-m-d')); ?></p>
            <br>
            <br>
            <p>( <?= $e['Username']; ?> )</p>
        </div>
    </div>
</div>

<script>
    window.print();
</script>
</body>
</html>