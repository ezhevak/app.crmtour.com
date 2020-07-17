<?php

class Controller_Users extends Controller
{
	function __construct()
	{
		$this->model = new Model_Users();
		$this->view = new View();
	}
	
	function action_settings() {
		session_start(); 
		$_SESSION["toggleMenu"] = $_POST["toggleMenu"];
		echo "setting set";
	}
	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('users/users_view.php', 'template_view.php', $data, ["datatables","confirm"], ["users/users_index"]);
	}

	function action_getlist(){
		$data = $this->model->getListJson();
		
		echo $data;
		
	}
	
	function action_delete() {
		$data = $this->model->deleteAjax($_GET["Id"]);
		echo $data;
	}

	function action_save(){
		
		
		$array = [
		"Id" => $_POST["Id"],
		"Login" => $_POST['Login'],
		"Role" => $_POST['Role'],
		"LastName" => $_POST['LastName'],
		"FirstName" => $_POST['FirstName'],
		"Phone" => $_POST['Phone'],
		"Email" => $_POST['Email'],
		"Lang" => $_POST['Lang'],
		"Commission" => $_POST["Commission"],
		"Inactive" => $_POST["Inactive"],
		//"Signature" => $_POST["Signature"],
		"BranchId" => $_POST["BranchId"],
		"TaskColor" => $_POST["TaskColor"],
		"TelegramChatId" => $_POST["TelegramChatId"],
		"TelegramChatIdOld" => $_POST["TelegramChatIdOld"]
		];

		if (isset($_POST['pwd']) && $_POST['pwd'] != "") {
			$array["pwd"] = $_POST['pwd'];
		}

		$data = $this->model->add($array);

		session_start();
		$_SESSION["APP_STATUS"] = $data["status"];
		$_SESSION['APP_MESSAGE'] = $data["message"];

		if ($data["status"] == "success") {
			
			//Отправляем уведомление в телеграм о том что чат успешно подключен
			if($array["TelegramChatIdOld"] != $array["TelegramChatId"]){
				try {
				    appsendtelegram($array["TelegramChatId"],"Поздравляем! Телеграм успешно подключен!");
				} catch (Exception $e) {
				    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
				}
			}
			
			$delUserBranches = $this->model->delUserBranches($array["Id"]);
			if($delUserBranches["status"]=="success"){
				foreach ($_POST['Branches'] as $selectedBranch) {
					$addUserBranches = $this->model->addUserBranches($array["Id"],$selectedBranch);
				}
			}
			
			
		
			//отправляем письмо на email нового пользователя
			if($_POST["Id"]=="" && $_POST['Email'] !=="" && $_POST['FirstName']!==""){
				appsendmail($_POST["Email"],'Поздравляем с успешной регистрацией в системе CRM Tour',"
						<p>Добрый день, уважаемый <strong>".$_POST["FirstName"]."</strong></p>
						
						<p>Вступайте в сообщество 'CRM Tour' в Viber: <a href=\"https://invite.viber.com/?g2=AQAopZ4zN1zpiklD%2F6F5zg7IAmkmD0vdHVKs87PRSPK9GyTh1%2B2%2FCGcq91x2VB9D\" target=\"_blank\">CRM Tour в Viber</a></li></p>
						
						<p>Для облегчения Вашего знакомства с системой, мы записали несколько стартовых роликов, которые помогут Вам быстрее начать работать с системой:</p>
						
						<ul>
							<li>Работа с запросами <a href=\"https://youtu.be/iahcWEkWiZk\" target=\"_blank\">https://youtu.be/iahcWEkWiZk</a></li>
							<li>Работа с клиентами <a href=\"https://youtu.be/MvbpCx7tpzY\" target=\"_blank\">https://youtu.be/MvbpCx7tpzY</a></li>
							<li>Работа со сделками и платежами <a href=\"https://youtu.be/NGr5pAbEUuo\" target=\"_blank\">https://youtu.be/NGr5pAbEUuo</a></li>
							<li>Работа с главной страницей <a href=\"https://youtu.be/SOMhTDbqvsc\" target=\"_blank\">https://youtu.be/SOMhTDbqvsc</a></li>
							<li>Работа с шаблонами <a href=\"https://youtu.be/CVXQ9IDhdVg\" target=\"_blank\">https://youtu.be/CVXQ9IDhdVg</a></li>
							<li>Работа с календарём <a href=\"https://youtu.be/yPTMIGorvzQ\" target=\"_blank\">https://youtu.be/yPTMIGorvzQ</a></li>
							<li>Выплаты менеджерам <a href=\"https://youtu.be/owyzIff0yY8\" target=\"_blank\">https://youtu.be/owyzIff0yY8</a></li>
						</ul>
						
						<p>Процесс продаж в системе проходит по следующей схеме:</p>
						
						<ol>
							<li>Создается запрос от клиента в разделе разделе &quot;Запросы&quot;. (Так же запрос можно создать напрямую из карточки клиента, если он уже есть в базе).</li>
							<li>После того как запрос переводится в статус &quot;Обработан/Потерян&quot; и в базе создаётся клиент с указанными в п1 данными, такими как: ФИО, телефон/Email, обработанный/потерянный, запрос связывается с клиентом. Запрос навсегда остаётся в системе и, если клиент обращается повторно, Вы можете просмотреть старые его запросы и комментарии.</li>
							<li>Дальше в карточке клиента Вы создаёте сделку. Указываете в ней всю необходимую Вам информацию, включая рейсы вылетов/прилётов, выбираете/создаете участников поездки.&nbsp;</li>
							<li>После создания сделки её можно распечатать. В системе есть готовые агентские договора с операторами и клиентами .&nbsp; Вы можете создавать свои договора или любые другие шаблоны в неограниченном количестве.&nbsp;</li>
						</ol>
						
						<p>В целом это весь процесс.&nbsp;<br />
						Если у Вас будут любые вопросы или пожелания, ниже мои контакты, я с радостью отвечу на каждый запрос.</p>
						
						<p>С уважением, Евгений Жевак<br />
						site: <a href=\"https://crmtour.com/\" target=\"_blank\">https://crmtour.com/</a><br />
						phone:+38(067)505-8615<br />
						skype:zhevak</p>");
				
			}
			header('Location: /users');
			
		} else {
			$this->action_add($_POST["Id"]);//header('Location: /leads/add?Id='.$_POST["Id"]);
		}
	}

	function action_add($UserId){
		//echo "ctrl add";
		if (isset($UserId))
			$Id = $UserId;
		else
			$Id = $_GET["Id"];

		$data = $this->model->get_row($Id);

		$this->view->generate('users/add_users.php', 'template_view.php', $data, ["inputmask","validate","jqgrid","colorpicker","select2"], ["users/edit","account/man_sum"]);
	}

	function action_login() {
		
		
		
		
		if (isset($_POST["user"]) && isset($_POST["pass"]) && isValidCaptcha($_POST["recaptcha_response"])) {
			session_start();
			
			$data = $this->model->login($_POST["user"], $_POST["pass"]);
			
			if($data["status"]=="success"){
				$_SESSION["USER_NAME"] = $_POST["user"];
				echo json_encode($data);
			//	header("Location: /");
			} else {
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($data);
			}
			
				
			
			
		//	if ($this->model->login($_POST["user"], $_POST["pass"])) {
		//   		$_SESSION["USER_NAME"] = $_POST["user"];
		//		header("Location: /");
		//	} else {
		//		$_SESSION["USER_NAME"] = "";
		//		$this->view->generate('', 'login.php', $data);
		//	}
		} else {
			//echo "1";
			
        	//$data["status"] = "error";
        	//$data["message"] = "Вы не указали логин или пароль!";
			
			//header('Content-Type: application/json; charset=utf-8');
			//echo json_encode(array("status" => "error",
			//					   "message"=> "Вы не указали логин или пароль!"));
			
			$this->view->generate('', 'login.php', $data);
		}
	}
	

	function action_logout() {
		session_start();
		$_SESSION["USER_NAME"] = "";
		//$_SESSION['DEVMODE'] = 0;
		$this->model->logout();
		header('Location: /');
	}


	function action_register() {
		
		$array = [
			"AccountName" => str_replace("\"","'",$_POST["AccountName"]),
			"LastName" => $_POST["LastName"],
			"FirstName" => $_POST["FirstName"],
			"MiddleName" => $_POST["MiddleName"],
			"Phone" => $_POST["Phone"],
			"Login" => $_POST["Login"],
			"Password" => $_POST["Password"],
			"Email" => $_POST["Email"]//,
			//"ReffererId" => $_POST["ReffererId"]
		];
		
		if(isValidCaptcha($_POST["recaptcha_response"])){
			$data = $this->model->register($array);
	
			if ($data["status"] == "success") {
				
				appsendmail('info@crmtour.com','Новая организация',"Зарегистрировано нового пользователя:<br>
				Организация: ".$_POST["AccountName"]."<br>
				Фамилия: ".$_POST["LastName"]."<br>
				Имя: ".$_POST["FirstName"]."<br>
				Отчество: ".$_POST["MiddleName"]."<br>
				Телефон: ".$_POST["Phone"]."<br>
				Login: ".$_POST["Login"]."<br>
				Email: ".$_POST["Email"]);
				
				appsendmail($_POST["Email"],'Поздравляем с успешной регистрацией в системе CRM Tour',"
						<p>Добрый день, уважаемый <strong>".$_POST["FirstName"]."</strong></p>
						
						<p>Для облегчения Вашего знакомства с системой, мы записали несколько стартовых роликов, которые помогут Вам быстрее начать работать с системой:</p>
						
						<ul>
							<li>Работа с запросами <a href=\"https://youtu.be/iahcWEkWiZk\" target=\"_blank\">https://youtu.be/iahcWEkWiZk</a></li>
							<li>Работа с клиентами <a href=\"https://youtu.be/MvbpCx7tpzY\" target=\"_blank\">https://youtu.be/MvbpCx7tpzY</a></li>
							<li>Работа со сделками и платежами <a href=\"https://youtu.be/NGr5pAbEUuo\" target=\"_blank\">https://youtu.be/NGr5pAbEUuo</a></li>
							<li>Работа с главной страницей <a href=\"https://youtu.be/SOMhTDbqvsc\" target=\"_blank\">https://youtu.be/SOMhTDbqvsc</a></li>
							<li>Работа с шаблонами <a href=\"https://youtu.be/CVXQ9IDhdVg\" target=\"_blank\">https://youtu.be/CVXQ9IDhdVg</a></li>
							<li>Работа с календарём <a href=\"https://youtu.be/yPTMIGorvzQ\" target=\"_blank\">https://youtu.be/yPTMIGorvzQ</a></li>
							<li>Выплаты менеджерам <a href=\"https://youtu.be/owyzIff0yY8\" target=\"_blank\">https://youtu.be/owyzIff0yY8</a></li>
						</ul>
						
						<p>Процесс продаж в системе проходит по следующей схеме:</p>
						
						<ol>
							<li>Создается запрос от клиента в разделе разделе &quot;Запросы&quot;. (Так же запрос можно создать напрямую из карточки клиента, если он уже есть в базе).</li>
							<li>После того как запрос переводится в статус &quot;Обработан/Потерян&quot; и в базе создаётся клиент с указанными в п1 данными, такими как: ФИО, телефон/Email, обработанный/потерянный, запрос связывается с клиентом. Запрос навсегда остаётся в системе и, если клиент обращается повторно, Вы можете просмотреть старые его запросы и комментарии.</li>
							<li>Дальше в карточке клиента Вы создаёте сделку. Указываете в ней всю необходимую Вам информацию, включая рейсы вылетов/прилётов, выбираете/создаете участников поездки.&nbsp;</li>
							<li>После создания сделки её можно распечатать. В системе есть готовые агентские договора с операторами и клиентами .&nbsp; Вы можете создавать свои договора или любые другие шаблоны в неограниченном количестве.&nbsp;</li>
						</ol>
						
						<p>В целом это весь процесс.&nbsp;<br />
						Если у Вас будут любые вопросы или пожелания, ниже мои контакты, я с радостью отвечу на каждый запрос.</p>
						
						<p>С уважением, Евгений Жевак<br />
						site: <a href=\"https://crmtour.com/\" target=\"_blank\">https://crmtour.com/</a><br />
						phone:+38(067)505-8615<br />
						skype:zhevak</p>");
			}
			
			echo json_encode($data);
		}
	}

	function action_remindpass() {
		$token_data = $this->model->createToken($_POST["remind_login"]);
		//$token_data = $this->model->createToken("zhevak");
		if ($token_data["token"] != "") {
			require_once 'vendor/phpmailer/PHPMailerAutoload.php';

			$mail = new PHPMailer;

			$mail->isSMTP();
			$mail->Host = 'mail.adm.tools';
			$mail->SMTPAuth = true;
			$mail->Username = 'info@crmtour.com';
			$mail->Password = 'o7yyZ50dVTM1';
			$mail->Port = 25;
			$mail->CharSet = 'UTF-8';

			$mail->setFrom('info@crmtour.com', 'CRM Tour');
			$mail->addAddress($token_data["email"]);

			$mail->isHTML(true);

			$mail->Subject = 'Восстановление пароля';
			$mail->Body    = 'Для восстановления пароля, необходимо перейти по ссылке:<br> https://app.crmtour.com/users/newpass?token='.$token_data["token"]."&user_name=".$_POST["remind_login"];

			unset($token_data);

			if(!$mail->send()) {
				header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
		}
	}
	
	function action_newpass() {
		include_once 'application/views/users/new_pass.php';
		$this->view->generate('', 'application/views/users/new_pass.php', array());
	}
	
	function action_changepassword() {
		$this->model->changepassword($_POST["password"],$_POST["user"],$_POST["token"]);
		header('Location: /');
		//$this->model->changepassword($_GET["password"],$_GET["user"],$_GET["token"]);
		//echo "SDSD";
	}
	
	//ajax данные
	function action_ajaxGetUserData(){
		$Id = $_POST["Id"];
		$data = $this->model->get_row($Id);
		
		echo json_encode($data);
	}
	
	function action_getUsersListItems(){
		$data = $this->model->getUsersListItems($_GET['term']);
		echo $data;
	}
	

	

}