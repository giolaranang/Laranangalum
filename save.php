<?php
$name = $_POST["name"];
$date = $_POST["date"];
$price = $_POST["price"];

//echo $name." ".$date." ".$price;

include "dbaseConn.php";

//Date
//Employee
//Price

$insertdata = "Insert into employee (Date, Employee, Price) Values ('$date','$name','$price')";

if ($conn->query($insertdata)===TRUE){
   //echo "<script>history.go(-1);</script>";
   header('Location: ' . $_SERVER["HTTP_REFERER"] );
exit;
}else{
   echo "error".$insertdata."<br>".
   $conn->error;
}

$conn->close();
?>