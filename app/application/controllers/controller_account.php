<?php

class Controller_Account extends Controller
{

	function __construct(){
		$this->model = new Model_Account();
		$this->view = new View($this->model->ModelClass);
	}

	function action_index(){
		
		session_start();
		$data = $this->model->get_row($_SESSION['AccId']);
		$this->view->generate('account/account_view.php', 'template_view.php', $data, ["inputmask","datepicker","jqgrid","validate","datatables","x-editable"], ["account/account_edit","account/account_index","account/man_sum"]);
		
	}
	
	
	function action_getlist_sms(){
		$data = $this->model->getListSmsJson();
		echo $data;
	}
	
	function action_save(){
		$array = [
		"Id" => $_POST["Id"],
		"AccountName" 	=>  str_replace("\"","'",$_POST["AccountName"]),
		"OfficeMobile" 	=> $_POST["OfficeMobile"],
		"OfficeEmail" 	=> $_POST["OfficeEmail"],
		"DirectorName" 	=> $_POST["DirectorName"]
		];
		
		$data = $this->model->add($array);
		echo json_encode($data);
	}
	
	function action_chimp_save()
	{
		SetOption("MailChimp_ApiKey",$_POST["ApiKey"]);
		SetOption("MailChimp_ListId",$_POST["ListId"]);
	
		session_start();
		$_SESSION['ACTIVE_TAB'] = "intergation";
		$this->model->chimp_save($_POST["ApiKey"], $_POST["ListId"]);
		header('Location: /account');
	}
	
	function action_sms_save() {
		SetOption("SMS_Login",$_POST["SmsLogin"]);
		SetOption("SMS_Pass",$_POST["SmsPass"]);
		SetOption("SMS_SenderName",$_POST["SmsSenderName"]);
		$data["status"] = "success";
		$data["message"] = "Параметры отправки смс сообщений установлены успешно";
		echo json_encode($data);
	}
	
	function action_sms_send(){
		if(empty($_POST['SMSSegment'])){
			echo json_encode(array("status" => "error",
								   "message"=> "Вы не выбрали сегменты для отправки сообщений!"));
			
		} else {
			//$segments = array();
			//foreach ($_POST['SMSSegment'] as $selectedOption) {
			//	array_push($segments,$selectedOption);
			//}
			$segments = "";
			foreach ($_POST['SMSSegment'] as $selectedOption) {
				if ($segments != ""){
					$segments .= ",";
				}
				$segments .= "'".$selectedOption."'";
			}
			
			$data = $this->model->sms_send($_POST["SMSText"], $segments);
			
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($data);
		}
	}
	
	function action_sms_balance(){
	
		$smsLogin = GetOption("SMS_Login",$_SESSION['AccId']);
		$smsPass = GetOption("SMS_Pass",$_SESSION['AccId']);
		$smsSenderName = GetOption("SMS_SenderName",$_SESSION['AccId']);
		$smsBalance = array("amount"=>"","currency"=>"грн");
		
		if ($smsLogin != "" && $smsPass != "") {
			
			require_once $GLOBALS['RootDir']."/application/utils/sms.php";
			//require_once "/home/zhevak/crmtour.com/app/application/utils/sms.php";
			$sms = new SMS_Service($_SESSION['AccId']);
			$smsBalance = $sms->getBalance();
			unset($sms);
		}
		echo json_encode($smsBalance);
	}
	
	
	
	function action_show_address(){
		
		if($_POST["ShowAddress"]=="on"){
			$ShowAddress ="1";
		} else {
			$ShowAddress="0";
		}
		//http://178.150.16.80:3000/issues/95
		if($_POST["SendEmail"]=="on"){
			$SendEmail ="1";
		} else {
			$SendEmail="0";
		}
		
		if($_POST["SendEmailArrival"]=="on"){
			$SendEmailArrival ="1";
		} else {
			$SendEmailArrival="0";
		}
		
		if($_POST["StandartSegment"]=="on"){
			$StandartSegment ="1";
		} else {
			$StandartSegment="0";
		}
		if($_POST["AllManagerLists"]=="on"){
			$AllManagerLists ="1";
		} else {
			$AllManagerLists="0";
		}
		
		SetOption("Show_Address",$ShowAddress);
		SetOption("Send_Email",$SendEmail);
		SetOption("Send_Email_Arrival",$SendEmailArrival);
		SetOption("StandartSegment",$StandartSegment);
		SetOption("DayToBirthday",$_POST["DayToBirthday"]);
		SetOption("DayToPassport",$_POST["DayToPassport"]);
		//SetOption("BinotelId",$_POST["BinotelId"]);
		SetOption("AllManagerLists",$AllManagerLists);
		
		//$_SESSION['ACTIVE_TAB'] = "settings";
		header('Location: /account');
		
	}
	
	//function action_binotel_save(){
	//	
	//	SetOption("BinotelId",$_POST["BinotelId"]);
	//	
	//	$_SESSION['ACTIVE_TAB'] = "integration";
	//	header('Location: /account');
	//	
	//}
	
	function action_getlist_branches(){
			$data = $this->model->getListBranchesJson();
			echo $data;
	}
	
	function action_add_branch($BranchId){
		if (isset($BranchId)){
			$Id = $BranchId;
		} else {
			$Id = $_GET["Id"];
		}
			
		$data = $this->model->getBranch($Id);
		$this->view->generate('account/add_branch.php', 'template_view.php', $data,  ["validate","inputmask","switch"], ["account/branch_edit"]);
	}
	
	function action_saveBranch(){
		
		if($_POST["Inactive"]=="on"){
			$Inactive="1";
		} else {
			$Inactive="0";
		}
		
		$array = [
			"Id" 					=> $_POST["BranchId"],
			"AccId" 				=> $_SESSION["AccId"],
			"BranchName" 			=> str_replace("\"","'",$_POST["BranchName"]),
			"BranchDirectorName" 	=> $_POST["BranchDirectorName"],
			"BranchJurAddress" 		=> $_POST["BranchJurAddress"],
			"BranchFactAddress" 	=> $_POST["BranchFactAddress"],
			"BranchPhone" 			=> $_POST["BranchPhone"],
			"BranchFax" 			=> $_POST["BranchFax"],
			"BranchMobile" 			=> $_POST["BranchMobile"],
			"BranchEmail" 			=> $_POST["BranchEmail"],
			"BranchBankName" 		=> $_POST["BranchBankName"],
			"BranchBankAccount" 	=> $_POST["BranchBankAccount"],
			"BranchBankIban" 		=> $_POST["BranchBankIban"],
			"BranchBankMFO" 		=> $_POST["BranchBankMFO"],
			"BranchBankCode" 		=> $_POST["BranchBankCode"],
			"BranchLicenseNum" 		=> $_POST["BranchLicenseNum"],
			"BranchLicenseDate" 	=> toFormat("d.m.Y","Y-m-d",$_POST["BranchLicenseDate"]),
			"Inactive" 				=> $Inactive
		];
		
		
		$data = $this->model->addBranch($array);
		
		echo $data;
	}
	
	function action_deleteBranch() {
		$data = $this->model->deleteBranch($_GET["Id"]);
		echo $data;
	}
	
	function action_sms_status() {
		try {
			require_once $GLOBALS['RootDir']."/application/mysql/db.php";
			$mysqli = database::getInstance();
	        $db_type = $mysqli->getConnection();
			$db_type->where("AccId", $_SESSION["AccId"]);
			$db_type->where("Status", "");
			$db_type->where("Type", "SMS");
			
			$db_type_cols = array("Id");
			$db_type_data = $db_type->get("Actions", null, $db_type_cols);
			$db_type->disconnect();
			
			if ($db_type->count > 0){
				foreach ($db_type_data as $key=>$row) {
					$numbers .= '<messageid>'.$row["Id"].'</messageid>';
				}
			}
			
			require_once($GLOBALS['RootDir'].'/application/utils/sms.php');
			$sms = new SMS_Service($_SESSION["AccId"]);
			
			$xml = $sms->setXML_status($numbers);
			
			$Result = $sms->sendToGate($xml);
			
			$xml = simplexml_load_string($Result, "SimpleXMLElement", LIBXML_NOCDATA);
			$json = json_encode($xml);
			//$array = json_decode($json,TRUE);
			
			foreach($xml->message as $item) {
				$sms->setSMS_status($item["id"],$sms->getDeliveryStatus($item["status"]));
			}
		
			$data["status"]="success";
			$data["message"]="Статусы отправки смс сообщений успешно обновлены";
		} catch(Exception $e) {
			//echo 'Выброшено исключение: '.$e->getMessage();
			$data["status"]="error";
			$data["message"]="Ошибка отправки SMS. ".$e->getMessage();
		}
		echo json_encode($data);
	}
	
	function action_ttt(){
			
		echo $GLOBALS['RootDir'];
	}
	
	
	
	
}
?>