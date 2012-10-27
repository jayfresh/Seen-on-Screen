<?php
/* for the home page */
get_header();
?>

			<div class="boxoutRow">
				<a class="boxout left" id="teamBoxout"></a>
				<a class="boxout left" id="eventsBoxout"></a>
				<div class="boxoutplain left last">
					<h2><a href="<?php echo home_url('/press/'); ?>">SOS Press</a></h2>
					<div class="pressQuotesContainer">
						<div class="pressQuotesStrip">
							<?php
							$quotes_query = new WP_Query(array(
								'sos_quotes' => 'press'
							));
							if($quotes_query->have_posts()) : while($quotes_query->have_posts()) : $quotes_query->the_post(); ?>
							<div class="pressQuote">
								<?php the_content();
								if ( has_post_thumbnail() ) {
									the_post_thumbnail();
								} else { ?>
								<img class="right" title="no thumbnail" src="<?php bloginfo('stylesheet_directory'); ?>/images/press/evening_standard_127_inverted.png">
								<?php } ?>
							</div>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</div>
			</div>
			<br class="clearboth">
			<div class="col left">
				<h2><img src="<?php bloginfo('stylesheet_directory'); ?>/images/roughs/twitter_large.png" class="marginrightsmall"><a href="https://twitter.com/sosfdance" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @sosfdance</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script><a href="http://twitter.com/sosfdance" target="_blank">Follow Us On Twitter - @sosfdance</a></h2>
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
				<h2><img src="<?php bloginfo('stylesheet_directory'); ?>/images/roughs/facebook_large.png" class="marginrightsmall"><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.seenonscreenevents.com&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=377320652348203" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px;" allowTransparency="true"></iframe>4,325 people like SOS</h2>
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/roughs/facewall.png">
			</div>
			<div class="col left last">
				<h2><img src="<?php bloginfo('stylesheet_directory'); ?>/images/roughs/youtube.png" height="28" class="marginrightsmall">Watch Our Latest Videos</h2>
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/roughs/video_wall.png">
			</div>
			<br class="clearboth">

<?php
get_footer();
?>