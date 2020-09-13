<?php

class Controller_srvtasks extends Controller
{
	function __construct()
	{
		$this->model = new Model_srvtasks();
		$this->view = new View();
	}
	
	function action_index(){
		if($_SESSION["UserId"] == 1){
			$this->view->generate('srvtasks/srvtasks_view.php', 'template_view.php', $data, ["confirm","datatables"], ["srvtasks/srvtasks_index"]);
		} else {
			echo "<a href=\"/\"><img src=\"..\public\spy.png\" alt=\"Мне кажется или ты шпион?\"></a>";
		}
	}	
	
	function action_getlist(){
		$data = $this->model->getListJson();
		echo $data;
	}
	
	function action_getTasks() {
		$this->model->getTasks();
	}
	
	
	
	function action_save()
	{
		$array = [
		"AccId" => $_SESSION["AccId"],
		"Id" => $_POST["id"],
		"Name"	=> $_POST["Name"],
		"Comments"	=> $_POST["Comments"],
		"Params"	=> $_POST["Params"],
		"CreatorId"=>$_SESSION['UserId'],
		"UserId" =>$UserId
		];
		
		
		$data = $this->model->add($array);
		print_r($data);
		//session_start();
		//$_SESSION["APP_STATUS"] = $data["status"];
		//$_SESSION['APP_MESSAGE'] = $data["message"];
	}
	
	function action_add($Id){
		if (isset($Id)){
			$Id = $Id;
		} else {
			$Id = $_GET["Id"];
		}
			
		$data = $this->model->get_row($Id);
		
		echo json_encode($data);
	}
	//https://app.crmtour.com/srvtasks/delete?Id=5729
	function action_delete() {
		$data = $this->model->deleteAjax($_GET["Id"]);
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data);
	}	
	
	
}
