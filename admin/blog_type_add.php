       <div class="card card-info">
         <div class="card-header">
           <h3 class="card-title">เพิ่มข้อมูลประเภทเอกสาร</h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
           <form action="blog_type_add_db.php" method="POST" enctype="multipart/form-data">
             <div class="row">
               <div class="col-sm-6">
                 <!-- text input -->
                 <div class="mb-3">
                   <label class="mb-2">ชื่อประเภทบทความ</label>
                   <input type="text" name="t_name" class="form-control" placeholder="กรอกข้อมูลชื่อประเภทบทความ">
                 </div>
               </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="mb-3">
                  <label class="mb-2">ชื่อภาษาอังกฤษ</label>
                  <input type="text" name="t_nameEN" class="form-control" placeholder="กรอกข้อมูลชื่อภาษาอังกฤษ">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="mb-3">
                  <label class="mb-2">สถานะ</label>
                  <select name="StatusType" class="form-select" required>
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
                 <a href="blog_type.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
               </div>
             </div>
           </form>
         </div>
         <!-- /.card-body -->
       </div>