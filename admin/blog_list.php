<?php
include 'condb.php';
$stmtblog = $conn->prepare("
SELECT * #ตารางเอามาทุกคอลัมภ์
FROM tbl_blog AS b
INNER JOIN tbl_blog_type AS t ON b.t_id=t.t_id
INNER JOIN tbl_dept AS d ON b.idDept=d.idDept
ORDER BY b.ID ASC #เรียงลำดับข้อมูลจากน้อยไปมาก
");
$stmtblog->execute();
$resultblog = $stmtblog->fetchAll();
?>
<div class="card">
  <div class="">
    <table id="example1" class="table">
      <thead>
        <tr role="row" class="info">
          <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
          <th tabindex="0" rowspan="1" colspan="1" style="width: 40%;">ชื่อหนังสือ/ประเภท</th>
          <th tabindex="0" rowspan="1" colspan="1">วันที่อัพโหลด</th>
          <th tabindex="0" rowspan="1" colspan="1">สถานะ</th>
          <th tabindex="0" rowspan="1" colspan="1">แผนก/ผู้ใช้</th>
          <th tabindex="0" rowspan="1" colspan="1">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($resultblog as $row_blog) { ?>
          <tr>
            <td>
              <?php echo $row_blog['ID']; ?>
            </td>
            <td>
              <?php echo $row_blog['Name']; ?>
              <br>
              ประเภท: <font color="blue"><?php echo $row_blog['t_name']; ?></font><br>
            </td>
            <td>
              วันที่พิมพ์: <?php echo date('d/m/Y', strtotime($row_blog['date_get'])); ?> <br>
              วันที่อัพ: <?php echo date('d/m/Y', strtotime($row_blog['date_up'])); ?>
            </td>
            <td>
              <?php
              $st =  $row_blog['Status'];
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
              <?php echo $row_blog['DeptTH']; ?>
            </td>
            <td>
              <a class="btn btn-info btn-sm" href="../blog_view.php?act=view&ID=<?php echo $row_blog['ID']; ?>" target="_blank">
                <i class="fas fa-folder">
                </i>
                เปิดดู
              </a>
              <a class="btn btn-warning btn-sm" href="blog.php?act=edit&ID=<?php echo $row_blog['ID']; ?>">
                <i class="fas fa-pencil-alt">
                </i>
                แก้ไข
              </a>
              <a class="btn btn-danger btn-sm" href="blog_del.php?ID=<?= $row_blog['ID']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล !!');">
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