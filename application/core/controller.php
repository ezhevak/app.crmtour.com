<?php

class Controller {
	
	public $model;
	public $view;
	public $print_data;
	
	function __construct()
	{
		$this->view = new View();
	}
	
	// действие (action), вызываемое по умолчанию
	function action_index()
	{
		// todo	
	}
	
	function action_export($modelName) {
		require('application/models/model_srvtasks.php');
		$srvTask = new Model_srvtasks();
		$adminData = getAdminUserEmail();//$srvTask->getAdminUserEmail();
		$emailTo = $adminData[0]["Email"];
		$res = "";
		if ($emailTo == "") {
			$res = "У Вашего администратора не указан email";
		} else {
			
			$params = array(
				"TaskType" => "ExportExcel", 
				"Params" => array(
					"AccId" => $_SESSION["AccId"],
					"Model" => $modelName,
					"Email" => $adminData[0]["Email"],//$srvTask-> getAdminUserEmail(),
					"RequestUserId" => $_SESSION["UserId"]
					));
					
			$array = [
						"AccId" => $_SESSION["AccId"],
						"Id" => "",
						"Name"	=> "ExportExcel",
						"Comments"	=> "ExportExcel Task",
						"Params"	=> json_encode($params),
						"CreatorId"	=> $_SESSION['UserId']
					];
				
				$res = $srvTask->add($array);
				//echo json_encode($res);
				
				if ($res["status"] == "success") {
					$phpExec = exec("php ".$GLOBALS['RootDir']."application/cron/srvtask_runner.php ".$res["TaskId"]." > /dev/null 2>/dev/null &");
				}
				unset($srvTask);
			
			$res = "Отправлено на email администратора '".$emailTo."'";
		}
		echo $res;
	}
	
	function action_print($data_ext = null) {
		$Id = $_GET["Id"];
		$TemplateId=$_GET["TemplateId"];
		$debug = 0;
		if (isset($_GET["debug"])){
			$debug = $_GET["debug"];
		}
		$data = null;
		if ($data_ext == null){
			$data = $this->model->get_row($Id);
		} else {
			$data = $data_ext;
		}
		$account_data = $this->model->getAccountInfo();
		if ($debug) {
			echo "<br>DATA Module:<br>";
			print_r($data);
			echo "<br>DATA PRINT:<br>";
			print_r($this->print_data);
			print_r($account_data);
		}
		if ( count($data) > 0 && $TemplateId != "") {
			require('application/models/model_templates.php');
			$templateModel = new Model_templates();
			$template = $templateModel->getModuleTemplate($TemplateId);
			//$template = $templateModel->getModuleTemplate($this->model->getModelClass(), $TemplateId);
			if ($debug) {
				echo "<br>DATA TEMPLATE:<br>";
				echo $template;
			}
			
			require('vendor/smarty-3.1.30/libs/Smarty.class.php');
			$smarty = new Smarty();
			if ($debug){
				$smarty->debugging = true;
			} else {
				$smarty->debugging = false;
			}
			$smarty->caching = false;
			$smarty->setTemplateDir('vendor/smarty-3.1.30/libs/templates');
			$smarty->setCompileDir('vendor/smarty-3.1.30/libs/templates_c');
			$smarty->setCacheDir('vendor/smarty-3.1.30/libs/cache');
			$smarty->setConfigDir('vendor/smarty-3.1.30/libs/configs');
			
			$smarty->assign('data', $data[0]);
			$smarty->assign('data_ext', $this->print_data);
			$smarty->assign('account', $account_data[0]);
			$templateToPrint = $smarty->fetch('string:'.$template);
			
			$templateToPrint = htmlspecialchars_decode($templateToPrint);
			$templateToPrint = htmlspecialchars_decode($templateToPrint);
			if ($debug) {
				echo "<br>".$templateToPrint."<br>";
				echo file_get_contents('css/pdf.css');
			}
			
			if (!$debug) {
				ob_clean();
				header('Content-type: application/pdf');
				header('Content-Disposition: inline; filename="' . $yourFileName . '"');
				header('Content-Transfer-Encoding: binary');
				header('Accept-Ranges: bytes');
				
				include("vendor/mpdf60/mpdf.php");
				$mpdf = new mPDF('utf-8', 'A4', '8', '', 20, 10, 7, 7, 10, 10);
				$mpdf->charset_in = 'utf8';
				$mpdf->allow_charset_conversion=true;
				
				$stylesheet = file_get_contents('css/pdf.css');
				
				$mpdf->WriteHTML($stylesheet, 1);
				
				$mpdf->list_indent_first_level = 0;
				
				/*$templateToPrint = "<table border='1'>
				<tr><td>Пример 1</td></tr>
				<tr><td>Пример 1</td></tr>
				</table>";*/
				$mpdf->WriteHTML("".$templateToPrint, 2);
				$mpdf->Output('mpdf.pdf', 'I');
				ob_end_flush();
			}
		} else {
			echo "Данные для записи не найдены в системе";
		}
	}
	/*private function htmlspecialchars_decode_array(&$variable) {
    foreach ($variable as &$value) {
        if (!is_array($value)) { $value = htmlspecialchars_decode($value); }
        else { $this->htmlspecialchars_decode_array($value); }
    }
}*/
}
?>