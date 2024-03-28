       <div class="card card-info">
         <div class="card-header">
           <h3 class="card-title">เพิ่มข้อมูลแผนกสาขา</h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body" >
           <form action="department_add_db.php" method="POST" enctype="multipart/form-data">
             <div class="row">
               <div class="col-6">
                 <!-- text input -->
                 <div class="mb-3">
                   <label class="mb-2">ชื่อแผนกสาขา</label>
                   <input type="text" name="DeptTH" class="form-control" placeholder="กรอกข้อมูลชื่อแผนกสาขา">
                 </div>
                 <div class="mb-3">
                   <label class="mb-2">ชื่อย่อสาขา (ภาษาอังกฤษ)</label>
                   <input type="text" name="Abbreviations" class="form-control" placeholder="กรอกข้อมูลชื่อย่อสาขา">
                 </div>
               </div>
               <div class="col-6">
                 <!-- text input -->
                 <div class="mb-3">
                   <label class="mb-2">ชื่อสาขาภาษาอังกฤษ</label>
                   <input type="text" name="DeptName" class="form-control" placeholder="กรอกข้อมูลชื่อสาขาภาษาอังกฤษ">
                 </div>
                 <div class="mb-3">
                   <label class="mb-2">สถานะ</label>
                      <select name="StatusDept" class="form-select" required>
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
                 <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                 <a href="department.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
               </div>
             </div>
           </form>
         </div>
         <!-- /.card-body -->
       </div>