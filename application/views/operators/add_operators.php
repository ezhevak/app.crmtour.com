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


if($data[0]["Active"]=="1"){$checkedActive = "checked";}
if($data[0]["DirectPartners"]=="1"){$checkedDirectPartners = "checked";}

$conn->close();

?>


<div class="container-fluid">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#home">Общая информация</a></li>
		<li><a data-toggle="tab" href="#directions">Направления</a></li>
		<li><a data-toggle="tab" href="#deals">Сделки</a></li>
	</ul>
	
 	<div class="tab-content">
    	<div id="home" class="tab-pane fade in active">
	
			<form action="/operators/save" method="post" data-toggle="validator">
				<input id="Id" type="hidden" name="Id" value="<?php echo $data[0]["Id"];?>">
		
				<div class="row">
					<div class="form-group col-md-5 col-xs-12">
						<label for="Name">Название оператора:</label>
						<input type="text" class="form-control input-sm" id="Name" name="Name" value="<?php echo $data[0]["Name"]; ?>" data-error="Название оператора, обязательно к заполнению." required>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group col-md-2 col-xs-12">
						<label for="Phone">Телефон:</label>
						<input type="tel" class="form-control input-sm" id="Phone" name="Phone" placeholder="+XX(XXX)XXX-XXXX"  
						value="<?php echo $data[0]["Phone"]; ?>">
				  	</div>
					<div class="form-group col-md-4 col-xs-12">
						<label for="Email">Email:</label>
						<input type="email" class="form-control input-sm" id="Email" name="Email"value="<?php echo $data[0]["Email"]; ?>">
				  	</div>
				</div>
				<div class="row">
					<div class="form-group col-md-1 col-xs-12">
						<label for="Commision">Комисия:</label>
						<input type="text" class="form-control input-sm" id="Commision" name="Commision" value="<?php echo $data[0]["Commision"]; ?>">
					</div>
					<div class="form-group col-md-2 col-xs-12">
						<label for="DealNum">№ договора:</label>
						<input type="text" class="form-control input-sm" id="DealNum" name="DealNum" value="<?php echo $data[0]["DealNum"]; ?>">
					</div>
					
					<div class="form-group col-md-2 col-xs-12">
						<label for="DealDateStart">Начало договора:</label>
						<div class="input-group date" id="DealDateStart">
						  <input type="text" value = "<?php echo $data[0]["DealDateStart"]; ?>" class="form-control input-sm" id="DealDateStart" name="DealDateStart">
						  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
						</div>
					</div>
					<div class="form-group col-md-2 col-xs-12">
						<label for="DealDateEnd">Окончание договора:</label>
						<div class="input-group date" id="DealDateEnd">
						  <input type="text" value = "<?php echo $data[0]["DealDateEnd"]; ?>" class="form-control input-sm" id="DealDateEnd" name="DealDateEnd">
						  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
						</div>
					</div>
					
					<div class="form-group col-md-2 col-xs-12">
						<label for="Login">Логин:</label>
						<input type="text" class="form-control input-sm" id="Login" name="Login" value="<?php echo $data[0]["Login"]; ?>">
					</div>
					
					<div class="form-group col-md-2 col-xs-12">
						<label for="Pass">Пароль:</label>
						<input type="text" class="form-control input-sm" id="Pass" name="Pass" value="<?php echo $data[0]["Pass"]; ?>">
					</div>
					
				</div>
				<div class="row">
					<div class="form-group col-md-4 col-xs-12">
						<label for="WebSite">WebSite:</label>
						<input type="text" class="form-control input-sm" id="WebSite" name="WebSite" value="<?php echo $data[0]["WebSite"]; ?>">
					</div>
					<div class="form-group col-md-7 col-xs-12">
						<label for="Address">Адрес:</label>
						<input type="text" class="form-control input-sm" id="Address" name="Address" value="<?php echo $data[0]["Address"]; ?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-2 col-xs-12">
						<label for="Active"><input type="checkbox" id="Active" name="Active" <?php echo $checkedActive ?>> Активный</label>
					</div>
					<div class="form-group col-md-3 col-xs-12">
						<label for="DirectPartners"><input type="checkbox" id="DirectPartners" name="DirectPartners" <?php echo $checkedDirectPartners ?>/> Встречающая сторона</label>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-10 col-xs-12">
						<label for="Comments">Комментарий:</label>
						<textarea class="form-control input-sm" rows="5" id="Comments" name="Comments"><?php echo $data[0]["Comments"]; ?></textarea>
					</div>
				</div>
				
				<button type="submit" class="btn btn-default">Сохранить</button><a href="/operators" class="btn btn-default" style="margin-left: 10px">Отменить</a>
				</form>
			</div>
	    <div id="directions" class="tab-pane fade">
	      	<div id="pickDirectionsMVG"></div>
			<div class="row">
				<div class="col-sm-12">
					<!--p>afasdasds</p-->
					<table id="grid_operator_to_directions"></table>
					<div id="page_operator_to_directions"></div>
				</div>
			</div>
	    </div>
	    
	    <div id="deals" class="tab-pane fade">
	      	<div class="row">
				<div class="col-sm-12">
					<table id="grid_operator_deals"></table>
					<div id="grid_operator_deals"></div>
				</div>
			</div>
	    </div>
  </div>
</div>