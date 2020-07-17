//let enabledBtn;
//
//if($("#GlobalAccId").val() !=120){
//	enabledBtn = true
//} else {
//	enabledBtn = false 
//}

	
	//Коректная сортировка таблицы
	$.fn.dataTable.moment('DD.MM.YYYY')
   
	var table = $('#datatable-responsive').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/contacts/getlist",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
                  text: 'Добавить',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      window.location = '/contacts/add';
                  }//,enabled : enabledBtn
              },
              {
              	text: 'Экспорт',
              	action: function ( e, dt, node, config ) {
					webRequest("/contacts/export", "POST", {}, "text", true, function(d,s){appAlert(d,"success");}, function(j,t,e){appAlert(d,"error");});
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
            	"data": "LastName",
		        "render": editLinkLastName,//editLastName,
		        "responsivePriority": 2,
		        "width": "25%"
            },
            //{ "data": "Description" },
            { 
            	"data": "FirstName",
		        "responsivePriority": 3,
		        "width": "25%",
		        "render":editLinkFirstName
            },
            { 
            	//"data": "PhoneMob",
		        "responsivePriority": 4,
		        "width": "25%",
		        "render":phoneLink,
		         type: 'phoneNumber'
            },
            { 
            	//"data": "EmailHome",
		        "responsivePriority": 5,
		        "width": "25%",
		       	"render":emailLink
            },
            { 
//            	"data": "DateBirthOriginal",
            	"data": "DateBirthAge",
		        "responsivePriority": 6,
		        "width": "25%"
            },
            { 
            	"data": "docLastName",
		        "responsivePriority": 7,
		        "width": "25%",
		        //"render":editable
            },
            { 
            	"data": "docFirstName",
		        "responsivePriority": 9,
		        "width": "25%",
		        //"render":editable
            },
            { 
            	"data": "docSeriaNum",
		        "responsivePriority": 10,
		        "width": "25%",
		        //"render":editable
            },
            { 
            	"responsivePriority": 11,
		        "width": "25%",
		        //"render":editable,
		        "data": "docValid",
		        
            },
            { 
            	"data": "docBiometric",
		        "responsivePriority": 12,
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
            	"data": "ManagerName",
		        "responsivePriority": 8,
		        "width": "25%",
		       // "render":editable
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
        data = '<a href="/contacts/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
    }
    return data;
}

function editLink(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/contacts/add?Id=' + row["Id"] + '">' + row["LastName"] + '</a>';
    }
    return data;
}



function editLinkLastName(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/contacts/add?Id=' + row["Id"] + '">' + row["LastName"] + '</a>';
    }
    return data;
}

function editLinkFirstName(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/contacts/add?Id=' + row["Id"] + '">' + row["FirstName"] + '</a>';
    }
    return data;
}

function emailLink(data, type, row, meta) {
	if(row["EmailHome"] ==="" || row["EmailHome"] ===null){
    	return "";
    }else {
		return "<a href='mailto:" +row["EmailHome"]+"'>"+row["EmailHome"]+"</a>";
    }
}

function phoneLink(data, type, row, meta) {
	if(row["PhoneMob"] ==="" || row["PhoneMob"] ===null){
    	return "";
    }else {
		return "<a href='tel:" +row["PhoneMob"]+"'>"+row["PhoneMob"]+"</a>";
    }
}


function actionLink(data, type, row, meta) {
	var isDisable = "";
	var isEditURL = "";
	
	if( $("#GlobalUserRole").val() == "user"){
		isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление запрещено!\"";
	}
	return "<div class='btn-group' role='group'><a href='/contacts/add?Id=" +row["Id"]+"'  target='_blank' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><a href='/tasks/add?model=Contact&modelid=" +row["Id"]+"' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Создать задачу'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' " + isDisable + " onClick='deleteRecord(" + row["Id"] + ")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
	
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
					  url: '/contacts/delete?Id=' + row,
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

//скрипт изменения заголовка и ссылки на данные
$(".contact_segment_url").on("click", function (e) {
	
	$("#x_title_name").text($(this).text());
//	table.ajax.url($(this).data('contacturl')).load().draw();
    table.ajax.url($(this).data('contacturl')).load();
   // table.ajax.reload();
});

//function editLastName(data, type, row, meta) {
//	$("#"+row["Id"]+"_LastName").editable({
//        type: 'text',//textarea,select,
//        title: 'Фамилия',
//        placement: 'right',
//        name:'LastName',
//        value: row["LastName"],
//        pk: row["Id"],
//        url: '/contacts/saveColumn'
//    });
//    
//    if(row["LastName"] ===""){
//    	return "";
//    }else {
//		return "<a href='#' id='"+row["Id"]+"_LastName'>"+row["LastName"]+"</a>";
//    }
//	
//}
//function editFirstName(data, type, row, meta) {
//	$("#"+row["Id"]+"FirstName").editable({
//        type: 'text',//textarea,select,
//        title: 'Имя',
//        placement: 'right',
//        name:'FirstName',
//        value: row["FirstName"],
//        pk: row["Id"],
//        url: '/contacts/saveColumn'
//    });
//    if(row["FirstName"] ===""){
//    	return "";
//    }else {
//		return "<a href='#' id='"+row["Id"]+"FirstName'>"+row["FirstName"]+"</a>";
//    }
//	
//}
//
//$.fn.editable.defaults.mode = 'popup';
