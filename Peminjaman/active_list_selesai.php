<?php 
session_start();
if(isset($_SESSION['Level'])){
	include "../session/koneksi.php";
	include "../asset/tgl_indo.php";
	//Function ubah default date ke tanggal indonesia

	if($_GET['act']=='selesai'){

		$ID_Pinjam			= $_GET['ID_Pinjam'];
		$ID_Exemplar 		= $_GET['ID_Exemplar'];
		$Tanggal_Konfirmasi	= date('Y-m-d');

		$Update_exemplar = mysqli_query($koneksi, "UPDATE data_exemplar 
		SET Keterangan='Tersedia'
		WHERE ID_Exemplar='$ID_Exemplar'");

		$Update_list_peminjaman = mysqli_query($koneksi, "UPDATE list_peminjaman 
		SET Tanggal_Konfirmasi='$Tanggal_Konfirmasi', 
		Status='Selesai',
		Status_Konfirmasi='Belum Konfirmasi'
		WHERE ID_Pinjam='$ID_Pinjam'");

		mysqli_query($koneksi, $Update_exemplar);
		mysqli_query($koneksi, $Update_list_peminjaman);
		
            echo "<script>window.location.replace('history_list_peminjaman.php?pesan=selesai');</script>";
    }

}
?>