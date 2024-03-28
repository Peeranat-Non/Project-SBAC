<?php

session_start();
require_once("config/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = ""; ?>
<?php include("./view/head.php"); ?>

<body>

  <!-- Spinner Start -->
  <?php include("./view/spinner.php"); ?>
  <!-- Spinner End -->


  <section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow" style="border-radius: 1rem;">
            <div class="card-body p-5 ">
              <ul class="nav nav-pills nav-justified mb-5" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">สำหรับนักศึกษา</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">สำหรับอาจารย์</button>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <form class="login100-form validate-form" autocomplete="off" method="post" action="Control/checkLogins.php">
                    <h1 class="text-center mx-auto display-6 mb-3">
                      <div class="d-inline-block text-primary py-1 px-3">
                        เข้าสู่ระบบ
                      </div>
                    </h1>
                    <div class="form-floating mb-3">
                      <input class="form-control" type="email" name="username" id="username" placeholder="Enter E-Mail">
                      <label for="floatingInput">อีเมล</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" type="password" name="pass" id="pass" placeholder="Enter Password">
                      <label for="floatingPassword">รหัสประจำตัว</label>
                    </div>
                    <div class="text-end mb-3">
                      <a href="./forgot_Password.php">ลืมรหัสผ่าน</a>
                    </div>
                    <div class="container-login100-form-btn d-grid gap-2">
                      <button class="login100-form-btn btn-primary btn-lg">
                        Login
                      </button>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <form class="login100-form validate-form" autocomplete="off" method="post" action="Control/checkLogin.php">
                    <h1 class="text-center mx-auto display-6 mb-3">
                      <div class="d-inline-block text-primary py-1 px-3">
                        เข้าสู่ระบบ
                      </div>
                    </h1>
                    <div class="form-floating mb-3">
                      <input class="form-control" type="email" name="username" id="username" placeholder="Enter E-Mail">
                      <label for="floatingInput">อีเมล</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" type="password" name="pass" id="pass" placeholder="Enter Password">
                      <label for="floatingPassword">รหัสประจำตัว</label>
                    </div>
                    <div class="text-end mb-3">
                      <a href="./forgot_Password.php">ลืมรหัสผ่าน</a>
                    </div>
                    <div class="container-login100-form-btn d-grid gap-2">
                      <button class="login100-form-btn btn-primary btn-lg">
                        Login
                      </button>
                    </div>
                  </form>
                </div>
              </div>
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