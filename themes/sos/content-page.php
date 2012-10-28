<?php /*
	Sub-template for single pages
*/ ?>
				<div class="contentColumn left">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
				<div class="eventbox left carouselContainer">
					<?php if ( has_post_thumbnail() ) {
						attachment_toolbox($size = 'content-page', 'carousel');
					} else { ?>
					<img title="no featured image" src="<?php bloginfo('stylesheet_directory'); ?>/images/roughs/rihanna-event.png">
					<?php } ?>
				</div>