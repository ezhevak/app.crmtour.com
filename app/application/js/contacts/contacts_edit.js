$(document).ready(function() {
	
	if( $("#Id").val() >0){
		//console.log("1");
		document.title = "CRM Tour - " + $("#contFirstName").val() + " " + $("#contLastName").val();
	}
		
	$('#contDateBirth').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});
	
	$('#passIssuedDate').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});
	
	$('#passValidDate').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});
	
	$("#PhoneMob").inputmask("+39(999)999-9999");
	$("#PhoneHome").inputmask("+39(999)999-9999");
	
	$("#contDateBirth").inputmask("dd.mm.yyyy");
	$("#passIssuedDate").inputmask("dd.mm.yyyy");
	$("#passValidDate").inputmask("dd.mm.yyyy");


//Исправляем ошибки адаптивности datatables
//https://github.com/ColorlibHQ/AdminLTE/issues/1295
    $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
        $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
    } );
    
    getLinkedContacts();
    getLinkedLegals();
    
	$( "#linkedContacts" ).on( "click", function() {
		if($('#Id').val() ==="0" || ifnull($('#Id').val(),"") ===""){
			appAlert("Для добавления связанных физ. лиц вы должны сохранить клиента!", "warning","Внимание!");
			return false;
		} else {
			getLinkedContactsList();
		}
	});
		
	
	$( "#linkedLegals" ).on( "click", function() {
		if($('#Id').val() ==="0" || ifnull($('#Id').val(),"") ===""){
			appAlert("Для добавления связанных юр. лиц вы должны сохранить клиента!", "warning","Внимание!");
			return false;
		} else {
			getLinkedLegalsList();
		}
	});
    
    $("#linkedContactSave").on("click",function() {	
		setLinkedContacts();
	});
    
    $("#linkedLegalSave").on("click",function() {	
		setLinkedLegals();
	});
	
    $("#getPhonesBtn1").on("click",function() {	
		getContactPhones();
	});
	
    $("#getPhonesBtn2").on("click",function() {	
		getContactPhones();
	});
	
    $("#getEmailsBtn").on("click",function() {	
		getContactEmails();
	});
	
	
		
	$('#Sex').select2({
    	theme: "bootstrap",
		placeholder: 'Укажите пол клиента',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=Sex',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});

});
		


/////////////////////////////Contact Deals Grid/////////////////////////////


function print(dealId) {
	//alert("PRINT " + dealId);
	$("#printDealId").val(dealId);
	selectFirstTemplate();
	//console.log("print" + dealId);
	$("#mwPrintTemplate").modal();
}

function selectFirstTemplate() {
	var ids = gridTemplates.jqGrid("getDataIDs");
	if(ids && ids.length > 0)
		gridTemplates.jqGrid("setSelection", ids[0]);
}



/// print templates
var gridTemplates = $("#grid_printtemplates");
gridTemplates.jqGrid({
	url: "/deals/getTemplates",
	datatype: "json",
	//styleUI : 'jQueryUI',
	guiStyle: "bootstrap",
	height: 200,
	width: 560,
	colNames:['Id','Шаблон'],
	colModel:[ {name:'tmplId',index:'tmplId', width:30, sorttype:"int"},
				{name:'tmplName',index:'tmplName'}],
	rowNum:10,
	rowList:[10,20,30],
	sortname: 'Id',
	viewrecords: true,
	sortorder: "desc",
	loadComplete: function(data) {
		//$('[data-toggle="tooltip"]').tooltip();
		//var ids = gridTemplates.jqGrid("getDataIDs");
		//if(ids && ids.length > 0)
		//    gridTemplates.jqGrid("setSelection", ids[0]);
		//console.log(data);
	},
	onSelectRow: function (id) {
		var rowData = gridTemplates.jqGrid ('getRowData', id);
    	$("#printLink").attr("href", "/deals/print?Id=" + $("#printDealId").val() + "&TemplateId=" + rowData.tmplId).attr('target','_blank');
    	//console.log("selectRow");
	}
});

gridTemplates.jqGrid('bindKeys');
//mobile_grid("grid_printtemplates");

$("#uploadFileForm").on("submit",function() {

    var formData = new FormData($(this)[0]);

    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
            
            $("#linkFileUpload > div > img").attr('src', "/uploads/getfile?ModelType=contactPhoto&ModelId="+$("#Id").val());
            //$("#linkFileUpload > img").attr('src', "/contacts/getphoto?Id="+$("#Id").val());
            $('#mwUploadFile').modal('hide');
            $('#delphotolink').show();
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
});

$("#uploadLink").on("click", function() {
	$("form#uploadFileForm").submit();
});

$("#delphotolink").on("click", function() {
    $.ajax({
        //url: "/contacts/delphoto?Id=" + $("#Id").val(),
        url: "/uploads/delete?ModelType=contactPhoto&ModelId=" + $("#Id").val(),
        type: 'GET',
        data: null,
        async: false,
        success: function (data) {
        	$("#linkFileUpload > div > img").attr('src',"/css/no_photo.jpeg");
        	$('#delphotolink').hide();
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;	
});


////////////////////////////////////////
	$.fn.dataTable.moment('DD.MM.YYYY')
	
	var deals = $('#deals-responsive').DataTable( {
			language: {url: '/vendor/datatables/langs/Russian.json'},
	    	//stateSave: true, //сохранение введённой информации и страницы
	    	responsive: true, //Адаптивность таблицы
	        //ajax: "/issues/getlistdb",
	        sAjaxSource: "/contacts/getlist_ContactDeals?ContactId=" + $("#Id").val(),
	        sAjaxDataProp: "",
	        deferRender: true,
	        rowId: 'Id',
	    	dom: 'Bftlpi',
	        buttons: [
	              {
	                  text: 'Добавить сделку',
	                  className: 'btn btn-primary',
	                  action: function ( e, dt, node, config ) {
	                    if($("#Id").val() ===""){
	                  		appAlert("Пожалуйста сохраните нового клиента!", "error","Ошибка!");
	                  	} else {
	                  		window.location = "/deals/add?ContactId="+$("#Id").val();
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
	            	"data": "DealNo",
			        "render": editLinkDealNo,
			        "responsivePriority": 0,
			        "width": "5%"
	            },
	            { 
	            	"data": "ParticipantType",
			        "responsivePriority": 5,
			        "width": "5%"
	            },/*
	            { 
	            	"data": "ContactName",
	            	 render: function ( data, type, row ) {
	                    if ( type === 'display' ) {
	                        	data =  '<a href="/contacts/add?Id=' + row["ContactId"] + '">' + row["ContactName"] + '</a>';
	                    }
	                    return data;
	                },
			        "responsivePriority": 5,
			        "width": "5%"
	            },*/
	            { 
	            	"data": "DealDateOriginal",
			        "render": function(value){
			        	//console.log(value);
			            if (value === null){
			            	return "";
			            } else {
				            data =  moment(value, 'DD.MM.YYYY').format('DD.MM.YYYY');
				            return data;
			            }
			         },
			        "responsivePriority": 6,
			        "width": "5%"
	            },
	            { 
	            	"data": "OperatorInvoceNum",
			        //"render": editLinkId,
			        "responsivePriority": 11,
			        "width": "5%"
	            },
	            { 
	            	"data": "OperatorName",
	            	 render: function ( data, type, row ) {
	                    if ( type === 'display' ) {
	                        if(row["OperatorId"] !=0){
	                        	data =  '<a href="/operators/add?Id=' + row["OperatorId"] + '">' + row["OperatorName"] + '</a>';
	                        }
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
	            	"data": "NotPaidDeal",
	            	 render: function ( data, type, row ) {
	                    if ( type === 'display' ) {
	                    	//console.log(row);
	                        if((parseInt(row["PaySum"]) >= parseInt(row["DealSumFact"])) && (parseInt(row["PaySum"]) !="0"  && parseInt(row["DealSumFact"]) !="0" )){
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
	            	"data": "DateArrivalOriginal",
			        "render": function(value){
			        	//console.log(value)
			            if (value === null || value === "0000-00-00") return "";
			            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
			            return data;
			         },
			        "responsivePriority": 2,
			        "width": "3%"
	            },
	            { 
	            	"data": "RegionName",
			        "responsivePriority": 14,
			        "width": "3%"
	            },
	            { 
	            	"data": "HotelName",
	            	 render: function ( data, type, row ) {
	                    if ( type === 'display' ) {
	                    	if(row["HotelId"] !=0){
	                    		data =  '<a href="/hotels/add?Id=' + row["HotelId"] + '">' + row["HotelName"] + '</a>';
	                    	} else {
	                    		data = "";
	                    	}
	                    }
	                    return data;
	                },
			        "responsivePriority": 15,
			        "width": "3%"
	            },
	            { 
	            	"data": "ManagerName",
			        "responsivePriority": 3,
			        "width": "5%"
	            },
	            { 
	            	"data": null,
			        "render":dealActionLink,
			        "responsivePriority": 1,
			        "width": "15%"
	            }
			],
        	order: [[3, 'desc']]
	    } );
	    

	  

	function editLinkId(data, type, row, meta){
		if(type === 'display'){
	        data = '<a href="/deals/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
	    }
	    return data;
	}
	
	function editLinkDealNo(data, type, row, meta){
		if(type === 'display'){
	        data = '<a href="/deals/add?Id=' + row["Id"] + '">' + row["DealNo"] + '</a>';
	    }
	    return data;
	}
	
	
	function PaidDealLink(data, type, row, meta){
		if(type === 'display'){
	        data = '<a href="/deals/add?Id=' + row["Id"] + '">' + row["DealNo"] + '</a>';
	    }
	    return data;
	}
	
	
	function dealActionLink(data, type, row, meta) {
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
		return "<div class='btn-group' role='group'><a href='"+isEditURL+"' class='btn btn-primary btn-xs' "+isDisable+"><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><a href='#' "+isPrint+" class='btn btn-primary btn-xs' "+isDisable+"><span class='glyphicon glyphicon-print' aria-hidden='true'></span></a><a href='/deals/dealpayments?dealid=" +row["Id"]+"' target='_blank' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Просмотреть платежи по сделке "+row["DealNo"]+"'><span class='glyphicon glyphicon-usd' aria-hidden='true'></span></a><a href='/tasks/add?model=Deal&modelid=" +row["Id"]+"' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Создать задачу'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' " + isDisable + " onClick='delRecordDeal(" + row["Id"] + ")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
	}



	function delRecordDeal(row) {
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
								appAlert("Запись удалена успешно!", "success","Успех!");
				            	deals.row('#'+row).remove().draw();
							} else {
							//	console.log(data.message);
								appAlert(data.message, "error","Ошибка!");
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
	
	//Вызываем получение информации по связанным запросам
	getLinkedTasks();
	
	
	
	function getLinkedTasks(){
		var Id = $("#Id").val();
		
		if(Id !=="" && Id !==null && Id !=="0"){
			var msg = {ModelType:"Contact",ModelId:Id}
			$.when($.ajax({
				type: 'POST',
				url: "/tasks/getLinkedTasks",
				data: msg,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					console.log("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:true
			})).done(function(res) {
				
			
				$.each(res, function( index, value ) {
					let status = ""
					if(res[index].Done ==="1") { status = "Выполнено" } else { status = "Не выполнено"}
					//console.log(res[index])
				  $("#x_content_linked_tasks").append("<div class='text-muted well well-sm no-shadow' id='Task" + res[index].Id + "'>"+
				  "Заголовок: <a href='/tasks/add?Id="+ res[index].Id + "' target='_blank'>" + res[index].Title + "</a>"+
				  "<br>Задача: "+res[index].Task +
				  "<br>Дата начала: "+res[index].Start +
				  "<br>Дата окончания: "+res[index].End +
				  "<br>Статус: "+ status +
				  "<br><div class='btn-group' role='group'><a href='/tasks/add?Id=" + res[index].Id + "' target='_blank' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' onclick='deleteTask(" + res[index].Id + ")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>" +
				  "</div>");
				});
				
				
			});
			
		}
	}
	
	function deleteTask(TaskId){
		if(TaskId !=="" && TaskId !==null && TaskId !=="0"){
			$.when($.ajax({
				type: 'POST',
				url: "/tasks/delete?Id="+TaskId,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					console.log("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:true
			})).done(function(res) {
				//console.log(res)
				if (res.status == "success") {
					console.log("Таск успешно удалён" )
					$( "#Task"+TaskId ).remove();
				} else {
					console.log("Ошибка при удалении таска." )
				}
			});
			
		}
	}
	
	
	//Получаем список связанных со сделкой файлов
	function getLinkedContacts(){
		var ContactId = $("#Id").val();
		
		if(ContactId !=="" && ContactId !==null && ContactId !=="0"){
			var msg = {ContactId:ContactId}
			$.when($.ajax({
				type: 'POST',
				url: "/contacts/getLinkedContacts",
				data: msg,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					console.log("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:true
			})).done(function(res) {
				//Очищаем список документов
				$("#linkedContactsList").empty();
				//формируем новый список документов
				$.each(res, function( index, value ) {
					let LinkType = "";
					if (res[index].LinkType){
						LinkType = " - " + ifnull(res[index].LinkType,"");
					}
					
					$("#linkedContactsList").append("<li id='linkedContact" + res[index].Id + "' class='list-group-item'>"+
					"<a href='#' <span  class='glyphicon glyphicon-trash' aria-hidden='true' onClick='deleteLinkedContactById(" + res[index].Id + ")'></span></a>"+ //onClick='deleteFileById(" + res[index].Id + ")'
					" | "+
					"<a href='/contacts/add?Id="+res[index].ParrContactId+"' target='_blank'>"+
					ifnull(res[index].LastName,"") + " " +
					ifnull(res[index].FirstName,"")+ " " +
					ifnull(res[index].MiddleName,"") +"</a> " + 
					ifDateNull(res[index].DateBirth,"")+ " " + LinkType +
					"</li>");
				});
				
			});
		}
	}
	
	function deleteLinkedContactById(Id) {
		if (Id !== "") {
			$.confirm({
				title: 'Удаление!',
				content: 'Вы действительно хотите удалить связь с этим физ. лицом?',
				autoClose: 'cancel|8000',
				buttons: {
					confirm:{
					text:'Удалить',
					btnClass: 'btn-danger',
					action:function () {
							$.ajax({
							  dataType: 'json',
							  url: '/contacts/deleteLinkedContactById?Id=' + Id,
							  beforeSend: function() {
								showLoader();
							  },
							  success: function(data){
								if (data.status === "success") {
									//$(this).parent().remove();
									appAlert("Запись удалена успешно!", "success","Успех!");
									$( "#linkedContact"+Id ).remove();
									//table.row('#'+row).remove().draw();
								} else {
								//	console.log(data.message);
									appAlert(data.message, "error","Ошибка!");
								}
							  },
							  complete: function() {
								hideLoader();
							  }
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
	
	function getLinkedContactsList(){
		  //console.log( $( this ).text() );
		$('#LinkedParrContactId').select2({
			placeholder: 'Введите ФИО',
			multiple: false,
			ajax: {
			  url: '/contacts/getLinkedContactsListItems?ContactId='+$("#LinkedContactId").val(),
			  dataType: 'json',
			  delay: 250,
			  processResults: function (data) {
			  	//console.log(data);
			    return {
			      results: data
			    };
			  },
			  cache: true,
			}
		});
	}
	

	
	
	function setLinkedContacts(){
		
		var msg = {
				LinkedContactId:$("#LinkedContactId").val(),
				LinkedParrContactId:$("#LinkedParrContactId").val(),
				LinkedComments:$("#LinkedComments").val()
			}
		
		//if(ContactId !=="" && ContactId !==null && ContactId !=="0"){
			//var msg = {ContactId:ContactId}
			$.when($.ajax({
				type: 'POST',
				url: "/contacts/setLinkedContact",
				data: msg,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					console.log("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:true
			})).done(function(res) {
				//console.log(res);
				if (res.status === "success") {
					//appAlert(data.message, "success");
					$('#mwlinkedContacts').modal('hide');
					$("#LinkedParrContactId").val("");
					$("#LinkedComments").val("");
					
        			getLinkedContacts();
					
				} else {
				//	console.log(data.message);
					appAlert(data.message, "error","Ошибка!");
				}
				
			});
		//}
	}
	
	//Получаем список связанных со сделкой файлов
	function getLinkedLegals(){
		var ContactId = $("#Id").val();
		
		if(ifnull(ContactId,"") !==""){
			var msg = {ContactId:ContactId}
			$.when($.ajax({
				type: 'POST',
				url: "/contacts/getLinkedLegals",
				data: msg,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					console.log("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:true
			})).done(function(res) {
				//Очищаем список документов
				$("#linkedLegalsList").empty();
				//формируем новый список документов
				$.each(res, function( index, value ) {
					let LinkType = "";
					if (res[index].LinkType){
						LinkType = " - " + ifnull(res[index].LinkType,"");
					}
					
					$("#linkedLegalsList").append("<li id='linkedLegal" + res[index].Id + "' class='list-group-item'>"+
					"<a href='#' <span  class='glyphicon glyphicon-trash' aria-hidden='true' onClick='deleteLinkedLegalById(" + res[index].Id + ")'></span></a>"+ //onClick='deleteFileById(" + res[index].Id + ")'
					" | "+
					"<a href='/legal/add?Id="+res[index].LegalId+"' target='_blank'>"+
					ifnull(res[index].LegalName,"") + "</a>  " +
					ifnull(res[index].LegalCode,"") + LinkType +
					"</li>");
				});
				
			});
		}
	}
	
	
	function deleteLinkedLegalById(Id) {
		if (ifnull(Id,"") !== "") {
			$.confirm({
				title: 'Удаление!',
				content: 'Вы действительно хотите удалить связь с этим юр. лицом?',
				autoClose: 'cancel|8000',
				buttons: {
					confirm:{
					text:'Удалить',
					btnClass: 'btn-danger',
					action:function () {
							$.ajax({
							  dataType: 'json',
							  url: '/contacts/deleteLinkedLegalById?Id=' + Id,
							  beforeSend: function() {
								showLoader();
							  },
							  success: function(data){
							  	if (data.status === "success") {
									appAlert("Запись удалена успешно!", "success","Успех!");
									$("#linkedLegal"+Id ).remove();
									//table.row('#'+row).remove().draw();
								} else {
								
									appAlert(data.message, "error","Ошибка!");
								}
							  },
							  complete: function() {
								hideLoader();
							  }
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
	
	function getLinkedLegalsList(){
		  //console.log( $( this ).text() );
		$('#LinkedLegalId').select2({
			placeholder: 'Введите название компании',
			multiple: false,
			ajax: {
			  url: '/contacts/getLinkedLegalsListItems?ContactId='+$("#LinkedContactId").val(),
			  dataType: 'json',
			  delay: 250,
			  processResults: function (data) {
			  	//console.log(data);
			    return {
			      results: data
			    };
			  },
			  cache: true,
			}
		});
	}
		
	function setLinkedLegals(){
		
		var msg = {
				LinkedContactId:$("#LinkedLegalContactId").val(),
				LinkedLegalId:$("#LinkedLegalId").val(),
				LinkedComments:$("#LinkedLegalComments").val()
			}
		
		//if(ContactId !=="" && ContactId !==null && ContactId !=="0"){
			//var msg = {ContactId:ContactId}
			$.when($.ajax({
				type: 'POST',
				url: "/contacts/setLinkedLegal",
				data: msg,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					console.log("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:true
			})).done(function(res) {
				//console.log(res);
				if (res.status === "success") {
					//appAlert(data.message, "success");
					$('#mwlinkedLegals').modal('hide');
					$("#LinkedLegalId").val("");
					$("#LinkedLegalComments").val("");
					
        			getLinkedLegals();
					
				} else {
				//	console.log(data.message);
					appAlert(data.message, "error","Ошибка!");
				}
				
			});
		//}
	}

	
	//Получаем список связанных со сделкой файлов
	function getContactPhones(){
		var ContactId = ifnull($("#Id").val(),"");
		//console.log("CntactId:"+ContactId);
		if(ContactId !=="" && ContactId !=="0"){
			var msg = {ContactId:ContactId}
			$.when($.ajax({
				type: 'POST',
				url: "/contacts/getContactPhones",
				data: msg,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					console.log("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:true
			})).done(function(res) {
				//Очищаем список телефонов
				$("#PhonesList").empty();
				//формируем новый список телефонов
				$.each(res, function( index, value ) {
					
					let strikeStart = "";
					let strikeEnd	= "";
					let sendMessage = "";
					let mainPhone	= "";
					let comments	= "";
					
					
					if(res[index].Active =="0"){
						strikeStart = "<Strike>";
						strikeEnd	= "</Strike>";
					}
					
					if(res[index].Send =="1"){
						sendMessage = " | <span class='glyphicon glyphicon-send' aria-hidden='true'></span> ";
					}
					
					if(res[index].LastAdd =="1"){
						mainPhone = " <span class='glyphicon glyphicon-ok' aria-hidden='true'></span> ";
					}
					if(ifnull(res[index].Comments,"") !=""){
						comments = " | "+res[index].Comments;
					}
					
					$("#PhonesList").append("<li id='ContactPhoneList" + res[index].Id + "' class='list-group-item'>"+
					mainPhone	+
					ifnull(res[index].TypeName,"") +
					" | " +
					"<a href='/address/add?Id=" + res[index].Id + "' target='_blank' id='ContactPhone" + res[index].Id +"'>"+
					strikeStart + ifnull(res[index].Address,"")+ "</a>" + strikeEnd +
					" | <a href='#' onclick=\"copyToClipboard(\'#ContactPhone" + res[index].Id +"\')\" ><span class='glyphicon glyphicon-copy' aria-hidden='true'></span></a>" +
					sendMessage +
					comments	+
					"</li>");
				});
				
			});
		}
	}
	
	
		//Получаем список связанных со сделкой файлов
	function getContactEmails(){
		var ContactId = ifnull($("#Id").val(),"");
		//console.log("CntactId:"+ContactId);
		if(ContactId !=="" && ContactId !=="0"){
			var msg = {ContactId:ContactId}
			$.when($.ajax({
				type: 'POST',
				url: "/contacts/getContactEmails",
				data: msg,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					console.log("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:true
			})).done(function(res) {
				//Очищаем список телефонов
				$("#EmailsList").empty();
				//формируем новый список телефонов
				$.each(res, function( index, value ) {
					
					let strikeStart = "";
					let strikeEnd	= "";
					let sendMessage = "";
					let mainPhone	= "";
					let comments	= "";
					
					
					if(res[index].Active =="0"){
						strikeStart = "<Strike>";
						strikeEnd	= "</Strike>";
					}
					
					if(res[index].Send =="1"){
						sendMessage = " | <span class='glyphicon glyphicon-send' aria-hidden='true'></span> ";
					}
					
					if(res[index].LastAdd =="1"){
						mainPhone = " <span class='glyphicon glyphicon-ok' aria-hidden='true'></span> ";
					}
					if(ifnull(res[index].Comments,"") !=""){
						comments = " | "+res[index].Comments;
					}
					
					$("#EmailsList").append("<li id='ContactPhoneList" + res[index].Id + "' class='list-group-item'>"+
					mainPhone	+
					ifnull(res[index].TypeName,"") +
					" | " +
					"<a href='/address/add?Id=" + res[index].Id + "' target='_blank' id='ContactPhone" + res[index].Id +"'>"+
					strikeStart + ifnull(res[index].Address,"")+ "</a>"+ strikeEnd +
					" | <a href='#' onclick=\"copyToClipboard(\'#ContactPhone" + res[index].Id +"\')\" ><span class='glyphicon glyphicon-copy' aria-hidden='true'></span></a>" +
					sendMessage +
					comments	+
					"</li>");
				});
				
			});
		}
	}
	
	$('#contSource').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите источник',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=LeadSource',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
		//По нажатию на кнопку поднимает форму создания нового контакта.
	$(".addDictionary").click(function(e){
		//console.log($("#agree").is(':checked'));
		if($('#agree').is(':checked')){
			
			$("#dicType").val($(this).data("type"));
			$("#_id").val($(this).data("id"));
			
			$("#mwAddDictionary").modal();
		}
	});
	
	$('#form-dictionary').validator().on('submit', function (e) {
		
		if (e.isDefaultPrevented()){
			console.log("Форма не прошла проверку");
		} else {
			e.preventDefault();
			var msg = {dicType:$("#dicType").val(),dicName:$("#dicName").val()}
			
			let res = setDictionaryValue(msg);
			if (res.status == "success") {
				
				let newOption = new Option(res.Name, res.LIC, true, true);
				$($("#_id").val()).append(newOption).trigger('change');
				
				appAlert(res.message,res.status,"Успех!");
			} else {
				appAlert(res.message,res.status,"Ошибка!");
			}
			
			$("#form-dictionary")[0].reset();
			$("#mwAddDictionary").modal('hide')
		}
	});
	
	