<?php
/*
Template Name Posts: Centered
*/

/* for single blog posts */
get_header(); ?>
			<div class="contentPage centered">
				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						get_template_part('content', 'single');
					endwhile;
				endif; ?>
			</div>
			<hr>
<?php get_footer(); ?>