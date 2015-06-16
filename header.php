<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Adams
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <link href="http://fonts.googleapis.com/css?family=Raleway:400,300,600,800" rel="stylesheet" type="text/css">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'adams' ); ?></a>

  <header class="site__header" id="home">
    <div class="container">
<!-- 		  <h1 class="site__name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> -->
		  <h1 class="site__name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Anders <span class="thin">Grendstadbakk</span></a></h1>
		  <h2 class="site__tagline">I like to create stuff on the internet.</h2>
    </div>

    <span id="js-toggle-menu" class="navi__toggle" style="display: none;"><!-- Hidden for now. We don't have anything to show. -->
      <span class="navi__toggle__text">Menu</span>
      <span class="navi__toggle__icon"></span>
    </span>
	</header>
  <section id="js-overlay" class="navi__overlay">
    <nav id="site-navigation" class="main-navigation" role="navigation">
  		<?php wp_nav_menu( array(
    		'theme_location' => 'primary',
    		'menu_class' => 'menu__main',
      ) ); ?>
    </nav><!-- #site-navigation -->
    <p>Woohoo, you're looking at my menu!</p>
    <!-- widgets. -->
  </section>


<div id="content" class="site-content">
  <div class="container">
