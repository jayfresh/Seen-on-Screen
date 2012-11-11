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
							<li class="eventQuote">
								<div class="imageHolder">
									<iframe width="610" height="343" src="http://www.youtube.com/embed/gIRXDi7BrYY?rel=0" frameborder="0" allowfullscreen></iframe>
								</div>
								<div class="eventQuotesContainer">
									<p>With Seen on Screen's advice, contacts, attention to detail and organisation skills our team had the most amazing, fantastic experience! &mdash; Jillian Maclean, Founder and Managing Director of Drake &amp; Morgan</p>
									<img class="right" title="no thumbnail" src="<?php bloginfo('stylesheet_directory'); ?>/images/press/evening_standard_127_inverted.png">
								</div>
							</li>
							<li class="eventQuote">
								<div class="imageHolder">
									<iframe width="610" height="343" src="http://www.youtube.com/embed/yRFxbrLNJ7Q?rel=0" frameborder="0" allowfullscreen></iframe>
								</div>
								<div class="eventQuotesContainer">
									<p>SoS knew exactly what these girls would enjoy &mdash; Mary Gentilhomme, Drake &amp; Morgan Ltd</p>
									<img class="right" title="no thumbnail" src="<?php bloginfo('stylesheet_directory'); ?>/images/press/evening_standard_127_inverted.png">
								</div>
							</li>
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