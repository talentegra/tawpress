<?php 
/* Template Name: Homepage */ 

get_header(); ?>

<div class="home-main-content clearfix">
	<div class="container">
		<div class="in-main-content">
			<div class="row">
				<div id="post-<?php the_ID(); ?>"  class="col-sm-12">
				    <?php while ( have_posts() ): the_post(); ?>
				        <div class="home-entry-content">
				            <?php the_content(); ?>
				        </div>
				    <?php endwhile; ?>
		    	</div>
		    </div><!--/.row-->	

<?php get_footer(); ?>
