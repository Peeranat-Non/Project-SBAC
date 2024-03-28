<?php

session_start();
require_once './config/db.php';
require_once './Control/checkstatus.php';
date_default_timezone_set('Asia/Bangkok');

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "management";?>
<?php include("./view/head.php"); ?> 

<body>

  <!-- Spinner Start -->
  <?php include("./view/spinner.php"); ?> 
  <!-- pinner End -->
  
  <!-- Navbar Start -->
  <?php include("./view/navbar.php"); ?> 
  <!-- navbar End -->

  <section class="" style="background-color: #f2f7ff;">
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto">
          <h1 class="display-6 mb-0">
            <div class="h-100">
              <div class="d-inline-block text-primary py-1 px-2 mb-3">แจ้งการดําเนินการปิดโครงการหรืองานวิจัย</div>
            </div>
          </h1>
        </div>
        <div class="p-5 mb-4 bg-light shadow rounded-3">
          <div class="container">
            <div class="modal-body m-lg-3">
              <h5 class="row mb-3 ms-0">
                สถานะหลังดําเนินการโครงการหรืองานวิจัย
              </h5>
              <div class="row align-items-start">
                <div class="col ms-5">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      เริ่มต้นโครงการ (Initial)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      สร้างต้นแบบ (Prototype)
                    </label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      ศึกษาทดลอง (Experimental)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      ส่งมอบโครงการ (Transfer)
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-body m-lg-3">
              <div class="">
                <div class="row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">
                    <h5>เงินอุดหนุน</h5>
                  </label>
                  <div class="col-2">
                    <input type="text" class="form-control" placeholder="" aria-label="name" name="">
                  </div>
                  <label for="inputEmail3" class="col-sm-2 col-form-label">
                    <h5>บาท</h5>
                  </label>
                </div>
              </div>
            </div>
            <div class="modal-body m-lg-3">
              <div class="mb-3">
                <h5 class="row mb-3 ms-0">ผลการดําเนินการ</h5>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <h5 class="row mb-3 ms-0">ข้อเสนอแนะ</h5>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <h5 class="row ms-0">แนปไฟล์</h5>
                <div class="mb-3">
                  <label for="formFileMultiple" class="form-label">อัพโหลดไฟล์ได้เฉพาะ .pdf .doc .xls .ppt เท่านั้น</label>
                  <input class="form-control" type="file" id="formFileMultiple" multiple>
                </div>
              </div>
              <div class="col-md-4 mb-5">
                <h5 class="row mb-3 ms-0">การดำเนินงาน</h5>
                <select id="inputState" class="form-select">
                  <option selected>- กรุณาเลือก -</option>
                  <option>Keep</option>
                  <option>Send to Admin</option>
                  <option>Send to Adviser</option>
                  <option>Adviser</option>
                  <option>In Progress</option>
                  <option>Completed</option>
                  <option>Cancel</option>
                  <option>Update</option>
                </select>
              </div>
              <div class="container">
                <div class="col text-center">
                  <a type="button" a href="" class="btn btn-success">Add</a>
                  <a type="button" a href="" class="btn btn-warning">Edit</a>
                </div>
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