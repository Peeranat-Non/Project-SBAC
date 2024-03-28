<?php
include 'condb.php';
$stmt = $conn->prepare("SELECT* FROM tbl_form");
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="card">
  <div class="table-responsive">
    <table id="example1" class="table">
      <thead>
        <tr role="row" class="info">
          <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
          <th tabindex="0" rowspan="1" colspan="1" style="width: 50%;">ชื่อแบบฟอร์ม</th>
          <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันที่อัพโหลด</th>
          <th tabindex="0" rowspan="1" colspan="1">สถานะ</th>
          <th tabindex="0" rowspan="1" colspan="1">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $row_form) { ?>
          <tr>
            <td>
              <?php echo $row_form['ID']; ?>
            </td>
            <td>
              <?php echo $row_form['form_name']; ?>
            </td>
            <td>
              วันที่พิมพ์: <?php echo date('d/m/Y', strtotime($row_form['date_get'])); ?> <br>
              วันที่อัพ: <?php echo date('d/m/Y', strtotime($row_form['date_up'])); ?>
            </td>
            <td>
              <?php
              $st =  $row_form['Status'];
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
              <a class="btn btn-info btn-sm" href="doc_file/form/<?php echo $row_form['form_file']; ?>" target="_blank" class="btn btn-info btn-sm">
                <i class="fas fa-folder">
                </i>
                เปิดดู
              </a>
              <a class="btn btn-warning btn-sm" href="form.php?act=edit&ID=<?php echo $row_form['ID']; ?>">
                <i class="fas fa-pencil-alt">
                </i>
                แก้ไข
              </a>
              <a class="btn btn-danger btn-sm" href="form_del.php?ID=<?= $row_form['ID']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล !!');">
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