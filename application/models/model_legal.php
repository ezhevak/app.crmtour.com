<?php


class Model_legal extends Model
{
	function __construct() {
		$this->ModelClass = "Legal";
	}
	public function get_row($Id){
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("l.AccId", $_SESSION['AccId']);
		$db->where("l.Id", $Id);
		$db->join("vUsers as u", "l.AccId = u.AccId and l.UserId = u.Id", "left");
		$cols = array ("l.Id","l.LegalName", "l.TaxNumber","l.LegalCode", "l.TaxForm","l.SignerFIO","l.SignerPosition","l.SignerBasis","l.AccountantFIO","l.VATcertificateNumber",
					"l.LegalOfficeAddress", "l.LegalFactAddress","l.LegalOfficePhone","l.LegalOfficeFax","l.LegalOfficeMobile","l.LegalOfficeEmail","l.LegalBankName",
					"l.LegalAccountNum","l.LegalBankIban","l.LegalMFO","l.LegalDealStart","l.LegalDealEnd","l.LegalComments","l.UserId","u.ManagerName");
		$data = $db->get("Legals l", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	public function get_task_row($Id){
		
        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Id", $Id);
		$cols = array ("Id", "LegalName");
		$data = $db->get("Legals", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	public function add($data){
		if($data["LegalDealStart"] == ""){$data["LegalDealStart"] = "00.00.0000";}
		if($data["LegalDealEnd"] == ""){$data["LegalDealEnd"] = "00.00.0000";}
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$dataX = array ("AccId" 	 => $_SESSION['AccId'],
						"LegalName"  => $data["LegalName"],
						"TaxNumber" => $data['TaxNumber'],
						"TaxForm" => $data['TaxForm'],
						"SignerFIO" => $data['SignerFIO'],
						"SignerPosition" => $data['SignerPosition'],
						"SignerBasis" => $data['SignerBasis'],
						"AccountantFIO" => $data['AccountantFIO'],
						"VATcertificateNumber" => $data['VATcertificateNumber'],
						"LegalOfficeMobile" => $data['LegalOfficeMobile'],
						"LegalOfficePhone" => $data['LegalOfficePhone'],
						"LegalOfficeFax" => $data['LegalOfficeFax'],
						"LegalOfficeAddress" => $data['LegalOfficeAddress'],
						"LegalFactAddress" => $data['LegalFactAddress'],
						"LegalOfficeEmail" => $data['LegalOfficeEmail'],
						"LegalBankName" => $data['LegalBankName'],
						"LegalCode" => $data['LegalCode'],
						"LegalAccountNum" => $data['LegalAccountNum'],
						"LegalBankIban" => $data['LegalBankIban'],
						"LegalMFO" => $data['LegalMFO'],
		                "LegalDealStart" => toFormat('d.m.Y','Y-m-d',$data["LegalDealStart"]),
		                "LegalDealEnd" => toFormat('d.m.Y','Y-m-d',$data["LegalDealEnd"]),
						"UserId" => $data['UserId'],
						"LegalComments" => $data['LegalComments']
		);
		if(!isset($data["Id"]) || $data["Id"]==""){
			$id = $db->insert ('Legals', $dataX);
			if($id){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
				$data["LegalId"] = $id;
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
		} else {
			$db->where ('AccId',$_SESSION['AccId']);
			$db->where ('Id',$data["Id"]);
			if ($db->update ('Legals', $dataX)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
				$data["LegalId"] = $data["Id"];
				
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
        
		$cols = array ("Id", "LegalName", "SignerFIO", "LegalCode","LegalDealEnd","LegalOfficePhone", "LegalOfficeEmail");
		$db->where('AccId', $_SESSION['AccId']);
		
		$json = $db->JsonBuilder()->get("Legals", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	public function deals_getListJson($LegalId) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection(); 
        
		$cols = array ("d.Id",
					   "d.DealNo",
					   "d.DealDate",
					   "d.OperatorInvoceNum",
					   "d.OperatorId",
					   "op.Name as OperatorName", 
					   "d.DirectionId",
					   "dir.DirectionName",
					   "ifnull(vpg.PayCount,0) as PayCount",
					   "ifnull(vpg.PaySum,0) as PaySum",
					   "ifnull(d.DealSum,0) as DealSum",
					   "ifnull(d.DealSumFact,0) as DealSumFact",
					   "d.DateArrival",
					   "d.UserId", 
					   "u.ManagerName");
				
		$db->join("dimDirection as dir", "d.DirectionId = dir.Id", "left");
		$db->join("dimOperators as op", "d.AccId = op.AccId and d.OperatorId = op.Id", "left");	   
		$db->join("vPaymentsGroup as vpg", "d.AccId = vpg.AccId and d.Id = vpg.DealId and vpg.PayType = 'income'", "left");
		
		$db->join("vUsers as u", "d.AccId = u.AccId and d.UserId = u.Id", "left");
//		$db->join("Dictionaries as dt", "d.DealType = dt.LIC and d.AccId = dt.AccId and dt.Lang = u.Lang", "left");

		$db->where('d.AccId', $_SESSION['AccId']);
		$db->where('d.LegalId', $LegalId);
		
		$json = $db->JsonBuilder()->get("Deals as d", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	
	public function getListItemsJson($Search) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("Id id", "CONCAT(LegalName, ' - ', LegalCode) text");
		$db->where('AccId', $_SESSION['AccId']);
		//$db->where('LegalName', '%'.$Search.'%', "like");
		$db->where("(LegalName like ? or LegalCode like ?)", array('%'.$Search.'%','%'.$Search.'%'));
		
		$json = $db->JsonBuilder()->get("Legals l", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}

	public function deleteAjax($LegalId){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('Id', $Id);
		//header('Content-Type: application/json; charset=utf-8');
		$db->delete('Legals');
		
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