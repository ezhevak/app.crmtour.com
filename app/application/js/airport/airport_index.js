var table = $('#datatable-responsive').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/airport/getlist",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
    	dom: 'Bftlpi',
        buttons: [
              {
                  text: 'Добавить',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      window.location = '/airport/add';
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
            	"data": "AirportCountry",
		        "responsivePriority": 4,
		        "width": "25%"
            },
            { 
            	"data": "AirportCity",
		        "responsivePriority": 5,
		        "width": "25%"
            },
            { 
            	"data": "AirportName",
		        "responsivePriority": 2,
		        "width": "25%"
            },
            { 
            	"data": "AirportCode",
		        "responsivePriority": 3,
		        "width": "25%"
            },
            { 
            	"data": "AirportSite",
		        "responsivePriority": 3,
		        "width": "25%",
		        "render": function(value){
		        	if (value === null || value==="" ){ 
		            	return "";
		            } else {
		            	return '<a href="' + value + '" target="_blank"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a>';
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
        data = '<a href="/airport/add?Id=' + row["Id"] + '">' + row["Id"] + '</a>';
    }
    return data;
}


function actionLink(data, type, row, meta) {
	return "<div class='btn-group' role='group'><a href='/airport/add?Id=" +row["Id"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></div>";
}




