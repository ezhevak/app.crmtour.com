<!DOCTYPE html>
<html lang="ru">
<head>
  <title>CRM Tour</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--link rel="stylesheet" href="https://bootswatch.com/spacelab/bootstrap.min.css"-->
 
	<link rel="stylesheet" href="/css/styles.css">
	<link rel="stylesheet" href="/css/login.css">
</head>
<body>
	<div class="modal1 fade1" id="login-modal" tabindex="-1" role="dialog1" aria-labelledby="myModalLabel1" aria-hidden="true1" >
	  	<div class="modal-dialog1">
			<div class="loginmodal-container block_shadow_box">
				<h1>CRM Tour</h1><br>
				<h3>Установка пароля</h3>
				
			  <form id="siginForm" data-toggle="validator" method="POST" action="/users/changepassword"  autocomplete="off">
			  	<input type="hidden" name="user" value="<?php echo $_GET["user_name"];?>">
			  	<input type="hidden" name="token" value="<?php echo $_GET["token"];?>">
			  	<div class="form-group" <?php if ($_SESSION["WRONG_TOKEN"] == 0) echo "style='display:none'";?>>
				<input class="form-control input-sm" data-minlength="6" id="password" name="password" type="password" placeholder="Новый пароль"
					          required data-required-error="Обязательное поле">
							  <div class="help-block">Не меньше 6 символов</div>
				</div>
				<div class="form-group" <?php if ($_SESSION["WRONG_TOKEN"] == 0) echo "style='display:none'";?>>
				 <input class="form-control input-sm" id="repass" type="password" placeholder="Повтор пароля"
									data-match="#password" data-match-error="Не совпадает с паролем" required
									data-required-error="Обязательное поле">
								<div class="help-block with-errors"></div>
				</div>
				<?php if ($_SESSION["WRONG_TOKEN"] == 0) echo "<div class=\"form-group has-error has-danger\"><div class=\"help-block\">Ошибка: ссылка не действительна</div></div>";?>
				<input type="submit" name="login2" class="login loginmodal-submit" value="Установить новый пароль"  <?php if ($_SESSION["WRONG_TOKEN"] == 0) echo "style='display:none'";?>>
			  </form>
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//1000hz.github.io/bootstrap-validator/dist/validator.min.js"></script>
<script>
	$(document).ready(function() {
		//$("#login-modal").modal({show: true});
		$("#password").val("");
		$("#repass").val("");
		
		/*$("#newpass").attr("data-minlength","6");
		$("#newpass").attr("required","");
		$("#newpass").attr("data-required-error","Обязательное поле");
		$("#newpass").attr("data-error", "Не меньше 6 символов");
		
		$("#repass").attr("data-match","#newpass");
		$("#repass").attr("data-required-error","Обязательное поле");
		$("#repass").attr("data-match-error","Не совпадает с паролем");
		$("#repass").attr("required","");*/
		
		//$('#siginForm').validator();
	});
</script>
</body>
</html>