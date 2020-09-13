	function print(dealId) {
		//alert("PRINT " + dealId);
		$("#printDealId").val(dealId);
		selectFirstTemplate();
		//console.log("print" + dealId);
		$("#mwPrintTemplate").modal();
	}
	
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
	
	function selectFirstTemplate() {
		var ids = gridTemplates.jqGrid("getDataIDs");
		if(ids && ids.length > 0)
			gridTemplates.jqGrid("setSelection", ids[0]);
	}
	
	
	$(".grid_open_url").on("click", function (e) {
		$("#x_title_name").text($(this).text());
		deals.ajax.url($(this).data('gridurl')).load();
		
	
	});


//	let enabledBtn;

//	if($("#GlobalAccId").val() !=120){
//		enabledBtn = true
//	} else {
//		enabledBtn = false 
//	}


	$.fn.dataTable.moment('DD.MM.YYYY')
	
	var deals = $('#deals-responsive').DataTable( {
			language: {url: '/vendor/datatables/langs/Russian.json'},
	    	//stateSave: true, //сохранение введённой информации и страницы
	    	responsive: true, //Адаптивность таблицы
	        //ajax: "/issues/getlistdb",
	        sAjaxSource: "deals/getlist",
	        sAjaxDataProp: "",
	        deferRender: true,
	        rowId: 'Id',
	    	dom: 'Bftlpi',
	        buttons: [
	              {
	                  text: 'Добавить',
	                  className: 'btn btn-primary',
	                  action: function ( e, dt, node, config ) {
	                      window.location = "/deals/add";
	                  }//,enabled : enabledBtn
	              },
	              {
	              	text: 'Экспорт',
	              	action: function ( e, dt, node, config ) {
						webRequest("/deals/export", "POST", {}, "text", true, function(d,s){appAlert(d,"success");}, function(j,t,e){appAlert(d,"error");});
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
			        "responsivePriority": 2,
			        "width": "5%"
	            },
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
	            },
	            { 
	            	"data": "LegalName",
	            	 render: function ( data, type, row ) {
	                    if ( type === 'display' ) {
	                    	if(row["LegalId"] !="0"){
	                    		data =  '<a href="/legal/add?Id=' + row["LegalId"] + '">' + row["LegalName"] + '</a>';
	                    	}
	                    }
	                    return data;
	                },
			        "responsivePriority": 5,
			        "width": "5%"
	            },
	            { 
	            	"data": "DealDateOriginal",
			        "render": function(value){
			            if (value === null) return "";
			            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
			            return data;
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
	                        	data =  '<a href="/operators/add?Id=' + row["OperatorId"] + '">' + row["OperatorName"] + '</a>';
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
	            //{ 
	            //	"data": "Month",
			    //    "responsivePriority": 7,
			    //    "width": "5%"
	            //},
	            { 
	            	"data": "NotPaidDeal",
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
	            	"data": "DateArrivalOriginal",
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
	            	"data": "RegionName",
			        "responsivePriority": 14,
			        "width": "3%"
	            },
	            { 
	            	"data": "HotelName",
	            	 render: function ( data, type, row ) {
			            if (row["HotelId"] === 0) {
			            	data = "";
			            } else {
				            if ( type === 'display' ) {
		                        	data =  '<a href="/hotels/add?Id=' + row["HotelId"] + '">' + row["HotelName"] + '</a>';
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
        order: [[4, 'desc']]
	    } )





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
	return "<div class='btn-group' role='group'><a href='"+isEditURL+"' class='btn btn-primary btn-xs' "+isDisable+"><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button class='btn btn-info btn-xs' " + isDisable + " onClick='copyRecord(" + row["Id"] + ")'><span class='glyphicon glyphicon-duplicate' aria-hidden='true'></span></button><a href='#' "+isPrint+" class='btn btn-primary btn-xs' "+isDisable+"><span class='glyphicon glyphicon-print' aria-hidden='true'></span></a><a href='/deals/dealpayments?dealid=" +row["Id"]+"' target='_blank' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Просмотреть платежи по сделке "+row["DealNo"]+"'><span class='glyphicon glyphicon-usd' aria-hidden='true'></span></a><a href='/tasks/add?model=Deal&modelid=" +row["Id"]+"' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Создать задачу'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span></a><button class='btn btn-danger btn-xs' " + isDisable + " onClick='delRecord(" + row["Id"] + ")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";

	
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
			            	deals.row('#'+row).remove().draw();
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

function copyRecord(row) {
	if (row !== "") {
		$.confirm({
	    title: 'Копирование записи!',
	    content: 'Вы действительно хотите скопировать эту запись?',
    	autoClose: 'cancel|8000',
	    buttons: {
	        confirm:{
	        text:'Скопировать',
            btnClass: 'btn-success',
	        action:function () {
					$.ajax({
					  dataType: 'json',
					  url: '/deals/copy?dealid=' + row,
					  beforeSend: function() {
						showLoader();
					  },
					  success: function(data){
						if (data.status === "success") {
							console.log(data.DealId);
							deals.ajax.reload();
							appAlert("Запись скопирована! Новый номер сделки Id="+data.DealId, "success");
							//console.log(deals);
			            	
						} else {
							console.log(data.message);
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



