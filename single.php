<?php get_header(); ?>


    <div class="single_container">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <h1 class="single-title"><?php the_title(); ?></h1>
                <div class="single_thumbnail">
                    <?php echo get_the_post_thumbnail(); ?>
                </div>
                <div class="single_content">				
                        <?php the_content(); ?>
                </div>			
            </div>
	<?php endwhile; endif; ?>
    </div>




<?php get_footer(); ?>