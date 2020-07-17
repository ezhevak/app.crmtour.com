<!DOCTYPE html>
<html lang="ru">
<head>
  <title>CRM Tour</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--link rel="stylesheet" href="https://bootswatch.com/spacelab/bootstrap.min.css"-->
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
	}
  ?>

	<link rel="stylesheet" href="/css/styles.css">
	<link rel="stylesheet" href="/css/login.css">
	<style>
		.loginmodal-container input[type="text"], input[type="password"] {
    		height: unset;
		}
    
		.loginmodal-container {
			max-width: unset;
			padding: 0px;
		}
		.loginmodal-submit {
			margin: auto;
			display: block !important;
			position: relative !important;
			width: 200px !important;
		}
		.col-xs-6 {
			padding-left: 0px;
			padding-right: 0px;
		}
	</style>
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<?php
	$ReadOnly = "";
	session_start();
	if (isset($_SESSION["APP_STATUS"])) {
		if ($_SESSION["APP_STATUS"] == "success") {
			$ReadOnly = "readonly";
			echo "<div  class=\"loginmodal-container block_shadow_box\">
					<h1>CRM Tour</h1><br>
					<h3>Регистрация</h3>
					<div class=\"col-xs-12\">
						<div style=\"text-align: center;color: green;font-size: 28px;padding-top: 50px;\">
							Зарегистрировано успешно!
						</div>
					</div>
				</div>";
		}
	}
?>
			<div class="loginmodal-container block_shadow_box" <?php if ($ReadOnly != "") echo "style='display:none';";?>>
				<h1>CRM Tour</h1><br>
				<h3>Регистрация</h3>
				<?php 
				
					if ($_SESSION["APP_STATUS"] == "error") 
						echo "<div class=\"has-error\"><label class=\"control-label\">".$_SESSION['APP_MESSAGE']."</label></div>";

					unset($_SESSION['APP_MESSAGE']);
					unset($_SESSION['APP_STATUS']);
				?>
			  <form id="regform" data-toggle="validator" method="POST" action="/users/register" autocomplete="off">
			  	<input name="ReffererId" type="hidden" value='<?php if (isset($_GET["accid"])) echo $_GET["accid"]; else echo "0";?>'>
			  	<div class="col-xs-6">
			  		<div class="container-fluid">
				  		<div class="form-group">
					        <label class="col-xs-4 control-label">Назв. организации:</label>
					        <div class="col-xs-8">
					          <input class="form-control input-sm" id="AccountName" name="AccountName" value="<?php echo $_POST["AccountName"];?>" type="text"
					          	required data-required-error="Обязательное поле" <?php echo $ReadOnly;?>>
					        </div>
					    </div>
					</div>
					<div class="container-fluid">
					    <div class="form-group">
					    	<label class="col-xs-4 control-label">Фамилия:</label>
					    	<div class="col-xs-8">
					          <input class="form-control input-sm" id="LastName" name="LastName" value="<?php echo $_POST["LastName"];?>" type="text"
					          	required data-required-error="Обязательное поле" <?php echo $ReadOnly;?>>
					        </div>
					   	</div>
				  	</div>
				  	<div class="container-fluid">
					    <div class="form-group">
					    	<label class="col-xs-4 control-label">Имя:</label>
					    	<div class="col-xs-8">
					          <input class="form-control input-sm" id="FirstName" name="FirstName" value="<?php echo $_POST["FirstName"];?>" type="text"
					          	required data-required-error="Обязательное поле" <?php echo $ReadOnly;?>>
					        </div>
					   	</div>
				  	</div>
				  	<div class="container-fluid">
					    <div class="form-group">
					    	<label class="col-xs-4 control-label">Отчество:</label>
					    	<div class="col-xs-8">
					          <input class="form-control input-sm" id="MiddleName" name="MiddleName" value="<?php echo $_POST["MiddleName"];?>" type="text" <?php echo $ReadOnly;?>>
					        </div>
					   	</div>
				  	</div>
				  	<div class="container-fluid">
					    <div class="form-group">
					    	<label class="col-xs-4 control-label">Телефон:</label>
					    	<div class="col-xs-8">
					          <input class="form-control input-sm" id="Phone" name="Phone" value="<?php echo $_POST["Phone"];?>" type="text" <?php echo $ReadOnly;?>>
					        </div>
					   	</div>
				  	</div>
				</div>
				<div class="col-xs-6">
					<div class="container-fluid">
					    <div class="form-group">
					    	<label class="col-xs-4 control-label">Login:</label>
					    	<div class="col-xs-8">
					          <input class="form-control input-sm" id="Login" name="Login" value="<?php echo $_POST["Login"];?>" type="text"
					          required data-required-error="Обязательное поле" <?php echo $ReadOnly;?>>
					        </div>
					   	</div>
				  	</div>
				  	<div class="container-fluid">
					    <div class="form-group">
					    	<label class="col-xs-4 control-label">Пароль:</label>
					    	<div class="col-xs-8">
					          <input class="form-control input-sm" data-minlength="6" id="Password" name="Password" value="<?php echo $_POST["Password"];?>" type="password"
					          required data-required-error="Обязательное поле" <?php echo $ReadOnly;?>>
							  <div class="help-block">Не меньше 6 символов</div>
					        </div>
					   	</div>
				  	</div>
				  	<div class="container-fluid">
					    <div class="form-group">
					    	<label class="col-xs-4 control-label">Повторный пароль:</label>
					    	<div class="col-xs-8">
					          <input class="form-control input-sm" id="RePassword" value="" type="password"
									data-match="#Password" data-match-error="Не совпадает с паролем" required
									data-required-error="Обязательное поле" <?php echo $ReadOnly;?>>
								<div class="help-block with-errors"></div>
					        </div>
					   	</div>
				  	</div>
				  	<div class="container-fluid">
					    <div class="form-group">
					    	<label class="col-xs-4 control-label">E-mail:</label>
					    	<div class="col-xs-8">
					          <input class="form-control input-sm" id="Email" name="Email" value="<?php echo $_POST["Email"];?>" type="email" 
								data-error="Неправильный email адрес" required
								data-required-error="Обязательное поле" <?php echo $ReadOnly;?>>
								<div class="help-block with-errors"></div>
					        </div>
					   	</div>
				  	</div>
				  	<div class="container-fluid">
					    <div class="form-group">
					    	<label class="col-xs-4 control-label">Язык интерфейса:</label>
					    	<div class="col-xs-8">
					          <input class="form-control input-sm" id="Language" name="Language" value="Русский" type="text" readonly>
					        </div>
					   	</div>
				  	</div>
				</div>
				<div class="col-sm-12">
					<input type="submit" name="login" class="login loginmodal-submit" value="Зарегистрировать">
				</div>
			  </form>
			</div>

<?php include 'application/views/'.$content_view; ?>


<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

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
	if ($lib == "daterangepicker") {
		echo "<script src=\"/vendor/daterangepicker/moment.min.js\"></script>\n";
		echo "<script src=\"/vendor/daterangepicker/daterangepicker.js\"></script>\n";
	}
	if ($lib == "datepicker") {
		echo "<script src=\"/vendor/datepicker/js/bootstrap-datepicker.min.js\"></script>\n";
		echo "<script src=\"/vendor/datepicker/locales/bootstrap-datepicker.ru.min.js\"></script>\n";
	}
	if ($lib == "inputmask") {
		echo "<script src=\"/vendor/inputmask/jquery.inputmask.bundle.min.js\"></script>\n";
	}
}
?>

<?php
foreach ($used_js as $jsfile) {
	echo "<script src=\"/application/js/".$jsfile.".js\"></script>\n";
}
?>
<script src="/vendor/bootstrap-validator/validator.min.js"></script>
<script>
	$(document).ready(function() {
		$('#regform').validator();
		$('[data-toggle="popover"]').popover();
		$('#Phone').inputmask('+38(099)999-9999');
		$('input:first').focus();
	});
</script>
</body>
</html>