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
			<ul class="locations">
				<li><a href="#" data-location="london">London</a></li>
				<li><a href="#" data-location="manchester">Manchester</a></li>
			</ul>
			<div id="map">
				<img class="placeholder" src="<?php bloginfo('stylesheet_directory'); ?>/images/placeholder-map.jpg" alt="Placeholder map">
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
