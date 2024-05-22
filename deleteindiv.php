<?php
include "dbaseConn.php";
$ID = $_POST["Id"];
//Date
//Employee
//Price
echo("<script>console.log('PHP: " . $ID . "');</script>");
$deletemp = "Delete from employee where ID = '$ID';";

if ($conn->query($deletemp)===TRUE){
   echo "<script>window.location.href='show.php'</script>";
   //header('Location: '.$_SERVER['REQUEST_URI']);
    
}else{
   echo "error".$deletedata."<br>".
   $conn->error;
}

$conn->close();
?>