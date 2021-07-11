<?php
session_start();

require_once "../conn.php";


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

   <title>إعادة إجراءات التخليص الجمركي إلكترونيا</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
		<center>
			  <img class="img" src="assets/img/3.png" >
		</center>
		      <form class="form-login" action="index.php" method="post">
			  
		        <h2 class="form-login-heading">شاشة الدخول</h2>
		        <div class="login-wrap">
		            <input type="text" name="LoginName" class="form-control" placeholder="إسم المستخدم" autofocus>
		            <br>
		            <input type="password" name="Password" class="form-control" placeholder="كلمة المرور">
					<br>
		            <?php
			  
			  if(isset($_POST['login'])){
				 $LoginName=$_POST['LoginName'];
				 $Password=$_POST['Password'];
				 
				 $q="select count(*) as num,UserName,UserId from users where LoginName='$LoginName' and Password='$Password'";
				 $r=@mysql_query($q);
				 $row=mysql_fetch_assoc($r);
				 if($row['num']>0){
					 $_SESSION['status']=1;
					 $_SESSION['UserId']=$row['UserId'];
					 $_SESSION['UserName']=$row['UserName'];
					 echo "<script>location.href='Suppliers.php';</script>";
				 }
				 else{
					 echo "<font color=red>خطا في اسم الدخول او كلمة المرور</font>";
				 }
				  
			  }
			  
			  ?>
		            <input  class="btn btn-theme btn-block"  type="submit" name="login" value="تسجيل دخول">
		           
		
		        </div>
		
		      
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img1/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
