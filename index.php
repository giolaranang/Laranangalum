<!doctype html> 
<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <head>
       <title>Laranang Alum</title> 
    </head>
    <body>
        <div class="scroll-bg" id="manualCalcu" >
      <button class="calculator" onclick="loadCalculator()">Calculator</button>
      <center>
      <br>
      <h1> 
          Cash Advance
      </h1>
    <form action="save.php" method="POST">
      <div class="form-group">
          <select name="name" class="form-control form-control-lg">
             <option value="" disabled selected>Click here to Select an Employee</option>
             <option value ="Francis">Francis</option>
             <option value ="Gio">Gios</option>
             <option value ="Jomar">Jomar</option>
             <option value ="Kennedy">Kennedy</option>
             <option value ="Ramir">Ramir</option>
             <option value ="Richmon">Richmon</option>
             <option value ="Kiko">Kiko</option>
             <option value ="Bryan">Bryan</option>
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
   <!--   <p>
          <button onclick="confirmalert()">Save</button>
      </p>-->
          <input onclick="confirmalert()" type="submit" class="btn btn-success btn-lg" value="Save" />
      </form>
      <br>
      <form action= "show.php">
          <input id="showID" class="btn btn-info btn-lg" type="submit"/>
      </form>
      <br>
          <Button onclick="deletealert()" id="deleteID" class="btn btn-danger btn-lg" type="button" >Delete All</button>
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

function back(){
              alert("test");
          }

function add(){
    var calnum=document.getElementById("calcuValue1").value;
   alert (calnum);
}
      </script>
    </div >
    </body>
</html>
