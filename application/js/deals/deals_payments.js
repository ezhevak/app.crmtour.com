	$.fn.dataTable.moment('DD.MM.YYYY')
	
	var table = $('#datatable-responsive').DataTable( {
			language: {url: '/vendor/datatables/langs/Russian.json'},
	    	stateSave: true, //сохранение введённой информации и страницы
	    	responsive: true, //Адаптивность таблицы
	        //ajax: "/issues/getlistdb",
	        sAjaxSource: "/payment/dealpaylist?dealid="+$("#DealId").val(),
	        sAjaxDataProp: "",
	        deferRender: true,
	        rowId: 'Id',
	    	dom: 'Bftlpi',
	        buttons: [
	              {
	                  text: 'Добавить',
	                  className: 'btn btn-primary',
	                  action: function ( e, dt, node, config ) {
	                      window.location = "/payment/add?dealid="+$("#DealId").val();
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
	            	"data": "PayDate",
			        "render": function(value){
			            if (value === null) return "";
			            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
			            return data;
			         },
			        "responsivePriority": 2,
			        "width": "10%"
	            },
	            { 
	            	"data": "PayTypeName",
			        "responsivePriority": 3,
			        "width": "10%"
	            },
	            { 
	            	"data": "PaySum",
			        "responsivePriority": 3,
			        "width": "10%"
	            },
	            { 
	            	"data": "PayCource",
			        "responsivePriority": 4,
			        "width": "10%"
	            },
	            { 
	            	"data": "PayEquivalent",
			        "render":PayEquCurr,
			        "responsivePriority": 3,
			        "width": "10%"
	            },
	            { 
	            	"data": "Payer",
			        "responsivePriority": 5,
			        "width": "10%"
	            },
	            { 
	            	"data": "Comments",
			        "responsivePriority": 6,
			        "width": "20%"
	            },
	            { 
	            	"data": null,
			        "render":paymentLink,
			        "responsivePriority": 1,
			        "width": "20%"
	            }
			] 
	    } )
	
	function PayEquCurr(data, type, row, meta){
		var equivalent = "";
		var currency = "";
		
		if(type === 'display'){
			if(row["PayEquivalent"] !== null) {
				equivalent = row["PayEquivalent"];
			}
			if(row["PayCurrency"] !== null) {
				currency = row["PayCurrency"];
			}
	        data = equivalent + ' ' + currency;
	    }
	    return data;
	}
	
	function editLinkId(data, type, row, meta){
		if(type === 'display'){
	        data = '<a href="/payment/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
	    }
	    return data;
	}
	
	
	
	function paymentLink(data, type, row, meta) {
	var isDisable = "";
	var isPrint = "";
	//if( $("#GlobalUserRole").val() == "admin" || $("#GlobalUserId").val() == rowdata.UserId ){
	isDisable = "";
	isPrint = "onclick=\'printPayment( "+row["Id"]+","+$("#DealId").val()+")'";
		console.log(isPrint);
		
		return "<div class='btn-group' role='group'><a href='/payment/add?Id=" +row["Id"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button id='del' class='btn btn-danger btn-xs' onClick='deleteRecord("+row["Id"]+")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button><a href='#' "+isPrint+" class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-print' aria-hidden='true'></span></a><a href='/tasks/add?model=Payment&modelid=" +row["Id"]+"' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Создать задачу'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span></a></div>";
	}
	
	
	
	
	/// print templates
	var gridPaymentTemplates = $("#grid_printPaymentTemplates");
	gridPaymentTemplates.jqGrid({
		url: "/payment/getTemplates",
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
		},
		onSelectRow: function (id) {
			var rowData = gridPaymentTemplates.jqGrid ('getRowData', id);
	    	$("#printPaymentLink").attr("href", "/deals/print?Id=" + $("#DealId").val() + "&PaymentId="+$("#printPaymentId").val()+"&TemplateId=" + rowData.tmplId).attr('target','_blank');
		}
	});
	gridPaymentTemplates.jqGrid('bindKeys');


//	function selectPaymentFirstTemplate() {
//		var ids = gridTemplates.jqGrid("getDataIDs");
//		if(ids && ids.length > 0)
//			gridTemplates.jqGrid("setSelection", ids[0]);
//	}
	
	function printPayment(paymentId, dealId) {
		$("#printPaymentId").val(paymentId);
		$("#printDealId").val(dealId);
		//selectPaymentFirstTemplate();
		$("#mwPrintPaymentTemplate").modal();
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
						  url: '/payment/delete?Id=' + row,
						  beforeSend: function() {
							showLoader();
						  },
						  success: function(data){
							if (data.status === "success") {
								//console.log(data.message);
								appAlert("Запись удалена успешно!", "success");
				            	table.row('#'+row).remove().draw();
				            	 setTimeout(function() {
							    	window.location.href = "/deals/dealpayments?dealid="+$("#DealId").val();
								}, 2000);
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



