var pickContactMVG = $("#pickContactMVG").jqGridMVG({
  width: 600,
  animation: false,
  uiType: "jqgrid",
  control: "button",
  input_button_class: "btn-sm",
  lang: "ru",
  colNames: ['id', 'Фамилия','Имя', 'Отчество'],
  colModel:[
  	{name:'id',index:'id', width:60, sorttype:"int", key: true, hidden: true}, 
  	{name:'pickLastName',index:'pickLastName', width:100}, 
  	{name:'pickFirstName',index:'pickFirstName', width:90}, 
  	{name:'pickMiddleName',index:'pickMiddleName', width:100}
  ],
  data_url: "/contacts/getMVGList?Type=Contact&ContactId="+$("#Id").val(),
  del_url: "/contacts/delMVGList?Type=Contact&ContactId="+$("#Id").val(),
  add_url: "/contacts/addMVGList?Type=Contact&ContactId="+$("#Id").val(),
  edit_url: "/contacts/editMVGList",
  editColumns: [
  	{name:'pickLinkType',index:'pickLinkType', width:100, label: 'Тип связи'}
  ],
  onchange: function() {
  	$('#grid_contact_to_contact').trigger( 'reloadGrid' );
  },
  window_title: "Связи с контактами",
  selected_caption: "Выбранные записи",
  assoc_caption: "Доступные для выбора записи"
});


var pickLegalMVG = $("#pickLegalMVG").jqGridMVG({
  width: 600,
  animation: false,
  uiType: "jqgrid",
  control: "button",
  input_button_class: "btn-sm",
  lang: "ru",
  colNames: ['id', 'ЕДРПОУ', 'Название Юр.лица'],
  colModel:[
  	{name:'id',index:'id', width:60, sorttype:"int", key: true, hidden: true}, 
  	{name:'pickLegalCode',index:'pickLegalCode', width:120}, 
  	{name:'pickLegalName',index:'pickLegalName', width:170}, 
  ],
  editColumns: [
  	{name:'pickLinkType',index:'pickLinkType', width:100, label: 'Тип связи'}
  ],
  data_url: "/contacts/getMVGList?Type=Legal&ContactId="+$("#Id").val(),
  del_url: "/contacts/delMVGList?Type=Legal&ContactId="+$("#Id").val(),
  add_url: "/contacts/addMVGList?Type=Legal&ContactId="+$("#Id").val(),
  edit_url: "/contacts/editMVGListLegal",
  onchange: function() {
  	$("#grid_contact_to_legal").trigger('reloadGrid');
  },
  window_title: "Связи с юр. лицами",
  selected_caption: "Выбранные записи",
  assoc_caption: "Доступные для выбора записи"
});
