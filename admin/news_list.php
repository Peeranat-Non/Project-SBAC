<?php
include 'condb.php';
$stmtnews = $conn->prepare("
SELECT * #ตารางเอามาทุกคอลัมภ์
FROM tbl_news AS n
INNER JOIN tbl_blog_type AS t ON n.t_id=t.t_id
INNER JOIN tbl_dept AS d ON n.idDept=d.idDept
ORDER BY n.ID ASC #เรียงลำดับข้อมูลจากน้อยไปมาก
");
$stmtnews->execute();
$resultnews = $stmtnews->fetchAll();
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
        <?php foreach ($resultnews as $row_news) { ?>
          <tr>
            <td>
              <?php echo $row_news['ID']; ?>
            </td>
            <td>
              <img src="./doc_file/news/<?php echo $row_news['news_img']; ?>" width="160px">
            </td>
            <td>
              <?php echo $row_news['Name']; ?>
              <br>
              ประเภท: <font color="blue"><?php echo $row_news['t_name']; ?></font><br>
            </td>
            <td>
              วันที่พิมพ์: <?php echo date('d/m/Y', strtotime($row_news['date_get'])); ?> <br>
              วันที่อัพ: <?php echo date('d/m/Y', strtotime($row_news['date_up'])); ?>
            </td>
            <td>
              <?php
              $st =  $row_news['Status'];
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
              <a class="btn btn-info btn-sm" href="../news_view.php?act=view&ID=<?php echo $row_news['ID']; ?>" target="_blank">
                <i class="fas fa-folder">
                </i>
                เปิดดู
              </a>
              <a class="btn btn-warning btn-sm" href="news.php?act=edit&ID=<?php echo $row_news['ID']; ?>">
                <i class="fas fa-pencil-alt">
                </i>
                แก้ไข
              </a>
              <a class="btn btn-danger btn-sm" href="news_del.php?ID=<?= $row_news['ID']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล !!');">
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