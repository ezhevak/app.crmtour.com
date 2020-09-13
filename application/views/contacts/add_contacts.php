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
//Получаем список менеджеров
try {

	/*По новым клиентам, список менеджеров отображаем только актуальный, а по старым запросам отображаем всех менеджеров.
	2017/07/06 Жевак Е.В.*/
	if($data[0]["Id"] !=""){
		$sql = "SELECT * FROM  `vUsers` where AccId = $AccId order by ManagerName";
	} else {
		$sql = "SELECT * FROM  `vUsers` where AccId = $AccId and Inactive = 0 order by ManagerName";
	}
	
	$result = $conn->query($sql);
	//Можно выбрать менеджера толькоо пользователю с ролью "admin" для остальных пользователя выбрать нельзя
	if($_SESSION['UserRole'] != 'admin'){
			//$control_readonly = "readonly";
			$control_disabled = "disabled";
	}

	while($row = $result->fetch_assoc()){
		if($data[0]["UserId"] ==""){
		//Добавление записи. если id = текущему выбираем, остальне не выбраны
			if($row['Id'] ==$_SESSION['UserId']){
				$dim_managers .= "<option selected value='".$row['Id']."'>".$row['ManagerName']. "</option>";
			} else {
				$dim_managers .= "<option value='".$row['Id'] ."'>".$row['ManagerName']. "</option>";
			}
		} else {
		//обновление записи
			if($row['Id'] == $data[0]["UserId"]){
				$dim_managers .= "<option selected value='".$row['Id']."'>".$row['ManagerName']. "</option>";
			} else {
				$dim_managers .= "<option value='".$row['Id'] ."'>".$row['ManagerName']. "</option>";
			}
		}
	}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}


////Получаем список пол клиента
//try {
//	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and AccId = $AccId and type='Sex' order by OrderBy";
//	$result = $conn->query($sql);
//	while( $row = $result->fetch_assoc()){
//		if ($row["LIC"] == $data[0]["Sex"]){
//			$dim_sex .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
//		} else {
//			$dim_sex .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
//		}
//	}
//} catch (Exception $e) {
//	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
//}

//Получаем Сегменты клиента
try {
	
	//Проверяем значение стандартной сегментации
	$StandartSegment = GetOption("StandartSegment",$_SESSION['AccId']);
	
	
	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and AccId = $AccId and type='Segment' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){
	//Если установлено значение "стандратная сегментация" блокируем возможность выбора выпадающих списков
	if($StandartSegment == "1"){
		if ($row["LIC"] == $data[0]["Segment"]){
			if($row["LIC"] == "VIP" || $row["LIC"] == "NoSegment"){
				$dim_segment .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else {
				$dim_segment .= "<option selected value='".$row['LIC']."' disabled>".$row['Name']."</option>";
			}
		} else {
			if($row["LIC"] == "VIP" || $row["LIC"] == "NoSegment"){
				$dim_segment .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			} else {
				$dim_segment .= "<option value='".$row['LIC']."' disabled>".$row['Name']."</option>";
			}
		}
	//Если не установлено значение "стандратная сегментация" блокируем возможность выбора выпадающих списков
	} else {
		if ($row["LIC"] == $data[0]["Segment"]){
			$dim_segment .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
		} else {
			$dim_segment .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
		}
	}
		
	}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}


////Получаем список источников обращений
//try {
//	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and AccId = $AccId and type='LeadSource' order by OrderBy";
//	$result = $conn->query($sql);
//	while( $row = $result->fetch_assoc()){
//
//			if($row['LIC'] == $data[0]["Source"]){
//				$dim_source .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
//			} else{
//				$dim_source .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
//			}
//		}
//} catch (Exception $e) {
//	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
//}

//echo "true".recordowner($data[0]["UserId"]);
//echo "false".!recordowner($data[0]["UserId"]);
//Проверяем владельца записи. Устанавливаем ограничения:
//только владелец/админ может видеть телефоны клиента
//echo "....".GetOption("Show_Address",$_SESSION['AccId']);
//echo "....".recordowner($data[0]["UserId"]);
if(GetOption("Show_Address",$_SESSION['AccId'])==1){ 
		$PhoneMob  = $data[0]["PhoneMob"];
		$PhoneHome = $data[0]["PhoneHome"];
		$EmailHome = $data[0]["EmailHome"];
		//$EmailWork = $data[0]["EmailWork"];	
} else {
	if(recordowner($data[0]["UserId"]) =="1"){
			$PhoneMob  = $data[0]["PhoneMob"];
			$PhoneHome = $data[0]["PhoneHome"];
			$EmailHome = $data[0]["EmailHome"];
		//	$EmailWork = $data[0]["EmailWork"];	
		} else {
			$PhoneMob  = "";
			$PhoneHome = "";
			$EmailHome = "";
		//	$EmailWork = "";
			//if($data[0]["EmailHome"] != ""){$EmailHome = "";}
			//if($data[0]["EmailWork"] != ""){$EmailWork = "";}
		}
}



$conn->close();

//Делаем кнопки не активными несли нет ContactId=0
if($data[0]["Id"]==0){
	$button = "disabled";
	$needSaveContact = "<p>Пажалуйста сохраните нового клиента.</p>";
	
}



if($data[0]["BlackList"]=="1"){$BlackList = "checked";}
if($data[0]["docBiometric"]=="1"){$docBiometric = "checked";}
if($data[0]["docBiometric"]=="1"){$docBiometricOld = "on";}


	
if($data[0]["Id"] ==""){
	$taskLink = "";
} else {
	$taskLink = "<a id='createTask' target='_blank' href='/tasks/add?model=Contact&modelid=".$data[0]["Id"]."'>Добавить</a>";
}


//Заголовок формы редактирования запросов.
if($data[0]["Id"] ==""){
	$x_title = "Форма редактирования нового клиента";
} else {
	$x_title = "Форма редактирования клиента ".$data[0]["FirstName"]. " ".$data[0]["LastName"];
}
//echo "....".$data[0]["SMTPId"]."....";
//Делаем не активными кнопки отправить email если email пустой и в настройках организации нет профиля для отправки email
//if(empty($data[0]["SMTPId"]) || empty($data[0]["EmailHome"])){
if(empty($data[0]["EmailHome"])){
	
	$EmailHomeDisabled = "disabled";
}
//if( empty($data[0]["EmailWork"])){
//	$EmailWorkDisabled = "disabled";
//}

//echo json_encode($data[0]["Address");



?>

<div id="mwPrintTemplate" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Выбор шаблона печати</h4>
      </div>
      <div class="modal-body">
      	<input id="printDealId" type="hidden">
        <table id="grid_printtemplates"></table>
      </div>
      <div class="modal-footer">
      	<a id="printLink" href='/deals/print?Id=' class='btn btn-primary'><span class='glyphicon glyphicon-print' aria-hidden='true'> Печать</span></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div>

<div id="mwUploadFile" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Загрузка файла</h4>
      </div>
      <div class="modal-body">
        <form id="uploadFileForm" method="post" enctype="multipart/form-data" action="/contacts/uploadphoto">
        	<input name="uploadfile" type="file" id="uploadfile">
			<input type="hidden" name="Id" value="<?php echo $data[0]["Id"];?>">
		</form>
      </div>
      <div class="modal-footer">
      	<button id="uploadLink" class='btn btn-primary' type="button"><span class='glyphicon glyphicon-upload' aria-hidden='true'> Загрузить</span></button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		<div class="x_title"><h2><?php echo $x_title;?></h2>
		<div class="clearfix"></div>
		<div class="x_content"><br>
		
			<form action="/contacts/save" method="post" data-toggle="validator" name="main_edit_form">
		
				<input type="hidden" id="Id" name="Id" value="<?php echo $data[0]["Id"];?>">
				<input type="hidden" id="FormType" name="FormType" value="Client">
				<input type="hidden" id="PhoneMobOld" name="PhoneMobOld" value="<?php echo $data[0]["PhoneMob"];?>">
				<input type="hidden" id="PhoneHomeOld" name="PhoneHomeOld" value="<?php echo $data[0]["PhoneHome"];?>">
				<input type="hidden" id="EmailHomeOld" name="EmailHomeOld" value="<?php echo $data[0]["EmailHome"];?>">
				<!--input type="hidden" id="EmailWorkOld" name="EmailWorkOld" value="<?php echo $data[0]["EmailWork"];?>"-->
				<input type="hidden" id="DateBirthOld" name="DateBirthOld" value="<?php echo $data[0]["DateBirth"];?>">
				
				<input type="hidden" id="passIdOld" name="passIdOld" value="<?php echo $data[0]["passId"];?>">
				<input type="hidden" id="passSurNameOld" name="passSurNameOld" value="<?php echo $data[0]["passSurName"];?>">
				<input type="hidden" id="passGivenNamesOld" name="passGivenNamesOld" value="<?php echo $data[0]["passGivenNames"];?>">
				<input type="hidden" id="passSerNumOld" name="passSerNumOld" value="<?php echo $data[0]["passSerNum"];?>">
				<input type="hidden" id="passIssuedDateOld" name="passIssuedDateOld" value="<?php echo $data[0]["docIssuedDate"];?>">
				<input type="hidden" id="passValidDateOld" name="passValidDateOld" value="<?php echo $data[0]["passValidDate"];?>">
				<input type="hidden" id="passIssuedOld" name="passIssuedOld" value="<?php echo $data[0]["passIssued"];?>">
				<input type="hidden" id="passBiometricOld" name="passBiometricOld" value="<?php echo $docBiometricOld;?>">
				
				
				
				<div class="form-group col-md-2 col-xs-12">
					<label for="ContactPhoto">Фото:<a href="#" id="delphotolink">Удалить</a></label>
					<a id="linkFileUpload" href="#" data-toggle="modal" data-target="#mwUploadFile">
						<div style=" height: 158px; width: 150px;">
							<img id="photo" src="/uploads/getfile?ModelType=contactPhoto&ModelId=<?php echo $data[0]["Id"];?>" alt="Фото контакта" onerror="this.src='/css/no_photo.jpeg';" style="max-height: 158px; max-width: 150px;">
						</div>
						<div id="photoadd" class="round round-lg blue">
		                	<span class="glyphicon glyphicon-upload"></span>
		            	</div>
	            	</a>
	         	</div>
				
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
				    	<label for="contLastName">Фамилия:</label>
						<input type="text" class="form-control" id="contLastName" name="contLastName" value="<?php echo $data[0]["LastName"]; ?>">
					</div>
			    </div>
				
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
				    	<label for="contFirstName">Имя:</label>
						<input type="text" class="form-control" id="contFirstName" name="contFirstName" required value="<?php echo $data[0]["FirstName"]; ?>">
					</div>
			    </div>
				
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
				    	<label for="contMiddleName">Отчество:</label>
						<input type="text" class="form-control" id="contMiddleName" name="contMiddleName" value="<?php echo $data[0]["MiddleName"]; ?>">
					</div>
			    </div>
				
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="contDateBirth">Дата рождения:</label>
						<div class="input-group">
					    	<input type="text" class="form-control" id="contDateBirth" name="contDateBirth" value="<?php if($data[0]["DateBirth"] !== "00.00.0000") { echo toFormat("d.m.Y","d.m.Y",$data[0]["DateBirth"]);} ?>">
					    	<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i></span>
					    </div>
				    </div>
			    </div>
			    
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="contTaxCode">ИНН:</label>
						<input type="text" class="form-control" id="contTaxCode" name="contTaxCode" value="<?php echo $data[0]["TaxCode"]; ?>" readonly>
					</div>
				</div>
			    
				<div class="col-md-3 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="contUserId">Менеджер:</label>
						<select class="form-control" id="contUserId" name="contUserId">
							<?php echo $dim_managers; ?>
						</select>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-12 col-xs-12">
			    	<div class="form-group">
						<label for="contSource">Источник:</label>
						<div class="input-group">
							<span class="input-group-addon"><a href="#" class="addDictionary" data-type="LeadSource" data-id="#contSource"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
							<select class="form-control" id="contSource" name="contSource">
								<option selected value='<?php echo $data[0]["Source"]; ?>'><?php echo $data[0]["SourceName"]; ?></option>
							</select>
						</div>
					</div>
			    </div>
				
		    
			    <div class="col-md-2 col-sm-12 col-xs-12">
			    	<div class="form-group">
						<label class="control-label">Пол:</label>
						<select class="form-control" id="Sex" name="Sex">
							<option selected value='<?php echo $data[0]["Sex"]; ?>' required><?php echo $data[0]["SexName"]; ?></option>
						</select>
					</div>
			    </div>
			    
				
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="contSegment">Сегмент:</label>
						<select class="form-control" id="contSegment" name="contSegment">
							<?php echo $dim_segment; ?>
						</select>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-12 col-xs-12">
			    	<div class="form-group">
						<label for="PhoneMob">Телефон моб:</label>
						<div class="input-group">
							<span class='input-group-btn'>
								<a href="tel:<?php echo $PhoneMob; ?>" type='button' class='btn btn-primary' <?php echo $PhoneMob; ?>><span class="glyphicon glyphicon-earphone"></span></a>
							</span>
							<input type="text" class="form-control" id="PhoneMob" name="PhoneMob" value="<?php echo $PhoneMob; ?>" readonly>
							<span class='input-group-btn'>
								<button type='button' id='getPhonesBtn1' class='btn btn-primary' data-toggle="modal" data-target="#mwPhones"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span></button>
								<button type='button' class='btn btn-primary'><span class="glyphicon glyphicon-copy" aria-hidden="true" onclick="copyToClipboard('#PhoneMob')"></span></button>
							</span> 
						</div>
					</div>
			    </div>
				<div class="col-md-3 col-sm-12 col-xs-12">
			    	<div class="form-group">
						<label for="PhoneHome">Телефон дом:</label>
						<div class="input-group">
							<span class='input-group-btn'>
								<a href="tel:<?php echo $PhoneHome; ?>" type='button' class='btn btn-primary' <?php echo $PhoneHome; ?>><span class="glyphicon glyphicon-earphone"></span></a>
							</span>
							<input type="text" class="form-control" id="PhoneHome" name="PhoneHome" value="<?php echo $PhoneHome; ?>" readonly>
							<span class='input-group-btn'>
								<button type='button' id='getPhonesBtn2' class='btn btn-primary' data-toggle="modal" data-target="#mwPhones"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span></button>
								<button type='button' class='btn btn-primary'><span class="glyphicon glyphicon-copy" aria-hidden="true" onclick="copyToClipboard('#PhoneHome')"></span></button>
							</span> 
						</div>
					</div>
			    </div>
			    
				<div class="col-md-4 col-sm-12 col-xs-12">
			    	<div class="form-group">
						<label for="EmailHome">Email домашний:</label>
						<div class="input-group">
							<span class='input-group-btn'>
								<a href="mailto:<?php echo $EmailHome; ?>" type='button' class='btn btn-primary' <?php echo $EmailHomeDisabled; ?>>@</a>
							</span>
							<input type='email' class='form-control' id='EmailHome' name='EmailHome' value="<?php echo $EmailHome; ?>" readonly>
							<span class='input-group-btn'>
								<button type='button' id='getEmailsBtn' class='btn btn-primary' data-toggle="modal" data-target="#mwEmails"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span></button>
								<button type='button' class='btn btn-primary'><span class="glyphicon glyphicon-copy" aria-hidden="true" onclick="copyToClipboard('#EmailHome')"></span></button>
							</span> 
						</div>
					</div>
			    </div>
				
				<!--div class="form-group col-md-3 col-xs-12">
					<label for="EmailWork">Email рабочий:</label>
					<div class='input-group'>
						<input type='email' class='form-control input-sm' id='EmailWork' name='EmailWork' value="<?php echo $EmailWork; ?>" readonly>
							<span class='input-group-btn'><span class='input-group-btn'><button type='button' class='btn btn-primary btn-sm'><span class="glyphicon glyphicon-copy" aria-hidden="true" onclick="copyToClipboard('#EmailWork')"></span></button>
								<button id='SendMailWorkButton'type='button' class='btn btn-primary btn-sm' data-toggle="modal" data-target="#emailDiv"<?php echo $EmailWorkDisabled; ?>>@</button>
							</span> 
					</div>
				</div-->
				
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="passSurName">SurName:</label>
						<input type="text" class="form-control" id="passSurName" name="passSurName" value="<?php echo $data[0]["passSurName"]; ?>" readonly>
					</div>
				</div>
				
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="passGivenNames">Given Names:</label>
						<input type="text" class="form-control" id="passGivenNames" name="passGivenNames" value="<?php echo $data[0]["passGivenNames"]; ?>" readonly>
					</div>
				</div>
				
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="passSerNum">Серия №:</label>
						<input type="text" class="form-control" id="passSerNum" name="passSerNum" value="<?php echo $data[0]["passSerNum"]; ?>" readonly>
					</div>
				</div>
				
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="passIssuedDate">Дата выдачи:</label>
						<input type="text" class="form-control" id="passIssuedDate" name="passIssuedDate" value="<?php echo toFormat("d.m.Y","d.m.Y",$data[0]["docIssuedDate"]); ?>">
					</div>
				</div>
				
				
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="passValidDate">Действ. до:</label>
						<input type="text" class="form-control" id="passValidDate" name="passValidDate" value="<?php echo toFormat("d.m.Y","d.m.Y",$data[0]["passValidDate"]); ?>">
					</div>
				</div>
				
				
				<div class="form-group col-md-2 col-xs-12">
					<label for="passIssued">Кем выдан:</label>
					<div class="input-group">
					  <span class="input-group-addon">
					    Био <input type="checkbox" id="passBiometric" name="passBiometric" <?php echo $docBiometric ?>>
					  </span>
					  <input type="text" class="form-control" id="passIssued" name="passIssued" value="<?php echo $data[0]["passIssued"]; ?>" readonly>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="contAddress">Адрес:</label>
						<textarea type="text" class="form-control" rows="3" id="contAddress" name="contAddress"><?php echo $data[0]["Address"]; ?></textarea>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="contComments">Коментарий:</label>
						<textarea class="form-control" rows="3" id="contComments" name="contComments"><?php echo $data[0]["Comments"]; ?></textarea>
					</div>
				</div>
				
				<div class="form-group col-md-12 col-xs-12">
					<input type="checkbox" id="BlackList" name="BlackList" <?php echo $BlackList ?>> Чёрный список 
					<input type="checkbox" id="agree" name="agree" onclick="editForm(this.form)"> Я хочу изменить данные клиента
				</div>	
				
				
				<div class="form-group col-md-12 col-xs-12">
					<button type="submit" id="btnsubmit" class="btn btn-success">Сохранить</button>
					<a href="/contacts" class="btn btn-default" style="margin-left: 10px;">Отменить</a>
				</div>
			</form>
			</br>
			
		</div>
		</div>
		</div>
	</div>
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		<div class="x_title"><h2>Сделки клиента</h2>
			<ul class="nav navbar-right">
			  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
			</ul>
		<div class="clearfix"></div>
		<div class="x_content"><br>
			<table id="deals-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
			    <tr>
			      	<th>Id</th>
			        <th>№ договора</th>
			        <th>Тип</th>
			        <!--th>Клиент</th-->
			        <th>Дата</th>
			        <th>№ заявки</th>
			        <th>Оператор</th>
			        <th>Страна</th>
			        <!--th>Месяц</th-->
			        <th>Оплачен</th>
			        <th>Сумма</th>
			        <th>Оплаты</th>
			        <th>Вылет</th>
			        <th>Регион</th>
			        <th>Отель</th>
			        <th>Менеджер</th>
			        <th>- - - Действия - - -</th>
			    </tr>
			  </thead>
			</table>
		</div>
		</div>
		</div>
	</div>
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		<div class="x_title"><h2>Запросы клиента</h2>
			<ul class="nav navbar-right">
			  <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
			</ul>
		<div class="clearfix"></div>
		<div class="x_content" style="display:none;"><br>
			<table id="leads-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
			    <tr>
			      	<th>Id</th>
			        <th>Статус</th>
			        <th>Дата</th>
			        <th>Фамилия</th>
			        <th>Имя</th>
			        <th>Менеджер</th>
			        <th>Приоритет</th>
			        <th>Действия</th>
			    </tr>
			  </thead>
			</table>
		</div>
		</div>
		</div>	
	</div>	
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		<div class="x_title"><h2>Документы клиента</h2>
			<ul class="nav navbar-right">
		      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
		    </ul>
		<div class="clearfix"></div>
		<div class="x_content" style="display:none;"><br>
			<table id="docs-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
			    <tr>
			      	<th>Тип документа</th>
			        <th>SurName</th>
			        <th>Name</th>
			        <!--th>Запись №</th-->
			        <th>Серия №</th>
			        <th>Дата выдачи</th>
			        <th>Действителен до </th>
			        <th>Орган выдачи</th>
			        <th>Биометрический</th>
			        <th>Основной</th>
			        <th>Сканкопия</th>
			        <th>Действия</th>
			    </tr>
			  </thead>
			</table>
		</div>
		</div>
		</div>	
	</div>
	
	<div class="col-md-6 col-sm-6 col-xs-12">
	
		<div class="x_panel">
		<div class="x_title"><h2>Связанные физ. лица</h2>
		<ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
	    </ul>
	    
		<div class="clearfix"></div>
			<div class="x_content" style="display:none;"><br>
			<p>
				<a id="linkedContacts" href="#" data-toggle="modal" data-target="#mwlinkedContacts">Выбрать связанный контакт <span class="glyphicon glyphicon-upload" aria-hidden="true"></span></a>
			</p>
				<div class="card">
				  <ul id="linkedContactsList"class="list-group list-group-flush">
				  </ul>
				</div>
			</div>
		</div>
		</div>
	</div>
		
	<div class="col-md-6 col-sm-6 col-xs-12">
	
		<div class="x_panel">
		<div class="x_title"><h2>Связанные юр. лица</h2>
		<ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
	    </ul>
	    
		<div class="clearfix"></div>
			<div class="x_content" style="display:none;"><br>
			<p>
				<a id="linkedLegals" href="#" data-toggle="modal" data-target="#mwlinkedLegals">Выбрать связанное юр. лицо <span class="glyphicon glyphicon-upload" aria-hidden="true"></span></a>
			</p>
				<div class="card">
				  <ul id="linkedLegalsList"class="list-group list-group-flush">
				  </ul>
				</div>
			</div>
		</div>
		</div>
	</div>
	
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
		<div class="x_title"><h2>Связанные задачи <?php echo $taskLink;?></h2> 
		<ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
	    </ul>
			<div class="clearfix"></div>
			
			<div id="x_content_linked_tasks" class="x_content"  style="display:none;"><br>
				
			</div>
		</div>
		</div>
	</div>
		
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
		<div class="x_title"><h2>Дополнительная информация</h2>
		<ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
	    </ul>
	    
		<div class="clearfix"></div>
			<div id="x_content_additional_info" class="x_content" style="display:none;"><br>
		
			</div>
		</div>
		</div>
	</div>
		
	<!--Форма добавления связи с контактом-->
	<div id="mwlinkedContacts" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Добавить связь с контактом</h4>
			  </div>
			  <div class="modal-body">
			    <form id="linkedContactsForm" method="post" enctype="multipart/form-data" action="#">
					<input type="hidden" id="LinkedContactId" name="LinkedContactId" value="<?php echo $data[0]["Id"];?>">
					<div class="form-group col-md-12 col-xs-12">
						<label for="LinkedParrContactId">ФИО связанного лица:</label>
						<select class="form-control input-sm" id="LinkedParrContactId" name="LinkedParrContactId">
						</select>
					</div>
					<div class="form-group col-md-12 col-xs-12">
						<label for="LinkedComments">Краткое описание связи:</label>
						<textarea class="form-control input-sm" rows="4" id="LinkedComments" name="LinkedComments" placeholder="Семья, брат, друг, любовница"></textarea>
					</div>
				</form>
			  </div>
			  <div class="modal-footer">
			  	<button id="linkedContactSave" class='btn btn-primary' type="button"><span class='glyphicon glyphicon-save' aria-hidden='true'> Сохранить</span></button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
			  </div>
			</div>
		</div>
	</div>
	<!--Форма добавления связи с контактом-->

		
	<!--Форма добавления связи с юр. лицом-->
	<div id="mwlinkedLegals" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Добавить связь с юр. лицом</h4>
			  </div>
			  <div class="modal-body">
			    <form id="linkedLegalsForm" method="post" action="#">
					<input type="hidden" id="LinkedLegalContactId" name="LinkedLegalContactId" value="<?php echo $data[0]["Id"];?>">
					<div class="form-group col-md-12 col-xs-12">
						<label for="LinkedLegalId">Название компании:</label>
						<select class="form-control input-sm" id="LinkedLegalId" name="LinkedLegalId">
						</select>
					</div>
					<div class="form-group col-md-12 col-xs-12">
						<label for="LinkedLegalComments">Краткое описание связи:</label>
						<textarea class="form-control input-sm" rows="4" id="LinkedLegalComments" name="LinkedLegalComments" placeholder="Директор, бухгалтер, учредитель"></textarea>
					</div>
				</form>
			  </div>
			  <div class="modal-footer">
			  	<button id="linkedLegalSave" class='btn btn-primary' type="button"><span class='glyphicon glyphicon-save' aria-hidden='true'> Сохранить</span></button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
			  </div>
			</div>
		</div>
	</div>
	<!--Форма добавления связи с юр. лицом-->
	
	<!--Форма отображения телефонов-->
	<div id="mwPhones" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Телефоны клиента</h4>
			  </div>
			  <div class="modal-body">
			  	<p><span class='glyphicon glyphicon-send' aria-hidden='true'></span> - Рассылка, <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>  - Основной телефон, <strike>Телефон не активный</strike></p>
				<div class="card">
				  <ul id="PhonesList"class="list-group list-group-flush">
				  </ul>
				</div>
			   
			   
			  </div>
			  <div class="modal-footer">
			  	<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
			  </div>
			</div>
		</div>
	</div>
	<!--Форма отображения телефонов-->
	
	<!--Форма отображения Email-->
	<div id="mwEmails" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Email клиента</h4>
			  </div>
			  <div class="modal-body">
			  	<p><span class='glyphicon glyphicon-send' aria-hidden='true'></span> - Рассылка, <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>  - Основной телефон, <strike>Email не активный</strike></p>
				<div class="card">
				  <ul id="EmailsList"class="list-group list-group-flush">
				  </ul>
				</div>
			   
			   
			  </div>
			  <div class="modal-footer">
			  	<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
			  </div>
			</div>
		</div>
	</div>
	<!--Форма отображения Email-->
	
	<!--Форма добавления нового справочника-->
	<div id="mwAddDictionary" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Добавление нового значения</h4>
			  </div>
			  <div class="modal-body">
			  	<form id="form-dictionary" action="#" method="post" data-toggle="validator">
			  		<input type="hidden" id="dicType" name="dicType">
					<input type="hidden" id="_id" name="_id">
					<div class="form-group col-md-12 col-xs-12">
						<label for="dicName">Укажите новое значение:</label>
						<input type="text" class="form-control input-md" id="dicName" name="dicName" data-error="Значение, обязательное к заполнению" required>
						<div class="help-block with-errors"></div>
					</div>
				</form>
			  </div>
			  <div class="modal-footer">
			  	<button Id="btnSaveDic" type="submit" form="form-dictionary" class="btn btn-success">Сохранить</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
			  </div>
			</div>
		</div>
	</div>
	<!--Форма добавления нового справочника-->
	
	<script>
		//По умолчанию вся форма ReadOnly
		window.onload = check("<?php if (isset($_GET["Id"]) && $_GET["Id"] != "") echo "Y"; else echo "N";?>");
		
		//if(document.getElementById("Id").value !=""){
		//		document.title = "CRM Tour - "+document.getElementById("contFirstName").value + " " + document.getElementById("contLastName").value;
		//}
		
		function editForm(f) {
		    if (f.agree.checked) {
				check("N");
			} else {
				check("Y");
			}
		}


		//Функция по Id контрола делает поля на форме не активными
		function check(flg) {
			if(<?php if (isset($_GET["Id"]) && $_GET["Id"] != "") echo "flg"; else echo '"N"';?> =="Y"){
				
			    document.getElementById("contLastName").readOnly = true;
			    document.getElementById("contFirstName").readOnly = true;
			    document.getElementById("contMiddleName").readOnly = true;
			    document.getElementById("contDateBirth").readOnly = true;
			    document.getElementById("contUserId").readOnly = true;
			    document.getElementById("contSegment").disabled = true;
			    document.getElementById("Sex").disabled = true;
			    document.getElementById("contComments").readOnly = true;
			    document.getElementById("btnsubmit").disabled = true;
			    document.getElementById("contTaxCode").readOnly = true;
			    document.getElementById("contAddress").readOnly = true;
			    document.getElementById("contSource").disabled = true;
			    document.getElementById("BlackList").disabled = true;
			    document.getElementById("contUserId").disabled = true;
			    document.getElementById("PhoneMob").readOnly = true;
			    document.getElementById("PhoneHome").readOnly = true;
			    document.getElementById("EmailHome").readOnly = true;
			    //document.getElementById("EmailWork").readOnly = true;
			    document.getElementById("passSurName").readOnly = true;
			    document.getElementById("passGivenNames").readOnly = true;
			    document.getElementById("passSerNum").readOnly = true;
			    document.getElementById("passIssuedDate").readOnly = true;
			    document.getElementById("passValidDate").readOnly = true;
			    document.getElementById("passIssued").readOnly = true;
			    document.getElementById("passBiometric").disabled = true;
			    
			} else {
			    document.getElementById("contLastName").readOnly = false;
			    document.getElementById("contFirstName").readOnly = false;
			    document.getElementById("contMiddleName").readOnly = false;
			    document.getElementById("contDateBirth").readOnly = false;
			    document.getElementById("contUserId").readOnly = false;
			    document.getElementById("contSegment").disabled = false;
			    document.getElementById("Sex").disabled = false;
			    document.getElementById("contComments").readOnly = false;
			    document.getElementById("btnsubmit").disabled = false;
			    document.getElementById("contTaxCode").readOnly = false;
			    document.getElementById("contAddress").readOnly = false;
			    document.getElementById("contSource").disabled = false;
			    document.getElementById("BlackList").disabled = false;
			    document.getElementById("contUserId").disabled = false;
			    document.getElementById("PhoneMob").readOnly = false;
			    document.getElementById("PhoneHome").readOnly = false;
			    document.getElementById("EmailHome").readOnly = false;
			    //document.getElementById("EmailWork").readOnly = false;
			    document.getElementById("passSurName").readOnly = false;
			    document.getElementById("passGivenNames").readOnly = false;
			    document.getElementById("passSerNum").readOnly = false;
			    document.getElementById("passIssuedDate").readOnly = false;
			    document.getElementById("passValidDate").readOnly = false;
			    document.getElementById("passIssued").readOnly = false;
			    document.getElementById("passBiometric").disabled = false;
			}
		}
		
	</script>
	

	
</div>