var grid = $("#grid_lov");
grid.jqGrid({
	url: "/dictionary/getDictionaries",
	datatype: "json",
	//styleUI : 'jQueryUI',
	guiStyle: "bootstrap",
	//height: $("footer").position.top,
	width: $("#view_div").width()-20,//$("body").innerWidth() - 50,
	colNames:['id','Тип', 'Подтип', 'Значение', 'Язык', 'Код значения','Порядок сортировки','Активно'],
	colModel:[ {name:'id',index:'id', width:40, sorttype:"int",editable:false},
						{name:'Type',index:'Type', width:60,editable:true},
						{name:'SubType',index:'SubType', width:80,editable:true},
						{name:'Name',index:'Name', width:80,editable:true,editoptions:{size:50}}, 
						{name:'Lang',index:'Lang', width:80,editable:true,editoptions:{defaultValue:"ru_RU"}},
						{name:'LIC',index:'LIC', width:100,editable:true},
						{name:'OrderBy',index:'OrderBy', width:80,editable:true,editoptions:{defaultValue:0},editrules:{number:true}},
						{name:'Active',index:'Active', width:80,editable:true,align:'center',edittype: "checkbox", 
							editoptions: { value: "Y:N",defaultValue:"Y"},formatter: "checkbox",
							stype: "select", searchoptions: { sopt: ["eq", "ne"], value: ":Все;Y:Активные;N:Отключены" }}],
	//caption: "Список значений",
	rowNum:14,
	rowList:[10,20,30],
	pager: '#page_lov',
	sortname: 'Type',
	viewrecords: true,
	sortorder: "asc",
	editurl:"/dictionary/getDictionaries",
	closeAfterAdd : true,   
    closeAfterEdit : true
});

grid.jqGrid('navGrid', '#page_lov', { resize: false, add: false, search: false, del: false, refresh: true, edit: false});
grid.jqGrid('filterToolbar',{searchOperators : true});
grid.jqGrid('bindKeys');
//mobile_grid("grid_lov");
/*grid.setGridHeight(
    $(window).height() - $("#grid_lov").position().top - 250
);*/

$("#editrow").on("click", function(e) {
	e.preventDefault();
	var gr = grid.jqGrid('getGridParam','selrow');
	if( gr != null ) {
		grid.jqGrid('editGridRow',gr,{
			height:200, 
			width:400,
			reloadAfterSubmit:false,
			closeAfterAdd:true,
			closeAfterEdit:true,
			afterSubmit: function(response, postdata) { 
		    	if (response.status == 200) {
					return true;
				} else 
					return false;
			}
		});
		//$("#editmodgrid_lov").css("width", "400px");
		$("#editmodgrid_lov").css("left", $("body").innerWidth() / 2 - 200);
		$("#editmodgrid_lov").css("top", 80);
	} else 
		bootbox.alert({
        	message: "Необходимо выбрать запись!",
        	backdrop: true
    	});
});

$("#addrow").on("click", function(e) {
	e.preventDefault();
	//var gr = grid.jqGrid('getGridParam','selrow');
	//if( gr != null ) {
		grid.jqGrid('editGridRow',"new",{
			height:200, 
			width:400,
			reloadAfterSubmit:true,
			closeAfterAdd:true,
			closeAfterEdit:true,
			afterSubmit: function(response, postdata) { 
		    	if (response.status == 200) {
					return true;
				} else 
					return false;
			}
		});
		//$("#editmodgrid_lov").css("width", "400px");
		$("#editmodgrid_lov").css("left", $("body").innerWidth() / 2 - 200);
		$("#editmodgrid_lov").css("top", 80);
	//} else 
	//	alert("Please Select Row");
});