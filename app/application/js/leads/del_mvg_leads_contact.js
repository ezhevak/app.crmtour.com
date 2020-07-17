var pickLead = $("#pickListLead").jqGridMVG({
  lang: 'ru',
  width: 300,
  animation: false,
  input_class: "input-sm",
  input_button_class: "btn-sm",
  uiType: "jqgrid",
  colNames: [/*'id',*/'id', 'FirstName','LastName', 'MiddleName'],
  colModel:[
  	//{name:'id',index:'id', width:60, sorttype:"int", key: true}, 
  	{name:'id',index:'id', width:60, sorttype:"int", key: true}, 
  	{name:'FirstName',index:'FirstName', width:90}, 
  	{name:'LastName',index:'LastName', width:100}, 
  	{name:'MiddleName',index:'MiddleName', width:100}
  ],
  data_url: "//app.crmtour.com/leads/getMVGList",
  window_title: "Связь с клиентом",
  assoc_caption: 'Список лидов',
  selected_caption: 'Выбранные',
  //selected_data: [{"id":58,"FirstName":"dasdas","LastName":"sdsadadas","MiddleName":"fdsfsd"}]
  //data: [{"Id":58,"FirstName":"dasdas","LastName":"sdsadadas","MiddleName":"fdsfsd"},{"Id":71,"FirstName":"UserId","LastName":"","MiddleName":""},{"Id":74,"FirstName":"testcore","LastName":"testcore","MiddleName":"testcore"},{"Id":61,"FirstName":"\u0415\u0432\u0433\u0435\u043d\u0438\u0439","LastName":"\u0416\u0435\u0432\u0430\u043a","MiddleName":"fdsfsd"},{"Id":59,"FirstName":"test1","LastName":"tratra","MiddleName":"test2"},{"Id":65,"FirstName":"dasdas","LastName":"test","MiddleName":"fdsfsd"},{"Id":66,"FirstName":"dasdas","LastName":"test","MiddleName":"fdsfsd"},{"Id":70,"FirstName":"fdsfsd","LastName":"fdsfds","MiddleName":"fdsfds"},{"Id":76,"FirstName":"testcore2","LastName":"testcore2","MiddleName":"testcore2"},{"Id":77,"FirstName":"testcore3","LastName":"\u0423\u0440\u0430","MiddleName":"testcore3"},{"Id":67,"FirstName":"\u0421\u0443\u043f\u0435\u0440","LastName":"\u041d\u043e\u0432\u044b\u0439","MiddleName":"\u041a\u043b\u0438\u0435\u043d\u0442"},{"Id":69,"FirstName":"tuktukerof","LastName":"ssss","MiddleName":""},{"Id":78,"FirstName":"testcore4","LastName":"testcore4","MiddleName":"testcore4"}]
});
