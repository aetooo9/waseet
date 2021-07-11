<?php
session_start();

require_once "conn.php";

require "chkPermission.php";

$PageId=4;

error_reporting(E_ALL ^ E_NOTICE); 

              if(!empty($_GET['UserId'])){
				  $q="select * from `users` where UserId=".$_GET['UserId'];
				$r=@mysql_query($q);
				  $UserRow=@mysql_fetch_assoc($r);
			  }
			  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>نظام العربات</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="left" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>نظام العربات</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a  data-placement="left" data-original-title="Toggle Navigation" class="dropdown-toggle" href="lockup.php">
                            <i class="fa fa-cogs"></i>
                        </a>
                    </li>
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-left top-menu">
                    <li><a class="logout" href="logout.php">تسجيل خروج</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <?php
				  require 'menu.php';
				?>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  <h2><b>إضافة مستخدم</b></h2>
				  <form  action="users.php" method="post">
				  <input type="hidden" name="UserId" value="<?php echo $UserRow['UserId']; ?>">
                  <table class="table table-bordered">
				  <tr>
				  <td><b>إسم المستخدم</b></td>
				  <td><input type="text" name="UserName" class="form-control" placeholder="إسم المستخدم" value="<?php echo $UserRow['UserName']; ?>" autofocus></td>
				  </tr>
				   <tr>
				  <td><b>إسم الدخول</b></td>
				  <td><input type="text" name="LoginName" class="form-control" placeholder="إسم الدخول" value="<?php echo $UserRow['LoginName']; ?>" ></td>
				  </tr>
				  <tr>
				  <td><b>كلمة المرور</b></td>
				  <td><input type="password" name="Password" class="form-control" placeholder="كلمة المرور" value="<?php echo $UserRow['Password']; ?>" ></td>
				  </tr>
				  <tr>
				   <td><b>القسم</b></td>
				  <td>
				  <select name="InsId">
				  <option>--اختار--</option>
				  <?php
				  $q="SELECT * FROM `institutions`";
				  $r=mysql_query($q);
				  while($row=mysql_fetch_assoc($r)){
				  ?>
				   <option value="<?php echo $row['InsId']; ?>" <?php if($UserRow['InsId']==$row['InsId']) echo "selected"; ?>><?php echo $row['InstitutionName']; ?></option>
				  <?php
				  }
				  ?>
				  </select>
				  </td>
				   </tr>
				   <tr>
				   <td><b>المجموعة</b></td>
				  <td>
				  <select name="GId">
				  <option>--اختار--</option>
				  <?php
				  $q="SELECT * FROM `groups`";
				  $r=mysql_query($q);
				  while($row=mysql_fetch_assoc($r)){
				  ?>
				   <option value="<?php echo $row['GId']; ?>" <?php if($UserRow['GId']==$row['GId']) echo "selected"; ?>><?php echo $row['GroupName']; ?></option>
				  <?php
				  }
				  ?>
				  </select>
				  </td>
				   </tr>
				  <td colspan="2">
				  <?php
				   if(!empty($_GET['UserId'])){
				  ?>
				  <input  class="btn btn-theme"  type="submit" name="upd" value="تعديل">
				  <input  class="btn btn-theme"  type="submit" name="del" value="حذف">
				  <?php
				   }
				   else{
				  ?>
				  <input  class="btn btn-theme"  type="submit" name="save" value="حفظ">
				  <?php
				   }
				  ?>
				  <?php
				  if(isset($_POST['save'])){
					 $UserName=$_POST['UserName'];
					 $LoginName=$_POST['LoginName'];
					 $Password=$_POST['Password'];
					 $InsId=$_POST['InsId'];
					 $GId=$_POST['GId'];
					 
					  $q="INSERT INTO `users` (`UserName`, `LoginName`, `Password`, `InsId`, `GId`) VALUES ('$UserName', '$LoginName', '$Password', '$InsId', '$GId')";
					 $r=@mysql_query($q);
					 if($r){
						 echo "<b><font color=green>تم حفظ المستخدم</font></b>";
					 }
					 else{
						 echo "<b><font color=red>لم يتم حفظ المستخدم</font></b>";
					 }
				  }
				  
				
				  
				  if(isset($_POST['upd'])){
					 $UserId=$_POST['UserId'];
					 $UserName=$_POST['UserName'];
					 $LoginName=$_POST['LoginName'];
					 $Password=$_POST['Password'];
					 $InsId=$_POST['InsId'];
					 $GId=$_POST['GId'];
					 
					  $q="update users set UserName='$UserName',LoginName='$LoginName',Password='$Password',InsId='$InsId',GId='$GId' where UserId=$UserId";
					 $r=@mysql_query($q);
					 if($r){
						 echo "<b><font color=green>تم تعديل المستخدم</font></b>";
					 }
					 else{
						 echo "<b><font color=red>لم يتم تعديل المستخدم</font></b>";
					 }
				  }
				  
				     if(isset($_POST['del'])){
					   $UserId=$_POST['UserId'];
					 
					  $q="delete from users where UserId=$UserId";
					 $r=@mysql_query($q);
					 if($r){
						 echo "<b><font color=green>تم حذف المستخدم</font></b>";
					 }
					 else{
						 echo "<b><font color=red>لم يتم حذف المستخدم</font></b>";
					 }
				  }
				  
				  ?>
				  
				  </td>
				  </tr>
				  
				  </table>
				  </form>
                  <table class="table table-bordered">
				  <tr>
				  <td>#</td>
				  <td>إسم المستخدم</td>
				  <td>اسم الدخول</td>
				  <td>القسم</td>
				  <td>المجموعة</td>
				  <td>تعديل</td>
				  </tr>
				  <?php
				  $q="select * from `users`
				      join groups on groups.GId=users.GId
					  join institutions on institutions.InsId=users.InsId";
					 $r=@mysql_query($q);
					 $i=0;
				  while($row=@mysql_fetch_assoc($r)){
				  ?>
				  <tr>
				  <td><?php echo ++$i; ?></td>
				  <td><?php echo $row['UserName']; ?></td>
				  <td><?php echo $row['LoginName']; ?></td>
				  <td><?php echo $row['InstitutionName']; ?></td>
				  <td><?php echo $row['GroupName']; ?></td>
				  <td><a href="users.php?UserId=<?php echo $row['UserId']; ?>" >تعديل</a></td>
				  </tr>
				  <?php
				  }
				  ?>
				  </table>
                      
                      
                    
                    				
		
					
					
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <?php
				  require 'ReportMenu.php';
				  ?>
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              جميع الحقوق محفوظة
              <a href="users.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	

	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
