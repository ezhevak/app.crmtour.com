<?php

class Controller_Dictionary extends Controller
{

	function __construct()
	{
		$this->model = new Model_Dictionary();
		$this->view = new View();
	}
	
	//выпадающий список стран на сделке
	function action_getDirections(){
		$data = $this->model->getDirections();
		echo $data;	
	}
	
	//выпадающий список отелей на сделке
	function action_getHotels(){
		$data = $this->model->getHotels($_GET["DirectionName"]);
		echo $data;	
	}
	
	//выпадающий список регионов на сделке
	function action_getRegions(){
		$data = $this->model->getRegions($_GET["DirectionName"]);
		echo $data;
	}
	
	
	function action_getDictionaries() {
		if (isset($_POST["oper"])) {
			$fields = array();
			$fields["Id"] = $_POST["id"];
			$fields["SubType"] = $_POST["SubType"];
			$fields["Type"] = $_POST["Type"];
			$fields["Name"] = $_POST["Name"];
			$fields["Lang"] = $_POST["Lang"];
			$fields["LIC"] = $_POST["LIC"];
			$fields["OrderBy"] = $_POST["OrderBy"];
			$fields["Active"] = $_POST["Active"];
			$this->model->editDictionary($_POST["oper"], $fields);
		} else
			$this->model->getDictionaries();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('dictionary/dictionary_view.php', 'template_view.php', $data, ["jqgrid","bootbox"], ["dictionary/dict_index"]);
	}
	
	function action_getDictionaryListItems(){
		$data = $this->model->getDictionaryListItems($_GET['term'],$_GET['type']);
		echo $data;
	}
	
	function action_getDictionaryValue(){
		$data = $this->model->getDictionaryValue($_POST['type'],$_POST['lic']);
		echo $data;
	}
	
	function action_setDictionaryValue(){
		
		$data = array ("Type"  => $_POST['dicType'],
					   "Name"  => $_POST['dicName']
		);
		
		
		
		$data = $this->model->add($data);
		echo json_encode($data);
	}
	
	function action_getDirectionsListItems(){
		$data = $this->model->getDirectionsListItems($_GET['term']);
		echo $data;
	}
	
	
	
	
	
	
	
	
}
?>