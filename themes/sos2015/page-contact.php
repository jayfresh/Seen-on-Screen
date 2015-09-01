<?
/* for the contact page */
get_header(); ?>

<aside class="contact-block">
	<div class="container-holder">
		<form action="#" class="contact-form validate-form">
			<fieldset>
				<h2>Contact</h2>
				<div class="text-wrap validate-row">
					<p>We’d love to hear from you, whether it’s about bookings, questions or anything else.</p>
					<a href="mailto:&#105;&#110;&#102;&#111;&#064;&#115;&#101;&#101;&#110;&#111;&#110;&#115;&#099;&#114;&#101;&#101;&#110;&#102;&#105;&#116;&#110;&#101;&#115;&#115;&#046;&#099;&#111;&#109;" class="mail">&#105;&#110;&#102;&#111;&#064;&#115;&#101;&#101;&#110;&#111;&#110;&#115;&#099;&#114;&#101;&#101;&#110;&#102;&#105;&#116;&#110;&#101;&#115;&#115;&#046;&#099;&#111;&#109;</a>
					<p>or leave us a message</p>
					<span class="txt-wrap">Comments or questions are welcome. <br> *(denotes required field)</span>
				</div>
				<div class="form-input validate-row">
					<input class="required" type="text" placeholder="Name">
				</div>
				<div class="form-input validate-row">
					<input class="required-email" type="email" placeholder="Email">
				</div>
				<div class="form-input validate-row">
					<textarea class="required" placeholder="Message" rows="11" cols="32"></textarea>
				</div>
				<input type="submit" value="Enter">
			</fieldset>
		</form>
		<div class="social-block">
			<div class="social-holder">
				<h2>Join Us on Social</h2>
				<div class="images-holder">
					<div class="image">
						<a href="#">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img22.jpg" alt="40 squats 30 crunches 20 second" width="203" height="178">
						</a>
					</div>
					<div class="image">
						<a href="#">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img23.jpg" alt="image description" width="203" height="178">
						</a>
					</div>
					<div class="image">
						<a href="#">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img24.jpg" alt="image description" width="203" height="178">
						</a>
					</div>
					<div class="image">
						<a href="#">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img25.jpg" alt="image description" width="203" height="178">
						</a>
					</div>
					<div class="image">
						<a href="#">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img26.jpg" alt="image description" width="203" height="178">
						</a>
					</div>
					<div class="image">
						<a href="#">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img27.jpg" alt="image description" width="203" height="178">
						</a>
					</div>
				</div>
				<ul class="social-networks">
					<li><a href="#" class="tumblr">tumblr</a></li>
					<li><a href="#" class="facebook">facebook</a></li>
					<li><a href="#" class="twitter">twitter</a></li>
					<li><a href="#" class="google-plus">google-plus</a></li>
					<li><a href="#" class="pinterest">pinterest</a></li>
					<li><a href="#" class="youtube">youtube</a></li>
					<li><a href="#" class="rss">rss</a></li>
				</ul>
			</div>
		</div>
	</div>
</aside>

<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php endwhile;
endif;
get_footer();
?>
