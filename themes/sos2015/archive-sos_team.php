<?php
/* for the team archive page */
get_header();
?>
<section class="team-block">
	<h1><mark>Meet The SOS Crew</mark></h1>
	<div class="columns-holder">
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			$name = get_the_title();
			$lcname = strtolower($name);
			$link = get_the_permalink();
		?>
		<div class="column">
			<a href="<?php echo $link; ?>">
				<div class="img-block">
					<div class="img-holder <?php echo $lcname; ?>">
					<?php if ( has_post_thumbnail() ) {
						global $post;
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'team-member' );
						$url = $thumb['0']; ?>
						<img src="<?php echo $url; ?>" alt="<?php echo $name; ?>">
					<?php } ?>
					</div>
				</div>
				<div class="name">
					<img class="name-<?php echo $lcname; ?>" src="<?php bloginfo('stylesheet_directory'); ?>/images/text-<?php echo $lcname; ?>.png" alt="<?php echo $name; ?>">
				</div>
			</a>
		</div>
		<?php endwhile;
	endif; ?>
	</div>
</section>
<?php
get_footer();
?>
