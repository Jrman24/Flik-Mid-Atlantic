<?php
/*
Marstudio Custom Login

Version: 1.0.0
Author: Marstudio Inc
Author URI: http://marstudio.com/
*/

function wp_flik_enqueue_scripts() {
	if ( in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) {
		wp_enqueue_style( 'marstudio-style.css', get_template_directory_uri() . '/inc/marstudio-login/marstudio-style.css', 'flik' );
		wp_enqueue_style( 'marstudio-style.css' );
		}
}

add_action( 'wp_enqueue_scripts', 'wp_flik_enqueue_scripts' );
add_action('login_head', 'wp_flik_enqueue_scripts');