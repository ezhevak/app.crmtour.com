(function($) {
	$.fn.jqGridMVG = function(options) {
		var opts = $.extend({}, $.fn.jqGridMVG.defaults, options);

		this.fill = function() {
      		var option = '';
      		var assocGrid = jQuery("#" + this.attr("id") + "pickData");
      		var selectedGrid = jQuery("#" + this.attr("id") + "pickListResult");
      		
      		assocGrid.jqGrid("clearGridData");
      		selectedGrid.jqGrid("clearGridData");
      
      		if (opts.data_url !== undefined) {
	      		$.ajax({
		    		url : opts.data_url + "&selected",
		    		type : "get",
		    		async: false,
		    		success : function(json_data) {
		       			//console.log(json_data);
		       			var data = JSON.parse(json_data);
		       			//opts.data =  data.all;
		       			opts.selected_data =  data.selected;
		    		},
		    		error: function() {
		    		}
		 		});
      		}
      
      		
      		assocGrid.jqGrid({
      			//datatype: "local",
      			datatype: "json",
      			url: opts.data_url,
      			guiStyle: "bootstrap",
      			height: 250,
      			width: 350,
      			hidegrid: false,
      			autowidth: false,
				shrinkToFit: false,
      			colNames: opts.colNames, 
      			colModel: opts.colModel, 
      			multiselect: false,
      			//prmNames: {id: "Id"},
      			//localReader: { id: "Id" },
      			rowNum:10, 
      			//rowList:[10,20,30],
      			loadonce: false,
      			viewrecords: true,
      			pager: '#page' + this.attr("id") + 'pickData',
      			caption: opts.assoc_caption,
      			sortorder: opts.sortorder,
      			sortname: opts.sortname
      		});
      		assocGrid.jqGrid('filterToolbar',{searchOperators : true});
      		assocGrid.trigger("reloadGrid"); 
      		
      		var clm = opts.colModel;
      		if (opts.editColumns !== undefined) {
	      		for (var i = 0; i < opts.editColumns.length; i++) {
	      			opts.editColumns[i].editable = true;
	      			opts.colNames.unshift(opts.editColumns[i].label);
	      			clm.unshift(opts.editColumns[i]);
	      		}
      		}
      		selectedGrid.jqGrid({
      			datatype: "local",
      			guiStyle: "bootstrap",
      			height: 250,
      			width: 350,
      			hidegrid: false,
      			autowidth: false,
				shrinkToFit: false,
      			colNames: opts.colNames, 
      			colModel: clm,
      			multiselect: false,
      			loadonce: true,
      			pager: '#page' + this.attr("id") + 'pickListResult',
      			caption: opts.selected_caption,
      			sortorder: opts.sortorder,
      			sortname: opts.sortname,
      			editurl: opts.edit_url
      		});
      		selectedGrid.jqGrid('filterToolbar',{searchOperators : true});
      		if (opts.editColumns !== undefined) {
      			selectedGrid.jqGrid('inlineNav','#page' + this.attr("id") + 'pickListResult', {add: false,
        edit: true,
        save: true,
        cancel: true,
        del: false});
      		}
 
  			for (var j =0; j < opts.selected_data.length; j++) {
  				selectedGrid.jqGrid('addRowData',opts.selected_data[j].id,opts.selected_data[j]);
  			}
  		};

		this.getText = function() {
			var text = "";
			if (opts.data_url !== undefined) {
	      		$.ajax({
		    		url : opts.data_url,
		    		type : "get",
		    		async: false,
		    		success : function(json_data) {
		       			//console.log(json_data);
		       			var data = JSON.parse(json_data);
		       			if (data.selected.length > 0)
		       				text += data.selected[0].FirstName + " " + data.selected[0].LastName;
		       			if (data.selected.length > 1)
		       				text += ", ...";
		    		},
		    		error: function() {
		    		}
		 		});
      		}
      		this.find("#" + this.attr("id") + "pickInput").val(text);
		};
		
		this.controll = function() {
      		var pickThis = this;
      
	  		$("#pAdd" + pickThis.attr("id")).on('click', function() {
        		var gridData = jQuery("#" + pickThis.attr("id") + "pickData");
				var rowId = gridData.jqGrid('getGridParam', 'selrow');
				if (rowId != null) {
					var rowData = gridData.jqGrid('getRowData', rowId);
					if (opts.add_url !== undefined) {
						$.ajax({
				    		url : opts.add_url + "&Id=" + rowId,
				    		type : "get",
				    		async: false,
				    		success : function(json_data) {
				       			//console.log(json_data);
				       			gridData.jqGrid('delRowData', rowId);
								jQuery("#" + pickThis.attr("id") + "pickListResult").jqGrid('addRowData',rowId, rowData);
				    		},
				    		error: function() {
				    		}
				 		});
					}
				}
      		});

      		$("#pAddAll"+pickThis.attr("id")).on('click', function() {
        		var gridData = jQuery("#" + pickThis.attr("id") + "pickData");
				var rowData = gridData.jqGrid('getRowData', null);
				for (var i = 0; i < rowData.length; i++) {
					//gridData.jqGrid('delRowData', rowData[i].id);
					if (opts.add_url !== undefined) {
						$.ajax({
				    		url : opts.add_url + "&Id=" + rowData[i].id,
				    		type : "get",
				    		async: false,
				    		success : function(json_data) {
				       			//console.log(json_data);
				       			gridData.jqGrid('delRowData', rowData[i].id);
								jQuery("#" + pickThis.attr("id") + "pickListResult").jqGrid('addRowData',rowData[i].id, rowData[i]);
				    		},
				    		error: function() {
				    		}
				 		});
					}
				}
      		});

      		$("#pRemove"+pickThis.attr("id")).on('click', function() {
        		var gridData = jQuery("#" + pickThis.attr("id") + "pickListResult");
				var rowId = gridData.jqGrid('getGridParam', 'selrow');
				if (rowId != null) {
					var rowData = gridData.jqGrid('getRowData', rowId);
					if (opts.del_url !== undefined) {
						$.ajax({
				    		url : opts.del_url + "&Id=" + rowId,
				    		type : "get",
				    		async: false,
				    		success : function(json_data) {
				       			//console.log(json_data);
				       			gridData.jqGrid('delRowData', rowId);
				       			jQuery("#" + pickThis.attr("id") + "pickData").jqGrid('addRowData',rowId, rowData);
				    		},
				    		error: function() {
				    		}
				 		});
					}
				}

      		});

      		$("#pRemoveAll"+pickThis.attr("id")).on('click', function() {
        		var gridData = jQuery("#" + pickThis.attr("id") + "pickListResult");
				var rowData = gridData.jqGrid('getRowData', null);
				for (var i = 0; i < rowData.length; i++) {
					//gridData.jqGrid('delRowData', rowData[i].id);
					if (opts.del_url !== undefined) {
						$.ajax({
				    		url : opts.del_url + "&Id=" + rowData[i].id,
				    		type : "get",
				    		async: false,
				    		success : function(json_data) {
				       			//console.log(json_data);
				       			gridData.jqGrid('delRowData', rowData[i].id);
				       			jQuery("#" + pickThis.attr("id") + "pickData").jqGrid('addRowData',rowData[i].id, rowData[i]);
				    		},
				    		error: function() {
				    		}
				 		});
					}
				}
      		});
    	};

		this.init = function() {
			if (opts.lang == "ru") {
				opts.add = 'Добавить';
				opts.addAll = 'Добавить все';
				opts.remove = 'Удалить';
				opts.removeAll = 'Удалить все';
				opts.closeModal = 'Закрыть';
				if (opts.openBtn === undefined || opts.openBtn == "Select/Create"){
					opts.openBtn = 'Выбрать/Создать';
				}
			}
			
			var pickListHtml = "";
			if (opts.add_button) {
				pickListHtml = 
					"<div class='row'>"+
						"<div class='col-sm-12' style='padding-bottom: 5px;'>"+
							"<button id='btnNew" + this.attr("id") + "' class='btn btn-primary btn-sm' type='button'>Создать</button>"+
							"<div id='pNewContent" + this.attr("id") + "'></div>" +
						"</div>"+
					"</div>";
			}
			pickListHtml +=
        		"<div class='row' id='pMVGSelector"+this.attr("id") + "'>" +
        		"  <div class='col-sm-5'>";
      		
      		pickListHtml += "<table id='" + this.attr("id") + "pickData'></table><div id='page" + this.attr("id") + "pickData'></div>";

      		pickListHtml +=
		        " </div>" +
		        " <div class='col-sm-2 pickListButtons'>" +
		        "	<button id='pAdd" + this.attr("id") + "' class='btn btn-primary btn-sm' style='width: 100%;margin-bottom: 5px;' type='button'>" + opts.add + "</button>" +
		        "      <button id='pAddAll" + this.attr("id") + "' class='btn btn-primary btn-sm' style='width: 100%;margin-bottom: 5px;' type='button'>" + opts.addAll + "</button>" +
		        "	<button id='pRemove" + this.attr("id") + "' class='btn btn-primary btn-sm' style='width: 100%;margin-bottom: 5px;' type='button'>" + opts.remove + "</button>" +
		        "	<button id='pRemoveAll" + this.attr("id") + "' class='btn btn-primary btn-sm' style='width: 100%;margin-bottom: 5px;' type='button'>" + opts.removeAll + "</button>" +
		        " </div>" +
		        " <div class='col-sm-5'>";

		  	pickListHtml += "<table id='" + this.attr("id") + "pickListResult'></table><div id='page" + this.attr("id") + "pickListResult'></div>";
	    	pickListHtml += " </div>" +
        		"</div>";
      		var inputHtml =   "";
      		if (opts.control !== undefined && opts.control == "button") {
      			inputHtml += "<button id='btnOpen" + this.attr("id") + "' class='btn btn-primary " + opts.input_button_class + "' type='button'>"+opts.openBtn+"</button>";
      		} else {
	      		inputHtml =
	  				"<div class='input-group'>" +
					"   <input type='text' class='form-control " + opts.input_class + "' id='" + this.attr("id") + "pickInput'";
			
				
		  			if (opts.width !== undefined)
		  				inputHtml += " style='width:" + opts.width + "px'";
		  	
		  		inputHtml += ">" +
					"   <span class='input-group-btn' style='display: block'>" +
					" <button id='btnOpen" + this.attr("id") + "' class='btn btn-default " + opts.input_button_class + "' type='button'><span class='caret'></span></button>" +
					"   </span>" +
					"</div>";
      		}
			inputHtml +=
				"<div id='" + this.attr("id") + "pickModal' class='modal";
	  
	  		if (opts.animation !== undefined && opts.animation)
	  			inputHtml += " fade";
	  	
	  		inputHtml +=
				"' role='dialog'>" +
				"  <div class='modal-dialog";

			inputHtml += " modal-lg";
	  		inputHtml += "'>" +
				"    <div class='modal-content'>" +
				"      <div class='modal-header'>" +
				"        <button type='button' class='close' data-dismiss='modal'>&times;</button>" +
				"        <h4 class='modal-title'>" + opts.window_title + "</h4>" +
				"      </div>" +
				"      <div class='modal-body' style='padding-bottom: 0px;'>" +
			pickListHtml +
		/*"        <div id='pickList'></div>" +*/
				"      </div>" +
				"      <div class='modal-footer'>";
			if (opts.control !== undefined && opts.control == "button") {
				inputHtml += "";
				if (opts.add_button) {
					inputHtml +=
						"        <button id='btnSave" + this.attr("id") + "' type='button' class='btn btn-primary " + opts.input_button_class + "' style='display:none'>Save</button>";
				}
			} else {
				inputHtml +=
					"        <button id='btnSave" + this.attr("id") + "' type='button' class='btn btn-primary " + opts.input_button_class + "'>Save</button>";
			}	
			inputHtml +=	
				"        <button id='btnClose" + this.attr("id") + "' type='button' class='btn btn-default " + opts.input_button_class + "' data-dismiss='modal'>" + opts.closeModal + "</button>";
			inputHtml +=
				"      </div>" +
				"    </div>" +
				"  </div>" +
				"</div>";

      		//this.append(pickListHtml);
      		this.append(inputHtml);

	  		var pickThis = this;
	  		$("#btnOpen" + this.attr("id")).on("click", function(){
	  			if($('#Id').val() < 1 || ifnull($('#Id').val(),"") ===""){
					appAlert("Вы должны сохранить сделку и указать 'ФИО Клиента'!", "error");
					return false;
				} else {
					//console.log(ifnull($('#LegalId').val(),""));
					if((ifnull($('#ContactId').val(),"") ==="" || ifnull($('#ContactId').val(),"") ==="0") && (ifnull($('#LegalId').val(),"") ==="" || ifnull($('#LegalId').val(),"") ==="0")){
						appAlert("Вы должны указать 'ФИО Клиента' или 'Название компании'!", "error");
						return false;
					} else {
		      			pickThis.fill();
		      			pickThis.controll();
		        		$("#" + pickThis.attr("id") + "pickModal").modal({show: true});
					}
				}
      		});
      		
      		if (opts.control !== undefined && opts.control == "button") {
      			$("#btnClose" + this.attr("id")).on("click", function(){
	      			if (opts.onchange !== undefined)
	      				opts.onchange();
	      			
	      			$("#"+pickThis.attr("id") + "pickModal > .modal-dialog").width(pickThis.attr("modal_width_origin"));
  					$("#btnNew" + pickThis.attr("id")).text("Создать");
  					$("#btnSave" + pickThis.attr("id")).hide();
  					setTimeout(function(){$("#pNewContent" + pickThis.attr("id")+" > iframe").remove();pickThis.fill();}, 200);
  					$("#pMVGSelector"+pickThis.attr("id")).show();
  					pickThis.attr("new_record_mode", "");
	      		});
      		} else {  
	      		$("#btnSave" + this.attr("id")).on("click", function(){
	      			//console.log("Save");
	      			$("#" + pickThis.attr("id") + "pickModal").modal("hide");
	      		});
      		}
      		if (opts.add_button) {
      			$("#btnSave" + pickThis.attr("id")).on("click", function() {
      				frameContentpickContactMVG.document.main_edit_form.submit();
      				//$("#btnNew" + pickThis.attr("id")).click();
      				if (opts.add_full_width)
      					$("#"+pickThis.attr("id") + "pickModal > .modal-dialog").width(pickThis.attr("modal_width_origin"));
  					$("#btnNew" + pickThis.attr("id")).text("Создать");
  					$("#btnSave" + pickThis.attr("id")).hide();
  					setTimeout(function(){
  						$("#pNewContent" + pickThis.attr("id")+" > iframe").remove();
  						pickThis.fill();
  						$("#pMVGSelector"+pickThis.attr("id")).show();
  					}, 200);
  					pickThis.attr("new_record_mode", "");
      			});
      			$("#btnNew" + pickThis.attr("id")).on("click", function() {
      				//console.log("SDSDSD"+pickThis.attr("new_record_mode")+"="+pickThis.attr("modal_width_origin"));
      				//$("#pickContactMVGpickModal")
      				if (pickThis.attr("new_record_mode") !== undefined && pickThis.attr("new_record_mode") != "") {
      					if (opts.add_full_width)
      						$("#"+pickThis.attr("id") + "pickModal > .modal-dialog").width(pickThis.attr("modal_width_origin"));
      					$("#btnNew" + pickThis.attr("id")).text("Создать");
      					$("#btnSave" + pickThis.attr("id")).hide();
      					$("#pNewContent" + pickThis.attr("id")+" > iframe").remove();
      					$("#pMVGSelector"+pickThis.attr("id")).show();
      					pickThis.attr("new_record_mode", "");
      				} else {
	      				pickThis.attr("new_record_mode", "1");
	      				//console.log($("#"+pickThis.attr("id") + "pickModal > .modal-dialog").width());
	      				pickThis.attr("modal_width_origin",  $("#"+pickThis.attr("id") + "pickModal > .modal-dialog").width());
	      				if (opts.add_full_width)
	      					$("#"+pickThis.attr("id") + "pickModal > .modal-dialog").width($("body").width());
	      				$("#btnNew" + pickThis.attr("id")).text("Отменить");
	      				$("#btnSave" + pickThis.attr("id")).show();
	      				if (opts.add_button_url !== undefined && opts.add_button_url != "") {
	      					$("#pMVGSelector"+pickThis.attr("id")).hide();
	      					//var widthcontent = "";
	      					//if (opts.add_full_width)
	      					//	widthcontent = "width: 100%";
	      					var frame_html = "<iframe name='frameContent" + pickThis.attr("id") + "' src='" + opts.add_button_url + "&frame_mode=1' width = '100%' height = '400px'></iframe>";
	      					$("#pNewContent" + pickThis.attr("id")).html(frame_html);
	      				}
      				}
      			});
      		}
		};

		this.init();
		return this;
	};

	$.fn.jqGridMVG.defaults = {
	    add: 'Add',
	    addAll: 'Add All',
	    remove: 'Remove',
	    removeAll: 'Remove All',
	    closeModal: 'Close',
	    openBtn: 'Select/Create',
	    window_title: "Header",
	    assoc_caption: 'Available records',
	    selected_caption: 'Selected',
	    input_class: "",
	    input_button_class: "",
	    add_button: false,
	    add_button_url: "",
	    add_full_width: false
	};

}(jQuery));