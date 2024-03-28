<?php
include 'condb.php';
$stmtMem = $conn->prepare("
    SELECT s.*, d .DeptTH 
    FROM tbl_student AS s  
    INNER JOIN tbl_dept AS d ON s.Dept=d.idDept
    ORDER BY s.ID ASC 
    ");
$stmtMem->execute();
$resultMem = $stmtMem->fetchAll();
?>
<div class="card">
  <div class="table-responsive text-nowrap">
    <table id="example1" class="table">
      <thead>
        <tr role="row" class="info">
          <th tabindex="0" rowspan="1" colspan="1">ลำดับ</th>
          <th tabindex="0" rowspan="1" colspan="1">รหัสประจำตัว</th>
          <th tabindex="0" rowspan="1" colspan="1">ชื่อ-นามสกุล</th>
          <th tabindex="0" rowspan="1" colspan="1">แผนก</th>
          <th tabindex="0" rowspan="1" colspan="1">สถานะ</th>
          <th tabindex="0" rowspan="1" colspan="1">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($resultMem as $row_member) { ?>
          <tr>
            <td>
              <?php echo $row_member['ID']; ?>
            </td>
            <td>
              <?php echo $row_member['Code']; ?>
            </td>
            <td>
              <?php echo $row_member['Name'] . ' ' . $row_member['Lastname']; ?>
            </td>
            <td>
              <?php echo $row_member['DeptTH']; ?>
            </td>
            <td>

              <?php
              $st =  $row_member['Status'];
              if ($st == 'Admin') {
                echo "<span class='badge bg-label-warning me-1'>";
                echo "ผู้ดูแลระบบ";
                echo "</span>";
              } elseif ($st == 'Top Executive') {
                echo "<span class='badge bg-label-warning me-1'>";
                echo "ผู้บริหาร";
                echo "</span>";
              } elseif ($st == 'Lecturers') {
                echo "<span class='badge bg-label-warning me-1'>";
                echo "อาจารย์";
                echo "</span>";
              } elseif ($st == 'Students') {
                echo "<span class='badge bg-label-warning me-1'>";
                echo "นักเรียน";
                echo "</span>";
              } elseif ($st == 'Block') {
                echo "<span class='badge bg-label-warning me-1'>";
                echo "ปิดการใช้งาน";
                echo "</span>";
              } else {
                echo "";
              }
              ?>
            </td>
            <td>
              <a class="btn btn-warning btn-sm" href="member_student.php?act=edit&ID=<?php echo $row_member['ID']; ?>">
                <i class="fas fa-pencil-alt">
                </i>
                แก้ไข
              </a>
              <a class="btn btn-danger btn-sm" href="member_del.php?ID=<?= $row_member['ID']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล !!');">
                <i class="fas fa-trash">
                </i>
                ลบ
              </a>
            </td>
          <?php } ?>
          </tr>
      </tbody>
    </table>
  </div>
</div>