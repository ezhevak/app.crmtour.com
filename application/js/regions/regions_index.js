//var grid = $("#grid_regions");
//grid.jqGrid({
//	url: "/regions/getlist",
//	datatype: "json",
//	//styleUI : 'jQueryUI',
//	guiStyle: "bootstrap",
//	//height: 375,
//	//width: 1200,//$("body").innerWidth() - 50,
//	width: $("#view_div").width()-20,
//	colNames:['Id','Страна', 'Регион','Оценка','Действия'],
//	colModel:[ {name:'Id',index:'Id', width:20, sorttype:"int", formatter: editLink},
//				{name:'DirectionName',index:'DirectionName', width:80},
//				{name:'RegionName',index:'RegionName', width:80},
//				{name:'RegionRatingName',index:'RegionRatingName', width:40},
//				{name:'Del',index:'Del', width:80, formatter: delLink, sortable: false, search: false, align: 'center'}],
//	//caption: "Список контактов",
//	rowNum:12,
//	rowList:[10,20,30],
//	pager: '#page_regions',
//	sortname: 'Id',
//	viewrecords: true,
//	sortorder: "desc",
//	loadComplete: function(data) {
//		//$('[data-toggle="tooltip"]').tooltip();
//	}
//});
//
//grid.jqGrid('navGrid', '#page_regions', { resize: false, add: false, search: false, del: false, refresh: true, edit: false});
//grid.jqGrid('filterToolbar',{searchOperators : true});
//grid.jqGrid('bindKeys');
////mobile_grid("grid_regions");
//doModal("srchRegion","grid_regions");
///*grid.setGridHeight(
//    $(window).height() - $("#grid_regions").position().top - 230
//);*/
//
//
//function editLink(cellValue, options, rowdata, action)
//{
//	return "<a href='/regions/add?Id=" +rowdata.Id+"'>"+cellValue + "</a>";
//}
//
//function delLink(cellValue, options, rowdata, action) {
//	var isDisable = "";
//	
//	if( $("#GlobalUserRole").val() == "admin" || $("#GlobalUserId").val() == rowdata.UserId ){
//		
//	} else {
//	  isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление/редактирование запрещено!\"";
//	}
//       //return "<div class='btn-group' role='group'><a href='/regions/add?Id=" +rowdata.Id+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></div>";
//       return "<div class='btn-group' role='group'><a href='/regions/add?Id=" +rowdata.Id+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' " + isDisable + " onClick='deleteRecord(" + rowdata.Id + ", \"" + options.rowId+ "\")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
//}
//
//
//function deleteRecord(recId, qrowId) {
//	//console.log("del:" + "recId="+recId+",rowId=" + qrowId);
//	if (recId !== "" && qrowId !== "") {
//		grid.jqGrid('setSelection',qrowId);
//		grid.jqGrid('delGridRow',qrowId, {reloadAfterSubmit:false,
//			width: 316,
//			height: 204,
//			top: 50,
//			left: 552,
//			onclickSubmit: function() {
//				//console.log("submit for delete");
//				$.ajax({
//				  dataType: 'json',
//				  url: '/regions/delete?Id=' + recId,
//				  beforeSend: function() {
//					showLoader();
//				  },
//				  success: function(data){
//					if (data.status === "SUCCESS") {
//						appAlert("Запись удалена успешно!", "success");
//					} else {
//						//console.log(data.message);
//						appAlert(data.message, "error");
//					}
//				  },
//				  complete: function() {
//					hideLoader();
//				  },
//				});
//			}
//		});
//	}
//}





var table = $('#datatable-responsive').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/regions/getlist",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
                  text: 'Добавить',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      window.location = '/regions/add';
                  }
              }
          ],
        columns: [
            { 
            	"data": "Id",
		        "render": editLinkId,
		        "responsivePriority": 0,
		        "width": "10%"
            },
            { 
            	"data": "RegionName",
            	"render" : editLinkName,
		        "responsivePriority": 3,
		        "width": "25%"
            },
            { 
            	"data": "DirectionName",
		        "responsivePriority": 3,
		        "width": "25%"
            }, 
            { 
            	"data": null,
		        "render":actionLink,
		        "responsivePriority": 1,
		        "width": "10%"
            }
		] 
    } )


function editLinkId(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/regions/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
    }
    return data;
}
function editLinkName(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/regions/add?Id=' + row["Id"] + '">' + row["RegionName"] + '</a>';
    }
    return data;
}

function actionLink(data, type, row, meta) {
	return "<div class='btn-group' role='group'><a href='/regions/add?Id=" +row["Id"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button id='del' class='btn btn-danger btn-xs' onClick='deleteRecord("+row["Id"]+")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
}

function deleteRecord(row) {
	if (row !== "") {
		$.ajax({
		  dataType: 'json',
		  url: '/regions/delete?Id=' + row,
		  beforeSend: function() {
			showLoader();
		  },
		  success: function(data){
			if (data.status === "success") {
				//console.log(data.message);
				appAlert("Запись удалена успешно!", "success");
            	table.row('#'+row).remove().draw();
			} else {
			//	console.log(data.message);
				appAlert(data.message, "error");
			}
		  },
		  complete: function() {
			hideLoader();
		  },
		});
	}
}










