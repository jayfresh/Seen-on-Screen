<?php
/* for the Membership page */
get_header(); ?>

<section class="membership-block">
	<div class="container-holder">
		<div class="col-container">
			<div class="text-block">
				<div class="holder">
					<h2>Membership</h2>
					<p>You don’t have to be a member to do our classes or workshops, just select your chosen workshop or evening class from the drop down menu above. However, if you’re addicted, we highly recommend becoming an SOS VIP and signing up as a member!</p>
				</div>
			</div>
			<div class="quote-holder">
				<blockquote>
					<q>&ldquo;You don’t have to be a member  to do our classes or workshop&rdquo;</q>
					<cite>Elle Magazine</cite>
				</blockquote>
			</div>
		</div>
		<div class="signup-holder">
			<div class="signup-block">
				<div class="img-holder">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/card-all.png" alt="AAA #sosbackstage" width="209" height="683">
				</div>
				<div class="text-holder">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit</p>
					<strong class="title">ACCESS ALL AREAS</strong>
					<span class="rate">&pound;100 PER MONTH</span>
					<a href="#" class="btn-signup">Sign Up Now</a>
				</div>
			</div>
			<div class="signup-block">
				<div class="img-holder">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/card-vip.png" alt="VIP #sosbackstage" width="207" height="684">
				</div>
				<div class="text-holder">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit</p>
					<strong class="title">V.I.P</strong>
					<span class="rate">&pound;75 PER MONTH</span>
					<a href="#" class="btn-signup">Sign Up Now</a>
				</div>
			</div>
		</div>
	</div>
</section>

	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<?php $post_id = get_the_id(); ?>
	  <?php $form_code = get_post_meta($post_id, '_custom_form', true);
    echo $form_code; ?>
	  <?php $form_code = get_post_meta($post_id, '_custom_form2', true);
    echo $form_code; ?>
		<?php
		endwhile;
	endif; ?>
<?php get_footer(); ?>
