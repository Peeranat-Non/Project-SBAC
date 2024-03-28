<?php

session_start();
require_once './config/db.php';
require_once './Control/checkstatus.php';
date_default_timezone_set('Asia/Bangkok');

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "Test";?>
<?php include("./view/head.php"); ?> 

<body>

  <!-- Navbar Start -->
  <?php include("./view/navbar.php"); ?> 
  <!-- navbar End -->

    
  <!-- Footer Start -->
  <?php include("./view/footer.php"); ?> 
  <!-- Footer End -->

  <!-- Script Start -->
  <?php include("./view/script.php"); ?> 
  <!-- Script End  -->
</body>
</html>
