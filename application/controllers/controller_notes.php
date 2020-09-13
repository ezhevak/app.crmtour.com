<?php

class Controller_notes extends Controller
{
	function __construct(){
		$this->model = new Model_notes();
		$this->view = new View();
	}
	
	function action_index(){
		//$data = $this->model->get_data();
		$this->view->generate('notes/notes_view.php', 'template_view.php', "", ["datatables"], ["notes/notes_index"]);
	}	
	
	function action_getlist(){
		$data = $this->model->getListJson();
		echo $data;
	}
	
	function action_delete(){
		$data = $this->model->delete($_GET["Id"]);
		header('Content-Type: application/json; charset=utf-8');
		echo $data;
	}	
	
	function action_save(){
		$array = [
			"Id" => $_POST["Id"],
			"Name"	=> $_POST["Name"],
			"Description"	=> $_POST["Description"]
		];
		
		
		$data = $this->model->add($array);
		session_start();
		$_SESSION["APP_STATUS"] = $data["status"];
		$_SESSION['APP_MESSAGE'] = $data["message"];

		if ($data["status"] == "success") {
			header('Location: /notes');
		} else {
			$this->action_add($_POST["Id"]);
		}
	}
	
	function action_add($Id){
		if (isset($Id)){
			$Id = $Id;
		} else {
			$Id = $_GET["Id"];
		}	
		$data = $this->model->get_row($Id);
		$this->view->generate('notes/add_notes.php', 'template_view.php', $data, ["validate","tinymce"], ["notes/edit"]);
	}
}
