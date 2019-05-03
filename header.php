<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package flik
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'flik' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
        
		<div class="container">
            <div class="row header-content">
                <div class="site-branding col-md-4">
                    <?php if ( get_theme_mod( 'flik_logo' ) ) : ?>
                        <div class='site-logo'>
                            <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'flik_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
                        </div>
                    <?php endif; ?>
                </div><!-- .site-branding -->
                <div class="tag-line col-md-8">

                    <div class="main-navigation">
                        <div class="main-nav-inner">
                            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                        </div>
                    </div>
                </div>
            </div>
			
			<label for="navi-toggle" class="navigation__button">
				<span class="navigation__icon">&nbsp;</span>
			</label>
			<div class="side-bar-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div>
			
			
		</div><!-- .container -->
	</header><!-- #masthead -->

    <!-- Banner -->
    <div class="banner-container">
        <?php get_template_part( 'banner'); ?>
    </div>

	<div id="content" class="site-content">
