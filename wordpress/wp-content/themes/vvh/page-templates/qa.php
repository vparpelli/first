<?php
/**
Template Name: Q&A
*/ 

get_header();
?>
<div class="container main-contnent-margins">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            
        <?php
            $num_posts = 0;           
            $args = array( 'post_type' => 'q_and_a', 'nopaging' => true );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : 
            $loop->the_post();
        ?>
            <?php the_content(); ?>
            <?php 
                $num_posts++;
                if ( ($num_posts) != $loop->post_count ) : ?> 
				    <div class="row">
					    <div class="col-md-12">
					        <div class="mtn-container">
					             <div class="mtn-inner"></div>
					        </div>
					    </div>
					</div>
            <?php endif; ?>
        <?php endwhile; ?>                      
        </div>
    </div>
</div>
<?php
get_footer();
?>
