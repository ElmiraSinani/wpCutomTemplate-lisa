<?php 
/*
Template Name: The Process
*/



$args =  array ( 'post_type' => 'process', 'order' => 'ASC', 'posts_per_page' => 7 );
// The Query
$the_query = new WP_Query( $args );
$i = 0;


?>
<!--<div class="the_pr_left">-->
<div class="the_process_container">
    <div class="the_process_content">
        <?php 
        
        if ( $the_query->have_posts() ) {   
       
	while ( $the_query->have_posts() ) {
                $the_query->the_post();
        ?> 
        <?php if ( $i == 0 ): ?>
            <div class="the_pr_left">  
        <?php endif; ?>  
        <?php if ( $i == 3 ): ?>
            </div>
            <div class="the_pr_right">    
        <?php endif; ?> 
        <div class="the_pr_item">
            <h1><?php echo get_the_title(); ?></h1>
             <?php the_content(); ?>  
        </div>
        
    <?php 
        $i++;  
        }
    ?>
            </div>       
    <?php
    }

    /* Restore original Post Data */
    wp_reset_postdata();
?>
    </div>
</div>