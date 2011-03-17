$.fn.equalize = function() {
	var $collection = this,
		heights = [],
		maxHeight;
	$collection.each(function(i, elem) {
		heights.push($(elem).height());
	});
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
			artistsList = "";
		$.each(artists, function(i, artist) {
			artistsList += "<li><a href='"+window.location.pathname+"dancers/"+$.trim(artist).toLowerCase()+"'>"+$.trim(artist)+"</a></li>";
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
		subject: "",
		message: ""
	},
	class = params.class;
	switch(params.page) {
		case "dancer":
			fields.subject = "Enquiry for class with "+class;
			break;
		case "bookings":
			fields.subject = "Enquiry for "+class+" class";
			break;
		case "packages":
			fields.subject = "Enquiry for "+class+" package";
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
			$.each(fields, function(id, text) {
				$('#'+id).val(text);
			});
		}
	}
});