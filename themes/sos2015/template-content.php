<?
/* Template Name: 2015 Content page template */
get_header();
?>
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>

  <?php // TODO: this needs to look for all the pages using this template and list them ?>

  <section class="content-section">
    <div class="container-holder">
      <div class="tabset-section">
        <ul class="tabset">
          <li class="active"><a href="#tab-privacy">Privacy Policy</a></li>
          <li><a href="#tab-copywrite">Copywrite</a></li>
          <li><a href="#tab-terms">Terms &amp; Conditions</a></li>
          <li><a href="#tab-faqs">F&amp;Qs</a></li>
          <li><a href="#tab-about">About</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab" id="tab-privacy">
            <div class="logo-wrap">
              <a href="#">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo1.png" alt="Seen On Screen" width="189" height="106">
              </a>
            </div>
            <div class="scrollable-wrapper">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan- tium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volup- tas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consecte- tur, adipisci velit, sed quia non numquam eius modi tempora in- cidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
            </div>
          </div>
          <div class="tab" id="tab-copywrite">
            <div class="logo-wrap">
              <a href="#">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo1.png" alt="Seen On Screen" width="189" height="106">
              </a>
            </div>
            <div class="scrollable-wrapper">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan- tium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volup- tas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consecte- tur, adipisci velit, sed quia non numquam eius modi tempora in- cidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan- tium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volup- tas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consecte- tur, adipisci velit, sed quia non numquam eius modi tempora in- cidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
            </div>
          </div>
          <div class="tab" id="tab-terms">
            <div class="logo-wrap">
              <a href="#">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo1.png" alt="Seen On Screen" width="189" height="106">
              </a>
            </div>
            <div class="scrollable-wrapper">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan- tium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volup- tas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consecte- tur, adipisci velit, sed quia non numquam eius modi tempora in- cidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="tab" id="tab-faqs">
            <div class="logo-wrap">
              <a href="#">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo1.png" alt="Seen On Screen" width="189" height="106">
              </a>
            </div>
            <div class="scrollable-wrapper">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan- tium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volup- tas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consecte- tur, adipisci velit, sed quia non numquam eius modi tempora in- cidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan- tium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volup- tas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consecte- tur, adipisci velit, sed quia non numquam eius modi tempora in- cidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
            </div>
          </div>
          <div class="tab" id="tab-about">
            <div class="logo-wrap">
              <a href="#">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo1.png" alt="Seen On Screen" width="189" height="106">
              </a>
            </div>
            <div class="scrollable-wrapper">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan- tium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volup- tas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consecte- tur, adipisci velit, sed quia non numquam eius modi tempora in- cidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan- tium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volup- tas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consecte- tur, adipisci velit, sed quia non numquam eius modi tempora in- cidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
            </div>
          </div>
        </div><!-- end .tab-content -->
      </div><!-- end .tabset-section -->
    </div><!-- end .container-holder -->
  </section>

<?php
get_footer();
?>
