<?php


if($data[0]["Insurance"]=="1"){$checkedInsurance = "checked";}
if($data[0]["DocIssued"]=="1"){$checkedDocIssued = "checked";}

//Заголовок формы редактирования запросов.
$x_title = "Форма редактирования сделки <a href='/contacts/add?Id=".$data[0]["ContactId"]."' target='_blank'>".$data[0]["ConFirstName"]. " ".$data[0]["ConLastName"]."</a>";

?>

<div class="container-fluid">
	
	
	<!--Форма добавления аэропортов начало-->
	<div id="AddAirportDiv" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Добавить аэропорт</h4>
	      </div>
	      <div class="modal-body">
	       	<form action="#" method="post" data-toggle="validator" id="addAirportForm">
				<div class="form-group col-md-12 col-xs-12">
					<label for="DirectionId">Страна:</label>
					<select class="form-control" id="DirectionId" name="DirectionId" data-error="Название страны, обязательно к заполнению." required>
					</select>
					<div class="help-block with-errors"></div>
				</div>
				
				<div class="form-group col-md-12 col-xs-12">
					<label for="AirportCity">Город:</label>
					<input type="text" class="form-control" id="AirportCity" name="AirportCity" value="">
				</div>
				
				<div class="form-group col-md-12 col-xs-12">
					<label for="AirportName">Название:</label>
					<input type="text" class="form-control" id="AirportName" name="AirportName" value="" data-error="Название аэропорта, обязательно к заполнению." required>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group col-md-12 col-xs-12">
					<label for="AirportCode">Код:</label>
					<input type="text" class="form-control" id="AirportCode" name="AirportCode" value="" data-error="Код аэропорта, обязательны к заполнению." required>
					<div class="help-block with-errors"></div>
				</div>
			
				<div class="form-group col-md-12 col-xs-12">
					<label for="AirportSite">Ссылка на сайт или онлайн табло:</label>
					<input type="url" class="form-control" id="AirportSite" name="AirportSite" value="">
				</div>

				
			</form>
			<div class="modal-footer">
	      		<button id="addAirport" form="addAirportForm" type="submit" class='btn btn-success'><span class='glyphicon glyphicon-floppy-saved' aria-hidden='true'></span> Сохранить</button>
	        	<button id="exitForm" type="button" class="btn btn-default" data-dismiss="modal"><span class='glyphicon glyphicon-floppy-remove' aria-hidden='true'></span> Отменить</button>
			</div>
	      </div>

	    </div>
	  </div>
	</div>
	<!--Форма добавления аэропортов окончание-->
	
	<!--Форма добавления файла к сделке-->
	<div id="mwUploadFile" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Загрузка файла</h4>
			  </div>
			  <div class="modal-body">
			    <form id="uploadFileForm" method="post" enctype="multipart/form-data" action="#">
		    		
		    		<div class="form-group col-md-12 col-xs-12">
						<label for="file">Файл:</label>
			    		<input name="file" type="file" id="file">
					</div>
			    	<div class="form-group col-md-12 col-xs-12">
						<label for="CommentsUpload">Комментарий:</label>
						<textarea class="form-control" rows="4" id="CommentsUpload" name="Comments"></textarea>
					</div>
					<input type="hidden" id="ModelType" name="ModelType" value="dealDocument">
					<input type="hidden" id="ModelId" name="ModelId" value="<?php echo $data[0]["Id"];?>">
				</form>
			  </div>
			  <div class="modal-footer">
			  	<button id="uploadLink" class='btn btn-primary' type="button"><span class='glyphicon glyphicon-upload' aria-hidden='true'> Загрузить</span></button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
			  </div>
			</div>
		</div>
	</div>
	<!--Форма добавления файла к сделке-->
	
	<!--Форма добавления нового клиента-->
	<div id="mwAddContact" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Добавление нового клиента</h4>
			  </div>
			  <div class="modal-body">
			  	<form id="form-contact" action="#" method="post" data-toggle="validator" enctype="multipart/form-data">
					<input type="hidden" id="callerId" name="callerId" value="">
					<input type="hidden" id="FormType" name="FormType" value="Participant">
					<!--input type="hidden" id="passDocType" name="passDocType" value="intPass"-->
					
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contLastName">Фамилия:</label>
						<input type="text" class="form-control" id="contLastName" name="contLastName">
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contFirstName">Имя:</label>
						<input type="text" class="form-control" id="contFirstName" name="contFirstName" placeholder="Иван" data-error="Имя, обязательно к заполнению" required>
						<div class="help-block with-errors"></div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contMiddleName">Отчество:</label>
						<input type="text" class="form-control" id="contMiddleName" name="contMiddleName">
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contDateBirth">Дата рождения:</label>
						<div class="input-group">
						  <input type="text" class="form-control" id="contDateBirth" name="contDateBirth">
						  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
						</div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contTaxCode">ИНН:</label>
						<input type="text" class="form-control" id="contTaxCode" name="contTaxCode" value="">
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contUserId">Менеджер:</label>
						<select class="form-control" id="contUserId" name="contUserId" data-error="Менеджер, обязательно к заполнению" required>
						</select>
						<div class="help-block with-errors"></div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="passSurName">Пасп. SurName:</label>
						<input type="text" class="form-control" id="passSurName" name="passSurName" style="text-transform:uppercase">
					</div>
				  	<div class="form-group col-md-12 col-xs-12">
						<label for="passGivenNames">Пасп. Given Names:</label>
						<input type="text" class="form-control" id="passGivenNames" name="passGivenNames" style="text-transform:uppercase">
					</div>
				  	<div class="form-group col-md-12 col-xs-12">
						<label for="passSerNum">Пасп. серия №:</label>
						<input type="text" class="form-control" id="passSerNum" name="passSerNum">
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="passIssuedDate">Дата выдачи:</label>
							<div class="input-group date">
							  <input type="text" class="form-control" id="passIssuedDate" name="passIssuedDate" >
							  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
						</div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="passValidDate">Пасп. действ. до:</label>
							<div class="input-group date">
							  <input type="text" class="form-control" id="passValidDate" name="passValidDate" >
							  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
						</div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="passIssued">Орган выдачи:</label>
						<div class="input-group">
							<span class="input-group-addon">Био <input type="checkbox" id="passBiometric" name="passBiometric"></span>
							<input type="text" style="text-transform: uppercase" class="form-control" id="passIssued" name="passIssued">
						</div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="fileUploadName">Скан загран:</label>
						<div class="input-group">
							<input type="file" id="fileUploadName" name="fileUploadName" class="fileUploadName" >
						</div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="PhoneMob">Телефон моб:</label>
						<input type="text" class="form-control" id="PhoneMob" name="PhoneMob">
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="EmailHome">Email домашний:</label>
						<input type="text" class="form-control" id="EmailHome" name="EmailHome">
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="Sex">Пол:</label>
						<select class="form-control" id="Sex" name="Sex" data-error="Пол, обязательно к заполнению" required>
						</select>
						<div class="help-block with-errors"></div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contSegment">Сегмент:</label>
						<select class="form-control" id="contSegment" name="contSegment">
						</select>
					</div>
					
				    <div class="col-md-12 col-xs-12">
				    	<div class="form-group">
						<label for="contSource">Источник:</label>
							<div class="input-group">
								<span class="input-group-addon"><a href="#" class="addDictionary" data-type="LeadSource" data-id="#contSource"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
								<select class="form-control" id="contSource" name="contSource"  data-error="Источник, обязательно к заполнению"  required>
								</select>
							</div>
							<div class="help-block with-errors"></div>
						</div>
				    </div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contAddress">Адрес:</label>
						<input type="text" class="form-control" id="contAddress" name="contAddress">
					</div>
		
					<div class="form-group col-md-12 col-xs-12">
						<label for="contComments">Коментарий:</label>
						<textarea class="form-control" rows="3" id="contComments" name="contComments"></textarea>
				  	</div>
				</form>
			  </div>
			  <div class="modal-footer">
			  	<button Id="btnSaveContact" type="submit" form="form-contact" class="btn btn-success">Сохранить</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
			  </div>
			</div>
		</div>
	</div>
	<!--Форма добавления нового клиента-->
	
	<!--Форма добавления нового оператора-->
	<div id="mwAddOperator" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Добавление нового оператора</h4>
			  </div>
			  <div class="modal-body">
			  	<form id="form-operator" action="#" method="post" data-toggle="validator">
			  		
					<input type="checkbox" id="addOperActive" name="addOperActive" checked style="display:none">
			  		<div class="form-group col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addOperName">Название оператора:</label>
							<input type="text" class="form-control" id="addOperName" name="addOperName" data-error="Значение, обязательное к заполнению" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					
			  		<div class="form-group col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addOperPhone">Телефон:</label>
							<input type="tel" class="form-control" id="addOperPhone" name="addOperPhone">
						</div>
					</div>
					
			  		<div class="form-group col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addOperEmail">Email:</label>
							<input type="email" class="form-control" id="addOperEmail" name="addOperEmail">
						</div>
					</div>
					
			  		<div class="form-group col-md-12 col-xs-12">
			  			<div class="form-group">
							<label for="addOperCommision">Ваша комисия:</label>
							<input type="text" class="form-control" id="addOperCommision" name="addOperCommision">
						</div>
					</div>
					
			  		<div class="form-group col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addOperDealNum">№ договора:</label>
							<input type="text" class="form-control" id="addOperDealNum" name="addOperDealNum">
						</div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="addOperDealDateStart">Дата начала договора:</label>
							<div class="input-group date">
							  <input type="text" class="form-control" id="addOperDealDateStart" name="addOperDealDateStart" >
							  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
						</div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="addOperDealDateEnd">Дата окончание договора:</label>
							<div class="input-group date">
							  <input type="text" class="form-control" id="addOperDealDateEnd" name="addOperDealDateEnd" >
							  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
						</div>
					</div>
					
			  		<div class="form-group col-md-12 col-xs-12">
			  			<div class="form-group">
							<label for="addOperLogin">Логин:</label>
							<input type="text" class="form-control" id="addOperLogin" name="addOperLogin">
						</div>
					</div>
					
			  		<div class="form-group col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addOperPass">Пароль:</label>
							<input type="text" class="form-control" id="addOperPass" name="addOperPass">
						</div>
					</div>
					
			  		<div class="form-group col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addOperWebSite">WebSite:</label>
							<input type="text" class="form-control" id="addOperWebSite" name="addOperWebSite">
						</div>
					</div>
					
			  		<div class="form-group col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addOperAddress">Адрес:</label>
							<input type="text" class="form-control" id="addOperAddress" name="addOperAddress">
						</div>
					</div>
				
					<div class="form-group col-md-12 col-xs-12">
						<div class="form-group">
							<input type="checkbox" id="addOperDirectPartners" name="addOperDirectPartners"> Встречающая сторона
						</div>
					</div>
				
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label for="addOperComments">Коментарий:</label>
							<textarea class="form-control" rows="3" id="addOperComments" name="addOperComments"></textarea>
						</div>
					</div>
					
				</form>
			  </div>
			  <div class="modal-footer">
			  	<button Id="btnSaveOper" type="submit" form="form-operator" class="btn btn-success">Сохранить</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
			  </div>
			</div>
		</div>
	</div>
	<!--Форма добавления нового оператора-->
	
	<!--Форма добавления нового курорта-->
	<div id="mwAddRegion" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Добавление нового курорта</h4>
			  </div>
			  <div class="modal-body">
			  	<form id="form-region" action="#" method="post" data-toggle="validator">
			  		<div class="form-group col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addRegionName">Название курорта:</label>
							<input type="text" class="form-control" id="addRegionName" name="addRegionName" data-error="Значение, обязательное к заполнению" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					
				    <div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addRegionRating">Количество звёзд:</label>
							<div class="input-group">
								<span class="input-group-addon"><a href="#" class="addDictionary" data-type="Rating" data-id="#addRegionRating"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
								<select class="form-control" id="addRegionRating" name="addRegionRating" required>
								</select>
							</div>
						</div>
				    </div>	
				
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label for="addRegionComments">Коментарий:</label>
							<textarea class="form-control" rows="3" id="addRegionComments" name="addRegionComments"></textarea>
						</div>
					</div>
				</form>
			  </div>
			  
			  <div class="modal-footer">
			  	<button Id="btnSaveRegion" type="submit" form="form-region" class="btn btn-success">Сохранить</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
			  </div>
			</div>
		</div>
	</div>
	<!--Форма добавления нового курорта-->
	
	<!--Форма добавления нового отеля-->
	<div id="mwAddHotel" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Добавление нового Отеля</h4>
			  </div>
			  <div class="modal-body">
			  	<form id="form-hotel" action="#" method="post" data-toggle="validator">
			  		
			  		<div class="form-group col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addHotelName">Название отеля:</label>
							<input type="text" class="form-control" id="addHotelName" name="addHotelName" data-error="Значение, обязательное к заполнению" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					
				    <div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addHotelStars">Звёзды:</label>
							<div class="input-group">
								<span class="input-group-addon"><a href="#" class="addDictionary" data-type="HotelStars" data-id="#addHotelStars"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
								<select class="form-control" id="addHotelStars" name="addHotelStars" required>
								</select>
							</div>
						</div>
				    </div>	
				    
				    <div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addHotelPhone">Телефон:</label>
							<input type="tel" class="form-control" id="addHotelPhone" name="addHotelPhone" placeholder="+XX(XXX)XXX-XXXX" >
						</div>
				    </div>
				    
				    <div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addHotelEmail">Email:</label>
							<input type="email" class="form-control" id="addHotelEmail" name="addHotelEmail">
						</div>
				    </div>
				    
				    <div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addHotelWebSite">WebSite:</label>
							<input type="url" class="form-control" id="addHotelWebSite" name="addHotelWebSite" placeholder="https://example.com">
						</div>
				    </div>
				    
					<div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addHotelRating">Оценка booking:</label>
							<input type="text" class="form-control" id="addHotelRating" name="addHotelRating" placeholder="8.1">
						</div>
				    </div>

				    <!--div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addHotelRating">Оценка отеля:</label>
							<select class="form-control" id="addHotelRating" name="addHotelRating">
							</select>
						</div>
				    </div-->	
				    
				    <div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addHotelBeach">Пляж:</label>
							<div class="input-group">
								<span class="input-group-addon"><a href="#" class="addDictionary" data-type="HotelBeach" data-id="#addHotelBeach"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
								<select class="form-control" id="addHotelBeach" name="addHotelBeach">
								</select>
							</div>
						</div>
				    </div>
				    
				    <div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addHotelType">Тип:</label>
							<div class="input-group">
								<span class="input-group-addon"><a href="#" class="addDictionary" data-type="HotelType" data-id="#addHotelType"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
								<select class="form-control" id="addHotelType" name="addHotelType">
								</select>
							</div>
						</div>
				    </div>
				    
				    <div class="col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addHotelBeachLine">Линия пляжа:</label>
							<div class="input-group">
								<span class="input-group-addon"><a href="#" class="addDictionary" data-type="HotelBeachLine" data-id="#addHotelBeachLine"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
								<select class="form-control" id="addHotelBeachLine" name="addHotelBeachLine">
								</select>
							</div>
						</div>
				    </div>
				    
			  		<div class="form-group col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addHotelJurName">Юр. Название:</label>
							<input type="text" class="form-control" id="addHotelJurName" name="addHotelJurName">
						</div>
					</div>
					
			  		<div class="form-group col-md-12 col-xs-12">
						<div class="form-group">
							<label for="addHotelJurAddress">Юр адрес:</label>
							<input type="text" class="form-control" id="addHotelJurAddress" name="addHotelJurAddress" >
						</div>
					</div>
				
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label for="addHotelComments">Коментарий:</label>
							<textarea class="form-control" rows="3" id="addHotelComments" name="addHotelComments"></textarea>
						</div>
					</div>
				</form>
			  </div>
			  
			  <div class="modal-footer">
			  	<button Id="btnSaveHotel" type="submit" form="form-hotel" class="btn btn-success">Сохранить</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
			  </div>
			</div>
		</div>
	</div>
	<!--Форма добавления нового отеля-->
	
	<!--Форма добавления нового справочника-->
	<div id="mwAddDictionary" class="modal fade" role="dialog">
		<div class="modal-dialog  modal-sm">
			<div class="modal-content">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Добавление нового значения</h4>
			  </div>
			  <div class="modal-body">
			  	<form id="form-dictionary" action="#" method="post" data-toggle="validator">
			  		<input type="hidden" id="dicType" name="dicType">
					<input type="hidden" id="_id" name="_id">
					<input type="hidden" id="_formId" name="_formId">
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
	
	<dim class="row">
		<div class="x_panel">
		<div class="x_title"><h2><?php echo $x_title;?></h2>
		<div class="clearfix"></div>
			<div class="x_content"><br>
			<form id="form-deals" action="#" method="post" data-toggle="validator" enctype="multipart/form-data" >
					<input type="hidden" id="Id" name="Id" value="<?php echo $data[0]["Id"];?>">
					<input type="hidden" id="ContactPickLastName" value="<?php echo $data[0]["ConLastName"];?>">
					<input type="hidden" id="ContactPickFirstName" value="<?php echo $data[0]["ConFirstName"];?>">
							<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel">
								<a class="panel-heading" role="tab" id="heading01" data-toggle="collapse" data-parent="#accordion" href="#collapse01" aria-expanded="true" aria-controls="collapse01">
								  <h4 class="panel-title">Договор</h4>
								</a>
								<div id="collapse01" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading01">
								  <div class="panel-body">
								  	<div class="row">
								  		
									  	<div class="col-md-2 col-sm-3 col-xs-12">
											<div class="form-group">
											      <label for="DealDate">Дата:</label>
												<div class="input-group">
											    	<input type="text" class="form-control" id="DealDate" name="DealDate" value="<?php if($data[0]["DealDate"] !=="00.00.0000") { echo toFormat("d.m.Y","d.m.Y",$data[0]["DealDate"]);} ?>"> 
											    	<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i></span>
											    </div>
										    </div>
									    </div>	
									    
									    <div class="col-md-2 col-sm-3 col-xs-12">
											<div class="form-group">
												<label for="DealNo">№ сделки</label>
										    	<input type="text" class="form-control" id="DealNo" name="DealNo" value="<?php echo $data[0]["DealNo"]; ?>">
										    </div>
									    </div>
									  	
									    <div class="col-md-2 col-sm-3 col-xs-12">
											<div class="form-group">
												<label for="DealType">Тип:</label>
												<div class="input-group">
													<span class="input-group-addon"><a href="#" class="addDictionary" data-type="DealType" data-id="#DealType"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
													<select class="form-control" id="DealType" name="DealType">
														<option selected value='<?php echo $data[0]["DealType"]; ?>'><?php echo $data[0]["DealTypeName"]; ?></option>
													</select>
												</div>
											</div>
									    </div>	
									    
										
										<div class="form-group col-md-3 col-xs-12">
											<label for="UserId">Менеджер:</label>
											<select class="form-control" id="UserId" name="UserId" data-error="Менеджер, обязательно к заполнению" required>
												<option selected value='<?php echo $data[0]["UserId"]; ?>'><?php echo $data[0]["ManagerName"]; ?></option>
											</select>
										</div>
										   	
									  	
									    <div class="col-md-2 col-sm-12 col-xs-12">
											<div class="form-group">
											<label for="DealCurrency">Валюта:</label>
												<div class="input-group">
													<span class="input-group-addon"><a href="#" class="addDictionary" data-type="DealCurrency" data-id="#DealCurrency"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
													<select class="form-control" id="DealCurrency" name="DealCurrency" required>
														<option selected value='<?php echo $data[0]["DealCurrency"]; ?>'><?php echo $data[0]["DealCurrencyName"]; ?></option>
													</select>
												</div>
											</div>
									    </div>
									    
									    <div class="col-md-1 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="CommercialCourse"> Курс</label>
												<input type="number" step="0.01" class="form-control" id="CommercialCourse" name="CommercialCourse" value="<?php echo $data[0]["CommercialCourse"]; ?>" required>
										    </div>
									    </div>
								    </div>	
									    
									<div class="row"> 
									    
									    <div class="col-md-2 col-sm-12 col-xs-12">
											<div class="form-group">
											<label for="DealSumEquivalent">Сумма в валюте</label>
											<input type="number" step="0.01" class="form-control" id="DealSumEquivalent" name="DealSumEquivalent" value="<?php echo $data[0]["DealSumEquivalent"]; ?>" required>
										    </div>
									    </div>
									    
									    <div class="col-md-2 col-sm-12 col-xs-12">
											<div class="form-group">
											<label for="DealSum">Сумма грн</label>
											<input type="number" step="0.01" class="form-control" id="DealSum" name="DealSum" value="<?php echo $data[0]["DealSum"]; ?>" data-error="Сумма сделки, обязательное" required>
										    </div>
									    </div>
									    
									    <div class="col-md-2 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="DealSumFact">Окончательная сумма грн</label>
												<input type="number" step="0.01" class="form-control" id="DealSumFact" name="DealSumFact" value="<?php echo $data[0]["DealSumFact"]; ?>"data-toggle="tooltip" data-html="true" data-placement="bottom" title="Окончательная сумма сделки.">
										    </div>
									    </div>
									    
									    <div class="col-md-1 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="PercentDiscount">% скидки</label>
												<input type="number" step="0.01" class="form-control" id="PercentDiscount" name="PercentDiscount" value="<?php echo $data[0]["PercentDiscount"]; ?>">
										    </div>
									    </div>
									    
									    <div class="col-md-2 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="PrePaySum">Сумма предоплаты грн</label>
												<input type="number" step="0.01" class="form-control" id="PrePaySum" name="PrePaySum" value="<?php echo $data[0]["PrePaySum"]; ?>">
										    </div>
									    </div>
									    
									    <div class="col-md-1 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="PrePayPercent">% предопл.</label>
												<input type="number" step="0.01" class="form-control" id="PrePayPercent" name="PrePayPercent" value="<?php echo $data[0]["PrePayPercent"]; ?>"data-toggle="tooltip" data-html="true" data-placement="bottom" title="<b>'%'</b> предоплаты по договору. <em>(Сумма предоплаты грн / сумму грн)*100</em>">
										    </div>
									    </div>
									    
									    
									  	<div class="col-md-2 col-sm-3 col-xs-12">
											<div class="form-group">
										      <label for="DateFullPay">Дата полной оплаты:</label>
												<div class="input-group">
											    	<input type="text" class="form-control" id="DateFullPay" name="DateFullPay" value="<?php  if($data[0]["DateFullPay"] !=="00.00.0000") { echo toFormat("d.m.Y","d.m.Y",$data[0]["DateFullPay"]);} ?>">
											    	<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i></span>
											    </div>
										    </div>
									    </div>
									</div>
									
									<div class="row">    
										<div class="form-group col-md-6 col-xs-12">
											<label for="ContactId">ФИО клиента:</label>
											<div class="input-group">
												<span class="input-group-addon"><a href="#" class="addContactId" data-type="contact"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
												<select class="form-control" id="ContactId" name="ContactId">
													<option selected value="<?php echo $data[0]["ContactId"]; ?>"><?php echo $data[0]["ConLastName"]." " . $data[0]["ConFirstName"]." " . $data[0]["ConMiddleName"];?></option>
												</select>
												<span class="input-group-addon"><a href="#" id="clearContactId"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></span>
											</div>
										</div>
										<div class="form-group col-md-6 col-xs-12">
											<label for="LegalId">Название компании:</label>
											<div class="input-group">
												<span class="input-group-addon"><a href="#" id="addLegalId" onclick="return false;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
												<select class="form-control" id="LegalId" name="LegalId">
													<option selected value="<?php echo $data[0]["LegalId"]; ?>"><?php echo $data[0]["LegalName"]." - " . $data[0]["LegalCode"];?></option>
												</select>
												<span class="input-group-addon"><a href="#" id="clearLegalId"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></span>
											</div>
										</div>
										
									    <div class="col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="Comments">Комментарий:</label>
												<textarea class="form-control input-sm" rows="4" id="Comments" name="Comments"><?php echo $data[0]["Comments"]; ?></textarea>
										    </div>
									    </div>
									</div>
									
								  </div>
								</div>
							</div>
							
							<div class="panel">
								<a class="panel-heading collapsed" role="tab" id="heading02" data-toggle="collapse" data-parent="#accordion" href="#collapse02" aria-expanded="true" aria-controls="collapse02">
								  <h4 class="panel-title">Оператор</h4>
								</a>
								<div id="collapse02" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading02">
								  <div class="panel-body">
								  	
								  	
								  	<div class="col-md-4 col-sm-13 col-xs-12">
										<div class="form-group">
											<label for="OperatorName">Название оператора</label>
											<div class="input-group">
												<span class="input-group-addon"><a href="#" id="addOperator"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
												<select class="form-control" id="OperatorName" name="OperatorName">
													<option selected value='<?php echo $data[0]["OperatorId"]; ?>'><?php echo $data[0]["OperatorName"]; ?></option>
												</select>
											</div>
										</div>
								    </div>	
								    
								    <div class="col-md-2 col-sm-12 col-xs-12">
										<div class="form-group">
											<label for="OperatorInvoceNum">№ заявки:</label>
											<input type="text" class="form-control" id="OperatorInvoceNum" name="OperatorInvoceNum" value="<?php echo $data[0]["OperatorInvoceNum"]; ?>">
									    </div>
								    </div>
								    
								    <div class="col-md-2 col-sm-12 col-xs-12">
										<div class="form-group">
											<label for="OperatorInvoceSum">Сумма счёта:</label>
											<input type="number" step="0.01" class="form-control" id="OperatorInvoceSum" name="OperatorInvoceSum" value="<?php echo $data[0]["OperatorInvoceSum"]; ?>">
									    </div>
								    </div>
								  		
								  	<div class="col-md-2 col-sm-3 col-xs-12">
										<div class="form-group">
									      <label for="OperatorInvoceDate">Дата счёта:</label>
											<div class="input-group">
									      <input type="text" class="form-control" id="OperatorInvoceDate" name="OperatorInvoceDate" value="<?php if($data[0]["OperatorInvoceDate"] !=="00.00.0000") { echo toFormat("d.m.Y","d.m.Y",$data[0]["OperatorInvoceDate"]);}?>">
										    	<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i></span>
										    </div>
									    </div>
								    </div>
									
								    <div class="col-md-2 col-sm-12 col-xs-12">
										<div class="form-group">
										<label for="Invoice">№ cчёта факт.:</label>
										<input type="text" class="form-control" id="Invoice" name="Invoice" value="<?php echo $data[0]["Invoice"]; ?>">
									    </div>
								    </div>
								  </div>
								</div>
							</div>
							
							<div class="panel">
								<a class="panel-heading collapsed" role="tab" id="heading03" data-toggle="collapse" data-parent="#accordion" href="#collapse03" aria-expanded="true" aria-controls="collapse03">
								  <h4 class="panel-title">Параметры тура</h4>
								</a>
								<div id="collapse03" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading03">
								  <div class="panel-body">
									
									<div class="row">
										
										<div id="cascadingdropdown">
											
											<div class="col-md-3 col-sm-12 col-xs-12">
												<div class="form-group">
													<label for="DirectionName">Страна:</label>
								        			<div class="input-group">
									        			<select id="DirectionName" class="form-control js-example-basic-single" name="DirectionName" data-selected=<?php echo $data[0]["DirectionId"];?>>
															<option value=""></option>
														</select>
													</div>
												</div>
											</div>
											
											<div class="col-md-3 col-sm-12 col-xs-12">
												<div class="form-group">
													<label for="RegionName">Курорт:</label>
								        			<div class="input-group">
									        			<span class="input-group-addon"><a href="#" id="addRegion"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
									        			<select id="RegionName" class="form-control js-example-basic-single" name="RegionName" data-selected=<?php echo $data[0]["RegionId"];?>>
															<option value=""></option>
														</select>
													</div>
												</div>
											</div>
											
											<div class="col-md-6 col-sm-12 col-xs-12">
												<div class="form-group">
												<label for="HotelName">Отель:</label>
								        			<div class="input-group">
									        			<span class="input-group-addon"><a href="#" id="addHotel"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
														<select id="HotelName" class="form-control js-example-basic-single" name="HotelName" data-selected=<?php echo $data[0]["HotelId"];?>>
															<option value=""></option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
								  	
									<div class="row">
								  		
									  	<div class="col-md-2 col-sm-3 col-xs-12">
											<div class="form-group">
										      <label for="DateArrival">Дата начала:</label>
												<div class="input-group">
										    		<input type="text" class="form-control" id="DateArrival" name="DateArrival" value="<?php if($data[0]["DateArrival"] !=="00.00.0000") { echo toFormat("d.m.Y","d.m.Y",$data[0]["DateArrival"]);} ?>"> 
											    	<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i></span>
											    </div>
										    </div>
									    </div>
								  		
									    <div class="col-md-2 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="AmountNight">Ночи</label>
												<input type="number" min="0" step="1" class="form-control" id="AmountNight" name="AmountNight" editDateDeparture(this.form) value="<?php echo $data[0]["AmountNight"]; ?>">
										    </div>
									    </div>
									    
									  	<div class="col-md-2 col-sm-3 col-xs-12">
											<div class="form-group">
										      <label for="DateDeparture">Дата окончания:</label>
												<div class="input-group">
										    		<input type="text" class="form-control" id="DateDeparture" name="DateDeparture" value="<?php if($data[0]["DateDeparture"] !=="00.00.0000") { echo toFormat("d.m.Y","d.m.Y",$data[0]["DateDeparture"]);} ?>"> 
											    	<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i></span>
											    </div>
										    </div>
									    </div>
									    
									    <div class="col-md-3 col-sm-12 col-xs-12">
											<div class="form-group">
											<label for="FeedName">Питание:</label>
												<div class="input-group">
													<span class="input-group-addon"><a href="#" class="addDictionary" data-type="FeedType" data-id="#FeedName"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
													<select class="form-control" id="FeedName" name="FeedName">
														<option selected value='<?php echo $data[0]["FeedId"]; ?>'><?php echo $data[0]["FeedName"]; ?></option>
													</select>
												</div>
											</div>
									    </div>
									    
									    <div class="col-md-3 col-sm-12 col-xs-12">
											<div class="form-group">
											<label for="FlatType">Тип номера:</label>
												<div class="input-group">
													<span class="input-group-addon"><a href="#" class="addDictionary" data-type="FlatType" data-id="#FlatType"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
													<select class="form-control" id="FlatType" name="FlatType">
														<option selected value='<?php echo $data[0]["FlatTypeId"]; ?>'><?php echo $data[0]["FlatTypeName"]; ?></option>
													</select>
												</div>
											</div>
									    </div>
									    
									    
									    
									    <div class="col-md-3 col-sm-12 col-xs-12">
											<div class="form-group">
											<label for="RoomViewName">Вид из номера:</label>
												<div class="input-group">
													<span class="input-group-addon"><a href="#" class="addDictionary" data-type="RoomView" data-id="#RoomViewName"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
													<select class="form-control" id="RoomViewName" name="RoomViewName">
														<option selected value='<?php echo $data[0]["RoomViewId"]; ?>'><?php echo $data[0]["RoomViewName"]; ?></option>
													</select>
												</div>
											</div>
									    </div>
									    
									    <div class="col-md-3 col-sm-12 col-xs-12">
											<div class="form-group">
											<label for="TransferName">Трансфер:</label>
												<div class="input-group">
													<span class="input-group-addon"><a href="#" class="addDictionary" data-type="Transfer" data-id="#TransferName"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
													<select class="form-control input-sm" id="TransferName" name="TransferName">
														<option selected value='<?php echo $data[0]["TransferId"]; ?>'><?php echo $data[0]["TransferName"]; ?></option>
													</select>
												</div>
											</div>
									    </div>
									    
									    <div class="col-md-3 col-sm-12 col-xs-12">
											<div class="form-group">
											<label for="PlacingType">Размещение:</label>
												<div class="input-group">
													<span class="input-group-addon"><a href="#" class="addDictionary" data-type="PlacingType" data-id="#PlacingType"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
													<select class="form-control" id="PlacingType" name="PlacingType">
														<option selected value='<?php echo $data[0]["PlacingId"]; ?>'><?php echo $data[0]["PlacingTypeName"]; ?></option>
													</select>
												</div>
											</div>
									    </div>
									    
									    
										
									    <div class="col-md-1 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="Transport">Транспорт</label>
												<input type="text" class="form-control" id="Transport" name="Transport" value="<?php echo $data[0]["Transport"]; ?>">
										    </div>
									    </div>
									    
									    <div class="col-md-2 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="Visa">Виза:</label>
												<input type="text" class="form-control" id="Visa" name="Visa" value="<?php echo $data[0]["Visa"]; ?>">
										    </div>
									    </div>
										
									</div>
						
									<div class="row">
										
									    <div class="col-md-2 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="FlightA">№ Рейс А:</label>
												<input type="text" style="text-transform: uppercase" class="form-control" id="FlightA" name="FlightA" value="<?php echo $data[0]["FlightA"]; ?>">
										    </div>
									    </div>
										
								  		
									  	<div class="col-md-2 col-sm-3 col-xs-12">
											<div class="form-group">
										    	<label for="FlightAArrivalDate">Дата вылета А:</label>
												<div class="input-group">
													<input type="text" class="form-control" id="FlightAArrivalDate" name="FlightAArrivalDate" value="<?php if($data[0]["FlightAArrivalDate"] !=="00.00.0000 00:00:00") { echo toFormat("d.m.Y H:i:s","d.m.Y H:i",$data[0]["FlightAArrivalDate"]);} ?>"> 
											    	<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i></span>
											    </div>
										    </div>
									    </div>
									    
										
									  	<div class="col-md-2 col-sm-3 col-xs-12">
											<div class="form-group">
										    <label for="FlightADepartureDate">Дата приземления А:</label>
												<div class="input-group">
												<input type="text" class="form-control" id="FlightADepartureDate" name="FlightADepartureDate" value="<?php if($data[0]["FlightADepartureDate"] !=="00.00.0000 00:00:00") { echo toFormat("d.m.Y H:i:s","d.m.Y H:i",$data[0]["FlightADepartureDate"]);} ?>"> 
											    	<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i></span>
											    </div>
										    </div>
									    </div>

										<div class="col-md-3 col-sm-12 col-xs-12">
											<div class="form-group">
											<label for="FlightACityArrivalId">Аэропорт выл. рейс А:</label>
												<div class="input-group">
													<span class="input-group-addon"><a href="#" data-toggle="modal" data-target="#AddAirportDiv"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
													<select class="form-control" id="FlightACityArrivalId" name="FlightACityArrivalId">
														<option selected value='<?php echo $data[0]["FlightACityArrivalId"]; ?>'><?php echo $data[0]["FlightACityArrivalName"]; ?></option>
													</select>
												</div>
											</div>
									    </div>
									    
									    
										
										<div class="col-md-3 col-sm-12 col-xs-12">
											<div class="form-group">
											<label for="FlightACityDepartureId">Аэропорт приз. рейс А:</label>
												<div class="input-group">
													<span class="input-group-addon"><a href="#" data-toggle="modal" data-target="#AddAirportDiv"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
													
													<select class="form-control" id="FlightACityDepartureId" name="FlightACityDepartureId">
														<option selected value='<?php echo $data[0]["FlightACityDepartureId"]; ?>'><?php echo $data[0]["FlightACityDepartureName"]; ?></option>
													</select>
												</div>
											</div>
									    </div>
									 </div>
									 
									<div class="row">
									    <div class="col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="FlightAComments">Рейс A комментарий:</label>
												<textarea class="form-control" rows="1" id="FlightAComments" name="FlightAComments"><?php echo $data[0]["FlightAComments"]; ?></textarea>
										    </div>
									    </div>
									</div>
									
									<div class="row">
										
									    <div class="col-md-2 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="FlightB">№ Рейс B:</label>
												<input type="text" class="form-control" style="text-transform: uppercase"  id="FlightB" name="FlightB" value="<?php echo $data[0]["FlightB"]; ?>">
										    </div>
									    </div>
										
									  	<div class="col-md-2 col-sm-12 col-xs-12">
											<div class="form-group">
										    <label for="FlightBArrivalDate">Дата вылета B:</label>
												<div class="input-group">
										    		<input type="text" class="form-control" id="FlightBArrivalDate" name="FlightBArrivalDate" value="<?php if($data[0]["FlightBArrivalDate"] !=="00.00.0000 00:00:00") { echo toFormat("d.m.Y H:i:s","d.m.Y H:i",$data[0]["FlightBArrivalDate"]);}  ?>"> 
											    	<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i></span>
											    </div>
										    </div>
									    </div>
									    
									  	<div class="col-md-2 col-sm-12 col-xs-12">
											<div class="form-group">
										    <label for="FlightBDepartureDate">Дата приземления B:</label>
												<div class="input-group">
										    		<input type="text" class="form-control" id="FlightBDepartureDate" name="FlightBDepartureDate" value="<?php if($data[0]["FlightBDepartureDate"] !=="00.00.0000 00:00:00") { echo toFormat("d.m.Y H:i:s","d.m.Y H:i",$data[0]["FlightBDepartureDate"]);}  ?>"> 
											    	<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i></span>
											    </div>
										    </div>
									    </div>
										
										<div class="col-md-3 col-sm-12 col-xs-12">
											<div class="form-group">
											<label for="FlightBCityArrivalId">Аэропорт выл. рейс B:</label>
												<div class="input-group">
													<span class="input-group-addon"><a href="#" data-toggle="modal" data-target="#AddAirportDiv"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
													<select class="form-control" id="FlightBCityArrivalId" name="FlightBCityArrivalId">
														<option selected value='<?php echo $data[0]["FlightBCityArrivalId"]; ?>'><?php echo $data[0]["FlightBCityArrivalName"]; ?></option>
													</select>
												</div>
											</div>
									    </div>
										
										<div class="col-md-3 col-sm-12 col-xs-12">
											<div class="form-group">
											<label for="FlightBCityDepartureId">Аэропорт приз. рейс B:</label>
												<div class="input-group">
													<span class="input-group-addon"><a href="#" data-toggle="modal" data-target="#AddAirportDiv"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
													<select class="form-control js-example-basic-single" id="FlightBCityDepartureId" name="FlightBCityDepartureId">
														<option selected value='<?php echo $data[0]["FlightBCityDepartureId"]; ?>'><?php echo $data[0]["FlightBCityDepartureName"]; ?></option>
													</select>
												</div>
											</div>
									    </div>
										
									</div>
									
									<div class="row">
									    <div class="col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="FlightBComments">Рейс B комментарий:</label>
												<textarea class="form-control" rows="1" id="FlightBComments" name="FlightBComments"><?php echo $data[0]["FlightBComments"]; ?></textarea>
										    </div>
									    </div>
									</div>
									
									<div class="row">
										
									    <div class="col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="AdditionalServices">Дополнительные услуги:</label>
												<textarea class="form-control" rows="4" id="AdditionalServices" name="AdditionalServices"><?php echo $data[0]["AdditionalServices"]; ?></textarea>
										    </div>
									    </div>
										
									
										<div class="form-group col-md-2 col-xs-12">
											<div class="form-group">
												<label for="Insurance"><input type="checkbox" id="Insurance" name="Insurance" <?php echo $checkedInsurance ?>> Страховка Да/Нет</label>
											</div>
										</div>
										
										<div class="form-group col-md-2 col-xs-12">
											<div class="form-group">
												<label for="DocIssued"><input type="checkbox" id="DocIssued" name="DocIssued" <?php echo $checkedDocIssued ?>> Док. выданы Да/Нет</label>
											</div>
										</div>
									</div>
									
								  </div>
								</div>
							</div>
						
							<div class="panel">
								<a class="panel-heading collapsed" role="tab" id="heading04" data-toggle="collapse" data-parent="#accordion" href="#collapse04" aria-expanded="true" aria-controls="collapse04">
								<h4 class="panel-title">Дополнительно</h4>
								</a>
								<div id="collapse04" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading04">
								<div class="panel-body">
									
										
									<div class="form-group col-md-2 col-xs-12">
										<div class="form-group">
											<label for="Act">Акт:</label>
											<input type="text" class="form-control" id="Act" name="Act" value="<?php echo $data[0]["Act"]; ?>">
										</div>
									</div>
									
									    
								  	<div class="col-md-2 col-sm-12 col-xs-12">
										<div class="form-group">
								    		<label for="ActDate">Дата акта:</label>
											<div class="input-group">
								    			<input type="text" class="form-control" id="ActDate" name="ActDate" value="<?php if($data[0]["ActDate"] !=="00.00.0000") { echo toFormat("d.m.Y","d.m.Y",$data[0]["ActDate"]);}  ?>">
										    	<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i></span>
										    </div>
									    </div>
								    </div>
									
									    
								    <div class="col-md-3 col-sm-12 col-xs-12">
										<div class="form-group">
										<label for="AgentClient">Агент/Клиент:</label>
											<select class="form-control" id="AgentClient" name="AgentClient">
												<option selected value='<?php echo $data[0]["AgentClient"]; ?>'><?php echo $data[0]["AgentClientName"]; ?></option>
											</select>
										</div>
								    </div>
								</div>
								</div>
							</div>
						</div>	
					<div class="ln_solid"></div>
					<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12">
					  <button Id="btnSave" type="submit" form="form-deals" class="btn btn-success">Сохранить</button>
					  <a id="btnCancel" href="/deals" class="btn btn-default" style="margin-left: 10px">Отменить</a>
					  <a id="btnPayments" href="/deals/dealpayments?dealid=<?php echo $data[0]["Id"];?>" class="btn btn-default" style="margin-left: 10px">Платежи</a>
					</div>
					</div>
			</form>
		
			
				
			</div>
		</div>
		</div>
	</div>
	
	<dim class="row">
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="x_panel">
			<div class="x_title"><h2>Участники поездки</h2> 
			<ul class="nav navbar-right">
		      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
		    </ul>
			<div class="clearfix"></div>
				
			<div class="x_content"><br>
			
				<div class="form-group col-md-12 col-xs-12">							
					<label for="ParrContactId">Выберите участника:</label>
					<div class="input-group">
						<span class="input-group-addon"><a href="#" class="addContactId" data-type="paticipant"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
						<select class="form-control" id="ParrContactId" name="ParrContactId">
							
						</select>
						<!--span class="input-group-addon"><a href="#" id="clearParrContactId"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></span-->
					</div>
				</div>
				
				<div class="form-group col-md-12 col-xs-12">
					<div class="card">
					  <ul id="participantsList" class="list-unstyled top_profiles scroll-view">
					  </ul>
					</div>
				</div>
				
				
			</div>
			</div>
			</div>
		</div>
		
		
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="x_panel">
			<div class="x_title"><h2>Вложения</h2> 
			<ul class="nav navbar-right">
		      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
		    </ul>
			<div class="clearfix"></div>
				
				
			<div class="x_content"><br>
				<p>Тут Вы можете добавлять файлы : авиабилет, ваучер и т.д. <strong>Файлы будут автоматически удаляться через 1 год после загрузки.</strong></p>
				<p>
					<a id="linkFileUpload" href="#" data-toggle="modal" data-target="#mwUploadFile">Добавить файл <span class="glyphicon glyphicon-upload" aria-hidden="true"></span></a>
				</p>
				
				<div class="card">
				  <ul id="documentsList"class="list-group list-group-flush">
				  </ul>
				</div>
				
				
				
			</div>
			</div>
			</div>
		</div>
	</dim>
</div>