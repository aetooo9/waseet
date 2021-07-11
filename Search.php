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
<script type="text/javascript">
$(document).ready(function(){
   $("#Keyword").click(function (e) {
	   
	   var val1 = $('#Keyword').val();
	   var val2 = $('#pageno').val();
	   $("#Result").html('<img src="img/loader.gif" />');
	    $.post('fetch_data.php', {'Keyword':val1,'pageno':val2}, function(data) {
			$("div").animate({},"slow");
              $("#Result").html(data);
            });
   });
   $("#Keyword").ready(function (e) {
	   
	   var val1 = $('#Keyword').val();
	   var val2 = $('#pageno').val();
	   $("#Result").html('<img src="img/loader.gif" />');
	    $.post('fetch_data.php', {'Keyword':val1,'pageno':val2}, function(data) {
			$("div").animate({},"slow");
              $("#Result").html(data);
            });
   });
   }); 
</script>

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
						 <input   class="input" name="q" id="Keyword" type="text" size="70"  value="<?php echo filter_input(INPUT_GET, 'q', FILTER_SANITIZE_SPECIAL_CHARS); ?>"  required />
						 <input type="hidden"  id="pageno" name="pageno" value="<?php echo filter_input(INPUT_GET, 'pageno', FILTER_SANITIZE_SPECIAL_CHARS); ?>" />
						</td>
						<td >
						<input type="submit"  class="btn-search" id="search" value="بحث">
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
<div id="Result" ></div>
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