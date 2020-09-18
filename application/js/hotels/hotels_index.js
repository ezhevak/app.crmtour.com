function gridUploadLink(cellValue, options, rowdata, action) {
	//console.log(rowdata);
	if (rowdata.ScanExists == "1")
		return "<a href='/uploads/getfile?ModelType=hotels&ModelId="+rowdata.Id+"' target=\"_blank\"></span> <i class=\"fa fa-map\"></i></a>";
	else
		return "";
}


var table = $('#datatable-responsive').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/hotels/getlist",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
                  text: 'Добавить',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      window.location = '/hotels/add';
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
            	"data": "HotelName",
            	"render" : editLinkName,
		        "responsivePriority": 2,
		        "width": "25%"
            },
            { 
            	"data": "DirectionName",
		        "responsivePriority": 3,
		        "width": "5%"
            },
            { 
            	"data": "RegionName",
		        "responsivePriority": 4,
		        "width": "10%"
            },
            { 
            	"data": "HotelBeachName",
		        "responsivePriority": 5,
		        "width": "10%"
            },
            { 
            	"data": "ScanExists",
            	"render" : getUploadLink,
		        "responsivePriority": 6,
		        "width": "10%"
            },
            { 
            	"data": "HotelWebSite",
		        "render": function(value){
		        	if (value === null || value==="" ){ 
		            	return "";
		            } else {
		            	return '<a href="' + value + '" target="_blank"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a>';
		            	
		            }
		         },
		        "responsivePriority": 4,
		        "width": "15%"
            },
            { 
            	"data": "DealsAmount",
		        "responsivePriority": 5,
		        "width": "10%"
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
        data = '<a href="/hotels/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
    }
    return data;
}
function editLinkName(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/hotels/add?Id=' + row["Id"] + '">' + row["HotelName"] +" " + row["HotelStarsName"]+'</a>';
    }
    return data;
}

function getUploadLink(data, type, row, meta) {
	//console.log(rowdata);
	if (row["ScanExists"] == "1")
		return "<a href='/uploads/getfile?ModelType=hotels&ModelId="+row["Id"]+"' target=\"_blank\"></span> <i class=\"fa fa-map\"></i></a>";
	else
		return "";
}

function actionLink(data, type, row, meta) {
	var isDisable = "";
	if( $("#GlobalUserRole").val() == "user"){
		isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление запрещено!\"";
	}
	return "<div class='btn-group' role='group'><a href='/hotels/add?Id=" +row["Id"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button id='del' class='btn btn-danger btn-xs' " + isDisable + " onClick='deleteRecord("+row["Id"]+")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
}

function deleteRecord(row) {
	if (row !== "") {

		$.ajax({
		  dataType: 'json',
		  url: '/hotels/delete?Id=' + row,
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















