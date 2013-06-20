<?php
/* for Battle of The Girlbands dance series page */
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
					))) { ?>
						<ul class="carousel">
							<li>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/0lPQZni7I18?rel=0" frameborder="0" allowfullscreen></iframe>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/8WEtxJ4-sh4?rel=0" frameborder="0" allowfullscreen></iframe>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/IyYnnUcgeMc?rel=0" frameborder="0" allowfullscreen></iframe>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/LlZydtG3xqI?rel=0" frameborder="0" allowfullscreen></iframe>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/Wmc8bQoL-J0?rel=0" frameborder="0" allowfullscreen></iframe>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/gJLIiF15wjQ?rel=0" frameborder="0" allowfullscreen></iframe>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/Vjw92oUduEM?rel=0" frameborder="0" allowfullscreen></iframe>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/pKV8uSX2nEQ?rel=0" frameborder="0" allowfullscreen></iframe>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/AqeIiF0DlTg?rel=0" frameborder="0" allowfullscreen></iframe>
								<iframe width="610" height="343" src="http://www.youtube.com/embed/9ro0FW9Qt-4?rel=0" frameborder="0" allowfullscreen></iframe>
							</li>
							<?php foreach($images as $image) {
								$attsrc  = wp_get_attachment_image_src($image->ID, $size);
								$atttitle = apply_filters('the_title',$image->post_title); ?>
							<li><img alt="<?php echo $atttitle; ?>" src="<?php echo $attsrc[0]; ?>"></li>
							<?php } ?>
						</ul>
					<?php } ?>
					</div>
				</div>
				<?php endwhile;
				endif; ?>
			</div>
<?php
get_footer();
?>
