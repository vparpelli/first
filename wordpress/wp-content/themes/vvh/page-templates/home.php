<?php
/**
Template Name: Home Page
*/ 

get_header('home');
?>
<div class="container main-contnent-margins">
    <div class="row">
        <div class="col-md-7 col-sm-7">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content() ?>
                <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-12">
            <div id="home-image-carousel" class="owl-carousel">
                <img class="home-rotator full-width" src="<?php bloginfo('template_url'); ?>/images/slides/slide1.jpg"/>
                <img class="home-rotator full-width" src="<?php bloginfo('template_url'); ?>/images/slides/slide2.jpg"/>
                <img class="home-rotator full-width" src="<?php bloginfo('template_url'); ?>/images/slides/slide3.jpg"/>
                <img class="home-rotator full-width" src="<?php bloginfo('template_url'); ?>/images/slides/slide4.jpg"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mtn-container">
                <div class="mtn-inner"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="home-promo promo-bg1">
                <div class="promo-content">
                    <h3 class="promo-headline helvetica">Meeting Your Health Care Professionals</h3>
                    <p class="promo-text">
                        Also: New Options Available and Billing Questions Answered
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="home-promo promo-bg2">
                <div class="promo-content">
                    <h3 class="promo-headline helvetica">Nestled In the Mountains of Colorado</h3>
                    <p class="promo-text">
                        <a href="http://maps.google.com/?q=1906 Blake Avenue Glenwood Springs, CO 81601" target="_blank">See a map</a> of our location and get directions.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="home-promo promo-bg3">
                <div class="promo-content">
                    <h3 class="promo-headline helvetica">It’s More Than A Hospital; It’s A Getaway</h3>
                    <p class="promo-text">
                        <?php if(get_page_by_title('Local Attractions')) : ?>
                        <?php $page = get_page_by_title( 'Local Attractions' ); ?>
                        <?php $permalink = get_permalink( $page->ID ); ?>
                        <a href="<?php echo $permalink ?>">Check out</a> the local attractions available around Glenwood Springs.
                        <?php endif;?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
