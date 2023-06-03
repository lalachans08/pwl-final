<?php
session_start();

if(isset($_SESSION['Level'])){
	include "../session/koneksi.php";

	$ID_Exemplar 		= $_GET['id'];

	$hapus = mysqli_query($koneksi, "DELETE FROM data_exemplar WHERE ID_Exemplar='$_GET[id]'");

	// $Aktivitas          = $_SESSION['Level'] ." Sudah berhasil menghapus data Exemplar dengan ID Exemplar : " .$ID_Exemplar;
	// $Waktu_Aktivitas    = date('H:i:s');
	// $Tanggal_Aktivitas  = date('Y-m-d');
	
	// $sqlAktivitas = "INSERT INTO `aktivitas_user` (`ID_Aktivitas`, `Aktivitas`, `Waktu_Aktivitas`, `Tanggal_Aktivitas`) 
    // VALUES (NULL, '$Aktivitas', '$Waktu_Aktivitas', '$Tanggal_Aktivitas');";
	
	mysqli_query($koneksi, $sqlAktivitas);

	if($hapus){
        echo "<script>window.location.replace('data_exemplar.php?pesan=hapus');</script>";
	}else{
        echo "<script>window.location.replace('data_exemplar.php?pesan=gagal_hapus');</script>";
    }
}else{
	echo "Anda tidak memiliki akses ke halaman ini!!!";
}
?>