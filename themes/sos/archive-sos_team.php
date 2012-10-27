<?php
/* for the team archive page */
get_header();
?>

			<div class="teamCarousel">
				<div class="teamCarouselStripContainer">
					<div class="teamCarouselStrip">
						<?php if ( have_posts() ) :
							while ( have_posts() ) : the_post(); ?>
						<div class="teammember">
							<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							} else { ?>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/team/shaun_profile.jpg" title="no profile">
							<?php } ?>
							<div class="infobox">
								<h2 class="teammember"><?php the_title(); ?></h2>
								<ul class="credits">
								<?php
								$creditsList = get_post_meta($post->ID,'_credits',true);
								$creditsList = explode(',', $creditsList);
								foreach($creditsList as $credit) : ?>
									<li><?php echo trim($credit); ?></li>
								<?php endforeach; ?>
								</ul>
								<?php the_content(); ?>
							</div>
						</div>
							<?php endwhile;
						endif; ?>
					</div>
				</div>
				<div class="infobox">
					<!--<h2 class="teammember">Team member</h2>
					<ul class="credits">
						<li>Rihanna</li>
						<li>Beyonc&eacute;</li>
						<li>Janet Jackson</li>
						<li>Jessie J</li>
					</ul>
					<p>Bio goes here bio goes here bio goes here bio goes here bio goes here bio goes here</p>-->
				</div>
			</div>

<?php
get_footer();
?>