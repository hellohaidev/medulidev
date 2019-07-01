<?php 
session_start();
error_reporting('E_ALL');
include './super/lib/db.php';
include './navigasi.php';
if (isset($_POST['logout']))
{
	session_destroy();
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
         <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="style/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style/css/owl.carousel.min.css">
        <link rel="stylesheet" href="style/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="style/css/animate.css">
        <link rel="stylesheet" href="style/css/custom.css" />
        
    </head>
    <body style="font-family: 'Titillium Web', sans-serif;">
    
    <nav class="navbar navbar-expand-md navbar-dark" >
        <!-- Brand -->
            <a class="navbar-brand text-white" href="?page=home">Meduli</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler bg-dark"  type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?page=home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?page=kontak">Kontak Kami</a>
                    </li>
                    <?php 
                        if($_SESSION){
                    ?>        
                    <li class="nav-item">
                        <a class="nav-link text-white"  target="blank">
                            Selamat Datang : <?php echo  strtoupper($_SESSION['myname'])  ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="post">
                            <button type="submit" name="logout" class="btn bg-danger text-white">
                                    Logout
                            </button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="btn bg-info text-white"  target="blank" href="http://192.168.43.134/meduli/super/">
                            Dashboard
                        </a>
                    </li>
                <?php     
                }else {
                ?>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="super/" target="blank">
                            Daftar / Masuk
                        </a>
                    </li>
                <?php 
                }
                ?>
                
                
                
                </ul>
            </div>
        </nav> 
    
        <?php echo $client; ?>
        <footer  class="navbar footer fixed-bottom footer-light footer-shadow content container-fluid bg-dark text-white" >
            <div class="container text-center">
                <small>Copyright &copy; Your Website</small>
            </div>
        </footer>

        <!-- jQuery library -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="style/js/bootstrap.js"></script> 

        <script src="https://kit.fontawesome.com/d55bd10db8.js"></script>
        <script src="style/js/owl.carousel.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="style/js/jquery.counter.min.js"></script>
        <script>
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
            // Select all tabs
            $('.nav-tabs a').click(function(){
                $(this).tab('show');
            })
            $(document).ready(function(){
                $(".owl-carousel").owlCarousel({
                    loop:true,
                    autoplay:true,
                    autoplayTimeout:3000
                });
            });
        });
    </script>
    <script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://http-techinfo-id.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
    </script>
    </body>
</html>