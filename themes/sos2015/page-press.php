<?
/* for the Press page */
get_header();
?>

<aside class="logos-block">
	<div class="container-holder">
		<h2>As Seen In</h2>
		<ul class="logo-list">
			<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-grazia.png" alt="Grazia" width="216" height="68"></a></li>
			<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-buzzfeed.png" alt="BuzzFeed" width="338" height="60"></a></li>
			<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-cosmopolitan.png" alt="Cosmopolitan" width="324" height="64"></a></li>
			<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-les.png" alt="London Evening Standard" width="282" height="116"></a></li>
			<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/<?php bloginfo('stylesheet_directory'); ?>/images/logo-emerald.png" alt="Emerald Street" width="284" height="88"></a></li>
			<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-elle.png" alt="ELLE" width="277" height="96"></a></li>
			<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-independent.png" alt="The Independent" width="299" height="69"></a></li>
			<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-metro.png" alt="Metro" width="284" height="85"></a></li>
			<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-sweatybetty.png" alt="Sweaty Betty" width="329" height="49"></a></li>
			<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-mailonline.png" alt="Mail Online" width="272" height="44"></a></li>
			<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-stylist.png" alt="Stylist" width="305" height="62"></a></li>
			<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-mailonline.png" alt="Mail Online" width="272" height="44"></a></li>
		</ul>
	</div>
</aside>

				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<?php
					$quotes_query = new WP_Query(array(
						'sos_quotes' => 'press'
					)); ?>
					<?php if($quotes_query->have_posts()) : while($quotes_query->have_posts()) : $quotes_query->the_post(); ?>
					<?php the_content(); ?>
					<hr>
					<?php endwhile; endif; ?>
				<?php endwhile; endif; ?>
<?php
get_footer();
?>
