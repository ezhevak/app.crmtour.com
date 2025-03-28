<?php

class Model_templates extends Model
{
	function __construct() {
		$this->ModelClass = "Template";
	}
	public function get_row($Id){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        //Выгружаем справочники из основной организации
        //$cols = array ("Type", "Name", "Lang", "LIC", "SubType", "OrderBy", "Active");
        $db->where('AccId', $_SESSION['AccId']);
        $db->where('Id', $Id);
        $data = $db->get("vTemplates_materialized",null,"*");
        
		$db->disconnect();
		
		return $data;
	}

	public function getListJson() {
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("Id", "ModulName","Name", "Active");
		$db->where('AccId', $_SESSION['AccId']);
		$json = $db->JsonBuilder()->get("vTemplates_materialized", null, $cols);
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
		$db->delete('Templates');
		
		if ($db->getLastErrno() === 0){
			$data["status"] ="success";
			$data["message"] ="Успешно удалена запись";
		} else {
			$data["status"] ="error";
			$data["message"] = $db->getLastError();
		}
		$db->disconnect();
		header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	public function add($data){
		$Active = "0";
		if($data["Active"]=="on"){$Active ="1";}
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$dataX = array ("AccId"		=> $_SESSION['AccId'],
						"Module"	=> $data["Module"],
		                "Name"		=> $data["Name"],
		                "Template"	=> $data["Template"],
		                "Active"	=> $Active
		);
		
		if(!isset($data["Id"]) || $data["Id"]==""){
			
			$id = $db->insert('Templates', $dataX);
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
			if ($db->update('Templates', $dataX)){
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
	
	//public function getModuleTemplate($ModuleClass, $TemplId) {
	public function getModuleTemplate($TemplId) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		
		$db->where ("AccId", $_SESSION['AccId']);
		$db->where ("Active", 1);
		$db->where ("Id",$TemplId);
		
		$data = $db->getValue("Templates", "Template");
		$db->disconnect();
		
		return $data;
	}
	
	public function getModuleTemplates($ModuleClass) {
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		
        $cols = array("Id as tmplId", "Name as tmplName");
        
		$db->where ("AccId", $_SESSION['AccId']);
		$db->where ("Module",$ModuleClass);
		$db->where ("Active", 1);
		
		$data = $db->get("Templates", null, $cols);
		$db->disconnect();
		return $data;
	}
}

?>