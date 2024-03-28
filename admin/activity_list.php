<?php
include 'condb.php';
$stmtactivity = $conn->prepare("
SELECT * #ตารางเอามาทุกคอลัมภ์
FROM tbl_activity AS n
INNER JOIN tbl_blog_type AS t ON n.t_id=t.t_id
INNER JOIN tbl_dept AS d ON n.idDept=d.idDept
ORDER BY n.ID ASC #เรียงลำดับข้อมูลจากน้อยไปมาก
");
$stmtactivity->execute();
$resultactivity = $stmtactivity->fetchAll();
?>
<div class="card">
  <div class="table-responsive">
    <table id="example1" class="table">
      <thead>
        <tr role="row" class="info">
          <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
          <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รูปภาพ</th>
          <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;">ชื่อหนังสือ/ประเภท</th>
          <th tabindex="0" rowspan="1" colspan="1">วันที่อัพโหลด</th>
          <th tabindex="0" rowspan="1" colspan="1">สถานะ</th>
          <th tabindex="0" rowspan="1" colspan="1">แผนก/ผู้ใช้</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($resultactivity as $row_activity) { ?>
          <tr>
            <td>
              <?php echo $row_activity['ID']; ?>
            </td>
            <td>
              <img src="./doc_file/activity/<?php echo $row_activity['activity_img']; ?>" width="160px">
            </td>
            <td>
              <?php echo $row_activity['Name']; ?>
              <br>
              ประเภท: <font color="blue"><?php echo $row_activity['t_name']; ?></font><br>
            </td>
            <td>
              วันที่พิมพ์: <?php echo date('d/m/Y', strtotime($row_activity['date_get'])); ?> <br>
              วันที่อัพ: <?php echo date('d/m/Y', strtotime($row_activity['date_up'])); ?>
            </td>
            <td>
              <?php
              $st =  $row_activity['Status'];
              if ($st == 'Keep') {
                echo "<span class='badge bg-label-secondary me-1'>";
                echo "เก็บไว้ก่อน";
                echo "</span>";
              } elseif ($st == 'Send') {
                echo "<span class='badge bg-label-success me-1'>";
                echo "ส่งให้แอดมิน";
                echo "</span>";
              } else {
                echo "";
              }
              ?>
            </td>
            <td>
              <a class="btn btn-info btn-sm" href="../activity_view.php?act=view&ID=<?php echo $row_activity['ID']; ?>" target="_blank">
                <i class="fas fa-folder">
                </i>
                เปิดดู
              </a>
              <a class="btn btn-warning btn-sm" href="activity.php?act=edit&ID=<?php echo $row_activity['ID']; ?>">
                <i class="fas fa-pencil-alt">
                </i>
                แก้ไข
              </a>
              <a class="btn btn-danger btn-sm" href="activity_del.php?ID=<?= $row_activity['ID']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล !!');">
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