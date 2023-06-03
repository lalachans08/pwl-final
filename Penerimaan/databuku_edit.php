<?php 
  include "header_penerimaan.php";
  $id = date("hid");
?>
    <!-- Container fluid -->
    <div class="container-fluid p-2">

        <!-- Card -->
        <div class="card">

            <div class="card-header">Edit Data buku</div>

            <!-- Form edit data buku -->
            <div class="card-body" id="scroll">

                <form method="post" action="" class="ml-2">
                    <!-- edit data buku -->
                    <?php
                        $sqlEdit=mysqli_query($koneksi, "SELECT * FROM data_buku WHERE ID_Buku='$_GET[id]'");
                        $e=mysqli_fetch_array($sqlEdit);
                    ?>
                    <!-- untuk memproses edit -->
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
                            
                            if($ID_Buku==''){
                                echo "Form belum lengkap!!!";		
                            }else{
                                //simpan data edit
                                $update = mysqli_query($koneksi, "UPDATE data_buku SET
                                                                    Judul_Buku='$Judul_Buku',
                                                                    Pengarang='$Pengarang',
                                                                    Tempat_Terbit='$Tempat_Terbit',
                                                                    Penerbit='$Penerbit',
                                                                    Sumber='$Sumber',
                                                                    Tahun_Terbit='$Tahun_Terbit',
                                                                    Kode_ISBN='$ISBN',
                                                                    Kode_DDC='$DDC',
                                                                    Kategori='$Kategori'
                                                                    WHERE ID_Buku='$ID_Buku'");
                                                                    
                                if($update){
                                    echo "<script>window.location.replace('databuku.php?pesan=edit');</script>";
                                }else{
                                    echo "<script>window.location.replace('databuku.php?pesan=gagal_edit');</script>";
                                }
                            }
                        }
                    ?>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">ID Buku</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" value="<?php echo $e['ID_Buku']; ?>" class="form-control" name="ID_Buku" placeholder="Masukan" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Judul Buku</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" value="<?php echo $e['Judul_Buku']; ?>" class="form-control" name="Judul_Buku" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Pengarang</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" value="<?php echo $e['Pengarang']; ?>" class="form-control" name="Pengarang" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Tempat Terbit</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" value="<?php echo $e['Tempat_Terbit']; ?>" class="form-control" name="Tempat_Terbit" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Penerbit</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" value="<?php echo $e['Penerbit']; ?>" class="form-control" name="Penerbit" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Sumber</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" value="<?php echo $e['Sumber']; ?>" class="form-control" name="Sumber" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Tahun Terbit</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="number" value="<?php echo $e['Tahun_Terbit']; ?>" class="form-control" name="Tahun_Terbit" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Kode ISBN</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="number" value="<?php echo $e['Kode_ISBN']; ?>" class="form-control" name="Kode_ISBN" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Kode DDC</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="number" value="<?php echo $e['Kode_DDC']; ?>" class="form-control" name="Kode_DDC" placeholder="Masukan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Kategori</label>
                        <div class="input-group col-md-6">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <input type="text" value="<?php echo $e['Kategori']; ?>" class="form-control" name="Kategori" placeholder="Masukan">
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
            <!-- end Form edit data buku -->
            
        
        </div>
        <!-- end Card -->
        
    </div>
    <!-- end Container fluid -->

</div>
<!-- end Content container -->

</body>
</html>