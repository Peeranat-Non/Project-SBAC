<?php
       //ถ้ามีค่าส่งมาจากฟอร์ม
      if(isset($_POST['DeptTH'])) {
          //ไฟล์เชื่อมต่อฐานข้อมูล
          include 'condb.php';
      //ประกาศตัวแปรรับค่าจากฟอร์ม
      $idDept = $_POST['idDept'];
      $DeptTH = $_POST['DeptTH'];
      $Abbreviations = $_POST['Abbreviations'];
      $DeptName = $_POST['DeptName'];
      $StatusDept = $_POST['StatusDept'];
      //sql update
      $stmt = $conn->prepare("UPDATE  tbl_dept SET DeptTH=:DeptTH, Abbreviations=:Abbreviations, DeptName=:DeptName, StatusDept=:StatusDept WHERE idDept=:idDept");
      $stmt->bindParam(':idDept', $idDept , PDO::PARAM_INT);
      $stmt->bindParam(':DeptTH', $DeptTH , PDO::PARAM_STR);
      $stmt->bindParam(':Abbreviations', $Abbreviations , PDO::PARAM_STR);
      $stmt->bindParam(':DeptName', $DeptName , PDO::PARAM_STR);
      $stmt->bindParam(':StatusDept', $StatusDept , PDO::PARAM_STR);
      $stmt->execute();
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($stmt->rowCount() > 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "department.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }else{
       echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "department.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
$conn = null; //close connect db
} //isset
?>