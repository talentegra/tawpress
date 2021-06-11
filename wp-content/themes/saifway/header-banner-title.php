<?php 
    $html = ''; 
    $sub_img = array();
    global $post;
    if(!function_exists('saifway_banner_background')){
        function saifway_banner_background(){
            if( saifway_theme_options_url('blog_banner','url')){
                $html = 'style="background-image:url('.esc_url( saifway_theme_options_url('blog_banner','url')).');background-size: cover;background-position: 50% 50%;"';
                return $html;
            }else{
                if( saifway_theme_options('subtitlebg_color') ){
                    $html = 'style="background-color:'.esc_attr(saifway_theme_options('subtitlebg_color')).';"';
                    return $html;
                }else{
                    $html = 'style="background-color:#444;"';
                    return $html;
                }
            }
        }
    }
    
    if( isset($post->post_name) ){
        if(!empty($post->ID)){
            if(function_exists('rwmb_meta')){
                $image_attached = esc_attr(get_post_meta( $post->ID , 'thw_bannerbg_img', true ));
                if(!empty($image_attached)){
                    $sub_img = wp_get_attachment_image_src( $image_attached , 'blog-full'); 
                    $html = 'style="background-image:url('.esc_url($sub_img[0]).');background-size: cover;background-position: 50% 50%;"';
                    if(empty($sub_img[0])){
                        $html = 'style="background-color:'.esc_attr(get_post_meta( $post->ID ,"thw_bannerbg_color",true)).';"';
                        if(rwmb_meta("thw_bannerbg_color") == ''){
                            $html = saifway_banner_background();
                        }
                    }
                }else{
                    if(rwmb_meta("thw_bannerbg_color") != "" ){
                        $html = 'style="background-color:'.esc_attr(get_post_meta( $post->ID ,"thw_bannerbg_color",true)).';"';
                    }else{
                        $html = saifway_banner_background();
                    }
                }
            }else{
                $html = saifway_banner_background();
            } 
        }else{
            $html = saifway_banner_background();
        }
    }else{
        $html = saifway_banner_background();
    }

?>
<?php if (!is_front_page()) { ?>
<div id="banner-area" class="banner-area" <?php echo wp_kses_post($html);?>>
    <div class="banner-text text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php 
                    global $wp_query; 

                    if(isset($wp_query->queried_object->name)){
                        if($wp_query->queried_object->name != ''){
                            echo '<div class="banner-heading"><h2 class="banner-title">'.$wp_query->queried_object->name.'</h2></div>';    
                        }else{
                            echo '<div class="banner-heading"><h2 class="banner-title">'.get_the_title().'</h2></div>';
                        }
                    }else{
                        if( is_search() ){
                            $first_char = __('Search','saifway');
                            echo '<div class="banner-heading"><h2 class="banner-title">'.esc_attr($first_char).'</h2></div>';
                        }else{
                            echo '<div class="banner-heading"><h2 class="banner-title">'.get_the_title().'</h2></div>';
                        }
                    }
                    ?>
                    <?php saifway_breadcrumb(); ?>
                </div>
            </div>
        </div>
    </div><!--/.banner-text-->
</div><!--/.banner-area-->
<?php } ?>