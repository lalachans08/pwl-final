<?php 
  include "header_peminjaman.php";
?>
  <!-- Container fuild -->
  <div class="container-fluid p-2">

    <!-- Card -->
    <div class="card shadow-lg">

      <!-- Card data total -->
      <div class="card-body" id="dashboard-penerimaan">
        
        <!-- Card selamat datang -->
        <div class="card text-center mb-5 p-5 rounded-lg shadow-lg">
          <!-- Alert pesan -->
          <?php include "../asset/pesan.php"; ?>
          
          <hr class="bg-primary">
          <a class="text-primary text-lg mb-2"><b>SELAMAT DATANG DI PERPUSTAKAAN</b></a>
          <a class="text-primary text-lg mb-2"><b><?php echo $_SESSION['Nama'] ?></b></a>
          <a class="text-dark text-lg"><b>Last login : <?php echo $_SESSION['Last_Login'] ?></b></a>
          <hr class="bg-primary">
        </div>
        
        <!-- Total data keseluruhan -->
        <div class="row text-center mb-5">
          <?php
            // Jumlah data buku
            $result=mysqli_query($koneksi, "SELECT COUNT(ID_Buku) as total_buku FROM data_buku");
            $data_buku=mysqli_fetch_assoc($result);
            
            // Jumlah data exemplar
            $result=mysqli_query($koneksi, "SELECT COUNT(ID_Exemplar) as total_exemplar FROM data_exemplar");
            $data_exemplar=mysqli_fetch_assoc($result);
            
            // Jumlah data anggota
            $result=mysqli_query($koneksi, "SELECT COUNT(ID_User) as total_anggota FROM user WHERE Level='Anggota'");
            $data_anggota=mysqli_fetch_assoc($result);
          ?>
          <!-- Card total data buku -->
          <div class="col-lg-4">
            <div class="shadow-lg card border-left-primary p-3">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Data Buku</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data_buku['total_buku']; ?> Unit</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-primary"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end Card total data buku -->
          
          <!-- Card total data exemplar -->
          <div class="col-lg-4">
            <div class="shadow-lg card border-left-info p-3">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Data Exemplar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data_exemplar['total_exemplar']; ?> Unit</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-atlas fa-2x text-info"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end Card total data exemplar -->
          
          <!-- Card total data anggota -->
          <div class="col-lg-4">
            <div class="shadow-lg card border-left-success p-3">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Data Anggota</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data_anggota['total_anggota']; ?> Orang</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-user fa-2x text-success"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end Card total data anggota -->
          
        </div>
        <!-- end Total data keseluruhan -->
        
      </div>
      <!-- end Card data total -->
  
    </div>
    <!-- end Card -->

  </div>
  <!-- end Container fluid -->

</div>
<!-- end Content container -->
</body>
</html>