$(document).ready(function(){

	//Tab Selection

	$('.tab-selection li, .r-form').click(function(){
		var TabSelection = $(this).attr('selecttab');
		TabSelection = '.'+TabSelection;
		$('.selected').removeClass('selected');
		$(TabSelection).addClass('selected');
	});

});