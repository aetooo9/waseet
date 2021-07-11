
<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../conn.php';


$sql = "SELECT e.EntId,e.EntName,e.EntDesc,e.CatId,c.CatName FROM `entities` e inner join categories c on c.CatId=e.CatId where e.CatId=5";
        $res_data = $conn->prepare($sql);
		$res_data->bind_param("s",$EntName);
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