<?php 
  include "header_peminjaman.php";
?>
    <div class="container-fluid p-2">
        
        
        <div class="card">

            <!-- Table Konfigurasi -->
            <?php
                $laporan        = mysqli_query($koneksi, "SELECT * FROM konfigurasi_denda"); 
                $e              = mysqli_fetch_array($laporan);
                $last_update    = bulan_pinjam(date($e['Terakhir_Ubah']),true);
            ?>
            <div class="p-5">
                <h5 class="text-info">
                    <i class="fa fa-edit">&nbsp;</i>Konfigurasi Denda
                </h5>
                <div class="card bg-info mb-5 mt-3"></div>
                
                <!-- pesan alert -->
                <?php include "../asset/pesan.php"; ?>
                <div class="row text-dark">
                
                    <div class="col-md-6 mb-2">
                        <span>Nominal Denda</span>
                        <p class="h4 text-info">Rp <?php echo $e['Nominal']; ?>/Hari</p>
                    </div>
        
                    <div class="col-md-6 mb-2">
                        <span>Terakhir Diubah</span>
                        <p class="h4 text-info"><?php echo $last_update ." - " .$e['Waktu_Ubah']; ?></p>
                    </div>

                    <div class="col-md-12">
                        <a href="data_peminjaman.php" class="btn btn-danger btn-sm">Kembali</a>
                        <a class='btn btn-primary btn-sm' href='<?php echo "konfigurasi_edit.php?id=$e[ID_Konfigurasi]" ?>'>
                        Edit Konfigurasi   
                        </a>
                    </div>
                </div>
            </div>
        
                
        </div>
    
        
    </div>
</div>

</body>
</html>