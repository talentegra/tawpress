<?php
/**
 * @package Saifway
 */
get_header();
?>
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
							<?php /* Start the Loop */							
							while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'content', get_post_format() );?>
							<?php		
							endwhile;
							else :
							get_template_part( 'no-results', 'index' );
						    endif; 
							saifway_content_nav( 'nav-below' );
						?>
					</div> <!-- close .main-content-inner -->
				</div> <!-- close .col-sm-8 -->
				<?php if ( is_active_sidebar( 'sidebar' ) ) {get_sidebar();} ?>
			</div><!--/.row -->


<?php get_footer(); ?>