
 
 	$("#PhoneMob").inputmask("+39(999)999-9999");
 	  
	$('#contDateBirth').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true
	});
 	$('#passValidDate').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true
	});
	
	$('#passIssuedDate').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});