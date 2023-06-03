<?php
//variabel koneksi
// $koneksi = mysqli_connect("localhost","id14847421_gunawan02","p3rpus*gunawanP","id14847421_perpustakaan");

$koneksi = mysqli_connect("127.0.0.1", "root", "","","")

if(!$koneksi){
	echo "Koneksi Database Gagal...!!!";
}
?>
