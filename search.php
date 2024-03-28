<?php

session_start();
require_once './config/db.php';
require_once './Control/checkstatus.php';
date_default_timezone_set('Asia/Bangkok');

?>
<!DOCTYPE html>
<html lang="en">

<head>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "search";?>
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
  $stmtDoc = $conn->prepare("
  SELECT * #ตารางเอามาทุกคอลัมภ์
  FROM tbl_doc_file AS f
  INNER JOIN tbl_type AS t ON f.t_id=t.t_id
  INNER JOIN tbl_dept AS d ON f.idDept=d.idDept
  ORDER BY f.fileID ASC #เรียงลำดับข้อมูลจากน้อยไปมาก
  ");
  $stmtDoc->execute();
  $resultDoc = $stmtDoc->fetchAll();

  $order = 1;
  ?>

  <section class="" style="background-color: #f2f7ff;">
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
          <h1 class="display-6 mb-0">
            <div class="h-100">
              <div class="d-inline-block text-primary py-1 px-3 mb-3">สืบค้นโครงงานและงานวิจัย</div>
            </div>
          </h1>
        </div>
        <div class="p-5 mb-4 bg-light shadow rounded-3">
          <div class="input-group mb-4">
            <div class="col me-3">
              <select class="form-select" aria-label="Default select example">
                <option value="all">รายละเอียดทั้งหมด</option>
                <option value="title">ชื่อเรื่อง</option>
                <option value="author">เจ้าของผลงาน</option>
                <option value="subject_all">สาขาวิชา</option>
                <option value="pubyear">ปี</option>
              </select>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
              <input class="form-control" type="text" placeholder="ค้นหาทรัพยากรสารสนเทศ" aria-label="default input example">
            </div>
          </div>
          <div class="input-group mb-4">
            <div class="col me-3">
              <label for="exampleInputEmail1" class="form-label text-primary">Category</label>
              <select class="form-select" aria-label="Default select example">
                <option value="all">- ทั้งหมด -</option>
                <?php
                include './admin/condb.php';
                $stmt = $conn->prepare("SELECT* FROM tbl_type");
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach($result as $row) {
                ?>
                <option value="<?= $row['t_id'];?>"><?= $row['t_name'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <form class="row g-3">
                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label text-primary">ปีเริ่มต้น</label>
                  <input id="pubyear_start" class="form-control" type="number" placeholder="YYYY" min="0">
                </div>
                <div class="col-md-6">
                  <label for="inputPassword4" class="form-label text-primary">ปีสิ้นสุด</label>
                  <input id="pubyear_end" class="form-control" type="number" placeholder="YYYY" min="0">
                </div>
              </form>
            </div>
          </div>
          <div class="col text-center">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-magnifying-glass me-3"></i>ค้นหา</button>
            <button type="button" class="btn btn-warning"><i class="fa-solid fa-rotate-left me-3"></i></i>ล้างค่า</button>
          </div>
        </div>
        <div class="text-start">
          <h1 class="display-0 mb-3 fs-3 text-primary">
            <div>
              ผลการค้นหาทั้งหมด
              <span>
                  <?php
                  $cars=array("Volvo");
                  echo count($resultDoc);
                  ?>
              </span>
              รายการ
            </div>
          </h1>
        </div>
        <div class="p-5 mb-4 bg-light shadow rounded-3">
          <table id="myTable" class="table table table-bordered border-Secondary">
            <thead class="table-dark text-center"">
              <tr>
                <th class="col" scope="col" style="width: 5%;">ลำดับ</th>
                <th class="col" scope="col">ว-ด-ป</th>
                <th class="col" scope="col" style="width: 50%;">ชื่อโครงการและงานวิจัย</th>
                <th class="col" scope="col">ประเภท</th>
                <th class="col" scope="col">เจ้าของผลงาน</th>
              </tr>
            </thead>
            <tbody class="">
              <?php foreach ($resultDoc as $row_Doc) { ?>
              <tr>
                <td>
                  <?php echo $order++;?>
                </td>
                <td>
                  <?php echo date('d/m/Y',strtotime($row_Doc['date_up'])); ?>
                </td>
                <td>
                  <a href="./admin/doc_file/<?php echo $row_Doc['doc_file'];?>" target="_blank" class=""><?php echo $row_Doc['filename']; ?>

                </td>
                <td>
                  <?php echo $row_Doc['t_name'];?>
                </td>
                <td>
                  <?php echo $row_Doc['m_username'];?>
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
