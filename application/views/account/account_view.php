<?php
	if(GetOption("Show_Address",$_SESSION['AccId'])=="1"){$checkedShowAddress = "checked";}
	if(GetOption("Send_Email",$_SESSION['AccId'])=="1"){$checkedSendEmail = "checked";}
	if(GetOption("Send_Email_Arrival",$_SESSION['AccId'])=="1"){$SendEmailArrival = "checked";}
	if(GetOption("StandartSegment",$_SESSION['AccId'])=="1"){$StandartSegment = "checked";}
	if(GetOption("AllManagerLists",$_SESSION['AccId'])=="1"){$AllManagerLists = "checked";}



	//Получаем Сегменты клиента для рассылки смс сообщений
	require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
	$mysqli = database::getInstance();
    $db_curr = $mysqli->getConnection();
    $db_curr->where("AccId", $_SESSION['AccId']);
	$db_curr->where("Active", "Y");
	$db_curr->where("type", "Segment");
	$db_curr->orderBy("OrderBy","asc");
	
	$db_curr_cols = array("LIC", "Name");
	$db_curr_data = $db_curr->get("Dictionaries", null, $db_curr_cols);
	$db_curr->disconnect();
	//header('Content-Type: application/json; charset=utf-8');
	//return $data;
	//echo json_encode( $data);
	foreach ($db_curr_data as $row) {
		if($row['LIC'] == "NoSegment"){
			$dim_segment .= "<option value='".$row['LIC']."'>Новые</option>";
		} else{
			$dim_segment .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
		}
	}

?>
<div id="view_div" class="container">
	<div class="x_panel">
	<div class="x_title"><h2>Данные по вашей организации</h2>
	<div class="clearfix"></div>
	<div class="x_content"><br>
		<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#home">Общая информация</a></li>
		  <!--li><a data-toggle="tab" href="#payments">Платежи и начисления</a></li-->
		  <li><a data-toggle="tab" href="#managersum">Выплаты менеджерам</a></li>
		  <li><a data-toggle="tab" href="#integration">Интеграция</a></li>
		  <li><a data-toggle="tab" href="#settings">Настройки</a></li>
		  <li><a data-toggle="tab" href="#smslog">SMS отправки</a></li>
		</ul>



	<div class="tab-content">
		<div id="home" class="tab-pane fade active in">
			
			<div class="x_panel">
			<div class="x_title"><h2>Контактная информация владельца организации</a></h2>
			<div class="clearfix"></div>
			<div class="x_content"><br>
				<form id="form-account" action="#" method="post" class="form-horizontal form-label-left" data-toggle="validator">
					<input type="hidden" name="Id" value="<?php echo $data[0]["Id"];?>">
					<div class="row">
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Название организации</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="AccountName" name="AccountName" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["Name"]; ?>" placeholder="<?php echo $data[0]["Name"]; ?>" data-error="Название организации обязательное к заполнению" required></div>
							<div class="help-block with-errors"></div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Мобильный</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="tel" id="OfficeMobile" name="OfficeMobile" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $data[0]["OfficeMobile"]; ?>" placeholder="+38(067)555-4422"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="tel" id="OfficeEmail" name="OfficeEmail" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $data[0]["OfficeEmail"]; ?>" placeholder="example@gmail.com"></div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">ФИО директора</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="DirectorName" name="DirectorName" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $data[0]["DirectorName"]; ?>" placeholder="Иванов Владимир Матвеевич" data-error="ФИО владельца обязательное к заполнению" required></div>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					
					<div class="ln_solid"></div>
			        <div class="form-group">
				        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				        <button Id="sendButton" type="submit" form="form-account" class="btn btn-success">Сохранить</button>
				            
				    	<a id="cancelButton" href="/" class="btn btn-default" style="margin-left: 10px">Отменить</a>
				        </div>
			        </div>
					
				
				</form>
			</div>
			</div>	
			</div>
				
				<div class="x_panel">
				  <div class="x_title">
				    <h2>Офисы вашей организации</h2>
				    <div class="clearfix"></div>
				  </div>
					<div class="x_content">
						<p class="text-muted font-13 m-b-30">
						  Все филиалы Вашей организации. Реквизиты ваших филиалов будут подтягиваться в печатные формы.
						</p>
						<table id="datatable-responsive-branches" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						  <thead>
						    <tr>
						      	<th>Id</th>
						        <th>Название офиса</th>
						        <th>Адрес юр</th>
						        <th>Адрес физ</th>
						        <th>Телефон</th>
						        <th>Факс</th>
						        <th>Мобильный</th>
						        <th>Email</th>
						        <th>ФИО директора</th>
						        <th>Закрыт</th>
						        <th>Действия</th>
						    </tr>
						  </thead>
						</table>
					</div>
				</div>
	
		</div>
	
		<div id="managersum" class="tab-pane fade">
			<div class="row">
					Мотивация по дате договора
				<div class="col-sm-12">
						<table id="grid_mansum"></table>
				</div>
			</div>
			<div class="row">
					Мотивация по дате платежа <b>Формула </b>(Сумма платежа*(Сумму сделки-сумму от оператора)/Сумму сделки))*комисию 
				<div class="col-sm-12">
						<table id="grid_ManSumByPay"></table>
				</div>
			</div>
		</div>
	
		<!--div id="payments" class="tab-pane fade">
			<h3>Дла поддержки проекта перейдите по ссылке <a href="https://www.liqpay.ua/ru/checkout/crmtour" target="_blank">CRM Tour</a></h3>
			<div class="row">
			<div class="x_panel">
				  <div class="x_title">
				    <h2>Платежи и начисления</h2>
				    <div class="clearfix"></div>
				  </div>
					<div class="x_content">
						<p class="text-muted font-13 m-b-30">
						  Тут вы можете контролировать ваши пополнения и начисления за использования сиетстемы CRM Tour
						</p>
						<table id="datatable-responsive-payments" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						  <thead>
						    <tr>
						      	<th>Id</th>
						        <th>Тип платежа</th>
						        <th>Сумма грн</th>
						        <th>Коментарий</th>
						        <th>Дата</th>
						    </tr>
						  </thead>
						</table>
					</div>
				</div>
			</div>
		</div-->
		  
		<div id="integration" class="tab-pane fade">
				
			<div class="x_panel">
			<div class="x_title"><h2>Email рассылки используя сервис <a href="https://mailchimp.com" target="_blank">mailchimp.com</a></h2>
			<div class="clearfix"></div>
			<div class="x_content"><br>
				<ul>
					<li>Сервис бесплатный, пока у вас не наберется 2000 подписчиков или 12 000 писем в месяц.</li>
					<li>Надежность. MailChimp пользуются больше миллиона человек.</li>
					<li>Адаптивный дизайн. Рассылки можно настраивать даже со смартфона.</li>
					<li>Удобный интерфейс для верстки писем. Знание HTML и CSS не потребуется.</li>
				</ul>
		
				<p>Вы можете синхронизироваться email адрес ваших клиентов с со своим списком email рассылки в системе mailchimp.com </p>
				<p><strong>ApiKey</strong> можно найти по ссылке в настройках вашего экаунта <a href="https://us13.admin.mailchimp.com/account/api/" target="_blank">Profile -> Extras -> Api keys</a></p>
				<p><strong>ListId</strong> можно найти в настройках вашего списка <a href="https://us13.admin.mailchimp.com/lists/" target="_blank">List -> Settings -> List name & defaults</a></p>
				<form action="/account/chimp_save" method="post">
				   <div class="row">
					<div class="form-group col-md-3">
					 <label for="ApiKey">ApiKey:</label>
					 <input type="text" class="form-control input-sm" id="ApiKey" name="ApiKey" value="<?php echo GetOption("MailChimp_ApiKey",$_SESSION['AccId']);?>">
					</div>
					<div class="form-group col-md-3">
					 <label for="ListId">ListId:</label>
					 <input type="text" class="form-control input-sm" id="ListId" name="ListId" value="<?php echo GetOption("MailChimp_ListId",$_SESSION['AccId']);?>">
					</div>
				   </div>
				  <p>После нажатия кнопки сохранить, список в системе Mailchimp.com будет синхронизирован.
				  Этот процес может быть длительным. </p>
				  <p><strong>Пожалуйста дождитесь окончания процесса</strong>.</p>
				  <button type="submit" class="btn btn-default">Запустить</button>
				</form>
				<hr>
			</div>
			</div>
			</div>
	
			<!--div class="x_panel">
			<div class="x_title"><h2>Для интеграции АТС <a href="http://www.binotel.ua" target="_blank">www.binotel.ua</a></h2>
			<div class="clearfix"></div>
			<div class="x_content"><br>
				<div>
				  <div class="starrr stars"></div>
				  Для интеграции Вам необходимо сделать 2-ва действия:
				</div>
				<p>1. Сохранить Id вашей компании в системе binotel.ua если у Вас нет Id компании напишите в поддержку <a href="mailto:support@binotel.ua"><strong>support@binotel.ua</strong></a></p>
				<p>2. Передать в поддержку <a href="mailto:support@binotel.ua"><strong>support@binotel.ua</strong></a> ссылку для интеграции <a href="https://app.crmtour.com/public/binotel.php" target="_blank"><strong>https://app.crmtour.com/public/binotel.php</strong></a></p>
			
	
			<form id="form-binotel" class="form-horizontal form-label-left" action="/account/binotel_save" method="post">
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Id компании в binotel.ua
	            </label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BinotelId" name="BinotelId" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo GetOption("BinotelId",$_SESSION['AccId']); ?>">
	            </div>
	          </div>
	          <div class="ln_solid"></div>
	          <div class="form-group">
	            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	              <button type="submit" class="btn btn-success">Сохранить</button>
	            </div>
	          </div>
	
	        </form>	
			</div>
			</div>
			</div-->
			
		  </div>
			  
		<div id="settings" class="tab-pane fade">
			<!--div class="x_panel"-->
			<div class="x_title"><h2>Настройки организации</h2>
			<div class="clearfix"></div>
			<div class="x_content"><br>
				<form action="/account/show_address" method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="checkbox">
							  <label><input type="checkbox" name="ShowAddress" <?php echo $checkedShowAddress;?>>Отображать телефоны и email пользователям</label>
							<p>Установка маски (XXX) XXX-XXXX/XXXXXX@XXXX.XXX для всех телефонов/email созданых не владельцем записи.</p>
							</div>
							<br>
							<div class="checkbox">
							  <label><input type="checkbox" name="SendEmail" <?php echo $checkedSendEmail;?>>Отправлять Email уведомления менеджерам</label>
							<p>Отправка уведомлений на email Ваших пользователей при создании/изменении менеджера запроса.</p>
							</div>
							<br>
							<div class="checkbox">
							  <label><input type="checkbox" name="SendEmailArrival" <?php echo $SendEmailArrival;?>>Отправлять Email напоминание менеджерам</label>
							<p>Отправка напоминаний на email Ваших менеджеров за два дня до даты сделке со списком необходимый действий.
							   Каждый день в 9:00 утра.<br>
							<p>
							<b>Пример Email:</b><br>
							Клиент: Новиков Василий<br>
							Сделка: 2017/12<br>
							Тур: c 2017-04-26 по 2017-04-29<br>
							1. Созвониться с клиентом<br>
							2. Выдать докумменты. На данный момент документы выданы<br>
							3. Проверить рейсы:<br>
							Рейс1: SG23, вылет 19.04.2017 10:55:00, приземление 20.04.2017 10:35:00<br>
							Рейс2: SG23, вылет 24.04.2017 10:55:00, приземление 25.04.2017 10:55:00<br>
							Оператор:ABS on-line, заявка:1342<br>
							</p>
							</div>
						</div>
			
							<div class="col-md-6">
								<div class="checkbox">
									  <label><input type="checkbox" name="AllManagerLists" <?php echo $AllManagerLists;?>>Списки без ограничения видимости по менеджерам</label>
									<p>Включает видимость всех записей без ограничения видимости по менеджерам.
									<a href='https://wiki.crmtour.com/start#списки_без_ограничения_видимости_по_менеджерам' target="_blank"><strong>Документация</strong></a></p>
								</div>
								<br>
								
								<div class="checkbox">
									  <label><input type="checkbox" name="StandartSegment" <?php echo $StandartSegment;?>>Использовать стандартную сегментацию</label>
									<p>Включает стандартную сегментацию клиентов. Все установленные руками значения мегментов будут безвозвратно изменены.
									<a href='https://wiki.crmtour.com/segment' target="_blank"><strong>Документация по сегментации</strong></a></p>
								</div>
								<br>
							
								<p>Создание напоминаний в календаре, за определённое количество дней до события:</p>
								<div class="form-group col-md-6">
									<label for="DayToBirthday">До дня рождения:</label>
									<input type="number" step="1" class="form-control input-sm" id="DayToBirthday" name="DayToBirthday" value="<?php echo GetOption("DayToBirthday",$_SESSION['AccId']); ?>">
								</div>
							
								<div class="form-group col-md-6">
									<label for="DayToPassport">До окончания действия паспорта:</label>
									<input type="number" step="1" class="form-control input-sm" id="DayToPassport" name="DayToPassport" value="<?php echo GetOption("DayToPassport",$_SESSION['AccId']); ?>">
								</div>
							</div>
		  			</div>
					<button type="submit" class="btn btn-default">Сохранить</button>
				</form>
			</div>
			</div>
			<!--/div-->	
			
			<!--div class="x_panel"-->
			<!--div class="x_title"><h2>Настройки SMTP (отправка email)</h2>
			<div class="clearfix"></div>
			<div class="x_content"><br>
				<form id="form-smtp" class="form-horizontal form-label-left" action="#" method="post" data-toggle="validator">
				  <input type="hidden" id="SMTPId" name="SMTPId" value="<?php echo $data[0]["SMTPId"];?>">
				  
		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12">Имя отправителя '<?php echo $data[0]["Name"]; ?>'</label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="SenderName" name="SenderName" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["SenderName"]; ?>" placeholder="<?php echo $data[0]["Name"]; ?>" data-error="Имя отправитя обязательно к заполнению" required>
		            </div>
		            <div class="help-block with-errors"></div>
		          </div>
		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12">Хост</label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="Host" name="Host" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["Host"]; ?>" placeholder="mail.ukraine.com.ua" data-error="Неее. Я так не играю. Без Хоста нельзя" required>
		            </div>
		            <div class="help-block with-errors"></div>
		          </div>
		          
		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12">Необхода авторизация true/false</label>
					 <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="SMTPAuth" name="SMTPAuth" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["SMTPAuth"]; ?>" placeholder="true/false" data-error="Аутентификация обязательная к заполнению" required>
		            </div>
		            <div class="help-block with-errors"></div>
		          </div>
		          
		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12">Имя пользователя</label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="UserName" name="UserName" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["UserName"]; ?>" placeholder="info@crmtour.com" autocomplete="off"  data-error="Имя пользователя обязательное к заполнению" required>
		            </div>
		            <div class="help-block with-errors"></div>
		          </div>
		          
		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12">Пароль пользователя</label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="Password" name="Password" class="date-picker form-control col-md-7 col-xs-12" type="password" value="<?php echo  $data[0]["Pass"]; ?>" placeholder="password" autocomplete="off" data-error="Ну как же без пароля? Без него никак." required>
		            </div>
		            <div class="help-block with-errors"></div>
		          </div>
		          
		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12">Тип шифрования</label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="SMTPSecure" name="SMTPSecure" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo  $data[0]["SMTPSecure"]; ?>" placeholder="ssl или tsl">
		            </div>
		          </div>
		          
		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12">Порт</label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="Port" name="Port" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["Port"]; ?>" placeholder="25" data-error="Неужели вы забыли порт? Попробуйте 25" required>
		            </div>
		            <div class="help-block with-errors"></div>
		          </div>
		          
		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12">Кодировка по умолчанию 'UTF-8'</label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="CharSet" name="CharSet" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["CharSet"]; ?>" placeholder="UTF-8"data-error="И это тоже обязательно!Лучше поставьте UTF-8" required>
		            </div>
		            <div class="help-block with-errors"></div>
		          </div>
		          
		          <div class="ln_solid"></div>
		          <div class="form-group">
		            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		              <button Id="smtpSendButton" form="form-smtp" type="submit" class="btn btn-success">Сохранить</button>
		            
		              <button Id="smtpGmail" type="button" class="btn btn-primary">Настройки Gmail.com </button>
		            </div>
		          </div>
		
		        </form>	
			</div>
			</div-->
			<!--/div-->	
	
			
		</div>
		
		<div id="smslog" class="tab-pane fade">
			
			<div class="x_panel">
			<div class="x_title"><h2>Для подключения к шлюзу смс рассылок <a href="https://atomic.center" target="_blank">Atomic-сервис</a> заполните форму</h2>
			<div class="clearfix"></div>
			<div class="x_content"><br>
				<form id="form-saveSms" action="#" method="post">
				   <div class="row">
					<div class="form-group col-md-2">
					 <label for="SmsLogin">Логин:</label>
					 <input type="text" class="form-control input-sm" id="SmsLogin" name="SmsLogin" value="<?php echo GetOption("SMS_Login",$_SESSION['AccId']);?>">
					</div>
					<div class="form-group col-md-2">
					 <label for="SmsPass">Пароль:</label>
					 <input type="password" class="form-control input-sm" id="SmsPass" name="SmsPass" value="<?php echo GetOption("SMS_Pass",$_SESSION['AccId']);?>">
					</div>
		
					<div class="form-group col-md-2">
					 <label for="SmsSenderName">Имя отправителя:</label>
					 <input type="text" class="form-control input-sm" id="SmsSenderName" name="SmsSenderName" value="<?php echo GetOption("SMS_SenderName",$_SESSION['AccId']);?>">
					</div>
					<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
		              <span class="count_top"><i class="fa fa-money"></i> Баланс SMS-сервиса</span>
		              <div id="smsSenderBalance" class="count">0 UAH</div>
		            </div>
					</div>
				  <button id="saveSmsSubmit" form="form-saveSms" type="submit" class="btn btn-success">Сохранить</button>
		
				</form>
			
			</div>
			</div>
			</div>
		
		
		
		
			<div class="x_panel">
			<div class="x_title"><h2>Для отправки смс сообщений используйте форму</h2>
			<div class="clearfix"></div>
			<div class="x_content"><br>
				<form id="form-sendSms" action="#" method="post">
					<div class="row">
						<div class="form-group col-md-3 col-xs-12">
							<label for="SMSText">Текст сообщения:</label>
							<textarea class="form-control input-sm" rows="5" id="SMSText" name="SMSText"></textarea>
						<p id="smslenght">Количество символов:<strong>0</strong></p>
						</div>
			
						<div class="form-group col-md-2 col-xs-12">
							<label for="SMSSegment">Сегмент:</label>
							<select multiple class="form-control input-sm" id="SMSSegment" name="SMSSegment[]">
								<?php echo $dim_segment; ?>
							</select>
						</div>
					</div>
					<button id="smssend" form="form-sendSms" type="submit" class="btn btn-success" disabled>Отправить</button>
				</form>
			</div>
			</div>
			</div>
			
				<div class="x_panel">
				  <div class="x_title">
				    <h2>Список отправленых смс сообщений Вашей компанией</h2>
				    <div class="clearfix"></div>
				  </div>
					<div class="x_content">
						<p class="text-muted font-13 m-b-30">
						  Список отправленых смс сообщений Вашей компанией
						</p>
						<table id="datatable-responsive-sms" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						  <thead>
						    <tr>
						      	<th>Id</th>
						        <th>Дата время</th>
						        <th>Номер</th>
						        <th>Текст</th>
						        <th>Статус</th>
						        <th>Фамилия</th>
						        <th>Имя</th>
						        <th>Отчество</th>
						        <th>Сегмент</th>
						    </tr>
						  </thead>
						</table>
					</div>
				</div>
			
		</div>
	
	</div>


  </div>
  </div>
  </div>
	  
</div>