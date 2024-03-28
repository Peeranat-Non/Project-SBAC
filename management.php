<?php

session_start();
require_once './config/db.php';
require_once './Control/checkstatus.php';
date_default_timezone_set('Asia/Bangkok');

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "management"; ?>
<?php include("./view/head.php"); ?>

<body>

  <!-- Spinner Start -->
  <?php include("./view/spinner.php"); ?>
  <!-- Spinner End -->

  <!-- Navbar Start -->
  <?php include("./view/navbar.php"); ?>
  <!-- navbar End -->

  <?php
  include './admin/condb.php';
  $stmtMem = $conn->prepare("
    SELECT * 
    FROM tbl_doc_file AS f
    INNER JOIN tbl_type AS t ON f.t_id=t.t_id
    INNER JOIN tbl_dept AS d ON f.idDept=d.idDept
    ORDER BY f.fileID ASC 
    ");
  $stmtMem->execute();
  $resultMem = $stmtMem->fetchAll();

  $order = 1;
  ?>

  <section class="" style="background-color: #f2f7ff;">
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
          <h1 class="display-6 mb-0">
            <div class="h-100">
              <div class="d-inline-block text-primary py-1 px-2 mb-3">โครงการและงานวิจัยของฉัน</div>
            </div>
          </h1>
        </div>
        <!-- Button trigger modal Start -->
        <div class="text-end">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-folder-plus me-2"></i>
            สร้างโครงการและงานวิจัยใหม่
          </button>
        </div>
        <!-- Button trigger modal End -->

        <!-- Modal Start -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl mb-4 bg-light rounded-3">
            <div class="modal-content">
              <div class="modal-header">
                <div class="col text-center">
                  <h3 class="modal-title" id="exampleModalLabel">เพิ่มโครงการและงานวิจัย</h3>
                </div>
              </div>
              <div class="modal-body m-lg-3">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">ชื่องานวิจัยนวัตกรรมหรือโครงการ (ภาษาไทย)</label>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="" aria-label="name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">ชื่องานวิจัยนวัตกรรมหรือโครงการ (ภาษาอังกฤษ)</label>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="" aria-label="name">
                  </div>
                </div>
                <h5 class="row mb-3 ms-0">
                  ลักษณะโครงการ
                </h5>
                <div class="row align-items-start">
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        โครงการใหม่
                      </label>
                    </div>
                  </div>
                  <div class="col ms-2">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        โครงการต่อเนื่อง โปรดระบุรหัสโครงการอ้างอิง
                      </label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="col-5">
                      <input type="referral_code" class="form-control" id="exampleFormControlInput1" placeholder="รหัสอ้างอิง">
                    </div>
                  </div>
                </div>
                <h5 class="row mb-3 ms-0">
                  ประเภทกลุ่มโครงการ
                </h5>
                <div class="row align-items-start mb-3">
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Small Medium Enterprise: SME
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Research
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Education
                      </label>
                    </div>
                  </div>
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Startup
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Research& Development
                      </label>
                    </div>
                  </div>
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Tech Startup
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Project Development
                      </label>
                    </div>
                  </div>
                </div>
                <h5 class="row mb-3 ms-0">
                  รูปแบบการดําเนินโครงการ
                </h5>
                <div class="row align-items-start mb-3">
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        แผนธุรกิจ
                      </label>
                    </div>
                  </div>
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        แนวความคิด/นโยบายการดําเนินการ
                      </label>
                    </div>
                  </div>
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        ชิ้นงาน
                      </label>
                    </div>
                  </div>
                </div>
                <h5 class="row mb-3 ms-0">
                  ลักษณะจํานวนผู้ร่วมการศึกษาวิจัยและพัฒนา
                </h5>
                <div class="row align-items-start mb-3">
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        บุคคล
                      </label>
                    </div>
                  </div>
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        แบบทีม
                      </label>
                    </div>
                  </div>
                  <div class="col ms-5"></div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="col text-center">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal End -->
        <!-- Modal Start -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl mb-4 bg-light rounded-3">
            <div class="modal-content">
              <div class="modal-header">
                <div class="col text-center">
                  <h3 class="modal-title" id="exampleModalLabel">เพิ่มโครงการและงานวิจัย</h3>
                </div>
              </div>
              <div class="modal-body m-lg-3">
                <form class="row mb-3">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">ชื่องานวิจัยนวัตกรรมหรือโครงการ (ภาษาไทย)</label>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="" aria-label="name">
                  </div>
                </form>
                <form class="row mb-3">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">ชื่องานวิจัยนวัตกรรมหรือโครงการ (ภาษาอังกฤษ)</label>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="" aria-label="name">
                  </div>
                </form>
                <h5 class="row mb-3 ms-0">
                  ลักษณะโครงการ
                </h5>
                <div class="row align-items-start">
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        โครงการใหม่
                      </label>
                    </div>
                  </div>
                  <div class="col ms-2">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        โครงการต่อเนื่อง โปรดระบุรหัสโครงการอ้างอิง
                      </label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="col-5">
                      <input type="referral_code" class="form-control" id="exampleFormControlInput1" placeholder="รหัสอ้างอิง">
                    </div>
                  </div>
                </div>
                <h5 class="row mb-3 ms-0">
                  ประเภทกลุ่มโครงการ
                </h5>
                <div class="row align-items-start mb-3">
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Small Medium Enterprise: SME
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Research
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Education
                      </label>
                    </div>
                  </div>
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Startup
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Research& Development
                      </label>
                    </div>
                  </div>
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Tech Startup
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Project Development
                      </label>
                    </div>
                  </div>
                </div>
                <h5 class="row mb-3 ms-0">
                  รูปแบบการดําเนินโครงการ
                </h5>
                <div class="row align-items-start mb-3">
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        แผนธุรกิจ
                      </label>
                    </div>
                  </div>
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        แนวความคิด/นโยบายการดําเนินการ
                      </label>
                    </div>
                  </div>
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        ชิ้นงาน
                      </label>
                    </div>
                  </div>
                </div>
                <h5 class="row mb-3 ms-0">
                  ลักษณะจํานวนผู้ร่วมการศึกษาวิจัยและพัฒนา
                </h5>
                <div class="row align-items-start mb-3">
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        บุคคล
                      </label>
                    </div>
                  </div>
                  <div class="col ms-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        แบบทีม
                      </label>
                    </div>
                  </div>
                  <div class="col ms-5"></div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="col text-center">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal End -->

        <br>
        <div class="p-5 mb-4 bg-light shadow rounded-3">
          <table id="myTable" class="table table table-bordered border-Secondary">
            <thead class="table-dark text-center"">
                <tr>
                  <th class="col" scope="col" style="width: 5%;">ลำดับ</th>
                  <th class="col" scope="col" >ว-ด-ป</th>
                  <th class="col" scope="col" style="width: 48%;">ชื่อโครงการและงานวิจัย</th>
                  <th class="col" scope="col">สถานะ</th>
                  <th class="col" scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="">
              <?php foreach ($resultMem as $row_doc) { ?>
                <tr>
                  <td>
                    <?php echo $order++;?>
                  </td>
                  <td>
                    <?php echo date('d/m/Y', strtotime($row_doc['date_up'])); ?>
                  </td>
                  <td>
                    <a href="./admin/doc_file/<?php echo $row_doc['doc_file']; ?>" target="_blank" class=""><?php echo $row_doc['filename']; ?>
                  </td>
                  <td>
                    <?php  
                    $st =  $row_doc['status'];
                    if ($st=='Keep') {
                      echo "<span class='btn btn-secondary btn-sm'>";
                      echo "เก็บไว้ก่อน";
                      echo "</span>";
                    }elseif ($st=='Send') {
                      echo "<span class='btn btn-success btn-sm'>";
                      echo "ส่งให้แอดมิน";
                      echo "</span>";
                    }else{
                      echo "";
                    }
                      ?>
                  </td>
                  <td>
                    <a class="btn btn-info btn-sm" href="management_add.php" class="btn btn-info btn-sm">
                      <i class="fas fa-folder">
                      </i>
                      เปิดดู
                    </a>
                    <a class="btn btn-warning btn-sm" href="doc.php?act=edit&fileID=<?php echo $row_doc['fileID']; ?>">
                      <i class="fas fa-pencil-alt">
                      </i>
                      แก้ไข
                    </a>
                    <a href="management_del.php?fileID=<?= $row_doc['fileID'];?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">
                      <i class="fas fa-trash"></i>
                      ลบ
                    </a>
                  </td>
                <?php } ?>
                </tr>
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