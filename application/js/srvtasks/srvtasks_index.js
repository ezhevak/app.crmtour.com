function on_load() {

}

//Коректная сортировка таблицы
$.fn.dataTable.moment('DD.MM.YYYY HH:mm:ss');

var table = $('#datatable-responsive').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/srvtasks/getlist",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
                  text: 'Добавить',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      window.location = '/add/add';
                  }
              }
              
          ],
        columns: [
            { 
            	"data": "Id",
		     //   "render": editLinkId,
		        "responsivePriority": 0,
		        "width": "10%"
            },
            { 
            	"data": "ManagerName",
		    //    "render": editLinkName,
		        "responsivePriority": 2,
		        "width": "25%"
            },
            { 
            	"data": "AccountName",
		        "responsivePriority": 7,
		        "width": "25%"
            },
            { 
            	"data": "Start",
		        "render": function(value){
		            if (value === null || value === '0000-00-00' ){
		            	return "";
		            } else {
		            	data =  moment(value, 'YYYY-MM-DD HH:mm:ss').format('DD.MM.YYYY HH:mm:ss');
		            	return data;
		            }
		         },
		        "responsivePriority": 5,
		        "width": "15%"
            },
            { 
            	"data": "End",
		        "render": function(value){
		            if (value === null || value === '0000-00-00' ){
		            	return "";
		            } else {
		            	data =  moment(value, 'YYYY-MM-DD HH:mm:ss').format('DD.MM.YYYY HH:mm:ss');
		            	return data;
		            }
		         },
		        "responsivePriority": 5,
		        "width": "15%"
            },
            { 
            	"data": "Name",
            	//"render":phoneLink,
		        "responsivePriority": 4,
		        "width": "25%"
            },
            { 
            	"data": "Comments",
            	//"render":emailLink,
		        "responsivePriority": 3,
		        "width": "25%"
            },
            { 
            	"data": "Status",
            	//"render":emailLink,
		        "responsivePriority": 3,
		        "width": "25%"
            },
            { 
            	"data": "Params",
            	//"render":emailLink,
		        "responsivePriority": 3,
		        "width": "25%"
            },
            { 
            	"data": null,
		        "render":actionLink,
		        "responsivePriority": 1,
		        "width": "10%"
            }
		] 
    } );


function actionLink(data, type, row, meta) {
	return "<div class='btn-group' role='group'><a href='/srvtasks/add?Id=" +row["Id"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button id='del' class='btn btn-danger btn-xs' onClick='deleteRecord("+row["Id"]+")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
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
					  url: '/srvtasks/delete?Id=' + row,
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




