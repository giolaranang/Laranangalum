<?php
   include "dbaseConn.php";
?>
<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="scroll-bg center" >
            <h5>
                <div class="container-fluid manual center outerParentShow">
<?php
$readdata = "Select * from employee order by Date";
$result = $conn->query($readdata);
$employees=array(); 
if ($result->num_rows > 0){
    while ($row = $result -> fetch_assoc()){
       if (in_array($row["Date"],$employees)){
           //"may kaparehas na date";
           $findate =null;
           $same=true;
       }else{
           array_push($employees,$row["Date"]);
           $date = $row["Date"];
           $findate = strtotime($date);
           $same = false;
       }
             if($same!=1){
                 echo "<hr>";
             }
        echo "<div class='texts'><p id='date'>";
        if($same!=1){
        echo date("m/d/Y",$findate);
        }
        echo "</p><div id='inneremployee'>".$row ["Employee"]."</div> ".$row["Description"].": <div id='innerprice'>".$row["Price"]."<form action = 'deleteindiv.php' id='empform' method='post'>
             <input name='Id' type='hidden' value=". $row["ID"].">
             <input onclick='return deleteindivalert()'class='btn btn-danger btn-sm' id='deleteID' type='submit' value='Delete'/>
             </form></div>
             </div>";
    }
}else{
   echo "0 results";
}

$conn->close();
?>
    </h1>
    <Button onclick="backhome()"class="btn btn-outline-secondary">Back</button>
        </div>
    </div >
   </body>
   
</html>
        <script>
         function deleteindivalert(){
              let deletealert = confirm ("Delete this record?");
              if(deletealert){
                 alert("Record Deleted!");
             return true;
              }else{
                  alert("cancelled");
            return false;
              }
          }
          function backhome(){
              document.location.href="index.php";
          }
        </script>
        
