<?php get_header(); ?>

    <div class="row">
        <div class="col-xs-12">
            <div id="awesome-carousel" class="carousel slide" data-ride="carousel">
 

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                    <?php 

                    $args_cat = array(
                        'include' => '7,8,9',
                    );

                    $categories = get_categories($args_cat);
                    // var_dump($categories);
                    $count = 0;
                    $bullets = '';
                    foreach($categories as $category):
                        
                            $args = new WP_Query(
                                array(
                                    'type' => 'post',
                                    'posts_per_page' => 1,
                                    'category__in' => $category->term_id,
                                    'category__not_in'=> array(1),
                                )
                            );
                            // $lastBlog = new WP_Query($args);
                            

                            if( $args->have_posts() ):

                                while( $args->have_posts() ): $args->the_post();?>

                                    <div class="item <?php if ($count == 0): echo 'active'; endif; ?>">
                                        <?php the_post_thumbnail('full'); ?>
                                        <div class="carousel-caption">
                                        
                                            <?php the_title(sprintf('<h1 class="entry-title"><a href="%s">',esc_url(get_permalink() ) ),'</a></h1>'); ?>
                                            <small><?php the_category(' ');?></small>
                                        
                                        </div>
                                    </div>

                                    <?php $bullets .='<li data-target="#awesome-carousel" data-slide-to="'.$count.'" class="';?> <?php if ($count == 0): $bullets .='active'; endif; ?><?php $bullets .='"></li>';?>

                                <?php endwhile;

                            endif;

                            wp_reset_postdata();
                            $count++; 
                    endforeach;

                    ?>
                    
                </div>

                <!-- Indicators-->
                <ol class="carousel-indicators">
                    <?php echo $bullets; ?>
                </ol>

                <!-- Controls -->
                <a class="left carousel-control" href="#awesome-carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#awesome-carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-8">
        
            <?php 

                if( have_posts() ):

                    while( have_posts() ): the_post();?>

                        <?php get_template_part('content', get_post_format()); ?>

                    <?php endwhile;

                endif;

                ?>
            <?php
/*
                // PRINT OTHER TWO POSTS NOT THE FIRST ONE
                
                
                $args = new WP_Query(
                    array(
                        'type' => 'post',
                        'posts_per_page' => 2,
                        'offset' => 1,
                    )
                );
                // $lastBlog = new WP_Query('type = post&posts_per_page=2&offset=1');

                if( $args->have_posts() ):

                    while( $args->have_posts() ): $args->the_post();?>

                        <?php get_template_part('content', get_post_format()); ?>

                    <?php endwhile;

                endif;

                wp_reset_postdata();
*/ 
            ?>
            
            <!-- <hr> -->

            <?php
/*
                 // PRINT ONLY TUTORIALS
                 $lastBlog = new WP_Query('type = post&posts_per_page=-1&category_name=tutorials');

                 if( $lastBlog->have_posts() ):
 
                     while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
 
                         <?php get_template_part('content', get_post_format()); ?>
 
                     <?php endwhile;
 
                 endif;
 
                 wp_reset_postdata();
 */
             ?>

        </div>
        <div class="col-xs-12 col-sm-4">
        
            <?php get_sidebar(); ?>

        </div>
    </div>

<?php get_footer(); ?>