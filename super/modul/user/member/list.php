<?php 
ob_start();
?>

<div class="row clearfix">
    <h2>Data Member</h2>
    <div class="table-responsive">
        <table  class="table dataTableMember table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = mysqli_query($link,"SELECT * FROM super_user WHERE status_akun = 3");
                    if(mysqli_num_rows($query) > 0){
                        while($row = mysqli_fetch_array($query)) {
                            if($row['status_akun'] == 3 ){
                                $statusAkun = "Member";
                            }
                ?>
                    <tr>        
                        <td><?php echo $row['fullName'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $statusAkun ?></td>
                        <td>
                            <a href="#" class="btn bg-red">Delete</a>
                            <a href="?page=editSuperUser&id=<?php echo $row['id_super'] ?>" class="btn bg-blue">Edit</a>
                            <a href="#" class="btn bg-green">View</a>
                        </td>
                    </tr>
                <?php 
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php 
$listMember = ob_get_clean();
?>