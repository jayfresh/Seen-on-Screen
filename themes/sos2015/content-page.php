<?php /*
	Sub-template for single pages
*/ ?>
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
	<?php if ( has_post_thumbnail() ) { ?>
		<?php the_post_thumbnail('content-page'); ?>
	<?php } ?>
