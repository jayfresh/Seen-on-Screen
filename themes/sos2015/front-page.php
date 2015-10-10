<?php
/* for the home page */
get_header();
?>
<section class="banner-block">
	<div class="banner-image">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img1.jpg" alt="SOS crew" width="1400" height="705">
		<div class="hero-text-container">
			<h1>Dance like a star</h1>
			<?php $class_schedule_url = get_permalink( get_page_by_path( 'book-classes' ) ); ?>
			<p><a href="<?php echo $class_schedule_url; ?>">Book your class now</a></p>
		</div>
	</div>
	<div class="images-container">
		<div class="image no-border">
			<a href="<?php echo get_permalink( get_page_by_path( 'sosbackstage' ) ); ?>">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/sosbackstage-343.png" alt="#SOSBackstage" width="343" height="344">
				<span class="text-wrap">
					#SOSBackstage
				</span>
			</a>
		</div>
		<div class="image">
			<a href="<?php echo get_permalink( get_page_by_path( 'timetable' ) ); ?>">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/timetable-343.jpg" alt="SOS class" width="343" height="342">
				<span class="text-wrap">
					Timetable
				</span>
			</a>
		</div>
		<div class="image">
			<a href="<?php echo get_permalink( get_page_by_path( 'team' ) ); ?>">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/team-343.png" alt="The SOS team" width="343" height="343">
				<span class="text-wrap">
					Crew
				</span>
			</a>
		</div>
		<div class="image style-black mobile-only">
			<a href="<?php echo $class_schedule_url; ?>">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img5.jpg" alt="Book a class" width="343" height="343">
				<span class="text-wrap">
					Book a <strong>Class</strong>
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
