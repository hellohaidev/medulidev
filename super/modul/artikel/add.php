<?php
ob_start();


if(isset($_POST['postArtikel'])){

    
    $judul = mysqli_real_escape_string($link,$_POST['judul']);
    $deskripsi = mysqli_real_escape_string($link,$_POST['deskripsi']);
    $targetDir = './img/artikel/';
    $filename = uniqid().rand(1,999).$_FILES['fl_photo']['name'];
    $targetPath = $targetDir . $filename;
    $fileType = pathinfo($targetPath,PATHINFO_EXTENSION);
    


    if(!empty($_FILES['fl_photo']['name'])){
        $allowType = array('jpg','png','jpeg','JPG','JPEG');
        if(in_array($fileType,$allowType)){
            $uploadDir = move_uploaded_file($_FILES['fl_photo']['tmp_name'],$targetPath);
            $query = mysqli_query($link,"INSERT INTO tm_artikel (
                judul,
                deskripsi,
                fl_photo)
                VALUES ('$judul','$deskripsi','$filename')");
            if($uploadDir && $query){
                echo "<script>alert('Berhasil Tambah Artikel');window.location.assign(\"page.php?page=artikel\")</script>";
            } else {
                echo "<script>alert('Gagal Tambah Artikel');window.location.assign(\"page.php?page=artikel\")</script>";
            }
        } else {
            echo "<script>alert('Periksa Kembali Format File Gambar Anda');window.location.assign(\"page.php?page=artikel\")</script>";
        }
    } else {
        echo "<script>alert('Foto Tidak Boleh Kosong');window.location.assign(\"page.php?page=artikel\")</script>";
    }

    

}

?>
<div class="row clear-fix">
    <form method="post" enctype="multipart/form-data">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        
                        
                        <div class="form-group form-float">
                                <label class="form-label">Judul Artikel</label>
                                <input type="text" name="judul" class="form-control">
                        </div>
                        
                        <div class="form-group form-float">
                                <label class="form-label">Deskripsi Artikel</label>
                                <textarea name="deskripsi"  id="cktext" cols="5" rows="5"></textarea>
                                
                        </div>
                        
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="control-label">Foto Artikel</label>
                                <input type="file" name="fl_photo" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <input type="submit" class="btn bg-blue waves-effect" value="Buat Artikel" name="postArtikel"> 
                        </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
$addArtikel = ob_get_clean();
?>