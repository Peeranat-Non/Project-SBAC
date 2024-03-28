<?php
//คิวรี่ข้อมูลมาแสดงในตาราง
include 'condb.php';
$stmt = $conn->prepare("SELECT* FROM tbl_dept");
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="card">
  <div class="table-responsive text-nowrap">
    <table id="example1" class="table">
      <thead>
        <tr role="row" class="info">
          <th tabindex="0" rowspan="1" colspan="1">ลำดับ</th>
          <th tabindex="0" rowspan="1" colspan="1">ชื่อแผนกสาขา</th>
          <th tabindex="0" rowspan="1" colspan="1">ชื่อภาษาอังกฤษ</th>
          <th tabindex="0" rowspan="1" colspan="1">ชื่อย่อ (ภาษาอังกฤษ)</th>
          <th tabindex="0" rowspan="1" colspan="1">สถานะ</th>
          <th tabindex="0" rowspan="1" colspan="1">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $row_dm) { ?>
          <tr>
            <td>
              <?php echo $row_dm['idDept']; ?>
            </td>
            <td>
              <?php echo $row_dm['DeptTH']; ?>
            </td>
            <td>
              <?php echo $row_dm['DeptName']; ?>
            </td>
            <td>
              <?php echo $row_dm['Abbreviations']; ?>
            </td>
            <td>
              <?php
              $st =  $row_dm['StatusDept'];
              if ($st == 'Using') {
                echo "<span class='badge bg-label-success me-1'>";
                echo "เปิด";
                echo "</span>";
              } elseif ($st == 'No Using') {
                echo "<span class='badge bg-label-danger me-1'>";
                echo "ปิด";
                echo "</span>";
              } else {
                echo "";
              }
              ?>
            </td>
            <td>
              <a class="btn btn-warning btn-sm" href="./department.php?act=edit&idDept=<?php echo $row_dm['idDept']; ?>">
                <i class="fas fa-pencil-alt">
                </i>
                แก้ไข
              </a>
              <a class="btn btn-danger btn-sm" href="./department_del.php?idDept=<?php echo $row_dm['idDept']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล !');">
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