<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Saifway
 */
?>
			</div><!-- /.in-main-content -->	
		</div><!-- /.container -->	
	</div><!-- /.main-content or home-main-content -->
		<?php if ( is_active_sidebar( 'footertop' ) ) { ?>
			<section class="footer-top no-padding">
				<div class="container">
					<div class="footer-top-bg row">
						<?php dynamic_sidebar('footertop'); ?>  
					</div><!--/ Content row end -->
				</div><!--/ Container end -->
			</section><!--/ Footer top end -->
		<?php }?>

		<?php 
		if ( is_active_sidebar( 'footer1' ) || is_active_sidebar( 'footer2' ) || is_active_sidebar( 'footer3' ) || is_active_sidebar( 'footer4' ) ) :
			$ftlayout = '';
			if ( saifway_theme_options('footer_layout')  ){
				if ( isset( $_REQUEST['fl'] ) ) {
                 $ftlayout = esc_attr(sanitize_text_field($_REQUEST['fl']));
                
			    }else {
                 $ftlayout = esc_attr(saifway_theme_options('footer_layout'));
              
             }
            
			    switch ($ftlayout) {
			        case 'footerColumn1':
			        	blogon_footer1();
			        break;

			        case 'footerColumn2':
			        	blogon_footer2();
			        break;		        

			        case 'footerColumn3':
			        	blogon_footer3();
			        break;		        

			        case 'footerColumn4':
			        	blogon_footer4();
			        break;

			        default:
			        	blogon_footer3();
			        break;
			    }
			} else {
				blogon_footer3();
			}
		endif;  
		?>

		<?php if ( saifway_theme_options('copyright_en') ) { ?>
		<footer class="footer-bottom">
			<div class="container">
				<div class="row copyright">
					<?php if( saifway_theme_options('copyright_en')) { ?>
						<div class="col-sm-5">
							<?php if( saifway_theme_options('copyright_en') ) { ?>
								<div class="copyright-info">
									<?php  if( saifway_theme_options('copyright') )  echo wp_kses_post(balanceTags(saifway_theme_options('copyright'))); ?>
								</div><!-- close .site-info -->
							 <?php } ?>	
			        	</div>
			        <?php } ?>	
			        <?php if ( has_nav_menu( 'footermenu' ) ) : ?>
				        <div class="col-sm-6 col-md-push-1">	
							<div class="footer-menu ">
								<?php
									// footer Nav
									wp_nav_menu( array(
										'theme_location' => 'footermenu',
										'depth'          => 1,
										'menu_class' => 'nav footer-nav',
										'fallback_cb' => '',
									) );
								?>
							</div>
				        </div>
			        <?php endif; ?>
		        </div>
	        </div>
        </footer>
        <?php } ?> 

		<?php if ( saifway_theme_options('scroll_en') ) { ?>
			<div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix">
				<button class="btn btn-primary" title="<?php esc_html_e( 'Back to Top', 'saifway' ); ?>">
					<i class="fa fa-angle-double-up"></i>
				</button>
			</div>	
		<?php } ?>		    	
	</div><!--/.body-inner -->
	<?php wp_footer(); ?>
</body>
</html>