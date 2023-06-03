<?php 
  include "header_penerimaan.php";
?>
  <!-- Container fluid -->
  <div class="container-fluid p-2">
    
    <!-- Card -->
    <div class="card">
        
      <div class="card-header h5">Data Aktivitas</div>
      
      <!-- Data Aktivitas -->
      <div class="card-body table-responsive">
        
        <div class="mb-2">
            <a href="kategori_buku.php" class="btn btn-danger btn-icon-split btn-sm">
              <span class="icon text-white-50">
                <i class="fas fa-arrow-left mt-1"></i>
              </span>
              <span class="text">Kembali</span>
            </a>
        </div>
        
        <!-- Alert pesan -->
        <?php include "../asset/pesan.php" ?>

        <!-- Table Aktivitas -->
        <table class="table table-bordered" id="dataTables-example">
          <thead>
            <tr>
              <!-- <th>No</th> -->
              <th>Aktivitas</th>
              <th>Waktu Aktivitas</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql=mysqli_query($koneksi, "SELECT * FROM aktivitas_user
          ORDER BY Waktu_Aktivitas DESC");
          
          while($d=mysqli_fetch_array($sql)){
            
            $waktu = bulan_pinjam(date($d['Tanggal_Aktivitas']),true);
            // $no = 0;
            // $no++;
            echo "<tr class=''>
                    
                    <td width=''>$d[Aktivitas]</td>
                    <td width='200px'>$waktu - $d[Waktu_Aktivitas]</td>
                  </tr>
                  ";
          }
          ?>
          </tbody>
        </table>
        <!-- end Table Aktivitas -->

      </div>
      <!-- end Data Aktivitas -->
    
    </div>
    <!-- end Card -->

  </div>
  <!-- end Container fluid -->
  
</div>
<!-- end Content container -->

</body>
</html>