<?php
include 'condb.php';
$stmtdoc = $conn->prepare("
SELECT * 
FROM tbl_doc_file AS f
INNER JOIN tbl_type AS t ON f.t_id=t.t_id
INNER JOIN tbl_dept AS d ON f.idDept=d.idDept
ORDER BY f.fileID ASC 
");
$stmtdoc->execute();
$resultdoc = $stmtdoc->fetchAll();
?>
<div class="card">
  <div class="table-responsive">
    <table id="example1" class="table">
      <thead>
        <tr role="row" class="info">
          <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
          <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;">ชื่อหนังสือ/ประเภท</th>
          <th tabindex="0" rowspan="1" colspan="1">วันที่อัพโหลด</th>
          <th tabindex="0" rowspan="1" colspan="1">สถานะ</th>
          <th tabindex="0" rowspan="1" colspan="1">แผนก/ผู้ใช้</th>
          <th tabindex="0" rowspan="1" colspan="1">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($resultdoc as $row_doc) { ?>
          <tr>
            <td>
              <?php echo $row_doc['fileID']; ?>
            </td>
            <td>
              <?php echo $row_doc['filename']; ?>
              <br>
              ประเภท: <font color="blue"><?php echo $row_doc['t_name']; ?></font><br>
            </td>
            <td>
              วันที่พิมพ์: <?php echo date('d/m/Y', strtotime($row_doc['date_get'])); ?> <br>
              วันที่อัพ: <?php echo date('d/m/Y', strtotime($row_doc['date_up'])); ?>
            </td>
            <td align=""> 
              <?php
                $st = $row_doc['status'];
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
                ?></td>
            <td>
              <?php echo $row_doc['DeptTH']; ?>
            </td>
            <td>
              <a class="btn btn-info btn-sm" href="doc_file/<?php echo $row_doc['doc_file']; ?>" target="_blank" class="btn btn-info btn-sm">
                <i class="fas fa-folder">
                </i>
                เปิดดู
              </a>
              <a class="btn btn-warning btn-sm" href="doc.php?act=edit&fileID=<?php echo $row_doc['fileID']; ?>">
                <i class="fas fa-pencil-alt">
                </i>
                แก้ไข
              </a>
              <a class="btn btn-danger btn-sm" href="doc_del.php?fileID=<?= $row_doc['fileID']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล !!');">
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