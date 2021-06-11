<?php

if ( ! function_exists( 'saifway_widgets_init' ) ) :
function saifway_widgets_init() {

	register_sidebar(array( 
					'name' 			=> esc_html__( 'Sidebar', 'saifway' ),
				  	'id' 			=> 'sidebar',
				  	'description' 	=> esc_html__( 'Widgets in this area will be shown on Sidebar.', 'saifway' ),
				  	'before_title' 	=> '<h3  class="widget_title">',
				  	'after_title' 	=> '</h3>',
				  	'before_widget' => '<div id="%1$s" class="widget %2$s" >',
				  	'after_widget' 	=> '</div>'
				)
	);
	register_sidebar(array( 
					'name' 			=> esc_html__( 'Footer Top', 'saifway' ),
					'id' 			=> 'footertop',
					'description' 	=> esc_html__( 'Widgets in this area will be shown before Footer.' , 'saifway'),
					'before_title' 	=> '<h3 class="widget_title">',
					'after_title' 	=> '</h3>',
					'before_widget' => '<div class="col-md-4 footer-box"><div id="%1$s" class="widget %2$s" >',
					'after_widget' 	=> '</div></div>'
				)
	);

	register_sidebar(array( 
					'name' 			=> esc_html__( 'Footer1', 'saifway' ),
					'id' 			=> 'footer1',
					'description' 	=> esc_html__( 'Widgets in this area will be shown before Footer.' , 'saifway'),
					'before_title' 	=> '<h3 class="widget_title">',
					'after_title' 	=> '</h3>',
					'before_widget' => '<div class="footer-widget"><div id="%1$s" class="widget %2$s" >',
					'after_widget' 	=> '</div></div>'
				)
	);

	register_sidebar(array( 
					'name' 			=> esc_html__( 'Footer2', 'saifway' ),
					'id' 			=> 'footer2',
					'description' 	=> esc_html__( 'Widgets in this area will be shown before Footer.' , 'saifway'),
					'before_title' 	=> '<h3 class="widget_title">',
					'after_title' 	=> '</h3>',
					'before_widget' => '<div class="footer-widget"><div id="%1$s" class="widget %2$s" >',
					'after_widget' 	=> '</div></div>'
				)
	);

	register_sidebar(array( 
					'name' 			=> esc_html__( 'Footer3', 'saifway' ),
					'id' 			=> 'footer3',
					'description' 	=> esc_html__( 'Widgets in this area will be shown before Footer.' , 'saifway'),
					'before_title' 	=> '<h3 class="widget_title">',
					'after_title' 	=> '</h3>',
					'before_widget' => '<div class="footer-widget"><div id="%1$s" class="widget %2$s" >',
					'after_widget' 	=> '</div></div>'
				)
	);

	register_sidebar(array( 
					'name' 			=> esc_html__( 'Footer4', 'saifway' ),
					'id' 			=> 'footer4',
					'description' 	=> esc_html__( 'Widgets in this area will be shown before Footer.' , 'saifway'),
					'before_title' 	=> '<h3 class="widget_title">',
					'after_title' 	=> '</h3>',
					'before_widget' => '<div class="footer-widget"><div id="%1$s" class="widget %2$s" >',
					'after_widget' 	=> '</div></div>'
				)
	);	
}
add_action( 'widgets_init', 'saifway_widgets_init' );
endif;