<?php
ob_start();
if ($_SESSION){
	header('location:index.php');
}
if(isset($_POST['daftar'])){
    $fullName = mysqli_real_escape_string($link,$_POST['fullName']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $username = mysqli_real_escape_string($link,$_POST['username']);
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $tglLahir = mysqli_real_escape_string($link,$_POST['tgl_lahir']);
    $statusNikah = mysqli_real_escape_string($link,$_POST['status_nikah']);
    $statusKerja = mysqli_real_escape_string($link,$_POST['status_kerja']);
    $asalSekolah = mysqli_real_escape_string($link,$_POST['asal_sekolah']);
    
    $queryReg = mysqli_query($link,"INSERT INTO super_user (
        fullName,
        email,
        username,
        password,
        tgl_lahir,
        status_nikah,
        status_kerja,
        asal_sekolah,
        status_akun
        ) 
        VALUES ('$fullName','$email','$username','$password','$tglLahir','$statusNikah','$statusKerja','$asalSekolah','3')");

    if($queryReg){
        echo "<script>alert('Sukses Buat Akun, Silahkan Langsung Login')</script>";
    }
    else {
        echo "<script>alert('Gagal Buat Akun')</script>";
    }
}


if (isset($_POST['masuk'])){

    $username = mysqli_real_escape_string($link,$_POST['username']);
    $password = mysqli_real_escape_string($link,$_POST['password']);
    $queryLogin = mysqli_query($link,"SELECT * FROM super_user WHERE username = '$username' ");
    $row = mysqli_fetch_assoc($queryLogin);

    if($queryLogin){
        $pass = $row['password'];
        $iduser = $row['id_super'];
        $nama = $row['fullName'];
        $email = $row['email'];
        $tglsistem = $row['tgl_sistem'];
        $statAkun = $row['status_akun'];
        
            if(password_verify($password,$pass)){
            
                $_SESSION['id_user'] = $iduser; 
                $_SESSION['myname'] = $nama;
                $_SESSION['mymail'] = $email;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['myDate'] = $tglsistem;
                $_SESSION['myAccess'] = $statAkun;
                header('location:index.php');
                
            }
            else {
                echo '<script>alert("Periksa Kembali Username / Password Anda")</script>';
            }
        
        
    }
}
?>
<div class="container content-md">
    <div class="margin-bottom-60 head">
        <h1 class="text-center">Daftar Akun Atau Login</h1>
    </div>

    <div class="row space-xlg-hor equal-height-columns">
        <form method="post">
        <!--login Block-->
        <div class="form-block login-block col-md-6 col-sm-12 rounded-left equal-height-column">
            <div class="form-block-header">
                <h2 class="margin-bottom-15">Login</h2>
            </div>

            <div class="input-group margin-bottom-20">
                <span class="input-group-addon rounded-left"><i class="icon-user color-white"></i></span>
                <input type="text" class="form-control rounded-right" placeholder="Username" name="username">
            </div>

            <div class="input-group margin-bottom-20">
                <span class="input-group-addon rounded-left"><i class="icon-lock color-white"></i></span>
                <input type="password" class="form-control rounded-right" placeholder="Password" name="password">
            </div>

            <div class="row margin-bottom-70">
                <div class="col-md-12">
                    <button type="submit" class="btn-u btn-block rounded" name="masuk">Login</button>
                </div>
            </div>
            
        </div>
        </form>
        <!--End login Block-->
        <form method="post">
        <!--Reg Block-->
        <div class="form-block reg-block col-md-6 col-sm-12 rounded-right equal-height-column">
            <div class="form-block-header">
                <h2 class="margin-bottom-10">Buat Akun</h2>
                
            </div>

            <div class="input-group margin-bottom-20">
                <span class="input-group-addon rounded-left"><i class="icon-pencil"></i></span>
                <input type="text" class="form-control rounded-right" placeholder="Nama Lengkap" name="fullName">
            </div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon rounded-left"><i class="icon-envelope"></i></span>
                <input type="email" class="form-control rounded-right" placeholder="Alamat Email" name="email">
            </div>

            <div class="input-group margin-bottom-20">
                <span class="input-group-addon rounded-left"><i class="icon-user"></i></span>
                <input type="text" class="form-control rounded-right" placeholder="Username" name="username">
            </div>


            <div class="input-group margin-bottom-20">
                <span class="input-group-addon rounded-left"><i class="icon-lock"></i></span>
                <input type="password" class="form-control rounded-right" placeholder="Password" name="password">
            </div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon rounded-left"><i class="icon-calendar"></i></span>
                <input type="text" class="form-control rounded-right" name="tgl_lahir" id="date">
            </div>
            <div class="input-group margin-bottom-20">
                <label>Status Nikah</label>
                <select class="form-control " name="status_nikah">
                    <option>Pilih</option>
                    <option value="1">Belum Menikah</option>
                    <option value="2">Sudah Menikah</option>
                </select>
            </div>
            <div class="input-group margin-bottom-20">
                <label>Status Kerja</label>
                <select class="form-control " name="status_kerja">
                    <option>Pilih</option>
                    <option value="1">Pelajar</option>
                    <option value="2">PNS</option>
                    <option value="3">Swasta</option>
                    <option value="4">Guru</option>
                </select>
            </div>

            <div class="input-group margin-bottom-20">
                <span class="input-group-addon rounded-left"><i class=" icon-home "></i></span>
                <input type="text" name="asal_sekolah" class="form-control rounded-right" placeholder="Di isi apabila masih bersekolah">
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn-u btn-block rounded" name="daftar">Daftar Akun</button>
                </div>
            </div>
        </div>
        <!--End Reg Block-->
        </form>
    </div>
</div>
<?php
$account = ob_get_clean();
?>