<?php 
// header classic
if ( ! function_exists( 'saifway_header_layout1' ) ) {
    function saifway_header_layout1(){ ?>
    <header class="site-header header-variation1">  
        <div class="container"> 
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <div class="header-offcanvas hidden-lg hidden-md hidden-sm">
                    <a id="header-trigger" class="trigger" href="#">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </a>
                </div> <!-- .offcanvas tigger -->
            <?php endif; ?>
            <div class="row">
                <div class="logo col-xs-12 col-sm-3">
                    <div class="site-logo">    
                        <?php get_template_part( 'includes/logo' ); ?> 
                    </div><!-- end row -->    
                </div> <!-- .logo --> 
                <?php if ( saifway_theme_options('head_area') || saifway_theme_options('head_address') || saifway_theme_options('head_contact') || saifway_theme_options('head_email') || saifway_theme_options('head_time') || saifway_theme_options('head_day') ) { ?>
                <div class="col-xs-12 col-sm-7 header-right">
                    <ul class="top-info">
                        <?php if ( saifway_theme_options('head_area') || saifway_theme_options('head_address') ) { ?>
                            <li>
                                <div class="info-box"><span class="info-icon"><i class="fa fa-map-marker">&nbsp;</i></span>
                                    <div class="info-box-content">
                                        <?php if ( saifway_theme_options('head_area') ) { ?>
                                            <p class="info-box-title"><?php echo esc_attr(saifway_theme_options('head_area'));?></p>
                                        <?php }?> 
                                        <?php if ( saifway_theme_options('head_address') ) { ?>
                                            <p class="info-box-subtitle"><?php echo esc_attr(saifway_theme_options('head_address'));?></p>
                                        <?php }?> 
                                    </div>
                                </div>
                            </li>
                        <?php }?> 

                        <?php if ( saifway_theme_options('head_contact') || saifway_theme_options('head_email') ) { ?>
                            <li>
                                <div class="info-box"><span class="info-icon"><i class="fa fa-phone">&nbsp;</i></span>
                                    <div class="info-box-content">
                                        <?php if ( saifway_theme_options('head_contact') ) { ?>
                                            <p class="info-box-title"><?php echo esc_attr(saifway_theme_options('head_contact'));?></p>
                                        <?php }?> 
                                        <?php if ( saifway_theme_options('head_email') ) { ?>
                                            <p class="info-box-subtitle"><?php echo saifway_theme_options('head_email');?></p>
                                        <?php }?> 
                                    </div>
                                </div>
                            </li>
                        <?php }?> 

                        <?php if ( saifway_theme_options('head_time') || saifway_theme_options('head_day') ) { ?>
                            <li>
                                <div class="info-box"><span class="info-icon"><i class="fa fa-compass">&nbsp;</i></span>
                                    <div class="info-box-content">
                                        <?php if ( saifway_theme_options('head_time') ) { ?>
                                            <p class="info-box-title"><?php echo esc_attr(saifway_theme_options('head_time'));?></p>
                                        <?php }?>
                                        <?php if ( saifway_theme_options('head_day') ) { ?>
                                            <p class="info-box-subtitle"><?php echo esc_attr(saifway_theme_options('head_day'));?></p>
                                        <?php }?>
                                    </div>
                                </div>
                            </li>
                        <?php }?> 
                    </ul>
                </div><!-- header-right end -->
                <?php }?> 
            </div> <!-- .row --> 
        </div> <!-- .container --> 
    </header> <!-- .site-header -->    
    <nav class="site-navigation navigation"> 
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php get_template_part( 'includes/main-nav' ); ?>  
                </div> 
            </div> 
        </div> 
    </nav> 
    <?php   
    }
}

// header 2
if ( ! function_exists( 'saifway_header_layout2' ) ) {
    function saifway_header_layout2(){ 
    global $saifway_theme_options;
    ?>
    <header class="site-header header-variation2">  
        <div class="container"> 
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <div class="header-offcanvas hidden-lg hidden-md hidden-sm">
                    <a id="header-trigger" class="trigger" href="#">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </a>
                </div> <!-- .offcanvas tigger -->
            <?php endif; ?>
            <div class="row">
                <div class="logo col-xs-12 col-sm-3">
                    <div class="site-logo">    
                        <?php get_template_part( 'includes/logo' ); ?> 
                    </div><!-- end row -->    
                </div> <!-- .logo -->

                <?php if ( saifway_theme_options('head_area') || saifway_theme_options('head_address') || saifway_theme_options('head_contact') || saifway_theme_options('head_email') || saifway_theme_options('head_time') || saifway_theme_options('head_day') ) { ?>
                <div class="col-xs-12 col-sm-7 header-right">
                    <ul class="top-info">
                        <?php if ( saifway_theme_options('head_area') || saifway_theme_options('head_address') ) { ?>
                            <li>
                                <div class="info-box"><span class="info-icon"><i class="fa fa-map-marker">&nbsp;</i></span>
                                    <div class="info-box-content">
                                        <?php if ( saifway_theme_options('head_area') ) { ?>
                                            <p class="info-box-title"><?php echo esc_attr(saifway_theme_options('head_area'));?></p>
                                        <?php }?> 
                                        <?php if ( saifway_theme_options('head_address') ) { ?>
                                            <p class="info-box-subtitle"><?php echo esc_attr(saifway_theme_options('head_address'));?></p>
                                        <?php }?> 
                                    </div>
                                </div>
                            </li>
                        <?php }?> 

                        <?php if ( saifway_theme_options('head_contact') || saifway_theme_options('head_email') ) { ?>
                            <li>
                                <div class="info-box"><span class="info-icon"><i class="fa fa-phone">&nbsp;</i></span>
                                    <div class="info-box-content">
                                        <?php if ( saifway_theme_options('head_contact') ) { ?>
                                            <p class="info-box-title"><?php echo esc_attr(saifway_theme_options('head_contact'));?></p>
                                        <?php }?> 
                                        <?php if ( saifway_theme_options('head_email') ) { ?>
                                            <p class="info-box-subtitle"><?php echo saifway_theme_options('head_email');?></p>
                                        <?php }?> 
                                    </div>
                                </div>
                            </li>
                        <?php }?> 

                        <?php if ( saifway_theme_options('head_time') || saifway_theme_options('head_day') ) { ?>
                            <li>
                                <div class="info-box"><span class="info-icon"><i class="fa fa-compass">&nbsp;</i></span>
                                    <div class="info-box-content">
                                        <?php if ( saifway_theme_options('head_time') ) { ?>
                                            <p class="info-box-title"><?php echo esc_attr(saifway_theme_options('head_time'));?></p>
                                        <?php }?>
                                        <?php if ( saifway_theme_options('head_day') ) { ?>
                                            <p class="info-box-subtitle"><?php echo esc_attr(saifway_theme_options('head_day'));?></p>
                                        <?php }?>
                                    </div>
                                </div>
                            </li>
                        <?php }?> 
                    </ul>
                </div><!-- header-right end -->
                <?php }?> 
            </div> <!-- .row --> 
        </div> <!-- .container --> 
    </header> <!-- .site-header -->
    <nav class="site-navigation navigation headernav-variation2"> 
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php get_template_part( 'includes/main-nav' ); ?>  
                </div> 
            </div> 
        </div> 
    </nav>   
    <?php  
    }
}

// Header 3 
if ( ! function_exists( 'saifway_header_layout3' ) ) {
    function saifway_header_layout3(){ 
    ?>
    <header class="site-header header-white header-variation3">  
        <div class="container"> 
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <div class="header-offcanvas hidden-lg hidden-md hidden-sm">
                    <a id="header-trigger" class="trigger" href="#">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </a>
                </div> <!-- .offcanvas tigger -->
            <?php endif; ?>
            <div class="row">
                <div class="site-header-common">         
                    <div class="navbar-header">
                        <div class="site-logo">    
                            <?php get_template_part( 'includes/logo' ); ?> 
                        </div><!-- end row -->    
                    </div> <!-- .col-sm-4 -->   
                    <?php get_template_part( 'includes/main-nav' ); ?>         
                </div> <!-- .row --> 
            </div> <!-- .row --> 
        </div> <!-- .container --> 
    </header> <!-- .site-header --> 
    <?php    
    }
}
