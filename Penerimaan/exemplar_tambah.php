<?php 
  include "header_penerimaan.php";
?>
    <!-- Container fluid -->
    <div class="container-fluid p-2">

        <!-- Card -->
        <div class="card">
            <div class="card-header h5">Pilih Data Buku</div>
            
            <!-- Data buku -->
            <div class="card-body table-responsive">
                
                <div class="mb-2">
                    <a href="data_exemplar.php" class="btn btn-danger btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                        <i class="fas fa-arrow-left mt-1"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                </div>

                <!-- Alert pesan -->
                <?php include "../asset/pesan.php"; ?>
                
                <!-- Table data buku -->
                <table class="table table-bordered" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>ID Buku</th>
                        <th>Judul Buku</th>
                        <th>Kode ISBN</th>
                        <th>Kode DDC</th>
                        <th>Kategori</th>
                        <th>Total Ex</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql    =   mysqli_query($koneksi, "SELECT * FROM data_buku ORDER BY ID_Buku DESC");
                    
                    while($d=mysqli_fetch_array($sql)){
                    $ex     =   substr($d['ID_Buku'], 0,5); 
                    $sql1   =   mysqli_query($koneksi, "SELECT COUNT(ID_Exemplar) as total FROM data_exemplar 
                                WHERE ID_Exemplar LIKE'%$ex%'");
                    $e      =   mysqli_fetch_assoc($sql1);
                    $total  =   $e['total'];
                  
                    echo "<tr>
                            <td width='100px'>$d[ID_Buku]</td>
                            <td width='100px'>$d[Judul_Buku]</td>
                            <td width='100px'>$d[Kode_ISBN]</td>
                            <td width='100px'>$d[Kode_DDC]</td>
                            <td width='100px'>$d[Kategori]</td>    
                            <td width='70px'>$e[total] Unit</td>
                            <td width='70px' align='center'>
                                <a id='detail' href='' class='btn-circle btn-sm btn btn-info detail' data-toggle='modal' data-target='#modal-detail' 
                                data-idbuku='$d[ID_Buku]' 
                                data-judulbuku='$d[Judul_Buku]' 
                                data-pengarang='$d[Pengarang]' 
                                data-tempatterbit='$d[Tempat_Terbit]' 
                                data-penerbit='$d[Penerbit]' 
                                data-sumber='$d[Sumber]' 
                                data-tahunterbit='$d[Tahun_Terbit]' 
                                data-kodeisbn='$d[Kode_ISBN]'
                                data-kodeddc='$d[Kode_DDC]' 
                                data-kategori='$d[Kategori]'
                                data-unit='$e[total] Unit'
                                ><i class='fas fa-info'></i></a>
                   
                                <a class='btn btn-outline-primary btn-circle btn-sm' href='exemplar_tambah_data.php?id=$d[ID_Buku]'>
                                <i class='fas fa-plus'></i></a>
                                
                            </td>
                            </tr>
                        ";
                    }
                    ?>
                    </tbody>
                </table>
                <!-- end Table data buku -->
                
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
                                    <span class="h6">ID Buku</span>
                                    <p id="ID_Buku" class="h5 text-info"></p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="h6">Judul Buku</span>
                                    <p id="Judul_Buku" class="h5 text-info"></p>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <span class="h6">Pengarang</span>
                                    <p id="Pengarang" class="h5 text-info"></p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="h6">Tempat Terbit</span>
                                    <p id="Tempat_Terbit" class="h5 text-info"></p>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <span class="h6">Penerbit</span>
                                    <p id="Penerbit" class="h5 text-info"></p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="h6">Sumber</span>
                                    <p id="Sumber" class="h5 text-info"></p>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <span class="h6">Tahun Terbit</span>
                                    <p id="Tahun_Terbit" class="h5 text-info"></p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="h6">Kode ISBN</span>
                                    <p id="Kode_ISBN" class="h5 text-info"></p>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <span class="h6">Kode DDC</span>
                                    <p id="Kode_DDC" class="h5 text-info"></p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="h6">Kategori</span>
                                    <p id="Kategori" class="h5 text-info"></p>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <span class="h6">Total Exemplar</span>
                                    <p id="Total" class="h5 text-info"></p>
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
            <!-- end Data buku -->

        </div>
        <!-- end Card -->

    </div>
    <!-- end Container fluid -->
    
</div>
<!-- end Content container -->

<script type="text/javascript">

    // Menampilkan informasi buku
    $(document).ready(function(){
        $('.detail').click(function() {
            var idbuku = $(this).attr('data-idbuku');
            $('#ID_Buku').text(idbuku);

            var judulbuku = $(this).attr('data-judulbuku');
            $('#Judul_Buku').text(judulbuku);

            var pengarang = $(this).attr('data-pengarang');
            $('#Pengarang').text(pengarang);

            var tempatterbit = $(this).attr('data-tempatterbit');
            $('#Tempat_Terbit').text(tempatterbit);

            var penerbit = $(this).attr('data-penerbit');
            $('#Penerbit').text(penerbit);
            
            var sumber = $(this).attr('data-sumber');
            $('#Sumber').text(sumber);

            var tahunterbit = $(this).attr('data-tahunterbit');
            $('#Tahun_Terbit').text(tahunterbit);

            var kodeisbn = $(this).attr('data-kodeisbn');
            $('#Kode_ISBN').text(kodeisbn);

            var kodeddc = $(this).attr('data-kodeddc');
            $('#Kode_DDC').text(kodeddc);
            
            var kategori = $(this).attr('data-kategori');
            $('#Kategori').text(kategori);
            
            var total = $(this).attr('data-unit');
            $('#Total').text(total);
        });
    });
</script>
</body>
</html>