<?php
/* for #SOSBACKSTAGE page */
get_header();
?>
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
		<section class="content-section">
			<div class="container-holder">
				<div class="social-block">
					<p>follow what the sos crew are upto , onstage,backstage and classes</p>
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
				<div class="pictures-block">
					<div class="col">
						<div class="image">
							<a href="#">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img33.jpg" alt="image description" width="673" height="712">
							</a>
						</div>
						<div class="row">
							<div class="image">
								<a href="#">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img34.jpg" alt="image description" width="317" height="360">
								</a>
							</div>
							<div class="image">
								<a href="#">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img35.jpg" alt="image description" width="356" height="359">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="row">
							<div class="image">
								<a href="#">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img36.jpg" alt="image description" width="364" height="355">
								</a>
							</div>
							<div class="image">
								<a href="#">
									<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img37.jpg" alt="image description" width="352" height="356">
								</a>
							</div>
						</div>
						<div class="image">
							<a href="#">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img38.jpg" alt="image description" width="717" height="716">
							</a>
						</div>
					</div>
				</div>
			</div><!-- end .container-holder -->
			<form action="#" class="subscribe-form validate-form">
				<fieldset>
					<h2>Keep In touch! Sign Up to our Mailinglist</h2>
					<div class="input-holder">
						<div class="form-input validate-row">
							<input class="required" type="text">
						</div>
						<div class="form-input validate-row">
							<input class="required-email" type="email">
						</div>
						<input type="submit" value="Enter">
					</div>
				</fieldset>
			</form>
		</section><!-- end .content-block -->
		<?php endwhile;
	endif; ?>

<?php
get_footer();
?>
