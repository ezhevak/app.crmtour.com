<div class="container-fluid">
	<form enctype="multipart/form-data" action="/hotels/save" method="post" data-toggle="validator">
		<input type="hidden" name="Id" id="Id" value="<?php echo $data[0]["Id"];?>">

			<div class="row">
				<div class="form-group col-md-4 col-xs-12">
					<label for="HotelName">Название отеля:</label>
					<input type="text" class="form-control" id="HotelName" name="HotelName" value="<?php echo $data[0]["HotelName"]; ?>" data-error="Название отеля, обязательно к заполнению." required>
					<div class="help-block with-errors"></div>
				</div>
				
				<div id="cascadingdropdown">
					<div class="form-group col-md-3 col-xs-12">
						<label for="DirectionName">Страна:</label>
						<select id="DirectionName" class="form-control js-example-basic-single" name="DirectionName" data-selected=<?php echo $data[0]["DirectionId"];?>>
							<option value="">Выберите страну</option>
						</select>
					</div>
					<div class="form-group col-md-3 col-xs-12">
						<label for="RegionName">Курорт:</label> <a href="#"onclick="addRegion()"><span class="glyphicon glyphicon-plus" ></span> добавить</a>
							<select id="RegionName" class="form-control js-example-basic-single" name="RegionName" data-selected=<?php echo $data[0]["RegionId"];?>>
							<option value="">Выберите регион</option>
						</select>
					</div>
				</div>
				
				
						
			    <div class="col-md-2 col-xs-12">
					<div class="form-group">
						<label for="HotelStars">Звёзды:</label>
						<div class="input-group">
							<span class="input-group-addon"><a href="#" class="addDictionary" data-type="HotelStars" data-id="#addHotelStars"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
							<select class="form-control" id="HotelStars" name="HotelStars" required>
								<option selected value='<?php echo $data[0]["HotelStars"]; ?>'><?php echo $data[0]["HotelStarsName"]; ?></option>
							</select>
						</div>
					</div>
			    </div>	
		    </div>
			
		
		
			<div class="form-group col-md-2 col-xs-12">
				<label for="HotelPhone">Телефон:</label>
				<input type="tel" class="form-control" id="HotelPhone" name="HotelPhone" placeholder="+XX(XXX)XXX-XXXX"  
				value="<?php echo $data[0]["HotelPhone"]; ?>">
		  	</div>
			<div class="form-group col-md-2 col-xs-12">
				<label for="HotelFax">Факс:</label>
				<input type="tel" class="form-control" id="HotelFax" name="HotelFax" placeholder="+XX(XXX)XXX-XXXX"  
				value="<?php echo $data[0]["HotelFax"]; ?>">
		  	</div>
			<div class="form-group col-md-3 col-xs-12">
				<label for="HotelEmail">Email:</label>
				<input type="email" class="form-control" id="HotelEmail" name="HotelEmail"value="<?php echo $data[0]["HotelEmail"]; ?>">
		  	</div>
			<div class="form-group col-md-3 col-xs-12">
				<label for="HotelWebSite">WebSite:</label>
				<input type="text" class="form-control" id="HotelWebSite" name="HotelWebSite" value="<?php echo $data[0]["HotelWebSite"]; ?>">
			</div>
			
			
		    <div class="col-md-2 col-xs-12">
				<div class="form-group">
					<label for="HotelRating">Оценка booking:</label>
					<input type="text" class="form-control" id="HotelRating" name="HotelRating" value="<?php echo $data[0]["HotelRating"]; ?>">
					
					<!--select class="form-control" id="HotelRating" name="HotelRating">
						
							<option selected value='<?php echo $data[0]["HotelRating"]; ?>'><?php echo $data[0]["HotelRatingName"]; ?></option>
					</select-->
				</div>
		    </div>

		    <!--div class="col-md-2 col-xs-12">
				<div class="form-group">
					<label for="HotelRating">Оценка отеля:</label>
					<select class="form-control" id="HotelRating" name="HotelRating">
							<option selected value='<?php echo $data[0]["HotelRating"]; ?>'><?php echo $data[0]["HotelRatingName"]; ?></option>
					</select>
				</div>
		    </div-->
		    
		    
				    
		    <div class="col-md-4 col-xs-12">
				<div class="form-group">
					<label for="HotelBeach">Пляж:</label>
					<div class="input-group">
						<span class="input-group-addon"><a href="#" class="addDictionary" data-type="HotelBeach" data-id="#addHotelBeach"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
						<select class="form-control" id="HotelBeach" name="HotelBeach">
							<option selected value='<?php echo $data[0]["HotelBeach"]; ?>'><?php echo $data[0]["HotelBeachName"]; ?></option>
						</select>
					</div>
				</div>
		    </div>
				    
		    <div class="col-md-4 col-xs-12">
				<div class="form-group">
					<label for="HotelType">Тип отеля:</label>
					<div class="input-group">
						<span class="input-group-addon"><a href="#" class="addDictionary" data-type="HotelType" data-id="#HotelType"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
						<select class="form-control" id="HotelType" name="HotelType">
							<option selected value='<?php echo $data[0]["HotelType"]; ?>'><?php echo $data[0]["HotelTypeName"]; ?></option>
						</select>
					</div>
				</div>
		    </div>
			
		    <div class="col-md-4 col-xs-12">
				<div class="form-group">
					<label for="HotelBeachLine">Линия пляжа:</label>
					<div class="input-group">
						<span class="input-group-addon"><a href="#" class="addDictionary" data-type="HotelBeachLine" data-id="#addHotelBeachLine"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
						<select class="form-control" id="HotelBeachLine" name="HotelBeachLine">
							<option selected value='<?php echo $data[0]["HotelBeachLine"]; ?>'><?php echo $data[0]["HotelBeachLineName"]; ?></option>
						</select>
					</div>
				</div>
		    </div>
			
			
			
			
			
			
			<div class="form-group col-md-6 col-xs-12">
				<label for="HotelJurAddress">Юр адрес:</label>
				<input type="text" class="form-control" id="HotelJurAddress" name="HotelJurAddress" value="<?php echo $data[0]["HotelJurAddress"]; ?>">
			</div>
			
			<div class="form-group col-md-6 col-xs-12">
				<label for="HotelJurName">Юр. Название:</label>
				<input type="text" class="form-control" id="HotelJurName" name="HotelJurName" value="<?php echo $data[0]["HotelJurName"]; ?>">
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