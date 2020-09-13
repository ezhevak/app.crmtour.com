var gridManSum = $("#grid_mansum");

	gridManSum.jqGrid({
		url: "/deals/reportDeal",
		datatype: "json",
		//styleUI : 'jQueryUI',
		guiStyle: "bootstrap",
		//height: 406,
		width: 1200,//$("#view_div").width()-20,
		//Id, DealDate, DealSum, DealSumPremia, UserId, ManagerName, Commission, ManagerPremia
		colNames:['Дата договора','ФИО','Страна','Оператор','Сумма договора','Сумма счета','Доход','Сумма менеджера','№ договора','Год','Менеджер'/*,'Действия'*/],
		colModel:[ {name:'DealDate',index:'DealDate', width:30},
		           {name:'ContactFullName',index:'ContactFullName', width:50,formatter:contactLink},
		           {name:'DirectionName',index:'DirectionName', width:30},
		           {name:'OperatorName',index:'OperatorName', width:30},
		           {name:'DealSum',index:'DealSum', width:20},
		           {name:'OperatorInvoceSum',index:'OperatorInvoceSum', width:20},
				   {name:'DealSumPremia',index:'DealSumPremia', width:20, align: 'center', formatter:'number',summaryType:'sum',summaryRound:2,summaryRoundType:"fixed"},
				   {name:'ManagerPremia',index:'ManagerPremia', width:20,formatter:'number',summaryType:'sum',summaryRound:2,summaryRoundType:"fixed"},
		           {name:'DealNo',index:'DealNo', width:20, sorttype:"int",formatter:dealLink},
				   {name:'YearMonth',index:'YearMonth', width:20},
				   {name:'ManagerName',index:'ManagerName', width:30}
				  ],
		//caption: "Список контактов",
		//rowNum:14,
		//rowList:[10,20,30],
		//pager: '#page_deals',
		sortname: 'Id',
		viewrecords: true,
		sortorder: "desc",
		loadComplete: function(data) {
			//$('[data-toggle="tooltip"]').tooltip();
		},
		grouping: true,
		groupingView: {
		   groupField: ["ManagerName","YearMonth"],
		   groupColumnShow: [true,true],
		   groupText: ["<b>{0}, кол-во сделок: {1}, на сумму: {DealSumPremia} грн., премия: {ManagerPremia} грн.</b>","<b>{0}, кол-во сделок: {1}, Сумма: {DealSumPremia} грн., премия: {ManagerPremia} грн.</b>"],
		   groupOrder: ["asc","desc"],
		   groupSummary: [true,true],
		   groupCollapse: true
		}
	});

//gridManSum.jqGrid('navGrid', '#page_deals', { resize: false, add: false, search: false, del: false, refresh: true, edit: false});
//grid.jqGrid('filterToolbar',{searchOperators : true});
//gridManSum.jqGrid('bindKeys');
//mobile_grid("grid_mansum");


var gridManSumByPay = $("#grid_ManSumByPay");

	gridManSumByPay.jqGrid({
		url: "/deals/reportDealByPay",
		datatype: "json",
		//styleUI : 'jQueryUI',
		guiStyle: "bootstrap",
		//height: 406,
		width: 1200,//$("#view_div").width()-20,
		//Id, DealDate, DealSum, DealSumPremia, UserId, ManagerName, Commission, ManagerPremia
		colNames:['Дата договора','ФИО','Страна','Оператор','Сумма договора','Сумма счета','Доход','Сумма менеджера','№ договора','Период','Менеджер'/*,'Действия'*/],
		colModel:[ {name:'DealDate',index:'DealDate', width:30},
		           {name:'ContactFullName',index:'ContactFullName', width:50,formatter:contactLink},
		           {name:'DirectionName',index:'DirectionName', width:30},
		           {name:'OperatorName',index:'OperatorName', width:30},
		           {name:'DealSum',index:'DealSum', width:20},
		           {name:'OperatorInvoceSum',index:'OperatorInvoceSum', width:20},
				   {name:'DealSumPremia',index:'DealSumPremia', width:20, align: 'center', formatter:'number',summaryType:'sum',summaryRound:2,summaryRoundType:"fixed"},
				   {name:'ManagerPremia',index:'ManagerPremia', width:20,formatter:'number',summaryType:'sum',summaryRound:2,summaryRoundType:"fixed"},
		           {name:'DealNo',index:'DealNo', width:20, sorttype:"int",formatter:dealLink},
				   {name:'YearMonth',index:'YearMonth', width:20},
				   {name:'ManagerName',index:'ManagerName', width:30}
				
					],
		//caption: "Список контактов",
		//rowNum:14,
		//rowList:[10,20,30],
		//pager: '#page_deals',
		sortname: 'Id',
		viewrecords: true,
		sortorder: "desc",
		loadComplete: function(data) {
			//$('[data-toggle="tooltip"]').tooltip();
		},
		grouping: true,
		groupingView: {
		   groupField: ["ManagerName","YearMonth"],
		   groupColumnShow: [true,true],
		   groupText: ["<b>{0}, кол-во сделок: {1}, на сумму: {DealSumPremia} грн., премия: {ManagerPremia} грн.</b>","<b>{0}, кол-во сделок: {1}, Сумма: {DealSumPremia} грн., премия: {ManagerPremia} грн.</b>"],
		   groupOrder: ["asc","desc"],
		   groupSummary: [true,true],
		   groupCollapse: true
		}
	});





function dealLink(cellValue, options, rowdata, action){
	return "<a href='/deals/add?Id=" +rowdata.Id+"'>"+cellValue + "</a>";
}
function contactLink(cellValue, options, rowdata, action){
	return "<a href='/contacts/add?Id=" +rowdata.ContactId+"'>"+cellValue + "</a>";
}