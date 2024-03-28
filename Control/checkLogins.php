<?php

    error_reporting(0);
    session_start();
    require_once('../config/db.php');
    date_default_timezone_set('Asia/Bangkok');                                       

    $strSQL = "SELECT s.*, d .DeptTH FROM tbl_student AS s
               INNER JOIN tbl_dept AS d ON s.Dept=d.idDept
               WHERE Email = '".mysqli_real_escape_string($connect,$_POST["username"])."' 
               AND Code = '".mysqli_real_escape_string($connect,$_POST["pass"])."'
               ";
    $objQuery = mysqli_query($connect,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

    if(!$objResult){
        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
        echo "<script language='javascript'>alert('Information Not Found!!!');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=../login.php'>";
    }else{
             $_SESSION["Code"] = $objResult["Code"];
             $_SESSION["NameTitle"] = $objResult["NameTitle"];
             $_SESSION["Name"] = $objResult["Name"];
             $_SESSION["Lastname"] = $objResult["Lastname"];
             $_SESSION["Email"] = $objResult["Email"];
             $_SESSION["Tel"] = $objResult["Tel"];
             $_SESSION["DeptTH"]= $objResult["DeptTH"];
             $_SESSION["Status"] = $objResult["Status"];
             $_SESSION["Section"] = $objResult["Section"];
    }
    if($_SESSION["Status"]=="Admin" ){
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
            echo "<meta http-equiv='refresh' content='0;URL=../admin/'>";
            echo "<script language='javascript'>alert('Welcome Admin to SBAC Innovation Technology...');</script>";
    }
    if($_SESSION["Status"]=="Top Executive" ){ 
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
            echo "<meta http-equiv='refresh' content='0;URL=../Executive.php'>";
            echo "<script language='javascript'>alert('Welcome Top Executive to SBAC Innovation Technology...');</script>";
    }
    if($_SESSION["Status"]=="Lecturers" ){ 
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
            echo "<meta http-equiv='refresh' content='0;URL=../index.php'>";
            echo "<script language='javascript'>alert('Welcome Lecturer to SBAC Innovation Technology...');</script>";
    }
    if($_SESSION["Status"]=="Students"){ 
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
            echo "<meta http-equiv='refresh' content='0;URL=../index.php'>";
            echo "<script language='javascript'>alert('Welcome Student to SBAC Innovation Technology...');</script>";
    }
    

    mysqli_close($connect);
?>