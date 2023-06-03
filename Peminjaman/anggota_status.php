<?php 
session_start();
if(isset($_SESSION['Level'])){
	include "../session/koneksi.php";
	if($_GET['act']=='nonaktif'){

		$ID_user	 	 = $_GET['ID_User'];

		$Update			 = mysqli_query($koneksi, "UPDATE user 
		SET Status_Anggota='Tidak Aktif'
		WHERE ID_user='$ID_user'");

		mysqli_query($koneksi, $Update);
        echo "<script>window.location.replace('data_anggota.php?pesan=nonaktif');</script>";

	}
	if($_GET['act']=='aktif'){

		$ID_user	 	 = $_GET['ID_User'];

		$Update			 = mysqli_query($koneksi, "UPDATE user 
		SET Status_Anggota='Aktif'
		WHERE ID_user='$ID_user'");

		mysqli_query($koneksi, $Update);

        echo "<script>window.location.replace('data_anggota.php?pesan=aktif');</script>";
	}


}
?>