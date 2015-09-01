<?php
/* for a studio post-type post */
get_header();
?>

			<div class="contentPage">
				<div class="contentColumn left">
					<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post(); ?>
					<div class="studio">
						<h1><?php the_title(); ?></h1>
						<?php $address = get_post_meta(get_the_ID(), '_address', true);
						$website = get_post_meta(get_the_ID(), '_website', true);
						$address_lines = str_replace(',', '<br>', $address); ?>
						<p class="studio_address"><?php echo $address_lines; ?></p>
						<p><?php the_content(); ?></p>
						<?php if(isset($website)) { ?>
						<!--<a href="<?php echo $website; ?>">Visit website</a></p>-->
						<?php } ?>
					</div>
						<?php endwhile;
					endif; ?>
				</div>
				<div class="eventbox left">
					<div id="map">
					</div>
				</div>
			</div>

<?php
get_footer();
?>
