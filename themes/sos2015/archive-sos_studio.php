<?php
/* for the studio archive page */
get_header();
?>
<div class="title-container">
	<h1>Studios</h1>
</div>
<section class="address-block">
	<div class="container-holder">
		<div class="map-holder">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/placeholder-map.jpg" alt="image description" width="1295" height="796">
		</div>
		<div id="map">
		</div>
		<div class="address-holder">
		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				$address = get_post_meta(get_the_ID(), '_address', true);
				$address_lines = str_replace(',', '<br>', $address); ?>
			<address>
				<strong class="title"><?php the_title(); ?></strong>
				<?php echo $address_lines; ?>
			</address>
			<?php endwhile;
		endif; ?>
		</div>
	</div>
</section>
<?php
get_footer();
?>
