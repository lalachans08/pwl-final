<?php 
  include "header_anggota.php";
?>  
    <!-- Container fluid -->
    <div class="container-fluid p-2">

        <!-- Card container -->
        <div class="card p-5 shadow-lg">
             
            <h5 class="text-info">
                <i class="fa fa-home">&nbsp;</i>My Profile - <?php echo $_SESSION['Level']; ?> Perpustakaan 
            </h5>
            <div class="card bg-info mb-5 mt-3"></div>

            <!-- Alert pesan -->
            <?php include "../asset/pesan.php"; ?>
            
            <!-- Row data profil -->
            <div class="row rounded-lg">
            <?php
               $sql=mysqli_query($koneksi, "SELECT * FROM user WHERE ID_User='$_SESSION[ID_User]'");
                
               while($d=mysqli_fetch_array($sql)){
            //    $md5 = md5($d['ID_User']);

               echo"<div class='col-md-6 mb-2'>
                    <span>ID Admin</span>
                    <p class='h4 text-info'>$d[ID_User]</p>
                    </div>
                    <div class='col-md-6 mb-2'>
                        <span>Username</span>
                        <p class='h4 text-info'>$d[Username]</p>
                    </div>
                    <div class='col-md-6 mb-2'>
                        <span>Nama Lengkap</span>
                        <p class='h4 text-info'>$d[Nama]</p>
                    </div>
                    <div class='col-md-6 mb-2'>
                        <span>Password</span>
                        <p class='h4 text-info'>$d[Password]</p>
                    </div>
                    <div class='col-md-6 mb-2'>
                        <span>No Telp</span>
                        <p class='h4 text-info'>$d[No_Telp]</p>
                    </div>
                    <div class='col-md-6 mb-2'>
                        <span>Alamat</span>
                        <p class='h4 text-info'>$d[Alamat]</p>
                    <div>
                    
                    <a href='dashboard.php' class='btn btn-info btn-sm'>
                        Kembali
                    </a>
                    <a class='btn btn-warning btn-sm' href='profil_anggota_edit.php'>
                        Edit data
                    </a>
                    <a class='btn btn-danger btn-sm' href='profil_anggota_password.php'>
                        Edit password
                    </a>";
                }
            ?>
            </div>
            <!-- end Row data profil -->
            
        </div>
        <!-- end Card container -->
        
    </div>
    <!-- end Container fluid -->
    
</div>
<!-- end Content container -->
</body>
</html>