<?php

	function writeLog($text) {
	    $fp = fopen ($GLOBALS['RootDir'].'log/app/'.date("Ymd").'.txt', "a");
	    fwrite($fp, print_r(date('Y-m-d H:i:s')." ".$text."\n", true));
	    fclose($fp);
	}

//lookupvalue функция которая возвращает значение поля в зависимости от локали
//function lookupvalue($LIC, $lang){
//
//	//Если не указан язык по умолчанию выбираем русский
//	if (empty($lang)) {
//		$lang = 'ru_RU';
//	}
//
//	if (!empty($LIC)) {
//
//		$AccId 	= $_SESSION['AccId'];//Id организации таблица Account
//		$conn = new mysqli(
//				$GLOBALS['DB_HOST'],
//				$GLOBALS['DB_USER'],
//				$GLOBALS['DB_PASSWORD'],
//				$GLOBALS['DB_NAME']);
//		$conn->	set_charset("utf8");//исправляем иероглифы
//		// Check connection
//		if ($conn->connect_error) {
//			die("Connection failed: " . $conn->connect_error);
//		}
//		try {
//			$sql = "SELECT Name	FROM `Dictionaries`
//					where AccId = $AccId and LIC = '$LIC' and Lang = '$lang' LIMIT 1;";
//			$result = $conn->query($sql);
//			while( $row = $result->fetch_assoc()){
//				 $value = $row['Name'];
//			}
//		} catch (Exception $e) {
//    		echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
//		}
//
//		$conn->close();
//	}
//
//	return $value;
//
//}



function lookupvalue($LIC){
	if (!empty($LIC)) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $_SESSION["AccId"]);
        $db->where("Lang", "ru_RU");
		$db->where("LIC", $LIC);
		$value = $db->getValue("Dictionaries", "Name");
		$db->disconnect();
		return $value;
	}
}



//Функция возвращает true/false усли пользователь администратор или пользователь является владельцем записи
function recordowner($RecUserId){
	if($_SESSION['UserRole']  == 'admin' || $RecUserId == $_SESSION['UserId']){
		$owner = true;
	} else{
		$owner = false;
	}
	return $owner;
}


function appsendmail($address,$subject,$body) {

	require_once $GLOBALS['RootDir'].'vendor/phpmailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	$mail->isSMTP();
	$mail->Host = $GLOBALS['MailHost'];
	$mail->SMTPAuth = true;
	$mail->Username = $GLOBALS['MailUser'];
	$mail->Password = $GLOBALS['MailPass'];
	$mail->Port = 25;
	$mail->CharSet = 'UTF-8';

	$mail->setFrom($GLOBALS['Email'], 'CRM Tour');
	//zhevak заменил значение на вхлдящую переменну для отправки сообщений на определённый адрес получателя
	//http://178.150.16.80:3000/issues/36
	$mail->addAddress($address);

//$mail->addAddress('info@crmtour.com');

	$mail->isHTML(true);

	$mail->Subject = $subject;
	$mail->Body    = $body;

	unset($token_data);

	if(!$mail->send()) {
		//header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
	    //echo 'Message could not be sent.';
	    //echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    //echo 'Message has been sent';
	}
}

//Отправка сообщения в телеграм
function appsendtelegram($tBotchatId,$tBotText){
		try {
			//https://github.com/TelegramBot/Api

			require_once 'vendor/telegrambot/autoload.php';
			$bot = new \TelegramBot\Api\BotApi($GLOBALS['tBotToken']);
			$bot->sendMessage($tBotchatId, $tBotText);
		} catch (Exception $e) {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при обновлении записи. ".$e->getMessage();
		     return $data;
		    //echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
		}
	}


//Функция реализована в рамках задачи по отправке уведомлений пользователям.
//http://178.150.16.80:3000/issues/36
//function GetUserEmail($Id){
//	if (!empty($Id)) {
//		$conn = new mysqli(
//				$GLOBALS['DB_HOST'],
//				$GLOBALS['DB_USER'],
//				$GLOBALS['DB_PASSWORD'],
//				$GLOBALS['DB_NAME']);
//		$conn->	set_charset("utf8");//исправляем иероглифы
//
//		// Check connection
//		if ($conn->connect_error) {
//			die("Connection failed: " . $conn->connect_error);
//		}
//		try {
//			$sql = "SELECT * FROM `vUsers` where Id = $Id";
//			$result = $conn->query($sql);
//			while( $row = $result->fetch_assoc()){
//				 $value = $row['Email'];
//			}
//		} catch (Exception $e) {
//    		echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
//		}
//		$conn->close();
//	}
//	return $value;
//}

//Функция получает значения option необходимо для получения различных параметров сохранённых в базу данных
//function GetOption($OptionName,$AccId){
//	if (!empty($OptionName)) {
//		$conn = new mysqli(
//				$GLOBALS['DB_HOST'],
//				$GLOBALS['DB_USER'],
//				$GLOBALS['DB_PASSWORD'],
//				$GLOBALS['DB_NAME']);
//		$conn->	set_charset("utf8");//исправляем иероглифы
//
//		// Check connection
//		if ($conn->connect_error) {
//			die("Connection failed: " . $conn->connect_error);
//		}
//		try {
//			$value = "0";
//
//			$sql = "select OptionVal from AccountOptions where AccId = ".$AccId." and OptionName = '$OptionName'";
//			$result = $conn->query($sql);
//			while( $row = $result->fetch_assoc()){
//				 $value = $row['OptionVal'];
//			}
//		} catch (Exception $e) {
//    		echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
//		}
//		$conn->close();
//	}
//	return $value;
//}


function GetOption($OptionName,$AccId){
	if (!empty($OptionName)) {

		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->where("AccId", $AccId);
		$db->where("OptionName", $OptionName);
		$value = $db->getValue("AccountOptions", "OptionVal");
		$db->disconnect();
		if(empty($value)){
			$value = "0";
		}
		return $value;
	}
}





//Функция сохранения значения option. Аналог Upsert
function SetOption($OptionName,$OptionVal,$AccId){
	if (!empty($OptionName)) {

        require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();

		if(!empty($AccId) && $AccId !=""){
			$AccIdx = $AccId;
		} else {
			$AccIdx = $_SESSION["AccId"];
		}

		$db->where('AccId',$AccIdx);
		$db->where('OptionName', $OptionName);
	    $countOptions = $db->getValue("AccountOptions", "count(*)");

		$dataX = array ("AccId" 		=> $AccIdx,
		                "OptionName"	=> $OptionName,
		                "OptionVal"		=> $OptionVal
		);

		if($countOptions =="0"){
			$id = $db->insert ('AccountOptions', $dataX);
			if($id){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно добавлена. Id='".$id."'";
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при добавлении записи. ".$db->getLastError();
			}
		} else {
			$db->where ('AccId',$AccIdx);
			$db->where ('OptionName',$OptionName);
			if ($db->update ('AccountOptions', $dataX)){
			   	$data["status"] ="success";
				$data["message"] ="Запись успешно обновлена. Id='".$data["Id"]."'";
			} else {
				$data["status"] ="error";
			    $data["message"] = "Ошибка при обновлении записи. ".$db->getLastError();
			}
		}
		$db->disconnect();
	}
	return $data;
}
//интеграция с сервисом email рассылок mailchimp
function syncMailchimp($data,$apiKey,$listId) {

    $memberId = md5(strtolower($data['email']));

    $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

    $json = json_encode(array(
        'email_address' => $data['email'],
        'status'        => $data['status'], // "subscribed","unsubscribed","cleaned","pending"
        'merge_fields'  => array(
            'FNAME'     => $data['firstname'],
            'LNAME'     => $data['lastname']
        )
    ));

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

	//echo $httpCode;
}

//интеграция с сервисом email рассылок mailchimp
//Проверяет статус email списке. если 404 email в список не добавлен.
function checkMailChimp($email, $apikey, $listid) {
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
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    $result = curl_exec($ch);

    $json = json_decode($result);
    return $json->{'status'}; //404 email отсутствует в списке
}



function SqlToXls($select){

	$host = $GLOBALS['DB_HOST']; // your db host (ip/dn)
	$user = $GLOBALS['DB_USER']; // your db's privileged user account
	$password = $GLOBALS['DB_PASSWORD']; // and it's password
	$db_name = $GLOBALS['DB_NAME']; // db name
	$tbl_name = "Account"; // table name of the selected db

	$link = mysql_connect ($host, $user, $password) or die('Could not connect: ' . mysql_error());
	mysql_select_db($db_name) or die('Could not select database');



	mysql_query('SET NAMES utf8;');
	$export = mysql_query($select);
	//$fields = mysql_num_rows($export); // thanks to Eric
	$fields = mysql_num_fields($export); // by KAOSFORGE
	$col_title="";
	$data="";
	for ($i = 0; $i < $fields; $i++) {
	    $col_title .= '<Cell ss:StyleID="2"><Data ss:Type="String">'.mysql_field_name($export, $i).'</Data></Cell>';
	}

	$col_title = '<Row>'.$col_title.'</Row>';

	while($row = mysql_fetch_row($export)) {
	    $line = '';
	    foreach($row as $value) {
	        if ((!isset($value)) OR ($value == "")) {
	            $value = '<Cell ss:StyleID="1"><Data ss:Type="String"></Data></Cell>\t';
	        } else {
	            $value = str_replace('"', '', $value);
	            $value = '<Cell ss:StyleID="1"><Data ss:Type="String">' . $value . '</Data></Cell>\t';
	        }
	        $line .= $value;
	    }
	    $data .= trim("<Row>".$line."</Row>")."\n";
	}

	$data = str_replace("\r","",$data);

	header("Content-Type: application/vnd.ms-excel;");
	header("Content-Disposition: attachment; filename=export.xlsx");
	header("Pragma: no-cache");
	header("Expires: 0");

	$xls_header = '<?xml version="1.0" encoding="utf-8"?>
	<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet" xmlns:html="http://www.w3.org/TR/REC-html40">
	<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
	<Author></Author>
	<LastAuthor></LastAuthor>
	<Company></Company>
	</DocumentProperties>
	<Styles>
	<Style ss:ID="1">
	<Alignment ss:Horizontal="Left"/>
	</Style>
	<Style ss:ID="2">
	<Alignment ss:Horizontal="Left"/>
	<Font ss:Bold="1"/>
	</Style>

	</Styles>
	<Worksheet ss:Name="Export">
	<Table>';

	$xls_footer = '</Table>
	<WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
	<Selected/>
	<FreezePanes/>
	<FrozenNoSplit/>
	<SplitHorizontal>1</SplitHorizontal>
	<TopRowBottomPane>1</TopRowBottomPane>
	</WorksheetOptions>
	</Worksheet>
	</Workbook>';

	print $xls_header.$col_title.$data.$xls_footer;
	exit;
}

function uniqidReal($lenght = 13) {
    // uniqid gives 13 chars, but you could adjust it to your needs.
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $lenght);
}

//function createServerTask($taskName, $taskComm, $taskParams) {
//	try {
//		$dts = new DateTime;
//		$dts->setDate(date('Y'),date('m'),date('d')+1)->setTime(21, 0)->format('Y-m-d H:i:s');
//		$dts->setTime(21, 0);
//		$dte = new DateTime;
//		$dte->setDate(date('Y'),date('m'),date('d')+1)->setTime(21, 0)->format('Y-m-d H:i:s');
//		$dte->setTime(21, 15);
//
//		$start = $dts->format('Y-m-d H:i:s');
//		$end   = $dte->format('Y-m-d H:i:s');
//		require('application/models/model_srvtasks.php');
//		$array = array(
//			"Start" => $start,
//			"End" => $end,
//			"Name"	=> $taskName,
//			"Comments"	=> $taskComm,
//			"Status"	=> 'QUEUE',
//			"Params"	=> json_encode($taskParams)
//		);
//
//		$srvTask = new Model_srvtasks();
//		$res = $srvTask->add($array);
//
//		//echo json_encode($res);
//		if ($res["status"] == "success") {
//			$res = true;
//		} else {
//			$res["status"] == "error";
//			$res["message"] == $res["message"];
//		}
//		unset($srvTask);
//
//	} catch(Exception $e) {
//			echo 'Выброшено исключение: '.$e->getMessage();
//	}
//}

function toFormat($inFormat,$outFormat,$value){
	if(!empty($value)){
		return DateTime::createFromFormat($inFormat, $value)->format($outFormat);
	}
}

function getUserData($UserId){
	require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
	$mysqli = database::getInstance();
    $db = $mysqli->getConnection();
	$db->where("AccId", $_SESSION["AccId"]);
	$db->where("Id", $UserId);
	$cols = array("Id", "BranchId","Login", "Role","FirstName","LastName","Phone","Email","Commission","ManagerName","Inactive","TelegramChatId");
	$data = $db->get("vUsers", null, $cols);

	$db->disconnect();
	//header('Content-Type: application/json; charset=utf-8');
	return $data;
}

function getAdminUserEmail() {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        //Выгружаем справочники из основной организации
        $cols = array ("Id","Email");
        $db->where('AccId', $_SESSION['AccId']);
        $db->where('Role', "admin");
        //$db->where('Id', array(1, 2), 'not in');
        $db->orderBy("Created","asc");
        $data = $db->get("Users",null,$cols);

		$db->disconnect();

		return $data;
	}

	function translit($s) {
	  $s = (string) $s; // преобразуем в строковое значение
	  $s = strip_tags($s); // убираем HTML-теги
	  $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
	  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
	  $s = trim($s); // убираем пробелы в начале и конце строки
	  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
	  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
	  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
	  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
	  return $s; // возвращаем результат
	}

	function removeDirectory($dir) {
		if ($objs = glob($dir."/*")) {
		   foreach($objs as $obj) {
		     is_dir($obj) ? removeDirectory($obj) : unlink($obj);
		   }
		}
		rmdir($dir);
	}

	function isValidCaptcha($response){

		if($GLOBALS['recaptchaSecret'] != "" && $GLOBALS['recaptchaSite'] != ""){

			$isValidCaptcha = false;

			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$secret = $GLOBALS['recaptchaSecret'];
			$recaptcha_response = $response;


			$contents = file_get_contents("$url?secret=$secret&response=$recaptcha_response");

			//If $contents is not a boolean FALSE value.
			if($contents !== false){
				//Print out the contents.
				$recaptcha = json_decode($contents);
				if (isset($recaptcha->success) && $recaptcha->success == false) return false;

				return ($recaptcha->score >= 0.5) ? true : false;
			}
		} else {
			return true;
		}
	}



?>