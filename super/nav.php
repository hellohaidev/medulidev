<?php 


switch($_GET['page']) {
    case 'home' :
        if($_GET['page']){
            include './modul/dashboard.php';
            $content = $dashboard;
        }
        break;

    /**
     * Campaign Management
     */

    case 'dataCampaign' :
        if($_GET['page']){
            include './modul/campaign/crud/list.php';
            $content = $list;
        }
    break;

    case 'deleteCampaign' :
        if($_GET['page']){
            include './modul/campaign/crud/delete.php';
            $content = $deleteCampaign;
        }
    break;


    case 'viewCampaign' :
        if($_GET['page']){
            include './modul/campaign/crud/view.php';
            $content = $viewCampaign;
        }
    break;
    case 'editCampaign' :
        if($_GET['page']){
            include './modul/campaign/crud/edit.php';
            $content = $editCampaign;
        }
    break;

    /**
     * User Management
     */

    case 'dataMember' :
        if($_GET['page']){
            include './modul/user/member/list.php';
            $content = $listMember;
        }
    break;

    

    case 'dataSuperUser' :
        if($_GET['page']){
            include './modul/user/super/list.php';
            $content = $superUser;
        }
    break;

    
    case 'editSuperUser' :
        if($_GET['page']){
            include './modul/user/super/editProfile.php';
            $content = $editSuperUser;
        }
    break;

    /**
     * Artikel
     */
    case 'artikel' :
        if($_GET['page']){
            include './modul/artikel/artikel.php';
            $content = $artikel;
        }
    break;
    case 'addArtikel' :
        if($_GET['page']){
            include './modul/artikel/add.php';
            $content = $addArtikel;
        }
    break;
    case 'viewArtikel' :
        if($_GET['page']){
            include './modul/artikel/view.php';
            $content = $viewArtikel;
        }
    break;
    case 'deleteArtikel' :
        if($_GET['page']){
            include './modul/artikel/delete.php';
            $content = $deleteArtikel;
        }
    break;
    case 'editArtikel' :
        if($_GET['page']){
            include './modul/artikel/edit.php';
            $content = $editArtikel;
        }
    break;

    
    
    
    

    default :
        include './modul/dashboard.php';
        $content = $dashboard;
        break;
}

?>