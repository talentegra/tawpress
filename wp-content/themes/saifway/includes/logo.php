<div class="logo-header-inner">
	<div>
		<?php if ( saifway_theme_options('logo_type') ){

			$logo= esc_attr( saifway_theme_options('logo_type'));

		    switch ($logo) {

		        case 'logo_image':

		        if (saifway_theme_options_url('logo_img','url'))
		        	{ ?>

		        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img class="entry-logo img-responsive" src="<?php echo saifway_theme_options_url('logo_img','url'); ?>" alt="<?php esc_html_e('logo', 'saifway'); ?>" title="<?php esc_html_e('logo', 'saifway'); ?>"></a>
		        
			        <?php } else { ?>

						<div class="logo-branding">
						   <h2 class="logo-text"><a  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
							<h4 class="logo-slogan"><?php esc_attr(bloginfo( 'description' )); ?></h4>
						</div>

			        <?php }

		            break;

		        case 'logo_name':

		        	if ( saifway_theme_options('logo_text') || saifway_theme_options('logo_slogan') ) { ?>

						<div class="logo-branding">
						   <h2 class="logo-text"><a  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo sanitize_text_field($saifway_options['logo_text']) ?></a></h2>
							<h4 class="logo-slogan"><?php echo esc_attr(bestblog_theme_options('logo_slogan')); ?></h4>
						</div>

		        	<?php }else { ?>

						<div class="logo-branding">
						   <h2 class="logo-text"><a  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
							<h4 class="logo-slogan"><?php esc_attr(bloginfo( 'description' )); ?></h4>
						</div>

		        	<?php }

		            break;

		        default:
		        	 ?>
						<div class="logo-branding">
						   <h2 class="logo-text"><a  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
							<h4 class="logo-slogan"><?php esc_attr(bloginfo( 'description' )); ?></h4>
						</div>
		        	<?php
		            break;
		    }

			}else { ?>

				<div class="logo-branding">
				   <h2 class="logo-text"><a  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
					<h4 class="logo-slogan"><?php esc_attr(bloginfo( 'description' )); ?></h4>
				</div>
		<?php } ?>
	</div>
</div>




