<?php

class Controller_Embassy extends Controller
{

	function __construct(){
		$this->model = new Model_Embassy();
		$this->view = new View();
	}

	function action_index(){
		$data = $this->model->get_data();
		$this->view->generate('embassy/embassy_view.php', 'template_view.php', $data, ["datatables"], ["embassy/embassy_index"]);
	}

	function action_getlist(){
		$data = $this->model->getListJson();
		echo $data;
	}
	
	function action_add($EmbassyId)
	{
		//echo "ctrl add";
		if (isset($EmbassyId))
			$Id = $EmbassyId;
		else
			$Id = $_GET["Id"];
			
		$data = $this->model->get_row($Id);
		
		if (empty($data)) {
			$data[0]["Id"] = "";
		} else {
			//$data[0]['LeadDate'] = date("d.m.Y",strtotime($data['LeadDate']));
		}
		session_start();
	//	$_SESSION['ACTIVE_TAB'] = "operators";
		$this->view->generate('embassy/add_embassy.php', 'template_view.php', $data,  ["inputmask","tinymce","validate"], ["embassy/embassy_edit"]);
	}

	function action_save()
	{
		$array = [
		"Id" => $_POST["Id"],
		"DirectionId" => $_POST["DirectionId"],
		"EmbassyPhone" => $_POST["EmbassyPhone"],
		"EmbassyEmail" => $_POST["EmbassyEmail"],
		"EmbassyWebSite" => $_POST["EmbassyWebSite"],
		"EmbassyAddress" => $_POST["EmbassyAddress"],
		"Comments" => $_POST["Comments"]
		];
		
		$data = $this->model->add($array);
		
		session_start();
		$_SESSION["APP_STATUS"] = $data["status"];
		$_SESSION['APP_MESSAGE'] = $data["message"];
		
		if ($data["status"] == "success") {
			//header('Location: /contacts');
			header('Location: /embassy');
		} else {
			$this->action_add($_POST["Id"]);
		}
	}
	
	function action_delete() {
		$data = $this->model->deleteAjax($_GET["Id"]);
		echo $data;
	}

}
?>