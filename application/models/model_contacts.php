<?php

class Model_Contacts extends Model
{
	function __construct() {
		$this->ModelClass = "Contact";
	}

	public function get_row($Id){
		
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Id", $Id);
		$cols = array ("*");
		$data = $db->get("vContacts_materialized", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	public function get_task_row($ContactId){
		//Отдельная облегчённая функция для выгрузки данных в taks
		$this->SQL_select = "SELECT c.`Id`,
									c.`AccId`,
									c.`LastName`,
									c.`FirstName`
									FROM `Contacts` as c
							where c.AccId = ? and c.Id = ?";
		$this->SQL_params_types = array('s', 's');
		$this->SQL_params = array($_SESSION['AccId'], $ContactId);

		$data = null;
		try {
			$data = parent::get_row();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}
		return $data;
	}

	public function getListSegmentJson($segment){
		$this->SQL_select_count = "SELECT count(*) FROM  `vContacts_materialized` where AccId = ? and Segment = ?";
		$this->SQL_params_types_count = array('s','s');
		$this->SQL_params_count = array($_SESSION['AccId'],$segment);

		$this->SQL_select = "select * FROM `vContacts_materialized` where AccId = ? and Segment = ?";
		$this->SQL_params_types = array('s','s');
		$this->SQL_params = array($_SESSION['AccId'],$segment);

		$data = null;
		try {
			$data = parent::getListJson();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}
		echo json_encode($data);
	}


	public function get_phones_row($contact_id,$type)
	{
		$this->SQL_select = "SELECT * FROM  `vAddress_materialized`
			where AccId = ? and ContactId = ? and Type = '$type' and LastAdd = 1 and Active = 1";
		$this->SQL_params_types = array('s', 's');
		$this->SQL_params = array($_SESSION['AccId'], $contact_id);

		$data = null;
		try {
			$data = parent::get_row();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}

		return $data;
	}

	public function get_document_row($contact_id)
	{
		$this->SQL_select = "SELECT * FROM  `vDocuments_materialized`
			where AccId = ? and ContactId = ? and DocType = 'intPass' and LastAdd =1";
		$this->SQL_params_types = array('s', 's');
		$this->SQL_params = array($_SESSION['AccId'], $contact_id);

		$data = null;
		try {
			$data = parent::get_row();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}

		return $data;
	}

	public function getlist_linked_legalJson($contactId) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("Id as id", "LegalId", "LegalName", "LegalCode", "LinkType as pickLinkType" );
		$db->where('AccId', $_SESSION['AccId']);
		$db->where('ContactId', $contactId);
		
		$json = $db->JsonBuilder()->get("vLegalToContact_materialized", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
		
		
		
		
		
		
		//$this->SQL_select_count = "SELECT COUNT(*) AS count	FROM  `vLegalToContact_materialized` where AccId = ? and ContactId = ?";
		//$this->SQL_params_types_count = array('s','s');
		//$this->SQL_params_count = array($_SESSION['AccId'],$contactId);

		//$this->SQL_select = "select Id as id, LegalId, LegalName, LegalCode, LinkType as pickLinkType FROM `vLegalToContact_materialized` where AccId = ? and ContactId = ?";
		//$this->SQL_params_types = array('s','s');
		//$this->SQL_params = array($_SESSION['AccId'],$contactId);

		//$data = null;
		//try {
		//	$data = parent::getListJson();
		//} catch(Exception $e) {
		//	echo 'Выброшено исключение: '.$e->getMessage();
		//}
		//echo json_encode($data);
	}

	//public function getlist_linked_contactJson($contactId) {
	//	$this->SQL_select_count = "SELECT COUNT(*) AS count	FROM  `vContactToContact` where AccId = ? and ContactId = ?";
	//	$this->SQL_params_types_count = array('s','s');
	//	$this->SQL_params_count = array($_SESSION['AccId'],$contactId);

	//	$this->SQL_select = "select Id as id, ParrContactId, ParrLastName, ParrFirstName, ParrMiddleName, LinkType as pickLinkType FROM `vContactToContact` where AccId = ? and ContactId = ?";
	//	$this->SQL_params_types = array('s','s');
	//	$this->SQL_params = array($_SESSION['AccId'],$contactId);

	//	$data = null;
	//	try {
	//		$data = parent::getListJson();
	//	} catch(Exception $e) {
	//		echo 'Выброшено исключение: '.$e->getMessage();
	//	}

	//	echo json_encode($data);
	//}

	public function getlist_ContactLeads_Json($ContactId){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		$cols = array("l.Id","l.LeadDate", "d.Name as LeadStatusName", "c.FirstName", "c.LastName", "c.MiddleName", "u.ManagerName","p.Name as LeadPriorityName");
		$db->where("l.AccId", $_SESSION["AccId"]);
		$db->where("l.ContactId", $ContactId);
		
		$db->join("Dictionaries as d", "l.AccId = d.AccId and l.LeadStatus = d.LIC and d.Lang = 'ru_RU'", "");
		$db->join("Contacts as c",	   "l.AccId = c.AccId and l.ContactId = c.Id", "");
		$db->join("vUsers_materialized as u",	   "l.AccId = u.AccId and l.UserId = u.Id", "");
		$db->join("Dictionaries as p", "l.AccId = p.AccId and l.LeadPriority = p.LIC and d.Lang = 'ru_RU'", "");
		
		$json = $db->JsonBuilder()->get("Leads as l", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		echo $json;
	}






	public function getlist_contact_events_Json($ContactId) {
		//echo $ContactId;
		$this->SQL_select_count = "SELECT COUNT(*) AS count	FROM `Events` where AccId = ? and ModelType = 'Contact' and ModelId = ?";
		$this->SQL_params_types_count = array('s','s');
		$this->SQL_params_count = array($_SESSION['AccId'], $ContactId);

		$this->SQL_select = "select Id, EventType, EventDate, ModelId, SendEmail,EventRemindDays, Comments FROM `Events` where AccId = ? and ModelType = 'Contact' and ModelId = ?";
		$this->SQL_params_types = array('s','s');
		$this->SQL_params = array($_SESSION['AccId'], $ContactId);

		$data = null;
		try {
			$data = parent::getListJson();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}

		echo json_encode($data);
	}


	
		//Выгружаем все документы
	public function getlist_ContactDocuments_Json($ContactId) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		$cols = array("doc.Id", "dic.Name as DocTypeName", "doc.LastName", "doc.FirstName", "doc.RecordNo", "doc.SeriaNum", "doc.IssuedDate", "doc.Valid", 
					  "doc.IssuedBy", "doc.Biometric", "doc.LastAdd",
					  "CASE WHEN (up.Id IS NOT NULL) THEN 1 ELSE 0 end ScanExists");
		$db->where("doc.AccId", $_SESSION["AccId"]);
		$db->where("doc.ContactId", $ContactId);
		
		$db->join("Dictionaries as dic", "doc.AccId = dic.AccId and doc.DocType = dic.LIC and dic.Lang = 'ru_RU'", "");
		$db->join("Uploads as up",	   "doc.accid  =  up.accid  AND  doc.id  =  up.modelid  AND  up.modeltype  = 'documents'", "left");
		
		$json = $db->JsonBuilder()->get("Documents as doc", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		echo $json;
	}


	//	//Выгружаем все документы
	//public function getlist_ContactPhones_Json($ContactId) {
	//	//echo $ContactId;
	//	//$this->SQL_select_count = "SELECT COUNT(*) AS count	FROM `vAddress` where AccId = ? and ContactId = ?";
	//	$this->SQL_select_count = "SELECT COUNT(*) AS count	FROM `vAddress` where SubType ='Phone' and AccId = ? and ContactId = ?";
	//	$this->SQL_params_types_count = array('s','s');
	//	$this->SQL_params_count = array($_SESSION['AccId'], $ContactId);

	//	//$this->SQL_select = "select * FROM `vAddress` where AccId = ? and ContactId = ?";
	//	$this->SQL_select = "select * FROM `vAddress` where SubType ='Phone' and AccId = ? and ContactId = ?";
	//	$this->SQL_params_types = array('s','s');
	//	$this->SQL_params = array($_SESSION['AccId'], $ContactId);

	//	$data = null;
	//	try {
	//		$data = parent::getListJson();
	//	} catch(Exception $e) {
	//		echo 'Выброшено исключение: '.$e->getMessage();
	//	}

	//	echo json_encode($data);
	//}

	public function getlist_ContactEmails_Json($ContactId) {
		//echo $ContactId;
		$this->SQL_select_count = "SELECT COUNT(*) AS count	FROM `vAddress_materialized` where Type in ('EmailHome','EmailWork') and AccId = ? and ContactId = ?";
		$this->SQL_params_types_count = array('s','s');
		$this->SQL_params_count = array($_SESSION['AccId'], $ContactId);

		$this->SQL_select = "select * FROM `vAddress_materialized` where Type in ('EmailHome','EmailWork') and AccId = ? and ContactId = ?";
		$this->SQL_params_types = array('s','s');
		$this->SQL_params = array($_SESSION['AccId'], $ContactId);

		$data = null;
		try {
			$data = parent::getListJson();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}

		echo json_encode($data);
	}



	public function getlist_ContactDeals_Json($ContactId) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		
		$params = array($_SESSION["AccId"],$ContactId,$_SESSION["AccId"],$ContactId);
			
		$query = "(select d.Id,
						  d.AccId,
						  d.ContactId,
						  CONCAT(IFNULL(vc.LastName,''), ' ' , IFNULL(vc.FirstName,'')) as ContactName,
						  d.DealNo,
						  d.DealDate as DealDateOriginal,
					      DATE_FORMAT(d.DealDate, '%m') as Month,
					      ifnull(d.DealSum,0) as DealSum,
						  ifnull(d.DealSumFact,0) as DealSumFact,
						  d.UserId,
						  u.ManagerName,
						  d.DirectionId,
						  dir.DirectionName,
						  d.RegionId,
						  reg.RegionName,
						  'Клиент' as ParticipantType,
						  d.DealType,
						  dt.Name as DealTypeName,
						  d.OperatorId,
						  op.Name as OperatorName,
						  d.OperatorInvoceNum,
					      d.DateArrivalOriginal,
					      d.HotelId,
					      d.HotelName,
					      ifnull(vpg.PayCount,0) as PayCount,
					      ifnull(vpg.PaySum,0) as PaySum,
						  case when d.DealSum <= PaySum then 1 else 0 end NotPaidDeal
				   from vDeals_materialized as d
				   left join vUsers_materialized as u on (d.UserId = u.Id and d.AccId = u.AccId)
				   left join vContacts_materialized as vc on (d.AccId = vc.AccId and d.ContactId = vc.Id)
				   left join dimDirection as dir on (d.DirectionId = dir.Id)
				   left join dimRegion as reg on (d.AccId = reg.AccId and d.RegionId = reg.Id)
				   left join Dictionaries as dt on (d.DealType = dt.LIC and d.AccId = dt.AccId and dt.Lang = u.Lang)
				   left join dimOperators as op on (d.AccId = op.AccId and d.OperatorId = op.Id)
				   left join vPaymentsGroup_materialized as vpg on (d.AccId = vpg.AccId and d.Id = vpg.DealId and vpg.PayType = 'income')
				   where d.AccId = ? and d.ContactId != 0 and d.ContactId = ?)
				   
				   union
				   
				   (select dp.DealId as Id,
					      dp.AccId,
						  dp.ContactId,
						  CONCAT(IFNULL(vc.LastName,''), ' ' , IFNULL(vc.FirstName,'')) as ContactName,
					      d.DealNo,
					      d.DealDate as DealDateOriginal,
					      DATE_FORMAT(d.DealDate, '%m') as Month,
					      ifnull(d.DealSum,0) as DealSum,
						  ifnull(d.DealSumFact,0) as DealSumFact,
					      d.UserId,
					      u.ManagerName,
					      d.DirectionId,
					      dir.DirectionName,
					      d.RegionId,
					      reg.RegionName,
					      'Участник' as ParticipantType,
					      d.DealType,
					      dt.Name as DealTypeName,
					      d.OperatorId,
					      op.Name as OperatorName,
					      d.OperatorInvoceNum,
					      d.DateArrivalOriginal,
					      d.HotelId,
					      d.HotelName,
					      ifnull(vpg.PayCount,0) as PayCount,
					      ifnull(vpg.PaySum,0) as PaySum,
					      case when d.DealSum <= PaySum then 1 else 0 end NotPaidDeal
					from vDealParticipants_materialized as dp
					left join vDeals_materialized as d on (dp.AccId = d.AccId and dp.DealId = d.Id)
					left join vUsers_materialized as u on (d.AccId = u.AccId and d.UserId = u.Id)
				    left join vContacts_materialized as vc on (dp.AccId = vc.AccId and dp.ContactId = vc.Id)
					left join dimDirection as dir on (d.DirectionId = dir.Id)
					left join dimRegion as reg on (d.AccId = reg.AccId and d.RegionId = reg.Id)
					/*Исключаем клиентов которые участники поездки и владельцы сделки*/
					left join Deals as dd on (dp.DealId = dd.Id and dp.ContactId = dd.ContactId and dp.AccId = dd.AccId)
					left join Dictionaries as dt on (d.DealType = dt.LIC and d.AccId = dt.AccId and dt.Lang = u.Lang)
					left join dimOperators as op on (d.AccId = op.AccId and d.OperatorId = op.Id)
					left join vPaymentsGroup_materialized as vpg on (d.AccId = vpg.AccId and d.Id = vpg.DealId and vpg.PayType = 'income')
					where dd.Id is null and dp.AccId =? and dp.ContactId = ?)";
		$data = $db->rawQuery($query, $params);

		$db->disconnect();

		header('Content-Type: application/json; charset=utf-8');
		return json_encode($data);
	}
	
	//New Dealds list
	public function getlist_ContactDeals_Json_old($ContactId) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		$cols = array("d.Id","d.DealNo","d.OperatorInvoceNum","d.DealDateOriginal",
					  "DATE_FORMAT(d.DealDate, '%m') as Month",
					  "ifnull(vpg.PayCount,0) as PayCount",
					  "ifnull(d.DealSum,0) as DealSum",
					  "ifnull(vpg.PaySum,0) as PaySum",
					  "case when d.DealSum <= PaySum then 1 else 0 end NotPaidDeal",
					  "d.ContactId",
					  "CONCAT(IFNULL(vc.LastName,''), ' ' , IFNULL(vc.FirstName,'')) as ContactName",
					  "d.OperatorId",
					  "d.OperatorName","d.DateArrivalOriginal","d.DealSum","d.DirectionName","d.RegionName",
					  "d.HotelId",
					  "d.HotelName",
					  "d.UserId",
					  "d.ManagerName");
		$db->where("d.AccId", $_SESSION["AccId"]);
		$db->where("d.ContactId", $ContactId);



		$db->join("vContacts_materialized as vc", "d.ContactId = vc.Id and d.AccId = vc.AccId", "LEFT");
		$db->join("vPaymentsGroup_materialized as vpg", "d.AccId = vpg.AccId and d.Id = vpg.DealId and vpg.PayType = 'income'", "LEFT");

		$json = $db->JsonBuilder()->get("vDeals_materialized as d", null, $cols);
		$db->disconnect();

		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}


	//getlist_ContactAddresses list
	public function getlist_ContactAddresses_Json($ContactId) {
		//echo "!!!!!!!!!!!!!".$ContactId;
		$this->SQL_select_count = "SELECT COUNT(*) AS count	FROM `vAddress_materialized` where AccId = ? and ContactId = ?";
		$this->SQL_params_types_count = array('s','s');
		$this->SQL_params_count = array($_SESSION['AccId'], $ContactId);

		$this->SQL_select = "SELECT * FROM `vAddress_materialized` where AccId = ? and ContactId = ?";
		$this->SQL_params_types = array('s','s');
		$this->SQL_params = array($_SESSION['AccId'], $ContactId);

		$data = null;
		try {
			$data = parent::getListJson();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}

		echo json_encode($data);
	}


	//getlist_Contact Task list
	//public function getlist_ContactTasks_Json($ContactId) {
	//	//echo "!!!!!!!!!!!!!".$ContactId;
	//	$this->SQL_select_count = "SELECT COUNT(*) AS count	from Tasks
	//								  where AccId =?
	//								    and ModelType = 'Contact'
	//								    and ModelId = ?";
	//	$this->SQL_params_types_count = array('s','s');
	//	$this->SQL_params_count = array($_SESSION['AccId'], $ContactId);

	//	$this->SQL_select = "select Id,Start,End,Title,Task,Done
	//						 from Tasks
	//						  where AccId =?
	//						    and ModelType = 'Contact'
	//						    and ModelId = ?";
	//	$this->SQL_params_types = array('s','s');
	//	$this->SQL_params = array($_SESSION['AccId'], $ContactId);

	//	$data = null;
	//	try {
	//		$data = parent::getListJson();
	//	} catch(Exception $e) {
	//		echo 'Выброшено исключение: '.$e->getMessage();
	//	}

	//	echo json_encode($data);
	//}

	//getlist_Contact Actions list
//	public function getlist_ContactActions_Json($Id) {
//
//		require_once ('/home/zhevak/crmtour.com/app/application/mysql/db.php');
//		$mysqli = database::getInstance();
//        $db = $mysqli->getConnection();
//
//		$cols = array ("a.Id", "a.Type", "a.Address","a.Created", "a.UserId", "u.ManagerName");
//		$db->join("vUsers u", "a.UserId = u.Id", "LEFT");
//		$db->where('a.ModelType', "contact");
//		$db->where('a.AccId', $_SESSION['AccId']);
//		$db->where('a.ModelId', $Id);
//
//		$json = $db->JsonBuilder()->get("Actions as a", null, $cols);
//		$db->disconnect();
//
//		header('Content-Type: application/json; charset=utf-8');
//		return $json;
//
//	}


	public function deleteAjax($Id){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$address = $db->copy();
		$leads = $db->copy();
		$deals = $db->copy();
		$conToCon = $db->copy();
		//Удаляем контакт
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('Id', $Id);
		$db->delete('Contacts');
		//Удаляем телефоны
		$address->where('AccId', $_SESSION["AccId"]);
		$address->where('ContactId', $Id);
		$address->delete('Address');
		//Удаляем запросы
		$leads->where('AccId', $_SESSION["AccId"]);
		$leads->where('ContactId', $Id);
		$leads->delete('Leads');
		//Удаляем сделки
		$deals->where('AccId', $_SESSION["AccId"]);
		$deals->where('ContactId', $Id);
		$deals->delete('Deals');
		//Удаляем связи
		$conToCon->where('AccId', $_SESSION["AccId"]);
		$conToCon->where ("(ContactId = ? or ParrContactId = ?)", array($Id,$Id));
		$conToCon->delete('ContactToContact');


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


	public function addx($data){
			
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		if($data["BlackList"]=="on"){$data["BlackList"] ="1";} else {$data["BlackList"] = "0";}
		
		if($data["DateBirth"] == ""){$data["DateBirth"] = "00.00.0000";}
			
		$dataX = array ("AccId" 	 => $_SESSION['AccId'],
		                "LastName"   => $data["LastName"],
		                "FirstName"  => $data["FirstName"],
		                "MiddleName" => $data["MiddleName"],
		                "DateBirth"  => toFormat("d.m.Y","Y-m-d",$data["DateBirth"]),
		                "TaxCode"	 => $data["TaxCode"],
		                "Address"	 => $data["Address"],
		                "Comments"	 => $data["Comments"],
		                "BlackList"	 => $data["BlackList"],
		              //  "BlackList"	 => $data["BlackList"],
		                "Segment"	 => $data["Segment"],
		                "Source"	 => $data["Source"],
		                "UserId"	 => $data["UserId"],
		                "Sex"		 => $data["Sex"]
		);
		
		if(!isset($data["Id"]) || $data["Id"]==""){
			$id = $db->insert('Contacts', $dataX);
			if($id){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
				$data["ContactId"] = $id;
				$data["LastName"] = $dataX["LastName"];
				$data["FirstName"] = $dataX["FirstName"];
				$data["MiddleName"] = $dataX["MiddleName"];
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
		} else {
			$db->where ('AccId', $_SESSION['AccId']);
			$db->where ('Id', $data["Id"]);
			if ($db->update ('Contacts', $dataX)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
				$data["ContactId"] = $data["Id"];
				$data["LastName"] = $dataX["LastName"];
				$data["FirstName"] = $dataX["FirstName"];
				$data["MiddleName"] = $dataX["MiddleName"];
				
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
			}
			    
		}
		
		if($data["FormType"]=="Participant" && $data["ContactId"] >0){
				
			//Если заполнены паспортные данные, создаем новую запись и связываем её с клиентом.
			if($data["passSurName"] != ""){
				
				include_once "application/models/model_documents.php";
				$dataDoc = new Model_Documents();
				
				$data["LastAdd"] = "on";		//Основной
				$data["DocType"] = "intPass";	//Загран пасспорт
				
				$data = $dataDoc->add($data);
				
			}
			
			//Если заполнен телефон, создаем новую запись и связываем её с клиентом.
			if($data["PhoneMob"] != ""){
				
				include_once "application/models/model_address.php";
				$Address = new Model_Address();
				
				$addressData = [
					"ContactId" => $data["ContactId"],	
					"Type" => "PhoneMob",
					"Address" => $data["PhoneMob"],
					"Comments" => "",
					"Active" => "on",
					"Send" => "on",
					"LastAdd" => "on"
				];
				$addressPhoneMob = $Address->add($addressData);
			}
			
			//Если заполнен Email, создаем новую запись и связываем её с клиентом.
			if($data["EmailHome"] != "" ){
				include_once "application/models/model_address.php";
				$Address = new Model_Address();
				
				$addressData = [
					"ContactId" => $data["ContactId"],	
					"Type"      => "EmailHome",
					"Address"   => $data["EmailHome"],
					"Comments"  => "",
					"Active"    => "on",
					"Send"      => "on",
					"LastAdd"   => "on"
				];
				$addressEmailHome = $Address->add($addressData);

			}
			
		}
		
		$db->disconnect();
		return $data;
		
	}




	public function add($data)
	{
		$AccId = $_SESSION['AccId'];
		$Id = $data["Id"];

		$LastName = $data["LastName"];
		$FirstName = $data["FirstName"];
		$MiddleName = $data["MiddleName"];
		$DateBirth = $data["DateBirth"];
		$Comments = $data["Comments"];
		$Sex	=	$data["Sex"];
		$Segment = $data["Segment"];
		$TaxCode = $data["TaxCode"];
		$Address = $data["Address"];

		$UserId = $data["UserId"];
		$Source = $data["Source"];
		$FormType = $data["FormType"]; //Client/Participant

		$passSurName = mb_strtoupper($data["passSurName"]);
		$passGivenNames = mb_strtoupper($data["passGivenNames"]);
		$passSerNum = mb_strtoupper($data["passSerNum"]);
		$passValidDate = mb_strtoupper($data["passValidDate"]);
		$passIssued = mb_strtoupper($data["passIssued"]);

		$PhoneMob = $data["PhoneMob"];
		$EmailHome = $data["EmailHome"];

		$Biometric = "0";
		if($data["Biometric"]=="on"){$Biometric = "1";}
		$BlackList = "0";
		if($data["BlackList"]=="on"){$BlackList = "1";}


		//если нет Id записи создаём новую.
		if($Id==""){
			$this->SQL_insert = "INSERT INTO `Contacts`(AccId,LastName,FirstName,MiddleName,DateBirth,Sex,UserId,Comments,Segment,TaxCode,Address,BlackList,Source)
								 VALUES (?,?,?,?,STR_TO_DATE(?, '%d.%m.%Y'),?,?,?,?,?,?,?,?)";
			$this->SQL_insert_params_types = array('s','s','s','s','s','s','s','s','s','s','s','s','s');
			$this->SQL_insert_params = array($AccId,$LastName,$FirstName,$MiddleName,$DateBirth,$Sex,$UserId,$Comments,$Segment,$TaxCode,$Address,$BlackList,$Source);

		} else {
			$this->SQL_update = "UPDATE `Contacts`
								set `LastName` = ?,
									`FirstName` = ?,
									`MiddleName` = ?,
									`DateBirth` = STR_TO_DATE(?, '%d.%m.%Y'),
									`Comments` = ?,
									`Sex` = ?,
									`Segment` = ?,
									`TaxCode` = ?,
									`Address` = ?,
									`UserId` = ?,
									`BlackList` = ?,
									`Source`=?
								WHERE Id = ?";
			$this->SQL_update_params_types = array('s','s','s','s','s','s','s','s','s','s','s','s','s');
			$this->SQL_update_params = array($LastName,$FirstName,$MiddleName,$DateBirth,$Comments,$Sex,$Segment,$TaxCode,$Address,$UserId,$BlackList,$Source,$Id);
		}
		$data = null;
		try {
			$data = parent::add($Id);
			//echo "!!!".$data["rec_id"];
			//передаём новую полученную переменную для редиректа на созданного клиента.
			$data["ContactId"] = $data["rec_id"];
			$ContactId = $data["rec_id"];
			//Если запись была создана из формы создания участника, то создаем связанные, документы/телефоны/email
			if($FormType =="Participant" && $ContactId !=""){

				//Если заполнен телефон, создаем новую связь.
				if($PhoneMob!=""){

					$this->SQL_insert = "INSERT INTO `Address`(`AccId`,`ContactId`, `Type`, `Address`,`Active`,`Send`,`LastAdd`)
							VALUES (?,?,?,?,?,?,?)";
					$this->SQL_insert_params_types = array('s', 's', 's', 's', 's', 's', 's');
					$this->SQL_insert_params = array($AccId, $ContactId, 'PhoneMob', $PhoneMob, 1, 1, 1);

					try {
						parent::add();
					} catch(Exception $e) {
						echo 'Выброшено исключение: '.$e->getMessage();
					}
				}

				//Если заполнены паспортные данные, создаем новую связь.

				if($EmailHome!=""){

					$this->SQL_insert = "INSERT INTO `Address`(`AccId`,`ContactId`, `Type`, `Address`,`Active`,`Send`,`LastAdd`)
							VALUES (?,?,?,?,?,?,?)";
					$this->SQL_insert_params_types = array('s', 's', 's', 's', 's', 's', 's');
					$this->SQL_insert_params = array($AccId, $ContactId, 'EmailHome', $EmailHome, 1, 1, 1);

					try {
						parent::add();
					} catch(Exception $e) {
						echo 'Выброшено исключение: '.$e->getMessage();
					}
				}

				//Если заполнены паспортные данные, создаем новую запись в связаной сущности.
				if($passSurName !="" ){

					$this->SQL_insert = "INSERT INTO `Documents`(`AccId`, `ContactId`, `DocType`, `FirstName`, `LastName`, `SeriaNum`, `Valid`, `IssuedBy`,`Biometric`,`LastAdd`)
											VALUES (?,?,?,?,?,?,STR_TO_DATE(?, '%d.%m.%Y'),?, ?, ?)";
					$this->SQL_insert_params_types = array('s', 's', 's', 's', 's', 's','s','s','s','s');
					$this->SQL_insert_params = array($AccId, $ContactId, 'intPass', $passGivenNames, $passSurName, $passSerNum,$passValidDate,$passIssued,$Biometric,1);

					try {
						parent::add();
					} catch(Exception $e) {
						echo 'Выброшено исключение: '.$e->getMessage();
					}
				}
			}

		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}
		return $data;
	}




//	public function getMVGListJson($conId, $type, $getselected) {
//		$data = null;
//		 if ($type == "Contact") {
//		if (!$getselected) {
//			$this->SQL_select_count = "select count(*) as count
//														from (
//											  select vc.Id as id, '' as pickContactId, vc.FirstName as pickFirstName, vc.LastName as pickLastName, vc.MiddleName as pickMiddleName
//											from `vContacts` vc
//											where vc.AccId = ?
//											and vc.Id not in (select vcc.ParrContactId from `vContactToContact` vcc where vcc.AccId = ? and vcc.ContactId = ?)
//									  ) t  where 1 =1";
//			$this->SQL_params_types_count = array('s','s','s');
//			$this->SQL_params_count = array($_SESSION['AccId'],$_SESSION['AccId'],$conId);

//			$this->SQL_select = "select id, pickContactId, pickFirstName,pickLastName, pickMiddleName
//								  from (
//								  select vc.Id as id, '' as pickContactId, vc.FirstName as pickFirstName, vc.LastName as pickLastName, vc.MiddleName as pickMiddleName
//								from `vContacts` vc
//								where vc.AccId = ?
//								and vc.Id not in (select vcc.ParrContactId from `vContactToContact` vcc where vcc.AccId = ? and vcc.ContactId = ?)
//								  ) t where 1 =1";
//			$this->SQL_params_types = array('s','s','s');
//			$this->SQL_params = array($_SESSION['AccId'],$_SESSION['AccId'],$conId);

//			try {
//				$data = parent::getListJson();
//			} catch(Exception $e) {
//				echo 'Выброшено исключение: '.$e->getMessage();
//			}
//		} else {
//			$this->SQL_select = "SELECT Id as id, ContactId as pickContactId, ParrFirstName as pickFirstName, ParrLastName as pickLastName, ParrMiddleName as pickMiddleName, LinkType as pickLinkType
//				FROM  `vContactToContact`
//				WHERE AccId = ? AND ContactId = ?";
//			$this->SQL_params_types = array('s', 's');
//			$this->SQL_params = array($_SESSION['AccId'], $conId);
//			$selected_data = null;
//			try {
//				$selected_data = parent::get_row();
//			} catch(Exception $e) {
//				echo 'Выброшено исключение: '.$e->getMessage();
//			}
//			$data["selected"] = $selected_data;
//		}
//		 } else if ($type == "Legal") {
//		 	if (!$getselected) {
//		 		$this->SQL_select_count = "select count(*) as count
//											from (
//										  select vc.Id as id, '' as pickContactId, vc.LegalName as pickLegalName, vc.LegalCode as pickLegalCode
//										from  `vLegals` vc
//										where vc.AccId = ?
//										and vc.Id not in (select vcc.LegalId from `vLegalToContact_materialized` vcc where vcc.AccId = ? and vcc.ContactId = ?)
//										  ) t  where 1 =1";
//		 		$this->SQL_params_types_count = array('s','s','s');
//		 		$this->SQL_params_count = array($_SESSION['AccId'], $_SESSION['AccId'],$conId);

//		 		$this->SQL_select = "select id, pickContactId, pickLegalName, pickLegalCode
//	from (
//  select vc.Id as id, '' as pickContactId, vc.LegalName as pickLegalName, vc.LegalCode as pickLegalCode
//from  `vLegals` vc
//where vc.AccId = ?
//and vc.Id not in (select vcc.LegalId from `vLegalToContact_materialized` vcc where vcc.AccId = ? and vcc.ContactId = ?)
//  ) t  where 1=1";
//		 		$this->SQL_params_types = array('s','s','s');
//		 		$this->SQL_params = array($_SESSION['AccId'],$_SESSION['AccId'], $conId);
//		 		try {
//		 			$data = parent::getListJson();
//		 		} catch(Exception $e) {
//		 			echo 'Выброшено исключение: '.$e->getMessage();
//		 		}
//		 	} else {
//		 		$this->SQL_select = "select Id as id, ContactId as pickContactId, LegalName as pickLegalName, LegalCode as pickLegalCode, LinkType as pickLinkType
//		 		from `vLegalToContact_materialized` where AccId = ? and ContactId = ?";
//		 		$this->SQL_params_types = array('s','s');
//		 		$this->SQL_params = array($_SESSION['AccId'], $conId);
//		 		$selected_data = null;
//		 		try {
//		 			$selected_data = parent::get_row();
//		 		} catch(Exception $e) {
//		 			echo 'Выброшено исключение: '.$e->getMessage();
//		 		}
//		 		$data["selected"] = $selected_data;
//		 	}
//		 }
//		echo json_encode($data);
//	}

//	public function editMVGList($rowId, $linkType) {
//		$res = false;
//		$conn = parent::getConnection();
//		if (!$conn->connect_error) {
//			$stmt = $conn->prepare("update ContactToContact set LinkType=? where Id=? And AccId=?");
//			$stmt->bind_param('sss', $LinkTypeBind, $RowIdBind, $AccIdBind);

//			$RowIdBind = $rowId;
//			$LinkTypeBind = $linkType;
//			$AccIdBind = $_SESSION['AccId'];
//			if ($stmt->execute())
//				$res = true;
//			else
//				$res = false;
//		}
//		$conn->close();

//		return $res;
//	}

//	public function editMVGListLegal($rowId, $linkType) {
//		$res = false;
//		$conn = parent::getConnection();
//		if (!$conn->connect_error) {
//			$stmt = $conn->prepare("update LegalToContact set LinkType=? where Id=? And AccId=?");
//			$stmt->bind_param('sss', $LinkTypeBind, $RowIdBind, $AccIdBind);

//			$RowIdBind = $rowId;
//			$LinkTypeBind = $linkType;
//			$AccIdBind = $_SESSION['AccId'];
//			if ($stmt->execute())
//				$res = true;
//			else
//				$res = false;
//		}
//		$conn->close();

//		return $res;
//	}


//	public function getMVGListJson1($conId, $type) {
//		if ($type == "Legal") {
//			$this->SQL_select = "SELECT Id as id, '' as pickContactId, LegalName as pickLegalName, LegalCode as pickLegalCode
//				FROM  `vLegals`
//				WHERE AccId = ?";
//			$this->SQL_params_types = array('s');
//			$this->SQL_params = array($_SESSION['AccId']);
//			$all_data = null;
//			try {
//				$all_data = parent::get_row();
//			} catch(Exception $e) {
//				echo 'Выброшено исключение: '.$e->getMessage();
//			}

//			$this->SQL_select = "SELECT LegalId as id, ContactId as pickContactId, LegalName as pickLegalName, LegalCode as pickLegalCode
//				FROM  `vLegalToContact_materialized`
//				WHERE AccId = ? AND ContactId = ?";
//			$this->SQL_params_types = array('s', 's');
//			$this->SQL_params = array($_SESSION['AccId'], $conId);
//			$selected_data = null;
//			try {
//				$selected_data = parent::get_row();
//			} catch(Exception $e) {
//				echo 'Выброшено исключение: '.$e->getMessage();
//			}
			//print_r($data);
//			echo json_encode(array("all"=>$all_data, "selected" => $selected_data));
//		} else if ($type == "Contact") {
//			$this->SQL_select = "SELECT Id as id, '' as pickContactId, FirstName as pickFirstName, LastName as pickLastName, MiddleName as pickMiddleName
//				FROM  `vContacts`
//				WHERE AccId = ?";
//			$this->SQL_params_types = array('s');
//			$this->SQL_params = array($_SESSION['AccId']);
//			$all_data = null;
//			try {
//				$all_data = parent::get_row();
//			} catch(Exception $e) {
//				echo 'Выброшено исключение: '.$e->getMessage();
//			}

//			$this->SQL_select = "SELECT ParrContactId as id, ContactId as pickContactId, ParrFirstName as pickFirstName, ParrLastName as pickLastName, ParrMiddleName as pickMiddleName
//				FROM  `vContactToContact`
//				WHERE AccId = ? AND ContactId = ?";
//			$this->SQL_params_types = array('s', 's');
//			$this->SQL_params = array($_SESSION['AccId'], $conId);
//			$selected_data = null;
//			try {
//				$selected_data = parent::get_row();
//			} catch(Exception $e) {
//				echo 'Выброшено исключение: '.$e->getMessage();
//			}
			//print_r($data);
//			echo json_encode(array("all"=>$all_data, "selected" => $selected_data));
//		}
//	}

//	public function delMVGList($contactId, $rowId, $type) {
//		$res = false;
//		$conn = parent::getConnection();
//		if (!$conn->connect_error) {
//			if ($type == "Legal") {
				//$stmt = $conn->prepare("delete from LegalToContact where Id = ? and ContactId = ?");
//				$stmt = $conn->prepare("delete from LegalToContact where Id = ?");
				//$stmt->bind_param('ss', $RowIdBind, $ContactIdBind);
//				$stmt->bind_param('s', $rowId);

//				$RowIdBind = $rowId;
//				$ContactIdBind = $contactId;
//				if ($stmt->execute())
//					$res = true;
//				else
//					$res = false;
//			} else if ($type == "Contact") {
				//$stmt = $conn->prepare("delete from ContactToContact where Id = ? and ContactId = ?");
//				$stmt = $conn->prepare("delete from ContactToContact where Id = ?");
				//$stmt->bind_param('ss', $RowIdBind, $ContactIdBind);
//				$stmt->bind_param('s', $rowId);

//				$RowIdBind = $rowId;
//				$ContactIdBind = $contactId;
//				if ($stmt->execute())
//					$res = true;
//				else
//					$res = false;
//			}
//		}
//		$conn->close();

//		return $res;
//	}

//	public function addMVGList($contactId, $rowId, $type) {
//		$res = false;
//		$conn = parent::getConnection();
//		if (!$conn->connect_error) {
//			if ($type == "Legal") {
//				$stmt = $conn->prepare("insert into LegalToContact(LegalId, ContactId, AccId) values(?, ?, ?)");
//				$stmt1 = $conn->prepare("insert into LegalToContact(LegalId, ContactId, AccId) values(?, ?, ?)");
//				$stmt->bind_param('sss', $RowIdBind, $ContactIdBind, $AccIdBind);
//				$stmt1->bind_param('sss', $ContactIdBind,$RowIdBind, $AccIdBind);

//				$RowIdBind = $rowId;
//				$ContactIdBind = $contactId;
//				$AccIdBind = $_SESSION['AccId'];
//				if ($stmt->execute()){
//					if($stmt1->execute()){
//						$res = true;
//					}
//				}
//				else
//					$res = false;
//			} else if ($type == "Contact") {
//				$stmt = $conn->prepare("insert into ContactToContact(ParrContactId, ContactId, AccId) values(?, ?, ?)");
//				$stmt1 = $conn->prepare("insert into ContactToContact(ParrContactId, ContactId, AccId) values(?, ?, ?)");
//				$stmt->bind_param('sss', $RowIdBind, $ContactIdBind, $AccIdBind);
//				$stmt1->bind_param('sss', $ContactIdBind,$RowIdBind, $AccIdBind);

//				$RowIdBind = $rowId;
//				$ContactIdBind = $contactId;
//				$AccIdBind = $_SESSION['AccId'];
//				if ($stmt->execute()){
//					if ($stmt1->execute()){
//						$res = true;
//					}
//				}
//				else
//					$res = false;
//			}
//		}
//		$conn->close();

//		return $res;
//	}

//	public function addPhoto($contactId,$rawFileData, $fileName, $fileType, $fileSize) {
		//return $rawFileData;
//		$res = false;
//		$conn = parent::getConnection();
//		if (!$conn->connect_error) {
//			$stmt = $conn->prepare("select count(*) as cnt from ContactsAttachments where ContactId = ?");
//			$stmt->bind_param('s', $AccountNameBind);
//			$AccountNameBind = $contactId;
//			if ($stmt->execute()) {
//				$cnt = 0;
//				$stmt->bind_result($cnt);
//				$stmt->fetch();
//				$stmt->close();
//				if ( $cnt > 0 ) {
					//echo "DSDS1";
//					$stmt = $conn->prepare("update ContactsAttachments set `FileName`=?, `FileType`=?, `FileSize`=?, `FileContent`=? where ContactId=?");
//					$stmt->bind_param('sssss', $fileNameBind, $fileTypeBind, $fileSizeBind, $rawDataBind, $ContactIdBind);
//					$fileNameBind = $fileName;
//					$fileTypeBind = $fileType;
//					$fileSizeBind = $fileSize;
//					$rawDataBind = $rawFileData;
//					$ContactIdBind = $contactId;
//				} else {
//					$stmt = $conn->prepare("insert into ContactsAttachments(ContactId, AccId,`FileName`, `FileType`, `FileSize`, `FileContent`)
//					values(?, ?, ?, ?, ?, ?)");
//					$stmt->bind_param('ssssss', $ContactIdBind, $AccIdBind,$fileNameBind, $fileTypeBind, $fileSizeBind, $rawDataBind);

//					$ContactIdBind = $contactId;
//					$AccIdBind = $_SESSION['AccId'];
//					$fileNameBind = $fileName;
//					$fileTypeBind = $fileType;
//					$fileSizeBind = $fileSize;
//					$rawDataBind = $rawFileData;
//				}
//				if ($stmt->execute())
//					$res = true;
//				else
//					$res = false;
//			}
//		}
//		return "/contacts/getphoto?Id=".$contactId;
//	}

//	public function getPhoto($contactId) {
//		$file_data = null;

//					$this->SQL_select = "SELECT ContactId, AccId,`FileName`, `FileType`, `FileSize`, `FileContent`
//							FROM  `ContactsAttachments`
//							WHERE AccId = ? AND ContactId = ?";
//					$this->SQL_params_types = array('s', 's');
//					$this->SQL_params = array($_SESSION['AccId'], $contactId);

//				try {
//					$file_data = parent::get_row();
//				} catch(Exception $e) {
//					echo 'Выброшено исключение: '.$e->getMessage();
//				}

//		return $file_data[0];
//	}

//	public function delPhoto($contactId) {
//		$conn = parent::getConnection();
//		if (!$conn->connect_error) {
//			$stmt = $conn->prepare("delete from ContactsAttachments where ContactId = ?");
//			$stmt->bind_param('s', $AccountNameBind);
//			$AccountNameBind = $contactId;
//			if ($stmt->execute()) {
//			}
//		}
//	}

	public function deleteDeal($contactId, $dealId) {
		$res = false;
		$conn = parent::getConnection();
		if (!$conn->connect_error) {
			$stmt = $conn->prepare("delete from DealParticipants where DealId = ?");
			$stmt->bind_param('s', $RowIdBind);

			$RowIdBind = $dealId;
			if ($stmt->execute())
				$res = true;
			else
				$res = false;

			$stmt->close();
			$stmt = $conn->prepare("delete from Deals where Id = ?");
			$stmt->bind_param('s', $RowIdBind);
			$RowIdBind = $dealId;
			if ($stmt->execute())
				$res = true;
			else
				$res = false;
			$stmt->close();
		}
		$conn->close();

		return $res;
	}

	public function get_AmountContacts($AccId,$Status){
		$this->SQL_select = "select count(Id) as AmountContacts
							 from Contacts
							 where AccId = ?
							  and Segment = ?";
		$this->SQL_params_types = array('s','s');
		$this->SQL_params = array($AccId,$Status);
		$data = null;
		try {
			$data = parent::get_row();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}
		return $data;
	}

	public function getListJson($segment) {

		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$db->where("AccId", $_SESSION["AccId"]);
		if(!empty($segment)){
			$db->where("Segment", $segment);
		}
		$json = $db->JsonBuilder()->get("vContacts_materialized", null, "*");
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	public function getlistbirthdayJson() {

		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$db->where("AccId", $_SESSION["AccId"]);

		if($_SESSION['UserRole'] != "admin"){
			$db->where("UserId", $_SESSION["UserId"]);
		}
		$db->where("DATEDIFF(DATE_FORMAT(DateBirthOriginal, CONCAT(YEAR(CURDATE()),'-%m-%d')), CURDATE())", Array (-1, 30),"between");
		//$db->orderBy ("DATEDIFF(DATE_FORMAT(DateBirthOriginal, CONCAT(YEAR(CURDATE()),'-%m-%d')), CURDATE())","asc");

		$json = $db->JsonBuilder()->get("vContacts_materialized", null, "*");
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}


	public function addColumn($data){

		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();

		$dataX = Array($data["columnName"] => $data["value"]);

		if(!empty($data["Id"])){
			$db->where("AccId", $_SESSION["AccId"]);
			$db->where ('Id',$data["Id"]);
			if ($db->update ('Contacts', $dataX)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
			}
		}
		$db->disconnect();
		header('Content-Type: application/json; charset=utf-8');
		return json_encode($data);
	}

	//Новый функционал отображения связанных контактов с клиентом
	public function get_LinkedContactRow($Id){
		
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Id", $Id);
		//$cols = array ("Id", "Name","Description", "Status","DocUrl","UserId");
		$data = $db->get("ContactToContact", null, "*");
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	public function getLinkedContacts($ContactId){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
        $db->where("cc.AccId", $_SESSION['AccId']);
		$db->where("cc.ContactId",$ContactId);
		
		$db->join("Contacts as c", "cc.AccId = c.AccId and cc.ParrContactId = c.Id", "LEFT");
		
		$json = $db->JsonBuilder()->get("ContactToContact as cc", null, "cc.Id, cc.ParrContactId, c.LastName, c.FirstName, c.MiddleName, cc.LinkType,  DATE_FORMAT(c.DateBirth,'%d.%m.%Y') DateBirth");
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	public function deleteLinkedContactsAjax($ContactId,$ParrContactId){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$db_parr = $mysqli->getConnection();
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('ContactId', $ContactId);
		$db->where('ParrContactId', $ParrContactId);
		
		$db->delete('ContactToContact');
		
		if ($db->getLastErrno() === 0){
			$db_parr->where('AccId', $_SESSION["AccId"]);
			$db_parr->where('ContactId', $ParrContactId);
			$db_parr->where('ParrContactId', $ContactId);
			$db_parr->delete('ContactToContact');
			
			if ($db_parr->getLastErrno() === 0){
				$data["status"] ="success";
				$data["message"] ="Успешно удалена запись";
			} else {
				$data["status"] ="error";
				$data["message"] = $db->getLastError();
			}
		} else {
			$data["status"] ="error";
			$data["message"] = $db->getLastError();
		}
		$db_parr->disconnect();
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return json_encode($data);
	}
	
	public function getLinkedContactsListItems($Search,$ContacId) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("c.Id id", "CONCAT(c.LastName, ' ', c.FirstName, ' ', c.MiddleName, ' - ', DATE_FORMAT(c.DateBirth,'%d.%m.%Y')) text");
		$db->where('c.AccId', $_SESSION['AccId']);
		$db->where("(c.FirstName like ? or c.LastName like ?  or c.MiddleName like ?)", array('%'.$Search.'%','%'.$Search.'%','%'.$Search.'%'));
		$db->join("ContactToContact as cc", "c.AccId = cc.AccId and c.Id = cc.ContactId and cc.ParrContactId = ".$ContacId, "LEFT");
		$db->where('cc.Id', NULL, 'IS');
		$db->orderBy('c.LastName', 'ASC');
		
		$json = $db->JsonBuilder()->get("Contacts c", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	
	
	public function setLinkedContact($data){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db_parr = $mysqli->getConnection();

    	//Проверяем есть ли связь между клиентом и участником
		$db->where('AccId', $_SESSION['AccId']);
		$db->where('ContactId', $data["ContactId"]);
		$db->where('ParrContactId', $data["ParrContactId"]);
    	$data["ConToParId"] = $db->getValue("ContactToContact", "Id");
					
		if($data["ConToParId"] =="" && ($data["ContactId"] != $data["ParrContactId"])){
			$dataX = array ("AccId" 		=> $_SESSION['AccId'],
							"ContactId" 	=> $data["ContactId"],
							"ParrContactId" => $data["ParrContactId"],
							"LinkType"		=> $data["LinkType"]
			);
			
			$data["ConToParId"] = $db->insert('ContactToContact', $dataX);
		}
		
		//Проверяем есть ли связь между участником и клиентом
		$db_parr->where('AccId', $_SESSION['AccId']);
		$db_parr->where('ContactId', $data["ParrContactId"]);
		$db_parr->where('ParrContactId', $data["ContactId"]);
    	$data["ParToConId"] = $db->getValue("ContactToContact", "Id");
					
		if($data["ParToConId"] =="" && ($data["ParrContactId"] != $data["ContactId"])){
			$dataXX = array("AccId" 		=> $_SESSION['AccId'],
		                	"ContactId" 	=> $data["ParrContactId"],
		                	"ParrContactId" => $data["ContactId"],
		                	"LinkType"		=> $data["LinkType"]
			);
			
			$data["ParToConId"] = $db_parr->insert('ContactToContact', $dataXX);
		}
		
		if ($db->getLastErrno() === 0){
			if ($db_parr->getLastErrno() === 0){
				$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена!";
			} else {
				$data["status"] ="error";
				$data["message"] = $db->getLastError();
			}
		} else {
			$data["status"] ="error";
			$data["message"] = $db->getLastError();
		}
		$db_parr->disconnect();
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return json_encode($data);
	}
	
	
	public function getLinkedLegals($ContactId){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
        $db->where("lc.AccId", $_SESSION['AccId']);
		$db->where("lc.ContactId",$ContactId);
		
		$db->join("Legals as l", "lc.AccId = l.AccId and lc.LegalId = l.Id", "LEFT");
		
		$json = $db->JsonBuilder()->get("LegalToContact as lc", null, "lc.Id, lc.LegalId, l.LegalName, l.LegalCode, lc.LinkType");
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
		//Новый функционал отображения связанных контактов с клиентом
	public function get_LinkedLegalRow($Id){
		
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Id", $Id);
		//$cols = array ("Id", "Name","Description", "Status","DocUrl","UserId");
		$data = $db->get("LegalToContact", null, "*");
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	public function deleteLinkedLegalsAjax($LegalId,$ContactId){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('LegalId', $LegalId);
		$db->where('ContactId', $ContactId);
		
		$db->delete('LegalToContact');
		
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
	
	public function getLinkedLegalsListItems($Search,$ContacId) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("l.Id id", "CONCAT(l.LegalName, ' - ', l.LegalCode, ' ') text");
		$db->where('l.AccId', $_SESSION['AccId']);
		$db->where("(l.LegalName like ? or l.LegalCode like ?)", array('%'.$Search.'%','%'.$Search.'%'));
		$db->join("LegalToContact as lc", "l.AccId = lc.AccId and l.Id = lc.LegalId and lc.ContactId = ".$ContacId, "LEFT");
		$db->where('lc.Id', NULL, 'IS');
		$db->orderBy('l.LegalName', 'ASC');
		
		$json = $db->JsonBuilder()->get("Legals l", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}	
	
	public function setLinkedLegal($data){
			
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db_parr = $mysqli->getConnection();
        
		$dataX = array ("AccId" 		=> $_SESSION['AccId'],
		                "ContactId" 	=> $data["ContactId"],
		                "LegalId"		=> $data["LegalId"],
		                "LinkType"		=> $data["LinkType"]
		);
		
		$db->insert('LegalToContact', $dataX);
		
		if ($db->getLastErrno() === 0){
				$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена!";
		} else {
			$data["status"] ="error";
			$data["message"] = $db->getLastError();
		}
		$db_parr->disconnect();
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return json_encode($data);
	}
	
	public function getContactPhones($ContactId){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
        $db->where("ad.AccId", $_SESSION['AccId']);
		$db->where("ad.ContactId",$ContactId);
		$db->where("dic.SubType",'Phone');
		$db->orderBy('ad.type', 'ASC');
		$db->orderBy('ad.LastUpdate', 'DESC');
		
		$db->join("Dictionaries as dic", "ad.AccId = dic.AccId and ad.type = dic.lic and dic.type = 'AddressType' and dic.lang = 'ru_RU'", "LEFT");
		
		$json = $db->JsonBuilder()->get("Address as ad", null, "ad.Id, ad.Type, ad.Address, ad.Active, ad.Send, ad.Comments, ad.UserId, dic.name as TypeName, ad.LastAdd");
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	public function getContactEmails($ContactId){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
        $db->where("ad.AccId", $_SESSION['AccId']);
		$db->where("ad.ContactId",$ContactId);
		$db->where("dic.SubType",'Email');
		$db->orderBy('ad.type', 'ASC');
		$db->orderBy('ad.LastUpdate', 'DESC');
		
		$db->join("Dictionaries as dic", "ad.AccId = dic.AccId and ad.type = dic.lic and dic.type = 'AddressType' and dic.lang = 'ru_RU'", "LEFT");
		
		$json = $db->JsonBuilder()->get("Address as ad", null, "ad.Id, ad.Type, ad.Address, ad.Active, ad.Send, ad.Comments, ad.UserId, dic.name as TypeName, ad.LastAdd");
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}

	public function getContactsListItems($Search) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("c.Id id", "CONCAT(c.LastName, ' ', c.FirstName, ' ', c.MiddleName, ' - ', DATE_FORMAT(c.DateBirth,'%d.%m.%Y')) text");
		$db->where('c.AccId', $_SESSION['AccId']);
		$db->where("(c.FirstName like ? or c.LastName like ?  or c.MiddleName like ?)", array('%'.$Search.'%','%'.$Search.'%','%'.$Search.'%'));
		//$db->join("LegalToContact as lc", "l.AccId = lc.AccId and l.Id = lc.LegalId and lc.ContactId = ".$ContacId, "LEFT");
		//$db->where('c.Id', $ContactId, '!=');
		$db->orderBy('c.Created', 'DESC');
		
		$json = $db->JsonBuilder()->get("Contacts c", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	public function getDealParticipansListItems($Search,$DealId) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("c.Id id", "CONCAT(c.LastName, ' ', c.FirstName, ' ', c.MiddleName, ' - ', DATE_FORMAT(c.DateBirth,'%d.%m.%Y'),' ', u.ManagerName  ) text");
		$db->where('c.AccId', $_SESSION['AccId']);
		$db->where("(c.FirstName like ? or c.LastName like ? or c.MiddleName like ?)", array('%'.$Search.'%','%'.$Search.'%','%'.$Search.'%'));
		$db->join("DealParticipants as dp", "c.AccId = dp.AccId and c.Id = dp.ContactId", "LEFT");
		$db->joinWhere("DealParticipants as dp", "dp.DealId ", $DealId);
		$db->join("vUsers_materialized as u", "c.AccId = u.AccId and c.UserId = u.Id", "LEFT");
		
		//$db->join("Documents as d", "c.AccId = d.AccId and c.Id = d.ContactId ", "LEFT");
		//$db->joinWhere("Documents as d", "d.DocType = 'intPass'");
		//$db->joinWhere("Documents as d", "d.LastAdd = '1'");
		$db->where('dp.Id', null, 'is');
		$db->orderBy('c.Created', 'DESC');
		
		$json = $db->JsonBuilder()->get("Contacts c", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}	
	
}
?>