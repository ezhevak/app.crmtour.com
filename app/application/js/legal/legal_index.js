//let enabledBtn;
//
//if($("#GlobalAccId").val() !=120){
//	enabledBtn = true
//} else {
//	enabledBtn = false 
//}



//Коректная сортировка таблицы
$.fn.dataTable.moment('DD.MM.YYYY')

var table = $('#datatable-responsive-legals').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/legal/getlist",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
                  text: 'Добавить',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      window.location = '/legal/add';
                  }//,enabled : enabledBtn
              },
              {
              	text: 'Экспорт',
              	action: function ( e, dt, node, config ) {
					webRequest("/legal/export", "POST", {}, "text", true, function(d,s){appAlert(d,"success");}, function(j,t,e){appAlert(d,"error");});
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
            	"data": "LegalName",
		        "render": editLinkName,
		        "responsivePriority": 2,
		        "width": "25%"
            },
            { 
            	"data": "SignerFIO",
		        "responsivePriority": 7,
		        "width": "25%"
            },
            { 
            	"data": "LegalCode",
		        "responsivePriority": 6,
		        "width": "25%"
            },
            { 
            	"data": "LegalDealEnd",
		        "render": function(value){
		        	
		            if (value === null || value === '0000-00-00' ){
		            	return "";
		            } else {
		            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
		            	return data;
		            }
		         },
		        "responsivePriority": 5,
		        "width": "15%"
            }, 
            { 
            	"data": "LegalOfficePhone",
            	"render":phoneLink,
		        "responsivePriority": 4,
		        "width": "25%"
            },
            { 
            	"data": "LegalOfficeEmail",
            	"render":emailLink,
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
    } );
    
 
function editLinkId(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/legal/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
    }
    return data;
}

function editLinkName(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/legal/add?Id=' + row["Id"] + '">' + row["LegalName"] + '</a>';
    }
    return data;

}



function actionLink(data, type, row, meta) {
	return "<div class='btn-group' role='group'><a href='/legal/add?Id=" +row["Id"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><a href='/tasks/add?model=Legal&modelid=" +row["Id"]+"' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Создать задачу'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span></a><button id='del' class='btn btn-danger btn-xs' onClick='deleteRecord("+row["Id"]+")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
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
					  url: '/legal/delete?Id=' + row,
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

function emailLink(data, type, row, meta) {
	if(row["LegalOfficeEmail"] ==="" || row["LegalOfficeEmail"] ===null){
    	return "";
    }else {
		return "<a href='mailto:" +row["LegalOfficeEmail"]+"'>"+row["LegalOfficeEmail"]+"</a>";
    }
}


function phoneLink(data, type, row, meta) {
	if(row["LegalOfficePhone"] ==="" || row["LegalOfficePhone"] ===null){
    	return "";
    }else {
		return "<a href='tel:" +row["LegalOfficePhone"]+"'>"+row["LegalOfficePhone"]+"</a>";
    }
}
	
	
