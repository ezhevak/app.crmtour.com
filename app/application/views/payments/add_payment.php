<?php

	require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
	$mysqli = database::getInstance();
    $db_curr = $mysqli->getConnection();
    $db_curr->where("AccId", $_SESSION['AccId']);
	$db_curr->where("Active", "Y");
	$db_curr->where("type", "DealCurrency");
	$db_curr->orderBy("OrderBy","desc");
	
	$db_curr_cols = array("LIC", "Name");
	$db_curr_data = $db_curr->get("Dictionaries", null, $db_curr_cols);
	$db_curr->disconnect();
	//header('Content-Type: application/json; charset=utf-8');
	//return $data;
//	echo json_encode( $data);
	foreach ($db_curr_data as $row) {
		
		if($row['LIC'] == $data[0]["PayCurrency"]){
			$dim_Currency .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
		} else{

			$dim_Currency .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
		}
	}
	
	$db_type = $mysqli->getConnection();
    $db_type->where("AccId", $_SESSION['AccId']);
	$db_type->where("Active", "Y");
	$db_type->where("type", "DealPayType");
	$db_type->orderBy("OrderBy","asc");
	
	$db_type_cols = array("LIC", "Name");
	$db_type_data = $db_type->get("Dictionaries", null, $db_type_cols);
	$db_type->disconnect();
	//header('Content-Type: application/json; charset=utf-8');
	//return $data;
//	echo json_encode( $data);
	foreach ($db_type_data as $row) {
		
		if($row['LIC'] == $data[0]["PayType"]){
			$dim_type .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
		} else{

			$dim_type .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
		}
	}
		
?>
	
	<div class="x_panel">
	<div class="x_title"><h2>Редактирование платежа <?php echo $data[0]["Id"];?></h2>
	<div class="clearfix"></div>
	<div class="x_content"><br>
	
	<form id="form-payments" action="#" method="post">
		<input type="hidden" Id="Id" name="Id" value="<?php echo $data[0]["Id"];?>">
		<input type="hidden" Id="DealId" name="DealId" value="<?php echo $data[0]["DealId"];?>">
		<div class="row">
			<div class="form-group col-md-2 col-xs-12">
			      <label for="PayDate">Дата платежа:</label>
			      <input type="text" class="form-control input-md" id="PayDate" name="PayDate" value="<?php echo toFormat("Y-m-d","d.m.Y",$data[0]["PayDate"]); ?>" data-error="Дата, обязательно к заполнению" required>
			      <div class="help-block with-errors"></div>
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
			    <label for="PayType">Тип платежа:</label>
				<select class="form-control input-md" id="PayType" name="PayType">
					<?php echo $dim_type; ?>
				</select>
			</div>	
			
			<div class="form-group col-md-2 col-xs-12">
			    <label for="PayCurrency">Валюта:</label>
				<select class="form-control input-md" id="PayCurrency" name="PayCurrency">
					<?php echo $dim_Currency; ?>
				</select>
			</div>		
			<div class="form-group col-md-2 col-xs-12">
			      <label for="PayCource">Курс:</label>
			      <input type="number" step="0.01" class="form-control input-md" id="PayCource" name="PayCource" value="<?php echo $data[0]["PayCource"];?>">
			</div>
			<div class="form-group col-md-2 col-xs-12">
			      <label for="PayEquivalent">Сумма в валюте:</label>
			      <input type="number" step="0.01" class="form-control input-md" id="PayEquivalent" name="PayEquivalent" value="<?php echo $data[0]["PayEquivalent"];?>">
			</div>	  
			<div class="form-group col-md-2 col-xs-12">
			      <label for="PaySum">Сумма платежа:</label>
			      <input type="number" step="0.01" class="form-control input-md" id="PaySum" name="PaySum" value="<?php echo $data[0]["PaySum"];?>" data-error="Сумма, обязательно к заполнению" required>
				  <div class="help-block with-errors"></div>
			</div>
			
			<div class="form-group col-md-4 col-xs-12">
			      <label for="Payer">Плательщик:</label>
			      <input type="text" class="form-control input-md" id="Payer" name="Payer" value="<?php echo $data[0]["Payer"];?>" data-error="Плательщик, обязательно к заполнению" required>
			      <div class="help-block with-errors"></div>
			</div>
			
			<div class="form-group col-md-12 col-xs-12">
			      <label for="Comments">Комментарий:</label>
			      <textarea rows="5"  class="form-control input-md"  id="Comments" name="Comments"><?php echo $data[0]["Comments"]; ?></textarea>
			</div>
		</div>
		
		
		<div class="ln_solid"></div>
		<div class="form-group">
		<!--div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"-->
		<div class="col-md-6 col-sm-6 col-xs-12">
		  <button Id="btnSave" type="submit" form="form-payments" class="btn btn-success">Сохранить</button>
		  <a id="btnCancel" href="/deals/dealpayments?dealid=<?php echo $data[0]["DealId"];?>" class="btn btn-default" style="margin-left: 10px">Отменить</a>
		</div>
		</div>
	</form>
	</div>
	</div>
	</div>