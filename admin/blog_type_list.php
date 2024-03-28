<?php
//คิวรี่ข้อมูลมาแสดงในตาราง
include 'condb.php';
$stmt = $conn->prepare("SELECT* FROM tbl_blog_type");
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="card">
  <div class="table-responsive text-nowrap">
    <table id="example1" class="table">
      <thead>
        <tr role="row" class="info">
          <th tabindex="0" rowspan="1" colspan="1">ลำดับ</th>
          <th tabindex="0" rowspan="1" colspan="1">ชื่อประเภทเอกสาร</th>
          <th tabindex="0" rowspan="1" colspan="1">ชื่อภาษาอังกฤษ</th>
          <th tabindex="0" rowspan="1" colspan="1">สถานะ</th>
          <th tabindex="0" rowspan="1" colspan="1">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $row_dm) { ?>
          <tr>
            <td>
              <?php echo $row_dm['t_id']; ?>
            </td>
            <td>
              <?php echo $row_dm['t_name']; ?>
            </td>
            <td>
              <?php echo $row_dm['t_nameEN']; ?>
            </td>
            <td>
              <?php
              $st =  $row_dm['StatusType'];
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
              <a class="btn btn-warning btn-sm" href="./blog_type.php?act=edit&t_id=<?php echo $row_dm['t_id']; ?>">
                <i class="fas fa-pencil-alt">
                </i>
                แก้ไข
              </a>
              <a class="btn btn-danger btn-sm" href="./blog_type_del.php?t_id=<?php echo $row_dm['t_id']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล !');">
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