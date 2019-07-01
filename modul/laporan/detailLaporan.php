<?php 
ob_start();
$id = $_GET['id'];

$query = "SELECT * FROM tm_pengaduan 
            INNER JOIN super_user ON super_user.id_super = tm_pengaduan.id_super 
            INNER JOIN tm_kriteria ON tm_kriteria.id_kriteria = tm_pengaduan.id_kriteria
            WHERE tm_pengaduan.id_pengaduan = '$id'";
$result = mysqli_query($link,$query);
$row = mysqli_fetch_array($result);
?>


<div class="container content">
    <div class="row">
        <div class="col-md-8">
            <div class="margin-bottom-30">
                <h2><?php echo $row['judul_campaign'] ?></h2>
                <img class="img-responsive" src="super/img/campaign/<?php echo $row['fl_photo'] ?>"/>
            </div>
            <div class="tab-v1">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Detail</a></li>
                    <li><a href="#profile" data-toggle="tab">Diskusi</a></li>
                    
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                        <ul class="list-group">
                            <li class="list-group-item">ID Laporan : <?php echo $row['kode_campaign']?></li>
                            <li class="list-group-item">Nama Pelapor : <?php echo $row['fullName']?></li>
                            <li class="list-group-item">Jenis Kriteria : <?php echo $row['jenis_kriteria'] ?></li>
                            <li class="list-group-item">Judul Laporan : <?php echo $row['judul_campaign'] ?></li>
                            <li class="list-group-item">Jumlah Keluarga : <?php echo $row['jumlah_keluarga'] ?></li>
                            <li class="list-group-item">Lokasi Kejadian : <?php echo $row['lokasi_kejadian'] ?></li>
                            <li class="list-group-item">Keterangan : <?php echo $row['deskripsi'] ?></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade in" id="profile">
                        <div id="disqus_thread"></div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4" id="data-laporan">
            
            <?php 
                    $query = "SELECT * FROM tm_pengaduan 
                                INNER JOIN tm_kriteria ON tm_kriteria.id_kriteria = tm_pengaduan.id_kriteria
                                INNER JOIN super_user ON super_user.id_super = tm_pengaduan.id_super
                                limit 3";
                    $result = mysqli_query($link,$query);
                    if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        
                    
                ?>
                
                    <a href="?page=detailLaporan&id=<?php echo $row['id_pengaduan'] ?>">
                        <div class="news-v1-in bg-color-white margin-bottom-10">
                            <img class="img-responsive" src="super/img/campaign/<?php echo $row['fl_photo'] ?>" style="height:200px;">
                            <h3><b><?php echo $row['judul_campaign'] ?></b></h3>
                        </div>
                    </a>
                
                <?php 
                    }
                }
                ?>
           
        </div>
    </div>
    
</div>
<?php 
$detailLaporan = ob_get_clean();
?>
