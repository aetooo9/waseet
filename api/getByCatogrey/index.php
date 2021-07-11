
<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../conn.php';


$CatName="%".$_GET['p']."%";

if(!empty($CatName)){
$where="where c.CatName like ?";
}else{
$where="";
}
$sql = "SELECT e.EntId,e.EntName,e.EntDesc,e.CatId,c.CatName FROM `entities` e inner join categories c on c.CatId=e.CatId $where";
        $res_data = $conn->prepare($sql);
		$res_data->bind_param("s",$CatName);
		$res_data->execute();
		$r = $res_data->get_result();
		
		while($row = $r->fetch_assoc()){
		$Rslt[]=array('EntId'=>$row['EntId'],
		              'EntName'=>$row['EntName'],
					  'EntDesc'=>$row['EntDesc'],
					  'CatId'=>$row['CatId'],
					  'CatName'=>$row['CatName']);
		}
		
		echo json_encode($Rslt);
?>