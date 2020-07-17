$('#docValid').datepicker({
	format: "dd.mm.yyyy",
	weekStart: 1,
	todayBtn: "linked",
	language: "ru",
	autoclose: true
});

$('#docIssuedDate').datepicker({
	format: "dd.mm.yyyy",
	weekStart: 1,
	todayBtn: "linked",
	language: "ru",
	autoclose: true
});

$('#docIssuedDate2').datepicker({
	format: "dd.mm.yyyy",
	weekStart: 1,
	todayBtn: "linked",
	language: "ru",
	autoclose: true
});

$('#docIssuedDateUkr').datepicker({
	format: "dd.mm.yyyy",
	weekStart: 1,
	todayBtn: "linked",
	language: "ru",
	autoclose: true
});

$('#IdCardValid').datepicker({
	format: "dd.mm.yyyy",
	weekStart: 1,
	todayBtn: "linked",
	language: "ru",
	autoclose: true
});

$('#IdCardIssuedDate').datepicker({
	format: "dd.mm.yyyy",
	weekStart: 1,
	todayBtn: "linked",
	language: "ru",
	autoclose: true
});

$("#docValid").inputmask("dd.mm.yyyy");
$("#docIssuedDate").inputmask("dd.mm.yyyy");
$("#docIssuedDate2").inputmask("dd.mm.yyyy");
$("#docIssuedDateUkr").inputmask("dd.mm.yyyy");
$("#IdCardValid").inputmask("dd.mm.yyyy");
$("#IdCardIssuedDate").inputmask("dd.mm.yyyy");






$(".fileUploadName").on("change", function(e) {
	//console.log("Form:"+$("form:visible").html());
	$("form:visible").find("#btnSave").prop('disabled', false);
	$("form:visible").find("#fileUploadInput").css("border-color",$("form:visible").find("#fileUploadName").css("border-color"));
	$("form:visible").find("#fileError").text("");
	
    $("form:visible").find("#fileUploadInput").html($(this).val());
    $("form:visible").find("#fileUploadInput").attr("href", "http://testurl/"+$(this).val());
    if ($("form:visible").find("#fileUploadInput").html() !== "") {
    	//has-error has-danger
    	//input = document.getElementById('fileUploadName');
    	input = $("form:visible").find("#fileUploadName")[0];
    	if (window.FileReader && input.files[0]) {
    		file = input.files[0];
    		if (file.size > 1024*8*1024) {
    			$("form:visible").find("#btnSave").prop('disabled', true);
	    		setTimeout(function(){
	    			//$("#doc_file").parent().addClass("has-error");
	    			$("form:visible").find("#fileUploadInput").css("border-color","darkred");
	    			$("form:visible").find("#fileError").css("color","darkred");
	    			$("form:visible").find("#fileError").text("Максимальный размер файла 800 килобайт: "+(file.size/1024/1024).toFixed(2)+" МБ");
	    		},200);
    		} else if (!(/\.(gif|jpg|jpeg|tiff|png|pdf)$/i).test(file.name)) {
    			$("form:visible").find("#btnSave").prop('disabled', true);
    			$("form:visible").find("#fileUploadInput").css("border-color","darkred");
    			$("form:visible").find("#fileError").css("color","darkred");
    			$("form:visible").find("#fileError").text("Допускаются файлы формата: gif|jpg|jpeg|tiff|png|pdf");
    		}
    		
    		//$("#doc_file").parent().addClass("has-danger");
    	}
        $("form:visible").find("#fileDeleteBtn").show();
    }
});

$("form:visible").find("#fileDeleteBtn").on("click", function(e) {
	$("form:visible").find("#btnSave").prop('disabled', false);
	$("form:visible").find("#fileError").text("");
	$("form:visible").find("#fileUploadInput").css("border-color",$("#fileUploadName").css("border-color"));
    $.ajax({
        url: "/uploads/delete?ModelType=documents&ModelId=" + $("#Id").val(),
        type: 'GET',
        data: null,
        async: false,
        success: function (data) {
        	$("form:visible").find("#fileUploadName").val("");
			$("form:visible").find("#fileUploadInput").html("");
			$("form:visible").find("#fileDeleteBtn").hide();
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;	
});