function on_load() {
	
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
};