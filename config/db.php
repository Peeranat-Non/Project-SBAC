<?php
    $host = "localhost" ; 
    $username = "root" ; 
    $password = "" ;
    $db = "sbac_dms" ;  

    $connect = mysqli_connect($host,$username,$password,$db);
    mysqli_query($connect,"SET CHARACTER SET 'utf8'");
    mysqli_query($connect,"SET SESSION collation_connection ='utf8_unicode_ci'");
    
    if (!$connect) {
        die('Could not connect: ' . mysqli_connect_errno());
    }

?>
