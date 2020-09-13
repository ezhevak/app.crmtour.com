<?php


class Model_Main extends Model
{
	function __construct() {
		$this->ModelClass = "Main";
	}

	
	//public function get_amount_leads($AccId){
	//	$this->SQL_select = "SELECT count(Id) as AmountNewLeads FROM  `vLeads` where AccId = ? and LeadStatus = 'New'";
	//	$this->SQL_params_types = array('s');
	//	$this->SQL_params = array($AccId);
	//
	//	$data = null;
	//	try {
	//		$data = parent::get_row();
	//	} catch(Exception $e) {
	//		echo 'Выброшено исключение: '.$e->getMessage();
	//	}
	//	return $data;
	//}
	
	
	
	//public function get_amount_tasks($AccId){
	//	$this->SQL_select = "SELECT count(Id) as AmountTasks FROM  `Tasks` where AccId = ? and Done = 0";
	//	$this->SQL_params_types = array('s');
	//	$this->SQL_params = array($AccId);
	//
	//	$data = null;
	//	try {
	//		$data = parent::get_row();
	//	} catch(Exception $e) {
	//		echo 'Выброшено исключение: '.$e->getMessage();
	//	}
	//	return $data;
	//}
	
	//public function get_new_contacts($AccId){
	//	$this->SQL_select = "SELECT count(Id) AmountNewContacts
	//						 FROM `vContacts` 
	//						 where AccId = ?
	//						  and date(Created) between DATE_ADD(CURDATE(), INTERVAL -30 DAY) and CURDATE()";
	//	$this->SQL_params_types = array('s');
	//	$this->SQL_params = array($AccId);
	//
	//	$data = null;
	//	try {
	//		$data = parent::get_row();
	//	} catch(Exception $e) {
	//		echo 'Выброшено исключение: '.$e->getMessage();
	//	}
	//	return $data;
	//}
	//public function get_new_deals($AccId){
	//	$this->SQL_select = "SELECT count(Id) AmountNewDeals
	//						 FROM `vDeals` 
	//						 where AccId = ?
	//						 and date(DealDateOriginal) between DATE_ADD(CURDATE(), INTERVAL -30 DAY) and CURDATE()";
	//	$this->SQL_params_types = array('s');
	//	$this->SQL_params = array($AccId);
	//
	//	$data = null;
	//	try {
	//		$data = parent::get_row();
	//	} catch(Exception $e) {
	//		echo 'Выброшено исключение: '.$e->getMessage();
	//	}
	//	return $data;
	//}
	
	public function getListArrJson() {
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("d.Id as DealId","c.AccId","c.Id as ContactId","d.DealNo","c.LastName","c.FirstName",
					   "d.DateArrival","d.DocIssued","d.OperatorInvoceNum","d.UserId","u.ManagerName","d.FlightA",
					   "case when ifnull(aa.AirportCode,'') != '' then concat(aa.AirportCity,' (', aa.AirportCode,')') else '' end Airport",
					   "aa.AirportCode as AirportArrival","ad.AirportCode as AirportDeparture","aa.AirportSite",
					   "case when d.FlightAArrivalDate = '0000-00-00 00:00:00' then '' else d.FlightAArrivalDate end FlightAArrivalDate",
					   "case when d.FlightADepartureDate = '0000-00-00 00:00:00' then '' else d.FlightADepartureDate end FlightADepartureDate",
					   "op.Name as OperatorName","op.WebSite as OperatorWebSite","case when d.DealSumFact <= PaySum then 1 else 0 end NotPaidDeal");
		$db->where('d.AccId', $_SESSION['AccId']);
		$db->where('d.DateArrival', date('Y-m-d'),">=");
		if($_SESSION['UserRole'] == "user" && GetOption("AllManagerLists",$_SESSION['AccId']) =="0"){
			$db->where("d.UserId", $_SESSION['UserId']);
		}
		$db->join("vUsers as u", "d.UserId = u.Id and d.AccId = u.AccId", "");
		$db->join("Contacts as c", "d.AccId = c.AccId and d.ContactId = c.Id", "LEFT");
		$db->join("vOperators as op", "d.OperatorId = op.Id and d.AccId = op.AccId", "LEFT");
		$db->join("vAirport as aa", "d.FlightACityArrivalId = aa.Id", "LEFT");
		$db->join("vAirport as ad", "d.FlightACityDepartureId = ad.Id", "LEFT");
		$db->join("vPaymentsGroup as vpg", "d.AccId = vpg.AccId and d.Id = vpg.DealId and vpg.PayType='income'", "LEFT");
		
		
		$json = $db->JsonBuilder()->get("Deals as d", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	} 
	
	public function getListDepJson() {
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("c.AccId","c.Id as ContactId","d.Id as DealId","d.DealNo","c.LastName","c.FirstName","d.DateDeparture",
					   "d.OperatorInvoceNum","d.UserId","u.ManagerName","d.FlightB",
					   "case when ifnull(da.AirportCode,'') != '' then concat(da.AirportCity,' (', da.AirportCode,')') else '' end Airport",
					   "da.AirportCode as AirportArrival","dd.AirportCode as AirportDeparture","da.AirportSite",
					   "case when d.FlightBArrivalDate = '0000-00-00 00:00:00' then '' else d.FlightBArrivalDate end FlightBArrivalDate",
					   "case when d.FlightBDepartureDate = '0000-00-00 00:00:00' then '' else d.FlightBDepartureDate end FlightBDepartureDate",
					   "op.Name as OperatorName","op.WebSite as OperatorWebSite","case when d.DealSum <= PaySum then 1 else 0 end NotPaidDeal");
		$db->where('d.AccId', $_SESSION['AccId']);
		$db->where('d.DateDeparture', date("Y-m-d", strtotime("-1 months")),">=");
		if($_SESSION['UserRole'] == "user" && GetOption("AllManagerLists",$_SESSION['AccId']) =="0"){
			$db->where("d.UserId", $_SESSION['UserId']);
		}
		
		
		$db->join("vUsers as u", "d.UserId = u.Id and d.AccId = u.AccId", "");
		$db->join("Contacts as c", "d.AccId = c.AccId and d.ContactId = c.Id", "LEFT");
		$db->join("vOperators as op", "d.OperatorId = op.Id and d.AccId = op.AccId", "LEFT");
		$db->join("vAirport as da", "d.FlightBCityArrivalId = da.Id", "LEFT");
		$db->join("vAirport as dd", "d.FlightBCityDepartureId = dd.Id", "LEFT");
		$db->join("vPaymentsGroup as vpg", "d.AccId = vpg.AccId and d.Id = vpg.DealId and vpg.PayType='income'", "LEFT");
		
		
		$json = $db->JsonBuilder()->get("Deals as d", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	} 
	
	
	
}
?>