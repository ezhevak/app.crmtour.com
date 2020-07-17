<?php
    require_once ($GLOBALS['RootDir'].'application/mysql/db.php');
	$mysqli = database::getInstance();
    $db = $mysqli->getConnection();
	
	$db->where("AccId",$_SESSION["AccId"]);
	$cols = array("Id", "BranchName");
	$respBranches = $db->get("AccountBranches", null, $cols);
	
	$db->disconnect();
	for($i = 0; $i < count($respBranches); $i++){
		$dim_Branch .= "<li><a href='#' class='leads_branch_url' data-branchurl='/leads/getlist?BranchId=".$respBranches[$i]["Id"]."'>".$respBranches[$i]["BranchName"]."</a></li>";
	} 
?>

	
<!--div id="view_div" class="container-fluid"-->
<div class='hidden-xs hidden-sm'>	
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
		<div class="">
		  <div class="x_content">
		    <div class="row">
		      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
		        <div class="tile-stats">
		          <div class="icon"><i class="fa fa-caret-square-o-right"></i>
		          </div>
		          <div class="count"><?php echo $data[0]["AmountNewLead"]; ?></div>
		
		          <h3>Новые запросы</h3>
		          <p>Количество запросов статус "новый"</p>
		        </div>
		      </div>
		      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
		        <div class="tile-stats">
		          <div class="icon"><i class="fa fa-sort-amount-desc"></i>
		          </div>
		          <div class="count"><?php echo $data[0]["AmountLostLead"]; ?></div>
		
		          <h3>Потерянные</h3>
		          <p>Количество запросов в статусе "потерян"</p>
		        </div>
		      </div>
		      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
		        <div class="tile-stats">
		          <div class="icon"><i class="fa fa-check-square-o"></i>
		          </div>
		          <div class="count"><?php echo $data[0]["AmountProcessedLead"]; ?></div>
		          
		          <h3>Обработанные</h3>
		          <p>Количество запросов статусе "обработан"</p>
		        </div>
		      </div>
		    </div>
		    </div>
		   </div>
		</div>
	</div>
</div>
	
	
	
	
	
<div class="x_panel">
<div class="x_title"><h2 id="x_title_name">Список запросов в работе</h2>
<ul class="nav navbar-right panel_toolbox" style="min-width: unset;">
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Фильтры <i class="fa fa-wrench"></i></a>
    <ul class="dropdown-menu" role="menu">
      <li><a href="#" class="leads_month_url" data-monthurl="/leads/getlist">Список запросов в работе</a></li>
      <li><a href="#" class="leads_month_url" data-monthurl="/leads/getlist?month=1">Список всех запросов за последний 1 месяц</a></li>
      <li><a href="#" class="leads_month_url" data-monthurl="/leads/getlist?month=2">Список всех запросов за последние 2 месяца</a></li>
      <li><a href="#" class="leads_month_url" data-monthurl="/leads/getlist?month=3">Список всех запросов за последние 3 месяца</a></li>
      <li><a href="#" class="leads_month_url" data-monthurl="/leads/getlist?month=6">Список всех запросов за последние 6 месяцев</a></li>
      <li><a href="#" class="leads_month_url" data-monthurl="/leads/getlist?month=12">Список всех запросов за последние 12 месяцев</a></li>
    </ul>
  </li>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Офисы <i class="fa fa-wrench"></i></a>
    <ul class="dropdown-menu" role="menu">
      <?php echo $dim_Branch; ?>
    </ul>
  </li>
</ul>
<div class="clearfix"></div>
<div id="x_content_leads" class="x_content"><br>
	<div class="row crm_tab_btns">
		<div class="col-sm-12">
			<input id="model" type="hidden" value="<?php echo $activeModelName;?>"/>
		</div>
	</div>
		<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		  <thead>
		    <tr>
		      	<th>Id</th>
		        <th>Дата</th>
		        <th>Фамилия</th>
		        <th>Имя</th>
		        <th>Телефон</th>
		        <th>Email</th>
		        <th>Менеджер</th>
		        <th>Приоритет</th>
		        <th>Статус</th>
		        <th>Действия</th>
		    </tr>
		  </thead>
		</table>
</div>
</div>
</div>