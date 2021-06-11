<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Saifway
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-blog">
		<?php if ( has_post_thumbnail() && ! post_password_required() ) { ?>
            <header class="entry-header">
                <?php if ( has_post_thumbnail() && ! post_password_required() ) { ?>
                <div class="featured-image">
                    <a href="<?php  esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-full-size', array('class' => 'img-responsive')); } ?></a>
                </div>
            </header>
        <?php } //.entry-thumbnail ?>  
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'saifway' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .entry-blog -->
</article><!-- #post-## -->



