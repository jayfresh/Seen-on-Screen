<?php
/* for the team archive page */
get_header();
?>

			<div class="teamCarouselContainer">
				<div class="carouselStrip">
					<ul>
						<?php if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								$name = get_the_title();
							?>
						<li class="teammember">
							<?php if ( has_post_thumbnail() ) {
								global $post;
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'team-member' );
								$url = $thumb['0']; ?>
							<img src="<?php echo $url; ?>" alt="<?php echo $name; ?>">
							<?php } else { ?>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/team/shaun_profile.jpg" title="no profile">
							<?php } ?>
							<div class="infobox">
								<h2 class="teammember"><?php echo $name; ?></h2>
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
						</li>
							<?php endwhile;
						endif; ?>
					</ul>
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