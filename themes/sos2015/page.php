<?php
/* for events, celebrations and press pages */
get_header();
?>

			<div class="contentPage">
				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						get_template_part('content', 'page');
					endwhile;
				endif; ?>
			</div>

<?php
get_footer();
?>