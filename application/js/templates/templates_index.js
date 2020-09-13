var table = $('#datatable-responsive').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/templates/getlist",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
                  text: 'Добавить',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      window.location = '/templates/add';
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
            	"data": "Name",
		        "responsivePriority": 2,
		        "width": "50%"
            },
            { 
            	"data": "ModulName",
		        "responsivePriority": 4,
		        "width": "15%"
            },
            { 
            	"data": "Active",
		        "responsivePriority": 3,
		        "width": "15%",
		        "render":function(value){
		        	if(value==1){
		        		return '<input type="checkbox" checked="checked" onclick="return false"/>';
		        	} else {
		        		return '<input type="checkbox" onclick="return false"/>';
		        	}
		        }
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
        data = '<a href="/templates/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
    }
    return data;
}


function actionLink(data, type, row, meta) {
	return "<div class='btn-group' role='group'><a href='/templates/add?Id=" +row["Id"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button id='del' class='btn btn-danger btn-xs' onClick='deleteRecord("+row["Id"]+")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
}

function deleteRecord(row) {
	if (row !== "") {
		$.confirm({
	    title: 'Удаление!',
	    content: 'Вы действительно хотите удалить эту запись?',
    	autoClose: 'cancel|8000',
	    buttons: {
	        confirm:{
	        text:'Удалить',
            btnClass: 'btn-danger',
	        action:function () {
					$.ajax({
					  dataType: 'json',
					  url: '/templates/delete?Id=' + row,
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
	        },
	        cancel:{
	        	text: 'Отмена', // With spaces and symbols
	            action: function () {
	            	
	            }
	        }
	    }
	});
	}
}




