<?php

class Controller_Hotels extends Controller
{

	function __construct(){
		$this->model = new Model_Hotels();
		$this->view = new View();
	}

	function action_index(){
		$data = $this->model->get_data();
		$this->view->generate('hotels/hotels_view.php', 'template_view.php', $data, ["jqgrid","datatables"], ["hotels/hotels_index"]);
	}

	function action_getlist(){
		$data = $this->model->getListJson();
		echo $data;
	}

	function action_add($HotelId)
	{
		//echo "ctrl add";
		if (isset($HotelId)){
			$Id = $HotelId;
		} else {
			$Id = $_GET["Id"];
		}
			
 
		$data = $this->model->get_row($Id);
	
	//	echo json_encode($data);
		
		if (empty($data)) {
			$data[0]["Id"] = "";
			//$data[0]["HotelRating"] = "Perfect";
			//$data[0]["HotelStars"] = "5";
		} else {
			//получаем информацию по связанным файлам
			include_once "application/models/model_uploads.php";
			$upload = new Model_Uploads();	
			$uploaddata = $upload->get_row('hotels',$Id);
			$data[0]["FileName"] = $uploaddata[0]["FileName"];
			
		}
		
		//echo json_encode($data);
		$this->view->generate('hotels/add_hotel.php', 'template_view.php', $data,  ["inputmask","validate","cascadedropdown","select2","validate"], ["hotels/hotels_edit"]);			
	}
	
	function action_addajax() {
		$array = [
			"HotelName"    => $_POST["HotelName"],
			"DirectionId"  => $_POST["DirectionId"],
			"RegionId"     => $_POST["RegionId"],
			"HotelStars"   => $_POST["HotelStars"],
			"HotelPhone"   => $_POST["HotelPhone"],
			"HotelEmail"   => $_POST["HotelEmail"],
			"HotelWebSite" => $_POST["HotelWebSite"],
			"HotelRating"  => $_POST["HotelRating"],
			"HotelBeach"   => $_POST["HotelBeach"],
			"HotelType"    => $_POST["HotelType"],
			"HotelBeachLine" => $_POST["HotelBeachLine"],
			"HotelJurAddress" => $_POST["HotelJurAddress"],
			"HotelJurName" => $_POST["HotelJurName"],
			"Comments"     => $_POST["HotelComments"]
		];
		$data = $this->model->add($array);
		echo json_encode($data);
	}

	function action_save()
	{
		$array = [
			"Id" => $_POST["Id"],
			"HotelName" => $_POST["HotelName"],
			"HotelStars" => $_POST["HotelStars"],
			"DirectionId" => $_POST["DirectionName"],
			"RegionId" => $_POST["RegionName"],
			"HotelPhone" => $_POST["HotelPhone"],
			"HotelFax" => $_POST["HotelFax"],
			"HotelEmail" => $_POST["HotelEmail"],
			"HotelWebSite" => $_POST["HotelWebSite"],
			"HotelRating" => $_POST["HotelRating"],
			"HotelBeach" => $_POST["HotelBeach"],
			"Comments" => $_POST["Comments"],
			"HotelType" => $_POST["HotelType"],
			"HotelBeachLine" => $_POST["HotelBeachLine"],
			//"HotelTripAdvisor" => $_POST["HotelTripAdvisor"],
			//"TripAdvisorLink" => $_POST["TripAdvisorLink"],
			"HotelJurAddress" => $_POST["HotelJurAddress"],
			"HotelJurName" => $_POST["HotelJurName"]
		];
		
		$data = $this->model->add($array);
		
		if ($data["status"] == "success") {
			
			if (!empty($_FILES['fileUploadName']['tmp_name'])) {
				
				$file["ModelType"] = "hotels";
				$file["ModelId"] = $data["Id"];
				$file["Comments"] = "";
				$file["File"] = $_FILES['fileUploadName'];
				
				include_once "application/models/model_uploads.php";
				$upload = new Model_Uploads();	
				
				//Если вдруг решили заменить на более новый файл, старый нужно удалить.
				//Начало удаления
				$delFile = $upload->get_row($file["ModelType"],$file["ModelId"]);
				//если файл есть удаляем его
				if (file_exists($delFile[0]["FilePath"])) {
					unlink($delFile[0]["FilePath"]);
				}
				$del = $upload->deleteAjax($file["ModelType"],$file["ModelId"]);
				//Конец удаления
				
				//после удалению загружаем новый файл в базу и на файловую систему
				$uploaddata = $upload->add($file);
			}
			//echo json_encode($uploaddata);
			//header('Location: /hotels/add?Id='.$data["Id"]);
			header('Location: /hotels');
			
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