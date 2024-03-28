<?php 
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
// exit();
if (isset($_POST['Name'])) {
     include './admin/condb.php';
     //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
      echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    $Name = $_POST['Name'];
    $Content = $_POST['Content'];
    $t_id = $_POST['t_id'];
    $date_get = $_POST['date_get'];
    $idDept = $_POST['idDept'];
    $Status = $_POST['Status'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO tbl_blog (ID, Name, Content, t_id, date_get, idDept, Status)
    VALUES (:ID, :Name, :Content, :t_id, :date_get, :idDept, :Status)");
    $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
    $stmt->bindParam(':Name', $Name, PDO::PARAM_STR);
    $stmt->bindParam(':Content', $Content, PDO::PARAM_STR);
    $stmt->bindParam(':t_id', $t_id, PDO::PARAM_INT);
    $stmt->bindParam(':date_get', $date_get, PDO::PARAM_STR);
    $stmt->bindParam(':idDept', $idDept, PDO::PARAM_INT);
    $stmt->bindParam(':Status', $Status, PDO::PARAM_STR);
    $result = $stmt->execute();
    //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
            if($result){
                    echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "อัพโหลดสำเร็จ",
                          text: "Redirecting in 1 seconds.",
                          type: "success",
                          timer: 1000,
                          showConfirmButton: false
                      }, function() {
                          window.location = "blog_add.php"; //หน้าที่ต้องการให้กระโดดไป
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
                          window.location = "blog_add.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            } //else ของ if result      
        }else{ //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
            echo '<script>
                         setTimeout(function() {
                          swal({
                              title: "คุณอัพโหลดไม่ถูกต้อง",
                              type: "error"
                          }, function() {
                              window.location = "blog.php"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
        }
?>