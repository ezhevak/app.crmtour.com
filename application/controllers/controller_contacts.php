<?php

class Controller_Contacts extends Controller
{
	function __construct()
	{
		$this->model = new Model_Contacts();
		$this->view = new View($this->model->ModelClass);
	}
	
	function action_index(){
		
		$getdata = $this->model->get_AmountContacts($_SESSION['AccId'],"NoSegment");
		$data[0]["AmountNewContacts"] = $getdata[0]["AmountContacts"];
		$getdata = $this->model->get_AmountContacts($_SESSION['AccId'],"Prospective");
		$data[0]["AmountProspectiveContacts"] = $getdata[0]["AmountContacts"];
		$getdata = $this->model->get_AmountContacts($_SESSION['AccId'],"Active");
		$data[0]["AmountActiveContacts"] = $getdata[0]["AmountContacts"];
		$getdata = $this->model->get_AmountContacts($_SESSION['AccId'],"VIP");
		$data[0]["AmountVIPContacts"] = $getdata[0]["AmountContacts"];
	
		
		$this->view->generate('contacts/contacts_view.php', 'template_view.php', $data, ["datatables","confirm"], ["contacts/contacts_index"]);
	}
	
	function action_export() {
		parent::action_export("Contacts");
	}
	
	
	
	function action_getListSegment(){
		$this->model->getListSegmentJson($_GET["segment"]);
	}
	
	function action_getlist(){
		$data = $this->model->getListJson($_GET["segment"]);
		echo $data;
	}
	
	//Выгрузка именинников за 30 дней.
	function action_getlistbirthday(){
		$data = $this->model->getlistbirthdayJson();
		echo $data;
	}
	//Выгрузка связанных с контактом юр лиц
	function action_getlist_linked_legal()
	{
		$data = $this->model->getlist_linked_legalJson($_GET["ContactId"]);
		echo $data;
	}
	//Выгрузка связанных с контактом запросов
	function action_getlist_leads()
	{
			$this->model->getlist_ContactLeads_Json($_GET["ContactId"]);
	}
	
	//Выгрузка связанных с контактом документов
	function action_getlist_ContactDoc(){
		$this->model->getlist_ContactDocuments_Json($_GET["ContactId"]);

	}	
	//Выгрузка связанных с контактом Email
	function action_getlist_ContactEmails()
	{
		$this->model->getlist_ContactEmails_Json($_GET["ContactId"]);
	}
	
	//Выгрузка связанных с контактом Deals
	function action_getlist_ContactDeals(){
		//echo $_GET["ContactId"];
		$data = $this->model->getlist_ContactDeals_Json($_GET["ContactId"]);
		echo $data;
	}
	
	//Выгрузка связанных с контактом Deals
	function action_getlist_ContactAddresses()
	{
		$this->model->getlist_ContactAddresses_Json($_GET["ContactId"]);
	}

	function action_delete() {
		$data = $this->model->deleteAjax($_GET["Id"]);
		echo $data;
	}
	
	function action_getlist_contact_events()
	{
		$this->model->getlist_contact_events_Json($_GET["ContactId"]);
	}

	function action_save(){
		$array = [
			"FormType"=>  $_POST["FormType"],//Технический параметр. Client/Parcitipant.
											 //Запускает разные процессы сохранения данных в моделе.
			"Id" => $_POST["Id"],
			"LastName" => $_POST['contLastName'],
			"FirstName" => $_POST['contFirstName'],
			"MiddleName" => $_POST['contMiddleName'],
			"DateBirth" => $_POST['contDateBirth'],
			"Comments" => $_POST['contComments'],
			"Segment" => $_POST["contSegment"],
			"TaxCode" => $_POST["contTaxCode"],
			"UserId" => $_POST['contUserId'],
			"Source" => $_POST['contSource'],
			//Данные в эту часть прилетают из формы добавления участников к сделке.
			"link_Id" => $_POST['link_Id'],
			"link_type" => $_POST['link_type'],
			"PhoneMobOld" => $_POST['PhoneMobOld'],
			"PhoneMob" => $_POST['PhoneMob'],
			"PhoneHomeOld" => $_POST['PhoneHomeOld'],
			"PhoneHome" => $_POST['PhoneHome'],
			"EmailHomeOld" => $_POST['EmailHomeOld'],
			"EmailHome" => $_POST['EmailHome'],
			//"EmailWorkOld" => $_POST['EmailWorkOld'],
			//"EmailWork" => $_POST['EmailWork'],
			"Sex" => $_POST['Sex'],
			"Address" => $_POST['contAddress'],
			"BlackList" => $_POST["BlackList"],
			
			"DateBirthOld" => $_POST['DateBirthOld'],
			"passIdOld" => $_POST['passIdOld'],
			"passSurNameOld" => $_POST['passSurNameOld'],
			"passGivenNamesOld" => $_POST['passGivenNamesOld'],
			"passSerNumOld" => $_POST['passSerNumOld'],
			"passIssuedDateOld" =>$_POST['passIssuedDateOld'],
			"passValidDateOld" => $_POST['passValidDateOld'],
			"passIssuedOld" => $_POST['passIssuedOld'],
			"passBiometricOld" => $_POST["passBiometricOld"],
			
			"passSurName" => $_POST['passSurName'],
			"passGivenNames" => $_POST['passGivenNames'],
			"passSerNum" => $_POST['passSerNum'],
			"passIssuedDate" =>$_POST['passIssuedDate'],
			"passValidDate" => $_POST['passValidDate'],
			"passIssued" => $_POST['passIssued'],
			"passBiometric" => $_POST["passBiometric"]
		];
		
		$data = $this->model->add($array);
		
		//Добавляем загран паспорта по контакту
		if($data["ContactId"] !="" && ($array["passSurName"]	!= $array["passSurNameOld"])   ||
									   $array["passGivenNames"] != $array["passGivenNamesOld"] ||
									   $array["passSerNum"] 	!= $array["passSerNumOld"]	   ||
									   $array["passIssuedDate"] != $array["passIssuedDateOld"] ||
									   $array["passValidDate"]	!= $array["passValidDateOld"]  ||
									   $array["passIssued"] 	!= $array["passIssuedOld"]	   ||
									   $array["passBiometric"]	!= $array["passBiometricOld"]
		){

			include_once "application/models/model_documents.php";
			$Documents = new Model_Documents();
			
			//Если серия и номер паспорта не изменились, то передаём Id документа для его обновления.
			//Если поменялся, то передаём пустое значение и будет создан новый документ.
			$docId = "";
			if ($array["passSerNum"] == $array["passSerNumOld"]){
				$docId = $array["passIdOld"];
			}
			
			$documentsData = [
				"Id"			  => $docId,
				"DocType"   	  => "intPass",	
				"ContactId" 	  => $data["ContactId"],
				"passGivenNames"  => $array["passGivenNames"],
				"passSurName"     => $array["passSurName"],
				"passSerNum"	  => $array["passSerNum"],
				"passValidDate"   => $array["passValidDate"],
				"passIssued"      => $array["passIssued"],
				"passIssuedDate"  => $array["passIssuedDate"],
				"passBiometric"   => $array["passBiometric"],
				"LastAdd"         => "on"//$data["LastAdd"]
			];
			$documentsPass = $Documents->add($documentsData);
		}
		
		
		
		
		//Добавляем мобильный номер телефона в базу напрямую из карточки контакта
		if($data["ContactId"] !="" && (($array["PhoneMob"] != $array["PhoneMobOld"]) && $array["PhoneMob"] !="")){
			
			include_once "application/models/model_address.php";
			$Address = new Model_Address();
			
			$addressData = [
				"ContactId" => $data["ContactId"],	
				"Type" => "PhoneMob",
				"Address" => $array["PhoneMob"],
				"Comments" => "",
				"Active" => "on",
				"Send" => "on",
				"LastAdd" => "on"
			];
			$addressPhoneMob = $Address->add($addressData);
		}
		
		//Добавляем допашний номер телефона в базу напрямую из карточки контакта
		if($data["ContactId"] !="" && (($array["PhoneHome"] != $array["PhoneHomeOld"]) && $array["PhoneHome"] !="")){
			
			include_once "application/models/model_address.php";
			$Address = new Model_Address();
			
			$addressData = [
				"ContactId" => $data["ContactId"],	
				"Type"      => "PhoneHome",
				"Address"   => $array["PhoneHome"],
				"Comments"  => "",
				"Active"    => "on",
				"Send"      => "",
				"LastAdd"   => "on"
			];
			
			$addressPhonHome = $Address->add($addressData);
		}
		
		//Добавляем допашний Email телефона в базу напрямую из карточки контакта
		if($data["ContactId"] !="" && (($array["EmailHome"] != $array["EmailHomeOld"]) && $array["EmailHome"] !="")){
			
			include_once "application/models/model_address.php";
			$Address = new Model_Address();
			
			$addressData = [
				"ContactId" => $data["ContactId"],	
				"Type"      => "EmailHome",
				"Address"   => $array["EmailHome"],
				"Comments"  => "",
				"Active"    => "on",
				"Send"      => "on",
				"LastAdd"   => "on"
			];
			$addressEmailHome = $Address->add($addressData);
		}

		if ($data["status"] == "success") {
			header('Location: /contacts/add?Id='.$data["ContactId"]);
		} else {
			$this->action_add($_POST["Id"]);
		}
	}
	
	//Новый функционал 27.02.2020
	function action_save_ajax(){
		if($_POST){
			$array = [
				"FormType"	=>  $_POST["FormType"],//Технический параметр. client/parcitipant.//Запускает разные процессы сохранения данных в моделе.
												   
				"Id"		=> $_POST["Id"],
				"LastName"	=> $_POST['contLastName'],
				"FirstName" => $_POST['contFirstName'],
				"MiddleName"=> $_POST['contMiddleName'],
				"DateBirth" => $_POST['contDateBirth'],
				"Address"	=> $_POST['contAddress'],
				"Comments"	=> $_POST['contComments'],
				"Segment"	=> $_POST["contSegment"],
				"TaxCode"	=> $_POST["contTaxCode"],
				"UserId"	=> $_POST['contUserId'],
				"Source"	=> $_POST['contSource'],
				
				//"PhoneMobOld" => $_POST['PhoneMobOld'],
				"PhoneMob"  => $_POST['PhoneMob'],
				//"PhoneHomeOld" => $_POST['PhoneHomeOld'],
				//"PhoneHome" => $_POST['PhoneHome'],
				//"EmailHomeOld" => $_POST['EmailHomeOld'],
				"EmailHome" => $_POST['EmailHome'],
				"Sex"		=> $_POST['Sex'],
				"BlackList" => $_POST["BlackList"],
				
				//"DateBirthOld"	 => $_POST['DateBirthOld'],
				//"passIdOld" => $_POST['passIdOld'],
				//"passSurNameOld" => $_POST['passSurNameOld'],
				//"passGivenNamesOld" => $_POST['passGivenNamesOld'],
				//"passSerNumOld"  => $_POST['passSerNumOld'],
				//"passIssuedDateOld" =>$_POST['passIssuedDateOld'],
				//"passValidDateOld" => $_POST['passValidDateOld'],
				//"passIssuedOld"  => $_POST['passIssuedOld'],
				//"passBiometricOld" => $_POST["passBiometricOld"],
				
				
				"DocType"		 => $_POST['passDocType'],
				"passSurName"	 => $_POST['passSurName'],
				"passGivenNames" => $_POST['passGivenNames'],
				"passSerNum"     => $_POST['passSerNum'],
				"passIssuedDate" =>$_POST['passIssuedDate'],
				"passValidDate"  => $_POST['passValidDate'],
				"passIssued"     => $_POST['passIssued'],
				"passBiometric"  => $_POST["passBiometric"],
				
				"File"			 => $_FILES['fileUploadName']
			];
			
			$data = $this->model->addx($array);
		} else {
			$data["status"] ="error";
			$data["message"] ="Где-то по дороге Вы потеряли данные для сохранения";
		}
		
		
		echo json_encode($data);;
	}
	
	
	
	
	
	
	
	
	
	
	
//	function action_addd($ContactId)
//	{
//		$this->view->generate('contacts/add_participant.php', 'template_view.php', $data, ["datepicker", "jqgrid","validate","inputmask","tinymce","icheck","datatables","confirm"], ["contacts/contacts_edit","lib/bootstrap-jqgrid-mvg", "contacts/pick_legal","contacts/contacts_actions"]);
//		
//	}
	
	function action_add($ContactId){
		if (isset($ContactId)){
			$Id = $ContactId;
		} else{
			$Id = $_GET["Id"];
		}
			
		$data = $this->model->get_row($Id);
		//Дополнительные выгрузки. Телефоны,Emails,Documents
		$dataDocuments = $this->model->get_document_row($Id);
		$dataPhoneMob = $this->model->get_phones_row($Id,'PhoneMob');
		$dataPhoneHome = $this->model->get_phones_row($Id,'PhoneHome');
		//$dataPhoneTravelSim = $this->model->get_phones_row($Id,'PhoneTravelSim');
		$dataEmailHome = $this->model->get_phones_row($Id,'EmailHome');
		//$dataEmailWork = $this->model->get_phones_row($Id,'EmailWork');
		
		
		//Проверяем наличие профиля/настройки отправки писем
		//include_once "application/models/model_communications.php";
		//$Communications = new Model_Communications();
		//$dataCommunications = $Communications->get_EmailProfile();
		
		//$data[0]["SMTPId"] = $dataCommunications[0]["Id"];
		
		
		if (empty($data)) {
			$data[0]["Id"] = "";
			$data[0]["LastName"] = "";
			$data[0]["FirstName"] = "";
			$data[0]["MiddleName"] = "";
			$data[0]["DateBirth"] = "";//date('d.m.Y');
			$data[0]["passValidDate"] = "";//date('d.m.Y');
			$data[0]["Comment"] = "";
			$data[0]["PhoneMob"] = $dataPhoneMob[0]["Address"];
			
		} else {
		//	$data[0]['PhoneMobId'] = $dataPhoneMob[0]["Id"];
			$data[0]['PhoneMob'] = $dataPhoneMob[0]["Address"];
			$data[0]['PhoneHome'] = $dataPhoneHome[0]["Address"];
		//	$data[0]['PhoneTravelSim'] = $dataPhoneTravelSim[0]["Address"];
			$data[0]['EmailHome'] = $dataEmailHome[0]["Address"];
			//$data[0]['EmailWork'] = $dataEmailWork[0]["Address"];
			
			$data[0]['passId'] = $dataDocuments[0]["Id"];
			$data[0]['passGivenNames'] = $dataDocuments[0]["FirstName"];
			$data[0]['passSurName'] = $dataDocuments[0]["LastName"];
			$data[0]['passSerNum'] = $dataDocuments[0]["SeriaNum"];
			$data[0]['passValidDate'] = $dataDocuments[0]["Valid"];
			$data[0]['passIssued'] = $dataDocuments[0]["IssuedBy"];
		}
			$this->view->generate('contacts/add_contacts.php', 'template_view.php', $data, ["datepicker", "jqgrid","validate","inputmask","tinymce","datatables","confirm","select2"], ["contacts/contacts_edit","contacts/contact_leads","contacts/contact_docs"]); //,"lib/bootstrap-jqgrid-mvg", "contacts/pick_legal"
	}
	
	function action_uploadphoto() {

		
		$file["ModelType"] = "contactPhoto";
		$file["ModelId"] = $_POST["Id"];
		$file["Comments"] = "";
		$file["File"] = $_FILES['uploadfile'];
		
		
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
		
	}
	
	
	function action_deleteDeal() {
		$res = $this->model->deleteDeal($_GET["Id"], $_GET["DealId"]);
		if ($res == true){
			echo json_encode(array("status"=>"SUCCESS"));
		} else {
			echo json_encode(array("status"=>"ERROR", "message"=>"Ошибка при удалении записи"));
		}
	}
	
	function action_saveColumn(){
		$array = [
		"Id" 			=> $_POST["pk"],
		"columnName"	=> $_POST["name"],
		"value"			=> $_POST["value"]
		];
		
		$data = $this->model->addColumn($array);
		echo $data;
	}
	
	
	//Новый функционал отображения связанных контактов с клиентом
	function action_getLinkedContacts(){
		$data = $this->model->getLinkedContacts($_POST["ContactId"]);
		echo $data;
	}
	
	//Новый функционал отображения связанных контактов с клиентом
	function action_deleteLinkedContactById(){
		$data1 = $this->model->get_LinkedContactRow($_GET["Id"]);
		//$data[0]["ContactId"].$data[0]["ParrContactId"];
		
		$data = $this->model->deleteLinkedContactsAjax($data1[0]["ContactId"],$data1[0]["ParrContactId"]);
		echo $data;
	}
	
	function action_getLinkedContactsListItems(){
		$data = $this->model->getLinkedContactsListItems($_GET['term'],$_GET['ContactId']);
		echo $data;
	}
	
	function action_setLinkedContact(){
		$array = [
			"ContactId" 	=> $_POST["LinkedContactId"],
			"ParrContactId"	=> $_POST["LinkedParrContactId"],
			"LinkType"		=> $_POST["LinkedComments"]
		];
		
		if($_POST['LinkedContactId'] != "" || $_POST['LinkedParrContactId'] !=""){
			
			$data = $this->model->setLinkedContact($array);
			
		} else {
			$data["status"] ="error";
		    $data["message"] = "Вы не выбрали связанный контакт";
		}
		
		echo $data;
	}
	
	//Новый функционал отображения связанных юр лиц с клиентом
	function action_getLinkedLegals(){
		$data = $this->model->getLinkedLegals($_POST["ContactId"]);
		echo $data;
	}
	//Новый функционал отображения связанных контактов с клиентом
	function action_deleteLinkedLegalById(){
		$data1 = $this->model->get_LinkedLegalRow($_GET["Id"]);
		
		$data = $this->model->deleteLinkedLegalsAjax($data1[0]["LegalId"],$data1[0]["ContactId"]);
		echo $data;
	}	
	
	function action_getLinkedLegalsListItems(){
		$data = $this->model->getLinkedLegalsListItems($_GET['term'],$_GET['ContactId']);
		echo $data;
	}

	function action_setLinkedLegal(){
		$array = [
			"ContactId" 	=> $_POST["LinkedContactId"],
			"LegalId"		=> $_POST["LinkedLegalId"],
			"LinkType"		=> $_POST["LinkedComments"]
		];
		
		if($_POST['LinkedContactId'] != "" || $_POST['LinkedLegalId'] !=""){
			
			$data = $this->model->setLinkedLegal($array);
			
		} else {
			$data["status"] ="error";
		    $data["message"] = "Вы не выбрали юр. лицо";
		}
		
		echo $data;
	}
	
	//Новый функционал отображения телефонов клиента
	function action_getContactPhones(){
		//echo json_encode($_POST
		$data = $this->model->getContactPhones($_POST["ContactId"]);
		echo $data;
	}	
	
	//Новый функционал отображения Email клиента
	function action_getContactEmails(){
		$data = $this->model->getContactEmails($_POST["ContactId"]);
		echo $data;
	}
	
	function action_getContactsListItems(){
		$data = $this->model->getContactsListItems($_GET['term']);
		echo $data;
	}
	
	function action_getDealParticipansListItems(){
		$data = $this->model->getDealParticipansListItems($_GET['term'],$_GET['DealId']);
		echo $data;
	}
	
	//Получаем данные клиента по его Id
	function action_getContactById(){
		$data = $this->model->get_row($_POST['Id']);
		echo json_encode($data[0]);
	}

}