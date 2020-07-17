<?php


class Model_Airport extends Model
{
	function __construct() {
		$this->ModelClass = "Airport";
	}

	public function get_row($Id){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
        $cols = array ( "ap.Id",
						"ap.DirectionId",
						"dd.DirectionName as AirportCountry",
						"ap.AirportCode",
						"ap.AirportName",
						"ap.AirportCity",
						"ap.AirportPhone",
						"ap.AirportFax",
						"ap.AirportEmail",
						"ap.AirportSite",
						"case when ap.Id = 1 then '' else CONCAT(dd.DirectionName,', ',AirportCity,', ',AirportName,', (',AirportCode,')')  end AirportConcat");
        $db->join("dimDirection dd", "ap.DirectionId = dd.Id", "LEFT");
		$db->where("ap.Id", $Id);
        $data = $db->get("Airport ap",null,$cols);
		$db->disconnect();
		
		return $data;
	}
	
	public function add($data){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();

		$dataX = array ("Id"		   => $data["Id"],
						"DirectionId"  => $data["DirectionId"],
		                "AirportCode"  => $data["AirportCode"],
		                "AirportCity"  => $data["AirportCity"],
		                "AirportName"  => $data["AirportName"],
		                "AirportPhone" => $data["AirportPhone"],
		                "AirportFax"   => $data["AirportFax"],
		                "AirportEmail" => $data["AirportEmail"],
		                "AirportSite"  => $data["AirportSite"]
		);
		
		if(!isset($data["Id"]) || $data["Id"]==""){
			
			$id = $db->insert ('Airport', $dataX);
			if($id){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
				$data["AirportId"] = $id;
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
		} else {
			$db->where ('Id',$data["Id"]);
			if ($db->update ('Airport', $dataX)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
				$data["AirportId"] = $data["Id"];
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
			}
			    
		}
		$db->disconnect();
		return $data;
		
	}

	public function getListJson() {
  		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ( "ap.Id",
						"dd.DirectionName as AirportCountry",
						"ap.AirportCity",
						"ap.AirportCode",
						"ap.AirportName",
						"ap.AirportSite"
						);
        $db->join("dimDirection dd", "ap.DirectionId = dd.Id", "LEFT");
		
		$json = $db->JsonBuilder()->get("Airport ap", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	
	public function getArportsListItems($Search) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("ap.Id id", "concat(dd.DirectionName,', ',ap.AirportCity,', ',ap.AirportName,', (',ap.AirportCode,')') text");
		//$db->where('u.AccId', $_SESSION['AccId']);
		$db->where("(dd.DirectionName like ? or ap.AirportCity like ? or ap.AirportName like ? or ap.AirportCode like ?)", array('%'.$Search.'%','%'.$Search.'%','%'.$Search.'%','%'.$Search.'%'));
		$db->join("dimDirection as dd", "ap.DirectionId = dd.Id", "LEFT");
		//$db->where('c.Id', $ContactId, '!=');
		$db->orderBy('dd.DirectionName', 'asc');
		
		$json = $db->JsonBuilder()->get("Airport ap", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
}
?>