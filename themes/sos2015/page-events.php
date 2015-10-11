<?
/* for the Events page */
get_header();
?>
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
		<div class="title-container">
			<h1><?php the_title(); ?></h1>
		</div>
		<?php the_content(); ?>
		<?php // grab the video URL for use later
		$video_url = get_post_meta(get_the_id(), '_videolist', true); ?>
	<?php endwhile; endif; ?>

	<section class="content-block events-block">
		<div class="container-holder">
			<div class="column">
				<div class="text-block secondary-box">
					<?php $page =  get_page_by_title('I just came here to party'); ?>
					<h2><?php echo ($page->post_title); ?></h2>
					<?php echo wpautop($page->post_content); ?>
				</div>
				<div class="text-wrap primary-box">
					<?php $page =  get_page_by_title('Dance Package'); ?>
					<h2><?php echo ($page->post_title); ?></h2>
					<?php echo wpautop($page->post_content); ?>
				</div>
				<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>
				<div class='embed-container video-holder'><iframe src='<?php echo $video_url; ?>' frameborder='0' allowfullscreen></iframe></div>
			</div>
			<div class="column">
				<!-- <?php $quotes_query = new WP_Query(array(
					'sos_quotes' => 'events'
				)); ?>
				<?php if($quotes_query->have_posts()) : while($quotes_query->have_posts()) : $quotes_query->the_post(); ?>
						<?php the_content(); ?>
				<?php endwhile; endif; ?> -->
				<blockquote>
					<q>&ldquo;Grab your hens, choose an  artist and prepare to dance like a star&rdquo;</q>
					<cite>brides magazine</cite>
				</blockquote>
				<div class="text-wrap primary-box">
					<?php $page =  get_page_by_title('Music Video Package'); ?>
					<h2><?php echo ($page->post_title); ?></h2>
					<?php echo wpautop($page->post_content); ?>
				</div>
				<div class="images-block">
					<div class="image">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img29.jpg" alt="image description" width="314" height="315">
					</div>
					<div class="image">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img30.jpg" alt="image description" width="314" height="315">
					</div>
				</div>
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
