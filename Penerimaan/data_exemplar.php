<?php 
  include "header_penerimaan.php";
?>
  <!-- Container fluid -->
  <div class="container-fluid p-2">
    
    <!-- Card -->
    <div class="card">
        
      <div class="card-header h5">Data Exemplar</div>
      
      <!-- Data exemplar -->
      <div class="card-body">
        
        <div class="mb-2">
            <a href="kategori_buku.php" class="btn btn-danger btn-icon-split btn-sm">
              <span class="icon text-white-50">
                <i class="fas fa-arrow-left mt-1"></i>
              </span>
              <span class="text">Kembali</span>
            </a>
            <a href="exemplar_tambah.php" class="btn btn-info btn-icon-split btn-sm">
              <span class="icon text-white-50">
              <i class="fas fa-plus mt-1"></i>
              </span>
              <span class="text">Tambah data</span>
            </a>
        </div>
        
        <!-- Alert pesan -->
        <?php include "../asset/pesan.php" ?>

        <!-- Table exemplar -->
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTables-example">
            <thead>
              <tr>
                <th>ID Exemplar</th>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Ket. Buku</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $sql=mysqli_query($koneksi, "SELECT data_exemplar.*, 
            data_buku.ID_Buku, data_buku.Judul_Buku, data_buku.Kategori 
            FROM `data_exemplar`
            INNER JOIN `data_buku` ON data_buku.ID_Buku = data_exemplar.ID_Buku
            ORDER BY ID_Exemplar DESC");
            
            while($d=mysqli_fetch_array($sql)){
            
              $Keterangan = $d['Keterangan'];

              if($Keterangan == 'Tersedia'){
                $color = "text-gray-900";
              }elseif($Keterangan == 'Booked'){ 
                $color = "text-primary";
              }else{
                $color = "text-success";
              }

              echo "<tr class='$color'>
                      <td width='150px'>$d[ID_Exemplar]</td>
                      <td width='150px'>$d[ID_Buku]</td>
                      <td width='150px'>$d[Judul_Buku]</td>
                      <td width='150px'>$d[Kategori]</td>
                      <td width='100px'>$d[Keterangan]</td>
                      <td align='center' width='70px'>
                      
                      <a href='#modalref' class='ex-refresh btn btn-outline-info btn-sm btn-circle' data-id='$d[ID_Exemplar]' 
                      role='button' data-toggle='modal' data-idexemplar='$d[ID_Exemplar]' data-judulbuku='$d[Judul_Buku]'>
                      <i class='fas fa-info'></i></a>

                      <div class='modal small fade' id='modalref' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                          <div class='modal-dialog'>
                              <div class='modal-content text-gray-900'>
                                  <div class='modal-header'>
                                      <h5 id='myModalLabel'>Informasi pengembalian status</h5>
                                  </div>
                                  <div class='row modal-body p-3'>
                                      <div class='col-md-6'>
                                          <span class='h6'>ID Exemplar</span>
                                          <p id='ref_buku_id' class='h5 text-info mb-3'></p>
                                      </div>
                                      <div class='col-md-6'>
                                          <span class='h6'>Judul Buku</span>
                                          <p id='ref_buku_judul' class='h5 text-info mb-3'></p>
                                      </div>
                                      <div class='col-md-12 mb-3'>
                                          <h5> Apakah Anda yakin ingin mengambalikan status buku ke Tersedia ?</h5>
                                      </div>
                                      <div class='col-md-12 float-center'>
                                        <a href='' class='btn btn-primary btn-sm' data-dismiss='modal' aria-hidden='true'>Cancel</a> 
                                        <a href='#' class='btn btn-danger btn-sm'  id='modalRef' >Konfirmasi</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                        <a href='#myModal' class='hapus-exemplar btn btn-outline-warning btn-sm btn-circle' data-id='$d[ID_Exemplar]' 
                        role='button' data-toggle='modal' data-idexemplar='$d[ID_Exemplar]' data-judulbuku='$d[Judul_Buku]'>
                        <i class='fas fa-trash'></i></a>

                        <div class='modal small fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content text-gray-900'>
                                    <div class='modal-header'>
                                        <h5 id='myModalLabel'>Informasi penghapusan</h5>
                                    </div>
                                    <div class='row modal-body p-3'>
                                        <div class='col-md-6'>
                                            <span class='h6'>ID Exemplar</span>
                                            <p id='hapus_buku_id' class='h5 text-info mb-3'></p>
                                        </div>
                                        <div class='col-md-6'>
                                            <span class='h6'>Judul Buku</span>
                                            <p id='hapus_buku_judul' class='h5 text-info mb-3'></p>
                                        </div>
                                        <div class='col-md-12 mb-3'>
                                            <h5> Apakah Anda yakin ingin menghapus data ini ?</h5>
                                        </div>
                                        <div class='col-md-12 float-center'>
                                          <a href='' class='btn btn-primary btn-sm' data-dismiss='modal' aria-hidden='true'>Cancel</a> 
                                          <a href='#' class='btn btn-danger btn-sm'  id='modalDelete' >Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                      </td>
                    </tr>
                    ";
            }
            ?>
            </tbody>
          </table>
        </div>
        <!-- end Table exemplar -->

      </div>
      <!-- end Data exemplar -->
    
    </div>
    <!-- end Card -->

  </div>
  <!-- end Container fluid -->
  
</div>
<!-- end Content container -->
<script>
// Peringatan hapus buku
$('.hapus-exemplar').click(function(){

    var idexemplar = $(this).attr('data-idexemplar');
    $('#hapus_buku_id').text(idexemplar);

    var judulbuku = $(this).attr('data-judulbuku');
    $('#hapus_buku_judul').text(judulbuku);

    var id=$(this).data('id');
    $('#modalDelete').attr('href','exemplar_hapus.php?id='+id);
});

// Peringatan refresh buku
$('.ex-refresh').click(function(){

  var idexemplar = $(this).attr('data-idexemplar');
  $('#ref_buku_id').text(idexemplar);

  var judulbuku = $(this).attr('data-judulbuku');
  $('#ref_buku_judul').text(judulbuku);

  var id=$(this).data('id');
  $('#modalRef').attr('href','exemplar_refresh.php?act=refresh&ID_Exemplar='+id);
});
</script>
</body>
</html>