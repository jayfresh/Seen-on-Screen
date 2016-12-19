<?php
/* for the Video Tutorials pages */
get_header();
?>
	<div class="title-container">
		<h1>Online Classes</h1>
	</div>
	<?php $online_classes_page = get_page_by_path('online-classes');
	if ($online_classes_page) { ?>
	<div class="page-content-container page-content-container-semi-transparent">
			<?php echo wpautop($online_classes_page->post_content); ?>
	</div>
	<?php } ?>
	<section class="tutorial-block">
	<?php if ( have_posts() ) :
		$i = 1;
		while ( have_posts() ) : the_post();
		$terms = get_the_terms( get_the_ID(), 'sos_video_tutorial_levels' );
		$level = $terms[0];
		?>
		<div class="container-holder">
			<div class="video-holder">
				<a href="#popup<?php echo $i; ?>" class="lightbox">
					<?php the_post_thumbnail(); ?>
					<!--<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img28.jpg" alt="image description" width="492" height="328">-->
				</a>
			</div>
			<div class="text-block">
				<h2><?php the_title(); ?></h2>
				<span class="level">LEVEL - <?php echo $level->name; ?></span>
				<?php the_excerpt(); ?>
				Buy now <a href="#popup<?php echo $i; ?>" class="lightbox btn-more">more</a>
			</div>
		</div>
		<?php $i++;
		endwhile;
	endif; ?>
	</section>

<?php
get_footer();
?>
