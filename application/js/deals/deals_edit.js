function on_load() {
	
	
		
	if( $("#ContactId").val() >0){
		//console.log("1");
		document.title = "CRM Tour - сделка " + $("#DealNo").val() + " " + $("#ContactPickFirstName").val() + " " +$("#ContactPickLastName").val();
	}

	//Подключаем поиск по select	
	$(".js-example-basic-single").select2({
	    theme: "bootstrap"
	});
	
	//$(".select2.select2-container").css("width","100%");
	$('.form-control').tooltip();
	
	
	$('#FlightAArrivalDate').datetimepicker({locale: 'ru',sideBySide: true});
	$('#FlightADepartureDate').datetimepicker({locale: 'ru',sideBySide: true});
	$('#FlightBArrivalDate').datetimepicker({locale: 'ru',sideBySide: true});
	$('#FlightBDepartureDate').datetimepicker({locale: 'ru',sideBySide: true});
	
	$('#DealDate').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});
	
	$('#DateFullPay').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});
	
	
	$('#DateArrival').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});
	
	$('#DateDeparture').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});
	
	
	
	$("#addOperDealDateStart").inputmask("dd.mm.yyyy");
	$("#addOperDealDateEnd").inputmask("dd.mm.yyyy");
	
	$('#addOperDealDateStart').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});
	$('#addOperDealDateEnd').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});
	
	$('#OperatorInvoceDate').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});
	
	
	
	$('#ActDate').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});


	$("#addOperPhone").inputmask("+99(999)999-9999");
	$("#addHotelPhone").inputmask("+99(999)999-9999");
	$("#addHotelFax").inputmask("+99(999)999-9999");
	
	
	$("#DealDate").inputmask("dd.mm.yyyy");
	$("#OperatorInvoceDate").inputmask("dd.mm.yyyy");
	$("#ActDate").inputmask("dd.mm.yyyy");
	$("#DateFullPay").inputmask("dd.mm.yyyy");
	$("#DateArrival").inputmask("dd.mm.yyyy");
	$("#DateDeparture").inputmask("dd.mm.yyyy");
	
	$("#FlightAArrivalDate").inputmask('datetime', {
	    mask: "1.2.y h:s",
	    placeholder: "dd.mm.yyyy hh:mm",
	    separator: '.'
	});
	
	$("#FlightADepartureDate").inputmask('datetime', {
	    mask: "1.2.y h:s",
	    placeholder: "dd.mm.yyyy hh:mm",
	    separator: '.'
	});
	
	$("#FlightBArrivalDate").inputmask('datetime', {
	    mask: "1.2.y h:s",
	    placeholder: "dd.mm.yyyy hh:mm",
	    separator: '.'
	});
	
	$("#FlightBDepartureDate").inputmask('datetime', {
	    mask: "1.2.y h:s",
	    placeholder: "dd.mm.yyyy hh:mm",
	    separator: '.'
	});

	//при установлении суммы предоплаты, поле % предоплаты расчитывается автоматически.
	$("#CommercialCourse").on("change", function() {
	 calcSum();
	});
	
	$("#DealSumEquivalent").on("change", function() {
	 calcSum();
	});
	
	$("#DealSum").on("change", function() {
	 calcVal();
	});
	
	$("#DealCurrency").on("change", function() {
	  setCourse($("#DealCurrency").val(),$("#CommercialCourse").val());
	  calcSum();
	});
	 
	//устанавливаем курс по умолчанию 1 для валюты grn
	setCourse(setCourse($("#DealCurrency").val(),$("#CommercialCourse").val()));
	 
	$("#DateArrival").on("change", function() {
		setDateDeparture();
	});
	  
	$("#AmountNight").on("change", function() {
		setDateDeparture();
	});
	

	$("#FlightA").on('focusout', function(){
	    setFlightADate();
	});
	 
	$("#FlightB").on('focusout', function(){
	    setFlightBDate();
	});
 
 
	function setFlightADate() {
		var new_date = moment(moment($("#DateArrival").val(), 'DD.MM.YYYY', false).format()).format('DD.MM.YYYY HH:mm');
		var FlightAArrivalDate	 = $("#FlightAArrivalDate").val();
		var FlightADepartureDate = $("#FlightADepartureDate").val();
		
		if(FlightAArrivalDate === ""){
			$("#FlightAArrivalDate").val(new_date);
		}
		if(FlightADepartureDate === ""){
			$("#FlightADepartureDate").val(new_date);
		}
	}
	
	
	
	function setFlightBDate() {
		var new_date = moment(moment($("#DateDeparture").val(), 'DD.MM.YYYY', false).format()).format('DD.MM.YYYY HH:mm');
		var FlightBArrivalDate	 = $("#FlightBArrivalDate").val();
		var FlightBDepartureDate = $("#FlightBDepartureDate").val();
		
		if(FlightBArrivalDate === ""){
			$("#FlightBArrivalDate").val(new_date);
		}
		if(FlightBDepartureDate === ""){
			$("#FlightBDepartureDate").val(new_date);
		}
	}
	 //при установлении суммы предоплаты, поле % предоплаты расчитывается автоматически.
	 $("#PrePaySum").on("change", function() {
	 	setPrePayPercent();
	 });
	 
	 $("#PrePayPercent").on("change",function(){
	 	setPrePaySum();
	 })
	 
	 
	 
	 
 
	  //при установлении суммы предоплаты, поле % предоплаты расчитывается автоматически.
	$("#OperatorInvoceSum").on("change", function() {
		validateOperatorInvoceSum();
	});
	 
	$('#LegalId').select2({
    	theme: "bootstrap",
		placeholder: 'Введите название компании',
		multiple: false,
		ajax: {
		  url: '/legal/getlistitems',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		  	//console.log(data);
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	 
	
	$('#contUserId').select2({
    	theme: "bootstrap",
		placeholder: 'Выберите менеджера',
		multiple: false,
		ajax: {
		  url: '/users/getUsersListItems',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	}); 
	
	$('#UserId').select2({
    	theme: "bootstrap",
		placeholder: 'Выберите менеджера',
		multiple: false,
		ajax: {
		  url: '/users/getUsersListItems',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	
	$('#OperatorName').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Введите название оператора',
		multiple: false,
		ajax: {
		  url: '/operators/getOperatorsListItems',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		  	//console.log(data);
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#addRegionRating').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите рейтинг курорта',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=Rating',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#addHotelStars').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите количество звёст',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=HotelStars',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	
	$('#addHotelRating').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите оценку отеля',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=Rating',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#addHotelBeach').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите тип пляжа',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=HotelBeach',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	
	$('#addHotelType').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите тип отеля',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=HotelType',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#addHotelBeachLine').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите линию пляжа',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=HotelBeachLine',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#contSource').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите источник',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=LeadSource',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#FeedName').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите питание',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=FeedType',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#FlatType').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите тип номера',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=FlatType',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#RoomViewName').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите вид из номера',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=RoomView',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#TransferName').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите трансфер',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=Transfer',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#PlacingType').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите Размещение',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=PlacingType',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#AgentClient').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите агент или клиент',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=AgentClient',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#FlightACityArrivalId').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите аэропорт',
		multiple: false,
		ajax: {
		  url: '/airport/getArportsListItems?type=AgentClient',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#FlightACityDepartureId').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите аэропорт',
		multiple: false,
		ajax: {
		  url: '/airport/getArportsListItems?type=AgentClient',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#FlightBCityArrivalId').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите аэропорт',
		multiple: false,
		ajax: {
		  url: '/airport/getArportsListItems?type=AgentClient',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#FlightBCityDepartureId').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите аэропорт',
		multiple: false,
		ajax: {
		  url: '/airport/getArportsListItems?type=AgentClient',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	$('#DirectionId').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите страну',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDirectionsListItems',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	

	$('#cascadingdropdown').cascadingDropdown({
		selectBoxes: [
			{
				selector: '#DirectionName',
				source: function(request, response) {
					$.getJSON('/dictionary/getDirections', request, function(data) {
						var selectOnlyOption = -1;
						var direction_ctrl = $("#DirectionName");
						if (direction_ctrl.data("selected") !== undefined)
							selectOnlyOption = parseInt(direction_ctrl.data("selected"));
						//console.log("DirectionIndex:" + selectOnlyOption);
						response($.map(data, function(item, index) {
							var selectedIndex = 0;
							if (item.Id === selectOnlyOption)
								selectedIndex = index+1;
							//console.log("DirectionSelIdx:" + selectedIndex);
							return {
								label: item.DirectionName,
								value: item.Id,
								selected: selectedIndex
							};
						}));
					});
				}
			},
			{
				selector: '#RegionName',
				requires: ['#DirectionName'],
				source: function(request, response) {
					$.getJSON('/dictionary/getRegions', request, function(data) {
						
						var selectOnlyOption = -1;
						var region_ctrl = $("#RegionName");
						if (region_ctrl.data("selected") !== undefined)
							selectOnlyOption = parseInt(region_ctrl.data("selected"));
						response($.map(data, function(item, index) {
							var selectedIndex = 0;
							if (item.Id === selectOnlyOption)
								selectedIndex = index+1;
							return {
								label: item.RegionName,
								value: item.Id,
								selected: selectedIndex
							};
						}));
					});
				}
			},
			{
				selector: '#HotelName',
				requires: ['#DirectionName'],
				requireAll: true,
				source: function(request, response) {
					$.getJSON('/dictionary/getHotels', request, function(data) {
						var selectOnlyOption = -1;
						var hotel_ctrl = $("#HotelName");
						if (hotel_ctrl.data("selected") !== undefined)
							selectOnlyOption = parseInt(hotel_ctrl.data("selected"));
						response($.map(data, function(item, index) {
							var selectedIndex = 0;
							if (item.Id === selectOnlyOption)
								selectedIndex = index+1;
							return {
								label: item.HotelName + " " + item.HotelStarsName,
								value: item.Id,
								selected: selectedIndex
							};
						}));
					});
				},
				onChange: function(event, value, requiredValues){
					// do stuff
				}
			}
		],
		onReady: function(event, allValues) {
			//console.log("ready");
		}
	});
 	
 	
	 
	 //Обновляем список документов связанных со сделкой
	 getDealDocuments();
	 
	//Не даём возможность добавлять файлы если сделка не сохранена
	$( "#linkFileUpload" ).on("click", function(e) {
		if($('#Id').val() < 1 || ifnull($('#Id').val(),"") ===""){
			appAlert("Для добавления файлов вы должны сохранить сделку!", "error");
			return false;
		}
	});
	 
 	//Очищаем выпадающий список.
	$( "#clearContactId" ).on("click", function(e) {
		$("#ContactId").empty();
		return false;
	});
	
 	//Не даём возможность добавлять файлы если сделка не сохранена
	$( "#clearLegalId" ).on("click", function(e) {
		$("#LegalId").empty();
		return false;
	});
	
	//добавляем проверку на сохранение сделки и добавление участников
	$('#ParrContactId').on('select2:selecting', function (e) {
		if($('#Id').val() < 1 || ifnull($('#Id').val(),"") ===""){
			appAlert("Для добавления участников вы должны сохранить сделку!", "warning");
			return false;
		}
		
		if(ifnull($('#ContactId').val(),"") ==="" && ifnull($('#LegalId').val(),"") ==="" ){
			appAlert("Для добавления участников вы должны указать физ/юр лицо в сделке!", "warning");
			return false;
		}
	});
	
	
	//$( "#addParticipant" ).on( "click", function() {
	//	if($('#Id').val() < 1 || ifnull($('#Id').val(),"") ===""){
	//		appAlert("Для добавления участников вы должны сохранить сделку!", "error");
	//		return false;
	//	}
	//});
	
	//Получаем список участников сделки
	getDealParticipants();
	 
	//По нажатию на кнопку поднимает форму добавления нового справочника.
	$(".addDictionary").click(function(e){
		
		$("#dicType").val($(this).data("type"));
		$("#_id").val($(this).data("id"));
		
		if($("#mwAddHotel").hasClass('in')){
		
			$("#mwAddHotel").modal('hide');
			$("#_formId").val("#mwAddHotel");
		} else if($("#mwAddContact").hasClass('in')){
		
			$("#mwAddContact").modal('hide');
			$("#_formId").val("#mwAddContact");
		} else if($("#mwAddOperator").hasClass('in')){
		
			$("#mwAddOperator").modal('hide');
			$("#_formId").val("#mwAddOperator");
		} else if($("#mwAddRegion").hasClass('in')){
		
			$("#mwAddRegion").modal('hide');
			$("#_formId").val("#mwAddRegion");
		}
		
		$("#mwAddDictionary").modal();
		
		
	});
	
	$("#addOperator").click(function(e){
		$("#mwAddOperator").modal();
	});
	
	$("#addRegion").click(function(e){
		if($('#DirectionName').val() == ""){
			appAlert("Вы должны выбрать страну","warning","Беда");
			return false;
		} else {
			$("#mwAddRegion").modal();
		}
	});

	$("#addHotel").click(function(e){
		//console.log($('#RegionName').val());
		if($('#RegionName').val() == ""){
			appAlert("Вы должны выбрать курор","warning","Беда");
			return false;
		} else {
			$("#mwAddHotel").modal();
		}
	});
	
	
	
	$('#form-dictionary').validator().on('submit', function (e) {
		
		if (e.isDefaultPrevented()){
			appAlert("Вы не заполнили обязательные поля на форме!","warning","Беда!");
		} else {
			e.preventDefault();
			var msg = {dicType:$("#dicType").val(),dicName:$("#dicName").val()}
			
			let res = setDictionaryValue(msg);
			if (res.status == "success") {
				
				let newOption = new Option(res.Name, res.LIC, true, true);
				$($("#_id").val()).append(newOption).trigger('change');
				
				appAlert(res.message,res.status,"Успех!");
			} else {
				appAlert(res.message,res.status,"Ошибка!");
			}
			
			$("#form-dictionary")[0].reset();
			$("#mwAddDictionary").modal('hide')
			
			if($("#_formId").val() != "") {
				setTimeout(function() {$($("#_formId").val()).modal('show');}, 500)
				return false;
			}
			
		
			
		}
	});
	
	
	$('#form-operator').validator().on('submit', function (e) {
		
		if (e.isDefaultPrevented()){
			appAlert("Вы не заполнили обязательные поля на форме!","warning","Беда!");
		} else {
			e.preventDefault();
			
			var formData = new FormData($("#form-operator")[0]);
			
			$.when($.ajax({
				type: 'POST',
				url: "/operators/addajax",
				data: formData,
        		processData: false,
        		contentType: false,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					alert("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:true
			})).done(function(res) {
				console.log(res)
				if (res.status == "success") {
				//	console.log(res.OperatorName+"|"+res.OperatorId);
					let newOption = new Option(res.OperatorName, res.OperatorId, true, true);
					$("#OperatorName").append(newOption).trigger('change');
					appAlert(res.message,res.status,"Успех!");
				} else {
					appAlert(res.message,res.status,"Ошибка!");
				}
			});
			
			$("#form-operator")[0].reset();
			$("#mwAddOperator").modal('hide')
		}
	});
	
	$('#form-region').validator().on('submit', function (e) {
		
		if (e.isDefaultPrevented()){
			appAlert("Вы не заполнили обязательные поля на форме!","warning","Беда!");
		} else {
			e.preventDefault();
			//console.log($('#DirectionName').val());
			var msg = {
					"DirectionId"	 : $('#DirectionName').val(),
					"RegionName"	 : $('#addRegionName').val(),
					"RegionRating"   : $('#addRegionRating').val(),
					"RegionComments" : $('#addRegionComments').val()
			}
			//var formData = new FormData($("#form-operator")[0]);
			//console.log(formData);
			$.when($.ajax({
				type: 'POST',
				url: "/regions/addajax",
				data: msg,
        		// /processData: false,
        		// /contentType: false,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					alert("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:true
			})).done(function(res) {
				if (res.status == "success") {
					let newOption = new Option(res.RegionName, res.RegionId, true, true);
					$("#RegionName").append(newOption).trigger('change');
					appAlert(res.message,res.status,"Успех!");
				} else {
					appAlert(res.message,res.status,"Ошибка!");
				}
			});
			
			$("#form-region")[0].reset();
			$("#mwAddRegion").modal('hide')
		}
	});
	
	
	
	
	$('#form-hotel').validator().on('submit', function (e) {
		
		if (e.isDefaultPrevented()){
			appAlert("Вы не заполнили обязательные поля на форме!","warning","Беда!");
		} else {
			e.preventDefault();
			//console.log($('#DirectionName').val());
			var msg = {
					"DirectionId"	 : $('#DirectionName').val(),
					"RegionId"		 : $('#RegionName').val(),
					"HotelName" 	 : $('#addHotelName').val(),
					"HotelStars"	 : $('#addHotelStars').val(),
					"HotelPhone"	 : $('#addHotelPhone').val(),
					"HotelEmail"	 : $('#addHotelEmail').val(),
					"HotelWebSite"	 : $('#addHotelWebSite').val(),
					"HotelRating"	 : $('#addHotelRating').val(),
					"HotelBeach"	 : $('#addHotelBeach').val(),
					"HotelType"		 : $('#addHotelType').val(),
					"HotelBeachLine" : $('#addHotelBeachLine').val(),
					"HotelJurName"	 : $('#addHotelJurName').val(),
					"HotelJurAddress": $('#addHotelJurAddress').val(),
					"HotelComments"	 : $('#addHotelComments').val()
			}
			//var formData = new FormData($("#form-operator")[0]);
			console.log(msg);
			$.when($.ajax({
				type: 'POST',
				url: "/hotels/addajax",
				data: msg,
        		// /processData: false,
        		// /contentType: false,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					alert("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:true
			})).done(function(res) {
			//console.log(res);
				if (res.status == "success") {
					let newOption = new Option(res.HotelName, res.Id, true, true);
					$("#HotelName").append(newOption).trigger('change');
					appAlert(res.message,res.status,"Успех!");
				} else {
					appAlert(res.message,res.status,"Ошибка!");
				}
			});
			
			$("#form-hotel")[0].reset();
			$("#mwAddHotel").modal('hide')
		}
	});
	
	
	
	$('#DealType').select2({
		theme: "bootstrap",
		allowClear: true,
		placeholder: 'Укажите тип сделки',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=DealType',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	
	
	$('#DealCurrency').select2({
		theme: "bootstrap",
		allowClear: true,
		placeholder: 'Укажите валюту сделки',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=DealCurrency',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	setDateDeparture();
	
	

}


	function setDateDeparture() {
		//Берём дату по формату, добовляем количество дней и выводим в нужный
		//http://momentjs.com/guides/#/warnings/js-date/
		var new_date = moment(moment($("#DateArrival").val(), 'DD.MM.YYYY', false).format()).add($("#AmountNight").val(),'days').format('DD.MM.YYYY');
		$("#DateDeparture").val(new_date);
	}

	function setCourse(curr,course){
		if(curr ==="grn" && course===""){
			$("#CommercialCourse").val("1");
		}
	}
	
	function calcSum() {
		var PayEquivalent = Number($("#DealSumEquivalent").val());
		var PayCource = Number($("#CommercialCourse").val());
		var DealSum = (PayEquivalent*PayCource);
		DealSum = DealSum.toFixed(2);
		
		$("#DealSum").val(DealSum);
		$("#DealSumFact").val(DealSum);
	}
	
	function calcVal() {
		var DealSum = Number($("#DealSum").val());
		var DealCource = Number($("#CommercialCourse").val());
		var DealSumEquivalent = (DealSum/DealCource);
		DealSumEquivalent = DealSumEquivalent.toFixed(2);
		
		$("#DealSumEquivalent").val(DealSumEquivalent);
	}
	
	function setPrePayPercent() {
		var PrePaySum = Number($("#PrePaySum").val());
		var DealSum = Number($("#DealSum").val());
		var PrePayPercent = (PrePaySum/DealSum)*100;
		PrePayPercent =	PrePayPercent.toFixed(2);
		
		if(PrePaySum>DealSum){
			appAlert("'Сумма предоплаты' не может быть больше 'Суммы договора':"+DealSum+"!", "error","Ой беда!");
		} else {
			$("#PrePayPercent").val(PrePayPercent);
		}
	}
	
	
	function setPrePaySum() {
		
		var DealSum = Number($("#DealSum").val());
		var PrePayPercent = ($("#PrePayPercent").val())/100;
		var PrePaySum = (DealSum*PrePayPercent);
		
		PrePaySum =	PrePaySum.toFixed(2);
		console.log(PrePaySum);
		if(PrePaySum>DealSum){
			appAlert("'Сумма предоплаты' не может быть больше 'Суммы договора':"+DealSum+"!", "error","Ой беда!");
		} else {
			$("#PrePaySum").val(PrePaySum);
		}
	}
	
	function validateOperatorInvoceSum() {
		var OperatorInvoceSum = Number($("#OperatorInvoceSum").val());
		var DealSum = Number($("#DealSum").val());
		
		if(OperatorInvoceSum>DealSum){
			appAlert("'Сумма счёта оператора' не может быть больше 'Суммы договора':"+DealSum+"!", "error","Ой беда!");
		}
	}


	function checkBoxFormatter(cellvalue, options, rowObject){
	  return '<input type="checkbox"' + (cellvalue ? ' checked="checked"' : '') + 'onclick="return false"/>';
	}


	



	$('#addAirportForm').validator().on('submit', function (e) {	
		if (e.isDefaultPrevented()){
			appAlert("Вы не заполнили обязательные поля на форме!","warning","Беда!");
		} else {
			e.preventDefault();
			var msg = $('#addAirportForm').serialize();
			
			var AirportCountry 	= $('#DirectionId :selected').text();
			var AirportCity 	= $('#AirportCity').val();
			var AirportName 	= $('#AirportName').val();
			var AirportCode 	= $('#AirportCode').val();
		
		    $.when($.ajax({
					type: 'POST',
					url: "/airport/addajax",
			        data: msg,
					success: function(_data, status){
						return _data;
					},
				 	error: function( jqXHR, textStatus, errorThrown) {
						console.log("ERROR:" + textStatus + "," + errorThrown);
					},
					dataType: "json",
					async:true
				})).done(function(res) {
					//console.log(res)
					if (res.status === "success") {
						$("#AirportCode").val("");
			    		$("#AirportCity").val("");
			    		$("#AirportName").val("");
			    		$("#AirportSite").val("");
			    		$('#AddAirportDiv').modal('hide');
			    		
			    		
			    		var FlightAA = document.getElementById("FlightACityArrivalId");
		    			var FlightAD = document.getElementById("FlightACityDepartureId");
		    			var FlightBA = document.getElementById("FlightBCityArrivalId");
		    			var FlightBD = document.getElementById("FlightBCityDepartureId");
		    			
		    			var AirportConcat = AirportCountry+", "+AirportCity+", "+AirportName+", ("+AirportCode+")";
		    			
		    			var optionAA = document.createElement("option");
		    			var optionAD = document.createElement("option");
		    			var optionBA = document.createElement("option");
		    			var optionBD = document.createElement("option");
		
						optionAA.text = optionAD.text = optionBA.text = optionBD.text = AirportConcat;
						optionAA.value = optionAD.value = optionBA.value = optionBD.value = res.rec_id;
						
						FlightAA.add(optionAA, FlightAA[0]);
						FlightAD.add(optionAD, FlightAD[0]);
						FlightBA.add(optionBA, FlightBA[0]);
						FlightBD.add(optionBD, FlightBD[0]);
						
					} else {
						appAlert(res.message,res.status,"Ошибка!");
					}
				});
			}
		return false;
	});






	//код который раскрывает элементы если не заполнены required
	//$('#form-deals').validator().on('submit', function (e) {
	//	var inputs = $("#form-deals input[required]");
	//		console.log(inputs);
	//	
	//	inputs.each(function() {
	//	    if ($(this).val() === "") {
	//		  var current = $(this).closest(".panel-collapse");
	//			if(!current.hasClass("in")){
    //    			current.collapse("show");
	//	    	}
	//	      return false;
	//	    }
	//  });
		
		
	$('#form-deals').validator().on('submit', function (e) {
		
		$("#btnSave").attr('disabled',true);
		setTimeout(function() {
			$("#btnSave").removeAttr('disabled');
		}, 2000);
		
		if (e.isDefaultPrevented()){
			appAlert("Вы не заполнили обязательные поля на форме!","warning","Беда!");
			//console.log("Форма не прошла проверку");
		} else {
			e.preventDefault();
			//tinyMCE.triggerSave();
			var msg = $('#form-deals').serialize();
			console.log(msg);
			
			$.when($.ajax({
					type: 'POST',
					url: "/deals/save_ajax",
					data: msg,
					//contentType: false,
					success: function(_data, status){
						return _data;
					},
					error: function( jqXHR, textStatus, errorThrown) {
						console.log("error:" + textStatus + "," + errorThrown);
					},
					dataType: "json",
					async:true
				})).done(function(res) {
					if (res.status == "success") {
					    appAlert(res.message,res.status,"Успех!");
						
						//if(parseint(res.Id) > 0){}
							var docs = "";					    
						    var arrival = "";				    
						    var departure = "";
						    var call = "";
						    //console.log(res);
						    
						    if(res.DateArrival !=="00.00.0000"){docs = '<strong>Подготовить документы</strong>: ' + moment(moment(res.DateArrival, 'DD.MM.YYYY', false).format()).add(-5,'days').format('DD.MM.YYYY 10:00') + ' <input type="checkbox" id="DateArrivalCheckbox" checked ="true"></label>';}
						    if(res.FlightAArrivalDate !=="00.00.0000 00:00"){arrival = '<br><strong>Проверка рейса вылета</strong>: ' + moment(moment(res.FlightAArrivalDate, 'DD.MM.YYYY HH:mm', false).format()).add(-1,'days').format('DD.MM.YYYY HH:mm') + ' <input type="checkbox" id="FlightAArrivalDateCheckbox" checked ="true"></label>';}
						    if(res.FlightBArrivalDate !=="00.00.0000 00:00"){departure = '<br><strong>Проверка рейса возврата</strong>: ' + moment(moment(res.FlightBArrivalDate, 'DD.MM.YYYY HH:mm', false).format()).add(-1,'days').format('DD.MM.YYYY HH:mm') + ' <input type="checkbox" id="FlightBArrivalDateCheckbox" checked ="true"></label>';}
						    if(res.DateDeparture !=="00.00.0000"){call = '<br><strong>Перезвонить по возврату</strong>: ' + moment(moment(res.DateDeparture, 'DD.MM.YYYY', false).format()).add(1,'days').format('DD.MM.YYYY 10:00') + ' <input type="checkbox" id="DateDepartureCheckbox" checked ="true"></label>';}
						    
						    var taskMess = "";
						    var FlightA = "";
						    var FlightB = "";
						    
						    if(res.FlightA !==""){FlightA = "рейс: " + res.FlightA + ", вылет: " + res.FlightAArrivalDate + " - " + res.FlightADepartureDate + "\n";}
						    if(res.FlightB !==""){FlightB = "рейс: " + res.FlightB + ", вылет: " + res.FlightBArrivalDate + " - " + res.FlightBDepartureDate + "\n";}
							taskMessA = FlightA + "Оператор: " +$("#OperatorName :selected").text() + ", заявка: "+res.OperatorInvoceNum+"";
							taskMessB = FlightB + "Оператор: " +$("#OperatorName :selected").text() + ", заявка: "+res.OperatorInvoceNum+"";
							
							
						    var mess = docs + arrival + departure + call;
				    		 
							$.confirm({
							    title: 'Создание напоминаний!',
							    content: mess,
						    	autoClose: 'cancel|8000',
							    buttons: {
							        confirm:{
							        text:'Создать',
						            btnClass: 'btn-primary',
							        action:function () {
							        	//console.log(res)
							        		//Получаем значение чекбокса. для создания напоминаний.
							        		 var DateArrivalCheckbox = this.$content.find('#DateArrivalCheckbox').prop('checked');
            								 var FlightAArrivalDateCheckbox = this.$content.find('#FlightAArrivalDateCheckbox').prop('checked');
            								 var FlightBArrivalDateCheckbox = this.$content.find('#FlightBArrivalDateCheckbox').prop('checked');
            								 var DateDepartureCheckbox = this.$content.find('#DateDepartureCheckbox').prop('checked');
            								 
            								 
							        		if(DateArrivalCheckbox === true){
							        			console.log("DateArrivalCheckbox");
								        		if(res.DateArrival !== "00.00.0000"){
								        	  		setDealTasks(res.DealId,res.UserId,
													"Подготовить документы",
													"Необходимо подготовить документы по сделке "+ res.DealNo+"\n клиент: " + $("#ContactPickLastName").val() + " " + $("#ContactPickFirstName").val(),
													moment(moment(res.DateArrival, 'DD.MM.YYYY', false).format()).add(-5,'days').format('DD.MM.YYYY 10:00'),
													moment(moment(res.DateArrival, 'DD.MM.YYYY', false).format()).add(-5,'days').format('DD.MM.YYYY 18:00'));
								        		}
							        		 }
							        		
							        		if(FlightAArrivalDateCheckbox === true){
							        			console.log("FlightAArrivalDateCheckbox");
							    				if(res.FlightAArrivalDate !== "00.00.0000 00:00"){
								        	  		setDealTasks(res.DealId,res.UserId,
													"Проверка рейса вылета",
													"Необходимо проверить время вылета по сделке "+ res.DealNo+"\n клиент: " + $("#ContactPickLastName").val() + " " + $("#ContactPickFirstName").val() + "\n" + taskMessA,
													moment(moment(res.FlightAArrivalDate, 'DD.MM.YYYY HH:mm', false).format()).add(-1,'days').format('DD.MM.YYYY HH:mm'),
													moment(moment(res.FlightADepartureDate, 'DD.MM.YYYY HH:mm', false).format()).add(-1,'days').format('DD.MM.YYYY HH:mm'));
						    					}
						    				}
											
											
											if(FlightBArrivalDateCheckbox === true){
							        			console.log("FlightBArrivalDateCheckbox");
							    				if(res.FlightBArrivalDate !== "00.00.0000 00:00"){
								        	  		setDealTasks(res.DealId,res.UserId,
													"Проверка рейса возврата",
													"Необходимо проверить время возврата по сделке "+ res.DealNo+"\nклиент: " + $("#ContactPickLastName").val() + " " + $("#ContactPickFirstName").val() + "\n" + taskMessB,
													moment(moment(res.FlightBArrivalDate, 'DD.MM.YYYY HH:mm', false).format()).add(-1,'days').format('DD.MM.YYYY HH:mm'),
													moment(moment(res.FlightBDepartureDate, 'DD.MM.YYYY HH:mm', false).format()).add(-1,'days').format('DD.MM.YYYY HH:mm'));
												}
											}
											
											if(DateDepartureCheckbox === true){
							        			console.log("DateDepartureCheckbox");
												if(res.DateDeparture !== "00.00.0000"){
								        	  		setDealTasks(res.DealId,res.UserId,
													"Звонок по возрату",
													"Зконок по возврату "+ res.DealNo+"\nклиент: " + $("#ContactPickLastName").val() + " " + $("#ContactPickFirstName").val(),
													moment(moment(res.DateDeparture, 'DD.MM.YYYY', false).format()).add(1,'days').format('DD.MM.YYYY 10:00'),
													moment(moment(res.DateDeparture, 'DD.MM.YYYY', false).format()).add(1,'days').format('DD.MM.YYYY 18:00'));
												}
											}
											
											setTimeout(function() {
											    	window.location.href = "/deals/add?Id="+res.DealId;
											}, 2000);
										
										
							        		}  
							        	},
								        cancel:{
								        	text: 'Отмена', // With spaces and symbols
								            action: function () {
												setTimeout(function() {
												    	window.location.href = "/deals/add?Id="+res.DealId;
													}, 2000);
								            	
								            }
								        }
							    	}
								});
						
						
					} else {
						appAlert(res.message,res.status,"Ошибка!");
					}
				});
		}
		
	});
	
	function setDealTasks(DealId,UserId,title,task,StartDate,EndDate){
		
		var msg = {
				"DealId" : DealId,
				"Title"  : title,
				"Task"   : task,
				"Start"  : StartDate,
				"End"    : EndDate,
				"UserId" : UserId
		}

		$.when($.ajax({
					type: 'POST',
					url: "/tasks/addLinkedTask",
					data: msg,
					success: function(_data, status){
						return _data;
					},
					error: function( jqXHR, textStatus, errorThrown) {
						console.log("error:" + textStatus + "," + errorThrown);
					},
					dataType: "json",
					async:true
				})).done(function(res) {
					//if (res.status == "success") {
					//   	
					//	
					//} else {
					//	appAlert(res.message,res.status);
					//
					//}
				});
				



	}
	
	function confirmTasks(res){
		var new_dateIssued = moment(moment(res.DealDate, 'DD.MM.YYYY', false).format()).add(-5,'days').format('DD.MM.YYYY');

	}
	
	
	//Получаем список связанных со сделкой файлов
	function getDealDocuments(){
		var DealId = $("#Id").val();
		
		if(DealId !=="" && DealId !==null && DealId !=="0"){
			var msg = {ModelType:"dealDocument",ModelId:DealId}
			$.when($.ajax({
				type: 'POST',
				url: "/uploads/getlist",
				data: msg,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					console.log("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:true
			})).done(function(res) {
				//Очищаем список документов
				$("#documentsList").empty();
				//формируем новый список документов
				$.each(res, function( index, value ) {
					let comments = "";
					if (res[index].Comments){
						comments = " - "+res[index].Comments;
					}
					
					$("#documentsList").append("<li id='dealDocument" + res[index].Id + "' class='list-group-item'>"+
					"<a href='#' <span  class='glyphicon glyphicon-trash' aria-hidden='true' onClick='deleteFileById(" + res[index].Id + ")'></span></a>"+ //onClick='deleteFileById(" + res[index].Id + ")'
					" | "+
					"<a href='/uploads/downloadFileById?Id="+res[index].Id+"' target='_blanck' <span class='glyphicon glyphicon-download' aria-hidden='true'></span> </a>"+
					" | "+
					"<a href='/uploads/getFileById?Id="+res[index].Id+"' target='_blanck'>"+res[index].FileName+"</a> "+
					(res[index].FileSize/1024/1024).toFixed(3) + " мб." + comments +
					"</li>");
				});
				
			});
		}
	}
	
	function deleteFileById(Id) {
		if (Id !== "") {
			$.confirm({
				title: 'Удаление!',
				content: 'Вы действительно хотите удалить этот файл?',
				autoClose: 'cancel|8000',
				buttons: {
					confirm:{
					text:'Удалить',
					btnClass: 'btn-danger',
					action:function () {
							$.ajax({
							  dataType: 'json',
							  url: '/uploads/deleteFileById?Id=' + Id,
							  beforeSend: function() {
								showLoader();
							  },
							  success: function(data){
								if (data.status === "success") {
									$(this).parent().remove();
									//console.log(data.message);
									appAlert("Запись удалена успешно!", "success","Успех!");
									$( "#dealDocument"+Id ).remove();
									//table.row('#'+row).remove().draw();
								} else {
								//	console.log(data.message);
									appAlert(data.message, "error","Ошибка!");
								}
							  },
							  complete: function() {
								hideLoader();
							  }
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

			
	
	//Форма загрузки файлов связаных со сделкой.
	$("#uploadLink").on("click",function() {
		
	    var formData = new FormData($("#uploadFileForm")[0]);
		//var msg = {ModelType:"dealDocument",ModelId:DealId}
	
	    $.ajax({
	        url: "/uploads/save",
	        type: 'POST',
	        data: formData,
	        async: false,
	        success: function (data) {
	            $('#mwUploadFile').modal('hide');
	            $('#uploadFileForm')[0].reset();
	            getDealDocuments();
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });
	
	    return false;
	});
	//Форма загрузки файлов связаных со сделкой.
	
	$('#ContactId').select2({
    	theme: "bootstrap",
		placeholder: 'Введите ФИО',
		multiple: false,
		ajax: {
		  url: '/contacts/getContactsListItems',
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
	//$('#ContactId').on('select2:opening', function (e) {
	//	if($('#Id').val() < 1 || ifnull($('#Id').val(),"") ===""){
	//		appAlert("Для добавления физ. лица вы должны сохранить сделку!", "error");
	//		return false;
	//	}
	//});
	//Получаем список связанных со сделкой файлов
	function getDealParticipants(){
		
		var DealId = ifnull($("#Id").val(),"");
		
		if(DealId !=="" && DealId !=="0"){
			
			var msg = {DealId:DealId}
			
			$.when($.ajax({
				type: 'POST',
				url: "/deals/getDealsParticipants",
				data: msg,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					console.log("ERROR:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:true
			})).done(function(res) {
				//Очищаем список документов
				$("#participantsList").empty();
				//формируем новый список документов
				$.each(res, function( index, value ) {
					let docBiometric = "";
					
					if(ifnull(res[index].docBiometric,"") =="1"){
						docBiometric = "<span class='glyphicon glyphicon-qrcode' aria-hidden='true'></span>";
					}
					
					$("#participantsList").append("<li class='media event' id='dealParticipat" + res[index].Id + "'>" +
					"<a class='pull-left border-aero profile_thumb'>" +
					"<i class='fa fa-user aero'></i>" +
					"</a>" +
					"<div class='media-body'>" +
					"<a href='#' <span  class='glyphicon glyphicon-trash' aria-hidden='true' onClick='deleteParticipant(" + res[index].Id + ")'></span></a> "+
					"<a href='/contacts/add?Id="+res[index].ContactId+"' class='title' target='_blanck'>"+ifnull(res[index].LastName,"") + " " + ifnull(res[index].FirstName,"") + " " + ifnull(res[index].MiddleName,"")  + "</a> - <small>" + ifnull(res[index].DateBirthAge,"") + "</small>"+
					"<p><strong>Паспорт:</strong> " + ifnull(res[index].docFirstName,"") +" " + ifnull(res[index].docLastName,"") +" </p>" +
					"<p><strong>Серия номер:</strong> " + ifnull(res[index].docSeriaNum,"") + " " + docBiometric + "</p>" +
					"<p><strong>Действителен до:</strong> "+ ifnull(res[index].docValid,"")  + "</p>" +
					"</div>" +
					"</li>");
				});
				
			});
		}
	}
	
	
	
	function deleteParticipant(Id) {
		if(Id !=="" && Id !="0"){
			$.confirm({
				title: 'Удаление!',
				content: 'Вы действительно хотите участника сделки?',
				autoClose: 'cancel|8000',
				buttons: {
					confirm:{
					text:'Удалить',
					btnClass: 'btn-danger',
					action:function () {
							$.ajax({
							  dataType: 'json',
							  url: '/deals/deleteParticipantById?Id='+Id,
							  beforeSend: function() {
								showLoader();
							  },
							  success: function(data){
							  	//console.log(data);
								if (data.status === "success") {
									$(this).parent().remove();
									//console.log(data.message);
									appAlert("Запись удалена успешно!", "success","Успех!");
									$( "#dealParticipat"+Id ).remove();
									//table.row('#'+row).remove().draw();
								} else {
								//	console.log(data.message);
									appAlert(data.message, "error","Ошибка!");
								}
							  },
							  complete: function() {
								hideLoader();
							  }
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
	
	$('#ParrContactId').select2({
    	theme: "bootstrap",
		placeholder: 'Введите ФИО',
		multiple: false,
		ajax: {
		  url: '/contacts/getDealParticipansListItems?DealId='+$("#Id").val(),
		  dataType: 'json',
		  delay: 250,
		  processResults: function (data) {
		    return {
		      results: data
		    };
		  },
		  cache: true,
		}
	});
	
 	//Очищаем выпадающий список.
	$( "#clearParrContactId" ).on("click", function(e) {
		$("#ParrContactId").empty();
		return false;
	});
	
	$('#ParrContactId').on('select2:select', function (e) {
		
		let dealParticipants = {
			DealId:$('#Id').val(),
			ContactId:$('#ParrContactId').val(),
		}
		
		let msg = {
			LinkedContactId:$('#ContactId').val(),
			LinkedParrContactId:$('#ParrContactId').val(),
			LinkedComments:"Участник(ца) поездки"
		}
		
		//Связываение участников поездки	
		$.when($.ajax({
			type: 'POST',
			url: "/deals/setDealParticipant",
			data: dealParticipants,
			success: function(_data, status){
				return _data;
			},
			error: function( jqXHR, textStatus, errorThrown) {
				console.log("ERROR:" + textStatus + "," + errorThrown);
			},
			dataType: "json",
			async:true
		})).done(function(res) {
			if (res.status === "success") {
				
				getDealParticipants();
				//Связываение участников поездки	
				$.when($.ajax({
					type: 'POST',
					url: "/contacts/setLinkedContact",
					data: msg,
					success: function(_data, status){
						return _data;
					},
					error: function( jqXHR, textStatus, errorThrown) {
						console.log("ERROR:" + textStatus + "," + errorThrown);
					},
					dataType: "json",
					async:true
				})).done(function(res) {
					if (res.status === "success") {
					} else {
						//console.log("Ошибочка!");
						appAlert(data.message, "error","Ошибка!");
					}
					
				});
			} else {
				//console.log("Ошибочка!");
				appAlert(res.message, "error","Ошибка!");
			}
			
		});
			
		$("#ParrContactId").empty();
		getDealParticipants();
		//console.log("End!");
	});
	
