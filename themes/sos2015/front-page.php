<?php
/* for the home page */
get_header();
?>
<section class="banner-block">
	<div class="banner-image">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img1.jpg" alt="SOS crew" width="1400" height="705">
	</div>
	<div class="images-container">
		<div class="image no-border">
			<a href="#">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img2.jpg" alt="image description" width="343" height="344">
				<span class="text-wrap">
					#SOSBackstage
				</span>
			</a>
		</div>
		<div class="image">
			<a href="#">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img3.jpg" alt="image description" width="343" height="342">
				<span class="text-wrap">
					<u>TimeTable</u>
				</span>
			</a>
		</div>
		<div class="image">
			<a href="#">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img4.jpg" alt="image description" width="343" height="343">
				<span class="text-wrap">
					<u>Crew</u>
				</span>
			</a>
		</div>
		<div class="image style-black">
			<a href="#">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img5.jpg" alt="image description" width="343" height="343">
				<span class="text-wrap">
					Become A <span class="text-sos">Seen On Screen</span> <strong>Member</strong>
				</span>
			</a>
		</div>
	</div>
	<div class="visual-container">
		<h1><mark>Join Us On Social</mark></h1>
		<?php /* NB: you need to make sure this is using this structure:
		<div class="images-wrap">
			<div class="image">
				<a href="#">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img6.jpg" alt="" width="180" height="158">
				</a>
			</div>
			...
		</div>
		*/ ?>
		<?php if ( dynamic_sidebar('home_social_widget') ) : else : endif; ?>
	</div>
</section>
<?php
get_footer();
?>