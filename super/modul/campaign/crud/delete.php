<?php 
ob_start();

$id = $_GET['id'];
$data = mysqli_query($link,"select * from tm_pengaduan where id_pengaduan = '$id'");
$row = mysqli_fetch_array($data);
$delfoto = unlink("img/campaign/" . $row['fl_photo']);

$result = mysqli_query($link,"delete from tm_pengaduan  where id_pengaduan = '$id'");

if ($result){
	echo "<script>alert('sukses hapus');window.location.assign(\"page.php?page=dataCampaign\")</script>";
    // echo 'sukses';
}
else {
	echo "<script>alert('gagal hapus');window.location.assign(\"page.php?page=dataCampaign\")</script>";
    // echo 'gagal';
}
?>
<?php 
$deleteCampaign = ob_get_clean();
?>
