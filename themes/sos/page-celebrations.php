<?
/* for the Celebrations page */
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
						'sos_quotes' => 'celebration'
					)); ?>
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