<?php

$isPersonal = "";
$userList="";
if ($data[0]["Id"] == "") {
	$isPersonal = "checked";
	require('application/models/model_users.php');
	$userModel = new Model_Users();
	foreach($userModel->get_list() as &$user) {
		if ($user["Id"] == $_SESSION["UserId"])
			$userList .= "<option value=\"".$user["Id"]."\" selected=\"selected\">".$user["ManagerName"]."</option>";
		else
			$userList .= "<option value=\"".$user["Id"]."\" >".$user["ManagerName"]."</option>";
	}
} else {
	if ($data[0]["UserId"] != ""){
		$CheckedUserAr = explode(',', $data[0]["UserId"]);
		//print_r($CheckedUserAr);
		require('application/models/model_users.php');
		$userModel = new Model_Users();
		foreach($userModel->get_list() as &$user) {
			//print_r($user);
			$ischecked = "";
			foreach ($CheckedUserAr as &$selectedUser) {
				if ($selectedUser == $user["Id"]) {
					$ischecked = "selected=\"selected\"";
					break;
				}
			}
			$userList .= "<option value=\"".$user["Id"]."\"".$ischecked.">".$user["ManagerName"]."</option>";
		}
		unset($CheckedUserAr);
	}
}

$conn = new mysqli(
			$GLOBALS['DB_HOST'],
			$GLOBALS['DB_USER'],
			$GLOBALS['DB_PASSWORD'],
			$GLOBALS['DB_NAME']);
$conn->	set_charset("utf8");//исправляем иероглифы

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$modelLinkDesc="";
$AccId = $_SESSION['AccId'];



try {
	$sql = "select Name from `Dictionaries` where Active = 'Y' and AccId = $AccId and type='TemplateModule' and LIC='".$data[0]["ModelType"]."'";
	$result = $conn->query($sql);
	if( $row = $result->fetch_assoc()){
	//	echo $data[0]["ModelType"] ;
		if($data[0]["ModelType"] =="Contact"){
			require('application/models/model_contacts.php');
			$Model = new Model_Contacts();
			
			$dataContact = $Model->get_row($data[0]["ModelId"]);
			$Id = $dataContact[0]["Id"];
			$LastName = $dataContact[0]["LastName"];
			$FirstName = $dataContact[0]["FirstName"];
			$link = "<a href=\"/contacts/add?Id=$Id\" >$LastName $FirstName</a>";
			
		} else if ($data[0]["ModelType"] =="Lead"){
			require('application/models/model_leads.php');
			$Model = new Model_Leads();
			
			$dataLead = $Model->get_row($data[0]["ModelId"]);
			$Id = $dataLead[0]["Id"];
			$LastName = $dataLead[0]["LastName"];
			$FirstName = $dataLead[0]["FirstName"];
			$link = "<a href=\"/leads/add?Id=$Id\" >$LastName $FirstName</a>";
			
		} else if ($data[0]["ModelType"] =="Legal"){
			require('application/models/model_legal.php');
			$Model = new Model_Legal();
			
			$dataLegal = $Model->get_row($data[0]["ModelId"]);
			$Id = $dataLegal[0]["Id"];
			$LegalName = $dataLegal[0]["LegalName"];
			$link = "<a href=\"/legal/add?Id=$Id\" >$LegalName</a>";
			
		} else if ($data[0]["ModelType"] =="Deal"){
			require('application/models/model_deals.php');
			$Model = new Model_Deals();
			
			$dataDeal = $Model->get_row($data[0]["ModelId"]);
			$Id = $dataDeal[0]["Id"];
			$DealNo = $dataDeal[0]["DealNo"];
			$link = "<a href=\"/deals/add?Id=$Id\" >$DealNo</a>";
			
		}
		
		
		$modelLinkDesc = "<span class='task_model_link'>Связано с '".$row["Name"]."': ".$link."</span>";
		
		
	}
} catch (Exception $e) {
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}
$conn->close();



if($data[0]["SendEmail"]=="1"){$SendEmail = "checked";}

//Заголовок формы редактирования.
if($data[0]["Id"] ==""){
	$x_title = "Форма редактирования новой задачи";
} else {
	$x_title = "Форма редактирования задачи";
}
		


?>

<div class="container-fluid">
	
<div class="x_panel">
<div class="x_title"><h2><?php echo $x_title;?></h2>
<div class="clearfix"></div>
<div class="x_content"><br>

	<form action="/tasks/save" method="post" data-toggle="validator">
		<input type="hidden" id="Id" name="Id" value="<?php echo $data[0]["Id"];?>">
		<input type="hidden" id="ModelType" name="ModelType" value="<?php echo $data[0]["ModelType"];?>">
		<input type="hidden" id="ModelId" name="ModelId" value="<?php echo $data[0]["ModelId"];?>">
		
		<div class="row">
			<div class="form-group col-md-5 col-xs-12">
			      <label for="Title">Краткое описание:</label>
			      <input type="text" class="form-control input-sm" id="Title" name="Title"  data-error="Обязательное к заполнению." required value="<?php echo $data[0]["Title"]; ?>">
				  <div class="help-block with-errors"></div>
			</div>
			<div class="form-group col-sm-2 col-md-2 col-xs-12">
				<label for="Done">Выполнено:</label>
				<input type="checkbox" id="Done" name="Done"
			        	data-size="small" data-on-text="Да" data-off-text="Нет" <?php if ($data[0]["Done"] == "1") echo "checked"; ?>>
			</div>
		</div>
		
		<div class="row">
			<div class="form-group col-md-6 col-xs-12">
				<label for="Task">Описание задачи: <?php echo $modelLinkDesc;?></label>
				<textarea class="form-control input-sm" rows="10" id="Task" name="Task"><?php echo $data[0]["Task"]; ?></textarea>
		  	</div>
		</div>
		
		<!--div class="row">
			<div class="form-group col-md-3 col-xs-12">
				<label for="Start">Начало:</label>
				<input type="text" class="form-control input-sm" id="Start" name="Start"  data-error="Обязательное к заполнению." required value="<?php echo $data[0]["Start"]; ?>">
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group col-md-3 col-xs-12">
				<label for="End">Завершение:</label>
				<input type="text" class="form-control input-sm" id="End" name="End"  data-error="Обязательное к заполнению." required value="<?php echo $data[0]["End"]; ?>">
			</div>
		</div-->
		<div class="row">
			<div class="form-group col-md-2 col-xs-12">
			    <label for="Start">Начало:</label>
			    <input type="text" class="form-control input-sm" id="Start" name="Start" value="<?php if($data[0]["Start"] !=="00.00.0000 00:00:00") { echo toFormat("d.m.Y H:i:s","d.m.Y H:i",$data[0]["Start"]);} ?>"  data-error="Начало, обязательное к заполнению." required > 
			    <div class="help-block with-errors"></div>
			</div>
			<div class="form-group col-md-2 col-xs-12">
			    <label for="End">Завершение:</label>
			    <input type="text" class="form-control input-sm" id="End" name="End" value="<?php if($data[0]["End"] !=="00.00.0000 00:00:00") { echo toFormat("d.m.Y H:i:s","d.m.Y H:i",$data[0]["End"]);} ?>"  data-error="Завершение, обязательное к заполнению." required > 
			    <div class="help-block with-errors"></div>
			</div>
		</div>
		
		
		<input type="checkbox" id="SendEmail" name="SendEmail" <?php echo $SendEmail ?>> Отправить Email,Telegram
		<div class="row">
			<div id="UserSelector" class="col-sm-6 col-xs-12"  style="display:none;">
		
				<label for="UserSelect">Список сотрудников:</label> 
				<select id="UserSelect" name="UserSelect[]" class="form-control input-sm" multiple="" name="tags[]">
				  <?php echo $userList;?>
				</select>
		
			</div>
		</div><br>
		<button type="submit" class="btn btn-success">Сохранить</button>
		<a href="/tasks" class="btn btn-default" style="margin-left: 10px">Отменить</a>
		<button id="delTask" class="btn btn-danger" style="margin-left: 10px">Удалить</button>
		<!--a href="#" id="delTask" class="btn btn-danger" style="margin-left: 10px">Удалить</a-->
		
	</form>
</div>
</div>
</div>
</div>