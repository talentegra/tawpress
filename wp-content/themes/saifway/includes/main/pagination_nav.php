<?php

if ( ! function_exists( 'saifway_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function saifway_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation clearfix' : 'paging-navigation clearfix';

	?>
	<div class="clearfix"></div>
	<nav id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo esc_attr($nav_class); ?>">
		<ul class="post-nav">

		<?php if ( is_single() ) : // navigation links for single posts ?>

			<?php previous_post_link( '<li class="nav-previous previous">%link</li>', '<span class="meta-nav">' . _x( '<i class="fa fa-angle-double-left"></i>', 'Previous post link', 'saifway' ) . '</span> %title' ); ?>
			<?php next_post_link( '<li class="nav-next next">%link</li>', '%title <span class="meta-nav">' . _x( '<i class="fa fa-angle-double-right"></i>', 'Next post link', 'saifway' ) . '</span>' ); ?>

		<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

			<?php if ( get_next_posts_link() ) : ?>
			<li class="nav-previous previous"><?php next_posts_link( '<i class="fa fa-angle-double-left"></i>'. esc_html__( 'Older posts', 'saifway' ) ); ?></li>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<li class="nav-next next"><?php previous_posts_link( esc_html__( 'Newer posts', 'saifway' ). '<i class="fa fa-angle-double-right"></i>' ); ?></li>
			<?php endif; ?>

		<?php endif; ?>

		</ul>
	</nav><!-- #<?php //echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // saifway_content_nav