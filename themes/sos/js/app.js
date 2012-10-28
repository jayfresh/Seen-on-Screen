jQuery(document).ready(function($) {

	// set up sub-menus
	$('#nav > li').on('mouseenter', function() {
		$(this).children('ul').show();
	}).on('mouseleave', function() {
		$(this).children('ul').hide();
	});

	/* set up carousels
		set widths correctly to get the right layout
		add arrows
		add animation
		add ability to wrap around */
	$('.carouselContainer').each(function() {
		var $container = $(this),
			$carousel = $container.children('.carousel'),
			$slides = $carousel.children('li'),
			slideCount = $slides.length,
			width = $container.width(),
			height = $container.height(),
			stripWidth = slideCount*width,
			carouselWidth = stripWidth*3,
			endTrigger = -(carouselWidth-2*width),
			$arrows,
			targetPos = -stripWidth;
		$slides.width(width);
		$carousel.append($slides.clone())
			.append($slides.clone())
			.width(stripWidth*3)
			.css('left', targetPos);
		$arrows = $('<a href="#" class="arrow">&lt;</a><a href="#" class="arrow opposite">&gt;</a>').appendTo($container);
		$arrows.on('click', function(e) {
			e.preventDefault();
			if($carousel.is(':animated')) {
				return false;
			}
			var $arrow = $(this),
				direction = $arrow.hasClass('opposite') ? 1 : -1;
			targetPos -= width*direction;
			$carousel.animate({
				'left': targetPos
			}, 500, 'easeInOutQuad', function() {
				// if we've reached either end, move back to centre
				if(targetPos>=0 || targetPos<=endTrigger) {
					targetPos = -stripWidth;
					$carousel.css('left', targetPos);
				}
			});
		});
	});
});