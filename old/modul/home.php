<?php

ob_start();

$totalLaporan = mysqli_query($link,"SELECT COUNT(*) as 'total_laporan' FROM tm_pengaduan");
$resultLaporan  = mysqli_fetch_array($totalLaporan);
?>
<div class="container">
    <section class="g-mt-section">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center animated bounce">
                    <div class="card-header text-white milenial-color-bg-blue">Total Donasi</div>
                    <div class="card-body">
                        <span class="counter">1,234,567.00</span>
                    </div>
                </div>    
            </div>

            <div class="col-md-4">
                <div class="card text-center animated bounce">
                    <div class="card-header bg-danger text-white milenial-color-bg-blue">Total Laporan</div>
                    <div class="card-body">
                        <span class="counter"><?php echo $resultLaporan['total_laporan']  ?></span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center animated bounce">
                    <div class="card-header bg-primary text-white milenial-color-bg-blue">Total Member</div>
                    <div class="card-body">
                        <span class="counter">2000</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="container-fluid">
    <section class="g-mt-section">
        <div class="row">
            <div class="col-md-4 milenial-color-bg-blue text-white" style="margin-bottom:5px;">
                <h1>Website Pelaporan Sosial</h1>
                <h2>#1 Kabupaten Bogor</h2>
                <a href="#" class="btn bnt-lg text-white text-center" style="background-color:#e51d2f;font-size:20px;">
                <i class="fas fa-clipboard-list"></i> Lihat Laporan
                </a>
            </div>
            <div class="col-md-8">
                
                <div class="owl-carousel">
                <?php 
                    $querys = "SELECT * FROM tm_pengaduan 
                                INNER JOIN tm_kriteria ON tm_kriteria.id_kriteria = tm_pengaduan.id_kriteria
                                INNER JOIN super_user ON super_user.id_super = tm_pengaduan.id_super
                                limit 4";
                    $results = mysqli_query($link,$querys); 
                    if(mysqli_num_rows($results) > 0){       
                    while($rows = mysqli_fetch_array($results)){
                ?>   
                        <div class="item">
                            <a href="?page=detailLaporan&id=<?php echo $rows['id_pengaduan'] ?>">
                                <img class="img-fluid" src="super/img/campaign/<?php echo $rows['fl_photo'] ?>" style="height:300px;padding-left:3px;"/>
                                <span><b><i>#<?php echo $rows['jenis_kriteria'] ?></i></b></span>
                            </a>
                        </div>
                        
                
                <?php 
                    }
                }
                ?>
                </div>
                
            </div>
            
        </div>
    </section>
    <section class="g-mt-section" style="margin-bottom:30px;">
        <h1 class="text-center">Siap Memberi Bantuan ?</h1>
        <div class="row">
            <?php 
                $query = "SELECT * FROM tm_pengaduan 
                            INNER JOIN tm_kriteria ON tm_kriteria.id_kriteria = tm_pengaduan.id_kriteria
                            INNER JOIN super_user ON super_user.id_super = tm_pengaduan.id_super
                            limit 6";
                $result = mysqli_query($link,$query);
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    
                
            ?>
                <div class="col-md-4" style="padding-bottom:10px;">
                    <div class="card animated slideInLeft milenial-color-bg-blue">
                        <!-- <div class="card-header text-white" style="background-color:#24da53;"><h4>Nama Pelapor : <?php echo strtoupper($row['fullName'])  ?></h4></div> -->
                        <div class="card-body">
                            <div>
                                <img class="img-fluid" src="super/img/campaign/<?php echo $row['fl_photo'] ?>" style="height:300px;"/>
                            </div>
                            <div style="margin-bottom:15px;color:#fff;">
                                <h5><i class="fas fa-user-circle"></i> <?php echo $row['judul_campaign'] ?> <i class="fas fa-check-circle" style="color:cyan;"></i></h5> 
                                <span><b><i>#<?php echo $row['jenis_kriteria'] ?></i></b></span>
                            </div>
                            <div class="text-center">
                                <a class="btn btn-lg text-white text-center" style="background-color:#00ff0d;" href="?page=detailLaporan&id=<?php echo $row['id_pengaduan'] ?>">
                                    <i class="far fa-hand-point-right"></i>   Detail
                                </a>
                            </div>
                        </div> 
                        
                        
                    </div>
                </div>
                
            <?php 
                }
            }
            ?>
        </div>
    </section>
    <section class="g-mt-section g-mb-section ">
        <h1 class="text-center">Artikel</h1>
        <div class="row">
        <div class="owl-carousel">
            <?php 
                $query = "SELECT * FROM tm_pengaduan 
                            INNER JOIN tm_kriteria ON tm_kriteria.id_kriteria = tm_pengaduan.id_kriteria
                            INNER JOIN super_user ON super_user.id_super = tm_pengaduan.id_super";
                $result = mysqli_query($link,$query);
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    
                
            ?>
                <div class="item">
                    <div class="card animated slideInLeft milenial-color-bg-green" style="min-height:550px;">
                        <!-- <div class="card-header text-white" style="background-color:#24da53;"><h4>Nama Pelapor : <?php echo strtoupper($row['fullName'])  ?></h4></div> -->
                        <div class="card-body">
                            <div style="height:300px;">
                                <img class="img-fluid" src="super/img/campaign/<?php echo $row['fl_photo'] ?>" style="height:300px;"/>
                            </div>
                            <div style="margin-bottom:15px;color:#fff;">
                                <h5><i class="fas fa-user-circle"></i> <?php echo $row['judul_campaign'] ?> <i class="fas fa-check-circle" style="color:cyan;"></i></h5> 
                                <span><b><i>#<?php echo $row['jenis_kriteria'] ?></i></b></span>
                            </div>
                            <div class="text-center">
                                <a class="btn btn-lg text-white text-center" style="background-color:#007bff;" href="?page=detailLaporan&id=<?php echo $row['id_pengaduan'] ?>">
                                    <i class="far fa-hand-point-right"></i>   Detail
                                </a>
                            </div>
                        </div> 
                        
                        
                    </div>
                </div>
                
            <?php 
                }
            }
            ?>
        </div>
        </div>
    </section>
</div>

<?php
$home = ob_get_clean();
?>