function on_load() {
 $('#DealDate').datepicker({
  format: "dd.mm.yyyy",
  weekStart: 1,
  todayBtn: "linked",
  language: "ru",
  autoclose: true
 });
 
  $('#DateArrival').datepicker({
  format: "dd.mm.yyyy",
  weekStart: 1,
  todayBtn: "linked",
  language: "ru",
  autoclose: true
 }).on("changeDate", function(e) {
    calcDateDeparture();
    
 });

$("#FlightA").on('focusout', function(){
    setFlightADate();
});
 
$("#FlightB").on('focusout', function(){
    setFlightBDate();
});
 
 
  $('#DateDeparture').datepicker({
  format: "dd.mm.yyyy",
  weekStart: 1,
  todayBtn: "linked",
  language: "ru",
  autoclose: true
 });
 
 
  $('#OperatorInvoceDate').datepicker({
  format: "dd.mm.yyyy",
  weekStart: 1,
  todayBtn: "linked",
  language: "ru",
  autoclose: true
 });
 
   $('#DateFullPay').datepicker({
  format: "dd.mm.yyyy",
  weekStart: 1,
  todayBtn: "linked",
  language: "ru",
  autoclose: true
 });
 
 
 
 
  $('#FlightAArrivalDate').datetimepicker({locale: 'ru',sideBySide: true});
 
  $('#FlightADepartureDate').datetimepicker({locale: 'ru',sideBySide: true});
 
  $('#FlightBArrivalDate').datetimepicker({locale: 'ru',sideBySide: true});
 
  $('#FlightBDepartureDate').datetimepicker({locale: 'ru',sideBySide: true});
 
 
  $('#ActDate').datepicker({
  format: "dd.mm.yyyy",
  weekStart: 1,
  todayBtn: "linked",
  language: "ru",
  autoclose: true
 });
  
 $("#AmountNight").on("change", function() {
 	calcDateDeparture();
 });
 
 //при установлении суммы предоплаты, поле % предоплаты расчитывается автоматически.
 $("#PrePaySum").on("change", function() {
 	calcPrePayPercent();
 });
 
  //при установлении суммы предоплаты, поле % предоплаты расчитывается автоматически.
 $("#OperatorInvoceSum").on("change", function() {
 	validateOperatorInvoceSum();
 });
 

  //при установке % скидки сумма сделки расчитывается автоматически
 //$("#PercentDiscount").on("change", function() {
 //	setDealSum();
 //});
 
 
  //при установке % скидки сумма сделки расчитывается автоматически
 //$("#OperatorInvoceSum").on("change", function() {
 //	setDealSum();
 //});
 
 
//$(document).ready(function(){
	$('#cascadingdropdown').cascadingDropdown({
		selectBoxes: [
			{
				selector: '#DirectionName',
				source: function(request, response) {
					$.getJSON('/dictionary/getDirections', request, function(data) {
						var selectOnlyOption = -1;
						var direction_ctrl = $("#DirectionName");
						if (direction_ctrl.data("selected") !== undefined)
							selectOnlyOption = parseInt(direction_ctrl.data("selected"));
						//console.log("DirectionIndex:" + selectOnlyOption);
						response($.map(data, function(item, index) {
							var selectedIndex = 0;
							if (item.Id == selectOnlyOption)
								selectedIndex = index+1;
							//console.log("DirectionSelIdx:" + selectedIndex);
							return {
								label: item.DirectionName,
								value: item.Id,
								selected: selectedIndex
							};
						}));
					});
				}
			},
			{
				selector: '#RegionName',
				requires: ['#DirectionName'],
				source: function(request, response) {
					$.getJSON('/dictionary/getRegions', request, function(data) {
						var selectOnlyOption = -1;
						var region_ctrl = $("#RegionName");
						if (region_ctrl.data("selected") !== undefined)
							selectOnlyOption = parseInt(region_ctrl.data("selected"));
						response($.map(data, function(item, index) {
							var selectedIndex = 0;
							if (item.Id == selectOnlyOption)
								selectedIndex = index+1;
							return {
								label: item.RegionName,
								value: item.Id,
								selected: selectedIndex
							};
						}));
					});
				}
			},
			{
				selector: '#HotelName',
				requires: ['#DirectionName'],
				requireAll: true,
				source: function(request, response) {
					$.getJSON('/dictionary/getHotels', request, function(data) {
						var selectOnlyOption = -1;
						var hotel_ctrl = $("#HotelName");
						if (hotel_ctrl.data("selected") !== undefined)
							selectOnlyOption = parseInt(hotel_ctrl.data("selected"));
						response($.map(data, function(item, index) {
							var selectedIndex = 0;
							if (item.Id == selectOnlyOption)
								selectedIndex = index+1;
							return {
								label: item.HotelName + " " + item.HotelStarsName,
								value: item.Id,
								selected: selectedIndex
							};
						}));
					});
				},
				onChange: function(event, value, requiredValues){
					// do stuff
				}
			}
		],
		onReady: function(event, allValues) {
			//console.log("ready");
			//var direction_ctrl = $("#DirectionName");
			//var region_ctrl = $("#RegionName");
			//var hotel_ctrl = $("#HotelName");
			
			//direction_ctrl.val(direction_ctrl.data("selected"));
 			//region_ctrl.val(region_ctrl.data("selected"));
 			//hotel_ctrl.val(hotel_ctrl.data("selected"));
		}
	});
//});
 	
 	
 	
 
	
	var gridMembers = $("#grid_members");
	gridMembers.jqGrid({
		url: "/deals/getlist_linked_contact?DealId=" + $("#Id").val(),
		datatype: "json",
		//styleUI : 'jQueryUI',
		guiStyle: "bootstrap",
		height: 125,
		width: 1200,//$("body").innerWidth() - 200, 
		colNames:['MVGId','PickContactId', 'Фамилия', 'Имя', 'Отчество','Дата рождения','Given Names','SerName','Серия номер','Действует','Биометрический','Действия'],
		colModel:[{name:'MVGId',index:'MVGId', width:40, sorttype:"int"},
				  {name:'PickContactId',index:'PickContactId', width:40, sorttype:"int", hidden: true},
					{name:'LastName',index:'LastName', width:80/*, formatter: formatterSelectClient*/},
					{name:'FirstName',index:'FirstName', width:80,formatter: gridMemberseditLink},
					{name:'MiddleName',index:'MiddleName', width:100},
					{name:'DateBirthAge',index:'DateBirthAge', width:80},
					{name:'docFirstName',index:'docFirstName', width:80},
					{name:'docLastName',index:'docLastName', width:80},
					{name:'docSeriaNum',index:'docSeriaNum', width:80},
					{name:'docValid',index:'docValid', width:80},
					{name:'docBiometric',index:'docBiometric', width:80, formatter: checkBoxFormatter, align: 'center'},
					{name:'Del',index:'Del', width:80, formatter: gridMembersdelLink, sortable: false, search: false, align: 'center'}
					],
		//caption: "Список контактов",
		rowNum:5,
		rowList:[10,10,30],
		pager: '#page_members',
		sortname: 'Id',
		viewrecords: true,
		sortorder: "desc",
		loadComplete: function(data) {
			//$('[data-toggle="tooltip"]').tooltip();
		}
	});
	
	
	gridMembers.jqGrid('navGrid', '#page_members', { resize: false, add: false, search: false, del: false, refresh: true, edit: false});
	gridMembers.jqGrid('filterToolbar',{searchOperators : true});
	gridMembers.jqGrid('bindKeys');
	//mobile_grid("grid_members");
	/*gridMembers.setGridHeight(
    	$(window).height() - $("#grid_members").position().top - 350
	);*/

	//Members Edit Link
	function gridMemberseditLink(cellValue, options, rowdata, action)
	{
		console.log(rowdata);
		return "<a href='/contacts/add?Id=" +rowdata.PickContactId+"'>"+cellValue + "</a>";
	}
	//Members Del Link
	function gridMembersdelLink(cellValue, options, rowdata, action) {
		   var isDisable = "";
		   //if (rowdata.UserRole != "admin")
			//	isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление запрещено!\"";
	       return "<div class='btn-group' role='group'><a href='/contacts/add?Id=" +rowdata.PickContactId+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></div>";
	}
	
	var pickContactMVG = $("#pickContactMVG").jqGridMVG({
	  width: 600,
	  animation: false,
	  uiType: "jqgrid",
	  control: "button",
	  input_button_class: "btn-sm",
	  lang: "ru",
	  colNames: [/*'id',*/'id','Фамилия', 'Имя', 'Отчество'],
	  colModel:[
	  	//{name:'id',index:'id', width:60, sorttype:"int", key: true}, 
	  	{name:'id',index:'id', width:60, sorttype:"int", key: true}, 
	  	{name:'pickLastName',index:'pickLastName', width:100}, 
	  	{name:'pickFirstName',index:'pickFirstName', width:90}, 
	  	{name:'pickMiddleName',index:'pickMiddleName', width:100}
	  ],
	  sortname: "Id",
	  sortorder:"DESC",
	  data_url: "/deals/getMVGList?Type=Contact&DealId="+$("#Id").val(),
	  del_url: "/deals/delMVGList?Type=Contact&DealId="+$("#Id").val()+"&ParrContactId="+$("#ContactId").val(),
	  add_url: "/deals/addMVGList?Type=Contact&DealId="+$("#Id").val()+"&ParrContactId="+$("#ContactId").val(),
	  onchange: function() {
	  	$('#grid_members').trigger( 'reloadGrid' );
	  },
	  window_title: "Связи с контактами",
	  selected_caption: "Выбранные записи",
	  assoc_caption: "Доступные для выбора записи",
	  add_button: true,
	  add_button_url: "/contacts/participants?link_Id=" + $("#Id").val() + "&link_type=deals",
	  add_full_width: false,
	  //openBtn: "DSDS"
	  //data: [{"Id":58,"FirstName":"dasdas","LastName":"sdsadadas","MiddleName":"fdsfsd"},{"Id":71,"FirstName":"UserId","LastName":"","MiddleName":""},{"Id":74,"FirstName":"testcore","LastName":"testcore","MiddleName":"testcore"},{"Id":61,"FirstName":"\u0415\u0432\u0433\u0435\u043d\u0438\u0439","LastName":"\u0416\u0435\u0432\u0430\u043a","MiddleName":"fdsfsd"},{"Id":59,"FirstName":"test1","LastName":"tratra","MiddleName":"test2"},{"Id":65,"FirstName":"dasdas","LastName":"test","MiddleName":"fdsfsd"},{"Id":66,"FirstName":"dasdas","LastName":"test","MiddleName":"fdsfsd"},{"Id":70,"FirstName":"fdsfsd","LastName":"fdsfds","MiddleName":"fdsfds"},{"Id":76,"FirstName":"testcore2","LastName":"testcore2","MiddleName":"testcore2"},{"Id":77,"FirstName":"testcore3","LastName":"\u0423\u0440\u0430","MiddleName":"testcore3"},{"Id":67,"FirstName":"\u0421\u0443\u043f\u0435\u0440","LastName":"\u041d\u043e\u0432\u044b\u0439","MiddleName":"\u041a\u043b\u0438\u0435\u043d\u0442"},{"Id":69,"FirstName":"tuktukerof","LastName":"ssss","MiddleName":""},{"Id":78,"FirstName":"testcore4","LastName":"testcore4","MiddleName":"testcore4"}]
	});
	//mobile_grid("pickContactMVG");
 //load complete
}


function calcNightEndDate(startDt, hights) {
	var new_date = moment(startDt).add(hights,'days');
	return new_date;
}

function calcDateDeparture() {
	var res = calcNightEndDate($("#DateArrival").datepicker( "getDate" ), $("#AmountNight").val());
	//console.log(res);
	$("#DateDeparture").datepicker("setDate", res.toDate());
}


function calcPrePayPercent() {
	var PrePaySum = Number($("#PrePaySum").val());
	var DealSum = Number($("#DealSum").val());
	var PrePayPercent = (PrePaySum/DealSum)*100;
	PrePayPercent =	PrePayPercent.toFixed(2);
	
	
//	appAlert("'Сумма предоплаты'"+PrePaySum+" не может быть больше 'Суммы договора':"+DealSum+"!", "error","Ой беда!");
	if(PrePaySum>DealSum){
		appAlert("'Сумма предоплаты' не может быть больше 'Суммы договора':"+DealSum+"!", "error","Ой беда!");
	} else {
		$("#PrePayPercent").val(PrePayPercent);
	}
}
function validateOperatorInvoceSum() {
	var OperatorInvoceSum = Number($("#OperatorInvoceSum").val());
	var DealSum = Number($("#DealSum").val());
	
	if(OperatorInvoceSum>DealSum){
		appAlert("'Сумма счёта оператора' не может быть больше 'Суммы договора':"+DealSum+"!", "error","Ой беда!");
	}
}


function setDealSum() {
	var OperatorInvoceSum = Number($("#OperatorInvoceSum").val());
	var PercentDiscount = Number($("#PercentDiscount").val());
	var DealSum = Number($("#DealSum").val());

//	$("#DealSum").val(Number($("#OperatorInvoceSum").val())-OperatorInvoceSum*(PercentDiscount/100));
	
	if(OperatorInvoceSum !== "0" && PercentDiscount !== "0" && DealSum == "0"){
		$("#DealSum").val(Number($("#OperatorInvoceSum").val())-OperatorInvoceSum*(PercentDiscount/100));
		
	}
}

function checkBoxFormatter(cellvalue, options, rowObject){
  return '<input type="checkbox"' + (cellvalue ? ' checked="checked"' : '') + 'onclick="return false"/>';
}

function setFlightADate() {
	var dateObj = $("#DateArrival").datepicker( "getDate" );
	var month = dateObj.getMonth() + 1;
	if(month < 10){ month = "0"+month;}
	var day = dateObj.getDate();
	if(day < 10){ day = "0"+day;}
	var year = dateObj.getFullYear();
	
	newdate = day + "." + month + "." + year + " 00:00";
	
	var FlightAArrivalDate = $('#FlightAArrivalDate').datetimepicker().children('input').val();
	var FlightADepartureDate = $('#FlightADepartureDate').datetimepicker().children('input').val();
	
	if(FlightAArrivalDate == ""){
		$('#FlightAArrivalDate').datetimepicker().children('input').val(newdate);
	}
	if(FlightADepartureDate == ""){
		$('#FlightADepartureDate').datetimepicker().children('input').val(newdate);
	}
	
}



function setFlightBDate() {
	var dateObj = $("#DateDeparture").datepicker( "getDate" );
	var month = dateObj.getMonth() + 1;
	if(month < 10){ month = "0"+month;}
	var day = dateObj.getDate();
	if(day < 10){ day = "0"+day;}
	var year = dateObj.getFullYear();
	
	newdate = day + "." + month + "." + year + " 00:00";
	
	var FlightBArrivalDate = $('#FlightBArrivalDate').datetimepicker().children('input').val();
	var FlightBDepartureDate = $('#FlightBDepartureDate').datetimepicker().children('input').val();
	
	if(FlightBArrivalDate == ""){
		$('#FlightBArrivalDate').datetimepicker().children('input').val(newdate);
	}
	if(FlightBDepartureDate == ""){
		$('#FlightBDepartureDate').datetimepicker().children('input').val(newdate);
	}
	
}


//Подключаем поиск по select
$(document).ready(function() {
  $(".js-example-basic-single").select2();
  $(".select2.select2-container").css("width","100%");
});

