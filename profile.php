<?php

session_start();
require_once './config/db.php';
require_once './Control/checkstatus.php';
date_default_timezone_set('Asia/Bangkok');

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "profile";?>
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
              <div class="d-inline-block text-primary py-1 px-3 mb-3">ข้อมูลการผู้ใช้งาน</div>
            </div>
          </h1>
        </div>
        <div class="p-5 mb-4 bg-light shadow rounded-3">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 text-center">
                <img class="tebd-placeholder-img rounded mb-4" src="./img//avatar.jpg" width="280" height="280">
              </div>
              <div class="col-md-4">
                <ul class="list-unstyled mb-1-9">
                  <li class="mb-2 mb-xl-3 fs-5"><span class="text-dark me-2 font-weight-800">รหัสประจำตัว:</span><?php echo $_SESSION['Code'] ?></li>
                  <li class="mb-2 mb-xl-3 fs-5"><span class="text-dark me-2 font-weight-800">ชื่อ-นามสกุล:</span><?php echo $_SESSION['NameTitle'] . '' . $_SESSION['Name'] . ' ' . $_SESSION['Lastname'] ?></li>
                  <li class="mb-2 mb-xl-3 fs-5"><span class="text-dark me-2 font-weight-600">ระดับการศึกษา:</span>ปวช.3/7</li>
                  <li class="mb-2 mb-xl-3 fs-4"><span class="text-danger me-2 font-weight-800">ข้อมูลการติดต่อ</span></li>
                  <li class="mb-2 mb-xl-3 fs-5"><span class="text-dark me-2 font-weight-600">E-mail:</span><?php echo $_SESSION['Email'] ?></li>
                  <li class="mb-2 mb-xl-3 fs-5"><span class="text-dark me-2 font-weight-600">เบอร์โทร:</span><?php echo $_SESSION['Tel'] ?></li>
                  <li class="mb-2 mb-xl-3 fs-5"><span class="text-dark me-2 font-weight-600"></span></li>
                </ul>
              </div>
              <div class="col-md-4">
                <ul class="list-unstyled mb-1-9">
                  <!-- <li class="mb-2 mb-xl-3 fs-5"><span class="text-dark me-2 font-weight-600">ภาควิชา:</span>เทคโนโลยีสารสนเทศ</li> -->
                  <li class="mb-2 mb-xl-3 fs-5"><span class="text-dark me-2 font-weight-600">ภาควิชา:</span><?php echo $_SESSION['DeptTH'] ?></li>
                  <li class="mb-2 mb-xl-3 fs-5"><span class="text-dark me-2 font-weight-600">สาขา:</span><?php echo $_SESSION['DeptTH'] ?></li>
                  <li class="mb-2 mb-xl-3 fs-5"><span class="text-dark me-2 font-weight-600">รอบ:</span>
                      <?php  
                          $st =  $_SESSION['Section'];
                          if ($st=='Morning') {
                          echo "เช้า";
                          }elseif ($st=='Sat-Sun') {
                          echo "เสาร์-อาทิตย์";
                          }else{
                          echo "";
                          }
                      ?>
                  </li>
                </ul>
              </div>
              <div class="text-start">
                <h1 class="display-0 mb-3 fs-3">
                  <div>
                    Meaningful Stories
                  </div>
                </h1>
                <p class="text-lg-start ms-2">Your sim might get into a depressive rut for days that takes planning and effort and some
                  help from their friends to overcome. Or your sim's creative nature might be filling them with inspiration
                  when they ought to be focused instead, so you send them to work on their novel to get the ideas
                  out of their head. But then something special happens, like a new friend, a promotion, or a first kiss,
                  and they feel truly happy for once, in a way they never have before.</p>
              </div>
            </div>
          </div>
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