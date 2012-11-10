/*
 jquery.youtubeUploadsAndFavorites.js
 
 Gets the uploads and favorites for a YouTube username
 - removes duplicates
 - orders in reverse chronological order
 - retries the last 20 of each feed
 
 usage: $(selector).youtubeUploadsAndFavorites();
 
 author: Jonathan Lister - jonathan@withjandj.com
 inspired by: https://github.com/dharyk/jQuery.youtubeChannel */

;(function($){
	$.fn.youtubeUploadsAndFavorites = function(settings) {
		if(!settings.username) {
			return false;
		}
		var $vidList = $("<ul></ul>").appendTo(this),
			urlCount = 0,
			videos = [],
			videoTitles = {},
			parseResult = function(data) {
				var vid, e, length;
                $.each(data.feed.entry, function() {
                	var vid = this,
                		thumbnailGroup = vid.media$group.media$thumbnail,
                		title = vid.title.$t;
                	if(!thumbnailGroup) { // sometimes this seems to fail
                		return true;
                	}
                	if(!videoTitles[title]) {
                		videoTitles[title] = vid;
		                videos.push({
							published: new Date(vid.published.$t),
		                	link: vid.link[0].href,
			                title: title,
		                	thumb: thumbnailGroup[3].url
						});
					}
                });
			},
			addVideo = function(vid) {
				var liHTML = '<li><a target="_blank" href="'+vid.link+'"><img class="vid-thumb" title="'+vid.title+'" alt="'+vid.title+'" src="'+vid.thumb+'"/></a></li>';
				$vidList.append(liHTML);
			},
			getCallback = function(data) {
				parseResult(data);
				urlCount++;
				if(urlCount==2) {
					finalCallback();
				}
			},
			finalCallback = function() {
				videos.sort(function(a, b) {
					return a.published < b.published ? 1 : -1;
				});
				$.each(videos, function() {
					addVideo(this);
				});
			},
			urlBase = 'http://gdata.youtube.com/feeds/api/users/'+settings.username,
			urlQuery = '?alt=json&v=2&orderby=published&max-results=20',
			uploadsURL = urlBase+'/uploads/'+urlQuery,
			favoritesURL = urlBase+'/favorites/'+urlQuery;
		$.getJSON(uploadsURL, getCallback);
		$.getJSON(favoritesURL, getCallback);
	};
})(jQuery);