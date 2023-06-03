<?php 
  include "header_peminjaman.php";
?>
    <div class="container-fluid p-2">
        
        <div class="card">
            <div class="card-header h5">Tambah data anggota</div>
                <div class="card-body" id="scroll">

                    <form method="post" action="" class="ml-2">
                        <!-- untuk memproses form -->
                        <?php
                            if($_SERVER['REQUEST_METHOD']=='POST'){
                                $ID_User        = $_POST['ID_User'];
                                $Username       = $_POST['Username'];
                                $Nama           = $_POST['Nama'];
                                $Password       = md5($_POST['Password']);
                                $Password2      = md5($_POST['Password2']);
                                $No_Telp        = $_POST['No_Telp'];
                                $Alamat         = $_POST['Alamat'];
                                // $Level          = $_POST['Level'];
                                
                                
                                
                                $result = mysqli_query($koneksi, "SELECT Username FROM user WHERE Username = '$Username'");
                                //cek username sudah ada atau belum
                                if(mysqli_fetch_assoc($result)) {
                                  echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                            Username sudah digunakan !
                                        </div>";
                                }else if($Password !== $Password2){
                                // cek kecocokan password
                                  echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                            Password tidak sesuai !
                                        </div>";                              
                                }else if($ID_User=='' | $Username=='' | $Nama=='' | $Password=='' | $No_Telp=='' | $Alamat==''){
                                  echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                            Data Belum lengkap harus di selesaikan !
                                        </div>";	
                                }else{
                                    //simpan data
                                    $simpan = mysqli_query($koneksi,
                                    "INSERT INTO `user` (`ID_User`, `Username`, `Nama`, `Password`, `No_Telp`, `Alamat`, `Level`, `Last_Login`, `Status_Anggota`) 
                                    VALUES ('$ID_User', '$Username', '$Nama', '$Password', '$No_Telp', '$Alamat', 'Anggota', '', '')"
                                    );
                                    
                                    if($simpan){
                                        echo "<script>window.location.replace('data_anggota.php?pesan=simpan');</script>";
                                    }
                                }
                                
                            }
                        ?>
                        <?php include "../asset/pesan.php"; ?>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ID Anggota</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <?php
                                    $query  = mysqli_query($koneksi, "SELECT MAX(ID_User) as last FROM user WHERE Level='Anggota'");
                                    $data   = mysqli_fetch_array($query);
                                    $last	= $data['last'];
                                    $Next   = substr($last, 2, 4);
                                    $Turn   = $Next + 1;
                                    $id     = sprintf('%04s', $Turn);
                                ?>
                                <input type="text" class="form-control" name="ID_User" placeholder="Masukan" value=<?php  echo"AG$id" ?> readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Username</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="Username" placeholder="Masukan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="Nama" placeholder="Masukan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Password</label>
                            <div class="input-group col-md-6">
                                <input id="show-password" type="password" class="form-control" name="Password" placeholder="Masukan">
                                <span class="input-group-text bg-white" id="mybutton" onclick="password()"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Konfirmasi Password</label>
                            <div class="input-group col-md-6">
                                <input id="show-password2" type="password" class="form-control" name="Password2" placeholder="Masukan">
                                <span class="input-group-text bg-white" id="mybutton2" onclick="password2()"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">No.Telp</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="number" class="form-control" name="No_Telp" placeholder="Masukan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Alamat</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <textarea row="5" class="form-control" name="Alamat"></textarea>
                            </div>
                        </div>
                        <div class="mb-2">
                        <a href="data_anggota.php" class="btn btn-danger btn-icon-split btn-sm">
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
</body>
</html>