<?php

?>

<div class='hidden-xs hidden-sm'>
	<div class="clearfix"></div>
	<div class="row">
	<div class="col-md-12">
	<div class="">
	  <div class="x_content">
	    <div class="row">
	      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	        <div class="tile-stats">
	          <div class="icon"><i class="fa fa-caret-square-o-right"></i>
	          </div>
	          <div class="count"><?php echo $data[0]["AmountNewContacts"]; ?></div>
	          <h3><a href="#" class="contact_segment_url" data-contacturl="/contacts/getlist?segment=NoSegment">Новые</a></h3>
	          <p>Количество клиентов сегменте "новый"</p>
	        </div>
	      </div>
	      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	        <div class="tile-stats">
	          <div class="icon"><i class="fa fa-comments-o"></i>
	          </div>
	          <div class="count"><?php echo $data[0]["AmountProspectiveContacts"]; ?></div>
	
	          <h3><a href="#" class="contact_segment_url" data-contacturl="/contacts/getlist?segment=Prospective">Перспективные</a></h3>
	          <p>Количество клиентов "перспективный"</p>
	        </div>
	      </div>
	      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	        <div class="tile-stats">
	          <div class="icon"><i class="fa fa-sort-amount-asc"></i>
	          </div>
	          <div class="count"><?php echo $data[0]["AmountActiveContacts"]; ?></div>
	
	          <h3><a href="#" class="contact_segment_url" data-contacturl="/contacts/getlist?segment=Active">Активные</a></h3>
	          <p>Количество клиентов сегмент "активный"</p>
	        </div>
	      </div>
	      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	        <div class="tile-stats">
	          <div class="icon"><i class="fa fa-check-square-o"></i>
	          </div>
	          <div class="count"><?php echo $data[0]["AmountVIPContacts"]; ?></div>
	          
	          <h3><a href="#" class="contact_segment_url" data-contacturl="/contacts/getlist?segment=VIP">VIP</a></h3>
	          <p>Количество клиентов сегмент "VIP"</p>
	        </div>
	      </div>
	    </div>
	    </div>
	   </div>
	</div>
	</div>
	</div>
</div>

<!--div class="page-title">
  <div class="title_left">
    <h3>Клиенты<small>Some examples to get you started</small></h3>
  </div>

  <div class="title_right">
    <div class="col-md-7 col-sm-7 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Найти...">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">Найти</button>
        </span>
      </div>
    </div>
  </div>
</div>

<div class="clearfix"></div-->


<div class="x_panel">
  <div class="x_title">
    <h2>Клиенты- <medium id="x_title_name">Все клиенты</medium></h2>
    <ul class="nav navbar-right panel_toolbox">
      <!--li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li-->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Фильтры <i class="fa fa-wrench"></i></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#" class="contact_segment_url" data-contacturl="/contacts/getlist">Все клиенты</a></li>
          <li><a href="#" class="contact_segment_url" data-contacturl="/contacts/getlist?segment=NoSegment">Новые</a></li>
          <li><a href="#" class="contact_segment_url" data-contacturl="/contacts/getlist?segment=Prospective">Перспективные</a></li>
          <li><a href="#" class="contact_segment_url" data-contacturl="/contacts/getlist?segment=Active">Активные</a></li>
          <li><a href="#" class="contact_segment_url" data-contacturl="/contacts/getlist?segment=VIP">VIP</a></li>
          <li><a href="#" class="contact_segment_url" data-contacturl="/contacts/getlistbirthday">Именинники</a></li>
          
        </ul>
      </li>
      <!--li><a class="close-link"><i class="fa fa-close"></i></a-->
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
	<div class="x_content">
		<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		  <thead>
		    <tr>
		      	<th>Id</th>
		        <th>Фамилия</th>
		        <th>Имя</th>
		        <th>Моб. телефон</th>
		        <th>Email</th>
		        <th>Дата рождения</th>
		        <th>Ser Name</th>
		        <th>Name</th>
		        <th>Серия №</th>
		        <th>Действителен до</th>
		        <th>Био</th>
		        <th>Менеджер</th>
		        <th>Действия</th>
		    </tr>
		  </thead>
		</table>
		
	</div>
</div>