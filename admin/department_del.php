<?php 
if(isset($_GET['idDept'])){
    include 'condb.php';
//ประกาศตัวแปรรับค่าจาก param method get
$idDept = $_GET['idDept'];
$stmt = $conn->prepare('DELETE FROM tbl_dept WHERE idDept=:idDept');
$stmt->bindParam(':idDept', $idDept , PDO::PARAM_INT);
$stmt->execute();

  if($stmt->rowCount() > 0){
        echo '<script>       
              window.location = "department.php"; //หน้าที่ต้องการให้กระโดดไป
              </script>';
    }else{
       echo '<script>         
              window.location = "department.php"; //หน้าที่ต้องการให้กระโดดไป
             </script>';
    }
$conn = null;
} //isset
?>