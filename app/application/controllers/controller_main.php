<?php

class Controller_Main extends Controller
{
	function __construct(){
		$this->model = new Model_Main();
		$this->view = new View();
	}
	
	function action_index()	{	
		$this->view->generate('main_view.php', 'template_view.php', $data, ["datetimepicker","datatables","validate","select2","inputmask"], ["main/main_index"]);
	}
	
	
	function action_save_arrival(){
		$array = [
			"Type" => "Arrival",
			"FlightA" => $_POST["FlightA"],
			"FlightAArrivalDate"	=> $_POST["FlightAArrivalDate"],
			"FlightADepartureDate"	=> $_POST["FlightADepartureDate"],
			"Id" => $_POST["DealId"],
			"DocIssued" => $_POST["DocIssued"]
		];
		
		$data = $this->model->add($array);
		print_r($data);
		
	}
	
	function action_save_departures(){
		$array = [
			"Type" => "Departure",
			"FlightB" => $_POST["FlightB"],
			"FlightBArrivalDate"	=> $_POST["FlightBArrivalDate"],
			"FlightBDepartureDate"	=> $_POST["FlightBDepartureDate"],
			"Id" => $_POST["DealId"]
		];
		
		$data = $this->model->add($array);
		print_r($data);
	}
	
	
	function action_getlist_arr(){
		$data = $this->model->getListArrJson();
		echo $data;
	}
	function action_getlist_dep(){
		$data = $this->model->getListDepJson();
		echo $data;
	}
	
	
	
	
}
?>