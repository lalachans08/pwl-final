<?php 
  include "header_peminjaman.php";
?>
    <!-- Container fluid -->
    <div class="container-fluid p-2">
        
        <!-- Card container -->
        <div class="card p-5 shadow-lg">
            
            <!-- Info username -->
            <h5 class="text-info">
                <i class="fa fa-edit">&nbsp;</i>Edit Konfigurasi
            </h5>

            <!-- Form edit data admin -->
            <div class="card bg-info mb-5 mt-3"></div>
                
                    <form method="post" action="" class="ml-2">
                        <!-- edit data buku -->
                        <?php
                            $sqlEdit=mysqli_query($koneksi, "SELECT * FROM konfigurasi_denda WHERE ID_Konfigurasi='$_GET[id]'");
                            $e=mysqli_fetch_array($sqlEdit);
                            $last_update    = bulan_pinjam(date($e['Terakhir_Ubah']),true);

                        ?>
                        <!-- untuk memproses edit -->
                        <?php
                            if($_SERVER['REQUEST_METHOD']=='POST'){
                                $ID_Konfigurasi = $_POST['ID_Konfigurasi'];
                                $Nominal        = $_POST['Nominal'];
                                $Terakhir_Ubah  = date('Y-m-d');
                                $Waktu_Ubah  = date('H:i:s');
                                     
                                if($Nominal==''){
                                    echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        Data Belum lengkap harus di selesaikan !
                                    </div>";	
                                }else{
                                    //simpan data edit
                                    $update = mysqli_query($koneksi, "UPDATE konfigurasi_denda SET
                                                                        Nominal='$Nominal',
                                                                        Terakhir_Ubah='$Terakhir_Ubah',
                                                                        Waktu_Ubah='$Waktu_Ubah'
                                                                        WHERE ID_Konfigurasi='$ID_Konfigurasi'");
                                                                        
                                    if($update){
                                        echo "<script>window.location.replace('konfigurasi_denda.php?pesan=edit');</script>";
                                    }
                                }
                            }
                        ?>
                        <input type="hidden" value="<?php echo $e['ID_Konfigurasi']; ?>" name="ID_Konfigurasi">
                            
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Denda/Hari</label>
                            <div class="input-group col-md-6">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" value="<?php echo $e['Nominal']; ?>" class="form-control" name="Nominal" placeholder="Masukan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Terakhir Update</label>
                            <div class="input-group col-md-6">
                                <input type="text" value="<?php echo $last_update; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="mb-2">
                            <a href="konfigurasi_denda.php" class="btn btn-danger btn-sm">
                            Batal
                            </a>
                            <input type="submit" class="btn btn-primary btn-sm" value="Simpan" />
                        </div>
                        
                    </form>
                      
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