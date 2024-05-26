<?php
session_start();
?>
<!doctype html>
<html lang="en">
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>
  <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" href="style.css">
    <head>
       <title>Laranang Alum</title> 
    </head>
    <body>
      <div class="scroll-bg" id="manualCalcu" >
      <div class="menu"> 
        <div class="column leftside-menu">         
            <button class="" onclick="loadCalculator()">POS System</button>
            <button class="" onclick="loadSample()">Employee Management</button>
        </div>
        <div class="column">
            <button class="login">Login</button>
        </div>
      </div>

<?php
  include 'innersample.php';
?>
<script>
          function confirmalert(){
              let confirmalert = confirm("Are you sure?");
              if (confirmalert){
               const dateinput=document.getElementById('date');
               if(! dateinput.value){
                alert ("Please specify the date");  
               }else{
               alert("saved!");
               }   
              }else{
                  alert("cancelled");
              }
          }
          function deletealert(){
              let deletealert = confirm ("Delete all records?");
              if(deletealert){
                 alert("Records Deleted!");
                 window.location.href='delete.php';
              }else{
                  alert("cancelled");
              }
          }
    window.onload=function(){
             /* document.getElementById("showID").value ="Show";
              document.getElementById("deleteID").value ="Delete";
              document.getElementById('date').valueAsDate = new Date;*/

  /*  alert("<?php echo "datef: ". $_SESSION["datefrom"]; ?>");*/
  /* alert("<?php echo "datet: ". $_SESSION["dateto"]; ?>");*/
    /*
    <?php
  
   if (!isset($_SESSION["operation"])){
       $_SESSION["operation"]=="basic";
     }
  
  if ($_SESSION["operation"]=='SUMMARY'){
      ?> 
       loadSum();
     <?php   
    }else if ($_SESSION["operation"]=="loadcalcu"){
    ?>
       document.getElementById("loadCal").click();
    <?php     
    }
    ?>
*/
}
 
    
function loadPrice() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("manualPrice").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "innerphp.php", true);
  xhttp.send();
}

function loadCalculator() {
       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
       document.getElementById("manualCalcu").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "innercalcu.php", true);
  xhttp.send();
}

function loadSample(){
    var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
       document.getElementById("manualCalcu").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "employee_management.php", true);
  xhttp.send(); 
}

function loadSum(){
    var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
       document.getElementById("manualCalcu").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "summary.php", true);
  xhttp.send(); 
}

function uploadsample(){
  var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
       document.getElementById("manualCalcu").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "uploadsample.php", true);
  xhttp.send(); 
}

function operations(command){
   var inner_command = command;
   switch (inner_command){
       case "income":
           document.getElementById('checker').value="income";
       break;
       case "expense":
           document.getElementById('checker').value="expense";
       break;
       case "delete_income":
           let confirm_delete = confirm("Are you sure?");
              if (confirm_delete){
               document.getElementById('checker').value="delete_income";
              }else{
                  alert("cancelled");
              }
       break; 
       case "delete_expense":
           let confirm_delete_exp = confirm("Are you sure?");
              if (confirm_delete_exp){
               document.getElementById('checker').value="delete_expense";
              }else{
                  alert("cancelled");
              }
       break;
       case "back":
           <?php
              unset($_SESSION["operation"]);
           ?>
           window.location.href="index.php";
       break;
       case "undo":
           document.getElementById('checker').value="undo";
       break;
       case "undo_expense":
           document.getElementById('checker').value="undo_expense";
       break;
       case "current":
           document.getElementById('checker').value="cash_current";
       break;
       case "currentc":
           document.getElementById('checker').value="current_change";
       break;
       case "reset":
             let confirm_reset = confirm("Are you sure?");
              if (confirm_reset){
               document.getElementById('checker').value="reset";
              }else{
                  alert("cancelled");
              }
       break;
       case "save":
             let confirm_save= confirm("Are you sure?");
              if (confirm_save){
               const input=document.getElementById('cash_in');
               input.setAttribute('required','');
               document.getElementById('checker').value="save";
              }else{
                  alert("cancelled");
              }
       break;
   }
}
      </script>
    </body>
</html>
