<?php 

switch($_GET['page']){
    case 'home' :
        if($_GET['page']){
            include './modul/home.php';
            $content = $home;
        };
    break;

    case 'kontak' :
        if($_GET['page']){
            include './modul/kontak/kontak.php';
            $content = $kontak;
        };
    break;

    case 'detailLaporan' :
        if($_GET['page']){
            include './modul/laporan/detailLaporan.php';
            $content = $detailLaporan;
        };
    break;

    case 'account' :
        if($_GET['page']){
            include './modul/account/account.php';
            $content = $account;
        };
    break;

    case 'detailArtikel' :
        if($_GET['page']){
            include './modul/artikel/detailArtikel.php';
            $content = $detailArtikel;
        };
    break;



    default :
        include './modul/home.php';
        $content = $home;
        break;
}



?>