<?php


	if ($_SERVER['DOCUMENT_ROOT'] == ""){
	   $_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__ . '/../..')."/";
	}
	include_once $_SERVER['DOCUMENT_ROOT']."connection.php";
	include_once $_SERVER['DOCUMENT_ROOT']."application/utils/functions.php";

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

	$sql = "select d.Id, d.DealNo, u.ManagerName, u.Email, u.telegramChatId, d.DateArrival, d.DateDeparture,
		   d.ContactId,
		   c.PhoneMob,
			CONCAT(IFNULL(c.LastName,''), ' ' , IFNULL(c.FirstName,''), ' ',IFNULL(c.MiddleName,'')) as `ContactFullName`,
			d.DocIssued,
		   op.Name as OperatorName,
		   d.OperatorInvoceNum,
		   op.WebSite,
		   d.FlightA,
		   DATE_FORMAT(d.FlightAArrivalDate, '%d.%m.%Y %H:%i:%s') as FlightAArrivalDate,
		   DATE_FORMAT(d.FlightADepartureDate, '%d.%m.%Y %H:%i:%s') as FlightADepartureDate,
		   d.FlightB,
		   DATE_FORMAT(d.FlightBArrivalDate, '%d.%m.%Y %H:%i:%s') as FlightBArrivalDate,
		   DATE_FORMAT(d.FlightBDepartureDate, '%d.%m.%Y %H:%i:%s' ) as FlightBDepartureDate
	from Deals d
	join vContacts	as c on (d.AccId = c.AccId and d.ContactId = c.Id)
	join vUsers_materialized as u on (d.UserId = u.Id and d.AccId = u.AccId and u.Email !='')
	left join dimOperators as op on (d.AccId = op.AccId and d.OperatorId = op.Id)
	join AccountOptions as ao on (d.AccId = ao.AccId and ao.OptionName = 'Send_Email_Arrival' and ao.OptionVal = '1')
	Where d.DateArrival between DATE(NOW()) and DATE_ADD(DATE(NOW()), INTERVAL 1 DAY)";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
			$email = $row["Email"];
			$subject = "Напоминание. Клиент ". $row["ContactFullName"] . "вылет " .$row["DateArrival"];
			if($row["DocIssued"]==1){
				$docIssued = "выданы";
			} else {
				$docIssued = "не выданы";
			}

			$body = "Клиент: <a href='https://app.crmtour.com/contacts/add?Id=".$row["ContactId"]."' target='_blank'>".$row["ContactFullName"]."</a> <br>
			Сделка: <a href='https://app.crmtour.com/deals/add?Id=".$row["Id"]."' target='_blank'>".$row["DealNo"]."</a> <br>
			Тур: c ".$row["DateArrival"]." по ".$row["DateDeparture"]."<br>
			1. Созвониться с клиентом <a href='tel:'".$row["PhoneMob"]."'>".$row["PhoneMob"]."</a> <br>
			2. Выдать докумменты. Документы ".$docIssued."<br>
			3. Проверить рейсы: <br>
			Рейс1: ".$row["FlightA"].", вылет ".$row["FlightAArrivalDate"].", приземление ".$row["FlightADepartureDate"]."<br>
			Рейс2: ".$row["FlightB"].", вылет ".$row["FlightBArrivalDate"].", приземление ".$row["FlightBDepartureDate"]."<br>

			Оператор:<a href='".$row["WebSite"]."' target='_blank'>".$row["OperatorName"]."</a>, заявка:".$row["OperatorInvoceNum"]."<br>

			<p><br>
			С уважением команда <a href='https://crmtour.com/' target='blank'>CRM Tour</a>
			";

			appsendmail($email,$subject,$body);


	    }
	} else {
	    echo "0 results";
	}

	mysqli_close($conn);

?>
