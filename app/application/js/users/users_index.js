
var table = $('#datatable-responsive').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/users/getlist",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
                  text: 'Добавить',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      window.location = '/users/add';
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
            	"data": "Login",
		        "responsivePriority": 2,
		        "width": "25%",
		        "render": editLinkLogin,
            },
            { 
            	"data": "Role",
		        "responsivePriority": 8,
		        "width": "25%"
            },
            { 
            	"data": "LastName",
		        "responsivePriority": 6,
		        "width": "25%"
            },
            { 
            	"data": "FirstName",
		        "responsivePriority": 7,
		        "width": "25%"
            },
            { 
            	"data": "Phone",
            	"render" : phoneLink,
		        "responsivePriority": 3,
		        "width": "25%"
            },
            { 
            	"data": "Email",
            	"render" : emailLink,
		        "responsivePriority": 4,
		        "width": "25%"
            },
            { 
            	"data": "Inactive",
		        "responsivePriority": 4,
		        "width": "25%",
		        "render":function(value){
		        	if(value==1){
		        		return '<input type="checkbox" checked="checked" onclick="return false"/>';
		        	} else {
		        		return '<input type="checkbox" onclick="return false"/>';
		        	}
		        }
            },
            { 
            	"data": "BranchName",
		        "responsivePriority": 5,
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
        data = '<a href="/users/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
    }
    return data;
}


function editLinkLogin(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/users/add?Id=' + row["Id"] + '">' + row["Login"] + '</a>';
    }
    return data;
}


function actionLink(data, type, row, meta) {
	var isDisable = "";
	var isEditURL = "";
	
	if( $("#GlobalUserRole").val() == "user"){
		isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление запрещено!\"";
	}
	
	return "<div class='btn-group' role='group'><a href='/users/add?Id=" +row["Id"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button id='del' class='btn btn-danger btn-xs' " + isDisable + "  onClick='deleteRecord("+row["Id"]+")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
}

function deleteRecord(row) {
	if (row !== "") {
		$.confirm({
	    title: 'Отметить как "Не работает"',
	    content: 'Менеджер будет отмечен как неработающий и не сможет войти в систему!',
    	autoClose: 'cancel|8000',
	    buttons: {
	        confirm:{
	        text:'Удалить',
            btnClass: 'btn-danger',
	        action:function () {
					$.ajax({
					dataType: 'json',
					url: '/users/delete?Id=' + row,
					beforeSend: function() {
					showLoader();
					},
					success: function(data){
					if (data.status === "success") {
						console.log(data.message);
						appAlert("Запись успешно обновлена!", "success");
						table.ajax.reload();
					//	table.row('#'+row).remove().draw();
					} else {
						console.log(data.message);
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




function emailLink(data, type, row, meta) {
	if(row["Email"] ==="" || row["Email"] ===null){
    	return "";
    }else {
		return "<a href='mailto:" +row["Email"]+"'>"+row["Email"]+"</a>";
    }
}


function phoneLink(data, type, row, meta) {
	if(row["Phone"] ==="" || row["Phone"] ===null){
    	return "";
    }else {
		return "<a href='tel:" +row["Phone"]+"'>"+row["Phone"]+"</a>";
    }
}





