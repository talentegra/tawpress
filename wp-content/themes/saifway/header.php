<?php
/**
 * The Header for our theme
 * Displays all of the <head> section and everything up till <div id="main">
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {    
	 if(saifway_theme_options('favicon') ) { ?>
		<link rel="shortcut icon" href="<?php echo esc_url( saifway_theme_options_url('favicon','url') ); ?>" type="image/x-icon"/>
	<?php } 
} ?>
<!-- set faviocn-->
<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>

<div id="body-inner">
    <?php  get_template_part( 'includes/header-default' ); ?>


	




