<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Scraply
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='wp-content/themes/scraply/fonts/genericons/genericons.css' rel='stylesheet' type='text/css'>

</head>

<body <?php body_class(); ?>>

<header id="masthead" class="site-header" role="banner">
	<div class="site-branding">
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="genericon genericon-heart"></span><?php bloginfo( 'name' ); ?></a></h1>
		<a id="add-btn"><span class="hidden">Add</span><span class="genericon genericon-attachment"></span></a>
		<a id="top-btn"><span class="hidden">Top</span><span class="genericon genericon-top"></span></a>
	</div>
</header><!-- #masthead -->

<!-- Upload Window -->
<div id="add-new-wrapper">
	<iframe id="add-new-iframe" src="wp-admin/media-new.php"></iframe>
</div>

