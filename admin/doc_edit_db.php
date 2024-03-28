<?php
       //ถ้ามีค่าส่งมาจากฟอร์ม
      if(isset($_POST['filename'])) {
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
    $doc_file = (isset($_POST['doc_file']) ? $_POST['doc_file'] : '');
    $upload=$_FILES['doc_file']['name'];
    //มีการอัพโหลดไฟล์
    if($upload !='') {
    //ตัดขื่อเอาเฉพาะนามสกุล
    $typefile = strrchr($_FILES['doc_file']['name'],".");
    //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
    if($typefile =='.pdf' || $typefile  =='.doc' || $typefile  =='.xls' || $typefile  =='.xlw'){
    //โฟลเดอร์ที่เก็บไฟล์
    $path="doc_file/";
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = $numrand.$date1.$typefile;
    $path_copy=$path.$newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['doc_file']['tmp_name'],$path_copy);
      //ประกาศตัวแปรรับค่าจากฟอร์ม
      $fileID = $_POST['fileID'];
      $filename = $_POST['filename'];
      $t_id = $_POST['t_id'];
      $date_get = $_POST['date_get'];
      $m_username = $_POST['m_username'];
      $idDept = $_POST['idDept'];
      $Status = $_POST['Status'];
      //sql update
      $stmt = $conn->prepare("UPDATE  tbl_doc_file SET filename=:filename, t_id=:t_id, date_get=:date_get, m_username=:m_username, idDept=:idDept, Status=:Status WHERE fileID=:fileID");
      $stmt->bindParam(':fileID', $fileID , PDO::PARAM_INT);
      $stmt->bindParam(':filename', $filename , PDO::PARAM_STR);
      $stmt->bindParam(':t_id', $t_id , PDO::PARAM_STR);
      $stmt->bindParam(':date_get', $date_get , PDO::PARAM_STR);
      $stmt->bindParam(':m_username', $m_username , PDO::PARAM_STR);
      $stmt->bindParam(':idDept', $idDept , PDO::PARAM_STR);
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
                            window.location = "doc.php"; //หน้าที่ต้องการให้กระโดดไป
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
                            window.location = "doc.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                        }, 1000);
                    </script>';
                   }   }
                }
            $conn = null; //close connect db
            } //isset
?>