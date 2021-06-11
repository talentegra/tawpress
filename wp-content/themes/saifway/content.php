<?php
/**
 * @package Saifway
 */

global $saifway_options; 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-layout'); ?>>
    <?php get_template_part( 'includes/entry-blog' ); ?>
</article><!-- #post-## -->

