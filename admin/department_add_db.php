<?php 
// print_r($_POST);
// exit();
if (isset($_POST['DeptTH'])) {
     include 'condb.php';
     //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
      echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    
     //ประกาศตัวแปรรับค่าจากฟอร์ม
    $DeptTH = $_POST['DeptTH'];
    $Abbreviations = $_POST['Abbreviations'];
    $DeptName = $_POST['DeptName'];
    $StatusDept = $_POST['StatusDept'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO tbl_Dept (DeptTH, Abbreviations, DeptName, StatusDept)
    VALUES (:DeptTH, :Abbreviations, :DeptName, :StatusDept)");
    $stmt->bindParam(':DeptTH', $DeptTH, PDO::PARAM_STR);
    $stmt->bindParam(':Abbreviations', $Abbreviations, PDO::PARAM_STR);
    $stmt->bindParam(':DeptName', $DeptName, PDO::PARAM_STR);
    $stmt->bindParam(':StatusDept', $StatusDept, PDO::PARAM_STR);
    $result = $stmt->execute();
    //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
            if($result){
                echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "เพิ่มข้อมูลสมาชิกสำเร็จ",
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
            } //else ของ if result      
        }
 
    $conn = null; //close connect db
//isset
?>