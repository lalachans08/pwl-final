<?php 
  include "header_peminjaman.php";
//   $id = date("hid");
?>  
    <!-- Container fluid -->
    <div class="container-fluid p-2">

        <!-- Card container -->
        <div class="card p-5 shadow-lg">  
            
            <!-- Info username -->
            <h5 class="text-info">
                <i class="fa fa-home">&nbsp;</i>Perbarui Password - <?php echo $_SESSION['Username']; ?> 
            </h5>

            <!-- Form edit password -->
            <div class="card bg-info mb-5 mt-3"></div>
                <div class="rounded-lg">

                    <form method="post" action="" class="ml-2">
                        <!-- edit data admin -->
                        <?php
                            $sqlEdit=mysqli_query($koneksi, "SELECT * FROM user WHERE ID_User='$_SESSION[ID_User]'");
                            $e=mysqli_fetch_array($sqlEdit);
                        
                            if($_SERVER['REQUEST_METHOD']=='POST'){
                                $ID_User        = $_POST['ID_User'];
                                $Password       = md5($_POST['Password']);
                                // $Level       = $_POST['Level'];
                                     
                                if($ID_User=='' || $Password==''){
                                    echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        Data Belum lengkap harus di selesaikan !
                                    </div>";	
                                }else{
                                    //simpan data edit
                                    $update = mysqli_query($koneksi, "UPDATE user SET
                                                                        Password='$Password'
                                                                        WHERE ID_User='$ID_User'");
                                                                        
                                    if($update){
                                        echo "<script>window.location.replace('profil_peminjaman.php?pesan=edit');</script>";
                                    }else{
                                        echo "<script>window.location.replace('profil_peminjaman.php?pesan=gagal_edit');</script>";
                                    }
                                }
                            }
                        ?>
                        <input type="hidden" value="<?php echo $e['ID_User']; ?>" class="form-control" name="ID_User">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Username</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" value="<?php echo $e['Username']; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Password</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" id="show-password" required="required" class="form-control" name="Password" placeholder="Masukan pasword baru" maxlength="10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2"></label>
                            <div class="col-md-6">
                                <input type="checkbox" onclick="password()">
                                <a>Hide password</a>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-12">
                                <span><a class="text-danger">Penting !</a>
                                <a class="text-info">Masukan password dengan kata asli untuk di enskripsi !</a></span>
                            </div>
                        </div>
                        
                        <div class="mb-2">
                        <a href="profil_peminjaman.php" class="btn btn-info btn-sm btn-icon-split">
                            <span class="icon text-white-50">
                            <i class="fas fa-arrow-left mt-1"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                        <input type="submit" class="btn btn-primary btn-sm" value="Simpan" />
                        </div>
                        
                    </form>
                        
                </div>
            </div> 
            <!-- end Form edit password -->
            
        </div>
        <!-- end Card container -->
        
    </div>
    <!-- end Container fluid -->
    
</div>
<!-- end Content container -->
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