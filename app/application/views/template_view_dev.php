<!DOCTYPE html>
<html lang="ru">
<head>
  <title>CRM Tour</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Отключаем кеш страниц-->
	  <meta http-equiv='cache-control' content='no-cache'>
	  <meta http-equiv='expires' content='0'>
	  <meta http-equiv='pragma' content='no-cache'>
  <!--кеш страницы-->
  
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--link rel="stylesheet" href="http://talkslab.github.io/metro-bootstrap/dist/css/metro-bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"-->
  <!--link rel="stylesheet" href="https://bootswatch.com/spacelab/bootstrap.min.css"-->
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/yeti/bootstrap.min.css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:500,300,800"-->
  <?php
	foreach ($used_libs as $lib) {
		if ($lib == "jqgrid")
			echo "<link rel=\"stylesheet\" href=\"/vendor/jqgrid/css/ui.jqgrid.min.css\">\n";
		if ($lib == "bootstrap-select")
			echo "<link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css\">\n";
		if ($lib == "daterangepicker")
			echo "<link rel=\"stylesheet\" href=\"/vendor/daterangepicker/daterangepicker.css\">\n";
		if ($lib == "datepicker")
			echo "<link rel=\"stylesheet\" href=\"/vendor/datepicker/css/bootstrap-datepicker.min.css\">\n";
		if ($lib == "datetimepicker")
			echo "<link rel=\"stylesheet\" href=\"/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css\">\n";
		if ($lib == "chart")
			echo "<link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css\">\n";
		if ($lib=="tinymce"){
			echo "<script src=\"//cdn.tinymce.com/4/tinymce.min.js\"></script>\n";
		}
	}
  ?>

	<link rel="stylesheet" href="/css/styles.css">
	<!--на сайте https://bootswatch.com/ можно выбрать тему-->
	<!--link rel="stylesheet" href="/css/bootstrap.min.css"-->
	<!--Cerulean-->
	<!--link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css"-->
	<!--Cosmo-->
	<!--link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css"-->
	<!--Flatly-->
	<!--link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css"-->
	<!--Lumen-->
	<!--link rel="stylesheet" href="https://bootswatch.com/lumen/bootstrap.min.css"-->

</head>
<body>
<?php include_once("analyticstracking.php") ?>

<input type="hidden" id="GlobalUserId" name="GlobalUserId" value="<?php echo $_SESSION['UserId'];?>">
<input type="hidden" id="GlobalUserRole" name="GlobalUserRole" value="<?php echo $_SESSION['UserRole'];?>">
	
	
<div id="loader"></div>
<nav class="navbar navbar-inverse crm_nav" <?php if (isset($_GET["frame_mode"]) && $_GET["frame_mode"] == "1") echo "style='display: none;'";?>>
<!--nav class="navbar navbar-default crm_nav"-->
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><b><i>CRM Tour</i></b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li <?php if ($url_lastPart == "leads") echo "class=\"active\"";?>><a href="/leads">Запросы</a></li>
        <li <?php if ($url_lastPart == "contacts") echo "class=\"active\"";?>><a href="/contacts">Клиенты</a></li>
        <li <?php if ($url_lastPart == "legal") echo "class=\"active\"";?>><a href="/legal">Юр. Лица</a></li>
        <li <?php if ($url_lastPart == "deals") echo "class=\"active\"";?>><a href="/deals">Сделки</a></li>
        <li <?php if ($url_lastPart == "hotels") echo "class=\"active\"";?>><a href="/hotels">Отели</a></li>
        <li <?php if ($url_lastPart == "embassy") echo "class=\"active\"";?>><a href="/embassy">Посольства</a></li>
        <li <?php if ($url_lastPart == "operators") echo "class=\"active\"";?>><a href="/operators">Операторы</a></li>
      </ul>
	  <div class="col-sm-1 col-md-1">
		  <div class="navbar-form">
			<div class="alert alert-success" id="app-alert">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<strong id="alertmsgbold">Success! </strong>
				<span id="alertmsg">Product</span>
			</div>
		  </div>
      </div>


      <!--Блок администрирование-->
      <ul class="nav navbar-nav navbar-right">
      	<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Настройки
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu">
	          <li class="menu-item dropdown-submenu">
	          	<a href="#">Справочники</a>
	          	<ul class="dropdown-menu">
	          		<li <?php if ($url_lastPart == "operators") echo "class=\"active\"";?>><a href="/operators">Операторы</a></li>
			        <li <?php if ($url_lastPart == "regions") echo "class=\"active\"";?>><a href="/regions">Регионы</a></li>
			        <li <?php if ($url_lastPart == "hotels") echo "class=\"active\"";?>><a href="/hotels">Отели</a></li>
			        <li <?php if ($url_lastPart == "embassy") echo "class=\"active\"";?>><a href="/embassy">Посольства</a></li>
			        <li <?php if ($url_lastPart == "dictionary") echo "class=\"active\"";?>><a href="/dictionary">Списки значений</a></li>
	          	</ul>
	          </li>
	          <?php if ($_SESSION['UserId'] == "1" || $_SESSION['UserId'] == "2") echo "<li><a href=\"/admin\">Администрирвание</a></li>";?>
	          <?php if ($_SESSION['UserRole'] == "admin") echo "<li><a href=\"/account\">Моя организация</a></li>"; ?>
	          <?php if ($_SESSION['UserRole'] == "admin") echo "<li><a href=\"/users\">Пользователи</a></li>"; ?>
	          <li><a href="/templates">Шаблоны</a></li>
	          <?php if ($_SESSION['UserRole'] == "admin") echo "<li><a href=\"/reports\">Отчёты</a></li>"; ?>
	        </ul>
		</li>
		<li><a href="/users/add?Id=<?php echo $_SESSION['UserId'];?>"><span class="fa fa-user"></span> <?php echo  $_SESSION['UserFirstName']." ".$_SESSION['UserLastName']?></a></li>
		<li><a href="/users/logout"><span class="glyphicon glyphicon-log-out"></span> Выйти</a></li>
        <!--li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li-->
      </ul>
    </div>
  </div>
</nav>




<?php include 'application/views/'.$content_view; ?>





<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php
foreach ($used_libs as $lib) {
	if ($lib == "jqgrid") {
		echo "<script src=\"/vendor/jqgrid/i18n/grid.locale-ru.min.js\"></script>\n";
		echo "<script src=\"/vendor/jqgrid/jquery.jqgrid.min.js\"></script>\n";
	}
	if ($lib == "bootstrap-select") {
		echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js\"></script>\n";
		echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/i18n/defaults-ru_RU.min.js\"></script>\n";
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
		echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.3/jquery.inputmask.bundle.min.js\"></script>\n";
	}
	if ($lib == "chart") {
		echo "<script src=\"//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js\"></script>\n";
		echo "<script src=\"//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js\"></script>\n";
	}
	if ($lib == "cascadedropdown") {
		echo "<script src=\"/vendor/cascade-combo/dist/jquery.cascadingdropdown.min.js\"></script>\n";
	}
	if ($lib == "validate") {
		echo "<script src=\"//1000hz.github.io/bootstrap-validator/dist/validator.min.js\"></script>\n";
	}
	if ($lib == "bootbox") {
		echo "<script src=\"/vendor/bootbox.min.js\"></script>\n";
	}
}
?>

<script>
	document.getElementById("loader").style.display = "none";
	function showLoader() {
		document.getElementById("loader").style.display = "block";
	}

	function hideLoader() {
		document.getElementById("loader").style.display = "none";
	}

	function appAlert(msg, type, boldmsg) {
		var el = $("#app-alert");
		el.removeClass();
		if (type == "error") {
			el.addClass("alert-danger alert");
		} else if (type == "warning") {
			el.addClass("alert-warning alert");
		} else if (type == "success") {
			el.addClass("alert-success alert");
		} else {
			el.addClass("alert-info alert");
		}
		el.find("#alertmsg").text(msg);
		if (typeof boldmsg !== 'undefined') {
			el.find("#alertmsgbold").text(boldmsg);
		}
		el.show();
		//el.fadeTo(2000, 500).slideUp(500, function(){
			//el.slideUp(500);
		//});
	}
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
		if (typeof on_load == 'function')
			on_load();
	});
</script>


<?php
foreach ($used_js as $jsfile) {
	echo "<script src=\"/application/js/".$jsfile.".js\"></script>\n";
}
?>

<?php
	session_start();
	if (isset($_SESSION["APP_STATUS"])) {
		echo "<script> appAlert(\"".$_SESSION["APP_MESSAGE"]."\",\"".$_SESSION["APP_STATUS"]."\");</script>";
	}
	unset($_SESSION['APP_STATUS']);
	unset($_SESSION['APP_MESSAGE']);
?>



</body>


<div class="container">
	<div class="row">
		<div class="col-md-12">
		<p>Уважаемы пользователи, если Вы обнаружили <strong>ошибку</strong> пожалуйста создайте задачу по ссылке <a href="http://178.150.16.80:3000/projects/crm-lite" target="_blank">crm-lite</a> <strong>login</strong>:crmtour <strong>pass</strong>:crmtour12</p>
		</div>
	</div>
</div>

</html>