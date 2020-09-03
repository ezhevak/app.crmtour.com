<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
$useLogs = true;

function writeLog($text, $useLogs) {
	if($useLogs === true){
	    $fp = fopen ($GLOBALS['RootDir'].'log/integratio/'.date("Ymd").'.txt', "a");
	    fwrite($fp, print_r(date('Y-m-d H:i:s')." ".$text."\n", true));
	    fclose($fp);
	}
}

$listOfBinotelServers = array(
	'00.00.00.00' => 'alfa',
	'00.00.00.00' => 'Home'
);

/**
 * Allow access only from Binotel server
 **/
if (!isset($listOfBinotelServers[$_SERVER['REMOTE_ADDR']])) {
	die('Доступ запрещён! From ip address '.$_SERVER['REMOTE_ADDR']);
} 

writeLog("Старт", $useLogs);


writeLog("Финиш", $useLogs);

?>