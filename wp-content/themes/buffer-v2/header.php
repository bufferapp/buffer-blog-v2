<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Buffer
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<title>Buffer <?php wp_title( '|', true, 'left' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="//brick.a.ssl.fastly.net/Merriweather:400,900,400i,900i/Open+Sans:300,400,700,300i,400i,700i" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700" rel="stylesheet" type="text/css">

	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="Buffer <?php bloginfo( 'name' ); ?> Feed" href="<?php echo site_url(); ?>/feed/">

	<!--  iPhone Web App Home Screen Icon -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/devices/buffer-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/devices/buffer-icon-retina.png" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/devices/buffer-icon.png" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<nav id="nav-wrap" role="navigation">
		<ul class="top-nav">
			<li><a href="http://bufferapp.com">Buffer</a></li>
			<li><a class="rollover social" href="http://blog.bufferapp.com">Social</a></li>
			<li><a class="rollover open" href="http://open.bufferapp.com">Open</a></li>
			<li class="current"><a class="rollover overflow" href="http://overflow.bufferapp.com">Overflow</a></li>
			<li><a class="rollover happiness" >Happiness</a></li>
		</ul>
	</nav><!-- #navigation -->

<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home <?php bloginfo( 'name' ); ?>" class="site-title"><span class="logotype"></span><?php bloginfo( 'name' ); ?></a>
			<div class="tagline"><?php bloginfo( 'description' ); ?></div>
		</div>

		<div class="header-sign-up">Buffer makes managing social media fun and easy. <a href="http://bufferapp.com/">Sign Up. It’s Free.</a></div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
