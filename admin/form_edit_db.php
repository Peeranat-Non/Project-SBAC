<?php
       //ถ้ามีค่าส่งมาจากฟอร์ม
      if(isset($_POST['form_name'])) {
          //ไฟล์เชื่อมต่อฐานข้อมูล
          include 'condb.php';

     //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
      echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
      $date1 = date("Ymd_His");
      //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
      $numrand = (mt_rand());
      $form_file = (isset($_POST['form_file']) ? $_POST['form_file'] : '');
      $upload=$_FILES['form_file']['name'];
      //มีการอัพโหลดไฟล์
      if($upload !='') {
      //ตัดขื่อเอาเฉพาะนามสกุล
      $typefile = strrchr($_FILES['form_file']['name'],".");
      //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
      if($typefile =='.pdf' || $typefile  =='.doc' || $typefile  =='.xls' || $typefile  =='.xlw'){
      //โฟลเดอร์ที่เก็บไฟล์
      $path="doc_file/form/";
      //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
      $newname = $numrand.$date1.$typefile;
      $path_copy=$path.$newname;
      //คัดลอกไฟล์ไปยังโฟลเดอร์
      move_uploaded_file($_FILES['form_file']['tmp_name'],$path_copy);
      //ประกาศตัวแปรรับค่าจากฟอร์ม
      $ID = $_POST['ID'];
      $form_name = $_POST['form_name'];
      $date_get = $_POST['date_get'];
      $Status = $_POST['Status'];
      //sql update
      $stmt = $conn->prepare("UPDATE  tbl_form SET form_name=:form_name, date_get=:date_get, Status=:Status WHERE ID=:ID");
      $stmt->bindParam(':ID', $ID , PDO::PARAM_INT);
      $stmt->bindParam(':form_name', $form_name , PDO::PARAM_STR);
      $stmt->bindParam(':date_get', $date_get , PDO::PARAM_STR);
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
                            window.location = "form.php"; //หน้าที่ต้องการให้กระโดดไป
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
                            window.location = "form.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                        }, 1000);
                    </script>';
                   }   }
                }
            $conn = null; //close connect db
            } //isset
?>