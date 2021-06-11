<?php
//google font
if(!function_exists('saifway_google_fonts_url')){
    function saifway_google_fonts_url() {
    $fonts_url = '';
    $roboto = _x( 'on', 'Roboto font: on or off', 'saifway' );
    $montserrat = _x( 'on', 'Montserrat font: on or off', 'saifway' );

    if ( 'off' !== $roboto || 'off' !== $montserrat ) {
        $font_families = array();

        if ( 'off' !== $roboto ) {
        $font_families[] = 'Roboto:300,400,500,600,700';
        }

        if ( 'off' !== $montserrat ) {
        $font_families[] = 'Montserrat:300,400,500,600,700';
        }

        $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( 'latin,latin-ext' ),
        );
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
    }
}

if ( ! function_exists( 'saifway_scripts' ) ) :
function saifway_scripts() {
    
	 //google font
	wp_enqueue_style( 'google-fonts', saifway_google_fonts_url(), array(), null );
	// Register Styles
	wp_register_style( 'bootstrap', SAIFWAY_URI . '/css/bootstrap.min.css' );
	wp_register_style( 'bootstrap-wp', SAIFWAY_URI . '/css/bootstrap-wp.css' );	// load Font Awesome css
	wp_register_style( 'font-awesome', SAIFWAY_URI . '/css/font-awesome.min.css');
	wp_register_style( 'magnific-popup', SAIFWAY_URI . '/css/magnific-popup.css');
	wp_register_style( 'responsive', SAIFWAY_URI . '/css/responsive.css');
	wp_register_style( 'nanoscroller', SAIFWAY_URI . '/css/nanoscroller.css');
	wp_register_style( 'lightbox', SAIFWAY_URI . '/css/lightbox.css');
	wp_register_style( 'gutenberg-custom', SAIFWAY_URI . '/css/gutenberg-custom.css');
	wp_register_style( 'saifway-style', get_stylesheet_uri() );
	wp_add_inline_style( 'saifway-style', saifway_css_generator() );

	// Enqueue Styles
	wp_enqueue_style('bootstrap');
	wp_enqueue_style('bootstrap-wp');
	wp_enqueue_style('font-awesome');
	wp_enqueue_style('magnific-popup');
	wp_enqueue_style('responsive');
	wp_enqueue_style('nanoscroller');
	wp_enqueue_style('lightbox');
	wp_enqueue_style('saifway-style');
	wp_enqueue_style('gutenberg-custom');
	//wp_enqueue_style('quick-style',get_template_directory_uri().'/saifway-style.php',array(),false,'all');

	// Register Scripts
	wp_register_script('bootstrapjs', SAIFWAY_URI .'/js/bootstrap.min.js', array('jquery') );
	wp_register_script('custom', SAIFWAY_URI .'/js/custom.js', array('jquery'));
	wp_register_script( 'bootstrapwp', SAIFWAY_URI . '/js/bootstrap-wp.js', array('jquery') );
	wp_register_script( 'jquery.nanoscroller.min', SAIFWAY_URI . '/js/jquery.nanoscroller.min.js', array('jquery') );
	wp_register_script( 'jquery.magnific-popup', SAIFWAY_URI . '/js/jquery.magnific-popup.min.js', array('jquery') );
	wp_register_script( 'theia-sticky-sidebar', SAIFWAY_URI . '/js/theia-sticky-sidebar.js', array('jquery') );
	wp_register_script( 'skip-link-focus-fix', SAIFWAY_URI . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_register_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}


	// Enqueue Scripts
	wp_enqueue_script('bootstrapjs');
	wp_enqueue_script('bootstrapwp');
	wp_enqueue_script('jquery.nanoscroller.min');
	wp_enqueue_script('jquery.magnific-popup');
	wp_enqueue_script('theia-sticky-sidebar');
	wp_enqueue_script('skip-link-focus-fix');
	wp_enqueue_script('keyboard-image-navigation');
	wp_enqueue_script('custom');

}
add_action( 'wp_enqueue_scripts', 'saifway_scripts' );
endif;


//Gutenberg enqueue
add_action('enqueue_block_editor_assets', 'saifway_action_enqueue_block_editor_assets' );
function saifway_action_enqueue_block_editor_assets() {
    wp_enqueue_style( 'google-fonts', saifway_google_fonts_url(), array(), null );
    wp_enqueue_style( 'gutenberg-editor-font-awesome-styles', get_template_directory_uri() . '/css/font-awesome.min.css', null, 'all' );
    wp_enqueue_style( 'saifway-style', get_stylesheet_uri() );
    wp_enqueue_style( 'gutenberg-editor-customizer-styles', get_template_directory_uri() . '/css/gutenberg-editor-custom.css', null, 'all' );
    wp_enqueue_style( 'gutenberg-editor-styles', get_template_directory_uri() . '/css/gutenberg-custom.css', null, 'all' );
}

function saifway_admincss()
{
	wp_enqueue_style( 'admincss-stylesheet', get_template_directory_uri().'/css/admincss.css', array(), false, false );
}
add_action( 'admin_print_styles', 'saifway_admincss' );


if(!function_exists('saifway_css_generator')){
    function saifway_css_generator(){
    	global $saifway_options;
		$output = '';
		if ( esc_attr($saifway_options['sticky-header']) ){
		    $output .= '.admin-bar .navbar-fixed{top:32px;}';
		    $output .= '.navbar-fixed{  z-index: 999;position: fixed;opacity: .98;width: 100%;top: 0;
		    -webkit-animation: fadeInDown 800ms;
		    -moz-animation: fadeInDown 800ms;
		    -ms-animation: fadeInDown 800ms;
		    -o-animation: fadeInDown 800ms;
		    animation: fadeInDown 800ms;
		    bottom: auto;
		    -webkit-backface-visibility: hidden;}';
		}

		if ( class_exists( 'ReduxFramework' ) ){

		    $menu_align = esc_attr($saifway_options['menu_align']);
		    switch ($menu_align) {

		        case 'left':
		            $output .= '.site-navigation-inner{text-align:left;}';
		        break;

		        case 'center':
		            $output .= '.site-navigation-inner{text-align:center;}';
		        break;

		        case 'right':
		            $output .= '.site-navigation-inner{text-align:right;}';
		        break;

		        default:
		            $output .= '.site-navigation-inner{text-align:center;}';
		        break;
		    }
		    $linkcolor = esc_attr($saifway_options['link_color']);
		    if(isset($linkcolor)){
		        $output .= 'a,.page-header h2.page-title a:hover,
		        ul.top-info li .info-box span.info-icon,
		        .header-variation3 ul.main-menu>li.current-menu-parent>a,
		.header-variation3 ul.main-menu>li:hover>a,ul.main-menu li ul li.current-menu-item > a,
		ul.main-menu li ul li:hover > a,.product-item .product-title a:hover,
		.vc_tta.vc_general .vc_tta-tabs-list .vc_tta-tab.vc_active >a,.team-slide .team-content .ts-name,
		.footer-widget ul.list-arrow li a:hover,.footer-menu ul li a:hover,
		.blog-header .page-title a:hover,.meta-category a:hover,
		.meta-author a:hover,.entry-comment a:hover,.latest-post-content2 h4 a:hover,
		.widget ul.nav>li>a:hover,.widget_categorie ul li.active a,
		.widget_categorie ul li:hover a,.list-arrow li:hover,.paging-navigation .post-nav li >a:hover,
		.post-navigation li a:hover,
		.post-navigation li a:hover span,.list-item-title a:hover,
		.vc_toggle.vc_toggle_active>.vc_toggle_title h4,
		.vc_general.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a,.top-menu li a:hover,
		.off-canvas-list li a:hover,.woocommerce ul.products li.product .price,.woocommerce ul.products li.product .woocommerce-loop-product__title:hover{ color:'. $linkcolor .'; }';

		        $output .= '#back-to-top .btn.btn-primary,
		        .headernav-variation2 .site-navigation-inner,.tp-caption a.slide-btn.border:hover,
		        .thw-title-shortcode .title:after,
		        .owl-carousel.owl-theme .owl-controls .owl-page.active span,
		.owl-carousel.owl-theme .owl-controls.clickable .owl-page:hover span,
		.team-slide.owl-theme .owl-controls .owl-buttons div,.plan.featured .plan-name,
		.plan.featured a.btn,.footer-top-bg,.footer .widget .widget_title:after,
		.saifway-newsletter input[type=submit],.blog-header .page-title:after,
		.sidebar .widget .widget_title:after,.widget.widget_tag_cloud .tagcloud a:hover,
		.btn-primary,.wpcf7-form-control.wpcf7-submit,.readmore-blog,
		.form-submit .btn-primary,.vc_images_carousel .vc_carousel-indicators .vc_active,.job-box,

		.woocommerce ul.products li.product .button,.woocommerce ul.products li.product .added_to_cart,
			.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,
			.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt { background-color:'. $linkcolor .'; }';

		        $output .= '.header-variation3 ul.main-menu li > ul{border-top: 3px solid '. $linkcolor .'; }';

		        $output .= '.down-arrow-color{ border-top: 22px solid'. $linkcolor .'; }';

		        $output .= '.vc_tta.vc_general .vc_tta-tabs-list .vc_tta-tab.vc_active >a{ border-top: 5px solid '. $linkcolor .'!important; }';

		        $output .= '.vc_toggle.vc_toggle_active>.vc_toggle_title .vc_toggle_icon:before,
		.vc_toggle.vc_toggle_active>.vc_toggle_title .vc_toggle_icon:after,
		.vc_toggle.vc_toggle_active>.vc_toggle_title:hover .vc_toggle_icon:before,
		.vc_toggle.vc_toggle_active>.vc_toggle_title:hover .vc_toggle_icon:after,.vc_images_carousel .vc_carousel-indicators .vc_active,
		.thw-offcanvas .nano > .nano-pane > .nano-slider,#header-trigger:hover .icon-bar{ background-color:'. $linkcolor .'!important; }';

		    $output .= '.vc_tta.vc_general .vc_tta-tabs-list .vc_tta-tab.vc_active >a{color:'. $linkcolor .'!important; }';
		    }

		    $hovercolor = esc_attr($saifway_options['hover_color']);
		    if(isset($hovercolor)){
		        $output .= 'a:hover{ color:'. $hovercolor .'; }';
		    }

		    $minorcolor = esc_attr($saifway_options['minor_color']);
		    if(isset($minorcolor)){
		        $output .= '.list-round-arrow li:before,
		.thw-feature-content ul li:before,.job-box,
		ul.main-menu>li.current-menu-item>a,
		ul.main-menu>li.current-menu-parent>a,
		ul.main-menu>li:hover>a{ color:'. $minorcolor .'; }';
		    }
		    if(isset($minorcolor)){
		        $output .= '.btn-dark,.find-agent,
		        			.woocommerce ul.products li.product .button:hover,
			.woocommerce ul.products li.product .added_to_cart:hover,
			.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{ background-color:'. $minorcolor .'; }';
		    }

		    if(isset($minorcolor)){
		        $output .= '.find-agent:before{ border-bottom: 65px solid '. $minorcolor .'; }';
		    }

		    $menubg = esc_attr($saifway_options['menu_bg']);
		    if(isset($menubg)){
		        $output .= '.site-navigation,.thw-menubar.sticky-header{ background:'. $menubg .'; }';
		    }
		    $innerbody = esc_attr($saifway_options['innerbody_color']);
		    if(isset($innerbody)){
		        $output .= '#body-inner{ background:'. $innerbody .'; }';
		    }

		    $topbarbg = esc_attr($saifway_options['topbar_bg']);
		    if(isset($topbarbg)){
		        $output .= '.topbar{ background:'. $topbarbg .'; }';
		    }
		} else {
		    $output .= '.logo-header-inner{text-align:center;}
		    .logo-header-inner a{text-align:center;display:inline-block;}
		    .site-navigation-inner{text-align:left;}
		    a,.page-header h2.page-title a:hover{ color:#1bbc9b; }
		    #back-to-top .btn.btn-primary{ background-color:#1bbc9b; }
		    a:hover{ color:#0ba08c; }
		    .site-navigation,.thw-menubar.sticky-header{ background:#1bbc9b; }
		    #body-inner{ background:#ffffff; }
		    .topbar{ background:#3a5371; }';
		}

	    return $output;
    }
}