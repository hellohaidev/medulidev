<?php 
ob_start();

$id = $_GET['id'];
$data = mysqli_query($link,"select * from tm_artikel where id_artikel = '$id'");
$row = mysqli_fetch_array($data);
$delfoto = unlink("img/artikel/" . $row['fl_photo']);

$result = mysqli_query($link,"delete from tm_artikel  where id_artikel = '$id'");

if ($result){
	echo "<script>alert('sukses hapus');window.location.assign(\"page.php?page=artikel\")</script>";
    // echo 'sukses';
}
else {
	echo "<script>alert('gagal hapus');window.location.assign(\"page.php?page=artikel\")</script>";
    // echo 'gagal';
}
?>
<?php 
$deleteArtikel = ob_get_clean();
?>
