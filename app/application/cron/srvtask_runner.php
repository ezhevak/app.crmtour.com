<?php
include_once $GLOBALS['RootDir']."connection.php";

$NeedProcessRunAgain = false;

function writeLog($text) {
    //return false;
    $fp = fopen ($GLOBALS['RootDir'].'log/srvtask_runner/'.date("Ymd").'.txt', "a");
    fwrite($fp, print_r(date('Y-m-d H:i:s')." ".$text."\n", true));
    fclose($fp);
}

function checkMailChimpLocal($email, $apikey, $listid) {
    $memberId = md5(strtolower($email));
    
    $dataCenter = substr($apikey,strpos($apikey,'-')+1);
    
    $auth = base64_encode( 'user:'. $apikey );
    $data = array(
        'apikey'        => $apikey,
        'email_address' => $email
        );
    $json_data = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://'.$dataCenter.'.api.mailchimp.com/3.0/lists/'.$listid.'/members/' . $memberId);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
        'Authorization: Basic '. $auth));
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3000);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    $result = curl_exec($ch);
   
    $json = json_decode($result);
    curl_close($ch);   
    return $json->{'status'}; //404 email отсутствует в списке
}

function syncMailchimpLocal($data,$apiKey,$listId) {

    $memberId = md5(strtolower($data['email']));

    $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

    $json = json_encode(array(
        'email_address' => $data['email'],
        'status'        => $data['status'], 
        'merge_fields'  => array(
            'FNAME'     => $data['firstname'],
            'LNAME'     => $data['lastname']
        )
    ));

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3000);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);                                                                                                                 

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
}

function syncMailchimpListLocal1($apikey,$listid,$accId){
	writeLog("func start");
	$retVal = true;
	$needNext=false;
		$conn2 = new mysqli(
				$GLOBALS['DB_HOST'],
				$GLOBALS['DB_USER'],
				$GLOBALS['DB_PASSWORD'],
				$GLOBALS['DB_NAME']);
		$conn2->	set_charset("utf8");

		if ($conn2->connect_error) {
			die("Connection failed: " . $conn2->connect_error);
		}
		try {
			writeLog("func start1");
			$sql = "select ad.Id,ad.ContactId,ad.LegalId,ad.`Type`, ad.AccId, ad.Address,ad.Comments, case when ad.Send = 1 then 'subscribed' else 'unsubscribed' end Send,d.SubType,ad.UserId, cl.FirstName, cl.LastName, cl.Sex
						from Address as ad
						join Dictionaries as d on (ad.AccId = d.AccId and d.Type ='AddressType' and ad.`Type` = d.LIC and d.SubType = 'Email')
						join Contacts as cl on (ad.AccId = cl.AccId and ad.ContactId =  cl.Id)
					where ad.AccId = '".$accId."' 
					  and ad.Active =1 and Date(ad.NextSync) < NOW() - interval 1 day limit 100";
			$result = $conn2->query($sql);
			while( $row = $result->fetch_assoc()){
				writeLog("Process ID:".$row['Id']);
				 $needNext = true;
				 $resulte = checkMailChimpLocal($row['Address'], $apikey, $listid);
				 if($resulte == "404"){
				 	writeLog($row['Id'].":".$resulte);
					$data_sync = array(
					    'email'     => $row['Address'],
					    'status'    => $row['Send'],
					    'firstname' => $row['FirstName'],
					    'lastname'  => $row['LastName']
					);
				 	syncMailchimpLocal($data_sync,$apikey,$listid);
				 } else {
				 	if($resulte != $row['Send']){
						if($resulte == "subscribed"){
							$Send = "1";
						} else {
							$Send = "0";
						}
						$Comments = $row['Comments']." Запись была обновлена по причине изменения статуса в MailChimp.com на статус ".$resulte."";
						
						$update = "update Address set Send = '$Send', Comments = '$Comments' where Id = ".$row['Id'];
						writeLog($update);
						$result_update = $conn2->query($update);	
				 	}
				 }
				$update = "update Address set NextSync=NOW() where Id = ".$row['Id'];
				//writeLog($update);
				$result_update = $conn2->query($update);
			}
			writeLog("func start2");
		} catch (Exception $e) {
    		writeLog('Выброшено исключение: '.$e->getMessage());
    		$conn2->close();
    		$retVal = false;
		}
		$conn2->close();
		writeLog("func start3");
		return array("status"=>$retVal,"next"=>$needNext);
}

function syncMailchimpListLocal($apikey,$listid,$accId){
	$retVal = true;
		$conn2 = new mysqli(
				$GLOBALS['DB_HOST'],
				$GLOBALS['DB_USER'],
				$GLOBALS['DB_PASSWORD'],
				$GLOBALS['DB_NAME']);
		$conn2->	set_charset("utf8");

		if ($conn2->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		try {
			$sql = "select ad.Id,ad.ContactId,ad.LegalId,ad.`Type`, ad.AccId, ad.Address,ad.Comments, case when ad.Send = 1 then 'subscribed' else 'unsubscribed' end Send,d.SubType,ad.UserId, cl.FirstName, cl.LastName, cl.Sex
						from Address as ad
						join Dictionaries as d on (ad.AccId = d.AccId and d.Type ='AddressType' and ad.`Type` = d.LIC and d.SubType = 'Email')
						join Contacts as cl on (ad.AccId = cl.AccId and ad.ContactId =  cl.Id)
					where ad.AccId = '".$accId."' 
					  and ad.Active =1";
			$result = $conn2->query($sql);
		
			while( $row = $result->fetch_assoc()){
				writeLog("exec php");
				 $phpExec = exec("php ".$GLOBALS['RootDir']."application/cron/srvtask_exec.php ".$apikey." ".$listid." ".$accId." ".$row['Id']);
				writeLog("exec:".$phpExec);
			}
		} catch (Exception $e) {
    		writeLog('Выброшено исключение: '.$e->getMessage());
    		$conn2->close();
    		$retVal = false;
		}
		$conn2->close();
		return $retVal;
}




$taskId = $argv[1];

writeLog("Start process taskId:".$taskId);

$conn = new mysqli(
		$GLOBALS['DB_HOST'],
		$GLOBALS['DB_USER'],
		$GLOBALS['DB_PASSWORD'],
		$GLOBALS['DB_NAME']);
$conn->	set_charset("utf8");

if ($conn->connect_error) {
	writeLog("Connect error");
	die("Connection failed: " . $conn->connect_error);
}
writeLog("Get task parameters...");
$taskParams = "";
$stat="Ошибка";
$sql = "SELECT `Id`, `Created`, `LastUpdate`, `AccId`, `CreatorId`, `Params`, `Start`, `End`, `Status`, `Name` FROM SrvTasks where Id=".$taskId;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["Id"]. " - Name: " . $row["Name"]. " " . $row["Params"]. "<br>";
        $taskParams = $row["Params"];
    }
}
writeLog("Parameters:".$taskParams);

$stmt = $conn->prepare("update SrvTasks 
						set Status = 'Выполняется', Start=NOW()
						where Id = ?");
$stmt->bind_param('s', $TaskIdBind);
$TaskIdBind = $taskId;
writeLog("Status: execute");

if ($stmt->execute() && $taskParams != "") {
	$json_dat = json_decode($taskParams,true);
	if ($json_dat['TaskType'] == "MailChimp") {
		$accId = $json_dat["Params"]["AccId"];
		$ApiKey = $json_dat["Params"]["ApiKey"];
		$ListId = $json_dat["Params"]["ListId"];
		//echo $accId."|".$ApiKey."|".$ListId;
		try {
			writeLog("Launch mailchimp: ApiKey=".$ApiKey.",ListId=".$ListId.",AccId=".$accId);
			$rr = syncMailchimpListLocal1($ApiKey,$ListId,$accId);
			//if (!syncMailchimpListLocal1($ApiKey,$ListId,$accId))
			if ($rr["status"] == false) {
				$NeedProcessRunAgain=false;
				$stat="Ошибка";
			} else {
				$NeedProcessRunAgain=$rr["next"];
				$stat="OK";
			}
			unset($rr);
		} catch(Exception $e) {
			writeLog("Error launch mailchimp");
			$stat="Ошибка";
		}
	} else if ($json_dat['TaskType'] == "ExportExcel") {
		writeLog("ExportExcel");
		$NeedProcessRunAgain=false;
		$accId = $json_dat["Params"]["AccId"];
		$model = $json_dat["Params"]["Model"];
		$email = $json_dat["Params"]["Email"];
		//$RequestUserId = $json_dat["Params"]["RequestUserId"];
		$phpExec = exec("php ".$GLOBALS['RootDir']."application/cron/expxls.php ".$accId." ".$model." ".$email." > /dev/null 2>/dev/null &");
		$stat="OK";
		
	}
	//Жевак Е.В. 25/03/2019 Процедура полностью переработана
	//else if ($json_dat['TaskType'] == "SMS") {
	//	writeLog("SendSMS");
	//	$accId = $json_dat["Params"]["AccId"];
	//	$segment = $json_dat["Params"]["Segment"];
	//	$message = $json_dat["Params"]["Message"];
	//	try {
	//		$rr = sendSMSMarketing($accId, $segment, $message, $taskId);
	//		if ($rr["status"] == false) {
	//			$NeedProcessRunAgain=false;
	//			$stat="Ошибка";
	//		} else {
	//			$NeedProcessRunAgain=$rr["next"];
	//			$stat="OK";
	//		}
	//		unset($rr);
	//	} catch(Exception $e) {
	//		writeLog("Error launch smsmarketing");
	//		$stat="Ошибка";
	//	}
	//}
	//else if ($json_dat['TaskType'] == "SMS_Status") {
	//	writeLog("SMS_Status");
	//	$accId = $json_dat["Params"]["AccId"];
	//	//$checkTaskId = $json_dat["Params"]["ParentTaskId"];
	//	try {
	//	//			$rr = getSMSMarketingStatus($accId, $checkTaskId, $taskId);

	//	writeLog("getSMSStatus start");
	//		$rr = getSMSStatus($accId);
	//	writeLog("getSMSStatus end");
	//		
	//		unset($rr);
	//	} catch(Exception $e) {
	//		writeLog("Error launch smsmarketing");
	//		$stat="Ошибка";
	//	}
	//}
}

writeLog("Finish status: ".$stat);
$stmt = $conn->prepare("update SrvTasks 
						set Status = '".$stat."', End=NOW()
						where Id = ?");
$stmt->bind_param('s', $TaskIdBind);
$TaskIdBind = $taskId;
$stmt->execute();


writeLog("Run next package:".$NeedProcessRunAgain);

//$NeedProcessRunAgain=false;
if ($NeedProcessRunAgain) {
	$conn->close();
	writeLog("Run next package");
	$phpExec = exec("php ".$GLOBALS['RootDir']."application/cron/srvtask_runner.php ".$taskId." > /dev/null 2>/dev/null &");
} else {
	//if ($stat=="OK")
		$stat="Завершено";
	writeLog("Finish status: ".$stat);
	$stmt = $conn->prepare("update SrvTasks 
							set Status = '".$stat."', End=NOW()
							where Id = ?");
	$stmt->bind_param('s', $TaskIdBind);
	$TaskIdBind = $taskId;
	$stmt->execute();
	$conn->close();
}