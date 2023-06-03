<?php 
session_start();
if(isset($_SESSION['Level'])){
	include "../session/koneksi.php";
	if($_GET['act']=='refresh'){

		$ID_Exemplar 	 = $_GET['ID_Exemplar'];
		// $ID_Buku		 = $_GET['ID_Buku'];	

		$Update			 = mysqli_query($koneksi, "UPDATE data_exemplar 
		SET Keterangan='Tersedia'
		WHERE ID_Exemplar='$ID_Exemplar'");

		mysqli_query($koneksi, $Update);

		header('location:data_exemplar.php?pesan=refresh');
	}

}
?>