<?php
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['t_name'])) {
    //ไฟล์เชื่อมต่อฐานข้อมูล
    include 'condb.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
     //check data
      echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


    $t_name = $_POST['t_name'];
    $t_nameEN = $_POST['t_nameEN'];
    $StatusType = $_POST['StatusType'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO tbl_type (t_name, t_nameEN, StatusType)
    VALUES (:t_name, :t_nameEN, :StatusType)");
    $stmt->bindParam(':t_name', $t_name, PDO::PARAM_STR);
    $stmt->bindParam(':t_nameEN', $t_nameEN, PDO::PARAM_STR);
    $stmt->bindParam(':StatusType', $StatusType, PDO::PARAM_STR);
    $result = $stmt->execute();

    
    if($result){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "type.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "type.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } //else check
?>