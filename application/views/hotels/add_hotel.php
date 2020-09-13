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

//echo $data[0]["HotelRating"];
//Получаем оценки для отелей
try {
	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and  AccId = $AccId and type='Rating' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){
		if($row['LIC'] == $data[0]["HotelRating"]){
				$HotelRating .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$HotelRating .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}

		}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}





//Получаем оценки для отелей
try {
	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and AccId = $AccId and type='HotelStars' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){
		if($row['LIC'] == $data[0]["HotelStars"]){
				$HotelStars .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$HotelStars .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}

		}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

//Получаем тип пляжа
try {
	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and AccId = $AccId and type='HotelBeach' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){
		if($row['LIC'] == $data[0]["HotelBeach"]){
				$HotelBeach .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$HotelBeach .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}

		}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}


//Получаем тип отеля
try {
	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and AccId = $AccId and type='HotelType' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){
		if($row['LIC'] == $data[0]["HotelType"]){
				$HotelType .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$HotelType .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}

		}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}
//Получаем линию от пляжа
try {
	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and AccId = $AccId and type='HotelBeachLine' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){
		if($row['LIC'] == $data[0]["HotelBeachLine"]){
				$HotelBeachLine .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$HotelBeachLine .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}

		}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

//Получаем рейтинг tripadvisor 
try {
	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and AccId = $AccId and type='HotelTripAdvisor ' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){
		if($row['LIC'] == $data[0]["HotelTripAdvisor"]){
				$HotelTripAdvisor .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$HotelTripAdvisor .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}

		}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

$conn->close();


?>


<div class="container-fluid">
	<form enctype="multipart/form-data" action="/hotels/save" method="post" data-toggle="validator">
		<input type="hidden" name="Id" id="Id" value="<?php echo $data[0]["Id"];?>">

		<div class="row">
			
			<div class="form-group col-md-4 col-xs-12">
				<label for="HotelName">Название отеля:</label>
				<input type="text" class="form-control input-sm" id="HotelName" name="HotelName" value="<?php echo $data[0]["HotelName"]; ?>" data-error="Название отеля, обязательно к заполнению." required>
				<div class="help-block with-errors"></div>
			</div>
			
			<div id="cascadingdropdown">
				<div class="form-group col-md-3 col-xs-12">
					<label for="DirectionName">Страна:</label>
					<select id="DirectionName" class="form-control input-sm js-example-basic-single" name="DirectionName" data-selected=<?php echo $data[0]["DirectionId"];?>>
						<option value="">Выберите страну</option>
					</select>
				</div>
				<div class="form-group col-md-3 col-xs-12">
					<label for="RegionName">Курорт:</label> <a href="#"onclick="addRegion()"><span class="glyphicon glyphicon-plus" ></span> добавить</a>
						<select id="RegionName" class="form-control input-sm js-example-basic-single" name="RegionName" data-selected=<?php echo $data[0]["RegionId"];?>>
						<option value="">Выберите регион</option>
					</select>
				</div>
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="HotelStars">Кол-во звёзд:</label>
				<select class="form-control input-sm" id="HotelStars" name="HotelStars">
					<?php echo $HotelStars; ?>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="form-group col-md-2 col-xs-12">
				<label for="HotelPhone">Телефон:</label>
				<input type="tel" class="form-control input-sm" id="HotelPhone" name="HotelPhone" placeholder="+XX(XXX)XXX-XXXX"  
				value="<?php echo $data[0]["HotelPhone"]; ?>">
		  	</div>
			<div class="form-group col-md-2 col-xs-12">
				<label for="HotelFax">Факс:</label>
				<input type="tel" class="form-control input-sm" id="HotelFax" name="HotelFax" placeholder="+XX(XXX)XXX-XXXX"  
				value="<?php echo $data[0]["HotelFax"]; ?>">
		  	</div>
			<div class="form-group col-md-3 col-xs-12">
				<label for="HotelEmail">Email:</label>
				<input type="email" class="form-control input-sm" id="HotelEmail" name="HotelEmail"value="<?php echo $data[0]["HotelEmail"]; ?>">
		  	</div>
			<div class="form-group col-md-3 col-xs-12">
				<label for="HotelWebSite">WebSite:</label>
				<input type="text" class="form-control input-sm" id="HotelWebSite" name="HotelWebSite" value="<?php echo $data[0]["HotelWebSite"]; ?>">
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="HotelRating">Оценка отеля:</label>
				<select class="form-control input-sm" id="HotelRating" name="HotelRating">
					<?php echo $HotelRating; ?>
				</select>
			</div>
			
		</div>
		<div class="row">
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="HotelBeach">Пляж:</label>
				<select class="form-control input-sm" id="HotelBeach" name="HotelBeach">
					<?php echo $HotelBeach; ?>
				</select>
			</div>
			<div class="form-group col-md-2 col-xs-12">
				<label for="HotelType">Тип отеля:</label>
				<select class="form-control input-sm" id="HotelType" name="HotelType">
					<?php echo $HotelType; ?>
				</select>
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="HotelBeachLine">Линия от пляжа:</label>
				<select class="form-control input-sm" id="HotelBeachLine" name="HotelBeachLine">
					<?php echo $HotelBeachLine; ?>
				</select>
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="HotelTripAdvisor">Рейтинг TripAdvisor:</label>
				<select class="form-control input-sm" id="HotelTripAdvisor" name="HotelTripAdvisor">
					<?php echo $HotelTripAdvisor; ?>
				</select>
			</div>
			
			<div class="form-group col-md-4 col-xs-12">
				<label for="TripAdvisorLink">Ссылка на TripAdvisor:</label>
				<input type="text" class="form-control input-sm" id="TripAdvisorLink" name="TripAdvisorLink" value="<?php echo $data[0]["TripAdvisorLink"]; ?>">
			</div>
			
			<div class="form-group col-md-4 col-xs-12">
				<label for="HotelJurAddress">Юр адрес:</label>
				<input type="text" class="form-control input-sm" id="HotelJurAddress" name="HotelJurAddress" value="<?php echo $data[0]["HotelJurAddress"]; ?>">
			</div>
			
			<div class="form-group col-md-4 col-xs-12">
				<label for="HotelJurName">Юр. Название:</label>
				<input type="text" class="form-control input-sm" id="HotelJurName" name="HotelJurName" value="<?php echo $data[0]["HotelJurName"]; ?>">
			</div>
			<div class="form-group col-md-4 col-xs-12">
				<label for="doc_file">Карта отеля:</label>
				<div class="input-group" id="doc_file">
		           <a id="fileUploadInput" <?php if ($data[0]["ScanExists"] == "0") echo "href='#'"; else echo "href='/uploads/getfile?ModelType=hotels&ModelId=".$data[0]["Id"]."'";?> target="_blank" class="form-control fileUploadInput"><?php echo $data[0]["FileName"]; ?></a>
		           <span class="input-group-btn">
		                <label class="btn btn-default btn-file">
		                    <span class="glyphicon glyphicon-upload"></span> <input id="fileUploadName" name="fileUploadName" class="fileUploadName" type="file" hidden>
		                </label>
		                <button id="fileDeleteBtn" class="btn btn-default" type="button" style='<?php if ($data[0]["FileName"] == "") echo "display:none";?>'>
		                    <span class="glyphicon glyphicon-remove"></span>
		                </button>
		           </span>
		        </div>
		        <div id="fileError" class="help-block with-errors" style="position: absolute;"></div>
	        </div>	
			
		</div>
		
		
		<div class="row">
			<div class="form-group col-md-12 col-xs-12">
				<label for="Comments">Комментарий:</label>
				<textarea class="form-control input-sm" rows="10" id="Comments" name="Comments"><?php echo $data[0]["Comments"]; ?></textarea>
			</div>
		</div>
		
		<button type="submit" class="btn btn-success">Сохранить</button><a href="/hotels" class="btn btn-default" style="margin-left: 10px">Отменить</a>
	</form>
	
	
	
	
	
</div>


<script>
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
</script>