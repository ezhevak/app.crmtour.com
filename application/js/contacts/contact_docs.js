
	$.fn.dataTable.moment('DD.MM.YYYY')
	
	var table = $('#docs-responsive').DataTable( {
			language: {url: '/vendor/datatables/langs/Russian.json'},
	    	//stateSave: true, //сохранение введённой информации и страницы
	    	responsive: true, //Адаптивность таблицы
	        //ajax: "/issues/getlistdb",
	        sAjaxSource: "/contacts/getlist_ContactDoc?ContactId=" + $("#Id").val(),
	        sAjaxDataProp: "",
	        deferRender: true,
	        rowId: 'Id',
	    	dom: 'Bftlpi',
	        buttons: [
	              {
	                  text: 'Добавить документ',
	                  className: 'btn btn-primary',
	                  action: function ( e, dt, node, config ) {
	                  	if($("#Id").val() ===""){
	                  		appAlert("Пожалуйста сохраните нового клиента!", "error");
	                  	} else {
	                      window.location = "/documents/add?ContactId="+$("#Id").val();
	                  	}
	                  }
	              }
	          ],
	        columns: [
	            
	            { 
	            	"data": "DocTypeName",
			        "render": editLink,
			        "responsivePriority": 0,
			        "width": "5%"
	            },
	            { 
	            	"data": "LastName",
			        "responsivePriority": 3,
			        "width": "5%"
	            },
	            { 
	            	"data": "FirstName",
			        "responsivePriority": 4,
			        "width": "5%"
	            },
	           // { 
	           // 	"data": "RecordNo",
			   //     "responsivePriority": 5,
			   //     "width": "5%"
	           // },
	            { 
	            	"data": "SeriaNum",
			        "responsivePriority": 6,
			        "width": "5%"
	            },
	            { 
	            	"data": "IssuedDate",
			        "render": function(value){
			        	if (value === null){
			            	return "";
			            } else {
				            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
				            return data;
			            }
			         },
			        "responsivePriority": 11,
			        "width": "5%"
	            },
	            { 
	            	"data": "Valid",
			        "render": function(value){
			        	if (value === null){
			            	return "";
			            } else {
				            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
				            return data;
			            }
			         },
			        "responsivePriority": 8,
			        "width": "5%"
	            },
	            { 
	            	"data": "IssuedBy",
			        "responsivePriority": 10,
			        "width": "5%"
	            },
	            { 
	            	"data": "Biometric",
			        "render":function(value){
				        if(value===1){
				        		return '<input type="checkbox" checked="checked" onclick="return false"/>';
				        	} else {
				        		return '<input type="checkbox" onclick="return false"/>';
				        	}
				        },
			        "responsivePriority": 9,
			        "width": "5%"
	            },
	            { 
	            	"data": "LastAdd",
			        "render":function(value){
				        if(value===1){
				        		return '<input type="checkbox" checked="checked" onclick="return false"/>';
				        	} else {
				        		return '<input type="checkbox" onclick="return false"/>';
				        	}
				        },
			        "responsivePriority": 2,
			        "width": "5%"
	            },
	            { 
	            	"data": "ScanExists",
			        "render":ScanLink,
			        "responsivePriority": 9,
			        "width": "5%"
	            },
	            { 
	            	"data": null,
			        "render":actionLink,
			        "responsivePriority": 1,
			        "width": "5%"
	            }
			],
        	order: [[0, 'desc']]
	    } );




	function editLink(data, type, row, meta){
		if(type === 'display'){
	        data = '<a href="/documents/add?Id=' + row["Id"] + '">' + row["DocTypeName"] + '</a>';
	    }
	    return data;
	}
	
	function ScanLink(data, type, row, meta) {
	if (row["ScanExists"] == "1"){
			return "<a href='/uploads/getfile?ModelType=documents&ModelId="+ row["Id"]+"' target=\"_blank\"></span> <i class=\"fa fa-paperclip\"></i></a>";
		} else {
			return "";
		}
	}
	
	

	function actionLink(data, type, row, meta) {
		var isDisable = "";
		var isEditURL = "";
		
		if( ($("#GlobalUserRole").val() == "admin" || $("#GlobalUserRole").val() == "owner") || $("#GlobalUserId").val() == row["UserId"]){
			isDisable = "";
			isEditURL = "/documents/add?Id="+row["Id"];
			
		} else {
		  isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление/редактирование запрещено!\"";
		  isEditURL = "#";
		}
		return "<div class='btn-group' role='group'><a href='"+isEditURL+"' class='btn btn-primary btn-xs' "+isDisable+"><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' " + isDisable + " onClick='delRecord(" + row["Id"] + ")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
	}



	function delRecord(row) {
		//console.log(row);
		
		if (row !== "") {
			$.confirm({
		    title: 'Удаление!',
		    content: 'Вы действительно хотите удалить эту запись!?',
	    	autoClose: 'cancel|8000',
		    buttons: {
		        confirm:{
		        text:'Удалить',
	            btnClass: 'btn-danger',
		        action:function () {
						$.ajax({
						  dataType: 'json',
						  url: '/documents/delete?Id=' + row,
						  beforeSend: function() {
							showLoader();
						  },
						  success: function(data){
						  	//console.log(data);
							if (data.status === "success") {
							//	console.log(data.message);
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
	