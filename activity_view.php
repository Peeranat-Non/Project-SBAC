<?php

session_start();
require_once './config/db.php';
require_once './Control/checkstatus.php';
date_default_timezone_set('Asia/Bangkok');

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "activity";?>
<?php include("./view/head.php"); ?> 

<body>

  <!-- Spinner Start -->
  <?php include("./view/spinner.php"); ?> 
  <!-- Spinner End -->
  
  <!-- Navbar Start -->
  <?php include("./view/navbar.php"); ?> 
  <!-- navbar End -->

  <?php
  if (isset($_GET['ID'])) {
    include './admin/condb.php';
    $stmt = $conn->prepare("SELECT* FROM tbl_activity WHERE ID=?");
    $stmt->execute([$_GET['ID']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
    if ($stmt->rowCount() < 1) {
      header('Location: index.php');
      exit();
    }
  } //isset
  ?>

  <section class="" style="background-color: #f2f7ff;">
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto" style="max-width: auto">
          <h1 class="display-6 mb-0">
            <div class="h-100">
              <div class="d-inline-block text-primary py-1 px-3 mb-3"><?php echo $row['Name']; ?></div>
            </div>
          </h1>
        </div>
        <br>
        <div class="p-5 mb-4 bg-light shadow rounded-3">
          <?php echo $row['Content']; ?>
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
