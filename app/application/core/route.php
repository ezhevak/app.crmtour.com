<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{

	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';

		$toLoginPage = false;
		//$toPayPage = false;

		session_start();
		//if (isset($_GET["DEVMODE"]))
			//$_SESSION['DEVMODE'] = $_GET["DEVMODE"];
		
		$GLOBALS['AccId'] = $_SESSION['AccId'];
		$GLOBALS['AccName'] = $_SESSION['AccName'];

		$GLOBALS['UserId'] = $_SESSION['UserId'];
		$GLOBALS['UserName'] = $_SESSION['UserName'];

		$GLOBALS['UserLastName'] = $_SESSION['UserLastName'];
		$GLOBALS['UserFirstName'] = $_SESSION['UserFirstName'];
		$GLOBALS['UserRole'] = $_SESSION['UserRole'];

		if (!isset($_SESSION["USER_NAME"]) || $_SESSION["USER_NAME"] == "") { 
			if (isset($_POST["user"]) && isset($_POST["password"]) && $_POST["user"] != "" && $_POST["password"] != "") {
				//$controller_name = 'Main';
				//$action_name = 'index';
			} else {
				$toLoginPage = true;
				$controller_name = "users";
				$action_name = "login";
				if (strpos($_SERVER['REQUEST_URI'], "register") > -1) {
					$controller_name = "users";
					$action_name = "register";
				} else if (strpos($_SERVER['REQUEST_URI'], "remindpass") > -1) {
					$controller_name = "users";
					$action_name = "remindpass";
				} else if (isset($_GET["token"]) && $_GET["token"] != "" && strpos($_SERVER['REQUEST_URI'], "newpass") > -1) {
					$controller_name = "users";
					$action_name = "newpass";
					//echo "REENTERPASS";
					include_once "application/models/model_users.php";
					
					$user_model = new Model_Users();
					$repassdata = $user_model->getUserByToken($_GET["token"], $_GET["user_name"]);
					$_SESSION["WRONG_TOKEN"] = count($repassdata);
					//$GLOBALS['AccId'] = $repassdata["AccId"];
					//$_SESSION["USER_NAME"] = $repassdata["Login"];
					//print_r($repassdata);
					//print_r($user_model->get_row($repassdata["Id"]));
				} else if (isset($_GET["token"]) && $_GET["token"] != "" && strpos($_SERVER['REQUEST_URI'], "changepassword") > -1) {
					$controller_name = "users";
					$action_name = "changepassword";
				}
			}
		}
		

		// получаем имя контроллера
		if (!$toLoginPage) {
			$routes = explode('/', $_SERVER['REQUEST_URI']);
			
			if ( !empty($routes[1]) )
			{
				
				$controller_name = $routes[1];
				//echo "1controller_name:".$controller_name;
				if (strpos($controller_name, "?") > -1) {
					$controller_name = substr($controller_name, 0, strpos($controller_name, "?"));
					//echo "2controller_name=".$controller_name;
					if ($controller_name == "" || $controller_name == "/")
						$controller_name = "Main";
				}
			
			}
			
			// получаем имя экшена
			if ( !empty($routes[2]) )
			{
				$action_name = $routes[2];
				if (strpos($action_name, "?") > -1) {
					$action_name = substr($action_name, 0, strpos($action_name, "?"));
					if ($action_name == "")
						$action_name = "index";
				}
				//echo "ctrl_".$controller_name."act_".$action_name;
			}
			
		//	if ($controller_name != "users" && $action_name != "logout" && $_SESSION['UserName'] != "demo") {
		//		include_once "application/models/model_account.php";
		//		$account_model = new Model_Account();
		//		$AccData = $account_model->get_balance($_SESSION['AccId']);
		//		$_SESSION['AccBalance'] = $AccData[0]["Balance"];
		//		
		//		$account_data = $account_model->get_row($_SESSION['AccId']);
		//		$_SESSION['AccCreated'] = $account_data[0]["Created"];
		//		$_SESSION['AccBillingStart'] = $account_data[0]["BillingStart"];
		//		
		//		//Если баланс компании отрицательный и после даты последнего платежа прошло >3 дней блокируем доступ.
		//		//$toPayPage = ($_SESSION['AccBalance'] < 0 && $AccData[0]["overdueDays"] > 3);
		//		
		//		//if ($toPayPage) {
		//		//	// запрещено на другие контроллеры шагать
		//		//	$controller_name = "account";
		//		//	$_SESSION['ACTIVE_TAB'] = "payments";
		//		//}
		//	}
		}

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		/*
		echo "Model: $model_name <br>";
		echo "Controller: $controller_name <br>";
		echo "Action: $action_name <br>";
		*/

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include_once "application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include_once "application/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404($controller_path);
		}

		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;

		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}

	}

	function ErrorPage404($info)
	{
		$host = 'https://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404.php');
		echo $info;
		
		//$fp = fopen ("/home/zhevak/crmtour.com/app/log/404".date("Ymd").'.txt', "a");
		
		//fwrite($fp, print_r(date("Y-m-d H:i:s").$info."\n", true));

    }

    //function LoginPage()
	//{
    //    $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
	//	header('Location:'.$host.'users/login');
		//echo 'Location:'.$host.'users/login';
    //}
}
?>