<?php /*
	Sub-template for single posts
*/ ?>
				<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'carousel' ); ?>
				<div class="articleBody">
					<?php } ?>
					<div class="grid8col left">
						<div class="grid7col left">
							<h1><?php the_title(); ?></h1>
							<?php if(is_single()) { ?>
								<span class="meta">Posted - <?php the_date(); ?><!-- &nbsp;/ &nbsp;Category - <?php the_category(); ?></span>-->
							<?php } ?>
							<?php the_content(); ?>
							<div class="sharing"><?php do_action('addthis_widget', get_permalink(), 'above'); ?></div>
						</div>
					</div>
					<?php if ( has_post_thumbnail() ) { ?>
				</div>
				<?php } ?>			
