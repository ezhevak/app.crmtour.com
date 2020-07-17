var pickContactMVG = $("#pickContactMVG").jqGridMVG({
  width: 600,
  animation: false,
  uiType: "jqgrid",
  control: "button",
  input_button_class: "btn-sm",
  lang: "ru",
  colNames: [/*'id',*/'id', 'Фамилия','Имя', 'Отчество'],
  colModel:[
  	//{name:'id',index:'id', width:60, sorttype:"int", key: true}, 
  	{name:'id',index:'id', width:60, sorttype:"int", key: true}, 
  	{name:'pickLastName',index:'pickLastName', width:100}, 
  	{name:'pickFirstName',index:'pickFirstName', width:90}, 
  	{name:'pickMiddleName',index:'pickMiddleName', width:100}
  ],
  data_url: "/contacts/getMVGList?Type=Contact&ContactId="+$("#Id").val(),
  del_url: "/contacts/delMVGList?Type=Contact&ContactId="+$("#Id").val(),
  add_url: "/contacts/addMVGList?Type=Contact&ContactId="+$("#Id").val(),
  onchange: function() {
  	$('#grid_contact_to_contact').trigger( 'reloadGrid' );
  },
  window_title: "Связи с контактами",
  selected_caption: "Выбранные записи",
  assoc_caption: "Доступные для выбора записи"
  //data: [{"Id":58,"FirstName":"dasdas","LastName":"sdsadadas","MiddleName":"fdsfsd"},{"Id":71,"FirstName":"UserId","LastName":"","MiddleName":""},{"Id":74,"FirstName":"testcore","LastName":"testcore","MiddleName":"testcore"},{"Id":61,"FirstName":"\u0415\u0432\u0433\u0435\u043d\u0438\u0439","LastName":"\u0416\u0435\u0432\u0430\u043a","MiddleName":"fdsfsd"},{"Id":59,"FirstName":"test1","LastName":"tratra","MiddleName":"test2"},{"Id":65,"FirstName":"dasdas","LastName":"test","MiddleName":"fdsfsd"},{"Id":66,"FirstName":"dasdas","LastName":"test","MiddleName":"fdsfsd"},{"Id":70,"FirstName":"fdsfsd","LastName":"fdsfds","MiddleName":"fdsfds"},{"Id":76,"FirstName":"testcore2","LastName":"testcore2","MiddleName":"testcore2"},{"Id":77,"FirstName":"testcore3","LastName":"\u0423\u0440\u0430","MiddleName":"testcore3"},{"Id":67,"FirstName":"\u0421\u0443\u043f\u0435\u0440","LastName":"\u041d\u043e\u0432\u044b\u0439","MiddleName":"\u041a\u043b\u0438\u0435\u043d\u0442"},{"Id":69,"FirstName":"tuktukerof","LastName":"ssss","MiddleName":""},{"Id":78,"FirstName":"testcore4","LastName":"testcore4","MiddleName":"testcore4"}]
});
mobile_grid("pickContactMVG");
var pickLegalMVG = $("#pickLegalMVG").jqGridMVG({
  width: 600,
  animation: false,
  uiType: "jqgrid",
  control: "button",
  input_button_class: "btn-sm",
  lang: "ru",
  colNames: [/*'id',*/'id', 'ЕДРПОУ', 'Название Юр.лица'/*, 'Имя','Фамилия', 'Отчество'*/],
  colModel:[
  	//{name:'id',index:'id', width:60, sorttype:"int", key: true}, 
  	{name:'id',index:'id', width:60, sorttype:"int", key: true}, 
  	{name:'pickLegalCode',index:'pickLegalCode', width:120}, 
  	{name:'pickLegalName',index:'pickLegalName', width:170}, 
  	//{name:'pickFirstName',index:'pickFirstName', width:90}, 
  	//{name:'pickLastName',index:'pickLastName', width:100}, 
  	//{name:'pickMiddleName',index:'pickMiddleName', width:100}
  ],
  data_url: "/contacts/getMVGList?Type=Legal&ContactId="+$("#Id").val(),
  del_url: "/contacts/delMVGList?Type=Legal&ContactId="+$("#Id").val(),
  add_url: "/contacts/addMVGList?Type=Legal&ContactId="+$("#Id").val(),
  onchange: function() {
  	$("#grid_contact_to_legal").trigger('reloadGrid');
  },
  window_title: "Связи с юр. лицами",
  selected_caption: "Выбранные записи",
  assoc_caption: "Доступные для выбора записи"
  //data: [{"Id":58,"FirstName":"dasdas","LastName":"sdsadadas","MiddleName":"fdsfsd"},{"Id":71,"FirstName":"UserId","LastName":"","MiddleName":""},{"Id":74,"FirstName":"testcore","LastName":"testcore","MiddleName":"testcore"},{"Id":61,"FirstName":"\u0415\u0432\u0433\u0435\u043d\u0438\u0439","LastName":"\u0416\u0435\u0432\u0430\u043a","MiddleName":"fdsfsd"},{"Id":59,"FirstName":"test1","LastName":"tratra","MiddleName":"test2"},{"Id":65,"FirstName":"dasdas","LastName":"test","MiddleName":"fdsfsd"},{"Id":66,"FirstName":"dasdas","LastName":"test","MiddleName":"fdsfsd"},{"Id":70,"FirstName":"fdsfsd","LastName":"fdsfds","MiddleName":"fdsfds"},{"Id":76,"FirstName":"testcore2","LastName":"testcore2","MiddleName":"testcore2"},{"Id":77,"FirstName":"testcore3","LastName":"\u0423\u0440\u0430","MiddleName":"testcore3"},{"Id":67,"FirstName":"\u0421\u0443\u043f\u0435\u0440","LastName":"\u041d\u043e\u0432\u044b\u0439","MiddleName":"\u041a\u043b\u0438\u0435\u043d\u0442"},{"Id":69,"FirstName":"tuktukerof","LastName":"ssss","MiddleName":""},{"Id":78,"FirstName":"testcore4","LastName":"testcore4","MiddleName":"testcore4"}]
});
mobile_grid("pickLegalMVG");