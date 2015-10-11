<?
/* for the contact page */
get_header(); ?>
<section class="banner-block contact-page-banner-block">
	<div class="banner-image">
		<?php if ( has_post_thumbnail() ) { ?>
			<?php the_post_thumbnail('full'); ?>
		<?php } ?>
	</div>
</section>
<aside class="contact-block">
	<div class="container-holder">
		<div class="contact-form validate-form">
				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
				<h2><?php the_title(); ?></h2>
				<div class="text-wrap validate-row">
					<?php the_content(); ?>
				</div>
					<?php endwhile;
				endif; ?>
				<?php //$page = get_page_by_title('Contact Page Contact Form'); ?>
				<?php //$content = wpautop($page->post_content);
				//$content = do_shortcode($content);
				//echo $content; ?>
		</div>
		<!-- <form action="#" class="contact-form validate-form">
			<fieldset>
				<h2><?php the_title(); ?></h2>
				<div class="text-wrap validate-row">
					<?php the_content(); ?>
					<a href="mailto:&#105;&#110;&#102;&#111;&#064;&#115;&#101;&#101;&#110;&#111;&#110;&#115;&#099;&#114;&#101;&#101;&#110;&#102;&#105;&#116;&#110;&#101;&#115;&#115;&#046;&#099;&#111;&#109;" class="mail">&#105;&#110;&#102;&#111;&#064;&#115;&#101;&#101;&#110;&#111;&#110;&#115;&#099;&#114;&#101;&#101;&#110;&#102;&#105;&#116;&#110;&#101;&#115;&#115;&#046;&#099;&#111;&#109;</a>
					<p>or leave us a message</p>
					<span class="txt-wrap">Comments or questions are welcome.</span>
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
		</form> -->
		<div class="social-block">
			<div class="social-holder">
				<h2>Join Us on Social</h2>
				<?php if ( dynamic_sidebar('contact_social_widget') ) : else : endif; ?>
				<!-- <div class="images-holder">
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
				</div> -->
				<?php include_once('_social-links.php'); ?>
			</div>
		</div>
	</div>
</aside>

<?php
get_footer();
?>
