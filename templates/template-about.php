<?php 

/* Template Name: About Page */ 


//$args = array( 'category_name' => 'about','posts_per_page'=>'3' );
$args =  array ( 'post_type' => 'about', 'order' => 'ASC', 'posts_per_page' => 3 );
// The Query
$the_query = new WP_Query( $args );

// The Loop
?>
<div class="about_container">
<?php
    if ( $the_query->have_posts() ) {       
	
	while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $postID = $the_query->post->ID;
                $subTitle = get_post_meta($postID, 'about-sub-title', true);   
                //$img = get_the_post_thumbnail( $postID );
                //var_dump($postID);
                
        ?>
        <div class="about_post">
            <?php echo get_the_post_thumbnail($postID); ?>
            <div class="about_content">
                <div class='about_title'>
                    <?php echo get_the_title(); ?>
                </div>
                <div class="about_sub_title">   
                    <div class="line_sub"></div>
                    <?php echo $subTitle; ?>
                </div>
            </div>
            <div class="about_post_content" style="display: none">
                <?php the_content(); ?>
            </div>
        </div>
	<?php }
	
} else {
	// no posts found
}

/* Restore original Post Data */
wp_reset_postdata();
?>
</div>



