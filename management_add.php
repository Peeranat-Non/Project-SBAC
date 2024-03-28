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
  <!-- Spinner End -->
  
  <!-- Navbar Start -->
  <?php include("./view/navbar.php"); ?> 
  <!-- navbar End -->

  <?php 
    include './admin/condb.php';
    $stmtMem = $conn->prepare("
    SELECT m.Code, m.NameTitle,m.Name, m.Lastname, m.Dept, d.DeptTH
    FROM tbl_lecturers AS m 
    INNER JOIN tbl_dept AS d ON m.Dept=d.idDept
    ORDER BY m.ID DESC
    ");
      $stmtMem->execute();
      $resultMem = $stmtMem->fetchAll();                                         
  ?>

  <?php
    include './admin/condb.php';
    $stmtMem = $conn->prepare("
    SELECT s.Code, s.NameTitle, s.Name, s.Lastname, s.Dept, s.Class, s.Room, d.DeptTH
    FROM tbl_student AS s 
    INNER JOIN tbl_dept AS d ON s.Dept=d.idDept
    ORDER BY s.ID DESC
    ");
      $stmtMem->execute();
      $result = $stmtMem->fetchAll();                                         
  ?>


  <section class="" style="background-color: #f2f7ff;">
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
          <h1 class="display-6 mb-0">
            <div class="h-100">
              <div class="d-inline-block text-primary py-1 px-2 mb-3">เพิ่มโครงการและงานวิจัย</div>
            </div>
          </h1>
        </div>
        <div class="p-5 mb-4 bg-light shadow rounded-3">
          <div class="container">
            <nav>
              <div class="nav nav-tabs " id="nav-tab" role="tablist">
                <button class="nav-link active flex-sm-fill text-sm-center" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">ข้อมูลพื้นฐานโครงการและงานวิจัย</button>
                <button class="nav-link flex-sm-fill text-sm-center" id="nav-project_features-tab" data-bs-toggle="tab" data-bs-target="#nav-project_features" type="button" role="tab" aria-controls="nav-project_features" aria-selected="false">คุณลักษณะโครงการและงานวิจัย</button>
                <button class="nav-link flex-sm-fill text-sm-center" id="nav-budget_equipment-tab" data-bs-toggle="tab" data-bs-target="#nav-budget_equipment" type="button" role="tab" aria-controls="nav-budget_equipment" aria-selected="false">งบประมาณและอุปกรณ์</button>
                <button class="nav-link flex-sm-fill text-sm-center" id="nav-operation-tab" data-bs-toggle="tab" data-bs-target="#nav-operation" type="button" role="tab" aria-controls="nav-operation" aria-selected="false">การดําเนินงาน</button>
                <button class="nav-link flex-sm-fill text-sm-center" id="nav-meeting_schedule-tab" data-bs-toggle="tab" data-bs-target="#nav-meeting_schedule" type="button" role="tab" aria-controls="nav-meeting_schedule" aria-selected="false">ตารางนัดพบ</button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="modal-body m-lg-3">
                  <form class="row mb-3">
                    <label for="inputEmail3" class="col-sm-5 col-form-label">ชื่องานวิจัยนวัตกรรมหรือโครงการ (ภาษาไทย)</label>
                    <div class="col">
                      <input type="text" class="form-control" placeholder="" aria-label="name">
                    </div>
                  </form>
                  <form class="row mb-3">
                    <label for="inputEmail3" class="col-sm-5 col-form-label">ชื่องานวิจัยนวัตกรรมหรือโครงการ (ภาษาอังกฤษ)</label>
                    <div class="col">
                      <input type="text" class="form-control" placeholder="" aria-label="name">
                    </div>
                  </form>
                  <h5 class="row mb-3 ms-0">
                    ลักษณะโครงการ
                  </h5>
                  <form class="row align-items-start">
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
                  </form>
                  <h5 class="row mb-3 ms-0">
                    ประเภทกลุ่มโครงการ
                  </h5>
                  <form class="row align-items-start mb-3">
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
                  </form>
                  <h5 class="row mb-3 ms-0">
                    รูปแบบการดําเนินโครงการ
                  </h5>
                  <form class="row align-items-start mb-3">
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
                  </form>
                  <h5 class="row mb-3 ms-0">
                    ลักษณะจํานวนผู้ร่วมการศึกษาวิจัยและพัฒนา
                  </h5>
                  <form class="row align-items-start mb-3">
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
                  </form>

                  <!-- Modal member Start -->
                  <div class="modal fade" id="member" tabindex="-1" aria-labelledby="member" aria-hidden="true">
                    <div class="modal-dialog modal-xl mb-4 bg-light rounded-3">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="col text-center">
                            <h3 class="modal-title" id="exampleModalLabel">เพิ่มสมาชิก</h3>
                          </div>
                        </div>
                        <div class="modal-body m-lg-3">
                          <table id="myTable" class="table table table-bordered border-Secondary">
                            <thead class="table-dark text-center"">
                                <tr>
                                  <th class="col" scope="col">รหัสประจําตัว</th>
                                  <th class="col" scope="col">ชื่อ-นามสกุล</th>
                                  <th class="col" scope="col">ภาควิชา</th>
                                  <th class="col" scope="col">สาขาวิชา</th>
                                  <th class="col" scope="col">ระดับการศึกษา</th>
                              </tr>
                            </thead>
                            <tbody class="">
                              <?php foreach ($result as $row_member) { ?>  
                              <tr>
                                <td>
                                  <?php echo $row_member['Code']; ?>
                                </td>
                                <td>
                                  <?php echo $row_member['NameTitle'] . ' ' . $row_member['Name'] . ' ' . $row_member['Lastname']; ?>
                                </td>
                                <td>
                                  <?php echo $row_member['DeptTH']; ?>
                                </td>
                                <td>
                                  <?php echo $row_member['DeptTH']; ?>
                                </td>
                                <td>
                                  <?php echo $row_member['Class'] . ' / ' .$row_member['Room']; ?>
                                </td>
                                <?php } ?>  
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <div class="col text-center">
                            <button type="button" class="btn btn-success"><i class="fa-solid fa-floppy-disk me-2"></i>Add</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2"></i>Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal member End -->

                  <!-- Modal Accept Start -->
                  <div class="modal fade" id="accept" tabindex="-1" aria-labelledby="accept" aria-hidden="true">
                    <div class="modal-dialog modal-xl mb-4 bg-light rounded-3">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="col text-center">
                            <h3 class="modal-title" id="exampleModalLabel">เพิ่มที่ปรึกษา</h3>
                          </div>
                        </div>
                        <div class="modal-body m-lg-3">
                          <table id="myTable2" class="table table table-bordered border-Secondary">
                            <thead class="table-dark text-center"">
                                <tr>
                                  <th class=" col-3" scope="col">รหัสประจําตัว</th>
                              <th class="col-3" scope="col">ชื่อ-นามสกุล</th>
                              <th class="col-3" scope="col">ภาควิชา</th>
                              <th class="col-3" scope="col">สาขาวิชา</th>
                              </tr>
                            </thead>
                            <tbody class="">
                              <?php foreach ($resultMem as $row_member) { ?>  
                              <tr>
                                <td>
                                  <?php echo $row_member['Code']; ?>
                                </td>
                                <td>
                                  <?php echo $row_member['NameTitle'] . ' ' . $row_member['Name'] . ' ' . $row_member['Lastname']; ?>
                                </td>
                                <td>
                                  <?php echo $row_member['DeptTH']; ?>
                                </td>
                                <td>
                                  <?php echo $row_member['DeptTH']; ?>
                                </td>
                                <?php } ?>  
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <div class="col text-center">
                            <button type="button" class="btn btn-success"><i class="fa-solid fa-floppy-disk me-2"></i>Add</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2"></i>Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Accept End -->

                  <h5 class="row mb-3 ms-0">
                    ข้อมูลสมาชิกภายในทีม
                  </h5>
                  <div class="col">
                    <div class="text-end mb-3">
                      <a type="button" a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#member"><i class="fa-solid fa-user-plus me-2"></i>เพิ่มสมาชิก</a>
                    </div>
                    <table class="table table table-bordered border-Secondary">
                      <thead class="table-dark text-center"">
                          <tr>
                            <th class=" col" scope="col">ลำดับ</th>
                        <th class="col" scope="col">สถานะ</th>
                        <th class="col" scope="col">รหัสประจำตัว ชื่อนามสกุล</th>
                        <th class="col" scope="col">ตำแหน่ง</th>
                        <th class="col" scope="col">ภาควิชา</th>
                        <th class="col" scope="col">สาขาวิชา</th>
                        <th class="col" scope="col">เบอร์โทร</th>
                        <th class="col" scope="col">E-mall</th>
                        <th class="col" scope="col">Line ID</th>
                        <th class="col" scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <tr>
                          <th scope="row">1</th>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>
                            <a href="" class="link-danger"><i class="fa-solid fa-trash me-3"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>
                            <a href="" class="link-danger"><i class="fa-solid fa-trash me-3"></i></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <h5 class="row mb-3 ms-0">
                    ข้อมูลที่ปรึกษา
                  </h5>
                  <div class="col">
                    <div class="text-end mb-3">
                      <a type="button" a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#accept"><i class="fa-solid fa-user-plus me-2"></i>เพิ่มที่ปรึกษา</a>
                    </div>
                    <table class="table table table-bordered border-Secondary">
                      <thead class="table-dark text-center"">
                          <tr>
                            <th class=" col" scope="col">ลำดับ</th>
                        <th class="col" scope="col">สถานะ</th>
                        <th class="col" scope="col">รหัสประจำตัว ชื่อนามสกุล</th>
                        <th class="col" scope="col">ตำแหน่ง</th>
                        <th class="col" scope="col">ภาควิชา</th>
                        <th class="col" scope="col">สาขาวิชา</th>
                        <th class="col" scope="col">เบอร์โทร</th>
                        <th class="col" scope="col">E-mall</th>
                        <th class="col" scope="col">Line ID</th>
                        <th class="col" scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <tr>
                          <th scope="row">1</th>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>
                            <a href="" class="link-danger"><i class="fa-solid fa-trash me-3"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>...</td>
                          <td>
                            <a href="" class="link-danger"><i class="fa-solid fa-trash me-3"></i></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="container">
                  <div class="col text-center">
                    <a type="button" a href="" class="btn btn-danger">Leave</a>
                    <a type="button" a href="./compled.php" class="btn btn-success">Completed</a>
                    <a type="button" a href="" class="btn btn-warning">Reason</a>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-project_features" role="tabpanel" aria-labelledby="nav-project_features-tab">
                <form class="modal-body m-lg-3">
                  <div class="mb-3">
                    <h5 class="row mb-3 ms-0">บทคัดย่อ</h5>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <h5 class="row mb-3 ms-0">วัตถุประสงค์</h5>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <h5 class="row mb-3 ms-0">ประโยชนที่คาดว่าจะได้รับ</h5>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <h5 class="row mb-3 ms-0">องค์ความรู้/เทคโนโลยี</h5>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <h5 class="row mb-3 ms-0">จุดเด่น</h5>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <h5 class="row mb-3 ms-0">ผู้ที่เหมาะสมนํางานวิจัยนวัตกรรมโครงการไปใช้งาน</h5>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <h5 class="row mb-3 ms-0">ตลาด/กลุ่มลูกค้าเป้าหมาย</h5>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                </form>
              </div>

              <!-- Modal budget Start -->
              <div class="modal fade" id="budget" tabindex="-1" aria-labelledby="budget" aria-hidden="true">
                <form class="modal-dialog modal-xl mb-4 bg-light rounded-3">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="col text-center">
                        <h3 class="modal-title" id="exampleModalLabel">เพิ่มใบคำร้องเบิกเงิน</h3>
                      </div>
                    </div>
                    <div class="modal-body m-lg-3">
                      <table id="myTable5" class="table table table-bordered border-Secondary">
                        <thead class="table-dark text-center"">
                                <tr>
                                  <th class=" col-6" scope="col">รายการ</th>
                          <th class="col-2" scope="col">จำนวน</th>
                          <th class="col-2" scope="col">ราคา/หน่วย</th>
                          <th class="col-2" scope="col">ราคารวม</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          <tr>
                            <th scope="row">1</th>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="row mb-2">
                        <label for="inputState" class="col-sm-2 col-form-label">
                          <h5>ระดับความต้องการ</h5>
                        </label>
                        <div class="col-3">
                          <select id="inputState" class="form-select">
                            <option selected>- กรุณาเลือก -</option>
                            <option>ปกติ</option>
                            <option>ต้องการเร่งด่วน</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <div class="col text-center">
                        <button type="button" class="btn btn-success"><i class="fa-solid fa-floppy-disk me-2"></i>Save</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2"></i>Close</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- Modal budget End -->

              <!-- Modal equipment Start -->
              <div class="modal fade" id="equipment" tabindex="-1" aria-labelledby="equipment" aria-hidden="true">
                <div class="modal-dialog modal-xl mb-4 bg-light rounded-3">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="col text-center">
                        <h3 class="modal-title" id="exampleModalLabel">เพิ่มใบคำร้องเบิกอุปกรณ์</h3>
                      </div>
                    </div>
                    <form class="modal-body m-lg-3">
                      <table id="myTable4" class="table table table-bordered border-Secondary">
                        <thead class="table-dark text-center"">
                                <tr>
                                  <th class=" col-6" scope="col">รายการ</th>
                          <th class="col-2" scope="col">จำนวน</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          <tr>
                            <th scope="row">1</th>
                            <td>...</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>...</td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="row mb-2">
                        <label for="inputState" class="col-sm-2 col-form-label">
                          <h5>ระดับความต้องการ</h5>
                        </label>
                        <div class="col-3">
                          <select id="inputState" class="form-select">
                            <option selected>- กรุณาเลือก -</option>
                            <option>ปกติ</option>
                            <option>ต้องการเร่งด่วน</option>
                          </select>
                        </div>
                      </div>
                    </form>
                    <div class="modal-footer">
                      <div class="col text-center">
                        <button type="button" class="btn btn-success"><i class="fa-solid fa-floppy-disk me-2"></i>Save</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2"></i>Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal equipment End -->

              <div class="tab-pane fade" id="nav-budget_equipment" role="tabpanel" aria-labelledby="nav-budget_equipment-tab">
                <div class="modal-body m-lg-3">
                  <div class="mb-3">
                    <div class="col">
                      <div class="text-end mb-3">
                        <a type="button" a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#budget"><i class="fa-solid fa-file-circle-plus me-2"></i>เพิ่มใบคำร้องเบิกเงิน</a>
                        <a type="button" a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#equipment"><i class="fa-solid fa-file-circle-plus me-2"></i>เพิ่มใบคำร้องเบิกอุปกรณ์</a>
                      </div>
                      <table id="myTable3" class="table table table-bordered border-Secondary">
                        <thead class="table-dark text-center"">
                          <tr>
                            <th class=" col" scope="col">ลำดับ</th>
                          <th class="col" scope="col">ว-ด-ป</th>
                          <th class="col" scope="col">เลขที่คำขอ</th>
                          <th class="col" scope="col">สถานะ</th>
                          <th class="col" scope="col">ระดับความต้องการ</th>
                          <th class="col" scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          <tr>
                            <th scope="row">1</th>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>
                              <a href="" class="link-warning"><i class="fa-solid fa-pen-to-square me-3"></i></a>
                              <a href="" class="link-danger"><i class="fa-solid fa-trash me-3"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>

                            <td>
                              <a href="" class="link-warning"><i class="fa-solid fa-pen-to-square me-3"></i></a>
                              <a href="" class="link-danger"><i class="fa-solid fa-trash me-3"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-operation" role="tabpanel" aria-labelledby="nav-operation-tab">
                Test1
              </div>
              <div class="tab-pane fade" id="nav-meeting_schedule" role="tabpanel" aria-labelledby="nav-meeting_schedule-tab">
                Test2
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