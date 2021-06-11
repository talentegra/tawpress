<?php 
/**
* Template Name: Blog With Fullwidth
*/
get_header();?>
<?php get_template_part( 'header-banner-title' ); ?>
<div class="main-content">
    <div class="container">
        <div class="in-main-content"> 
            <div class="row">
                <div id="content" class="col-sm-12">
                    <div class="main-content-inner clearfix">
                        <?php
                        global $paged, $wp_query, $wp;

                        if  ( empty($paged) ) {

                            if ( !empty( $_GET['paged'] ) ) {
                                $paged = $_GET['paged'];

                            } elseif ( !empty($wp->matched_query) && $args = wp_parse_args($wp->matched_query) ) {
                                
                                if ( !empty( $args['paged'] ) ) {
                                    $paged = $args['paged'];
                                    }
                            }
                            
                            if ( !empty($paged) )
                                $wp_query->set('paged', $paged);
                        }
                    
                        $temp = $wp_query;
                        $wp_query= null;
                        
                        $wp_query = new WP_Query();
                        $wp_query->query("post_type=post&paged=".$paged ); 

                        if ( have_posts() ) :

                        while ( have_posts() ) : the_post();

                            get_template_part( 'content', get_post_format() );

                        endwhile;
                        
                        else:

                         get_template_part( 'no-results', 'index' );

                    endif; 
                    saifway_content_nav( 'nav-below' ); ?>
                </div><!--/.main-content-inner-->
            </div><!--/.col-sm-12-->
        </div><!--/.row -->
<?php get_footer();