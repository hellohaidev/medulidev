<?php 
ob_start();
$id = $_GET['id'];

$query = "SELECT * FROM tm_artikel WHERE tm_artikel.id_artikel = '$id'";
$result = mysqli_query($link,$query);
$row = mysqli_fetch_array($result);
?>


<div class="container content">
    <div class="row">
        <div class="col-md-8">
            <div class="margin-bottom-30">
                <h2><?php echo $row['judul'] ?></h2>
                <img class="img-responsive" src="super/img/artikel/<?php echo $row['fl_photo'] ?>"/>
            </div>
            <div class="tab-v1">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Detail</a></li>
                    <li><a href="#profile" data-toggle="tab">Diskusi</a></li>
                    
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                        <?php echo $row['deskripsi'] ?>
                    </div>
                    <div class="tab-pane fade in" id="profile">
                        <div id="disqus_thread"></div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4" id="data-laporan">
            
            <?php 
                    $query = "SELECT * FROM tm_artikel limit 3";
                    $result = mysqli_query($link,$query);
                    if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        
                    
                ?>
                
                    <a href="?page=detailArtikel&id=<?php echo $row['id_artikel'] ?>">
                        <div class="news-v1-in bg-color-white margin-bottom-10">
                            <img class="img-responsive" src="super/img/artikel/<?php echo $row['fl_photo'] ?>" style="height:200px;">
                            <h3><b><?php echo $row['judul'] ?></b></h3>
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
$detailArtikel = ob_get_clean();
?>
