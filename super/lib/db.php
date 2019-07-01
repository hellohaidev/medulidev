<?php
    $host = "localhost";
    $user = "root";
    $pass = "develop93";
    $dbname = "meduliapp";

    $link = new mysqli($host,$user,$pass,$dbname);
    
    /**
     * CHECK CONNECTION TO DATABASE
     */
    // if($link){
    //     echo 'konek';
    // }
    // else {
    //     echo 'not konek';
    // }
?>