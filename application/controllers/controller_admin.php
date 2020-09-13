<?php

class Controller_Admin extends Controller
{

	function __construct()
	{
		$this->model = new Model_Admin();
		$this->view = new View();
	}

	function action_index(){
		
		if($_SESSION["UserId"]==1){
			$this->view->generate('admin/admin_view.php', 'template_view.php', "", ["datatables"], ["admin/admin_index"]);
		} else {
			echo "<a href=\"/\"><img src=\"..\public\spy.png\" alt=\"Мне кажется или ты шпион?\"></a>";
		}
	}

	function action_getUserOnline() {
		if($_SESSION["UserId"] == 1){
			$data = $this->model->getUserOnline();
			echo $data;
		} else {
			echo "<a href=\"/\"><img src=\"..\public\spy.png\" alt=\"Мне кажется что ты шпион?\"></a>";
		}
	}
}
?>