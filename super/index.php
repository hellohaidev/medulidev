<?php 
session_start();
error_reporting('E_ALL');
include './lib/db.php';
include './nav.php';

if ($_SESSION){
	header('location:page.php');
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
                header('location:page.php');
                
            }
            else {
                echo '<script>alert("Periksa Kembali Username / Password Anda")</script>';
            }
        
        
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In || Meduli App</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="bg-blue">
    
        <div class="signup-page">
            <div class="signup-box">
                <div class="logo">
                    <a href="javascript:void(0);"><b>ME-DULI</b></a>
                    <small>Gerakan Milenial Peduli</small>
                </div>
                <div class="card">
                    <div class="body">
                        <div class="m-t-25 m-b--5 align-center">
                            <button class="btn bg-red btn-lg" type="button" data-toggle="modal" data-target="#loginModal">Sudah Punya Akun Login ?</button>
                            <h3>Atau</h3>
                        </div>
                        <form  method="post" enctype="multipart/form-data">
                            <div class="msg">Buat Akun</div>
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
                                <label class="control-label">Status Nikah</label>
                                <select class="form-control " name="status_nikah">
                                    <option>Pilih</option>
                                    <option value="1">Belum Menikah</option>
                                    <option value="2">Sudah Menikah</option>
                                </select>
                            </div>
                            <div class="form-group form-float">
                                <label class="control-label">Status Kerja</label>
                                <select class="form-control " name="status_kerja">
                                    <option>Pilih</option>
                                    <option value="1">Pelajar</option>
                                    <option value="2">PNS</option>
                                    <option value="3">Swasta</option>
                                    <option value="4">Guru</option>
                                </select>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label">Asal Sekolah (Khusus SMP / SMA)</label>
                                <input type="text" name="asal_sekolah" class="form-control" placeholder="Di isi apabila masih bersekolah">
                            </div>
                            <input name="daftar" class="btn btn-block btn-lg bg-pink waves-effect" type="submit" value="Buat Akun">

                        </form>
                           
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title align-center" id="defaultModalLabel">Form Campaign</h4>
                    </div>
                    <div class="modal-body">
                        
                            <div class="row clearfix">
                                <div class="col-sm-12">   
                                    <div class="body">
                                        <form method="post">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">person</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-xs-4">
                                                    <button class="btn btn-block bg-pink waves-effect" name="masuk" type="submit">Log In</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>            
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>