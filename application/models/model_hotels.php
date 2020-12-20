<?php


class Model_Hotels extends Model
{
	function __construct() {
		$this->ModelClass = "Hotels";
	}
	
	public function get_row($Id){
		 require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Id", $Id);
		//$cols = array ("Id", "Name","Description", "Status","DocUrl","UserId");
		$data = $db->get("vHotels", null, "*");
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}

	
	public function add($data){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();

		$dataX = array ("AccId"		=> $_SESSION['AccId'],
						"Id"		=> $data["Id"],
						"HotelName" => $data["HotelName"],
						"HotelStars" => $data["HotelStars"],
						"DirectionId" => $data["DirectionId"],
						"RegionId"	=> $data["RegionId"],
						"HotelPhone"  => $data["HotelPhone"],
						"HotelFax"	=> $data["HotelFax"],
						"HotelEmail"  => $data["HotelEmail"],
						"HotelWebSite" => $data["HotelWebSite"],
						"HotelRating" => $data["HotelRating"],
						"HotelBeach"  => $data["HotelBeach"],
						"Comments"	  => $data["Comments"],
						"HotelType"   => $data["HotelType"],
						//"HotelTripAdvisor" => $data["HotelTripAdvisor"],
						"HotelBeachLine" => $data["HotelBeachLine"],
						"HotelJurAddress" => $data["HotelJurAddress"],
						"HotelJurName" =>$data["HotelJurName"]					
		);
		

		if(!isset($data["Id"]) || $data["Id"]==""){
			$id = $db->insert ('dimHotels', $dataX);
			if($id){
				$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
				$data["Id"] = $id;
			} else {
				$data["status"] ="error";
				$data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
		} else {
			$db->where ('AccId',$_SESSION['AccId']);
			$db->where ('Id',$data["Id"]);
			if ($db->update ('dimHotels', $dataX)){
				$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
				$data["Id"] = $data["Id"];
				
			} else {
				$data["status"] ="error";
				$data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
			}   
		}
		
		$db->disconnect();
		return $data;
	}
	
	public function getListJson() {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("vh.Id","vh.HotelName","vh.DirectionName","vh.RegionName","vh.HotelStarsName","vh.HotelBeachName","vh.HotelRatingName",
					   "vh.ScanExists","vh.HotelWebSite", "vhd.DealsAmount","vh.HotelRating");
		$dealsQ = $db->subQuery ("vhd");
		$dealsQ->get ("vHotelDeals");
		$db->join($dealsQ, "vh.Id = vhd.HotelId", "LEFT");
		
		$db->where('vh.AccId', $_SESSION['AccId']);
		$json = $db->JsonBuilder()->get("vHotels vh", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;

	}
	
	public function deleteAjax($Id){
			
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('Id', $Id);
		//header('Content-Type: application/json; charset=utf-8');
		$db->delete('dimHotels');
		
		if ($db->getLastErrno() === 0){
			$data["status"] ="success";
			$data["message"] ="Успешно удалена запись";
		} else {
			$data["status"] ="error";
			$data["message"] = $db->getLastError();
		}
		$db->disconnect();
		header('Content-Type: application/json; charset=utf-8');
		return json_encode($data);
	}
	
}
?>