var grid = $("#grid_operator_deals");
grid.jqGrid({
	url: "/operators/getlist_deals?OperatorId="+$("#Id").val(),
	datatype: "json",
	//styleUI : 'jQueryUI',
	guiStyle: "bootstrap",
	//height: 406,
	//width: 1200,//$("body").innerWidth() - 50,
	width: 1200,//$("#view_div").width()-20,
	colNames:['Id','№ договора','Дата','Оплачен да/нет','Клиент','Юр. Лицо','Страна','Регион','Менеджер','Действия'],
	colModel:[ {name:'Id',index:'Id',hidden:true},{name:'DealNo',index:'DealNo', width:30, sorttype:"int", formatter: editLink},
				{name:'DealDate',index:'DealDate', width:25},
				{name:'NotPaidDeal',index:'NotPaidDeal', width:40,formatter:ceckBoxFormatter, align: 'center'},
				{name:'ContactName',index:'ContactName', width:50, formatter:contactLink},
				{name:'LegalName',index:'LegalName', width:40, formatter:legalLink},
				//{name:'DealSum',index:'DealSum', width:40, formatter:'currency', formatoptions:{decimalSeparator:",", thousandsSeparator: " ", decimalPlaces: 2/*, prefix: "$ "*/}},
				{name:'DirectionName',index:'DirectionName', width:40},
				{name:'RegionName',index:'RegionName', width:50},
				{name:'ManagerName',index:'ManagerName', width:40, formatter: gridManagerEditLink},
				{name:'Del',index:'Del', width:40, formatter: delLink, sortable: false, search: false, align: 'center'}],
	//caption: "Список контактов",
	rowNum:12,
	rowList:[10,20,30],
	pager: '#page_operator_deals',
	sortname: 'Id',
	viewrecords: true,
	sortorder: "desc",
	loadComplete: function(data) {
		//$('[data-toggle="tooltip"]').tooltip();
	}
});

grid.jqGrid('navGrid', '#page_operator_deals', { resize: false, add: false, search: false, del: false, refresh: true, edit: false});
grid.jqGrid('filterToolbar',{searchOperators : true});
grid.jqGrid('bindKeys');

function editLink(cellValue, options, rowdata, action){
	
	if( $("#GlobalUserRole").val() == "admin" || $("#GlobalUserId").val() == rowdata.UserId ){
		return "<a href='/deals/add?Id=" +rowdata.Id+"'>"+cellValue + "</a>";
	} else { 
		return cellValue;
	}
}

function contactLink(cellValue, options, rowdata, action){
	return "<a href='/contacts/add?Id=" +rowdata.ContactId+"'>"+cellValue + "</a>";
}

function legalLink(cellValue, options, rowdata, action){
	if(rowdata.LegalId !==0){
		return "<a href='/legal/add?Id=" +rowdata.LegalId+"'>"+cellValue + "</a>";
	} else {
		return "";
	}
}

function ceckBoxFormatter(cellvalue, options, rowObject){
  return '<input type="checkbox"' + (cellvalue ? ' checked="checked"' : '') + 'onclick="return false"/>';
}

function delLink(cellValue, options, rowdata, action) {
	var isDisable = "";
	var isPrint = "";
	var isEditURL = "";

	if( $("#GlobalUserRole").val() == "admin" || $("#GlobalUserId").val() == rowdata.UserId ){
		isDisable = "";
		isPrint = "onclick=\'print( "+rowdata.Id+")'";
		isEditURL = "/deals/add?Id="+rowdata.Id;
	} else {
	  isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление/редактирование запрещено!\"";
	  isPrint = "";
	  isEditURL = "#";
	}
	return "<div class='btn-group' role='group'><a href='"+isEditURL+"' class='btn btn-primary btn-xs' "+isDisable+"><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' " + isDisable + " onClick='deleteRecord(" + rowdata.Id + ", \"" + options.rowId+ "\")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
}


function deleteRecord(recId, qrowId) {
	//console.log("del:" + "recId="+recId+",rowId=" + qrowId);
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
				  url: '/deals/delete?Id=' + recId,
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

function gridManagerEditLink(cellValue, options, rowdata, action) {
	return "<a href='/users/add?Id=" +rowdata.UserId+"'>"+cellValue + "</a>";
}
