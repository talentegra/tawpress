<?php
	add_action( 'wp_enqueue_scripts', 'vlogger_video_blog_enqueue_styles' );
	function vlogger_video_blog_enqueue_styles() {
    	$parent_style = 'vw-blog-magazine-basic-style'; // Style handle of parent theme.
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );		
		wp_enqueue_style( 'vlogger-video-blog-style', get_stylesheet_uri(), array( $parent_style ) );
		require get_parent_theme_file_path( '/inline-style.php' );
		wp_add_inline_style( 'vlogger-video-blog-style',$vw_blog_magazine_custom_css );
		require get_theme_file_path( '/inline-style.php' );
		wp_add_inline_style( 'vlogger-video-blog-style',$vw_blog_magazine_custom_css );
		wp_enqueue_style( 'vlogger-video-blog-block-style', get_theme_file_uri('/css/blocks.css') );
	}

	add_action( 'init', 'vlogger_video_blog_remove_parent_function');
	function vlogger_video_blog_remove_parent_function() {
		remove_action( 'admin_notices', 'vw_blog_magazine_activation_notice' );
		remove_action( 'wp_enqueue_scripts', 'vw_blog_magazine_header_style' );
		remove_action( 'admin_menu', 'vw_blog_magazine_gettingstarted' );
		unregister_sidebar( 'social-icon' );
		remove_action( 'tgmpa_register', 'vw_blog_magazine_register_recommended_plugins' );
	}

	add_action( 'wp_enqueue_scripts', 'vlogger_video_blog_header_style' );
	function vlogger_video_blog_header_style() {
		if ( get_header_image() ) :
		$custom_css = "
	        #header{
				background-image:url('".esc_url(get_header_image())."');
				background-position: center top;
				background-size: 100%;
			}";
		   	wp_add_inline_style( 'vlogger-video-blog-style', $custom_css );
		endif;
	}

	function vlogger_video_blog_scripts() {	
		wp_enqueue_script( 'Custom JS ', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery') );
	}
	add_action( 'wp_enqueue_scripts', 'vlogger_video_blog_scripts' );

	function vlogger_video_blog_font_url() {
		$font_url      = '';
		$font_family   = array();
		$font_family[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		$query_args = array(
			'family' => rawurlencode(implode('|', $font_family)),
		);
		$font_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
		return $font_url;
	}
	
	function vlogger_video_blog_customizer ( $wp_customize ) {

		//Top Video Section
		$wp_customize->add_section( 'vlogger_video_blog_video_section' , array(
	    	'title'      => __( 'Top Video Section', 'vlogger-video-blog' ),
			'priority'   => null,
			'panel' => 'vw_blog_magazine_panel_id'
		) );

		$args = array('numberposts' => -1);
		$post_list = get_posts($args);
		$i = 0;
		$pst[]= 'select';
		foreach($post_list as $post){
			$pst[$post->post_title] = $post->post_title;
		}

		$wp_customize->add_setting('vlogger_video_blog_top_video_one',array(
			'sanitize_callback' => 'vlogger_video_blog_sanitize_choices',
		));
		$wp_customize->add_control('vlogger_video_blog_top_video_one',array(
			'type'    => 'select',
			'choices' => $pst,
			'label' => __('Select Video Post','vlogger-video-blog'),
			'section' => 'vlogger_video_blog_video_section',
		));

		$args = array('numberposts' => -1);
		$post_list = get_posts($args);
		$i = 0;
		$pst[]= 'select';
		foreach($post_list as $post){
			$pst[$post->post_title] = $post->post_title;
		}

		$wp_customize->add_setting('vlogger_video_blog_top_video_two',array(
			'sanitize_callback' => 'vlogger_video_blog_sanitize_choices',
		));
		$wp_customize->add_control('vlogger_video_blog_top_video_two',array(
			'type'    => 'select',
			'choices' => $pst,
			'label' => __('Select Video Post','vlogger-video-blog'),
			'section' => 'vlogger_video_blog_video_section',
		));

		$args = array('numberposts' => -1);
		$post_list = get_posts($args);
		$i = 0;
		$pst[]= 'select';
		foreach($post_list as $post){
			$pst[$post->post_title] = $post->post_title;
		}

		$wp_customize->add_setting('vlogger_video_blog_top_video_three',array(
			'sanitize_callback' => 'vlogger_video_blog_sanitize_choices',
		));
		$wp_customize->add_control('vlogger_video_blog_top_video_three',array(
			'type'    => 'select',
			'choices' => $pst,
			'label' => __('Select Video Post','vlogger-video-blog'),
			'section' => 'vlogger_video_blog_video_section',
		));

		//Playlist Section
	  	$wp_customize->add_section('vlogger_video_blog_playlist_section',array(
		    'title' => __('Playlist Section','vlogger-video-blog'),
		    'description' => '',
		    'priority'  => null,
		    'panel' => 'vw_blog_magazine_panel_id',
		));

	  	$wp_customize->add_setting( 'vlogger_video_blog_about', array(
			'default'           => '',
			'sanitize_callback' => 'vlogger_video_blog_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vlogger_video_blog_about', array(
			'label'    => __( 'Select About Page', 'vlogger-video-blog' ),
			'section'  => 'vlogger_video_blog_playlist_section',
			'type'     => 'dropdown-pages'
		) );

		$categories = get_categories();
		$cats = array();
		$i = 0;
		$cat_pst1[]= 'select';
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cat_pst1[$category->slug] = $category->name;
		}

		$wp_customize->add_setting('vlogger_video_blog_playlist',array(
		    'default' => 'select',
		    'sanitize_callback' => 'vw_blog_magazine_sanitize_choices',
	  	));
	  	$wp_customize->add_control('vlogger_video_blog_playlist',array(
		    'type'    => 'select',
		    'choices' => $cat_pst1,
		    'label' => __('Select Category to display most liked playlist','vlogger-video-blog'),
		    'section' => 'vlogger_video_blog_playlist_section',
		));

		$wp_customize->add_setting('vlogger_video_blog_about_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('vlogger_video_blog_about_button_text',array(
			'label'	=> __('Add About Button Text','vlogger-video-blog'),
			'input_attrs' => array(
	            'placeholder' => __( 'VIEW ALL', 'vlogger-video-blog' ),
	        ),
			'section'=> 'vlogger_video_blog_playlist_section',
			'type'=> 'text'
		));

	  	// Category Section
	  	$wp_customize->add_section('vw_blog_magazine_category_section',array(
		    'title' => __('Category Section','vlogger-video-blog'),
		    'description' => '',
		    'priority'  => null,
		    'panel' => 'vw_blog_magazine_panel_id',
		));

		$wp_customize->add_setting('vlogger_video_blog_section_title',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));
		$wp_customize->add_control('vlogger_video_blog_section_title',array(
			'label'	=> __('Category Section Title','vlogger-video-blog'),
			'section'	=> 'vw_blog_magazine_category_section',
			'type'		=> 'text'
		));

	}
	add_action( 'customize_register', 'vlogger_video_blog_customizer' );

	define('VLOGGER_VIDEO_BLOG_FREE_THEME_DOC',__('https://www.vwthemesdemo.com/docs/free-vlogger-video-blog/','vlogger-video-blog'));
	define('VLOGGER_VIDEO_BLOG_SUPPORT',__('https://wordpress.org/support/theme/vlogger-video-blog/','vlogger-video-blog'));
	define('VLOGGER_VIDEO_BLOG_REVIEW',__('https://wordpress.org/support/theme/vlogger-video-blog/reviews','vlogger-video-blog'));
	define('VLOGGER_VIDEO_BLOG_BUY_NOW',__('https://www.vwthemes.com/themes/wordpress-video-theme/','vlogger-video-blog'));
	define('VLOGGER_VIDEO_BLOG_LIVE_DEMO',__('https://www.vwthemes.net/vw-video-vlog-pro/','vlogger-video-blog'));
	define('VLOGGER_VIDEO_BLOG_PRO_DOC',__('https://www.vwthemesdemo.com/docs/vw-video-vlog-pro/','vlogger-video-blog'));
	define('VLOGGER_VIDEO_BLOG_FAQ',__('https://www.vwthemes.com/faqs/','vlogger-video-blog'));
	define('VLOGGER_VIDEO_BLOG_CONTACT',__('https://www.vwthemes.com/contact/','vlogger-video-blog'));
	define('VLOGGER_VIDEO_BLOG_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','vlogger-video-blog'));
	define('VLOGGER_VIDEO_BLOG_CREDIT',__('https://www.vwthemes.com/themes/free-wordpress-video-theme/','vlogger-video-blog'));

	if ( ! function_exists( 'vlogger_video_blog_credit' ) ) {
		function vlogger_video_blog_credit(){
			echo "<a href=".esc_url(VLOGGER_VIDEO_BLOG_CREDIT)." target='_blank'>". esc_html__('Video WordPress Theme','vlogger-video-blog') ."</a>";
		}
	}

	function vlogger_video_blog_sanitize_choices( $input, $setting ) {
	    global $wp_customize; 
	    $control = $wp_customize->get_control( $setting->id ); 
	    if ( array_key_exists( $input, $control->choices ) ) {
	        return $input;
	    } else {
	        return $setting->default;
	    }
	}

	function vlogger_video_blog_sanitize_dropdown_pages( $page_id, $setting ) {
	  	$page_id = absint( $page_id );
	  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

// Customizer Pro
require_once( ABSPATH . WPINC . '/class-wp-customize-section.php' );

class Vlogger_Video_Blog_Customize_Section_Pro extends WP_Customize_Section {
	public $type = 'vlogger-video-blog';
	public $pro_text = '';
	public $pro_url = '';
	public function json() {
		$json = parent::json();
		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );
		return $json;
	}
	protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}

final class VW_Blog_Magazine_Customize {
	public static function get_instance() {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}
		return $instance;
	}
	private function __construct() {}
	private function setup_actions() {
		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );
		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}
	public function sections( $manager ) {
		// Register custom section types.
		$manager->register_section_type( 'Vlogger_Video_Blog_Customize_Section_Pro' );
		// Register sections.
		$manager->add_section( new Vlogger_Video_Blog_Customize_Section_Pro( $manager, 'vlogger_video_blog_upgrade_pro_link',
		array(
			'priority'   => 1,
			'title'    => esc_html__( 'VIDEO BLOG PRO', 'vlogger-video-blog' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vlogger-video-blog' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-video-theme/'),
		) ) );

		// Register sections.
		$manager->add_section(new Vlogger_Video_Blog_Customize_Section_Pro($manager,'vlogger_video_blog_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vlogger-video-blog' ),
			'pro_text' => esc_html__( 'DOCS', 'vlogger-video-blog' ),
			'pro_url'  => admin_url('themes.php?page=vlogger_video_blog_guide'),
		)));
	}
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'vlogger-video-blog-customize-controls', get_stylesheet_directory_uri() . '/js/customize-controls-child.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'vlogger-video-blog-customize-controls', get_stylesheet_directory_uri() . '/css/customize-controls-child.css' );
	}
}
VW_Blog_Magazine_Customize::get_instance();

// Theme Activation Notice
global $pagenow;

if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
add_action( 'admin_notices', 'vlogger_video_blog_activation_notice' );
}

// Notice after Theme Activation
function vlogger_video_blog_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
	echo '<p>'. esc_html__( 'Thank you for choosing Vlogger Video Blog Theme. Would like to have you on our Welcome page so that you can reap all the benefits of our Vlogger Video Blog Theme.', 'vlogger-video-blog' ) .'</p>';
	echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=vlogger_video_blog_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'vlogger-video-blog' ) .'</a></p>';
	echo '</div>';
}

/* getstart */
require get_theme_file_path('/inc/getstart/getstart.php');