<?php
/* for Tour page */
get_header();
?>
			<div class="contentPage">
				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
				<div class="contentColumn left">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
				<div class="eventbox plainbox left">
					<iframe width="610" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=203304872355046718911.0004da4483d443b8e8e47&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=53.813626,-3.164062&amp;spn=5.190719,13.381348&amp;z=6&amp;output=embed"></iframe>
				</div>
				<?php endwhile;
				endif; ?>
			</div>
<?php
get_footer();
?>