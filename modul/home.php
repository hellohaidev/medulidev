<?php 
ob_start();

$totalLaporan = mysqli_query($link,"SELECT COUNT(*) as 'total_laporan' FROM tm_pengaduan");
$resultLaporan  = mysqli_fetch_array($totalLaporan);

$totalUser = mysqli_query($link,"SELECT COUNT(*) as 'total_user' FROM super_user WHERE status_akun = 3");
$resultUser  = mysqli_fetch_array($totalUser);
?>

<div class="breadcrumbs-v3 img-v3">
    <div class="container text-center">
        <p>Gerakan Milenial Peduli</p>
        <h1>MEDULI</h1>
        <button class="btn btn-u">Apa Itu MEDULI ?</button>
    </div><!--/end container-->
</div>

<div class="purchase">
    <div class="container">
        <div class="row">
            <div class="col-md-4 animated fadeInLeft text-center">
                <span class="counter">0</span>
                <p>Total Donasi</p>
            </div>
            <div class="col-md-4 btn-buy animated fadeInRight text-center">
                <span class="counter"><?php echo $resultLaporan['total_laporan']  ?></span>
                <p>Total Laporan</p>
            </div>
            <div class="col-md-4 btn-buy animated fadeInRight text-center">
                <span class="counter"><?php echo $resultUser['total_user']  ?></span>
                <p>Total Member</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-color-light">
    <div class="container content-md">
        <div class="row news-v1">
        <h1 class="text-center">Laporan PMKS</h1>
        <?php 
                $query = "SELECT * FROM tm_pengaduan 
                            INNER JOIN tm_kriteria ON tm_kriteria.id_kriteria = tm_pengaduan.id_kriteria
                            INNER JOIN super_user ON super_user.id_super = tm_pengaduan.id_super
                            limit 6";
                $result = mysqli_query($link,$query);
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    
                
            ?>
            <div class="col-md-4 md-margin-bottom-40">
                <a href="?page=detailLaporan&id=<?php echo $row['id_pengaduan'] ?>">
                    <div class="news-v1-in bg-color-white margin-bottom-10">
                        <img class="img-responsive" src="super/img/campaign/<?php echo $row['fl_photo'] ?>" style="height:300px;">
                        <h3><b><?php echo $row['judul_campaign'] ?> <i class="icon-check" style="color:blue;"></i></b></h3>
                    </div>
                </a>
            </div>
            <?php 
                }
            }
            ?>
        </div>
    </div>
</div>

<div class="container content-md">
        <div class="row news-v1">
        <h1 class="text-center">Artikel</h1>
        <?php 
                $query = "SELECT * FROM tm_artikel limit 4";
                $result = mysqli_query($link,$query);
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
            ?>
            
                <div class="col-md-6" style="min-height:180px;">
                    <div class="row">
                        <div class="col-sm-5 sm-margin-bottom-20">
                            <img class="img-responsive" src="super/img/artikel/<?php echo $row['fl_photo'] ?>">
                        </div>
                        <div class="col-sm-7 news-v3">
                            <a href="?page=detailArtikel&id=<?php echo $row['id_artikel'] ?>">
                                <div class="news-v3-in-sm no-padding">
                                    <ul class="list-inline posted-info">
                                        <li>Posted by Admin</li>
                                        <li>Tanggal <?php echo $row['tgl_sistem'] ?></li>
                                    </ul>
                                    <h3><b><?php echo $row['judul'] ?></b></h3>	 
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            
            <?php 
                }
            } else { 
                ?>
                    <div class="alert alert-danger">
                            <strong>Belum ada Data</strong>
                    </div>
            <?php } ?>
            
        </div>
    </div>
            
<?php
$home = ob_get_clean();
?>