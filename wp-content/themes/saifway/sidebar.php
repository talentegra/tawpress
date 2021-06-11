<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Saifway
 */
global $saifway_options;
?>

<?php if( isset( $saifway_options['sticky_sidebar'] ) && $saifway_options['sticky_sidebar'] ) { ?>
<div id="sidebar" class="sidebar col-sm-4 stickys">
<?php } else { ?>
<div id="sidebar" class="sidebar col-sm-4">
<?php } ?>

	<?php // add the class "panel" below here to wrap the sidebar in Bootstrap style ;) ?>
	<div class="sidebar-inner">

		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>

		<?php endif; ?>

	</div> <!-- close .sidebar-padder -->
</div> <!-- close .sidebar -->
