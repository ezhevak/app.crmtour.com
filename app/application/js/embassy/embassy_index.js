var table = $('#datatable-responsive').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/embassy/getlist",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
                  text: 'Добавить',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      window.location = '/embassy/add';
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
            	"data": "EmbassyName",
		        "responsivePriority": 2,
		        "width": "25%"
            },
            { 
            	"data": "EmbassyPhone",
            	"render":phoneLink,
		        "responsivePriority": 4,
		        "width": "25%",
		         type: 'phoneNumber'
            },
            { 
            	"data": "EmbassyEmail",
            	"render":emailLink,
		        "responsivePriority": 3,
		        "width": "25%"
            },
            { 
            	"data": "EmbassyWebSite",
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
            	"data": null,
		        "render":actionLink,
		        "responsivePriority": 1,
		        "width": "10%"
            }
		] 
    } );


function editLinkId(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/embassy/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
    }
    return data;
}


function actionLink(data, type, row, meta) {
	var isDisable = "";
	if( $("#GlobalUserRole").val() == "user"){
		isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление запрещено!\"";
	}
	return "<div class='btn-group' role='group'><a href='/embassy/add?Id=" +row["Id"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button id='del' class='btn btn-danger btn-xs' "+isDisable+" onClick='deleteRecord("+row["Id"]+")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></div>";
}

function deleteRecord(row) {
	if (row !== "") {

		$.ajax({
		  dataType: 'json',
		  url: '/embassy/delete?Id=' + row,
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

function emailLink(data, type, row, meta) {
	if(row["EmbassyEmail"] ==="" || row["EmbassyEmail"] ===null){
    	return "";
    }else {
		return "<a href='mailto:" +row["EmbassyEmail"]+"'>"+row["EmbassyEmail"]+"</a>";
    }
}


function phoneLink(data, type, row, meta) {
	if(row["EmbassyPhone"] ==="" || row["EmbassyPhone"] ===null){
    	return "";
    }else {
		return "<a href='tel:" +row["EmbassyPhone"]+"'>"+row["EmbassyPhone"]+"</a>";
    }
}













