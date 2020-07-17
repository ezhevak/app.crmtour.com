//let enabledBtn;
//
//if($("#GlobalAccId").val() !=120){
//	enabledBtn = true
//} else {
//	enabledBtn = false 
//}




	//console.log("loaded");
	$('#calendar').fullCalendar({
			locale: 'ru',
			header: {
				left: 'prev,next today',
				center: 'title',
				//right: 'month,basicWeek,basicDay'
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			//defaultDate: '2017-02-12',
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events

			events: '/tasks/getTasks',
			eventDrop: function(event, delta, revertFunc) {
		        //alert(event.title + " was dropped on " + event.start.format());
				//console.log(event);
		        //if (!confirm("Are you sure about this change?")) {
		        //    revertFunc();
		        //}
		    },
		    eventResize: function(event, delta, revertFunc) {
		        //alert(event.title + " end is now " + event.end.format());
				//console.log(event);
		        //if (!confirm("is this okay?")) {
		        //    revertFunc();
		        //}
		    },

		eventMouseover: function(calEvent, jsEvent) {
			//console.log(calEvent);
		    var tooltip = '<div class="tooltipevent" style="width:100px;height:100px;background:#fff;position:absolute;z-index:10001;">' + calEvent.Task + '</div>';
		    $("body").append(tooltip);
		    $(this).mouseover(function(e) {
		        $(this).css('z-index', 10000);
		        $('.tooltipevent').fadeIn('500');
		        $('.tooltipevent').fadeTo('10', 1.9);
		    }).mousemove(function(e) {
		        $('.tooltipevent').css('top', e.pageY + 10);
		        $('.tooltipevent').css('left', e.pageX + 20);
		    });
		},
		
		eventMouseout: function(calEvent, jsEvent) {
		     $(this).css('z-index', 8);
		     $('.tooltipevent').remove();
		},
	});


//Коректная сортировка таблицы
$.fn.dataTable.moment('DD.MM.YYYY HH:mm')

var table = $('#datatable-responsive-tasks').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/tasks/getlist?status=0",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
				text: 'Добавить',
				className: 'btn btn-primary',
				action: function ( e, dt, node, config ) {
				  window.location = '/tasks/add';
				}//,enabled : enabledBtn
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
            	"data": "Title",
		        "responsivePriority": 2,
		        "width": "25%"
            },
            { 
            	"data": "Start",
		        "render": function(value){
		            if (value === null) return "";
		            data =  moment(value, 'YYYY-MM-DD HH:mm').format('DD.MM.YYYY HH:mm');
		            return data;
		         },
		        "responsivePriority": 3,
		        "width": "15%"
            },  
            { 
            	"data": "End",
		        "render": function(value){
		            if (value === null) return "";
		            data =  moment(value, 'YYYY-MM-DD HH:mm').format('DD.MM.YYYY HH:mm');
		            return data;
		         },
		        "responsivePriority": 4,
		        "width": "15%"
            },
            { 
            	"data": "Done",
		        "responsivePriority": 6,
		        "width": "10%",
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
        data = '<a href="/tasks/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
    }
    return data;
}


function actionLink(data, type, row, meta) {
	return "<div class='btn-group' role='group'><a href='/tasks/add?Id=" +row["Id"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button id='del' class='btn btn-danger btn-xs' onClick='deleteRecord("+row["Id"]+")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
}





//скрипт изменения заголовка и ссылки на данные
$(".tasks_status_url").on("click", function (e) {
	$("#x_title_name_list").text($(this).text());
	table.ajax.url($(this).data('statusurl')).load();

});

//скрипт изменения данных в календаре

//$(".calendar_status_url").on("click", function(e){
//	$("#x_title_name_calendar").text($(this).text());
//        
//	var events = $(this).data('statusurl');
//		
//	
//	
//	$('#Calendar').fullCalendar('removeEvents', events);
//	$('#Calendar').fullCalendar('removeEventsSource', events);
//	$('#Calendar').fullCalendar('addEventSource', events);
//	$('#Calendar').fullCalendar('refetchEvents');
//
//});



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
						  url: '/tasks/delete?Id=' + row,
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
