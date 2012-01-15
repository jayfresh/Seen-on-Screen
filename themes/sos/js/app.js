$.fn.equalize = function() {
	var $collection = this,
		heights = [],
		maxHeight;
	$collection.each(function(i, elem) {
		heights.push($(elem).height());
	});
	/* add minimum height of 2 lines */
	heights.push(parseInt($collection.eq(0).css('lineHeight'),10)*2);
	maxHeight = Math.max.apply(Math, heights);
	$collection.height(maxHeight);
	return this;
};

$(document).ready(function() {
		$('.equalize').equalize();
		return false;
});

/* set up homepage artist menu */
$(document).ready(function() {
	$('#artistsBox').css('position', 'relative');
	$('<ul id="dancersMiniList"></ul>')
		.css({
			position: 'absolute',
			top: 0,
			left: $('#artists li').width() +
				(parseInt($('#artists li').css('paddingLeft'),10) +
				parseInt($('#artists li').css('paddingRight'),10))*2 // for space
		})
		.appendTo('#artistsBox');
	$('#artists li').each(function() {
		var $li = $(this),
			artists = $li.find('span.hidden')
				.text()
				.replace(' - ','')
				.split(','),
			artistsList = "",
			artistCount = artists.length-1;
			divider = ", ";
		$.each(artists, function(i, artist) {
			artistsList += "<li><a href='"+window.location.pathname+"dancers/"+$.trim(artist).toLowerCase()+"'>"+$.trim(artist)+"</a>"+(i===artistCount ? "" : divider)+"</li>";
		});
		$('<ul>'+artistsList+'</ul>')
			.css('display','none')
			.appendTo($li);
	}).hover(function() {
		var top = $(this).position().top+5;
		$('#dancersMiniList')
			.empty()
			.append($(this).find('ul').html())
			.css({
				'top': top
			});
		return false;
	}, function() {
		// do nothing
	});
	$('#dancersMiniList a').live('hover', function() {
		var dancer = $(this).text().toLowerCase();
		$('#'+dancer).toggleClass('hoverClass');
	});
});

function extractParams(q) {
	var params,
		param,
		pairs;
	if(q) {
		params = {};
		q = q.substring(q.indexOf('?')+1);
		pairs = q.split('&');
		$.each(pairs, function(i, pair) {
			param = pair.split('=');
			params[param[0]] = param[1];
		});
	}
	return params;
}

function mapParamsToFormFields(params) {
	var fields = {
		id: "si_contact_subject1",
		text: ""
	},
	theClass = decodeURIComponent(params['class']);
	switch(params.page) {
		case "dancer":
			fields.text = "Enquiry for class with "+theClass;
			break;
		case "bookings":
			fields.text = "Enquiry for "+theClass+" class";
			break;
		case "packages":
			fields.text = "Enquiry for "+theClass+" package";
			break;
	}
	return fields;
}

/* pre-populate contact form */
$(document).ready(function() {
	var $contactForm = $('#contactForm'),
		params,
		fields;
	if($contactForm.length) {
		params = extractParams(window.location.search);
		if(params) {
			fields = mapParamsToFormFields(params);
			$('#'+fields.id).val(fields.text);
		}
	}
});

/* highlight dancer on dancer page */
$(document).ready(function() {
	if(window.highlightDancer) {
		$('#'+window.highlightDancer.toLowerCase()).addClass('hoverClass');
	}
});

/* start homepage press and artists slideshows */
$(document).ready(function() {
	$('#pressBox').cycle({

	});

	/*$('#artistsCaption').html($('#artistsBox li:first img').attr('alt'));
	$('#artistsBox').cycle({
		fit: 1,
        before:    function() {
        	$('#artistsCaption').stop().fadeOut(function() {
        		$(this).html("");
        	});
        },
        after:     function() {
            $('#artistsCaption')
            	.html($(this).children('img').attr('alt'))
            	.stop().fadeIn();
        }
    });*/
});