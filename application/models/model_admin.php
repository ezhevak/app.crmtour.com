<?php


class Model_Admin extends Model
{
	function __construct() {
		$this->ModelClass = "Admin";
	}
	//public function get_payment_row($Id){
	//	$this->SQL_select = "select ap.Id, 
	//								ap.AccId, 
	//								a.Name as AccountName,
	//								ap.PayType,
	//								dp.`Name` as PayTypeName,
	//								ap.AmountUSD as Amount,
	//								ap.Course,
	//								ap.Date as PayDate,
	//								DATE_FORMAT(ap.Date,'%d.%m.%Y') as PayDateMod,
	//								ap.Comments,
	//								ap.DeveloperSum as DevSum
	//						from AccountPayments ap
	//						join Account as a on (ap.AccId = a.Id)
	//						left join Dictionaries as dp on (ap.PayType = dp.LIC and dp.AccId =1 and dp.Lang = 'ru_RU')
	//						Where ap.Id = ?";
	//	$this->SQL_params_types = array('s');
	//	$this->SQL_params = array($Id);

	//	$data = null;
	//	try {
	//		$data = parent::get_row();
	//	} catch(Exception $e) {
	//		echo 'Выброшено исключение: '.$e->getMessage();
	//	}

	//	return $data;
	//}

	//public function getSessionsJson() {
	//	require_once ('/home/zhevak/crmtour.com/app/application/mysql/db.php');
	//	$mysqli = database::getInstance();
    //    $db = $mysqli->getConnection();
	//	$cols = array("sl.Id", "sl.SessionId", "sl.UserId", "u.ManagerName", "sl.LogIn", "sl.LogOut", "sl.`Browser`", "sl.Platform","u.AccId", "ac.Name as AccountName");
	//	//$db->where('sl.LogIn', array(DATE_ADD(now(), INTERVAL -2 MONTH), "now()"), "between");
	//	$db->where('sl.LogIn', date("Y-m-d", strtotime(" -1 months")) , ">=");
    //    $db->join("vUsers as u", "sl.UserId = u.Id", "");
    //    $db->join("Account as ac", "u.AccId = ac.Id", "");
	//	$json = $db->JsonBuilder()->get("SessionLog as sl", null, $cols);
	//	$db->disconnect();
	//	
	//	header('Content-Type: application/json; charset=utf-8');
	//	return $json;
	//}
	

	public function getUserOnline() {
	
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
	    $db = $mysqli->getConnection();

		$dbcols = array("sl.LogIn", "u.Id", "u.Login as ManagerName", "u.FirstName", "u.LastName", "u.Phone", "u.Email", "a.Name as AccountName");
		$db->join("Users u", "sl.UserId = u.Id", "");
		$db->join("Account a", "u.AccId = a.Id", "");
		
		$db->where('sl.LogOut', null , "is");
		$db->where('date(sl.LogIn)', date("Y-m-d") , "=");
        
		$json = $db->JsonBuilder()->get("SessionLog sl", null, $dbcols);
		$db->disconnect();
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	

	//public function getBillingJson() {
	//	
	//	require_once ('/home/zhevak/crmtour.com/app/application/mysql/db.php');
	//	$mysqli = database::getInstance();
	//	$db = $mysqli->getConnection();
	//
	//	$dbcols = array("va.Id", "va.Name", "va.BillingStart", "va.Created", "ifnull(ap.OrderAmount,0) as OrderAmount", "ifnull(ap.PayAmount,0) as PayAmount", "(ifnull(ap.OrderAmount,0)+ifnull(ap.PayAmount,0)) as Balance", "ll.LastLogIn", "ll.CountLogIn");
	//	$payQcols = array("AccId", "sum(case when PayType = 'Order' then AmountUSD else 0 end) OrderAmount", "sum(case when PayType in('Pay','Refference') then AmountUSD else 0 end) PayAmount");
	//	$payQ = $db->subQuery ("ap");
	//	$payQ->groupBy("AccId");
	//	$payQ->get ("AccountPayments",null, $payQcols);
	//
	//	$llQcols = array("AccId", "max(LogInOriginal) as LastLogIn", "count(id) as CountLogIn");
	//	$llQ = $db->subQuery ("ll");
	//	$llQ->groupBy("AccId");
	//	$llQ->get ("vSessionLog", null, $llQcols);
	//	
	//
	//	$db->join($payQ, "va.Id = ap.AccId", "LEFT");
	//	$db->join($llQ, "va.Id = ll.AccId", "LEFT");
	//	
	//	$json = $db->JsonBuilder()->get("vAccount va", null, $dbcols);
	//	$db->disconnect();
	//	header('Content-Type: application/json; charset=utf-8');
	//	return $json;
	//}
	
	
	//public function add_payment($data)
	//{
	//	$Id = $data["Id"];
	//	$AccId = $data['AccId'];
	//	$PayType = $data["PayType"];
	//	$Amount = $data["Amount"];
	//	$Course = $data["Course"];
	//	$PayDate = $data["PayDate"];
	//	$Comments = $data["Comments"];
	//	$DevSum = $data["DevSum"];
	//	
	//	
	//	if($Id==""){
	//		$this->SQL_insert = "INSERT INTO `AccountPayments`(`AccId`,`PayType`,`AmountUSD`,`Course`,`Date`,`Comments`,`DeveloperSum`)
	//							VALUES (?,?,?,?,STR_TO_DATE(?, '%d.%m.%Y'),?,?)";
	//		$this->SQL_insert_params_types = array('s','s','s','s','s','s','s');
	//		$this->SQL_insert_params = array($AccId,$PayType,$Amount,$Course,$PayDate,$Comments,$DevSum);
	//		
	//	} else {
	//		$this->SQL_update = "UPDATE `AccountPayments` 
	//								set `AccId` = ?,
	//									`PayType` = ?,
	//									`AmountUSD` = ?,
	//									`Course` = ?,
	//									`Date` = STR_TO_DATE(?, '%d.%m.%Y'),
	//									`Comments` = ?,
	//									`DeveloperSum` = ?
	//								WHERE `Id` = ?";
	//		$this->SQL_update_params_types = array('s','s','s','s','s','s','s','s');
	//		$this->SQL_update_params = array($AccId,$PayType,$Amount,$Course,$PayDate,$Comments,$DevSum,$Id);
	//	}
	//	$data = null;
	//	try {
	//		$data = parent::add($Id);
	//		$data["Id"] = $data["rec_id"];
	//	} catch(Exception $e) {
	//		echo 'Выброшено исключение: '.$e->getMessage();
	//	}
	//			
	//	return $data;
	//}
	
	
	
}

?>