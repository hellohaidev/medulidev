<?php 

switch($_GET['page']){
    case 'home' :
        if($_GET['page']){
            include './modul/home.php';
            $client = $home;
        };
    break;

    case 'kontak' :
        if($_GET['page']){
            include './modul/kontak/kontak.php';
            $client = $kontak;
        };
    break;

    case 'detailLaporan' :
        if($_GET['page']){
            include './modul/laporan/detailLaporan.php';
            $client = $detailLaporan;
        };
    break;



    default :
        include './modul/home.php';
        $client = $home;
        break;
}



?>