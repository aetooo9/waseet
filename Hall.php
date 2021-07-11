<?php

require_once "conn.php";

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
	<link rel='shortcut icon' type='image/x-icon' href='img/logo.jpg' />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
	<link href="css/w3.css" rel="stylesheet" />
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/font-awesome.css" rel="stylesheet" />
	<script src="js/jquery-1.12.4.js"></script>
</head>


<body>

<div class="header col-3 col-s-3">
<div class="tab">
<?php require_once "social-icons.php"; ?>
<div class="container">

 <div class="logo">
<a href="http://waseet.etooplay.com"><img src="img/logo.jpg" class="img-fluid" alt="شعار وسيط للخدمات التجارية والترفيهية"/></a>
</div> 
<div class="se2">


<form method="get" action="Search.php">
 <table class="table-responsive" style="float:right;">
				   <tr>
						<td >
						 <input   class="input" name="q" type="text" size="70"   required />
						</td>
						<td >
						<input type="submit"  class="btn-search" value="بحث">
						</td>
					</tr>
					<?php require_once "categories.php"; ?>
					
</table> 
</form>
<!--
<div class="row">
<div class="adv_top">
<img src="img/ad_space2.png"  class="img-responsive mySlides w3-animate-fading"  />
<img src="img/ad_space3.png"  class="img-responsive mySlides w3-animate-fading"  />
<img src="img/ad_space4.png"  class="img-responsive mySlides w3-animate-fading"  />
</div>
</div>
-->
</div> 

    
</div>  
</div>
</div>
<div class="se">


<div class="container">

<div class="row">
<div class="Result">

<?php

$EntName=$_GET['EntName'];

if(!empty($EntName)){
	$where="where e.`EntName`=?";
}else{
	exit;
}

                             $q="SELECT e.`EntId`,e.`EntName`,e.`EntDesc`,e.`CatId`,c.`CatName` FROM `entities` e 
                                 inner join categories c on c.`CatId`= e.`CatId` $where";
							 $r = $conn->prepare($q);
							 $r->bind_param("s",$EntName);
							 $r->execute();
							 $resalt = $r->get_result();
							 $i=0;
							 
							 while($row = $resalt->fetch_assoc()){
							 $EntId=$row['EntId'];

?>
<div class="card">
<h4><a href="#"><b><?php echo $row['EntName']; ?> </b> - <?php echo $row['CatName']; ?></a></h4>
<p>
<?php echo $row['EntDesc']; ?>
</p>
<div class="services">
<?php
						     $qIn="SELECT * FROM `ent_units` WHERE EntId=?";
							 $rIn = $conn->prepare($qIn);
							 $rIn->bind_param("i",$row['EntId']);
							 $rIn->execute();
							 $resalt2 = $rIn->get_result();
							 $i=0;
							 while($rowIn = $resalt2->fetch_assoc()){
								 ?>
        <i class="<?php echo $rowIn['faCode']; ?>"><p class="rotate"><?php echo $rowIn['EntUnName']; ?></p></i>
		<?php
							 }
		?>
</div>

</div>
<div class="phones"> 
<table class="table">
<tr>
<td >ارقام التواصل</td>
<td >
<?php
							$qPhones="SELECT * FROM `ent_phones` WHERE EntId=?";
							 $rPhones = $conn->prepare($qPhones);
							 $rPhones->bind_param("i",$row['EntId']);
							 $rPhones->execute();
							 $resalt3 = $rPhones->get_result();
							 $i=0;
							 while($rowPhones = $resalt3->fetch_assoc()){
								 echo " / ".@$rowPhones[Phone];
							 }
?>
</td>
</tr>
</table>
  </div>
  
<div class="grid"> 
<?php
							$qImages="SELECT i.*,e.EntName FROM `ent_images` i
							inner join entities e on e.EntId=i.EntId
							WHERE i.EntId=?";
							 $rImages = $conn->prepare($qImages);
							 $rImages->bind_param("i",$row['EntId']);
							 $rImages->execute();
							 $resalt4 = $rImages->get_result();
							 $i=0;
							 while($rowImages = $resalt4->fetch_assoc()){
                             echo "<a href='$rowImages[Path]'><img src='$rowImages[Path]' class='img-responsive'       alt='وسيط - $rowImages[EntName]' title='وسيط - $rowImages[EntName]'></a>";
							 }
?>
  </div>
  
<div class="detect">
<table class="table">
<tr>
<td ><input type="submit" name="" class="btn " value="تحري اليوم">
</tr>
</table>
</div>

<?php
							 }
?>


</div>

<!--
<div class="adv_left">
<img src="img/ad_space.png"  class="img-responsive" />
</div>
-->
</div>

</div>

</div>

		  
					
			




</body>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 9000);    
}
</script>



</html>