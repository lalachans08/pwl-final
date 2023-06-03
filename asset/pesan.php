<?php 
// Notifikasi pesan data
if(isset($_GET['pesan'])){
    // Data simpan
    if($_GET['pesan']=="simpan"){
        echo "<div class='text-center alert alert-success fade show alert-dismissible mt-2'>
            Data berhasil di simpan !
            </div>";
    }
    if($_GET['pesan']=="gagal_simpan"){
        echo "<div class='text-center alert alert-warning fade show alert-dismissible mt-2'>
            Data gagal di simpan !
            </div>";
    }

    // Data kurang lengkap
    if($_GET['pesan']=="data_kurang"){
        echo "<div class='text-center alert alert-warning fade show alert-dismissible mt-2'>
            Data masih kurang !
            </div>";
    }

    // Data hapus
    if($_GET['pesan']=="hapus"){
        echo "<div class='text-center alert alert-danger fade show alert-dismissible mt-2'>
            Data berhasil di hapus !
            </div>";
    }
    if($_GET['pesan']=="gagal_hapus"){
        echo "<div class='text-center alert alert-warning fade show alert-dismissible mt-2'>
            Data gagal di hapus !
            </div>";
    }

    // Data edit
    if($_GET['pesan']=="edit"){
        echo "<div class='text-center alert alert-primary fade show alert-dismissible mt-2'>
            Data berhasil di perbarui !
            </div>";
    }
    if($_GET['pesan']=="gagal_edit"){
        echo "<div class='text-center alert alert-warning fade show alert-dismissible mt-2'>
            Data gagal di di perbarui !
            </div>";
    }

    // Data refresh
    if($_GET['pesan']=="refresh"){
        echo "<div class='text-center alert alert-info fade show alert-dismissible mt-2'>
            Data berhasil di refresh !
            </div>";
    }
    
    // Data peminjaman
    if($_GET['pesan']=="setuju"){
        echo "<div class='text-center alert alert-success fade show alert-dismissible mt-2'>
            Request buku erhasil di setujui !
            </div>";
    }
    if($_GET['pesan']=="tolak"){
        echo "<div class='text-center alert alert-danger fade show alert-dismissible mt-2'>
            Request buku berhasil di tolak !
            </div>";
    }
    if($_GET['pesan']=="selesai"){
        echo "<div class='text-center alert alert-primary fade show alert-dismissible mt-2'>
        Peminjaman berhasil di selesaikan !
            </div>";
    }
    if($_GET['pesan']=="berhasil_pinjam"){
        echo "<div class='text-center alert alert-success fade show mt-2'>
            Buku berhasil di request !
            </div>";
    }
    if($_GET['pesan']=="berhasil_konfirmasi"){
        echo "<div class='text-center alert alert-success fade show mt-2'>
            Pengembalian berhasil di konfirmasi !
            </div>";
    }

    // Akses Login user
    if($_GET['pesan']=="gagal_login"){
        echo "<div class='container alert alert-danger fade show alert-dismissible'>
            Username atau password salah !
            </div>";
    }
    if($_GET['pesan']=="akses"){
        echo "<div class='container alert alert-warning fade show alert-dismissible'>
            Anda tidak memiliki akses !
            </div>";
    }
    if($_GET['pesan']=="password_gagal"){
        echo "<div class='container alert alert-warning fade show alert-dismissible'>
            Password tidak sesuai !
            </div>";
    }
    if($_GET['pesan']=="username"){
        echo "<div class='container alert alert-warning fade show alert-dismissible'>
            Username sudah digunakan !
            </div>";
    }
    if($_GET['pesan']=="nonaktif"){
        echo "<div class='container alert alert-danger fade show alert-dismissible'>
            Akun di Nonaktifkan !
            </div>";
    }
    if($_GET['pesan']=="aktif"){
        echo "<div class='container alert alert-primary fade show alert-dismissible'>
            Akun di Aktifkan !
            </div>";
    }

}
?>