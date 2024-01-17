function on_load() {
	
	//$("#LegalOfficePhone").inputmask("+38(099)999-9999");
	//$("#LegalOfficeFax").inputmask("+38(099)999-9999");
	//$("#LegalOfficeMobile").inputmask("+38(099)999-9999");
	
	$("#LegalDealStart").inputmask("dd.mm.yyyy");
	$("#LegalDealEnd").inputmask("dd.mm.yyyy");

	$('#LegalDealStart').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});


	
	$('#LegalDealEnd').datepicker({
		format: 'dd.mm.yyyy',
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true
	});
	
	
	//Вызываем получение информации по связанным запросам
	getLinkedTasks();
}
	
	
	
function getLinkedTasks(){
		var LegalId = $("#Id").val();
		
		if(LegalId !=="" && LegalId !==null && LegalId !=="0"){
			var msg = {ModelType:"Legal",ModelId:LegalId}
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
				console.log(res)
				if (res.status == "success") {
					console.log("Таск успешно удалён" )
					$( "#Task"+TaskId ).remove();
				} else {
					console.log("Ошибка при удалении таска." )
				}
			});
			
		}
	}
	
