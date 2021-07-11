<?php

require_once "conn.php";

?>
<html>
<head>
<title>Waseet - وسيط</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
	<link rel="apple-touch-icon-precomposed" href="img/logo.jpg">
		<link rel="shortcut icon" href="img/logo.png" type="img/jpg">
		<link rel="icon" href="img/logo.png" type="img/jpg">	
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/font-awesome.css" rel="stylesheet" />
</head>



<body>

<div class="header col-3 col-s-3">
<?php require_once "social-icons.php"; ?>
<div class="container">
                            
</div>
</div>

<form method="get" action="Search.php">
<div class="se3">

<div class="container">
  <div class="row">
<div class="logoSearch">
<img src="img/logo.jpg" class="img-fluid" alt="شعار وسيط للخدمات التجارية والترفيهية"/>
</div>
</div>

 <div class="row">
                   <table align="center" class="table-responsive">
				   <tr>
						<td >
						 <input  class="input" type="text" name="q" size="70"  required title="ادخل كلمة بحث" />
						</td>
						<td >
						<input type="submit"  class="btn-search" value="بحث">
						</td>
					</tr>
					
					<?php require_once "categories.php"; ?>
					
				   </table>
	</div>			  
					
			
		   </div>
		   </div>

</form>
 <div class="footer-section">
                <div class="container">
                    <div class="row">
					    <div class="low">
							<a href="#">كيف يعمل وسيط</a>
							<a href="#">عن وسيط</a>
						</div>
						<div class="Owner">
							<a href="#">البنود والظروف</a>
							<a href="#">سياسات الموقع</a>
						</div>
					</div>
                </div>
            </div>
</body>




</html>