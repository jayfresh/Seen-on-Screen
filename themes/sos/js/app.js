jQuery(document).ready(function($) {

	var ANIMATE_TIME = 500;

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
	$('.carouselContainer').imagesLoaded(function() {
		$(this).each(function() {
			var $container = $(this),
				$carousel = $container.children('.carousel'),
				$slides = $carousel.children('li'),
				slideCount = $slides.length,
				width = $container.width(),
				height = $container.height(),
				stripWidth = slideCount*width,
				carouselWidth = stripWidth*3,
				endTrigger = -(carouselWidth-3*width),
				$arrows,
				targetPos = -stripWidth,
				containerHalfHeight;
			$slides.width(width);
			$carousel.append($slides.clone())
				.append($slides.clone())
				.width(stripWidth*3)
				.css('left', targetPos);
			containerHalfHeight = $container.height()/2;
			$arrows = $('<a href="#" class="arrow">&lt;</a><a href="#" class="arrow opposite">&gt;</a>')
				.appendTo($container)
				.css('top', function(i, val) {
					return containerHalfHeight - $(this).height()/2;
				});
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
				}, ANIMATE_TIME, 'easeInOutQuad', function() {
					// if we've reached either end, move back to centre
					if(targetPos>=0 || targetPos<=endTrigger) {
						targetPos = -stripWidth;
						$carousel.css('left', targetPos);
					}
				});
			});
		});
	});
	
	// the different carousel for the team page
	$('.teamCarouselContainer').imagesLoaded(function() {
		var $container = $(this),
			$carousel = $container.children('.carouselStrip').children('ul'),
			$slides = $carousel.children('li'),
			slideCount = $slides.length,
			$arrows,
			containerHalfHeight,
			activeSlide = Math.ceil(slideCount/2)-1,
			max_width = 310,
			max_height = 275,
			max_opacity = 1,
			mid_width = 205,
			mid_height = 205,
			mid_margin = 35,
			mid_opacity = 0.8,
			min_width = 155,
			min_height = 155,
			min_margin = 60,
			min_opacity = 0.5,
			setupStrip = function() {
				var width = max_width+mid_width*2+min_width*(slideCount-3);
				$slides.css({
					height: min_height,
					width: min_width,
					marginTop: min_margin,
					marginBottom: min_margin,
					opacity: min_opacity
				});
				$slides.eq(activeSlide)
					.css({
						height: max_height,
						width: max_width,
						margin: 0,
						opacity: max_opacity
					});
				$slides.eq(activeSlide-1).add($slides.eq(activeSlide+1))
					.css({
						height: mid_height,
						width: mid_width,
						marginTop: mid_margin,
						marginBottom: mid_margin,
						opacity: mid_opacity
					});
				$carousel.width(width)
					.css('left', -200); // TO-DO: this needs to be not hard-coded
				$slides.css({
					visibility: 'visible'
				});
			},
			growToMax = function(i) {
				var film_spacing = 0,
					offset = film_spacing+min_width,
					modifier = activeSlide > i ? "+=" : "-=",
					$activeSlide = $slides.eq(i);
				$carousel.animate({
					"left": modifier+offset
				}, {
					duration: ANIMATE_TIME,
					easing: "linear",
					complete: function() {
						$container.children('.infobox').html($activeSlide.find('.infobox').html());
						activeSlide = i;
					}
				});
				$slides.eq(i).animate({
					width: max_width,
					height: max_height,
					marginTop: 0,
					marginBottom: 0,
					opacity: max_opacity
				}, ANIMATE_TIME, "linear");
				$slides.eq(i-1).add($slides.eq(i+1)).animate({
					width: mid_width,
					height: mid_height,
					marginTop: mid_margin,
					marginBottom: mid_margin,
					opacity: mid_opacity
				}, ANIMATE_TIME, "linear");
				$slides.eq(i-2).add($slides.eq(i+2)).animate({
					width: min_width,
					height: min_height,
					marginTop: min_margin,
					marginBottom: min_margin,
					opacity: min_opacity
				}, ANIMATE_TIME, "linear");
			};
		setupStrip();
		containerHalfHeight = $container.height()/2;
		$arrows = $('<a href="#" class="arrow">&lt;</a><a href="#" class="arrow opposite">&gt;</a>')
			.appendTo($container)
			.css('top', function(i, val) {
				return containerHalfHeight - $(this).height()/2;
			});
		$arrows.on('click', function(e) {
			e.preventDefault();
			if($carousel.is(':animated')) {
				return false;
			}
			var $arrow = $(this),
				direction = $arrow.hasClass('opposite') ? 1 : -1;
			if(direction===1) {
				if(activeSlide+1<slideCount) {
					growToMax(activeSlide+1);
				}
			} else {
				if(activeSlide-1>=0) {
					growToMax(activeSlide-1);
				}
			}
		});
		$container.children('.infobox').html($slides.eq(activeSlide).find('.infobox').html());
	});
	
	/* set up the YouTube video wall on home page */
	$('#youtubeChannel div').youtubeUploadsAndFavorites({
        username: 'SoSdancelife'
    });
    
    /* set up studio map */
    $('#map').each(function() {
		var map,
			geocoder,
			script = document.createElement('script'),
			initialize = function() {
				var mapOptions = {
					zoom: 14,
					center: new google.maps.LatLng(51.509597, -0.127398),
						mapTypeId: google.maps.MapTypeId.ROADMAP
					},
					bounds,
					$studios = $('.studio'),
					studioCount = $studios.length-1;
				map = new google.maps.Map(document.getElementById('map'), mapOptions);
				geocoder = new google.maps.Geocoder();
				$studios.each(function(i) {
		    		var address = $(this).find('.studio_address').html().replace(/<br>|<br\/>/g, ','),
		    			title = $(this).find('h1').text();
				    address = address + ", UK";
				    geocoder.geocode( { 'address': address}, function(results, status) {
				        if (status == google.maps.GeocoderStatus.OK) {
							var latLng = results[0].geometry.location,
								marker = new google.maps.Marker({
									position: latLng,
									title: title
								});
							marker.setMap(map);
							if(!bounds) {
								bounds = new google.maps.LatLngBounds(latLng, latLng);
							} else {
								bounds.extend(latLng);
							}
				        } else {
				            //alert("Geocode was not successful for the following reason: " + status);
				        }
				        if(i===studioCount) {
				        	if(studioCount) { // there is more than one
					        	map.fitBounds(bounds);
				        	} else {
				        		map.setCenter(latLng)
				        	}
				        }        		    	
				    });
		    	});
			};
		window.initialize = initialize;
		script.type = 'text/javascript';
		script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize';
		$("head").append(script);
    	return false;
    });
});