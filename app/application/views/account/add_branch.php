<div class="x_panel">
		<div class="x_title"><h2>Добавление/редактирование офиса</h2>
		<div class="clearfix"></div>
		<div class="x_content"><br>
			<form id="form-branch" class="form-horizontal form-label-left" action="#" method="post" data-toggle="validator">
			  <input type="hidden" id="BranchId" name="BranchId" value="<?php echo $data[0]["Id"];?>">
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Название офиса</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchName" name="BranchName" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["BranchName"]; ?>" placeholder="ООО 'Супер тур'" data-error="Название отделения обязательное к заполнению" required>
	            </div>
	            <div class="help-block with-errors"></div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">ФИО директора</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchDirectorName" name="BranchDirectorName" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["BranchDirectorName"]; ?>" placeholder="Иванов Иван Иванович">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Адрес юридический</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchJurAddress" name="BranchJurAddress" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["BranchJurAddress"]; ?>" placeholder="ул. Крещатик 15">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Адрес фактический</label>
				 <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchFactAddress" name="BranchFactAddress" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["BranchFactAddress"]; ?>" placeholder="ул. Крещатик 15">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Телефон</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchPhone" name="BranchPhone" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["BranchPhone"]; ?>" placeholder="+38(067)555-4422">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Факс</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchFax" name="BranchFax" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo  $data[0]["BranchFax"]; ?>" placeholder="+38(067)555-4422">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Мобильный</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchMobile" name="BranchMobile" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo  $data[0]["BranchMobile"]; ?>">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchEmail" name="BranchEmail" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["BranchEmail"]; ?>" placeholder="example@gmail.com">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Название банка</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchBankName" name="BranchBankName" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["BranchBankName"]; ?>"placeholder="Приват Банк">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Счёт в банке</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchBankAccount" name="BranchBankAccount" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["BranchBankAccount"]; ?>" placeholder="260011123548">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Международный счёт Iban</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchBankIban" name="BranchBankIban" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["BranchBankIban"]; ?>" placeholder="UA85 3996 2200 0000 0260 0123 3566 1">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">МФО банка</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchBankMFO" name="BranchBankMFO" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["BranchBankMFO"]; ?>"placeholder="305299">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">ЕДРПОУ</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchBankCode" name="BranchBankCode" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["BranchBankCode"]; ?>" placeholder="3215715461">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Серия № лицензии</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchLicenseNum" name="BranchLicenseNum" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $data[0]["BranchLicenseNum"]; ?>"placeholder="305299">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Дата выдачи лицензии</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="BranchLicenseDate" name="BranchLicenseDate" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo toFormat("Y-m-d","d.m.Y",$data[0]["BranchLicenseDate"]); ?>"placeholder="31.12.2018">
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Закрыт</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input class="make-switch" type="checkbox" id="Inactive" name="Inactive" data-size="small" data-on-text="Да" data-off-text="Нет" <?php if ($data[0]["Inactive"] == "1") echo "checked"; ?>>
	            </div>
	          </div>
	          
	          <div class="ln_solid"></div>
	          <div class="form-group">
	            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	              <button id="sendButton" type="submit" form="form-branch" class="btn btn-success">Сохранить</button>
	              <a id="cancelButton" href="/account" class="btn btn-default" style="margin-left: 10px">Отменить</a>
	            </div>
	          </div>
	
	        </form>	
		</div>
		</div>
</div>