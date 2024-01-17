function on_load() {
	
	//$("#HotelPhone").inputmask("+99(999)999-9999");
	
	//$("#HotelFax").inputmask("+99(999)999-9999");
	
};

//$(document).ready(function(){
	$('#cascadingdropdown').cascadingDropdown({
		selectBoxes: [
			{
				selector: '#DirectionName',
				source: function(request, response) {
					$.getJSON('/dictionary/getDirections', request, function(data) {
						var selectOnlyOption = -1;
						var direction_ctrl = $("#DirectionName");
						if (direction_ctrl.data("selected") !== undefined)
							selectOnlyOption = parseInt(direction_ctrl.data("selected"));
						//console.log("DirectionIndex:" + selectOnlyOption);
						response($.map(data, function(item, index) {
							var selectedIndex = 0;
							if (item.Id == selectOnlyOption)
								selectedIndex = index+1;
							//console.log("DirectionSelIdx:" + selectedIndex);
							return {
								label: item.DirectionName,
								value: item.Id,
								selected: selectedIndex
							};
						}));
					});
				}
			},
			{
				selector: '#RegionName',
				requires: ['#DirectionName'],
				source: function(request, response) {
					$.getJSON('/dictionary/getRegions', request, function(data) {
						var selectOnlyOption = -1;
						var region_ctrl = $("#RegionName");
						if (region_ctrl.data("selected") !== undefined)
							selectOnlyOption = parseInt(region_ctrl.data("selected"));
						response($.map(data, function(item, index) {
							var selectedIndex = 0;
							if (item.Id == selectOnlyOption)
								selectedIndex = index+1;
							return {
								label: item.RegionName,
								value: item.Id,
								selected: selectedIndex
							};
						}));
					});
				}
			}
		],
		onReady: function(event, allValues) {
		}
	});
	
	
	//Подключаем поиск по select
	$(document).ready(function() {
	$(".js-example-basic-single").select2();
	$(".select2.select2-container").css("width","100%");
	});


	
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
	    				$(':input[type="submit"]').prop('disabled', true);
		    		},200);
	    		} else if (!(/\.(gif|jpg|jpeg|tiff|png|pdf)$/i).test(file.name)) {
	    			$("form:visible").find("#btnSave").prop('disabled', true);
	    			$("form:visible").find("#fileUploadInput").css("border-color","darkred");
	    			$("form:visible").find("#fileError").css("color","darkred");
	    			$("form:visible").find("#fileError").text("Допускаются файлы формата: gif|jpg|jpeg|tiff|png|pdf");
	    			//$("input").prop('disabled', true);
	    			$(':input[type="submit"]').prop('disabled', true);
	    		}
	    	}
	        $("form:visible").find("#fileDeleteBtn").show();
	    }
	});
	
	$("form:visible").find("#fileDeleteBtn").on("click", function(e) {
		//console.log("/uploads/delete?ModelType=hotels&ModelId=" + $("#Id").val());
		$("form:visible").find("#btnSave").prop('disabled', false);
		$("form:visible").find("#fileError").text("");
		$("form:visible").find("#fileUploadInput").css("border-color",$("#fileUploadName").css("border-color"));
	    $.ajax({
	        url: "/uploads/delete?ModelType=hotels&ModelId=" + $("#Id").val(),
	        type: 'GET',
	        data: null,
	        async: false,
	        success: function (data) {
	        	$("form:visible").find("#fileUploadName").val("");
				$("form:visible").find("#fileUploadInput").html("");
				$("form:visible").find("#fileDeleteBtn").hide();
	    		$(':input[type="submit"]').prop('disabled', false);
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });
	
	    return false;	
	});
	
	
	$('#HotelStars').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите количество звёст',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=HotelStars',
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
	

	//$('#HotelRating').select2({
    //	theme: "bootstrap",
    //	allowClear: true,
	//	placeholder: 'Укажите оценку отеля',
	//	multiple: false,
	//	ajax: {
	//	  url: '/dictionary/getDictionaryListItems?type=Rating',
	//	  dataType: 'json',
	//	  delay: 250,
	//	  processResults: function (data) {
	//	    return {
	//	      results: data
	//	    };
	//	  },
	//	  cache: true,
	//	}
	//});
	
	
	$('#HotelBeach').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите тип пляжа',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=HotelBeach',
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
	
	
	

	$('#HotelType').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите тип отеля',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=HotelType',
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

	
	$('#HotelBeachLine').select2({
    	theme: "bootstrap",
    	allowClear: true,
		placeholder: 'Укажите линию пляжа',
		multiple: false,
		ajax: {
		  url: '/dictionary/getDictionaryListItems?type=HotelBeachLine',
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


