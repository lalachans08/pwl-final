<?php 
  include "header_penerimaan.php";
?>
    <!-- Container fluid -->
    <div class="container-fluid p-2">

        <!-- Card -->
        <div class="card">
            <!-- Tambah data exemplar berdasarkan data buku yang dipilih -->
            <?php
                $sqlEdit=mysqli_query($koneksi, "SELECT * FROM data_buku WHERE ID_Buku='$_GET[id]'");
                $e=mysqli_fetch_array($sqlEdit);
            ?>
            <div class="card-header">Tambah Exemplar : <?php echo $e['Judul_Buku']; ?></div>

            <!-- Form edit data buku -->
            <div class="card-body" id="scroll">
                
                <!-- <?php
                    $str    = 10;
                    $plus   = floatval($str) + 1;
                    $sp     = sprintf('%04s', $plus);
                    echo $sp;
                ?> -->

                <form method="post" action="" class="ml-2">
                    
                    <!-- simpan data -->
                    <?php
                        if($_SERVER['REQUEST_METHOD']=='POST'){                                     
                            $ID_Exemplar    = $_POST['ID_Exemplar'];
                            $ID_Buku        = $_POST['ID_Buku'];

                            //simpan data
                            $simpan = mysqli_query($koneksi,
                            "INSERT INTO `data_exemplar` (`ID_Exemplar`,
                            `ID_Buku`,`Keterangan`) 
                            VALUES ('$ID_Exemplar', '$ID_Buku', 'Tersedia');");
                            
                            if($simpan){
                                echo "<script>window.location.replace('data_exemplar.php?pesan=simpan');</script>";
                            }else{
                                echo "<script>window.location.replace('data_exemplar.php?pesan=gagal_simpan');</script>";
                            }
                        
                        }
                    ?>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">ID Exemplar</label>
                        <div class="input-group col-md-6">
                            <?php
                                // Search by ID_Buku
                                $d  	    = substr($e['ID_Buku'], 0,5); // B0001
                                $query      = mysqli_query($koneksi, "SELECT MAX(ID_Exemplar) as last 
                                            FROM data_exemplar WHERE ID_Exemplar Like'%$d%'"); //EX -B0001- 0001
                                $data       = mysqli_fetch_array($query);
                                
                                // if already
                                $d1         = substr($data['last'], 0,7); //EXB0001 0001
                                $last	    = substr($data['last'], 7,4); //0001
                                $Turn       = $last + 1; //0002
                                $id         = $d1 .sprintf('%04s', $Turn); //EXB0001 0002
                                
                                // if null
                                $data1      = substr($data['last'], 2,5); //Null
                                $substr	    = substr($e['ID_Buku'], 1,4); //0001
                                $last1      = $e['ID_Buku']; // B0001
                                $Next1      = substr($last1, 5, 4); // B0001 + 0001
                                $Turn1      = floatval($Next1) + 1;
                                $id1        = $substr .sprintf('%04s', $Turn1);
                            ?>
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" value="<?php
                                                        if($data1==null){
                                                            echo "EXB$id1";
                                                        }else{
                                                            echo "$id";
                                                        }
                                                        ?>" 
                            class="form-control" name="ID_Exemplar" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">ID Buku</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" value="<?php echo $e['ID_Buku']; ?>" class="form-control" name="ID_Buku" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Judul Buku</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" value="<?php echo $e['Judul_Buku']; ?>" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="mb-2">
                        <a href="exemplar_tambah.php" class="btn btn-danger btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                        <input type="submit" class="btn btn-primary btn-sm" value="Simpan" />
                    </div>
                    
                </form>
                    
            </div>
            <!-- end Form edit data buku -->
            
        
        </div>
        <!-- end Card -->
        
    </div>
    <!-- end Container fluid -->

</div>
<!-- end Content container -->

</body>
</html>