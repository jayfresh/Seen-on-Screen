<?
/* for the Press page */
get_header();
?>

			<div class="contentPage" id="pressPage">
				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
				<div class="contentColumn left">
					<h1><?php the_title(); ?></h1>
					<?php
					$quotes_query = new WP_Query(array(
						'sos_quotes' => 'press'
					)); ?>
					<?php if($quotes_query->have_posts()) : while($quotes_query->have_posts()) : $quotes_query->the_post(); ?>
					<?php the_content(); ?>
					<hr>
					<?php endwhile; endif; ?>
				</div>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
				<div class="eventbox left">
					<div class="carouselContainer eventImageContainer">
						<ul class="eventdetail carousel">
						<?php if($quotes_query->have_posts()) : while($quotes_query->have_posts()) : $quotes_query->the_post(); ?>
							<li class="eventQuote">
								<div class="imageHolder">
									<?php the_post_thumbnail('content-page'); ?>
								</div>
								<div class="eventQuotesContainer">
									<?php the_content(); ?>
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