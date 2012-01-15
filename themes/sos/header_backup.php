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
				echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
		?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Seen on Screen Fitness - Dance yourself fit with TV's top dancers - classes held at Mark Anthony's, Frame, IncSpace and the Notting Hill Harbour Club" />
		<!--<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>-->
		<!--<link href='http://fonts.googleapis.com/css?family=Puritan' rel='stylesheet' type='text/css'>-->
		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/css/j-base.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/css/grid.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/css/stickyfooter.css" />
		<?php
			function stylesheet_cache_buster() {
				$stylesheet_url = get_bloginfo('stylesheet_url');
				$pieces = explode("wp-content", $stylesheet_url);
				return $stylesheet_url . "?" . filemtime(ABSPATH . "/wp-content" . $pieces[1]);
			}
		?>
		<link rel="stylesheet" type="text/css" href="<?php echo stylesheet_cache_buster(); ?>" />
		<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ie6.css" />
		<![endif]-->
		
		<script type="text/javascript" src="http://use.typekit.com/tfp0jyu.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<?php wp_head(); ?>
	</head>
	<body>
		<div id="wrapper" class="jbasewrap">
			<div id="header">
				<a href="<?php bloginfo('url'); ?>"><h1 id="logo">Seen On Screen Fitness</h1></a>
				<div id="gallery">
					<ul class="inline">
						<li><a href="<?php bloginfo('url'); ?>/dancers/abby" id="abby">Abby</a></li>
						<li><a href="<?php bloginfo('url'); ?>/dancers/dean" id="dean">Dean</a></li>
						<li><a href="<?php bloginfo('url'); ?>/dancers/keeley" id="keeley">Keeley</a></li>
						<li><a href="<?php bloginfo('url'); ?>/dancers/lianne" id="lianne">Lianne</a></li>
						<li><a href="<?php bloginfo('url'); ?>/dancers/nicole" id="nicole">Nicole</a></li>
						<li><a href="<?php bloginfo('url'); ?>/dancers/shaun" id="shaun">Shaun</a></li>
					</ul>
				</div>
				<?php $postname = $post->post_name; ?>
				<ul id="nav" class="inline">
					<li class="first"><a href="<?php bloginfo('url'); ?>/blog/" target="_blank">News</a></li>
					<li><a href="<?php bloginfo('url'); ?>/workshops"<?php if($postname=="workshops") { echo ' class="active"'; } ?>>Workshops</a></li>
					<li><a href="<?php bloginfo('url'); ?>/locations"<?php if($postname=="locations") { echo ' class="active"'; } ?>>Studio Locations</a></li>
					<li><a href="<?php bloginfo('url'); ?>/bookings"<?php if($postname=="bookings") { echo ' class="active"'; } ?>>1:1 | Group Booking</a></li>
					<li><a href="<?php bloginfo('url'); ?>/packages"<?php if($postname=="packages") { echo ' class="active"'; } ?>>Packages</a></li>
					<li><a href="<?php bloginfo('url'); ?>/contact"<?php if($postname=="contact") { echo ' class="active"'; } ?>>Contact</a></li>
				</ul>
			</div>
			<div id="content" class="grid10col left">