<?php
session_start();
?>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#calendarTab">Календарь</a></li>
  <li ><a data-toggle="tab" href="#list">Список задач</a></li>
</ul>

<div class="tab-content">
	<div id="calendarTab" class="tab-pane fade in active">
		<div class="x_panel">
		<div class="x_title">
		<h2 id="x_title_name_calendar">Все задачи</h2>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-2 col-sm-12 col-xs-12 form-group">
					<form action="/tasks/add" method="POST">
						<button type="submit" class="btn btn-primary btn-sm">
							<span class="glyphicon glyphicon-plus"></span> Добавить
						</button>
					</form>
					<br>
					<div class="fc-event eventInfo eventInfoDone">Выполнено</div>
					<div class="fc-event eventInfo">Активно</div>
					<div class="fc-event eventInfo eventInfoOld">Просрочено</div>
				</div>
				
				<div class="col-md-10 col-sm-12 col-xs-12 form-group">
					<div id='calendar'></div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<div id="list" class="tab-pane fade in">
		<div class="x_panel">
			<div class="x_title">
			<h2 id="x_title_name_list">Не выполненные задачи</h2>
			<ul class="nav navbar-right panel_toolbox" style="min-width: unset;">
			  <li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Фильтры <i class="fa fa-wrench"></i></a>
			    <ul class="dropdown-menu" role="menu">
			      <li><a href="#" class="tasks_status_url" data-statusurl="/tasks/getlist">Все задачи</a></li>
			      <li><a href="#" class="tasks_status_url" data-statusurl="/tasks/getlist?status=1">Выполненные задачи</a></li>
			      <li><a href="#" class="tasks_status_url" data-statusurl="/tasks/getlist?status=0">Не выполненные задачи</a></li>
			    </ul>
			  </li>
			</ul>
			<div class="clearfix"></div>
			</div>
			<div class="x_content">
			<p class="text-muted font-13 m-b-30">Список всех задач</p>
				<table id="datatable-responsive-tasks" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				  <thead>
				    <tr>
				      	<th>Id</th>
				        <th>Краткое описание</th>
				        <th>Начало</th>
				        <th>Завершение</th>
				        <th>Выполнена</th>
				        <th>Менеджер</th>
				        <th>Действия</th>
				    </tr>
				  </thead>
				</table>
			</div>
		</div>
	</div>
</div>