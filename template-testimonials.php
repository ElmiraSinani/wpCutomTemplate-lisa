<?php 
/*
Template Name: Testimonial
*/



$args =  array ( 'post_type' => 'testimonial', 'posts_per_page' => -1 );
// The Query
$the_query = new WP_Query( $args );


?>
<!--<div class="the_pr_left">-->
<div class="testimonial_container">
    <div class="testimonial_sl">
        <?php         
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                     $postID = $the_query->post->ID;
                     $subTitle = get_post_meta($postID, 'testimonial_sub_title', true);   
            ?>
                <div class="slide">
                    <div class="title"><?php echo get_the_title(); ?></div>
                    <div class="sub_title"><span><?php echo $subTitle; ?></span></div>
                    <div class="content"><?php the_content(); ?> </div>
                </div>
            <?php 
            }    
        }?>
        </div>
    

</div>