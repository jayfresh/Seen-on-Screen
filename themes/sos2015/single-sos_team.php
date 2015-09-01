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
              <div class="img-holder bonnie">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/img20.png" alt="image description" width="288" height="396">
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
