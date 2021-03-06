function on_load() {
	
  tinymce.init({
	  selector: 'textarea',
	  height: 500,
	  theme: 'modern',
	  
	  plugins: [
	    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	    'searchreplace wordcount visualblocks visualchars code fullscreen',
	    'insertdatetime media nonbreaking save table directionality',
	    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
	  ],
	  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample | fontsizeselect',
	  image_advtab: true,
	  //content_css: [
	  //  '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
	  //  '//www.tinymce.com/css/codepen.min.css'
	  //]
	  
	  content_css: '../css/codepen.min.css'
	 });
	 

}