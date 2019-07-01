<?php
ob_start();

if(isset($_POST['kirim']))
{
    $fullName = mysqli_real_escape_string($link,$_POST['fullName']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $username = mysqli_real_escape_string($link,$_POST['username']);
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $tglLahir = mysqli_real_escape_string($link,$_POST['tgl_lahir']);
    
    $query = mysqli_query($link,"INSERT INTO super_user (fullName,email,username,password,tgl_lahir,status_akun) VALUES ('$fullName','$email','$username','$password',$tglLahir,'2')");
    if($query){
        echo "<script>alert('Sukses Buat Akun')</script>";
    }
    else {
        echo "<script>alert('Gagal Buat Akun')</script>";
    }
}
?>
<div class="block-header">
    <h2>
        List User Petugas
    </h2>
</div>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <button class="btn bg-blue btn-lg" type="button" data-toggle="modal" data-target="#largeModal">Buat Akun Petugas</button>
            </div>
            <div class="body">
                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTableUser">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php  
                            $query = mysqli_query($link,"SELECT * FROM super_user WHERE super_user.status_akun = 1 OR super_user.status_akun = 2 ");
                            while($row = mysqli_fetch_array($query)){
                                //check if data > 0
                                if(mysqli_num_rows($query) > 0){
                                    
                                    $statusAkun = $row['status_akun'];
                                    if($statusAkun == 1){
                                        $statAkun = "Admin";
                                    }
                                    if($statusAkun == 2) {
                                        $statAkun = "Staff";
                                    }
                                    
                            ?>
                                <tr>
                                    <td><?php echo $row['fullName'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $statAkun ?></td>
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
        </div>

        <!-- Modal Form -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Form User</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="fullName" class="form-control">
                                            <label class="form-label">Nama Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" name="email" class="form-control">
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control">
                                            <label class="form-label">Username</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" name="password" class="form-control">
                                            <label class="form-label">Password</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="control-label">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <input type="submit" class="btn bg-blue waves-effect" value="Buat Akun" name="kirim"> 
                                        <input type="button" class="btn bg-red waves-effect" data-dismiss="modal" value="Tutup"> 
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>



    </div>
</div>
<?php
$superUser = ob_get_clean();
?>