<?php

require_once SAIFWAY_DIR . '/includes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'saifway_register_required_plugins');

if(!function_exists('saifway_register_required_plugins')):

	function saifway_register_required_plugins()
	{
		$plugins = array(

				array(
					'name'                  => 'Smart THW Main',
					'slug'                  => 'smart-thw-main',
					'source'                => 'http://demo.themewinter.com/wp/plugins/saifway/smart-thw-main.zip',
					'required'              => false,
					'version'               => '',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
				),

				array(
					'name'                  => 'js_composer',
					'slug'                  => 'js_composer',
					'source'                => 'http://demo.themewinter.com/wp/plugins/online/js_composer.zip',
					'required'              => false,
					'version'               => '',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
				),

				array(
					'name'                  => 'revslider',
					'slug'                  => 'revslider',
					'source'                => 'http://demo.themewinter.com/wp/plugins/online/rev_slider.zip',
					'required'              => false,
					'version'               => '',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
				),

				array(
					'name'                  => 'Contact Form 7',
					'slug'                  => 'contact-form-7',
					'required'              => false,
					'version'               => '',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => 'https://downloads.wordpress.org/plugin/contact-form-7.4.4.zip',
				),

                array(
                    'name'                  => 'MailChimp for WordPress',
                    'slug'                  => 'mailchimp-for-wp',
                    'required'              => false,
                    'version'               => '',
                    'force_activation'      => false,
                    'force_deactivation'    => false,
                    'external_url'          => 'https://downloads.wordpress.org/plugin/mailchimp-for-wp.3.1.5.zip',
                ),
				array(
					'name'                  => 'Woocoomerce',
					'slug'                  => 'woocommerce',
					'required'              => false,
					'version'               => '',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => 'https://downloads.wordpress.org/plugin/woocommerce.3.1.0.zip',
				),
				array(
				'name'                  => 'Widget Importer Exporter',
				'slug'                  => 'widget-importer-exporter',
				'required'              => false,
				'version'               => '',
				'force_activation'      => false,
				'force_deactivation'    => false,
				'external_url'          => 'https://downloads.wordpress.org/plugin/widget-importer-exporter.1.5.5.zip',
				)
			);

	$config = array(
			'domain'            => 'saifway',
			'id'           		=> 'tgmpa',
			'default_path'      => '',
			'parent_slug'  		=> 'themes.php',
			'capability'   		=> 'edit_theme_options',
			'menu'              => 'install-required-plugins',
			'has_notices'       => true,
			'dismissable'  		=> true,
			'is_automatic'      => false,
			'message'           => '',
			'strings'           => array(
						'page_title'                                => esc_html__( 'Install Required Plugins', 'saifway' ),
						'menu_title'                                => esc_html__( 'Install Plugins', 'saifway' ),
						'installing'                                => esc_html__( 'Installing Plugin: %s', 'saifway' ),
						'oops'                                      => esc_html__( 'Something went wrong with the plugin API.', 'saifway'),
						'return'                                    => esc_html__( 'Return to Required Plugins Installer', 'saifway'),
						'plugin_activated'                          => esc_html__( 'Plugin activated successfully.','saifway'),
						'complete'                                  => esc_html__( 'All plugins installed and activated successfully. %s', 'saifway' ),
						'nag_type'									=> 'updated'
				)
	);

	tgmpa( $plugins, $config );

	}

endif;
