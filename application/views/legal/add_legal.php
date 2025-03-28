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
//Получаем список менеджеров
try {
	$AccId =$_SESSION['AccId'];

	$sql = "SELECT * FROM  `vUsers_materialized` where AccId = $AccId";
	$result = $conn->query($sql);
	//Можно выбрать менеджера толькоо пользователю с ролью "admin" для остальных пользователя выбрать нельзя
	if($_SESSION['UserRole'] != 'admin'){
			$control_readonly = "readonly";
	}
		while($row = $result->fetch_assoc()){
			if($data[0]["UserId"] ==""){
			//Добавление записи. если id = текущему выбираем, остальне не выбраны
				if($row['Id'] ==$_SESSION['UserId']){
					$dim_managers .= "<option ".$control_readonly." selected value='".$row['Id']."'>".$row['ManagerName']. "</option>";
				} else {
					$dim_managers .= "<option ".$control_readonly." value='".$row['Id'] ."'>".$row['ManagerName']. "</option>";
				}
			}else {
			//обновление записи
				if($row['Id'] == $data[0]["UserId"]){
					$dim_managers .= "<option ".$control_readonly." selected value='".$row['Id']."'>".$row['ManagerName']. "</option>";
				} else {
					$dim_managers .= "<option ".$control_readonly." value='".$row['Id'] ."'>".$row['ManagerName']. "</option>";
				}
			}
		}
	
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

$conn->close();

//Делаем кнопки не активными несли нет ContactId=0
if($data[0]["Id"]==0){
	$button = "disabled";
}

//Заголовок формы редактирования запросов.
if($data[0]["Id"] ==""){
	$x_title = "Форма редактирования нового юр. лица";
} else {
	$x_title = "Форма редактирования юр. лица ".$data[0]["LegalName"];
}

if($data[0]["Id"] ==""){
	$taskLink = "#";
} else {
	$taskLink = "/tasks/add?model=Legal&modelid=".$data[0]["Id"];
}

?>

<div class="container-fluid">
	<div class="col-md-12 col-sm-12 col-xs-12 form-group">
		
		<div class="x_panel">
		<div class="x_title"><h2><?php echo $x_title;?></h2>
		<ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	    </ul>
		<div class="clearfix"></div>
		<div class="x_content"><br>
			<form id="form-legal" 
				  action="/legal/save" 
				  method="post"
				  data-toggle="validator"
			>
				<input type="hidden" name="Id" id="Id" value="<?php echo $data[0]["Id"];?>">
				
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalName">Название юр. лица:</label>
					<input type="text" class="form-control input-sm" id="LegalName" name="LegalName" value="<?php echo $data[0]["LegalName"]; ?>" data-error="Название юр. лица, обязательно к заполнению" required>
				</div>
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalOfficeAddress">Адрес юридический:</label>
					<input type="text" class="form-control input-sm" id="LegalOfficeAddress" name="LegalOfficeAddress" value="<?php echo $data[0]["LegalOfficeAddress"]; ?>">
				</div>
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalFactAddress">Адрес фактический:</label>
					<input type="text" class="form-control input-sm" id="LegalFactAddress" name="LegalFactAddress" value="<?php echo $data[0]["LegalFactAddress"]; ?>">
				</div>
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalCode">ЕДРПОУ клиента:</label>
					<input type="text" class="form-control input-sm" id="LegalCode" name="LegalCode" value="<?php echo $data[0]["LegalCode"]; ?>">
				</div>
				
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalOfficePhone">Телефон городской:</label>
					<input type="tel" class="form-control input-sm" id="LegalOfficePhone" name="LegalOfficePhone" value="<?php echo $data[0]["LegalOfficePhone"]; ?>" placeholder="+38(067)555-4422">
				</div>
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalOfficeMobile">Мобильный:</label>
					<input type="tel" class="form-control input-sm" id="LegalOfficeMobile" name="LegalOfficeMobile" value="<?php echo $data[0]["LegalOfficeMobile"]; ?>" placeholder="+38(067)555-4422">
				</div>
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalOfficeFax">Факс:</label>
					<input type="tel" class="form-control input-sm" id="LegalOfficeFax" name="LegalOfficeFax" value="<?php echo $data[0]["LegalOfficeFax"]; ?>" placeholder="+38(067)555-4422">
				</div>
				
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalOfficeEmail">Email:</label>
					<input type="email" class="form-control input-sm" id="LegalOfficeEmail" name="LegalOfficeEmail" value="<?php echo $data[0]["LegalOfficeEmail"]; ?>">
				</div>
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalBankName">Название банка:</label>
					<input type="text" class="form-control input-sm" id="LegalBankName" name="LegalBankName" value="<?php echo $data[0]["LegalBankName"]; ?>">
				</div>
				
				<!--div class="form-group col-md-3 col-xs-12">
					<label for="LegalCode">ЕДРПОУ банка:</label>
					<input type="text" class="form-control input-sm" id="LegalCode" name="LegalCode" value="<?php echo $data[0]["LegalCode"]; ?>">
				</div-->
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalAccountNum">Счёт в банке:</label>
					<input type="text" class="form-control input-sm" id="LegalAccountNum" name="LegalAccountNum" value="<?php echo $data[0]["LegalAccountNum"]; ?>">
				</div>
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalBankIban">Международный счёт Iban:</label>
					<input type="text" class="form-control input-sm" id="LegalBankIban" name="LegalBankIban" value="<?php echo $data[0]["LegalBankIban"]; ?>">
				</div>
				
				
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalMFO">МФО банка:</label>
					<input type="text" class="form-control input-sm" id="LegalMFO" name="LegalMFO" value="<?php echo $data[0]["LegalMFO"]; ?>">
				</div>
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="TaxNumber">Индивидуальный налоговый номер:</label>
					<input type="text" class="form-control input-sm" id="TaxNumber" name="TaxNumber" value="<?php echo $data[0]["TaxNumber"]; ?>">
				</div>
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="SignerPosition">Должность подписанта:</label>
					<input type="text" class="form-control input-sm" id="SignerPosition" name="SignerPosition" value="<?php echo $data[0]["SignerPosition"]; ?>">
				</div>
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="SignerFIO">ФИО подписанта:</label>
					<input type="text" class="form-control input-sm" id="SignerFIO" name="SignerFIO" value="<?php echo $data[0]["SignerFIO"]; ?>">
				</div>
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="SignerBasis">Основания для подписи:</label>
					<input type="text" class="form-control input-sm" id="SignerBasis" name="SignerBasis" value="<?php echo $data[0]["SignerBasis"]; ?>">
				</div>
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="AccountantFIO">ФИО бухгалтера:</label>
					<input type="text" class="form-control input-sm" id="AccountantFIO" name="AccountantFIO" value="<?php echo $data[0]["AccountantFIO"]; ?>">
				</div>
				
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="VATcertificateNumber">Номер свидетельства НДС:</label>
					<input type="text" class="form-control input-sm" id="VATcertificateNumber" name="VATcertificateNumber" value="<?php echo $data[0]["VATcertificateNumber"]; ?>">
				</div>
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="TaxForm">Форма плательщика налога:</label>
					<input type="text" class="form-control input-sm" id="TaxForm" name="TaxForm" value="<?php echo $data[0]["TaxForm"]; ?>">
				</div>
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalDealStart">Дата подписания договора:</label>
					<input type="text" class="form-control input-sm" id="LegalDealStart" name="LegalDealStart" value="<?php echo toFormat("Y-m-d","d.m.Y",$data[0]["LegalDealStart"]); ?>">
				</div>
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalDealEnd">Дата окончания договора:</label>
					<input type="text" class="form-control input-sm" id="LegalDealEnd" name="LegalDealEnd" value="<?php echo toFormat("Y-m-d","d.m.Y",$data[0]["LegalDealEnd"]); ?>">
				</div>
				
				<div class="form-group col-md-3 col-xs-12">
					<label for="LegalDealEnd">Менеджер:</label>
					<select class="form-control input-sm" id="UserId" name="UserId">
						<?php echo $dim_managers; ?>
					</select>
				</div>
		
					
				
				<div class="form-group col-md-12 col-xs-12">
					<label for="LegalComments">Комментарий:</label>
					<textarea type="text" class="form-control input-sm" rows="5" id="LegalComments" name="LegalComments"><?php echo $data[0]["LegalComments"]; ?></textarea>
				</div>
				
				<!--div class="ln_solid"></div-->
				
		        <div class="form-group">
			        <div class="col-md-6 col-sm-6 col-xs-12">
			        
			        <button Id="saveButton" type="submit" form="form-legal" class="btn btn-success">Сохранить</button>
			        
			    	<a id="cancelButton" href="/legal" class="btn btn-default" style="margin-left: 10px">Отменить</a>
			        </div>
		        </div>
				
			
			</form>
		</div>
		</div>
		</div>
	</div>
	
	<div class="col-md-12 col-sm-12 col-xs-12 form-group">
		<div class="x_panel">
		<div class="x_title"><h2>Связанные сделки</h2> 
		<ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	    </ul>
		<div class="clearfix"></div>
		
				<table id="legals-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				  <thead>
				    <tr>
				      	<th>Id</th>
				        <th>№ договора</th>
				        <th>Дата</th>
				        <th>№ заявки</th>
				        <th>Оператор</th>
				        <th>Страна</th>
				        <th>Оплачен</th>
				        <th>Сумма</th>
				        <th>Оплаты</th>
				        <th>Вылет</th>
				        <th>Менеджер</th>
				        <th>- - - Действия - - -</th>
				    </tr>
				  </thead>
				</table>
		
		
		
		
		</div>
		</div>
	</div>
	
	
	
	
	<div class="col-md-6 col-sm-12 col-xs-12 form-group">
		<div class="x_panel">
		<div class="x_title"><h2>Связанные задачи <a id="createTask" target="_blank" href="<?php echo $taskLink;?>">Добавить </a></h2> 
		<ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	    </ul>
		<div class="clearfix"></div>
	</div>
			
			
	<div class="col-md-6 col-sm-12 col-xs-12 form-group">
		<div id="x_content_linked_tasks" class="x_content"><br>
			
		</div>
		</div>
		</div>
	</div>
</div>