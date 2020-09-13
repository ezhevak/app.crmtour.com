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

	$message ="";

	$query="call sysSchedulerDaily;";

	mysql_connect($dbhost,$username,$password);
		@mysql_select_db($dbname) or die(strftime('%c')." Unable to select database");
	mysql_query($query);
	mysql_close();
	echo "Выполнена ежедневная процедура 'call sysSchedulerDaily'. ".strftime('%c')." ok!"."</br>";
	
	
	
	$conn = mysqli_connect($dbhost, $username, $password, $dbname);
	$conn->	set_charset("utf8");
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "select Id, AccId, CreatorId, Params, Start, End, Status, Name, Comments 
			from SrvTasks where Name = 'Email Маркетинг' and Status !='Выполняется'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
			$phpExec = exec("php ".$GLOBALS['RootDir']."application/cron/srvtask_runner.php ".$row["Id"]." > /dev/null 2>/dev/null &");
	    	echo $phpExec;
	    }
	} else {
	    echo "0 строк";
	}
	mysql_close();

	/////////////////---------------Удаление неактивных компаний старше чем 1 год---------------------//////////////////
	require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
	$mysqli = database::getInstance();
	$db = $mysqli->getConnection();
	$db->where("LastLogIn", date('Y-m-d', strtotime('-1 year')),"<=");
	$cols = array("Id", "LastLogIn");
	$data = $db->get("Account", null, $cols);
	
	//header('Content-Type: application/json; charset=utf-8');
	//return $data;

	foreach ($data as $row) {
		//echo $row["Id"]." | ".$row["LastLogIn"]."<br>";
		//Удаляем все данные в таблицах
		//удаляем все связанные с компанией папки и файлы
		
		//Удаляем компанию
        $acc = $db->copy();	
		$acc->where('Id', $row["Id"]);
		$acc->delete('Account');
		$acc->disconnect();
		
		//Удаляем отделения
        $accBranches = $db->copy();	
		$accBranches->where('AccId', $row["Id"]);
		$accBranches->delete('AccountBranches');
		$accBranches->disconnect();
		
		//Удаляем опции
        $accOptions = $db->copy();	
		$accOptions->where('AccId', $row["Id"]);
		$accOptions->delete('AccountOptions');
		$accOptions->disconnect();
		
		//Удаляем действия
        $accActions = $db->copy();	
		$accActions->where('AccId', $row["Id"]);
		$accActions->delete('Actions');
		$accActions->disconnect();
		
		//Удаляем телефоны и email
        $accAddress = $db->copy();	
		$accAddress->where('AccId', $row["Id"]);
		$accAddress->delete('Address');
		$accAddress->disconnect();
		
		//Удаляем связи физ. лиц.
        $accConToCon = $db->copy();	
		$accConToCon->where('AccId', $row["Id"]);
		$accConToCon->delete('ContactToContact');
		$accConToCon->disconnect();
		
		//Удаляем участников
        $accDealPart = $db->copy();	
		$accDealPart->where('AccId', $row["Id"]);
		$accDealPart->delete('DealParticipants');
		$accDealPart->disconnect();
		
		//Удаляем справочники
        $accDic = $db->copy();	
		$accDic->where('AccId', $row["Id"]);
		$accDic->delete('Dictionaries');
		$accDic->disconnect();
		
		//Удаляем Отели
        $accHotel = $db->copy();	
		$accHotel->where('AccId', $row["Id"]);
		$accHotel->delete('dimHotels');
		$accHotel->disconnect();
		
		//Удаляем операторов
        $accOper = $db->copy();	
		$accOper->where('AccId', $row["Id"]);
		$accOper->delete('dimOperators');
		$accOper->disconnect();
		
		//Удаляем регионы
        $accReg = $db->copy();	
		$accReg->where('AccId', $row["Id"]);
		$accReg->delete('dimRegion');
		$accReg->disconnect();
		
		//Удаляем документы
        $accDoc = $db->copy();	
		$accDoc->where('AccId', $row["Id"]);
		$accDoc->delete('Documents');
		$accDoc->disconnect();
		
		//Удаляем посольства
        $accEmb = $db->copy();	
		$accEmb->where('AccId', $row["Id"]);
		$accEmb->delete('Embassy');
		$accEmb->disconnect();
		
		//Удаляем Запросы
        $accLeads = $db->copy();	
		$accLeads->where('AccId', $row["Id"]);
		$accLeads->delete('Leads');
		$accLeads->disconnect();
		
		//Удаляем юр лиц
        $accLegals = $db->copy();	
		$accLegals->where('AccId', $row["Id"]);
		$accLegals->delete('Legals');
		$accLegals->disconnect();
		
		//Удаляем связь юр лиц и физ лиц
        $accLegalCon = $db->copy();	
		$accLegalCon->where('AccId', $row["Id"]);
		$accLegalCon->delete('LegalToContact');
		$accLegalCon->disconnect();
		
		//Удаляем заметки
        $accNotes = $db->copy();	
		$accNotes->where('AccId', $row["Id"]);
		$accNotes->delete('Notes');
		$accNotes->disconnect();
		
		//Удаляем направления по операторам
        $accOperDir = $db->copy();	
		$accOperDir->where('AccId', $row["Id"]);
		$accOperDir->delete('OperatorsDirections');
		$accOperDir->disconnect();
		
		//Удаляем платежи
        $accPay = $db->copy();	
		$accPay->where('AccId', $row["Id"]);
		$accPay->delete('Payments');
		$accPay->disconnect();
		
		//Удаляем входы пользователей 
		$accSessionLog = $db->copy();	
		$accSessionLog->where('u.AccId', $row["Id"]);
		$accSessionLog->join("Users as u", "u.Id = sl.UserId", "");
		$accSessionLog->delete('SessionLog as sl');
		$accSessionLog->disconnect();
        
        //Удаляем токены пользователей
        $accUserToken = $db->copy();	
		$accUserToken->where('u.AccId', $row["Id"]);
		$accUserToken->join("Users as u", "u.Login = ut.login", "");
		$accUserToken->delete('UsersToken as ut');
		$accUserToken->disconnect();
		
		//Удаляем задания сервера
        $accSrv = $db->copy();	
		$accSrv->where('AccId', $row["Id"]);
		$accSrv->delete('SrvTasks');
		$accSrv->disconnect();
		
		//Удаляем задания сервера
        $accTask = $db->copy();	
		$accTask->where('AccId', $row["Id"]);
		$accTask->delete('Tasks');
		$accTask->disconnect();
		
		//Удаляем шаблоны
        $accTempl = $db->copy();	
		$accTempl->where('AccId', $row["Id"]);
		$accTempl->delete('Templates');
		$accTempl->disconnect();
		
		//Удаляем файлы
        $accUploads = $db->copy();	
		$accUploads->where('AccId', $row["Id"]);
		$accUploads->delete('Uploads');
		$accUploads->disconnect();
		
		//Удаляем Пользователи
        $accUsers = $db->copy();	
		$accUsers->where('AccId', $row["Id"]);
		$accUsers->delete('Users');
		$accUsers->disconnect();
		
		//Удаляем отделения
        $accUserBranch = $db->copy();	
		$accUserBranch->where('AccId', $row["Id"]);
		$accUserBranch->delete('UsersBranches');
		$accUserBranch->disconnect();
		
		$dir = $GLOBALS['RootDir']."uploads/".$row["Id"];
		removeDirectory($dir);
		echo "Removed:".$row["Id"]."<br>";
	}	
	$db->disconnect();
		
	/////////////////---------------Удаление неактивных компаний старше чем 1 год---------------------//////////////////
	
?>
