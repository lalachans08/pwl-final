<?php 
  include "header_anggota.php";
?>
    <!-- Container fluid -->
    <div class="container-fluid p-2">
        
        <!-- Card container -->
        <div class="card p-5 shadow-lg">
            
            <!-- Info username -->
            <h5 class="text-info">
                <i class="fa fa-home">&nbsp;</i>Edit Profile - <?php echo $_SESSION['Username']; ?> 
            </h5>

            <!-- Form edit data admin -->
            <div class="card bg-info mb-5 mt-3"></div>
                <div class="rounded-lg">

                    <form method="post" action="" class="ml-2">
                        <!-- edit data buku -->
                        <?php
                            $sqlEdit=mysqli_query($koneksi, "SELECT * FROM user WHERE ID_User='$_SESSION[ID_User]'");
                            $e=mysqli_fetch_array($sqlEdit);
                        
                            if($_SERVER['REQUEST_METHOD']=='POST'){
                                $ID_User        = $_POST['ID_User'];
                                $Nama           = $_POST['Nama'];
                                $No_Telp        = $_POST['No_Telp'];
                                $Alamat         = $_POST['Alamat'];
                                // $Level          = $_POST['Level'];
                                     
                                if($ID_User=='' | $Nama=='' | $No_Telp=='' | $Alamat==''){
                                    echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        Data Belum lengkap harus di selesaikan !
                                    </div>";	
                                }else{
                                    //simpan data edit
                                    $update = mysqli_query($koneksi, "UPDATE user SET
                                                                        Nama='$Nama',
                                                                        No_Telp='$No_Telp',
                                                                        Alamat='$Alamat'
                                                                        WHERE ID_User='$ID_User'");
                                                                        
                                    if($update){
                                        echo "<script>window.location.replace('profil_anggota.php?pesan=edit');</script>";
                                    }else{
                                        echo "<script>window.location.replace('profil_anggota.php?pesan=gagal_edit');</script>";
                                    }
                                }
                            }
                        ?>
                        <input type="hidden" value="<?php echo $e['ID_User']; ?>" class="form-control" name="ID_User" placeholder="Masukan" readonly>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Username</label>
                            <div class="input-group col-md-6">
                                <input type="text" value="<?php echo $e['Username']; ?>" readonly class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama Lengkap</label>
                            <div class="input-group col-md-6">
                                <input type="text" value="<?php echo $e['Nama']; ?>" class="form-control" name="Nama" placeholder="Masukan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">No.Telp</label>
                            <div class="input-group col-md-6">
                                <input type="text" value="<?php echo $e['No_Telp']; ?>" class="form-control" name="No.Telp" placeholder="Masukan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Alamat</label>
                            <div class="input-group col-md-6">
                            <textarea name="Alamat" rows="3" class="form-control"><?php echo $e['Alamat']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Level Admin</label>
                            <div class="input-group col-md-6">
                                <input type="text" value="<?php echo $e['Level']; ?>" class="form-control" name="Level" placeholder="Masukan" readonly>
                            </div>
                        </div>
                        <div class="mb-2">
                        <a href="profil_anggota.php" class="btn btn-info btn-sm">
                            Kembali
                        </a>
                        <input type="submit" class="btn btn-primary btn-sm" value="Simpan" />
                        </div>
                        
                    </form>
                        
                </div>
           </div>
            <!-- end Form edit data admin -->
           
        </div>
        <!-- end Card container -->
        
    </div>
    <!-- end Container fluid -->
        
</div>
<!-- end Content contsainer -->
<script>
// Show password
function password() {
    var x = document.getElementById("show-password");
    if (x.type === "password") {
        x.type = "text";
    }else {
        x.type = "password";
    }

}
</script>
</body>
</html>