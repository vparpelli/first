<?php
/**
 * The template used for displaying single posts
 *
 * @package vvh
 * @subpackage vvh
 * @since 1.0
 */
get_header();
?>


<div class="container main-contnent-margins">
    <div class="row">
        <div class="col-md-9 col-sm-9">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php include("page-templates/current-studies.php"); ?>
    </div>
</div>

<?php
get_footer();
?>