<?php
/* for Beyonce page */
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
					<div class="carouselContainer eventImageContainer">
						<ul class="carousel">
							<li>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/QczgvUDskk0?rel=0" frameborder="0" allowfullscreen></iframe>
							</li>
							<li>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/RioOJ7dZxuw?rel=0" frameborder="0" allowfullscreen></iframe>
							</li>
							<li>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/PDABTqhvWds?rel=0" frameborder="0" allowfullscreen></iframe>
							</li>
							<li>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/AqeIiF0DlTg?rel=0" frameborder="0" allowfullscreen></iframe>
							</li>
							<li>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/PGc9n6BiWXA?rel=0" frameborder="0" allowfullscreen></iframe>
							</li>
							<?php
							$size = 'content-page';
							if($images = get_children(array(
								'post_parent'    => get_the_ID(),
								'post_type'      => 'attachment',
								'numberposts'    => -1, // show all
								'post_status'    => null,
								'post_mime_type' => 'image',
								'order'          => 'ASC',
								'orderby'        => 'menu_order',
							))) {
							foreach($images as $image) {
								$attsrc  = wp_get_attachment_image_src($image->ID, $size);
								$atttitle = apply_filters('the_title',$image->post_title); ?>
							<li><img alt="<?php echo $atttitle; ?>" src="<?php echo $attsrc[0]; ?>"></li>
							<?php }
							} ?>
						</ul>
					</div>
				</div>
				<?php endwhile;
				endif; ?>
			</div>
<?php
get_footer();
?>
