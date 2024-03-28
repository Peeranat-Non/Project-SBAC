<?php
if (isset($_GET['idDept'])) {
  include 'condb.php';
  $stmt = $conn->prepare("SELECT* FROM tbl_dept WHERE idDept=?");
  $stmt->execute([$_GET['idDept']]);
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
    <h3 class="card-title">แก้ไขข้อมูลแผนกสาขา</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form action="./department_edit_db.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="mb-3">
            <label class="mb-2">ชื่อแผนกสาขา</label>
            <input type="text" name="DeptTH" value="<?= $row['DeptTH']; ?>" class="form-control" placeholder="กรอกข้อมูลชื่อแผนกสาขา">
          </div>
          <div class="mb-3">
            <label class="mb-2">ชื่อย่อสาขา (ภาษาอังกฤษ)</label>
            <input type="text" name="Abbreviations" value="<?= $row['Abbreviations']; ?>" class="form-control" placeholder="กรอกข้อมูลชื่อย่อสาขา">
          </div>
        </div>
        <div class="col-sm-6">
          <!-- text input -->
          <div class="mb-3">
            <label class="mb-2">ชื่อสาขาภาษาอังกฤษ</label>
            <input type="text" name="DeptName" value="<?= $row['DeptName']; ?>" class="form-control" placeholder="กรอกข้อมูลชื่อสาขาภาษาอังกฤษ">
          </div>
          <div class="mb-3">
            <label class="mb-2">สถานะ</label>
            <select name="StatusDept" class="form-select" required>
              <option value="">-เลือกสถานะ-</option>
              <option value="Using">เปิด</option>
              <option value="No Using">ปิด</option>
            </select>
          </div>
        </div>
      </div>
      <br>
      <div class="row" align="center">
        <div class="col">
          <input type="hidden" name="idDept" value="<?= $row['idDept']; ?>" class="form-control">
          <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
          <a href="department.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
        </div>
      </div>
    </form>
  </div>
  <!-- /.card-body -->
</div>