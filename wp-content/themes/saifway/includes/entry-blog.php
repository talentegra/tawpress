<div class="entry-blog">
    <?php get_template_part( 'includes/post-format' ); ?>
    <div class="blog-header"> 
        <?php if ( class_exists( 'ReduxFramework' ) ) { ?>
             <?php if ( saifway_theme_options('blog_date') ) { ?>
                 <span class="publish-date">
                    <i class="fa fa fa-clock-o"></i><time class="entry-date" datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php echo date_i18n( get_option( 'date_format' ), strtotime( get_the_date('c') ) )?></time>
                 </span> 
             <?php } ?>
        <?php } else {?>
             <span class="publish-date">
                <i class="fa fa fa-clock-o"></i><time class="entry-date" datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php echo date_i18n( get_option( 'date_format' ), strtotime( get_the_date('c') ) )?></time>
             </span>         
        <?php }?> 
        <h2 class="page-title">
            <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a>
            <?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
                <sup class="featured-post"><?php esc_html_e( 'Sticky', 'saifway' ) ?></sup>
            <?php } ?>
        </h2>  

        <?php if ( class_exists( 'ReduxFramework' ) ) { ?>
             <?php if ( saifway_theme_options('blog_author') ) { ?>
                 <?php if ( get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "" ) { ?>
                    <span class="meta-author"><?php esc_html_e('By','saifway');?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('first_name');?> <?php echo get_the_author_meta('last_name');?></a></span>
                 <?php } else { ?>
                    <span class="meta-author"> <?php esc_html_e('By','saifway');?> <?php the_author_posts_link() ?></span>
                <?php }?> 
            <?php }?> 
        <?php } else {?>
             <?php if ( get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "" ) { ?>
                <span class="meta-author"><?php esc_html_e('By','saifway');?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('first_name');?> <?php echo get_the_author_meta('last_name');?></a></span>
             <?php } else { ?>
                <span class="meta-author"> <?php esc_html_e('By','saifway');?> <?php the_author_posts_link() ?></span>
            <?php }?> 
        <?php }?> 

        <?php if ( class_exists( 'ReduxFramework' ) ) { ?>
        <?php if ( saifway_theme_options('blog_category') ) { ?>
            <?php if ( get_the_category_list(', ') ) { ?>
                <span class="layout1 meta-category"><span class="meta-category-inner"><?php echo  get_the_category_list(' '); ?></span></span>
            <?php }?>
        <?php } ?>  
        <?php } else { ?>
            <span class="layout1 meta-category"><span class="meta-category-inner"><?php echo  get_the_category_list(' '); ?></span></span>
        <?php }?>  

        <?php if ( class_exists( 'ReduxFramework' ) ) { ?>
            <?php if ( saifway_theme_options('blog_comment') ) {
                if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
                    <span class="entry-comment">
                        <?php comments_popup_link( '<span class="leave-reply">' . esc_html__( 'No comment', 'saifway' ) . '</span>', esc_html__( 'One comment', 'saifway' ), esc_html__( '% comments', 'saifway' ) ); ?>
                    </span>
                <?php endif;
            }?>   
        <?php } else {
            if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
                <span class="entry-comment">
                    <?php comments_popup_link( '<span class="leave-reply">' . esc_html__( 'No comment', 'saifway' ) . '</span>', esc_html__( 'One comment', 'saifway' ), esc_html__( '% comments', 'saifway' ) ); ?>
                </span>
            <?php endif;?>
        <?php }?> 
    </div><!-- .entry-header -->  
    
    <?php if ( is_single() ) : ?>
        <div class="entry-summary blog-entry-summary entry-content">
            <?php the_content(); ?>       
        </div><!-- .entry-summary -->
    <?php else : ?>
        <div class="entry-content blog-entry-summary">
            <?php 
            $continue_reading_en ='';
            $continue_reading = esc_html__('Continue Reading','saifway');
            
           
             
            if( saifway_theme_options('blog_continue_en') ) {
                
               if ( saifway_theme_options('blog_continue') ){
                    $continue_reading = saifway_theme_options('blog_continue');
                 }else {
                    $continue_reading = esc_html__('Continue Reading','saifway');
                 } 
                $continue_reading_en = '<span class="readmore-blog">'.$continue_reading.'</span>';
            } else {
                
                $continue_reading_en = '<span class="readmore-blog">'.esc_html__('Continue Reading','saifway').'</span>';
            }

            if ( saifway_theme_options('post_charlenght') ) {
                
                if ( saifway_theme_options('post_charlenght_limit') ) {
                   $post_charlenght_limit = saifway_theme_options('post_charlenght_limit');
                    echo saifway_excerpt_max_charlength( esc_attr($post_charlenght_limit) );
                } else {
                   echo saifway_excerpt_max_charlength(350); 
                }
                echo '<span class="fixed-char"><a class="readmore-blog" href="'.get_permalink().'">'.$continue_reading.'</a></span>';

            }  else {
             
               echo saifway_excerpt_max_charlength(220); 
               echo '<span class="fixed-char"><a class="readmore-blog" href="'.get_permalink().'">'.$continue_reading.'</a></span>';

            }?>
            <?php wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'saifway' ),
                'after'  => '</div>',
            ) ); ?>
        </div><!-- .entry-content -->
    <?php endif; ?>
    <?php if ( is_single() ) { ?>
        <?php if ( class_exists( 'ReduxFramework' ) ) { ?>    
            <?php if ( saifway_theme_options('blog_tag') ) { ?>
                <span class="entry-meta-tag">
                    <?php the_tags('', ' ', '<br />'); ?>
                </span> 
            <?php } ?>  
        <?php } else { ?>
            <span class="entry-meta-tag">
                <?php the_tags('', ' ', '<br />'); ?>
            </span>         
        <?php } ?>  
    <?php } ?>   
</div> <!--/.entry-blog --> 


  
