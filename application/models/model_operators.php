<?php


class Model_Operators extends Model
{
	function __construct() {
		$this->ModelClass = "Operators";
	}
	public function get_row($OperatorId){
		$this->SQL_select = "SELECT * FROM  `vOperators_materialized` where AccId = ? and Id = ?";
		$this->SQL_params_types = array('s', 's');
		$this->SQL_params = array($_SESSION['AccId'], $OperatorId);
		
		$data = null;
		try {
			$data = parent::get_row();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}
		return $data;
	}

	public function add($data)
	{
		$AccId = $_SESSION['AccId'];
		$Id = $data["Id"];
		$Name = $data["Name"];
		$Phone = $data["Phone"];
		$Email = $data["Email"];
		$Commision = $data["Commision"];
		$DealNum = $data["DealNum"];
		$DealDateStart =  $data["DealDateStart"];
		$DealDateEnd =  $data["DealDateEnd"];
		$Login =  $data["Login"];
		$Pass =  $data["Pass"];
		$WebSite =  $data["WebSite"];
		$Address =  $data["Address"];
		
		$Active = "0";
		$DirectPartners = "0";
		/*if(htmlspecialchars1($data["Active"])=="on"){$Active ="1";}
		if(htmlspecialchars1($data["DirectPartners"])=="on"){$DirectPartners ="1";}
		
		$Comments =  htmlspecialchars1($data["Comments"]);*/
		if($data["Active"]=="on"){$Active ="1";}
		if($data["DirectPartners"]=="on"){$DirectPartners ="1";}
		
		$Comments =  $data["Comments"];
		
		

		//если нет Id записи создаём новую.
		
		if($Id==""){
			$this->SQL_insert = "INSERT INTO `dimOperators`(`AccId`,`Name`,`Phone`,`Email`,`Commision`,`DealNum`,`DealDateEnd`,`Login`,`Pass`,`WebSite`,`Address`,`Active`,`DirectPartners`,`Comments`,`DealDateStart`)
								VALUES (?,?,?,?,?,?,STR_TO_DATE(?, '%d.%m.%Y'),?,?,?,?,?,?,?,STR_TO_DATE(?, '%d.%m.%Y'))";
			$this->SQL_insert_params_types = array('s','s','s','s','s','s','s','s','s','s','s','s','s','s','s');
			$this->SQL_insert_params = array($AccId,$Name,$Phone,$Email,$Commision,$DealNum,$DealDateEnd,$Login,$Pass,$WebSite,$Address,$Active,$DirectPartners,$Comments,$DealDateStart);

		} else {
			$this->SQL_update = "UPDATE `dimOperators` 
									set `Name` = ?,
										`Phone` = ?,
										`Email` = ?,
										`Commision` = ?,
										`DealNum` = ?,
										`DealDateStart` =  STR_TO_DATE(?, '%d.%m.%Y'),
										`DealDateEnd` = STR_TO_DATE(?, '%d.%m.%Y'),
										`Login` = ?,
										`Pass` = ?,
										`WebSite` = ?,
										`Address` = ?,
										`Active` = ?,
										`DirectPartners` = ?,
										`Comments` = ?
									WHERE `Id` = ?";
			$this->SQL_update_params_types = array('s','s','s','s','s','s','s','s','s','s','s','s','s','s','s');
			$this->SQL_update_params = array($Name, $Phone, $Email, $Commision, $DealNum,$DealDateStart,$DealDateEnd,$Login,$Pass,$WebSite,$Address,$Active,$DirectPartners,$Comments,$Id);
		}
		$data = null;
		try {
			$data = parent::add($Id);
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}
				
		return $data;
	}

	public function getListJson() {
		
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("vp.Id", "vp.Name", "vp.Phone", "vp.Email", "vp.WebSite", "vp.Login", "vp.Pass", "vod.DealsAmount");
		$dealsQ = $db->subQuery ("vod");
		$dealsQ->get ("vOperatorDeals_materialized");
		
		$db->join($dealsQ, "vp.Id = vod.OperatorId", "LEFT");
		
		$db->where('vp.AccId', $_SESSION['AccId']);
		$json = $db->JsonBuilder()->get("vOperators_materialized vp", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}

	public function getList_dealsJson($Id){
	//$Id ="10";
	//Пользователь видит только свои сделки. Администратор видит все сделки.
		if($_SESSION['UserRole'] == "admin"){
			$sql_count = "select count(*) as count
									from (select d.*,
											CONCAT(IFNULL(vc.LastName,''), ' ' , IFNULL(vc.FirstName,'')) as `ContactName`,
											u.ManagerName,
											vl.LegalName,
											dir.directionname as DirectionName, 
											reg.regionname as RegionName
										   FROM  Deals as d
										   left join vUsers_materialized as u on (d.UserId = u.Id)
											left join Contacts as vc on (d.ContactId = vc.Id and d.AccId = vc.AccId)
										   left join Legals as vl on (d.LegalId = vl.Id and d.AccId = vl.AccId)
											left join dimDirection as dir on (d.directionid = dir.id) 
											left join dimRegion as reg on (d.AccId = reg.AccId and d.regionid = reg.id)
										   where d.AccId =  ? and OperatorId = ?) t
									where 1 = 1";
			$sql_select = "select *
									from (select d.*,
											CONCAT(IFNULL(vc.LastName,''), ' ' , IFNULL(vc.FirstName,'')) as `ContactName`,
											u.ManagerName,
											vl.LegalName,
											dir.directionname as DirectionName, 
											reg.regionname as RegionName
										   FROM  Deals as d
										   left join vUsers_materialized as u on (d.UserId = u.Id)
											left join Contacts as vc on (d.ContactId = vc.Id and d.AccId = vc.AccId)
										   left join Legals as vl on (d.LegalId = vl.Id and d.AccId = vl.AccId)
											left join dimDirection as dir on (d.directionid = dir.id) 
											left join dimRegion as reg on (d.AccId = reg.AccId and d.regionid = reg.id)
										   where d.AccId =  ? and OperatorId = ?) t
									where 1 = 1";
		} else {
			$sql_count = "select count(*) as count
									from (select d.*,
											CONCAT(IFNULL(vc.LastName,''), ' ' , IFNULL(vc.FirstName,'')) as `ContactName`,
											u.ManagerName,
											vl.LegalName,
											dir.directionname as DirectionName, 
											reg.regionname as RegionName
										   FROM  Deals as d
										   left join vUsers_materialized as u on (d.UserId = u.Id)
											left join Contacts as vc on (d.ContactId = vc.Id and d.AccId = vc.AccId)
										   left join Legals as vl on (d.LegalId = vl.Id and d.AccId = vl.AccId)
											left join dimDirection as dir on (d.directionid = dir.id) 
											left join dimRegion as reg on (d.AccId = reg.AccId and d.regionid = reg.id)
										   where d.AccId =  ? and OperatorId = ? and d.UserId = ".$_SESSION['UserId'].") t
									where 1 = 1";
			$sql_select = "select *
									from (select d.*,
											CONCAT(IFNULL(vc.LastName,''), ' ' , IFNULL(vc.FirstName,'')) as `ContactName`,
											u.ManagerName,
											vl.LegalName,
											dir.directionname as DirectionName, 
											reg.regionname as RegionName
										   FROM  Deals as d
										   left join vUsers_materialized as u on (d.UserId = u.Id)
											left join Contacts as vc on (d.ContactId = vc.Id and d.AccId = vc.AccId)
										   left join Legals as vl on (d.LegalId = vl.Id and d.AccId = vl.AccId)
											left join dimDirection as dir on (d.directionid = dir.id) 
											left join dimRegion as reg on (d.AccId = reg.AccId and d.regionid = reg.id)
										   where d.AccId =  ? and OperatorId = ? and d.UserId = ".$_SESSION['UserId'].") t
									where 1 = 1";
		}

		$this->SQL_select_count = $sql_count;
		$this->SQL_params_types_count = array('s','s');
		$this->SQL_params_count = array($_SESSION['AccId'],$Id);

		$this->SQL_select = $sql_select;
		$this->SQL_params_types = array('s','s');
		$this->SQL_params = array($_SESSION['AccId'],$Id);

		$data = null;
		try {
			$data = parent::getListJson();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}
		echo json_encode($data);
	}
	
	
	
	public function getOperatorsListItems($Search) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("o.Id id", "o.Name text");
		$db->where('o.AccId', $_SESSION['AccId']);
		$db->where('o.Active', "1");
		$db->where("(o.Name like ?)", array('%'.$Search.'%'));
		//$db->join("LegalToContact as lc", "l.AccId = lc.AccId and l.Id = lc.LegalId and lc.ContactId = ".$ContacId, "LEFT");
		//$db->where('c.Id', $ContactId, '!=');
		$db->orderBy('o.Name', 'asc');
		
		$json = $db->JsonBuilder()->get("dimOperators o", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	public function addx($data){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
        
		if($data["DealDateStart"] == ""){$data["DealDateStart"] = "00.00.0000";}
		if($data["DealDateEnd"] == ""){$data["DealDateEnd"] = "00.00.0000";}
		
		
		if($data["Active"]=="on"){$data["Active"] ="1";} else {$data["Active"] = "0";}
		if($data["DirectPartners"]=="on"){$data["DirectPartners"] ="1";} else {$data["DirectPartners"] = "0";}
        
        
		$dataX = array ("AccId"       => $_SESSION['AccId'],
						"Name"        => $data["Name"],
						"Phone"       => $data["Phone"],
						"Email"       => $data["Email"],
						"Commision"   => $data["Commision"],
						"WebSite"     => $data["WebSite"],
						"Address"     => $data["Address"],
						"Comments"    => $data["Comments"],
						"Login"       => $data["Login"],
						"Pass"        => $data["Pass"],
						"DealNum"     => $data["DealNum"],
						"DealDateStart"  => toFormat("d.m.Y","Y-m-d",$data["DealDateStart"]),
						"DealDateEnd"    => toFormat("d.m.Y","Y-m-d",$data["DealDateEnd"]),
						"Active"		 => $data["Active"],
						"DirectPartners" => $data["DirectPartners"],
						"DealNum"        => $data["DealNum"]
						
		);
		if(!isset($data["Id"]) || $data["Id"]==""){
			$id = $db->insert ('dimOperators', $dataX);
			if($id){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
				$data["OperatorId"] = $id;
				$data["OperatorName"] = $data["Name"];
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
		} else {
			$db->where ('AccId',$_SESSION['AccId']);
			$db->where ('Id',$data["Id"]);
			if ($db->update ('dimOperators', $dataX)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
				$data["OperatorId"] = $data["Id"];
				$data["OperatorName"] = $data["Name"];
				
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
			}
		}
		$db->disconnect();
		return $data;
	}
	
	
	
	
	public function deleteAjax($Id){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('Id', $Id);
		$db->delete('dimOperators');
		
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