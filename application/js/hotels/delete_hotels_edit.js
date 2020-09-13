function on_load() {
	
	$("#HotelPhone").inputmask("+99(999)999-9999");
	
	$("#HotelFax").inputmask("+99(999)999-9999");
	
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
