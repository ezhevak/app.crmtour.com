
	$.fn.dataTable.moment('DD.MM.YYYY')
	
	var table = $('#leads-responsive').DataTable( {
			language: {url: '/vendor/datatables/langs/Russian.json'},
	    	//stateSave: true, //сохранение введённой информации и страницы
	    	responsive: true, //Адаптивность таблицы
	        //ajax: "/issues/getlistdb",
	        sAjaxSource: "/contacts/getlist_leads?ContactId=" + $("#Id").val(),
	        sAjaxDataProp: "",
	        deferRender: true,
	        rowId: 'Id',
	    	dom: 'Bftlpi',
	        buttons: [
	              {
	                  text: 'Добавить запрос',
	                  className: 'btn btn-primary',
	                  action: function ( e, dt, node, config ) {
	                  	if($("#Id").val() ===""){
	                  		appAlert("Пожалуйста сохраните нового клиента!", "error");
	                  	} else {
	                      window.location = "/leads/add?ContactId="+$("#Id").val();
	                  	}
	                  }
	              }
	          ],
	        columns: [
	            { 
	            	"data": "Id",
			        "render": editLinkId,
			        "responsivePriority": 0,
			        "width": "5%"
	            },
	            { 
	            	"data": "LeadStatusName",
			        "responsivePriority": 2,
			        "width": "5%"
	            },
	            { 
	            	"data": "LeadDate",
			        "render": function(value){
			        	if (value === null){
			            	return "";
			            } else {
				            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
				            return data;
			            }
			         },
			        "responsivePriority": 3,
			        "width": "5%"
	            },
	            { 
	            	"data": "LastName",
			        //"render": editLinkId,
			        "responsivePriority": 4,
			        "width": "5%"
	            },
	            { 
	            	"data": "FirstName",
			        "responsivePriority": 5,
			        "width": "3%"
	            },
	            { 
	            	"data": "ManagerName",
			        "responsivePriority": 6,
			        "width": "10%"
	            },
	            { 
	            	"data": "LeadPriorityName",
			        "responsivePriority": 7,
			        "width": "1%"
	            },
	            { 
	            	"data": null,
			        "render":leadActionLink,
			        "responsivePriority": 1,
			        "width": "15%"
	            }
			],
        	order: [[2, 'desc']]
	    } );
	    

	  

	function editLinkId(data, type, row, meta){
		if(type === 'display'){
	        data = '<a href="/leads/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
	    }
	    return data;
	}
	

	function leadActionLink(data, type, row, meta) {
		var isDisable = "";
		var isPrint = "";
		var isEditURL = "";
		
		if( ($("#GlobalUserRole").val() == "admin" || $("#GlobalUserRole").val() == "owner") || $("#GlobalUserId").val() == row["UserId"]){
			isDisable = "";
			isPrint = "onclick=\'print( "+row["Id"]+")'";
			isEditURL = "/leads/add?Id="+row["Id"];
			
		} else {
		  isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление/редактирование запрещено!\"";
		  isPrint = "";
		  isEditURL = "#";
		}
		
		return "<div class='btn-group' role='group'><a href='"+isEditURL+"' class='btn btn-primary btn-xs' "+isDisable+"><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' " + isDisable + " onClick='delRecordLead(" + row["Id"] + ")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
	}



	function delRecordLead(row) {
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
						  url: '/leads/delete?Id=' + row,
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