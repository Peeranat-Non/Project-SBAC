<?php
//คิวรี่ข้อมูลมาแสดงในตาราง
include 'condb.php';
$stmt = $conn->prepare("SELECT* FROM tbl_slides");
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="card">
  <div class="table-responsive text-nowrap">
    <table id="example1" class="table">
      <thead>
        <tr role="row" class="info">
          <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
          <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">รูปภาพ</th>
          <th tabindex="0" rowspan="1" colspan="1" style="width: 40%;">ชื่อสไลด์</th>
          <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">สถานะ</th>
          <th tabindex="0" rowspan="1" colspan="1">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $row_dm) { ?>
          <tr>
            <td>
              <?php echo $row_dm['ID']; ?>
            </td>
            <td>
              <img src="./doc_file/carousel/<?php echo $row_dm['slide_img']; ?>" width="250px">
            </td>
            <td>
              <?php echo $row_dm['slide_name']; ?>
            </td>
            <td>
              <?php
              $st =  $row_dm['Status'];
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
              <a class="btn btn-warning btn-sm" href="./carousel.php?act=edit&ID=<?php echo $row_dm['ID']; ?>">
                <i class="fas fa-pencil-alt">
                </i>
                แก้ไข
              </a>
              <a class="btn btn-danger btn-sm" href="./carousel_del.php?ID=<?php echo $row_dm['ID']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล !');">
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