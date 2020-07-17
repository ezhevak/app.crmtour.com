(function($) {
	$.fn.jqGridPick = function(options) {
		var opts = $.extend({}, $.fn.jqGridPick.defaults, options);

		this.fill = function() {
      		var option = '';
      		var saveBtn = $("#btnSave" + this.attr("id"));
      		var assocGrid = jQuery("#" + this.attr("id") + "pickData");
      		assocGrid.jqGrid("clearGridData");
      		
      		if (1==0 && opts.data_url !== undefined) {
      			if (opts.link_param !== undefined && opts.link_id !== undefined)
      				url_get = opts.data_url + "?" + opts.link_param + "=" + opts.link_id
      			else
      				url_get = opts.data_url;
	      		$.ajax({
		    		url : url_get,
		    		type : "get",
		    		async: false,
		    		success : function(json_data) {
		       			var data = JSON.parse(json_data);
		       			opts.data =  data.all;
		       			if (data.selected.length > 0)
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
      			width: 860,
      			hidegrid: false,
      			autowidth: false,
				shrinkToFit: false,
      			colNames: opts.colNames, 
      			colModel: opts.colModel, 
      			multiselect: false,
      			prmNames: {id: "Id"},
      			//localReader: { id: "Id" },
      			rowNum:10, 
      			//rowList:[10,20,30],
      			loadonce: false,
      			viewrecords: true,
      			pager: '#page' + this.attr("id") + 'pickData',
      			caption: opts.grid_caption,
      			//beforeSelectRow: function () {
    			//	return false;
				//},
      			ondblClickRow: function(rowId) {
            		//var rowData = jQuery(this).getRowData(rowId);
            		console.log("Selected:" + rowId);
            		assocGrid.jqGrid('setSelection', rowId);
            		saveBtn.click();
      			}
      			//loadComplete: function() {
      			//	assocGrid.jqGrid('setGridWidth', $("#pickListLeadpickModal").width() - 70);
      			//}
      		});
      		assocGrid.jqGrid('filterToolbar',{searchOperators : true});
      		assocGrid.trigger("reloadGrid"); 
      		//for(var i=0; i < opts.data.length;i++) {
   			//	assocGrid.jqGrid('addRowData',opts.data[i].id,opts.data[i]);
      		//}
    	};

		this.getText = function() {
			var text = "";
			if (opts.data_url !== undefined) {
	      		$.ajax({
		    		url : opts.data_url,
		    		type : "get",
		    		async: false,
		    		success : function(json_data) {
		       			var data = JSON.parse(json_data);
		       			if (data.selected.length > 0) {
		       				if (opts.data_type == "contact"){
		       					text += data.selected[0].pickLastName + " " + data.selected[0].pickFirstName;
		       				}
		       				if (opts.data_type == "legal"){
		       					text += data.selected[0].pickLegalName;
		       				}
		       			}
		    		},
		    		error: function() {
		    		}
		 		});
      		}
      		this.find("#" + this.attr("id") + "pickInput").val(text);
		};
		
		this.initText = function() {
			if (opts.init_text !== undefined)
				this.find("#" + this.attr("id") + "pickInput").val(opts.init_text);
		};
		
		this.controll = function() {
      		var pickThis = this;
      
	  		/*$("#pAdd").on('click', function() {
        		var gridData = jQuery("#" + pickThis.attr("id") + "pickData");
				var rowId = gridData.jqGrid('getGridParam', 'selrow');
				if (rowId != null) {
					var rowData = gridData.jqGrid('getRowData', rowId);
					gridData.jqGrid('delRowData', rowId);
					jQuery("#" + pickThis.attr("id") + "pickListResult").jqGrid('addRowData',rowId, rowData);
				}
      		});

      		$("#pAddAll").on('click', function() {
        		var gridData = jQuery("#" + pickThis.attr("id") + "pickData");
				var rowData = gridData.jqGrid('getRowData', null);
				for (var i = 0; i < rowData.length; i++)
					gridData.jqGrid('delRowData', rowData[i].id);
			
				for (var i = 0; i < rowData.length; i++) {
					jQuery("#" + pickThis.attr("id") + "pickListResult").jqGrid('addRowData',rowData[i].id, rowData[i]);
				}
      		});

      		$("#pRemove").on('click', function() {
        		var gridData = jQuery("#" + pickThis.attr("id") + "pickListResult");
				var rowId = gridData.jqGrid('getGridParam', 'selrow');
				if (rowId != null) {
					var rowData = gridData.jqGrid('getRowData', rowId);
					gridData.jqGrid('delRowData', rowId);
				
					jQuery("#" + pickThis.attr("id") + "pickData").jqGrid('addRowData',rowId, rowData);
				}
      		});

      		$("#pRemoveAll").on('click', function() {
        		var gridData = jQuery("#" + pickThis.attr("id") + "pickListResult");
				var rowData = gridData.jqGrid('getRowData', null);
				for (var i = 0; i < rowData.length; i++) {
					gridData.jqGrid('delRowData', rowData[i].id);
				}
			
				for (var i = 0; i < rowData.length; i++) {
					jQuery("#" + pickThis.attr("id") + "pickData").jqGrid('addRowData',rowData[i].id, rowData[i]);
				}
      		});*/
    	};

		this.init = function() {
			var pickListHtml =
        		"<div class='row'>" +
        		"  <div class='col-sm-12'>";
      		
      		pickListHtml += "<table id='" + this.attr("id") + "pickData'></table><div id='page" + this.attr("id") + "pickData'></div>";

      		pickListHtml +=
		        " </div>";
      		var inputHtml =   
  				"<div class='input-group' style='display: block'>" +
				"   <input type='text' class='form-control " + opts.input_class + "' id='" + this.attr("id") + "pickInput'";
		
	  		if (opts.width !== undefined)
	  			inputHtml += " style='width:" + opts.width + "px'";
	  	
	  		inputHtml += ">" +
				"   <span class='input-group-btn' style='display: block'>" +
				" <button id='btnOpen" + this.attr("id") + "' class='btn btn-default " + opts.input_button_class + "' type='button'><span class='caret'></span></button>" +
				"   </span>" +
				"</div>" +
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
				"      </div>" +
				"      <div class='modal-footer'>" +
				"        <button id='btnSave" + this.attr("id") + "' type='button' class='btn btn-primary'>" + opts.pick + "</button>" +
				"        <button type='button' class='btn btn-default' data-dismiss='modal'>" + opts.cancel + "</button>" +
				"      </div>" +
				"    </div>" +
				"  </div>" +
				"</div>";

      		this.append(inputHtml);

	  		var pickThis = this;
	  		$("#" + this.attr("id") + "pickInput").change(function() {
	  			if (opts.clear_func !== undefined) {
	  				opts.clear_func();
	  			}
	  		});
	  		
	  		$("#btnOpen" + this.attr("id")).on("click", function(){
      			pickThis.fill();
      			pickThis.controll();
        		$("#" + pickThis.attr("id") + "pickModal").modal({show: true});
        		if (opts.open_func !== undefined) {
	  				opts.open_func();
	  			}
      		});
      		$("#btnSave" + this.attr("id")).on("click", function(){
      			console.log("Save");
      			var gridData = jQuery("#" + pickThis.attr("id") + "pickData");
				var rowId = gridData.jqGrid('getGridParam', 'selrow');
				if (rowId != null) {
					var rowData = gridData.jqGrid('getRowData', rowId);
					var postData = {
						"targetId":rowData.id,
						"sourceId": opts.link_id,
						"rec_data": rowData
					}
					//console.log(rowData + opts.save_url);
					if (opts.save_url !== undefined) {
						console.log("send post");
			      		$.ajax({
				    		url : opts.save_url,
				    		type : "post",
				    		async: false,
				    		data: postData,
      						dataType: "json",
				    		success : function(json_data) { 
				       			//var data = JSON.parse(json_data);
				       			//if (data.selected.length > 0)
				       			//	text += data.selected[0].FirstName + " " + data.selected[0].LastName;
				       			//console.log("Saved ok");
				       			if (opts.data_type == "contact")
				       				pickThis.find("#" + pickThis.attr("id") + "pickInput").val(rowData.pickLastName + " " + rowData.pickFirstName);
				       			if (opts.data_type == "legal")
				       				pickThis.find("#" + pickThis.attr("id") + "pickInput").val(rowData.pickLegalName);
				    		},
				    		error: function() {
				    			//console.log("Pick save error");
				    		}
				 		});
		      		} else {
		      			//console.log(rowData.LegalName + " " + opts.data_type);
		      			if (opts.data_type == "contact")
		      				pickThis.find("#" + pickThis.attr("id") + "pickInput").val(rowData.pickLastName + " " + rowData.pickFirstName);
		      			if (opts.data_type == "legal")
		      				pickThis.find("#" + pickThis.attr("id") + "pickInput").val(rowData.pickLegalName);
		      			opts.save_func(postData);
		      		}
				}
      			$("#" + pickThis.attr("id") + "pickModal").modal("hide");
      		});
      		
      		pickThis.initText();
		};

		this.init();
		return this;
	};

	$.fn.jqGridPick.defaults = {
		pick: "Выбрать",
		cancel: "Отменить",
		window_title: "Header",
		grid_caption: "Select List",
		input_class: "",
		input_button_class: "",
		data_type: ""
/*	    add: 'Add',
	    addAll: 'Add All',
	    remove: 'Remove',
	    removeAll: 'Remove All',
	    window_title: "Header",
	    assoc_caption: 'Available records',
	    selected_caption: 'Selected',
	    input_class: "",
	    input_button_class: ""*/
	};

}(jQuery));