<?php

class Controller_templates extends Controller
{
	function __construct()
	{
		$this->model = new Model_templates();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('templates/templates_view.php', 'template_view.php', $data, ["datatables","confirm"], ["templates/templates_index"]);
	}	
	
	function action_getlist()
	{
		$data = $this->model->getListJson();
		echo $data;
	}
	
	function action_delete() {
		$data = $this->model->deleteAjax($_GET["Id"]);
		echo json_encode($data);
	}	
	
	function action_save()
	{
		$array = [
		"AccId" => $_POST["AccId"],
		"Id" => $_POST["Id"],
		"Name"	=> $_POST["Name"],
		"Module"	=> $_POST["Module"],
		"Template"	=> $_POST["Template"],
		"Active" => $_POST["Active"]
		];
		
		
		$data = $this->model->add($array);

		session_start();
		$_SESSION["APP_STATUS"] = $data["status"];
		$_SESSION['APP_MESSAGE'] = $data["message"];

		if ($data["status"] == "success") {
			header('Location: /templates');
		} else {
			$this->action_add($_POST["Id"]);//header('Location: /leads/add?Id='.$_POST["Id"]);
		}
	}
	
	function action_add($TemplateId)
	{
		if (isset($TemplateId)){
			$Id = $TemplateId;
		} else{
			$Id = $_GET["Id"];
		}
			
		$data = $this->model->get_row($Id);
		if (empty($data)) {
		/*	$data[0]["Id"] = "";
			$data[0]["LastName"] = "";
			$data[0]["FirstName"] = "";
			$data[0]["MiddleName"] = "";
			$data[0]["DateBirth"] = date('d.m.Y');
			$data[0]["passValidDate"] = date('d.m.Y');
			$data[0]["Comment"] = "";*/
		} else {
			//$data[0]['DateBirth'] = date("d.m.Y",strtotime($data['DateBirth']));
			//$data[0]['passValidDate'] = date("d.m.Y",strtotime($data['passValidDate']));
		}
		
	//	if($_SESSION['UserId'] != "1"){
			$this->view->generate('templates/add_templates.php', 'template_view.php', $data, ["tinymce","validate"], ["templates/edit"]);
	//	} else {
	//		$this->view->generate('templates/add_templates_dev.php', 'template_view.php', $data, ["tinymce","validate"], []);
	//	}
	}
	
	
}
