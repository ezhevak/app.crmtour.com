<?php

class Controller_Airport extends Controller
{

	function __construct(){
		$this->model = new Model_Airport();
		$this->view = new View();
	}

	function action_index(){
		$this->view->generate('airport/airport_view.php', 'template_view.php', "", ["datatables"], ["airport/airport_index"]);
	}

	function action_getlist(){
		$data = $this->model->getListJson();
		echo $data;
	}
	
	function action_add($AirportId)
	{
		if (isset($AirportId)){
			$Id = $AirportId;
		} else {
			$Id = $_GET["Id"];
		}
			
		$data = $this->model->get_row($Id);
		
		if (empty($data)){
			$data[0]["Id"] = "";
		}
		session_start();
		$this->view->generate('airport/add_airport.php', 'template_view.php', $data,  ["select2","validate","inputmask"], ["airport/airport_edit"]);
		
		
	}

	function action_save()
	{
		$array = [
			"Id" => $_POST["Id"],
			"DirectionId"  => $_POST["DirectionId"],
			"AirportCode"  => $_POST["AirportCode"],
			"AirportCity"  => $_POST["AirportCity"],
			"AirportName"  => $_POST["AirportName"],
			"AirportPhone" => $_POST["AirportPhone"],
			"AirportFax"   => $_POST["AirportFax"],
			"AirportEmail" => $_POST["AirportEmail"],
			"AirportSite"  => $_POST["AirportSite"]
		];
		
		$data = $this->model->add($array);
		session_start();
		$_SESSION["APP_STATUS"] = $data["status"];
		$_SESSION['APP_MESSAGE'] = $data["message"];
		
		if ($data["status"] == "success") {
			header('Location: /airport/add?Id='.$data["AirportId"]);
		} else {
			header('Location: /airport/');
		}
		
	}
	
	
	function action_addajax() {
		$array = [
			"Id" => $_POST["Id"],
			"DirectionId"  => $_POST["DirectionId"],
			"AirportCode"  => $_POST["AirportCode"],
			"AirportCity"  => $_POST["AirportCity"],
			"AirportName"  => $_POST["AirportName"],
			"AirportSite"  => $_POST["AirportSite"]
		];
		
		$data = $this->model->add($array);
		echo json_encode($data);
	}
	
	
	function action_getArportsListItems(){
		$data = $this->model->getArportsListItems($_GET['term']);
		echo $data;
	}
	
}
?>