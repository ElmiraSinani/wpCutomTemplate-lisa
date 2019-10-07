<?php 

/* Template Name: Close Up Page */ 

//$args = array( 'category_name' => 'about','posts_per_page'=>'3' );
$args =  array ( 'post_type' => 'closeup', 'order' => 'ASC', 'posts_per_page' => 2 );
// The Query
$the_query = new WP_Query( $args );

// The Loop
?>
<div class="close_up_container">
<?php
    if ( $the_query->have_posts() ) {       
	
	while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $postID = $the_query->post->ID;
                $subTitle = get_post_meta($postID, 'about-sub-title', true);   
                $img = get_the_post_thumbnail( $postID );
                //var_dump($postID);
                
        ?>
        <div class="close_up_post">
            <div class="video_pic">
                <?php echo get_the_post_thumbnail($postID); ?>
                <div class="video_icon" ></div> 
            </div>
            
            <div class='custom_player' >                    
                <?php the_content(); ?>
            </div>
            
            <div class="close_up_content">
                <div class='about_title'>
                    <?php echo get_the_title(); ?>
                </div>
                <div class="about_sub_title">   
                    <div class="line_sub"></div>
                    <?php echo $subTitle; ?>
                </div>
            </div>
        </div>
	<?php }
	
} else {
	// no posts found
}

/* Restore original Post Data */
wp_reset_postdata();
?>
</div


