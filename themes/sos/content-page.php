<?php /*
	Sub-template for single pages
*/ ?>
				<div class="contentColumn left">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
				<div class="eventbox left">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'content-page' );
					} else { ?>
					<img title="no featured image" src="<?php bloginfo('stylesheet_directory'); ?>/images/roughs/rihanna-event.png">
					<?php } ?>
				</div>