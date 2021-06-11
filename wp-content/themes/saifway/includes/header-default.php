
<?php if ( saifway_theme_options('topbar_layout_en') ){
    get_template_part( 'includes/topbar-default' ); 
}?> 

<?php 
    $headerlayout = '';
    
    if ( isset( $_REQUEST['thl'] ) ) {
        $headerlayout = esc_attr(sanitize_text_field( $_REQUEST['thl'] ));
    }else {
        $headerlayout = esc_attr(saifway_theme_options('header_layout'));
    }

    switch ($headerlayout) {
        case 'headdefault':
            saifway_header_layout1();
        break;

        case 'headlayout2':
            saifway_header_layout2();
        break;              

        case 'headlayout3':
            saifway_header_layout3();
        break;              
        default:
            saifway_header_layout1();
        break;
    }
?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
<div class="thw-offcanvas hidden-lg hidden-md hidden-sm"> 
    <div class="nano">
        <div class="nano-content">
            <div class="thw-offcanvas-in">
                <nav id="site-navigation" class="main-navigation offcanvas-menu">
                <?php wp_nav_menu(
                    array(
                        'menu_class'     => 'off-canvas-list',
                        'theme_location' => 'primary',
                    )
                ); ?>
                </nav><!-- .main-navigation -->
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

