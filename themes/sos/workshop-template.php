<?php
/* for Workshop pages
Template Name: Workshop page
 */
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
          $images = get_children(array(
            'post_parent'    => get_the_ID(),
            'post_type'      => 'attachment',
            'numberposts'    => -1, // show all
            'post_status'    => null,
            'post_mime_type' => 'image',
            'order'          => 'ASC',
            'orderby'        => 'menu_order',
          ));
          global $post;
          $videolist = get_post_meta($post->ID, '_videolist', true);
          if($images || $videolist) { ?>
            <ul class="carousel">
              <?php
              if($videolist) {
                $video_links = explode(',', $videolist);
                print_r($video_links);
                foreach($video_links as $video_link) {
                  // $video_link is like http://www.youtube.com/watch?v=C-u5WLJ9Yk4
                  $video_id = preg_replace("/.+?\?v=(.+?)$/", "$1", $video_link);
                  if($video_id) {
                ?>
                  <li>
                    <iframe width="610" height="343" src="http://www.youtube.com/embed/<?php echo $video_id; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                  </li>
                  <?php
                  }
                }
              ?>
              <?php } ?>
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
