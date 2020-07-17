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

//Получаем список типов документа
try {
	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and  AccId = $AccId and type='TemplateModule' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){


		if($row['LIC'] == $data[0]["Module"]){
				$dim_module .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$dim_module .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}

		}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}


//Если новый адрес по умолчанию всё активно
if($data[0]["Id"]==""){
	$checkedActive = "checked";
} else {
	if($data[0]["Active"]=="1"){$checkedActive = "checked";}
}

$conn->close();

?>


<div class="container-fluid">
	<div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2>Редактирование шаблона <!--small>different form elements</small--></h2>
			<ul class="nav navbar-right panel_toolbox">
			  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="#">Settings 1</a>
				  </li>
				  <li><a href="#">Settings 2</a>
				  </li>
				</ul>
			  </li>
			  <li><a class="close-link"><i class="fa fa-close"></i></a>
			  </li>
			</ul>
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">
			<br />
			
			<form action="/templates/save" method="post" data-toggle="validator">
				<input type="hidden" name="Id" value="<?php echo $data[0]["Id"];?>">

				<div class="form-group col-md-8">
					<label for="Name">Название:</label>
					<input type="text" class="form-control input-sm" id="Name" name="Name"  data-error="Название шаблона, обязательное к заполнению." required value="<?php echo $data[0]["Name"]; ?>">
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group col-md-4">
					<label for="Module">Модуль:</label>
					<select class="form-control input-sm" id="Module" name="Module">
						<?php echo $dim_module; ?>
					</select>
				</div>
			
				<div class="form-group col-md-12">
					<label for="Template">Шаблон:</label>
					<textarea class="form-control input-sm" rows="20" id="Template" name="Template"><?php echo $data[0]["Template"]; ?></textarea>
				</div>
				
				<div class="form-group col-md-8">
					<label for="Active"><input type="checkbox" id="Active" name="Active" <?php echo $checkedActive ?>/onclick="editForm(this.form)"> Активный</label>
					<button type="submit" class="btn btn-success">Сохранить</button><a href="/templates" class="btn btn-primary" style="margin-left: 10px">Отменить</a>
				</div>
			</form>
			
		  </div>
		</div>
	  </div>
	</div>
	
	
	<div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2>Параметры для шаблонов <!--small>different form elements</small--></h2>
			<ul class="nav navbar-right panel_toolbox">
			  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="#">Settings 1</a>
				  </li>
				  <li><a href="#">Settings 2</a>
				  </li>
				</ul>
			  </li>
			  <li><a class="close-link"><i class="fa fa-close"></i></a>
			  </li>
			</ul>
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">
			<br />
			
		
		
		
			<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel">
					<a class="panel-heading" role="tab" id="heading01" data-toggle="collapse" data-parent="#accordion" href="#collapse01" aria-expanded="true" aria-controls="collapse01">
					  <h4 class="panel-title">Данные физ. лицу</h4>
					</a>
					<div id="collapse01" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading01">
					  <div class="panel-body">
						<table class="table table-striped">
							<thead>
							  <tr>
								<th>Параметр</th><th>Описание</th><th>Пример</th>
							  </tr>
							</thead>
							<tbody>
								<tr><td align="center" colspan="3"><strong>Данные владельца сделки</strong></td></tr>
								<tr><td>{$data.ContactFullName}</td><td>ФИО лица на которого оформлена сделка</td><td>Иванов Иван Иванович</td></tr>
								<tr><td>{$data.TaxCode}</td><td>ИНН лица на которого оформлена сделка</td><td>8625415615</td></tr>
								<tr><td>{$data.Address}</td><td>Адрес лица на которого оформлена сделка</td><td>г. Киев. Проспект науки д.12</td></tr>
								<tr><td>{$data.DateBirth}</td><td>Дата рождения лица на которого оформлена сделка</td><td>01.04.1980</td></tr>
								<tr><td>{$data.ukrSeriaNum}</td><td>Паспорт 'серия №' лица на которого оформлена сделка</td><td>СО 111222</td></tr>
								<tr><td>{$data.ukrIssuedDate}</td><td>Паспорт 'дата выдачи' лица на которого оформлена сделка</td><td>01.02.2017</td></tr>
								<tr><td>{$data.ukrIssuedBy}</td><td>Паспорт 'Кем выдан' лица на которого оформлена сделка</td><td>г. Киев. Шевченковским РУ ГУ МВС</td></tr>
								<tr><td>{$data.PhoneMob}</td><td>Телефон мобильный лица на которого оформлена сделка</td><td>+38(067)555-4422</td></tr>	
								<tr><td>{$data.EmailHome}</td><td>Email домашний лица на которого оформлена сделка</td><td>example@gmail.com</td></tr>	
							</tbody>
						</table>
					  </div>
					</div>
				</div>
				
				<div class="panel">
				<a class="panel-heading collapsed" role="tab" id="heading00" data-toggle="collapse" data-parent="#accordion" href="#collapse00" aria-expanded="true" aria-controls="collapse00">
				<h4 class="panel-title">Данные юр. лицу</h4>
				</a>
				<div id="collapse00" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading00">
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
						  <tr>
							<th>Параметр</th><th>Описание</th><th>Пример</th>
						  </tr>
						</thead>
						<tbody> 
							<tr><td align="center" colspan="3"><strong>Данные по связанному юр. лицу</strong></td></tr>
							<tr><td>{$data_ext.legalData.LegalName}</td><td>Название юр. лица</td><td>ТОВ 'Успех 1'</td></tr>
							<tr><td>{$data_ext.legalData.LegalOfficeAddress}</td><td>Адрес юридический</td><td>город Киев</td></tr>
							<tr><td>{$data_ext.legalData.LegalFactAddress}</td><td>Адрес фактический</td><td>город Киев</td></tr>
							<tr><td>{$data_ext.legalData.LegalCode}</td><td>ЕДРПОУ клиента</td><td>1231564</td></tr>
							<tr><td>{$data_ext.legalData.LegalOfficePhone}</td><td>Телефон городской</td><td>+38(067)222-3344</td></tr>
							<tr><td>{$data_ext.legalData.LegalOfficeMobile}</td><td>Мобильный</td><td>+38(067)222-3344</td></tr>
							<tr><td>{$data_ext.legalData.LegalOfficeFax}</td><td>Факс</td><td>+38(067)222-3344</td></tr>
							<tr><td>{$data_ext.legalData.LegalOfficeEmail}</td><td>Email</td><td>email1@gmail.com</td></tr>
							<tr><td>{$data_ext.legalData.LegalBankName}</td><td>Название банка</td><td>Альфа банк</td></tr>
							<tr><td>{$data_ext.legalData.LegalAccountNum}</td><td>Счётв банке</td></td><td>26000000112</td></tr>
							<tr><td>{$data_ext.legalData.LegalBankIban}</td><td>Счётв Iban</td></td><td>UA26000000112</td></tr>
							<tr><td>{$data_ext.legalData.LegalMFO}</td><td>МФО банка</td></td><td>320922</td></tr>
							<tr><td>{$data_ext.legalData.TaxNumber}</td><td>Индивидуальный налоговый номер</td></td><td>1231351656</td></tr>
							<tr><td>{$data_ext.legalData.SignerPosition}</td><td>Должность подписанта</td></td><td>Директор</td></tr>
							<tr><td>{$data_ext.legalData.SignerFIO}</td><td>ФИО подписанта</td></td><td>ФИО Директора</td></tr>
							<tr><td>{$data_ext.legalData.SignerBasis}</td><td>Основания для подписи</td></td><td>Доверенность</td></tr>
							<tr><td>{$data_ext.legalData.AccountantFIO}</td><td>ФИО бухгалтера</td></td><td>ФИО Бухгалтера</td></tr>
							<tr><td>{$data_ext.legalData.VATcertificateNumber}</td><td>Номер свидетельства НДС</td></td><td>NDS 12345645</td></tr>
							<tr><td>{$data_ext.legalData.TaxForm}</td><td>Форма плательщика налога</td></td><td>Первая</td></tr>
							<tr><td>{$data_ext.legalData.LegalDealStart}</td><td>Дата подписания договора</td></td><td>15.04.2019</td></tr>
							<tr><td>{$data_ext.legalData.LegalDealEnd}</td><td>Дата окончания договора</td></td><td>16.04.2019</td></tr>
						</tbody>
					</table>
				</div>
				</div>
				</div>
				
				<div class="panel">
					<a class="panel-heading collapsed" role="tab" id="heading02" data-toggle="collapse" data-parent="#accordion" href="#collapse02" aria-expanded="true" aria-controls="collapse02">
					  <h4 class="panel-title">Данные по сделке</h4>
					</a>
					<div id="collapse02" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading02">
					  <div class="panel-body">
						<table class="table table-striped">
						<thead>
						  <tr>
							<th>Параметр</th><th>Описание</th><th>Пример</th>
						  </tr>
						</thead>
						<tbody>
							<tr><td align="center" colspan="3"><strong>Данные по сделке</strong></td></tr>
							<tr><td>{$data.DealNo}</td><td>Номер договора</td><td>2017/01</td></tr>
							<tr><td>{$data.DealTypeName}</td><td>Тип сделки</td><td>Тур</td></tr>
							<tr><td>{$data.DealDate}</td><td>Дата сделки</td><td>11.01.2017</td></tr>
							<tr><td>{$data.DealDay}</td><td>Число сделки</td><td>11</td></tr>
							<tr><td>{$data.DealMonth}</td><td>Месяц сделки</td><td>Січень</td></tr>
							<tr><td>{$data.DealYear}</td><td>Год сделки</td><td>2017</td></tr>
							<tr><td>{$data.DealSum}</td><td>Сумма сделки</td><td>120.00</td></tr>
							<tr><td>{$data.DealSumPremia}</td><td>Вознаграждение. Сумма сделки-Сумма счёта оператора</td><td>120.00</td></tr>
							<tr><td>{$data.DealSumPremiaString}</td><td>Вознаграждение прописью. Сумма сделки-Сумма счёта оператора</td><td>Сто двадцять гривень 00 копiйок</td></tr>
							<tr><td>{$data.VAT}</td><td>НДС. (Сумма сделки-Сумма счёта оператора)/6</td><td>12.00</td></tr>
							<tr><td>{$data.DealSumEquivalent}</td><td>Сумма сделки/комерческий курс</td><td>120.00</td></tr>
							<tr><td>{$data.DealSumString}</td><td>Сумма сделки прописью</td><td>Сто двадцять гривень 00 копiйок</td></tr>
							
							<tr><td>{$data.DealSumFact}</td><td>Окончательная сумма сделки</td><td>120.00</td></tr>
							<tr><td>{$data.DealSumFactPremia}</td><td>Вознаграждение. Окончательная сумма сделки-Сумма счёта оператора</td><td>120.00</td></tr>
							<tr><td>{$data.DealSumFactPremiaString}</td><td>Вознаграждение прописью. Окончательная сумма сделки-Сумма счёта оператора</td><td>Сто двадцять гривень 00 копiйок</td></tr>
							<tr><td>{$data.VATFact}</td><td>НДС. (Окончательная сумма сделки-Сумма счёта оператора)/6</td><td>12.00</td></tr>
							<tr><td>{$data.DealSumFactString}</td><td>Окончательная сумма сделки прописью</td><td>Сто двадцять гривень 00 копiйок</td></tr>
							
							<tr><td>{$data.PrePaySum}</td><td>Сумма предоплаты</td><td>120.00</td></tr>
							<tr><td>{$data.PrePaySumString}</td><td>Сумма предоплаты прописью</td><td>Сто двадцять гривень 00 копiйок</td></tr>
							<tr><td>{$data.PrePayPercent}</td><td>% предоплаты</td><td>50%</td></tr>
							<tr><td>{$data.DateFullPay}</td><td>Дата полной оплаты</td><td>11.01.2017</td></tr>
							<tr><td>{$data.DealCurrencyName}</td><td>Валюта сделки</td><td>USD</td></tr>
							<tr><td>{$data.CommercialCourse}</td><td>Комерческий курс</td><td>26.86</td></tr>
							<tr><td>{$data.PercentDiscount}</td><td>% скидки</td><td>3%</td></tr>
							<tr><td>{$data.DirectionName}</td><td>Страна</td><td>Египет</td></tr>
							<tr><td>{$data.RegionName}</td><td>Курорт</td><td>Шарм Эль Шейх</td></tr>
							<tr><td>{$data.HotelName}</td><td>Название отеля</td><td>Sharm Sheikh Resort and spa</td></tr>
							<tr><td>{$data.HotelJurName}</td><td>Юридическое название отеля</td><td>ООО Хижина </td></tr>
							<tr><td>{$data.HotelJurAddress}</td><td>Юридический адресс отеля</td><td>г. Киев....</td></tr>
							<tr><td>{$data.HotelStarsName}</td><td>Звёзды</td><td>5*</td></tr>
							<tr><td>{$data.PlacingTypeName}</td><td>Размещение</td><td>2 DBL</td></tr>
							<tr><td>{$data.FeedName}</td><td>Питание</td><td>HB (завтрак – ужин)</td></tr>
							<tr><td>{$data.FlatTypeName}</td><td>Тип номера</td><td>Apartament</td></tr>
							<tr><td>{$data.RoomViewName}</td><td>Вид из номера</td><td>City view</td></tr>
							<tr><td>{$data.DateArrival}</td><td>Дата начала тура</td><td>11.01.2017</td></tr>
							<tr><td>{$data.DateDeparture}</td><td>Дата окончания тура</td><td>18.01.2017</td></tr>
							<tr><td>{$data.AmountNight}</td><td>Количество ночей</td><td>7</td></tr>
							<tr><td>{$data.TransferName}</td><td>Трансфер</td><td>Гідролітак</td></tr>
							<tr><td>{$data.Transport}</td><td>Транспорт</td><td>....</td></tr>
							<tr><td>{$data.Insurance}</td><td>Страховка</td><td>ТАК/НІ</td></tr>
							<tr><td>{$data.Visa}</td><td>Виза</td><td>ТАК/НІ</td></tr>
							<tr><td>{$data.AdditionalServices}</td><td>Дополнительные услуги</td><td>Дополнительные услуги</td></tr>
							
							<tr><td>{$data.OperatorInvoceSum}</td><td>Сумма счёта оператора</td><td>120,12</td></tr>
							<tr><td>{$data.OperatorInvoceNum}</td><td>№ заявки</td><td>120,12</td></tr>
							<tr><td>{$data.OperatorInvoceDate}</td><td>Дата оплаты</td><td>11.01.2017</td></tr>
							<tr><td>{$data.Act}</td><td>Акт</td><td>....</td></tr>
							<tr><td>{$data.ActDate}</td><td>Дата акта</td><td>11.01.2017</td></tr>
							<tr><td>{$data.AgentClientName}</td><td>Агент/клиент</td><td>.....</td></tr>
							<tr><td>{$data.Invoice}</td><td>Счёт фактура</td><td>.....</td></tr>
							<tr><td>{$data.ManagerName}</td><td>Фамилия Имя менеджера</td><td>Иванов Иван</td></tr>
							<tr><td>{$data.FlightA}</td><td>Рейс А</td><td>....</td></tr>
							<tr><td>{$data.FlightAArrivalDate}</td><td>Рейс А Дата/время вылет</td><td>16.01.2017 17:13</td></tr>
							<tr><td>{$data.FlightADepartureDate}</td><td>Рейс А Дата/время прилёта</td><td>16.01.2017 21:13</td></tr>
							<tr><td>{$data.FlightAArrivalAirport}</td><td>Аэропорт вылета рейс А</td><td>Мальдивы, Мале, Мальдивы, (MLE)</td></tr>
							<tr><td>{$data.FlightACityDepartureAirport}</td><td>Аэропорт приземления рейс А</td><td>Мальдивы, Мале, Мальдивы, (MLE)</td></tr>
							<tr><td>{$data.FlightB}</td><td>Рейс B</td><td>....</td></tr>
							<tr><td>{$data.FlightBArrivalDate}</td><td>Рейс B Дата/время вылет</td><td>26.01.2017 17:13</td></tr>
							<tr><td>{$data.FlightBDepartureDate}</td><td>Рейс B Дата/время прилёта</td><td>26.01.2017 17:13</td></tr>
							<tr><td>{$data.FlightBCityArrivalAirport}</td><td>Аэропорт вылета рейс B</td><td>Мальдивы, Мале, Мальдивы, (MLE)</td></tr>
							<tr><td>{$data.FlightBCityDepartureAirport}</td><td>Аэропорт приземления рейс B</td><td>Мальдивы, Мале, Мальдивы, (MLE)</td></tr>

						</tbody>
						</table>
					  </div>
					</div>
				</div>
				
				<div class="panel">
					<a class="panel-heading collapsed" role="tab" id="heading03" data-toggle="collapse" data-parent="#accordion" href="#collapse03" aria-expanded="true" aria-controls="collapse03">
					  <h4 class="panel-title">Данные по оператору</h4>
					</a>
					<div id="collapse03" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading03">
					  <div class="panel-body">
						<table class="table table-striped">
						<thead>
						  <tr>
							<th>Параметр</th><th>Описание</th><th>Пример</th>
						  </tr>
						</thead>
						<tbody>
							<tr><td align="center" colspan="3"><strong>Данные по оператору</strong></td></tr>
							<tr><td>{$data.OperatorName}</td><td>Название оператора</td><td>ТОВ Оператор</td></tr>
							<tr><td>{$data.OperatorPhone}</td><td>Телефон оператора</td><td>+38(044)444-2244</td></tr>
							<tr><td>{$data.OperatorEmail}</td><td>Email оператора</td><td>emaxple@gmail.com</td></tr>
							<tr><td>{$data.OperatorAddress}</td><td>Адрес оператора</td><td>Пр. Востания 1а офис1</td></tr>
							<tr><td>{$data.OperatorDealNum}</td><td>Номер договора с оператором</td><td>2412/С</td></tr>
							<tr><td>{$data.DealDateStart}</td><td>Дата начала действия договора</td><td>26.01.2020</td></tr>
							<tr><td>{$data.DealDateEnd}</td><td>Дата окончания действия договора</td><td>26.01.2020</td></tr>
						</tbody>
						</table>
					  </div>
					</div>
				</div>
				
				<div class="panel">
					<a class="panel-heading collapsed" role="tab" id="heading04" data-toggle="collapse" data-parent="#accordion" href="#collapse04" aria-expanded="true" aria-controls="collapse04">
					  <h4 class="panel-title">Данные по организации</h4>
					</a>
					<div id="collapse04" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading04">
					  <div class="panel-body">
						<table class="table table-striped">
							<thead>
							  <tr>
								<th>Параметр</th><th>Описание</th><th>Пример</th>
							  </tr>
							</thead>
							<tbody>
								<tr><td align="center" colspan="3"><strong>Данные по организации</strong></td></tr>
								<tr><td>{$account.Name}</td><td>Название организации</td><td>ТОВ Организация</td></tr>
								<tr><td>{$account.OfficeAddress}</td><td>Адрес организации (юридический)</td><td>г. Киев ул. Народного ополчения</td></tr>
								<tr><td>{$account.FactAddress}</td><td>Адрес организации (фактический)</td><td>г. Киев ул. Народного ополчения</td></tr>
								<tr><td>{$account.OfficePhone}</td><td>Телефон городской</td><td>+38(044)555-4422</td></tr>
								<tr><td>{$account.OfficeFax}</td><td>Факс</td><td>+38(044)555-4422</td></tr>
								<tr><td>{$account.OfficeMobile}</td><td>Мобильный</td><td>+38(044)555-4422</td></tr>
								<tr><td>{$account.OfficeEmail}</td><td>Email</td><td>example@gmail.com</td></tr>
								<tr><td>{$account.BankName}</td><td>Название банка</td><td>Укрсиб Банк</td></tr>
								<tr><td>{$account.BankAccount}</td><td>Счёт в банке</td><td>2600112553</td></tr>
								<tr><td>{$account.BankIban}</td><td>Международный счёт Iban</td><td>UA2600112553</td></tr>
								<tr><td>{$account.BankMFO}</td><td>МФО банка</td><td>320854</td></tr>
								<tr><td>{$account.BankCode}</td><td>Код ЕДРПОУ</td><td>4564165544</td></tr>
								<tr><td>{$account.LicenseNum}</td><td>Серия № лицензии</td><td>31654648</td></tr>
								<tr><td>{$account.LicenseDate}</td><td>Дата выдачи лицензии</td><td>26.12.2010</td></tr>
								<tr><td>{$account.DirectorName}</td><td>ФИО Директора</td><td>Иванов И.В.</td></tr>
							</tbody>
						</table>
					  </div>
					</div>
				</div>
				<div class="panel">
				<a class="panel-heading collapsed" role="tab" id="heading05" data-toggle="collapse" data-parent="#accordion" href="#collapse05" aria-expanded="true" aria-controls="collapse05">
				<h4 class="panel-title">Данные по платежам</h4>
				</a>
				<div id="collapse05" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading05">
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
						  <tr>
							<th>Параметр</th><th>Описание</th><th>Пример</th>
						  </tr>
						</thead>
						<tbody>
							<tr><td align="center" colspan="3"><strong>Данные по платежам</strong></td></tr>
							<tr><td>{$data_ext.payment.PaySum}</td><td>Сумма платежа</td><td>50328.00 </td></tr>
							<tr><td>{$data_ext.payment.PaySumString}</td><td>Сумма прописью</td><td>П’ятдесят тисяч триста двадцять вісім гривень 00 копiйок</td></tr>
							<tr><td>{$data_ext.payment.PayDateMod}</td><td>Дата платежа</td><td>31.12.2017</td></tr>
							<tr><td>{$data_ext.payment.Payer}</td><td>ФИО плательщика</td><td>Иванов Иван Иванович</td></tr>
						</tbody>
					</table>
				</div>
				</div>
				</div>
				
				
				<div class="panel">
				<a class="panel-heading collapsed" role="tab" id="heading05" data-toggle="collapse" data-parent="#accordion" href="#collapse05" aria-expanded="true" aria-controls="collapse05">
				<h4 class="panel-title">Данные по платежам</h4>
				</a>
				<div id="collapse05" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading05">
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
						  <tr>
							<th>Параметр</th><th>Описание</th><th>Пример</th>
						  </tr>
						</thead>
						<tbody>
							<tr><td align="center" colspan="3"><strong>Данные по платежам</strong></td></tr>
							<tr><td>{$data_ext.payment.PaySum}</td><td>Сумма платежа</td><td>50328.00 </td></tr>
							<tr><td>{$data_ext.payment.PaySumString}</td><td>Сумма прописью</td><td>П’ятдесят тисяч триста двадцять вісім гривень 00 копiйок</td></tr>
							<tr><td>{$data_ext.payment.PayDateMod}</td><td>Дата платежа</td><td>31.12.2017</td></tr>
							<tr><td>{$data_ext.payment.Payer}</td><td>ФИО плательщика</td><td>Иванов Иван Иванович</td></tr>
						</tbody>
					</table>
				</div>
				</div>
				</div>


				<div class="panel">
				<a class="panel-heading collapsed" role="tab" id="heading06" data-toggle="collapse" data-parent="#accordion" href="#collapse06" aria-expanded="true" aria-controls="collapse06">
				<h4 class="panel-title">Участники поездки и документы</h4>
				</a>
				<div id="collapse06" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading06">
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
						  <tr>
							<th>Параметр</th><th>Описание</th><th>Пример</th>
						  </tr>
						</thead>
						<tbody>
							<tr><td align="center" colspan="3"><strong>Участники поездки и документы</strong></td></tr>
							<tr><td>{$contact.FirstName}</td><td>Фамилия участника</td><td>Иванов</td></tr>
							<tr><td>{$contact.LastName}</td><td>Имя участника</td><td>Иван</td></tr>
							<tr><td>{$contact.MiddleName}</td><td>Отчество Участника</td><td>Иванович</td></tr>
							<tr><td>{$contact.documents[0].DocTypeName}</td><td>Тип документа</td><td>Загран паспорт</td></tr>
							<tr><td>{$contact.documents[0].FirstName}</td><td>SerName</td><td>IVANOV</td></tr>
							<tr><td>{$contact.documents[0].LastName}</td><td>Given Names</td><td>IVAN</td></tr>
							<tr><td>{$contact.documents[0].SeriaNum}</td><td>Серия №</td><td>CK241585</td></tr>
							<tr><td>{$contact.documents[0].Valid}</td><td>Действует до</td><td>24.02.2025</td></tr>
							<tr><td>{$contact.documents[0].IssuedBy}</td><td>Выдан</td><td>8615</td></tr>

						</tbody>
					</table>
				</div>
				</div>
				</div>

				<div class="panel">
				<a class="panel-heading collapsed" role="tab" id="heading07" data-toggle="collapse" data-parent="#accordion" href="#collapse07" aria-expanded="true" aria-controls="collapse07">
				<h4 class="panel-title">Дополнительно</h4>
				</a>
				<div id="collapse07" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading07">
					<div class="panel-body">
						<p>Режим дебагера https://app.crmtour.com/deals/print?Id=24&TemplateId=1&debug=1</p>
						
						<p><strong>Для выгрузки участников поездки скопируйте и вставьте код ниже в шаблон</strong></p>
<pre>&lt;table&gt;
&lt;thead&gt;
&lt;tr&gt;
	&lt;th&gt;Имя&lt;/th&gt;
	&lt;th&gt;Фамилия&lt;/th&gt;
	&lt;th&gt;Дата рождения&lt;/th&gt;
	&lt;th&gt;Тип документа&lt;/th&gt;
	&lt;th&gt;First Name&lt;/th&gt;
	&lt;th&gt;Last Name&lt;/th&gt;
	&lt;th&gt;Серия номер&lt;/th&gt;
	&lt;th&gt;Действующий&lt;/th&gt;
	&lt;th&gt;Кем выдан&lt;/th&gt;
&lt;/tr&gt;
&lt;/thead&gt;
{foreach name=outer item=contact from=$data_ext.contactmembers}
&lt;tr&gt;
	&lt;td&gt;{$contact.FirstName}&lt;/td&gt;
	&lt;td&gt;{$contact.LastName}&lt;/td&gt;
	&lt;td&gt;{$contact.DateBirth}&lt;/td&gt;
	
	&lt;td&gt;{$contact.documents[0].DocTypeName}&lt;/td&gt;
	&lt;td&gt;{$contact.documents[0].FirstName}&lt;/td&gt;
	&lt;td&gt;{$contact.documents[0].LastName}&lt;/td&gt;
	&lt;td&gt;{$contact.documents[0].SeriaNum}&lt;/td&gt;
	&lt;td&gt;{$contact.documents[0].Valid}&lt;/td&gt;
	&lt;td&gt;{$contact.documents[0].IssuedBy}&lt;/td&gt;
&lt;/tr&gt;{/foreach}
&lt;/table&gt;</pre>
 Вставка разрыва страницы
 <pre>&lt;div style="page-break-before: always;"&gt;</pre>
					</div>
				</div>
				</div>
			</div>					
								
				
			
		  </div>
		</div>
	  </div>
	</div>
</div>
