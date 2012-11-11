<?php
/* for the home page */
get_header();
?>

			<div class="boxoutRow">
				<div class="boxout left" id="teamBoxout">
					<h2><a href="<?php echo home_url('/team/'); ?>">SoS team</a></h2>
				</div>
				<div class="boxoutplain left" id="eventsBoxout">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/events.png">
					<h2><a href="<?php echo home_url('/news/'); ?>">SoS backstage</a></h2>
				</div>
				<div class="boxoutplain left last" id="pressBoxout">
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
			<div class="cols">
				<div class="col left">
					<h2><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter_28-28.gif" class="marginrightsmall"><a href="https://twitter.com/sosfdance" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @sosfdance</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script><a href="http://twitter.com/sosfdance" target="_blank">@sosfdance</a></h2>
	                <?php tweet_blender_widget(array(
	                    'unique_div_id' => 'tweetblender-t1',
	                    'sources' => '@sosfdance',
	                    'refresh_rate' => 60,
	                    'tweets_num' => 3
	                )); ?>
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
			</div>
			<br class="clearboth">

<?php
get_footer();
?>