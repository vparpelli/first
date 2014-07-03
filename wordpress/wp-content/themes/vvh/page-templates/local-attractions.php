<?php
/**
 * Template name: Local Attractions
 */

get_header();
?>

<div class="container main-contnent-margins">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
        <?php
            $num_posts = 0;
            $args = array( 'post_type' => 'local_attractions', 'nopaging' => true );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : 
            $loop->the_post();
            global $more;
            $more = 0;
        ?>
        	<div class="row">
                <div class="col-md-12">
                    <div class="row">
                    	<div class="col-lg-6 col-md-6">
                    		<div class="row">
                    			<div class="col-sm-12">
                    			<?php
                    				if ( has_post_thumbnail() ) { 
                    				    // check if the post has a Post Thumbnail assigned to it.
                                        the_post_thumbnail('post-thumbnails');
                                    }else{
                                        echo '<img src="http://placehold.it/5x3" class="full-width" />';
                                    }
                                ?>
                    			</div>
                    		</div>
                        </div>
                    	<div class="col-lg-6 col-md-6">
                    		<h4 class="title"><?php the_title(); ?></h4>
							<?php the_content('', TRUE, ''); ?>
							<a class="btn btn-default pull-right" href="<?php the_permalink(); ?>">See More</a>
				   		</div>
                    </div>
                </div>
            </div>
            
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
            
        <?php 
            endwhile;
        ?>
        </div>
    </div>
</div>








<?php
get_footer();
?>
