<?php


	if ($_SERVER['DOCUMENT_ROOT'] == ""){
	   $_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__ . '/../..')."/";
	}

	include_once $_SERVER['DOCUMENT_ROOT']."connection.php";
	
	$username=$GLOBALS['DB_USER'];
	$password=$GLOBALS['DB_PASSWORD'];
	$dbname=$GLOBALS['DB_NAME'];
	$dbhost=$GLOBALS['DB_HOST'];

	$message ="";

	$query="call sysSchedulerQuarterHour;";

	mysql_connect($dbhost,$username,$password);
		@mysql_select_db($dbname) or die(strftime('%c')." Unable to select database");
	mysql_query($query);
	mysql_close();
	echo "Выполнена процедура 'call sysSchedulerQuarterHour'. ".strftime('%c')." ok!"."</br>";
	
	include_once $GLOBALS['RootDir']."application/cron/send_tasks.php";
	echo "Выполнена процедура отправки напоминаний на почту."."</br>";
	include_once $GLOBALS['RootDir']."application/cron/export_excel.php";
	
	
	$conn = mysqli_connect($dbhost, $username, $password, $dbname);
	$conn->	set_charset("utf8");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "select Id ".
			"  from SrvTasks ".
			" where Status='QUEUE' ". 
			"   and Start > DATE_SUB(NOW(), INTERVAL 15 MINUTE) ".
			"   and Start < DATE_ADD(NOW(), INTERVAL 10 MINUTE) ";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			writeLog("Запуск задачи:".$row["Id"]);
			$phpExec = exec("php ".$GLOBALS['RootDir']."application/cron/srvtask_runner.php ".$row["Id"]." > /dev/null 2>/dev/null &");
			writeLog("Результат:".$phpExec);
		}
	}
	mysql_close();

?>
