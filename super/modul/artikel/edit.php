<?php
ob_start();
$id = $_GET['id'];
$query = mysqli_query($link,"SELECT * FROM tm_artikel WHERE id_artikel='$id'");
$data = mysqli_fetch_array($query);

if(isset($_POST['updateArtikel'])){
    $judul = mysqli_real_escape_string($link,$_POST['judul']);
    $deskripsi = mysqli_real_escape_string($link,$_POST['deskripsi']);
    $targetDir = './img/artikel/';
    $filename = uniqid().rand(1,999).$_FILES['fl_photo']['name'];
    $targetPath = $targetDir . $filename;
    $fileType = pathinfo($targetPath,PATHINFO_EXTENSION);
    


    if(!empty($_FILES['fl_photo']['name'])){
        $allowType = array('jpg','png','jpeg','JPG','JPEG');
        if(in_array($fileType,$allowType)){
            unlink("img/artikel/" . $data['fl_photo']);
            $uploadDir = move_uploaded_file($_FILES['fl_photo']['tmp_name'],$targetPath);
            $query = mysqli_query($link," UPDATE tm_artikel SET judul='$judul',deskripsi='$deskripsi',fl_photo = '$filename' WHERE id_artikel='$id' ");
            if($uploadDir && $query){
                echo "<script>alert('Berhasil Update Artikel');window.location.assign(\"page.php?page=artikel\")</script>";
            } else {
                echo "<script>alert('Gagal Update Artikel');window.location.assign(\"page.php?page=artikel\")</script>";
            }
        } else {
            echo "<script>alert('Periksa Kembali Format File Gambar Anda');window.location.assign(\"page.php?page=artikel\")</script>";
        }
    } else {
        $updateText = mysqli_query($link,"UPDATE tm_artikel SET judul='$judul',deskripsi='$deskripsi' WHERE id_artikel='$id'");
        if($updateText){
            echo "<script>alert('Berhasil Update Artikel');window.location.assign(\"page.php?page=artikel\")</script>";
        } else {
            echo "<script>alert('Gagal Update Artikel');window.location.assign(\"page.php?page=artikel\")</script>";
        }
    }
}

?>
<div class="row clear-fix">
    <form method="post" enctype="multipart/form-data">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        
                        
                        <div class="form-group form-float">
                                <label class="form-label">Judul Artikel</label>
                                <input type="text" name="judul" class="form-control" value="<?php echo $data['judul'] ?>">
                        </div>
                        
                        <div class="form-group form-float">
                                <label class="form-label">Deskripsi Artikel</label>
                                <textarea name="deskripsi"  id="cktext" cols="5" rows="5"><?php echo $data['deskripsi'] ?></textarea>
                                
                        </div>
                        
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="control-label">Foto Artikel</label>
                                <input type="file" name="fl_photo" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <input type="submit" class="btn bg-blue waves-effect" value="Update Artikel" name="updateArtikel"> 
                            <a href="?page=artikel" type="submit" class="btn bg-red waves-effect">Kembali</a> 
                        </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php 
$editArtikel = ob_get_clean();
?>