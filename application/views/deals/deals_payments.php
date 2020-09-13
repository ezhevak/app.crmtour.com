<?php
	//echo json_encode($data);
	$DealRestSum = 0;
	$DealSumRestEquivalent = 0;
	
	$DealOperatorRestSum = 0;
	$DealOperatorSumRestEquivalent = 0;
	//Если сумма сделки в грн > суммы платежей в грн расчитываем разницу 
	if($data[0]["DealSum"] > $data[0]["PaySumGroup"]) {
		$DealRestSum = $data[0]["DealSumFact"] - $data[0]["PaySumGroup"];
		$DealSumRestEquivalent = $data[0]["DealSumEquivalent"]  - $data[0]["PayEquivalentGroup"];
	}
	if($data[0]["OperatorInvoceSum"] > $data[0]["PaySumOperatorGroup"]) {
		$DealOperatorRestSum = $data[0]["OperatorInvoceSum"] - $data[0]["PaySumOperatorGroup"];
		$DealOperatorSumRestEquivalent = $data[0]["DealSumEquivalent"]  - $data[0]["PayEquivalentOperatorGroup"];
	}
?>


<!--Start блок отвечает за печать документо по платежам-->

	<div id="mwPrintPaymentTemplate" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Выбор шаблона печати</h4>
	      </div>
	      <div class="modal-body">
	      	<input id="printPaymentId" type="hidden">
	        <table id="grid_printPaymentTemplates"></table>
	      </div>
	      <div class="modal-footer">
	      	<a id="printPaymentLink" href='/deals/print?Id=' class='btn btn-primary'><span class='glyphicon glyphicon-print' aria-hidden='true'> Печать</span></a>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
	      </div>
	    </div>
	  </div>
	</div>
<!--End блок отвечает за печать документо по платежам-->

<div class="container-fluid">
	
<div class="x_panel">
<div class="x_title"><h2>Платежи по сделке № <a href='/deals/add?Id=<? echo $data[0]["Id"] ?>' target="_blank"><? echo $data[0]["DealNo"] ?></a> клиента <a href='/contacts/add?Id=<? echo $data[0]["ContactId"] ?>' target="_blank"><? echo $data[0]["ContactFullName"] ?></a></h2>
<div class="clearfix"></div>
<div class="x_content"><br>

<input type="hidden" id="DealId" name="Id" value="<?php echo $data[0]["Id"];?>">

	<div class="row">
		<table class="table">
		  <thead>
			<tr>
			  <th>#</th>
			  <th>Сумма в грн</th>
			  <th>Сумма в валюте</th>
			  <th>Валюта</th>
			  <th>Курс</th>
			</tr>
		  </thead>
		  <tbody>
			<tr>
				<? echo $data[0]?>
			</tr>
			<tr>
			  <th scope="row">Сумма сделки окончательная</th>
			  <td><? echo $data[0]["DealSumFact"] ?></td>
			  <td><? echo round($data[0]["DealSumFact"]/$data[0]["CommercialCourse"],2) ?></td> <!--$data[0]["DealSumEquivalent"]-->
			  <td><? echo $data[0]["DealCurrencyName"] ?></td>
			  <td><? echo $data[0]["CommercialCourse"] ?></td>
			</tr>
			<tr>
			  <th scope="row">Сумма платежей</th>
			  <td><? echo $data[0]["PaySumGroup"] ?></td>
			  <td><? echo $data[0]["PayEquivalentGroup"] ?></td>
			  <td> # </td>
			  <td> # </td>
			</tr>
			<tr>
			  <th scope="row">Остаток к оплате клиента</th>
			  <td> <? echo $DealRestSum ?> </td>
			  <td> <? echo $DealSumRestEquivalent ?> </td>
			  <td> <? echo $data[0]["DealCurrencyName"] ?> </td>
			  <td> # </td>
			</tr>
			<tr>
			  <th scope="row">Сумма к оплате ТО</th>
			  <td> <? echo $data[0]["OperatorInvoceSum"] ?> </td>
			  <td> <? echo round($data[0]["OperatorInvoceSum"]/$data[0]["CommercialCourse"],2) ?> </td>
			  <td> <? echo $data[0]["DealCurrencyName"] ?> </td>
			  <td> <? echo $data[0]["CommercialCourse"] ?> </td>
			</tr>
			  <th scope="row">Оплачено ТО</th>
			  <td> <? echo $data[0]["PaySumOperatorGroup"] ?> </td>
			  <td> <? echo round($data[0]["PaySumOperatorGroup"]/$data[0]["CommercialCourse"],2) ?> </td>
			  <td> <? echo $data[0]["DealCurrencyName"] ?> </td>
			  <td> <? echo $data[0]["CommercialCourse"] ?> </td>
			</tr>
			<tr>
			  <th scope="row">Остаток к оплате ТО</th>
			  <td> <? echo $DealOperatorRestSum ?> </td>
			  <td> <? echo round($DealOperatorRestSum/$data[0]["CommercialCourse"],2) ?> </td>
			  <td> <? echo $data[0]["DealCurrencyName"] ?> </td>
			  <td> <? echo $data[0]["CommercialCourse"] ?> </td>
			</tr>
		  </tbody>
		</table>


		<div class="col-md-3">
	  
	
		</div>
	</div>
	<p>
	  
	  
	  
	</p>
	
	<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	  <thead>
	    <tr>
	      	<th>Id</th>
	        <th>Дата</th>
	        <th>Тип</th>
	        <th>Сумма грн</th>
	        <th>Курс</th>
	        <th>Сумма в валюте</th>
	        <th>ФИО плательщика</th>
	        <th>Комментарий</th>
	        <th>Действия</th>
	    </tr>
	  </thead>
	</table>


</div>
</div>
</div>
</div>