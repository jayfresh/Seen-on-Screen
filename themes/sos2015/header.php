<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
	
		wp_title( '|', true, 'right' );
	
		// Add the blog name.
		bloginfo( 'name' );
	
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
	
		?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/css/jbase.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/css/stickyfooter.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<script type="text/javascript">
			document.documentElement.className = "js";
		</script>
		<script type="text/javascript" src="//use.typekit.net/iav5yrs.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=377320652348203";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<div class="bggradient"></div>
		<div id="wrapper" class="jbasewrap">
			<div id="header" class="blackContainer">
				<div itemscope itemtype="http://schema.org/LocalBusiness">
					<span class="right larger" id="phoneNumber" itemprop="telephone"><a href="tel:08006440588">0800 644 0588</a></span>
					<h1 itemprop="name" id="logo"><a href="<?php echo home_url('/'); ?>">Seen On Screen Events</a></h1>
				</div>
				<?php wp_nav_menu( array(
					'theme_location' => 'nav-menu',
					'container' => false,
					'menu_class' => 'nav',
					'menu_id' => 'nav'
				)); ?>
				<!-- There are some style.css changes to accommodate hiding the socialButtons -->
				<ul class="nav">
					<li class="plain socialButtons">
						<a href="http://twitter.com/sosfdance" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter_21-21.gif" /></a>
						<!--<a href="https://twitter.com/sosfdance" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"></a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>-->
						<a href="http://facebook.com/seenonscreenfitness" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/roughs/facebook_small.png" /></a>
						<!--<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffacebook.com%2Fseenonscreenfitness&amp;send=false&amp;layout=button_count&amp;width=90&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=377320652348203" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>-->
					</li>
				</ul>
				<?php if(is_front_page()) : ?>
					<div class="carouselContainer homepageBanner">
					<?php attachment_toolbox('homepage-banner', 'carousel'); ?>
					</div>					
				<?php endif; ?>
			</div>
