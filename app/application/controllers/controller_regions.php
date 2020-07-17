<?php

class Controller_Regions extends Controller
{

	function __construct(){
		$this->model = new Model_Regions();
		$this->view = new View();
	}

	function action_index(){
		$data = $this->model->get_data();
		$this->view->generate('regions/regions_view.php', 'template_view.php', $data, ["datatables"], ["regions/regions_index"]);
	}

	function action_getlist(){
		$data =$this->model->getListJson();
		echo $data;
	}
	
	
	function action_addajax() {
		
		$array = [
			"DirectionId"  => $_POST["DirectionId"],
			"RegionName"   => $_POST["RegionName"],
			"RegionRating" => $_POST["RegionRating"],
			"Comments"     => $_POST["RegionComments"]
		];
		$data = $this->model->addx($array);
		echo json_encode($data);
	}
	
	

	function action_add($RegionId)
	{
		//echo "ctrl add";
		if (isset($RegionId))
			$Id = $RegionId;
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
		$this->view->generate('regions/add_region.php', 'template_view.php', $data,  ["tinymce","validate"], ["regions/region_edit"]);
	}

	function action_save()
	{
		$array = [
		"Id" => $_POST["Id"],
		"RegionName" => $_POST["RegionName"],
		"DirectionId" => $_POST["DirectionId"],
		"RegionRating" => $_POST["RegionRating"],
		"Comments" => $_POST["Comments"]
		];
		
		$data = $this->model->add($array);
		
		session_start();
		$_SESSION["APP_STATUS"] = $data["status"];
		$_SESSION['APP_MESSAGE'] = $data["message"];
		
		if ($data["status"] == "success") {
			header('Location: /regions');
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