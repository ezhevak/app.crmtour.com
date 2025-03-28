<?php


class Model_Regions extends Model
{
	function __construct() {
		$this->ModelClass = "Regions";
	}
	
	public function get_row($RegionId)
	{
		$this->SQL_select = "SELECT * FROM  `vRegions_materialized` where AccId = ? and Id = ?";
		$this->SQL_params_types = array('s', 's');
		$this->SQL_params = array($_SESSION['AccId'], $RegionId);
		
		$data = null;
		try {
			$data = parent::get_row();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}
		return $data;
	}

	public function add($data)
	{
		
		$AccId = $_SESSION['AccId'];
		$Id = $data["Id"];
		/*$DirectionId = htmlspecialchars($data["DirectionId"]);
		$RegionName = htmlspecialchars($data["RegionName"]);
		$RegionRating =  htmlspecialchars($data["RegionRating"]);
		$Comments =  htmlspecialchars($data["Comments"]);*/
		$DirectionId = $data["DirectionId"];
		$RegionName = $data["RegionName"];
		$RegionRating =  $data["RegionRating"];
		$Comments =  $data["Comments"];
		
		
		//если нет Id записи создаём новую.
		
		if($Id==""){
			$this->SQL_insert = "INSERT INTO `dimRegion`(`AccId`,`DirectionId`,`RegionName`,`RegionRating`,`Comments`)
								VALUES (?,?,?,?,?)";
			$this->SQL_insert_params_types = array('s','s','s','s','s');
			$this->SQL_insert_params = array($AccId,$DirectionId,$RegionName,$RegionRating,$Comments);
			
		} else {
			$this->SQL_update = "UPDATE `dimRegion` 
									set `DirectionId` = ?,
										`RegionName` = ?,
										`RegionRating` = ?,
										`Comments` = ?
									WHERE `Id` = ?";
			$this->SQL_update_params_types = array('s','s','s','s','s');
			$this->SQL_update_params = array($DirectionId,$RegionName,$RegionRating,$Comments,$Id);
		}
		$data = null;
		try {
			$data = parent::add($Id);
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}
				
		return $data;
	}

	public function getListJson() {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		//$cols = array ("Id", "Name","Description", "Created");
		$db->where('AccId', $_SESSION['AccId']);
		$json = $db->JsonBuilder()->get("vRegions_materialized", null, "*");
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}

	public function deleteAjax($Id){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('Id', $Id);
		//header('Content-Type: application/json; charset=utf-8');
		$db->delete('dimRegion');
		
		if ($db->getLastErrno() === 0){
			$data["status"] ="success";
			$data["message"] ="Успешно удалена запись";
		} else {
			$data["status"] ="error";
			$data["message"] = $db->getLastError();
		}
		$db->disconnect();
		header('Content-Type: application/json; charset=utf-8');
		return json_encode($data);
	}
	
	public function addx($data){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$dataX = array ("AccId"        => $_SESSION['AccId'],
						"DirectionId"  => $data["DirectionId"],
						"RegionName"   => $data["RegionName"],
						"RegionRating" => $data["RegionRating"],
						"Comments"     => $data["Comments"]
						
		);
		if(!isset($data["Id"]) || $data["Id"]==""){
			$id = $db->insert ('dimRegion', $dataX);
			if($id){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
				$data["RegionId"] = $id;
				$data["RegionName"] = $data["RegionName"];
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
		} else {
			$db->where ('AccId',$_SESSION['AccId']);
			$db->where ('Id',$data["Id"]);
			if ($db->update ('dimRegion', $dataX)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
				$data["RegionId"] = $data["Id"];
				$data["RegionName"] = $data["RegionName"];
				
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
			}
		}
		$db->disconnect();
		return $data;
	}
}


?>