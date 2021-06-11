<?php
/**
 * themewinter functions and definitions
 * @package saifway
 * @author themewinter
 * @link http://www.themewinter.com
 */

/********************************
/*******   Define   ********
*********************************/

define( 'SAIFWAY_DIR', get_template_directory() );
define( 'SAIFWAY_URI', get_template_directory_uri() );
define( 'THEMENAME', 'saifway' );

/**************************************
/*******   Set Content Width   ********
***************************************/

if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/*
 * Let WordPress manage the document title.
 */
add_theme_support( 'title-tag' );

/*********************************
/*******   Theme Setup  ********
**********************************/
require_once SAIFWAY_DIR . '/includes/main/setup.php';

/*********************************
/*******  Register Widget  ********
**********************************/
require_once SAIFWAY_DIR . '/includes/main/reg_widget.php';


/*********************************************
/*******  Enqueue scripts and styles  ********
**********************************************/
require_once SAIFWAY_DIR . '/includes/main/reg_script.php';



/*************************************
/*******  Themewing Nav  ********
**************************************/
require_once SAIFWAY_DIR . '/includes/main/pagination_nav.php';


/*************************************
/*******  register tgm Plugin  ********
**************************************/
require_once SAIFWAY_DIR . '/includes/main/reg_tgm.php';

/*************************************
/*******  Breadcrumb  ********
**************************************/
require_once SAIFWAY_DIR . '/includes/main/breadcrumb.php';

/*************************************
/*******  Custom Post Lenght  ********
**************************************/
require_once SAIFWAY_DIR . '/includes/main/content_text_limit.php';


/*************************************
/*******  Header Design Layout  ********
**************************************/
require_once SAIFWAY_DIR . '/includes/main/header-design-layout.php';

/*************************************
/*******  Footer Design Layout  ********
**************************************/
require_once SAIFWAY_DIR . '/includes/main/footer-design-layout.php';

/*************************************
/*******  Comment  ********
**************************************/
require_once SAIFWAY_DIR . '/includes/main/tw_comment.php';

// Saifway Post View Count
if(!function_exists('saifway_wpb_get_post_views')):
function saifway_wpb_get_post_views($postID){
    $count_key = '_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
endif;

