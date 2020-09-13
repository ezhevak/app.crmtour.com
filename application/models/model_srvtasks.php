<?php

class Model_srvtasks extends Model
{
	function __construct() {
		$this->ModelClass = "SrvTask";
	}
	
	public function get_row($Id){
		
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Id", $Id);
		$cols = array ("Id", "AccId", "CreatorId", "Name","Comments","Status","Params","Start","End");
		$data = $db->get("SrvTasks", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	
	public function getListJson(){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		$db->join("vUsers u", "s.CreatorId = u.Id", "LEFT");
		$db->join("Account a", "s.AccId = a.Id", "LEFT");
		$cols = array("s.Id","s.AccId", "s.CreatorId", "s.Start", "s.End", "s.Name","s.Comments", "s.Status", "s.Params", "u.ManagerName","a.Name as AccountName");
		//$db->where("s.AccId", $_SESSION["AccId"]);
		$json = $db->JsonBuilder()->get("SrvTasks s", null, $cols);
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
		$db->delete('SrvTasks');
		
		if ($db->getLastErrno() === 0){
			$data["status"] ="success";
			$data["message"] ="Успешно удалена запись";
		} else {
			$data["status"] ="error";
			$data["message"] = $db->getLastError();
		}
		$db->disconnect();
		
		return $data;
	}
	
	
	public function add($data){
		if($data["Start"] == ""){$data["Start"] = "00.00.0000";}
		if($data["End"] == ""){$data["End"] = "00.00.0000";}
		//toFormat('d.m.Y','Y-m-d',$data["LegalDealStart"]),
		if (!isset($data["Status"])){
			$data["Status"] = 'QUEUE';
		} else { 
			$data["Status"] = $data["Status"];
		}

		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$dataX = array ("AccId" 	 => $_SESSION['AccId'],
						"CreatorId"  => $_SESSION['UserId'],
		                "Start" 	 => $data["Start"],
		                "End"		 => $data["End"],
		                "Name"		 => $data["Name"],
		                "Comments"   => $data["Comments"],
		                "Params"	 => $data["Params"],
		                "Status"	 => $data["Status"]
		);
		if(!isset($data["Id"]) || $data["Id"]==""){
			$id = $db->insert ('SrvTasks', $dataX);
			if($id){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
				$data["TaskId"] = $id;
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
		} else {
			$db->where ('AccId',$_SESSION['AccId']);
			$db->where ('Id',$data["Id"]);
			if ($db->update ('SrvTasks', $dataX)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
				$data["TaskId"] = $data["Id"];
				
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