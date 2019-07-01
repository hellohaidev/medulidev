<?php 
ob_start();

$id = $_GET['id'];
$query = mysqli_query($link,"SELECT * FROM tm_artikel WHERE id_artikel='$id'");
$data = mysqli_fetch_array($query);
?>
<div class="row clearfix">
    <div class="col-md-8">
        <a href="?page=artikel" class="btn bg-blue">Kembali</a>
        <h1 class="text-center"><?php echo $data['judul'] ?></h1>
        <img class="img-responsive" src="img/artikel/<?php echo $data['fl_photo'] ?>" width="100%">
        <?php echo $data['deskripsi'] ?>
    </div>
    <div class="col-md-4">
        <h1>Artikel Lainnya</h1>
    </div>
</div>


<?php
$viewArtikel = ob_get_clean();
?>