<?php
  /* Template Name: Full width page template */
  get_header();
?>

      <div class="contentPage">
        <?php if ( have_posts() ) :
          while ( have_posts() ) : the_post(); ?>
        <div class="contentColumnSuperWide contentColumn left">
          <div class="title-container">
            <h1><?php the_title(); ?></h1>
          </div>
          <?php the_content(); ?>
        </div>
          <?php endwhile;
        endif; ?>
      </div>

<?php
get_footer();
?>
