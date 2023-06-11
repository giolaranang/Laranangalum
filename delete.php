<?php
include "dbaseConn.php";

//Date
//Employee
//Price

$deletedata = "Delete from employee;";

if ($conn->query($deletedata)===TRUE){
  echo "<script>history.go(-1);</script>";
  //header('Location: '.$_SERVER['REQUEST_URI']);
    
}else{
   echo "error".$deletedata."<br>".
   $conn->error;
}

$conn->close();
?>