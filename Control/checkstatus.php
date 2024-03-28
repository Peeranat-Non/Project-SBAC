<?php

if (!$_SESSION["Status"] == "Admin") {
    header('location: ../login.php');
}
if (!$_SESSION["Status"] == "Top Executive") {
    header('location: logn.php');
}
if (!$_SESSION["Status"] == "Lecturers") {
    header('location: login.php');
}
if (!$_SESSION["Status"] == "Students") {
    header('location: login.php');
}


?>