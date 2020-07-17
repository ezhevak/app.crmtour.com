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
	$sql = "SELECT * FROM  `dimDirection`";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){
		if($row['Id'] == $data[0]["DirectionId"]){
				$direction .= "<option selected value='".$row['Id']."'>".$row['DirectionName']."</option>";
			} else{
				$direction .= "<option value='".$row['Id']."'>".$row['DirectionName']."</option>";
			}
		}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

//Получаем оценки для отелей
try {
	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and AccId = $AccId and type='Rating' order by OrderBy asc";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){
		if($row['LIC'] == $data[0]["RegionRating"]){
				$Rating .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$Rating .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}

		}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

$conn->close();

?>


<div class="container-fluid">
	<form action="/regions/save" method="post" data-toggle="validator">
		<input type="hidden" name="Id" value="<?php echo $data[0]["Id"];?>">

		<div class="row">
			
			<div class="form-group col-md-4 col-xs-12">
				<label for="DirectionId">Страна:</label>
				<select class="form-control input-sm" id="DirectionId" name="DirectionId">
					<?php echo $direction; ?>
				</select>
			</div>
			
			<div class="form-group col-md-5 col-xs-12">
				<label for="RegionName">Название региона:</label>
				<input type="text" class="form-control input-sm" id="RegionName" name="RegionName" value="<?php echo $data[0]["RegionName"]; ?>" data-error="Название региона, обязательно к заполнению." required>
				<div class="help-block with-errors"></div>
			</div>
			
		<div class="form-group col-md-3 col-xs-12">
				<label for="RegionRating">Оценка региона:</label>
				<select class="form-control input-sm" id="RegionRating" name="RegionRating">
					<?php echo $Rating; ?>
				</select>
			</div>
			
			
		</div>
		
		<div class="row">
			<div class="form-group col-md-12 col-xs-12">
				<label for="Comments">Комментарий:</label>
				<textarea class="form-control input-sm" rows="5" id="Comments" name="Comments"><?php echo $data[0]["Comments"]; ?></textarea>
			</div>
		</div>
		
		<button type="submit" class="btn btn-default">Сохранить</button><a href="/regions" class="btn btn-default" style="margin-left: 10px">Отменить</a>
		</form>
</div>