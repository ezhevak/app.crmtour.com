var grid = $("#grid_arrivals");
grid.jqGrid({
	url: "/main/getlist_arrivals",
	datatype: "json",
	//styleUI : 'jQueryUI',
	guiStyle: "bootstrap",
	//height: 145,
	width: 1110,//$("body").innerWidth() - 50,
	//width: $("#x_content_arrivals").width()-20,
	colNames:['Фамилия','Имя','№ договора','Дата вылета','Выданы','Оператор','№ заявки', 'Менеджер','Рейс','Аэропорт','Вылет','Прилёт','DealId'],
	colModel:[  {name:'LastName',index:'LastName', width:60, formatter: contactLink},
				{name:'FirstName',index:'FirstName', width:55, formatter: contactLink},
				{name:'DealNo',index:'DealNo', width:55,formatter:dealLink},
				{name:'DateArrival',index:'DateArrival', width:70},
				{name:'DocIssued',index:'DocIssued', width:60,
								edittype: "checkbox", editable:true,
								editoptions: { value: "Y:N",defaultValue:"N"},formatter: "checkbox", align: 'center',
								stype: "select", searchoptions: { sopt: ["eq", "ne"], value: ":Все;1:Выданы;0:Не выданы" }},
				{name:'OperatorName',index:'OperatorName', width:60, formatter:operatorLink},
				{name:'OperatorInvoceNum',index:'OperatorInvoceNum', width:60},
				{name:'ManagerName',index:'ManagerName', width:80,formatter:ManagerLink},
				{name:'FlightA',index:'FlightA', width:50,editable:true},
				{name:'Airport',index:'Airport', width:70,editable:false,formatter:AirportLink},
				
				{name:'FlightAArrivalDate',index:'FlightAArrivalDate', width:100,editable:true,
					edittype: 'custom',
					editoptions: {
						style: "height:18px;margin-top:0px;",
        				custom_element: function (value, options) {
        				  var par = $("<div>");
        				  var $group = $('<div class="input-group date">');
        				  var $inp = $('<input type="text" class="form-control input-sm">');
        				  var $btn = $('<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar" style="font-size:10px"></i> </span>');
						  
						  $inp.css("height","25px");
						  $inp.val(value);
						  $inp.on('click', function (e) {
						  	$group.datetimepicker('show');
						  });
					      $group.append($inp);
					      $btn.css("display","none");
					      $group.append($btn);

						  $group.datetimepicker({
						  	locale: 'ru',
						  	sideBySide: true,
						  	keepOpen: true,
						  	date: value,
						  	widgetPositioning: {
					            horizontal: 'right',
					            vertical: 'bottom'
					        },
					        widgetParent: '#x_content_arrivals'
						  });
						  $group.bind("dp.show", function () {
						  		
	                            var $datepicker = $("#x_content_arrivals .bootstrap-datetimepicker-widget");
	                            if ($datepicker.length > 0) {
	                                $datepicker.css("top", $(this).offset().top-210);
	                                $datepicker.css("left", $(this).offset().left-440);
	                            }
	                        });
						  par.append($group);
						  return par;
        				},
        				custom_value: function (elem, operation, value) {
        					var c = $(elem).find("input");
        					console.log('operation='+operation+',v='+value);
        					if (operation == "get") {
        						return c.val();
        					} else {
        						c.val(value);
        					}
        				}
					}
				},
				{name:'FlightADepartureDate',index:'FlightADepartureDate', width:100,editable:true,
					edittype: 'custom',
					editoptions: {
						style: "height:18px;margin-top:0px;",
        				custom_element: function (value, options) {
        				  var par = $("<div>");
        				  var $group = $('<div class="input-group date">');
        				  var $inp = $('<input type="text" class="form-control input-sm">');
        				  var $btn = $('<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar" style="font-size:10px"></i> </span>');
						  
						  $inp.css("height","25px");
						  $inp.val(value);
						  $inp.on('click', function (e) {
						  	$group.datetimepicker('show');
						  });
					      $group.append($inp);
					      $btn.css("display","none");
					      $group.append($btn);

						  $group.datetimepicker({
						  	locale: 'ru',
						  	sideBySide: true,
						  	keepOpen: true,
						  	date: value,
						  	widgetPositioning: {
					            horizontal: 'right',
					            vertical: 'bottom'
					        },
					       	 widgetParent: '#x_content_arrivals'
						  });
						  $group.bind("dp.show", function () {
						  		
	                            var $datepicker = $("#x_content_arrivals .bootstrap-datetimepicker-widget");
	                            if ($datepicker.length > 0) {
	                                $datepicker.css("top", $(this).offset().top-210);
	                                $datepicker.css("left", $(this).offset().left-440);
	                            }
	                        });
						  par.append($group);
						  return par;
        				},
        				custom_value: function (elem, operation, value) {
        					var c = $(elem).find("input");
        					console.log('operation='+operation+',v='+value);
        					if (operation == "get") {
        						return c.val();
        					} else {
        						c.val(value);
        					}
        				}
					}
				},
				{name:'DealId',index:'DealId', width:100,editable:true,hidden:true}], 
	rowNum:20,
	rowList:[20,40,60],
	pager: '#page_arrivals',
	sortname:'DateArrival',
	sortorder: 'asc',
//	sortname: 'EmbassyName',
	viewrecords: true,
	editurl: "/main/save_arrival",
	loadComplete: function(data) {
		//$('[data-toggle="tooltip"]').tooltip();
	}
});

grid.jqGrid('inlineNav',"#page_arrivals", {add: false,
										edit: true,
										save: true,
										cancel: true,
										del: false,
										refresh: true});
grid.jqGrid('navGrid', '#page_arrivals', { resize: false, add: false, search: false, del: false, refresh: true, edit: false});
grid.jqGrid('filterToolbar',{searchOperators : true});
grid.jqGrid('bindKeys');

//mobile_grid("grid_arrivals");


var grid_departures = $("#grid_departures");
grid_departures.jqGrid({
	url: "/main/getlist_departures",
	datatype: "json",
	//styleUI : 'jQueryUI',
	guiStyle: "bootstrap",
	//height: 145,
	width: 1110,//$("body").innerWidth() - 50,
	//width: $("#x_content_departures").width()-20,
	colNames:['Фамилия','Имя','№ договора','Дата возврата','Оператор','№ заявки', 'Менеджер','Рейс','Аэропорт','Вылет','Прилёт',"DialId"],
	colModel:[ {name:'LastName',index:'LastName', width:60, formatter: contactLink},
				{name:'FirstName',index:'FirstName', width:55, formatter: contactLink},
				{name:'DealNo',index:'DealNo', width:55,formatter:dealLink},
				{name:'DateDeparture',index:'DateDeparture', width:70/*, formatter: "date", formatoptions: { srcformat: "Y-m-d", newformat: "d.m.Y" }*/},
				
				
				{name:'OperatorName',index:'OperatorName', width:60, formatter:operatorLink},
				{name:'OperatorInvoceNum',index:'OperatorInvoceNum', width:60},
				{name:'ManagerName',index:'ManagerName', width:100,formatter:ManagerLink},
				{name:'FlightB',index:'FlightB', width:50,editable:true},
				{name:'Airport',index:'Airport', width:70,editable:false,formatter:AirportLink},
				{name:'FlightBArrivalDate',index:'FlightBArrivalDate', width:100,editable:true,
					edittype: 'custom',
					editoptions: {
						style: "height:18px;margin-top:0px;",
        				custom_element: function (value, options) {
        				  var par = $("<div>");
        				  var $group = $('<div class="input-group date">');
        				  var $inp = $('<input type="text" class="form-control input-sm">');
        				  var $btn = $('<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar" style="font-size:10px"></i> </span>');
						  
						  $inp.css("height","25px");
						  $inp.val(value);
						  $inp.on('click', function (e) {
						  	$group.datetimepicker('show');
						  });
					      $group.append($inp);
					      $btn.css("display","none");
					      $group.append($btn);

						  $group.datetimepicker({
						  	locale: 'ru',
						  	sideBySide: true,
						  	keepOpen: true,
						  	date: value,
						  	widgetPositioning: {
					            horizontal: 'right',
					            vertical: 'bottom'
					        },
					        widgetParent: '#x_content_departures'
						  });
						  $group.bind("dp.show", function () {
						  		
	                            var $datepicker = $("#x_content_departures .bootstrap-datetimepicker-widget");
	                            if ($datepicker.length > 0) {
	                                $datepicker.css("top", $(this).offset().top-415);
	                                $datepicker.css("left", $(this).offset().left-440);
	                            }
	                        });
						  par.append($group);
						  return par;
        				},
        				custom_value: function (elem, operation, value) {
        					var c = $(elem).find("input");
        					console.log('operation='+operation+',v='+value);
        					if (operation == "get") {
        						return c.val();
        					} else {
        						c.val(value);
        					}
        				}
					}},
				{name:'FlightBDepartureDate',index:'FlightBDepartureDate', width:100,editable:true,
					edittype: 'custom',
					editoptions: {
						style: "height:18px;margin-top:0px;",
        				custom_element: function (value, options) {
        				  var par = $("<div>");
        				  var $group = $('<div class="input-group date">');
        				  var $inp = $('<input type="text" class="form-control input-sm">');
        				  var $btn = $('<span class="input-group-addon btn"><i class="glyphicon glyphicon-calendar" style="font-size:10px"></i> </span>');
						  
						  $inp.css("height","25px");
						  $inp.val(value);
						  $inp.on('click', function (e) {
						  	$group.datetimepicker('show');
						  });
					      $group.append($inp);
					      $btn.css("display","none");
					      $group.append($btn);

						  $group.datetimepicker({
						  	locale: 'ru',
						  	sideBySide: true,
						  	keepOpen: true,
						  	date: value,
						  	widgetPositioning: {
					            horizontal: 'right',
					            vertical: 'bottom'
					        },
					        widgetParent: '#x_content_departures'
						  });
						  $group.bind("dp.show", function () {
						  		
	                            var $datepicker = $("#x_content_departures .bootstrap-datetimepicker-widget");
	                            if ($datepicker.length > 0) {
	                                $datepicker.css("top", $(this).offset().top-415);
	                                $datepicker.css("left", $(this).offset().left-440);
	                            }
	                        });
						  par.append($group);
						  return par;
        				},
        				custom_value: function (elem, operation, value) {
        					var c = $(elem).find("input");
        					console.log('operation='+operation+',v='+value);
        					if (operation == "get") {
        						return c.val();
        					} else {
        						c.val(value);
        					}
        				}
					}},
				{name:'DealId',index:'DealId', width:100,editable:true,hidden:true}],
	rowNum:20,
	rowList:[20,40,60],
	pager: '#page_departures',
	sortname:'DateDeparture',
	sortorder: 'asc',
//	sortname: 'EmbassyName',
	viewrecords: true,
	editurl: "/main/save_departures",
//	sortorder: "asc",
	loadComplete: function(data) {
		//$('[data-toggle="tooltip"]').tooltip();
	}
});

grid_departures.jqGrid('inlineNav',"#page_departures", {add: false,
												        edit: true,
												        save: true,
												        cancel: true,
												        del: false,
												        refresh: true});
grid_departures.jqGrid('navGrid', '#page_departures', { resize: false, add: false, search: false, del: false, refresh: true, edit: false});
grid_departures.jqGrid('filterToolbar',{searchOperators : true});
grid_departures.jqGrid('bindKeys');
//mobile_grid("grid_departures");


function operatorLink(cellValue, options, rowdata, action){
	if(cellValue!==""){
		if(rowdata.OperatorWebSite !==null && rowdata.OperatorWebSite !==""){
			var str = rowdata.OperatorWebSite;
			var www = str.substring(0, 3);
			if(www == "www"){
				str ="http://"+str;
			}
			return "<a href='"+str+"' target='_blank'>"+cellValue + "</a>";
		}
		return cellValue;
		
	}
}
	

//function contactLink(cellValue, options, rowdata, action){
//	
//	return "<a href='/contacts/add?Id=" +rowdata.ContactId+"'>"+cellValue + "</a>";
//}

function contactLink(cellValue, options, rowdata, action){
	if(cellValue !==""){
		return "<a href='/contacts/add?Id=" +rowdata.ContactId+"'>"+cellValue + "</a>";
	} else {
		return cellValue;
	}
}




function dealLink(cellValue, options, rowdata, action){
	
	if( $("#GlobalUserRole").val() == "admin" || $("#GlobalUserId").val() == rowdata.UserId ){
		return "<a href='/deals/add?Id=" +rowdata.DealId+"'>"+cellValue + "</a>";
	} else { 
		return cellValue;
	}

//	return "<a href='/deals/add?Id=" +rowdata.DealId+"'>"+cellValue + "</a>";
}

function checkBox(cellvalue, options, rowObject){
  return '<input type="checkbox"' + (cellvalue ? ' checked="checked"' : '') + 'onclick="return false"/>';
}
function ManagerLink(cellValue, options, rowdata, action) {
	return "<a href='/users/add?Id=" +rowdata.UserId+"'>"+cellValue + "</a>";
}



function AirportLink(cellValue, options, rowdata, action){
	if(rowdata.AirportSite !==null && rowdata.AirportSite !==""){
		var str = rowdata.AirportSite;
		var www = str.substring(0, 3);
		if(www == "www"){
			str ="http://"+str;
		}
		return "<a href='"+str+"' target='_blank'>"+cellValue + "</a>";
	}
	return cellValue;
}





