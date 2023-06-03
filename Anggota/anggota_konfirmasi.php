<?php 
  include "header_anggota.php";
?>
    <!-- Container fluid -->
    <div class="container-fluid p-2">
        
        <!-- Card -->
        <div class="card" id="scroll">

            <!-- Form konfirmasi -->
            <form method="post" action="" class="ml-2">
                <!-- Konfirmasi -->
                <?php
                    $konfirmasi=mysqli_query($koneksi, "SELECT data_exemplar.*, 
                    data_buku.ID_Buku, data_buku.Judul_Buku, data_buku.Kategori 
                    FROM `data_exemplar`
                    INNER JOIN `data_buku` ON data_buku.ID_Buku = data_exemplar.ID_Buku WHERE ID_Exemplar='$_GET[id]'");
                    $e=mysqli_fetch_array($konfirmasi);
                ?>
                <!-- Simpan data-->
                <?php
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        
                        $ID_Pinjam          = $_POST['ID_Pinjam'];
                        $ID_Exemplar        = $_POST['ID_Exemplar'];
                        $ID_Buku            = $_POST['ID_Buku'];
                        $ID_User	    	= $_SESSION['ID_User'];
                        $Waktu_Pinjam       = $_POST['Waktu_Pinjam'];
                        $Tanggal_Pinjam     = $_POST['Tanggal_Pinjam']; 
                        $Tanggal_Selesai    = $_POST['Tanggal_Selesai'];

                        
                        // $Aktivitas          = $_SESSION['Username'] ." Sudah berhasil request buku dengan ID Exemplar : " .$_POST['ID_Exemplar'];
                        // $Waktu_Aktivitas    = date('H:i:s');
                        // $Tanggal_Aktivitas  = date('Y-m-d');
                        
                        
                        if($ID_User==''){
                            echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                Data Belum lengkap harus di selesaikan !
                            </div>";	
                        }else{
                            //simpan data edit
                            $sql = "INSERT INTO `list_peminjaman` (`ID_Pinjam`, `ID_Buku`, `ID_Exemplar`, 
                            `ID_User`, `Waktu_Pinjam`, `Tanggal_Pinjam`, `Tanggal_Selesai`, `Tanggal_Konfirmasi`, `Alasan`, `Status`, `Status_Konfirmasi`) 
                            VALUES ('$ID_Pinjam', '$ID_Buku', '$ID_Exemplar', '$ID_User', '$Waktu_Pinjam', '$Tanggal_Pinjam', '$Tanggal_Selesai', '', '', 'Menunggu','')";
                    
                            // $sqlAktivitas = "INSERT INTO `aktivitas_user` (`ID_Aktivitas`, `Aktivitas`, `Waktu_Aktivitas`, `Tanggal_Aktivitas`) 
                            // VALUES (NULL, '$Aktivitas', '$Waktu_Aktivitas', '$Tanggal_Aktivitas');";
                            
                            $sqlUpdate = mysqli_query($koneksi, "UPDATE data_exemplar 
                            SET Keterangan='Booked'
                            WHERE ID_Exemplar='$ID_Exemplar'");

                            mysqli_query($koneksi, $sql);
                            mysqli_query($koneksi, $sqlUpdate);
                            // mysqli_query($koneksi, $sqlAktivitas);
                            echo "<script>window.location.replace('request_list_anggota.php?pesan=berhasil_pinjam');</script>";

                        }
                    }
                ?>
                    <div class="container p-5">
                    <h5 class="text-info">
                        <i class="fa fa-atlas">&nbsp;</i>Konfirmasi Peminjaman Buku - <?php echo $_SESSION['Username']; ?> 
                    </h5>
                    <div class="card bg-info mb-5 mt-3"></div>
                    
                    <div class="row rounded-lg">
                    
                        <div class="col-md-12 mb-2">
                            <p class="h5 text-info bg-white"><a class="text-warning">Informasi Penting !</a>
                            <br>
                            Periksa data buku yang akan anda pinjam, 
                            jika sudah sesuai masukan tanggal selesai pinjam,
                            Lakukan konfirmasi peminjaman
                            </p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <?php
                            
                                $query  = mysqli_query($koneksi, "SELECT MAX(ID_Pinjam) as last FROM list_peminjaman");
                                $data   = mysqli_fetch_array($query);
                                $last	= $data['last'];
                                $Next   = substr($last, 1, 4);
                                $Turn   = $Next + 1;
                                $id     = sprintf('%04s', $Turn);
                            ?>
                            <span>ID_Pinjam</span>
                            <p class="h4 text-info"><?php echo "P$id"; ?></p>
                        </div>

                        <div class="col-md-6 mb-2">
                            <span>ID_Exemplar</span>
                            <p class="h4 text-info"><?php echo $e['ID_Exemplar']; ?></p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <span>Judul Buku</span>
                            <p class="h4 text-info"><?php echo $e['Judul_Buku']; ?></p>
                        </div>
            
                        <div class="col-md-6 mb-2">
                            <span>Kategori Buku</span>
                            <p class="h4 text-info"><?php echo $e['Kategori']; ?></p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <span>Tanggal Pinjam</span>
                            <p class="text-info"><?php echo bulan_pinjam(date('Y-m-d'),true) ?></p>
                        </div>

                        <div class="col-md-6 mb-2">
                            <span>Konfirmasi Tanggal Selesai (Harap di isi!)</a></span>
                            <input type="date" class="form-control col-md-6 text-info" name="Tanggal_Selesai">
                        </div>
                        
                        <div class="col-md-12">
                            <a href="user_exemplar.php" class="btn btn-danger btn-sm">Batal</a>
                            <input type="submit" class="btn btn-primary btn-sm" value="Konfirmasi" />
                        </div>

                        <input type="hidden" value="<?php echo "P$id"; ?>" class="form-control" name="ID_Pinjam">
                        <input type="hidden" value="<?php echo $e['ID_Exemplar']; ?>" class="form-control" name="ID_Exemplar">
                        <input type="hidden" value="<?php echo $e['ID_Buku']; ?>" class="form-control" name="ID_Buku">
                        <input type="hidden" value="<?php echo date('H:i:s'); ?>" name="Waktu_Pinjam">
                        <input type="hidden" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="Tanggal_Pinjam">
                        
                    </div>
                </div>
            </form>
                
        </div>
    
        
    </div>
</div>

</body>
</html>