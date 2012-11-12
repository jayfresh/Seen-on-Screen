<?php /*
	Sub-template for single pages
*/ ?>
				<div class="contentColumn left">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
				<div class="eventbox plainbox left">
					<?php if ( has_post_thumbnail() ) { ?>
					<div class="carouselContainer eventImageContainer">
						<?php attachment_toolbox('content-page', 'carousel'); ?>
					</div>
					<?php } else { ?>
					<div class="eventImageContainer">
						<img title="no featured image" src="<?php bloginfo('stylesheet_directory'); ?>/images/roughs/rihanna-event.png">
					</div>
					<?php } ?>
				</div>