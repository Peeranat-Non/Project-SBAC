<?php

session_start();
require_once './config/db.php';
require_once './Control/checkstatus.php';
date_default_timezone_set('Asia/Bangkok');

?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "blog";?>
<?php include("./view/head.php"); ?> 

<body>

  <!-- Spinner Start -->
  <?php include("./view/spinner.php"); ?> 
  <!-- Spinner End -->
  
  <!-- Navbar Start -->
  <?php include("./view/navbar.php"); ?> 
  <!-- navbar End -->

  <?php 
    include './admin/condb.php';
    $stmtMem = $conn->prepare("
    SELECT b.*, bt .t_name
    FROM tbl_blog AS b 
    INNER JOIN tbl_blog_type AS bt ON b.t_id=bt.t_id
    ORDER BY b.ID ASC 
    ");
      $stmtMem->execute();
      $resultMem = $stmtMem->fetchAll();                                         
  ?>

  <section class="" style="background-color: #f2f7ff;">
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
          <h1 class="display-6 mb-0">
            <div class="h-100">
              <div class="d-inline-block text-primary py-1 px-3 mb-3">บทความ</div>
            </div>
          </h1>
        </div>
        <div class="text-end">
          <a type="button" a href="./blog_add.php" class="btn btn-warning"><i class="bi bi-folder-fill me-2"></i>จัดการบทความของฉัน</a>
        </div>
        <br>
        <div class="p-5 mb-4 bg-light shadow rounded-3">
          <table id="myTable" class="table table table-bordered border-Secondary">
            <thead class="table-dark text-center"">
                <tr>
                  <th class=" col-1" scope="col">ลำดับ</th>
              <th class="col-2" scope="col">ว-ด-ป</th>
              <th class="col-5" scope="col">ชื่อบทความ</th>
              <th class="col-2" scope="col">ประเภทบทความ</th>
              <th class="col-2" scope="col">ผู้เขียน</th>
              </tr>
            </thead>
            <tbody class="">
              <?php foreach ($resultMem as $row_member) { ?>  
              <tr>
                <td>
                  <?php echo $row_member['ID']; ?>
                </td>
                <td>
                  <?php echo date('d/m/Y',strtotime($row_member['date_up'])); ?>
                </td>
                <td>
                  <a href="./blog_view.php?act=view&ID=<?php echo $row_member['ID']; ?>" class=""><?php echo $row_member['Name']; ?>
                </td>
                <td>
                  <?php echo $row_member['t_name']; ?>
                </td>
                <td>
                  <?php echo $_SESSION['NameTitle'].''.$_SESSION['Name'].' '.$_SESSION['Lastname'];?>
                </td>
                <?php } ?>  
              </tr>
            </tbody>
          </table>
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
