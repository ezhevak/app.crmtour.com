var pick = $("#pickContact").jqGridPick({
	lang: 'ru',
	//width: 200,
	animation: false,
	uiType: "jqgrid",
	data_type: "contact",
	input_class: "input-sm",
  	input_button_class: "btn-sm",
	colNames: [/*'id',*/'№', 'Фамилия', 'Имя','Отчество','Телефон','Email','Пол'],
	colModel:[
	  //{name:'id',index:'id', width:60, sorttype:"int", key: true}, 
	  {name:'id',index:'id', width:50, sorttype:"int", key: true,hidden: true}, 
	  {name:'pickLastName',index:'pickLastName', width:180}, 
	  {name:'pickFirstName',index:'pickFirstName', width:120}, 
	  {name:'pickMiddleName',index:'pickMiddleName', width:120},
	  {name:'pickPhone',index:'pickPhone', width:180},
	  {name:'pickEmail',index:'pickEmail', width:180},
	  {name:'pickSex',index:'pickSex', width:180,hidden: true}//спрятанная техническая колонка для выбора Пола клиента в запросе.
	],
	data_url: "/leads/getContact",
	window_title: "Выберите клиента из существующих",
	grid_caption: "",
	init_text: $("#ContactPickLastName").val() + " " + $("#ContactPickFirstName").val(),
//	link_param: "Id",
//	link_id: $("#Id").val(),
	save_func: function(postData) {
		//console.log("savefunc:");
		console.log(postData);
		$("#ContactId").val(postData.targetId);
		if (postData.rec_data !== undefined) {
		//	$("#LastName").val(postData.rec_data.pickLastName);
		//	$("#FirstName").val(postData.rec_data.pickFirstName);
		//$("#MiddleName").val(postData.rec_data.pickMiddleName);
		//$("#Phone").val(postData.rec_data.pickPhone);
		//$("#Email").val(postData.rec_data.pickEmail);
		//	document.getElementById('Sex').value = postData.rec_data.pickSex;
		}
	},
	clear_func: function() {
		$("#ContactId").val("");
		$("#ContactPickLastName").val("");
		$("#ContactPickFirstName").val("");
	},
	open_func: function() {
	//	$("#gs_pickContactpickData_pickPhone").inputmask("+38(099)999-9999");
	}
});