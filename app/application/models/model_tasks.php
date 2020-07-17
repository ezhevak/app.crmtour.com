<?php

class Model_tasks extends Model
{
	function __construct() {
		$this->ModelClass = "Task";
	}

	
	public function get_row($Id){
		
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Id", $Id);
		$cols = array ("Id", "Created","LastUpdate", "AccId","CreatorId","UserId",
					   "date_format(`Start`,'%d.%m.%Y %H:%i:%s') as Start",
					   "date_format(`End`, '%d.%m.%Y %H:%i:%s') as End",
					   "Title","Task","Done","ModelType","ModelId","SendEmail");
		$data = $db->get("Tasks", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	
	public function getTaskBy($Title,$ModelType,$ModelId){
		
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Title", $Title);
		$db->where("ModelType", $ModelType);
		$db->where("ModelId", $ModelId);
		$cols = array ("*");
		$data = $db->get("Tasks", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	

	public function getListJson($status) {
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("t.Id", "t.Created","t.LastUpdate", "t.CreatorId","t.UserId","t.Start", "t.End",
					   "t.Title", "t.Task","t.Done", "t.ModelType","t.ModelId","t.FirstUserId", "u.ManagerName");
		$db->join("vUsers u", "t.FirstUserId = u.Id and t.AccId = u.AccId", "");
		$db->where('t.AccId', $_SESSION['AccId']);
		if($status!=""){
			$db->where("t.Done", $status);
		}
		$json = $db->JsonBuilder()->get("vTasks t", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	
	public function getLinkedTasksJson($ModelType,$ModelId){
		
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("ModelType", $ModelType);
		$db->where("ModelId", $ModelId);
		$cols = array ("*");
		
		$data = $db->JsonBuilder()->get("Tasks", null, $cols);
		$db->disconnect();
		header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	public function deleteAjax($Id){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('Id', $Id);
		//header('Content-Type: application/json; charset=utf-8');
		$db->delete('Tasks');
		
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
	
	public function add($data){
			
		if($data["Start"] == ""){$data["Start"] = "00.00.0000 00:00";}
		if($data["End"] == ""){$data["End"] = "00.00.0000 00:00";}
		if($data["SendEmail"]=="on"){$data["SendEmail"] = "1";} else {$data["SendEmail"] = "0";}
		
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$dataX = array ("AccId" 	=> $_SESSION['AccId'],
		                "UserId"	=> $data["UserId"],     //1,152,15
						"CreatorId" => $_SESSION['UserId'], //1
		                "Start" => toFormat("d.m.Y H:i","Y-m-d H:i",$data["Start"]),
		                "End"	=> toFormat("d.m.Y H:i","Y-m-d H:i",$data["End"]),
		                "Title" => $data["Title"],
		                "Task"	=> $data["Task"],
		                "Done"	 => $data["Done"],
		                "ModelType" => $data["ModelType"],
		                "ModelId"	=> $data["ModelId"],
		                "SendEmail" => $data["SendEmail"]
		);
		
		if(!isset($data["Id"]) || $data["Id"]=="" || $data["Id"]=="0"){
			
			$id = $db->insert ('Tasks', $dataX);
			if($id){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
		} else {
			$db->where ('AccId',$_SESSION['AccId']);
			$db->where ('Id',$data["Id"]);
			if ($db->update ('Tasks', $dataX)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
			}
			    
		}
		$db->disconnect();
		return $data;
		
	}
	
	public function getTasks() {
		
			require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
			$mysqli = database::getInstance();
			$db = $mysqli->getConnection();
			
			$cols = array ("t.Id", "t.CreatorId", "t.UserId", "t.Start as start", "t.End as end","t.Title as title", "t.Task",
						   "t.Done", "case when Done = 1 then '#1ABB9C' when End < Now() then '#d04a3e' else u.TaskColor end as color","concat('/tasks/add?Id=',t.Id) as url");
			
			$db->join("vUsers u", "t.FirstUserId = u.Id and t.AccId = u.AccId", "");
			$db->where('t.AccId', $_SESSION['AccId']);
			if($_SESSION['UserRole'] != "admin"){
				$db->where("FIND_IN_SET(".$_SESSION['UserId'].",t.UserId)");
			}
			
			$json = $db->JsonBuilder()->get("vTasks t", null, $cols);
			$db->disconnect();
			
			header('Content-Type: application/json; charset=utf-8');
			return $json;
	}
	
	public function getTaskNotified() {
		$this->SQL_select = "select t.`Id`, t.`CreatorId`, t.`UserId`, t.`Start`, t.`End`, t.`Title`, t.`Task`, t.`Done`,CONCAT(DATE_FORMAT(`End`,'%d.%m '),TIME_FORMAT(`End`, '%H:%i') ) endtime,t.`ModelType`,t.`ModelId`,d.Name as ModelTypeName FROM `Tasks` t
		left join Dictionaries d on d.Type='TemplateModule' and d.LIC = t.ModelType and d.AccId=t.AccId
			where t.AccId = ? and FIND_IN_SET(?,t.UserId) and t.Done = 0 and CURDATE() between DATE(t.`start`) and DATE(t.`End`)  order by t.END asc";
		$this->SQL_params_types = array('s','s');
		$this->SQL_params = array($_SESSION['AccId'],$_SESSION['UserId']);
		
		$data = null;
		try {
			$data = parent::get_row();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}
		return $data;
	}
}

?>