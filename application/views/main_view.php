<?php
	require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
	$mysqli = database::getInstance();
	$db = $mysqli->getConnection();
	
	$cols = array ("Id","AirportConcat");
	$db->orderBy("AirportConcat","asc");
	//$db->where('AccId', $_SESSION['AccId']);
	
	$airports = $db->get("vAirport_materialized", null, $cols);
	$db->disconnect();
	for($i = 0; $i < count($airports); $i++){
		$dim_airports .= "<option selected value='".$airports[$i]['Id']."'>".$airports[$i]['AirportConcat']."</option>";
	}
		
?>
	
	
	<!--div class='hidden-xs hidden-sm'>
	  <div class="x_content">
	    <div class="row">
	      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	        <div class="tile-stats">
	          <div class="icon"><i class="fa fa-caret-square-o-right"></i>
	          </div>
	          <div class="count"><?php echo $data[0]["AmountNewLeads"]; ?></div>
	
	          <h3>Новые запросы</h3>
	          <p>Количество запросов статус "новый"</p>
	        </div>
	      </div>
	      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	        <div class="tile-stats">
	          <div class="icon"><i class="fa fa-comments-o"></i>
	          </div>
	          <div class="count"><?php echo $data[0]["AmountNewContacts"]; ?></div>
	
	          <h3>Новые клиенты</h3>
	          <p>Количество клиентов за 30 дней</p>
	        </div>
	      </div>
	      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	        <div class="tile-stats">
	          <div class="icon"><i class="fa fa-sort-amount-desc"></i>
	          </div>
	          <div class="count"><?php echo $data[0]["AmountNewDeals"]; ?></div>
	
	          <h3>Новые сделки</h3>
	          <p>Количество сделок за 30 дней</p>
	        </div>
	      </div>
	      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	        <div class="tile-stats">
	          <div class="icon"><i class="fa fa-check-square-o"></i>
	          </div>
	          <div class="count"><?php echo $data[0]["AmountTasks"]; ?></div>
	
	          <h3>Задачи в работе</h3>
	          <p>Количество задач в работе</p>
	        </div>
	      </div>
	    </div>
	    </div>
	</div-->
	
	<div class="x_panel">
	  <div class="x_title"><h2>Сделки <b>'Дата вылета'</b> c <?php echo date("d.m.Y");?></h2>
	    <div class="clearfix"></div>
	  </div>
		<div class="x_content">
			
			<p class="text-muted font-13 m-b-30">Список всех улетающих клиентов</p>
			
			<table id="datatable-responsive-arrivals" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
			    <tr>
			      	<th>Фамилия</th>
			        <th>Имя</th>
			        <th>№ договора</th>
			        <th>Оплачен</th>
			        <th>Дата вылета</th>
			        <th>Выданы</th>
			        <th>Оператор</th>
			        <th>Номер заявки</th>
			        <th>Аэропорт</th>
			        <th>Вылет</th>
			        <th>Прилёт</th>
			        <th>Менеджер</th>
			        <th>Действия</th>
			    </tr>
			  </thead>
			</table>
			
		</div>
	</div>

	<div class="x_panel">
	  <div class="x_title"><h2>Сделки <b>'Дата возврата'</b> c <?php echo date("d.m.Y", strtotime("-1 MONTH"));?> по <?php echo date("d.m.Y", strtotime("+1 month"));?></h2>
	    <div class="clearfix"></div>
	  </div>
		<div class="x_content">
			
			<p class="text-muted font-13 m-b-30">Список всех прилетающих клиентов</p>
			
			<table id="datatable-responsive-departure" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
			    <tr><th>Фамилия</th>
			        <th>Имя</th>
			        <th>№ договора</th>
			        <th>Оплачен</th>
			        <th>Дата вылета</th>
			        <th>Оператор</th>
			        <th>Номер заявки</th>
			        <th>Аэропорт</th>
			        <th>Вылет</th>
			        <th>Прилёт</th>
			        <th>Менеджер</th>
			        <th>Действия</th>
			    </tr>
			  </thead>
			</table>
			
		</div>
	</div>
	
	
	<!--Форма добавления аэропортов начало-->
	<div id="addArrivalDiv" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Данные по сделке</h4>
	      </div>
	      <div class="modal-body">
	       	<form action="#" method="post" data-toggle="validator" id="addArrivalForm">
				<input type="hidden" id="Type" name="Type" value="">
				<input type="hidden" id="DealId" name="DealId" value="">
				
				
				<div class="form-group col-md-4 col-xs-12">
					<label for="Flight">№ Рейса:</label>
					<input type="text" style="text-transform: uppercase" class="form-control input-sm" id="Flight" name="Flight" value="">
				</div>
				<div class="form-group col-md-8 col-xs-12">
					<label for="FlightComments">Комментарий:</label>
					<textarea class="form-control input-sm" rows="1" id="FlightComments" name="FlightComments"></textarea>
				 </div>
				<div class="form-group col-md-4 col-xs-12">
					<label for="FlightArrivalDate">Дата/время вылета:</label>
					<div class="input-group date" id="FlightArrivalDate">
					  <input type="text" value = "" class="form-control input-sm" id="FlightArrivalDateInput" name="FlightArrivalDate">
					  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
					</div>
				</div>
	
				<div class="form-group col-md-8 col-xs-12">
					<label for="FlightCityArrivalId">Аэропорт вылета:</label>
					<select class="form-control input-sm js-example-basic-single" id="FlightCityArrivalId" name="FlightCityArrivalId">
						<?php echo $dim_airports; ?>
					</select>
			  	</div>
			  	
				 <div class="form-group col-md-4 col-xs-12">
					<label for="FlightDepartureDate">Дата.время приземления:</label>
					<div class="input-group date" id="FlightDepartureDate">
					  <input type="text" value = "" class="form-control input-sm" id="FlightDepartureDateInput" name="FlightDepartureDate">
					  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
					</div>
				</div>
				<div class="form-group col-md-8 col-xs-12">
					<label for="FlightCityDepartureId">Аэропорт приземления:</label>
					<select class="form-control input-sm js-example-basic-single" id="FlightCityDepartureId" name="FlightCityDepartureId">
						<?php echo $dim_airports; ?>
					</select>
			  	</div>
			  	<div class="form-group col-md-6 col-xs-12">
					<label for="DocIssued"><input type="checkbox" id="DocIssued" name="DocIssued"> Док. выданы Да/Нет</label>
				</div>
			</form>
			<div class="modal-footer">
	      		<button id="addArrivals" form="addArrivalForm" type="submit" class='btn btn-success' type="button"><span class='glyphicon glyphicon-floppy-saved' aria-hidden='true'></span> Сохранить</button>
	        	<button id="exitForm" type="button" class="btn btn-default" data-dismiss="modal"><span class='glyphicon glyphicon-floppy-remove' aria-hidden='true'></span> Отменить</button>
			</div>
	      </div>

	    </div>
	  </div>
	</div>
	<!--Форма добавления аэропортов окончание-->


