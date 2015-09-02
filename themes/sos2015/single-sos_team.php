<?php
/* for a team post-type post */
get_header();
?>

<?php if ( have_posts() ) :
  while ( have_posts() ) : the_post(); ?>
    <article class="profile-block">
      <div class="container-holder">
        <div class="profile-holder">
          <div class="pictures-block">
            <div class="img-block">
              <div class="img-holder <?php echo strtolower(get_the_title()); ?>">
                <?php $id = get_the_ID();
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'team-member' );
    						$url = $thumb['0']; ?>
                <img src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
              </div>
            </div>
          </div>
          <div class="profile-info">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </article>
  <?php endwhile;
endif; ?>

<?php
get_footer();
?>
