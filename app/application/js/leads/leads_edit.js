
function on_load() {
	
	if( $("#ContactId").val() >0){
		//console.log("1");
		document.title = "CRM Tour - " + $("#ContactPickFirstName").val() + " " + $("#ContactPickLastName").val();
	}
	
	
	$("#Phone").inputmask("+39(999)999-9999"); 
	$("#LeadDate").inputmask("dd.mm.yyyy");
	
	$('#LeadDate').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});


	$("#Phone").blur(function(){
		if($("#ContactId").val()==="" && $("#Phone").val()!==""){
			console.log("Попытка найти "+$("#Phone").val());
			var msg = {
				address:$("#Phone").val()
			}
			$.when($.ajax({
					type: 'POST',
					url: "/leads/findAddress",
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
					if (res.status == "success") {
						if(res.count !="0"){	
							appAlert(res.message,res.status);
							if(res.count=="1"){	
								//console.log(1);
					    		$("#ContactId").val(res.ContactId);
					    		//$("#ContactPickLastName").val(res.FirstName);
					    		//$("#ContactPickFirstName").val(res.LastName);
					    		$("#LastName").val(res.LastName);
								$("#FirstName").val(res.FirstName);
								$("#MiddleName").val(res.MiddleName);
								$("#Email").val(res.EmailHome);
								if ($('#LeadSex').find("option[value='" + res.Sex + "']").length) {
								    $('#LeadSex').val(res.Sex).trigger('change');
								} else { 
									let sexDic = LookupValue("Sex",res.Sex)
								    
									let data = {
										id: sexDic.LIC,
										text: sexDic.Name
									};
									
									let newOption = new Option(data.text, data.id, true, true);
									$('#LeadSex').append(newOption).trigger('change');
								} 
							
								if ($('#ContactId').find("option[value='" + res.ContactId + "']").length) {
								    $('#ContactId').val(data.id).trigger('change');
								} else { 
								    // Create a DOM Option and pre-select by default
									let data = {
										id: res.ContactId,
										text: res.LastName + " " + res.FirstName + " " + res.MiddleName
									};
									
									let newOption = new Option(data.text, data.id, true, true);
									$('#ContactId').append(newOption).trigger('change');
								} 
								
					    		getContactInfo();
							}
						}
					}
					
				});
		}
	});

	$("#Email").blur(function(){
		if($("#ContactId").val()==="" && $("#Email").val()!==""){
			console.log("Попытка найти "+$("#Email").val());
			var msg = {
				address:$("#Email").val()
			}
			$.when($.ajax({
					type: 'POST',
					url: "/leads/findAddress",
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
					if (res.status == "success") {
						if(res.count !="0"){	
							appAlert(res.message,res.status);
							if(res.count=="1"){	
					    		$("#ContactId").val(res.ContactId);
					    		$("#ContactPickLastName").val(res.FirstName);
					    		$("#ContactPickFirstName").val(res.LastName);
					    		$("#LastName").val(res.LastName);
								$("#FirstName").val(res.FirstName);
								$("#MiddleName").val(res.MiddleName);
								$("#Phone").val(res.PhoneMob);
								
								if ($('#LeadSex').find("option[value='" + res.Sex + "']").length) {
								    $('#LeadSex').val(res.Sex).trigger('change');
								} else { 
									let sexDic = LookupValue("Sex",res.Sex)
								    
									let data = {
										id: sexDic.LIC,
										text: sexDic.Name
									};
									
									let newOption = new Option(data.text, data.id, true, true);
									$('#LeadSex').append(newOption).trigger('change');
								} 
							
								if ($('#ContactId').find("option[value='" + res.ContactId + "']").length) {
								    $('#ContactId').val(data.id).trigger('change');
								} else { 
								    // Create a DOM Option and pre-select by default
									let data = {
										id: res.ContactId,
										text: res.LastName + " " + res.FirstName + " " + res.MiddleName
									};
									
									let newOption = new Option(data.text, data.id, true, true);
									$('#ContactId').append(newOption).trigger('change');
								} 
					    		getContactInfo();
							}
						}
					}
					
				});
		}
	});
	
	
	tinymce.init({
	  selector: 'textarea',
	  height: 180,
	  menubar: false,
	  plugins: [
	    'advlist autolink lists link image charmap print preview anchor',
	    'searchreplace visualblocks code fullscreen',
	    'insertdatetime media table paste code'
	  ],
	  toolbar: 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
	 // content_css: '//www.tinymce.com/css/codepen.min.css'
	  content_css: '../css/codepen.min.css'/*,
	  contextmenu: "cut | copy | paste"*/
	});


	$('#form-lead').validator().on('submit', function (e) {
		
		$("#btnSaveLead").attr('disabled',true);
		if (e.isDefaultPrevented()){
			appAlert("Вы не заполнили обязательные поля на форме!","warning","Беда!");
			//console.log("Форма не прошла проверку");
		} else {
			tinyMCE.triggerSave();
			e.preventDefault();

			//console.log($('#form-lead').serialize());
			var msg = $('#form-lead').serialize();
			
			setTimeout(function(){
				$("#btnSaveLead").removeAttr('disabled');
			}, 2000);
			
	    $.when($.ajax({
				type: 'POST',
				url: "/leads/save_ajax",
				data: msg,
				success: function(_data, status){
					return _data;
				},
			 	error: function( jqXHR, textStatus, errorThrown) {
					console.log("error:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:true
			})).done(function(res) {
				//console.log(res)
				if (res.status == "success") {
					appAlert(res.message,res.status);
					
					if($('#LeadStatus').val() =="Processed"){
							$.confirm({
						    title: 'Запрос обработан',
						    content: 'Вы можете создать сделку или напоминание с клиентом '+res.LastName + ' ' + res.FirstName+'?',
					    	autoClose: 'cancel|8000',
						    buttons: {
						        confirm:{
						        text:'Забронирован',
					            btnClass: 'btn-success',
						        action:function () {
						            	console.log("Создаём сделку с клиентом Id="+res.ContactId);
										
										var msg ={
											"ContactId"	:res.ContactId,
											"UserId"	:res.UserId,
											"LeadId"	:res.LeadId
										};
										$.when($.ajax({
												type: 'POST',
												dataType: 'json',
												url: '/deals/saveDeal_ajax',
												data: msg,
												success: function(_data, status){
												return _data;
												},
												error: function( jqXHR, textStatus, errorThrown) {
												console.log("error:" + textStatus + "," + errorThrown);
												},
												dataType: "json",
												async:true
											})).done(function(res) {
												console.log(res)
												if (res.status == "success") {
													//console.log(res);
													$("#DealId").val(res.DealId);
													
													window.location = '/deals/add?Id='+res.DealId;
												
												} else {
													console.log("Беда");
													appAlert(res.message,res.status);
													//setTimeout(function() {
													//	$("#smtpSendButton").removeAttr('disabled');
													//}, 2000);
												}
											});
										
							            
						        	}  
						        },
						        task:{
						        	text: 'Отложен', 
					            	btnClass: 'btn-info',
						            action: function () {
										console.log("Создаём напоминание с клиентом");			
										window.location = "/tasks/add?model=Contact&modelid="+res.ContactId;
						            	
						            }
						        },
						        cancel:{
						        	text: 'Выйти', 
						            action: function () {
						            	setTimeout(function() {
											window.location = '/leads/add?Id='+res.LeadId;
										}, 2000);
						            	console.log("Отказ от автоматического создания сделки");
						            }
						        }
						    }
						});
					} else {
						setTimeout(function() {
							window.location = '/leads/add?Id='+res.LeadId;
						}, 2000);
					}
				} else {
					appAlert(res.message,res.status);
				
				}
			});
		}
		
		setTimeout(function() {
			$("#btnSaveLead").removeAttr('disabled');
		}, 2000);
		
	});
	
	//Вызываем получение информации по клиенту и по запросам.
	getContactInfo();
	//Вызываем получение информации по связанным запросам
	getLinkedTasks();
	
	$('#ContactId').select2({
    	theme: "bootstrap",
		placeholder: 'Введите ФИО',
		multiple: false,
		ajax: {
		  url: '/contacts/getContactsListItems',
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
	
	
	$('#PartnerId').select2({
    	theme: "bootstrap",
		placeholder: 'Введите ФИО',
		multiple: false,
		ajax: {
		  url: '/contacts/getContactsListItems',
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
	$(".addContact").click(function(e){
		$("#callerId").val($(this).data("type"));
		$("#mwAddContact").modal();
	});
	
	//Событие выбор контакта.
	$('#ContactId').on('select2:select', function (e) {
		
		setContact();
	});
	
	function setContact(){
		
		//console.log($("#ContactId").val());
		
		var ContactId = $("#ContactId").val();
		//console.log("|"+ContactId+"|");
		
		if(ifnull(ContactId,"0") !=="0"){
			
		var msg = {Id:ContactId}
		$.when($.ajax({
				type: 'POST',
				url: "/contacts/getContactById",
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
					$("#ContactId").val(res.Id);
		    		$("#ContactPickLastName").val(res.FirstName);
		    		$("#ContactPickFirstName").val(res.LastName);
		    		$("#LastName").val(res.LastName);
					$("#FirstName").val(res.FirstName);
					$("#MiddleName").val(res.MiddleName);
					$("#Phone").val(res.PhoneMob);
					$("#Email").val(res.EmailHome);
					
				
					//$('#LeadSex').val(res.Sex).trigger('change');
					if ($('#LeadSex').find("option[value='" + res.Sex + "']").length) {
						//console.log("found");
					    $('#LeadSex').val(res.Sex).trigger('change');
					} else { 
						let sexDic = LookupValue("Sex",res.Sex)
					    
						let data = {
							id: sexDic.LIC,
							text: sexDic.Name
						};
						
						let newOption = new Option(data.text, data.id, true, true);
						$('#LeadSex').append(newOption).trigger('change');
					} 
					
				
				
					if ($('#ContactId').find("option[value='" + res.ContactId + "']").length) {
					    $('#ContactId').val(res.ContactId).trigger('change');
					} else { 
					    // Create a DOM Option and pre-select by default
						let data = {
							id: res.Id,
							text: res.LastName + " " + res.FirstName + " " + res.MiddleName
						};
						
						let newOption = new Option(data.text, data.id, true, true);
						$('#ContactId').append(newOption).trigger('change');
					} 
					
		    		getContactInfo();
				
			});
			
		}
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
	
	$("#contDateBirth").inputmask("dd.mm.yyyy");
	$("#passIssuedDate").inputmask("dd.mm.yyyy");
	$("#passValidDate").inputmask("dd.mm.yyyy");
	
	$("#PhoneMob").inputmask("+39(999)999-9999");
	
	
	$('#UserId').select2({
    	theme: "bootstrap",
		placeholder: 'Выберите менеджера',
		multiple: false,
		ajax: {
		  url: '/users/getUsersListItems',
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
	
	$('#contUserId').select2({
    	theme: "bootstrap",
		placeholder: 'Выберите менеджера',
		multiple: false,
		ajax: {
		  url: '/users/getUsersListItems',
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
	
	
	
	$('#LeadSex').select2({
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
	
	
	$('#contSegment').select2({
    	theme: "bootstrap",
		placeholder: 'Укажите сегмент',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=Segment',
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
	
	$('#LeadStatus').select2({
    	theme: "bootstrap",
		placeholder: 'Укажите статус',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=LeadStatus',
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
	
	$('#LeadType').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите тип',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=LeadType',
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
	
	
	$('#LeadSource').select2({
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
	
	$('#LeadPriority').select2({
    	theme: "bootstrap",
		placeholder: 'Укажите приоритет',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=Priority',
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
	
	
	$('#form-contact').validator().on('submit', function (e) {
		
		if (e.isDefaultPrevented()){
			console.log("Форма не прошла проверку");
		} else {
			e.preventDefault();
			
			//var formData = $('#form-contact').serialize();
			var formData = new FormData($("#form-contact")[0]);
			//console.log(formData);
			
			$.when($.ajax({
				type: 'POST',
				url: "/contacts/save_ajax",
				data: formData,
        		processData: false,
        		contentType: false,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					console.log("error:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:false
			})).done(function(res) {
				if (res.status == "success") {
					
					let data = {
							id: res.ContactId,
							text: res.LastName + " " + res.FirstName + " " + res.MiddleName
						};
					
					if($("#callerId").val() == "contact"){
						
						let newOption = new Option(data.text, data.id, true, true);
						$('#ContactId').append(newOption).trigger('change');
						
					} else {
						
						let newOption = new Option(data.text, data.id, true, true);
						$('#PartnerId').append(newOption).trigger('change');
					}
					
			    	$("#form-contact")[0].reset();
					setContact();
			    	appAlert(res.message,res.status,"Успех!");
				} else {
					appAlert(res.message,res.status,"Ошибка!");
				}
			});
			
			
			$("#mwAddContact").modal('hide')
			
		}
		
	});
	
	//По нажатию на кнопку поднимает форму создания нового контакта.
	$(".addDictionary").click(function(e){
		$("#dicType").val($(this).data("type"));
		$("#_id").val($(this).data("id"));
		
		if($("#mwAddContact").hasClass('in')){
		
			$("#mwAddContact").modal('hide');
			$("#_formId").val("#mwAddContact");
		}
		
		$("#mwAddDictionary").modal();
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
			
			if($("#_formId").val() != "") {
				setTimeout(function() {$($("#_formId").val()).modal('show');}, 500)
				return false;
			}
		}
	});

}





function getContactInfo(){
		var ContactId = $("#ContactId").val();
		
		if(ContactId !=="" && ContactId !==null && ContactId !=="0"){
			var msg = {ContactId:$("#ContactId").val(),LeadId:$("#Id").val()}

			$.when($.ajax({
				type: 'POST',
				url: "/leads/contact_info_ajax",
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
				
				if(res["0"].Id > 0){
					var blackList = " ";
					if(res[0].BlackList =="1"){
						blackList = "<br>В чёрном списке";
					}
					var comments = "";
					if(res[0].Comments !=""){
						comments = "<br>Комментарий: "+res[0].Comments;
					}
					
					$("#x_content_additional_info").append("<div class='text-muted well well-sm no-shadow' id='contactComment'>"+
					"<a href='/contacts/add?Id="+ContactId+"'>"+res[0].LastName+ " "+ res[0].FirstName+" "+res[0].MiddleName+"</a>:"+
					comments+
					"<br>Сегмент: "+res[0].SegmentName+
					"<br>Запросов успешных: "+res[0].LeadsProcessed+
					"<br>Запросов потеряных: "+res[0].LeadsLost+
					blackList +
					"</div>");
				}
				
				if(res["Lead"].length>0){
					var lead = res["Lead"][0];
					$("#x_content_additional_info").append("<div class='text-muted well well-sm no-shadow' id='contactLeadData'>"+
					"<strong>Предыдущий запрос:</strong>"+lead.LeadStatusName+
					"<br><strong>Дата:</strong> "+lead.LeadDate+
					"<br><strong>Текст запроса:</strong> "+lead.LeadText+
					"<br><strong>Ответ менеджера:</strong> "+lead.ManagerText+
					"</div>");
				}
				
			});
			
		}
	}
	
function getLinkedTasks(){
		var LeadId = $("#Id").val();
		
		if(LeadId !=="" && LeadId !==null && LeadId !=="0"){
			var msg = {ModelType:"Lead",ModelId:LeadId}
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
	


