<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Saifway
 */

get_header(); ?>
<?php get_template_part( 'header-banner-title' ); ?>
<div class="main-content">
    <div class="container">
        <div class="in-main-content">    
			<div class="row">
			<?php // add the class "panel" below here to wrap the content-padder in Bootstrap style ;) ?>
                <?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
                            <div id="content" class="main-content-inner col-sm-8">
                        <?php } else { ?>
                            <div id="content" class="main-content-inner col-lg-12 col-md-12 col-sm-12">
                    <?php } ?>
				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title">
							<?php
								if ( is_category() ) :
									single_cat_title();

								elseif ( is_tag() ) :
									single_tag_title();

								elseif ( is_author() ) :
									/* Queue the first post, that way we know
									 * what author we're dealing with (if that is the case).
									*/
									the_post();
									printf( esc_html__( 'Author: %s', 'saifway' ), '<span class="vcard">' . esc_html( get_the_author() ) . '</span>' );
									/* Since we called the_post() above, we need to
									 * rewind the loop back to the beginning that way
									 * we can run the loop properly, in full.
									 */
									rewind_posts();

								elseif ( is_day() ) :
									printf( esc_html__( 'Day: %s', 'saifway' ), '<span>' . esc_html( get_the_date() ) . '</span>' );

								elseif ( is_month() ) :
									printf( esc_html__( 'Month: %s', 'saifway' ), '<span>' . esc_html( get_the_date( 'F Y' ) ) . '</span>' );

								elseif ( is_year() ) :
									printf( esc_html__( 'Year: %s', 'saifway' ), '<span>' . esc_html( get_the_date( 'Y' ) ) . '</span>' );

								elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
									esc_html_e( 'Asides', 'saifway' );

								elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
									esc_html_e( 'Images', 'saifway');

								elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
									esc_html_e( 'Videos', 'saifway' );

								elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
									esc_html_e( 'Quotes', 'saifway' );

								elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
									esc_html_e( 'Links', 'saifway' );

								else :
									esc_html_e( 'Archives', 'saifway' );

								endif;
							?>
						</h1>
						<?php
							// Show an optional term description.
							$term_description = term_description();
							if ( ! empty( $term_description ) ) :
								printf( '<div class="taxonomy-description">%s</div>', esc_attr ($term_description) );
							endif;
						?>
					</header><!-- .page-header -->

					<?php /* Start the Loop */
					while ( have_posts() ) : the_post();

						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
						
					endwhile;

				else : 
					get_template_part( 'no-results', 'archive' );

				endif;

				saifway_content_nav( 'nav-below' ); ?>

			</div><!-- .content-padder -->
			</div> <!-- close .main-content-inner -->
                <?php if ( is_active_sidebar( 'sidebar' ) ) {get_sidebar();} ?>
		</div><!--/.row -->
<?php get_footer(); ?>
