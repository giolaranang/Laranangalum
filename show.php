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
           //echo "may kaparehas na date";
           $date ="";
       }else{
           array_push($employees,$row["Date"]);
           $date = $row["Date"];
       }
        echo "<div class='texts'>".$date." ".$row ["Employee"]." ".$row["Price"]."<form action = 'deleteindiv.php' method='post'>
             <input name='Id' type='hidden' value=". $row["ID"].">
             <input onclick='return deleteindivalert()'class='btn btn-danger btn-sm' id='deleteID' type='submit' value='Delete'/>
             </form>
             <hr>
             </div>";
             
    }
}else{
   echo "0 results";
}

$conn->close();
//var_dump($employees);
?>
    </h1>
    <Button onclick="backhome()"class="btn btn-outline-secondary">Back</button>
        </div>
    </div >
   </body>
   
</html>
        <script>
          
          //function LoadOnce(){ 
            //  window.location.reload(); 
        //  }
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
        
