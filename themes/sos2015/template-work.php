<?
/* Template Name: Take SOS To Work */
get_header(); ?>
<div class="work-page">
	<div class="title-container">
		<h1>Take SOS to work</h1>
	</div>
	<section class="logos-block content-block">
		<div class="container-holder page-content-container page-content-container-semi-transparent">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="work-intro">
				<?php the_content(); ?>
			</div>
			<?php endwhile; endif; ?>
			<h2>Some of our clients</h2>
			<ul class="logo-list">
			<?php $quotes_query = new WP_Query(array(
					'sos_quotes' => 'corporate',
					'posts_per_page' => -1,
					'orderby'=>'menu_order',
					'order'=>'ASC'
				));
				if($quotes_query->have_posts()) : while($quotes_query->have_posts()) : $quotes_query->the_post();
					if ( has_post_thumbnail() ) {
						global $post;
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						$image_url = $thumb['0'];
						// leaving no whitespace between li elements so they sit flush next to each other
					?><li><img src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>"></li><?php
					}
					endwhile; endif; ?>
			</ul>
			<h2>Testimonials</h2>
			<div class="carouselContainer autoScroll">
				<ul class="testimonials carousel">
				<?php $quotes_query = new WP_Query(array(
					'sos_quotes' => 'testimonials',
					'posts_per_page' => -1,
					'orderby'=>'menu_order',
					'order'=>'ASC'
				));
				if($quotes_query->have_posts()) : while($quotes_query->have_posts()) : $quotes_query->the_post(); ?>
					<li class="testimonial"><?php the_content();
					if ( has_post_thumbnail() ) {
						global $post;
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						$image_url = $thumb['0']; ?><img src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>"><?php
					} ?></li>
				<?php endwhile; endif; ?>
				</ul>
			</div>
			<div class="contact-form-container">
				<?php $page = get_page_by_title('Work Contact Form'); ?>
				<?php $content = wpautop($page->post_content);
				$content = do_shortcode($content); ?>
				<h2>Contact Us and Book</h2>
				<div class="booking-form validate-form">
					<?php echo $content; ?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>
