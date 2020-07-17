	<div class="x_panel">
	<div class="x_title"><h2>Заметка менеджера</h2>
	<div class="clearfix"></div>
	<div class="x_content"><br>
	
	<form id="form-notes" action="/notes/save" method="post" data-toggle="validator">
		<input type="hidden" name="Id" value="<?php echo $data[0]["Id"];?>">
		<div class="row">
			<div class="form-group col-md-12 col-xs-12">
			      <label for="Name">Краткое описание заметки:</label>
			      <input type="text" class="form-control input-md" id="Name" name="Name" value="<?php echo $data[0]["Name"];?>">
				  <div class="help-block with-errors"></div>
			</div>
		</div>
		
		<div class="row">
			<div class="form-group col-md-12 col-xs-12">
				<label for="Description">Подробное описание заметки:</label>
				<textarea name="Description" id="Description"><?php echo $data[0]["Description"]; ?></textarea>
			</div>
		</div>
		
		<div class="ln_solid"></div>
		<div class="form-group">
		<!--div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"-->
		<div class="col-md-6 col-sm-6 col-xs-12">
		  <button id="sendButton" type="submit" form="form-notes" class="btn btn-success">Сохранить</button>
		  <a id="cancelButton" href="/notes" class="btn btn-default" style="margin-left: 10px">Отменить</a>
		</div>
		</div>
	</form>
	</div>
	</div>
	</div>