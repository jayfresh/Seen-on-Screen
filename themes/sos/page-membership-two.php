<?php
/* for Membership page */
get_header(); ?>
	<div class="contentPage blackContainer" id="membership">	
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
			<div class="margintop">
				<div class="grid6col left">
				<?php the_content(); ?>
				</div>
				<div class="grid5col marginleft left">
				  <div class="badge">
					  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/aaa-membership.png" alt="Access All Areas membership">
					  <p>Unlimited Access to all SOS Classes and Workshops</p>
					  <p class="aaa"><span class="large">&pound;75</span> per month</p>
					  <form>
  					  paypal button here
					  </form>
				  </div>
				  <div class="badge">
					  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/vip-membership.png" alt="VIP membership">
					  <p>Access to all Weekend Workshops</p>
					  <p><span class="large">&pound;50</span> per month</p>
					  <form>
  					  paypal button here
					  </form>					  
				  </div>
				</div>
			</div>			
			<br class="clearboth">
		<?php
		endwhile;
	endif; ?>
	</div>
<?php get_footer(); ?>