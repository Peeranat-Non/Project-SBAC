<?php 
if(isset($_GET['ID'])){
    include 'condb.php';
//ประกาศตัวแปรรับค่าจาก param method get
$ID = $_GET['ID'];
$stmt = $conn->prepare('DELETE FROM tbl_form WHERE ID=:ID');
$stmt->bindParam(':ID', $ID , PDO::PARAM_INT);
$stmt->execute();

  if($stmt->rowCount() > 0){
        echo '<script>       
              window.location = "form.php"; //หน้าที่ต้องการให้กระโดดไป
              </script>';
    }else{
       echo '<script>         
              window.location = "form.php"; //หน้าที่ต้องการให้กระโดดไป
             </script>';
    }
$conn = null;
} //isset
?>