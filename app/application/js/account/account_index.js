var table = $('#datatable-responsive-branches').DataTable( {
    	language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        sAjaxSource: "/account/getlist_branches",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
    	
        buttons: [
              {
              	  text: 'Добавить',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      window.location = '/account/add_branch';
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
            	"data": "BranchName",
		        //"render":editLastName,
		        "responsivePriority": 3,
		        "width": "25%"
            },
            { 
            	"data": "BranchJurAddress",
		        //"render":editFirstName,
		        "responsivePriority": 8,
		        "width": "25%"
		        
            },
            { 
            	"data": "BranchFactAddress",
		        //"render":editFirstName,
		        "responsivePriority": 7,
		        "width": "25%"
		        
            },
            { 
            	"data": "BranchPhone",
		        //"render":editFirstName,
		        "responsivePriority": 6,
		        "width": "25%"
		        
            },
            { 
            	"data": "BranchFax",
		        //"render":editFirstName,
		        "responsivePriority": 5,
		        "width": "25%"
		        
            },
            { 
            	//"data": "BranchMobile",
		        "render":phoneLink,
		        "responsivePriority": 2,
		        "width": "25%"
		        
            },
            { 
            	//"data": "BranchEmail",
		        "render":emailLink,
		        "responsivePriority": 3,
		        "width": "25%"
		        
            },
            { 
            	"data": "BranchDirectorName",
		        //"render":editFirstName,
		        "responsivePriority": 4,
		        "width": "25%"
		        
            },
            { 
            	"data": "Inactive",
		        "responsivePriority": 5,
		        "width": "25%",
		        "render":function(value){
		        	if(value==1){
		        		return '<input type="checkbox" checked="checked" onclick="return false"/>';
		        	} else {
		        		return '<input type="checkbox" onclick="return false"/>';
		        	}
		        }
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
        data = '<a href="/account/add_branch?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
    }
    return data;
}

function actionLink(data, type, row, meta) {
	//var isDisable = "";
	var isEditURL = "";
	
	//if( $("#GlobalUserRole").val() != "admin"){
	//	isDisable = "disabled data-toggle=\"tooltip\" title=\"Удаление запрещено!\"";
	//}
	return "<div class='btn-group' role='group'><a href='/account/add_branch?Id=" +row["Id"]+"'  target='_blank' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></div>";
	
}

function emailLink(data, type, row, meta) {
	if(row["BranchEmail"] ===""){
    	return "";
    }else {
		return "<a href='mailto:" +row["BranchEmail"]+"'>"+row["BranchEmail"]+"</a>";
    }
}
function phoneLink(data, type, row, meta) {
	if(row["BranchMobile"] ===""){
    	return "";
    }else {
		return "<a href='tel:" +row["BranchMobile"]+"'>"+row["BranchMobile"]+"</a>";
    }
}



/*var tablePayments = $('#datatable-responsive-payments').DataTable( {
    	language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        
        sAjaxSource: "/account/getlist_payments",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'ftlpi',
        columns: [
            { 
            	"data": "Id",
		        "responsivePriority": 0,
		        "width": "10%"
            },
			{ 
            	"data": "PayType",
		        "responsivePriority": 2
            },
            { 
            	"data": "AmountUSD",
		        "responsivePriority": 3
		        
            },
            { 
            	"data": "Comments",
		        "responsivePriority": 4,
		        "width": "25%"
		        
            },
            { 
            	"data": "Date",
		        "responsivePriority": 1,
		        //"width": "25%",
		        "render": function(value){
		            if (value === null) return "";
		            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
		            return data;
		         }
            }
		] 
    } );
    */
    
var tableSms = $('#datatable-responsive-sms').DataTable( {
    	language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        
        sAjaxSource: "/account/getlist_sms",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
              	  text: 'Обновить статусы',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      getSMS_status(e);
                  }
              }
          ],
        columns: [
            { 
            	"data": "Id",
		        "responsivePriority": 0,
		        "width": "10%"
            },
            { 
            	"data": "Created",
		        "responsivePriority": 1,
		        "render": function(value){
		            if (value === null) return "";
		            data =  moment(value, 'YYYY-MM-DD HH:mm').format('DD.MM.YYYY HH:mm');
		            return data;
		         }
            },
			{ 
            	"data": "Address",
		        "responsivePriority": 2
            },
            { 
            	"data": "Text",
		        "responsivePriority": 3
            },
            { 
            	"data": "Status",
		        "responsivePriority": 4,
		        "width": "25%"
            },
            { 
            	"data": "LastName",
		        "responsivePriority": 4,
		        "width": "25%"
            },
            { 
            	"data": "FirstName",
		        "responsivePriority": 4,
		        "width": "25%"
            },
            { 
            	"data": "MiddleName",
		        "responsivePriority": 4,
		        "width": "25%"
            },
            { 
            	"data": "SegmentName",
		        "responsivePriority": 4,
		        "width": "25%"
            }
		] 
    } );
    
    
    
    function getSMS_status(e){
		console.log("Попоытка получить статусы сообщений");
  		e.preventDefault();
  	
	    $.when($.ajax({
				type: 'POST',
				url: "/account/sms_status",
		        processData: false,
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
					appAlert(res.message,res.status);
					tableSms.ajax.reload();
				} else {
					appAlert(res.message,res.status);
				}
			});
	
		return false;
    } 

