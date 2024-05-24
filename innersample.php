<?php
include "dbaseConn.php";
?>
<center>
<form action="innersamplecomp.php" method="post" enctype="multipart/form-data">
    <select name="samplechoice" class="form-control form-control-lg">
     <option value="pocket">Pocket Type</option> 
     <option value="shower">Shower Enclosure</option>
    </select>
    <input type="file" name="uploadfile" accept="image/*"></input>
    <button type="submit" class="btn btn-outline-secondary" >Save Image</button>
<Button type="button" onclick="operations('back')"class="btn btn-outline-secondary">Back</button>
</form>
</center>
<br>
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <?php
      $countquery="Select count(Picture) as counted from Samples";
      $countdata= $conn->query($countquery);
      $finalcount=$countdata->fetch_assoc();
      $totalcount=$finalcount['counted'];
      
      for($count=2; $count<=$totalcount; $count++){
         ?> 
        <li data-target="#myCarousel" data-slide-to="<?php echo $count;?>">
        </li>
    
     <?php
      }
      ?>
 
    </ol>
    <?php
$viewSample = "select * from Samples"; 
$resultSample = $conn->query($viewSample);
  if($resultSample->num_rows > 0){
     $firstrow=$resultSample->fetch_assoc();
     $firstrowid=$firstrow['ID'];
     ?>
    <form method="POST" action="deleteimage.php">
     <div class="carousel-inner">
           <div class="item active"> 
             <img alt="Los Angeles" style="width:500px; height:400px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($firstrow['Picture']); ?>"/> 
             <div style="bottom:-20px;"class="carousel-caption">
             <input style="color:black;" type="submit" value="Delete"/>
             <input type="hidden" name="deletedimage" value="<?php echo $firstrowid;?>"/>
             </div>
     </div> 
<?php
    while($row = $resultSample->fetch_assoc()){
    $otherowid=$row['ID'];
    ?> 
            <div class="item"> 
            <img alt="Los Angeles" style="width:500px; height:400px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Picture']); ?>"/>
            <div style="bottom:-20px;" class="carousel-caption">
                <input style="color:black;" type="submit" value="Delete"/>
            <input type="hidden" name="deletedimages" value="<?php echo $otherowid;?>"/>
             </div>
            </div>
    </form>
<?php } 
}else{ ?> 
    <p class="status error">Image(s) not found...</p> 
  <?php } ?>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a><a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


 
