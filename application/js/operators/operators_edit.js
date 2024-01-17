//$(function(){
function on_load() {
	$('#DealDateEnd').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true
	});


	$('#DealDateStart').datepicker({
		format: "dd.mm.yyyy",
		weekStart: 1,
		todayBtn: "linked",
		language: "ru",
		autoclose: true
	});


	//setTimeout(function(){
	//вфывфыв
	//$("#Phone").inputmask("+99(999)999-9999");
	//},200);

	tinymce.init({
	  selector: 'textarea',
	  height: 250,
	  menubar: false,
	  plugins: [
	    'advlist autolink lists link image charmap print preview anchor',
	    'searchreplace visualblocks code fullscreen',
	    'insertdatetime media table contextmenu paste code'
	  ],
	  toolbar: 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
	  content_css: '//www.tinymce.com/css/codepen.min.css'
	});
}
//});