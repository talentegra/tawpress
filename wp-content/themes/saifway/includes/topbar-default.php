<div class="topbar clearfix">
    <div class="container"> 
        <div class="row">
            <?php if( saifway_theme_options('topbar_share') ){ ?>
                <div class="col-sm-6 col-xs-12 topshare">
                    <?php get_template_part( 'includes/social-buttons' ); ?>
                </div>  
            <?php }?>  

            <?php if ( has_nav_menu( 'topmenu' ) ) : ?>
                <div class="col-sm-6 text-right col-xs-12">
                <?php
                    // topmenu Nav
                    wp_nav_menu( array(
                        'theme_location' => 'topmenu',
                        'depth'          => 1,
                        'menu_class' => 'top-menu unstyled',
                        'fallback_cb' => '',
                    ) );
                ?>
                </div>
            <?php endif; ?>                   
        </div><!--/.row-->
    </div><!--/.container-->
</div><!--/.topbar-->




