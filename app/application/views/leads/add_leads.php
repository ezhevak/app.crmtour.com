<?php

	if($data[0]["Id"] ==""){
		$taskLink = "";
	} else {
		$taskLink = "<a id='createTask' target='_blank' href='/tasks/add?model=Lead&modelid=".$data[0]["Id"]."'>Добавить</a>";
	}
	
	//Заголовок формы редактирования запросов.
	if($data[0]["Id"] ==""){
		$x_title = "Форма редактирования нового запроса";
	} else {
		$x_title = "Форма редактирования запроса ".$data[0]["FirstName"]. " ".$data[0]["LastName"];
	}

?>

<div class="container-fluid">
	
	<!--Форма добавления нового клиента-->
	<div id="mwAddContact" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Добавление нового клиента</h4>
			  </div>
			  <div class="modal-body">
			  	<form id="form-contact" action="#" method="post" data-toggle="validator" enctype="multipart/form-data">
					<input type="hidden" id="callerId" name="callerId" value="">
					<input type="hidden" id="FormType" name="FormType" value="Participant">
					<!--input type="hidden" id="passDocType" name="passDocType" value="intPass"-->
					
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contLastName">Фамилия:</label>
						<input type="text" class="form-control" id="contLastName" name="contLastName">
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contFirstName">Имя:</label>
						<input type="text" class="form-control" id="contFirstName" name="contFirstName" placeholder="Иван" data-error="Имя, обязательно к заполнению" required>
						<div class="help-block with-errors"></div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contMiddleName">Отчество:</label>
						<input type="text" class="form-control" id="contMiddleName" name="contMiddleName">
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contDateBirth">Дата рождения:</label>
						<div class="input-group">
						  <input type="text" class="form-control input-md" id="contDateBirth" name="contDateBirth">
						  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
						</div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contTaxCode">ИНН:</label>
						<input type="text" class="form-control" id="contTaxCode" name="contTaxCode" value="">
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contUserId">Менеджер:</label>
						<select class="form-control" id="contUserId" name="contUserId" data-error="Менеджер, обязательно к заполнению" required>
						</select>
						<div class="help-block with-errors"></div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="passSurName">Пасп. SurName:</label>
						<input type="text" class="form-control" id="passSurName" name="passSurName" style="text-transform:uppercase">
					</div>
				  	<div class="form-group col-md-12 col-xs-12">
						<label for="passGivenNames">Пасп. Given Names:</label>
						<input type="text" class="form-control" id="passGivenNames" name="passGivenNames" style="text-transform:uppercase">
					</div>
				  	<div class="form-group col-md-12 col-xs-12">
						<label for="passSerNum">Пасп. серия №:</label>
						<input type="text" class="form-control" id="passSerNum" name="passSerNum">
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="passIssuedDate">Дата выдачи:</label>
							<div class="input-group date">
							  <input type="text" class="form-control input-md" id="passIssuedDate" name="passIssuedDate" >
							  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
						</div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="passValidDate">Пасп. действ. до:</label>
							<div class="input-group date">
							  <input type="text" class="form-control input-md" id="passValidDate" name="passValidDate" >
							  <span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i> </span>
						</div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="passIssued">Орган выдачи:</label>
						<div class="input-group">
							<span class="input-group-addon">Био <input type="checkbox" id="passBiometric" name="passBiometric"></span>
							<input type="text" style="text-transform: uppercase" class="form-control input-md" id="passIssued" name="passIssued">
						</div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="fileUploadName">Скан загран:</label>
						<div class="input-group">
							<input type="file" id="fileUploadName" name="fileUploadName" class="fileUploadName" >
						</div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="PhoneMob">Телефон моб:</label>
						<input type="text" class="form-control" id="PhoneMob" name="PhoneMob">
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="EmailHome">Email домашний:</label>
						<input type="text" class="form-control" id="EmailHome" name="EmailHome">
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="Sex">Пол:</label>
						<select class="form-control" id="Sex" name="Sex" data-error="Пол, обязательно к заполнению" required>
						</select>
						<div class="help-block with-errors"></div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contSegment">Сегмент:</label>
						<select class="form-control" id="contSegment" name="contSegment">
						</select>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
			    		<div class="form-group">
							<label for="contSource">Источник:</label>
							<div class="input-group">
				    			<span class="input-group-addon"><a href="#" class="addDictionary" data-type="LeadSource" data-id="#contSource"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
								<select class="form-control" id="contSource" name="contSource" data-error="Источник, обязательно к заполнению"  required>
								</select>
							</div>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label for="contAddress">Адрес:</label>
						<input type="text" class="form-control" id="contAddress" name="contAddress" value="<?php echo $data[0]["Address"]; ?>">
					</div>
		
					<div class="form-group col-md-12 col-xs-12">
						<label for="contComments">Коментарий:</label>
						<textarea class="form-control" rows="3" id="contComments" name="contComments"></textarea>
				  	</div>
				</form>
			  </div>
			  <div class="modal-footer">
			  	<button Id="btnSaveContact" type="submit" form="form-contact" class="btn btn-success">Сохранить</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
			  </div>
			</div>
		</div>
	</div>
	<!--Форма добавления нового клиента-->
	
	<!--Форма добавления нового справочника-->
	<div id="mwAddDictionary" class="modal fade" role="dialog">
		<div class="modal-dialog  modal-sm">
			<div class="modal-content">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Добавление нового значения</h4>
			  </div>
			  <div class="modal-body">
			  	<form id="form-dictionary" action="#" method="post" data-toggle="validator">
			  		<input type="hidden" id="dicType" name="dicType">
					<input type="hidden" id="_id" name="_id">
					<input type="hidden" id="_formId" name="_formId">
					<div class="form-group col-md-12 col-xs-12">
						<label for="dicName">Укажите новое значение:</label>
						<input type="text" class="form-control input-md" id="dicName" name="dicName" data-error="Значение, обязательное к заполнению" required>
						<div class="help-block with-errors"></div>
					</div>
				</form>
			  </div>
			  <div class="modal-footer">
			  	<button Id="btnSaveDic" type="submit" form="form-dictionary" class="btn btn-success">Сохранить</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
			  </div>
			</div>
		</div>
	</div>
	<!--Форма добавления нового справочника-->
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		<div class="x_title"><h2><?php echo $x_title;?></h2>
		<ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	    </ul>
		<div class="clearfix"></div>
		<div class="x_content"><br>
			<form id="form-lead" action="#" method="post" data-toggle="validator">
				<input type="hidden" id="Id" name="Id" value="<?php echo $data[0]["Id"];?>">
				<input type="hidden" id="DealId" name="DealId" value="<?php echo $data[0]["DealId"];?>">
				<input type="hidden" id="ContactPickLastName" value="<?php echo $data[0]["ConLastName"];?>">
				<input type="hidden" id="ContactPickFirstName" value="<?php echo $data[0]["ConFirstName"];?>">
				<!--input type="hidden" id="PartnerPickLastName" value="<?php echo $data[0]["partnerLastName"];?>"-->
				<!--input type="hidden" id="PartnerPickFirstName" value="<?php echo $data[0]["partnerFirstName"];?>"-->
				<div class="col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label class="control-label">Дата запроса:</label>
						<div class="input-group">
					    	<input id="LeadDate" name="LeadDate" class="form-control" type="text" value="<?php echo toFormat("Y-m-d","d.m.Y",$data[0]["LeadDate"]); ?>" placeholder="31.12.2018">
					    	<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar"></i></span>
					    </div>
				    </div>
			    </div>
			    <div class="col-md-3 col-sm-3 col-xs-12">
			    	<div class="form-group">
						<label class="control-label">Статус:</label>
						<select class="form-control" id="LeadStatus" name="LeadStatus" required>
							<option selected value='<?php echo $data[0]["LeadStatus"]; ?>'><?php echo $data[0]["LeadStatusName"]; ?></option>
						</select>
					</div>
			    </div>
			    
			    <div class="col-md-3 col-sm-3 col-xs-12">
			    	<div class="form-group">
			    		<label class="control-label">Источник:</label>
						<div class="input-group">
							<span class="input-group-addon"><a href="#" class="addDictionary" data-type="LeadSource" data-id="#LeadSource"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
							<select class="form-control" id="LeadSource" name="LeadSource">
								<option selected value='<?php echo $data[0]["LeadSource"]; ?>'><?php echo $data[0]["LeadSourceName"]; ?></option>
							</select>
						</div>
					</div>
			    </div>
			    
			    <div class="col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label class="control-label">Тип:</label>
						<div class="input-group">
							<span class="input-group-addon"><a href="#" class="addDictionary" data-type="LeadType" data-id="#LeadType"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
							<select class="form-control" id="LeadType" name="LeadType">
								<option selected value='<?php echo $data[0]["LeadType"]; ?>'><?php echo $data[0]["LeadTypeName"]; ?></option>
							</select>
						</div>
						
						
					</div>
			    </div>
			    
			    <div class="col-md-3 col-sm-3 col-xs-12">
			    	<div class="form-group">
						<label class="control-label">Приоритет:</label>
						<select class="form-control" id="LeadPriority" name="LeadPriority" required>
							<option selected value='<?php echo $data[0]["LeadPriority"]; ?>'><?php echo $data[0]["LeadPriorityName"]; ?></option>
						</select>
						
					</div>
			    </div>
			    
			    <div class="col-md-3 col-sm-3 col-xs-12">
				    <div class="form-group">
						<label class="control-label">Менеджер:</label>
						<select class="form-control" id="UserId" name="UserId" required>
							<option selected value='<?php echo $data[0]["UserId"]; ?>'><?php echo $data[0]["ManagerName"]; ?></option>
						</select>
					</div>	
			    </div>
			    
			    <div class="col-md-3 col-sm-3 col-xs-12">
				    <div class="form-group">
						<label class="control-label">Телефон:</label>
	                    <input type="tel" id="Phone" name="Phone" class="form-control"  value="<?php echo $data[0]["Phone"]; ?>" placeholder="+38(067)555-4422" required>
					</div>
			    </div>
			    
			    <div class="col-md-3 col-sm-3 col-xs-12">
				    <div class="form-group">
						<label class="control-label">Email:</label>
	                    <input id="Email" name="Email" class="form-control" type="email" value="<?php echo $data[0]["Email"]; ?>" placeholder="example@gmail.com">
					</div>
			    </div>
			    
			    <div class="col-md-3 col-sm-3 col-xs-12">
			    	 <div class="form-group">
			    	 	<label class="control-label">Фамилия:</label>
						<input id="LastName" name="LastName" class="form-control" type="text" value="<?php echo $data[0]["LastName"]; ?>" placeholder="Иванов">
			    	 </div>
			    </div>
			    
			    <div class="col-md-3 col-sm-3 col-xs-12">
		    		<div class="form-group">
			    		<label class="control-label">Имя: </label>
						<input id="FirstName" name="FirstName" class="form-control" type="text" value="<?php echo $data[0]["FirstName"]; ?>" placeholder="Иван" required>
						
					</div>
			    </div>
			    
			    <div class="col-md-3 col-sm-3 col-xs-12">
		    		<div class="form-group">
						<label class="control-label">Отчество:</label>
					    <input id="MiddleName" name="MiddleName" class="form-control" type="text" value="<?php echo $data[0]["MiddleName"]; ?>" placeholder="Иванович">
					</div>
			    </div>
			    
			    <div class="col-md-3 col-sm-3 col-xs-12">
			    	<div class="form-group">
						<label class="control-label">Пол:</label>
						<select class="form-control" id="LeadSex" name="Sex" required>
							<option selected value='<?php echo $data[0]["Sex"]; ?>' required><?php echo $data[0]["SexName"]; ?></option>
						</select>
					</div>
			    </div>
			    
			    <div class="col-md-6 col-sm-6 col-xs-12">
			    	<div class="form-group">
						<label for="ContactId">ФИО клиента:</label>
						<div class="input-group">
							<span class="input-group-addon"><a href="#" class="addContact" data-type="contact"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
							<select class="form-control" id="ContactId" name="ContactId">
								<option selected value="<?php echo $data[0]["ContactId"]; ?>"><?php echo $data[0]["ConLastName"]." " . $data[0]["ConFirstName"]." " . $data[0]["ConMiddleName"];?></option>
							</select>
							<span class="input-group-addon"><a href="#" class="clear" data-id="#ContactId"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></span>
						</div>
					</div>
			    </div>
			    
			    <div class="col-md-6 col-sm-6 col-xs-12">
			    	<div class="form-group">
						<label for="PartnerId">От кого пришел:</label>
						<div class="input-group">
							<span class="input-group-addon"><a href="#" class="addContact" data-type="partner"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span>
							<select class="form-control" id="PartnerId" name="PartnerId">
								<option selected value="<?php echo $data[0]["PartnerId"]; ?>"><?php echo $data[0]["partnerLastName"]." " . $data[0]["partnerFirstName"]." " . $data[0]["partnerMiddleName"];?></option>
							</select>
							<span class="input-group-addon"><a href="#" class="clear"  data-id="#PartnerId"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></span>
						</div>
					</div>
			    </div>

				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="control-label">Текс запроса:</label>
				        <textarea rows="5" id="LeadText" name="LeadText"><?php echo $data[0]["LeadText"]; ?></textarea>
					</div>
				</div>
				

				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="control-label">Ответ менеджера:</label>
	                    <textarea rows="5" id="ManagerText" name="ManagerText"><?php echo $data[0]["ManagerText"]; ?></textarea>
					</div>
				</div>
			    
		        
		        <div class="form-group">
			        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				        <button Id="btnSaveLead" type="submit" form="form-lead" class="btn btn-success">Сохранить</button>
				    	<a id="cancelButton" href="/leads" class="btn btn-default" style="margin-left: 10px">Отменить</a>
			        </div>
		        </div>
				
			
			</form>
			
		</div>
		</div>
		</div>
		
		
	</div>
	
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
		<div class="x_title"><h2>Связанные задачи <?php echo $taskLink;?></h2> 
		<ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	    </ul>
		<div class="clearfix"></div>
			
			
		<div id="x_content_linked_tasks" class="x_content"><br>
			
		</div>
		</div>
		</div>
	</div>

	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
		<div class="x_title"><h2>Дополнительная информация</h2>
		<ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	    </ul>
		<div class="clearfix"></div>
		<div id="x_content_additional_info" class="x_content"><br>
		
			
			
		</div>
		</div>
		</div>
	</div>

	
</div>