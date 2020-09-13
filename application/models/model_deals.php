<?php


class Model_Deals extends Model
{
	function __construct() {
		$this->ModelClass = "Deal";
	}

	public function get_row($Id){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Id", $Id);
		
		//$cols = array ("Id", "Name","Description", "Status","DocUrl","UserId");
		$data = $db->get("vDeals", null, "*");
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}	
	public function getRowJson($Id){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		//$cols = array ("Id", "Name","Description", "Created");
		$db->where('AccId', $_SESSION['AccId']);
		$db->where('Id', $Id);
		$json = $db->JsonBuilder()->get("vDeals", null, "*");
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}

	public function get_task_row($Id){
		//Отдельная облегчённая функция для выгрузки данных в taks
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Id", $Id);
		$cols = array("Id", "DealNo");
		$data = $db->get("Deals", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	public function get_DealNo(){
		//Получаем номер договора формат YYYY/N
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$cols = array("mNum");
		$data = $db->get("vSysDealNum", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		
		$DealNo = $data[0]["mNum"];
		if($DealNo==""){
			 $DealNo = date('Y')."/1";
		}
		return $DealNo;
	}

	
	public function getListJson($month){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		$cols = array("d.Id","d.DealNo","d.OperatorInvoceNum","d.DealDateOriginal",
					  "case when month(d.DealDateOriginal) <10 THEN CONCAT('0',month(d.DealDateOriginal)) ELSE month(d.DealDateOriginal) END Month",
					  "ifnull(vpg.PayCount,0) as PayCount",
					  "ifnull(d.DealSum,0) as DealSum",
					  "ifnull(vpg.PaySum,0) as PaySum",
					  "ifnull(d.DealSumFact,0) as DealSumFact",
					  "case when d.DealSumFact <= PaySum then 1 else 0 end NotPaidDeal",
					  "d.ContactId",
					  "d.LegalId",
					  "l.LegalName",
					  "l.TaxNumber",
					  "CONCAT(IFNULL(vc.LastName,''), ' ' , IFNULL(vc.FirstName,'')) as ContactName",
					  "d.OperatorId",
					  "d.OperatorName","d.DateArrivalOriginal","d.DealSum","d.DirectionName","d.RegionName",
					  "d.HotelId",
					  "d.HotelName",
					  "d.UserId",
					  "d.ManagerName");
		$db->where("d.AccId", $_SESSION["AccId"]);
		
		if(!empty($month)){
			$db->where('d.DealDateOriginal', date("Y-m-d", strtotime(" -".$month." months")) , ">=");
		} else {
			$db->where("d.DateDepartureOriginal", date('Y-m-d'),">=");
		}
		//echo $_SESSION['UserRole'];
		//echo GetOption("AllManagerLists",$_SESSION['AccId']);
		
		if($_SESSION['UserRole'] == "user" && GetOption("AllManagerLists",$_SESSION['AccId'])=="0"){
			$db->where("d.UserId",  $_SESSION['UserId']);
		}
		
		$db->join("vContacts as vc", "d.ContactId = vc.Id and d.AccId = vc.AccId", "LEFT");
		$db->join("Legals as l", "d.LegalId = l.Id and d.AccId = l.AccId", "LEFT");
		$db->join("vPaymentsGroup as vpg", "d.AccId = vpg.AccId and d.Id = vpg.DealId and vpg.PayType = 'income'", "LEFT");
		
		$json = $db->JsonBuilder()->get("vDeals as d", null, $cols);
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
		$db->delete('Deals');
		
		if ($db->getLastErrno() === 0){
			$data["status"] ="success";
			$data["message"] ="Успешно удалена запись";
		} else {
			$data["status"] ="error";
			$data["message"] = $db->getLastError();
		}
		$db->disconnect();
		return $data;
	}


	public function deleteDealPaymentsAjax($DealId)
	{
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('DealId', $DealId);
		$db->delete('Payments');
		
		if ($db->getLastErrno() === 0){
			$data["status"] ="success";
			$data["message"] ="Успешно удалена запись";
		} else {
			$data["status"] ="error";
			$data["message"] = $db->getLastError();
		}
		$db->disconnect();
		return $data;
	}


	//Используется для отчёта по менеджерам
	public function getListReportDeal() {
		$data = null;
		$this->SQL_select_count = "select count(*) from rDeals where AccId = ?";
		$this->SQL_params_types_count = array('s');
		$this->SQL_params_count = array($_SESSION['AccId']);

		if($_SESSION['UserRole'] == "admin" ||$_SESSION['UserRole'] == "owner"){
			$this->SQL_select = "select d.Id,
									d.DealDate,
									d.DealNo, d.DealMonthName, d.ContactId,
									CONCAT(IFNULL(c.LastName,''), ' ' , IFNULL(c.FirstName,''), ' ',IFNULL(c.MiddleName,'')) as `ContactFullName`,
									DATE_FORMAT(d.DealDate,'%Y-%m') as YearMonth,
									d.DealSum, d.DealSumPremia,
									d.UserId, d.ManagerName, d.Commission, d.ManagerPremia,
									d.DirectionName,
									d.OperatorName,
									d.OperatorInvoceSum
									from rDeals as d
									join vContacts	as c on (d.AccId = c.AccId and d.ContactId = c.Id)
									left join dimDirection as dir on (d.DirectionId = dir.Id)
										where d.AccId=?";
			$this->SQL_params_types = array('s');
			$this->SQL_params = array($_SESSION['AccId']);
		} else {
			$this->SQL_select = "select d.Id,
										d.DealDate,
										d.DealNo, d.DealMonthName, d.ContactId,
										concat(IFNULL(c.LastName,''), ' ' , IFNULL(c.FirstName,''), ' ',IFNULL(c.MiddleName,'')) as `ContactFullName`,
										DATE_FORMAT(d.DealDate,'%Y-%m') as YearMonth,
										d.DealSum, d.DealSumPremia,
										d.UserId, d.ManagerName, d.Commission, d.ManagerPremia, 
										d.DirectionName,
										d.OperatorName,
										d.OperatorInvoceSum
										from rDeals as d
										join vContacts	as c on (d.AccId = c.AccId and d.ContactId = c.Id)
										left join dimDirection as dir on (d.DirectionId = dir.Id)
										where d.AccId=? 
										  and d.UserId = ?";
			$this->SQL_params_types = array('s','s');
			$this->SQL_params = array($_SESSION['AccId'],$_SESSION['UserId']);
		}

		try {
			$data = parent::getListJson();
		} catch (Exception $e) {
			echo "Ошибка получение данных:".$e->getMessage();
		}
		echo json_encode($data);
	}
	
	
	
	
//Новая но пока не используется
	public function getListReportDealx() {
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		$cols = array("d.Id","d.DealDate","d.DealNo", "d.DealMonthName", "d.ContactId",
					  "CONCAT(IFNULL(c.LastName,''), ' ' , IFNULL(c.FirstName,''), ' ',IFNULL(c.MiddleName,'')) as `ContactFullName`",
					  "DATE_FORMAT(d.DealDate,'%Y-%m') as YearMonth",
					  "d.DealSum", "d.DealSumPremia",
					  "d.UserId", "d.ManagerName", "d.Commission", "d.ManagerPremia", 
					  "d.DirectionName", "d.OperatorName", "d.OperatorInvoceSum");
		$db->where("d.AccId", $_SESSION["AccId"]);
	
		if($_SESSION['UserRole'] == "user"){
			$db->where("d.UserId",  $_SESSION['UserId']);
		}
		
		$db->join("vContacts as c", "d.AccId = c.AccId and d.ContactId = c.Id", "");
		$db->join("dimDirection as dir", "d.DirectionId = dir.Id", "LEFT");
		
		$json = $db->JsonBuilder()->get("rDeals as d", null, $cols);
	//	$data = $db->get("rDeals as d", null, $cols);
		$db->disconnect();
		
	////	header('Content-Type: application/json; charset=utf-8');
	//	$json =  json_encode(array(
	//		"page" => 1,
	//		"total" =>0,
	//		"records" => null,
	//		"rows" => $data
	//		
	//	));
		
		echo $json;
	}
	//Используется для отчёта по менеджерам
	public function getListReportDealByPay() {
		$data = null;
		$this->SQL_select_count = "select count(*) from rDeals where AccId = ?";
		$this->SQL_params_types_count = array('s');
		$this->SQL_params_count = array($_SESSION['AccId']);

		if($_SESSION['UserRole'] == "admin"){
			$this->SQL_select = "select d.Id,
									d.DealDate,
									d.DealNo, d.DealMonthName, d.ContactId,
									CONCAT(IFNULL(c.LastName,''), ' ' , IFNULL(c.FirstName,''), ' ',IFNULL(c.MiddleName,'')) as `ContactFullName`,
									DATE_FORMAT(inc.PayDate,'%Y-%m') as YearMonth,
									d.DealSum, d.DealSumPremia,
									d.UserId, d.ManagerName, d.Commission, 
									d.DirectionName,
									d.OperatorName,
									d.OperatorInvoceSum,
									inc.PayDate, 
									inc.PaySum,
									(inc.PaySum * ((d.DealSum - d.OperatorInvoceSum)/d.DealSum))*(d.Commission/100) as ManagerPremia
									
									from rDeals as d
									join vContacts	as c on (d.AccId = c.AccId and d.ContactId = c.Id)
									left join dimDirection as dir on (d.DirectionId = dir.Id)
									join vPayments inc on (d.AccId = inc.AccId and d.Id = inc.DealId and inc.PayType = 'income') 
									where d.AccId=?";
			$this->SQL_params_types = array('s');
			$this->SQL_params = array($_SESSION['AccId']);
		} else {
			$this->SQL_select = "select d.Id,
									d.DealDate,
									d.DealNo, d.DealMonthName, d.ContactId,
									CONCAT(IFNULL(c.LastName,''), ' ' , IFNULL(c.FirstName,''), ' ',IFNULL(c.MiddleName,'')) as `ContactFullName`,
									DATE_FORMAT(inc.PayDate,'%Y-%m') as YearMonth,
									d.DealSum, d.DealSumPremia,
									d.UserId, d.ManagerName, d.Commission, 
									d.DirectionName,
									d.OperatorName,
									d.OperatorInvoceSum,
									inc.PayDate, 
									inc.PaySum,
									(inc.PaySum * ((d.DealSum - d.OperatorInvoceSum)/d.DealSum))*(d.Commission/100) as ManagerPremia
									
									from rDeals as d
									join vContacts	as c on (d.AccId = c.AccId and d.ContactId = c.Id)
									left join dimDirection as dir on (d.DirectionId = dir.Id)
									join vPayments inc on (d.AccId = inc.AccId and d.Id = inc.DealId and inc.PayType = 'income') 
									where d.AccId=?
								      and d.UserId = ?";
			$this->SQL_params_types = array('s','s');
			$this->SQL_params = array($_SESSION['AccId'],$_SESSION['UserId']);
		}

		try {
			$data = parent::getListJson();
		} catch (Exception $e) {
			echo "Ошибка получение данных:".$e->getMessage();
		}
		echo json_encode($data);
	}	
	

//	public function getMVGListJson($dealId, $type, $getselected) {
//		$data = null;
//		if ($type == "Contact") {
//			if (!$getselected) {
//				$this->SQL_select_count = "select count(*) as count from (
//											SELECT vc.Id as id, '' as pickContactId, vc.FirstName as pickFirstName, vc.LastName as pickLastName, vc.MiddleName as pickMiddleName
//											FROM  `vContacts` vc
//											WHERE vc.AccId = ? and vc.Id not in (select ContactId from `vDealParticipants` d where d.AccId = ? and DealId = ?)
//												) t where 1=1";
//				$this->SQL_params_types_count = array('s','s','s');
//				$this->SQL_params_count = array($_SESSION['AccId'], $_SESSION['AccId'], $dealId);
//
//				$this->SQL_select = "select id, pickContactId, pickFirstName, pickLastName, pickMiddleName, pickDateBirth, pickManagerName,pickPhoneMob
//									 from (SELECT vc.Id as id, '' as pickContactId, vc.FirstName as pickFirstName, vc.LastName as pickLastName, vc.MiddleName as pickMiddleName,
//											vc.DateBirth as pickDateBirth,
//											vc.ManagerName as pickManagerName,
//											vc.PhoneMob as pickPhoneMob
//										    FROM  `vContacts` vc
//										   WHERE vc.AccId = ?  and vc.Id not in (select ContactId from `vDealParticipants` d where d.AccId = ? and DealId = ?)
//										   order by created desc
//									       ) t where 1=1 ";
//				$this->SQL_params_types = array('s','s','s');
//				$this->SQL_params = array($_SESSION['AccId'], $_SESSION['AccId'], $dealId);
//
//				try {
//					$data = parent::getListJson();
//				} catch(Exception $e) {
//					echo 'Выброшено исключение: '.$e->getMessage();
//				}
//			} else {
//				$this->SQL_select = "SELECT ContactId as id, ContactId as pickContactId, FirstName as pickFirstName, LastName as pickLastName, MiddleName as pickMiddleName
//				FROM  `vDealParticipants`
//				WHERE AccId = ? AND DealId = ?";
//		 		$this->SQL_params_types = array('s','s');
//		 		$this->SQL_params = array($_SESSION['AccId'], $dealId);
//		 		$selected_data = null;
//		 		try {
//		 			$selected_data = parent::get_row();
//		 		} catch(Exception $e) {
//		 			echo 'Выброшено исключение: '.$e->getMessage();
//		 		}
//		 		$data["selected"] = $selected_data;
//			}
//		}
//		echo json_encode($data);
//	}

	private function relinkMembersDealId($OldDealId,$NewDealId) {
		$conn = parent::getConnection();
		if (!$conn->connect_error) {
			$stmt = $conn->prepare("update DealParticipants set DealId=? where DealId=?");
			$stmt->bind_param('ss', $Param1, $Param2);

			$Param1 = $NewDealId;
			$Param2 = $OldDealId;
			$stmt->execute();
		}
		$conn->close();
	}

//	public function addMVGList($dealId, $rowId, $type, $ParrContactId) {
//		$res = false;
//		$conn = parent::getConnection();
//		if (!$conn->connect_error) {
//			if ($type == "Contact") {
//				$stmt = $conn->prepare("insert into DealParticipants(ContactId, DealId, AccId) values(?, ?, ?)");
//				$stmt->bind_param('sss', $RowIdBind, $ContactIdBind, $AccIdBind);
//
//				$RowIdBind = $rowId;
//				$ContactIdBind = $dealId;
//				$AccIdBind = $_SESSION['AccId'];
//				if ($stmt->execute()){
//					$res = true;
//
//					//Добавляем владельца сделки участника поездки
//					//Проверяем есть ли связь с этим человеком у клиента
//					$this->SQL_select = "select Id
//										 from ContactToContact
//										 where AccId =?
//										   and ContactId = ?
//										   and ParrContactId = ?";
//					$this->SQL_params_types = array('s', 's', 's');
//					$this->SQL_params = array($_SESSION['AccId'],$ParrContactId,$rowId);
//					$selected_data = null;
//					try {
//						$selected_data = parent::get_row();
//					} catch(Exception $e) {
//						echo 'Выброшено исключение: '.$e->getMessage();
//					}
//
//					//Если связи с клиентом нет, создаём запись.
//					if($selected_data[0]["Id"] == ""){
//						if($ParrContactId != $rowId){
//							$stmt = $conn->prepare("INSERT INTO `ContactToContact`(`AccId`, `ContactId`, `ParrContactId`,`LinkType`) VALUES (?,?,?,?)");
//							$stmt->bind_param('ssss', $AccIdBind, $ContactIdBind, $ParrContactIdBind,$LinkType);
//
//							$AccIdBind = $_SESSION['AccId'];
//							$ContactIdBind = $ParrContactId;
//							$ParrContactIdBind = $rowId;
//							$LinkType = 'Участник(ца) поездки';
//							$stmt->execute();
//						}
//
//					}
//
//					//Проверяем есть ли у связанного лица связь с этим клиентом
//					$this->SQL_select = "select Id
//										 from ContactToContact
//										 where AccId =?
//										   and ContactId = ?
//										   and ParrContactId = ?";
//					$this->SQL_params_types = array('s', 's', 's');
//					$this->SQL_params = array($_SESSION['AccId'],$rowId,$ParrContactId);
//					$selected_data = null;
//					try {
//						$selected_data1 = parent::get_row();
//					} catch(Exception $e) {
//						echo 'Выброшено исключение: '.$e->getMessage();
//					}
//
//					//Если связи с клиентом нет, создаём запись.
//					if($selected_data1[0]["Id"] == ""){
//						if($rowId != $ParrContactId){
//							$stmt1 = $conn->prepare("INSERT INTO `ContactToContact`(`AccId`, `ContactId`, `ParrContactId`,`LinkType`) VALUES (?,?,?,?)");
//							$stmt1->bind_param('ssss', $AccIdBind1, $ContactIdBind1, $ParrContactIdBind1, $LinkType1);
//
//							$AccIdBind1 = $_SESSION['AccId'];
//							$ContactIdBind1 = $rowId;
//							$ParrContactIdBind1 = $ParrContactId;
//							$LinkType1 = 'Участник(ца) поездки';
//							$stmt1->execute();
//						}
//					}
//
//				}
//				else
//					$res = false;
//			}
//		}
//		$conn->close();
//
//		return $res;
//	}

//	public function delMVGList($dealId, $rowId, $type, $ParrContactId) {
//		$res = false;
//		$conn = parent::getConnection();
//		if (!$conn->connect_error) {
//			if ($type == "Contact") {
//				$stmt = $conn->prepare("delete from DealParticipants where ContactId = ? and DealId = ?");
//				$stmt->bind_param('ss', $RowIdBind, $ContactIdBind);
//
//				$RowIdBind = $rowId;
//				$ContactIdBind = $dealId;
//				if ($stmt->execute()){
//					$stmt = $conn->prepare("delete from ContactToContact where AccId = ? and ContactId = ? and ParrContactId = ? and LinkType = 'Участник(ца) поездки'");
//					$stmt->bind_param('sss',$AccIdBind, $ContactIdBind, $ParrContactIdBind);
//
//					$AccIdBind =$_SESSION['AccId'];
//					$ContactIdBind = $ParrContactId;
//					$ParrContactIdBind = $rowId;
//					if ($stmt->execute()){
//							$stmt = $conn->prepare("delete from ContactToContact where AccId = ? and ContactId = ? and ParrContactId = ? and LinkType = 'Участник(ца) поездки'");
//							$stmt->bind_param('sss',$AccIdBind, $ContactIdBind, $ParrContactIdBind);
//
//							$AccIdBind =$_SESSION['AccId'];
//							$ContactIdBind = $rowId;
//							$ParrContactIdBind = $ParrContactId;
//							if ($stmt->execute()){
//								$res = true;
//							}
//					}
//				}
//				else{
//					$res = false;
//				}
//			}
//		}
//		$conn->close();
//
//		return $res;
//	}

//	public function getlist_linked_contactJson($dealId) {
//		$this->SQL_select_count = "SELECT COUNT(*) AS count	FROM  `vDealParticipants` where AccId = ? and DealId = ?";
//		$this->SQL_params_types_count = array('s','s');
//		$this->SQL_params_count = array($_SESSION['AccId'],$dealId);
//
//		$this->SQL_select = "select Id as MVGId, ContactId as PickContactId,
//								FirstName,
//								LastName,
//								MiddleName,
//								DateBirth,
//								DateBirthAge,
//								docFirstName,
//								docLastName,
//								docSeriaNum,
//								docValid,
//								docBiometric
//							FROM `vDealParticipants` where AccId = ? and DealId = ?";
//		$this->SQL_params_types = array('s','s');
//		$this->SQL_params = array($_SESSION['AccId'],$dealId);
//
//		$data = null;
//		try {
//			$data = parent::getListJson();
//		} catch(Exception $e) {
//			echo 'Выброшено исключение: '.$e->getMessage();
//		}
//
//		echo json_encode($data);
//	}
	
	function getLinkedContact($Id) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("DealId", $Id);
		$db->orderBy("PartCreated","asc");
		
		$cols = array ("Id as MVGId", "ContactId as PickContactId","FirstName", "LastName","MiddleName","TaxCode","DateBirth");
		$data = $db->get("vDealParticipants", null,$cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;

	}
	
	function getPrintData($dealId) {
		$this->SQL_select = "select * from `printDeals` where AccId = ? and Id = ?";
		$this->SQL_params_types = array('s','s');
		$this->SQL_params = array($_SESSION['AccId'],$dealId);

		$data = null;
		try {
			$data = parent::get_row();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}

		return $data;
	}




	private function addFirstPaymentsDealId($DealId,$DealDate,$PrePaySum,$Payer,$CommercialCourse,$DealCurrency) {
 		//Проверяем есть ли такой платёж в базе у клиента
		$this->SQL_select = "SELECT Id
								FROM `Payments`
								where AccId = ?
								 and DealId = ? limit 1";
		$this->SQL_params_types = array('s', 's');
		$this->SQL_params = array($_SESSION['AccId'],$DealId);
		$selected_data = null;
		try {
			$selected_data = parent::get_row();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}

		//Если у клиента нет такого платежа добавляем его.
		if($selected_data[0]["Id"] == ""){
			$conn = parent::getConnection();
			if (!$conn->connect_error) {
				
				$PayEquivalent = $PrePaySum/$CommercialCourse;

				$stmt = $conn->prepare("INSERT INTO `Payments`(`AccId`,`DealId`,`PayDate`,`PayType`,`PaySum`,`Payer`,`Comments`,`PayCource`,`PayCurrency`,`PayEquivalent`) VALUES (?,?,STR_TO_DATE(?, '%d.%m.%Y'),?,?,?,?,?,?,?)");
				$stmt->bind_param('ssssssssss', $AccIdBind, $DealIdBind, $PayDateBind, $PayTypeBind,$PaySumBind, $PayerBind, $CommentsBind,$CommercialCourseBind,$DealCurrencyBind,$PayEquivalentBind);

				
				//if($DealCurrency =="grn"){
				//	$CommercialCourse = "1";
				//	$PayEquivalent = $PrePaySum;
				//}
				
				$AccIdBind = $_SESSION['AccId'];
				$DealIdBind = $DealId;
				$PayTypeBind = "income";
				$PayDateBind = $DealDate;
				$PaySumBind = $PrePaySum;
				$PayerBind = $Payer;
				$CommercialCourseBind = $CommercialCourse;
				$DealCurrencyBind = $DealCurrency;
				$PayEquivalentBind = $PayEquivalent;
				$CommentsBind = "Автоматическое создание авансового платежа из сделки";
				$stmt->execute();
			}
		}
	}


	public function saveFlightAjax($data){
			
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
        
        $DocIssued = "0";
        if($data["DocIssued"] =="on"){$DocIssued = "1";}
        
        
		if($data["Type"]=="Arrival"){
			$dataX = [
			"FlightA" => $data["Flight"],
			"FlightAComments" => $data["FlightComments"],
			"FlightAArrivalDate" => $data["FlightArrivalDate"],
			"FlightACityArrivalId" => $data["FlightCityArrivalId"],
			"FlightADepartureDate" => $data["FlightDepartureDate"],
			"FlightACityDepartureId" => $data["FlightCityDepartureId"],
			"DocIssued"	=> $DocIssued
			];
		} else if ($data["Type"]=="Departure"){
			$dataX = [
			"FlightB" => $data["Flight"],
			"FlightBComments" => $data["FlightComments"],
			"FlightBArrivalDate" => $data["FlightArrivalDate"],
			"FlightBCityArrivalId" => $data["FlightCityArrivalId"],
			"FlightBDepartureDate" => $data["FlightDepartureDate"],
			"FlightBCityDepartureId" => $data["FlightCityDepartureId"],
			"DocIssued"	=> $DocIssued
			];
		}
        
		$db->where ('AccId',$_SESSION['AccId']);
		$db->where ('Id',$data["Id"]);
		if ($db->update ('Deals', $dataX)){
		   	$data["status"] ="success";
			$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
		} else {
			$data["status"] ="error";
		    $data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
		}
			    
		
		$db->disconnect();
		return json_encode($data);
	}
	//Вызывается при сохранении запроса и связи запроса с текущим запросом
	public function addx($data){
			
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
	    
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		
		$dataX = [
			"AccId"		=> $_SESSION["AccId"],
			"LeadId"	=> $data["LeadId"],
			"ContactId" => $data["ContactId"],
			"DealNo"	=> $data["DealNo"],
			"DealDate"	=> $data["DealDate"],
			"DealType"	=> $data["DealType"],
			"DealSum"	=> $data["DealSum"],
			"DealCurrency"	=> $data["DealCurrency"],
			"UserId"		=> $data["UserId"],
			"FeedId"		=> $data["FeedId"],
			"FlatTypeId"	=> $data["FlatTypeId"],
			"TransferId"	=> $data["TransferId"],
			"RoomViewId"	=> $data["RoomViewId"],
			"AgentClient"	=> $data["AgentClient"],
			"PlacingId"		=> $data["PlacingId"],
			"DateArrival"	=> $data["DateArrival"],
			"DateDeparture"	=> $data["DateDeparture"]
		];
		
		$id = $db->insert ('Deals', $dataX);
		$db->disconnect();
		if($id){
		   	$data["status"] ="success";
			$data["message"] = "Запись успешно добавлена. Id='".$id."'";
			$data["DealId"]	= $id;
			
			$mysqli = database::getInstance();
			$db = $mysqli->getConnection();
			
			$LeadUpdate = [
					"DealId" => $data["DealId"]
				];
			
			$db->where ('AccId',$_SESSION['AccId']);
			$db->where ('Id',$data["LeadId"]);
			if ($db->update ('Leads', $LeadUpdate)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
			}
		} else {
			$data["status"] ="error";
		    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
		}
		
	
		header('Content-Type: application/json; charset=utf-8');
		return json_encode($data);
	}
	
	
	
	
	public function add_ajax($data){
		
			require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
			$mysqli = database::getInstance();
	        $db = $mysqli->getConnection();
	        $Insurance = "0";
	        $DocIssued = "0";
	        if($data["Insurance"]=="on"){$Insurance ="1";}
			if($data["DocIssued"]=="on"){$DocIssued ="1";}
			if($data["DateFullPay"] == ""){$data["DateFullPay"] = "00.00.0000";}
			if($data["OperatorInvoceDate"] == ""){$data["OperatorInvoceDate"] = "00.00.0000";}
			if($data["DateArrival"] == ""){$data["DateArrival"] = "00.00.0000";}
			if($data["DateDeparture"] == ""){$data["DateDeparture"] = "00.00.0000";}
			
			if($data["FlightAArrivalDate"] == ""){$data["FlightAArrivalDate"] = "00.00.0000 00:00";}
			if($data["FlightADepartureDate"] == ""){$data["FlightADepartureDate"] = "00.00.0000 00:00";}
			if($data["FlightBArrivalDate"] == ""){$data["FlightBArrivalDate"] = "00.00.0000 00:00";}
			if($data["FlightBDepartureDate"] == ""){$data["FlightBDepartureDate"] = "00.00.0000 00:00";}
			if($data["ActDate"] == ""){$data["ActDate"] = "00.00.0000";}
			
			
	        
	        $dataX = array ("AccId"			=> $_SESSION["AccId"],
							"DealNo"		=> $data["DealNo"],
							"DealDate"		=> toFormat("d.m.Y","Y-m-d",$data["DealDate"]),
							"DealType"		=> $data["DealType"],
							"DealCurrency"	=> $data["DealCurrency"],
							"CommercialCourse"	=> $data["CommercialCourse"],
							"DealSumEquivalent"	=> $data["DealSumEquivalent"],
							"DealSum"			=> $data["DealSum"],
							"DealSumFact"			=> $data["DealSumFact"],
							"PercentDiscount"	=> $data["PercentDiscount"],
							"PrePaySum"		=> $data["PrePaySum"],
							"PrePayPercent"	=> $data["PrePayPercent"],
							"DateFullPay"	=> toFormat("d.m.Y","Y-m-d",$data["DateFullPay"]),
							"UserId"		=> $data["UserId"],
							"ContactId"		=> $data["ContactId"],
							"LegalId"		=> $data["LegalId"],
							"Comments"		=> $data["Comments"],
							
							"OperatorId"		=> $data["OperatorId"],
							"OperatorInvoceNum"	=> $data["OperatorInvoceNum"],
							"OperatorInvoceSum"	=> $data["OperatorInvoceSum"],
							"OperatorInvoceDate"=> toFormat("d.m.Y","Y-m-d",$data["OperatorInvoceDate"]),
							"Invoice"=> $data["Invoice"],
							
							"DirectionId"	=> $data["DirectionId"],
							"RegionId"		=> $data["RegionId"],
							"HotelId"		=> $data["HotelId"],
							"AmountNight"	=> $data["AmountNight"],
							"DateArrival"	=> toFormat("d.m.Y","Y-m-d",$data["DateArrival"]),
							"DateDeparture"	=> toFormat("d.m.Y","Y-m-d",$data["DateDeparture"]),
							"FeedId"		=> $data["FeedId"],
							"FlatTypeId"	=> $data["FlatTypeId"],
							"RoomViewId"	=> $data["RoomViewId"],
							"TransferId"	=> $data["TransferId"],
							"PlacingId"		=> $data["PlacingId"],
							"Transport"		=> $data["Transport"],
							"Visa"			=> $data["Visa"],
							"FlightA"		=> $data["FlightA"],
							"FlightAArrivalDate"	=> toFormat("d.m.Y H:i","Y-m-d H:i",$data["FlightAArrivalDate"]),
							"FlightADepartureDate"	=> toFormat("d.m.Y H:i","Y-m-d H:i",$data["FlightADepartureDate"]),
							"FlightACityArrivalId"	=> $data["FlightACityArrivalId"],
							"FlightACityDepartureId"=> $data["FlightACityDepartureId"],
							"FlightAComments"		=> $data["FlightAComments"],
							"FlightB"		=> $data["FlightB"],
							"FlightBArrivalDate"	=> toFormat("d.m.Y H:i","Y-m-d H:i",$data["FlightBArrivalDate"]),
							"FlightBDepartureDate"	=> toFormat("d.m.Y H:i","Y-m-d H:i",$data["FlightBDepartureDate"]),
							"FlightBCityArrivalId"	=> $data["FlightBCityArrivalId"],
							"FlightBCityDepartureId"=> $data["FlightBCityDepartureId"],
							"FlightBComments"		=> $data["FlightBComments"],
							"AdditionalServices"		=> $data["AdditionalServices"],
							"Insurance"		=> $Insurance,
							"DocIssued"		=> $DocIssued,
							"Act"			=> $data["Act"],
							"ActDate"		=> toFormat("d.m.Y","Y-m-d",$data["ActDate"]),
							"AgentClient"	=> $data["AgentClient"]
			);
			
			
			//if(!isset($data["Id"]) || $data["Id"]==""){
			//if(intval($data["Id"]) < 0){
			if(intval($data["Id"]) < 0 || $data["Id"]==""){
				$id = $db->insert ('Deals', $dataX);
				if($id){
				   	$data["status"] ="success";
					$data["message"] ="Запись успешно добавлена. Id='".$id."'";
					$data["DealId"] = $id;
				} else {
					$data["status"] ="error";
				    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
				}
			} else {
				$db->where ('AccId',$_SESSION['AccId']);
				$db->where ('Id',$data["Id"]);
				if ($db->update ('Deals', $dataX)){
				   	$data["status"] ="success";
					$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
					$data["DealId"] = $data["Id"];
				} else {
					$data["status"] ="error";
				    $data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
				}
				    
			}
			$db->disconnect();
			
			//если сумма предоплаты > 0 
			if(intval($data["PrePaySum"]) > 0){
				//если указанна Id владельца сделки получаем его ФИО
				if($data["ContactId"] !== "" && $data["ContactId"] !== "0"){
					include_once "application/models/model_contacts.php";
					$Contact = new Model_Contacts();
					$ContactData = $Contact->get_row($data["ContactId"]);
					$Payer = $ContactData[0]["LastName"] ." ". $ContactData[0]["FirstName"]  ." ".$ContactData[0]["MiddleName"];
					
					//создаём новый платеж
					$this->addFirstPaymentsDealId($data["DealId"],$data["DealDate"],$data["PrePaySum"],$Payer,$data["CommercialCourse"],$data["DealCurrency"]);
				}
			}
			//Переподвязываем сделку и участников тура на новый Id сделки
			if (intval($data["Id"]) < 0 && $data["DealId"] != "") {
				$this->relinkMembersDealId($data["Id"], $data["DealId"]);
			}
			
		
		
		return $data;
	}
		
		
	public function getDealsParticipants($DealId){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		$cols = array ("dp.Id", "cl.Id ContactId","cl.LastName", "cl.FirstName", "cl.MiddleName", "cl.DateBirthAge", 
					   "cl.docFirstName", "cl.docLastName", "cl.docSeriaNum", "cl.docValid", "cl.docBiometric");
        $db->where("dp.AccId", $_SESSION['AccId']);
		$db->where("dp.DealId",$DealId);
		$db->orderBy('dp.Created', 'DESC');
		
		$db->join("vContacts as cl", "dp.AccId = cl.AccId and dp.ContactId = cl.Id", "LEFT");
		
		$json = $db->JsonBuilder()->get("DealParticipants as dp", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	
	public function get_ParticipantRow($Id){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Id", $Id);
		
		$cols = array ("dp.Id", "dp.DealId","dp.ContactId");
		$data = $db->get("DealParticipants as dp", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	public function deleteParticipant($Id){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('Id', $Id);
		
		$db->delete('DealParticipants');
		
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
		//return $data;
	}
	
	public function setDealParticipant($data){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();

    	//Проверяем есть ли связь между клиентом и участником
		$db->where('AccId', $_SESSION['AccId']);
		$db->where('DealId', $data["DealId"]);
		$db->where('ContactId', $data["ContactId"]);
    	$data["DealToConId"] = $db->getValue("DealParticipants", "Id");
					
		if($data["DealToConId"] ==""){
			$dataX = array ("AccId" 		=> $_SESSION['AccId'],
							"DealId" 		=> $data["DealId"],
							"ContactId" 	=> $data["ContactId"]
			);
			
			$data["DealToConId"] = $db->insert('DealParticipants', $dataX);
		}
		
		if ($db->getLastErrno() === 0){
			$data["status"] ="success";
			$data["message"] ="Запись успешно добавлена!";
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