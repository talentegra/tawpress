<?php 

global $blogon_options;

// footer 1
if ( ! function_exists( 'blogon_footer1' ) ) {
    function blogon_footer1(){ ?>
        <?php if ( is_active_sidebar( 'footer1' ) ) : ?>
            <div id="footer" class="footer">
                <div class="container">
                    <div class="footer-inner">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 footer-widget">
                                    <?php dynamic_sidebar('footer1'); ?>                
                            </div> <!-- /.footer 1 -->
                        </div><!-- row end -->
                    </div><!-- Container end -->
                </div><!-- Container end -->
            </div><!--/.footer-area -->
        <?php endif;    
    }
}

// footer 2
if ( ! function_exists( 'blogon_footer2' ) ) {
    function blogon_footer2(){ ?>
        <?php if ( is_active_sidebar( 'footer1' ) || is_active_sidebar( 'footer2' ) ) : ?>
            <div id="footer" class="footer">
                <div class="container">
                    <div class="footer-inner">
                        <div class="row">
                            <?php if (is_active_sidebar( 'footer1' ) ) : ?>
                                <div class="col-md-6 col-sm-6 footer-widget">
                                    <?php dynamic_sidebar('footer1'); ?>           
                                </div> <!-- /.footer 1 -->
                            <?php endif; ?>       
                            <?php if (is_active_sidebar( 'footer2' ) ) : ?>
                                <div class="col-md-6 col-sm-6 footer-widget">
                                    <?php dynamic_sidebar('footer2'); ?>
                                </div> <!-- /.footer 2 -->
                            <?php endif; ?>     

                        </div><!-- row end -->
                    </div><!-- Container end -->
                </div><!-- Container end -->
            </div><!--/.footer-area -->
        <?php endif;    
    }
}

// footer 3
if ( ! function_exists( 'blogon_footer3' ) ) {
    function blogon_footer3(){ ?>
        <?php if ( is_active_sidebar( 'footer1' ) || is_active_sidebar( 'footer2' ) || is_active_sidebar( 'footer3' ) ) : ?>
            <div id="footer" class="footer">
                <div class="container">
                    <div class="footer-inner">
                        <div class="row">
                            <?php if (is_active_sidebar( 'footer1' ) ) : ?>
                                <div class="col-md-4 col-sm-12 footer-widget">
                                    <?php dynamic_sidebar('footer1'); ?>               
                                </div> <!-- /.footer 1 -->
                            <?php endif; ?>      
                            <?php if (is_active_sidebar( 'footer2' ) ) : ?>
                                <div class="col-md-4 col-sm-6 footer-widget">
                                    <?php dynamic_sidebar('footer2'); ?>
                                </div> <!-- /.footer 2 -->
                            <?php endif; ?> 
                            <?php if (is_active_sidebar( 'footer3' ) ) : ?>
                                <div class="col-md-4 col-sm-12 footer-widget footer-about-info">
                                    <?php dynamic_sidebar('footer3'); ?>
                                </div> <!-- /.footer 3 -->
                            <?php endif; ?>     
                        </div><!-- row end -->
                    </div><!-- Container end -->
                </div><!-- Container end -->
            </div><!--/.footer-area -->
        <?php endif;    
    }
}

// footer 4
if ( ! function_exists( 'blogon_footer4' ) ) {
    function blogon_footer4(){ ?>
        <?php if ( is_active_sidebar( 'footer1' ) || is_active_sidebar( 'footer2' ) || is_active_sidebar( 'footer3' ) || is_active_sidebar( 'footer4' ) ) : ?>
            <div id="footer" class="footer">
                <div class="container">
                    <div class="footer-inner">
                        <div class="row">
                            <?php if (is_active_sidebar( 'footer1' ) ) : ?>
                                <div class="col-md-3 col-sm-6 footer-widget">
                                    <?php dynamic_sidebar('footer1'); ?>             
                                </div> <!-- /.footer 1 -->
                            <?php endif; ?>   
                            <?php if (is_active_sidebar( 'footer2' ) ) : ?>
                                <div class="col-md-3 col-sm-6 footer-widget">
                                    <?php dynamic_sidebar('footer2'); ?>
                                </div> <!-- /.footer 2 -->
                            <?php endif; ?>     
                            <?php if (is_active_sidebar( 'footer3' ) ) : ?>
                                <div class="col-md-3 col-sm-6 footer-widget">
                                    <?php dynamic_sidebar('footer3'); ?>
                                </div> <!-- /.footer 3 -->
                            <?php endif; ?>    
                            <?php if (is_active_sidebar( 'footer4' ) ) : ?>
                                <div class="col-md-3 col-sm-6 footer-widget">
                                    <?php dynamic_sidebar('footer4'); ?>
                                </div> <!-- /.footer 4 -->
                            <?php endif; ?>     
                        </div><!-- row end -->
                    </div><!-- Container end -->
                </div><!-- Container end -->
            </div><!--/.footer-area -->
        <?php endif;    
    }
}