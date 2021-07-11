<?php

session_start();

require_once "conn.php";



         


?>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>إعادة إجراءات التخليص الجمركي إلكترونيا</title>
    <style>
	body{
		font-size:10px;
		width:750px;
		margin:0 auto;
	}
	table {
		border-collapse: collapse;
	}
	table td {
		border:1px solid black;
		font-size:12px;
		text-align:center;
	}
	</style>
  </head>
  <body>
  <center>
  
  
  
  <img src="assets/img/3.png">
<h2>تقرير الواردات</h2>
  <hr>
    <table width="100%" >
   <tr>
				  <td><b>#</b></td>
				  <td><b>نوع الوارد</b></td>
				  <td><b>الكمية</b></td>
				  <td><b>السعر</b></td>
				  <td><b>الوصف</b></td>
				  <td><b>اسم الوارد</b></td>
				  </tr>
				  <?php
				  $q="select * from `Imports`";
					 $r=@mysql_query($q);
					 $i=0;
				  while($row=@mysql_fetch_assoc($r)){
				  ?>
				  <tr>
				  <td><?php echo ++$i; ?></td>
				  <td><?php echo $row['ImportType']; ?></td>
				  <td><?php echo $row['Quantity']; ?></td>
				  <td><?php echo $row['price']; ?></td>
				  <td><?php echo $row['description']; ?></td>
				  <td><?php echo $row['ImportName']; ?></td>
				  </tr>
				  <?php
				  }
				  ?>
  </table>
  </center>

   </body>
   
   
   </html>