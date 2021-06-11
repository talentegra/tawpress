<?php

if ( ! function_exists( 'saifway_setup' ) ) :
	
function saifway_setup() {

	// Load text domain
	load_theme_textdomain( 'saifway', get_template_directory() . '/languages' );

	// Editor-style.css to match the theme style.
	add_editor_style();

	if ( function_exists( 'add_theme_support' ) ) {

		add_theme_support( 'automatic-feed-links' );

		//Post Thumbnails
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'saifway-full-size', 1140, 650, true );
		add_image_size( 'saifway-medium-size', 850, 580, true );
		add_image_size( 'saifway-x-small-size', 100, 90, true );
		//Post Formats
		add_theme_support( 'post-formats', array('standard', 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery' ) );
	}

	//Menu Register
	register_nav_menus( 
		array(
		'primary'  => esc_html__( 'Main Menu', 'saifway' ),
		'topmenu'  => esc_html__( 'Top Menu', 'saifway' ),
		'footermenu'  => esc_html__( 'Footer Menu', 'saifway' ),
	) );

    /*
     * Enable support for wide alignment class for Gutenberg blocks.
     */
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );

}
endif; 
// saifway_setup
add_action( 'after_setup_theme', 'saifway_setup' );


function saifway_body_classes( $classes ) {

    if ( is_active_sidebar( 'sidebar' ) ) {
        $classes[] = 'sidebar-active';
    }else{
        $classes[] = 'sidebar-inactive';
    }
    return $classes;
}
add_filter( 'body_class','saifway_body_classes' );

// Category Randon Color
if ( ! function_exists( 'saifway_randon_category_color' ) ) {
    function saifway_randon_category_color(){
        $cats_color = Array('orange','green','red','cyan','blue','pink','lightgreen','coral','yellow','blueviolet');
        $cats_color_list = $cats_color[array_rand($cats_color)];
        return $cats_color_list;
    }
}

/*-------------------------------------------------------
 *				Saiway Options
 *-------------------------------------------------------*/

if(!function_exists('saifway_theme_options')):
	function saifway_theme_options($arg) {
		global $saifway_options;
		if (isset($saifway_options[$arg])) {
			return $saifway_options[$arg];
		} else {
			return false;
		}
	}
endif;

if(!function_exists('saifway_theme_options_url')):
	function saifway_theme_options_url($arg,$arg2) {
		global $saifway_options;
		if (isset($saifway_options[$arg][$arg2])) {
			return $saifway_options[$arg][$arg2];
		} else {
			return false;
		}
	}
endif;

/*-----------------------------------------------------
 * 				body class
 *----------------------------------------------------*/

if ( ! function_exists( 'saifway_body_class' ) ) {
	function saifway_body_class( $classes ) {
		if ( saifway_theme_options('theme_layout') ){
		    if ( isset( $_REQUEST['bfl'] ) ) {
		        $layout = esc_attr(sanitize_text_field($_REQUEST['bfl'])) ;
		    }else {
		        $layout = esc_attr(saifway_theme_options('theme_layout'));
		    }

		    switch ($layout) {

		        case 'boxwidth':
		        	$layout = saifway_theme_options('theme_layout') ;
		        break;

		        case 'fullwidth':
		        	$layout = saifway_theme_options('theme_layout') ;
		        break;

		        default:
		        	$layout = saifway_theme_options('theme_layout') ;
		        break;
		    }
		}else {
			$layout = 'fullwidth';
		}

	     $classes[] = $layout; 
		return $classes;
	}
}
add_filter( 'body_class', 'saifway_body_class' );
