$(document).ready(function(){

	//Tab Selection

	$('.tab-selection li').click(function(){
		var TabSelection = $(this).attr('selecttab');
		TabSelection = '.'+TabSelection;
		$('.selected').removeClass('selected');
		$(TabSelection).addClass('selected');
	});

});