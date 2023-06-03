<?php 
  include "header_penerimaan.php";
?>
    <!-- Container fluid -->
    <div class="container-fluid p-2">
        
        <!-- Card -->
        <div class="card">

            <div class="card-header h5">Tambah data buku</div>

            <!-- Form tambah data -->
            <div class="card-body" id="scroll">

                <!-- Alert pesan -->
                <?php include "../asset/pesan.php"; ?>
                
                <form method="post" action="" class="ml-2">
                    <!-- Simpan data buku -->
                    <?php
                        if($_SERVER['REQUEST_METHOD']=='POST'){
                            $ID_Buku        = $_POST['ID_Buku'];
                            $Judul_Buku     = $_POST['Judul_Buku'];
                            $Pengarang      = $_POST['Pengarang'];
                            $Tempat_Terbit  = $_POST['Tempat_Terbit'];
                            $Penerbit       = $_POST['Penerbit'];
                            $Sumber         = $_POST['Sumber'];
                            $Tahun_Terbit   = $_POST['Tahun_Terbit'];
                            $ISBN           = $_POST['Kode_ISBN'];
                            $DDC            = $_POST['Kode_DDC'];
                            $Kategori       = $_POST['Kategori'];
                            
                            if($ID_Buku=='' || $Judul_Buku==''){
                                header('location:databuku_tambah.php?pesan=data_kurang');
                                        
                            }else{
                                //simpan data
                                $simpan = mysqli_query($koneksi,
                                "INSERT INTO `data_buku` (`ID_Buku`,
                                `Judul_Buku`,`Pengarang`,`Tempat_Terbit`,
                                `Penerbit`,`Sumber`,`Tahun_Terbit`, 
                                `Kode_ISBN`,`Kode_DDC`,`Kategori`) 
                                VALUES ('$ID_Buku', '$Judul_Buku', '$Pengarang',
                                        '$Tempat_Terbit', '$Penerbit', '$Sumber',
                                        '$Tahun_Terbit', '$ISBN', '$DDC', 
                                        '$Kategori');");
                                
                                if($simpan){
                                    echo "<script>window.location.replace('databuku.php?pesan=simpan');</script>";
                                }else{
                                    echo "<script>window.location.replace('databuku.php?pesan=gagal_simpan');</script>";
                                }
                            }
                        }
                    ?>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">ID Buku</label>
                        <div class="input-group col-md-6">
                            <?php
                                $query  = mysqli_query($koneksi, "SELECT MAX(ID_Buku) as last FROM data_buku");
                                $data   = mysqli_fetch_array($query);
                                $last	= $data['last'];
                                $Next   = substr($last, 1, 4);
                                $Turn   = $Next + 1;
                                $id     = sprintf('%04s', $Turn);
                            ?>
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" class="form-control" name="ID_Buku" placeholder="Masukan" value=<?php echo "B$id"; ?> readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Judul Buku - Wajib di isi !</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" class="form-control" name="Judul_Buku" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Pengarang</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" class="form-control" name="Pengarang" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Tempat Terbit</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" class="form-control" name="Tempat_Terbit" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Penerbit</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" class="form-control" name="Penerbit" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Sumber</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" class="form-control" name="Sumber" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Tahun Terbit</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="number" class="form-control" name="Tahun_Terbit" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Kode ISBN</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="number" class="form-control" name="Kode_ISBN" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Kode DDC</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="number" class="form-control" name="Kode_DDC" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Kategori</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" class="form-control" name="Kategori" placeholder="Masukan">
                        </div>
                    </div>
                    
                    <div class="mb-2">
                        <a href="databuku.php" class="btn btn-danger btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                        <input type="submit" class="btn btn-primary btn-sm" value="Simpan" />
                    </div>
                    
                </form>
                    
            </div>
            <!-- end Form tambah data -->

        </div>
        <!-- end Card -->

    </div>
    <!-- end Container fluid -->
    
</div>
<!-- Content container -->
</body>
</html>