function on_load() {

   
   //Коректная сортировка таблицы
   $.fn.dataTable.moment('DD.MM.YYYY HH:mm');

   //var login = $('#login-responsive').DataTable( {
   //		language: {url: '/vendor/datatables/langs/Russian.json'},
   // 	stateSave: true, //сохранение введённой информации и страницы
   // 	responsive: true, //Адаптивность таблицы
   //     //ajax: "/issues/getlistdb",
   //     sAjaxSource: "/admin/getSessions",
   //     sAjaxDataProp: "",
   //     deferRender: true,
   //     rowId: 'Id',
   //    // dom: 'Bftlpi',
   //    // buttons: [
   //    //       {
   //    //           text: 'Добавить',
   //    //           className: 'btn btn-primary',
   //    //           action: function ( e, dt, node, config ) {
   //    //               window.location = '/notes/add';
   //    //           }
   //    //       }
   //    //   ],
   //     columns: [
   //         { 
   //         	"data": "Id",
   //		        //"render": editLinkId,
   //		        "responsivePriority": 1,
   //		        "width": "10%"
   //         },
   //         { 
   //         	"data": "ManagerName",
   //		        "responsivePriority": 0,
   //		        "width": "10%"
   //         },
   //         { 
   //         	"data": "AccountName",
   //		        "responsivePriority": 2,
   //		        "width": "10%"
   //         },
   //         { 
   //         	"data": "LogIn",
   //		        "render": function(value){
   //		            if (value === null) return "";
   //		            data =  moment(value, 'YYYY-MM-DD HH:mm').format('DD.MM.YYYY HH:mm');
   //		            return data;
   //		         },
   //		        "responsivePriority": 3,
   //		        "width": "25%"
   //         },
   //         { 
   //         	"data": "LogOut",
   //		        "render": function(value){
   //		            if (value === null) return "";
   //		            data =  moment(value, 'YYYY-MM-DD HH:mm').format('DD.MM.YYYY HH:mm');
   //		            return data;
   //		         },
   //		        "responsivePriority": 4,
   //		        "width": "25%"
   //         },
   //         { 
   //         	"data": "Platform",
   //		        "responsivePriority": 5,
   //		        "width": "20%"
   //         }
   //		] 
   // } )
   // 
   // 
    
    
   var online = $('#online-responsive').DataTable( {
		language: {url: '/vendor/datatables/langs/Russian.json'},
    	stateSave: true, //сохранение введённой информации и страницы
    	responsive: true, //Адаптивность таблицы
        //ajax: "/issues/getlistdb",
        sAjaxSource: "/admin/getUserOnline",
        sAjaxDataProp: "",
        deferRender: true,
        rowId: 'Id',
       // dom: 'Bftlpi',
       // buttons: [
       //       {
       //           text: 'Добавить',
       //           className: 'btn btn-primary',
       //           action: function ( e, dt, node, config ) {
       //               window.location = '/notes/add';
       //           }
       //       }
       //   ],
        columns: [
            { 
            	"data": "Id",
		        "responsivePriority": 1,
		        "width": "10%"
            },
            { 
            	"data": "AccountName",
		        "responsivePriority": 0,
		        "width": "10%"
            },
            { 
            	"data": "ManagerName",
		        "responsivePriority": 2,
		        "width": "10%"
            },
            { 
            	"data": "FirstName",
		        "responsivePriority": 3,
		        "width": "10%"
            },
            { 
            	"data": "LastName",
		        "responsivePriority": 4,
		        "width": "10%"
            },
            { 
            	"data": "LogIn",
		        "render": function(value){
		            if (value === null) return "";
		            data =  moment(value, 'YYYY-MM-DD HH:mm').format('DD.MM.YYYY HH:mm');
		            return data;
		         },
		        "responsivePriority": 5,
		        "width": "25%"
            },
            { 
            	"data": "Phone",
		        "responsivePriority": 6,
		        "width": "10%"
            },
            { 
            	"data": "Email",
		        "responsivePriority": 7,
		        "width": "10%"
            }
		],
   		order: [[5, 'asc']]
    } )
    
   //var billing = $('#billing-responsive').DataTable( {
   //		language: {url: '/vendor/datatables/langs/Russian.json'},
   // 	//,stateSave: true, //сохранение введённой информации и страницы
   // 	responsive: true, //Адаптивность таблицы
   //     //ajax: "/issues/getlistdb",
   //     sAjaxSource: "/admin/getBilling",
   //     sAjaxDataProp: "",
   //     deferRender: true,
   //     rowId: 'Id',
   //     dom: 'Bftlpi',
   //     buttons: [
   //           {
   //               text: 'Добавить',
   //               className: 'btn btn-primary',
   //               action: function ( e, dt, node, config ) {
   //                   window.location = '/admin/add_payment';
   //               }
   //           }
   //       ],
   //     columns: [
   //         { 
   //         	"data": "Id",
   //		        "responsivePriority": 0,
   //		        "width": "5%"
   //         },
   //         { 
   //         	"data": "Name",
   //		        "responsivePriority": 1,
   //		        "width": "10%"
   //         },
   //         { 
   //         	"data": "Created",
   //		        "render": function(value){
   //		            if (value === null) return "";
   //		            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
   //		            return data;
   //		         },
   //		        "responsivePriority": 3,
   //		        "width": "25%"
   //         },
   //         { 
   //         	"data": "BillingStart",
   //		        "render": function(value){
   //		            if (value === null) return "";
   //		            data =  moment(value, 'DD.MM.YYYY').format('DD.MM.YYYY');
   //		            return data;
   //		         },
   //		        "responsivePriority": 4,
   //		        "width": "25%"
   //         },
   //         { 
   //         	"data": "LastLogIn",
   //		        "render": function(value){
   //		            if (value === null) return "";
   //		            data =  moment(value, 'YYYY-MM-DD').format('DD.MM.YYYY');
   //		            return data;
   //		         },
   //		        "responsivePriority": 5,
   //		        "width": "25%"
   //         },
   //         { 
   //         	"data": "CountLogIn",
   //		        "responsivePriority": 6,
   //		        "width": "10%"
   //         },
   //         { 
   //         	"data": "OrderAmount",
   //		        "responsivePriority": 7,
   //		        "width": "10%"
   //         },
   //         { 
   //         	"data": "PayAmount",
   //		        "responsivePriority": 8,
   //		        "width": "10%"
   //         },
   //         { 
   //         	"data": "Balance",
   //		        "responsivePriority": 2,
   //		        "width": "10%"
   //         },
   //         { 
   //         	"data": null,
   //		        "render":actionLink,
   //		        "responsivePriority": 9,
   //		        "width": "10%"
   //         }
   //		],
   //		order: [[8, 'asc']]
   // } )    
    
    
function actionLink(data, type, row, meta) {
	return "<div class='btn-group' role='group'><a href='#?Id=" +row["Id"]+"' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-usd' aria-hidden='true'></span></a></div>";
}

    
}