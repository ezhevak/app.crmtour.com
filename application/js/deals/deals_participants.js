$(document).ready(function(){
	
	$('#contDateBirth').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});
	
	$('#passIssuedDate').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});
	
	$('#passValidDate').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true,
		enableOnReadonly: false
	});
	
	$("#contDateBirth").inputmask("dd.mm.yyyy");
	$("#passIssuedDate").inputmask("dd.mm.yyyy");
	$("#passValidDate").inputmask("dd.mm.yyyy");
	
	$("#PhoneMob").inputmask("+39(999)999-9999");
	
	//$("#passIssuedDate").on("click", function() {
	//	var new_date = moment(moment($("#passIssuedDate").val(), 'DD.MM.YYYY', false).format()).add(10,'year').format('DD.MM.YYYY');
	//	$("#passValidDate").val(new_date);
	//});
	//
	//$("#passIssuedDate").on("blur", function() {
	//	var new_date = moment(moment($("#passIssuedDate").val(), 'DD.MM.YYYY', false).format()).add(10,'year').format('DD.MM.YYYY');
	//	$("#passValidDate").val(new_date);
	//});
	
	//По нажатию на кнопку поднимает форму создания нового контакта.
	$(".addContactId").click(function(e){
		$("#callerId").val($(this).data("type"));
		$("#mwAddContact").modal();
	});
	
	
	$('#Sex').select2({
    	theme: "bootstrap",
		placeholder: 'Укажите пол клиента',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=Sex',
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
	
	
	$('#contSegment').select2({
    	theme: "bootstrap",
		placeholder: 'Укажите сегмент',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=Segment',
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
	
	
	
	$('#form-contact').validator().on('submit', function (e) {
		
		if (e.isDefaultPrevented()){
			console.log("Форма не прошла проверку");
		} else {
			e.preventDefault();
			
			//var formData = $('#form-contact').serialize();
			var formData = new FormData($("#form-contact")[0]);
			//console.log(formData);
			
			$.when($.ajax({
				type: 'POST',
				url: "/contacts/save_ajax",
				data: formData,
        		processData: false,
        		contentType: false,
				success: function(_data, status){
					return _data;
				},
				error: function( jqXHR, textStatus, errorThrown) {
					console.log("error:" + textStatus + "," + errorThrown);
				},
				dataType: "json",
				async:false
			})).done(function(res) {
				if (res.status == "success") {
					
					if($("#callerId").val() == "contact"){
						
						let data = {
							id: res.ContactId,
							text: res.LastName + " " + res.FirstName + " " + res.MiddleName
						};
						
						let newOption = new Option(data.text, data.id, true, true);
						
						$('#ContactId').append(newOption).trigger('change');
						
					} else {
						console.log("2");
						
					}
			    	
			    	$("#form-contact")[0].reset();

			    	appAlert(res.message,res.status,"Успех!");
				} else {
					appAlert(res.message,res.status,"Ошибка!");
				}
			});
			
			
			$("#mwAddContact").modal('hide')
			
		}
		
	});
	
  
});