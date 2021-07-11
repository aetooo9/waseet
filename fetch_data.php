<?php


include_once 'conn.php';

$Keyword=filter_input(INPUT_POST, 'Keyword', FILTER_SANITIZE_SPECIAL_CHARS);

$Input="%".$Keyword."%";
$Input2="'%".$Keyword."%'";

if(!empty($Keyword)){
	$where="where e.EntName like ?";
}else{
	exit;
}


?>

<div class="Result">


<?php
       $no_of_records_per_page = 10;
	   
	   
  if (isset($_POST['pageno'])) {
	   if($_POST['pageno']==0){
            $pageno = 1;
	   }else{
		    $pageno = $_POST['pageno'];
	   }
        } else {
            $pageno = 1;
        }
        
        $offset = ($pageno-1) * $no_of_records_per_page;

     

        $total_pages_sql = "SELECT COUNT(*) as num FROM `entities` e $where";
        $result = $conn->prepare($total_pages_sql);
		//$result->error;
		$result->bind_param("s",$Input);
		$result->execute();
		$result->bind_result($total_rows);
        $result->fetch();
		$result->close();
		if($total_rows<>0){
        $total_pages = ceil($total_rows / $no_of_records_per_page);

         $sql = "SELECT e.EntId,e.EntName,e.EntDesc,e.CatId,c.CatName FROM `entities` e inner join categories c on c.CatId= e.CatId $where LIMIT $offset, $no_of_records_per_page";
        $res_data = $conn->prepare($sql);
		$res_data->bind_param("s",$Input);
		$res_data->execute();
		$r = $res_data->get_result();
		 $i=0;
        while($row = $r->fetch_assoc()){
					$EntName=$row['EntName'];

?>
<div class="card">
<?php
switch($row['CatId']){
			case 1 : $path="Hall.php?EntName=$EntName";
			break;
			case 2 : $path="Hall.php?EntName=$EntName";
			break;
			case 3 : $path="Hall.php?EntName=$EntName";
			break;
			case 4 : $path="Hall.php?EntName=$EntName";
			break;
			
		}
?>
<h4><a href="<?php echo $path; ?>"><b><?php echo $row['EntName']; ?> </b> - <?php echo $row['CatName']; ?></a></h4>
<p>
<?php echo $row['EntDesc']; ?>
</p>
<div class="services">
<?php
						     $qIn="SELECT * FROM `ent_units` WHERE EntId=?";
							 $rIn = $conn->prepare($qIn);
							 $rIn->bind_param("i",$row['EntId']);
							 $rIn->execute();
							 $rr = $rIn->get_result();
							 $i=0;
							 while($rowIn = $rr->fetch_assoc()){
								 ?>
        <i class="<?php echo $rowIn['faCode']; ?>"><p class="rotate"><?php echo $rowIn['EntUnName']; ?></p></i>
		<?php
							 }
							 $rIn->close();
		?>
</div>
<?php
		switch($row['CatId']){
			case 1 : echo "<a href='Hall.php?EntName=$EntName' class='Details'>تفاصيل</a>";
			break;
			case 2 : echo "<a href='Hall.php?EntName=$EntName' class='Details'>تفاصيل</a>";
			break;
			case 3 : echo "<a href='Hall.php?EntName=$EntName' class='Details'>تفاصيل</a>";
			break;
			case 4 : echo "<a href='Hall.php?EntName=$EntName' class='Details'>تفاصيل</a>";
			break;
			
		}

?>
</div>
<?php
		}
		 $res_data->close();
		
    ?>
    <ul class="pagination">
        <li><a href="?q=<?php echo $Keyword; ?>&pageno=1">الاولى</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?q=$Keyword&pageno=".($pageno - 1); } ?>">السابق</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?q=$Keyword&pageno=".($pageno + 1); } ?>">التالي</a>
        </li>
        <li><a href="?q=<?php echo $Keyword; ?>&pageno=<?php echo $total_pages;?>">الاخر</a></li>
    </ul>
	<?php
		}else{
			echo "<center>لا توجد نتائج بحث:<b>".$Keyword."</b></center>";
		}	
?>


</div>