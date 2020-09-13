<?php

class Controller_Documents extends Controller
{

	function __construct(){
		$this->model = new Model_Documents();
		$this->view = new View($this->model->ModelClass);
	}

	function action_add($DocumentId){
		if (isset($DocumentId)){
			$Id = $DocumentId;
		} else {
			$Id = $_GET["Id"];
		}
		$data = $this->model->get_row($Id);
		
		//получаем информацию по связанным файлам
		include_once "application/models/model_uploads.php";
		$upload = new Model_Uploads();	
		$uploaddata = $upload->get_row('documents',$Id);
		$data[0]["FileName"] = $uploaddata[0]["FileName"];

		if (empty($data)) {
			$data[0]["Id"] = "";
			$data[0]["FirstName"] = "";
			$data[0]["LastName"] = "";
			$data[0]["SeriaNum"] = "";
			$data[0]["Valid"] = "" ;
			$data[0]["IssuedBy"] = "";
			$data[0]["Comments"] = "";
			$data[0]["ContactId"] = $_GET["ContactId"];
		} else {
			//$data[0]['LeadDate'] = date("d.m.Y",strtotime($data['LeadDate']));
		}
		
		if($data[0]["ContactId"] == ""){
			$ContactId = $_GET["ContactId"];
		} else {
			$ContactId = $data[0]["ContactId"];
		}
		
		if($ContactId !=""){
			include_once "application/models/model_contacts.php";
			$Contact = new Model_Contacts();
			
			$documentContact = $Contact->get_row($ContactId);
			$data[0]["ContactFirstName"] = $documentContact[0]["FirstName"];
			$data[0]["ContactLastName"] = $documentContact[0]["LastName"];
			$data[0]["ContactId"] = $documentContact[0]["Id"];
		}
		$this->view->generate('documents/add_documents.php', 'template_view.php', $data, ["datepicker","validate","inputmask"], ["documents/edit"]);
	}
	

	function action_save(){
		
		$array = [
			"Id"			 => $_POST["Id"],
			"AccId" 		 => $_POST["AccId"],
			"ContactId" 	 => $_POST['ContactId'],
			"DocType"		 => $_POST['docType'], //$docType,
			"passGivenNames" => $_POST['docFirstName'],
			"passSurName"	 => $_POST['docLastName'],
			"RecordNo"		 => $_POST['docRecordNo'],
			"passSerNum"     => $_POST['docSerNum'],
			"passValidDate"  => $_POST['docValid'],
			"passIssuedDate" => $_POST['docIssuedDate'],
			"passIssued"	 => $_POST['docIssuedBy'],
			"passBiometric"  => $_POST['Biometric'],
			"Comments"		 => $_POST['docComments'],
			"Active"		 => $_POST['docActive'],
			"LastAdd"        => $_POST['LastAdd'],
			"File"      	 => $_FILES['fileUploadName']
		];

		$data = $this->model->add($array);
		
		//echo "!!!!".json_encode($array["File"]);
		
		//if($_FILES['fileUploadName']['size'] >0){
		//
		//	$file["ModelType"] = "documents";
		//	$file["ModelId"] = $data["Id"];
		//	$file["Comments"] = "";
		//	$file["File"] = $_FILES['fileUploadName'];
		//	
		//	include_once "application/models/model_uploads.php";
		//	$upload = new Model_Uploads();	
		//	
		//	//Если вдруг решили заменить на более новый файл, старый нужно удалить.
		//	//Начало удаления
		//	$delFile = $upload->get_row($file["ModelType"],$file["ModelId"]);
		//	//если файл есть удаляем его
		//	if (file_exists($delFile[0]["FilePath"])) {
		//		unlink($delFile[0]["FilePath"]);
		//	}
		//	$del = $upload->deleteAjax($file["ModelType"],$file["ModelId"]);
		//	//Конец удаления
		//	
		//	//после удалению загружаем новый файл в базу и на файловую систему
		//	$uploaddata = $upload->add($file);
		//}
		//echo json_encode($data);
		header('Location: /contacts/add?Id='.$_POST["ContactId"]);
	}
	
	
	
	function action_delete() {
		
		//Если вдруг решили удалить весь документ файл нужно удалить.
		include_once "application/models/model_uploads.php";
		$upload = new Model_Uploads();	
		
		//Начало удаления
		$delFile = $upload->get_row("documents",$_GET["Id"]);
		//если файл есть удаляем его
		if (file_exists($delFile[0]["FilePath"])) {
			unlink($delFile[0]["FilePath"]);
		}
		
		$del = $upload->deleteAjax("documents",$_GET["Id"]);
		//Конец удаления
		
		//Удаление записи документа
		$data = $this->model->deleteAjax($_GET["Id"]);
		
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data);
	}

}
?>