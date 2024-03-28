<?php
  if (isset($_GET['fileID'])) {
    include 'condb.php';
    $stmt = $conn->prepare("SELECT* FROM tbl_doc_file WHERE fileID=?");
    $stmt->execute([$_GET['fileID']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
    if ($stmt->rowCount() < 1) {
      header('Location: index.php');
      exit();
    }
  } //isset
  ?>
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">เพิ่มข้อมูลไฟล์เอกสาร</h3>
  </div>
  <div class="card-body">
    <form action="doc_edit_db.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">ชื่อเอกสาร</label>
            <input type="text" name="filename" value="<?= $row['filename']; ?>" class="form-control is-warning" placeholder="กรอกข้อมูลชื่อเอกสาร">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">ประเภทเอกสาร</label>
            <select name="t_id" class="form-select" required>
              <option value="">-เลือกประเภทเอกสาร-</option>
              <?php
              include 'condb.php';
              $stmt = $conn->prepare("SELECT* FROM tbl_type");
              $stmt->execute();
              $result_t = $stmt->fetchAll();
              foreach($result_t as $row_t) {
              ?>
              <option value="<?= $row_t['t_id'];?>"><?= $row_t['t_name'];?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">*อัปโหลดไฟล์ได้เฉพาะ .pdf .doc .xls .xlw* เท่านั้น</label>
            <input type="file" name="doc_file" class="form-control" accept="apptication/pdf">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">วันที่พิมพ์</label>
            <input type="date" name="date_get" class="form-control" placeholder="กรอกข้อมูลชื่อเอกสาร">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">ส่งให้ผู้ใช้ ID</label>
            <input type="text" name="m_username" value="<?= $row['m_username']; ?>" class="form-control is-warning" placeholder="กรอกข้อมูล ID ผู้ใช้">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">ส่งให้แผนกงาน</label>
            <select name="idDept" class="form-select" required>
              <option value="">-เลือกแผนกงาน-</option>
              <?php
              include 'condb.php';
              $stmt = $conn->prepare("SELECT* FROM tbl_dept");
              $stmt->execute();
              $result = $stmt->fetchAll();
              foreach($result as $row_d) {
              ?>
              <option value="<?= $row_d['idDept'];?>"><?= $row_d['DeptTH'];?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
          <label class="mb-2">สถานะบทความ</label>
            <select name="Status" id="inputState" class="form-select">
              <option selected>- กรุณาเลือก -</option>
              <option value="Keep">Keep</option>
              <option value="Send">Send</option>
            </select>
          </div>
        </div>
      </div>
      <br>
      <div class="row" align="center">
        <div class="col">
          <input type="hidden" name="fileID" value="<?= $row['fileID']; ?>" class="form-control">
          <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
          <a href="doc.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
        </div>
      </div>
    </form>
  </div>
</div>