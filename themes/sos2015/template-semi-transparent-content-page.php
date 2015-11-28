<?php
/* Template Name: Semi-transparent Content Area */
get_header();
?>
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<div class="title-container">
    		<h1><?php the_title(); ?></h1>
    	</div>
    	<?php if ( has_post_thumbnail() ) { ?>
    		<?php the_post_thumbnail('full'); ?>
    	<?php } ?>
    	<div class="page-content-container page-content-container-semi-transparent">
    		<?php the_content(); ?>
    	</div>
		<?php endwhile;
	endif; ?>

<?php
get_footer();
?>
