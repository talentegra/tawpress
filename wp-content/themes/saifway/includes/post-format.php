<?php if(has_post_format('audio')) : ?>
        <header class="entry-header">
            <?php if ( has_post_thumbnail() ) { ?>
            <div class="featured-image">
             <?php if (is_page_template('page-blog-fullwidth.php')) { ?>
                <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-full-size', array('class' => 'img-responsive')); ?></a>
            <?php } else { ?>
                <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-medium-size', array('class' => 'img-responsive')); ?></a>
            <?php } ?>               
            </div>
            <?php } ?>
            <?php if(function_exists('rwmb_meta')){ ?>
                <div class="entry-audio">
                    <?php echo esc_attr(rwmb_meta( 'thw_postaudio' )); ?>
                </div> <!--/.audio-content -->
            <?php } ?>
        </header>            

<?php elseif(has_post_format('link')) : ?> 

    <?php if ( has_post_thumbnail() ) { 
        if (is_page_template('page-blog-fullwidth.php')) { 
            $image= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'saifway-full-size' );
        } else {
           $image= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'saifway-medium-size' ); 
        }
        $style = 'background-image:url('.$image[0].');background-repeat:no-repeat;background-size: cover;width:100%;height:100%;';
    }else {
        $style = 'background-color:#333;';
    }
    if(function_exists('rwmb_meta')){
    $link = esc_url(rwmb_meta( 'thw_postlink' ));
    } else {
       $link = ''; 
    }
    ?>   
    <header class="entry-header">
        <div class="entry-image">
            <a href="<?php echo esc_url( $link ); ?>" target="_blank">
                <div class="entry-overlay">
                    <div style="<?php echo wp_kses_post($style); ?>"></div>
                </div>
                <?php if(function_exists('rwmb_meta')){ ?>
                    <div class="quote-link">
                        <h4><?php echo esc_url( rwmb_meta( 'thw_postlink' ) ); ?></h4>
                    </div>
                <?php } ?>

            </a>
        </div>
    </header>

 <?php elseif(has_post_format('quote')) : ?> 

    <?php if ( has_post_thumbnail() ) { 
        if (is_page_template('page-blog-fullwidth.php')) { 
            $image= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'saifway-full-size' );
        } else {
           $image= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'saifway-medium-size' ); 
        }
        $style = 'background-image:url('.$image[0].');background-repeat:no-repeat;background-size: cover;width:100%;height:100%;';
    }else {
        $style = 'background-color:#333;';
    }
    ?>    
    <header class="entry-header">

        <div class="entry-qoute">
             <div class="entry-image">
                <div class="entry-overlay">
                    <div style="<?php echo wp_kses_post($style); ?>"></div>
                </div>
                <?php if(function_exists('rwmb_meta')){ ?>
                    <div class="quote-link">
                        <p><i class="fa fa-quote-left"></i> <?php echo rwmb_meta( 'thw_postquoteintro' ); ?> <i class="fa fa-quote-right"></i></p>
                        <span> <?php echo esc_html( rwmb_meta( 'thw_postquoteauthor' ) ); ?></span>
                    </div>
                <?php } ?>
            </div>
        </div> 
    </header>


<?php elseif(has_post_format('video')) : ?>
        <header class="entry-header">
            <?php if ( has_post_thumbnail()) { ?>
                <div class="featured-image">
                 <?php if (is_page_template('page-blog-fullwidth.php')) { ?>
                    <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-full-size', array('class' => 'img-responsive')); ?></a>
                <?php } else { ?>
                    <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-medium-size', array('class' => 'img-responsive')); ?></a>
                <?php } ?>
                </div>
            <?php } ?>

            <?php if(function_exists('rwmb_meta')){ ?>
                <div class="entry-video">
                    <?php $video_type = esc_html( rwmb_meta( 'thw_video_type' ) ); ?>
                    <?php $video = esc_html( rwmb_meta( 'thw_postvideo' ) ); ?>

                    <?php if ($video_type == 1): ?>
                        <?php echo '<iframe height="415" src="http://www.youtube.com/embed/'.$video.'?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;hd=1&amp;autohide=1&amp;color=white" allowfullscreen></iframe>'; ?>
                    <?php elseif ($video_type == 2): ?>
                        <?php echo '<iframe src="http://player.vimeo.com/video/'.$video.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" height="415" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'; ?>
                    <?php endif; ?>
                </div> 
            <?php } ?>
        </header>
        
<?php elseif(has_post_format('gallery')) : ?>   
    <header class="entry-header">
        <div class="featured-image">
         <?php if (is_page_template('page-blog-fullwidth.php')) { ?>
            <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-full-size', array('class' => 'img-responsive')); ?></a>
        <?php } else { ?>
            <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-medium-size', array('class' => 'img-responsive')); ?></a>
        <?php } ?>
        </div>

        <?php if(function_exists('rwmb_meta')){ ?>
            <div class="entry-content-gallery">
                <?php $gal_images = rwmb_meta('thw_postgallery','type=image_advanced'); ?>
                <?php if(count($gal_images) > 0) { ?>
                <div id="blog-gallery-slider<?php echo get_the_ID(); ?>" class="carousel slide blog-gallery-slider">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php $gal_img = 1; ?>
                        <?php foreach( $gal_images as $gal_image ) { ?>
                        <div class="item <?php if($gal_img == 1) echo 'active'; ?>">
                        <?php if (is_page_template('page-blog-fullwidth.php')) { ?>
                            <?php $images = wp_get_attachment_image_src( $gal_image['ID'], 'saifway-full-size' ); ?>
                        <?php } else { ?>
                            <?php $images = wp_get_attachment_image_src( $gal_image['ID'], 'saifway-medium-size' ); ?>
                        <?php } ?>
                            
                            <img class="img-responsive" src="<?php echo esc_url($images[0]); ?>" alt=" <?php echo esc_attr(the_title_attribute()); ?> ">
                        </div>
                        <?php $gal_img++ ?>
                        <?php } ?>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#blog-gallery-slider<?php echo get_the_ID(); ?>" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right carousel-control" href="#blog-gallery-slider<?php echo get_the_ID(); ?>" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                <?php } ?>
            </div><!--/.gallery-->  
        <?php } ?>
    </header>
   
<?php elseif(has_post_format('aside')) : ?>   

    <?php if ( has_post_thumbnail() ) { ?>
        <header class="entry-header">
            <div class="featured-image">
             <?php if (is_page_template('page-blog-fullwidth.php')) { ?>
                <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-full-size', array('class' => 'img-responsive')); ?></a>
            <?php } else { ?>
                <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-medium-size', array('class' => 'img-responsive')); ?></a>
            <?php } ?>
            </div>
        </header>
    <?php } //.entry-thumbnail ?>   

<?php elseif(has_post_format('image')) : ?>   

    <?php if ( has_post_thumbnail() ) { ?>
        <header class="entry-header">
            <div class="featured-image">
             <?php if (is_page_template('page-blog-fullwidth.php')) { ?>
                <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-full-size', array('class' => 'img-responsive')); ?></a>
            <?php } else { ?>
                <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-full-size', array('class' => 'img-responsive')); ?></a>
            <?php } ?>
            </div>
        </header>
    <?php } //.entry-thumbnail ?>    

<?php elseif(has_post_format('standard')) : ?>   

    <header class="entry-header">
        <?php if ( has_post_thumbnail() ) { ?>
        <div class="featured-image">
             <?php if (is_page_template('page-blog-fullwidth.php')) { ?>
                <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-full-size', array('class' => 'img-responsive')); ?></a>
            <?php } else { ?>
                <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-full-size', array('class' => 'img-responsive')); ?></a>
            <?php } ?>
        </div>
        <?php } ?>
    </header>
              
<?php else : ?> 

    <header class="entry-header">
        <?php if ( has_post_thumbnail()) { ?>
            <div class="featured-image">
             <?php if (is_page_template('page-blog-fullwidth.php')) { ?>
                <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-full-size', array('class' => 'img-responsive')); ?></a>
            <?php } else { ?>
                <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('saifway-full-size', array('class' => 'img-responsive')); ?></a>
            <?php } ?>               
            </div>
        <?php } ?>
    </header>
    
<?php endif;