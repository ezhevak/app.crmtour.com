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
	$sql = "SELECT * FROM  `Dictionaries` where Active = 'Y' and AccId = $AccId and type='DocType' order by OrderBy";
	$result = $conn->query($sql);
	while( $row = $result->fetch_assoc()){

		if($row['LIC'] == $data[0]["DocType"]){
				$dim_doctype .= "<option selected value='".$row['LIC']."'>".$row['Name']."</option>";
			} else{
				$dim_doctype .= "<option value='".$row['LIC']."'>".$row['Name']."</option>";
			}

		}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

if($data[0]["Biometric"]=="1"){$checkedBiometric = "checked";}

$conn->close();

//Если новый документ по умолчанию всё активно
if($data[0]["Id"]==""){
	$LastAdd = "checked";
} else {
	if($data[0]["LastAdd"]=="1"){$LastAdd = "checked";}
}


//Заголовок формы редактирования запросов.
if($data[0]["Id"] ==""){
	$x_title = "Форма редактирования нового документа ".$data[0]["ContactFirstName"]." ".$data[0]["ContactLastName"] ;
} else {
	$x_title = "Форма редактирования документа ".$data[0]["ContactFirstName"]. " ".$data[0]["ContactLastName"];
}


?>


<div class="container-fluid">
	
<div class="x_panel">
<div class="x_title"><h2><?php echo $x_title;?></h2>
<div class="clearfix"></div>
<div class="x_content"><br>

<div id='intPass' style='display: none;'>
	<form action="/documents/save" method="post" data-toggle="validator" enctype="multipart/form-data">
		<input type="hidden" id="Id" name="Id" value="<?php echo $data[0]["Id"];?>">
		<input type="hidden" name="ContactId" value="<?php echo $data[0]["ContactId"]; ?>">
		

		<div class="row">
			<div class="form-group col-md-3 col-xs-12">
					<label for="docTypeInt">Тип документа:</label>
					<select class="form-control input-sm" id="docTypeInt" name="docType" onChange="selected(this)">
						<?php echo $dim_doctype; ?>
					</select>
		  	</div>
		  	
	  		<div class="form-group col-md-3 col-xs-12">
				<label for="docLastName">SurName:</label>
				<input type="text" style="text-transform: uppercase" class="form-control input-sm" id="docLastName" name="docLastName" value="<?php echo $data[0]["LastName"]; ?>">
			</div>
			<div class="form-group col-md-3 col-xs-12">
				<label for="docFirstName">Name:</label>
				<input type="text" style="text-transform: uppercase" class="form-control input-sm" id="docFirstName" name="docFirstName"  value="<?php echo $data[0]["FirstName"]; ?>">
			</div>
	  		<div class="form-group col-md-3 col-xs-12">
				<label for="docSerNum">Серия №</label>
				<input type="text" style="text-transform: uppercase" class="form-control input-sm" id="docSerNum" name="docSerNum" value="<?php echo $data[0]["SeriaNum"]; ?>">
			</div>
			
			<div class="form-group col-md-3 col-xs-12">
				<label for="docIssuedDate">Дата выдачи:</label>
				<div class="input-group">
				  <input type="text" value = "<?php echo $data[0]["IssuedDate"]; ?>" class="form-control input-sm" id="docIssuedDate" name="docIssuedDate">
				  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
				</div>
			</div>
			<div class="form-group col-md-3 col-xs-12">
				<label for="docValid">Действителен до:</label>
				<div class="input-group">
				  <input type="text" value = "<?php echo $data[0]["Valid"]; ?>" class="form-control input-sm" id="docValid" name="docValid">
				  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
				</div>
			</div>
	  		<div class="form-group col-md-3 col-xs-12">
				<label for="docIssuedBy">Орган выдачи:</label>
				<input type="text" class="form-control input-sm" id="docIssuedBy" name="docIssuedBy" value="<?php echo $data[0]["IssuedBy"]; ?>">
			</div>
			<div class="form-group col-md-4 col-xs-12">
				<label for="doc_file">Файл документа:</label>
				<div class="input-group" id="doc_file">
		           <a id="fileUploadInput" <?php if ($data[0]["ScanExists"] == "0") echo "href='#'"; else echo "href='/uploads/getfile?ModelType=documents&ModelId=".$data[0]["Id"]."'";?> class="form-control fileUploadInput"><?php echo $data[0]["FileName"]; ?></a>
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
		    <div class="form-group col-md-2 col-xs-12">
				<label for="Biometric"><input type="checkbox" id="Biometric" name="Biometric" <?php echo $checkedBiometric ?>> Биометрический</label>
			</div>
			
			<div class="form-group col-md-2 col-xs-12">
				<label for="LastAdd"><input type="checkbox" id="LastAdd" name="LastAdd" <?php echo $LastAdd ?>/> Основной</label>
			</div>
		</div>
		  
		<div class="row">
			<div class="form-group col-md-12 col-xs-12">
				<label for="docComments">Комментарий:</label>
				<textarea class="form-control input-sm" rows="5" id="docComments" name="docComments"><?php echo $data[0]["Comments"]; ?></textarea>
			</div>
		</div>
		<button id="btnSave" type="submit" class="btn btn-default">Сохранить</button><a href="/contacts/add?Id=<?php echo $data[0]["ContactId"]; ?>" class="btn btn-default" style="margin-left: 10px">Отменить</a>
	</form>
</div>
<div id='ukrPass' style='display: none;'>
	<form action="/documents/save" method="post" data-toggle="validator" enctype="multipart/form-data">
		<input type="hidden" id="Id" name="Id" value="<?php echo $data[0]["Id"];?>">
		<input type="hidden" name="ContactId" value="<?php echo $data[0]["ContactId"]; ?>">
		

		<div class="row">
			<div class="form-group col-md-3 col-xs-12">
					<label for="docTypeUkr">Тип документа:</label>
					<select class="form-control input-sm" id="docTypeUkr" name="docType" onChange="selected(this)">
						<?php echo $dim_doctype; ?>
					</select>
		  	</div>
	  		<div class="form-group col-md-3 col-xs-12">
				<label for="docSerNum">Серия №</label>
				<input type="text" style="text-transform: uppercase" class="form-control input-sm" id="docSerNum" name="docSerNum" value="<?php echo $data[0]["SeriaNum"]; ?>">
			</div>
			<div class="form-group col-md-3 col-xs-12">
				<label for="docIssuedDate2">Дата выдачи:</label>
				<div class="input-group">
				  <input type="text" value = "<?php echo $data[0]["IssuedDate"]; ?>" class="form-control input-sm" id="docIssuedDate2" name="docIssuedDate">
				  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
				</div>
			</div>
	  		<div class="form-group col-md-3 col-xs-12">
				<label for="docIssuedBy">Кем выдан:</label>
				<input type="text" class="form-control input-sm" id="docIssuedBy" name="docIssuedBy" value="<?php echo $data[0]["IssuedBy"]; ?>">
			</div>
			<div class="form-group col-md-4 col-xs-12">
				<label for="doc_file">Файл документа:</label>
				<div class="input-group" id="doc_file">
		           <a id="fileUploadInput" <?php if ($data[0]["ScanExists"] == "0") echo "href='#'"; else echo "href='/uploads/getfile?ModelType=documents&ModelId=".$data[0]["Id"]."'";?> class="form-control fileUploadInput"><?php echo $data[0]["FileName"]; ?></a>
		           <span class="input-group-btn">
		                <label class="btn btn-default btn-file">
		                    <span class="glyphicon glyphicon-upload"></span> <input id="fileUploadName" name="fileUploadName" class="fileUploadName" type="file" hidden>
		                </label>
		                <!--button id="fileUploadBtn" class="btn btn-default" type="button" style='display:none'>
		                    <span class="glyphicon glyphicon-upload"></span> Загрузить
		                </button-->
		                <button id="fileDeleteBtn" class="btn btn-default" type="button" style='<?php if ($data[0]["FileName"] == "") echo "display:none";?>'>
		                    <span class="glyphicon glyphicon-remove"></span>
		                </button>
		           </span>
		        </div>
		        <div id="fileError" class="help-block with-errors" style="position: absolute;"></div>
	        </div>

		</div>
		
		<div class="form-group col-md-2 col-xs-12">
			<label for="LastAdd"><input type="checkbox" id="LastAdd" name="LastAdd" <?php echo $LastAdd ?>/> Основной</label>
		</div> 
		  
		<div class="row">
			<div class="form-group col-md-12 col-xs-12">
				<label for="docComments">Комментарий:</label>
				<textarea class="form-control input-sm" rows="5" id="docComments" name="docComments"><?php echo $data[0]["Comments"]; ?></textarea>
			</div>
		</div>
		<button id="btnSave" type="submit" class="btn btn-default">Сохранить</button><a href="/contacts/add?Id=<?php echo $data[0]["ContactId"]; ?>" class="btn btn-default" style="margin-left: 10px">Отменить</a>
	</form>
</div>
<div id='idCard' style='display: none;'>
<form action="/documents/save" method="post" data-toggle="validator" enctype="multipart/form-data">
	<input type="hidden" id="Id" name="Id" value="<?php echo $data[0]["Id"];?>">
	<input type="hidden" name="ContactId" value="<?php echo $data[0]["ContactId"]; ?>">
	
	<div class="row">
	<div class="form-group col-md-3">
		<label for="docTypeIdCard">Тип документа:</label>
		<select class="form-control input-sm" id="docTypeIdCard" name="docType" onChange="selected(this)">
			<?php echo $dim_doctype; ?>
		</select>
		</div>
		
  		<div class="form-group col-md-3 col-xs-12">
			<label for="docLastName">SurName:</label>
			<input type="text" style="text-transform: uppercase" class="form-control input-sm" id="docLastName" name="docLastName" value="<?php echo $data[0]["LastName"]; ?>">
		</div>
		<div class="form-group col-md-3 col-xs-12">
			<label for="docFirstName">Name:</label>
			<input type="text" style="text-transform: uppercase" class="form-control input-sm" id="docFirstName" name="docFirstName"  value="<?php echo $data[0]["FirstName"]; ?>">
		</div>
			
  		<div class="form-group col-md-3">
			<label for="docSerNum">Серия №</label>
			<input type="text" style="text-transform: uppercase" class="form-control input-sm" id="docSerNum" name="docSerNum" value="<?php echo $data[0]["SeriaNum"]; ?>">
		</div>
		<div class="form-group col-md-3">
			<label for="docRecordNo">Запись №</label>
			<input type="text" style="text-transform: uppercase" class="form-control input-sm" id="docRecordNo" name="docRecordNo" value="<?php echo $data[0]["RecordNo"]; ?>">
		</div>
		
		<div class="form-group col-md-3">
			<label for="IdCardIssuedDate">Дата выдачи:</label>
			<div class="input-group">
			  <input type="text" value = "<?php echo $data[0]["IssuedDate"]; ?>" class="form-control input-sm" id="IdCardIssuedDate" name="docIssuedDate">
			  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
			</div>
		</div>
  		<div class="form-group col-md-3">
			<label for="IdCardValid">Действителен до:</label>
			<div class="input-group">
			  <input type="text" value = "<?php echo $data[0]["Valid"]; ?>" class="form-control input-sm" id="IdCardValid" name="docValid">
			  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
			</div>
		</div>
	  	
  		<div class="form-group col-md-3">
			<label for="docIssuedBy">Кем выдан:</label>
			<input type="text" class="form-control input-sm" id="docIssuedBy" name="docIssuedBy" value="<?php echo $data[0]["IssuedBy"]; ?>">
		</div>
			
		<div class="form-group col-md-4">
			<label for="doc_file">Файл документа:</label>
			<div class="input-group" id="doc_file">
	           <a id="fileUploadInput" <?php if ($data[0]["ScanExists"] == "") echo "href='#'"; else echo "href='/uploads/getfile?ModelType=documents&ModelId=".$data[0]["Id"]."'";?> class="form-control fileUploadInput"><?php echo $data[0]["FileName"]; ?></a>
	           <span class="input-group-btn">
	                <label class="btn btn-default btn-file">
	                    <span class="glyphicon glyphicon-upload"></span> <input id="fileUploadName" name="fileUploadName" class="fileUploadName" type="file" hidden>
	                </label>
	                <!--button id="fileUploadBtn" class="btn btn-default" type="button" style='display:none'>
	                    <span class="glyphicon glyphicon-upload"></span> Загрузить
	                </button-->
	                <button id="fileDeleteBtn" class="btn btn-default" type="button" style='<?php if ($data[0]["FileName"] == "") echo "display:none";?>'>
	                    <span class="glyphicon glyphicon-remove"></span>
	                </button>
	           </span>
	        </div>
	        <div id="fileError" class="help-block with-errors" style="position: absolute;"></div>
        </div>

		</div>
		
		<div class="form-group col-md-2 col-xs-12">
			<label for="LastAdd"><input type="checkbox" id="LastAdd" name="LastAdd" <?php echo $LastAdd ?>/> Основной</label>
		</div>  
		  
		<div class="row">
			<div class="form-group col-md-12">
				<label for="docComments">Комментарий:</label>
				<textarea class="form-control input-sm" rows="5" id="docComments" name="docComments"><?php echo $data[0]["Comments"]; ?></textarea>
			</div>
		</div>
		<button id="btnSave" type="submit" class="btn btn-default">Сохранить</button><a href="/contacts/add?Id=<?php echo $data[0]["ContactId"]; ?>" class="btn btn-default" style="margin-left: 10px">Отменить</a>
	</form>
</div>
</div>
</div>
</div>
<script>
 
function selected(a) {
	var label = a.value;
	if (label=="intPass") {
		document.getElementById("intPass").style.display='block';
		document.getElementById("ukrPass").style.display='none';
		document.getElementById("idCard").style.display='none';
		document.getElementById('docTypeInt').value = "intPass";
		} else if (label=="ukrPass") {
		document.getElementById("intPass").style.display='none';
		document.getElementById("ukrPass").style.display='block';
		document.getElementById("idCard").style.display='none';	
		document.getElementById('docTypeUkr').value = "ukrPass";
	} else if (label=="idCard") {
		document.getElementById("intPass").style.display='none';
		document.getElementById("ukrPass").style.display='none';
		document.getElementById("idCard").style.display='block';
		document.getElementById('docTypeIdCard').value = "idCard";
	}
}
document.getElementById("docTypeInt").onchange();

</script>

</div>



