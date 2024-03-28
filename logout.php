<?php 
    session_start();
    unset($_SESSION['Status']);
    header('location: login.php');
?>