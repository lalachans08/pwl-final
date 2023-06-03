<?php 
  include "header_anggota.php";
?>
    <!-- Container fluid -->
    <div class="container-fluid p-2">

      <!-- Card -->
      <div class="card">

          <div class="card-header text-center">Request List</div>

          <!-- Data Request list buku -->
          <div class="card-body">
            
            <input class="form-control mb-2" id="myInput" type="text" placeholder="Cari data">
            <div class="mb-2">
              <a href="dashboard.php" class="btn btn-outline-danger btn-sm">Kembali</a>
            </div>
            
            <?php include "../asset/pesan.php"; ?>
            <!-- Table Request list -->
            <div class="table-responsive">
              <table id='myTable' class="table table-bordered">
                <?php
                $sql=mysqli_query($koneksi, "SELECT list_peminjaman.*, 
                data_buku.ID_Buku, data_buku.Judul_Buku 
                FROM `list_peminjaman`
                INNER JOIN `data_buku` ON data_buku.ID_Buku = list_peminjaman.ID_Buku 
                WHERE ID_User='$_SESSION[ID_User]' and Status='Menunggu' ORDER BY ID_Pinjam DESC");
                
                while($d=mysqli_fetch_array($sql)){

                  // Formating tanggal
                  $date_pinjam  = bulan_pinjam(date($d['Tanggal_Pinjam']),true);
                  $date_selesai = bulan_pinjam(date($d['Tanggal_Selesai']),true);
                
                  echo "<tr id='search'>
                          <td width='1500px'>
                          <span>ID Pinjam</span>
                          <p class='h5 text-info'>$d[ID_Pinjam]</p>
                          
                          <span>Judul Buku</span>
                          <p class='h5 text-info'>$d[Judul_Buku]</p>
                          </td>
                          <td>
                          <a id='detail' href='' class='btn btn-info btn-circle detail btn-sm' data-toggle='modal' data-target='#modal-detail' 
                          data-idpinjam='$d[ID_Pinjam]'
                          data-idexemplar='$d[ID_Exemplar]' 
                          data-judulbuku='$d[Judul_Buku]'
                          data-tanggalpinjam='$date_pinjam - $d[Waktu_Pinjam]' 
                          data-tanggalselesai='$date_selesai' 
                          data-status='$d[Status]'
                          ><i class='fas fa-info'></i></a>
                          </td>
                        </tr>
                        ";
                }
                ?>
              </table>
            </div>
            <!-- end Table Request list -->
            
            <!-- Modal Informasi Data Buku -->
            <div class="modal fade" id="modal-detail">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Informasi Buku</h5>
                        </div>
                        <div class="modal-body">
                            
                            <!-- Detail Buku -->
                            <div class="row p-5">
                            <div class="col-md-6 mb-2">
                                <span class="h6">ID Pinjam</span>
                                <p id="ID_Pinjam" class="h5 text-info"></p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <span class="h6">ID Exemplar</span>
                                <p id="ID_Exemplar" class="h5 text-info"></p>
                            </div>

                            <div class="col-md-6 mb-2">
                                <span class="h6">Judul Buku</span>
                                <p id="Judul_Buku" class="h5 text-info"></p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <span class="h6">Status</span>
                                <p id="Status" class="h5 text-info"></p>
                            </div>

                            <div class="col-md-6 mb-2">
                                <span class="h6">Tanggal Pinjam</span>
                                <p id="Tanggal_Pinjam" class="h5 text-info"></p>
                            </div>

                            <div class="col-md-6 mb-2">
                                <span class="h6">Tanggal Selesai</span>
                                <p id="Tanggal_Selesai" class="h5 text-info"></p>
                            </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-info btn-sm text-right mr-2" href="" data-dismiss="modal">Tutup</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Modal Informasi Data Buku -->
            
          </div>
          <!-- end Data Request list buku -->
          
      </div>
      <!-- end Card -->
 
    </div>
    <!-- end Container fluid -->

</div>
<!-- end Contern container -->
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

// Menampilkan informasi buku
$(document).ready(function(){
    $('.detail').click(function() {
        var idpinjam = $(this).attr('data-idpinjam');
        $('#ID_Pinjam').text(idpinjam);

        var idexemplar = $(this).attr('data-idexemplar');
        $('#ID_Exemplar').text(idexemplar);

        var judulbuku = $(this).attr('data-judulbuku');
        $('#Judul_Buku').text(judulbuku);

        var tanggalpinjam = $(this).attr('data-tanggalpinjam');
        $('#Tanggal_Pinjam').text(tanggalpinjam);

        var tanggalselesai = $(this).attr('data-tanggalselesai');
        $('#Tanggal_Selesai').text(tanggalselesai);
        
        var status = $(this).attr('data-status');
        $('#Status').text(status);

    });
});
</script>
</body>
</html>