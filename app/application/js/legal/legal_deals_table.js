//Коректная сортировка таблицы
   $.fn.dataTable.moment('DD.MM.YYYY')
    
	var table = $('#legals-responsive').DataTable( { 
    	language: {
				url: '/vendor/datatables/langs/Russian.json'
			},
    	//stateSave: true, //сохранение введённой информации и страницы
    	colReorder: true, //Сохранение сортировки
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/legal/deals_getlist?LegalId=" + $("#Id").val(),
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
              	  text: 'Добавить',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                  	if($("#Id").val() ===""){
                  		appAlert("Пожалуйста сохраните нового клиента!", "error");
                  	} else {
                        window.location = '/deals/add?LegalId='+$("#Id").val();
                  	}
                  }//,enabled : enabledBtn
              }
          ],
        columns: [
            { 
            	"data": "Id",
		        "render": function editLinkLastName(data, type, row, meta){
							if(type === 'display'){
						        if(row["Id"] !== null){
						        	data = '<a href="/deals/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
						        }
						    }
						    return data;
						},
		        "responsivePriority": 0,
		        "width": "10%"
            },
            { 
            	"data": "DealNo",
		        //"render":editLastName,
		        "responsivePriority": 3,
		        "width": "10%"
            },
            { 
            	"data": "DealDate",
            	"render": function(value){
            		//console.log(value);
		           if (value === null) return "";
		            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
		            return data;
		         },
		        "responsivePriority": 2,
		        "width": "15%"
            },
            { 
            	"data": "OperatorInvoceNum",
		        "responsivePriority": 11,
		        "width": "5%"
            },
            { 
            	"data": "OperatorName",
            	render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        data =  '<a href="/operators/add?Id=' + row["OperatorId"] + '" target="_blank">' + row["OperatorName"] + '</a>';
                    }
                    return data;
                },
		        "responsivePriority": 12,
		        "width": "3%"
            },
            { 
            	"data": "DirectionName",
		        "responsivePriority": 4,
		        "width": "10%"
            },
            { 
            	"data": null,
            	render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                    	//console.log(row);
                        if(parseInt(row["PaySum"]) >= parseInt(row["DealSumFact"])){
                        	return '<input type="checkbox" checked class="editor-active" onclick="return false;">';
                        } else {
                        	return '<input type="checkbox" class="editor-active" onclick="return false;">';
                        } 
                    }
                    return data;
                },
		        "responsivePriority": 8,
		        "width": "1%"
            },
            { 
            	"data": "DealSum",
		        "responsivePriority": 9,
		        "width": "1%"
            },
            { 
            	"data": "PaySum",
		        "responsivePriority": 10,
		        "width": "1%"
            },
            { 
            	"data": "DateArrival",
		        "render": function(value){
		        	//console.log(value)
		            if (value === null || value === "0000-00-00") return "";
		            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
		            return data;
		         },
		        "responsivePriority": 3,
		        "width": "3%"
            },
            { 
            	"data": "ManagerName",
		        "responsivePriority": 3,
		        "width": "5%"
            },
            { 
            	"data": null,
		        "render":actionLink,
		        "responsivePriority": 1,
		        "width": "10%"
            }
		],
        order: [[3, 'desc']]
    } )
    
    
    
function actionLink(data, type, row, meta) {
	var isDisable = "";
	var isPrint = "";
	var isEditURL = "";
	
	if( ($("#GlobalUserRole").val() == "admin" || $("#GlobalUserRole").val() == "owner") || $("#GlobalUserId").val() == row["UserId"]){
		isDisable = "";
		isPrint = "onclick=\'print( "+row["Id"]+")'";
		isEditURL = "/deals/add?Id="+row["Id"];
		
	} else {
	  isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление/редактирование запрещено!\"";
	  isPrint = "";
	  isEditURL = "#";
	}
	return "<div class='btn-group' role='group'><a href='"+isEditURL+"' class='btn btn-primary btn-xs' "+isDisable+"><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><a href='#' "+isPrint+" class='btn btn-primary btn-xs' "+isDisable+"><span class='glyphicon glyphicon-print' aria-hidden='true'></span></a><a href='/deals/dealpayments?dealid=" +row["Id"]+"' target='_blank' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Просмотреть платежи по сделке "+row["DealNo"]+"'><span class='glyphicon glyphicon-usd' aria-hidden='true'></span></a><a href='/tasks/add?model=Deal&modelid=" +row["Id"]+"' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Создать задачу'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' " + isDisable + " onClick='delRecord(" + row["Id"] + ")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";

	
}


function delRecord(row) {
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
					  url: '/deals/delete?Id=' + row,
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
    
    
    
    