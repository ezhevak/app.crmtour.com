<?php
class Model_Leads extends Model
{
	function __construct() {
		$this->ModelClass = "Lead";
	}

	public function exportSQL() {
		return "select * from Leads";
	}
	
	public function get_row($Id){
		
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Id", $Id);
		//$cols = array ("Id", "Name","Description", "Status","DocUrl","UserId");
		$data = $db->get("vLeads_materialized", null, "*");
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	public function get_task_row($Id){
		//Отдельная облегчённая функция для выгрузки данных в taks
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->join("Contacts as vc", "l.ContactId = vc.Id and l.AccId = vc.AccId", "LEFT");
        $db->where("l.AccId", $_SESSION['AccId']);
		$db->where("l.Id", $Id);
		$cols = array ("l.Id", "l.AccId","l.LastName", "l.FirstName");
		$data = $db->get("Leads as l", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;	
	}
	

	//public function getMVGListJson($conId) {
	//	$this->SQL_select = "SELECT Id as pickId, ContactId as pickContactId, LegalName as pickLegalName, LegalCode as pickLegalCode, FirstName as pickFirstName, LastName as pickLastName, MiddleName as pickMiddleName
	//		FROM  `vLegalToContact_materialized`
	//		WHERE AccId = ?";
	//	$this->SQL_params_types = array('s');
	//	$this->SQL_params = array($_SESSION['AccId']);
	//	$all_data = null;
	//	try {
	//		$all_data = parent::get_row();
	//	} catch(Exception $e) {
	//		echo 'Выброшено исключение: '.$e->getMessage();
	//	}

	//	$this->SQL_select = "SELECT Id as pickId, ContactId as pickContactId, LegalName as pickLegalName, LegalCode as pickLegalCode, FirstName as pickFirstName, LastName as pickLastName, MiddleName as pickMiddleName
	//		FROM  `vLegalToContact_materialized`
	//		WHERE AccId = ? AND ContactId = ?";
	//	$this->SQL_params_types = array('s', 's');
	//	$this->SQL_params = array($_SESSION['AccId'], $conId);
	//	$selected_data = null;
	//	try {
	//		$selected_data = parent::get_row();
	//	} catch(Exception $e) {
	//		echo 'Выброшено исключение: '.$e->getMessage();
	//	}
	//	//print_r($data);
	//	echo json_encode(array("all"=>$all_data, "selected" => $selected_data));
	//}

	//public function getContactJson($leadId) {
	//	$all_data = null;
	//	$this->SQL_select_count = "select count(*) as count
	//	from (select Id as id, FirstName, LastName, MiddleName,Sex from `vContacts` where AccId = ?) t where 1 =1";
	//	$this->SQL_params_types_count = array('s');
	//	$this->SQL_params_count = array($_SESSION['AccId']);

	//	//$this->SQL_select = "select id, pickFirstName, pickLastName, pickMiddleName from (select Id as id, FirstName as pickFirstName, LastName as pickLastName, MiddleName as pickMiddleName from `vContacts` where AccId=?) t where 1=1";
	//	//zhevak 2017/03/2017 добавил телефон и Email
	//		$this->SQL_select = "select id, pickFirstName, pickLastName, pickMiddleName, pickPhone, pickEmail, pickSex
	//								from (select vc.Id as id, FirstName as pickFirstName, LastName as pickLastName, MiddleName as pickMiddleName
	//										      ,vc.PhoneMob as pickPhone, vc.EmailHome as pickEmail, vc.`Sex` as pickSex
	//									   from `vContacts` as vc
	//										where vc.AccId = ?
	//										) t where 1=1";
	//	$this->SQL_params_types = array('s');
	//	$this->SQL_params = array($_SESSION["AccId"]);

	//	try {
	//		$all_data = parent::getListJson();
	//	} catch(Exception $e) {
	//		echo 'Выброшено исключение: '.$e->getMessage();
	//	}
	//	return $all_data;

	//}


	public function setContact($params) {
		$this->SQL_update = "UPDATE `Leads` set ContactId = ? WHERE Id = ?";
		$this->SQL_update_params_types = array('s', 's');
		$this->SQL_update_params = array($params["ClientId"], $params["LeadId"]);
		$data = null;
		try {
			$data = parent::add($params["LeadId"]);
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}
		return $data;
	}


	public function get_AmountStatusLead($Status){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		$db->where("AccId", $_SESSION["AccId"]);
		$db->where("LeadStatus", $Status);
		$data = $db->getOne("Leads", "count(Id) AmountLead");
		return $data;
	}
	
	public function getListJson($month,$BranchId){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		$db->where("l.AccId", $_SESSION["AccId"]);
		
		if(!empty($BranchId)){
			$db->where("l.BranchId", $BranchId);
		}
		if(empty($month)){
			$db->where("l.LeadStatus", array("New","InWork"),"in");
		}
		
		if($_SESSION['UserRole'] == "owner"){
			$db->join("UsersBranches as ub", "l.AccId = ub.AccId and l.BranchId = ub.BranchId", "");
			$db->where("ub.UserId",  $_SESSION['UserId']);
			//$db->where("l.BranchId", $_SESSION["BranchId"]);
		} else if($_SESSION['UserRole'] == "user"){
			if(GetOption("AllManagerLists",$_SESSION['AccId'])=="1"){
				$db->where("l.BranchId", $_SESSION["BranchId"]);
			} else {
				$db->join("UsersBranches as ub", "l.AccId = ub.AccId and l.BranchId = ub.BranchId and l.UserId = ub.UserId", "");
				$db->where("ub.UserId",  $_SESSION['UserId']);
			}
		}
		if(!empty($month)){
			$dateStart = date("Y-m-d", mktime(0, 0, 0, date('m')-$month, date('d'), date('Y')));
			$dateEnd = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y')));
			$db->where("l.LeadDate", array($dateStart,$dateEnd),"between");
		}
		$json = $db->JsonBuilder()->get("vLeads_materialized as l", null, "l.*");
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
		$db->delete('Leads');
		
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

	
	public function findAddressJson($address){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Address", str_replace(" ","+",$address));
		//$cols = array ("Id", "Name","Description", "Status","DocUrl","UserId");
		$dataAddress = $db->get("Address", null, "*");
		$db->disconnect();
		
		if ($db->count =="1"){
			include_once "application/models/model_contacts.php";
			$contact = new Model_Contacts();
			$contactData = $contact->get_row($dataAddress[0]["ContactId"]);
			$data["status"] ="success";
			$data["message"] ="Запрос, автоматически связан с ".$contactData[0]["LastName"]." ".$contactData[0]["FirstName"]."";
			$data["count"] = $db->count;
			$data["FirstName"] = $contactData[0]["FirstName"];
			$data["LastName"] = $contactData[0]["LastName"];
			$data["MiddleName"] = $contactData[0]["MiddleName"];
			$data["ContactId"] = $contactData[0]["Id"];
			$data["Sex"] = $contactData[0]["Sex"];
			$data["EmailHome"] = $contactData[0]["EmailHome"];
			$data["PhoneMob"] = $contactData[0]["PhoneMob"];
			
		} else{
			$data["status"] ="success";
			$data["count"] = $db->count;
			$data["message"] ="Найдено ".$db->count." клиентов с ".str_replace(" ","+",$address);
				
		}
		header('Content-Type: application/json; charset=utf-8');
		return json_encode($data);
	}
	
	
	public function add($data){
		if (!isset($data["FromWebForm"])){
			$AccId = $_SESSION['AccId'];
		} else {
			$AccId = $data["AccId"];
		}
		
		//$UserData = getUserData($data["UserId"]);
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$dataX = array ("AccId"			=> $_SESSION['AccId'],
		                "BranchId"		=> $_SESSION["BranchId"],//$userData[0]["BranchId"],
		                "LeadDate"		=> toFormat("d.m.Y","Y-m-d",$data["LeadDate"]),
		                "LeadStatus"	=> $data["LeadStatus"],
		                "LeadType"		=> $data["LeadType"],
		                "LeadSource"	=> $data["LeadSource"],
		                "LeadPriority"	=> $data["LeadPriority"],
		                "LastName"		=> $data["LastName"],
		                "FirstName"		=> $data["FirstName"],
		                "MiddleName"	=> $data["MiddleName"],
		                "Phone"			=> $data["Phone"],
		                "Email"			=> $data["Email"],
		                "LeadText"		=> $data["LeadText"],
		                "ManagerText"	=> $data["ManagerText"],
		                "UserId"		=> $data["UserId"],
		                "Sex"			=> $data["Sex"],
		                "ContactId"		=> $data["ContactId"],
		                "PartnerId"		=> $data["PartnerId"]//,
		                //"LeadLastNameEnc"	=> $db->func('AES_ENCRYPT(?,?)', array($data["LastName"],$_SESSION["AccSalt"].$GLOBALS["Salt"])),
		                //"LeadFirstNameEnc"	=> $db->func('AES_ENCRYPT(?,?)', array($data["FirstName"],$_SESSION["AccSalt"].$GLOBALS["Salt"])),
		                //"LeadMiddleNameEnc"	=> $db->func('AES_ENCRYPT(?,?)', array($data["MiddleName"],$_SESSION["AccSalt"].$GLOBALS["Salt"])),
		                //"LeadSexEnc"		=> $db->func('AES_ENCRYPT(?,?)', array($data["Sex"],$_SESSION["AccSalt"].$GLOBALS["Salt"])),
		                //"LeadPhoneEnc"		=> $db->func('AES_ENCRYPT(?,?)', array($data["Phone"],$_SESSION["AccSalt"].$GLOBALS["Salt"])),
		                //"LeadEmailEnc"		=> $db->func('AES_ENCRYPT(?,?)', array($data["Email"],$_SESSION["AccSalt"].$GLOBALS["Salt"]))
		                
		);
		
		
		if(!isset($data["Id"]) || $data["Id"]==""){
			$id = $db->insert ('Leads', $dataX);
			if($id){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
				$data["LeadId"] = $id;
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
		} else {
			$db->where ('AccId',$_SESSION['AccId']);
			$db->where ('Id',$data["Id"]);
			if ($db->update ('Leads', $dataX)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
				$data["LeadId"] = $data["Id"];
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
			}
			    
		}
		
		$db->disconnect();
		
		if ($data["status"] == "success") {
			//Включение отключение отправки уведомлений на почту пользователям.
			if(GetOption("Send_Email",$AccId)=="1"){
				//отправляем уведомление на почту.
				if($_SESSION["UserId"] != $data["UserId"]){
					$userData = getUserData($data["UserId"]);
					$email = $userData[0]["Email"];
					//$email = GetUserEmail($data["UserId"]);
					if(!empty($email)){
						if(!empty($data["LeadId"])){
							appsendmail($email,
							"Изменения в запросе клиента ".$data["FirstName"]." " .$data["LastName"],
							"В запросе клиента <a href='https://app.crmtour.com/leads/add?Id=".$data["LeadId"]."'>".$data["FirstName"]." ".$data["LastName"]."</a> произошли изменения. <br>
							<br>

							С уважением команда <a href='https://crmtour.com/' target='_blank'>CRM Tour</a>
							");
						}
					}
				}
			}
			
			//Отправляем уведомление в телеграм если текущий пользователь не равен менеджеру
			if($_SESSION["UserId"] != $data["UserId"]){
				$user = getUserData($data["UserId"]);
				
				if($user[0]["TelegramChatId"] !=""){
					
					$chatId = $user[0]["TelegramChatId"];
					$messageText = "";
					
					if($data["Id"] == ""){
						$messageText = "Создан новый запрос для клиента ".$data["FirstName"]." ".$data["LastName"].". \n";
					} else {	
						$messageText = "В запросе клиента ".$data["FirstName"]." " .$data["LastName"]." произошли изменения. \n";
					}
					
					$messageText .= "Для просмотра информации перейдите по ссылке https://app.crmtour.com/leads/add?Id=".$data["LeadId"]."
					
					-------------
					С уважением команда CRM Tour";
					
					$data["Telegram"] = appsendtelegram($user[0]["TelegramChatId"],$messageText);
					
					
				}
			}
			
			
			
			if($data["LeadStatus"] == 'Processed' || $data["LeadStatus"] == "Lost") {
				//Формируем масив по контактам
				$dataContactIns = array ("AccId"		=> $_SESSION['AccId'],
						                  "LastName"	=> $data["LastName"],
						                  "FirstName"	=> $data["FirstName"],
						                  "MiddleName"	=> $data["MiddleName"],
						                  "Sex"			=> $data["Sex"],
						                  "UserId"		=> $data["UserId"],
						                  "Source"		=> $data["LeadSource"]
						                );
				$dataContactUpd = array ("AccId"		=> $_SESSION['AccId'],
					                  	 "LastName"		=> $data["LastName"],
					                     "FirstName"	=> $data["FirstName"],
					                     "MiddleName"	=> $data["MiddleName"]
					                  //"Sex"			=> $data["Sex"],
					                  //"UserId"		=> $data["UserId"],
					                  //"Source"		=> $data["LeadSource"]
					                );
				
				//Если пустой ContactId создаём новую запись по контакту
				//Если ContactId заполнен обновляем запись по контакту.
				if($data["ContactId"] == "" || $data["ContactId"] =="0"){
					//Добавляем новый контакт если lead не привязан к контакту.
					$mysqli = database::getInstance();
			        $db = $mysqli->getConnection();
			        	
					$ContactId = $db->insert ('Contacts', $dataContactIns);
					if($ContactId){
						$data["ContactId"] = $ContactId;
						$dataLeadUpdate = array ("ContactId" => $ContactId);
						
						$db->where ('AccId',$_SESSION['AccId']);
						$db->where ('Id',$data["LeadId"]);
						$db->update ('Leads', $dataLeadUpdate);
					}
					$db->disconnect();
				} else {
					$db->where ('AccId',$_SESSION['AccId']);
					$db->where ('Id',$data["ContactId"]);
					$db->update ('Contacts', $dataContactUpd);
					
					$db->disconnect();
				}
				
				//Связываем телефон из запроса с контакта
				if($data["Phone"] != "" && $data["ContactId"] != ""){
					
					include_once "application/models/model_address.php";
					$Address = new Model_Address();
				
					$dataPhone = array ("ContactId"	=> $data["ContactId"],
						                "Type"		=> "PhoneMob",
						                "Address"	=> $data["Phone"],
										"Comments"  => "",
										"Active"    => "on",
										"Send"      => "on",
										"LastAdd"   => "on"
						                );
					$addressPhone = $Address->add($dataPhone);
					$data["PhoneId"] = $addressPhone["Id"];
				}
				//Связываем email из запроса с контакта
				if($data["Email"] !="" && $data["ContactId"] !=""){
					
					include_once "application/models/model_address.php";
					$Address = new Model_Address();
				
					$dataPhone = array ("ContactId"	=> $data["ContactId"],
						                "Type"		=> "EmailHome",
						                "Address"	=> $data["Email"],
										"Comments"  => "",
										"Active"    => "on",
										"Send"      => "on",
										"LastAdd"   => "on"
						                );
					$addressPhone = $Address->add($dataPhone);
					$data["EmailId"] = $addressPhone["Id"];
				}
				
				//Проверяем есть ли связь с этим человеком у нового контакта
				if($data["PartnerId"] != "" && $data["ContactId"] != "" && $data["PartnerId"] != "0" && $data["ContactId"] != "0"){
					$mysqli = database::getInstance();
					$db = $mysqli->getConnection();
					
					//Если связи с клиентом нет, создаём запись.
					$db->where('AccId', $_SESSION['AccId']);
					$db->where('ContactId', $data["ContactId"]);
					$db->where('ParrContactId', $data["PartnerId"]);
					$data["ConToParId"] = $db->getValue("ContactToContact", "Id");
					
					if($data["ConToParId"] ==""){
						$dataPartner = array ("AccId"			=> $_SESSION['AccId'],
											  "ContactId"		=> $data["ContactId"],
											  "ParrContactId"	=> $data["PartnerId"],
											  "LinkType"		=> "Рекомендовал(а)"
											  );
						$data["ConToParId"] = $db->insert ('ContactToContact', $dataPartner);
					}
					$db->disconnect();
				}
				
				//Проверяем есть ли у связанного лица связь с этим клиентом
				if($data["PartnerId"] != "" && $data["ContactId"] != "" && $data["PartnerId"] != "0" && $data["ContactId"] != "0"){
					$mysqli = database::getInstance();
					$db = $mysqli->getConnection();
					
					//Если связи с клиентом нет, создаём запись.
					$db->where('AccId', $_SESSION['AccId']);
					$db->where('ContactId', $data["PartnerId"]);
					$db->where('ParrContactId', $data["ContactId"]);
					$data["ParToConId"] = $db->getValue("ContactToContact", "Id");
					
					if($data["ParToConId"] ==""){
						$dataPartner = array ("AccId"			=> $_SESSION['AccId'],
											  "ContactId"		=> $data["PartnerId"],
											  "ParrContactId"	=> $data["ContactId"],
											  "LinkType"		=> "Знакомый"
											  );
						$data["ParToConId"] = $db->insert ('ContactToContact', $dataPartner);
					}
					$db->disconnect();
				}
			}
		}
		
		header('Content-Type: application/json; charset=utf-8');
		return json_encode($data);
		
	}
	
	public function getContactInfo($ContactId,$LeadId){
		
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
        
        $mysqliContact = database::getInstance();
		$cont = $mysqliContact->getConnection();
		$cont->join("Dictionaries as ds", "c.Segment = ds.LIC and c.AccId = ds.AccId and ds.Lang = 'ru_RU'", "LEFT");
		$cont->where("c.Id", $ContactId);
		$cont->where("c.AccId", $_SESSION['AccId']);
		$cols = array ("c.Id","c.LastName","c.FirstName","c.MiddleName","c.Comments","c.BlackList","ds.Name as SegmentName");
		$data = $cont->get("Contacts as c", null, $cols);
        $cont->disconnect();
        
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		
		$leadsProccessed = $db->copy();
        $leadsProccessed->where("ContactId", $ContactId);
		$leadsProccessed->where("LeadStatus", "Processed");
		$data[0]["LeadsProcessed"] = $leadsProccessed->getValue ("Leads", "count(Id)");
		
		
		$LeadsLost = $db->copy();
		$LeadsLost->where("ContactId", $ContactId);
		$LeadsLost->where("LeadStatus", "Lost");
		$data[0]["LeadsLost"] = $LeadsLost->getValue ("Leads", "count(Id)");
		
		$db->disconnect();
		
		$mysqliLead = database::getInstance();
		$leads = $mysqliLead->getConnection();
		$leads->join("Dictionaries as ds", "l.LeadStatus = ds.LIC and l.AccId = ds.AccId and ds.Lang = 'ru_RU'", "LEFT");
		$leads->where("l.AccId", $_SESSION['AccId']);
		$leads->where("l.ContactId", $ContactId);
		//для новых запросов связаных с клиентом исключаем лишний where по id
		if(!empty($LeadId)){
			$leads->where ('l.Id', $LeadId, "!=");
		}
		$leads->where('LeadStatus', array('Processed', 'Lost'), 'IN');
		$leads->orderBy("Id","Desc");
		$colsLead = array ("l.Id","DATE_FORMAT(l.LeadDate, '%d.%m.%Y') as LeadDate","l.LeadText","l.ManagerText","ds.Name as LeadStatusName");
		$data["Lead"] = $leads->get("Leads as l", 1, $colsLead);
		$leads->disconnect();
		        
		header('Content-Type: application/json; charset=utf-8');
		return json_encode($data);
	}
	
	
	
	
	
	
}

?>