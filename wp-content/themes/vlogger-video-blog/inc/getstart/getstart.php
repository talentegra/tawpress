<?php
//about theme info
add_action( 'admin_menu', 'vlogger_video_blog_gettingstarted' );
function vlogger_video_blog_gettingstarted() {    	
	add_theme_page( esc_html__('About Vlogger Video Blog', 'vlogger-video-blog'), esc_html__('About Vlogger Video Blog', 'vlogger-video-blog'), 'edit_theme_options', 'vlogger_video_blog_guide', 'vlogger_video_blog_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vlogger_video_blog_admin_theme_style() {
   wp_enqueue_style('vlogger-video-blog-custom-admin-style', get_theme_file_uri() . '/inc/getstart/getstart.css');
   wp_enqueue_script('vlogger-video-blog-tabs', get_theme_file_uri() . '/inc/getstart/js/tab.js');
   wp_enqueue_style( 'font-awesome-css', esc_url(get_theme_file_uri()).'/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'vlogger_video_blog_admin_theme_style');

//guidline for about theme
function vlogger_video_blog_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vlogger-video-blog' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Vlogger Video Blog Theme', 'vlogger-video-blog' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vlogger-video-blog'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Vlogger Video Blog at 20% Discount','vlogger-video-blog'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vlogger-video-blog'); ?> ( <span><?php esc_html_e('vwpro20','vlogger-video-blog'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VLOGGER_VIDEO_BLOG_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vlogger-video-blog' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
		  	<button class="tablinks" onclick="vlogger_video_blog_open_tab(event, 'theme_lite')"><?php esc_html_e( 'Setup With Customizer', 'vlogger-video-blog' ); ?></button>		  
		  	<button class="tablinks" onclick="vlogger_video_blog_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vlogger-video-blog' ); ?></button>
		  	<button class="tablinks" onclick="vlogger_video_blog_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vlogger-video-blog' ); ?></button>
		</div>

		<!-- Tab content -->
		<div id="theme_lite" class="tabcontent open">
			<h3><?php esc_html_e( 'Lite Theme Information', 'vlogger-video-blog' ); ?></h3>
			<hr class="h3hr">
		  	<p><?php esc_html_e('With free WordPress video theme, you create a good video website for business. You can display the video content and this is WooCommerce compatible irrespective of being free. You can open the online video business. It is accompanied with more than one hundred font family options and it also has advanced colour options. Free WordPress theme for video has the customizable homepage and is known for its responsive design. It has favicon, logo, title and tagline customization and also plugin library. You can make the video sharing website like you-tube and it also has enable disable options on all sections. Free WP video theme is translation ready. You can easily access the website in multiple languages. This free WP theme has full width template and is also good for movie promotion site or the online portal related to news. It is also accompanied with advanced slider with multiple effects and control options.','vlogger-video-blog'); ?></p>
		  	<div class="col-left-inner">
		  		<h4><?php esc_html_e( 'Theme Documentation', 'vlogger-video-blog' ); ?></h4>
				<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vlogger-video-blog' ); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VLOGGER_VIDEO_BLOG_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vlogger-video-blog' ); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Theme Customizer', 'vlogger-video-blog'); ?></h4>
				<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vlogger-video-blog'); ?></p>
				<div class="info-link">
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vlogger-video-blog'); ?></a>
				</div>
				<hr>				
				<h4><?php esc_html_e('Having Trouble, Need Support?', 'vlogger-video-blog'); ?></h4>
				<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vlogger-video-blog'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VLOGGER_VIDEO_BLOG_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vlogger-video-blog'); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Reviews & Testimonials', 'vlogger-video-blog'); ?></h4>
				<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vlogger-video-blog'); ?>  </p>
				<div class="info-link">
					<a href="<?php echo esc_url( VLOGGER_VIDEO_BLOG_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vlogger-video-blog'); ?></a>
				</div>
		  		<div class="link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'vlogger-video-blog' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vlogger-video-blog'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_category_section') ); ?>" target="_blank"><?php esc_html_e('Category Section','vlogger-video-blog'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vlogger-video-blog'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_footer_section') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vlogger-video-blog'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vlogger-video-blog'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vlogger-video-blog'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vlogger-video-blog'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vlogger-video-blog'); ?></a>
							</div> 
						</div>

					</div>
				</div>
		  	</div>
			<div class="col-right-inner">
				<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vlogger-video-blog'); ?></h3>
			  	<hr class="h3hr">
				<p><?php esc_html_e('Follow these instructions to setup Home page.','vlogger-video-blog'); ?></p>
                <ul>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vlogger-video-blog'); ?></span><?php esc_html_e(' Go to ','vlogger-video-blog'); ?>
				  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vlogger-video-blog'); ?></b></p>

                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vlogger-video-blog'); ?></p>
                  	<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vlogger-video-blog'); ?></span><?php esc_html_e(' Go to ','vlogger-video-blog'); ?>
				  	<b><?php esc_html_e(' Settings >> Reading ','vlogger-video-blog'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vlogger-video-blog'); ?></p>
                  	<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vlogger-video-blog'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vlogger-video-blog/" target="_blank"><?php esc_html_e('Documentation','vlogger-video-blog'); ?></a></p>
                </ul>
		  	</div>
		</div>	

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vlogger-video-blog' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('WordPress video theme is of the premium level and is good for opening up the video related business website or a media website in which small videos play a major role. It is not only classy but also a clean theme for sports websites and has footer customization options apart from responsive layouts on all devices. Since it is premium, it SEO friendly with pagination options and has not only elegant light colours but also provides an intuitive experience. Video WordPress theme permits setting of title, tagline as well as logo and not only has the advanced colour options but colour pallets as well. With this, you can put video portfolio in spot light and it has footer customization options and is also compatible with contact form 7. It is not only beautiful but flexible and has the global colour option as well as the single click demo importer. It is WooCommerce ready.','vlogger-video-blog'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VLOGGER_VIDEO_BLOG_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vlogger-video-blog'); ?></a>
					<a href="<?php echo esc_url( VLOGGER_VIDEO_BLOG_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'vlogger-video-blog'); ?></a>
					<a href="<?php echo esc_url( VLOGGER_VIDEO_BLOG_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vlogger-video-blog'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vlogger-video-blog' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vlogger-video-blog'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vlogger-video-blog'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vlogger-video-blog'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vlogger-video-blog'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vlogger-video-blog'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vlogger-video-blog'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vlogger-video-blog'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vlogger-video-blog'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vlogger-video-blog'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vlogger-video-blog'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vlogger-video-blog'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vlogger-video-blog'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vlogger-video-blog'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VLOGGER_VIDEO_BLOG_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vlogger-video-blog'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vlogger-video-blog'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vlogger-video-blog'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VLOGGER_VIDEO_BLOG_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vlogger-video-blog'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vlogger-video-blog'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vlogger-video-blog'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VLOGGER_VIDEO_BLOG_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vlogger-video-blog'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vlogger-video-blog'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vlogger-video-blog'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VLOGGER_VIDEO_BLOG_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vlogger-video-blog'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vlogger-video-blog'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vlogger-video-blog'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VLOGGER_VIDEO_BLOG_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vlogger-video-blog'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vlogger-video-blog'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vlogger-video-blog'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VLOGGER_VIDEO_BLOG_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vlogger-video-blog'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>