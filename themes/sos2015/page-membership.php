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
					<?php $membership =  get_page_by_title('Access All Areas'); ?>
					<?php echo wpautop($membership->post_content); ?>
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
					<?php $membership =  get_page_by_title('V.I.P'); ?>
					<?php echo wpautop($membership->post_content); ?>
					<strong class="title">V.I.P</strong>
					<span class="rate">&pound;75 PER MONTH</span>
					<a href="#" class="btn-signup">Sign Up Now</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>