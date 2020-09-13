let enabledBtn;

if($("#GlobalAccId").val() !==120){
	enabledBtn = true
} else {
	enabledBtn = false 
}

var table = $('#datatable-responsive').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/notes/getlist",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
                  text: 'Добавить',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      window.location = '/notes/add';
                  },
                  enabled : enabledBtn
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
            	"data": "Name",
		        "responsivePriority": 3,
		        "width": "25%"
            },
            { 
            	"data": "Created",
		        "render": function(value){
		            if (value === null) return "";
		            data =  moment(value, 'YYYY-MM-DD HH:mm').format('DD.MM.YYYY HH:mm');
		            return data;
		         },
		        "responsivePriority": 2,
		        "width": "15%"
            },           //{ "data": "LastUpdate" },
            { 
            	"data": null,
		        "render":actionLink,
		        "responsivePriority": 1,
		        "width": "10%"
            }
		] 
    } )
    
    console.log(table.buttons([0]).enabled);
    //table.buttons([0]).enabled = false ;
    

function editLinkId(data, type, row, meta){
	if(type === 'display'){
        data = '<a href="/notes/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
    }
    return data;
}


function actionLink(data, type, row, meta) {
	return "<div class='btn-group' role='group'><a href='/notes/add?Id=" +row["Id"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><button id='del' class='btn btn-danger btn-xs' onClick='deleteRecord("+row["Id"]+")'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>";
}

function deleteRecord(row) {
	if (row !== "") {

		$.ajax({
		  dataType: 'json',
		  url: '/notes/delete?Id=' + row,
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
}






