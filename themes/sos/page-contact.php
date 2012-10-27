<?
/* for the contact page */
get_header();
if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>
			<div class="contentPage">
				<div class="contentColumn left">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
				<div class="eventbox left">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail(); 
					} else { ?>
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/roughs/map.png" title="no featured image">
					<?php } ?>
				</div>
			</div>
	<?php endwhile;
endif;
get_footer();
?>