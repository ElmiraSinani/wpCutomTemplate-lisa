<?php 

/* Template Name: Press Page */ 

//$args = array( 'category_name' => 'about','posts_per_page'=>'3' );
$args =  array ( 'post_type' => 'press', 'order' => 'ASC', 'posts_per_page' => -1 );
// The Query
$the_query = new WP_Query( $args );
$i = 3;

// The Loop
?>
<div class="press_container">
<?php
    if ( $the_query->have_posts() ) {   
       
	while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $postID = $the_query->post->ID;
                $subTitle = get_post_meta($postID, 'about-sub-title', true);                    
                $videoUrl = get_post_meta($postID, 'video-url', true); 
                $thumbImg = get_the_post_thumbnail( $post_id, $size, $attr );
               
        ?>   
        <?php if( $i == 3): ?>
        <div class="row-press"> 
        <?php endif; $i++; ?>
            <div class="press_post">
                <div class="press_img">
                    <?php if(isset($videoUrl) && $videoUrl != "" ){ ?>
                    <div class="video">
                    <?php                        
                        $link = get_post_meta( $postID, 'video-url', true );
                        if($link):
                            $shortcode = "[embed]".$link."[/embed]";
                            global $wp_embed;
                            echo $wp_embed->run_shortcode($shortcode);
                        endif;                        
                    ?> 
                    </div>
                    
<!--                    <div class="press_video">
                       <div class="youtube_icon"></div>
                       <div class="thumb">
                           <?php echo get_the_post_thumbnail($postID); ?>
                       </div>
                       <div class="video">
                            <?php                        
                                $link = get_post_meta( $postID, 'video-url', true );
                                if($link):
                                    $shortcode = "[embed]".$link."[/embed]";
                                    global $wp_embed;
                                    echo $wp_embed->run_shortcode($shortcode);
                                endif;                        
                            ?> 
                       </div>                       
                    </div>-->
                    
                    <?php }else{  ?>
                         <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($postID); ?></a>
                   <?php }?>
                    
                </div>
                <div class='press_title'>
                    <?php echo get_the_title(); ?>
                </div>
                <div class="press_subtitle">
                    <?php echo $subTitle; ?>
                </div>
                <div class="press_subcontent">
                    <?php echo the_excerpt(); ?>
                </div>
                <div class="read_more">
                    <a href="<?php the_permalink(); ?>">Read More...</a>
                </div>
            </div>
        <?php if( $i==3){
          echo "</div>";  
         } elseif ($i%3 == 0){ ?>
        </div>
        <div class="row-press">  
         <?php } ?>
       
       <?php 
          
        }
        ?>

        <?php
    }

    /* Restore original Post Data */
    wp_reset_postdata();
?>
        </div>
</div>


