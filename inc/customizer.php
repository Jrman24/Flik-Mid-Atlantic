<?php
/**
 * Theme Customizer
 *
 * @package flik
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flik_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	/**
	 * Add Panel for Layouts.
	 * 
	 */
	$wp_customize->add_panel(
			// $id
			'anaya_panelLayouts',
			// $args
			array(
				'priority' 			=> 30,
				'capability' 		=> 'edit_theme_options',
				'theme_supports'	=> '',
				'title' 			=> __( 'Layouts', 'flik' ),
			)
	);

	/****************************************************
	* Section: siteLayout
	* Panel:   Layouts
	****************************************************/
	
	$wp_customize->add_section(
		// $id
		'anaya_Layouts_siteLayout_section',
		// $args
		array(
			'title'			=> __( 'Layout', 'flik' ),
			'panel'			=> 'anaya_panelLayouts'
		)
	);

	//Setting: siteLayout
	//Section:   siteLayout
	//Panel: Layouts
	$wp_customize->add_setting( 'anaya_siteLayout_siteLayout', array(
		'default'			=> 'full-width',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'flik_sanitize_select'
	) );
	
	//Control: Site Layout
	$wp_customize->add_control( 'anaya_siteLayout_siteLayout', array(
		'label'			=>		__('Site Layout', 'flik'),
		//checkbox, dropdown-pages, radio, select, text, textarea, email, number, phone (req: input_attrs), url
		'type'			=>		'radio', 
		'section'		=>		'anaya_Layouts_siteLayout_section',
		'choices'		=> array(
				'full-width' => __( 'Full Width', 'flik' ),
				'boxed' => __( 'Boxed', 'flik' )
			)	
	) );
		


}
add_action( 'customize_register', 'flik_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function flik_customize_preview_js() {
	wp_enqueue_script( 'flik_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'flik_customize_preview_js' );

/**
 * Sanitication Callbacks
 */
function flik_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


function flik_theme_customizer( $wp_customize ) {
 
	$wp_customize->add_section( 'flik_logo_section' , array(
		'title'       => __( 'Logo', 'flik' ),
		'priority'    => 30,
		'description' => 'Upload a logo to replace the default site name and description in the header',
	) );

	$wp_customize->add_setting( 'flik_logo', array(
		'sanitize_callback' => 'aabc_sanitize_image'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'flik_logo', array(
		'label'    => __( 'Logo', 'flik' ),
		'section'  => 'flik_logo_section',
		'settings' => 'flik_logo',
	) ) );	
	
	
	$wp_customize->add_setting( 'flik_footer_logo', array(
		'sanitize_callback' => 'aabc_sanitize_image'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'flik_footer_logo', array(
		'label'    => __( 'Footer Logo', 'flik' ),
		'section'  => 'flik_logo_section',
		'settings' => 'flik_footer_logo',
	) ) );	
	
}
add_action( 'customize_register', 'flik_theme_customizer' );


function aabc_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}
