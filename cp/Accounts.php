<?php
session_start();

require_once "conn.php";


$PageId=3;

error_reporting(E_ALL ^ E_NOTICE); 

              if(!empty($_GET['AccountID'])){
				  $q="SELECT * FROM `accounts` where AccountID=".$_GET['AccountID'];
				$r=@mysql_query($q);
				  $GroupRow=@mysql_fetch_assoc($r);
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

   <title>إعادة إجراءات التخليص الجمركي إلكترونيا</title>

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
            <a href="index.html" class="logo"><b>إعادة إجراءات التخليص الجمركي إلكترونيا</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    
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
                  <h2><b>ادخال الحسابات</b></h2>
				  <form  action="Accounts.php" method="post">
				  <input type="hidden" name="AccountID" value="<?php echo $GroupRow['AccountID']; ?>">
                  <table class="table table-bordered">
				  <tr>
				  <td><b>رقم المورد</b></td>
				  <td><input type="text" name="SupplierID" class="form-control" placeholder="رقم المورد" value="<?php echo $GroupRow['SupplierID']; ?>" autofocus></td>
				  </tr>
				  <tr>
				  <td><b>رقم الوارد</b></td>
				  <td><input type="text" name="ImportID" class="form-control" placeholder="رقم الوارد" value="<?php echo $GroupRow['ImportID']; ?>" autofocus></td>
				  </tr>
				   <tr>
				  <td colspan="2">
				  <?php
				   if(!empty($_GET['AccountID'])){
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
					 $SupplierID=$_POST['SupplierID'];
					 $ImportID=$_POST['ImportID'];
					 
					  $q="INSERT INTO `Accounts` (`SupplierID`,`ImportID`) VALUES ('$SupplierID','$ImportID')";
					 $r=@mysql_query($q);
					 if($r){
						 echo "<b><font color=green>تم الحفظ</font></b>";
					 }
					 else{
						 echo "<b><font color=red>لم يتم الحفظ</font></b>";
					 }
				  }
				  
				
				  
				  if(isset($_POST['upd'])){
					 $AccountID=$_POST['AccountID'];
					 $SupplierID=$_POST['SupplierID'];
					 $ImportID=$_POST['ImportID'];
					 
					  $q="update Accounts set SupplierID='$SupplierID',ImportID='$ImportID' where AccountID=$AccountID";
					 $r=@mysql_query($q);
					 if($r){
						 echo "<b><font color=green>تم التعديل</font></b>";
					 }
					 else{
						 echo "<b><font color=red>لم يتم التعديل</font></b>";
					 }
				  }
				  
				     if(isset($_POST['del'])){
					   $AccountID=$_POST['AccountID'];
					 
					  $q="delete from Accounts where AccountID=$AccountID";
					 $r=@mysql_query($q);
					 if($r){
						 echo "<b><font color=green>تم الحذف</font></b>";
					 }
					 else{
						 echo "<b><font color=red>لم يتم حذف الحذف</font></b>";
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
				  <td>رقم المورد</td>
				  <td>رقم الوارد</td>
				  <td>تعديل</td>
				  </tr>
				  <?php
				  $q="select * from `Accounts`";
					 $r=@mysql_query($q);
					 $i=0;
				  while($row=@mysql_fetch_assoc($r)){
				  ?>
				  <tr>
				  <td><?php echo ++$i; ?></td>
				  <td><?php echo $row['SupplierID']; ?></td>
				  <td><?php echo $row['ImportID']; ?></td>
				  <td><a href="Accounts.php?AccountID=<?php echo $row['AccountID']; ?>" >تعديل</a></td>
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
