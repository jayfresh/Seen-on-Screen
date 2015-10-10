<?
/* for the Press page */
get_header();
?>
<div class="title-container">
	<h1>Press</h1>
</div>
<aside class="logos-block">
	<div class="container-holder">
		<h2>As Seen In</h2>
		<ul class="logo-list">
		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();
			$quotes_query = new WP_Query(array(
				'sos_quotes' => 'press',
				'posts_per_page' => -1
			));
			if($quotes_query->have_posts()) : while($quotes_query->have_posts()) : $quotes_query->the_post();
				if ( has_post_thumbnail() ) {
					global $post;
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
					$image_url = $thumb['0'];
				}
				$quote_url = get_post_meta(get_the_ID(), '_url', true); ?>
			<li><a href="<?php echo $quote_url; ?>"><img src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>"></a></li>	
			<?php endwhile; endif;
		endwhile; endif; ?>
		</ul>
	</div>
</aside>
<?php
get_footer();
?>
