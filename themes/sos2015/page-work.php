<?
/* for the Work page */
get_header();
?>
<div class="title-container">
	<h1>Take SOS to work</h1>
</div>
<section class="logos-block content-block">
	<div class="container-holder">
		<p>SOS work with the biggest names in fashion, finance, music and entertainment. We deliver a diverse range of services from brand partnerships, consultancy, product launches, client and employee rewards, team building in house dance classes and SOS performances with our top pro dance team!</p>
		<p>We would love to hear from you and chat through how we can help, so please get in touch at <a href="mailto:events@seenonscreenfitness.com">events@seenonscreenfitness.com</a> or use the contact form below.</p>
		<h2>Some of our clients</h2>
		<ul class="logo-list">
		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();
			$quotes_query = new WP_Query(array(
				'sos_quotes' => 'corporate',
				'posts_per_page' => -1
			));
			if($quotes_query->have_posts()) : while($quotes_query->have_posts()) : $quotes_query->the_post();
				if ( has_post_thumbnail() ) {
					global $post;
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
					$image_url = $thumb['0'];
				}
				$quote_url = get_post_meta(get_the_ID(), '_url', true); ?>
			<li><img src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>"></li>	
			<?php endwhile; endif;
		endwhile; endif; ?>
		</ul>
		<h2>Testimonials</h2>
		<ul class="testimonials">
		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();
			$quotes_query = new WP_Query(array(
				'sos_quotes' => 'testimonials',
				'posts_per_page' => -1
			));
			if($quotes_query->have_posts()) : while($quotes_query->have_posts()) : $quotes_query->the_post(); ?>
			<li class="testimonial"><?php the_content(); ?></li>
			<?php endwhile; endif;
		endwhile; endif; ?>
		</ul>
		<div class="contact-form-container">
			<?php $page = get_page_by_title('Events Contact Form'); ?>
			<?php $content = wpautop($page->post_content);
			$content = do_shortcode($content); ?>
			<div class="booking-form validate-form">
				<h2>Contact Us and Book</h2>
				<?php echo $content; ?>
			</div>
			<!--<form action="#" class="booking-form validate-form">
				<fieldset>
					<div class="form-input validate-row">
						<input class="required" type="text" placeholder="Name">
					</div>
					<div class="form-input validate-row">
						<input class="required-email" type="email" placeholder="Email">
					</div>
					<div class="form-input validate-row">
						<textarea class="required" placeholder="Message" cols="32" rows="9"></textarea>
					</div>
					<input type="submit" value="enter">
				</fieldset>
			</form>-->
		</div>
	</div>
</section>
<?php
get_footer();
?>
