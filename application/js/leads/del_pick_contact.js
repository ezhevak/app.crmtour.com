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
	//selected_data: [{id: $("#ContactId").val(), FirstName: "DDSDS", LastName: "CXCX", MiddleName: "DSDS"}],
	//save_url: "http://crmm.studio-z.com.ua/leads/setContact",
	window_title: "Выберите клиента из существующих",
	grid_caption: "",
	init_text: $("#ContactPickLastName").val() + " " + $("#ContactPickFirstName").val(),
	link_param: "LeadId",
	link_id: $("#LeadId").val(),
	save_func: function(postData) {
		//console.log("savefunc:");
		//console.log(postData);
		$("#ContactId").val(postData.targetId);
		if (postData.rec_data !== undefined) {
			
			if(postData.rec_data.pickLastName !== ""){
				$("#LastName").val(postData.rec_data.pickLastName);
			}
			if(postData.rec_data.pickFirstName !== ""){
				$("#FirstName").val(postData.rec_data.pickFirstName);
			}
			if(postData.rec_data.pickMiddleName !== ""){
				$("#MiddleName").val(postData.rec_data.pickMiddleName);
			}
			if(postData.rec_data.pickPhone !== ""){
				$("#Phone").val(postData.rec_data.pickPhone);
			}
			if(postData.rec_data.pickEmail !== ""){
				$("#Email").val(postData.rec_data.pickEmail);
			}
			document.getElementById('Sex').value = postData.rec_data.pickSex;
			
			getContactInfo();
		}
	},
	clear_func: function() {
		$("#ContactId").val("");
		$("#ContactPickLastName").val("");
		$("#ContactPickFirstName").val("");
	},
	open_func: function() {
		$("#gs_pickContactpickData_pickPhone").inputmask("+38(099)999-9999");
	}
});

 
 
var pick = $("#pickPartner").jqGridPick({
	lang: 'ru',
	//width: 200,
	animation: false,
	uiType: "jqgrid",
	data_type: "contact",
	input_class: "input-sm",
  	input_button_class: "btn-sm",
	colNames: [/*'id',*/'№', 'Фамилия','Имя', 'Отчество','Телефон','Email'],
	colModel:[
	  //{name:'id',index:'id', width:60, sorttype:"int", key: true}, 
	  {name:'id',index:'id', width:50, sorttype:"int", key: true,hidden: true}, 
	  {name:'pickLastName',index:'pickLastName', width:180}, 
	  {name:'pickFirstName',index:'pickFirstName', width:120}, 
	  {name:'pickMiddleName',index:'pickMiddleName', width:120},
	  {name:'pickPhone',index:'pickPhone', width:180},
	  {name:'pickEmail',index:'pickEmail', width:180}
	],
	data_url: "/leads/getContact",
	window_title: "Связь с клиентом",
	grid_caption: "",
	init_text: $("#PartnerPickLastName").val() + " " + $("#PartnerPickFirstName").val(),
	link_param: "LeadId",
	link_id: $("#LeadId").val(),
	save_func: function(postData) {
		$("#PartnerId").val(postData.targetId);
		if (postData.rec_data !== undefined) {
		}
	},clear_func: function() {
		$("#PartnerId").val("");
	},
	open_func: function() {
		$("#gs_pickPartnerpickData_pickPhone").inputmask("+38(099)999-9999");
	}
});


/*

var pickLegal = $("#pickLegal").jqGridPick({
	lang: 'ru',
	//width: 200,
	animation: false,
	uiType: "jqgrid",
	data_type: "legal",
	input_class: "input-sm",
  	input_button_class: "btn-sm",
	colNames: ['№', 'Название юр. лица'],
	colModel:[
	  //{name:'id',index:'id', width:60, sorttype:"int", key: true}, 
	  {name:'id',index:'id', width:60, sorttype:"int", key: true}, 
	  {name:'pickLegalName',index:'pickLegalName', width:650}
	],
	data_url: "/leads/getLegal",
	//save_url: "http://crmm.studio-z.com.ua/leads/setContact",
	window_title: "Связь с юр. лицом",
	grid_caption: "",
	init_text: $("#LegLegalName").val(),
	link_param: "LeadId",
	link_id: $("#LeadId").val(),
	save_func: function(postData) {
		//console.log("savefunc:");
		//console.log(postData);
		$("#LegalId").val(postData.targetId);
		if (postData.rec_data !== undefined) {
			$("#LegalName").val(postData.rec_data.pickLegalName);
		}
	},
	clear_func: function() {
		$("#LegalId").val("");
	}
});*/