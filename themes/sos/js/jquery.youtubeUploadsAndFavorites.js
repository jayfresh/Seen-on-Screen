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
                $.each(data.items, function() {
                	var vid = this,
                		thumbnailGroup = vid.snippet.thumbnails,
                		title = vid.snippet.title;
                	if(!thumbnailGroup) { // sometimes this seems to fail
                		return true;
                	}
                	if(!videoTitles[title]) {
                		videoTitles[title] = vid;
		                videos.push({
        							published: new Date(vid.snippet.publishedAt),
                      link: 'https://www.youtube.com/watch?v=' + vid.contentDetails.videoId,
			                title: title,
		                	thumb: thumbnailGroup.default.url
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
				if(urlCount==1) {
					finalCallback();
				}
			},
			finalCallback = function() {
				videos.sort(function(a, b) {
					return a.published < b.published ? 1 : -1;
				});
				$.each(videos, function(i) {
					if(i===25) {
  					return false; // time to stop
					}
					addVideo(this);
				});
			},
      playlistId = 'UUpy_izfufrE4eXyCWQk4g6A',
			urlBase = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2CcontentDetails%2Cstatus&maxResults=50&playlistId=',
			urlQuery = '&key=AIzaSyAYDgLN6uNYCSeCvMXROLCvFYGkigEwIh4',
			uploadsURL = urlBase + playlistId + urlQuery;
			//favoritesURL = urlBase+'/favorites/'+urlQuery;
		$.getJSON(uploadsURL, getCallback);
		//$.getJSON(favoritesURL, getCallback);
	};
})(jQuery);
