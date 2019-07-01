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

<div class="container">
    <section class="g-mt-section">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <h2><?php echo $row['judul_campaign'] ?></h2>
                    <img class="img-fluid" src="super/img/campaign/<?php echo $row['fl_photo'] ?>"/>
                </div>

                <div class="g-mt-section">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home">Detail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">Komentar</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active container" id="home">
                            <div class="g-mt-section g-pb-section" style="padding-bottom:20px;">
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
                        </div>
                        <div class="tab-pane container" id="menu1">
                            <div id="disqus_thread"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </section>

</div>
<?php 
$detailLaporan = ob_get_clean();
?>
