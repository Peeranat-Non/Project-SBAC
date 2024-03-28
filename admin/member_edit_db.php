<?php 
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();
if (isset($_POST['Name'])) {
     include 'condb.php';
     //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
      echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $ID = $_POST['ID'];
    $Code = $_POST['Code'];
    $NameTitle = $_POST['NameTitle'];
    $Name = $_POST['Name'];
    $Lastname = $_POST['Lastname'];
    $Dept = $_POST['Dept'];
    $Status = $_POST['Status'];

    //sql insert
    $stmt = $conn->prepare("UPDATE tbl_lecturers SET 
    Code=:Code,
    NameTitle=:NameTitle,
    Name=:Name,
    Lastname=:Lastname,
    Dept=:Dept,
    Status=:Status
    WHERE ID =:ID");
    $stmt->bindParam(':ID', $ID, PDO::PARAM_INT);
    $stmt->bindParam(':Code', $Code, PDO::PARAM_STR);
    $stmt->bindParam(':NameTitle', $NameTitle, PDO::PARAM_STR);
    $stmt->bindParam(':Name', $Name, PDO::PARAM_STR);
    $stmt->bindParam(':Lastname', $Lastname, PDO::PARAM_STR);
    $stmt->bindParam(':Dept', $Dept, PDO::PARAM_STR);
    $stmt->bindParam(':Status', $Status, PDO::PARAM_STR);
    $result = $stmt->execute();
    //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
            if($result){
                echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "แก้ไขข้อมูลสมาชิกสำเร็จ",
                          type: "success"
                      }, function() {
                          window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
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
                          window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            } //else ของ if result  
    $conn = null; //close connect db
    } //isset
?>