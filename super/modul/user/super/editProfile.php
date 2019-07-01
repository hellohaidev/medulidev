<?php 
ob_start();

$id = $_GET['id'];

$query = mysqli_query($link,"SELECT * FROM super_user WHERE id_super = '$id' ");
$row = mysqli_fetch_array($query);

if(isset($_POST['updateProfile'])){
    $pass = $_POST['password'];
    $tglLahir = mysqli_real_escape_string($link,$_POST['tgl_lahir']);
    $changePass = password_hash($pass,PASSWORD_DEFAULT);

    $query = mysqli_query($link,"UPDATE super_user SET tgl_lahir = '$tglLahir',password = '$changePass' WHERE super_user.id_super = '$id' ");
    if($query){
        echo "<script>alert('Berhasil Update Profile');window.location.assign(\"page.php?page=home\")</script>";
    }
    else {
        echo "<script>alert('Gagal Update Profile');window.location.assign(\"page.php?page=home\")</script>";
    }
}
?>
<div class="body">
            <div class="row clearfix">
            <h2 class="align-center">Edit Profile</h2>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Nama Lengkap : </label>
                        <input type="text" class="form-control" value="<?php echo $row['fullName'] ?>" readonly/>
                    </div>
                </div>  
            </div>
            <form method="post">
                <div class="row clearfix">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Email : </label>
                            <input type="text" class="form-control" value="<?php echo $row['email'] ?>" readonly/>
                        </div>
                    </div>  
                </div>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Username : </label>
                            <input type="text" class="form-control" value="<?php echo $row['username'] ?>" readonly/>
                        </div>
                    </div>  
                </div>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $row['tgl_lahir'] ?>">
                        </div>
                    </div>  
                </div>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Ganti Password : </label>
                            <input type="password" class="form-control" name="password" />
                        </div>
                    </div>  
                </div>
                <div class="row clearfix">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="submit" class="btn bg-blue" name="updateProfile" value="Update Profile"/>
                        </div>
                    </div>
                </div>
            </form>
    
</div>
<?php 
$editSuperUser = ob_get_clean();
?>