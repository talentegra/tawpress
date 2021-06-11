<?php

/*-------------------------------------------------------
 *				Redux Framework Options Added
 *-------------------------------------------------------*/

global $saifway_options; 

if ( !class_exists( 'ReduxFramework' ) ) {
	require_once( get_template_directory() . '/saifway-admin/framework.php' );
}
if ( !class_exists( 'ReduxFramework' ) ) {
	if ( !isset( $redux_demo ) ) {
		require_once( get_template_directory() . '/includes/saifway-options/saifway-options-config.php' );
	}
}
