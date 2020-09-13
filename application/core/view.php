<?php

class View
{
	
	//public $template_view; // здесь можно указать общий вид по умолчанию.
	private $modelName;
	function __construct($modelName)
	{
		$this->modelName = $modelName;
	}
	/*
	$content_file - виды отображающие контент страниц;
	$template_file - общий для всех страниц шаблон;
	$data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
	*/
	function generate($content_view, $template_view, $data = null, $used_libs = null, $used_js = null){
		
		/*
		if(is_array($data)) {
			
			// преобразуем элементы массива в переменные
			extract($data);
		}
		*/
		$activeModelName = $this->modelName;
		/*
		динамически подключаем общий шаблон (вид),
		внутри которого будет встраиваться вид
		для отображения контента конкретной страницы.
		*/
		//if (isset($_SESSION['DEVMODE']) && $_SESSION['DEVMODE'] == 1) {
		//	$template_view = "template_view_dev.php";
		//}
		$url = $_SERVER['REQUEST_URI'];
		$url = explode('/', $url);
		$url_lastPart = array_pop($url);
		if (strpos($url_lastPart, "?") > 0) {
			$url_lastPart = substr($url_lastPart, 0, strpos($url_lastPart, "?"));
		}
		
		include_once 'application/views/'.$template_view;
	}
}
?>