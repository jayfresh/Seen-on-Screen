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
		<script type="text/javascript" src="//use.typekit.net/iav5yrs.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="bggradient"></div>
		<div id="wrapper" class="jbasewrap">
			<div id="header" class="blackContainer">
				<div itemscope itemtype="http://schema.org/LocalBusiness">
					<span class="right larger" id="phoneNumber" itemprop="telephone"><a href="tel:08006440588">0800 644 0588</a></span>
					<h1 itemprop="name" id="logo">Seen On Screen Events</h1>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'nav-menu', 'container' => false, 'menu_class' => 'nav' )); ?>
				<ul class="nav">
					<li class="plain socialButtons">
						<a href="#"><img src="images/roughs/twitter_small.png" /></a>
						<a href="#"><img src="images/roughs/facebook_small.png" /></a>
					</li>
				</ul>
				<div class="carousel">
					<img src="images/roughs/beyonce-header.png">
				</div>
			</div>