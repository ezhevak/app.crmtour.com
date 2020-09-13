<?php

class Controller_legal extends Controller
{

	function __construct() {
		$this->model = new Model_Legal();
		$this->view = new View($this->model->ModelClass);
	}
	function action_export() {
		parent::action_export("Legal");
	}
	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('legal/legal_view.php', 'template_view.php', $data, ["datatables","confirm"], ["legal/legal_index"]);
	}
	function action_get(){
		$data = $this->model->get_row($_GET["Id"]);
		echo json_encode($data);
	}
	

	function action_add($LegalId){
		//echo "ctrl add";
		if (isset($LegalId)){
			$Id = $LegalId;
		} else {
			$Id = $_GET["Id"];
		}
			
		$data = $this->model->get_row($Id);
		if (empty($data)) {
			$data[0]["Id"] = "";
			$data[0]["LegalName"] = "";
			$data[0]["LegalCode"] = "";
			$data[0]["LegalMFO"] = "";
			$data[0]["LegalAccountNum"] = "";
			$data[0]["LegalBankName"] = "";
			$data[0]["LegalLegalComments"] = "";
		}
		
		$this->view->generate('legal/add_legal.php', 'template_view.php', $data,["validate","inputmask","datepicker","moment","datatables","confirm"],["legal/legal_edit","legal/legal_deals_table"]);
	}

	function action_save()
	{
		$array = [
			"Id" => $_POST["Id"],
			"LegalName" =>  str_replace("\"","'",$_POST['LegalName']),
			"TaxNumber" => $_POST['TaxNumber'],
			"TaxForm" => $_POST['TaxForm'],
			"SignerFIO" => $_POST['SignerFIO'],
			"SignerPosition" => $_POST['SignerPosition'],
			"SignerBasis" => $_POST['SignerBasis'],
			"AccountantFIO" => $_POST['AccountantFIO'],
			"VATcertificateNumber" => $_POST['VATcertificateNumber'],
			"LegalOfficeMobile" => $_POST['LegalOfficeMobile'],
			"LegalOfficePhone" => $_POST['LegalOfficePhone'],
			"LegalOfficeFax" => $_POST['LegalOfficeFax'],
			"LegalOfficeAddress" => $_POST['LegalOfficeAddress'],
			"LegalFactAddress" => $_POST['LegalFactAddress'],
			"LegalOfficeEmail" => $_POST['LegalOfficeEmail'],
			"LegalBankName" => str_replace("\"","'",$_POST['LegalBankName']),
			"LegalCode" => $_POST['LegalCode'],
			"LegalAccountNum" => $_POST['LegalAccountNum'],
			"LegalBankIban" => $_POST['LegalBankIban'],
			"LegalMFO" => $_POST['LegalMFO'],
			"LegalDealStart" => $_POST['LegalDealStart'],
			"LegalDealEnd" => $_POST['LegalDealEnd'],
			"UserId" => $_POST['UserId'],
			"LegalComments" => $_POST['LegalComments']
		];


		$data = $this->model->add($array);

		session_start();
		$_SESSION["APP_STATUS"] = $data["status"];
		$_SESSION['APP_MESSAGE'] = $data["message"];

		if ($data["status"] == "success") {
			header('Location: /legal/add?Id='.$data["LegalId"]);
		} else {
			$this->action_add($_POST["Id"]);
		}
	}

	function action_getlist(){
		$data = $this->model->getListJson();
		echo $data;
	}
	

	function action_deals_getlist(){
		$data = $this->model->deals_getListJson($_GET['LegalId']);
		echo $data;
	}
	
	function action_getlistitems(){
		$data = $this->model->getListItemsJson($_GET['term']);
		echo $data;
	}
	
	
	function action_getMVGList(){
		$this->model->getMVGListJson();
	}

	function action_delete() {
		$data = $this->model->deleteAjax($_GET["Id"]);
		echo $data;
	}

}
?>