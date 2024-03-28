<?php

session_start();
require_once './config/db.php';
require_once './Control/checkstatus.php';
date_default_timezone_set('Asia/Bangkok');

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "blog"; ?>
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
    SELECT b.*, bt .t_name
    FROM tbl_blog AS b 
    INNER JOIN tbl_blog_type AS bt ON b.t_id=bt.t_id
    INNER JOIN tbl_dept AS d ON b.idDept=d.idDept
    ORDER BY b.ID ASC 
    ");
  $stmtMem->execute();
  $resultMem = $stmtMem->fetchAll();
  ?>

  <section class="" style="background-color: #f2f7ff;">
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
          <h1 class="display-6 mb-0">
            <div class="h-100">
              <div class="d-inline-block text-primary py-1 px-3 mb-3">บทความของฉัน</div>
            </div>
          </h1>
        </div>
        <div class="text-end">
          <a href="blog.php?act=add" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-folder-plus me-2"></i>สร้างบทความใหม่</a>
        </div>

        <!-- Modal Start -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl mb-4 bg-light rounded-3">
            <div class="modal-content">
              <form action="blog_add_db.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                  <div class="col text-center">
                    <h3 class="modal-title" id="exampleModalLabel">สร้างบทความใหม่</h3>
                  </div>
                </div>
                <div class="modal-body m-lg-3">
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">
                      <h5>หัวข้อบทความ</h5>
                    </label>
                    <div class="col">
                      <input type="text" class="form-control" placeholder="" aria-label="name" name="Name">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">
                      <h5>เนื้อหาบทความ</h5>
                    </label>
                    <div class="col">
                      <textarea id="editor" rows="8" cols="90" class="from-control" name="Content"></textarea>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">
                      <h5>วันที่พิมพ์</h5>
                    </label>
                    <div class="col-3">
                      <input type="date" name="date_get" class="form-control" placeholder="กรอกข้อมูลชื่อเอกสาร">
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label for="inputState" class="col-sm-2 col-form-label">
                      <h5>ประเภทบทความ</h5>
                    </label>
                    <div class="col-3">
                      <select id="inputState" class="form-select" name="t_id">
                        <option value="all">- ทั้งหมด -</option>
                        <?php
                        include './admin/condb.php';
                        $stmt = $conn->prepare("SELECT* FROM tbl_blog_type");
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        foreach ($result as $row) {
                        ?>
                          <option value="<?= $row['t_id']; ?>"><?= $row['t_name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label for="inputState" class="col-sm-2 col-form-label">
                      <h5>แผนกสาขา</h5>
                    </label>
                    <div class="col-3">
                      <select class="form-select" name="idDept">
                        <option value="">- เลือกแผนกสาขา -</option>
                        <?php
                        include 'condb.php';
                        $stmt = $conn->prepare("SELECT* FROM tbl_dept");
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        foreach($result as $row) {
                        ?>
                        <option value="<?= $row['idDept'];?>"><?= $row['DeptTH'];?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label for="inputState" class="col-sm-2 col-form-label">
                      <h5>สถานะบทความ</h5>
                    </label>
                    <div class="col-3">
                      <select name="Status" id="inputState" class="form-select">
                        <option selected>- กรุณาเลือก -</option>
                        <option value="Keep">Keep</option>
                        <option value="Send">Send</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="col text-center">
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk me-2"></i>บันทึกข้อมูล</button>
                    <a href="blog_add.php" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2"></i>ยกเลิก</a>
                  </div>
                </div>
              </form>
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
              <th class="col" scope="col">ว-ด-ป</th>
              <th class="col" scope="col" style="width: 40%;">ชื่อบทความ</th>
              <th class="col" scope="col">ประเภทบทความ</th>
              <th class="col" scope="col">สถานะ</th>
              <th class="col" scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="">
              <?php foreach ($resultMem as $row_member) { ?>
                <tr>
                  <td>
                    <?php echo $row_member['ID']; ?>
                  </td>
                  <td>
                    <?php echo date('d/m/Y', strtotime($row_member['date_up'])); ?>
                  </td>
                  <td>
                    <a href="./blog_view.php?act=view&ID=<?php echo $row_member['ID']; ?>" class=""><?php echo $row_member['Name']; ?>
                  </td>
                  <td>
                    <?php echo $row_member['t_name']; ?>
                  </td>
                  <td>
                    <?php  
                    $st =  $row_member['Status'];
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
                    <a class="btn btn-info btn-sm" href="./blog_view.php?act=view&ID=<?php echo $row_member['ID']; ?>">
                      <i class="fas fa-folder"></i>
                      เปิดดู
                    </a>
                    <a class="btn btn-warning btn-sm" href="./blog_edit.php?act=edit&ID=<?php echo $row_member['ID']; ?>">
                      <i class="fas fa-pencil-alt"></i>
                      แก้ไข
                    </a>
                    <a href="blog_del.php?ID=<?= $row_member['ID'];?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">
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