<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package saifway
 */

get_header(); ?>
<?php get_template_part( 'header-banner-title' ); ?>
<div class="main-content">
	<div class="container">
		<div class="in-main-content">
			<div class="row">
				<div id="content" class="col-sm-12">	
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php get_template_part( 'content', 'page' ); ?>
						<?php comments_template(); ?>
					<?php endwhile; endif; ?>
				</div>
			</div><!--/.row-->

<?php get_footer(); ?>
