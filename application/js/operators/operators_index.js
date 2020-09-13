var table = $('#datatable-responsive').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/operators/getlist",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
                  text: 'Добавить',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      window.location = '/operators/add';
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
		        "width": "25%",
		        "render" : editLinkName
            },
            { 
            	"data": "Phone",
		        "responsivePriority": 3,
		        "width": "25%",
		         type: 'phoneNumber',
		        "render": function(value){
		        	if (value === null || value==="" ){ 
		            	return "";
		            } else {
		            	return '<a href="tel:' + value + '">' + value + '</a>';
		            }
		         },
            },
            { 
            	"data": "Email",
		        "responsivePriority": 4,
		        "width": "25%",
		        "render": function(value){
		        	if (value === null || value==="" ){ 
		            	return "";
		            } else {
		            	return '<a href="mailto:' + value + '">' + value + '</a>';
		            }
		         },
            },
            { 
            	"data": "WebSite",
		        "responsivePriority": 4,
		        "width": "25%",
		        "render": function(value){
		        	if (value === null || value==="" ){ 
		            	return "";
		            } else {
		            	return '<a href="' + value + '" target="_blank"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a>';
		            }
		         },
            },
            { 
            	"data": "Login",
		        "responsivePriority": 6,
		        "width": "25%"
            },
            { 
            	"data": "Pass",
		        "responsivePriority": 7,
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
        data = '<a href="/operators/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
    }
    return data;
}

function editLinkName(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/operators/add?Id=' + row["Id"] + '">' + row["Name"] + '</a>';
    }
    return data;
}
function actionLink(data, type, row, meta) {
	var isDisable = "";
	var isEditURL = "";
	
	if( $("#GlobalUserRole").val() == "user"){
		isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление запрещено!\"";
	}
	
	return "<div class='btn-group' role='group'><a href='/operators/add?Id=" +row["Id"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' " + isDisable + " onClick='deleteRecord(" + row["Id"] + ")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
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
					  url: '/operators/delete?Id=' + row,
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


