<?php 
/*
Template Name: Welcome Page
*/

$args = array( 'category_name' => 'welcome','posts_per_page'=>'1' );
// The Query
$the_query = new WP_Query( $args );

//print_r($the_query);
//$isFullBg = get_post_meta($page_data->ID, 'welcome-sub-title', true);

// The Loop
if ( $the_query->have_posts() ) {       
	
	while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $postID = $the_query->post->ID;
                $subTitle = get_post_meta($postID, 'welcome-sub-title', true);   
                
        ?>
        <div class="welcome_post">
            <div class='welcome_title'>
		<?php echo get_the_title(); ?>
            </div>
            <div class="welcome_sub_title">   
                
                <?php echo $subTitle; ?>
            </div>
            <div class="welcome_content">
                 <?php echo get_the_content(); ?>
            </div>
        </div>
	<?php }
	
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
