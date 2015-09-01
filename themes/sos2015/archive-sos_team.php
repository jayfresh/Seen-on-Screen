<?php
/* for the team archive page */
get_header();
?>
<section class="team-block">
	<h1><mark>Meet Our Team</mark></h1>
	<div class="columns-holder">
		<div class="column">
			<a href="#">
				<div class="img-block">
					<div class="img-holder bonnie">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img12.png" alt="image description" width="196" height="262">
					</div>
				</div>
				<div class="name">
					<img class="name-bonnie" src="<?php bloginfo('stylesheet_directory'); ?>/images/text-bonnie.png" alt="BONNIE" width="239" height="71">
				</div>
			</a>
		</div>
		<div class="column">
			<a href="#">
				<div class="img-block">
					<div class="img-holder haley">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img13.png" alt="image description" width="199" height="267">
					</div>
				</div>
				<div class="name">
					<img class="name-haley" src="<?php bloginfo('stylesheet_directory'); ?>/images/text-haley.png" alt="HALEY" width="205" height="73">
				</div>
			</a>
		</div>
		<div class="column">
			<a href="#">
				<div class="img-block">
					<div class="img-holder elliot">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img14.png" alt="image description" width="210" height="279">
					</div>
				</div>
				<div class="name">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/text-elliot.png" alt="ELLIOT" class="name-elliot" width="233" height="70">
				</div>
			</a>
		</div>
		<div class="column">
			<a href="#">
				<div class="img-block">
					<div class="img-holder joelle">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img15.png" alt="image description" width="208" height="278">
					</div>
				</div>
				<div class="name">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/text-joelle.png" alt="JOELLE" class="name-joelle" width="228" height="81">
				</div>
			</a>
		</div>
		<div class="column">
			<div class="img-block">
				<a href="#">
					<div class="img-holder profile1">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img16.png" alt="image description" width="200" height="269">
					</div>
				</a>
			</div>
		</div>
		<div class="column">
			<div class="img-block">
				<a href="#">
					<div class="img-holder profile2">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img17.png" alt="image description" width="206" height="278">
					</div>
				</a>
			</div>
		</div>
		<div class="column">
			<div class="img-block">
				<a href="#">
					<div class="img-holder profile3">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img18.png" alt="image description" width="212" height="282">
					</div>
				</a>
			</div>
		</div>
		<div class="column">
			<div class="img-block">
				<a href="#">
					<div class="img-holder profile4">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/img19.png" alt="image description" width="213" height="284">
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
<ul>
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			$name = get_the_title();
			$link = get_the_permalink();
		?>
	<li class="teammember">
		<?php if ( has_post_thumbnail() ) {
			global $post;
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'team-member' );
			$url = $thumb['0']; ?>
		<img src="<?php echo $url; ?>" alt="<?php echo $name; ?>">
		<?php } ?>
		<h2 class="teammember"><a href="<?php echo $link; ?>"><?php echo $name; ?></a></h2>
		<?php the_content(); ?>
	</li>
		<?php endwhile;
	endif; ?>
</ul>

<?php
get_footer();
?>
