<?php /*
	Sub-template for single pages
*/ ?>
				<div class="contentColumn left">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
				<div class="eventbox plainbox left">
					<?php if ( has_post_thumbnail() ) { ?>
					<div class="eventImageContainer">
						<?php the_post_thumbnail('content-page'); ?>
					</div>
					<?php } else { ?>
					<div class="carouselContainer eventImageContainer">
						<?php if(!attachment_toolbox('content-page', 'carousel')) { ?>
							<img title="no featured image" src="<?php bloginfo('stylesheet_directory'); ?>/images/roughs/rihanna-event.png">
						<?php } ?>
					</div>
					<?php } ?>
				</div>