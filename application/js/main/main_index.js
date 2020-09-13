$.fn.dataTable.moment('DD.MM.YYYY')
$.fn.dataTable.moment('DD.MM.YYYY HH:mm')

var tableArrivals = $('#datatable-responsive-arrivals').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	//stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/main/getlist_arr",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'DealId',
    	//dom: 'ftlpi',
        columns: [
            { 
            	"data": "LastName",
		        "render": editLinkLastName,
		        "responsivePriority": 0,
		        "width": "10%"
            },
            { 
            	"data": "FirstName",
            	"render": editLinkFirstName,
		        "responsivePriority": 2,
		        "width": "25%"
            },
            { 
            	"data": "DealNo",
            	"render": editLinkDealNo,
		        "responsivePriority": 3,
		        "width": "25%"
            },
            { 
            	"data": "NotPaidDeal",
		        "responsivePriority": 4,
		        "width": "25%",
		        "render":function(value){
		        	if(value===1){
		        		return '<input type="checkbox" checked="checked" onclick="return false"/>';
		        	} else {
		        		return '<input type="checkbox" onclick="return false"/>';
		        	}
		        }
            },
            { 
            	"data": "DateArrival",
            	"render": function(value){
            		//console.log(value);
		           if (value === null) return "";
		            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
		            return data;
		         },
		        "responsivePriority": 5,
		        "width": "15%"
            },
            { 
            	"data": "DocIssued",
		        "responsivePriority": 6,
		        "width": "25%",
		        "render":function(value){
		        	if(value===1){
		        		return '<input type="checkbox" checked="checked" onclick="return false"/>';
		        	} else {
		        		return '<input type="checkbox" onclick="return false"/>';
		        	}
		        }
            },
            { 
            	"data": "OperatorName",
            	"render" : operatorLink,
		        "responsivePriority": 7,
		        "width": "25%"
            },
            { 
            	"data": "OperatorInvoceNum",
		        "responsivePriority": 8,
		        "width": "25%"
            },
            { 
            	"data": "Airport",
            	"render" : AirportLinkArr,
		        "responsivePriority": 9,
		        "width": "25%"
            },
            { 
            	"data": "FlightAArrivalDate",
            	"render": function(value){
            		//console.log(value);
		           if (value === null || value === "") return "";
		            data =  moment(value, 'YYYY-MM-DD HH:mm').format('DD.MM.YYYY HH:mm');
		            return data;
		         },
		        "responsivePriority": 10,
		        "width": "25%"
            },
            { 
            	"data": "FlightADepartureDate",
            	"render": function(value){
            		//console.log(value);
		           if (value === null || value === "") return "";
		            data =  moment(value, 'YYYY-MM-DD HH:mm').format('DD.MM.YYYY HH:mm');
		            return data;
		         },
		        "responsivePriority": 11,
		        "width": "25%"
            },
            { 
            	"data": "ManagerName",
            	"render": editLinkManager,
		        "responsivePriority": 12,
		        "width": "25%"
            },
            { 
            	"data": null,
		        "render":actionLinkArrival,
		        "responsivePriority": 1,
		        "width": "10%"
            }
		],
        order: [[4, 'asc']]
    } )
    

var tableDeparture = $('#datatable-responsive-departure').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	//stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/main/getlist_dep",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'DealId',
    	//dom: 'ftlpi',
        columns: [
            { 
            	"data": "LastName",
		        "render": editLinkLastName,
		        "responsivePriority": 0,
		        "width": "10%"
            },
            { 
            	"data": "FirstName",
            	"render": editLinkFirstName,
		        "responsivePriority": 2,
		        "width": "25%"
            },
            { 
            	"data": "DealNo",
            	"render": editLinkDealNo,
		        "responsivePriority": 3,
		        "width": "25%"
            },
            { 
            	"data": "NotPaidDeal",
		        "responsivePriority": 4,
		        "width": "25%",
		        "render":function(value){
		        	if(value===1){
		        		return '<input type="checkbox" checked="checked" onclick="return false"/>';
		        	} else {
		        		return '<input type="checkbox" onclick="return false"/>';
		        	}
		        }
            },
            { 
            	"data": "DateDeparture",
            	"render": function(value){
            		//console.log(value);
		           if (value === null) return "";
		            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
		            return data;
		         },
		        "responsivePriority": 5,
		        "width": "15%"
            },
            { 
            	"data": "OperatorName",
            	"render" : operatorLink,
		        "responsivePriority": 6,
		        "width": "25%"
            },
            { 
            	"data": "OperatorInvoceNum",
		        "responsivePriority": 7,
		        "width": "25%"
            },
            { 
            	"data": "Airport",
            	"render" : AirportLinkDep,
		        "responsivePriority": 8,
		        "width": "25%"
            },
            { 
            	"data": "FlightBArrivalDate",
            	"render": function(value){
            		//console.log(value);
		           if (value === null || value === "") return "";
		            data =  moment(value, 'YYYY-MM-DD HH:mm').format('DD.MM.YYYY HH:mm');
		            return data;
		         },
		        "responsivePriority": 9,
		        "width": "25%"
            },
            { 
            	"data": "FlightBDepartureDate",
            	"render": function(value){
            		//console.log(value);
		           if (value === null || value === "") return "";
		            data =  moment(value, 'YYYY-MM-DD HH:mm').format('DD.MM.YYYY HH:mm');
		            return data;
		         },
		        "responsivePriority": 10,
		        "width": "25%"
            },
            { 
            	"data": "ManagerName",
            	"render": editLinkManager,
		        "responsivePriority": 11,
		        "width": "25%"
            },
            { 
            	"data": null,
		        "render":actionLinkDeparture,
		        "responsivePriority": 1,
		        "width": "10%"
            }
		],
        order: [[4, 'asc']]
    } )


function editLinkLastName(data, type, row, meta){
	if(type === 'display'){
        if(row["ContactId"] !== null){
        	data = '<a href="/contacts/add?Id=' + row["ContactId"] + '">' + row["LastName"] + '</a>';
        }
    }
    return data;
}


function editLinkFirstName(data, type, row, meta){
	if(type === 'display'){
        if(row["ContactId"] !== null){
        	data = '<a href="/contacts/add?Id=' + row["ContactId"] + '">' + row["FirstName"] + '</a>';
        }
    }
    return data;
}

function editLinkDealNo(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/deals/add?Id=' + row["DealId"] + '">' + row["DealNo"] + '</a>';
    }
    return data;
}

function editLinkManager(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/users/add?Id=' + row["UserId"] + '">' + row["ManagerName"] + '</a>';
    }
    return data;
}


function actionLinkArrival(data, type, row, meta) {
	//return "<div class='btn-group' role='group'><a href='/contacts/add?Id=" +row["ContactId"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button id='del' class='btn btn-primary btn-xs' onClick='editDeal("+row["DealId"]+")'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></div>";
	return "<button class='btn btn-primary btn-xs' onClick='editDeal("+row["DealId"]+",\"Arrival\")'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button><a href='/tasks/add?model=Deal&modelid=" +row["DealId"]+"' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Создать задачу'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span></a></div>";
}
function actionLinkDeparture(data, type, row, meta) {
	//return "<div class='btn-group' role='group'><a href='/contacts/add?Id=" +row["ContactId"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button id='del' class='btn btn-primary btn-xs' onClick='editDeal("+row["DealId"]+")'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></div>";
	return "<button class='btn btn-primary btn-xs' onClick='editDeal("+row["DealId"]+",\"Departure\")'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button><a href='/tasks/add?model=Deal&modelid=" +row["DealId"]+"' class='btn btn-primary btn-xs' data-toggle='tooltip' title='Создать задачу'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span></a></div>";
}


function AirportLinkArr(data, type, row, meta){
	
	var FlightA ="";
	if(row["FlightA"] !==null && row["FlightA"] !==""){
		FlightA = row["FlightA"]+ " - ";
	}
	
	if(row["AirportSite"] !==null && row["AirportSite"] !==""){
		var str = row["AirportSite"];
		var www = str.substring(0, 3);
		
		if(www == "www"){
			str ="http://"+str;
		}
		return "<a href='"+str+"' target='_blank'>"+FlightA + row["Airport"] + "</a>";
	}
	return FlightA + row["Airport"];
}


function AirportLinkDep(data, type, row, meta){
	var FlightB ="";	
	if(row["FlightB"] !==null && row["FlightB"] !==""){
			FlightB = row["FlightB"]+ " - ";
	}
	
	if(row["AirportSite"] !==null && row["AirportSite"] !==""){
		var str = row["AirportSite"];
		var www = str.substring(0, 3);
		
		if(www == "www"){
			str ="http://"+str;
		}
		return "<a href='"+str+"' target='_blank'>"+FlightB + row["Airport"] + "</a>";
	}
	return FlightB + row["Airport"];
}


function operatorLink(data, type, row, meta){
	if(row["OperatorName"] !==""){
		if(row["OperatorWebSite"] !==null && row["OperatorWebSite"] !==""){
			var str = row["OperatorWebSite"];
			var www = str.substring(0, 3);
			if(www == "www"){
				str ="http://"+str;
			}
			return "<a href='"+str+"' target='_blank'>"+row["OperatorName"] + "</a>";
		}
		return row["OperatorName"];
	}
}
	


$('#FlightArrivalDate').datetimepicker({
   format:'DD.MM.YYYY HH:mm',locale: 'ru',sideBySide: true});

$('#FlightDepartureDate').datetimepicker({
   format:'DD.MM.YYYY HH:mm',locale: 'ru',sideBySide: true});
   
//Подключаем поиск по select
$(document).ready(function() {
  $(".js-example-basic-single").select2();
  $(".select2.select2-container").css("width","100%");
});




function editDeal(row,type) {
	//console.log(row+"|"+type);
	$("#Type").val(type);
	$("#DealId").val(row);
	
	if (row !== "") {
	$('#addArrivalDiv').modal('show')
//$('#addArrivalDiv').modal('hide');
	var msg = {Id: row};
		
		$.ajax({
		  url: '/deals/getrowjson',
  		  type: "POST",
		  data: msg,
		  dataType: "json",
		  async:true,
		  beforeSend: function() {
			showLoader();
		  },
		  success: function(data){
		  	if(type=="Arrival"){
		  		$("#Flight").val(data[0].FlightA);
			    $("#FlightComments").val(data[0].FlightAComments);
			    $("#FlightArrivalDateInput").val(data[0].FlightAArrivalDate.substring(0, 16));
			    $("#FlightDepartureDateInput").val(data[0].FlightADepartureDate.substring(0, 16));
			    $("#FlightCityArrivalId").select2("trigger", "select", {
					    data: { id: data[0].FlightACityArrivalId }
					});
				$("#FlightCityDepartureId").select2("trigger", "select", {
					    data: { id: data[0].FlightACityDepartureId }
					});
				console.log(data[0].DocIssued);
				if(data[0].DocIssued===1){
					$('#DocIssued').attr('checked', true); // Checks it
				} else {
					$('#DocIssued').attr('checked', false); // Checks it
				}
					
					
					
		  	} else {
		  		$("#Flight").val(data[0].FlightB);
			    $("#FlightComments").val(data[0].FlightBComments);
			    $("#FlightArrivalDateInput").val(data[0].FlightBArrivalDate.substring(0, 16));
			    $("#FlightDepartureDateInput").val(data[0].FlightBDepartureDate.substring(0, 16));
			    $("#FlightCityArrivalId").select2("trigger", "select", {
					    data: { id: data[0].FlightBCityArrivalId }
					});
				$("#FlightCityDepartureId").select2("trigger", "select", {
					    data: { id: data[0].FlightBCityDepartureId }
					});
		  		
		  	}
		  },
		  complete: function() {
			hideLoader();
		  },
		});
	}
}



$('#addArrivalForm').validator().on('submit', function (e) {
	if (e.isDefaultPrevented()){
		console.log("Форма не прошла проверку");
	} else {
		e.preventDefault();
		var msg = $('#addArrivalForm').serialize();
		
	    $.when($.ajax({
				type: 'POST',
				url: "/deals/save_flight_ajax",
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
				console.log(res)
				if (res.status == "success") {
					if($("#Type").val() == "Arrival"){
						tableArrivals.ajax.reload().draw();
					} else {
						tableDeparture.ajax.reload().draw();
					}
					
					$('#addArrivalDiv').modal('hide');
					appAlert(res.message,res.status);

				} else {
					appAlert(res.message,res.status);
				}
			});
	}
})

