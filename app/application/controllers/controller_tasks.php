<?php

class Controller_tasks extends Controller
{
	function __construct()
	{
		$this->model = new Model_tasks();
		$this->view = new View();
	}
	
	function action_index()
	{
		//$data = $this->model->get_data();
		$this->view->generate('tasks/tasks_view.php', 'template_view.php', $data, ["calendar","jqgrid","datatables","confirm"], ["tasks/tasks_index"]);
	}	
	
	function action_getlist(){
		
		$data = $this->model->getListJson($_GET["status"]);
		echo $data;
	}
	function action_getTasks() {
		$data = $this->model->getTasks();
		echo $data;
	}
	
	function action_delete() {
		$data = $this->model->deleteAjax($_GET["Id"]);
		echo $data;
	}
	
	function action_getLinkedTasks() {
		$data = $this->model->getLinkedTasksJson($_POST["ModelType"],$_POST["ModelId"]);
		echo $data;
	}
	
	
	
	function action_save(){
		//echo "POST:";
		//print_r($_POST);
		if (!isset($_POST["Done"]) || $_POST["Done"] != "on")
			$done = "0";
		else if ($_POST["Done"] == "on")
			$done = "1";
		$UserId = $_POST["UserId"];
		if (isset($_POST["Personal"]) && $_POST["Personal"] == "on")
			$UserId = $_SESSION['UserId'];
		else {
			$UserId = "";
			//echo "SDSDS".$_POST['UserSelect']."\n";
			foreach ($_POST['UserSelect'] as $selectedOption) {
				//echo $selectedOption."\n";
				if ($UserId != ""){
					$UserId .= ",";
				}
    			$UserId .= $selectedOption;
			}
		}
		$array = [
			"AccId" => $_POST["AccId"],
			"Id"	=> $_POST["Id"],
			"Title"	=> $_POST["Title"],
			"Task"	=> $_POST["Task"],
			"Start"	=> $_POST["Start"],
			"End"	=> $_POST["End"],
			"CreatorId"	=> $_SESSION['UserId'],
			"UserId"	=> $UserId,
			"Done"		=> $done,
			"ModelType"	=> $_POST["ModelType"],
			"ModelId"	=> $_POST["ModelId"],
			"SendEmail" => $_POST["SendEmail"]
		];
		
		
		$data = $this->model->add($array);

		session_start();
		$_SESSION["APP_STATUS"] = $data["status"];
		$_SESSION['APP_MESSAGE'] = $data["message"];

		if ($data["status"] == "success") {
			header('Location: /tasks');
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
		if (empty($data)) {
			$data[0]["ModelType"] = $_GET["model"];
			$data[0]["ModelId"] = $_GET["modelid"];
		}
		$this->view->generate('tasks/add_task.php', 'template_view.php', $data, ["switch","select2","datetimepicker","validate","inputmask","confirm"], ["tasks/edit"]);
	}
	
	function action_addLinkedTask(){
		
		$data = $this->model->getTaskBy($_POST["Title"],"Deal",$_POST["DealId"]);
		
		$adminData = getAdminUserEmail();
		
		if(intval($_POST['UserId']) !== intval($adminData[0]['Id'])){
			$UserId = $_POST['UserId'].",".$adminData[0]['Id'];
		} else {
			$UserId = $_POST['UserId'];
		}
		
		//if($data[0]["Id"] == "0" || $data[0]["Id"] == ""){
			$dataX = array ("Id" => $data[0]["Id"],
							"AccId" 	=> $_SESSION['AccId'],
							"CreatorId" => $_SESSION['UserId'],
			                "UserId"	=> $UserId,//$_POST['UserId'],
			                "Start" => $_POST["Start"],//toFormat("d.m.Y H:i","Y-m-d H:i",$_POST["Start"]),
			                "End"	=> $_POST["End"],//toFormat("d.m.Y H:i","Y-m-d H:i",$_POST["End"]),
			                "Title" => $_POST["Title"],
			                "Task"	=> $_POST["Task"],
			                "Done"	=> 0,
			                "ModelType" => "Deal",
			                "ModelId"	=> $_POST["DealId"],
			                "SendEmail" => "on"
						);
			$data1 = $this->model->add($dataX);
		//}
		
		echo json_encode($data1);
	}
	
	function action_getTaskNotify() {
		$data = $this->model->getTaskNotified();
		//print_r($data);
		$html = "";
		foreach($data as &$row) {
			//$html .= "<li><a href=\"/tasks/add?Id=".$row["Id"]."\"><span><span>".$row["Title"]."</span><span class=\"time\">до ".$row["endtime"]."</span></span><span class=\"message\">".$row["ModelType"]." ID:".$row["ModelId"]."</span></a></li>\n";
			$mlink = "";
			if($row["ModelType"] =="Contact"){
				require_once('application/models/model_contacts.php');
				$Model = new Model_Contacts();
				
				$dataContact = $Model->get_task_row($row["ModelId"]);
				//$dataContact = $Model->get_row($row["ModelId"]);
				$Id = $dataContact[0]["Id"];
				$LastName = $dataContact[0]["LastName"];
				$FirstName = $dataContact[0]["FirstName"];
				$mlink = "<span class=\"message\"><a href='/contacts/add?Id=".$row["ModelId"]."'>".$row["ModelTypeName"].": ".$FirstName." ".$LastName."</a></span>";
			} else if ($row["ModelType"]=="Lead"){
				require_once('application/models/model_leads.php');
				$Model = new Model_Leads();
				
				$dataLead = $Model->get_task_row($row["ModelId"]);
				//$dataLead = $Model->get_row($row["ModelId"]);
				$Id = $dataLead[0]["Id"];
				$LastName = $dataLead[0]["LastName"];
				$FirstName = $dataLead[0]["FirstName"];
				$mlink = "<span class=\"message\"><a href='/leads/add?Id=".$row["ModelId"]."'>".$row["ModelTypeName"].": ".$FirstName." ".$LastName."</a></span>";

			} else if ($row["ModelType"] =="Legal"){
				require_once('application/models/model_legal.php');
				$Model = new Model_Legal();
				
				$dataLegal = $Model->get_task_row($row["ModelId"]);
				//$dataLegal = $Model->get_row($row["ModelId"]);
				$Id = $dataLegal[0]["Id"];
				$LegalName = $dataLegal[0]["LegalName"];
				$mlink = "<span class=\"message\"><a href='/legal/add?Id=".$row["ModelId"]."'>".$row["ModelTypeName"].": ".$LegalName."</a></span>";
				
			} else if ($row["ModelType"] =="Deal"){
				require_once('application/models/model_deals.php');
				$Model = new Model_Deals();
				
				$dataDeal = $Model->get_task_row($row["ModelId"]);
				//$dataDeal = $Model->get_row($row["ModelId"]);
				$Id = $dataDeal[0]["Id"];
				$DealNo = $dataDeal[0]["DealNo"];
				$mlink = "<span class=\"message\"><a href='/deals/add?Id=".$row["ModelId"]."'>".$row["ModelTypeName"].": ".$DealNo."</a></span>";				
			}
			
		//	if ($row["ModelType"] != "Legal")
		//		$row["ModelType"] = $row["ModelType"]."s";
	//		$mlink = "";
	//		if ($row["ModelId"] != "" && $row["ModelId"] != "0")
	//			$mlink = "<span class=\"message\"><a href='/".$row["ModelType"]."/add?Id=".$row["ModelId"]."'>".$row["ModelTypeName"]." ID:".$row["ModelId"]."</a></span>";
			$html .= "<li><a href=\"/tasks/add?Id=".$row["Id"]."\"><span><span>".$row["Title"]."</span><span class=\"time\">до ".$row["endtime"]."</span></span></a>".$mlink."</li>\n";
		}
		$html .= "<li><div class=\"text-center\"><a href=\"/tasks\"><strong>Список всех задач</strong><i class=\"fa fa-angle-right\"></i></a></div></li>";
		echo $html;
	}
}
