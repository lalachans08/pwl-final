<?php 
  include "header_peminjaman.php";
?>  
    <!-- Container fuild -->
    <div class="container-fluid p-2">

      <!-- Card -->
      <div class="card">
          <div class="card-header h5">Requset List</div>
          
          <!-- Data request -->
          <div class="card-body">
            
            <div class="mb-2">
              <a href="data_peminjaman.php" class="btn btn-danger btn-sm btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-arrow-left mt-1"></i>
                </span>
                <span class="text">Kembali</span>
              </a>
            </div>

            <!-- Alert pesan -->
            <?php include "../asset/pesan.php"; ?>

            <!-- Table request -->
            <div class="table-responsive">
              <table id='dataTables-example' class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID Pinjam</th>
                    <th>ID Exemplar</th>
                    <th>ID Anggota</th>
                    <th>Username</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql=mysqli_query($koneksi, "SELECT list_peminjaman.*, 
                  data_buku.ID_Buku, data_buku.Judul_Buku, user.ID_User, user.Username 
                  FROM `list_peminjaman`
                  INNER JOIN `data_buku` ON data_buku.ID_Buku = list_peminjaman.ID_Buku 
                  INNER JOIN `user` ON user.ID_User = list_peminjaman.ID_User
                  WHERE Status='Menunggu'");
                  
                  while($d=mysqli_fetch_array($sql)){
                    
                    // Formating tanggal
                    $date_pinjam  = bulan_pinjam(date($d['Tanggal_Pinjam']),true);
                    $date_selesai = bulan_pinjam(date($d['Tanggal_Selesai']),true);

                    echo "<tr id='search'>
                            <td width='90px'>$d[ID_Pinjam]</td>
                            <td width='90px'>$d[ID_Exemplar]</td>
                            <td width='90px'>$d[ID_User]</td>
                            <td width='90px'>$d[Username]</td>
                            <td width='90px'>$d[Judul_Buku]</td>
                            <td width='90px'>$date_pinjam - $d[Waktu_Pinjam]</td>
                            <td width='90px'>$date_selesai</td>
                            <td width='90px'>$d[Status]</td>
                          
                            <td align='center' width='70px'>";
                            if ($d['Status'] == 'Menunggu'){
                              echo "<a class='btn btn-outline-success btn-sm btn-circle' 
                              href='request_list_terima.php?act=setuju&
                              ID_Pinjam=$d[ID_Pinjam]&ID_Exemplar=$d[ID_Exemplar]'>
                              <i class='fas fa-check'></i></a> ";
                            }
                            if ($d['Status'] == 'Menunggu'){
                              echo "<a class='btn btn-outline-danger btn-sm btn-circle' 
                              href='request_list_tolak.php?id=$d[ID_Pinjam]'>
                              <i class='fas fa-sign-out-alt'></i></a>";
                            }
                      echo "</td>
                          </tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- end Table request -->
            
          </div>
          <!-- end Data request -->
      
      </div>
      <!-- end Card -->
    
    </div>
    <!-- end Container fluid -->
    
</div>
<!-- end Content container -->
</body>
</html>