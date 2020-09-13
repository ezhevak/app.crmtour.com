<?php

class Controller_Deals extends Controller
{

	function __construct()
	{
		$this->model = new Model_Deals();
		$this->view = new View($this->model->ModelClass);
	}

	function action_index(){
		$data = $this->model->get_data();
		
		$this->view->generate('deals/deals_view.php', 'template_view.php', $data, ["jqgrid","datatables","confirm"], ["deals/deals_index"]);
		
	}
	function action_export() {
		parent::action_export("Deals");
	}
	
	function action_add($DealId){
		if (isset($DealId)){
			$Id = $DealId;
		} else {
			$Id = $_GET["Id"];
		}
		
		if($_POST) {
			$ContactId = $_POST["ContactId"];
			$LegalId = $_POST["LegalId"];
		} else {
			$ContactId = $_GET["ContactId"];
			$LegalId = $_GET["LegalId"];
		}
			
 
		$data = $this->model->get_row($Id);
		$DealNo = $this->model->get_DealNo();
	
		
		if (empty($data)) {
			$data[0]["Id"] = "-".$_POST["ContactId"]."".rand(1, 999);
			$data[0]["ContactId"] = $ContactId;
			$data[0]["LegalId"] = $LegalId;
			$data[0]["DealNo"] =  $DealNo;
			$data[0]["DealDate"] = date('d.m.Y');
			$data[0]["DateArrival"] = date('d.m.Y');
			$data[0]["DateDeparture"] = date('d.m.Y');
			$data[0]["DirectionId"] = "248";
			$data[0]["AmountNight"] = "7";
			$data[0]["DealCurrency"] = "usd";
			$data[0]["DealCurrencyName"] = "USD";
			$data[0]["CommercialCourse"] = 1;
			$data[0]["DealSumEquivalent"] = 1;
			
		}
		
		
		//Получаем данные по физ. Лицу
		if($data[0]["ContactId"] !=""){
			include_once "application/models/model_contacts.php";
			$Contact = new Model_Contacts();
			
			$documentContact = $Contact->get_row($data[0]["ContactId"]);
			$data[0]["ConFirstName"] = $documentContact[0]["FirstName"];
			$data[0]["ConLastName"] = $documentContact[0]["LastName"];
			$data[0]["ConMiddleName"] = $documentContact[0]["MiddleName"];
		}
		
		//Получаем данные по юр. Лицу
		if($data[0]["LegalId"] !=""){
			include_once "application/models/model_legal.php";
			$Legal = new Model_Legal();
			
			$documentLegal = $Legal->get_row($data[0]["LegalId"]);
			$data[0]["LegalName"] = $documentLegal[0]["LegalName"];
			$data[0]["LegalCode"] = $documentLegal[0]["LegalCode"];
		}
		
		//$this->view->generate('deals/add_deals.php', 'template_view.php', $data,  ["moment","cascadedropdown","jqgrid","select2","validate","inputmask","confirm"], ["lib/bootstrap-jqgrid-mvg","lib/bootstrap-jqgrid-pick","deals/deals_edit","deals/pick_contact"]);
		$this->view->generate('deals/add_deals.php', 'template_view.php', $data,  ["moment","cascadedropdown","select2","validate","datepicker","inputmask","confirm","datetimepicker"], ["deals/deals_edit","deals/deals_participants"]);			
	}
	
	function action_print() {
		$contactData = $this->model->getLinkedContact($_GET["Id"]);
		
		require('application/models/model_documents.php');
		$documents = new Model_Documents();
		foreach ($contactData as &$value) {
    		$value["documents"] = $documents->get_ContactDocuments($value["PickContactId"]);
    	}
		$this->print_data["contactmembers"] = $contactData;
			
		require('application/models/model_payment.php');
		$payments = new Model_Payment();
		$payList = $payments->getListByDealId($_GET["Id"]);
		
		$dealData = $this->model->get_row($_GET["Id"]);
		
		if($dealData[0]["LegalId"] != '0'){
			require('application/models/model_legal.php');
			$legal = new Model_Legal();
			$legalData = $legal->get_row($dealData[0]["LegalId"])[0];
		}
		$this->print_data["legalData"] = $legalData;

		$this->print_data["payments"] = $payList;
		$this->print_data["payment"] = $payments->get_row($_GET["PaymentId"])[0];

		unset($legalData);		
		unset($payments);
		parent::action_print($this->model->getPrintData($_GET["Id"]));
	}
	
	
	function action_save_ajax(){
		if($_POST){
			$array = [
				"Id" => $_POST["Id"], 
				"DealNo" => $_POST["DealNo"],
				"DealDate" => $_POST["DealDate"],
				"DealType" => $_POST["DealType"],
				"DealCurrency" => $_POST["DealCurrency"],
				"CommercialCourse" => $_POST["CommercialCourse"],
				"DealSumEquivalent" => $_POST["DealSumEquivalent"],
				"DealSum" => $_POST["DealSum"],
				"DealSumFact" => $_POST["DealSumFact"],
				"PercentDiscount" => $_POST["PercentDiscount"],
				"PrePaySum" => $_POST["PrePaySum"],
				"PrePayPercent" => $_POST["PrePayPercent"],
				"DateFullPay" => $_POST["DateFullPay"],
				"UserId" => $_POST["UserId"],
				"ContactId" => $_POST["ContactId"],
				"LegalId" => $_POST["LegalId"],
				"Comments" => $_POST["Comments"],

				"OperatorId" => $_POST["OperatorName"],
				"OperatorInvoceNum" => $_POST["OperatorInvoceNum"],
				"OperatorInvoceSum" => $_POST["OperatorInvoceSum"],
				"OperatorInvoceDate" => $_POST["OperatorInvoceDate"],
				"Invoice" => $_POST["Invoice"],
				
				"DirectionId" => $_POST["DirectionName"],
				"RegionId" => $_POST["RegionName"],
				"HotelId" => $_POST["HotelName"],
				"AmountNight" => $_POST["AmountNight"],
				"DateArrival" => $_POST["DateArrival"],
				"DateDeparture" => $_POST["DateDeparture"],
				"FeedId" => $_POST["FeedName"],
				"FlatTypeId" => $_POST["FlatType"],
				"RoomViewId" => $_POST["RoomViewName"],
				"TransferId" => $_POST["TransferName"],
				"PlacingId" => $_POST["PlacingType"],
				"Transport" => $_POST["Transport"],
				"Visa" => $_POST["Visa"],
				"FlightA" => $_POST["FlightA"],
				"FlightAArrivalDate" => $_POST["FlightAArrivalDate"],
				"FlightADepartureDate" => $_POST["FlightADepartureDate"],
				"FlightACityArrivalId" => $_POST["FlightACityArrivalId"],
				"FlightACityDepartureId" => $_POST["FlightACityDepartureId"],
				"FlightAComments" => $_POST["FlightAComments"],
				"FlightB" => $_POST["FlightB"],
				"FlightBArrivalDate" => $_POST["FlightBArrivalDate"],
				"FlightBDepartureDate" => $_POST["FlightBDepartureDate"],
				"FlightBCityArrivalId" => $_POST["FlightBCityArrivalId"],
				"FlightBCityDepartureId" => $_POST["FlightBCityDepartureId"],
				"FlightBComments" => $_POST["FlightBComments"],
				"AdditionalServices" => $_POST["AdditionalServices"],
				"Insurance" => $_POST["Insurance"],
				"DocIssued" => $_POST["DocIssued"],
				
				"Act" => $_POST["Act"],
				"ActDate" => $_POST["ActDate"],
				"AgentClient" => $_POST["AgentClient"]
			];
			$data = $this->model->add_ajax($array);
			
		} else {
			$data["status"] ="error";
			$data["message"] ="Где-то по дороге Вы потеряли данные для сохранения";
		}
		
		echo json_encode($data);
		
	}
	
	
	
	
	
	

	function action_getlist(){
		$data = $this->model->getListJson();
		echo $data;
	}
	 
	function action_getlist3month(){
		//$this->model->getListNmonthJson("3");
		
		$data = $this->model->getListJson("3");
		echo $data;
	}
	
	function action_getlist6month(){
		//$this->model->getListNmonthJson("6");
		$data = $this->model->getListJson("6");
		echo $data;
	}

	function action_getlist12month(){
		//$this->model->getListNmonthJson("12");
		$data = $this->model->getListJson("12");
		echo $data;
	}

	function action_getlistalldeals(){
		//$this->model->getListAllDealsJson();
		$data = $this->model->getListJson("120");
		echo $data;
	}


	function action_delete() {
		$data = $this->model->deleteAjax($_GET["Id"]);
		//При успешном удалении записи сделки, запускаем удаление связанных с ней платежей
		if($data["status"] =="success"){
			$delPayments = $this->model->deleteDealPaymentsAjax($_GET["Id"]);
			
			if($delPayments["status"] =="success"){
				echo json_encode($data);
			} else {
				echo json_encode($delPayments);
			}
		} else {
			echo json_encode($data);
		}
	}

	
	function action_getTemplates() {
		
		require('application/models/model_templates.php');
		$templateModel = new Model_templates();
		$data = $templateModel->getModuleTemplates($this->model->getModelClass());
		echo json_encode($data);
	}
	//Используется для отчёта по менеджерам
	function action_reportDeal() {
		$this->model->getListReportDeal();
	}
	//Используется для отчёта по менеджерам
	function action_reportDealByPay() {
		$this->model->getListReportDealByPay();
	}
	
	
	
	function action_getrowjson() {
		$data = $this->model->getRowJson($_POST["Id"]);
		echo $data;
	}
	
	
	function action_save_flight_ajax() {

		$array = [
			"Id" => $_POST["DealId"],
			"Type" => $_POST["Type"],
			"Flight" => $_POST["Flight"],
			"FlightComments" => $_POST["FlightComments"],
			"FlightArrivalDate" => toFormat("d.m.Y H:i","Y-m-d H:i",$_POST["FlightArrivalDate"]),
			"FlightCityArrivalId" => $_POST["FlightCityArrivalId"],
			"FlightDepartureDate" => toFormat("d.m.Y H:i","Y-m-d H:i",$_POST["FlightDepartureDate"]),
			"FlightCityDepartureId" => $_POST["FlightCityDepartureId"],
			"DocIssued" => $_POST["DocIssued"]
			];
			
		$data = $this->model->saveFlightAjax($array);
		echo $data;
	}

	//Вызывается при сохранении запроса и связи сделки с текущим запросом
	function action_saveDeal_ajax(){
		
		$DealNo = $this->model->get_DealNo();
		
		$array = [
			"ContactId" => $_POST["ContactId"],
			"DealNo"	=> $DealNo,
			"DealDate"	=> date('Y-m-d'),
			"DealType"	=> "DealTour",
			"DealSum"	=> 0,
			"DealCurrency"	=> "grn",
			"UserId"	=> $_POST["UserId"],
			"FeedId"	=> "NullFeed",
			"FlatTypeId"	=> "NullFlat",
			"TransferId"	=> "NullDealTransfer",
			"RoomViewId"	=> "RoomView",
			"AgentClient"	=> "Client",
			"PlacingId"		=> "NullPlacing",
			"DateArrival"	=> date('Y-m-d'),
			"DateDeparture"	=> date('Y-m-d'),
			"LeadId"		=> $_POST["LeadId"]
		];
		
		$data = $this->model->addx($array);
		echo $data;
		
	}
	
	function action_dealpayments(){
		
		$data = $this->model->get_row($_GET["dealid"]);
		
		require('application/models/model_payment.php');
		$payment = new Model_Payment();
		$dataPay = $payment->get_dealIncomeSum($_GET["dealid"]);
		$dataPayOperator = $payment->get_dealExpenseSum($_GET["dealid"]);
		
		$data[0]["PaySumGroup"] = $dataPay[0]["PaySumGroup"];
		$data[0]["PayEquivalentGroup"] = $dataPay[0]["PayEquivalentGroup"];
		
		$data[0]["PaySumOperatorGroup"] = $dataPayOperator[0]["PaySumGroup"];
		$data[0]["PayEquivalentOperatorGroup"] = $dataPayOperator[0]["PayEquivalentGroup"];
		//echo json_encode($data);
		
		$this->view->generate('deals/deals_payments.php', 'template_view.php', $data, ["datatables","confirm","jqgrid"], ["deals/deals_payments"]);
	}
	
	function action_copy(){
		//Функция копирования сделки.
			$data = $this->model->get_row($_GET["dealid"]);
			
			//Получаем новый номер договора
			$DealNo = $this->model->get_DealNo();
			
			if($data[0]["DateFullPay"] == "00.00.0000"){$data[0]["DateFullPay"] = "";}
			if($data[0]["OperatorInvoceDate"] == "00.00.0000"){$data[0]["OperatorInvoceDate"] = "";}
			if($data[0]["DateArrival"] == "00.00.0000"){$data[0]["DateArrival"] = "";}
			if($data[0]["DateDeparture"] == "00.00.0000"){$data[0]["DateDeparture"] = "";}
			
			if($data[0]["FlightAArrivalDate"] == "00.00.0000 00:00:00"){$data[0]["FlightAArrivalDate"] = "";}
			if($data[0]["FlightADepartureDate"] == "00.00.0000 00:00:00"){$data[0]["FlightADepartureDate"] = "";}
			if($data[0]["FlightBArrivalDate"] == "00.00.0000 00:00:00"){$data[0]["FlightBArrivalDate"] = "";}
			if($data[0]["FlightBDepartureDate"] == "00.00.0000 00:00:00"){$data[0]["FlightBDepartureDate"] = "";}
			if($data[0]["ActDate"] == "00.00.0000"){$data[0]["ActDate"] = "";}
			
			echo $data[0]["FlightAArrivalDate"];
			$array = [
				"Id"				=> -1, 
				"DealNo"			=> $DealNo,
				"DealDate"			=>  toFormat("d.m.Y","d.m.Y",$data[0]["DealDate"]),
				"DealType"			=> $data[0]["DealType"],
				"DealCurrency"		=> $data[0]["DealCurrency"],
				"CommercialCourse"  => $data[0]["CommercialCourse"],
				"DealSumEquivalent" => $data[0]["DealSumEquivalent"],
				"DealSum"			=> $data[0]["DealSum"],
				"DealSumFact"			=> $data[0]["DealSumFact"],
				"PercentDiscount"	=> $data[0]["PercentDiscount"],
				"PrePaySum" 		=> $data[0]["PrePaySum"],
				"PrePayPercent" 	=> $data[0]["PrePayPercent"],
				"DateFullPay"		=> toFormat("d.m.Y","d.m.Y",$data[0]["DateFullPay"]),
				"UserId"			=> $data[0]["UserId"],
				"ContactId" 		=> $data[0]["ContactId"],
				"LegalId" 		=> $data[0]["LegalId"],
				"Comments"			=> $data[0]["Comments"],
				
				"OperatorId"		=> $data[0]["OperatorId"],
				"OperatorInvoceNum" => $data[0]["OperatorInvoceNum"],
				"OperatorInvoceSum" => $data[0]["OperatorInvoceSum"],
				"OperatorInvoceDate" => toFormat("d.m.Y","d.m.Y",$data[0]["OperatorInvoceDate"]),
				"Invoice"			=> $data[0]["Invoice"],
				
				"DirectionId"		=> $data[0]["DirectionId"],
				"RegionId"			=> $data[0]["RegionId"],
				"HotelId"			=> $data[0]["HotelId"],
				"AmountNight"		=> $data[0]["AmountNight"],
				"DateArrival"		=> toFormat("d.m.Y","d.m.Y",$data[0]["DateArrival"]),
				"DateDeparture" 	=> toFormat("d.m.Y","d.m.Y",$data[0]["DateDeparture"]),
				"FeedId"			=> $data[0]["FeedId"],
				"FlatTypeId"		=> $data[0]["FlatTypeId"],
				"RoomViewId"		=> $data[0]["RoomViewId"],
				"TransferId"		=> $data[0]["TransferId"],
				"PlacingId" 		=> $data[0]["PlacingId"],
				"Transport" 		=> $data[0]["Transport"],
				"Visa"				=> $data[0]["Visa"],
				"FlightA"			=> $data[0]["FlightA"],
				"FlightAArrivalDate"	=> toFormat("d.m.Y H:i:s","d.m.Y H:i",$data[0]["FlightAArrivalDate"]),
				"FlightADepartureDate"	=> toFormat("d.m.Y H:i:s","d.m.Y H:i",$data[0]["FlightADepartureDate"]),
				"FlightACityArrivalId"	=> $data[0]["FlightACityArrivalId"],
				"FlightACityDepartureId" => $data[0]["FlightACityDepartureId"],
				"FlightAComments"		=> $data[0]["FlightAComments"],
				"FlightB"				=> $data[0]["FlightB"],
				"FlightBArrivalDate"	=> toFormat("d.m.Y H:i:s","d.m.Y H:i",$data[0]["FlightBArrivalDate"]),
				"FlightBDepartureDate"	=> toFormat("d.m.Y H:i:s","d.m.Y H:i",$data[0]["FlightBDepartureDate"]),
				"FlightBCityArrivalId"	=> $data[0]["FlightBCityArrivalId"],
				"FlightBCityDepartureId" => $data[0]["FlightBCityDepartureId"],
				"FlightBComments"		=> $data[0]["FlightBComments"],
				"AdditionalServices"	=> $data[0]["AdditionalServices"],
				"Insurance" 			=> $data[0]["Insurance"],
				"DocIssued" 			=> $data[0]["DocIssued"],
				"Act"					=> $data[0]["Act"],
				"ActDate"				=> toFormat("d.m.Y","d.m.Y",$data[0]["ActDate"]),
				"AgentClient"			=> $data[0]["AgentClient"]
			];
			
		$datax = $this->model->add_ajax($array);
		
		echo json_encode($datax);
		
	}
	
	//Новый функционал отображение связанных участников поездки
	function action_getDealsParticipants(){
		$data = $this->model->getDealsParticipants($_POST["DealId"]);
		echo $data;
	}
	
	//Новый функционал отображения связанных контактов с клиентом
	function action_deleteParticipantById(){
		//$dealParticipant = $this->model->get_ParticipantRow($_GET["Id"]);
		//$dataDeal = $this->model->get_row($dealParticipant[0]["DealId"]);
		
		//echo "DealId:".$dataDeal[0]["Id"]." | DealContactId:". $dataDeal[0]["ContactId"]." | DealLegalId:".$dataDeal[0]["LegalId"]." | ParrContactId:".$dealParticipants[0]["ContactId"];
		
		$data = $this->model->deleteParticipant($_GET["Id"]);
		//$data = $this->model->deleteParticipant($dealParticipant[0]["Id"]);
		
		//if($data["status"] == "success"){
		//	
		//	require('application/models/model_contacts.php');
		//	$dataContacts = new Model_Contacts();
		//	
		//	if($dataDeal[0]["ContactId"] != 0){
		//		$Contact = $dataContacts->deleteLinkedContactsAjax($dataDeal[0]["ContactId"],$dealParticipant[0]["ContactId"]);	
		//	}
		//	
		//	if($dataDeal[0]["LegalId"] != 0){
		//		$Legal = $dataContacts->deleteLinkedLegalsAjax($dataDeal[0]["LegalId"],$dealParticipant[0]["ContactId"]);	
		//	}
		//}
		
		//header('Content-Type: application/json; charset=utf-8');
		//echo json_encode($data);
		echo $data;
	}
	
	function action_setDealParticipant(){
		$array = [
			"DealId" 		=> $_POST["DealId"],
			"ContactId"	=> $_POST["ContactId"]
		];
		
		if($_POST['DealId'] > 0 || $_POST['ContactId'] !=""){
			$data = $this->model->setDealParticipant($array);
		}
		
		echo $data;
	}
	
}
?>