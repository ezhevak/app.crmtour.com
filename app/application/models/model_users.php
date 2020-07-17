<?php


class Model_Users extends Model
{
	function __construct() {
		$this->ModelClass = "User";
	}
	
	public function get_row($UserId){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        //Выгружаем справочники из основной организации
        //$cols = Array ("Type", "Name", "Lang", "LIC", "SubType", "OrderBy", "Active");
        $db->where('AccId', $_SESSION['AccId']);
        $db->where('Id', $UserId);
        $data = $db->get("Users",null,"*");
		
		return $data;
	}
	
	//необходимо для списка менеджеров в при создании задания в календаре
	public function get_list(){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
        $cols = array ("Id", "ManagerName");
        $db->where('AccId', $_SESSION['AccId']);
        $db->where('ManagerName', null,"is not");
        $db->where('ManagerName', "","!=");
        $data = $db->get("vUsers",null,$cols);
        
		return $data;	
		
	}

	public function getListJson() {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("u.Id", "u.BranchId","b.BranchName", "u.Login", "u.Role", "u.FirstName", "u.LastName", "u.Phone", "u.Email", "u.Inactive");
		$db->join("AccountBranches b", "u.BranchId = b.Id and u.AccId = b.AccId", "");
		$db->where('u.AccId', $_SESSION['AccId']);
        $db->where('u.Id', "1337","!=");
        $db->where('u.Id', "1","!=");
		$json = $db->JsonBuilder()->get("vUsers u", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}
	
	public function deleteAjax($Id){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
        $data = array("Inactive" => "1");
        
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('Id', $Id);
		
		if ($db->update('Users', $data)){
			$data["status"] = "success";
	    	$data["message"] = 'Данные пользователя успешно обновлены Id=' . $Id;
		}else{
			$data["status"] = "error";
	    	$data["message"] = 'Ошибка при обновлении пользователя'.$db->getLastError();
		}
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return json_encode($data);
	}
	
	
	public function add($adata){
		$password_hash = "";
		if (isset($adata["pwd"])) {
			$pwd = $adata["pwd"];
			$password_hash = md5($pwd);
		}
		//$AccId = $_SESSION['AccId'];
		$Id = $adata["Id"];
		$Login = $adata["Login"];
		$Role = $adata["Role"];
		$LastName = $adata["LastName"];
		$FirstName = $adata["FirstName"];
		$Phone = $adata["Phone"];
		$Email = $adata["Email"];
		$Lang = $adata["Lang"];
		$Commission = $adata["Commission"];	
		$Inactive = "0";
		if($adata["Inactive"]=="on"){$Inactive ="1";}
		//$Signature=$adata["Signature"];	
		$BranchId=$adata["BranchId"];
		$TelegramChatId = $adata["TelegramChatId"];
		
		if($adata["TaskColor"] == ""){
			$TaskColor = "#3a87ad";
		} else {
			$TaskColor = $adata["TaskColor"];	
		}
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		
		if($Id==""){
			$data = array ("AccId" 		=> $_SESSION['AccId'],
						   "Login"		=> $Login,
						   "Role"		=> $Role,
						   "FirstName"	=> $FirstName,
						   "LastName"	=> $LastName,
						   "Phone"		=> $Phone,
						   "Email"		=> $Email,
						   "Lang" 		=> $Lang,
						   "Pass" 		=> $password_hash,
						   "Commission" => $Commission,
						   "Inactive" 	=> $Inactive,
			//			   "Signature" 	=> $Signature,
						   "BranchId" 	=> $BranchId,
						   "TaskColor"	=> $TaskColor,
						   "TelegramChatId"	=> $TelegramChatId
			);
			$id = $db->insert('Users', $data);
			if($id){
			    $data["status"] = "success";
			    $data["message"] = 'Пользователь успешно созданId=' . $id;
			    //добавляем запись в таблицу пересечений
			    $dataX = array ("AccId" 	=> $_SESSION['AccId'],
						   		"BranchId" 	=> $BranchId,
						   		"UserId"	=> $id
				);
			    $BranchId = $db->insert('UsersBranches', $dataX);
			    if($BranchId){
			    	unset($dataX);
			    	unset($BranchId);
			    }
			    
			} else {
					$data["status"] = "error";
			    	$data["message"] = 'Ошибка при обновлении пользователя'.$db->getLastError();
				}
		} else {
			if ($password_hash == "") {
				$data = array ("Login"		=> $Login,
							   "Role"		=> $Role,
							   "FirstName"	=> $FirstName,
							   "LastName"	=> $LastName,
							   "Phone"		=> $Phone,
							   "Email"		=> $Email,
							   "Lang" 		=> $Lang,
							   "Commission" => $Commission,
							   "Inactive" 	=> $Inactive,
				//			   "Signature" 	=> $Signature,
							   "BranchId" 	=> $BranchId,
							   "TaskColor"	=> $TaskColor,
							   "TelegramChatId" => $TelegramChatId
				);
				$db->where('AccId', $_SESSION['AccId']);
				$db->where('Id', $Id);
				if ($db->update('Users', $data)){
					$data["status"] = "success";
			    	$data["message"] = 'Данные пользователя успешно обновлены Id=' . $Id;
				}else{
					$data["status"] = "error";
			    	$data["message"] = 'Ошибка при обновлении пользователя'.$db->getLastError();
				}
			} else {
				
				$data = array("Login"		=> $Login,
							  "Role"		=> $Role,
							  "FirstName"	=> $FirstName,
							  "LastName"	=> $LastName,
							  "Phone"		=> $Phone,
							  "Email"		=> $Email,
							  "Lang" 		=> $Lang,
							  "Pass" 		=> $password_hash,
							  "Commission" 	=> $Commission,
							  "Inactive" 	=> $Inactive,
				//			  "Signature" 	=> $Signature,
							  "BranchId" 	=> $BranchId,
							  "TaskColor"	=> $TaskColor,
						      "TelegramChatId" => $TelegramChatId
				);
				$db->where ('AccId', $_SESSION['AccId']);
				$db->where ('Id', $Id);
				if ($db->update('Users', $data)){
					$data["status"] = "success";
			    	$data["message"] = 'Данные пользователя успешно обновлены Id=' . $Id;
				}else{
					$data["status"] = "error";
			    	$data["message"] = 'Ошибка при обновлении пользователя'.$db->getLastError();
				}
			}
		}
		$_SESSION["USER_REENTER_PASS"] = "";
		$_SESSION["USER_REENTER_TOKEN"] = "";

		return $data;
	}
	
	public function login($user_name, $password) {
		
		$check_val = false;
		$_SESSION['AccId'] = "";
		$_SESSION['AccName'] = "";
		
		$_SESSION['UserId'] = "";
		$_SESSION['UserName'] = "";
		
		$_SESSION['UserLastName'] = "";
		$_SESSION['UserFirstName'] = "";
		$_SESSION['UserRole'] = "";
		$_SESSION['UserBranchId'] = "";
		
	
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        $db->join("Account as a", "a.Id = u.AccId", "LEFT");
        $db->where("u.Login", $user_name);
		$db->where("u.Inactive", "0");
		$cols = array ("u.Id", "u.LastName","u.FirstName", "u.Pass", "u.AccId", "u.Role", "u.Login","a.Name as AccountName","BranchId", "u.TelegramChatId","a.Salt");
		$user_data = $db->get("Users as u", null, $cols);
		$db->disconnect();
		
		try {
			if ($db->count > 0) {
				$check_val = (md5($password) == $user_data[0]["Pass"]);
				if ($check_val) {
					$this->loginLog($user_data[0]["Id"]);
					$_SESSION['AccId'] = $user_data[0]["AccId"];//Id компании используется для разграничения доступа к данным между компаниями.
					$_SESSION['AccName'] = $user_data[0]["AccountName"];//Название компании.
					$_SESSION['AccSalt'] = $user_data[0]["Salt"];//Соль компании
					
					$_SESSION['UserId'] = $user_data[0]["Id"];//Id пользователя.
					$_SESSION['UserName'] = $user_data[0]["Login"];//Имя пользователя.
					
					$_SESSION['UserLastName'] = $user_data[0]["LastName"];//Фамилия пользователя.
					$_SESSION['UserFirstName'] = $user_data[0]["FirstName"];//Имя пользователя.
					$_SESSION['UserRole'] = $user_data[0]["Role"];//Роль пользователя.
					$_SESSION['BranchId'] = $user_data[0]["BranchId"];//Отделение пользователя
					$_SESSION['UserTelegramChatId'] = $user_data[0]["TelegramChatId"];//Телеграм ЧатId
					
					$dataX = array ("LastLogIn" => date('Y-m-d H:m:s'));
					$db->where ('Id',$_SESSION['AccId']);
					$db->update ('Account', $dataX);
					
					
					return array("status" => "success","message"=> "Логин и пароль указаны правильно!");
					
				} else {
					
					//$_SESSION['APP_STATUS'] = "password_incorrect";
					//$_SESSION['APP_MESSAGE'] = "Пароль неверный";
					
					return array("status" => "error","message"=> "Вы указали неверный пароль!");
				}
			} else {
				
				//$_SESSION['APP_STATUS'] = "user_not_found";
				//$_SESSION['APP_MESSAGE'] = "Пользователь не найден в системе или не активен";
				return array("status" => "error","message"=> "Пользователь не найден в системе или не активен!");
			}
		
			
		} catch(Exception $e) {
			echo 'Выброшено исключение: '.$e->getMessage();
		}
		
		return $check_val;
	}
	
	public function logout() {
		$this->logoutLog();
		$_SESSION['AccId'] = "";
		$_SESSION['AccName'] = "";
		
		$_SESSION['UserId'] = "";
		$_SESSION['UserName'] = "";
		
		$_SESSION['UserLastName'] = "";
		$_SESSION['UserFirstName'] = "";
		$_SESSION['UserRole'] = "";
		$_SESSION['BranchId'] = "";
		$_SESSION['UserTelegramChatId'] = "";
	}
	
	//private function copyDict($newAccId) {
	//	$res = "0";
	//	$conn = parent::getConnection();
	//	if (!$conn->connect_error) {
	//		$stmt = $conn->prepare(
	//			"insert into Dictionaries(`AccId`, `Type`, `Name`, `Lang`, `LIC`,`SubType`,`OrderBy`,`Active`)
	//			select ?, `Type`, `Name`, `Lang`, `LIC`, `SubType`, `OrderBy`,`Active`
	//			  from Dictionaries where AccId= ?");
	//		$stmt->bind_param('ss', $AccountIdBind, $SourceAccIdBind);
	//		$AccountIdBind = $newAccId;
	//		$SourceAccIdBind = "1";
	//		if ($stmt->execute()) {
	//			$res = "1";
	//		} else {
	//			$res = $stmt->error;
	//		}
	//		
	//	}
	//	$conn->close();
	//	return $res;
	//}
	
	//private function copyTemplates($newAccId) {
	//	$res = "0";
	//	$conn = parent::getConnection();
	//	if (!$conn->connect_error) {
	//		$stmt = $conn->prepare(
	//		"insert into Templates(`AccId`, `Module`, `Name`, `Template`, `Active`)
	//			select ?,Module,Name,Template,Active
	//			from Templates
	//			where AccId = ?");
	//		$stmt->bind_param('ss', $AccountIdBind, $SourceAccIdBind);
	//		$AccountIdBind = $newAccId;
	//		$SourceAccIdBind = "1";
	//		if ($stmt->execute()) {
	//			$res = "1";
	//		} else {
	//			$res = $stmt->error;
	//		}
	//		
	//	}
	//	$conn->close();
	//	return $res;
	//}
	
	//private function copyOperators($newAccId) {
	//	$res = "0";
	//	$conn = parent::getConnection();
	//	if (!$conn->connect_error) {
	//		$stmt = $conn->prepare(
	//		"insert into dimOperators (AccId, Name)
	//			select ?, Name
	//			from dimOperators
	//			where AccId = ?");
	//		$stmt->bind_param('ss', $AccountIdBind, $SourceAccIdBind);
	//		$AccountIdBind = $newAccId;
	//		$SourceAccIdBind = "1";
	//		if ($stmt->execute()) {
	//			$res = "1";
	//		} else {
	//			$res = $stmt->error;
	//		}
	//	}
	//	$conn->close();
	//	return $res;
	//}
	
	private function loginLog($UserId) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		
		$data = array("SessionId"		=> session_id(),
					  "LogIn"			=> date('Y-m-d H:i:s'),
					  "UserId"			=> $UserId,
					  "Browser"			=> $_SERVER['HTTP_USER_AGENT'],
					  "Platform"		=> $this->getBrowser()["platform"]
		);
	
		$id = $db->insert('SessionLog', $data);
		
		if($id){
			$dataX = array(
				"LogOut"	=> date('Y-m-d H:i:s')
			);
			
			$db->where('UserId', $UserId);
			$db->where('LogOut', NULL, 'IS');
			$db->where('Id', $id,"!=");
			
			$db->update('SessionLog', $dataX);		
		}
	}
	
	
	private function logoutLog() {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
		$db = $mysqli->getConnection();
		
		$data = array (
				"LogOut" => date('Y-m-d H:i:s')
			);
			
			$db->where('SessionId', session_id());
			$db->where('LogOut', NULL, 'IS');
			
			if ($db->update('SessionLog', $data)){
				echo $db->count . ' records were updated';
			} else {
				echo 'update failed: ' . $db->getLastError();
			}
	}
	
	
	private function getBrowser() {
	    $u_agent = $_SERVER['HTTP_USER_AGENT'];
	    $bname = 'Unknown';
	    $platform = 'Unknown';
	    $version= "";
	
	    //First get the platform?
	    if (preg_match('/linux/i', $u_agent)) {
	        $platform = 'linux';
	    }
	    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
	        $platform = 'mac';
	    }
	    elseif (preg_match('/windows|win32/i', $u_agent)) {
	        $platform = 'windows';
	    }
	   
	    // Next get the name of the useragent yes seperately and for good reason
	    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
	    {
	        $bname = 'Internet Explorer';
	        $ub = "MSIE";
	    }
	    elseif(preg_match('/Firefox/i',$u_agent))
	    {
	        $bname = 'Mozilla Firefox';
	        $ub = "Firefox";
	    }
	    elseif(preg_match('/Chrome/i',$u_agent))
	    {
	        $bname = 'Google Chrome';
	        $ub = "Chrome";
	    }
	    elseif(preg_match('/Safari/i',$u_agent))
	    {
	        $bname = 'Apple Safari';
	        $ub = "Safari";
	    }
	    elseif(preg_match('/Opera/i',$u_agent))
	    {
	        $bname = 'Opera';
	        $ub = "Opera";
	    }
	    elseif(preg_match('/Netscape/i',$u_agent))
	    {
	        $bname = 'Netscape';
	        $ub = "Netscape";
	    }
	   
	    // finally get the correct version number
	    $known = array('Version', $ub, 'other');
	    $pattern = '#(?<browser>' . join('|', $known) .
	    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	    if (!preg_match_all($pattern, $u_agent, $matches)) {
	        // we have no matching number just continue
	    }
	   
	    // see how many we have
	    $i = count($matches['browser']);
	    if ($i != 1) {
	        //we will have two since we are not using 'other' argument yet
	        //see if version is before or after the name
	        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
	            $version= $matches['version'][0];
	        }
	        else {
	            $version= $matches['version'][1];
	        }
	    }
	    else {
	        $version= $matches['version'][0];
	    }
	   
	    // check if we have a number
	    if ($version==null || $version=="") {$version="?";}
	   
	    return array(
	        'userAgent' => $u_agent,
	        'name'      => $bname,
	        'version'   => $version,
	        'platform'  => $platform,
	        'pattern'    => $pattern
	    );
	} 
	
	public function createToken($user_name) {
		$token = "";
		$email_res = "";
		$conn = parent::getConnection();
		if (!$conn->connect_error) {
			$stmt = $conn->prepare("select Email as cnt from Users where Login = ?");
			$stmt->bind_param('s', $LoginBind);
			$LoginBind = $user_name;
			if ($stmt->execute()) {
				$stmt->bind_result($email_res);
				$rslt =$stmt->fetch();
				if (strlen($email_res) > 0) {
					$token=$this->getRandomString(50);
					$stmt->close();
					$stmt = $conn->prepare(
						"insert into UsersToken (Token, Email, Login) values(?, ?, ?)");
					$stmt->bind_param('sss', $tokenBind, $EmailBind, $LoginBind);
					$tokenBind = $token;
					$EmailBind = $email_res;
					$LoginBind = $user_name;
					$stmt->execute();
				}
			}
		}
		$conn->close();
		return array("email" => $email_res, "token" => $token);
	}
	
	public function getUserByToken($token, $user_name) {
		$data = array();
		$conn = parent::getConnection();
		if (!$conn->connect_error) {
			$stmt = $conn->prepare("select u.AccId, u.Id, u.Login from `UsersToken` ut
									join `Users` u on u.Login = ut.Login
									where ut.token = ? and ut.Login = ?");
			$stmt->bind_param('ss', $tokenBind, $LoginBind);
			$tokenBind = $token;
			$LoginBind = $user_name;
			if ($stmt->execute()) {
				$stmt->bind_result($acc_res, $userId_res, $userLogin_res);
				if ($stmt->fetch()) {
					if (strlen($acc_res) > 0) {
						$data["AccId"] = $acc_res;
						$data["Id"] = $userId_res;
						$data["Login"] = $userLogin_res;
					}
				}
			}
			$stmt->close(); 
		}
		return $data;
	}
	
	public function changepassword($newpass,$user_name, $token) {
		$userData = $this->getUserByToken($token, $user_name);
		//print_r($userData);
		if (count($userData) > 0 && $userData["Id"] != "") {
			$conn = parent::getConnection();
			if (!$conn->connect_error) {
				$stmt = $conn->prepare(
					"update Users set Pass = ? where Id = ?");
				$stmt->bind_param('ss', $PassBind, $LoginBind);
				$PassBind = md5($newpass);
				$LoginBind = $userData["Id"];
				$stmt->execute();
				$stmt->close(); 
			}
		}
		unset($userData);
	}

	
	
	//public function GetAccountAmount($AccId)
	//{
	//	$this->SQL_select = "select `AccId` AS `AccId`, sum(`AmountUSD`) AS `AmountUSD` from `AccountPayments` where AccId = ? group by `AccId`";
	//	$this->SQL_params_types = array('s');
	//	$this->SQL_params = array($AccId);
	//	
	//	$data = null;
	//	try {
	//		$data = parent::getListJson();
	//	} catch(Exception $e) {
	//		echo 'Выброшено исключение: '.$e->getMessage();
	//	}
	//	return $data;
	//}
	
	public function register($ar_data) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
        //Проверяем наличие такой компании в системе
        $db->where('Name', $ar_data["AccountName"]);
        $countAcc = $db->getValue("Account", "count(*)");
        if($countAcc > 0){
        	$data["status"] = "error";
        	$data["message"] = "Компания '".$ar_data["AccountName"]."' уже существует в системе";
        } else {
			//Проверяем наличие логина в системе
	        $db->where('Login', $ar_data["Login"]);
	        $countUser = $db->getValue("Users", "count(*)");
	        if($countUser > 0){
	        	$data["status"] = "error";
	        	$data["message"] = "Такой логин уже есть в системе";
	        } else {
	        	$salt = $this->getRandString();
	        	
	        	$dataAcc = array ("Name" 	       => $ar_data["AccountName"],
			//	               	  "ReffererId"     => $ar_data["ReffererId"],
							   	  "OfficeMobile"   => $ar_data["Phone"],
							   	  "OfficeEmail"	   => $ar_data["Email"],
							   	  "DirectorName"   => $ar_data["LastName"]. " " . $ar_data["FirstName"] . " " . $ar_data["MiddleName"],
				               	  "Salt" 		   => $salt
				               	  
				);
				$AccId = $db->insert('Account', $dataAcc);
				if($AccId >0){
					//$data["status"] = "success";
					//$data["message"] = "Компания '".$ar_data["AccountName"]."'успешно создана Id='".$AccId."'";
					$dataAccBranch = Array ("AccId" 	 => $AccId,
											"BranchName" => $ar_data["AccountName"]
					);
					$AccBranchId = $db->insert('AccountBranches', $dataAccBranch);	
					if($AccBranchId >0){
						//$data["status"] = "success";
						//$data["message"] = "Отделение '".$ar_data["AccountName"]."'успешно создано Id='".$AccBranchId."'";
						$dataUser = array ("AccId"	=> $AccId,
										   "BranchId" =>$AccBranchId,
										   "Login"	=> $ar_data["Login"],
										   "Pass"	=> md5($ar_data["Password"]),
										   "Role"	=> "admin",
										   "FirstName"	=> $ar_data["FirstName"],
										   "LastName"	=> $ar_data["LastName"],
										   "Phone"	=> $ar_data["Phone"],
										   "Email"	=> $ar_data["Email"],
										   "Lang"	=>	"ru_RU"
						);
						$UserId = $db->insert('Users', $dataUser);
						if($UserId >0){
							require_once($GLOBALS['RootDir'].'application/models/model_dictionary.php');
							$dict = new Model_Dictionary();
								
							$data = $dict->setDictionaryForNewAccount($AccId);
							//echo json_encode($data);
							
							
							//$dictResult = $this->copyDict($AccId);
							//$OperResult = $this->copyOperators($AccId);
							
							if ($data["status"] == "success" /*&& $copyTemplate=="1" && $OperResult == "1"*/) {
									
									//Добавляем настройки системы по умолчанию
									SetOption("Show_Address","1",$AccId);
									SetOption("Send_Email","1",$AccId);
									SetOption("Send_Email_Arrival","1",$AccId);
									SetOption("StandartSegment","0",$AccId);
									SetOption("DayToBirthday","7",$AccId);
									SetOption("DayToPassport","180",$AccId);
									//SetOption("DateFormat","DD.MM.YYYY",$AccId);
									//SetOption("DateTimeFormat","DD.MM.YYYY HH:mm",$AccId);
									
									$data["status"] = "success";
									$data["message"] = "Компания успешно зарегистрирована";
								} else {
									
									$db->where('Id', $AccId);
									if($db->delete('Account')){
										$data["status"] = "success";
										$data["message"] = "Успешно удалена компания";
									}
									
									$db->where('Id', $AccBranchId);
									if($db->delete('AccountBranches')){
										$data["status"] = "success";
										$data["message"] = "Успешно удалено отделение";
									}
									
									
									$db->where('Id', $UserId);
									if($db->delete('Users')){
										$data["status"] = "success";
										$data["message"] = "Успешно удален пользователь";
									}
									
									$db->where('AccId', $AccId);
									if($db->delete('Dictionaries')){
										$data["status"] = "success";
										$data["message"] = "Успешно удалены справочники";
									}
									$db->where('AccId', $AccId);
									if($db->delete('dimOperators')){
										$data["status"] = "success";
										$data["message"] = "Успешно удалены операторы";
									}
								}
							
							
						} else {
							$data["status"] = "error";
							$data["message"] = "Ошибка при попытке создания пользователя ".$ar_data["Login"]." ".$db->getLastError();
						}
					} else {
						$data["status"] = "error";
						$data["message"] = "Ошибка при попытке создания отделения ".$ar_data["AccountName"]." ".$db->getLastError();
					}
				} else {
					$data["status"] = "error";
					$data["message"] = "Ошибка при попытке создания компании ".$ar_data["AccountName"]." ".$db->getLastError();
				}
        	
        	}
        	
        }
		return $data;
	}	
		
//	private function copyDictdb($AccId) {
//		require_once ('/home/zhevak/crmtour.com/app/application/mysql/db.php');
//		$mysqli = database::getInstance();
//        $db = $mysqli->getConnection();
//        //Выгружаем справочники из основной организации
//        $cols = array ("Type", "Name", "Lang", "LIC", "SubType", "OrderBy", "Active");
//        $db->where('AccId', 1);
//        $data = $db->get("Dictionaries",null,$cols);
//        
//        $dataX = array(); 
//		for($i = 0; $i < count($data); $i++){
//			$dataX[] = array("AccId"	=> $AccId,
//	               			 "Type"		=> $data[$i]["Type"],
//	               			 "Name"		=> $data[$i]["Name"],
//	               			 "Lang"		=> $data[$i]["Lang"],
//	               			 "LIC"		=> $data[$i]["LIC"],
//	               			 "SubType"	=> $data[$i]["SubType"],
//	               			 "OrderBy"	=> $data[$i]["OrderBy"],
//	               			 "Active"	=> $data[$i]["Active"]
//							);
//			} 
//			
//		$Id = $db->insertMulti('Dictionaries', $dataX);
//		if($Id){
//			return "1";
//		} else {
//			return $data["message"] = 'insert failed: ' . $db->getLastError();
//		}
//	}
	
	private function getRandString($length = 10){
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
		
	private function getRandomString($length) 
	{
	    $validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
	    $validCharNumber = strlen($validCharacters);
	    $result = "";
	
	    for ($i = 0; $i < $length; $i++) {
	        $index = mt_rand(0, $validCharNumber - 1);
	        $result .= $validCharacters[$index];
	    }
		return $result;
	}
	
	public function delUserBranches($UserId){
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
		
		$db->where('AccId', $_SESSION["AccId"]);
		$db->where('UserId', $UserId);
		if($db->delete('UsersBranches')){
		    $data["status"] = "success";
		    $data["message"] = 'Данные успешно удалены';
		} else {
			$data["status"] = "error";
			$data["message"] = "Ошибка при попытке удаления ".$db->getLastError();
		}
		
		return $data;
	}
	
	
	public function addUserBranches($UserId,$BranchId){
		
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$data = array ("AccId" 		=> $_SESSION['AccId'],
					   "UserId"		=> $UserId,
					   "BranchId"	=> $BranchId
			);
		$id = $db->insert('UsersBranches', $data);
		if($id){
		    $data["status"] = "success";
		    $data["message"] = 'Пользователь успешно созданId=' . $id;
		} else {
			$data["status"] = "error";
			$data["message"] = 'Ошибка при обновлении пользователя'.$db->getLastError();
		}
		return $data;
		
	}
	
	public function getUsersListItems($Search) {
		require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
		$mysqli = database::getInstance();
        $db = $mysqli->getConnection();
        
		$cols = array ("u.Id id", "CONCAT(u.LastName, ' ', u.FirstName) text");
		$db->where('u.AccId', $_SESSION['AccId']);
		$db->where('u.Inactive', "0");
		$db->where("(u.FirstName like ? or u.LastName like ?)", array('%'.$Search.'%','%'.$Search.'%'));
		//$db->join("LegalToContact as lc", "l.AccId = lc.AccId and l.Id = lc.LegalId and lc.ContactId = ".$ContacId, "LEFT");
		//$db->where('c.Id', $ContactId, '!=');
		$db->orderBy('u.LastName', 'asc');
		
		$json = $db->JsonBuilder()->get("Users u", null, $cols);
		$db->disconnect();
		
		header('Content-Type: application/json; charset=utf-8');
		return $json;
	}

	
}
?>