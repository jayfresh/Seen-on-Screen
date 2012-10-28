jQuery(document).ready(function($) {

	// set up sub-menus
	$('#nav > li').on('mouseenter', function() {
		$(this).children('ul').show();
	}).on('mouseleave', function() {
		$(this).children('ul').hide();
	});

});