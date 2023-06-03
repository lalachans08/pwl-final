<?php 
  include "header_peminjaman.php";
?>
    <div class="container-fluid p-2">
        
        <div class="card">

            <form method="post" action="" class="ml-2">
                <!-- Buat laporan peminjaman -->
                <?php
                    $laporan=mysqli_query($koneksi, "SELECT list_peminjaman.*, 
					data_buku.ID_Buku, data_buku.Judul_Buku, user.ID_User, user.Username, user.Nama 
					FROM `list_peminjaman`
					INNER JOIN `data_buku` ON data_buku.ID_Buku = list_peminjaman.ID_Buku 
					INNER JOIN `user` ON user.ID_User = list_peminjaman.ID_User
					WHERE ID_Pinjam='$_GET[id]'");
                    $e=mysqli_fetch_array($laporan);
                ?>
                <!-- Simpan laporan -->
                <?php
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        
                        $ID_Laporan        	= $_POST['ID_Laporan'];
                        $ID_Pinjam        	= $_POST['ID_Pinjam'];
                        $ID_Exemplar        = $_POST['ID_Exemplar'];
						$ID_User	    	= $_POST['ID_User'];
                        $Username	    	= $_POST['Username'];
						$Nama	    	    = $_POST['Nama'];
						$Judul_Buku     	= $_POST['Judul_Buku']; 
                        $Tanggal_Pinjam		= $_POST['Tanggal_Pinjam'];
                        $Tanggal_Selesai    = $_POST['Tanggal_Selesai'];
                        $Tanggal_Konfirmasi = $_POST['Tanggal_Konfirmasi'];
                        $Denda 			   	= $_POST['Denda'];
                        
                    
                        $sql = "INSERT INTO `laporan_peminjaman` (`ID_Laporan`, `ID_Pinjam`, `ID_Exemplar`, `ID_User`, `Username`, 
                        `Nama`, `Judul_Buku`, `Tanggal_Pinjam`, `Tanggal_Selesai`, `Tanggal_Konfirmasi`, `Denda`) 
                        VALUES ('$ID_Laporan', '$ID_Pinjam', '$ID_Exemplar', '$ID_User', '$Username', '$Nama', '$Judul_Buku', 
                        '$Tanggal_Pinjam', '$Tanggal_Selesai', '$Tanggal_Konfirmasi', '$Denda')";

                        $update = mysqli_query($koneksi, "UPDATE list_peminjaman SET
                                                            Status_Konfirmasi='Sudah Konfirmasi'
                                                            WHERE ID_Pinjam='$ID_Pinjam'");

                        mysqli_query($koneksi, $sql);
                        mysqli_query($koneksi, $update);
    
                        echo "<script>window.location.replace('history_list_peminjaman.php?pesan=berhasil_konfirmasi');</script>";
                    }
                ?>
                    <div class="container p-5">
                    <h5 class="text-info">
                        <i class="fa fa-atlas">&nbsp;</i>Buat laporan peminjaman buku 
                    </h5>
                    <div class="card bg-info mb-5 mt-3"></div>
                    
                    <div class="row text-dark">
                    
                        <div class="col-md-6 mb-2">
                            <?php
                                $query  = mysqli_query($koneksi, "SELECT MAX(ID_Laporan) as last FROM laporan_peminjaman");
                                $data   = mysqli_fetch_array($query);
                                $last	= $data['last'];
                                $substr = substr($last, 2, 4);
                                $next   = $substr + 1;
                                $id     = sprintf('%04s', $next);
                            ?>
                            <span>ID Laporan</span>
                            <p class="h4 text-info"><?php echo "LP$id"; ?></p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <span>ID Pinjam</span>
                            <p class="h4 text-info"><?php echo $e['ID_Pinjam']; ?></p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <span>ID Exemplar</span>
                            <p class="h4 text-info"><?php echo $e['ID_Exemplar']; ?></p>
                        </div>
            
                        <div class="col-md-6 mb-2">
                            <span>ID User</span>
                            <p class="h4 text-info"><?php echo $e['ID_User']; ?></p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <span>Username</span>
                            <p class="h4 text-info"><?php echo $e['Username']; ?></p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <span>Nama</span>
                            <p class="h4 text-info"><?php echo $e['Nama']; ?></p>
                        </div>
						<div class="col-md-6 mb-2">
                            <span>Judul Buku</span>
                            <p class="h4 text-info"><?php echo $e['Judul_Buku']; ?></p>
                        </div>
						<div class="col-md-6 mb-2">
                            <span>Tanggal Pinjam</span>
                            <p class="h4 text-info"><?php echo bulan_pinjam(date($e['Tanggal_Pinjam']),true); ?></p>
                        </div>
						<div class="col-md-6 mb-2">
                            <span>Tanggal Selesai</span>
                            <p class="h4 text-info"><?php echo bulan_pinjam(date($e['Tanggal_Selesai']),true); ?></p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <span>Tanggal Konfirmasi</span>
                            <p class="h4 text-info"><?php echo bulan_pinjam(date($e['Tanggal_Konfirmasi']),true); ?></p>
                        </div>

						<div class="col-md-6 mb-2">
                            <?php
                            // Table konfigurasi denda
                            $sqldenda         = mysqli_query($koneksi, "SELECT * FROM konfigurasi_denda");
                            $k                = mysqli_fetch_array($sqldenda);
                            $nominal          = $k['Nominal']; //Get nominal

                            // Formating tanggal
                            $date_selesai     = $e['Tanggal_Selesai'];
                            $date_konfirmasi  = $e['Tanggal_Konfirmasi'];
                            
                            $konfirmasi       = new DateTime($date_konfirmasi); // Tanggal Konfirmasi 
                            $selesai          = new DateTime($date_selesai); //Tanggal Selesai
                            $selisih          = $konfirmasi->diff($selesai);
                            
                            if($konfirmasi < $selesai){
                                $hari = 0;
                            }else{
                                $hari = $selisih->days;
                            }

                            $denda = $hari * $nominal; //Selisih x Nominal
                            ?>
                            <span>Denda Keterlambatan x <?= $k['Nominal']; ?>/Hari</span>
                            <p class="h4 text-info"><?php echo "Rp ".$denda; ?></p>
                            
						</div>

                        <div class="col-md-6 mb-2">
                            <span>Keterlambatan Pengembalian</span>
                            <p class="h4 text-info"><?php echo $hari; ?> Hari</p>
                        </div>

                        <div class="col-md-12">
                            <a href="history_list_peminjaman.php" class="btn btn-danger btn-sm">Batal</a>
                            <input type="submit" class="btn btn-primary btn-sm" value="Konfirmasi" />
                        </div>

                        <input type="hidden" value="<?php echo "LP$id"; ?>" name="ID_Laporan">
                        <input type="hidden" value="<?php echo $e['ID_Pinjam']; ?>" name="ID_Pinjam">
                        <input type="hidden" value="<?php echo $e['ID_Exemplar']; ?>" name="ID_Exemplar">
                        <input type="hidden" value="<?php echo $e['ID_User']; ?>" name="ID_User">
                        <input type="hidden" value="<?php echo $e['Username']; ?>" name="Username">
                        <input type="hidden" value="<?php echo $e['Nama']; ?>" name="Nama">
                        <input type="hidden" value="<?php echo $e['Judul_Buku']; ?>" name="Judul_Buku">
                        <input type="hidden" value="<?php echo $e['Tanggal_Pinjam']; ?>" name="Tanggal_Pinjam">
                        <input type="hidden" value="<?php echo $e['Tanggal_Selesai']; ?>" name="Tanggal_Selesai">
                        <input type="hidden" value="<?php echo $e['Tanggal_Konfirmasi']; ?>" name="Tanggal_Konfirmasi">
                        <input type="hidden" value="<?php echo $denda; ?>" name="Denda">
                        
                    </div>
                </div>
            </form>
                
        </div>
    
        
    </div>
</div>

</body>
</html>