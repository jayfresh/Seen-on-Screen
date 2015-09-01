<?php
/* for the studio archive page */
get_header();
?>

<section class="address-block">
	<div class="container-holder">
	<div class="map-holder">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/placeholder-map.jpg" alt="image description" width="1295" height="796">
	</div>
	<div class="address-holder">
		<address>
			<strong class="title">TOTTENHAM COURT ROAD</strong>
			Central YMCA Club <br>
			112 Great Russell Street <br>
			London <br>
			WC1B 3NQ
		</address>
		<address>
			<strong class="title">TOTTENHAM COURT ROAD</strong>
			Central YMCA Club <br>
			112 Great Russell Street <br>
			London <br>
			WC1B 3NQ
		</address>
		<address>
			<strong class="title">TOTTENHAM COURT ROAD</strong>
			Central YMCA Club <br>
			112 Great Russell Street <br>
			London <br>
			WC1B 3NQ
		</address>
	</div>
	</div>
</section>


	<h1>Studios</h1>
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
		<h2><?php the_title(); ?></h2>
		<?php $address = get_post_meta(get_the_ID(), '_address', true);
		$address_lines = str_replace(',', '<br>', $address); ?>
		<p><?php echo $address_lines; ?></p>
		<?php the_content(); ?>
		<?php endwhile;
	endif; ?>
	</div>
	<div id="map">
	</div>
<?php
get_footer();
?>
