<?php
//$servername = "192.168.1.37:3306";
$servername = "0.0.0.0:3306";
$username = "root";
$password = "root";
$database = "Emps";

$conn =mysqli_connect($servername, $username, $password, $database);
//mysqli_select_db($database,$conn);

if (!$conn) {
   echo "<script>alert('Database Connection Failed');</script>"; 

    die("connection failed".mysqli_connect_error());
}


?>