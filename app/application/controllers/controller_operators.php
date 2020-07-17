<?php

class Controller_Operators extends Controller
{

	function __construct()
	{
		$this->model = new Model_Operators();
		$this->view = new View();
	}

	function action_index(){
		$data = $this->model->get_data();
		$this->view->generate('operators/operators_view.php', 'template_view.php', $data, ["datatables","confirm"], ["operators/operators_index"]);
	}

	function action_getlist(){
		$data = $this->model->getListJson();
		echo $data;
	}
	

	function action_add($OperatorId)
	{
		//echo "ctrl add";
		if (isset($OperatorId)){
			$Id = $OperatorId;
		}
		else {
			$Id = $_GET["Id"];	
		}
			
 
		$data = $this->model->get_row($Id);
	
			
		if (empty($data)) {
			$data[0]["Id"] = "";
			$data[0]["Active"]="1";
		} else {
			//$data[0]['LeadDate'] = date("d.m.Y",strtotime($data['LeadDate']));
		}
		session_start();
	//	$_SESSION['ACTIVE_TAB'] = "operators";
		$this->view->generate('operators/add_operators.php', 'template_view.php', $data,  ["datepicker","inputmask","tinymce","validate","jqgrid"], ["operators/operators_edit","operators/operators_deals"]);
	}
	function action_getlist_deals()
	{
		$this->model->getList_dealsJson($_GET["OperatorId"]);
	}
	function action_addajax() {
		
		$array = [
			"Name"		=> $_POST["addOperName"],
			"Phone" 	=> $_POST["addOperPhone"],
			"Email" 	=> $_POST["addOperEmail"],
			"Commision" => $_POST["addOperCommision"],
			"DealNum"	=> $_POST["addOperDealNum"],
			"DealDateStart" => $_POST["addOperDealDateStart"],
			"DealDateEnd"	=> $_POST["addOperDealDateEnd"],
			"Login" 	=> $_POST["addOperLogin"],
			"Pass"		=> $_POST["addOperPass"],
			"WebSite"	=> $_POST["addOperWebSite"],
			"Address"	=> $_POST["addOperAddress"],
			"Active"	=> $_POST["addOperActive"],
			"DirectPartners" => $_POST["addOperDirectPartners"],
			"Comments"  => $_POST["addOperComments"]
		];
		
		$data = $this->model->addx($array);
		echo json_encode($data);
		
	}
	
	function action_save()
	{
		$array = [
		"Id" => $_POST["Id"],
		"Name" => $_POST["Name"],
		"Phone" => $_POST["Phone"],
		"Email" => $_POST["Email"],
		"Commision" => $_POST["Commision"],
		"DealNum" => $_POST["DealNum"],
		"DealDateStart" => $_POST["DealDateStart"],
		"DealDateEnd" => $_POST["DealDateEnd"],
		"Login" => $_POST["Login"],
		"Pass" => $_POST["Pass"],
		"WebSite" => $_POST["WebSite"],
		"Address" => $_POST["Address"],
		"Active" => $_POST["Active"],
		"DirectPartners" => $_POST["DirectPartners"],
		"Comments" => $_POST["Comments"]
		];
		
		$data = $this->model->add($array);
		
		session_start();
		$_SESSION["APP_STATUS"] = $data["status"];
		$_SESSION['APP_MESSAGE'] = $data["message"];
		
		if ($data["status"] == "success") {
			header('Location: /operators');
		} else {
			$this->action_add($_POST["Id"]);
		}
	}
	
	function action_getOperatorsListItems(){
		$data = $this->model->getOperatorsListItems($_GET['term']);
		echo $data;
	}



	function action_delete(){
		$data = $this->model->deleteAjax($_GET["Id"]);
		echo $data;
	}


}
?>