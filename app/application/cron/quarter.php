<?php
	include_once $GLOBALS['RootDir']."connection.php";
	
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
	
	function writeLog($text) {
	    //return false;
	    $fp = fopen ($GLOBALS['RootDir'].'log/srvtask_scheduler'.date("Ymd").'.txt', "a");
	    fwrite($fp, print_r(date('Y-m-d H:i:s')." ".$text."\n", true));
	    fclose($fp);
	}
	
	writeLog("Старт планировщика");
	
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
	writeLog("Планировщик:".mysqli_num_rows($result)." задач в очереди");
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			writeLog("Запуск задачи:".$row["Id"]);
			$phpExec = exec("php ".$GLOBALS['RootDir']."application/cron/srvtask_runner.php ".$row["Id"]." > /dev/null 2>/dev/null &");
			writeLog("Результат:".$phpExec);
		}
	}
	mysql_close();
	writeLog("Финиш планировщика");
?>