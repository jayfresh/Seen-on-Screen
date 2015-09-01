<?
/* for the Events page */
get_header();
?>
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>

	<section class="content-block">
		<div class="container-holder">
			<div class="column">
				<div class="text-block">
					<h2>i just came here to party</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
				</div>
				<div class="images-block">
					<div class="image">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img29.jpg" alt="image description" width="314" height="315">
					</div>
					<div class="image">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img30.jpg" alt="image description" width="314" height="315">
					</div>
				</div>
				<div class="text-wrap">
					<h2>Dance Package</h2>
					<ul class="list">
						<li>90 minute dance workshop</li>
						<li>Routine of choice</li>
						<li>The hen will become the artist and treated like a star</li>
						<li>Box of fancy dress clothes including Beyoncé style wigs, </li>
						<li>glasses, hats, leg warmers and jewellery.</li>
					</ul>
				</div>
				<div class="video-holder">
					<iframe width="420" height="315" src="https://www.youtube.com/embed/EdBym7kv2IM" allowfullscreen></iframe>
				</div>
			</div>
			<div class="column">
				<blockquote>
					<q>&ldquo;Grab your hens, choose an  artist and prepare to dance like a star&rdquo;</q>
					<cite>brides magazine</cite>
				</blockquote>
				<div class="text-wrap">
					<h2>music video package</h2>
					<ul class="list">
						<li>90 minute dance workshop</li>
						<li>The routine will be filmed and edited into your own music video. We will email the final edit over to you so you have your own copy on file.</li>
						<li>Charbonnel et Walker pink champagne chocolate truffles</li>
						<li>A bottle of Champagne</li>
						<li>Routine of choice</li>
						<li>The hen will become the artist and treated like a star</li>
						<li>Box of fancy dress clothes including Beyoncé style wigs, glasses, hats, leg warmers and jewellery.</li>
					</ul>
				</div>
				<div class="img-holder">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img32.jpg" alt="image description" width="631" height="332">
				</div>
				<form action="#" class="booking-form validate-form">
					<fieldset>
						<h2>Contact Us and Book</h2>
						<div class="form-input validate-row">
							<input class="required" type="text" placeholder="Name">
						</div>
						<div class="form-input validate-row">
							<input class="required-email" type="email" placeholder="Email">
						</div>
						<div class="form-input validate-row">
							<textarea class="required" placeholder="Message" cols="32" rows="9"></textarea>
						</div>
						<input type="submit" value="enter">
					</fieldset>
				</form>
			</div>
		</div>
	</section>

	<?php $quotes_query = new WP_Query(array(
		'sos_quotes' => 'corporate'
	)); ?>
	<?php if($quotes_query->have_posts()) : while($quotes_query->have_posts()) : $quotes_query->the_post(); ?>
			<?php the_post_thumbnail('content-page'); ?>
			<?php the_content(); ?>
	<?php endwhile; endif; ?>
<?php
get_footer();
?>
