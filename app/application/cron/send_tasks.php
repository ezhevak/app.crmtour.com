<?php


	function appsendmail($address,$subject, $body) {
		require_once $GLOBALS['RootDir'].'vendor/phpmailer/PHPMailerAutoload.php';
	
		$mail = new PHPMailer;
	
		$mail->isSMTP();
		$mail->Host = 'mail.adm.tools';
		$mail->SMTPAuth = true;
		$mail->Username = 'info@crmtour.com';
		$mail->Password = 'o7yyZ50dVTM1';
		$mail->Port = 25;
		$mail->CharSet = 'UTF-8';
	
		$mail->setFrom('info@crmtour.com', 'CRM Tour');
		$mail->addAddress($address);
	
		//$mail->addAddress('info@crmtour.com');
	
		$mail->isHTML(true);
	
		$mail->Subject = $subject;
		$mail->Body    = $body;
	
		//unset($token_data);
	
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
		require_once $GLOBALS['RootDir'].'vendor/telegrambot/autoload.php';
		$bot = new \TelegramBot\Api\BotApi("747908030:AAEQrLiYLi5DXPj_l5ULRJwRG0zQ-__dIYs");
		$bot->sendMessage($tBotchatId, $tBotText);
	}
	

	include_once $GLOBALS['RootDir']."connection.php";

	$username=$GLOBALS['DB_USER'];
	$password=$GLOBALS['DB_PASSWORD'];
	$dbname=$GLOBALS['DB_NAME'];
	$dbhost=$GLOBALS['DB_HOST'];

	// Create connection
	$conn = mysqli_connect($dbhost, $username, $password, $dbname);
	$conn->	set_charset("utf8");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "select vt.Id, vt.AccId, vt.Title, vt.Task, vt.ModelType, vt.ModelId, u.ManagerName, u.Email, u.TelegramChatId,
			concat('http://app.crmtour.com/tasks/add?Id=',vt.Id) as url,
			vt.`Start`, vt.End
			from vTasks as vt
			join vUsers as u on (vt.FirstUserId = u.Id and vt.AccId = u.AccId and u.Email !='')
			where /*vt.AccId = 1
			  and */vt.SendEmail = 1
			  and vt.Done = 0
			  and vt.`Start` >=
				case 
					when minute(now()) >= 0 and minute(now()) < 15 then DATE_FORMAT(now(), CONCAT('%Y-%m-%d %H:00:00'))
					when minute(now()) >= 15 and minute(now()) < 30  then DATE_FORMAT(now(), CONCAT('%Y-%m-%d %H:15:00'))
					when minute(now()) >= 30 and minute(now()) < 45  then  DATE_FORMAT(now(), CONCAT('%Y-%m-%d %H:30:00'))
				else  DATE_FORMAT(now(), CONCAT('%Y-%m-%d %H:45:00')) end
			  and vt.`Start`  <
				case 
					when minute(now()) >= 0 and minute(now()) < 15 then DATE_FORMAT(now(), CONCAT('%Y-%m-%d %H:15:00'))
					when minute(now()) >= 15 and minute(now()) < 30  then DATE_FORMAT(now(), CONCAT('%Y-%m-%d %H:30:00'))
					when minute(now()) >= 30 and minute(now()) < 45  then  DATE_FORMAT(now(), CONCAT('%Y-%m-%d %H:45:00'))
				else  DATE_ADD(DATE_FORMAT(now(), CONCAT('%Y-%m-%d %H:00:00')), INTERVAL 1 HOUR) end";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
			$email = $row["Email"];
			$subject = "Напоминание. ".$row["Title"];
		 
			$body = $row["ManagerName"]." на Вас назначена задача с темой: <a href='".$row["url"]."' target='_blank'>".$row["Title"]."</a>.<br> 
			
			Описание задачи:".$row["Task"]."<br>
			Время начала:".$row["Start"]."
			
			<p><br>
			С уважением команда <a href='https://www.liqpay.ua/ru/checkout/crmtour' target='blank'>CRM Tour</a>
			";

			appsendmail($email,$subject,$body);
			
			if($row["TelegramChatId"] != ""){
				$tBotText = "Напоминание! \n";
				$tBotText .= $row["ManagerName"]." на Вас назначена задача. \n";
				$tBotText .= "Тема: ".$row["Title"]."\n";
				$tBotText .= "Ссылка: ".$row["url"]."\n";
				$tBotText .= "Описание задачи:".$row["Task"]."\n";
				$tBotText .= "Время начала:".$row["Start"]."\n";
				$tBotText .= "Время окончания:".$row["End"]."\n\n";
				$tBotText .= "-------------\n";
				$tBotText .= "С уважением команда CRM Tour";
				appsendtelegram($row["TelegramChatId"],$tBotText);
			}
			
	    }
	} else {
	    echo "0 results";
	}

	mysqli_close($conn);
//}

?>