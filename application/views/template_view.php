<!DOCTYPE html>
<html lang="ru">
<head>
  <title>CRM Tour</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    
    <!--Отключаем кеш страниц-->
  <meta http-equiv='cache-control' content='public'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>
  <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
  <link href="/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
  
  <link href="/vendor/pnotify/pnotify.custom.min.css" media="all" rel="stylesheet" type="text/css"/>
  
  <?php
	foreach ($used_libs as $lib) {
		if ($lib == "jqgrid")
			echo "<link rel=\"stylesheet\" href=\"/vendor/jqgrid/css/ui.jqgrid.min.css\">\n";
		if ($lib == "bootstrap-select")
			echo "<link rel=\"stylesheet\" href=\"/vendor/bootstrap-select/bootstrap-select.min.css\">\n";
		if ($lib == "daterangepicker")
			echo "<link rel=\"stylesheet\" href=\"/vendor/daterangepicker/daterangepicker.css\">\n";
		if ($lib == "datepicker")
			echo "<link rel=\"stylesheet\" href=\"/vendor/datepicker/css/bootstrap-datepicker.min.css\">\n";
		if ($lib == "datetimepicker")
			echo "<link rel=\"stylesheet\" href=\"/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css\">\n";
		if ($lib == "chart")
			echo "<link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css\">\n";
		if ($lib == "switch")
			echo "<link rel=\"stylesheet\" href=\"/vendor/switch/bootstrap-switch.min.css\">\n";
		if ($lib == "select2") {
			echo "<link rel=\"stylesheet\" href=\"/vendor/select2/css/select2.min.css\">\n";
			echo "<link rel=\"stylesheet\" href=\"/vendor/select2/css/select2-bootstrap.css\">\n";
		}
		if ($lib == "calendar") {
			echo "<link href='/vendor/fullcalendar-3.2/fullcalendar.min.css' rel='stylesheet' />\n";
			echo "<link href='/vendor/fullcalendar-3.2/fullcalendar.print.min.css' rel='stylesheet' media='print' />\n";
		}
		if ($lib == "datatables") {
			echo "<link href='/vendor/datatables/datatables.min.css' rel='stylesheet' />\n";
		}
		if ($lib == "icheck") {
    		echo "<link href='/vendor/iCheck/skins/flat/green.css' rel='stylesheet' />\n";
		}
		if ($lib == "x-editable") {
    		echo "<link href='/vendor/x-editable/bootstrap-editable.css' rel='stylesheet' />\n";
		}
		if ($lib == "colorpicker") {
    		echo "<link href='/vendor/bootstrap-colorpicker/bootstrap-colorpicker.css' rel='stylesheet' />\n";
		}
		if ($lib == "confirm") {
    		echo "<link href='/vendor/jquery-confirm/jquery-confirm.min.css' rel='stylesheet' />\n";
		}
		if ($lib == "dropzone") {
    		echo "<link href='/vendor/dropzone/min/dropzone.min.css' rel='stylesheet' />\n";
    		echo "<link href='/vendor/dropzone/min/basic.min.css' rel='stylesheet' />\n";
		}
		
		
	}
  ?>

	<!--link rel="stylesheet" href="/css/styles.css"-->
	<link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
    <link href="/vendor/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="/css/custom.min.css?version=165" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css?version=165">
    
    <style>
		#view_div {
		    	zoom: 96%;
		}
		body {
			  font-family: 'Roboto', sans-serif;
			  overflow-x: hidden;
		}
		.h1 .small, .h1 small, .h2 .small, .h2 small, .h3 .small, .h3 small, .h4 .small, .h4 small, .h5 .small, .h5 small, .h6 .small, .h6 small, h1 .small, h1 small, h2 .small, h2 small, h3 .small, h3 small, h4 .small, h4 small, h5 .small, h5 small, h6 .small, h6 small {
			    color: inherit;
		}
		
		.ui-jqgrid > .ui-jqgrid-view a.btn {
		    height: 24px;
		}
		.ui-jqgrid > .ui-jqgrid-view button.btn {
		    height: 24px;
		}
		.ui-jqgrid tr.jqgroup, .ui-jqgrid tr.jqgrow {
		    background-color: lightgoldenrodyellow;
		}
		.jqgrow > td > a {
			color: black;
		}
		/*.nav > li > a {
		    padding: 5px 15px 5px;
		}*/
		
		/*.btn {
		    border-radius: 0px;
		}*/
		.btn, .buttons, .modal-footer .btn + .btn, button {
		    margin-bottom: 0px;
		    margin-right: 0px;
		}
		td span {
		    line-height: 20px;
		}
		.alert {
			border-radius: 0px;
		}
		.datepicker td, .datepicker th {
		    -webkit-border-radius: 0px;
		    -moz-border-radius: 0px;
		    border-radius: 0px;
		}
		.input-group {
		    margin-bottom: 0px;
		}
		/*.select2-container .select2-search--inline {
		    width: 100%;
		}*/
		.select2-search__field {
			width: inherit !important;
		}
		
		.eventInfoContainer {
			width: 150px;
		    position: absolute;
		    margin-top: 40px;
		    font-size: 14px;
		}
		.eventInfo {
		    padding-left: 4px;
		    font-size:14px;
		    margin-bottom: 2px;
		}
		
		.eventInfoDone {
			background-color: #1ABB9C;
		}
		.eventInfoOld {
			background-color: #d04a3e;
		}
		.bootbox>.modal-dialog {
			width: 200px !important;
			margin: 0 auto !important;
		}
		.bb-alternate-modal {
			width: 400px;
		}
		
    </style>
    <!--Удалил 20180316 по причине добавления datatable.net-responsive-->
    <!--link rel="stylesheet" href="/css/mobile_grid.css"-->
</head>
<body class="nav-sm footer_fixed_disabled">
	

<?php
	if($GLOBALS['gaCode'] != "") {
		include_once("analyticstracking.php");
	}
?>
<input type="hidden" id="GlobalUserId" name="GlobalUserId" value="<?php echo $_SESSION['UserId'];?>">
<input type="hidden" id="GlobalAccId" name="GlobalAccId" value="<?php echo $_SESSION['AccId'];?>">
<input type="hidden" id="GlobalUserRole" name="GlobalUserRole" value="<?php echo $_SESSION['UserRole'];?>">
<input type="hidden" id="GlobalShowAddress" name="GlobalShowAddress" value="<?php echo GetOption("Show_Address",$_SESSION['AccId']);?>">
<input type="hidden" id="GlobalAccBalance" name="GlobalAccBalance" value="<?php echo $_SESSION['AccBalance'];?>">
<input type="hidden" id="GlobalBranchId" name="GlobalBranchId" value="<?php echo $_SESSION['BranchId'];?>">
	
<div id="loader"></div>

<div class="container body">
    <div class="main_container">
    	<div id="sidebar_pane" class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><i class="fa fa-home"></i> <span>CRM Tour</span></a>
            </div>

            <div class="clearfix"></div>

            <!--br-->
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" >
              <div class="menu_section">
                <h3>Меню</h3>
                <ul class="nav side-menu">
                  <!--li><a href="/"><i class="fa fa-home"></i> Главная <span class="fa fa-chevron"></span></a></li-->
                  	<li><a href="/leads"><i class="fa fa-binoculars"></i> Запросы</a></li>
                  	<li><a href="/contacts"><i class="fa fa-group"></i> Физ. лица</a></li>
			        <li><a href="/legal"><i class="fa fa-bank"></i> Юр. лица</a></li>
			        <li><a href="/deals"><i class="fa fa-money"></i> Сделки</a></li>
			        <li><a href="/tasks"><i class="fa fa-calendar"></i> Календарь</a></li>
			        
			        <li><a><i class="fa fa-globe"></i> Справочники</a>
	                    <ul class="nav child_menu">
	                      <li><a href="/hotels">Отели</a></li>
	                      <li><a href="/embassy">Посольства</a></li>
	                      <li><a href="/regions">Регионы</a></li>
	                      <li><a href="/operators">Операторы</a></li>
	                      <li><a href="/airport">Аэропорты</a></li>
	                      
	                	  <?php if ($GLOBALS['UserRole'] == "admin" || $GLOBALS['UserRole'] == "owner") echo "<li><a href=\"/dictionary\">Списки значений</a></li>";?>
	                    </ul>
	                </li>
	                
	                <li><a href="/notes"><i class="fa fa-sticky-note-o"></i> Заметки</a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
        
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
				<div class="nav toggle">
	            	<a id="menu_toggle"><i class="fa fa-bars"></i></a>
	            </div>
	        
	        <div class="navbar-form-alert">
				<div class="alert alert-success" id="app-alert" style="margin-left: 50px;top:3px; display: none">
					<button type="button" class="close" onclick="$('#app-alert').hide()">x</button>
					<strong id="alertmsgbold">Success! </strong>
					<span id="alertmsg" style="padding-right: 5px;">Product</span>
				</div>
			</div>
			  
				
			  
			  
              <ul class="nav navbar-nav navbar-right">
              	<!--Администрирвоание-->
 				<li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-cog"> Настройки</i>
                  </a>
                	<ul id="menu2" class="dropdown-menu list-unstyled" role="menu">
                	<?php if ($_SESSION['UserId'] == "1") echo "<li><a href=\"/admin\"><i class=\"fa fa-cog pull-left\"></i>Администрирование</a></li>";?>
                	<?php if ($_SESSION['UserId'] == "1") echo "<li><a href=\"/srvtasks\"><i class=\"fa fa-cog pull-left\"></i>Задачи сервера</a></li>";?>
                    <?php if ($_SESSION['UserRole'] == "admin" || $GLOBALS['UserRole'] == "owner") echo "<li><a href=\"/account\"><i class=\"fa fa-home pull-left\"></i>Моя организация</a></li>";?>
                    
                	<?php echo "<li><a href=\"/users/add?Id=".$_SESSION['UserId']."\"><i class=\"fa fa-user pull-left\"></i>".$_SESSION['UserFirstName']." ".$_SESSION['UserLastName']."</a></li>"; ?>
                	<?php if ($_SESSION['UserRole'] == "admin" || $GLOBALS['UserRole'] == "owner"){
                    	echo "<li><a href=\"/users\"><i class=\"fa fa-group pull-left\"></i>Пользователи</a></li>";
                    }
                    ?>
                    
                    
		            <li><a href="/templates"><i class="fa fa-print pull-left"></i>Шаблоны</a></li>
		            <!--?php if ($_SESSION['UserRole'] == "admin" || $GLOBALS['UserRole'] == "owner") echo "<li><a href=\"/reports\"><i class=\"fa fa-dashboard pull-left\"></i>Отчёты</a></li>";?-->
                    <li><a href="/users/logout"><i class="fa fa-sign-out pull-right"></i> Выйти</a></li>
                    
                	</ul>
                 </li>
                <!--Администрирвоание-->
                <!--li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="/css/no_photo.jpeg" alt=""><?php echo  $_SESSION['UserFirstName']." ".$_SESSION['UserLastName']?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
					<?php if ($_SESSION['UserRole'] == "admin"){
                		echo "<li><a href=\"/users\"><i class=\"fa fa-group pull-left\"></i>Пользователи</a></li>";
                    } else {
                		echo "<li><a href=\"/users/add?Id=".$_SESSION['UserId']."\"><i class=\"fa fa-user pull-left\"></i> Мои настройки</a></li>";
                    }
                    ?>
                    <li><a href="/users/logout"><i class="fa fa-sign-out pull-right"></i> Выйти</a></li>
                  </ul>
                </li-->
				
				
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span id="notifyCount" class="badge bg-green"></span>
                  </a>
                  <ul id="msgList" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <div class="text-center">
                        <a href="/tasks">
                          <strong>Список всех задач</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                
                <li>
                  <a href='https://t.me/crmtour' target="_blank"><i class="glyphicon glyphicon-send"></i> CRM Tour</a>
                </li>
                
                
              </ul>
              
			 
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <?php include 'application/views/'.$content_view; ?>
          </div>
          
        </div>
        <!-- /page content -->
        
        <!-- footer content -->
        <footer>
          <!--div class="pull-left">
            <a href='https://t.me/crmtour' target="_blank">CRM Tour <i class="glyphicon glyphicon-send" aria-hidden="true"></a></i>
          </div-->
          <div class="pull-right">
        	<a href="https://crmtour.com">CRM-Tour, 2016</a>
          </div>
          <div class="clearfix"></div>
          
        </footer>
    </div>
</div>

<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendor/bootbox.min.js"></script>
<!--script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script-->

<script src="/vendor/fastclick/fastclick.js" type="text/javascript"></script>

<?php
	foreach ($used_libs as $lib) {
		if ($lib == "jqgrid") {
			echo "<script src=\"/vendor/jqgrid/i18n/grid.locale-ru.min.js\"></script>\n";
			echo "<script src=\"/vendor/jqgrid/jquery.jqgrid.min.js\"></script>\n";
		}
		if ($lib == "bootstrap-select") {
			echo "<script src=\"/vendor/bootstrap-select/bootstrap-select.min.js\"></script>\n";
			echo "<script src=\"/vendor/bootstrap-select/defaults-ru_RU.min.js\"></script>\n";
		}
		if($lib == "moment"){
			echo "<script src=\"/vendor/moment/moment.min.js\"></script>\n";
			echo "<script src=\"/vendor/moment/moment-with-locales.min.js\"></script>\n";
		}
		if ($lib == "daterangepicker") {
			echo "<script src=\"/vendor/daterangepicker/moment.min.js\"></script>\n";
			echo "<script src=\"/vendor/daterangepicker/daterangepicker.js\"></script>\n";
		}
		if ($lib == "datepicker") {
			echo "<script src=\"/vendor/datepicker/js/bootstrap-datepicker.min.js\"></script>\n";
			echo "<script src=\"/vendor/datepicker/locales/bootstrap-datepicker.ru.min.js\"></script>\n";
		}
		if ($lib == "datetimepicker") {
			echo "<script src=\"/vendor/moment/moment-with-locales.min.js\"></script>\n";
			echo "<script src=\"/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js\"></script>\n";
		}
		if ($lib == "inputmask") {
			echo "<script src=\"/vendor/inputmask/jquery.inputmask.bundle.min.js\"></script>\n";
		}
		if ($lib == "chart") {
			echo "<script src=\"//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js\"></script>\n";
			echo "<script src=\"//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js\"></script>\n";
		}
		if ($lib == "cascadedropdown") {
			echo "<script src=\"/vendor/cascade-combo/dist/jquery.cascadingdropdown.min.js\"></script>\n";
		}
		if ($lib == "validate") {
			echo "<script src=\"/vendor/bootstrap-validator/validator.min.js\"></script>\n";
		}
		if ($lib == "bootbox") {
			echo "<script src=\"/vendor/bootbox.min.js\"></script>\n";
		}
		if ($lib == "switch") {
			echo "<script src=\"/vendor/switch/bootstrap-switch.min.js\"></script>\n";
		}
		if ($lib == "select2") {
			echo "<script src=\"/vendor/select2/js/select2.full.min.js\"></script>\n";
			echo "<script src=\"/vendor/select2/js/i18n/ru.js\"></script>\n";
		}
		if ($lib == "calendar") {
			echo "<script src='/vendor/moment/moment.min.js'></script>\n";
			echo "<script src='/vendor/fullcalendar-3.2/fullcalendar.min.js'></script>\n";
			echo "<script src='/vendor/fullcalendar-3.2/locale/ru.js'></script>\n";
		}
		if ($lib=="tinymce"){ 
			echo "<script src=\"/vendor/tinymce/tinymce.min.js\"></script>\n";
			echo "<script src=\"/vendor/tinymce/langs/tinymce_ru.js\"></script>\n";
		}
		if ($lib=="datatables"){ 
			echo "<script src='/vendor/moment/moment.min.js'></script>";
			echo "<script src='/vendor/datatables/datatables.min.js'></script>";
			echo "<script src='/vendor/datatables/sorting/datetime-moment.js'></script>";
			echo "<script src='/vendor/datatables/phoneNumber.js'></script>";
		}
		if ($lib == "icheck") {
			echo "<script src=\"/vendor/iCheck/icheck.min.js\"></script>\n";
		}
		if ($lib == "x-editable") {
			echo "<script src='/vendor/x-editable/bootstrap-editable.min.js'></script>";
		}
		if ($lib == "colorpicker") {
			echo "<script src='/vendor/bootstrap-colorpicker/bootstrap-colorpicker.js'></script>";
		}
		if ($lib == "confirm") {
			echo "<script src='/vendor/jquery-confirm/jquery-confirm.min.js'></script>";
		}
		if ($lib == "dropzone") {
			echo "<script src='/vendor/dropzone/min/dropzone.min.js'></script>";
		}
	}
?>

	<script src="/application/js/lib/main.js?version=299"></script>

<?php
	foreach ($used_js as $jsfile) {
		echo "<script src=\"/application/js/".$jsfile.".js?version=299\"></script>\n";
	}
?>

	<!-- NProgress -->
    <script src="/vendor/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/vendor/custom.js"></script>
    
	<script>
		$(document).ready(function() {
		//	console.log("click");
			$(".nav.side-menu li.active a").click();
		});
	</script>
    
	<!--script type="text/javascript" src="/vendor/pnotify/pnotify.custom.min.js"></script-->
	
	
</body>
</html>