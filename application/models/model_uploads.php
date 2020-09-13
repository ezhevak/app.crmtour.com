<?php


class Model_Uploads extends Model
{
	function __construct() {
		$this->ModelClass = "Uploads";
	}

	public function get_row($ModelType,$ModelId){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("ModelType",$ModelType);
		$db->where("ModelId", $ModelId);
		//$cols = array ("Id", "Name","Description", "Status","DocUrl","UserId");
		$data = $db->get("Uploads", null, "*");
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	public function getListJson($ModelType,$ModelId){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("ModelType",$ModelType);
		$db->where("ModelId", $ModelId);
		
		$json = $db->JsonBuilder()->get("Uploads", null, "*");
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	
	
	
	
	public function get_rowById($Id){
		
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Id", $Id);
		$db->where("ModelType","dealDocument");
		//$cols = array ("Id", "Name","Description", "Status","DocUrl","UserId");
		$data = $db->get("Uploads", null, "*");
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
		
	}

	public function add($data){
		
		$Id = $data["Id"];
		$ModelType = $data["ModelType"];
		$ModelId  = $data["ModelId"];
		$File = $data["File"];
		$Comments = $data["Comments"];
		
		$FileTmpName = $File["tmp_name"];
		$FileName = mb_substr($File["name"],-255);
		$FileType = $File["type"];
		$FileSize = $File["size"];
		
		$UploadDir = "uploads/";
		$AccDir = $UploadDir . $_SESSION['AccId'] . "/";
		$ModelTypeDir = $AccDir . $ModelType . "/";	//тип сущности contact, legal, deal, leads
		$ModelIdDir = $ModelTypeDir . $ModelId . "/";		//id записи сущности contact, legal, deal, leads
		
		//Проверяем есть папка или нет, если нет, создаём новую папку.
		//Для каждой вложеной папки нужна дополнительная проверка.
		if(!is_dir($UploadDir)) mkdir($UploadDir);
		if(!is_dir($AccDir)) mkdir($AccDir);
		if(!is_dir($ModelTypeDir)) mkdir($ModelTypeDir);
		if(!is_dir($ModelIdDir)) mkdir($ModelIdDir);
		
		//Получаем полную ссылку на файл.
		$FilePath = $ModelIdDir . $FileName;
		
		//$data["FileTmpName"] = $FileTmpName;
		//$data["FilePath"] = $FilePath;
		
		if(move_uploaded_file($FileTmpName, $FilePath)) {
			
			//если нет Id записи создаём новую.
			if($Id==""){
				$this->SQL_insert = "INSERT INTO `Uploads`(`AccId`,`ModelType`,`ModelId`,`FileName`,`FileType`,`FileSize`,`FilePath`,`Comments`)
									VALUES (?,?,?,?,?,?,?,?)";
				$this->SQL_insert_params_types = array('s','s','s','s','s','s','s','s');
				$this->SQL_insert_params = array($_SESSION['AccId'],$ModelType,$ModelId,$FileName,$FileType,$FileSize,$FilePath,$Comments);
			} else {
				$this->SQL_update = "UPDATE `Uploads`
										set `ModelType` = ?,
											`ModelId` = ?,
											`FileName` = ?,
											`FileType` = ?,
											`FileSize` = ?,
											`FilePath` = ?,
											`Comments` = ?
										WHERE `AccId` = ? and `Id` = ?";
				$this->SQL_update_params_types = array('s','s','s','s','s','s','s','s','s');
				$this->SQL_update_params = array($ModelType,$ModelId,$FileName,$FileType,$FileSize,$FilePath,$Comments,$_SESSION['AccId'],$Id);
			}
			
			try {
				$data = null;
			
				$data = parent::add($Id);
				$data["UploadId"] = $data["rec_id"];
			} catch(Exception $e) {
				echo 'Выброшено исключение: '.$e->getMessage();
			}
		}
		return $data;
	}
	
	public function deleteAjax($ModelType,$ModelId){
		$this->SQL_select = "DELETE FROM `Uploads` WHERE AccId = ? and ModelType = ? and ModelId = ?";
		$this->SQL_params_types = array('s','s','s');
		$this->SQL_params = array($_SESSION['AccId'],$ModelType, $ModelId);
		
		$data = null;
		try {
			$data = parent::deleteAjax();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}
		return $data;
	}
	
	
	public function deleteByIdAjax($Id){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('Id', $Id);
		$db->where("ModelType","dealDocument");
		$db->delete('Uploads');
		
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