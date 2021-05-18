<?php
function blockchain_lite_get_social_networks() {
	return apply_filters( 'blockchain_lite_social_networks', array(
		array(
			'name'  => 'facebook',
			'label' => esc_html__( 'Facebook', 'blockchain-lite' ),
			'icon'  => 'fa-facebook',
		),
		array(
			'name'  => 'twitter',
			'label' => esc_html__( 'Twitter', 'blockchain-lite' ),
			'icon'  => 'fa-twitter',
		),
		array(
			'name'  => 'instagram',
			'label' => esc_html__( 'Instagram', 'blockchain-lite' ),
			'icon'  => 'fa-instagram',
		),
		array(
			'name'  => 'snapchat',
			'label' => esc_html__( 'Snapchat', 'blockchain-lite' ),
			'icon'  => 'fa-snapchat',
		),
		array(
			'name'  => 'bloglovin',
			'label' => esc_html__( 'Bloglovin', 'blockchain-lite' ),
			'icon'  => 'fa-heart',
		),
		array(
			'name'  => 'pinterest',
			'label' => esc_html__( 'Pinterest', 'blockchain-lite' ),
			'icon'  => 'fa-pinterest',
		),
		array(
			'name'  => 'youtube',
			'label' => esc_html__( 'YouTube', 'blockchain-lite' ),
			'icon'  => 'fa-youtube',
		),
		array(
			'name'  => 'vimeo',
			'label' => esc_html__( 'Vimeo', 'blockchain-lite' ),
			'icon'  => 'fa-vimeo',
		),
		array(
			'name'  => 'linkedin',
			'label' => esc_html__( 'LinkedIn', 'blockchain-lite' ),
			'icon'  => 'fa-linkedin',
		),
		array(
			'name'  => 'tumblr',
			'label' => esc_html__( 'Tumblr', 'blockchain-lite' ),
			'icon'  => 'fa-tumblr',
		),
		array(
			'name'  => 'flickr',
			'label' => esc_html__( 'Flickr', 'blockchain-lite' ),
			'icon'  => 'fa-flickr',
		),
		array(
			'name'  => 'dribbble',
			'label' => esc_html__( 'Dribbble', 'blockchain-lite' ),
			'icon'  => 'fa-dribbble',
		),
		array(
			'name'  => 'wordpress',
			'label' => esc_html__( 'WordPress', 'blockchain-lite' ),
			'icon'  => 'fa-wordpress',
		),
		array(
			'name'  => '500px',
			'label' => esc_html__( '500px', 'blockchain-lite' ),
			'icon'  => 'fa-500px',
		),
		array(
			'name'  => 'soundcloud',
			'label' => esc_html__( 'Soundcloud', 'blockchain-lite' ),
			'icon'  => 'fa-soundcloud',
		),
		array(
			'name'  => 'spotify',
			'label' => esc_html__( 'Spotify', 'blockchain-lite' ),
			'icon'  => 'fa-spotify',
		),
		array(
			'name'  => 'vine',
			'label' => esc_html__( 'Vine', 'blockchain-lite' ),
			'icon'  => 'fa-vine',
		),
		array(
			'name'  => 'tripadvisor',
			'label' => esc_html__( 'Trip Advisor', 'blockchain-lite' ),
			'icon'  => 'fa-tripadvisor',
		),
		array(
			'name'  => 'telegram',
			'label' => esc_html__( 'Telegram', 'blockchain-lite' ),
			'icon'  => 'fa-telegram',
		),
	) );
}

function blockchain_lite_wp_link_pages_default_args() {
	return apply_filters( 'blockchain_lite_wp_link_pages_default_args', array(
		'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'blockchain-lite' ),
		'after'       => '</div>',
		'link_before' => '<span class="page-number">',
		'link_after'  => '</span>',
	) );
}

function blockchain_lite_get_video_url_info( $url ) {
	$is_vimeo   = preg_match( '#(?:https?://)?(?:www\.)?vimeo\.com/([A-Za-z0-9\-_]+)#', $url, $vimeo_id );
	$is_youtube = preg_match( '~
		# Match non-linked youtube URL in the wild. (Rev:20111012)
		https?://         # Required scheme. Either http or https.
		(?:[0-9A-Z-]+\.)? # Optional subdomain.
		(?:               # Group host alternatives.
		  youtu\.be/      # Either youtu.be,
		| youtube\.com    # or youtube.com followed by
		  \S*             # Allow anything up to VIDEO_ID,
		  [^\w\-\s]       # but char before ID is non-ID char.
		)                 # End host alternatives.
		([\w\-]{11})      # $1: VIDEO_ID is exactly 11 chars.
		(?=[^\w\-]|$)     # Assert next char is non-ID or EOS.
		(?!               # Assert URL is not pre-linked.
		  [?=&+%\w]*      # Allow URL (query) remainder.
		  (?:             # Group pre-linked alternatives.
			[\'"][^<>]*>  # Either inside a start tag,
		  | </a>          # or inside <a> element text contents.
		  )               # End recognized pre-linked alts.
		)                 # End negative lookahead assertion.
		[?=&+%\w-]*        # Consume any URL (query) remainder.
		~ix',
	$url, $youtube_id );

	$info = array(
		'supported' => false,
		'provider'  => '',
		'video_id'  => '',
	);

	if ( $is_youtube ) {
		$info['supported'] = true;
		$info['provider']  = 'youtube';
		$info['video_id']  = $youtube_id[1];
	} elseif ( $is_vimeo ) {
		$info['supported'] = true;
		$info['provider']  = 'vimeo';
		$info['video_id']  = $vimeo_id[1];
	}

	return $info;
}


/**
 * Returns a set of related posts, or the arguments needed for such a query.
 *
 * @uses wp_parse_args()
 * @uses get_post_type()
 * @uses get_post()
 * @uses get_object_taxonomies()
 * @uses get_the_terms()
 * @uses wp_list_pluck()
 *
 * @param int $post_id A post ID to get related posts for.
 * @param int $related_count The number of related posts to return.
 * @param array $args Array of arguments to change the default behavior.
 * @return object|array A WP_Query object with the results, or an array with the query arguments.
 */
function blockchain_lite_get_related_posts( $post_id, $related_count, $args = array() ) {
	$args = wp_parse_args( (array) $args, array(
		'orderby' => 'rand',
		'return'  => 'query', // Valid values are: 'query' (WP_Query object), 'array' (the arguments array)
	) );

	$post_type = get_post_type( $post_id );
	$post      = get_post( $post_id );

	$tax_query  = array();
	$taxonomies = get_object_taxonomies( $post, 'names' );

	foreach ( $taxonomies as $taxonomy ) {
		$terms = get_the_terms( $post_id, $taxonomy );
		if ( is_array( $terms ) && count( $terms ) > 0 ) {
			$term_list = wp_list_pluck( $terms, 'slug' );
			$term_list = array_values( $term_list );
			if ( ! empty( $term_list ) ) {
				$tax_query['tax_query'][] = array(
					'taxonomy' => $taxonomy,
					'field'    => 'slug',
					'terms'    => $term_list,
				);
			}
		}
	}

	if ( count( $taxonomies ) > 1 ) {
		$tax_query['tax_query']['relation'] = 'OR';
	}

	$query_args = array(
		'post_type'      => $post_type,
		'posts_per_page' => $related_count,
		'post_status'    => 'publish',
		'post__not_in'   => array( $post_id ),
		'orderby'        => $args['orderby'],
	);

	if ( 'query' === $args['return'] ) {
		return new WP_Query( array_merge( $query_args, $tax_query ) );
	} else {
		return array_merge( $query_args, $tax_query );
	}
}


/**
 * Returns the appropriate page(d) query variable to use in custom loops (needed for pagination).
 *
 * @uses get_query_var()
 *
 * @param int $default_return The default page number to return, if no query vars are set.
 * @return int The appropriate paged value if found, else 0.
 */
function blockchain_lite_get_page_var( $default_return = 0 ) {
	$paged = get_query_var( 'paged', false );
	$page  = get_query_var( 'page', false );

	if ( false === $paged && false === $page ) {
		return $default_return;
	}

	return max( $paged, $page );
}


/**
 * Lightens/darkens a given colour (hex format), returning the altered colour in hex format.
 *
 * @see https://gist.github.com/stephenharris/5532899
 *
 * @param string $color Hexadecimal color value. May be 3 or 6 digits, with an optional leading # sign.
 * @param float $percent Decimal (0.2 = lighten by 20%, -0.4 = darken by 40%)
 *
 * @return string Lightened/Darkened colour as hexadecimal (with hash)
 */
function blockchain_lite_color_luminance( $color, $percent ) {
	// Remove # if provided
	if ( '#' === $color[0] ) {
		$color = substr( $color, 1 );
	}

	// Validate hex string.
	$hex     = preg_replace( '/[^0-9a-f]/i', '', $color );
	$new_hex = '#';

	$percent = floatval( $percent );

	if ( strlen( $hex ) < 6 ) {
		$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
	}

	// Convert to decimal and change luminosity.
	for ( $i = 0; $i < 3; $i ++ ) {
		$dec     = hexdec( substr( $hex, $i * 2, 2 ) );
		$dec     = min( max( 0, $dec + $dec * $percent ), 255 );
		$new_hex .= str_pad( dechex( $dec ), 2, 0, STR_PAD_LEFT );
	}

	return $new_hex;
}

/**
 * Converts hexadecimal color value to rgb(a) format.
 *
 * @param string $color Hexadecimal color value. May be 3 or 6 digits, with an optional leading # sign.
 * @param float|bool $opacity Opacity level 0-1 (decimal) or false to disable.
 *
 * @return string
 */
function blockchain_lite_hex2rgba( $color, $opacity = false ) {

	$default = 'rgb(0,0,0)';

	// Return default if no color provided
	if ( empty( $color ) ) {
		return $default;
	}

	// Remove # if provided
	$color = ltrim( $color, '#' );

	// Check if color has 6 or 3 characters and get values
	if ( strlen( $color ) === 6 ) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) === 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}

	$rgb = array_map( 'hexdec', $hex );

	if ( false !== $opacity ) {
		$opacity = abs( floatval( $opacity ) );
		if ( $opacity > 1 ) {
			$opacity = 1.0;
		}
		$output = 'rgba(' . implode( ',', $rgb ) . ',' . $opacity . ')';
	} else {
		$output = 'rgb(' . implode( ',', $rgb ) . ')';
	}

	return $output;
}

function blockchain_lite_empty_content( $content = false ) {
	if ( false === $content ) {
		$post    = get_post();
		$content = $post->post_content;
	}

	return trim( str_replace( '&nbsp;', '', strip_tags( $content ) ) ) === '';
}

/**
 * Returns the caption of an image, to be used in a lightbox.
 *
 * @uses get_post_thumbnail_id()
 * @uses wp_prepare_attachment_for_js()
 *
 * @param int|false $image_id The image's attachment ID.
 *
 * @return string
 */
function blockchain_lite_get_image_lightbox_caption( $image_id = false ) {
	if ( false === $image_id ) {
		$image_id = get_post_thumbnail_id();
	}

	$lightbox_caption = '';

	$attachment = wp_prepare_attachment_for_js( $image_id );

	if ( is_array( $attachment ) ) {
		$field = apply_filters( 'blockchain_lite_image_lightbox_caption_field', 'caption', $image_id, $attachment );

		if ( array_key_exists( $field, $attachment ) ) {
			$lightbox_caption = $attachment[ $field ];
		}
	}

	return $lightbox_caption;
}

/**
 * Conditionally returns a Javascript/CSS asset's version number.
 *
 * When the site is in debug mode, the normal asset's version is returned.
 * When it's not in debug mode, the theme's version is returned, so that caches can be invalidated on theme updates.
 *
 * @param bool $version The version string of the asset.
 *
 * @return false|string Theme version if SCRIPT_DEBUG or WP_DEBUG are enabled. Otherwise, $version is returned.
 */
function blockchain_lite_asset_version( $version = false ) {
	static $theme_version = false;

	if ( ! $theme_version ) {
		$theme         = wp_get_theme();
		$theme_version = $theme->get( 'Version' );
	}

	if ( $version ) {
		if ( ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ||
			( defined( 'WP_DEBUG' ) && WP_DEBUG )
		) {
			return $version;
		}
	}

	return $theme_version;
}

/**
 * Generic fallback callback for the main menu.
 *
 * Displays a few useful links, in contrast to the default wp_page_menu() which may flood the menu area.
 *
 * @param array $args
 *
 * @return void|string
 */
function blockchain_lite_main_menu_fallback( $args ) {
	$id    = ! empty( $args['menu_id'] ) ? $args['menu_id'] : 'menu-' . $args['theme_location'];
	$class = $args['menu_class'];

	$items = apply_filters( 'blockchain_lite_main_menu_fallback_items', array(
		home_url( '/' )              => __( 'Home', 'blockchain-lite' ),
		admin_url( 'nav-menus.php' ) => __( 'Set primary menu', 'blockchain-lite' ),
	) );

	$items_html = '';
	if ( $items ) {
		foreach ( $items as $item_url => $item_text ) {
			$items_html .= sprintf( '<li><a href="%1$s">%2$s</a></li>', esc_url( $item_url ), esc_html( $item_text ) );
		}
	}

	if ( empty( $items_html ) ) {
		return false;
	}

	$menu_html = sprintf( $args['items_wrap'], esc_attr( $id ), esc_attr( $class ), $items_html );

	if ( $args['echo'] ) {
		echo wp_kses_post( $menu_html );
	} else {
		return $menu_html;
	}
}

// Make sure this function is defined, even if the plugin is disabled.
if ( ! function_exists( 'blockchain_lite_documentation_url' ) ) {
	/**
	 * Returns the URL to the theme's documentation page.
	 *
	 * @return string
	 */
	function blockchain_lite_documentation_url() {
		$url = 'https://www.cssigniter.com/docs/blockchain-lite/';

		return apply_filters( 'blockchain_lite_documentation_url', $url );
	}
}
