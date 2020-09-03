<?php


class Model_Address extends Model
{
	function __construct() {
		$this->ModelClass = "Address";
	}
	

	public function get_row($Id){
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
        $db->where("a.AccId", $_SESSION['AccId']);
		$db->where("a.Id", $Id);
		$cols = array ("*");
		$data = $db->get("vAddress as a", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	
	
	
	

	//public function add($data)
	//{

	//	$AccId = $_SESSION['AccId'];
	//	$ContactId = $data["ContactId"];
	//	$Id = $data["Id"];
	//	$Type = $data["Type"];
	//	$Address = $data["Address"];
	//	$Comments = $data["Comments"];
	//	$Active = "0";
	//	$Send = "0";
	//	$LastAdd = "0";
	//	/*if(htmlspecialchars($data["Active"])=="on"){$Active ="1";}
	//	if(htmlspecialchars($data["Send"])=="on"){$Send ="1";}*/
	//	if($data["Active"]=="on"){$Active ="1";}
	//	if($data["Send"]=="on"){$Send ="1";}
	//	if($data["LastAdd"]=="on"){$LastAdd ="1";}
	//	$UserId =  $data["UserId"];

	//	if($Id==""){
	//		$this->SQL_insert = "INSERT INTO `Address`(`AccId`,`ContactId`, `Type`, `Address`,`Comments`,`Active`,`Send`,`UserId`)
	//							VALUES (?,?,?,?,?,?,?,?)";
	//		$this->SQL_insert_params_types = array('s', 's', 's', 's', 's', 's', 's','s');
	//		$this->SQL_insert_params = array($AccId, $ContactId, $Type, $Address, $Comments, $Active, $Send, $UserId);
	//		
	//	} else {
	//		
	//		$this->SQL_update = "UPDATE `Address` 
	//								set `Type` = ?,
	//									`Address` = ?,
	//									`Comments` = ?,
	//									`Active` = ?,
	//									`Send` = ?,
	//									`UpdateUserId`=?,
	//									`LastAdd` = ?
	//								WHERE `Id` = ?";
	//		$this->SQL_update_params_types = array('s','s','s','s','s','s','s','s');
	//		$this->SQL_update_params = array($Type, $Address, $Comments, $Active, $Send, $UserId, $LastAdd, $Id);
	//	}
	//	$data = null;
	//	try {
	//	//Исправление производительности.
	//	//Перед добавлением данных в таблицу обновляем все LastAdd=0
	//	//Для новой добавленной записи документа LastAdd=1 будет проставлена автоматом на уровне таблицы.
	//	
	//			try {
	//				$conn = parent::getConnection();
	//				if (!$conn->connect_error) {
	//					
	//					$stmt = $conn->prepare("update Address 
	//											set LastAdd = 0
	//											where ContactId = ?
	//											  and Type = ?");
	//					$stmt->bind_param('ss', $ContactId, $Type);
	//					$stmt->execute();
	//				}
	//			} catch(Exception $e) {
	//				echo 'Выброшено исключение: '.$e->getMessage();
	//			}

	//		$data = parent::add($Id);
	//		
	//	
	//		
	//	} catch(Exception $e) {
	//		echo 'Выброшено исключение: '.$e->getMessage();
	//	}
	//			
	//	return $data;
	//}
	
	public function add($data){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		$db_upd = $mysqli->getConnection();
		$db_check = $mysqli->getConnection();
		
		//Проверяем наличие такой компании в системе
		$db_check->where('AccId', $_SESSION['AccId']);
		$db_check->where('ContactId', $data["ContactId"]);
		$db_check->where('Type', $data["Type"]);	//Исправление ошибки. Один и тот же номер нельзя было перекинуть между типами
		$db_check->where('Address', $data["Address"]);
		$dataCheck["AddressId"] = $db_check->getValue("Address", "Id");
		
		
		if($data["Active"]  =="on"){$data["Active"] ="1";} else {$data["Active"] ="0";}
		if($data["Send"]  =="on"){$data["Send"] ="1";} else {$data["Send"] ="0";}
		if($data["LastAdd"]  =="on"){$data["LastAdd"] ="1";} else {$data["LastAdd"] ="0";}
			
		
		if($dataCheck["AddressId"] == ""){
		
			//if($data["passIssuedDate"] == ""){$data["passIssuedDate"] = "00.00.0000";}
	
	
			$dataX = array ("AccId"		   => $_SESSION['AccId'],
							"Id"		   => $data["Id"],
							"ContactId"    => $data["ContactId"],
							//"LegalId"	=> $data["LegalId"],
							"Type"		   => $data["Type"],
							"Address"	   => $data["Address"],
							"Active" 	   => $data["Active"],
							"Send"		   => $data["Send"],
							"Comments"     => $data["Comments"],
							"UserId"	   => $_SESSION['UserId'],
							"UpdateUserId" => $_SESSION['UserId'],
							"LastAdd"	=> $data["LastAdd"]
							//"NextSync"  => $data["NextSync"]					
			);
			
			if($data["LastAdd"] =="1"){
				$dataUpd = array (
							"LastAdd"	=> "0"
				);
				
        		$db_upd->where("AccId", $_SESSION['AccId']);
				$db_upd->where("Type", $data["Type"]);
				$db_upd->where("ContactId", $data["ContactId"]);
	
				if ($db_upd->update ('Address', $dataUpd)){
					$dataUpd["status"] ="success";
					$dataUpd["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
					//$data["Id"] = $data["Id"];
					//$data["Address"] = $data["Address"];
				} else {
					$dataUpd["status"] ="error";
					$dataUpd["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
				}   
			}
			
	
			if(!isset($data["Id"]) || $data["Id"]==""){
				$id = $db->insert ('Address', $dataX);
				if($id){
					$data["status"] ="success";
					$data["message"] ="Запись успешно добавлена. Id='".$id."'";
					$data["Id"] = $id;
					$data["Address"] = $id;
				} else {
					$data["status"] ="error";
					$data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
				}
			} else {
				$db->where ('AccId',$_SESSION['AccId']);
				$db->where ('Id',$data["Id"]);
				if ($db->update ('Address', $dataX)){
					$data["status"] ="success";
					$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
					$data["Id"] = $data["Id"];
					$data["Address"] = $data["Address"];
				} else {
					$data["status"] ="error";
					$data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
				}   
			}
		} else {
			$dataX = array ("Active" 	   => $data["Active"],
							"Send"		   => $data["Send"],
							"Comments"     => $data["Comments"],
							"UpdateUserId" => $_SESSION['UserId'],
							"LastAdd"	   => $data["LastAdd"]					
			);
			
			$db->where ('AccId',$_SESSION['AccId']);
			$db->where ('Id',$data["Id"]);
			if ($db->update ('Address', $dataX)){
				$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
				$data["Id"] = $data["Id"];
				$data["Address"] = $data["Address"];
			} else {
				$data["status"] ="error";
				$data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
			}   
			
			
		}
		
		$db_upd->disconnect();
		$db->disconnect();
		$db_check->disconnect();
		
		return $data;
	}
	
	
	
	
	

}

?>