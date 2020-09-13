<?php

class Controller_payment extends Controller
{
	function __construct(){
		$this->model = new Model_payment();
		$this->view = new View();
	}
	
		
	function action_add($Id){
		
		if (isset($Id)){
			$Id = $Id;
			echo 1;
		} else {
			$Id = $_GET["Id"];
		}
		
		if(!empty($Id)){
			$data = $this->model->get_row($Id);
			
		} else {
			$data[0]["DealId"]	= $_GET["dealid"];
			$data[0]["PayDate"] = date('Y-m-d');
			
			require('application/models/model_deals.php');
			$deal = new Model_Deals();
			$dataDeal = $deal->get_row($_GET["dealid"]);
			$data[0]["Payer"] = $dataDeal[0]["ContactFullName"];
			$data[0]["PayCurrency"] = $dataDeal[0]["DealCurrency"];
		}
		
	
		$this->view->generate('/payments/add_payment.php', 'template_view.php', $data, ["inputmask","validate"], ["payments/payments_edit"]);
	}
	
	function action_delete(){
		 
		$data = $this->model->deleteAjax($_GET["Id"]);
		echo $data;
	}	
	
	function action_dealpaylist(){
		$data = $this->model->getListByDealIdJson($_GET["dealid"]);
		echo $data;
	}
	
	
	//Нужно будет удалить
	function action_getlist()
	{
		$this->model->getListJson($_GET["dealid"]);
	}
	//не используется
	function action_getcurrency() {
		echo '<select><option value="UAH">UAH</option><option value="USD">USD</option><option value="EUR">EUR</option></select>';
	}
	
	function action_modify() {
		$params = array();
		$params["PaySum"] = $_POST["PaySum"];
		$params["PayDate"] = $_POST["PayDate"];
		$params["PayCurrency"] = $_POST["PayCurrency"];
		$params["Comments"] = $_POST["Comments"];
		$params["Payer"] = $_POST["Payer"];
		$params["DealId"] = $_POST["DealId"];
		$res = array();
		if ($_POST["oper"] == "add") {
			$params["Id"] = "";
			$res = $this->model->add($params);
			if ($res["rec_id"] == "newSubGridId") {
				$rec["status"] = "Error";
			}
		} else {
			$params["Id"] = $_POST["id"];
			$res = $this->model->add($params);
		}
		echo json_encode($res);
	}
	//используется для получения списка шаблонов
	function action_getTemplates() {
		require('application/models/model_templates.php');
		$templateModel = new Model_templates();
		$data = $templateModel->getModuleTemplates($this->model->getModelClass());
		echo json_encode($data);
	}
	
	function action_save_ajax(){
			
		$array = [
			"Id"		=> $_POST["Id"],
			"DealId" 	=> $_POST["DealId"],
			"PayType"	=> $_POST['PayType'],
			"PaySum"	=> $_POST['PaySum'],
			"PayDate"	=> $_POST['PayDate'],
			"Payer"		=> $_POST['Payer'],
			"Comments"	=> $_POST['Comments'],
			"PayCurrency" => $_POST['PayCurrency'],
			"PayCource" => $_POST['PayCource'],
			"PayEquivalent" => $_POST['PayEquivalent']
			
		];
		//echo json_encode($array);
		
		$data = $this->model->add($array);
		echo json_encode($data);
		
	}
}
