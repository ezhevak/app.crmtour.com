<?php
$conn = new mysqli(
			$GLOBALS['DB_HOST'],
			$GLOBALS['DB_USER'],
			$GLOBALS['DB_PASSWORD'],
			$GLOBALS['DB_NAME']);
		$conn->	set_charset("utf8");//исправляем иероглифы

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

	$AccId =$_SESSION['AccId'];


if($data[0]["Type"] == "Phone"){
	$SubType =" and SubType = 'Phone'";
}	else if ($data[0]["Type"] == "Email"){
	$SubType = " and SubType = 'Email'";
} else {
	$SubType = "";
}



//Получаем список типов адреса
try {
	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and AccId = $AccId and type='AddressType'".$SubType;
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){

			if($row['LIC'] == $data[0]["Type"]){
				$dim_type .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$dim_type .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}
		}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

$conn->close();


//Если новый адрес по умолчанию всё активно
//if($data[0]["Id"]==""){
//	$checkedActive = "checked";
//	$checkedSend = "checked";
//	$LastAdd = "checked";
//} else {
	if($data[0]["Active"]=="1"){$checkedActive = "checked";}
	if($data[0]["Send"]=="1"){$checkedSend = "checked";}
	if($data[0]["LastAdd"]=="1"){$LastAdd = "checked";}
//}
//Проверяем какой тип адреса добавляют или изменяют

if($data[0]["Type"] == "Phone"){
	$printAddress = "Номер телефона:";
	$addressType = "tel";
	$addressMessage = "Телефон, обязателен к заполнению.";
	$addressPlaceholder="+XX(XXX)XXX-XXXX";
	$inputId = "Phone";
	$x_title_type = "телефона";
} else if ($data[0]["Type"] == "Email"){
	$printAddress = "Email адрес:";		
	$addressType = "email";
	$addressMessage = "Email, обязателен к заполнению.";
	$addressPlaceholder="Введите адрес email";
	$inputId = "Address";
	$x_title_type = "Email";
	
} else {
	$printAddress = "Другой адрес:";	
	$addressType = "text";
	$addressMessage = "Другой адрес, обязателен к заполнению.";
	$inputId = "Address";
	$x_title_type = "";
}

//Запрещено изменять сам адрес, только добавлять
if($data[0]["Id"]!=""){
	$readOnly = "readonly";
}

//Заголовок формы редактирования запросов.
if($data[0]["Id"] ==""){
	$x_title = "Форма редактирования нового ".$x_title_type." ".$data[0]["ContactFirstName"]." ".$data[0]["ContactLastName"] ;
} else {
	$x_title = "Форма редактирования  ".$x_title_type." ".$data[0]["ContactFirstName"]. " ".$data[0]["ContactLastName"];
}

?>

<div id="view_div" class="container-fluid">
	
<div class="x_panel">
<div class="x_title"><h2><?php echo $x_title;?></h2>
<div class="clearfix"></div>
<div class="x_content"><br>

	<form action="/address/save" method="post" data-toggle="validator">
		<input type="hidden" name="ContactId" value="<?php echo $data[0]["ContactId"];?>">
		<input type="hidden" name="LegalId" value="<?php echo $data[0]["LegalId"];?>">
		<input type="hidden" name="Id" value="<?php echo $data[0]["Id"];?>">
		<input type="hidden" name="UserId" value="<?php echo $_SESSION['UserId'];?>">
		<input type="hidden" name="SubType" value="<?php echo $data[0]["SubType"];?>">
		

		<div class="row">
			<div class="form-group col-md-3 col-xs-12">
				<label for="Type">Тип:</label>
				<select class="form-control input-sm" id="Type" name="Type">
					<?php echo $dim_type; ?>
				</select>
			</div>
			<div class="form-group col-md-3 col-xs-12">
				<label for="<?php echo $inputId; ?>"><?php echo $printAddress; ?></label>
				<input type="<?php echo $addressType; ?>" class="form-control input-sm" id="<?php echo $inputId; ?>" name="Address"
						value="<?php echo $data[0]["Address"]; ?>" <?php echo $readOnly; ?> data-error="<?php echo $addressMessage; ?>" 
						placeholder="<?php echo $addressPlaceholder; ?>">
				<div class="help-block with-errors"></div>
			</div>
	
		</div>
		<div class="row">
			<div class="form-group col-md-6 col-xs-12">
				<label for="Comments">Комментарий:</label>
				<textarea class="form-control input-sm" rows="5" id="Comments" name="Comments"><?php echo $data[0]["Comments"]; ?></textarea>
			</div>
		</div>
		
		<div class="row">
			<div class="form-group col-md-2 col-xs-12">
				<label for="Active"><input type="checkbox" id="Active" name="Active" <?php echo $checkedActive ?>/onclick="editForm(this.form)"> Активный</label>
			</div>
			<div class="form-group col-md-2 col-xs-12">
			
				<label for="Send"><input type="checkbox" id="Send" name="Send" <?php echo $checkedSend ?>/> Рассылка</label>
			</div>
			<div class="form-group col-md-2 col-xs-12">
			
				<label for="LastAdd"><input type="checkbox" id="LastAdd" name="LastAdd" <?php echo $LastAdd ?>/> Основной</label>
			</div>
		</div>
		<div class="row">
			<button type="submit" class="btn btn-default">Сохранить</button><a href="/contacts/add?Id=<?php echo $data[0]["ContactId"]; ?>" class="btn btn-default" style="margin-left: 10px">Отменить</a>
		</div>
	</form>
</div>
</div>
</div>
	<script>
		function on_load() {
			$('#Phone').inputmask('+39(999)999-9999');
			
			$('input:first').focus();
		}
		//Если установлен признак Active = true то делаем ставим checkbox Send = checked
		function editForm(f) {
		    if (f.Active.checked) {
		    	document.getElementById("Send").checked = true;
		    	document.getElementById("LastAdd").checked = true;
			} else {
		    	document.getElementById("Send").checked = false;
		    	document.getElementById("LastAdd").checked = false;
			}
		}
		
		
	</script>
</div>