<?php

	if ($_SERVER['DOCUMENT_ROOT'] == ""){
	   $_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__ . '/../..')."/";
	}

	include_once $_SERVER['DOCUMENT_ROOT']."connection.php";
	require_once $GLOBALS['RootDir'].'vendor/PHPExcel/Classes/PHPExcel.php';
	require_once $GLOBALS['RootDir'].'vendor/phpmailer/PHPMailerAutoload.php';
	
	$AccId = $argv[1];
	$model = $argv[2];
	$address = $argv[3];
	$uniqId=$AccId."-".$model;
	
	if ($model == "Leads") {
		$select="select Id as 'Id Запроса',
	    			 LeadDate as 'Дата',
	    			 LeadStatusName as 'Статус',
	    			 LeadTypeName as 'Тип',
	    			 LeadSourceName as 'Источник',
	    			 LastName as 'Фамилия',
	    			 FirstName as 'Имя',
	    			 MiddleName as 'Отчество',
	    			 Phone  as 'Телефон',
	    			 Email as 'Email',
	    			 LeadText as 'Текст запроса',
	    			 ManagerText as 'Ответ менеджера',
	    			 PartnerId as 'Id партнёра',
	    			 LeadPriorityName as 'Приоритет',
	    			 ManagerName as 'Менеджер',
	    			 ContactId as 'Id клиента' 
	    			from vLeads
	    			 Where AccId = '$AccId'";
	} else if ($model == "Legal") {
		$select="select Id as 'Id юр. лица',
				    LegalName as 'Название',
				    LegalOfficeAddress  as 'Адрес юридический',
				    LegalFactAddress as 'Адрес фактический',
				    LegalOfficePhone as 'Телефон городской',
				    LegalOfficeFax as 'Факс',
				    LegalOfficeMobile as 'Мобильный',
				    LegalOfficeEmail as 'Email',
				    LegalBankName as 'Название банка',
				    LegalAccountNum as 'Счёт в банке',
				    LegalCode as 'УДРПОУбанка',
				    LegalMFO as 'МФО банка',
				    LegalDirectorName as 'ФИО директора',
				    LegalDealStartMod as 'Дата подписания договора',
				    LegalDealEndMod as 'Дата окончания договора',
				    LegalComments as 'Комментарий',
				    ManagerName as 'Менеджер'
			from vLegals
			where AccId = '$AccId'";
	} else if ($model == "Contacts") {
		$select="select Id as 'Id клиента',
					 LastName as 'Фамилия', 
					 FirstName as 'Имя', 
					 MiddleName as 'Отчество', 
					 ManagerName as 'Менеджер', 
					 DateBirth as 'Дата рождения',
					 Comments as 'Комментарий',
					 SegmentName as 'Сегмент',
					 TaxCode as 'Инн',
					 Address as 'Адрес',
					 BlackList as 'Чёрный список',
					 SourceName as 'Источник',
					 PhoneMob as 'Телефон моб',
					 EmailHome as 'Email',
					 docFirstName as 'Given Names',
					 docLastName as 'Surname',
					 docSeriaNum as 'Серия №',
					 docValid as 'Действителен до',
					 docIssuedBy as 'Кем выдан',
					 docbiometric as 'Биометрический'
				from vContacts
				where AccId = '$AccId'";
	} else if ($model == "Deals") {
		$select="select d.Id as 'Id сделки',
				 d.ContactId as 'Id клиента',
				 d.ContactFullName as 'ФИО клиента',
				 d.DealTypeName as 'Тип',
				 d.DealNo as '№ сделки',
				 d.DealDate as 'Дата сделки',
				 d.DealSum as 'Сумма сделки',
				 d.PrePaySum as 'Сумма предоплаты',
				 d.PrePayPercent as '% предоплаты',
				 d.DateFullPay as 'Дата полной оплаты',
				 d.CommercialCourse as 'Коммерческий курс',
				 d.PercentDiscount as '% скидки',
				 d.DirectionName as 'Страна',
				 d.RegionName as 'Курорт',
				 d.HotelName as 'Название отеля',
				 d.HotelStars as 'Кол-во звёзд',
				 d.PlacingTypeName as 'Размещение',
				 d.ManagerName as 'Менеджер',
				 d.DateArrival as 'Дата начала',
				 d.DateDeparture as 'Дата окончания',
				 d.AmountNight as 'Количество ночей',
				 d.FeedName as 'Питание',
				 d.FlatTypeName as 'Тип номера',
				 d.TransferName as 'Трансфер',
				 d.Transport as 'Транспорт',
				 d.Insurance as 'Страховка',
				 d.OperatorName as 'Название оператора',
				 d.Comments as 'Комментарий',
				 d.Visa as 'Выза',
				 d.DocIssued as 'Документы выданы, да/нет',
		 		 d.RoomViewName as 'Вид из номера',
		 		 d.OperatorInvoceSum as 'Сумма счёта оператора',
		 		 d.OperatorInvoceNum as '№ заявки',
		 		 d.OperatorInvoceDate as 'Дата счёта оператора',
		 		 d.FlightA as '№ Рейс А',
		 		 d.FlightAArrivalDate as 'Дата вылета А',
		 		 d.FlightADepartureDate as 'Дата приземления А',
		 		 d.FlightAComments as 'Рейс A комментарий',
		 		 d.FlightB as '№ Рейс B',
		 		 d.FlightBArrivalDate as 'Дата вылета B',
		 		 d.FlightBDepartureDate as 'Дата приземления B',
		 		 d.FlightBComments as 'Рейс B комментарий',
		 		 d.Act as 'Акт',
		 		 d.ActDate as 'Дата акта',
		 		 d.AgentClientName as 'Агент/Клиент',
		 		 d.Invoice as 'Счёт фактура',
		 		 d.DealCurrencyName as 'Валюта',
		 		 d.AdditionalServices as 'Дополнительные услуги',
				 part.AmountTourist as 'Кол-во участников',
				 part.AmountСhild as 'Кол-во участников 0-17 лет'
		from vDeals as d
		left join (SELECT dp.DealId,
					    dp.AccId,
					    count(dp.ContactId) as AmountTourist,
					    sum(case when TIMESTAMPDIFF(YEAR,cl.`DateBirth`,d.DateArrival) <= 17 then 1 else 0 end) AmountСhild
			   FROM `DealParticipants` as dp
			   join `Deals` as d on (dp.DealId = d.Id and dp.AccId = d.AccId)
			   join `Contacts` as cl on (dp.ContactId = cl.Id 
								          and dp.AccId = cl.AccId)
			   group by dp.DealId,dp.AccId) as part on (d.Id = part.DealId and d.AccId = part.AccId)
		where d.AccId='$AccId'";
	}
	
	
	$objPHPExcel = new PHPExcel();
	$F = $objPHPExcel->getActiveSheet();
	$F->setTitle("Export");
	$Line=1;
	
	$host = $GLOBALS['DB_HOST'];
	$user = $GLOBALS['DB_USER'];
	$password = $GLOBALS['DB_PASSWORD'];
	$db_name = $GLOBALS['DB_NAME']; 
	$subject="Экспорт данных CRMTour";
	$body="Результат экспорта в файле";
	
	$link = mysql_connect ($host, $user, $password) or die('Could not connect: ' . mysql_error());
	mysql_select_db($db_name) or die('Could not select database');
	mysql_query('SET NAMES utf8;');
	$export = mysql_query($select); 
	$fields = mysql_num_fields($export);
	for ($i = 0; $i < $fields; $i++) {
		$F->setCellValueByColumnAndRow($i, $Line, mysql_field_name($export, $i));
	}
	$Line++;
	
	while($row_data = mysql_fetch_assoc($export)) {
	    $col = 0;
	    foreach($row_data as $key=>$value) {
	        $F->setCellValueByColumnAndRow($col, $Line, $value);
	        $col++;
	    }
	    $Line++;
	}
	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$expFile= $GLOBALS['RootDir']."tmp/".$uniqId.".xls";
	$objWriter->save($expFile);

	$mail = new PHPMailer;
	
		$mail->isSMTP();
		$mail->Host = $GLOBALS['MailHost'];
		$mail->SMTPAuth = true;
		$mail->Username = $GLOBALS['MailUser'];
		$mail->Password = $GLOBALS['MailPass'];
		$mail->Port = 25;
		$mail->CharSet = 'UTF-8';
	
		$mail->setFrom($GLOBALS['Email'], 'CRM Tour');
		$mail->addAddress($address);
		$mail->addAttachment($expFile);  
	
		$mail->isHTML(true);
	
		$mail->Subject = $subject;
		$mail->Body    = $body;
	
		if(!$mail->send()) {
		    echo 'Message has not sent';
		} else {
		    echo 'Message has been sent';
		}
		if (file_exists($expFile)) {
	        unlink($expFile);
	    }
	exit;
	
?>
