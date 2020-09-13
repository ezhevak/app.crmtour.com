<?php


class Model_Account extends Model
{
	function __construct() {
		$this->ModelClass = "Account";
	}

	public function get_row($AccId){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        //Выгружаем справочники из основной организации
        $cols = array ("Id", "Name", "OfficeMobile", "OfficeEmail", "DirectorName");
        $db->where('Id', $AccId);
        $data = $db->get("Account",null,$cols);
        
		$db->disconnect();
		
		return $data;
	}

	public function add($data){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();

		$dataX = Array ("Name" 			=> $data["AccountName"],
		                "OfficeMobile"	=> $data["OfficeMobile"],
		                "OfficeEmail" 	=> $data["OfficeEmail"],
		                "DirectorName" 	=> $data["DirectorName"]
		);
		//echo $data["Id"];
		if($data["Id"] !=""){
			$db->where ('Id',$data["Id"]);
			if ($db->update ('Account', $dataX)){
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
	
	public function getListSmsJson(){
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $cols = array("ac.Id", "ac.Created", "ac.Address", "ac.Text", "ac.Status", "cl.LastName", "cl.FirstName", "cl.MiddleName", "cl.Segment", "ds.Name as SegmentName");
		$db->join("Contacts cl", "cl.Id = ac.ModelId and cl.AccId = ac.AccId", "");
		$db->join("Dictionaries ds", "cl.AccId = ds.AccId and cl.Segment = ds.LIC and ds.Lang = 'ru_RU'", "left");
		$db->where("ac.AccId", $_SESSION["AccId"]);
		$db->where("ac.Type", "SMS");
		
		$json = $db->JsonBuilder()->get("Actions ac", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	public function sms_send($text, $segments) {
	
		try {
			
			$smsLogin = GetOption("SMS_Login",$_SESSION['AccId']);
			$smsPass = GetOption("SMS_Pass",$_SESSION['AccId']);
			$smsSenderName = GetOption("SMS_SenderName",$_SESSION['AccId']);
			
			if($smsLogin == ""){
				$data["status"] = "error";
				$data["message"]= "Не указан 'Логин' для подключения к SMS шлюзу!";
			} elseif ($smsPass == ""){
				$data["status"] = "error";
				$data["message"]= "Не указан 'Пароль' для подключения к SMS шлюзу!";
			} elseif ($smsSenderName == ""){
				$data["status"] = "error";
				$data["message"]= "Не указано 'Имя отправителя' для отправки SMS!";
			} else {
			 	require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
				$mysqli = database::getInstance();
			    
			    /////////////////список смс для рассылки
			    $db_type = $mysqli->getConnection();
			    $db_type->where("ad.AccId", $_SESSION['AccId']);
				$db_type->where("ad.Active", "1");
				$db_type->where("ad.Send", "1");
				$db_type->where("ad.Type", "PhoneMob");
				
				$db_type_cols = array("ad.Id","ad.ContactId","ad.Type","ad.AccId","ad.Address","ad.Comments", 
									  "case when ad.Send = 1 then 'subscribed' else 'unsubscribed' end Send",
									  "d.SubType","ad.UserId","cl.FirstName","cl.LastName","cl.Sex");
				
				$db_type->join("Dictionaries as d", "ad.AccId = d.AccId and d.Type ='AddressType' and ad.`Type` = d.LIC and d.SubType = 'Phone'", "");
				$db_type->join("Contacts as cl", "ad.AccId = cl.AccId and ad.ContactId =  cl.Id and cl.Segment in ($segments)", "");
				
				$db_type_data = $db_type->get("Address as ad", null, $db_type_cols);
				$db_type->disconnect();
				
				if ($db_type->count > 0){
				
					include_once "application/models/model_action.php";
					$action = new Model_Action();
					
					//добавляем все полученные телефоны в базу для получения msgId записи и добавляем полученый msgId в xml документ
					foreach ($db_type_data as $key=>$row) {
						$actionData = [
							"Id" => "",
							"ModelType"  => "contact",
							"ModelId"  	 => $row["ContactId"],
							"Type"  	 => "SMS",
							"Address"  	 => preg_replace('/[^0-9.]+/', '', $row["Address"]),
							"Text"  	 => $text,
							"Status"  	 => "",
							"UserId" 	 => $_SESSION["UserId"]
						];
						
						$data = $action->add($actionData);
						//добавляем все полученные телефоны в базу для получения msgId записи и добавляем полученый msgId в xml документ
						$numbers .= '<number messageID="'.$data["ActionId"].'">'.preg_replace('/[^0-9.]+/', '', $row["Address"]).'</number>';
					}
					
					require_once($GLOBALS['RootDir'].'application/utils/sms.php');
					$sms = new SMS_Service($_SESSION['AccId']);
					$xml = $sms->setXML_send($numbers,$text);
					$Result = $sms->sendToGate($xml);
			        
			        $xml = simplexml_load_string($Result, "SimpleXMLElement", LIBXML_NOCDATA);
					$json = json_encode($xml);
					$array = json_decode($json,TRUE);
					$ResultStatus = $sms->getUserStatusDesc($array["status"]);
					
					$data["status"]	= "success";
					$data["message"]= "SMS отправлены! ".$ResultStatus;
					return $data;
					
			    }
			}
		} catch(Exception $e) {
			//echo 'Выброшено исключение: '.$e->getMessage();
			$data["status"]="error";
			$data["message"]="Ошибка отправки SMS. ".$e->getMessage();
		}
		return $data;
	}
	
	public function chimp_save($apiKey, $listId) {
		$this->SQL_select = "select count(*) as cnt from SrvTasks where AccId = ? and Name=?";
		$this->SQL_params_types = array('s','s');
		$this->SQL_params = array($AccId,'Email Маркетинг');
		
		$params = array(
			"TaskType" => "MailChimp", 
			"Params" => array(
				"AccId" => $_SESSION["AccId"],
				"ApiKey" => $apiKey,
				"ListId" => $listId));
				
		$data = null;
		try {
			$data = parent::get_row();
			require('application/models/model_srvtasks.php');
			if ($data[0]["cnt"] == "0") {
				$array = [
					"AccId" => $_SESSION["AccId"],
					"Id" => "",
					"Name"	=> "Email Маркетинг",
					"Comments"	=> "MailChimp integration",
					"Params"	=> json_encode($params),
					"CreatorId"=>$_SESSION['UserId']
				];
				$srvTask = new Model_srvtasks();
				$res = $srvTask->add($array);
				if ($res["status"] == "success") {
					$phpExec = exec("php ".$GLOBALS['RootDir']."application/cron/srvtask_runner.php ".$res["rec_id"]." > /dev/null 2>/dev/null &");
				}
				unset($srvTask);
			} else {
				$this->SQL_select = "select Id from SrvTasks where AccId = ? and Name=?";
				$this->SQL_params_types = array('s','s');
				$this->SQL_params = array($AccId,'Email Маркетинг');
				$data = parent::get_row();
				$phpExec = exec("php ".$GLOBALS['RootDir']."application/cron/srvtask_runner.php ".$data[0]["Id"]." > /dev/null 2>/dev/null &");
				unset($data);
			}
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}
	}
	
	public function getListBranchesJson($month){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		$db->where("AccId", $_SESSION["AccId"]);
		
		$json = $db->JsonBuilder()->get("AccountBranches", null, "*");
		$db->disconnect();
		header('Content-Type: application/json; charset=utf-8');
		return $json;

	}
	
	public function getBranch($branchId){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		$db->where("AccId", $_SESSION["AccId"]);
		$db->where("Id", $branchId);
		
		$data = $db->get("AccountBranches", null, "*");
		$db->disconnect();
		return $data;

	}
	
	public function addBranch($data){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		if(!isset($data["Id"]) || $data["Id"]==""){
			$id = $db->insert ('AccountBranches', $data);
			if($id){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
				$data["BranchId"] =$id;
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
		} else {
			
			$db->where ('Id',$data["Id"]);
			if ($db->update ('AccountBranches', $data)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
				$data["BranchId"] =$data["Id"];
				
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
			}
			    
		}
		$db->disconnect();
		return json_encode($data);

	}
	
}
?>