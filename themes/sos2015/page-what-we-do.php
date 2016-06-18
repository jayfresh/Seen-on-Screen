<?php
/* Template Name: What We Do */
/* for What We Do page */
get_header();
$class_schedule_url = get_permalink( get_page_by_path( 'book-classes' ) );
?>
	<div class="title-container">
		<h1><?php the_title(); ?></h1>
	</div>
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
		<section class="classes-block">
			<div class="container-holder">
				<div class="four-columns">
					<article class="col">
						<div class="icon-holder">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-classes.png" alt="Seen On Screen Classes" width="326" height="332">
						</div>
						<div class="text-block">
							<h2>Classes</h2>
							<span class="cost">Classes: &pound;15</span>
							<div class="text-holder">
								<?php $page =  get_page_by_title('Classes'); ?>
								<?php echo wpautop($page->post_content); ?>
								<div class="btn-holder">
									<a href="<?php echo $class_schedule_url; ?>" class="btn">View Classes</a>
								</div>
							</div>
						</div>
					</article>
					<article class="col">
						<div class="icon-holder">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-workshops.png" alt="Seen On Screen Classes" width="326" height="332">
						</div>
						<div class="text-block">
							<h2>Workshops</h2>
							<span class="cost">Workshops: &pound;20</span>
							<div class="text-holder">
								<?php $page =  get_page_by_title('Workshops'); ?>
								<?php echo wpautop($page->post_content); ?>
								<div class="btn-holder">
									<a href="<?php echo $class_schedule_url; ?>" class="btn">View Workshops</a>
								</div>
							</div>
						</div>
					</article>
					<article class="col">
						<div class="icon-holder">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-masterclasses.png" alt="Seen On Screen Classes" width="326" height="332">
						</div>
						<div class="text-block">
							<h2>Master Classes</h2>
							<span class="cost">Master Classes: &pound;25</span>
							<div class="text-holder">
								<?php $page =  get_page_by_title('Master Classes'); ?>
								<?php echo wpautop($page->post_content); ?>
								<div class="btn-holder">
									<a href="<?php echo $class_schedule_url; ?>" class="btn">View Master Classes</a>
								</div>
							</div>
						</div>
					</article>
					<article class="col">
						<div class="icon-holder">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-superclasses.png" alt="Seen On Screen Classes" width="326" height="332">
						</div>
						<div class="text-block">
							<h2>Super Classes</h2>
							<span class="cost">Super Classes: &pound;30</span>
							<div class="text-holder">
								<?php $page =  get_page_by_title('Super Classes'); ?>
								<?php echo wpautop($page->post_content); ?>
								<div class="btn-holder">
									<a href="<?php echo $class_schedule_url; ?>" class="btn">View Super Classes</a>
								</div>
							</div>
						</div>
					</article>
				</div>
				<div class="levels-block">
					<div class="quote-holder">
						<blockquote>
							<q>&ldquo;London's sassiest exercise option&rdquo;</q>
							<cite>BuzzFeed</cite>
						</blockquote>
					</div>
					<div class="blocks-holder">
						<div class="level-block">
							<h2>Beginner</h2>
							<?php $page =  get_page_by_title('Beginner'); ?>
							<?php echo wpautop($page->post_content); ?>
						</div>
						<div class="level-block">
							<h2>All Levels</h2>
							<?php $page =  get_page_by_title('All Levels'); ?>
							<?php echo wpautop($page->post_content); ?>
						</div>
						<div class="level-block">
							<h2>Intermediate</h2>
							<?php $page =  get_page_by_title('Intermediate'); ?>
							<?php echo wpautop($page->post_content); ?>
						</div>
						<div class="level-block">
							<h2>Advanced</h2>
							<?php $page =  get_page_by_title('Advanced'); ?>
							<?php echo wpautop($page->post_content); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php endwhile;
	endif; ?>

<?php
get_footer();
?>
