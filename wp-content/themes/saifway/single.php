<?php
/**
 * The Template for displaying all single posts.
 *
 * @package bestblog
 */

get_header(); 
?>
<?php  get_template_part( 'header-banner-title' ); ?>

<?php 
$singlelayout = '';
if ( saifway_theme_options('single_layout') ){
    if ( isset( $_REQUEST['single-layout'] ) ) {
        $singlelayout = esc_attr(sanitize_text_field($_REQUEST['single-layout'])) ;
    }else {
        $singlelayout = esc_attr(saifway_theme_options('single_layout'));
    }
} 
?>

<div class="main-content">
	<div class="container">
		<div class="in-main-content">
			<div class="row">
			<?php if ($singlelayout == 'blogSingleRight'){ ?>
                    <?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
                            <div id="content" class="col-sm-8">
                        <?php } else { ?>
                            <div id="content" class="col-sm-12">
                    <?php } ?>
					<div class="main-content-inner">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content'); ?>

						<?php if ( class_exists( 'ReduxFramework' ) ) { ?>
							<?php if ( saifway_theme_options('post_nav_en') ) { 
					            saifway_content_nav( 'nav-below' ); 
					        }?>
					    <?php } else { ?>
					    	<?php saifway_content_nav( 'nav-below' );  ?>
					    <?php }?>   

					    <?php if ( class_exists( 'ReduxFramework' ) ) { ?>
							<?php if (saifway_theme_options('blog_single_comment_en') ) { 

								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || '0' != get_comments_number() )
									comments_template();
							}?>
						<?php } else { ?>
						<?php		// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() )
								comments_template(); ?>						
						<?php }?> 

					    <?php

					    if ( is_singular() ) {
					        $key = "_post_views_count";
					        $id = $post->ID;
					        $postview = get_post_meta( $id, $key,true);

					        if($postview == ''){
					            $postview = 0;
					            add_post_meta( $id, $key, 0);
					        }
					        else{
					            $postview = (int)$postview+1;
					            update_post_meta( $id, $key, $postview);
					        }
					    }
					 
					    ?>

					<?php endwhile; // end of the loop. ?>
				</div> <!-- close .main-content-inner -->
			</div> <!-- close .main-content-inner -->
			<?php if ( is_active_sidebar( 'sidebar' ) ) {get_sidebar();} ?>
		<?php } elseif ($singlelayout == 'blogSingleLeft'){ ?>
				<?php if ( is_active_sidebar( 'sidebar' ) ) {get_sidebar();} ?>
                    <?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
                            <div id="content" class="col-sm-8">
                        <?php } else { ?>
                            <div id="content" class="col-sm-12">
                    <?php } ?>
					<div class="main-content-inner">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content'); ?>

						<?php if ( class_exists( 'ReduxFramework' ) ) { ?>
							<?php if ( saifway_theme_options('post_nav_en') ) { 
					            saifway_content_nav( 'nav-below' ); 
					        }?>
					    <?php } else { ?>
					    	<?php saifway_content_nav( 'nav-below' );  ?>
					    <?php }?>    

					    <?php if ( class_exists( 'ReduxFramework' ) ) { ?>
							<?php if (saifway_theme_options('blog_single_comment_en') ) { 

								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || '0' != get_comments_number() )
									comments_template();
							}?>
						<?php } else { ?>
						<?php		// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() )
								comments_template(); ?>						
						<?php }?>  

					    <?php  if ( is_singular() ) {
					        $key = "_post_views_count";
					        $id = $post->ID;
					        $postview = get_post_meta( $id, $key,true);

					        if($postview == ''){
					            $postview = 0;
					            add_post_meta( $id, $key, 0);
					        }
					        else{
					            $postview = (int)$postview+1;
					            update_post_meta( $id, $key, $postview);
					        }
					    }
					 
					    ?>

					<?php endwhile; // end of the loop. ?>
				</div> <!-- close .main-content-inner -->
			</div> <!-- close .main-content-inner -->
			
		<?php } elseif ($singlelayout == 'SingleFullwidth') { ?>
			<div id="content" class="col-sm-8">
				<div class="main-content-inner">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content'); ?>

					<?php if ( class_exists( 'ReduxFramework' ) ) { ?>
						<?php if ( saifway_theme_options('post_nav_en') ) { 
				            saifway_content_nav( 'nav-below' ); 
				        }?>
				    <?php } else { ?>
				    	<?php saifway_content_nav( 'nav-below' );  ?>
				    <?php }?>  
					    
				    <?php if ( class_exists( 'ReduxFramework' ) ) { ?>
						<?php if (saifway_theme_options('blog_single_comment_en') ) { 

							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() )
								comments_template();
						}?>
					<?php } else { ?>
					<?php		// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() )
							comments_template(); ?>						
					<?php }?>  

				    <?php

				    if ( is_singular() ) {
				        $key = "_post_views_count";
				        $id = $post->ID;
				        $postview = get_post_meta( $id, $key,true);

				        if($postview == ''){
				            $postview = 0;
				            add_post_meta( $id, $key, 0);
				        }
				        else{
				            $postview = (int)$postview+1;
				            update_post_meta( $id, $key, $postview);
				        }
				    }
				 
				    ?>

					<?php endwhile; // end of the loop. ?>
				</div> <!-- close .main-content-inner -->
			</div> <!-- close .main-content-inner -->
		<?php } else { ?>
					<?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
                            <div id="content" class="col-sm-8">
                        <?php } else { ?>
                            <div id="content" class="col-sm-12">
                    <?php } ?>
					<div class="main-content-inner">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content'); ?>

						<?php if (saifway_theme_options('post_nav_en') ) { 
				            saifway_content_nav( 'nav-below' ); 
				        }?>				        

					    <?php if ( class_exists( 'ReduxFramework' ) ) { ?>
							<?php if (saifway_theme_options('blog_single_comment_en') ) { 

								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || '0' != get_comments_number() )
									comments_template();
							}?>
						<?php } else { ?>
						<?php		// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() )
								comments_template(); ?>						
						<?php }?> 

					    <?php

					    if ( is_singular() ) {
					        $key = "_post_views_count";
					        $id = $post->ID;
					        $postview = get_post_meta( $id, $key,true);

					        if($postview == ''){
					            $postview = 0;
					            add_post_meta( $id, $key, 0);
					        }
					        else{
					            $postview = (int)$postview+1;
					            update_post_meta( $id, $key, $postview);
					        }
					    }
					 
					    ?>

					<?php endwhile; // end of the loop. ?>
				</div> <!-- close .main-content-inner -->
			</div> <!-- close .main-content-inner -->
			<?php if ( is_active_sidebar( 'sidebar' ) ) {get_sidebar();} ?>
		<?php }?>
	</div><!--/.row -->
<?php get_footer(); ?>