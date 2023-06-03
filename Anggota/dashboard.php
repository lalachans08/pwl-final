<?php 
    include "header_anggota.php"
?>
  <!-- Container fluid -->
  <div class="container-fluid p-2">

    <!-- Card 1 -->
    <div class="card">
      
      <!-- Card Data peminjaman -->
      <div class="card-body">

        <!-- Card selamat datang -->
        <div class='p-2 card border-bottom-primary text-center text-white mb-2'>
          <a class="text-primary text-lg"><b>Selamat Datang di Perpustakaan <?php echo $_SESSION['Nama'] ?><b></a>
          <a class="text-dark text-lg"><b>Last login : <?php echo $_SESSION['Last_Login'] ?></b></a>
        </div>

        <div class="text-center">
        <!-- Alert pesan -->
        <?php include "../asset/pesan.php"; ?>
        </div>

        <!-- Row data peminjaman -->
        <div class="row">
          <?php
            // Query reject list
            $result=mysqli_query($koneksi, "SELECT COUNT(Status) as reject_list FROM list_peminjaman 
            WHERE Status='Reject' and ID_User='$_SESSION[ID_User]'");
            $reject_list=mysqli_fetch_assoc($result);
            
            // Query request list
            $result=mysqli_query($koneksi, "SELECT COUNT(Status) as request_list FROM list_peminjaman 
            WHERE Status='Menunggu' and ID_User='$_SESSION[ID_User]'");
            $request_list=mysqli_fetch_assoc($result);
            
            // Query active list
            $result=mysqli_query($koneksi, "SELECT COUNT(Status) as active_list FROM list_peminjaman 
            WHERE Status='Active' and ID_User='$_SESSION[ID_User]'");
            $active_list=mysqli_fetch_assoc($result);
            
            // Query history list
            $result=mysqli_query($koneksi, "SELECT COUNT(Status) as history_list FROM list_peminjaman 
            WHERE Status='Selesai' and ID_User='$_SESSION[ID_User]'");
            $history_list=mysqli_fetch_assoc($result);
          
            // Query data buku tersedia 
            $result=mysqli_query($koneksi, "SELECT COUNT(Keterangan) as buku_tersedia FROM data_exemplar 
            WHERE Keterangan='Tersedia'");
            $buku_tersedia=mysqli_fetch_assoc($result);
          ?>

          <!-- Data Reject list -->
          <div class="col-lg-3 p-2">
            <div id="card-1" class="shadow-sm card p-4">
              <div class="card-body bg-light rounded-lg border-left-danger">
                <div class="row no-gutters align-items-center">
                  <div class="">
                    <div class="h5 font-weight-bold text-danger mb-1">Reject List</div>
                    <div class="h5 mb-0 font-weight-bold text-dark"><?php echo $reject_list['reject_list']; ?> Unit</div>
                  </div>
                  <div class="col text-right">
                    <i class="fas fa-times fa-2x text-danger"></i>
                  </div>
                </div>
              </div>
            </div>
            <a class="btn btn-light font-weight-bold text-primary card" href="reject_list_anggota.php">
            <i class="fa fa-arrow-right"></i>
              Cek
            </a>
          </div>          
          <!-- end Data request list -->

          <!-- Data request list -->
          <div class="col-lg-3 p-2">
            <div id="card-1" class="shadow-sm card p-4">
              <div class="card-body bg-light rounded-lg border-left-primary">
                <div class="row no-gutters align-items-center">
                  <div class="">
                    <div class="h5 font-weight-bold text-primary mb-1">Request List</div>
                    <div class="h5 mb-0 font-weight-bold text-dark"><?php echo $request_list['request_list']; ?> Unit</div>
                  </div>
                  <div class="col text-right">
                    <i class="far fa-comments fa-2x text-primary"></i>
                  </div>
                </div>
              </div>
            </div>
            <a class="btn btn-light font-weight-bold text-primary card" href="request_list_anggota.php">
            <i class="fa fa-arrow-right"></i>
              Cek
            </a>
          </div>          
          <!-- end Data request list -->

          <!-- Data active list -->
          <div class="col-lg-3 p-2">
            <div id="card-2" class="shadow-sm card p-4">
              <div class="card-body bg-light rounded-lg border-left-info">
                <div class="row no-gutters align-items-center">
                  <div class="">
                    <div class="h5 font-weight-bold text-info mb-1">Active List</div>
                    <div class="h5 mb-0 font-weight-bold text-dark"><?php echo $active_list['active_list']; ?> Unit</div>
                  </div>
                  <div class="col text-right">
                    <i class="fas fa-clipboard-list fa-2x text-info"></i>
                  </div>
                </div>
              </div>
            </div>
            <a class="btn btn-light font-weight-bold text-info card" href="active_list_anggota.php">
            <i class="fa fa-arrow-right"></i>
              Cek
            </a>
          </div>          
          <!-- end Data request list -->

          <!-- Data history list -->
          <div class="col-lg-3 p-2">
            <div id="card-3" class="shadow-sm card p-4">
              <div class="card-body bg-light rounded-lg border-left-success">
                <div class="row no-gutters align-items-center">
                  <div class="">
                    <div class="h5 font-weight-bold text-success mb-1">History List</div>
                    <div class="h5 mb-0 font-weight-bold text-dark"><?php echo $history_list['history_list']; ?> Unit</div>
                  </div>
                  <div class="col text-right">
                    <i class="fas fa-calendar-check fa-2x text-success"></i>
                  </div>
                </div>
              </div>
            </div>
            <a class="btn btn-light font-weight-bold text-success card" href="history_list_anggota.php">
            <i class="fa fa-arrow-right"></i>
              Cek
            </a>
          </div>          
          <!-- end Data history list -->

        </div>
        <!-- end Row data pemminjaman -->

      </div>
      <!-- end Card data peminjaman -->

    </div>
    <!-- end Card 1 -->

    <!-- Card 2 -->
    <div class="card h5">
    
      <!-- Menu pinjam buku -->
      <div class="card-header">Menu Buku</div> 
      <div class="card-body">

        <!-- Row pinjam buku -->
        <div class="row">

          <!-- Data buku yang akan dipinjam -->
          <div class="col-lg-3 p-2">
            <div id="card-3" class="shadow-sm card p-4">
              <div class="card-body bg-light rounded-lg border-left-primary">
                <div class="row no-gutters align-items-center">
                  <div class="">
                    <div class="h5 font-weight-bold text-primary mb-1">Data buku tersedia</div>
                    <div class="h5 mb-0 font-weight-bold text-dark"><?php echo $buku_tersedia['buku_tersedia']; ?> Unit</div>
                  </div>
                  <div class="col text-right">
                    <i class="fas fa-atlas fa-2x text-primary"></i>
                  </div>
                </div>
              </div>
            </div>
            <a class="btn btn-light font-weight-bold text-primary card" href="user_exemplar.php">
              <i class="fa fa-arrow-right"></i>
              Cek
            </a>
          </div>    
          <!-- end Data buku yang akan dipinjam -->

        </div>
        <!-- end Row pinjam buku -->

      </div>
      <!-- end Menu pinjam buku -->

    </div>
    <!-- end Card 2 -->
  
  </div>
  <!-- end Container fluid -->
</div>
<!-- end Content container -->
</body>
</html>