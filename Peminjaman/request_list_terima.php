<?php 
session_start();
if(isset($_SESSION['Level'])){
	include "../session/koneksi.php";
	if($_GET['act']=='setuju'){

		$ID_Pinjam		 = $_GET['ID_Pinjam'];
		$ID_Exemplar 	 = $_GET['ID_Exemplar'];
		
		$Update_exemplar = mysqli_query($koneksi, "UPDATE data_exemplar 
		SET Keterangan='Active'
		WHERE ID_Exemplar='$ID_Exemplar'");

		$Update_list_peminjaman = mysqli_query($koneksi, "UPDATE list_peminjaman 
		SET Status='Active'
		WHERE ID_Pinjam='$ID_Pinjam'");

		mysqli_query($koneksi, $Update_exemplar);
		mysqli_query($koneksi, $Update_list_peminjaman);

        echo "<script>window.location.replace('active_list_peminjaman.php?pesan=setuju');</script>";
	}

}
?>