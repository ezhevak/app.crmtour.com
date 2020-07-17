<?php

class Controller_Address extends Controller
{

	function __construct()
	{
		$this->model = new Model_Address();
		$this->view = new View();
	}

	function action_add($AddressId)
	{
		//echo "ctrl add";
		if (isset($AddressId)){
			$Id = $AddressId;
		} else {
			$Id = $_GET["Id"];
		}
			

		$data = $this->model->get_row($Id);
		//echo json_encode($data);
		if (empty($data)) {
			$data[0]["Id"] = "";
			$data[0]["ContactId"] = "PhoneMob";//$_POST["ContactId"];
			$data[0]["Type"]	  = "PhoneMob";//$_POST["Type"];
			$data[0]["Active"]	  = "1";
			$data[0]["Send"]	  = "1";
			$data[0]["LastAdd"]   = "1";
			$data[0]["SubType"]   = "Phone";
		}
		
		
		if($data[0]["ContactId"] >0){
			include_once "application/models/model_contacts.php";
			$Contact = new Model_Contacts();
			
			$documentContact = $Contact->get_row($data[0]["ContactId"]);
			$data[0]["ContactFirstName"] = $documentContact[0]["FirstName"];
			$data[0]["ContactLastName"] = $documentContact[0]["LastName"];
		}
		
		$this->view->generate('address/add_address.php', 'template_view.php', $data, ["inputmask","validate"]);
	}

	function action_save(){
		
		$array = [
			//"AccId" => $_POST["AccId"],
			"ContactId" => $_POST["ContactId"],
			"Id"	    => $_POST["Id"],
			//"LegalId" => $_POST["LegalId"],
			"Type"      => $_POST["Type"],
			"Address"   => $_POST["Address"], 
			"Comments"  => $_POST["Comments"],
			"Active"    => $_POST["Active"],
			"Send"      => $_POST["Send"],
			"SubType"   => $_POST["SubType"],
		//	"UserId"    => $_POST["UserId"],
			"LastAdd"   => $_POST["LastAdd"]
		];
		
		$data = $this->model->add($array);
		
		//echo json_encode($data);
		
		if ($data["status"] == "success") {
			//Синхронизируем email со списком рассылки mailchimp.com
			if($_POST["SubType"] =="Email"){
				
				include_once "application/models/model_contacts.php";
				$Contact = new Model_Contacts();
				$data = $Contact->get_row($_POST["ContactId"]);
			
				$ApiKey = GetOption("MailChimp_ApiKey",$_SESSION['AccId']);
				$ListId = GetOption("MailChimp_ListId",$_SESSION['AccId']);
				if($ApiKey != "" && $ListId !="")
				{
					if($_POST["Send"] == "on"){
						$status = "subscribed";
					} else {
						$status = "unsubscribed";
					}
					$chimp = [
					    'email'     => $_POST["Address"],
					    'status'    => $status,
					    'firstname' => $data[0]["FirstName"],
					    'lastname'  => $data[0]["LastName"]
					];
					syncMailchimp($chimp,$ApiKey,$ListId);
				}
			}
			
			header('Location: /contacts/add?Id='.$_POST["ContactId"]);
		} else {
			$this->action_add($_POST["Id"]);
		}
	}
}
?>