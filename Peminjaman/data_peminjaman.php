<?php 
  include "header_peminjaman.php";
?>
 <div class="container-fluid p-2">
    <div class="card h5">
      
      <div class="card-header">Data Peminjaman</div> 
      <div class="card-body">
        
        <div class="row text-center mb-5">
          
          <!-- Total data -->
            <?php
              // Query reject list
              $result=mysqli_query($koneksi, "SELECT COUNT(Status) as reject_list FROM list_peminjaman WHERE Status='Reject'");
              $reject_list=mysqli_fetch_assoc($result);

              // Query request list
              $result=mysqli_query($koneksi, "SELECT COUNT(Status) as request_list FROM list_peminjaman WHERE Status='Menunggu'");
              $request_list=mysqli_fetch_assoc($result);
              
              // Query active list
              $result=mysqli_query($koneksi, "SELECT COUNT(Status) as active_list FROM list_peminjaman WHERE Status='Active'");
              $active_list=mysqli_fetch_assoc($result);
              
              // Query history list
              $result=mysqli_query($koneksi, "SELECT COUNT(Status) as history_list FROM list_peminjaman WHERE Status='Selesai'");
              $history_list=mysqli_fetch_assoc($result);
            ?>
          <!-- end Total data -->
          
          <!-- Data reject list -->
          <div class="col-lg-3">
              <a class="shadow-sm btn btn-light card border-left-danger p-3" href="reject_list_peminjaman.php">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Reject List</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $reject_list['reject_list']; ?> Unit</div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-comments  fa-2x text-danger"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <!-- end Data reject list -->
          
          <!-- Data request list -->
            <div class="col-lg-3">
              <a class="shadow-sm btn btn-light card border-left-primary p-3" href="request_list_peminjaman.php">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Request List</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $request_list['request_list']; ?> Unit</div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-comments  fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <!-- end Data request list -->
          
          <!-- Data active list -->
            <div class="col-lg-3">
              <a class="shadow-sm btn btn-light card border-left-info p-3" href="active_list_peminjaman.php">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Acitive List</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $active_list['active_list']; ?> Unit</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <!-- end Data active list -->
          
          <!-- Data history list -->
            <div class="col-lg-3">
              <a class="shadow-sm btn btn-light card border-left-success p-3" href="history_list_peminjaman.php">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">History List</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $history_list['history_list']; ?> Unit</div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-calendar-check fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <!-- end Data history list -->
        </div>

        <div class="row text-center mb-5">
        
          <!-- Data history list -->
          <div class="col-lg-12">
              <a class="shadow-sm btn btn-light card border-left-dark" href="konfigurasi_denda.php">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Konfigurasi Denda</div>
                      <i class="far fa-edit fa-2x text-dark"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <!-- end Data history list -->
          
        </div>

        <div class="mb-5 shadow-sm card p-2 text-center">  
          <hr class="bg-primary">
          <div>
            <a class="text-danger">Reject</a> - 
            <a class="text-primary">Request</a> - 
            <a class="text-info">Active</a> - 
            <a class="text-success">History</a>
          </div>
          <hr class="bg-primary">
        </div>

      </div>

    </div>
  </div>

</div>


<!-- 
  <script>
    $(".sidebar-navigation").click(function(e) {
      e.preventDefault();
      $(".sidebar-container").toggleClass("toggled");
    });
  
  </script>
   -->

</body>
</html>