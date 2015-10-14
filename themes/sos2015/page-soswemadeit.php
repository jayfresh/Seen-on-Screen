<?php
/* for #SOSBACKSTAGE page */
get_header();
?>
	<div class="title-container">
		<h1>#SOSWEMADEIT</h1>
	</div>
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
		<section class="content-section">
			<div class="container-holder">
				<div class="social-block">
					<?php the_content(); ?>
					<?php include_once('_social-links.php'); ?>
				</div>
				<?php /* NB: you need to make sure this is using this structure:
				<div class="pictures-block">
					<div class="image">
						<a href="#">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img6.jpg" alt="" width="180" height="158">
						</a>
					</div>
					...
				</div>
				*/ ?>
				<?php if ( dynamic_sidebar('sos_wemadeit_widget') ) : else : endif; ?>
			</div><!-- end .container-holder -->
		</section><!-- end .content-block -->
		<?php endwhile;
	endif; ?>

<?php
get_footer();
?>
