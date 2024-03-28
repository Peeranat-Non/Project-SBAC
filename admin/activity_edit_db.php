<?php
       //ถ้ามีค่าส่งมาจากฟอร์ม
      if(isset($_POST['Name'])) {
          //ไฟล์เชื่อมต่อฐานข้อมูล
          include 'condb.php';

          $date1 = date("Ymd_His");
          //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
          $numrand = (mt_rand());
          $activity_img = (isset($_POST['activity_img']) ? $_POST['activity_img'] : '');
          $upload=$_FILES['activity_img']['name'];
      
          //มีการอัพโหลดไฟล์
          if($upload !='') {
          //ตัดขื่อเอาเฉพาะนามสกุล
          $typefile = strrchr($_FILES['activity_img']['name'],".");
      
          //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
          if($typefile =='.jpg' || $typefile  =='.jpg' || $typefile  =='.png'){
      
          //โฟลเดอร์ที่เก็บไฟล์
          $path="doc_file/activity/";
          //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
          $newname = $numrand.$date1.$typefile;
          $path_copy=$path.$newname;
          //คัดลอกไฟล์ไปยังโฟลเดอร์
          move_uploaded_file($_FILES['activity_img']['tmp_name'],$path_copy); 

      //ประกาศตัวแปรรับค่าจากฟอร์ม
      $ID = $_POST['ID'];
      $Name = $_POST['Name'];
      $t_id = $_POST['t_id'];
      $Content = $_POST['Content'];
      $date_get = $_POST['date_get'];
      $m_username = $_POST['m_username'];
      //sql update
      $stmt = $conn->prepare("UPDATE  tbl_activity SET Name=:Name, t_id=:t_id, Content=:Content, date_get=:date_get, m_username=:m_username WHERE ID=:ID");
      $stmt->bindParam(':ID', $ID , PDO::PARAM_INT);
      $stmt->bindParam(':Name', $Name , PDO::PARAM_STR);
      $stmt->bindParam(':t_id', $t_id , PDO::PARAM_STR);
      $stmt->bindParam(':Content', $Content, PDO::PARAM_STR);
      $stmt->bindParam(':date_get', $date_get , PDO::PARAM_STR);
      $stmt->bindParam(':m_username', $m_username , PDO::PARAM_STR);
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
                  window.location = "activity.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "activity.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
}
}
$conn = null; //close connect db
} //isset
?>