<?php

session_start();
require_once '../Control/checkstatus.php';
date_default_timezone_set('Asia/Bangkok');

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "form"; ?>
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

          <a href="form.php?act=add" class="btn btn-success mb-3">
            <i class="fa-solid fa-file-lines"></i> เพิ่มข้อมูลแบบฟอร์ม</a>
          <!-- ./col -->
          <div class="col">
            <?php
            $act = (isset($_GET['act']) ? $_GET['act'] : '');
            if ($act == 'add') {
              include('form_add.php');
            } elseif ($act == 'edit') {
              include('form_edit.php');
            } else {
              include('form_list.php');
            }
            ?>
          </div>
        </div>
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <?php include("./view/script.php"); ?>

</body>

</html>