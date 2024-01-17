function on_load() {
	
	//$("#BranchPhone").inputmask("+38(999)999-9999");
	//$("#BranchFax").inputmask("+38(999)999-9999");
	//$("#BranchMobile").inputmask("+38(999)999-9999");
	
	$("#BranchLicenseDate").inputmask("dd.mm.yyyy");
		
	
$('#form-branch').validator().on('submit', function (e) {
  if (e.isDefaultPrevented()) {
   	console.log("Форма не прошла проверку");
  } else {
    $("#sendButton").attr('disabled',true);
	
	var msg = $('#form-branch').serialize();
	console.log(msg);
    $.when($.ajax({
			type: 'POST',
			url: "/account/saveBranch",
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



//$("#form-branch").on("submit", function(e){
//  	//e.preventDefault();
//  	console.log(e.isDefaultPrevented())
//  	if (e.isDefaultPrevented()){
//  		console.log("Форма не прошла проверку");
//	} else {
//		$("#sendButton").attr('disabled',true);
//	
//		var msg = $('#form-branch').serialize();
//		console.log(msg);
//	    $.when($.ajax({
//				type: 'POST',
//				url: "/account/saveBranch",
//		        data: msg,
//				success: function(_data, status){
//					return _data;
//				},
//			 	error: function( jqXHR, textStatus, errorThrown) {
//					console.log("ERROR:" + textStatus + "," + errorThrown);
//				},
//				dataType: "json",
//				async:true
//			})).done(function(res) {
//				if (res.status == "success") {
//					$("#BranchId").val(res.BranchId);
//					appAlert(res.message,res.status);
//					setTimeout(function() {
//						$("#sendButton").removeAttr('disabled');
//					}, 2000);
//				} else {
//					appAlert(res.message,res.status);
//					setTimeout(function() {
//						$("#sendButton").removeAttr('disabled');
//					}, 2000);
//						
//				}
//			});
//		return false;
//	}
//});

$("#Inactive").bootstrapSwitch();
	






}