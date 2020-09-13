   //Коректная сортировка таблицы
   $.fn.dataTable.moment('DD.MM.YYYY')
    
	var table = $('#datatable-responsive').DataTable( { 
    	createdRow: function( row, data, dataIndex ) {
			if ( data["LeadPriority"] == "Important" ) {        
         		$(row).addClass('glogal-status-row-important');
			} else if (data["LeadPriority"] == "Urgent" ){     
         		$(row).addClass('glogal-status-row-urgent');
			}
    	},
    	//order: ["LeadPriorityOrderBy", "asc"],
		language: {
				url: '/vendor/datatables/langs/Russian.json'
			},
    	//stateSave: true, //сохранение введённой информации и страницы
    	colReorder: true, //Сохранение сортировки
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/leads/getlist",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
              	  text: 'Добавить',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      window.location = '/leads/add';
                  }//,enabled : enabledBtn
              },
              //{
              //    text: 'Веб форма',
              //    action: function ( e, dt, node, config ) {
              //        $("#mwWebForm").modal();
              //    }//,enabled : enabledBtn
              //},
              {
              	text: 'Экспорт',
              	action: function ( e, dt, node, config ) {
					webRequest("/leads/export", "POST", {}, "text", true, function(d,s){appAlert(d,"success");}, function(j,t,e){appAlert(d,"error");});
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
            	"data": "LeadDate",
            	"render": function(value){
            		//console.log(value);
		           if (value === null) return "";
		            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
		            return data;
		         },
		        "responsivePriority": 2,
		        "width": "15%"
            },
            //{ "data": "Description" },
            { 
            	//"data": "LastName",
		        "render":editLastName,
		        "responsivePriority": 3,
		        "width": "25%"
            },
            { 
            	//"data": "FirstName",
		        "render":editFirstName,
		        "responsivePriority": 4,
		        "width": "25%"
		        
            },
            { 
            	//"data": "Phone",
		        "render":phoneLink,
		        "responsivePriority": 5,
		        "width": "25%",
		         type: 'phoneNumber'
		        //"render":editable
            },
            { 
            	//"data": "Email",
		        "render":emailLink,
		        "responsivePriority": 7,
		        "width": "25%"
		        
            },
            { 
            	"data": "ManagerName",
		        "responsivePriority": 9,
		        "width": "25%"
		        //"render":editable
            },
            { 
            	//"data": "LeadPriorityName",
		        "responsivePriority": 10,
		        "width": "25%",
		        "render":function(data, type, row, meta){
            		return row["LeadPriorityOrderBy"]+" - "+row["LeadPriorityName"];
		         }
            },
            { 
            	
		        "data": "LeadStatusName",
            	"responsivePriority": 11,
		        "width": "25%"
		        //"render":editable,
		        
            },
            { 
            	"data": null,
		        "render":actionLink,
		        "responsivePriority": 1,
		        "width": "10%"
            }
		],
        order: [[6, 'asc'],[7, 'asc']]
    } )



function editLinkId(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/leads/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
    }
    return data;
}

function editLink(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/leads/add?Id=' + row["Id"] + '">' + row["LastName"] + '</a>';
    }
    return data;
}

function actionLink(data, type, row, meta) {
	var isDisable = "";
	var isEditURL = "";
	
	if( $("#GlobalUserRole").val() == "user"){
		isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление запрещено!\"";
	}
	return "<div class='btn-group' role='group'><a href='/leads/add?Id=" +row["Id"]+"'  target='_blank' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><a href='/tasks/add?model=Lead&modelid=" +row["Id"]+"' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Создать задачу'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' " + isDisable + " onClick='deleteRecord(" + row["Id"] + ")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
	
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

//скрипт изменения заголовка и ссылки на данные
$(".contact_segment_url").on("click", function (e) {
	
	$("#x_title_name").text($(this).text());
	table.ajax.url($(this).data('contacturl')).load();

});

function editLastName(data, type, row, meta) {
    if(row["ContactId"] ===0){
    	return row["LastName"];
    }else {
		return "<a href='/contacts/add?Id="+row["ContactId"]+"'>"+row["LastName"]+"</a>";
    }
}

function editFirstName(data, type, row, meta) {
    if(row["ContactId"] ===0){
    	return row["FirstName"];
    }else {
		return "<a href='/contacts/add?Id="+row["ContactId"]+"'>"+row["FirstName"]+"</a>";
    }
}


function copyToClipboard(elem) {
	  // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);
    
    // copy the selection
    var succeed;
    try {
    	  succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }
    
    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}

//$("#copyScript").on("click", function(e) {
//	e.preventDefault();
//	copyToClipboard(document.getElementById("copyTarget"));
//	$("#mwWebForm").modal("hide");
//});


function emailLink(data, type, row, meta) {
	if(row["Email"] ===""){
    	return "";
    }else {
		return "<a href='mailto:" +row["Email"]+"'>"+row["Email"]+"</a>";
    }
}
function phoneLink(data, type, row, meta) {
	if(row["Phone"] ===""){
    	return "";
    }else {
		return "<a href='tel:" +row["Phone"]+"'>"+row["Phone"]+"</a>";
    }
}

//скрипт изменения заголовка и ссылки на данные
$(".leads_month_url").on("click", function (e) {
	
	$("#x_title_name").text($(this).text());
	table.ajax.url($(this).data('monthurl')).load();

});

//скрипт изменения заголовка и ссылки на данные
$(".leads_branch_url").on("click", function (e) {
	//$("#x_title_name").text($(this).text());
	table.ajax.url($(this).data('branchurl')).load();

});

