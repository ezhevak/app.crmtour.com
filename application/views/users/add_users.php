<?php

	require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
	$mysqli = database::getInstance();
    $db = $mysqli->getConnection();
    //Выгружаем справочники из основной организации
    $cols1 = array("Id", "BranchName");
    $db->where('AccId', $_SESSION['AccId']);
    $dataAccBranches = $db->get("AccountBranches",null,$cols1);
	
	$cols2 = array("BranchId");
    $db->where('AccId', $_SESSION['AccId']);
    $db->where('UserId', $data[0]["Id"]);
    $dataUsrBranches = $db->get("UsersBranches",null,$cols2);
	
	
	foreach($dataAccBranches as $AccBranch) {
		foreach($dataUsrBranches as $UserBranch) {
			if($UserBranch["BranchId"]==$AccBranch["Id"]){
				$ischecked = "selected='selected'";
				break;
			} else {
				$ischecked ="";
			}
		}
		$branchList .= "<option value='".$AccBranch["Id"]."' ".$ischecked.">".$AccBranch["BranchName"]."</option>";
	}
	








$conn = new mysqli(
			$GLOBALS['DB_HOST'],
			$GLOBALS['DB_USER'],
			$GLOBALS['DB_PASSWORD'],
			$GLOBALS['DB_NAME']);
		$conn->	set_charset("utf8");//исправляем иероглифы

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$AccId = $_SESSION['AccId'];

//менять старые логины нельзя
	if($_SESSION['UserRole'] == 'user'){
		$control_readonly = "readonly";
		if($_SESSION['UserId'] != $data[0]["Id"]) {
			$control_readonly = "readonly"; //Делаем Input поля ReadOnly
			$button_disabled = "disabled"; //Деактивируем кнопку сохранить
		}
	}

//Получаем список ролей для пользователей
try {
	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and AccId = $AccId and type='userRole' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){
	//Если новая запись то устанавливаем значения по умолчанию.
	//Если запись существующая отображаем то значение которое в базе
	if($_SESSION['UserRole'] == 'admin' || $_SESSION['UserRole'] == 'owner'){
		if($data[0]["Id"] ==""){
			if($row['LIC'] == "Role"){
					$dim_role .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
				} else{
					$dim_role .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}
		} else {
			if($row['LIC'] == $data[0]["Role"]){
					$dim_role .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
				} else{
					$dim_role .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}
		}
	} else {
		if($row['LIC'] == $data[0]["Role"]){
				$dim_role .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$dim_role .= "<option value='".$row['LIC']."' disabled>".$row['Name']."</option>";
		}
		
	}
		
		
		
	}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}
//Получаем список языков
try {
	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and AccId = $AccId and type='lang'";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){

		//Если новая запись то устанавливаем значения по умолчанию.
	//Если запись существующая отображаем то значение которое в базе
	if($data[0]["Id"] ==""){
		if($row['LIC'] == "ru_RU"){
				$dim_lang .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$dim_lang .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}
		} else {
				if($row['LIC'] == $data[0]["Lang"]){
						$dim_lang .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
				} else{
						$dim_lang .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
				}
			}
	}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

//Получаем список офисов
try {
	$sql = "SELECT * FROM  `AccountBranches` where AccId = $AccId";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){
		
	
	
	//Если новая запись то устанавливаем значения по умолчанию.
	//Если запись существующая отображаем то значение которое в базе
	if($_SESSION['UserRole'] == 'admin' || $_SESSION['UserRole'] == 'owner'){
		if($row['Id'] == $data[0]["BranchId"]){
				$dim_branch .= "<option selected value='".$row['Id']."'>".$row['BranchName']."</option>";
			} else{
				$dim_branch .= "<option value='".$row['Id']."'>".$row['BranchName']."</option>";
			}
		} else {
			if($row['Id'] == $data[0]["BranchId"]){
				$dim_branch .= "<option selected value='".$row['Id']."'>".$row['BranchName']."</option>";
			} else{
				$dim_branch .= "<option value='".$row['Id']."' disabled>".$row['BranchName']."</option>";
			}
		}
	}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}


if($data[0]["Inactive"]=="1"){$checkedInactive = "checked";}

$conn->close();
//Заголовок формы редактирования запросов.
if($data[0]["Id"] ==""){
	$x_title = "Форма редактирования нового пользователя";
} else {
	$x_title = "Форма редактирования пользователя ".$data[0]["FirstName"]. " ".$data[0]["LastName"];
}

?>


<div class="container-fluid">
<div class="x_panel">
<div class="x_title"><h2><?php echo $x_title;?></h2>
<div class="clearfix"></div>
<div class="x_content"><br>


<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Общая информация</a></li>
  <li><a data-toggle="tab" href="#managersum">Выплаты менеджерам</a></li>
</ul>	
	
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
  	<form id="editForm" action="/users/save" method="post" data-toggle="validator">
		<input type="hidden" name="Id" value="<?php echo $data[0]["Id"];?>">
		<input type="hidden" name="TelegramChatIdOld" value="<?php echo $data[0]["TelegramChatId"];?>">
		<div class="row">
			<div class="form-group col-md-2 col-xs-12">
				<label for="Login">Login:</label>
				<input type="text" class="form-control input-sm" id="Login" name="Login" value="<?php echo $data[0]["Login"]; ?>"<?php echo $control_readonly; ?> required >
				<div class="help-block with-errors"></div>
			</div>

			<div class="form-group col-md-2 col-xs-12">
				<label for="pwd">Пароль:</label>
				<input type="password" class="form-control input-sm" id="pwd" name="pwd">
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group col-md-2 col-xs-12">
				<label for="pwd_confirm">Подтверждение пароля:</label>
				<input type="password" class="form-control input-sm" id="pwd_confirm" name="pwd_confirm">
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group col-md-2 col-xs-12">
				<label for="Lang">Язык интерфейса:</label>
				<select class="form-control input-sm" id="Lang" name="Lang">
					<?php echo $dim_lang; ?>
				</select>
			</div>
			<div class="form-group col-md-2 col-xs-12">
				<label for="UserRole">Роль:</label>
				<select class="form-control input-sm" id="Role" name="Role">
					<?php echo $dim_role; ?>
				</select>
			</div>
			
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="TaskColor" data-toggle="tooltip" data-placement="auto" title="Цвет задач менеджера в календаре">Цвет задач:</label>
				<div id="tc" class="input-group demo2 colorpicker-element" title="Using format option">
				  <input Id="TaskColor" Name="TaskColor" type="text" class="form-control input-sm" value="<?php echo $data[0]["TaskColor"]; ?>"/>
				  <span class="input-group-addon"><i></i></span>
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="form-group col-md-2 col-xs-12">
				<label for="LastName">Фамилия:</label>
				<input type="text" class="form-control input-sm" id="LastName" name="LastName" value="<?php echo $data[0]["LastName"]; ?>" <?php echo $control_readonly; ?>>
			</div>
			<div class="form-group col-md-2 col-xs-12">
				<label for="FirstName">Имя:</label>
				<input type="text" class="form-control input-sm" id="FirstName" name="FirstName" value="<?php echo $data[0]["FirstName"]; ?>" <?php echo $control_readonly; ?>>
			</div>
			<div class="form-group col-md-2 col-xs-12">
				<label for="Phone">Телефон:</label>
				<input type="text" class="form-control input-sm" id="Phone" name="Phone" value="<?php echo $data[0]["Phone"]; ?>" <?php echo $control_readonly; ?>>
			</div>
			<div class="form-group col-md-2 col-xs-12">
				<label  for="Email">Email address:</label>
				<input type="Email" class="form-control input-sm" id="Email" name="Email" value="<?php echo $data[0]["Email"]; ?>" <?php echo $control_readonly; ?>>
			</div>
			<div class="form-group col-md-2 col-xs-12">
				<label for="Commission" data-toggle="tooltip" data-placement="auto" title="Персональная комиссия менеджера">Комиссия менеджера:</label>
				<input type="number" step="0.10" min="0" max="100" class="form-control input-sm" id="Commission" name="Commission" value="<?php echo $data[0]["Commission"]; ?>" <?php echo $control_readonly; ?>>
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="ChatId">Telegram ChatId:</label> <a target="_blank" href="https://telegram.me/@CrmTourBot">@CrmTour</a>
				<input type="text" class="form-control input-sm" id="TelegramChatId" name="TelegramChatId" value="<?php echo $data[0]["TelegramChatId"]; ?>">
			</div>
			
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="BranchId">Основной офис:</label>
				<select class="form-control input-sm" id="BranchId" name="BranchId">
					<?php echo $dim_branch; ?>
				</select>
			</div>
			
			<div class="form-group col-md-10 col-xs-12">
				<label for="Branches">Дополнительные офисы:</label>
				<select class="form-control input-sm" id="Branches" name="Branches[]" multiple="multiple" data-placeholder="Выбор офисов">>
					<?php echo $branchList; ?>
				</select>
			</div>
			<!--div class="form-group col-md-6 col-xs-12">
				<label for="Signature">Подпись email сообщений:</label>
				<textarea id="Signature" name="Signature" class="form-control" rows="7" placeholder="Укажите вашу подпись для email сообщений"><?php echo $data[0]["Signature"]; ?></textarea>
			</div-->
		</div>
		
		<p><input type="checkbox" id="Inactive" name="Inactive" <?php echo $checkedInactive ?>> Не работает</p>
		<p><input type="checkbox" id="pass" name="pass" onclick="editForm(this.form)"> Я хочу изменить пароль</p>
		<button id="btnSave" type="submit" class="btn btn-default" 	<?php echo $button_disabled; ?>>Сохранить</button><a href="/users" class="btn btn-default" style="margin-left: 10px">Отменить</a>
		
	</form>	
  	
</div> 
   	

<div id="managersum" class="tab-pane fade">
	  	<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive">
					<table id="grid_mansum"></table>
				</div>
				<div id="page_mansum"></div>
			</div>
		</div>
</div>
	  	
</div> 	
</div> 	
</div> 	
</div> 

	<script>
		function on_load() {
			$('#editForm').validator();
			//$('#Phone').inputmask('+38(099)999-9999');

			$('form').find('*').filter(':input:visible:first').focus();
			check("Y");
		}


		//По умолчанию вся форма ReadOnly
		//window.onload = check("Y");

		function editForm(f) {
			if(f.pass.checked) {
				check("N");
			} else {
				check("Y");
			}
		}

		//Функция по Id контрола делает поля на форме не активными
		function check(flg) {
			if(flg =="Y"){
			    document.getElementById("pwd").disabled = true;
			    document.getElementById("pwd_confirm").disabled = true;

			    $("#pwd").removeAttr("data-minlength");
			    $("#pwd").removeAttr("required");
			    $("#pwd").removeAttr("data-required-error");

			    $("#pwd_confirm").removeAttr("required");
			    $("#pwd_confirm").removeAttr("data-match-error");
			    $("#pwd_confirm").removeAttr("data-match");
			} else {
			    document.getElementById("pwd").disabled = false;
			    document.getElementById("pwd_confirm").disabled = false;

			    $("#pwd").attr("data-minlength","6");
				$("#pwd").attr("required","");
				$("#pwd").attr("data-required-error","Обязательное поле");
				$("#pwd").attr("data-error", "Не меньше 6 символов");

				$("#pwd_confirm").attr("data-match","#pwd");
				$("#pwd_confirm").attr("data-required-error","Обязательное поле");
				$("#pwd_confirm").attr("data-match-error","Не совпадает с паролем");
				$("#pwd_confirm").attr("required","");

				$('#editForm').validator('validate');
			}
		}

	</script>
</div>