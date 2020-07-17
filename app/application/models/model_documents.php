<?php


class Model_Documents extends Model
{
	function __construct() {
		$this->ModelClass = "Document";
	}
	
	public function get_row($Id){
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("d.AccId", $_SESSION['AccId']);
		$db->where("d.Id", $Id);
		//$db->join("Documents as u", "l.AccId = u.AccId and l.UserId = u.Id", "left");
		$cols = array ("*");
		$data = $db->get("vDocuments d", null, $cols);
		
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	//Используется в modul_deals при печати документов для участников сделки
	public function get_ContactDocuments($ContactId){
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("d.AccId", $_SESSION['AccId']);
		$db->where("d.ContactId", $ContactId);
		$db->where("d.DocType", 'intPass');
		$db->where("d.LastAdd", '1');
		//$db->join("Documents as u", "l.AccId = u.AccId and l.UserId = u.Id", "left");
		$cols = array ("*");
		$data = $db->get("vDocuments d", null, $cols);
		
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	public function deleteAjax($DocId){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('Id', $DocId);
		//header('Content-Type: application/json; charset=utf-8');
		$db->delete('Documents');
		
		if ($db->getLastErrno() === 0){
			$data["status"] ="success";
			$data["message"] ="Успешно удалена запись";
		} else {
			$data["status"] ="error";
			$data["message"] = $db->getLastError();
		}
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	
	//Новая функция. 28.02.2020 На данный момент не подключена к контролеру.
	public function add($data){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
        
		//Если заполнены паспортные данные, создаем новую запись и связываем её с клиентом.
		if($data["passBiometric"]  =="on"){$data["passBiometric"] ="1";} else {$data["passBiometric"] ="0";}
		if($data["LastAdd"]  =="on"){$data["LastAdd"] ="1";} else {$data["LastAdd"] ="0";}
		
		if($data["passIssuedDate"] == ""){$data["passIssuedDate"] = "00.00.0000";}
		if($data["passValidDate"]  == ""){$data["passValidDate"] = "00.00.0000";}
		
		$dataX = array (
			"AccId" 	    => $_SESSION['AccId'],
			"ContactId" 	=> $data["ContactId"],
			"DocType"   	=> $data["DocType"], //"intPass" прилетает из формы участника поездки и другие типы при создании из клиента
			"FirstName" 	=> mb_strtoupper($data["passGivenNames"]),
			"LastName"  	=> mb_strtoupper($data["passSurName"]),
			"SeriaNum"  	=> mb_strtoupper($data["passSerNum"]),
			"IssuedDate"	=> toFormat("d.m.Y","Y-m-d",$data["passIssuedDate"]),
			"Valid"     	=> toFormat("d.m.Y","Y-m-d",$data["passValidDate"]),
			"IssuedBy"  	=> $data["passIssued"],
			"Biometric" 	=> $data["passBiometric"],
			"RecordNo"		=> $data["RecordNo"],
			"Comments" 		=> $data["Comments"],
			"LastAdd"		=> $data["LastAdd"]
		);
		
		//Перед добавлением данных в таблицу обновляем все даты последнего добавления.
		//Для новой добавленной записи документа LastAdd=1 будет проставлена автоматом на уровне таблицы
		if($data["LastAdd"] =="1"){
			$dataXX = array (
				"LastAdd" => "0"
			);
					
			$db->where ('AccId', $_SESSION['AccId']);
			$db->where ('ContactId', $data["ContactId"]);
			$db->where ('DocType', $data["DocType"]);
			$db->update ('Documents', $dataXX);
			
		}
		
		//Если у записи нет Id делаем Insert иначе Update 
		if(!isset($data["Id"]) || $data["Id"]==""){
			
			$id = $db->insert ('Documents', $dataX);
			if($id){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
			   	$data["Id"]  = $id;
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
		} else {
			$db->where ('AccId',$_SESSION['AccId']);
			$db->where ('Id',$data["Id"]);
			if ($db->update ('Documents', $dataX)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
			}
		}
		
		//$data["111"] = $data["File"]["size"];
		if($data["File"]["size"] >0 && $data["Id"] >0){
			
			$file["ModelType"] = "documents";
			$file["ModelId"]   = $data["Id"];
			$file["Comments"]  = "";
			$file["File"]      = $data["File"];
			
			include_once "application/models/model_uploads.php";
			$upload = new Model_Uploads();	
			
			//Если вдруг решили заменить на более новый файл, старый нужно удалить.
			//Начало удаления
			$delFile = $upload->get_row($file["ModelType"],$file["ModelId"]);
			//если файл есть удаляем его
			if (file_exists($delFile[0]["FilePath"])) {
				unlink($delFile[0]["FilePath"]);
			}
			$del = $upload->deleteAjax($file["ModelType"],$file["ModelId"]);
			//Конец удаления
			
			//после удалению загружаем новый файл в базу и на файловую систему
			$uploaddata = $upload->add($file);
			//$data["11"] = $uploaddata;
		}
		
		
		
        
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
}
?>