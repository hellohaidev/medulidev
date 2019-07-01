<?php 
session_start();
if (empty($_SESSION)){
	header('location:index.php');
}
elseif (isset($_POST['logout']))
{
	session_destroy();
	header("location:index.php");
}
else {

    error_reporting("E_ALL ^ E_NOTICE");
    include './lib/db.php';
    include './nav.php';


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Meduli App</title>
    <!-- Favicon-->
    <!-- <link rel="icon" href="favicon.ico" type="image/x-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    
    <!-- Select Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet">
</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
   
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a> -->
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="?page=home"> Gerakan Milenial Peduli (Me-Duli)</a>
            </div>
            
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($_SESSION['myname']) ; ?></div>
                    <div class="email">Username : <?php echo $_SESSION['username']; ?></div>
                    <div class="email">Akun Di Buat : <?php echo $_SESSION['myDate']; ?></div>
                    <div class="email">ID Anda : <?php echo $_SESSION['id_user']; ?></div>
                    <!-- <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            
                        </ul>
                    </div> -->
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    
                    <li>
                        <a href="?page=editSuperUser&id=<?php echo $_SESSION['id_user'] ?>" class="btn bg-blue">
                            
                            <h4 class="putih tengah"><i class="material-icons">edit</i> Edit Profile</h4>
                        </a>
                    </li>
                    
                    <li>
                        <a href="?page=home">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="?page=dataCampaign">
                        <i class="material-icons">widgets</i>
                            <span>Data Lapor</span>
                        </a>
                    </li>
                    <?php 
                    if($_SESSION['myAccess'] == 1){
                    ?>
                    <li>
                        <a href="?page=artikel">
                        <i class="material-icons">widgets</i>
                            <span>Artikel</span>
                        </a>
                    </li>
                    <li>
                            <a href="?page=dataMember">
                                <i class="material-icons">assignment</i>
                                <span>User Meduli</span>
                            </a>
                    </li>
                    <li>
                            <a href="?page=dataSuperUser">
                                <i class="material-icons">assignment</i>
                                <span>User List </span>
                            </a>
                    </li>
                    <?php 
                    }
                    ?>
                    <li>
                        <form method="post">
                            <button type="submit" name="logout" class="btn bg-blue btn-block">
                                    <i class="material-icons">lock</i>
                                    <span>Logout</span>
                            </button>
                        </form>
                    </li>
                   
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('Y') ?> <a href="javascript:void(0);">Generasi Milenial Peduli</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
       
    </section>

    <section class="content">
        <div class="container-fluid">
            <?php echo $content; ?>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="plugins/autosize/autosize.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script>
        let ctx = document.getElementById('myBarChart')
        var densityData = {
            label: 'Grafik Koperasi Aktif / Tidak Aktif',
            data: [5427, 5243, 5514, 3933, 1326, 687, 1271, 1638]
        };
            
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Aktif", "Tidak Aktif"],
                datasets: [densityData]
            }
        });
    </script>
    
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    
    
    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>
    <script src="js/ckeditor/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace( 'cktext',{
                
                uiColor: '#9AB8F3'
            } );

            $('.dataTable').DataTable();
            $('.dataTableUser').DataTable();
            $('.dataTableMember').DataTable();
        });
    </script>
    
</body>

</html>
<?php 
}
?>