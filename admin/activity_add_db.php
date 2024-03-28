<?php 
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
// exit();
if (isset($_POST['Name'])) {
     include 'condb.php';
     //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
      echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

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

    $Name = $_POST['Name'];
    $t_id = $_POST['t_id'];
    $Content = $_POST['Content'];
    $date_get = $_POST['date_get'];
    $m_username = $_POST['m_username'];
    $idDept = $_POST['idDept'];
    $Status = $_POST['Status'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO tbl_activity (ID, Name, t_id, Content, date_get, m_username, idDept, activity_img, Status)
    VALUES (:ID, :Name, :t_id, :Content, :date_get, :m_username, :idDept, '$newname', :Status)");
    $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
    $stmt->bindParam(':Name', $Name, PDO::PARAM_STR);
    $stmt->bindParam(':t_id', $t_id, PDO::PARAM_INT);
    $stmt->bindParam(':Content', $Content, PDO::PARAM_STR);
    $stmt->bindParam(':date_get', $date_get, PDO::PARAM_STR);
    $stmt->bindParam(':m_username', $m_username, PDO::PARAM_STR);
    $stmt->bindParam(':idDept', $idDept, PDO::PARAM_INT);
    $stmt->bindParam(':Status', $Status, PDO::PARAM_STR);
    $result = $stmt->execute();
    //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
            if($result){
                    echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "อัพโหลดไฟล์เอกสารสำเร็จ",
                          text: "Redirecting in 1 seconds.",
                          type: "success",
                          timer: 1000,
                          showConfirmButton: false
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
            } //else ของ if result      
        }else{ //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
            echo '<script>
                         setTimeout(function() {
                          swal({
                              title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                              type: "error"
                          }, function() {
                              window.location = "activity.php"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
        }
    }}
?>