<?php 
// mengaktifkan session php
session_start();
date_default_timezone_set('Asia/Jakarta'); 
    
//Function ubah default date ke tanggal indonesia
function bulan_pinjam($tanggal, $cetak_hari = false){
    $hari = array ( 1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
        );
        
    $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
        );
    $split 	  = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    
    if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}

if(isset($_SESSION['Level'])){
	include "koneksi.php";
	if($_GET['act']=='logout'){
        
        $Month          = bulan_pinjam(date('Y-m-d'),true);
        $Time           = date('H:i:s');
		$ID_User	 	= $_SESSION['ID_User'];
        $Last_Login     = ($Month ." - " .$Time);

		$Last = mysqli_query($koneksi, "UPDATE user 
		SET Last_Login='$Last_Login'
		WHERE ID_User='$ID_User'");

		mysqli_query($koneksi, $Last);

        // menghapus semua session
        session_destroy();
        
        // mengalihkan halaman ke halaman login
        header("location:../index.php");
	}

}

?>