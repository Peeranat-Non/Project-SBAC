<?php
       //ถ้ามีค่าส่งมาจากฟอร์ม
      if(isset($_POST['Name'])) {
          //ไฟล์เชื่อมต่อฐานข้อมูล
          include 'condb.php';
      //ประกาศตัวแปรรับค่าจากฟอร์ม
      $ID = $_POST['ID'];
      $Name = $_POST['Name'];
      $t_id = $_POST['t_id'];
      $Content = $_POST['Content'];
      $date_get = $_POST['date_get'];
      $m_username = $_POST['m_username'];
      $Status = $_POST['Status'];
      //sql update
      $stmt = $conn->prepare("UPDATE  tbl_blog SET Name=:Name, t_id=:t_id, Content=:Content, date_get=:date_get, m_username=:m_username, Status=:Status WHERE ID=:ID");
      $stmt->bindParam(':ID', $ID , PDO::PARAM_INT);
      $stmt->bindParam(':Name', $Name , PDO::PARAM_STR);
      $stmt->bindParam(':t_id', $t_id , PDO::PARAM_STR);
      $stmt->bindParam(':Content', $Content, PDO::PARAM_STR);
      $stmt->bindParam(':date_get', $date_get , PDO::PARAM_STR);
      $stmt->bindParam(':m_username', $m_username , PDO::PARAM_STR);
      $stmt->bindParam(':Status', $Status , PDO::PARAM_STR);
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
                  window.location = "blog.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "blog.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
$conn = null; //close connect db
} //isset
?>