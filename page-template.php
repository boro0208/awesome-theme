<?php 

/*
 * Template Name: Page Content 
 */

get_header(); ?>
    <div class="row">
        <div class="col-xs-12 col-sm-8">
        
            <?php 

            if( have_posts() ):

                while( have_posts() ): the_post();?>

                    <h2><a href='<?php the_permalink();?>'><?php the_title(); ?></a></h2> 
                    
                    <p><?php the_content(); ?></p>

                    <hr>

                <?php endwhile;

            endif;
            ?>
        </div>
        <div class="col-xs-12 col-sm-4">
        
        <?php get_sidebar('sidebar'); ?>

        </div>
    </div>

    <!-- <?php get_sidebar('sidebar2'); ?> -->

<?php get_footer(); ?>