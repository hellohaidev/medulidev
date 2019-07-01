<?php
ob_start();
$id = $_GET['id'];
$query = mysqli_query($link,"SELECT * FROM tm_pengaduan 
                        INNER JOIN super_user ON super_user.id_super = tm_pengaduan.id_super
                        INNER JOIN tm_kriteria ON tm_kriteria.id_kriteria = tm_pengaduan.id_kriteria
                        WHERE id_pengaduan='$id' ");
$data = mysqli_fetch_array($query);
?>
<div class="row clearfix">
    <div class="col-md-6">
        <a href="?page=dataCampaign" class="btn btn-primary" style="margin-bottom:5px;">Kembali</a>
        <img class="img-responsive" src="img/campaign/<?php echo $data['fl_photo'] ?>">
    </div>
    <div class="col-md-6">
        <h2><?php echo $data['judul_campaign'] ?></h2>
        <ul class="list-group">
            <li class="list-group-item">Kode Campaign : <?php echo $data['kode_campaign']  ?></li>
            <li class="list-group-item">Jumlah Keluarga : <?php echo $data['jumlah_keluarga']  ?></li>
            <li class="list-group-item">Lokasi Kejadian : <?php echo $data['lokasi_kejadian']  ?></li>
            <li class="list-group-item">Deskripsi : <?php echo $data['deskripsi']  ?></li>
        </ul>
    </div>
    
</div>

<?php 
$viewCampaign = ob_get_clean();
?>