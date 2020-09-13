
function on_load() {
	
	$("#PayDate").inputmask("dd.mm.yyyy");
	//при установлении суммы предоплаты, поле % предоплаты расчитывается автоматически.
	 $("#PayCource").on("change", function() {
	 	calcPaySum();
	 });
	 
	 $("#PayEquivalent").on("change", function() {
	 	calcPaySum();
	 });

	 $("#PaySum").on("change", function() {
	 	calcPayVal();
	 });

	 $("#DealCurrency").on("change", function() {
		setCourse($("#DealCurrency").val());
		calcPaySum();
	 });
	 
	  //устанавливаем курс по умолчанию 1 для валюты grn
	 setCourse($("#DealCurrency").val());
	 
	
}
	function setCourse(cours){
		if(cours ==="grn"){
			$("#PayCource").val("1");
		}
		
		
	}
	
	function calcPayVal() {
		var PaySum = Number($("#PaySum").val());
		var PayCource = Number($("#PayCource").val());
		var PayEquivalent = (PaySum/PayCource);
		PayEquivalent =PayEquivalent.toFixed(2);
		
		$("#PayEquivalent").val(PayEquivalent);
	}
	
	function calcPaySum() {
		var PayEquivalent = Number($("#PayEquivalent").val());
		var PayCource = Number($("#PayCource").val());
		var PaySum = (PayEquivalent*PayCource);
		PaySum =PaySum.toFixed(2);
		
		$("#PaySum").val(PaySum);
	}


	
	$('#form-payments').validator().on('submit', function (e) {
			//console.log("msg");
		
		$("#btnSave").attr('disabled',true);
		
		setTimeout(function() {
			$("#btnSave").removeAttr('disabled');
		}, 2000);
		
		if (e.isDefaultPrevented()){
			console.log("Форма не прошла проверку");
		} else {
			//tinyMCE.triggerSave();
			e.preventDefault();
			
			var msg = $('#form-payments').serialize();
			//console.log(msg);
			
			$.when($.ajax({
					type: 'POST',
					url: "/payment/save_ajax",
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
					//console.log(res);
					if (res.status == "success") {
					    appAlert(res.message,res.status);
					    
					    setTimeout(function() {
					    	window.location.href = "/deals/dealpayments?dealid="+$("#DealId").val();
						}, 2000);
						
					} else {
						appAlert(res.message,res.status);
					
					}
				});
		}
		
	})