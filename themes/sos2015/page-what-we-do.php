<?php
/* for What We Do page */
get_header();
?>
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
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat</p>
								<div class="btn-holder">
									<a href="#" class="btn">View Classes</a>
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
							<span class="cost">Workshops: &pound;15</span>
							<div class="text-holder">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat</p>
								<div class="btn-holder">
									<a href="#" class="btn">View Workshops</a>
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
							<span class="cost">Master Classes: &pound;15</span>
							<div class="text-holder">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat</p>
								<div class="btn-holder">
									<a href="#" class="btn">View Master Classes</a>
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
							<span class="cost">Super Classes: &pound;15</span>
							<div class="text-holder">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat</p>
								<div class="btn-holder">
									<a href="#" class="btn">View Super Classes</a>
								</div>
							</div>
						</div>
					</article>
				</div>
				<div class="levels-block">
					<div class="quote-holder">
						<blockquote>
							<q>&ldquo;You don’t have to be a member  to do our classes or workshop&rdquo;</q>
							<cite>Elle Magazine</cite>
						</blockquote>
					</div>
					<div class="blocks-holder">
						<div class="level-block">
							<h2>Begginer</h2>
							<p>Lorem ipsum dolor sit amet, consec- tetur adipisicing elit, sed do eius- mod tempor incid- idunt ut labore et dolore magna aliqua. Ut enim</p>
						</div>
						<div class="level-block">
							<h2>Intermediate</h2>
							<p>Lorem ipsum dolor sit amet, consec- tetur adipisicing elit, sed do eius- mod tempor incid- idunt ut labore et dolore magna aliqua. Ut enim</p>
						</div>
						<div class="level-block">
							<h2>Advanced</h2>
							<p>Lorem ipsum dolor sit amet, consec- tetur adipisicing elit, sed do eius- mod tempor incid- idunt ut labore et dolore magna aliqua. Ut enim</p>
						</div>
						<div class="level-block">
							<h2>All Levels</h2>
							<p>Lorem ipsum dolor sit amet, consec- tetur adipisicing elit, sed do eius- mod tempor incid- idunt ut labore et dolore magna aliqua. Ut enim</p>
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
