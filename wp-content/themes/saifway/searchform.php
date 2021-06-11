<?php
/**
 * The template for displaying search forms in Saifway
 *
 * @package Saifway
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
   <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'saifway' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php esc_html_e( 'Search for:', 'saifway' ); ?>">
</form>