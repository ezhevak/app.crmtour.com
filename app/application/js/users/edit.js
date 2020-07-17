//$(document).ready(function() {
	  /*$('#editForm').submit(function(evt) {
	  	console.log("Save");
	  	var pwd = $("#pwd").val();
	  	var pwd2 = $("#pwd_confirm").val();
	  	if (pwd == "") {
	  		evt.preventDefault();
	  		appAlert("Пароль не должен быть пустым - это не безопасно", "error", "Внимание!");
	  		$("#pwd").focus();
	  	} else if (pwd != pwd2) {
	  		evt.preventDefault();
	  		appAlert("Пароль и Подтверждение пароля не совпадают", "error", "Внимание!");
	  		$("#pwd").focus();
	  	} else {
	  		var formEl = $(this);
			var submitButton = $('input[type=submit]', formEl);

			$.ajax({
			  type: 'POST',
			  url: formEl.prop('action'),
			  accept: {
				javascript: 'application/javascript'
			  },
			  data: formEl.serialize(),
			  beforeSend: function() {
				submitButton.prop('disabled', 'disabled');
			  }
			}).done(function(data) {});
	  	}
	  	
	  });*/
//});



//tinymce.init({
//  selector: '#Signature',
//  height: 180,
//  menubar: false,
//  plugins: [
//    'advlist autolink lists link image charmap print preview anchor',
//    'searchreplace visualblocks code fullscreen',
//    'insertdatetime media table paste code'
//  ],
//  toolbar: 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
//  content_css: '../css/codepen.min.css'
//});

 $(function () {
    $('#tc').colorpicker({
      format: null
    });
  });


	$("#BranchId").change(function(){
		
		if($("#BranchId").val() !==""){
			// Set the value, creating a new option if necessary
			if ($('#Branches').find("option[value='" + $("#BranchId").val() + "']").length) {
			    $('#Branches').val($("#BranchId").val()).trigger('change');
			} 
		}
		//else { 
		//    // Create a DOM Option and pre-select by default
		//    var newOption = new Option(data.text, data.id, true, true);
		//    // Append it to the select
		//    $('#Branches').append(newOption).trigger('change');
		//} 
	
	});






$("#Branches").select2();





