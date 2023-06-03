<?php 
  include "header_penerimaan.php";
?>
 
  <!-- Container fluid -->
  <div class="container-fluid p-2">

    <!-- Card -->
    <div class="card h5">
      <div class="card-header">Kategori Data Buku</div> 
      
      <!-- Card jumlah data -->
      <div class="card-body">

        <!-- Row jumlah data -->
        <h5 class="card shadow-sm bg-primary text-white mb-3 p-2">Data buku</h5>
        <div class="row text-center mb-5">
          <?php
            // Query data buku
            $result=mysqli_query($koneksi, "SELECT COUNT(ID_Buku) as total_buku FROM data_buku");
            $data_buku=mysqli_fetch_assoc($result);
            
            // Query data exemplar
            $result=mysqli_query($koneksi, "SELECT COUNT(ID_Exemplar) as total_exemplar FROM data_exemplar");
            $data_exemplar=mysqli_fetch_assoc($result);

            // Query data buku dipinjam
            $result=mysqli_query($koneksi, "SELECT COUNT(Keterangan) as total_pinjam FROM data_exemplar WHERE Keterangan='Di pinjam'");
            $data_dipinjam=mysqli_fetch_assoc($result);

            // Query data buku dipinjam
            $result=mysqli_query($koneksi, "SELECT COUNT(Keterangan) as total_request FROM data_exemplar WHERE Keterangan='Booked'");
            $data_request=mysqli_fetch_assoc($result);
            
            // Query data buku tersedia
            $result=mysqli_query($koneksi, "SELECT COUNT(Keterangan) as total_tersedia FROM data_exemplar WHERE Keterangan='Tersedia'");
            $data_tersedia=mysqli_fetch_assoc($result);
          ?>
          <!-- Card total data buku -->
          <div class="col-lg-3">
            <a class="shadow-sm card border-left-primary p-3 btn btn-light" href="databuku.php">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Buku</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data_buku['total_buku']; ?> Unit</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-book fa-2x text-primary"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <!-- end Card total data buku -->

          <!-- Card total data exemplar -->
          <div class="col-lg-3">
            <a class="shadow-sm card border-left-info p-3 btn btn-light" href="data_exemplar.php">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Exemplar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data_exemplar['total_exemplar']; ?> Unit</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-atlas fa-2x text-info"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <!-- end Card total data exemplar -->
        
        </div>
        <!-- end Row jumlah data -->

        <!-- Row jumlah data pinjam -->
        <h5 class="card shadow-sm bg-info text-white mb-3 p-2">Data ketersediaan buku</h5>
        <div class="row text-center mb-5">    

          <!-- Card total data buku request -->
          <div class="col-lg-3">
            <div class="shadow-sm card border-left-primary p-3">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Buku Request</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data_request['total_request']; ?> Unit</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard fa-2x text-primary"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end Card total data buku request -->
      
          <!-- Card total data buku dipinjam -->
          <div class="col-lg-3">
            <div class="shadow-sm card border-left-warning p-3">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Buku dipinjam</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data_dipinjam['total_pinjam']; ?> Unit</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-warning"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end Card total data buku dipinjam -->

          <!-- Card total data buku tersedia -->
          <div class="col-lg-3">
            <div class="shadow-sm card border-left-success p-3">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Buku Tersedia</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data_tersedia['total_tersedia']; ?> Unit</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard-check fa-2x text-success"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end Card total data buku tersedia -->
      
        </div>
        <!-- end Row jumlah data pinjam -->
      
      </div>
      <!-- end Card jumlah data -->

    </div>
    <!-- end Card -->

  </div>
  <!-- end Container fluid -->

</div>
<!-- end Content container -->
</body>
</html>