<?php 
ob_start();
?>

<div class="block-header">
    <h2>DASHBOARD</h2>
</div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Donasi Anda</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">Rp. 100.000.000</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Laporan Anda</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">200</div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row clear-fix">
                <a class="btn bg-green btn-block" href="http://192.168.43.134/meduli/index.php" target="blank">Lihat Seluruh Laporan</a>
            </div>
            <!-- #END# Widgets -->
            
            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Grafik Koperasi</h2>
                        
                    </div>
                    <div class="body">
                        <canvas id="myBarChart" height="150"></canvas>
                    </div>
                </div>
            </!-->
             

            <?php 
            $dashboard = ob_get_clean();
            ?>