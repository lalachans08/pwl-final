<?php 
  include "header_peminjaman.php";
  $id = date("hid");
?>
    <div class="container-fluid p-2">
        <div class="card">
            <div class="card-header">Edit Data Anggota</div>
                <div class="card-body" id="scroll">

                    <form method="post" action="" class="ml-2">
                        <!-- edit data buku -->
                        <?php
                            $sqlEdit=mysqli_query($koneksi, "SELECT * FROM user WHERE ID_User='$_GET[id]'");
                            $e=mysqli_fetch_array($sqlEdit);
                        ?>
                        <!-- untuk memproses edit -->
                        <?php
                            if($_SERVER['REQUEST_METHOD']=='POST'){
                                $ID_User        = $_POST['ID_User'];
                                $Username       = $_POST['Username'];
                                $Nama           = $_POST['Nama'];
                                // $Password       = md5($_POST['Password']);
                                $No_Telp        = $_POST['No_Telp'];
                                $Alamat         = $_POST['Alamat'];
                                // $Level          = $_POST['Level'];
                                     
                                
                                    //simpan data edit
                                    $update = mysqli_query($koneksi, "UPDATE user SET
                                                                        Nama='$Nama',
                                                                        No_Telp='$No_Telp',
                                                                        Alamat='$Alamat'
                                                                        WHERE ID_User='$ID_User'");
                                                                        
                                    if($update){
                                        header('location:data_anggota.php?pesan=edit');
                                    }else{
                                        header('location:data_anggota.php?pesan=gagal_edit');
                                    }
                                
                            }
                        ?>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ID Anggota</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" value="<?php echo $e['ID_User']; ?>" class="form-control" name="ID_User" placeholder="Masukan" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Username</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" readonly value="<?php echo $e['Username']; ?>" class="form-control" name="Username" placeholder="Masukan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" value="<?php echo $e['Nama']; ?>" class="form-control" name="Nama" placeholder="Masukan">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">No.Telp</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" value="<?php echo $e['No_Telp']; ?>" class="form-control" name="No.Telp" placeholder="Masukan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Alamat</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <textarea class="form-control" row="5" name="Alamat"><?php echo $e['Alamat']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Password</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" readonly value="<?php echo $e['Password']; ?>" class="form-control" name="Level" placeholder="Masukan" readonly>
                            </div>
                        </div>
                        
                        <div class="mb-2">
                            <a href="data_anggota.php" class="btn btn-danger btn-sm btn-icon-split">
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
        </div>
    </div>
</div>
<script>
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