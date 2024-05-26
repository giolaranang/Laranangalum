<?php
include "dbaseConn.php";
?>


<form class="menu" action="innersamplecomp.php" method="post" enctype="multipart/form-data">
    <select name="samplechoice" class="form-control form-control-lg">
     <option value="pocket">Pocket Type</option> 
     <option value="shower">Shower Enclosure</option>
    </select>
    <input type="file" name="uploadfile" accept="image/*"></input>
    <button type="submit" class="btn btn-outline-secondary" >Save Image</button>
</form>

 <?php

      $countquery="Select count(Picture) as counted from Samples";
      $countdata= $conn->query($countquery);
      $finalcount=$countdata->fetch_assoc();
      $totalcount=$finalcount['counted'];

      $viewSample = "select * from Samples"; 
      $resultSample = $conn->query($viewSample);
    if($resultSample->num_rows > 0){
     $firstrow=$resultSample->fetch_assoc();
     $firstrowid=$firstrow['ID'];
     ?>
    <form method="POST" class="" action="deleteimage.php">
     <div class="slideshowmain slideshow">
<?php
      while($row = $resultSample->fetch_assoc()){
      $otherowid=$row['ID'];
      ?> 
            <div class="item"> 
            <img alt="Los Angeles" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Picture']); ?>"/>
            <div class="carousel-caption">
                
            <input type="hidden" name="deletedimages" value="<?php echo $otherowid;?>"/>
             </div>
            </div>
    </form>
      <?php 
       } 
       ?>
    </div> 
    <?php
  }else{ 
    echo("<p class='status error'>Image(s) not found...</p>");
  } 
    ?>
    </div>
  </div>
?>


<script>
$('.slideshowmain').slick({
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
});
</script>
 
