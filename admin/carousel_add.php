       <div class="card card-info">
         <div class="card-header">
           <h3 class="card-title">เพิ่มข้อมูลสไลด์</h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
           <form action="carousel_add_db.php" method="POST" enctype="multipart/form-data">
             <div class="row">
               <div class="col-sm-6">
                 <!-- text input -->
                 <div class="mb-3">
                   <label class="mb-2">ชื่อสไลด์</label>
                   <input type="text" name="slide_name" class="form-control" placeholder="กรอกข้อมูลชื่อสไลด์">
                 </div>
               </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="mb-3">
                  <label class="mb-2">แนบลิงก์</label>
                  <input type="url" name="slide_link" required class="form-control" value="" minlength="5">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="mb-3">
                  <label class="mb-2">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </label>
                  <input type="file" name="slide_img" required   class="form-control" accept="image/jpeg, image/png, image/jpg"> <br>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="mb-3">
                  <label class="mb-2">สถานะ</label>
                  <select name="Status" class="form-select" required>
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
                 <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                 <a href="carousel.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
               </div>
             </div>
           </form>
         </div>
         <!-- /.card-body -->
       </div>