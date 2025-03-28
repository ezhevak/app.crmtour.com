<?php


class Model_Dictionary extends Model
{
	function __construct() {
		$this->ModelClass = "Dictionary";
	}

	public function getDirections() {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        //$db->where("AccId", $_SESSION['AccId']);
		$cols = array ("Id", "DirectionName");
		$json = $db->JsonBuilder()->get("dimDirection", null, $cols);
		$db->disconnect();
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}

	public function getHotels($directionId) {
				
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("DirectionId", $directionId);
		$cols = array ("Id", "DirectionId", "HotelName", "ifnull(HotelStarsName,'') HotelStarsName");
		
		$json = $db->JsonBuilder()->get("vHotels_materialized", null, $cols);
		$db->disconnect();
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}

	public function getRegions($directionId) {
		//echo $DiractionId;
				
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("DirectionId", $directionId);
		$cols = array ("Id", "DirectionId", "RegionName");
		$json = $db->JsonBuilder()->get("dimRegion", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}

	public function getDictionaries() {
		$this->SQL_select_count = "select * from (SELECT COUNT(*) AS count FROM  `Dictionaries` where AccId = ? and Type not in ('Segment','Priority')) t where  1= 1";
		$this->SQL_params_types_count = array('s');
		$this->SQL_params_count = array($_SESSION['AccId']);

		$this->SQL_select = "select * from (select `Id` as id, `AccId`, `Type`, `SubType`, `Name`, `Lang`, `LIC`, `OrderBy`, `Created`, `LastUpdate`, Active
FROM `Dictionaries` where AccId = ? and Type not in ('Segment','Priority')) t where 1 = 1";
		$this->SQL_params_types = array('s');
		$this->SQL_params = array($_SESSION['AccId']);

		$data = null;
		try {
			$data = parent::getListJson();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}

		echo json_encode($data);
	}

	public function editDictionary($oper_type, $data_fields) {
		if ($oper_type == "edit") {
			$this->SQL_update = "UPDATE `Dictionaries` set Active=?,Type = ?,SubType = ?, Name = ?, Lang = ?, LIC = ?, OrderBy = ? where Id=?";
			$this->SQL_update_params_types = array('s','s','s','s','s','s','s','s');
			$this->SQL_update_params = array($data_fields["Active"], $data_fields["Type"], $data_fields["SubType"], $data_fields["Name"], $data_fields["Lang"],
			$data_fields["LIC"], $data_fields["OrderBy"], $data_fields["Id"]);

		} else if ($oper_type == "add") {
			$this->SQL_insert = "INSERT INTO `Dictionaries`(Active,AccId, Type, SubType, Name, Lang, LIC, OrderBy)
			VALUES(?,?,?,?,?,?,?,?)";
			$this->SQL_insert_params_types = array('s','s','s','s','s','s','s','s');
			$this->SQL_insert_params = array($data_fields["Active"],$_SESSION['AccId'], $data_fields["Type"], $data_fields["SubType"], $data_fields["Name"], $data_fields["Lang"],
			$data_fields["LIC"], $data_fields["OrderBy"]);
		}

		$data = null;
		try {
			if ($data_fields["Id"] == "_empty")
				$data = parent::add("");
			else
				$data = parent::add($data_fields["Id"]);
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
			header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
		}
	}
	
	public function getDictionaryListItems($Search,$Type) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("d.LIC id", "d.Name text");
		$db->where('d.AccId', $_SESSION['AccId']);
		$db->where('d.Active', "Y");
		$db->where('d.Lang', "ru_RU");
		$db->where('d.Type', $Type);
		$db->where("(d.Name like ?)", array('%'.$Search.'%'));
		//$db->join("LegalToContact as lc", "l.AccId = lc.AccId and l.Id = lc.LegalId and lc.ContactId = ".$ContacId, "LEFT");
		//$db->where('c.Id', $ContactId, '!=');
		$db->orderBy('d.OrderBy', 'asc');
		
		$json = $db->JsonBuilder()->get("Dictionaries d", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	
	public function getDictionaryValue($Type,$lic) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("*");
		$db->where('d.AccId', $_SESSION['AccId']);
		$db->where('d.Lang', "ru_RU");
		$db->where('d.Type', $Type);
		$db->where('d.LIC', $lic);
		//$db->join("LegalToContact as lc", "l.AccId = lc.AccId and l.Id = lc.LegalId and lc.ContactId = ".$ContacId, "LEFT");
		//$db->where('c.Id', $ContactId, '!=');
		
		$json = $db->JsonBuilder()->get("Dictionaries d", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	
	public function add($data){

		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
        
        //Смотрим есть ли такое значение в базе.
        $cols = array ("Id", "LIC","Name", "OrderBy");
        $db->where('AccId',$_SESSION['AccId']);
		$db->where('Type', $data["Type"]);
		$db->where('Lang', 'ru_RU');
		$db->where('Name', $data["Name"]);
    	$data["Id"] = $db->getValue("Dictionaries", "Id");
  	
  
        
    	$dataX = array ("AccId"  => $_SESSION['AccId'],
		                "Type"	 => $data["Type"],
						"Name"   => $data["Name"],
						"Lang"   => "ru_RU",
						"Active" => "Y",
						"LIC"    => translit($data["Name"])
					
		);
        
        if((!isset($data["Id"]) || $data["Id"]=="" || $data["Id"]=="0")) {
        	
			$db->where('AccId',$_SESSION['AccId']);
			$db->where('Type', $data["Type"]);
			$db->where('Lang', 'ru_RU');
	    	$dataX["OrderBy"] = $db->getValue("Dictionaries", "max(OrderBy)+1");
        	
        	$id = $db->insert ('Dictionaries', $dataX);
			if($id){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
			   	$data["LIC"] =	$dataX["LIC"];
			   	$data["Name"] = $dataX["Name"];
				
				
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
        } else {
        		$data["status"] ="warning";
			    $data["message"] = "Указанная запись '".$data["Name"]."' уже существует.";
        }
        
		$db->disconnect();
		return $data;
		
	}
	
	
	public function getDirectionsListItems($Search) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("d.Id id", "CONCAT(d.DirectionName, ' (', d.DirectionFullName, ')')text");
		//$db->where('u.AccId', $_SESSION['AccId']);
		$db->where("(d.DirectionName like ? or d.DirectionFullName like ?)", array('%'.$Search.'%','%'.$Search.'%'));
		//$db->join("dimDirection as dd", "ap.DirectionId = dd.Id", "LEFT");
		//$db->where('c.Id', $ContactId, '!=');
		$db->orderBy('d.DirectionName', 'asc');
		
		$json = $db->JsonBuilder()->get("dimDirection d", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	
	public function setDictionaryForNewAccount($AccId){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$dataX[] = ['AccId' => $AccId, 'Type' => 'AddressType', 'Name' => 'Мобильный', 'Lang' => 'ru_RU', 'LIC' => 'PhoneMob','SubType' => 'Phone','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'AddressType', 'Name' => 'Домашний', 'Lang' => 'ru_RU', 'LIC' => 'PhoneHome','SubType' => 'Phone','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'AddressType', 'Name' => 'TravelSim', 'Lang' => 'ru_RU', 'LIC' => 'PhoneTravelSim','SubType' => 'Phone','OrderBy' => '4','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'AddressType', 'Name' => 'Email домашний', 'Lang' => 'ru_RU', 'LIC' => 'EmailHome','SubType' => 'Email','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'AddressType', 'Name' => 'Email рабочий', 'Lang' => 'ru_RU', 'LIC' => 'EmailWork','SubType' => 'Email','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'AddressType', 'Name' => 'Рабочий', 'Lang' => 'ru_RU', 'LIC' => 'PhoneWork','SubType' => 'Phone','OrderBy' => '3','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'AgentClient', 'Name' => 'Агент', 'Lang' => 'ru_RU', 'LIC' => 'Agent','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'AgentClient', 'Name' => 'Клиент', 'Lang' => 'ru_RU', 'LIC' => 'Client','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'DealCurrency', 'Name' => 'Гривна', 'Lang' => 'ru_RU', 'LIC' => 'grn','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'DealCurrency', 'Name' => 'USD', 'Lang' => 'ru_RU', 'LIC' => 'usd','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'DealCurrency', 'Name' => 'EURO', 'Lang' => 'ru_RU', 'LIC' => 'euro','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'DealPayType', 'Name' => 'Приход', 'Lang' => 'ru_RU', 'LIC' => 'income','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'DealPayType', 'Name' => 'Расход', 'Lang' => 'ru_RU', 'LIC' => 'expense','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'DealType', 'Name' => 'Тур', 'Lang' => 'ru_RU', 'LIC' => 'DealTour','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'DocType', 'Name' => 'Загран паспорт', 'Lang' => 'ru_RU', 'LIC' => 'intPass','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'DocType', 'Name' => 'Паспорт Украины', 'Lang' => 'ru_RU', 'LIC' => 'ukrPass','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'DocType', 'Name' => 'Id карта', 'Lang' => 'ru_RU', 'LIC' => 'idCard','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FeedType', 'Name' => 'ALL (все включено)', 'Lang' => 'ru_RU', 'LIC' => 'ALL','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FeedType', 'Name' => 'BB (завтраки)', 'Lang' => 'ru_RU', 'LIC' => 'BB','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FeedType', 'Name' => 'FB (3-х разовое пита', 'Lang' => 'ru_RU', 'LIC' => 'FB','SubType' => '','OrderBy' => '4','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FeedType', 'Name' => 'HB (завтрак – ужин)', 'Lang' => 'ru_RU', 'LIC' => 'HB','SubType' => '','OrderBy' => '3','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FeedType', 'Name' => 'RO (без питания)', 'Lang' => 'ru_RU', 'LIC' => 'RO','SubType' => '','OrderBy' => '5','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FeedType', 'Name' => 'UAL (ультра все включено)', 'Lang' => 'ru_RU', 'LIC' => 'UAL','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Apartament', 'Lang' => 'ru_RU', 'LIC' => 'Apartament','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Bungalow', 'Lang' => 'ru_RU', 'LIC' => 'Bungalow','SubType' => '','OrderBy' => '13','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Club room', 'Lang' => 'ru_RU', 'LIC' => 'Club room','SubType' => '','OrderBy' => '14','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Comfort room', 'Lang' => 'ru_RU', 'LIC' => 'Comfort room','SubType' => '','OrderBy' => '11','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Deluxe', 'Lang' => 'ru_RU', 'LIC' => 'Deluxe','SubType' => '','OrderBy' => '10','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Duplex', 'Lang' => 'ru_RU', 'LIC' => 'Duplex','SubType' => '','OrderBy' => '9','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Econom', 'Lang' => 'ru_RU', 'LIC' => 'Econom','SubType' => '','OrderBy' => '8','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Family room', 'Lang' => 'ru_RU', 'LIC' => 'Family room','SubType' => '','OrderBy' => '7','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Junior', 'Lang' => 'ru_RU', 'LIC' => 'Junior','SubType' => '','OrderBy' => '6','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Premium Room', 'Lang' => 'ru_RU', 'LIC' => 'Premium Room','SubType' => '','OrderBy' => '5','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Standart room', 'Lang' => 'ru_RU', 'LIC' => 'Standart room','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Studio', 'Lang' => 'ru_RU', 'LIC' => 'Studio','SubType' => '','OrderBy' => '4','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Suite', 'Lang' => 'ru_RU', 'LIC' => 'Suite','SubType' => '','OrderBy' => '3','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Superior', 'Lang' => 'ru_RU', 'LIC' => 'Superior','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'FlatType', 'Name' => 'Villa', 'Lang' => 'ru_RU', 'LIC' => 'Villa','SubType' => '','OrderBy' => '12','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelBeach', 'Name' => 'Песок', 'Lang' => 'ru_RU', 'LIC' => 'Send','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelBeach', 'Name' => 'Галька крупная', 'Lang' => 'ru_RU', 'LIC' => 'Pebble Big','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelBeach', 'Name' => 'Галька мелкая', 'Lang' => 'ru_RU', 'LIC' => 'Pebble Small','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelBeachLine', 'Name' => '1', 'Lang' => 'ru_RU', 'LIC' => 'HotelBeachLine1','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelBeachLine', 'Name' => '2', 'Lang' => 'ru_RU', 'LIC' => 'HotelBeachLine2','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelBeachLine', 'Name' => '3', 'Lang' => 'ru_RU', 'LIC' => 'HotelBeachLine3','SubType' => '','OrderBy' => '3','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelStars', 'Name' => '2*', 'Lang' => 'ru_RU', 'LIC' => '2','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelStars', 'Name' => '3*', 'Lang' => 'ru_RU', 'LIC' => '3','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelStars', 'Name' => '4*', 'Lang' => 'ru_RU', 'LIC' => '4','SubType' => '','OrderBy' => '3','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelStars', 'Name' => '5*', 'Lang' => 'ru_RU', 'LIC' => '5','SubType' => '','OrderBy' => '4','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelStars', 'Name' => '5* Lux', 'Lang' => 'ru_RU', 'LIC' => '5 Lux','SubType' => '','OrderBy' => '5','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelStars', 'Name' => 'HV', 'Lang' => 'ru_RU', 'LIC' => 'HV','SubType' => '','OrderBy' => '6','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelStars', 'Name' => 'Apart', 'Lang' => 'ru_RU', 'LIC' => 'Apart','SubType' => '','OrderBy' => '7','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelTripAdvisor', 'Name' => '1', 'Lang' => 'ru_RU', 'LIC' => 'HotelTripAdvisor1','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelTripAdvisor', 'Name' => '2', 'Lang' => 'ru_RU', 'LIC' => 'HotelTripAdvisor2','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelTripAdvisor', 'Name' => '3', 'Lang' => 'ru_RU', 'LIC' => 'HotelTripAdvisor3','SubType' => '','OrderBy' => '3','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelTripAdvisor', 'Name' => '4', 'Lang' => 'ru_RU', 'LIC' => 'HotelTripAdvisor4','SubType' => '','OrderBy' => '4','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelTripAdvisor', 'Name' => '5', 'Lang' => 'ru_RU', 'LIC' => 'HotelTripAdvisor5','SubType' => '','OrderBy' => '5','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelType', 'Name' => 'Семейный', 'Lang' => 'ru_RU', 'LIC' => 'HotelFamily','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelType', 'Name' => 'Молодежный', 'Lang' => 'ru_RU', 'LIC' => 'HotelYoung','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelType', 'Name' => 'Adult only', 'Lang' => 'ru_RU', 'LIC' => 'HotelAdult','SubType' => '','OrderBy' => '3','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'HotelType', 'Name' => '', 'Lang' => 'ru_RU', 'LIC' => 'HotelNull','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Lang', 'Name' => 'Русский', 'Lang' => 'ru_RU', 'LIC' => 'ru_RU','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'LeadSource', 'Name' => 'Звонок', 'Lang' => 'ru_RU', 'LIC' => 'Call','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'LeadSource', 'Name' => 'Email', 'Lang' => 'ru_RU', 'LIC' => 'Email','SubType' => '','OrderBy' => '3','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'LeadSource', 'Name' => 'Facebook', 'Lang' => 'ru_RU', 'LIC' => 'Facebook','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'LeadSource', 'Name' => 'SMS', 'Lang' => 'ru_RU', 'LIC' => 'SMS','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'LeadSource', 'Name' => 'Web Site', 'Lang' => 'ru_RU', 'LIC' => 'WebSite','SubType' => '','OrderBy' => '4','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'LeadSource', 'Name' => 'Другой источник', 'Lang' => 'ru_RU', 'LIC' => 'OtherSource','SubType' => '','OrderBy' => '6','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'LeadStatus', 'Name' => 'Новый', 'Lang' => 'ru_RU', 'LIC' => 'New','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'LeadStatus', 'Name' => 'Обработан', 'Lang' => 'ru_RU', 'LIC' => 'Processed','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'LeadStatus', 'Name' => 'Потерян', 'Lang' => 'ru_RU', 'LIC' => 'Lost','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'LeadType', 'Name' => 'Тур', 'Lang' => 'ru_RU', 'LIC' => 'Tour','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => '2 DBL', 'Lang' => 'ru_RU', 'LIC' => '2DBL','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => '2 SNGL', 'Lang' => 'ru_RU', 'LIC' => '2SNGL','SubType' => '','OrderBy' => '13','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => '4 АDD', 'Lang' => 'ru_RU', 'LIC' => '4АDD','SubType' => '','OrderBy' => '14','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'DBL', 'Lang' => 'ru_RU', 'LIC' => 'DBL','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'DBL+1 CHD+inf', 'Lang' => 'ru_RU', 'LIC' => 'DBL+1CHD+inf','SubType' => '','OrderBy' => '15','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'DBL+2 CHD', 'Lang' => 'ru_RU', 'LIC' => 'DBL+2CHD','SubType' => '','OrderBy' => '16','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'DBL+2 CHD+inf', 'Lang' => 'ru_RU', 'LIC' => 'DBL+2CHD+inf','SubType' => '','OrderBy' => '17','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'DBL+CHD', 'Lang' => 'ru_RU', 'LIC' => 'DBL+CHD','SubType' => '','OrderBy' => '18','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'DBL+Ex.b.', 'Lang' => 'ru_RU', 'LIC' => 'DBL+Ex.b.','SubType' => '','OrderBy' => '19','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'DBL+infant', 'Lang' => 'ru_RU', 'LIC' => 'DBL+infant','SubType' => '','OrderBy' => '12','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'DBL+SNGL', 'Lang' => 'ru_RU', 'LIC' => 'DBL+SNGL','SubType' => '','OrderBy' => '11','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'DBL+SNGL+CHD', 'Lang' => 'ru_RU', 'LIC' => 'DBL+SNGL+CHD','SubType' => '','OrderBy' => '10','Active' => 'N'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'DBL+TRPL', 'Lang' => 'ru_RU', 'LIC' => 'DBL+TRPL','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'SNGL', 'Lang' => 'ru_RU', 'LIC' => 'SNGL','SubType' => '','OrderBy' => '3','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'SNGL+2 CHD', 'Lang' => 'ru_RU', 'LIC' => 'SNGL+2CHD','SubType' => '','OrderBy' => '4','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'SNGL+CHD', 'Lang' => 'ru_RU', 'LIC' => 'SNGL+CHD','SubType' => '','OrderBy' => '5','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'SNGL+infant', 'Lang' => 'ru_RU', 'LIC' => 'SNGL+infant','SubType' => '','OrderBy' => '6','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'TRPL', 'Lang' => 'ru_RU', 'LIC' => 'TRPL','SubType' => '','OrderBy' => '7','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'TRPL+CHD', 'Lang' => 'ru_RU', 'LIC' => 'TRPL+CHD','SubType' => '','OrderBy' => '8','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'TRPL+CHD+INF', 'Lang' => 'ru_RU', 'LIC' => 'TRPL+CHD+INF','SubType' => '','OrderBy' => '9','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'PlacingType', 'Name' => 'TRPL+INF', 'Lang' => 'ru_RU', 'LIC' => 'TRPL+INF','SubType' => '','OrderBy' => '20','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Priority', 'Name' => 'Обычный', 'Lang' => 'ru_RU', 'LIC' => 'Normal','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Priority', 'Name' => 'Важный', 'Lang' => 'ru_RU', 'LIC' => 'Important','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Priority', 'Name' => 'Срочный', 'Lang' => 'ru_RU', 'LIC' => 'Urgent','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Rating', 'Name' => 'Очень плохо', 'Lang' => 'ru_RU', 'LIC' => 'VeryBad','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Rating', 'Name' => 'Плохо', 'Lang' => 'ru_RU', 'LIC' => 'Bad','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Rating', 'Name' => 'Хорошо', 'Lang' => 'ru_RU', 'LIC' => 'Good','SubType' => '','OrderBy' => '3','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Rating', 'Name' => 'Очень хорошо', 'Lang' => 'ru_RU', 'LIC' => 'VeryGood','SubType' => '','OrderBy' => '4','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Rating', 'Name' => 'Отлично', 'Lang' => 'ru_RU', 'LIC' => 'Perfect','SubType' => '','OrderBy' => '5','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'RoomView', 'Name' => 'City view', 'Lang' => 'ru_RU', 'LIC' => 'CityView','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'RoomView', 'Name' => 'Front Sea view', 'Lang' => 'ru_RU', 'LIC' => 'FrontSeaView','SubType' => '','OrderBy' => '3','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'RoomView', 'Name' => 'Garden view', 'Lang' => 'ru_RU', 'LIC' => 'GardenView','SubType' => '','OrderBy' => '4','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'RoomView', 'Name' => 'Land view', 'Lang' => 'ru_RU', 'LIC' => 'LandView','SubType' => '','OrderBy' => '5','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'RoomView', 'Name' => 'Land view & Sea View', 'Lang' => 'ru_RU', 'LIC' => 'LandViewSeaView','SubType' => '','OrderBy' => '6','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'RoomView', 'Name' => 'Pool view', 'Lang' => 'ru_RU', 'LIC' => 'PoolView','SubType' => '','OrderBy' => '7','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'RoomView', 'Name' => 'Main building', 'Lang' => 'ru_RU', 'LIC' => 'MainBuilding','SubType' => '','OrderBy' => '8','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'RoomView', 'Name' => 'ROH', 'Lang' => 'ru_RU', 'LIC' => 'ROH','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'RoomView', 'Name' => 'Sea view', 'Lang' => 'ru_RU', 'LIC' => 'SeaView','SubType' => '','OrderBy' => '9','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'RoomView', 'Name' => 'Side Sea view', 'Lang' => 'ru_RU', 'LIC' => 'SideSeaView','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Segment', 'Name' => 'Перспективный', 'Lang' => 'ru_RU', 'LIC' => 'Prospective','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Segment', 'Name' => 'Активный', 'Lang' => 'ru_RU', 'LIC' => 'Active','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Segment', 'Name' => 'VIP', 'Lang' => 'ru_RU', 'LIC' => 'VIP','SubType' => '','OrderBy' => '3','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Segment', 'Name' => '', 'Lang' => 'ru_RU', 'LIC' => 'NoSegment','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Sex', 'Name' => 'Мужской', 'Lang' => 'ru_RU', 'LIC' => 'Male','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Sex', 'Name' => 'Женский', 'Lang' => 'ru_RU', 'LIC' => 'Female','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'TemplateModule', 'Name' => 'Сделка', 'Lang' => 'ru_RU', 'LIC' => 'Deal','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'TemplateModule', 'Name' => 'Адрес', 'Lang' => 'ru_RU', 'LIC' => 'Address','SubType' => '','OrderBy' => '7','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'TemplateModule', 'Name' => 'Физ.лицо', 'Lang' => 'ru_RU', 'LIC' => 'Contact','SubType' => '','OrderBy' => '6','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'TemplateModule', 'Name' => 'Документ', 'Lang' => 'ru_RU', 'LIC' => 'Document','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'TemplateModule', 'Name' => 'Запросы', 'Lang' => 'ru_RU', 'LIC' => 'Lead','SubType' => '','OrderBy' => '3','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'TemplateModule', 'Name' => 'Юр. Лицо', 'Lang' => 'ru_RU', 'LIC' => 'Legal','SubType' => '','OrderBy' => '4','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'TemplateModule', 'Name' => 'Платежи', 'Lang' => 'ru_RU', 'LIC' => 'Payment','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Transfer', 'Name' => 'Гідролітак', 'Lang' => 'ru_RU', 'LIC' => 'DealSeaplane','SubType' => '','OrderBy' => '3','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Transfer', 'Name' => 'Груповий', 'Lang' => 'ru_RU', 'LIC' => 'DealGroup','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Transfer', 'Name' => 'Згідно з програмою', 'Lang' => 'ru_RU', 'LIC' => 'DealProgram','SubType' => '','OrderBy' => '1','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Transfer', 'Name' => 'Ні', 'Lang' => 'ru_RU', 'LIC' => 'DealNo','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Transfer', 'Name' => 'Індивідуальний', 'Lang' => 'ru_RU', 'LIC' => 'DealIndividual','SubType' => '','OrderBy' => '4','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'Transfer', 'Name' => 'Элитный трансфер (2 отеля)', 'Lang' => 'ru_RU', 'LIC' => 'DealElit','SubType' => '','OrderBy' => '5','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'userRole', 'Name' => 'Администратор', 'Lang' => 'ru_RU', 'LIC' => 'admin','SubType' => '','OrderBy' => '2','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'userRole', 'Name' => 'Менеджер', 'Lang' => 'ru_RU', 'LIC' => 'user','SubType' => '','OrderBy' => '0','Active' => 'Y'];
		$dataX[] = ['AccId' => $AccId, 'Type' => 'userRole', 'Name' => 'Руководитель офиса', 'Lang' => 'ru_RU', 'LIC' => 'owner','SubType' => '','OrderBy' => '1','Active' => 'Y'];


				
				
		$Id = $db->insertMulti('Dictionaries', $dataX);
		if($Id){
			$data["status"]="success";
			$data["message"]="Справочники успешно загружены";
		} else {
			
			$data["status"]="error";
			$data["message"]="Возникла ошибка при загрузке справочников '".$db->getLastError()."'";
			
		}
		return $data;		
		
	}
	
	
	
	
	
}
?>