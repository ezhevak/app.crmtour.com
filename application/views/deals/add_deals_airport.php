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

$AccId = $_SESSION['AccId'];
$_SESSION['ACTIVE_TAB'] = "";
//Получаем список типов сделок
try {
	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and AccId = $AccId and type='DealType' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){

			if($row['LIC'] == $data[0]["DealType"]){
				$dim_type .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$dim_type .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}
		}
	} catch (Exception $e) {
		echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}


//Получаем список Операторов
try {
	$sql = "SELECT * FROM `dimOperators` Where AccId = $AccId  order by Name";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){

			if($row['Name'] == $data[0]["OperatorName"]){
				$dim_OperatorName .= "<option selected value='".$row['Id']."'>".$row['Name']."</option>";
			} else{
				$dim_OperatorName .= "<option value='".$row['Id']."'>".$row['Name']."</option>";
			}
		}
	} catch (Exception $e) {
		echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}


//Получаем список менеджеров
try {
	$AccId =$_SESSION['AccId'];

	//$sql = "SELECT * FROM  `vUsers` where AccId = $AccId order by ManagerName";
//	echo $data[0]["Id"];
	if($data[0]["Id"] >0){
		$sql = "SELECT * FROM  `vUsers` where AccId = $AccId order by ManagerName";
	} else {
		$sql = "SELECT * FROM  `vUsers` where AccId = $AccId and Inactive = 0 order by ManagerName";
	}
	
	
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
	/*}*/
	
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}


//Получаем список питания
try {
	$sql = "SELECT * FROM `Dictionaries` where Active = 'Y' and AccId = $AccId and type='FeedType' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){

			if($row['LIC'] == $data[0]["FeedId"]){
				$dim_FeedName .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$dim_FeedName .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}
		}
	} catch (Exception $e) {
		echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

//Получаем список тип номера
try {
	$sql = "SELECT * FROM `Dictionaries` where Active = 'Y' and AccId = $AccId and type = 'FlatType' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){

			if($row['LIC'] == $data[0]["FlatTypeId"]){
				$dim_FlatTypeName .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$dim_FlatTypeName .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}
		}
	} catch (Exception $e) {
		echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

//Получаем список тип трансфера
try {
	$sql = "SELECT * FROM `Dictionaries` where Active = 'Y' and AccId = $AccId and type = 'Transfer' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){

			if($row['LIC'] == $data[0]["TransferId"]){
				$dim_TransferName .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$dim_TransferName .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}
		}
	} catch (Exception $e) {
		echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}



//Получаем список тип трансфера
try {
	$sql = "SELECT * FROM `Dictionaries` where Active = 'Y' and AccId = $AccId and type = 'RoomView' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){

			if($row['LIC'] == $data[0]["RoomViewId"]){
				$dim_RoomViewName .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$dim_RoomViewName .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}
		}
	} catch (Exception $e) {
		echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

//Получаем список тип трансфера
try {
	$sql = "SELECT * FROM `Dictionaries` where Active = 'Y' and AccId = $AccId and type = 'AgentClient' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){

			if($row['LIC'] == $data[0]["AgentClient"]){
				$dim_AgentClient .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$dim_AgentClient .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}
		}
	} catch (Exception $e) {
		echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

//Получаем список тип трансфера
try {
	$sql = "SELECT * FROM `Dictionaries` where Active = 'Y' and AccId = $AccId and type = 'PlacingType' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){

			if($row['LIC'] == $data[0]["PlacingId"]){
				$dim_PlacingType .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				
				$dim_PlacingType .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}
		}
	} catch (Exception $e) {
		echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}


//Получаем список тип трансфера
try {
	$sql = "SELECT * FROM `Dictionaries` where Active = 'Y' and AccId = $AccId and type = 'DealCurrency' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){

			if($row['LIC'] == $data[0]["DealCurrency"]){
				$dim_Currency .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				
				$dim_Currency .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}
		}
	} catch (Exception $e) {
		echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}


//Получаем список аэропортов вылета А
try {
	$sql = "select * from vAirport order by AirportConcat asc";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){

			if($row['Id'] == $data[0]["FlightACityArrivalId"]){
				$dim_FlightACityArrival .= "<option selected value='".$row['Id']."'>".$row['AirportConcat']."</option>";
			} else{
				$dim_FlightACityArrival .= "<option value='".$row['Id']."'>".$row['AirportConcat']."</option>";
			}
			
			if($row['Id'] == $data[0]["FlightACityDepartureId"]){
				$dim_FlightACityDeparture .= "<option selected value='".$row['Id']."'>".$row['AirportConcat']."</option>";
			} else{
				$dim_FlightACityDeparture .= "<option value='".$row['Id']."'>".$row['AirportConcat']."</option>";
			}
			
			if($row['Id'] == $data[0]["FlightBCityArrivalId"]){
				$dim_FlightBCityArrival .= "<option selected value='".$row['Id']."'>".$row['AirportConcat']."</option>";
			} else{
				
				$dim_FlightBCityArrival .= "<option value='".$row['Id']."'>".$row['AirportConcat']."</option>";
			}

			if($row['Id'] == $data[0]["FlightBCityDepartureId"]){
				$dim_FlightBCityDeparture .= "<option selected value='".$row['Id']."'>".$row['AirportConcat']."</option>";
			} else{
				$dim_FlightBCityDeparture .= "<option value='".$row['Id']."'>".$row['AirportConcat']."</option>";
			}
			
		}
	} catch (Exception $e) {
		echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}








if($data[0]["Insurance"]=="1"){$checkedInsurance = "checked";}
if($data[0]["DocIssued"]=="1"){$checkedDocIssued = "checked";}



$conn->close();
//Заголовок формы редактирования запросов.
$x_title = "Форма редактирования сделки <a href='/contacts/add?Id=".$data[0]["ContactId"]."' target='_blank'>".$data[0]["ConFirstName"]. " ".$data[0]["ConLastName"]."</a>";

?>

<div class="container-fluid">
	
<div class="x_panel">
<div class="x_title"><h2><?php echo $x_title;?></h2>
<div class="clearfix"></div>
<div class="x_content"><br>
	<form action="/deals/save" method="post" data-toggle="validator" >
		<input type="hidden" id="Id" name="Id" value="<?php echo $data[0]["Id"];?>">
		<!--input type="hidden" name="ContactId" value="<?php echo $data[0]["ContactId"];?>"-->
		<input type="hidden" name="LegalId" value="<?php echo $data[0]["LegalId"];?>">
		<input type="hidden" id="ContactPickLastName" value="<?php echo $data[0]["ConLastName"];?>">
		<input type="hidden" id="ContactPickFirstName" value="<?php echo $data[0]["ConFirstName"];?>">
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#home">Общая информация</a></li>
			  <!--li><a data-toggle="tab" href="#Operator">Данные по оператору</a></li-->
			  <!--li><a data-toggle="tab" href="#Reicy">Рейсы</a></li-->
			  <li><a data-toggle="tab" href="#Paticipants">Участники</a></li>
			</ul>	
<div class="tab-content">	
 	<div id="home" class="tab-pane fade in active">
		<div class="row">
			<div class="form-group col-md-2 col-xs-12">
				<label for="DealNo">№ сделки</label>
				<input type="text" class="form-control input-sm" id="DealNo" name="DealNo"
				value="<?php echo $data[0]["DealNo"]; ?>">
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="DealDate">Дата:</label>
				<div class="input-group date" id="DealDate">
				  <input type="text" value = "<?php echo $data[0]["DealDate"]; ?>" class="form-control input-sm" id="DealDateInput" name="DealDate">
				  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
				</div>
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="DealSum">Сумма сделки</label>
				<input type="number" step="0.01" class="form-control input-sm" id="DealSum" name="DealSum" value="<?php echo $data[0]["DealSum"]; ?>">
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="DealType">Тип:</label>
				<select class="form-control input-sm" id="DealType" name="DealType">
					<?php echo $dim_type; ?>
				</select>
			</div>
			
			<div class="form-group col-md-1 col-xs-12">
				<label for="DealCurrency">Валюта:</label>
				<select class="form-control input-sm" id="DealCurrency" name="DealCurrency">
					<?php echo $dim_Currency; ?>
				</select>
			</div>
			
			
			
			<div class="form-group col-md-1 col-xs-12">
				<label for="CommercialCourse"> Курс</label>
				<input type="number" step="0.01" class="form-control input-sm" id="CommercialCourse" name="CommercialCourse" value="<?php echo $data[0]["CommercialCourse"]; ?>">
			</div>
			
			
			<div class="form-group col-md-1 col-xs-12">
				<label for="PercentDiscount">% скидки</label>
				<input type="number" step="0.01" class="form-control input-sm" id="PercentDiscount" name="PercentDiscount" value="<?php echo $data[0]["PercentDiscount"]; ?>">
			</div>
			
			
		</div>
		<div class="row">
		<div class="form-group col-md-2 col-xs-12">
			<label for="OperatorName"><a href="/operators" target="_blank">Оператора:</a></label> <a href="#" onclick="addOperator()"><span class="glyphicon glyphicon-plus"></span> добавить</a>
			<select class="form-control input-sm js-example-basic-single" id="OperatorName" name="OperatorName">
				<?php echo $dim_OperatorName; ?>
			</select>
		</div>
		
		<div class="form-group col-md-2 col-xs-12">
			<label for="OperatorInvoceSum">Сумма счёта оператора:</label>
			<input type="number" step="0.01" class="form-control input-sm" id="OperatorInvoceSum" name="OperatorInvoceSum" value="<?php echo $data[0]["OperatorInvoceSum"]; ?>">
		</div>
		<div class="form-group col-md-1 col-xs-12">
			<label for="OperatorInvoceNum">№ заявки:</label>
			<input type="text" class="form-control input-sm" id="OperatorInvoceNum" name="OperatorInvoceNum" value="<?php echo $data[0]["OperatorInvoceNum"]; ?>">
		</div>
		
		<div class="form-group col-md-2 col-xs-12">
			<label for="OperatorInvoceDate">Дата оплаты:</label>
			<div class="input-group date" id="OperatorInvoceDate">
			  <input type="text" value = "<?php echo $data[0]["OperatorInvoceDate"]; ?>" class="form-control input-sm" id="OperatorInvoceDateInput" name="OperatorInvoceDate">
			  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
			</div>
		</div>
		
		<div class="form-group col-md-1 col-xs-12">
			<label for="Invoice">Счёт факт.:</label>
			<input type="text" class="form-control input-sm" id="Invoice" name="Invoice" value="<?php echo $data[0]["Invoice"]; ?>">
		</div>
		<div class="form-group col-md-1 col-xs-12">
			<label for="Act">Акт:</label>
			<input type="text" class="form-control input-sm" id="Act" name="Act" value="<?php echo $data[0]["Act"]; ?>">
		</div>
		 <div class="form-group col-md-2 col-xs-12">
			<label for="ActDate">Дата акта:</label>
			<div class="input-group date" id="ActDate">
			  <input type="text" value = "<?php echo $data[0]["ActDate"]; ?>" class="form-control input-sm" id="ActDateInput" name="ActDate">
			  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
			</div>
		</div>
		
	</div>
	
		<div class="row">

			<div class="form-group col-md-2 col-xs-12">
				<label for="PrePaySum">Сумма предоплаты</label>
				<input type="number" step="0.01" class="form-control input-sm" id="PrePaySum" name="PrePaySum" value="<?php echo $data[0]["PrePaySum"]; ?>">
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="PrePayPercent">% предоплаты</label>
				<input type="number" step="0.01" class="form-control input-sm" id="PrePayPercent" name="PrePayPercent" value="<?php echo $data[0]["PrePayPercent"]; ?>">
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="DateArrival">Дата полной оплаты:</label>
				<div class="input-group date" id="DateFullPay">
				  <input type="text" value = "<?php echo $data[0]["DateFullPay"]; ?>" class="form-control input-sm" id="DateFullPayInput" name="DateFullPay">
				  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
				</div>
			</div>
			<div class="form-group col-md-1 col-xs-12">
				<label for="AmountNight">Ночи</label>
				<input type="text" class="form-control input-sm" id="AmountNight" name="AmountNight" editDateDeparture(this.form) value="<?php echo $data[0]["AmountNight"]; ?>">
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="DateArrival">Дата начала:</label>
				<div class="input-group date" id="DateArrival">
				  <input type="text" value = "<?php echo $data[0]["DateArrival"]; ?>" class="form-control input-sm" id="DateArrivalInput" name="DateArrival">
				  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
				</div>
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="DateDeparture">Дата окончания:</label>
				<div class="input-group date" id="DateDeparture">
				  <input type="text" value = "<?php echo $data[0]["DateDeparture"]; ?>" class="form-control input-sm" id="DateDepartureInput" name="DateDeparture">
				  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
				</div>
			</div>
			
			
			<div id="cascadingdropdown">
				<div class="form-group col-md-2 col-xs-12">
					<label for="DirectionName">Страна:</label>
					<select id="DirectionName" class="form-control input-sm js-example-basic-single" name="DirectionName" data-error="Страна, обязательное к заполнению." required data-selected=<?php echo $data[0]["DirectionId"];?>>
						<option value="">Выберите страну</option>
					</select>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group col-md-2 col-xs-12">
					<label for="RegionName"><a href="/regions" target="_blank">Курорт:</a></label> <a href="#"onclick="addRegion()"><span class="glyphicon glyphicon-plus" ></span> добавить</a>
        			<select id="RegionName" class="form-control input-sm js-example-basic-single" name="RegionName" data-selected=<?php echo $data[0]["RegionId"];?>>
						<option value="">Выберите регион</option>
					</select>
				</div>
				<div class="form-group col-md-3 col-xs-12">
					<label for="HotelName"><a href="/hotels" target="_blank">Отель:</a></label> <a href="#"onclick="addHotel()"><span class="glyphicon glyphicon-plus" ></span> добавить</a>
					<select id="HotelName" class="form-control input-sm js-example-basic-single" name="HotelName" data-selected=<?php echo $data[0]["HotelId"];?>>
						<option value="">Выберите отель</option>
					</select>
				</div>
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="FeedName">Питание:</label>
				<select class="form-control input-sm" id="FeedName" name="FeedName">
					<?php echo $dim_FeedName; ?>
				</select>
			</div>		
			<div class="form-group col-md-2 col-xs-12">
				<label for="FlatType">Тип номера:</label>
				<select class="form-control input-sm" id="FlatType" name="FlatType">
					<?php echo $dim_FlatTypeName; ?>
				</select>
			</div>
		</div>
		<div class="row">


			<div class="form-group col-md-2 col-xs-12">
				<label for="RoomViewName">Вид из номера:</label>
				<select class="form-control input-sm" id="RoomViewName" name="RoomViewName">
					<?php echo $dim_RoomViewName; ?>
				</select>
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="TransferName">Трансфер:</label>
				<select class="form-control input-sm" id="TransferName" name="TransferName">
					<?php echo $dim_TransferName; ?>
				</select>
			</div>
			
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="PlacingType">Размещение:</label>
				<select class="form-control input-sm" id="PlacingType" name="PlacingType">
					<?php echo $dim_PlacingType; ?>
				</select>
			</div>
			
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="Transport">Транспорт</label>
				<input type="text" class="form-control input-sm" id="Transport" name="Transport" value="<?php echo $data[0]["Transport"]; ?>">
			</div>
			
			
			<div class="form-group col-md-1 col-xs-12">
				<label for="Visa">Виза:</label>
				<input type="text" class="form-control input-sm" id="Visa" name="Visa" value="<?php echo $data[0]["Visa"]; ?>">
			</div>
			
			
			 <div class="form-group col-md-2 col-xs-12">
				<label for="UserId">Менеджер:</label>
				<select class="form-control input-sm" id="UserId" name="UserId">
					<?php echo $dim_managers; ?>
				</select>
		  	</div>
		</div>
		<div class="row">
			<div class="form-group col-md-1 col-xs-12">
				<label for="FlightA">№ Рейс А:</label>
				<input type="text" style="text-transform: uppercase" class="form-control input-sm" id="FlightA" name="FlightA" value="<?php echo $data[0]["FlightA"]; ?>">
			</div>
			<div class="form-group col-md-2 col-xs-12">
				<label for="FlightAArrivalDate">Дата вылета А:</label>
				<div class="input-group date" id="FlightAArrivalDate">
				  <input type="text" value = "<?php echo $data[0]["FlightAArrivalDate"]; ?>" class="form-control input-sm" id="FlightAArrivalDateInput" name="FlightAArrivalDate">
				  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
				</div>
			</div>
			 <div class="form-group col-md-2 col-xs-12">
				<label for="FlightADepartureDate">Дата приземления А:</label>
				<div class="input-group date" id="FlightADepartureDate">
				  <input type="text" value = "<?php echo $data[0]["FlightADepartureDate"]; ?>" class="form-control input-sm" id="FlightADepartureDateInput" name="FlightADepartureDate">
				  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
				</div>
			</div>
			<div class="form-group col-md-3 col-xs-12">
				<label for="FlightACityArrivalId">Рейс А аэропорт вылета А:</label>
				<select class="form-control input-sm js-example-basic-single" id="FlightACityArrivalId" name="FlightACityArrivalId">
					<?php echo $dim_FlightACityArrival; ?>
				</select>
		  	</div>
			<div class="form-group col-md-3 col-xs-12">
				<label for="FlightACityDepartureId">Рейс А аэропорт приземления А:</label>
				<select class="form-control input-sm js-example-basic-single" id="FlightACityDepartureId" name="FlightACityDepartureId">
					<?php echo $dim_FlightACityDeparture; ?>
				</select>
		  	</div>
		
			
		</div>
		<div class="row">
			<div class="form-group col-md-11 col-xs-12">
				<label for="FlightAComments">Рейс A комментарий:</label>
				<textarea class="form-control input-sm" rows="1" id="FlightAComments" name="FlightAComments"><?php echo $data[0]["FlightAComments"]; ?></textarea>
			 </div>	
		</div>
	
	<div class="row">
		<div class="form-group col-md-1 col-xs-12">
			<label for="FlightB">№ Рейс B:</label>
			<input type="text" class="form-control input-sm" style="text-transform: uppercase"  id="FlightB" name="FlightB" value="<?php echo $data[0]["FlightB"]; ?>">
		</div>
		 <div class="form-group col-md-2 col-xs-12">
			<label for="FlightBArrivalDate">Дата вылета B:</label>
			<div class="input-group date" id="FlightBArrivalDate">
			  <input type="text" value = "<?php echo $data[0]["FlightBArrivalDate"]; ?>" class="form-control input-sm" id="FlightBArrivalDateInpuit" name="FlightBArrivalDate">
			  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
			</div>
		</div>
		<div class="form-group col-md-2 col-xs-12">
			<label for="FlightBDepartureDate">Дата приземления B:</label>
			<div class="input-group date" id="FlightBDepartureDate">
			  <input type="text" value = "<?php echo $data[0]["FlightBDepartureDate"]; ?>" class="form-control input-sm" id="FlightBDepartureDateInput" name="FlightBDepartureDate">
			  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
			</div>
		</div>
		<div class="form-group col-md-3 col-xs-12">
				<label for="FlightBCityArrivalId">Рейс B аэропорт вылета:</label>
				<select class="form-control input-sm js-example-basic-single" id="FlightBCityArrivalId" name="FlightBCityArrivalId">
					<?php echo $dim_FlightBCityArrival; ?>
				</select>
		  	</div>
			<div class="form-group col-md-3 col-xs-12">
				<label for="FlightBCityDepartureId">Рейс B аэропорт приземления:</label>
				<select class="form-control input-sm js-example-basic-single" id="FlightBCityDepartureId" name="FlightBCityDepartureId">
					<?php echo $dim_FlightBCityDeparture; ?>
				</select>
		  	</div>
	</div>
		
		<div class="row">
			<div class="form-group col-md-11 col-xs-12">
				<label for="FlightBComments">Рейс B комментарий:</label>
				<textarea class="form-control input-sm" rows="1" id="FlightBComments" name="FlightBComments"><?php echo $data[0]["FlightBComments"]; ?></textarea>
			 </div>	
			
		</div>
		
		<div class="row">
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="AgentClient">Агент/Клиент:</label>
				<select class="form-control input-sm" id="AgentClient" name="AgentClient">
					<?php echo $dim_AgentClient; ?>
				</select>
			</div>
				<div class="form-group col-md-2 col-xs-12">
					<label for="pickContact" data-toggle="tooltip" data-placement="auto" title="Фамилия клиента с которым связана сделка">ФИО Клиента:</label>
					<div class="form-group">
						<input type="hidden" id="ContactId" name="ContactId" value="<?php echo $data[0]["ContactId"]; ?>" >
						<div id="pickContact" class="picklist"></div>
					</div>
				</div>
				
			<div class="form-group col-md-2 col-xs-12">
				<label for="Insurance"><input type="checkbox" id="Insurance" name="Insurance" <?php echo $checkedInsurance ?>> Страховка Да/Нет</label>
			</div>
			<div class="form-group col-md-2 col-xs-12">
				<label for="DocIssued"><input type="checkbox" id="DocIssued" name="DocIssued" <?php echo $checkedDocIssued ?>> Док. выданы Да/Нет</label>
			</div>
			
		</div>
		<div class="row">
			
		<div class="form-group col-md-5 col-xs-12">
					<label for="AdditionalServices">Дополнительные услуги:</label>
					<textarea class="form-control input-sm" rows="8" id="AdditionalServices" name="AdditionalServices"><?php echo $data[0]["AdditionalServices"]; ?></textarea>
		</div>	
		<div class="form-group col-md-6 col-xs-12">
					<label for="Comments">Комментарий:</label>
					<textarea class="form-control input-sm" rows="8" id="Comments" name="Comments"><?php echo $data[0]["Comments"]; ?></textarea>
				 </div>	
		</div>
		
		
		
		
		
	</div>
	


<div id="Paticipants" class="tab-pane fade">
	<div class="row">
		<div class="col-md-12">
			<div id="pickContactMVG"></div>
			<div class="table-responsive">
				<table id="grid_members"></table>
			</div>
			<div id="page_members"></div>
		</div>
		

	</div>
</div>			
</div>
		
<button type="submit" class="btn btn-success">Сохранить</button><a href="/contacts/add?Id=<?php echo $data[0]["ContactId"]; ?>" class="btn btn-default" style="margin-left: 10px">Отменить</a>
		
</form>
	
</div></div>
</div>
</div>
</div>
</div>


<script>
	if(document.getElementById("ContactId").value !=""){
		document.title = "CRM Tour - сделка "+document.getElementById("DealNo").value + " " + document.getElementById("ContactPickFirstName").value + " " + document.getElementById("ContactPickLastName").value;
	}

function addHotel() {
	/*Страна*/
    var direction = document.getElementById("DirectionName");
	var directionId = direction.options[direction.selectedIndex].value;
	/*var directionName = direction.options[direction.selectedIndex].text;*/
    
    var region = document.getElementById("RegionName");
	var regionId = region.options[region.selectedIndex].value;
	/*var regionName = region.options[region.selectedIndex].text;*/
    
    /*Текст сообщения об ошибке.*/
    var alertMsg = "";
    
   

	if(directionId !=""){
	   	if(regionId !=""){
		    var person = prompt("Введите название отеля 'Без звёзд' например:", "Coral Sea Sensatori Resort");
		    if (person == undefined || person == null || person == "") {
			  console.log("Что то не так с введённым значением '"+person+"'в поле 'Название отеля.'"); 	
		    } else {
		    	
		    	$.when($.ajax({
					type: 'POST',
					url: "/hotels/addajax",
					data: {
						HotelName: person,
						DirectionId: directionId,
						RegionId: regionId,
						HotelStars:"HotelStarsNull",
					},
					success: function(_data, status){
						return _data;
					},
					error: function( jqXHR, textStatus, errorThrown) {
						alert("ERROR:" + textStatus + "," + errorThrown);
					},
					dataType: "json",
					async:false
				})).done(function(res) { 
					console.log(res)
					if (res.status == "success") {
						var hotelName = document.getElementById("HotelName");
						var option = document.createElement("option");
						option.text = person;
						option.value=res.rec_id;
						hotelName.add(option, hotelName[0]);
					}
				});
			}
	   } else {
	   		alertMsg += "Нужно выбрать 'Курорт'!";
	   }
	} else {
	   		alertMsg += "Нужно выбрать 'Страну'!";
	   
	}
	
	
	if(alertMsg !=""){
		alert(alertMsg);
	}
    
}

function addRegion() {
	/*Страна*/
    var direction = document.getElementById("DirectionName");
	var directionId = direction.options[direction.selectedIndex].value;
	/*var directionName = direction.options[direction.selectedIndex].text;*/
    
    /*Текст сообщения об ошибке.*/
    var alertMsg = "";
    
   

	if(directionId !=""){
	    var person = prompt("Введите название курорта например:", "Мармарис");
	    if (person == undefined || person == null || person == "") {
		  console.log("Что то не так с введённым значением '"+person+"'в поле 'Название курорта.'"); 	
	    } else {
	    	
	    	$.when($.ajax({
				type: 'POST',
				url: "/regions/addajax",
				data: {
					DirectionId: directionId,
					RegionName: person
				},
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					alert("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:false
			})).done(function(res) { 
				console.log(res)
				if (res.status == "success") {
					var regionName = document.getElementById("RegionName");
					var option = document.createElement("option");
					option.text = person;
					option.value=res.rec_id;
					regionName.add(option, regionName[0]);
				}
			});
		}
	} else {
	   		alertMsg += "Нужно выбрать 'Страну'!";
	}
	
	
	if(alertMsg !=""){
		alert(alertMsg);
	}
    
}

function addOperator() {
	/*Страна*/
    var operator = document.getElementById("OperatorName");
	var operatorId = operator.options[operator.selectedIndex].value;
	/*var directionName = direction.options[direction.selectedIndex].text;*/
    
    /*Текст сообщения об ошибке.*/
    var alertMsg = "";
    
   

	if(operatorId !=""){
	    var person = prompt("Введите название оператора например:", "1000 дорог");
	    if (person == undefined || person == null || person == "") {
		  console.log("Что то не так с введённым значением '"+person+"'в поле 'Название оператора.'"); 	
	    } else {
	    	
	    	$.when($.ajax({
				type: 'POST',
				url: "/operators/addajax",
				data: {
					Name: person
				},
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					alert("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:false
			})).done(function(res) { 
				console.log(res)
				if (res.status == "success") {
					var operatorName = document.getElementById("OperatorName");
					var option = document.createElement("option");
					option.text = person;
					option.value=res.rec_id;
					operatorName.add(option, operatorName[0]);
				}
			});
		}
	}
}






</script>