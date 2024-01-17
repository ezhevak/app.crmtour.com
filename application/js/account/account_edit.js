function on_load() {
	
	//$("#OfficePhone").inputmask("+38(999)999-9999");
	//$("#OfficeFax").inputmask("+38(999)999-9999");
	//$("#OfficeMobile").inputmask("+38(999)999-9999");
	
	
	$('#LicenseDate').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true
	});
	
	
	
	$("#SMSText").on("change input paste keyup", function() {
	
	var len = jQuery(this).val().length;
	$("#smslenght").html("Количество символов:<strong>"+len+"</strong>");
	
	if(len !==0){
		$("#smssend").prop('disabled', false);
	} else {
		$("#smssend").prop('disabled', true);
	}
	
	
	if(len < 160 ){
		$( "#smslenght" ).removeClass( "alert-danger" ).addClass( "alert-success" );
	} else if (len >= 160 ){
		$( "#smslenght" ).removeClass( "alert-success" ).addClass( "alert-danger" );
	} 
	});
	
	
	
//$("#form-smtp").on("submit", function(e){
//    
//	$("#smtpSendButton").attr('disabled',true);
//  	e.preventDefault();
//	var msg = $('#form-smtp').serialize();
//	
//    $.when($.ajax({
//			type: 'POST',
//			url: "/communications/smtp_save",
//	        data: msg,
//			success: function(_data, status){
//				return _data;
//			},
//		 	error: function( jqXHR, textStatus, errorThrown) {
//				console.log("ERROR:" + textStatus + "," + errorThrown);
//			},
//			dataType: "json",
//			async:true
//		})).done(function(res) {
//			console.log(res)
//			if (res.status == "success") {
//				$("#SMTPId").val(res.SMTPId);
//				appAlert(res.message,res.status);
//				setTimeout(function() {
//					$("#smtpSendButton").removeAttr('disabled');
//				}, 2000);
//			} else {
//				//console.log("Беда");
//				appAlert(res.message,res.status);
//				setTimeout(function() {
//					$("#smtpSendButton").removeAttr('disabled');
//				}, 2000);
//			}
//		});
//
//	return false;
//});
	
	
$('#form-account').validator().on('submit', function (e) {
  if (e.isDefaultPrevented()) {
    console.log("Ошибка! Форма 'form-account' запонена не коректно ")
  } else {
    $("#sendButton").attr('disabled',true);

	var msg = $('#form-account').serialize();
	//console.log(msg);
    $.when($.ajax({
			type: 'POST',
			url: "/account/save",
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
			if (res.status == "success") {
				$("#BranchId").val(res.BranchId); 
				appAlert(res.message,res.status);
				setTimeout(function() {
					$("#sendButton").removeAttr('disabled');
				}, 2000);
			} else {
				appAlert(res.message,res.status);
				setTimeout(function() {
					$("#sendButton").removeAttr('disabled');
				}, 2000);
					
			}
		});

	return false;
  }
})
	


//$("#smtpGmail").click(function() {
// 	$("#SenderName").val($("#AccountName").val());
// 	$("#Host").val("smtp.gmail.com");
// 	$("#SMTPAuth").val("true");
// 	$("#SMTPSecure").val("tls");
// 	$("#Port").val("587");
// 	$("#CharSet").val("UTF-8");
// 	$("#UserName").focus();
// 	
// 	
//	appAlert('Установлены настройки Gmail','success');
//	
//});	


$("#form-saveSms").on("submit", function(e){
  	e.preventDefault();
  	
	$("#saveSmsSubmit").attr('disabled',true);

	var msg = $('#form-saveSms').serialize();
	//console.log(msg);
    $.when($.ajax({
			type: 'POST',
			url: "/account/sms_save",
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
			if (res.status == "success") {
				appAlert(res.message,res.status);
				getBalance();
				setTimeout(function() {
					$("#saveSmsSubmit").removeAttr('disabled');
				}, 2000);
			} else {
				appAlert(res.message,res.status);
				setTimeout(function() {
					$("#saveSmsSubmit").removeAttr('disabled');
				}, 2000);
					
			}
		});

	return false;
});


$("#form-sendSms").on("submit", function(e){
  	e.preventDefault();
  	
	$("#smssend").attr('disabled',true);

	var msg = $('#form-sendSms').serialize();
	//console.log(msg);
    $.when($.ajax({
			type: 'POST',
			url: "/account/sms_send",
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
			if (res.status == "success") {
				appAlert(res.message,res.status);
				setTimeout(function() {
					getBalance();
					//var table = $('#example').DataTable();
					//tableSms объявлена в файле account_index.js
					tableSms.ajax.reload();
					$("#smssend").removeAttr('disabled');
				}, 2000);
			} else {
				appAlert(res.message,res.status);
				setTimeout(function() {
					$("#smssend").removeAttr('disabled');
				}, 2000);
					
			}
		});

	return false;
});


function getBalance(){
	console.log("SMS. Пробуем получить баланс SMS Atom Park");
	$.when($.ajax({
			type: 'POST',
			url: "/account/sms_balance",
	        data: null,
			success: function(_data, status){
				return _data;
			},
		 	error: function( jqXHR, textStatus, errorThrown) {
				console.log("ERROR:" + textStatus + "," + errorThrown);
			},
			dataType: "json",
			async:true
		})).done(function(res) {
			if(res.amount[0]>0){
				console.log("SMS. Успех");
				$("#smsSenderBalance").text(res.amount[0]+" "+res.currency[0]);
			} else {
				console.log("SMS. Ошибочка");
				$("#smsSenderBalance").text("0 UAH");
			}
		});
	
}




getBalance();







	
};