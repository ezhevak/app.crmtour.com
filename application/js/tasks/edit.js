function on_load() {

	
	$("#Done").bootstrapSwitch(
		{
			onInit: function() {
				$(".bootstrap-switch-wrapper").css("display", "block");
			}
		}
	);
	
	$('#Start').datetimepicker({locale: 'ru',sideBySide: true});
	$('#End').datetimepicker({locale: 'ru',sideBySide: true});
	
	$('#UserSelect').select2({
		theme: "bootstrap",
		tags: "true",
		placeholder: "Выбор сотрудников",
		
	});
	
	$("#UserSelector > .select2").css("width","100%");
	$('#UserSelector').show();
	
	$("#Start").inputmask('datetime', {
	    mask: "1.2.y h:s",
	    placeholder: "dd.mm.yyyy hh:mm",
	    separator: '.'
	});
	
	$("#End").inputmask('datetime', {
	    mask: "1.2.y h:s",
	    placeholder: "dd.mm.yyyy hh:mm",
	    separator: '.'
	});
	
	$("#delTask").on("click", function(event) {
		event.preventDefault();
		deleteTask($("#Id").val());
	});
	
	
}



function deleteTask(Id) {
	if (Id !== "") {
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
						  url: '/tasks/delete?Id=' + Id,
						  beforeSend: function() {
							showLoader();
						  },
						  success: function(data){
							if (data.status === "success") {
								//console.log(data.message);
								appAlert("Запись удалена успешно!", "success");
								setTimeout(function() {
							    	window.location.href = "/tasks"
							    }, 2000)
								
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
		        	text: 'Отмена', 
		            action: function () {
		            	
		            }
		        }
		    }
		});
	}
}


