 <?php
 include "dbaseConn.php";
 //description
 $samplechoice=$_POST["samplechoice"];
 $image=$_FILES["uploadfile"];
 $info=getimagesize($image["tmp_name"]);
 //image- uploadfile
//table Samples
//ID, Description, Picture, filename
// If file upload form is submitted 
?>
<script>
//alert ("nakaloob naman");
</script>
<?php
if(isset($_POST["samplechoice"])){ 
  if (!$info){
      die("file is not an image");
  }
  $name=$image["name"];
  $type=$image["type"];
  $blob=addslashes(file_get_contents($image["tmp_name"]));
  $insertimage="insert into Samples(Description, Picture, filename) values ('".$samplechoice."','".$blob."','".$name."')";
  if ($conn->query($insertimage)===TRUE){
  // header('Location: ' . $_SERVER["HTTP_REFERER"] );
 ?>
 <script>
 window.history.back(-1);
 </script>
<?php
  exit;
  }else{
   echo "error".$insertimage."<br>".
   $conn->error;
  }

$conn->close();
}
?>