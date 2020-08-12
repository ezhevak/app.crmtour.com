<?php

	include_once $_SERVER['DOCUMENT_ROOT']."connection.php";

	$NeedProcessRunAgain = false;


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
	    return $json->{'status'}; 
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
				$sql = "select ad.Id,ad.ContactId,ad.LegalId,ad.`Type`, ad.AccId, ad.Address,ad.Comments, case when ad.Send = 1 then 'subscribed' else 'unsubscribed' end Send,d.SubType,ad.UserId, cl.FirstName, cl.LastName, cl.Sex
							from Address as ad
							join Dictionaries as d on (ad.AccId = d.AccId and d.Type ='AddressType' and ad.`Type` = d.LIC and d.SubType = 'Email')
							join Contacts as cl on (ad.AccId = cl.AccId and ad.ContactId =  cl.Id)
						where ad.AccId = '".$accId."' 
						  and ad.Active =1 and Date(ad.NextSync) < NOW() - interval 1 day limit 100";
				$result = $conn2->query($sql);
				while( $row = $result->fetch_assoc()){
					 $needNext = true;
					 $resulte = checkMailChimpLocal($row['Address'], $apikey, $listid);
					 if($resulte == "404"){
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
							$result_update = $conn2->query($update);	
					 	}
					 }
					$update = "update Address set NextSync=NOW() where Id = ".$row['Id'];
					$result_update = $conn2->query($update);
				}
			} catch (Exception $e) {
	    		$conn2->close();
	    		$retVal = false;
			}
			$conn2->close();
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
					 $phpExec = exec("php ".$GLOBALS['RootDir']."application/cron/srvtask_exec.php ".$apikey." ".$listid." ".$accId." ".$row['Id']);
				}
			} catch (Exception $e) {
	    		$conn2->close();
	    		$retVal = false;
			}
			$conn2->close();
			return $retVal;
	}




	$taskId = $argv[1];
	
	$conn = new mysqli(
			$GLOBALS['DB_HOST'],
			$GLOBALS['DB_USER'],
			$GLOBALS['DB_PASSWORD'],
			$GLOBALS['DB_NAME']);
	$conn->	set_charset("utf8");
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$taskParams = "";
	$stat="Ошибка";
	$sql = "SELECT `Id`, `Created`, `LastUpdate`, `AccId`, `CreatorId`, `Params`, `Start`, `End`, `Status`, `Name` FROM SrvTasks where Id=".$taskId;
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $taskParams = $row["Params"];
	    }
	}
	
	$stmt = $conn->prepare("update SrvTasks 
							set Status = 'Выполняется', Start=NOW()
							where Id = ?");
	$stmt->bind_param('s', $TaskIdBind);
	$TaskIdBind = $taskId;
	
	if ($stmt->execute() && $taskParams != "") {
		$json_dat = json_decode($taskParams,true);
		if ($json_dat['TaskType'] == "MailChimp") {
			$accId = $json_dat["Params"]["AccId"];
			$ApiKey = $json_dat["Params"]["ApiKey"];
			$ListId = $json_dat["Params"]["ListId"];
			try {
				$rr = syncMailchimpListLocal1($ApiKey,$ListId,$accId);
				if ($rr["status"] == false) {
					$NeedProcessRunAgain=false;
					$stat="Ошибка";
				} else {
					$NeedProcessRunAgain=$rr["next"];
					$stat="OK";
				}
				unset($rr);
			} catch(Exception $e) {
				$stat="Ошибка";
			}
		} else if ($json_dat['TaskType'] == "ExportExcel") {
			$NeedProcessRunAgain=false;
			$accId = $json_dat["Params"]["AccId"];
			$model = $json_dat["Params"]["Model"];
			$email = $json_dat["Params"]["Email"];
			$phpExec = exec("php ".$GLOBALS['RootDir']."application/cron/expxls.php ".$accId." ".$model." ".$email." > /dev/null 2>/dev/null &");
			$stat="OK";
			
		}
	}
	
	$stmt = $conn->prepare("update SrvTasks 
							set Status = '".$stat."', End=NOW()
							where Id = ?");
	$stmt->bind_param('s', $TaskIdBind);
	$TaskIdBind = $taskId;
	$stmt->execute();
	
	if ($NeedProcessRunAgain) {
		$conn->close();
		$phpExec = exec("php ".$GLOBALS['RootDir']."application/cron/srvtask_runner.php ".$taskId." > /dev/null 2>/dev/null &");
	} else {
		$stat="Завершено";
		$stmt = $conn->prepare("update SrvTasks 
								set Status = '".$stat."', End=NOW()
								where Id = ?");
		$stmt->bind_param('s', $TaskIdBind);
		$TaskIdBind = $taskId;
		$stmt->execute();
		$conn->close();
	}
