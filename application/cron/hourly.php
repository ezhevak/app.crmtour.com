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

	$query="call sysSchedulerHourly;";

	mysql_connect($dbhost,$username,$password);
		@mysql_select_db($dbname) or die(strftime('%c')." Unable to select database");
	mysql_query($query);
	mysql_close();
	echo "Выполнена ежечасная процесура 'call sysSchedulerHourly'. ".strftime('%c')." ok!"."</br>";
?>
