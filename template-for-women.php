<?php 
/*
Template Name: For Women Page
*/

$args = array( 'category_name' => 'for-women','posts_per_page'=>'1' );
// The Query
$the_query = new WP_Query( $args );

?>
<div class="for_women_container">
    <div class="form_women">
        <form action="#">
            <input type="text"  placeholder="First Name:" />
            <input type="text"  placeholder="Last Name:"/>
            <textarea placeholder="Address:"></textarea>
            <input type="text"  placeholder="Phone:"/>
            <input type="text"  placeholder="E-mail:"/>
        </form>
    </div>
    
   
   <?php
        if ( $the_query->have_posts() ) {   
	while ( $the_query->have_posts() ) {
                $the_query->the_post();
    ?>
        <div class="review_women">
          <?php echo get_the_content(); ?>
        </div>
    <?php 
    }
	
        } else {
              echo '<div class="review_women">Nothing found</div>';  // no posts found
        }
        /* Restore original Post Data */
    wp_reset_postdata();
    ?>
</div>