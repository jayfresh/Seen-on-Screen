<?
/* Template Name: 2015 Content page template */
get_header();
?>
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
  <section class="content-section">
    <div class="container-holder">
      <div class="tabset-section">
				<?php wp_nav_menu( array(
					'theme_location' => 'content-menu',
					'container' => false,
					'menu_class' => 'tabset'
				)); ?>
        <!-- <ul class="tabset">
          <li class="active"><a href="#tab-privacy">Privacy Policy</a></li>
          <li><a href="#tab-copywrite">Copyright</a></li>
          <li><a href="#tab-terms">Terms &amp; Conditions</a></li>
          <li><a href="#tab-faqs">F&amp;Qs</a></li>
          <li><a href="#tab-about">About</a></li>
        </ul> -->
        <div class="tab-content">
          <div class="tab" id="tab-privacy">
            <div class="logo-wrap">
              <a href="#">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo1.png" alt="Seen On Screen" width="189" height="106">
              </a>
            </div>
            <div class="scrollable-wrapper">
              <?php the_content(); ?>
            </div>
          </div>
        </div><!-- end .tab-content -->
      </div><!-- end .tabset-section -->
    </div><!-- end .container-holder -->
  </section>
<?php endwhile; endif; ?>
<?php
get_footer();
?>
