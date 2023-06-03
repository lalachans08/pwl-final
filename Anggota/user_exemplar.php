<?php 
  include "header_anggota.php";
?>  
  <!-- Container fluid -->
  <div class="container-fluid p-2">
    
    <!-- Card -->
    <div class="card">

      <div class="card-header h5">
        <a href="dashboard.php" class="btn btn-outline-danger btn-sm">Kembali</a>
      </div>
      
      <!-- Data buku exemplar -->
      <div class="card-body">
        
        <div class="text-center mb-2">
          <p class='p-2 h6 shadow-sm rounded-lg border-left-primary'>Silakan pilih buku untuk di request</p> 
        </div>
        
        <div class="row mb-2">
          <?php 
          // -----------------Judul Populer-------------------------------
          $date = date('Y-m');
          $trend=mysqli_query($koneksi,"SELECT data_buku.ID_Buku,data_buku.Judul_Buku, 
          COUNT(substr(ID_Exemplar,3,5)) as trend
          FROM `list_peminjaman` INNER JOIN data_buku on 
          data_buku.ID_Buku = list_peminjaman.ID_Buku
          WHERE Tanggal_Pinjam LIKE'%$date%' GROUP BY ID_Buku ORDER BY trend DESC LIMIT 1");
          $t=mysqli_fetch_array($trend);

          // ------------------Kategori populer---------------------------
          $kategori_populer=mysqli_query($koneksi,"SELECT data_buku.ID_Buku,data_buku.Kategori,data_buku.Judul_Buku, 
          COUNT(substr(ID_Exemplar,3,5)) as Total
          FROM `list_peminjaman` INNER JOIN data_buku on 
          data_buku.ID_Buku = list_peminjaman.ID_Buku
          WHERE Tanggal_Pinjam LIKE'%$date%' GROUP BY Kategori ORDER BY Total DESC LIMIT 1");
          $kp=mysqli_fetch_array($kategori_populer);
          
          // ------------------Judul Terbaru------------------------------
          $buku_terbaru=mysqli_query($koneksi,"SELECT MAX(substr(ID_Buku,2,4)) as Buku_Terbaru FROM data_buku");
          $bt=mysqli_fetch_array($buku_terbaru);
          $judul_terbaru = $bt['Buku_Terbaru']; //substr ID_Buku = -0001-

          $buku_terbaru1=mysqli_query($koneksi,"SELECT * FROM data_buku WHERE ID_Buku LIKE'%$judul_terbaru%'");
          $bt1=mysqli_fetch_array($buku_terbaru1);
          ?>
          <!-- Data buku Populer -->
            <div class="col-lg-3 p-2">
              <div id="card-1" class="shadow-sm card p-4">
                <div class="card-body bg-light rounded-lg border-left-primary">
                  <div class="row no-gutters align-items-center">
                    <div class="">
                      <div class="h5 font-weight-bold text-primary mb-1">Judul Populer</div>
                      <div class="h5 mb-0 font-weight-bold text-dark"><?php 
                                                                        if($t==null){
                                                                        echo "Belum Ada";
                                                                        }else{
                                                                        echo $t['Judul_Buku'];
                                                                        } 
                                                                      ?>
                      </div>
                    </div>
                    <div class="col text-right">
                      <i class="fas fa-atlas fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
          <!-- end Data buku Populer -->
          
          <!-- Kategori buku Populer -->
          <div class="col-lg-3 p-2">
              <div id="card-2" class="shadow-sm card p-4">
                <div class="card-body bg-light rounded-lg border-left-primary">
                  <div class="row no-gutters align-items-center">
                    <div class="">
                      <div class="h5 font-weight-bold text-primary mb-1">Kategori Populer</div>
                      <div class="h5 mb-0 font-weight-bold text-dark"><?php 
                                                                        if($kp==null){
                                                                        echo "Belum Ada";
                                                                        }else{
                                                                        echo $kp['Kategori'];
                                                                        } 
                                                                      ?>
                      </div>
                    </div>
                    <div class="col text-right">
                      <i class="fas fa-atlas fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
          <!-- end Kategori buku Populer -->

          <!-- Data buku Terbaru -->  
          <div class="col-lg-3 p-2">
              <div id="card-3" class="shadow-sm card p-4">
                <div class="card-body bg-light rounded-lg border-left-primary">
                  <div class="row no-gutters align-items-center">
                    <div class="">
                      <div class="h5 font-weight-bold text-primary mb-1">Buku Terbaru</div>
                      <div class="h5 mb-0 font-weight-bold text-dark"><?php echo $bt1['Judul_Buku']; ?> </div>
                    </div>
                    <div class="col text-right">
                      <i class="fas fa-atlas fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
          <!-- end Data buku Terbaru -->

        </div>

        <!-- Table data exemplar -->
        <div class="table-responsive">
          <table id='dataTables-example' class="table table-bordered">
            <thead>
              <tr>
                <th>ID Exemplar</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql=mysqli_query($koneksi, "SELECT data_exemplar.*, 
                data_buku.ID_Buku, data_buku.Judul_Buku, data_buku.Kategori 
                FROM `data_exemplar`
                INNER JOIN `data_buku` ON data_buku.ID_Buku = data_exemplar.ID_Buku
                WHERE Keterangan='Tersedia'
                ORDER BY ID_Exemplar DESC");

                
                while($d=mysqli_fetch_array($sql)){
                  
                  // if($d['Judul_Buku'] == $t['Judul_Buku']){
                  //   $most = "(Populer)";
                  //   $terbaru = "";
                  // }elseif($d['Judul_Buku'] == $bt1['Judul_Buku']){
                  //   $most = "";
                  //   $terbaru = "(Terbaru)";
                  // }else{
                  //   $most = "";
                  //   $terbaru ="";
                  // }

                  echo "<tr class=''>
                          <td width='150px'>$d[ID_Exemplar]</td>
                          <td width='150px'>$d[Judul_Buku]</td>
                          <td width='150px'>$d[Kategori]</td>
                          <td align='center' width='50px'>";
                          if ($d['Keterangan'] == 'Tersedia'){
                            echo "
                            <a class='btn btn-outline-primary btn-sm' href='anggota_konfirmasi.php?id=$d[ID_Exemplar]'>
                            Pinjam</a>
                            ";
                            
                          }
                    echo "</td>
                        </tr>
                        ";
                }
              ?>
            </tbody>
          </table>
        </div>
        <!-- end Table data exemplar -->
      
      </div>
      <!-- end Data buku exemplar -->
        
    </div>
    <!-- end Card -->

  </div>
    <!-- end Container fluid -->

</div>
<!-- end Content container -->
<script>
// Search data
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable #search").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>