<?php
/* for the Membership page */
get_header(); ?>
<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post();
	// get the signup button form code
	$post_id = get_the_id();
	$form_code = get_post_meta($post_id, '_custom_form', true);
	$form_code = get_post_meta($post_id, '_custom_form2', true);
	endwhile;
endif; ?>
<div class="title-container">
	<h1>Membership</h1>
</div>
<section class="membership-block">
	<div class="container-holder">
		<div class="col-container">
			<div class="text-block">
				<div class="holder">
					<?php $membership =  get_page_by_title('Membership'); ?>
					<h2><?php echo $membership->post_title; ?></h2>
					<?php echo wpautop($membership->post_content); ?>
				</div>
			</div>
			<div class="quote-holder">
				<blockquote>
					<q>&ldquo;Thanks to SOS, we can unleash our inner Sasha Fierce while burning up to 600 calories&rdquo;</q>
					<cite>Mail Online</cite>
				</blockquote>
			</div>
		</div>
		<div class="signup-holder">
			<div class="signup-block">
				<!-- <div class="img-holder">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/membership-aaa.png" alt="Seen On Screen Unlimited Membership #sosbackstage" width="" height="">
				</div> -->
				<div class="text-holder">
					<strong class="title">ACCESS ALL AREAS</strong>
					<span class="rate">&pound;170 PER MONTH</span>
					<?php $membership = get_page_by_title('Access All Areas'); ?>
					<?php echo wpautop($membership->post_content); ?>
					<div class="btn-signup-holder">
						<a href="https://clients.mindbodyonline.com/classic/ws?studioid=44775&stype=40" target="_blank" class="btn-signup">Sign Up Now</a>
					</div>
				</div>
			</div>
			<div class="signup-block">
				<!-- <div class="img-holder">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/membership-vip.png" alt="Seen On Screen Weekend Membership #sosbackstage" width="" height="">
				</div> -->
				<div class="text-holder">
					<strong class="title">V.I.P</strong>
					<span class="rate">&pound;100 PER MONTH</span>
					<?php $membership = get_page_by_title('V.I.P'); ?>
					<?php echo wpautop($membership->post_content); ?>
					<div class="btn-signup-holder">
						<a href="https://clients.mindbodyonline.com/classic/ws?studioid=44775&stype=40" target="_blank" class="btn-signup">Sign Up Now</a>
					</div>
				</div>
			</div>
			<div class="signup-block">
				<!-- <div class="img-holder">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/membership-vip.png" alt="Seen On Screen Weekend Membership #sosbackstage" width="" height="">
				</div> -->
				<div class="text-holder">
					<strong class="title">WEEKEND</strong>
					<span class="rate">&pound;75 PER MONTH</span>
					<?php $membership = get_page_by_title('Weekend Membership'); ?>
					<?php echo wpautop($membership->post_content); ?>
					<div class="btn-signup-holder">
						<a href="https://clients.mindbodyonline.com/classic/ws?studioid=44775&stype=40" target="_blank" class="btn-signup">Sign Up Now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
