<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '' ); ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
	<script type="text/javascript">
		document.documentElement.className = "js";
	</script>
	<?php wp_head(); ?>
	<script src="https://widgets.healcode.com/javascripts/healcode.js" type="text/javascript"></script>
</head>
<body <?php body_class(); ?>>
	<div id="fb-root"></div>
	<div id="background-image-mobile"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=377320652348203";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<div id="wrapper">
		<header id="header">
			<healcode-widget id="login" data-type="account-link" data-version="0.2" data-site-id="6023" data-inner-html="Login / Register"></healcode-widget>
			<div class="container-holder">
				<div class="logo">
					<a href="<?php bloginfo('url'); ?>">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/soslogo300.png" alt="SOS Seen On Screen" width="300" height="300">
					</a>
				</div>
				<nav id="nav">
					<a href="#" class="nav-opener"><span>Menu</span></a>
					<div class="nav-drop">
						<?php wp_nav_menu( array(
							'theme_location' => 'nav-menu',
							'container' => false
						)); ?>
					</div>
				</nav>
			</div>
			<?php if(is_front_page()) : ?>
			<?php endif; ?>
		</header>
		<main role="main">
