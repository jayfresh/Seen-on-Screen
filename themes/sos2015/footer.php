		</main>
		<div id="footer">
			<div class="container-holder">
				<aside class="footer-block">
					<div class="social-block">
						<?php include_once('_social-links.php'); ?>
					</div>
					<nav class="footer-nav">
						<?php wp_nav_menu( array(
							'theme_location' => 'footer-menu',
							'container' => false
						)); ?>
					</nav>
				</aside>
				<footer class="footer-frame">
					<p>&copy; 2011-2017 <a href="/">Seen On Screen Fitness &amp; Events Ltd</a></p>
				</footer>
			</div>
		</div>
	</div><!-- end .wrapper -->
	<?php
	// this only outputs content for the Video Turorials page(s)
	the_lightbox(); ?>
	<?php // TODO: move script loading into functions.php for wp_footer ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/masonry.pkgd.min.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/imagesloaded.pkgd.min.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.easing.1.3.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.touchSwipe.min.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.main.js"></script>
	<?php wp_footer(); ?>
</body>
</html>
