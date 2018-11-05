
    <div class='thumbnail-img'><?php the_post_thumbnail('thumbnail'); ?></div>
    <h2><a href='<?php the_permalink();?>'>IMAGE POST : <?php the_title(); ?></a></h2>  
    <small>Posted on: <?php the_time('F j, Y');?> at <?php the_time('g:i a');?>, in <?php the_category(); ?></small>
        
    <p><?php the_excerpt(); ?></p>

    <hr>