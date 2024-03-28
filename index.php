<?php

session_start();
require_once './config/db.php';
require_once './Control/checkstatus.php';
date_default_timezone_set('Asia/Bangkok');

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
<?php include("./view/head.php"); ?>

<body>

  <!-- Spinner Start -->
  <?php include("./view/spinner.php"); ?>
  <!-- Spinner End -->

  <!-- Navbar Start -->
  <?php include("./view/navbar.php"); ?>
  <!-- navbar End -->

  <?php

  //เรียกไฟล์เชื่อมต่อฐานข้อมูล
  require_once './admin/condb.php';
  //คิวรี่ข้อมูลมาแสดงในตาราง
  $stmt = $conn->prepare("SELECT* FROM tbl_slides");
  $stmt->execute();
  $result = $stmt->fetchAll();

  ?>

  <?php
  include './admin/condb.php';
  $stmtMem = $conn->prepare("
    SELECT b.*, bt .t_name
    FROM tbl_news AS b 
    INNER JOIN tbl_type AS bt ON b.t_id=bt.t_id
    ORDER BY b.ID ASC 
    ");
  $stmtMem->execute();
  $resultMem = $stmtMem->fetchAll();
  ?>

  <?php
  include './admin/condb.php';
  $stmtMem2 = $conn->prepare("
    SELECT b.*, bt .t_name
    FROM tbl_activity AS b 
    INNER JOIN tbl_type AS bt ON b.t_id=bt.t_id
    ORDER BY b.ID ASC 
    ");
  $stmtMem2->execute();
  $resultMem2 = $stmtMem2->fetchAll();
  ?>

  <!-- Carousel Start -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <?php
      //กำหนด class active เพื่อเรียกใช้ button สำหรับคลิกสไลด์
      $i = 0;
      foreach ($result as $row) {
        $actives = '';
        if ($i == 0) {
          $actives = 'active';
        }
      ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $actives; ?>" aria-current="true" aria-label="Slide <?php echo $i; ?>"></button>
      <?php $i++;
      } ?>
    </div>
    <div class="carousel-inner">

      <?php
      //กำหนด class active สำหรับเรียกรูปมาแสดง
      $i = 0;
      foreach ($result as $row) {
        $actives = '';
        if ($i == 0) {
          $actives = 'active';
        }
      ?>

        <div class="carousel-item <?php echo $actives; ?>">
          <a href="<?php echo $row['slide_link']; ?>" target="_blank" title="">
            <img src="./admin//doc_file/carousel/<?php echo $row['slide_img']; ?>" class="d-block w-100" alt="...">
          </a>
          <div class="carousel-caption d-none d-md-block">
            <br>
            <a href="<?php echo $row['slide_link']; ?>" target="_blank"></a></p>
          </div>
        </div>
      <?php $i++;
      } ?>

    </div>


    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Carousel End -->

  <section class="" style="background-color: #f2f7ff;">
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
          <h1 class="display-6 mb-3">
            <div class="h-100">
              <div class="d-inline-block text-primary py-1 px-3 mb-3">ข่าวสารจากระบบ</div>
            </div>
          </h1>
        </div>
        <div class="container">
          <div class="row gy-3 my-3">
            <?php foreach ($resultMem as $row_member) { ?>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card shadow">
                  <img src="./admin/doc_file/news/<?php echo $row_member['news_img']; ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title mb-4"><?php echo $row_member['Name']; ?></h5>
                    <!-- <p class="card-text"></p> -->
                    <a href="./news_view.php?act=view&ID=<?php echo $row_member['ID']; ?>" class="btn btn-primary stretched-link">อ่านต่อ</a>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>

        <br>

        <div class="d-grid gap-2 col-2 mx-auto">
          <button type="button" class="btn btn-outline-danger">ดูข่าวทั้งหมด</button>
        </div>

      </div>
    </div>

    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
          <h1 class="display-6 mb-3">
            <div class="h-100">
              <div class="d-inline-block text-primary py-1 px-3 mb-3">กิจกรรมจากระบบ</div>
            </div>
          </h1>
        </div>

        <div class="container">
          <div class="row gy-3 my-3">
            <?php foreach ($resultMem2 as $row_activity) { ?>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card shadow">
                  <img src="./admin/doc_file/activity/<?php echo $row_activity['activity_img']; ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title mb-4"><?php echo $row_activity['Name']; ?></h5>
                    <!-- <p class="card-text"></p> -->
                    <a href="./activity_view.php?act=view&ID=<?php echo $row_activity['ID']; ?>" class="btn btn-primary stretched-link">อ่านต่อ</a>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>

        <br>

        <div class="d-grid gap-2 col-2 mx-auto">
          <button type="button" class="btn btn-outline-danger">ดูกิจกรรมทั้งหมด</button>
        </div>

      </div>
    </div>

    <br>
  </section>

  <!-- Footer Start -->
  <?php include("./view/footer.php"); ?>
  <!-- Footer End -->

  <!-- Script Start -->
  <?php include("./view/script.php"); ?>
  <!-- Script End  -->

</body>

</html>

<?php mysqli_close($connect); ?>