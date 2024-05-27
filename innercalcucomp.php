<?php
include "dbaseConn.php";
$checker=$_POST["checker"];
$income=$_POST["calcuValue1"];
$expense=$_POST["calcuValue2"];
$currentCash=$_POST["current"];
$currentChange=$_POST["currentc"];
$totalincome=$_POST["totalincome"];
$totalexpense=$_POST["totalexpense"];
$cash_in=$_POST["cash_in"];
$date=$_POST['date'];
switch ($checker){
    case "income":
       $manipulate_data = "Insert into cash_in (cash_in_amt) Values ('$income')";   
    break;
    case "delete_income":
       $manipulate_data = "Delete from cash_in";   
    break;
    case "undo":
       $manipulate_data = "Delete from cash_in order by Id desc limit 1";
    break;
    case "expense":
       $manipulate_data = "Insert into cash_out(cash_out_amt) Values ('$expense')"; 
    break;
    case "delete_expense":
        $manipulate_data ="Delete from cash_out";
    break;
    case "undo_expense":
       $manipulate_data = "Delete from cash_out order by Id desc limit 1";
    break;
    case "cash_current":
        $manipulate_data = "update cash_current set current_cash=('$currentCash') where Id=1";
    break;
    case "current_change":
        $manipulate_data = "update cash_current set current_cash=('$currentChange') where Id=2";
    break;
    case "reset":
        $manipulate_data = "Delete from cash_in;Delete from cash_out;update cash_current set current_cash=0 where Id=1;update cash_current set current_cash=0 where Id=2;"; 
    break;
    case "save":
        $year = date("Y", strtotime($date));
        echo"<script>
        alert(".$year.");
        </script>";
        
        $manipulate_data = "Insert into Total(Date,Year,income,expense,cash_in) Values ('$date','$year','$totalincome','$totalexpense','$cash_in')";
    break;
}
if (mysqli_multi_query($conn,$manipulate_data)){ 
    session_start();
    unset($_SESSION["operation"]);
    $_SESSION["operation"]="loadcalcu";
  ?>
    <script>
      window.location.href="index.php";
    </script>
  <?php
   exit;
}else{
    session_start();
    unset($_SESSION["operation"]);
    $_SESSION["operation"]="loadcalcu";
?>
      <script> 
       window.location.href="index.php";
      </script>
<?php
}
$conn->close();
?>