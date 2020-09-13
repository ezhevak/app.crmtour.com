<?php

class Controller_Action extends Controller
{

	function __construct(){
		$this->model = new Model_Action();
		$this->view = new View();
	}
	

	function action_save(){
		$array = [
			"Id" 		 => $_POST["Id"],
			"ModelType"  => $_POST["ModelType"],
			"ModelId"  	 => $_POST["ModelId"],
			"Type"  	 => $_POST["Type"],
			"Address"  	 => $_POST["Address"],
			"Text"  	 => $_POST["Text"],
			"Status"  	 => $_POST["Status"],
			"UserId" 	 => $_POST["UserId"]
		];
		
		$data = $this->model->add($array);
		
		session_start();
		$_SESSION["APP_STATUS"] = $data["status"];
		$_SESSION['APP_MESSAGE'] = $data["message"];
		
		if ($data["status"] == "success") {
			header('Location: /action/add?Id='.$data["ActionId"]);
		}
		
	}
	
	//не доделанное событие 07/03/2018
	function action_ajaxadd() {
		$array = [
			"Id" => $_POST["Id"],
			"ModelType"  => $_POST["ModelType"],
			"ModelId"  	 => $_POST["ModelId"],
			"Type"  	 => $_POST["Type"],
			"Address"  	 => $_POST["Address"],
			"Text"  	 => $_POST["Text"],
			"Status"  	 => $_POST["Status"],
			"UserId" 	 => $_POST["UserId"]
		];
		
		$data = $this->model->add($array);
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data);
	}

}
?>