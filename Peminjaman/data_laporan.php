<?php 
  include "header_peminjaman.php";
?>  
    <!-- Container fuild -->
    <div class="container-fluid p-2">

      <!-- Card -->
      <div class="card">
          <div class="card-header h5">Data Laporan</div>
          
          <!-- Data laporan -->
          <div class="card-body">
            
            <div class="mb-2">
              <a href="data_peminjaman.php" class="btn btn-primary btn-sm btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-arrow-left mt-1"></i>
                </span>
                <span class="text">Data Peminjaman</span>
              </a>
            </div>

            <!-- Alert pesan -->
            <?php include "../asset/pesan.php"; ?>

            <!-- Table laporan -->
            <div class="table-responsive">
              <table id='dataTables-example' class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID Laporan</th>
                    <th>ID Pinjam</th>
                    <th>ID Exemplar</th>
                    <th>ID Anggota</th>
                    <th>Username</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Selesai</th>
                    <th>Tanggal Konfirmasi</th>
                    <th>Denda</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql=mysqli_query($koneksi, "SELECT * FROM laporan_peminjaman");
              
                  while($d=mysqli_fetch_array($sql)){
              
                  // Formating tanggal
                  $date_pinjam      = bulan_pinjam(date($d['Tanggal_Pinjam']),true);
                  $date_selesai     = bulan_pinjam(date($d['Tanggal_Selesai']),true);
                  $date_konfirmasi  = bulan_pinjam(date($d['Tanggal_Konfirmasi']),true);
                        
                    echo "<tr id='search'>
                            <td width=''>$d[ID_Laporan]</td>
                            <td width=''>$d[ID_Pinjam]</td>
                            <td width=''>$d[ID_Exemplar]</td>
                            <td width=''>$d[ID_User]</td>
                            <td width=''>$d[Username]</td>
                            <td width=''>$d[Judul_Buku]</td>
                            <td width=''>$date_pinjam</td>
                            <td width=''>$date_selesai</td>
                            <td width=''>$date_konfirmasi</td>
                            <td width=''>Rp.$d[Denda]</td>
                            <td align='center'>
                              <a class='btn btn-outline-success btn-sm' href='cetak_laporan.php?id=$d[ID_Laporan]'>
                              <i class='fas fa-print'></i></a>
                            </td>
                          </tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- end Table laporan -->
            
          </div>
          <!-- end Data laporan -->
      
      </div>
      <!-- end Card -->
    
    </div>
    <!-- end Container fluid -->
    
</div>
<!-- end Content container -->
</body>
</html>