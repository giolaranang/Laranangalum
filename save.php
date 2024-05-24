<?php
$name = $_POST["name"];
$date = $_POST["date"];
$price = $_POST["price"];
$description = $_POST["description"];

include "dbaseConn.php";

//Date
//Employee
//Price
//Description

$insertdata = "Insert into employee (Date, Employee, Price, Description) Values ('$date','$name','$price', '$description')";

if ($conn->query($insertdata)===TRUE){
   header('Location: ' . $_SERVER["HTTP_REFERER"] );
exit;
}else{
   echo "error".$insertdata."<br>".
   $conn->error;
}

$conn->close();
?>