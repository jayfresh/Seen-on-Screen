<?php /*
	Sub-template for single pages
*/ ?>
	<div class="title-container">
		<h1><?php the_title(); ?></h1>
	</div>
	<?php if ( has_post_thumbnail() ) { ?>
		<?php the_post_thumbnail('content-page'); ?>
	<?php } ?>
	<div class="page-content-container">
		<?php the_content(); ?>
	</div>
