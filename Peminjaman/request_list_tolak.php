<?php 
  include "header_peminjaman.php";
?>
    <div class="container-fluid p-2">
        
        <div class="card" id="scroll">
  
            <form method="post" action="" class="ml-2">
            
                <!-- Buat laporan peminjaman -->
                <?php
                    $laporan=mysqli_query($koneksi, "SELECT list_peminjaman.*, 
					data_buku.ID_Buku, data_buku.Judul_Buku, user.ID_User, user.Username 
					FROM `list_peminjaman`
					INNER JOIN `data_buku` ON data_buku.ID_Buku = list_peminjaman.ID_Buku 
					INNER JOIN `user` ON user.ID_User = list_peminjaman.ID_User
					WHERE ID_Pinjam='$_GET[id]'");
                    $e=mysqli_fetch_array($laporan);

                    $date_pinjam  = bulan_pinjam(date($e['Tanggal_Pinjam']),true);
                    $date_selesai = bulan_pinjam(date($e['Tanggal_Selesai']),true);
                ?>
                <!-- Simpan laporan -->
                <?php
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        
                        $ID_Pinjam        	= $_POST['ID_Pinjam'];
                        $ID_Exemplar       	= $_POST['ID_Exemplar'];
                        $Alasan 		   	= $_POST['Alasan'];
                        
                        //simpan data laporan
                        if($Alasan==''){

                            header('location:request_list_tolak.php?pesan=data_kurang');

                        }else{
							$Update_exemplar = mysqli_query($koneksi, "UPDATE data_exemplar 
							SET Keterangan='Tersedia'
							WHERE ID_Exemplar='$ID_Exemplar'");

							$Update_list_peminjaman = mysqli_query($koneksi, "UPDATE list_peminjaman 
							SET Alasan='$Alasan',
							Status='Reject'
							WHERE ID_Pinjam='$ID_Pinjam'");

							mysqli_query($koneksi, $Update_exemplar);
							mysqli_query($koneksi, $Update_list_peminjaman);
                            
                            echo "<script>window.location.replace('reject_list_peminjaman.php?pesan=tolak');</script>";
						}
                    }
                ?>
                    <div class="p-5">
                    <h5 class="text-info">
                        <i class="fa fa-atlas">&nbsp;</i>Konfirmasi Penolakan 
                    </h5>
                    <div class="card bg-info mb-5 mt-3"></div>
                    
                    <div class="row text-dark">
                    
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
                            <span>Judul Buku</span>
                            <p class="h4 text-info"><?php echo $e['Judul_Buku']; ?></p>
                        </div>
						<div class="col-md-6 mb-2">
                            <span>Tanggal Pinjam</span>
                            <p class="h4 text-info"><?php echo $date_pinjam.' - ' . $e['Waktu_Pinjam']; ?></p>
                        </div>
						<div class="col-md-6 mb-2">
                            <span>Tanggal Selesai</span>
                            <p class="h4 text-info"><?php echo $date_selesai; ?></p>
                        </div>
						<div class="col-md-12 mb-2">
                            <span>Alasan Penolakan</span>
							<textarea name="Alasan" class="form-control" rows="3" required placeholder="Masukan alasan.."></textarea>
                        </div>

                        <div class="col-md-12">
                            <a href="request_list_peminjaman.php" class="btn btn-danger btn-sm">Batal</a>
                            <input type="submit" class="btn btn-primary btn-sm" value="Konfirmasi" />
                        </div>

                        <input type="hidden" value="<?php echo $e['ID_Pinjam']; ?>" name="ID_Pinjam">
                        <input type="hidden" value="<?php echo $e['ID_Exemplar']; ?>" name="ID_Exemplar">
                    
                    </div>
                </div>
            </form>
                
        </div>
    
        
    </div>
</div>
</body>
</html>