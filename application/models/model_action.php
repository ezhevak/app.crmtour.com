<?php


class Model_Action extends Model
{
	function __construct() {
		$this->ModelClass = "Action";
	}

	public function get_row($Id){
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
        $db->join("vUsers_materialized u", "a.UserId = u.Id", "");
        //$db->join("vUsers u", "a.UserId = u.Id", "LEFT");
        $db->where("a.AccId", $_SESSION['AccId']);
		$db->where("a.Id", $Id);
		$cols = array ("a.Id", "a.AccId","a.ModelType", "a.ModelId","a.Type","a.Address","a.Text","a.Status","a.UserId","u.ManagerName","a.Created","a.LastUpdated");
		$data = $db->get("Actions as a", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	public function add($data){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$dataX = array ("AccId" 	=> $_SESSION['AccId'],
		                "ModelType" => $data["ModelType"],
		                "ModelId"	=> $data["ModelId"],
		                "Type"		=> $data["Type"],
		                "Address"	=> $data["Address"],
		                "Text"		=> $data["Text"],
		                "Status"	=> $data["Status"],
		                "UserId"	=> $data["UserId"]
		);
		
		if(!isset($data["Id"]) || $data["Id"]==""){
			$id = $db->insert ('Actions', $dataX);
			if($id){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
				$data["ActionId"] = $id;
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
		} else {
			$db->where ('AccId',$_SESSION['AccId']);
			$db->where ('Id',$data["Id"]);
			if ($db->update ('Actions', $dataX)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
				$data["ActionId"] = $data["Id"];
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