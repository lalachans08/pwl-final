<?php 
  include "header_peminjaman.php";
?>
    <div class="container-fluid p-2">
      <div class="card">
        <div class="card-header h5">Data Anggota</div>
          <div class="card-body">
       
            <div class="mb-2">
              <a href="anggota_tambah.php" class="btn btn-primary btn-icon-split btn-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-plus mt-1"></i>
                </span>
                <span class="text">Tambah data</span>
              </a>
            </div>

            <?php include "../asset/pesan.php"; ?>
            <!-- table responsive -->
            <div class="table-responsive">
              <table id='dataTables-example' class="table table-bordered">
                <thead>
                  <tr> 
                    <th>ID Anggota</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Terakhir Login</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql=mysqli_query($koneksi, "SELECT * FROM user WHERE Level='Anggota'");
                  
                  while($d=mysqli_fetch_array($sql)){

                    $Status = $d['Status_Anggota'];

                    if($Status == 'Tidak Aktif'){
                      $color = "text-danger";
                    }else{
                      $color = "text-gray";
                    }

                    echo "<tr class='$color'>
                          <td>$d[ID_User]</td>
                          <td>$d[Username]</td>
                          <td>$d[Nama]</td>
                          <td>$d[No_Telp]</td>
                          <td width='200px'>$d[Alamat]</td>
                          <td>$d[Last_Login]</td>    
                          <td>$d[Status_Anggota]</td>
                          <td align='center' width='70px'>

                          <a href='#modalinfo' class='anggota-info btn btn-outline-info btn-sm btn-circle' 
                            role='button' data-toggle='modal' data-username='$d[Username]' data-password='$d[Password]'>
                            <i class='fas fa-info'></i></a>
                          ";
                          
                          if ($Status == 'Tidak Aktif'){
                            echo "<a href='#modalon' class='anggota-on btn btn-outline-primary btn-sm btn-circle' data-id='$d[ID_User]' 
                            role='button' data-toggle='modal' data-iduser='$d[ID_User]' data-username='$d[Username]'>
                            <i class='fas fa-check'></i></a> 
                            
                            <div class='modal small fade' id='modalon' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                              <div class='modal-dialog'>
                                  <div class='modal-content text-gray-900'>
                                      <div class='modal-header'>
                                          <h5 id='myModalLabel'>Mengaktifkan anggota</h5>
                                      </div>
                                      <div class='row modal-body p-3'>
                                          <div class='col-md-6'>
                                              <span class='h6'>ID User</span>
                                              <p id='anggota_on_id' class='h5 text-info mb-3'></p>
                                          </div>
                                          <div class='col-md-6'>
                                              <span class='h6'>Username</span>
                                              <p id='anggota_on_username' class='h5 text-info mb-3'></p>
                                          </div>
                                          <div class='col-md-12 mb-3'>
                                              <h5> Akun akan di aktifkan ?</h5>
                                          </div>
                                          <div class='col-md-12 float-center'>
                                            <a href='' class='btn btn-primary btn-sm' data-dismiss='modal' aria-hidden='true'>Cancel</a> 
                                            <a href='#' class='btn btn-danger btn-sm'  id='aktif'>Konfirmasi</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            ";
                          }else{
                            echo "
                            <a href='#modaloff' class='anggota-off btn btn-outline-warning btn-sm btn-circle' data-id='$d[ID_User]' 
                            role='button' data-toggle='modal' data-iduser='$d[ID_User]' data-username='$d[Username]'>
                            <i class='fas fa-times'></i></a> 
                            
                            <div class='modal small fade' id='modaloff' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                              <div class='modal-dialog'>
                                  <div class='modal-content text-gray-900'>
                                      <div class='modal-header'>
                                          <h5 id='myModalLabel'>Menonaktifkan anggota</h5>
                                      </div>
                                      <div class='row modal-body p-3'>
                                          <div class='col-md-6'>
                                              <span class='h6'>ID User</span>
                                              <p id='anggota_off_id' class='h5 text-info mb-3'></p>
                                          </div>
                                          <div class='col-md-6'>
                                              <span class='h6'>Username</span>
                                              <p id='anggota_off_username' class='h5 text-info mb-3'></p>
                                          </div>
                                          <div class='col-md-12 mb-3'>
                                              <h5> Akun akan di nonaktifkan ?</h5>
                                          </div>
                                          <div class='col-md-12 float-center'>
                                            <a href='' class='btn btn-primary btn-sm' data-dismiss='modal' aria-hidden='true'>Cancel</a> 
                                            <a href='#' class='btn btn-danger btn-sm'  id='nonaktif'>Konfirmasi</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            ";

                          }"
                          </td>
                          </tr>
                          
                          ";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- end table responsive -->
       
          </div>
        </div>
      </div>
    </div>


</div>

<!-- Modal Informasi anggota -->
<div class="modal fade" id="modalinfo">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi Anggota</h5>
            </div>
            <div class="modal-body">
                
                <!-- Detail Buku -->
                <div class="row p-5">
                  <div class="col-md-6 mb-2">
                      <span class="h6">Username</span>
                      <p id="Username" class="h5 text-info"></p>
                  </div>
                  <div class="col-md-6 mb-2">
                      <span class="h6">Password</span>
                      <p id="Password" class="h5 text-info"></p>
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

<script>
// Peringatan aktif
$('.anggota-on').click(function(){

    var iduser = $(this).attr('data-iduser');
    $('#anggota_on_id').text(iduser);

    var username = $(this).attr('data-username');
    $('#anggota_on_username').text(username);

    var id=$(this).data('id');
    $('#aktif').attr('href','anggota_status.php?act=aktif&ID_User='+id);
});


// Peringatan nonaktif
$('.anggota-off').click(function(){

  var iduser = $(this).attr('data-iduser');
  $('#anggota_off_id').text(iduser);

  var username = $(this).attr('data-username');
  $('#anggota_off_username').text(username);

  var id=$(this).data('id');
  $('#nonaktif').attr('href','anggota_status.php?act=nonaktif&ID_User='+id);

});


// Informasi anggota
$('.anggota-info').click(function(){

  var username = $(this).attr('data-username');
  $('#Username').text(username);

  var password = $(this).attr('data-password');
  $('#Password').text(password);

});
</script>
</body>
</html>