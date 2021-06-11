<?php
global $saifway_options;
?>
<div class="site-navigation-inner">
	<!-- The WordPress Menu goes here -->
	<?php wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
			'menu_class' => 'nav navbar-nav main-menu',
			'fallback_cb' => '',
			'menu_id' => 'main-menu',
		)
	); ?>
</div><!-- .navbar -->

	