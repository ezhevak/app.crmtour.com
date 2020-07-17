<?php

class Controller_Uploads extends Controller
{

	function __construct(){
		$this->model = new Model_Uploads();
	//	$this->view = new View();
	}

	
	function action_save(){
			$file["Id"] = $_POST["Id"];
			$file["ModelType"] = $_POST["ModelType"];
			$file["ModelId"]   = $_POST["ModelId"];
			$file["File"] = $_FILES['file'];
			$file["Comments"] = $_POST['Comments'];
		
			$data = $this->model->add($file);
			
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data);
	}
	
	
	function action_getfile() {
		
		$data = $this->model->get_row($_GET["ModelType"],$_GET["ModelId"]);
		
		 if (file_exists($data[0]["FilePath"])) {
		 	$file = file_get_contents($data[0]["FilePath"]);
		 	header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header("Content-type: ".$data[0]["FileType"]);
		    header('Content-Disposition: inline; filename="'.basename($data[0]["FileName"]).'"'); //отображаем
		    //header('Content-Disposition: attachment; filename="'.basename($file_data["FileName"]).'"'); //скачиваем
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
	    	header('Content-Length: ' . filesize($data[0]["FileSize"]));
	    	echo $file;
		 }
	}
	
		
	function action_getlist(){
		$data = $this->model->getListJson($_POST["ModelType"],$_POST["ModelId"]);
		echo $data;
	}
	
	function action_getFileById(){
		$data = $this->model->get_rowById($_GET["Id"]);
		
		 if (file_exists($data[0]["FilePath"])) {
		 	$file = file_get_contents($data[0]["FilePath"]);
		 	header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header("Content-type: ".$data[0]["FileType"]);
		    header('Content-Disposition: inline; filename="'.basename($data[0]["FileName"]).'"'); //отображаем
		    //header('Content-Disposition: attachment; filename="'.basename($data[0]["FileName"]).'"'); //скачиваем
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
	    	header('Content-Length: ' . filesize($data[0]["FileSize"]));
	    	echo $file;
		 }
	}
	
	function action_downloadFileById(){
		$data = $this->model->get_rowById($_GET["Id"]);
		
		 if (file_exists($data[0]["FilePath"])) {
		 	$file = file_get_contents($data[0]["FilePath"]);
		    header('Content-Type: application/octet-stream');
		    header("Content-type: ".$data[0]["FileType"]);
		    //header('Content-Disposition: inline; filename="'.basename($data[0]["FileName"]).'"'); //отображаем
		    header('Content-Disposition: attachment; filename="'.basename($data[0]["FileName"]).'"'); //скачиваем
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
	    	header('Content-Length: ' . filesize($data[0]["FileSize"]));
	    	echo $file;
		 }
	}
	
	
	
	function action_delete() {
		$dataFile = $this->model->get_row($_GET["ModelType"],$_GET["ModelId"]);
		//если файл есть удаляем его
		if (file_exists($dataFile[0]["FilePath"])) {
			unlink($dataFile[0]["FilePath"]);
		}
		$data = $this->model->deleteAjax($_GET["ModelType"],$_GET["ModelId"]);
		
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data);
	}
	
	
	function action_deleteFileById() {
		$dataFile = $this->model->get_rowById($_GET["Id"]);
		//если файл есть удаляем его
		if (file_exists($dataFile[0]["FilePath"])) {
			unlink($dataFile[0]["FilePath"]);
		}
		$data = $this->model->deleteByIdAjax($_GET["Id"]);
		echo $data;
	}
}
?>