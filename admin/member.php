<?php

session_start();
require_once '../Control/checkstatus.php';
date_default_timezone_set('Asia/Bangkok');

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "member"; ?>
<?php include("./view/head.php"); ?>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <?php include("./view/menu.php"); ?>

      <div class="layout-page">

        <?php include("./view/navbar.php"); ?>

        <div class="container-xxl container-p-y">
          <!-- Small boxes (Stat box) -->

          <a href="member.php" class="btn btn-success mb-3">
            <i class="fas fa-users"></i> ข้อมูลอาจารย์</a>
          <a href="member_student.php" class="btn btn-success mb-3">
            <i class="fas fa-users"></i> ข้อมูลนักศึกษา</a>
          <!-- ./col -->
          <div class="col">
            <?php
            $act = (isset($_GET['act']) ? $_GET['act'] : '');
            if ($act == 'add') {
              include('member_add.php');
            } elseif ($act == 'edit') {
              include('member_edit.php');
            } else {
              include('member_list.php');
            }
            ?>
          </div>
        </div>
        <!-- Content wrapper -->
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <?php include("./view/script.php"); ?>

</body>

</html>