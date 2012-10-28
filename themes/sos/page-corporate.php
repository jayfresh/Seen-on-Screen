<?
/* for the Corporate page */
get_header();
?>

			<div class="contentPage">
				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
				<div class="contentColumn left">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
				<?php endwhile; endif; ?>
				<div class="eventbox left">
					<?php if ( has_post_thumbnail() ) { ?>
					<div class="carouselContainer eventImageContainer">
						<?php attachment_toolbox($size = 'content-page', 'carousel'); ?>
					</div>
					<?php } else { ?>
					<div class="eventImageContainer">
						<img title="no featured image" src="<?php bloginfo('stylesheet_directory'); ?>/images/roughs/rihanna-event.png">
					</div>
					<?php } ?>
					<div class="eventQuotesContainer carouselContainer">
						<ul class="eventdetail carousel">
							<?php
								$quotes_query = new WP_Query(array(
									'sos_quotes' => 'event'
								));
								if($quotes_query->have_posts()) : while($quotes_query->have_posts()) : $quotes_query->the_post(); ?>
								<li class="eventQuote">
									<?php the_content();
									if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									} else { ?>
									<img class="right" title="no thumbnail" src="<?php bloginfo('stylesheet_directory'); ?>/images/press/evening_standard_127_inverted.png">
									<?php } ?>
								</li>						
							<?php endwhile; endif; ?>
						</ul>
					</div>
				</div>
			</div>
<?php
get_footer();
?>