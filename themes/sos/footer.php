			</div>
			<div id="sidebar" class="grid2col left">
<div id="tweets">
	<!--<h3>We're tweeting</h3>-->
	<!--<script src="http://widgets.twimg.com/j/2/widget.js"></script>-->
	<script type="text/javascript" src="/sos/wp-content/themes/sos/js/widget.js"></script>
	<script>
	new TWTR.Widget({
	  version: 2,
	  type: 'profile',
	  rpp: 5,
	  interval: 6000,
	  width: 160,
	  height: 500,
	  creator: true,
	  theme: {
	    shell: {
	      background: '#FFF',
	      color: '#545454'
	    },
	    tweets: {
	      background: '#FFF',
	      color: '#545454',
	      links: '#88FF00'
	    }
	  },
	  features: {
	    scrollbar: false,
	    loop: false,
	    live: false,
	    hashtags: false,
	    timestamp: true,
	    avatars: true,
	    behavior: 'all'
	  }
	}).render().setUser('seen_on_screen').start();
	</script>
					<!--<ul>
						<li>
							<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/tweeter.jpg" alt="tweeter" />
							<a href="http://twitter.com/statuses/111343435">@Michelle89</a>
							<p>We loved our day with Llyrio, he was so much fun!</p>
						</li>
						<li>
							<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/tweeter.jpg" alt="tweeter" />
							<a href="http://twitter.com/statuses/111343435">@AnastasiaZ</a>
							<p>Abby and Keeley couldn't have been more fun and were so professional.</p>
						</li>
						<li>
							<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/tweeter.jpg" alt="tweeter" />
							<a href="http://twitter.com/statuses/111343435">@BonnieParsons</a>
							<p>This week, the Seen On Screen dancers are appearing at the Notting Hill Carnival! Go guys!!</p>
						</li>
					</ul>-->
					<a href="http://twitter.com/seen_on_screen" id="moreTweets">more &raquo;</a>
				</div>
			</div>
            <div class="push clearboth"></div>
		</div>
		<div id="footerContainer">
			<div id="footer" class="footer jbasewrap">
		        <div class="right padtopsmall"><a href="mailto:info@seenonscreenfitness.com">info@seenonscreenfitness.com</a><span class="padleft">Tel: 07525 003 465</span></div>
	            <a id="contact_us_now_footer" class="padtopsmall" href="<?php bloginfo('url'); ?>/contact">contact us now</a>
	        </div>
		</div>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.4.1.js"></script>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/app.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>