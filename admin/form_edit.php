<?php
  if (isset($_GET['ID'])) {
    include 'condb.php';
    $stmt = $conn->prepare("SELECT* FROM tbl_form WHERE ID=?");
    $stmt->execute([$_GET['ID']]);
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
    <h3 class="card-title">เพิ่มข้อมูลแบบฟอร์ม</h3>
  </div>
  <div class="card-body">
    <form action="form_edit_db.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">ชื่อแบบฟอร์ม</label>
            <input type="text" name="form_name" value="<?= $row['form_name']; ?>" class="form-control is-warning" placeholder="กรอกข้อมูลชื่อแบบฟอร์ม">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">วันที่พิมพ์</label>
            <input type="date" name="date_get" class="form-control" placeholder="กรอกข้อมูลวันที่พิมพ์">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">*อัปโหลดไฟล์ได้เฉพาะ .jpg* เท่านั้น</label>
            <input type="file" name="form_file" class="form-control" accept="apptication/pdf">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">สถานะ</label>
              <select name="Status" class="form-select" required>
                <option value="เลือกสถานะ">-เลือกสถานะ-</option>
                <option value="Using">เปิด</option>
                <option value="No Using">ปิด</option>
              </select>
          </div>
        </div>
      </div>
      <br>
      <div class="row" align="center">
        <div class="col">
          <input type="hidden" name="ID" value="<?= $row['ID']; ?>" class="form-control">
          <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
          <a href="form.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
        </div>
      </div>
    </form>
  </div>
</div>