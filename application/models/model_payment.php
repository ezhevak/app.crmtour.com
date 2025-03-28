<?php

class Model_Payment extends Model
{
	function __construct() {
		$this->ModelClass = "Payment";
	}

	public function get_row($Id){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("Id", $Id);
		$cols = array ("Id", "DealId","PayType","PaySum","PaySumString","PayDate","PayDateMod","Payer","PayCource","PayEquivalent", "PayCurrency","Comments");
		//$cols =array("*");
		$data = $db->get("vPayments_materialized", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
		
	}
	
	public function get_dealIncomeSum($DealId){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("DealId", $DealId);
		$db->where("PayType", 'income');
		$cols = array ("sum(PaySum) as PaySumGroup","sum(PayEquivalent) as PayEquivalentGroup");
		$data = $db->get("Payments", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}
	
	public function get_dealExpenseSum($DealId){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION['AccId']);
		$db->where("DealId", $DealId);
		$db->where("PayType", 'expense');
		$cols = array ("sum(PaySum) as PaySumGroup","sum(PayEquivalent) as PayEquivalentGroup");
		$data = $db->get("Payments", null, $cols);
		$db->disconnect();
		//header('Content-Type: application/json; charset=utf-8');
		return $data;
	}

	public function add($data){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$dataX = array ("AccId" => $_SESSION['AccId'],
		                "DealId"   =>  $data["DealId"],
		                "Id" => $data["Id"],
		                "PayType" => $data["PayType"],
		                "PaySum" => $data["PaySum"],
		                "PayDate" => toFormat("d.m.Y","Y-m-d",$data["PayDate"]),
		                "PayCurrency" => $data["PayCurrency"],
		                "Comments" => $data["Comments"],
		                "Payer" => $data["Payer"],
		                "PayCurrency" => $data["PayCurrency"],
		                "PayCource" => $data["PayCource"],
		                "PayEquivalent" => $data["PayEquivalent"]
		);
		
		if(!isset($data["Id"]) || $data["Id"]==""){
			
			$id = $db->insert ('Payments', $dataX);
			if($id){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
				$data["Id"] =$id;
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
		} else {
			$db->where ('AccId',$_SESSION['AccId']);
			$db->where ('Id',$data["Id"]);
			if ($db->update ('Payments', $dataX)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
			}
			    
		}
		
		$db->disconnect();
		return $data;
	}

	public function getListByDealId($DealId) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("*");
		$db->where('AccId', $_SESSION['AccId']);
		$db->where('DealId', $DealId);
		$data = $db->get("vPayments_materialized", null, $cols);
		$db->disconnect();
		
		//header('Content-Type: application/json; charset=utf-8');
		return $data;

	}
	
	
	public function getListByDealIdJson($DealId) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("*");
		$db->where('AccId', $_SESSION['AccId']);
		$db->where('DealId', $DealId);
		$json = $db->JsonBuilder()->get("vPayments_materialized", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;

	}
	
	
	//Используется для отображения данных платежей по сделкам.
	//нужно удалить функционал, после того как будет реализован отдельный вид для платежей
	public function getListJson($dealId) {
		
		$this->SQL_select_count = "SELECT COUNT(*) AS count FROM  `Payments`
								   where AccId = ? and DealId = ?";
		$this->SQL_params_types_count = array('s','s');
		$this->SQL_params_count = array($_SESSION['AccId'], $dealId);

		$this->SQL_select = "select `Id` as id, `AccId`, `DealId`, `PaySum`, `PayCurrency`, `PayDate`, `Created`, `LastUpdate`, `Payer`, `Comments` FROM  `Payments`
							where AccId = ? and DealId = ?";
		$this->SQL_params_types = array('s','s');
		$this->SQL_params = array($_SESSION['AccId'], $dealId);

		$data = null;
		try {
			$data = parent::getListJson();
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}

		echo json_encode($data);
	}

	public function deleteAjax($Id){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('Id', $Id);
		//header('Content-Type: application/json; charset=utf-8');
		$db->delete('Payments');
		
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