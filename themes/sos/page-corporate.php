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
				<?php
					$quotes_query = new WP_Query(array(
						'sos_quotes' => 'corporate'
					)); ?>
					<div class="carouselContainer eventImageContainer">
						<ul class="eventdetail carousel">
						<?php if($quotes_query->have_posts()) : while($quotes_query->have_posts()) : $quotes_query->the_post(); ?>
							<li class="eventQuote">
								<?php the_post_thumbnail('content-page'); ?>
								<div class="eventQuotesContainer">
									<?php the_content(); ?>
									<img class="right" title="no thumbnail" src="<?php bloginfo('stylesheet_directory'); ?>/images/press/evening_standard_127_inverted.png">
								</div>
							</li>
						<?php endwhile; endif; ?>
						</ul>
					</div>
				</div>
			</div>
<?php
get_footer();
?>