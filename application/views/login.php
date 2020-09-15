<!DOCTYPE html>
<html lang="ru">
  <head>
  <title>CRM Tour - простая CRM для туристических агенств</title>
  <meta name="description" content="CRM Tour для туризма. Работайте со своими туристами легке и эффективно">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">

    <title>CRM Tour - работайте с туристами легко и эффективно</title>
	
    <!-- Bootstrap -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendor/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendor/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../css/custom.min.css" rel="stylesheet">
    
	
  <?php
    if($GLOBALS['gaCode'] != "") {
      include_once("analyticstracking.php");
    }
  ?>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <a class="hiddenanchor" id="reset"></a>

<!----------------Вход в систему----------------->
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="form-login" method="POST">
        	  <input type="hidden" id="recaptcha_response_login" name="recaptcha_response" value="" />
              <h1>Вход</h1>
              <div id="errorTextLogin" style="display:none;"></div>
              <div>
                <input type="text" class="form-control" placeholder="Username" id="user" name="user" required/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" id="pass" name="pass" required/>
              </div>
              <div>
                <button Id="btnLogin" type="submit" form="form-login" class="btn btn-default submit">Войти</button>
                <a class="reset_pass" href="#reset">Забыли свой пароль?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Вы у нас впервые?
                  <a href="#signup" class="to_register"> Регистрация</a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> CRM Tour</h1>
                  <p>©2016 <a href="https://crmtour.com">CRM Tour</a> - работайте со своими клиентами легко и эффективно</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        
<!----------------Создание организации----------------->
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form id="form-register" method="POST">
            	
        	  <input type="hidden" id="recaptcha_response_register" name="recaptcha_response" value="" />
              <h1>Создание</h1>
              <div id="errorTextRegister" style="display:none;"></div>

              <div>
                <input type="text" class="form-control" placeholder="Login" id="Login" name="Login" required />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" id="Email" name="Email" required />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Назв. организации" id="AccountName" name="AccountName"  required/>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Фамилия" id="LastName" name="LastName" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Имя" id="FirstName" name="FirstName" required />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Отчество" id="MiddleName" name="MiddleName"/>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="+38(067)555-4422" id="Phone" name="Phone"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Пароль" id="Password" name="Password" required />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Повторный Пароль" id="RePassword" name="RePassword" required />
              </div>
              
              <div>
                <button Id="btnRegister" type="submit" form="form-register" class="btn btn-default submit">Создать</button>
                <a class="reset_pass" href="#reset">Забыли свой пароль?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Уже зарегистрированы?
                  <a href="#signin" class="to_register"> Вход </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> CRM Tour</h1>
                  <p>©2016 <a href="https://crmtour.com">CRM Tour</a> - работайте со своими клиентами легко и эффективно</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        
        <!----------------Востановить пароль----------------->
        <!--div id="reset" class="animate form reset-form">
          <section class="reset_content">
            <form id="form-reset" method="POST">
              <h1>Востановить пароль</h1>

              <div>
                <input type="text" class="form-control" placeholder="Login" id="Login" name="Login" required="" />
              <div>
                <input type="password" class="form-control" placeholder="Повторный Пароль" id="RePassword" name="RePassword" required="" />
              </div>
              <div>
                	<input type="submit" name="register" class="btn btn-default submit" value="Создать">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Уже зарегистрированы?
                  <a href="#signin" class="to_register"> Вход </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> CRM Tour</h1>
                  <p>©2016 <a href="https://crmtour.com">CRM Tour</a> - работайте со своими клиентами легко и эффективно</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div-->
    </div>
    </div>

	<script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/vendor/inputmask/jquery.inputmask.bundle.min.js"></script>
	
	<script>
		$('#form-login').on('submit', function (e) {
			e.preventDefault();
			
			$("#errorTextLogin").hide();
			var msg = $('#form-login').serialize();
			//console.log($("#user").val());
			if($("#user").val() !="" && $("#pass").val() !=""){
			$.when($.ajax({
					type: 'POST',
					url: "/users/login",
					data: msg,
					success: function(_data, status){
						return _data;
					},
					error: function( jqXHR, textStatus, errorThrown) {
						console.log("error:" + textStatus + "," + errorThrown);
					},
					dataType: "json",
					async:true
				})).done(function(res) {
					if (res.status == "success") {
						
						$("#errorTextLogin").text(res.message);
						$("#errorTextLogin").show();
						
						setTimeout(function(){
							window.location = '/'
						}, 1000);
						
					} else {
						
						$("#errorTextLogin").css( "color", "red" );
						$("#errorTextLogin").text(res.message);
						$("#errorTextLogin").show();
					}
				});
			} else {
				if( $("#user").val()=="" ){
					$("#errorTextLogin").css( "color", "red" );
					$("#errorTextLogin").text("Не указан логин!");
				} else if ( $("#pass").val()=="" ){
					
					$("#errorTextLogin").css( "color", "red" );
					$("#errorTextLogin").text("Не указан пароль!");
				}
				
				$("#errorTextLogin").show();
			}
		});
	</script> 
	
    <script>

		$('#form-register').on('submit', function (e) {
	
		e.preventDefault();
		
		$("#errorTextRegister").hide();
		
		if($("#Password").val() !== $("#RePassword").val()) {
			$("#errorTextRegister").css( "color", "red" );
			$("#errorTextRegister").text("Указанные пароли не совпадают");
			$("#errorTextRegister").show();
		} else {
		
			var msg = $('#form-register').serialize();
			//console.log(msg);
			
			$.when($.ajax({
					type: 'POST',
					url: "/users/register",
					data: msg,
					success: function(_data, status){
						return _data;
					},
					error: function( jqXHR, textStatus, errorThrown) {
						console.log("error:" + textStatus + "," + errorThrown);
					},
					dataType: "json",
					async:true
				})).done(function(res) {
					if (res.status == "success") {
						$("#errorTextRegister").text(res.message);
						$("#errorTextRegister").show();
												
						setTimeout(function(){
							window.location = '/'
						}, 1000);
					} else {
						$("#errorTextRegister").css( "color", "red" );
						$("#errorTextRegister").text(res.message);
						$("#errorTextRegister").show();
					}
				});
			}
			
		});
	</script>
	<script>
		$( document ).ready(function() {
		    $('#Phone').inputmask('+38(099)999-9999');
		});
	</script>
	
	
	<script src='https://www.google.com/recaptcha/api.js?render=&onload=onloadCallback&render=explicit'></script>
	
	<script>
	      function onloadCallback() {
	      grecaptcha.ready(function() {
	        grecaptcha.execute('', {
	          action: 'login'
	        }).then(function (token) {
	          var recaptchaResponseLogin = document.getElementById('recaptcha_response_login');
	          var recaptchaResponseRegister = document.getElementById('recaptcha_response_register');
	          recaptchaResponseLogin.value = token;
	          recaptchaResponseRegister.value = token;
	        });
	      });
	    }
	</script>
	
	
	
  </body>
</html>