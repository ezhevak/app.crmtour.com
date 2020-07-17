function webRequest(url, type, params, dataType, async, onsuccess, onerror) {
	$.ajax({
			type: type,
			url: url,
			data: params,
			success: function(_data, status){
				if(typeof onsuccess == 'function') {
					onsuccess(_data, status);
				}
			},
			error: function( jqXHR, textStatus, errorThrown) {
				if(typeof onerror == 'function') {
					onerror(jqXHR, textStatus, errorThrown);
				}
			},
			beforeSend: function() {
				
			},
			complete: function(data) {
				
			},
			dataType: dataType,
			async: async
		});
}

	function boxAlert(m,cb) {
		bootbox.alert({
    		title: "Сообщение",
    		message: m,
    		callback: function (result) {
	            if (typeof cb == 'function')
	            	cb();
	        }
    	});
	}

	//Проверяем наличие значения в поле
	function ifnull(expression, alt_value){
		if(expression === null || expression === ""){
			return alt_value;
		} else {
			return expression;
		}
	}
	//Получение значения LIC
	function LookupValue(type,lic){
		
		var msg = {
			type:type,
			lic:lic
		}
		var response = $.ajax({
			type: 'POST',
			url: "/dictionary/getDictionaryValue",
			data: msg,
			success: function(_data, status){
				return _data;
			},
			error: function( jqXHR, textStatus, errorThrown) {
				console.log("ERROR:" + textStatus + "," + errorThrown);
			},
			dataType: "json",
			async:false
		}).responseJSON;
		
		return response[0];
	}
	
	 //Получение значения LIC
	function setDictionaryValue(msg){
		//console.log(msg);
		let response = $.ajax({
			type: 'POST',
			url: "/dictionary/setDictionaryValue",
			data: msg,
			success: function(_data, status){
				//console.log(_data);
				return _data;
			},
			error: function( jqXHR, textStatus, errorThrown) {
				console.log("ERROR:" + textStatus + "," + errorThrown);
			},
			dataType: "json",
			async:false
		}).responseJSON;
		
		return response;
	}
	
	//Проверяем пустое значение для даты.
	function ifDateNull(expression, alt_value){
		if(expression === null || expression === "" || expression === "00.00.0000" || expression ===  "0000-00-00"){
			return alt_value;
		} else {
			return expression
		}
	}
	
	function copyToClipboard(element) {
		let text = "";
		
		if( $(element).is("input") === true ) {
			text = $(element).val();
			//console.log(text);
			//$temp.val($(element).val());
		} else {
			text = $(element).text();
			//$temp.val($(element).text()).select();
		}
		if(text !== ""){
			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val(text).select();
			document.execCommand("copy");
			$temp.remove();
			appAlert("Текст '" + text + "' скопирован", "success","Успех!");
		}
	
	}
	
	
	document.getElementById("loader").style.display = "none";
	
	function showLoader() {
		document.getElementById("loader").style.display = "block";
	}

	function hideLoader() {
		document.getElementById("loader").style.display = "none";
	}
	
	

	function appAlert(msg, type, boldmsg) {
		var el = $("#app-alert");
		el.removeClass();
		//console.log(type);
		if (type == "error") {
			el.addClass("alert-danger alert");
		} else if (type == "warning") {
			el.addClass("alert-warning alert");
		} else if (type == "success") {
			el.addClass("alert-success alert");
		} else {
			el.addClass("alert-info alert");
		}
		el.find("#alertmsg").text(msg);
		
		if (typeof boldmsg !== 'undefined') {
			el.find("#alertmsgbold").text(boldmsg);
		}
		el.show();
		
		setTimeout(function(){
			$('#app-alert').hide()
		}, 10000);
	}
	
	
	function loadNotify() {
		//console.log("load notify");
		$.ajax({
	        url: "/tasks/getTaskNotify",
	        /*data: {
	            txtsearch: $('#appendedInputButton').val()
	        },*/
	        type: "GET",
	        dataType: "html",
	        success: function (data) {
	           $("#msgList").html(data);
	           $("#notifyCount").text($("#msgList > li").length - 1);
	        },
	        error: function (xhr, status) {
	           // alert("Sorry, there was a problem!");
	        },
	        complete: function (xhr, status) {
	            //$('#showresults').slideDown('slow')
	        }
	    });
	}
	
	


	
	$(document).ready(function(){
		
		$('[data-toggle="tooltip"]').tooltip();
		if (typeof on_load == 'function')
			on_load();
			loadNotify();
	});
