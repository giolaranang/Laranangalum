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
    <link rel="stylesheet" href="style.css">
    <head>
       <title>Laranang Alum</title> 
    </head>
    <body>
        <div class="scroll-bg" id="manualCalcu" >
      <button id="loadCal" class="calculator" onclick="loadCalculator()">Calculator</button>
      <button id="loadCal" class="calculator" onclick="loadSample()">Sample</button>
      <center>
      <br>
      <h1> 
          Cash Advance
      </h1>
    <form action="save.php" method="POST">
      <div class="form-group">
          <select name="name" class="form-control form-control-lg">
             <option value="" disabled selected>Click here to Select an Employee</option>
             <option value ="Engineer Francis">Engineer Francis</option>
             <option value ="Gio">Gio</option>
             <option value ="Jomar">Jomar</option>
             <option value ="John">John</option>
             <option value ="Kennedy">Kennedy</option>
             <option value ="Ramir">Ramir</option>
             <option value ="Richmon">Richmon</option>
             <option value ="Kiko">Kiko</option>
             <option value ="Anthony">Anthony</option>
          </select>
      </div>
      <p>
          <input placeholder="Date" type="date" name="date" id="date" required ></input>
      </p>
      <p>
          <select name="price" id="price">
             <option value ="100">100</option>
             <option value ="200">200</option>
             <option value ="300">300</option>
             <option value ="400">400</option>
             <option value ="500">500</option>
             <option value ="600">600</option>
             <option value ="1000">1000</option>
             <option value ="1500">1500</option>
             <option value ="2000">2000</option>
          </select>
          <div id="manualPrice">
             <button type="button" onclick="loadPrice()">Click to enter manual price</button>
          </div>
      </p>
          <input onclick="confirmalert()" type="submit" class="btn btn-success btn-lg" value="Save" />
      </form>
      <br>
      <form action= "show.php">
          <input id="showID" class="btn btn-info btn-lg" type="submit"/>
      </form>
      <br>
          <Button onclick="deletealert()" id="deleteID" class="btn btn-danger btn-lg" type="button" >Delete All</button>
    </div>
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
              document.getElementById("showID").value ="Show";
              document.getElementById("deleteID").value ="Delete";
              document.getElementById('date').valueAsDate = new Date;
  //  alert("<?php echo "datef: ". $_SESSION["datefrom"]; ?>");
  //  alert("<?php echo "datet: ". $_SESSION["dateto"]; ?>");
    <?php
    if ($_SESSION["operation"]=='SUMMARY'){
      ?> 
       loadSum();
     <?php   
    }else{
        
    if (!isset($_SESSION["operation"])){
       $_SESSION["operation"]=="basic";
    } else if ($_SESSION["operation"]=="loadcalcu"){
    ?>
       document.getElementById("loadCal").click();
    <?php     
    }
    }
    ?>
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
  xhttp.open("GET", "innersample.php", true);
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
