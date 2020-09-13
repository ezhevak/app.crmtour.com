<?php

	require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
	$mysqli = database::getInstance();
	/////////////////Получаем список направлений/стран
    $db_direct = $mysqli->getConnection();

	$db_direct_cols = array("Id","DirectionName");
	$db_direct_data = $db_direct->get("dimDirection", null, $db_direct_cols);
	$db_direct->disconnect();

	foreach ($db_direct_data as $row) {
		if($row['Id'] == $data[0]["DirectionId"]){
			$direction .= "<option selected value='".$row['Id']."'>".$row['DirectionName']."</option>";
		} else {
			$direction .= "<option value='".$row['Id']."'>".$row['DirectionName']."</option>";
		}
	}

	//Заголовок формы редактирования запросов.
	if($data[0]["Id"] ==""){
		$x_title = "Форма редактирования нового аэропорта";
	} else {
		$x_title = "Форма редактирования ".$data[0]["AirportName"];
	}
?>


<div class="container-fluid">
	
<div class="x_panel">
<div class="x_title"><h2><?php echo $x_title;?></h2>
<div class="clearfix"></div>
<div class="x_content"><br>
	<form action="/airport/save" method="post" data-toggle="validator">
		<input type="hidden" name="Id" value="<?php echo $data[0]["Id"];?>">

		<div class="row">
			
			<div class="form-group col-md-3 col-xs-12">
				<label for="DirectionId">Страна:</label>
				<select class="form-control input-sm  js-example-basic-single" id="DirectionId" name="DirectionId">
					<?php echo $direction; ?>
				</select>
			</div>
			
			<div class="form-group col-md-3 col-xs-12">
				<label for="AirportName">Название аэропорта:</label>
				<input type="text" class="form-control input-sm" id="AirportName" name="AirportName" value="<?php echo $data[0]["AirportName"]; ?>" data-error="Название аэропорта, обязательно к заполнению." required>
				<div class="help-block with-errors"></div>
			</div>
			
			<div class="form-group col-md-3 col-xs-12">
				<label for="AirportCode">Код аэропорта:</label>
				<input type="text" class="form-control input-sm" id="AirportCode" name="AirportCode" value="<?php echo $data[0]["AirportCode"]; ?>" data-error="Код аэропорта, обязательны к заполнению." required>
				<div class="help-block with-errors"></div>
			</div>
			
			<div class="form-group col-md-3 col-xs-12">
				<label for="AirportCity">Город:</label>
				<input type="text" class="form-control input-sm" id="AirportCity" name="AirportCity" value="<?php echo $data[0]["AirportCity"]; ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="form-group col-md-2 col-xs-12">
				<label for="AirportPhone">Телефон аэропорта:</label>
				<input type="tel" class="form-control input-sm" id="AirportPhone" name="AirportPhone" placeholder="+38(067)555-4422"  
				value="<?php echo $data[0]["AirportPhone"]; ?>">
		  	</div>
		  	
			<div class="form-group col-md-2 col-xs-12">
				<label for="AirportFax">Факс аэропорта:</label>
				<input type="tel" class="form-control input-sm" id="AirportFax" name="AirportFax" placeholder="+38(067)555-4422"  
				value="<?php echo $data[0]["AirportFax"]; ?>">
		  	</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="AirportEmail">Email аэропорта:</label>
				<input type="email" class="form-control input-sm" id="AirportEmail" name="AirportEmail" placeholder="example@gmail.com" value="<?php echo $data[0]["AirportEmail"]; ?>">
			</div>
		
			<div class="form-group col-md-6 col-xs-12">
				<label for="AirportSite">Ссылка на сайт или онлайн табло:</label>
				<input type="text" class="form-control input-sm" id="AirportSite" name="AirportSite" value="<?php echo $data[0]["AirportSite"]; ?>">
			</div>
		</div>
		
		<button type="submit" class="btn btn-success">Сохранить</button><a href="/airport" class="btn btn-default" style="margin-left: 10px">Отменить</a>
		</form>
</div>
</div>
</div>
</div>