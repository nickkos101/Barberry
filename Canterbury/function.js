$(document).ready(function(){

	//Tab Selection

	$('.tab-selection li, .r-form').click(function(){
		var TabSelection = $(this).attr('selecttab');
		TabSelection = '.'+TabSelection;
		$('.selected').removeClass('selected');
		$(TabSelection).addClass('selected');
	});

	$('.reviews button').click(function(event) {
		$('.selected').removeClass('selected');
		$('.comments').addClass('selected');
	});

	//Slider Code
	setInterval(
		function () {
			$('.slider .slide:first-of-type').insertAfter('.slider .slide:last-of-type');
			$('.slider .slide:last-of-type').fadeOut(300,function(){
				$('.slider .slide:first-of-type').fadeIn(300);
			});		
		},5000
		);

});
