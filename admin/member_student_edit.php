<?php
if (isset($_GET['ID'])) {
    include 'condb.php';
    $stmt_m = $conn->prepare("
        SELECT s.*, d. DeptTH 
        FROM tbl_student AS s  
        INNER JOIN tbl_dept AS d ON s.Dept=d.idDept
        WHERE s.ID=?
        ORDER BY s.ID ASC
        ");
    $stmt_m->execute([$_GET['ID']]);
    $row_em = $stmt_m->fetch(PDO::FETCH_ASSOC);
    //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
    if ($stmt_m->rowCount() < 1) {
        header('Location: index.php');
        exit();
    }
} //isset
?>


<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">แก้ไขข้อมูลสมาชิก</h3>
    </div>
    <div class="card-body">
        <form action="./member_student_edit_db.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="mb-2">รหัสประจำตัว</label>
                        <input type="text" name="Code" value="<?= $row_em['Code']; ?>" class="form-control" placeholder="กรอกข้อมูลรหัสประจำตัว">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="mb-2">คำนำหน้า</label>
                        <input type="text" name="NameTitle" value="<?= $row_em['NameTitle']; ?>" class="form-control" placeholder="กรอกข้อมูลคำนำหน้า">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="mb-2">ชื่อ</label>
                        <input type="text" name="Name" value="<?= $row_em['Name']; ?>" class="form-control" class="form-control" placeholder="กรอกข้อมูลชื่อ">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="mb-2">นามสกุล</label>
                        <input type="text" name="Lastname" value="<?= $row_em['Lastname']; ?>" class="form-control" class="form-control" placeholder="กรอกข้อมูลนามสกุล">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="mb-2">แผนกสาขา</label>
                        <select name="Dept" class="form-select" required>
                            <option value=""><?= $row_em['DeptTH']; ?></option>
                            <option value="">-เลือกแผนกสาขา-</option>
                            <?php
                            include 'condb.php';
                            $stmt = $conn->prepare("SELECT* FROM tbl_dept");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach ($result as $row) {
                            ?>
                                <option value="<?= $row['idDept']; ?>"><?= $row['DeptTH']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="mb-2">สถานะ</label>
                        <select name="Status" class="form-select" required>
                            <option value="เลือกสถานะ">-<?= $row_em['Status']; ?>-</option>
                            <option value="เลือกสถานะ">-เลือกสถานะ-</option>
                            <option value="Admin">แอดมิน</option>
                            <option value="Top Executive">ผู้บริหาร</option>
                            <option value="Lecturers">อาจารย์</option>
                            <option value="Students">นักเรียน</option>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="row" align="center">
                <div class="col">
                    <input type="hidden" name="ID" value="<?= $row_em['ID']; ?>">
                    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                    <a href="member_student.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
                </div>
            </div>
        </form>
    </div>
</div>