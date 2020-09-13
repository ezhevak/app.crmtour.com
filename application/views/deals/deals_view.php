
<div id="mwPrintTemplate" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Выбор шаблона печати</h4>
      </div>
      <div class="modal-body">
      	<input id="printDealId" type="hidden">
        <table id="grid_printtemplates"></table>
      </div>
      <div class="modal-footer">
      	<a id="printLink" href='/deals/print?Id=' class='btn btn-primary'><span class='glyphicon glyphicon-print' aria-hidden='true'> Печать</span></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div>

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

<div id="view_div" class="container-fluid">
	<div class="x_panel">
	<div class="x_title"><h2 id="x_title_name">Активные сделки - дата возврата ещё не наступила</h2>
		<ul class="nav navbar-right panel_toolbox" style="min-width: unset;">
		  <li class="dropdown">
		    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Фильры <i class="fa fa-wrench"></i></a>
		    <ul class="dropdown-menu" role="menu">
		      <li><a href="#" data-gridurl="/deals/getlist" class="grid_open_url">Активные сделки</a></li>
		      <li><a href="#" data-gridurl="/deals/getlist3month" class="grid_open_url">Последние 3 месяца</a></li>
		      <li><a href="#" data-gridurl="/deals/getlist6month" class="grid_open_url">Последние 6 месяцев</a></li>
		      <li><a href="#" data-gridurl="/deals/getlist12month" class="grid_open_url">Последние 12 месяцев</a></li>
		      <li><a href="#" data-gridurl="/deals/getlistalldeals" class="grid_open_url">Все сделки</a></li>
		    </ul>
		  </li>
		</ul>
		<div class="clearfix"></div>
		<div class="x_content"><br>	
			<table id="deals-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
			    <tr>
			      	<th>Id</th>
			        <th>№ договора</th>
			        <th>Физ. лицо</th>
			        <th>Юр. лицо</th>
			        <th>Дата</th>
			        <th>№ заявки</th>
			        <th>Оператор</th>
			        <th>Страна</th>
			        <th>Оплачен</th>
			        <th>Сумма</th>
			        <th>Оплаты</th>
			        <th>Вылет</th>
			        <th>Регион</th>
			        <th>Отель</th>
			        <th>Менеджер</th>
			        <th>- - - - Действия - - - -</th>
			    </tr>
			  </thead>
			</table>
		</div>
	</div>
	</div>
	
</div>


