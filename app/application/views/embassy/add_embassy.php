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

//Получаем список направлений/стран
try {
	$sql = "SELECT * FROM  `dimDirection` order by DirectionName";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){
		if($row['Id'] == $data[0]["DirectionId"]){
				$embassy .= "<option selected value='".$row['Id']."'>".$row['DirectionName']."</option>";
			} else{
				$embassy .= "<option value='".$row['Id']."'>".$row['DirectionName']."</option>";
			}
		}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}


$conn->close();

?>


<div class="container-fluid">
	<form action="/embassy/save" method="post" data-toggle="validator">
		<input type="hidden" name="Id" value="<?php echo $data[0]["Id"];?>">

		<div class="row">
			
			<div class="form-group col-md-4 col-xs-12">
				<label for="DirectionId">Страна:</label>
				<select class="form-control input-sm" id="DirectionId" name="DirectionId">
					<?php echo $embassy; ?>
				</select>
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="EmbassyPhone">Телефон:</label>
				<input type="tel" class="form-control input-sm" id="EmbassyPhone" name="EmbassyPhone" placeholder="+XX(XXX)XXX-XXXX"  
				value="<?php echo $data[0]["EmbassyPhone"]; ?>">
		  	</div>
			
			
			<div class="form-group col-md-3 col-xs-12">
				<label for="EmbassyEmail">Email:</label>
				<input type="email" class="form-control input-sm" id="EmbassyEmail" name="EmbassyEmail"value="<?php echo $data[0]["EmbassyEmail"]; ?>">
		  	</div>
		</div>	
		<div class="row">		
			<div class="form-group col-md-5 col-xs-12">
				<label for="EmbassyWebSite">WebSite:</label>
				<input type="text" class="form-control input-sm" id="EmbassyWebSite" name="EmbassyWebSite" value="<?php echo $data[0]["EmbassyWebSite"]; ?>">
			</div>
			
			<div class="form-group col-md-4 col-xs-12">
				<label for="EmbassyAddress">Адрес консульства/визового центра:</label>
				<input type="text" class="form-control input-sm" id="EmbassyAddress" name="EmbassyAddress"value="<?php echo $data[0]["EmbassyAddress"]; ?>">
		</div>
		</div>		
				
			<div class="row">
				<div class="form-group col-md-9 col-xs-12">
					<label for="Comments">Комментарий:</label>
					<textarea class="form-control input-sm" rows="10" id="Comments" name="Comments"><?php echo $data[0]["Comments"]; ?></textarea>
				</div>
			</div>
		
		<button type="submit" class="btn btn-default">Сохранить</button><a href="/embassy" class="btn btn-default" style="margin-left: 10px">Отменить</a>
		</form>
</div>