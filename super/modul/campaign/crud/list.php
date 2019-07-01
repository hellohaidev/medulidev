<?php 
ob_start();

$idSuper = $_SESSION['id_user'];
$kodeCampaign = substr(str_shuffle(strtoupper(uniqid())), 1,8);

if(isset($_POST['buatCampaign'])){

    
    $idKriteria = mysqli_real_escape_string($link,$_POST['id_kriteria']);
    $judul = mysqli_real_escape_string($link,$_POST['judul_campaign']);
    $jumlahKeluarga = mysqli_real_escape_string($link,$_POST['jumlah_keluarga']);
    $lokasiKejadian = mysqli_real_escape_string($link,$_POST['lokasi_kejadian']);
    $keterangan = mysqli_real_escape_string($link,$_POST['deskripsi']);
    
    $targetDir = './img/campaign/';
    $filename = uniqid().rand(1,999).$_FILES['fl_photo']['name'];
    $targetPath = $targetDir . $filename;
    $fileType = pathinfo($targetPath,PATHINFO_EXTENSION);
    


    if(!empty($_FILES['fl_photo']['name'])){
        $allowType = array('jpg','png','jpeg','JPG','JPEG');
        if(in_array($fileType,$allowType)){
            $uploadDir = move_uploaded_file($_FILES['fl_photo']['tmp_name'],$targetPath);
            $query = mysqli_query($link,"INSERT INTO tm_pengaduan (
                id_super,
                kode_campaign,
                id_kriteria,
                judul_campaign,
                jumlah_keluarga,
                lokasi_kejadian,
                deskripsi,
                fl_photo)
                VALUES ('$idSuper','$kodeCampaign','$idKriteria','$judul','$jumlahKeluarga','$lokasiKejadian','$keterangan','$filename')");
            if($uploadDir && $query){
                echo "<script>alert('Berhasil Tambah Laporan');window.location.assign(\"page.php?page=dataCampaign\")</script>";
            } else {
                echo "<script>alert('Gagal Tambah Laporan');window.location.assign(\"page.php?page=dataCampaign\")</script>";
            }
        } else {
            echo "<script>alert('Periksa Kembali Format File Gambar Anda');window.location.assign(\"page.php?page=dataCampaign\")</script>";
        }
    } else {
        echo "<script>alert('Foto Tidak Boleh Kosong');window.location.assign(\"page.php?page=dataCampaign\")</script>";
    }

    

}

?>
<div class="block-header">
    <h2>Data Lapor</h2>
</div>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <button class="btn bg-blue btn-lg" type="button" data-toggle="modal" data-target="#campaignModal">Buat Laporan</button>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <?php if($_SESSION['myAccess'] == 1){?>                
                    <table class="table table-bordered table-striped table-hover dataTable ">
                        <thead>
                            <tr>
                                <th>Nama Pelapor</th>
                                <th>Kriteria</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php  
                            $query = mysqli_query($link,"SELECT * FROM tm_pengaduan 
                                                    INNER JOIN super_user ON super_user.id_super = tm_pengaduan.id_super
                                                    INNER JOIN tm_kriteria ON tm_kriteria.id_kriteria = tm_pengaduan.id_kriteria");
                            while($row = mysqli_fetch_array($query)){
                                //check if data > 0
                                if(mysqli_num_rows($query) > 0){
                            ?>
                                <tr>
                                    <td><?php echo $row['fullName'] ?></td>
                                    <td><?php echo $row['jenis_kriteria'] ?></td>
                                    <td>
                                        <a href="?page=deleteCampaign&id=<?php echo $row['id_pengaduan'] ?>" class="btn bg-red">Delete</a>
                                        <a href="?page=editCampaign&id=<?php echo $row['id_pengaduan'] ?>" class="btn bg-blue">Edit</a>
                                        <a href="?page=viewCampaign&id=<?php echo $row['id_pengaduan'] ?>" class="btn bg-green">View</a>
                                    </td>
                                </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php } ?>
                    <?php if($_SESSION['myAccess'] == 2 OR $_SESSION['myAccess'] == 3){?>                
                    <table class="table table-bordered table-striped table-hover dataTable ">
                        <thead>
                            <tr>
                                <th>Nama Pelapor</th>
                                <th>Kriteria</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php  
                            $query = mysqli_query($link,"SELECT * FROM tm_pengaduan 
                                                    INNER JOIN super_user ON super_user.id_super = tm_pengaduan.id_super
                                                    INNER JOIN tm_kriteria ON tm_kriteria.id_kriteria = tm_pengaduan.id_kriteria
                                                    WHERE tm_pengaduan.id_super = '$idSuper'");

                            while($row = mysqli_fetch_array($query)){
                                //check if data > 0
                                if(mysqli_num_rows($query) > 0){
                            ?>
                                <tr>
                                    <td><?php echo $row['fullName'] ?></td>
                                    <td><?php echo $row['jenis_kriteria'] ?></td>
                                    <td>
                                        <a href="?page=deleteCampaign&id=<?php echo $row['id_pengaduan'] ?>" class="btn bg-red">Delete</a>
                                        <a href="?page=editCampaign&id=<?php echo $row['id_pengaduan'] ?>" class="btn bg-blue">Edit</a>
                                        <a href="?page=viewCampaign&id=<?php echo $row['id_pengaduan'] ?>" class="btn bg-green">View</a>
                                    </td>
                                </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Modal Form -->
        <div class="modal fade" id="campaignModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title align-center" id="defaultModalLabel">Form Laporan</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Kode Laporan</label>
                                        <input type="text" name="kode_campaign" class="form-control" value="<?php echo $kodeCampaign; ?>" readonly >
                                    </div>
                                    <div class="form-group form-float">
                                        <label class="control-label">Kriteria</label>
                                        <select class="form-control select" name="id_kriteria">
                                            <option>Pilih Kriteria</option>
                                            <?php 
                                            $queryKriteria = mysqli_query($link,"SELECT * FROM tm_kriteria");
                                            while($row = mysqli_fetch_array($queryKriteria)){
                                            ?>
                                            <option value="<?php echo $row['id_kriteria'] ?>"><?php echo $row['jenis_kriteria'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="judul_campaign" class="form-control">
                                            <label class="form-label">Judul Laporan</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" name="jumlah_keluarga" class="form-control">
                                            <label class="form-label">Jumlah Keluarga</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea name="lokasi_kejadian" class="form-control" cols="5" rows="5"></textarea>
                                            <label class="form-label">Lokasi Kejadian</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea name="deskripsi" class="form-control" cols="5" rows="5"></textarea>
                                            <label class="form-label">Keterangan</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="control-label">Foto Kejadian</label>
                                            <input type="file" name="fl_photo" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <input type="submit" class="btn bg-blue waves-effect" value="Buat Laporan" name="buatCampaign"> 
                                        <input type="button" class="btn bg-red waves-effect" data-dismiss="modal" value="Tutup"> 
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>

    </div>
</div>


<?php 
$list = ob_get_clean();
?>