<?php
/* for the home page */
get_header();
?>

			<div class="boxoutRow">
				<a class="boxout left" id="teamBoxout"></a>
				<a class="boxout left" id="eventsBoxout"></a>
				<div class="boxoutplain left last">
					<h2><a href="<?php echo home_url('/press/'); ?>">SOS Press</a></h2>
					<div class="pressQuotesContainer carouselContainer">
						<ul class="carousel">
							<?php
							$quotes_query = new WP_Query(array(
								'sos_quotes' => 'press'
							));
							if($quotes_query->have_posts()) : while($quotes_query->have_posts()) : $quotes_query->the_post(); ?>
							<li class="pressQuote">
								<?php the_content();
								if ( has_post_thumbnail() ) {
									the_post_thumbnail();
								} else { ?>
								<img class="right" title="no thumbnail" src="<?php bloginfo('stylesheet_directory'); ?>/images/press/evening_standard_127_inverted.png">
								<?php } ?>
							</li>
							<?php endwhile; endif; ?>
						</ul>
					</div>
				</div>
			</div>
			<br class="clearboth">
			<div class="col left">
				<h2><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter_28-28.gif" class="marginrightsmall"><a href="https://twitter.com/sosfdance" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @sosfdance</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script><a href="http://twitter.com/sosfdance" target="_blank">@sosfdance</a></h2>
                <?php tweet_blender_widget(array(
                    'unique_div_id' => 'tweetblender-t1',
                    'sources' => '@sosfdance',
                    'refresh_rate' => 60,
                    'tweets_num' => 3
                )); ?>
				
				<!--<ul class="twitter condensed">
					<li class="marginbottomsmall"><a href="#">SEEN_ON_SCREEN</a> "@turkey_north: @SEEN_ON_SCREEN what's the song for the 14 July workshop?" not sure yet, once it's decided we'll let u know. Any suggestions!?<br><a href="#">3 days ago</a>&nbsp;&middot;&nbsp;<a href="#">reply</a></li>
					<li class="marginbottomsmall"><a href="#">SEEN_ON_SCREEN</a> If you missed y'days Beyonce workshop (if you did missed out!) don't worry as we are teaching it again on Wednesday night, 7-8pm!<br><a href="#">3 days ago</a>&nbsp;&middot;&nbsp;<a href="#">reply</a></li>
					<li class="marginbottomsmall"><a href="#">MFParsons</a> MEGA,MEGA,MEGA! Hands down, the best dance class I have ever done,"@SEEN_ON_SCREEN: Ooo come on babaay, you put ma love on top, top, top..."<br><a href="#">3 days ago</a>&nbsp;&middot;&nbsp;<a href="#">reply</a></li>
				</ul>-->
			</div>
			<div class="col left">
				<h2><img src="<?php bloginfo('stylesheet_directory'); ?>/images/roughs/facebook_large.png" class="marginrightsmall">Like SOS on Facebook</h2>
				<div class="fb-like-box" data-href="http://www.facebook.com/seenonscreenfitness" data-width="292" data-show-faces="true" data-stream="false" data-header="false"></div>
			</div>
			<div class="col left last" id="youtubeChannel">
				<h2><img src="<?php bloginfo('stylesheet_directory'); ?>/images/youtube_28-28.gif" class="marginrightsmall">Watch Our Latest Videos</h2>
				<div></div>
				<!--<img src="<?php bloginfo('stylesheet_directory'); ?>/images/roughs/video_wall.png">-->
			</div>
			<br class="clearboth">

<?php
get_footer();
?>