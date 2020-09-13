<?php

class Controller_Leads extends Controller
{

	function __construct()
	{
		$this->model = new Model_Leads();
		$this->view = new View($this->model->ModelClass);
	}

	function action_export() {
		parent::action_export("Leads");
	}

	function action_index(){

		$getdata = $this->model->get_AmountStatusLead("New");
		$data[0]["AmountNewLead"] = $getdata["AmountLead"];
		$getdata = $this->model->get_AmountStatusLead("Processed");
		$data[0]["AmountProcessedLead"] = $getdata["AmountLead"];
		$getdata = $this->model->get_AmountStatusLead("Lost");
		$data[0]["AmountLostLead"] = $getdata["AmountLead"];
			
		$this->view->generate('leads/leads_view.php', 'template_view.php', $data, ["datatables","confirm"], ["leads/leads_index"]);	
		//,"leads/legal_deals_table"
		

	}


	function action_add($leadId){
		
		if (isset($leadId)){
			$Id = $leadId;
		} else {
			$Id = $_GET["Id"];
		}

		$data = $this->model->get_row($Id);
		
		//Ссылка для перехода на создание запроса из карточки клиента.
		if($_GET["ContactId"] !=""){
			include_once "application/models/model_contacts.php";
			$contact = new Model_Contacts();
			$contactData = $contact->get_row($_GET["ContactId"]);
			
		}
		
		if (empty($data)) {
			$data[0]["Id"] = "";
			$data[0]["LeadDate"] = date('Y-m-d');
			$data[0]["LeadStatus"] = "New";
			$data[0]["LeadStatusName"] = "Новый";
			$data[0]["LeadPriority"] = "Urgent";
			$data[0]["LeadPriorityName"] = "Срочный";
			$data[0]["LeadType"] = "";
			$data[0]["LeadSource"] = "";
			$data[0]["LastName"] = $contactData[0]["LastName"];
			$data[0]["FirstName"] = $contactData[0]["FirstName"];
			$data[0]["MiddleName"] = $contactData[0]["MiddleName"];
			$data[0]["Phone"] = $contactData[0]["PhoneMob"];
			$data[0]["Email"] = $contactData[0]["EmailHome"];
			$data[0]["LeadText"] = "";
			$data[0]["ManagerText"] = "";
			$data[0]["UserId"] = "";
			$data[0]["Sex"] = $contactData[0]["Sex"];
			$data[0]["ContactId"] = $contactData[0]["Id"];
			$data[0]["ConLastName"] = $contactData[0]["LastName"];
			$data[0]["ConFirstName"] = $contactData[0]["FirstName"];
			
		}

			$this->view->generate('leads/add_leads.php', 'template_view.php', $data, ["inputmask","tinymce","validate","confirm","datepicker","select2"], ["leads/leads_edit"]);//, "lib/bootstrap-jqgrid-pick", "leads/pick_contact"]);
	}


	function action_getlist(){
		$data = $this->model->getListJson($_GET["month"],$_GET["BranchId"]);
		echo $data;
	}
	
	function action_setContact() {
		$array = [
			"ClientId" => $_POST["targetId"],
			"LeadId" => $_POST["sourceId"]
		];
		$res = $this->model->setContact($array);
		echo json_encode($res);
	}
	
	function action_getLegal() {
		$res = $this->model->getLegalJson($_GET["LeadId"]);
		echo json_encode($res);
	}
	
	function action_setLegal() {
		$array = [
			"LegalId" => $_POST["targetId"],
			"LeadId" => $_POST["sourceId"]
		];
		$res = $this->model->setLegal($array);
		echo json_encode($res);
	}

	function action_delete(){
		$data = $this->model->deleteAjax($_GET["Id"]);
		echo $data;
	}

	function action_findAddress() {
		$data = $this->model->findAddressJson($_POST["address"]);
		echo $data;
	}
	
	function action_save_ajax(){
		//$data["sex"] =  $_POST['Sex'];
		$array = [
			"Id" 		 => $_POST["Id"],
			"LeadDate"   => $_POST['LeadDate'],
			"LeadStatus" => $_POST['LeadStatus'],
			"LeadType"   => $_POST['LeadType'],
			"LeadSource" => $_POST['LeadSource'],
			"LeadPriority" => $_POST['LeadPriority'],
			"LastName" 	 => $_POST['LastName'],
			"FirstName"  => $_POST['FirstName'],
			"MiddleName" => $_POST['MiddleName'],
			"Phone" 	 => $_POST['Phone'],
			"Email"      => $_POST['Email'],
			"LeadText"   => $_POST['LeadText'],
			"ManagerText"=> $_POST['ManagerText'],
			"UserId" 	 => $_POST['UserId'],
			"Sex" 		 => $_POST['Sex'],
			"PartnerId"  => $_POST['PartnerId'],
			"ContactId"  => $_POST['ContactId']
		];
		
		$Id = $_POST["Id"];
		
		$data = $this->model->add($array);
		echo $data;
		
	}
	
	function action_contact_info_ajax(){
		$data = $this->model->getContactInfo($_POST["ContactId"],$_POST["LeadId"]);
		echo $data;
	}
	
	
}
?>