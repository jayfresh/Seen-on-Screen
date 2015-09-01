<?php
/* for the Video Tutorials pages */
get_header();
?>
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php // TODO: make a custom post type for video tutorials ?>
		<?php endwhile;
	endif; ?>

	<section class="tutorial-block">
		<div class="container-holder">
			<div class="video-holder">
				<a href="#popup1" class="lightbox">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img28.jpg" alt="image description" width="492" height="328">
				</a>
			</div>
			<div class="text-block">
				<h2>The Twerktorial</h2>
				<span class="level">LEVEL - BEGGINER</span>
				<p>The Twerktorial is taught by Seen On Screen instructor Kelechi Nwanokwu and danced by Bonnie Parsons &amp; Christabelle Field. </p>
				<a href="#popup1" class="lightbox btn-more">more</a>
			</div>
		</div>
	</section>

<?php
get_footer();
?>
