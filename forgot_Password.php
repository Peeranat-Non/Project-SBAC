<?php

session_start();
require_once("config/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "";?>
<?php include("./view/head.php"); ?> 

<body>
  <!-- Spinner Start -->
  <?php include("./view/spinner.php"); ?> 
  <!-- Spinner End -->

  <section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 ">
              <form>
                <h3 class=" mx-auto display-6 ">
                  <div class="d-inline-block text-primary ">
                    ลืมรหัสผ่าน
                  </div>
                </h3>
                <div id="passwordHelpBlock" class="form-text">
                  กรุณากรอกอีเมล เพื่อคุณจะได้รับลิงก์สำหรับสร้างรหัสผ่านใหม่ทางอีเมล
                </div>
                <br>
                <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                <br>
                <div class="d-grid gap-2 mb-4">
                  <button class="btn btn-primary btn-lg" type="button">เปลี่ยนรหัสผ่าน</button>
                </div>
                <div class="button">
                  <a href="./login.php" class="d-flex align-items-center justify-content-center"><i class="fa-solid fa-less-than me-3"></i>ย้อนกลับ</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Script Start -->
  <?php include("./view/script.php"); ?> 
  <!-- Script End  -->
  
</body>

</html>

<?php mysqli_close($connect); ?>