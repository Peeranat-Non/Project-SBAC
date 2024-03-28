<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">เพิ่มข้อมูลสมาชิก</h3>
  </div>
  <div class="card-body">
    <form action="member_add_db.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Code</label>
            <input type="text" name="m_username" class="form-control" placeholder="กรอกข้อมูลusername">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>password</label>
            <input type="text" name="m_password" class="form-control" placeholder="กรอกข้อมูลpassword">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ชื่อ-นามสกุล</label>
            <input type="text" name="m_name" class="form-control" placeholder="กรอกข้อมูลชื่อ-นามสกุล">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>สถานะ</label>
            <select name="m_level" class="form-select" required>
              <option value="เลือกสถานะ">-เลือกสถานะ-</option>
              <option value="Admin">แอดมิน</option>
              <option value="Top Executive">ผู้บริหาร</option>
              <option value="lecturers">อาจารย์</option>
              <option value="student">นักเรียน</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>แผนกสาขา</label>
            <select name="idDept" class="form-select" required>
              <option value="">-เลือกแผนกสาขา-</option>
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
      </div>
      <br>
      <div class="row" align="center">
        <div class="col">
          <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
          <a href="member.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
        </div>
      </div>
    </form>
  </div>
</div>