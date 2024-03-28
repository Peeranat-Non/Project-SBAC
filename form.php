<?php

session_start();
require_once './config/db.php';
require_once './Control/checkstatus.php';
date_default_timezone_set('Asia/Bangkok');

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "form";?>
<?php include("./view/head.php"); ?> 

<body>

  <!-- Spinner Start -->
  <?php include("./view/spinner.php"); ?> 
  <!-- Spinner End -->
  
  <!-- Navbar Start -->
  <?php include("./view/navbar.php"); ?> 
  <!-- navbar End -->

  <section class="" style="background-color: #f2f7ff;">
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
          <h1 class="display-6 mb-0">
            <div class="h-100">
              <div class="d-inline-block text-primary py-1 px-3 mb-3">แบบฟอร์ม</div>
            </div>
          </h1>
        </div>
        <div class="p-5 mb-4 bg-light shadow rounded-3">
          <!-- <div class="text-start">
            <h1 class="display-0 mb-3 fs-3">
              <div>
                แหล่งทุนวิจัย
              </div>
            </h1>
          </div> -->
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th tabindex="0" rowspan="1" colspan="1" style="width: 80%;"></th>
                  <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                //คิวรี่ข้อมูลมาแสดงในตาราง
                require_once './admin/condb.php';
                $stmt = $conn->prepare("SELECT* FROM tbl_form");
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach ($result as $row_form) {
                ?>
                <tr>
                  <td><?= $row_form['form_name'];?></td>
                  <td><a href="./admin/doc_file/form/<?php echo $row_form['form_file'];?>" target="_blank" class="btn btn-danger"> Download </a>
                </tr>
                <?php } ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
    <br>
  </section>

  <!-- Footer Start -->
  <?php include("./view/footer.php"); ?> 
  <!-- Footer End -->

  <!-- Script Start -->
  <?php include("./view/script.php"); ?> 
  <!-- Script End  -->
  
</body>

</html>

<?php mysqli_close($connect); ?>