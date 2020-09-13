<?php

require_once $GLOBALS['RootDir']."application/utils/functions.php";
require_once $GLOBALS['RootDir']."application/mysql/db.php";


class SMS_Service {
	private $user;
	private $pass;
	private $sender;
	private $accId;
	
	function __construct($AcountId) {
		$this->accId = $AcountId;
		$this->sender = "";
		$this->getSettings();
		if (!isset($this->user) || !isset($this->pass)){
			throw new Exception("SMS Settings error");
		}
	}
	
	private function getSettings() {
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId",$this->accId);
		$db->where(OptionName, array("SMS_Login","SMS_Pass","SMS_SenderName"), 'IN');
		$cols = array ("OptionName", "OptionVal");
		$data = $db->get("AccountOptions", null, $cols);
		$db->disconnect();
		
		foreach($data as $row) {
			if ($row["OptionName"] == "SMS_Login") {
				$this->user = $row["OptionVal"];
			} else if ($row["OptionName"] == "SMS_Pass") {
				$this->pass = $row["OptionVal"];
			} else if ($row["OptionName"] == "SMS_SenderName") {
				$this->sender = $row["OptionVal"];
			}
		}
	}
	
	public function getBalance() {
	    $src = '<?xml version="1.0" encoding="UTF-8"?>
	    <SMS>
	        <operations>
	        <operation>BALANCE</operation>
	        </operations>
	        <authentification>
	        <username>'.$this->user.'</username>
	        <password>'.$this->pass.'</password>
	        </authentification>
	    </SMS>';
	 
		$rets = $this->sendToGate($src);
		
		if ($rets != "UNKNOWN TYPE") {
			$ret = new SimpleXMLElement($rets);
			return array("amount"=>$ret->amount,"currency"=>$ret->currency);
		} else {
			return array();
		}
	}
	
	
	public function setXML_send($numbers,$text) {
		$xml = '<?xml version="1.0" encoding="UTF-8"?>
		    <SMS>
		        <operations>
		        <operation>SEND</operation>
		        </operations>
		        <authentification>
		        <username>'.$this->user.'</username>
		        <password>'.$this->pass.'</password>
		        </authentification>
		        <message>
		        <sender>'.$this->sender.'</sender>
		        <text>'.$text.'</text>
		        </message>
		        <numbers>';
		$xml .= $numbers;
		$xml .= '</numbers></SMS>';
		return $xml;
	}
	
	public function setXML_status($numbers) {
		$xml = '<?xml version="1.0" encoding="UTF-8"?>
		    <SMS>
		        <operations>
		        <operation>GETSTATUS</operation>
		        </operations>
		        <authentification>
		        <username>'.$this->user.'</username>
		        <password>'.$this->pass.'</password>
		        </authentification>
		        <statistics>';
		$xml .= $numbers;
		$xml .= '</statistics></SMS>';
		
		return $xml;
	}
	
	public function sendToGate($xml) {
		$Result="UNKNOWN TYPE";
			
		$Curl = curl_init();
	    $CurlOptions = array(
	        CURLOPT_URL=>'http://api.atompark.com/members/sms/xml.php',
	        CURLOPT_FOLLOWLOCATION=>false,
	        CURLOPT_POST=>true,
	        CURLOPT_HEADER=>false,
	        CURLOPT_RETURNTRANSFER=>true,
	        CURLOPT_CONNECTTIMEOUT=>15,
	        CURLOPT_TIMEOUT=>100,
	        CURLOPT_POSTFIELDS=>array('XML'=>$xml),
	    );
	    curl_setopt_array($Curl, $CurlOptions);
	    if(false === ($Result = curl_exec($Curl))) {
	        throw new Exception('Http request failed');
	    }
	    curl_close($Curl);
		 
        //$xml = simplexml_load_string($Result, "SimpleXMLElement", LIBXML_NOCDATA);
		//$json = json_encode($xml);
		//$array = json_decode($json,TRUE);
		//$array["status"] = getUserStatusDesc($array["status"]);
		
		return $Result;
	}
	
	public function getUserStatusDesc($ws_status) {
		if ($ws_status == -1)
			return "Неправильный логин и/или пароль";
		else if ($ws_status == -2)
			return "Неправильный формат XML";
		else if ($ws_status == -3)
			return "Недостаточно кредитов на аккаунте пользователя";
		else if ($ws_status == -4)
			return "Нет верных номеров получателей";
		else if ($ws_status == -7)
			return "Ошибка в имени отправителя";
		else if ($ws_status > 0)
			return "Количество отправленных SMS:".$ws_status;
		else return "";
	}
	
	public function getDeliveryStatus($status) {
		if ($status == "SENT")
			return "Отослано";
		else if ($status == "NOT_DELIVERED")
			return "Не доставлено";
		else if ($status == "DELIVERED")
			return "Доставлено";
		else if ($status == "NOT_ALLOWED")
			return "Оператор не обслуживается";
		else if ($status == "INVALID_DESTINATION_ADDRESS")
			return "Неверный адрес для доставки";
		else if ($status == "INVALID_SOURCE_ADDRESS")
			return "Неправильное имя <От кого>";
		else if ($status == "NOT_ENOUGH_CREDITS")
			return "Недостаточно кредитов";
		else if ($status == "0")
			return "Демо статус получено";
	}
	
	
	
	public function setSMS_status($id,$status) {
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$dataX = array ("Status" => strval($status));
		
		$db->where ('AccId', $this->accId);
		$db->where ('Id',strval($id));
		if ($db->update ('Actions', $dataX)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
			}
			
		$db->disconnect();
		
		return $data;
	}
	
	
	
	
	
}

