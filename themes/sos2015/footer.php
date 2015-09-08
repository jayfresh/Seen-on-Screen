		</main>
		<div id="footer">
			<div class="container-holder">
				<aside class="footer-block">
					<div class="social-block">
						<ul class="social-networks">
							<li><a href="#" class="tumblr">tumblr</a></li>
							<li><a href="#" class="facebook">facebook</a></li>
							<li><a href="#" class="twitter">twitter</a></li>
							<li><a href="#" class="google-plus">google-plus</a></li>
							<li><a href="#" class="pinterest">pinterest</a></li>
							<li><a href="#" class="youtube">youtube</a></li>
							<li><a href="#" class="rss">rss</a></li>
						</ul>
						<div class="card">
							<a href="#">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images/card.jpg" alt="NETBANX by OPTIMAL PAYMENTS VISA" width="106" height="67">
							</a>
						</div>
					</div>
					<nav class="footer-nav">
						<?php wp_nav_menu( array(
							'theme_location' => 'footer-menu',
							'container' => false
						)); ?>
					</nav>
				</aside>
				<footer class="footer-frame">
					<div class="footer-logo">
						<a href="#">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo1.png" alt="Seen On Screen" width="189" height="106">
						</a>
					</div>
					<p>&copy; 2011-2015 <a href="#">Seen On Screen Fitness &amp; Events Ltd</a></p>
				</footer>
			</div>
		</div>
	</div><!-- end .wrapper -->
	<?php // TODO: move the popup holder into functions.php ?>
	<section class="popup-holder">
		<div id="popup1" class="lightbox">
			<div class="popup-content">
				<a href="#" class="close">Close</a>
				<div class="video-holder">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/video-placeholder.jpg" alt="image description" width="1114" height="659">
				</div>
				<div class="text-holder">
					<h2>The Beyoncé Dance Tutorial</h2>
					<p>This is week are focusing the Beyoncé booty shake and strut! </p>
					<p>Practice this routine at home, with friends or at the office when your boss isn't looking and then come and learn the real thing in January when we teach this is class as part of the January Yoncé workout.</p>
					<p>We do not own copyright of this music, it is purely for entertainment and inspirational value, we are not profiting from this video</p>
				</div>
			</div>
		</div>
	</section>
	<?php // TODO: move script loading into functions.php for wp_footer ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/masonry.pkgd.min.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/imagesloaded.pkgd.min.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.main.js"></script>
	<?php wp_footer(); ?>
</body>
</html>
