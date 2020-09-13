//Клиенты с сегментом VIP
var grid = $("#grid_contact_vip");
grid.jqGrid({
	url: "/contacts/getListSegment?segment=VIP",
	datatype: "json",
	//styleUI : 'jQueryUI',
	guiStyle: "bootstrap",
	//height: 375,
	//width: 1200,//$("body").innerWidth() - 50,
	width: $("#x_content_vip").width()-20,
	
	colNames:['Id','Фамилия','Имя', /*'Сегмент',*/'Моб. телефон','Email','Дата рождения',/* 'SerName','Name','Серия №','Действителен',*/'Менеджер' ,'Действия'],
	colModel:[ {name:'Id',index:'Id', width:40, sorttype:"int",hidden:true},
			   {name:'LastName',index:'LastName', formatter: editLink,width:70},
			   {name:'FirstName',index:'FirstName', formatter: editLink, width:60},
			   {name:'PhoneMob',index:'PhoneMob', width:85},
			   {name:'EmailHome',index:'EmailHome', width:85},
			   {name:'DateBirthAge',index:'DateBirthAge', width:75},
			   {name:'ManagerName',index:'ManagerName', width:70},
			   {name:'Del',index:'Del', width:70, formatter: delLink, sortable: false, search: false, align: 'center'}],
	//caption: "Список контактов",
	rowNum:20,
	rowList:[20,30,40],
	pager: '#page_contact_vip',
	sortname: 'Id',
	viewrecords: true,
	sortorder: "desc",
	loadComplete: function(data) {
		//$('[data-toggle="tooltip"]').tooltip();
	}
	
});

grid.jqGrid('navGrid', '#page_contact_vip', { resize: false, add: false, search: false, del: false, refresh: true, edit: false});
grid.jqGrid('filterToolbar',{searchOperators : true});
grid.jqGrid('bindKeys');
grid.setGridHeight(
   // $(window).height() - $("#grid_contact").position().top - 220
);

//mobile_grid("grid_contact_vip");

function editLink(cellValue, options, rowdata, action){
	return "<a href='/contacts/add?Id=" +rowdata.Id+"' target='_blank'>"+cellValue + "</a>";
}

function delLink(cellValue, options, rowdata, action) {
	var isDisable = "";
	if( $("#GlobalUserRole").val() != "admin"){
		isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление запрещено!\"";
	}
	return "<div class='btn-group' role='group'><a href='/contacts/add?Id=" +rowdata.Id+"' target='_blank' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' " + isDisable + " onClick='deleteRecord(" + rowdata.Id + ", \"" + options.rowId+ "\")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button><a href='/tasks/add?model=Contact&modelid=" +rowdata.Id+"' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Создать задачу'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span></a></div>";
}

function deleteRecord(recId, qrowId) {
	console.log("del:" + "recId="+recId+",rowId=" + qrowId);
	if (recId !== "" && qrowId !== "") {
		grid.jqGrid('setSelection',qrowId);
		grid.jqGrid('delGridRow',qrowId, {reloadAfterSubmit:false,
			width: 316,
			height: 204,
			top: 50,
			left: 552,
			onclickSubmit: function() {
				//console.log("submit for delete");
				$.ajax({
				  dataType: 'json',
				  url: '/contacts/delete?Id=' + recId,
				  beforeSend: function() {
					showLoader();
				  },
				  success: function(data){
					if (data.status === "SUCCESS") {
						appAlert("Запись удалена успешно!", "success");
					} else {
						//console.log(data.message);
						appAlert(data.message, "error");
					}
				  },
				  complete: function() {
					hideLoader();
				  },
				});
			}
		});
	}
}

$("#gs_grid_contact_vip_PhoneMob").inputmask("+38(099)999-9999");



//Клиенты без сегмента
var grid = $("#grid_contact_nosegment");
grid.jqGrid({
	url: "/contacts/getListSegment?segment=NoSegment",
	datatype: "json",
	//styleUI : 'jQueryUI',
	guiStyle: "bootstrap",
	//height: 375,
	//width: 1200,//$("body").innerWidth() - 50,
	width: $("#x_content_nosegment").width()-20,
	
	colNames:['Id', 'Фамилия','Имя',/*'Сегмент',*/'Моб. телефон','Email','Дата рождения',/* 'SerName','Name','Серия №','Действителен',*/'Менеджер' ,'Действия'],
	colModel:[ {name:'Id',index:'Id', width:40, sorttype:"int", formatter: editLink,hidden:true},
			   {name:'LastName',index:'LastName', formatter: editLink, width:70},
			   {name:'FirstName',index:'FirstName', formatter: editLink, width:60},
			   {name:'PhoneMob',index:'PhoneMob', width:85},
			   {name:'EmailHome',index:'EmailHome', width:85},
			   {name:'DateBirthAge',index:'DateBirthAge', width:75},
			   {name:'ManagerName',index:'ManagerName', width:70},
			   {name:'Del',index:'Del', width:70, formatter: delLink, sortable: false, search: false, align: 'center'}],
	//caption: "Список контактов",
	rowNum:20,
	rowList:[20,30,40],
	pager: '#page_contact_nosegment',
	sortname: 'Id',
	viewrecords: true,
	sortorder: "desc",
	loadComplete: function(data) {
		//$('[data-toggle="tooltip"]').tooltip();
	}
});

grid.jqGrid('navGrid', '#page_contact_nosegment', { resize: false, add: false, search: false, del: false, refresh: true, edit: false});
grid.jqGrid('filterToolbar',{searchOperators : true});
grid.jqGrid('bindKeys');
grid.setGridHeight(
   // $(window).height() - $("#grid_contact").position().top - 220
);

//mobile_grid("grid_contact_nosegment");
/*
function editLink(cellValue, options, rowdata, action){
	return "<a href='/contacts/add?Id=" +rowdata.Id+"'>"+cellValue + "</a>";
}
*/
/*
function delLink(cellValue, options, rowdata, action) {
	var isDisable = "";
	if( $("#GlobalUserRole").val() != "admin"){
		isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление запрещено!\"";
	}
	return "<div class='btn-group' role='group'><a href='/contacts/add?Id=" +rowdata.Id+"' target='_blank' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' " + isDisable + " onClick='deleteRecord(" + rowdata.Id + ", \"" + options.rowId+ "\")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button><a href='/tasks/add?model=Contact&modelid=" +rowdata.Id+"' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Создать задачу'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span></a></div>";
}
*/
/*
function deleteRecord(recId, qrowId) {
	console.log("del:" + "recId="+recId+",rowId=" + qrowId);
	if (recId !== "" && qrowId !== "") {
		grid.jqGrid('setSelection',qrowId);
		grid.jqGrid('delGridRow',qrowId, {reloadAfterSubmit:false,
			width: 316,
			height: 204,
			top: 50,
			left: 552,
			onclickSubmit: function() {
				//console.log("submit for delete");
				$.ajax({
				  dataType: 'json',
				  url: '/contacts/delete?Id=' + recId,
				  beforeSend: function() {
					showLoader();
				  },
				  success: function(data){
					if (data.status === "SUCCESS") {
						appAlert("Запись удалена успешно!", "success");
					} else {
						//console.log(data.message);
						appAlert(data.message, "error");
					}
				  },
				  complete: function() {
					hideLoader();
				  },
				});
			}
		});
	}
}
*/
$("#gs_grid_contact_nosegment_PhoneMob").inputmask("+38(099)999-9999");




//Клиенты Активные Actvie
var grid = $("#grid_contact_active");
grid.jqGrid({
	url: "/contacts/getListSegment?segment=Active",
	datatype: "json",
	//styleUI : 'jQueryUI',
	guiStyle: "bootstrap",
	//height: 375,
	//width: 1200,//$("body").innerWidth() - 50,
	width: $("#x_content_active").width()-20,
	
	colNames:['Id','Фамилия','Имя', /*'Сегмент',*/'Моб. телефон','Email','Дата рождения',/* 'SerName','Name','Серия №','Действителен',*/'Менеджер' ,'Действия'],
	colModel:[ {name:'Id',index:'Id', width:40, sorttype:"int",hidden:true},
			   {name:'LastName',index:'LastName', formatter: editLink, width:70},
			   {name:'FirstName',index:'FirstName', formatter: editLink, width:60},
			   {name:'PhoneMob',index:'PhoneMob', width:85},
			   {name:'EmailHome',index:'EmailHome', width:85},
			   {name:'DateBirthAge',index:'DateBirthAge', width:75},
			   {name:'ManagerName',index:'ManagerName', width:70},
			   {name:'Del',index:'Del', width:70, formatter: delLink, sortable: false, search: false, align: 'center'}],
	//caption: "Список контактов",
	rowNum:20,
	rowList:[20,30,40],
	pager: '#page_contact_active',
	sortname: 'Id',
	viewrecords: true,
	sortorder: "desc",
	loadComplete: function(data) {
		//$('[data-toggle="tooltip"]').tooltip();
	}
});

grid.jqGrid('navGrid', '#page_contact_active', { resize: false, add: false, search: false, del: false, refresh: true, edit: false});
grid.jqGrid('filterToolbar',{searchOperators : true});
grid.jqGrid('bindKeys');
grid.setGridHeight(
   // $(window).height() - $("#grid_contact").position().top - 220
);

//mobile_grid("grid_contact_active");
/*
function editLink(cellValue, options, rowdata, action){
	return "<a href='/contacts/add?Id=" +rowdata.Id+"'>"+cellValue + "</a>";
}
*//*
function delLink(cellValue, options, rowdata, action) {
	var isDisable = "";
	if( $("#GlobalUserRole").val() != "admin"){
		isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление запрещено!\"";
	}
	return "<div class='btn-group' role='group'><a href='/contacts/add?Id=" +rowdata.Id+"' target='_blank' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' " + isDisable + " onClick='deleteRecord(" + rowdata.Id + ", \"" + options.rowId+ "\")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button><a href='/tasks/add?model=Contact&modelid=" +rowdata.Id+"' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Создать задачу'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span></a></div>";
}*/
/*
function deleteRecord(recId, qrowId) {
	console.log("del:" + "recId="+recId+",rowId=" + qrowId);
	if (recId !== "" && qrowId !== "") {
		grid.jqGrid('setSelection',qrowId);
		grid.jqGrid('delGridRow',qrowId, {reloadAfterSubmit:false,
			width: 316,
			height: 204,
			top: 50,
			left: 552,
			onclickSubmit: function() {
				//console.log("submit for delete");
				$.ajax({
				  dataType: 'json',
				  url: '/contacts/delete?Id=' + recId,
				  beforeSend: function() {
					showLoader();
				  },
				  success: function(data){
					if (data.status === "SUCCESS") {
						appAlert("Запись удалена успешно!", "success");
					} else {
						//console.log(data.message);
						appAlert(data.message, "error");
					}
				  },
				  complete: function() {
					hideLoader();
				  },
				});
			}
		});
	}
}
*/
$("#gs_grid_contact_active_PhoneMob").inputmask("+38(099)999-9999");


//Клиенты Перспективные Prospective
var grid = $("#grid_contact_prospective");
grid.jqGrid({
	url: "/contacts/getListSegment?segment=Prospective",
	datatype: "json",
	//styleUI : 'jQueryUI',
	guiStyle: "bootstrap",
	//height: 375,
	//width: 1200,//$("body").innerWidth() - 50,
	width: $("#view_div").width()-20,
	
	colNames:['Id','Фамилия', 'Имя',/*'Сегмент',*/'Моб. телефон','Email','Дата рождения',/* 'SerName','Name','Серия №','Действителен',*/'Менеджер' ,'Действия'],
	colModel:[ {name:'Id',index:'Id', width:40, sorttype:"int", hidden:true},
			   {name:'LastName',index:'LastName', formatter: editLink, width:70},
			   {name:'FirstName',index:'FirstName', formatter: editLink, width:60},
			   {name:'PhoneMob',index:'PhoneMob', width:85},
			   {name:'EmailHome',index:'EmailHome', width:85},
			   {name:'DateBirthAge',index:'DateBirthAge', width:75},
			   {name:'ManagerName',index:'ManagerName', width:70},
			   {name:'Del',index:'Del', width:70, formatter: delLink, sortable: false, search: false, align: 'center'}],
	//caption: "Список контактов",
	rowNum:20,
	rowList:[20,30,40],
	pager: '#page_contact_active',
	sortname: 'Id',
	viewrecords: true,
	sortorder: "desc",
	loadComplete: function(data) {
		//$('[data-toggle="tooltip"]').tooltip();
	}
});

grid.jqGrid('navGrid', '#page_contact_prospective', { resize: false, add: false, search: false, del: false, refresh: true, edit: false});
grid.jqGrid('filterToolbar',{searchOperators : true});
grid.jqGrid('bindKeys');
grid.setGridHeight(
   // $(window).height() - $("#grid_contact").position().top - 220
);

//mobile_grid("grid_contact_prospective");
/*
function editLink(cellValue, options, rowdata, action){
	return "<a href='/contacts/add?Id=" +rowdata.Id+"'>"+cellValue + "</a>";
}*/
/*
function delLink(cellValue, options, rowdata, action) {
	var isDisable = "";
	if( $("#GlobalUserRole").val() != "admin"){
		isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление запрещено!\"";
	}
	return "<div class='btn-group' role='group'><a href='/contacts/add?Id=" +rowdata.Id+"' target='_blank' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' " + isDisable + " onClick='deleteRecord(" + rowdata.Id + ", \"" + options.rowId+ "\")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button><a href='/tasks/add?model=Contact&modelid=" +rowdata.Id+"' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Создать задачу'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span></a></div>";
}*/
/*
function deleteRecord(recId, qrowId) {
	console.log("del:" + "recId="+recId+",rowId=" + qrowId);
	if (recId !== "" && qrowId !== "") {
		grid.jqGrid('setSelection',qrowId);
		grid.jqGrid('delGridRow',qrowId, {reloadAfterSubmit:false,
			width: 316,
			height: 204,
			top: 50,
			left: 552,
			onclickSubmit: function() {
				//console.log("submit for delete");
				$.ajax({
				  dataType: 'json',
				  url: '/contacts/delete?Id=' + recId,
				  beforeSend: function() {
					showLoader();
				  },
				  success: function(data){
					if (data.status === "SUCCESS") {
						appAlert("Запись удалена успешно!", "success");
					} else {
						//console.log(data.message);
						appAlert(data.message, "error");
					}
				  },
				  complete: function() {
					hideLoader();
				  },
				});
			}
		});
	}
}
*/
$("#gs_grid_contact_prospective_PhoneMob").inputmask("+38(099)999-9999");



$("#exportXLS").on("click", function() {
	webRequest("/contacts/export", "POST", {}, "text", true, function(d,s){appAlert(d,"success");}, function(j,t,e){appAlert(d,"error");});
});



