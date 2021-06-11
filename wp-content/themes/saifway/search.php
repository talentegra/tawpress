<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Saifway
 */

get_header(); ?>
<?php get_template_part( 'header-banner-title' ); ?>
<div class="main-content">
    <div class="container">
        <div class="in-main-content"> 
			<div class="row">
                    <?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
                            <div id="content" class="col-sm-8">
                        <?php } else { ?>
                            <div id="content" class="col-lg-12 col-md-12 col-sm-12">
                    <?php } ?>
					<div class="main-content-inner clearfix">
					<?php if ( have_posts() ) : ?>

						<header class="search-header text-center">
							<h2 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'saifway' ), '<span class="span-search">' . esc_attr( get_search_query() ) . '</span>' ); ?></h2>
						</header><!-- .page-header -->

						<?php // start the loop. ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'search' ); ?>

						<?php endwhile; ?>

						<?php saifway_content_nav( 'nav-below' ); ?>

					<?php else : ?>
						<div class="hentry">
							<div class="entry-blog">
								<div class="entry-content">
								<?php get_template_part( 'no-results', 'search' ); ?>
								</div>
							</div>
						</div>
					<?php endif; // end of loop. ?>
				</div>
			</div>
			<?php if ( is_active_sidebar( 'sidebar' ) ) {get_sidebar();} ?>
		</div><!--/.row -->	
<?php get_footer(); ?>