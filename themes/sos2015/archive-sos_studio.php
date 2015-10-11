<?php
/* for the studio archive page */
get_header();
?>
<script>
window.STYLESHEET_DIRECTORY = "<?php echo bloginfo('stylesheet_directory'); ?>";
</script>
<div class="title-container">
	<h1>Locations</h1>
</div>
<section class="address-block">
	<div class="container-holder">
		<div class="map-holder">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/placeholder-map.jpg" alt="image description" width="1295" height="796">
			<div id="map">
			</div>
		</div>
		<div class="address-holder">
		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				$address = get_post_meta(get_the_ID(), '_address', true);
				$address_lines = str_replace(',', '<br>', $address); ?>
			<address>
				<strong class="title"><?php the_title(); ?></strong>
				<div class="studio_address"><?php echo $address_lines; ?></div>
			</address>
			<?php endwhile;
		endif; ?>
		</div>
	</div>
</section>
<?php
get_footer();
?>
