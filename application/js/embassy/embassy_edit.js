function on_load() {
	
	$("#EmbassyPhone").inputmask("+99(999)999-9999");
	
	tinymce.init({
	  selector: 'textarea',
	  height: 250,
	  menubar: false,
	  plugins: [
	    'advlist autolink lists link image charmap print preview anchor',
	    'searchreplace visualblocks code fullscreen',
	    'insertdatetime media table paste code'
	  ],
	  toolbar: 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
	  content_css: '//www.tinymce.com/css/codepen.min.css'
	});
};