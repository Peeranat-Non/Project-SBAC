<?php
       //ถ้ามีค่าส่งมาจากฟอร์ม
      if(isset($_POST['slide_name'])) {
          //ไฟล์เชื่อมต่อฐานข้อมูล
          include 'condb.php';

          $date1 = date("Ymd_His");
          //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
          $numrand = (mt_rand());
          $slide_img = (isset($_POST['slide_img']) ? $_POST['slide_img'] : '');
          $upload=$_FILES['slide_img']['name'];
      
          //มีการอัพโหลดไฟล์
          if($upload !='') {
          //ตัดขื่อเอาเฉพาะนามสกุล
          $typefile = strrchr($_FILES['slide_img']['name'],".");
      
          //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
          if($typefile =='.jpg' || $typefile  =='.jpg' || $typefile  =='.png'){
      
          //โฟลเดอร์ที่เก็บไฟล์
          $path="doc_file/carousel/";
          //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
          $newname = $numrand.$date1.$typefile;
          $path_copy=$path.$newname;
          //คัดลอกไฟล์ไปยังโฟลเดอร์
          move_uploaded_file($_FILES['slide_img']['tmp_name'],$path_copy); 

      //ประกาศตัวแปรรับค่าจากฟอร์ม
      $ID = $_POST['ID'];
      $slide_name = $_POST['slide_name'];
      $slide_link = $_POST['slide_link'];
      $Status = $_POST['Status'];
      //sql update
      $stmt = $conn->prepare("UPDATE  tbl_slides SET slide_name=:slide_name, slide_link=:slide_link, Status=:Status WHERE ID=:ID");
      $stmt->bindParam(':ID', $ID , PDO::PARAM_INT);
      $stmt->bindParam(':slide_name', $slide_name , PDO::PARAM_STR);
      $stmt->bindParam(':slide_link', $slide_link , PDO::PARAM_STR);
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
                  window.location = "carousel.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "carousel.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    
        }
    }
    }

$conn = null; //close connect db
} //isset
?>
