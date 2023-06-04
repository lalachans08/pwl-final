<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include './koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['Username'];
$password = $_POST['Password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from user where Username='$username' and Password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);
	$ID_User	= $data['ID_User'];
	$Pass		= $data['Password'];
	$No_Telp	= $data['No_Telp'];
	$Alamat		= $data['Alamat'];
	$Last_Login	= $data['Last_Login'];
	$Nama		= $data['Nama'];

	// cek jika user login sebagai admin
	if ($data['Level'] == "Admin Penerimaan") {

		// buat session login dan username
		$_SESSION['Username'] 	= $username;
		$_SESSION['Level'] 		= "Admin Penerimaan";
		$_SESSION['ID_User'] 	= $ID_User;
		$_SESSION['Password'] 	= $Pass;
		$_SESSION['No_Telp'] 	= $No_Telp;
		$_SESSION['Alamat'] 	= $Alamat;
		$_SESSION['Last_Login'] = $Last_Login;
		$_SESSION['Nama'] 		= $Nama;


		// alihkan ke halaman dashboard admin
		header("location:../Penerimaan/dashboard.php");

		// cek jika user login sebagai peminjaman
	} else if ($data['Level'] == "Admin Peminjaman") {

		// buat session login dan username
		$_SESSION['Username'] 	= $username;
		$_SESSION['Level'] 		= "Admin Peminjaman";
		$_SESSION['ID_User'] 	= $ID_User;
		$_SESSION['Password'] 	= $Pass;
		$_SESSION['No_Telp'] 	= $No_Telp;
		$_SESSION['Alamat'] 	= $Alamat;
		$_SESSION['Last_Login'] = $Last_Login;
		$_SESSION['Nama'] 		= $Nama;


		// alihkan ke halaman dashboard admin
		header("location:../Peminjaman/dashboard.php");

		// cek jika user login sebagai anggota
	} else if ($data['Status_Anggota'] == "Tidak Aktif") {

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=nonaktif");
	} else if ($data['Level'] == "Anggota") {

		// buat session login dan username
		$_SESSION['Username'] 	= $username;
		$_SESSION['Level'] 		= "Anggota";
		$_SESSION['ID_User'] 	= $ID_User;
		$_SESSION['Password'] 	= $Pass;
		$_SESSION['No_Telp'] 	= $No_Telp;
		$_SESSION['Alamat'] 	= $Alamat;
		$_SESSION['Last_Login'] = $Last_Login;
		$_SESSION['Nama'] 		= $Nama;


		// alihkan ke halaman dashboard admin
		header("location:../Anggota/dashboard.php");


		// cek jika user login sebagai kepala sekolah
	} else if ($data['Level'] == "Kepala Sekolah") {

		// buat session login dan username
		$_SESSION['Username'] 	= $username;
		$_SESSION['Level'] 		= "Kepala Sekolah";
		$_SESSION['ID_User'] 	= $ID_User;
		$_SESSION['Password'] 	= $Pass;
		$_SESSION['No_Telp'] 	= $No_Telp;
		$_SESSION['Alamat'] 	= $Alamat;
		$_SESSION['Last_Login'] = $Last_Login;
		$_SESSION['Nama'] 		= $Nama;

		// alihkan ke halaman dashboard kepala sekolah
		header("location:../Kepala Sekolah/dashboard.php");
	} else {
		// alihkan ke halaman login kembali
		header("location:../index.php?pesan=gagal_login");
	}
} else {
	header("location:../index.php?pesan=gagal_login");
}
