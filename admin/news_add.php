<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">เพิ่มข้อมูลข่าวสาร</h3>
  </div>
  <div class="card-body">
    <form action="news_add_db.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">ชื่อข่าวสาร</label>
            <input type="text" name="Name" class="form-control is-warning" placeholder="กรอกข้อมูลชื่อข่าวสาร">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">ประเภทข่าวสาร</label>
            <select name="t_id" class="form-select" required>
              <option value="">-เลือกประเภทข่าวสาร-</option>
              <?php
              include 'condb.php';
              $stmt = $conn->prepare("SELECT* FROM tbl_blog_type");
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
        <div class="col-sm-12">
          <div class="mb-3">
            <label class="mb-2">เนื้อหาข่าวสาร</label>
            <textarea type="text" name="Content" class="form-control" id="editor" rows="3" placeholder="กรอกข้อมูลเนื้อหาข่าวสาร"></textarea>
          </div>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>*ไฟล์ได้เฉพาะ .pdf .doc .xls .xlw* เท่านั้น</label>
            <input type="file" name="doc_file" class="form-control" accept="apptication/pdf">
          </div>
        </div>
      </div> -->
      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">ส่งให้ผู้ใช้ ID</label>
            <input type="text" name="m_username" class="form-control is-warning" placeholder="กรอกข้อมูล ID ผู้ใช้">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">แผนกสาขา</label>
            <select name="idDept" class="form-select" required>
              <option value="">-เลือกแผนกสาขา-</option>
              <?php
              include 'condb.php';
              $stmt = $conn->prepare("SELECT* FROM tbl_dept");
              $stmt->execute();
              $result = $stmt->fetchAll();
              foreach ($result as $row_d) {
              ?>
                <option value="<?= $row_d['idDept']; ?>"><?= $row_d['DeptTH']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">วันที่พิมพ์</label>
            <input type="date" name="date_get" class="form-control" placeholder="">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="mb-3">
          <label class="mb-2">สถานะข่าวสาร</label>
            <select name="Status" id="inputState" class="form-select">
              <option selected>- กรุณาเลือก -</option>
              <option value="Keep">Keep</option>
              <option value="Send">Send</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="mb-2">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </label>
            <input type="file" name="news_img" required class="form-control" accept="image/jpeg, image/png, image/jpg"> <br>
          </div>
        </div>
      </div>
      <br>
      <div class="row" align="center">
        <div class="col">
          <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
          <a href="news.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
        </div>
      </div>
    </form>
  </div>
</div>