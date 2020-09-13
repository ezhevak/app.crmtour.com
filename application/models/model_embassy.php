<?php


class Model_Embassy extends Model
{
	function __construct() {
		$this->ModelClass = "Embassy";
	}
	
	public function get_row($EmbassyId)
	{
		$this->SQL_select = "SELECT * FROM  `vEmbassy` where AccId = ? and Id = ?";
		$this->SQL_params_types = array('s', 's');
		$this->SQL_params = array($_SESSION['AccId'], $EmbassyId);
		
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

	/*	$conn = new mysqli(
						$GLOBALS['DB_HOST'],
						$GLOBALS['DB_USER'],
						$GLOBALS['DB_PASSWORD'],
						$GLOBALS['DB_NAME']);
		$conn->	set_charset("utf8");
		*/
		
		$AccId = $_SESSION['AccId'];
		$Id = $data["Id"];
		/*$DirectionId = htmlspecialchars($data["DirectionId"]);
		$EmbassyPhone = htmlspecialchars($data["EmbassyPhone"]);
		$EmbassyEmail = htmlspecialchars($data["EmbassyEmail"]);
		$EmbassyWebSite = htmlspecialchars($data["EmbassyWebSite"]);
		$EmbassyAddress = htmlspecialchars($data["EmbassyAddress"]);
		$Comments =  htmlspecialchars($data["Comments"]);*/
		$DirectionId = $data["DirectionId"];
		$EmbassyPhone = $data["EmbassyPhone"];
		$EmbassyEmail = $data["EmbassyEmail"];
		$EmbassyWebSite = $data["EmbassyWebSite"];
		$EmbassyAddress = $data["EmbassyAddress"];
		$Comments =  $data["Comments"];
		
		

		//если нет Id записи создаём новую.
		
		if($Id==""){
			$this->SQL_insert = "INSERT INTO `Embassy`(`AccId`,`DirectionId`,`EmbassyPhone`,`EmbassyEmail`,`EmbassyWebSite`,`EmbassyAddress`,`Comments`)
								VALUES (?,?,?,?,?,?,?)";
			$this->SQL_insert_params_types = array('s','s','s','s','s','s','s');
			$this->SQL_insert_params = array($AccId,$DirectionId,$EmbassyPhone,$EmbassyEmail,$EmbassyWebSite,$EmbassyAddress,$Comments);
			
		} else {
			$this->SQL_update = "UPDATE `Embassy` 
									set `DirectionId` = ?,
										`EmbassyPhone` = ?,
										`EmbassyEmail` = ?,
										`EmbassyWebSite` = ?,
										`EmbassyAddress` = ?,
										`Comments` = ?
									WHERE `Id` = ?";
			$this->SQL_update_params_types = array('s','s','s','s','s','s','s');
			$this->SQL_update_params = array($DirectionId,$EmbassyPhone,$EmbassyEmail,$EmbassyWebSite,$EmbassyAddress,$Comments,$Id);
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
        
		//$cols = array ("Id", "HotelName","DirectionName", "RegionName", "HotelStarsName", "HotelBeachName","HotelRatingName","ScanExists");
		$db->where('AccId', $_SESSION['AccId']);
		$json = $db->JsonBuilder()->get("vEmbassy", null, "*");
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
		$db->delete('Embassy');
		
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
}
?>