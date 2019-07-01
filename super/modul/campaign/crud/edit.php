<?php
ob_start();
$id = $_GET['id'];
$query = mysqli_query($link,"SELECT * FROM tm_pengaduan WHERE id_pengaduan='$id' ");
$data = mysqli_fetch_array($query);

if(isset($_POST['updateCampaign'])){
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
            unlink("img/campaign/" . $data['fl_photo']);
            $uploadDir = move_uploaded_file($_FILES['fl_photo']['tmp_name'],$targetPath);
            $query = mysqli_query($link,"UPDATE tm_pengaduan SET 
                    id_kriteria = '$idKriteria',
                    judul_campaign = '$judul',
                    jumlah_keluarga = '$jumlahKeluarga',
                    lokasi_kejadian = '$lokasiKejadian',
                    deskripsi = '$keterangan',
                    fl_photo = '$filename'
                    WHERE id_pengaduan = '$id'
                    ");
            if($uploadDir && $query){
                echo "<script>alert('Berhasil Tambah Laporan');window.location.assign(\"page.php?page=dataCampaign\")</script>";
            } else {
                echo "<script>alert('Gagal Tambah Laporan');window.location.assign(\"page.php?page=dataCampaign\")</script>";
            }
        } else {
            echo "<script>alert('Periksa Kembali Format File Gambar Anda');window.location.assign(\"page.php?page=dataCampaign\")</script>";
        }
    } else {
        $updateText = mysqli_query($link,"UPDATE tm_pengaduan SET 
                        id_kriteria = '$idKriteria',
                        judul_campaign = '$judul',
                        jumlah_keluarga = '$jumlahKeluarga',
                        lokasi_kejadian = '$lokasiKejadian',
                        deskripsi = '$keterangan'
                        WHERE id_pengaduan = '$id'
                      ");
        if($updateText){
            echo "<script>alert('Berhasil Update Laporan');window.location.assign(\"page.php?page=dataCampaign\")</script>";
        } else {
            echo "<script>alert('Gagal Update Laporan');window.location.assign(\"page.php?page=dataCampaign\")</script>";
        }
    }
}
?>
<div class="row clearfix">
    <form method="post" enctype="multipart/form-data">
        <div class="row clearfix">
            <div class="col-sm-12">
                <h1>Form Edit</h1>
                <div class="form-group form-float">
                    <label class="control-label">Kriteria</label>
                    <select class="form-control select" name="id_kriteria">
                        <option>Pilih Kriteria</option>
                        <?php 
                        $queryKriteria = mysqli_query($link,"SELECT * FROM tm_kriteria");
                        while($row = mysqli_fetch_array($queryKriteria)){
                            $idKriteria = $row['id_kriteria'];
                            $kriteria_name = $row['jenis_kriteria'];
                            if ($data['id_kriteria'] == $idKriteria)
                            {
                                    $selected = "selected";
                                    print ("<option value=\"$idKriteria\""."$selected>$kriteria_name</option>");
                            }
                            else {
                                $selected = "";
                                print ("<option value=\"$idKriteria\""."$selected>$kriteria_name</option>");
                            }    
                        }
                        ?>
                        
                        
                    </select>
                </div>
                <div class="form-group form-float">
                        <label class="form-label">Judul Laporan</label>
                        <input type="text" name="judul_campaign" class="form-control" value="<?php echo $data['judul_campaign'] ?>">
                </div>
                <div class="form-group form-float">
                        <label class="form-label">Jumlah Keluarga</label>
                        <input type="number" name="jumlah_keluarga" class="form-control" value="<?php echo $data['jumlah_keluarga'] ?>">
                </div>
                <div class="form-group form-float">
                        <label class="form-label">Lokasi Kejadian</label>
                        <textarea name="lokasi_kejadian" class="form-control" cols="5" rows="5"><?php echo $data['lokasi_kejadian'] ?></textarea>
                </div>
                <div class="form-group form-float">
                        <label class="form-label">Keterangan</label>
                        <textarea name="deskripsi" class="form-control" cols="5" rows="5"><?php echo $data['deskripsi'] ?></textarea>
                </div>
                <div class="form-group form-float">
                        <label class="control-label">Foto Kejadian</label>
                        <input type="file" name="fl_photo" class="form-control" accept="image/*">
                </div>
                <div class="form-group form-float">
                    <input type="submit" class="btn bg-blue waves-effect" value="Buat Laporan" name="updateCampaign"> 
                    <a href="?page=dataCampaign" class="btn bg-red waves-effect">Kembali</a>     
                </div>
            </div>
        </div>
    </form>
</div>
<?php
$editCampaign = ob_get_clean();
?>