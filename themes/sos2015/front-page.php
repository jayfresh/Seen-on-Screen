<?php
/* for the home page */
get_header();
?>
<section class="banner-block">
	<div class="banner-image">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img1.jpg" alt="The UK's sassiest exercise option" width="1400" height="705">
		<div class="hero-text-container">
			<h1><span>The UK's sassiest exercise option</span></h1>
			<?php $class_schedule_url = get_permalink( get_page_by_path( 'timetable' ) ); ?>
			<p><a href="<?php echo $class_schedule_url; ?>">View timetable</a></p>
		</div>
	</div>
	<div class="images-container">
		<div class="image">
			<a href="<?php echo get_permalink( get_page_by_path( 'book-classes' ) ); ?>">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/book-classes-686.jpg" alt="Book SOS classes" width="343" height="343">
				<span class="text-wrap">
					Book Classes
				</span>
			</a>
		</div>
		<div class="image">
			<a href="<?php echo get_permalink( get_page_by_path( 'take-sos-to-work' ) ); ?>">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/events-686.jpg" alt="Book SOS events" width="343" height="342">
				<span class="text-wrap">
					Book Events
				</span>
			</a>
		</div>
		<div class="image">
			<a href="/online-classes">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/online-classes-686.jpg" alt="SOS online classes" width="343" height="343">
				<span class="text-wrap">
					Online Classes
				</span>
			</a>
		</div>
		<div class="image style-black">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img5.jpg" alt="Book a class" width="343" height="343">
			<form action="//seenonscreenfitness.us2.list-manage.com/subscribe/post?u=f8ced585667d72e57f4054249&amp;id=0e966065b2" method="post" class="subscribe-form validate-form" target="_blank">
				<fieldset>
					<h2>Keep in touch! Join our mailing list</h2>
					<div class="input-holder">
						<div class="form-input validate-row">
							<input type="text" value="" name="FNAME" class="required" id="mce-FNAME" placeholder="First name">
						</div>
						<div class="form-input validate-row">
							<input type="text" value="" name="LNAME" class="required" id="mce-LNAME" placeholder="Last name">
						</div>
						<div class="form-input validate-row">
							<input class="required email" type="email" value="" name="EMAIL" id="mce-EMAIL" placeholder="email">
						</div>
						<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				    <div style="position: absolute; left: -5000px;"><input type="text" name="b_f8ced585667d72e57f4054249_0e966065b2" tabindex="-1" value=""></div>
						<input type="hidden" value="html" name="EMAILTYPE" id="mce-EMAILTYPE-0">
						<input type="submit" name="subscribe" value="Subscribe">
					</div>
				</fieldset>
			</form>
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
