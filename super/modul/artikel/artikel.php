<?php 
ob_start();
?>
<div class="block-header">
    <h2>Data Lapor</h2>
</div>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <a href="?page=addArtikel" class="btn bg-red btn-lg">Buat Artikel</a>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <?php if($_SESSION['myAccess'] == 1){?>                
                    <table class="table table-bordered table-striped table-hover dataTable ">
                        <thead>
                            <tr>
                                <th>Nama Pelapor</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php  
                            $query = mysqli_query($link,"SELECT * FROM tm_artikel");
                            while($row = mysqli_fetch_array($query)){
                                //check if data > 0
                                if(mysqli_num_rows($query) > 0){
                            ?>
                                <tr>
                                    <td><?php echo $row['judul'] ?></td>
                                    <td>
                                        <a href="?page=deleteArtikel&id=<?php echo $row['id_artikel'] ?>" class="btn bg-red">Delete</a>
                                        <a href="?page=editArtikel&id=<?php echo $row['id_artikel'] ?>" class="btn bg-blue">Edit</a>
                                        <a href="?page=viewArtikel&id=<?php echo $row['id_artikel'] ?>" class="btn bg-green">View</a>
                                    </td>
                                </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php } ?>
                    <?php if($_SESSION['myAccess'] == 2 OR $_SESSION['myAccess'] == 3){?>                
                    <table class="table table-bordered table-striped table-hover dataTable ">
                        <thead>
                            <tr>
                                <th>Nama Pelapor</th>
                                <th>Kriteria</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php  
                            $query = mysqli_query($link,"SELECT * FROM tm_pengaduan 
                                                    INNER JOIN super_user ON super_user.id_super = tm_pengaduan.id_super
                                                    INNER JOIN tm_kriteria ON tm_kriteria.id_kriteria = tm_pengaduan.id_kriteria
                                                    WHERE tm_pengaduan.id_super = '$idSuper'");

                            while($row = mysqli_fetch_array($query)){
                                //check if data > 0
                                if(mysqli_num_rows($query) > 0){
                            ?>
                                <tr>
                                    <td><?php echo $row['fullName'] ?></td>
                                    <td><?php echo $row['jenis_kriteria'] ?></td>
                                    <td>
                                        <a href="?page=deleteCampaign&id=<?php echo $row['id_pengaduan'] ?>" class="btn bg-red">Delete</a>
                                        <a href="#" class="btn bg-blue">Edit</a>
                                        <a href="#" class="btn bg-green">View</a>
                                    </td>
                                </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>
        </div>


    </div>
</div>



<?php 
$artikel = ob_get_clean();
?>