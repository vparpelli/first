<?php
/**
Template Name: Contact
*/ 

get_header('contact');
?>
<div class="container main-contnent-margins">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="row contact-form-cont">
                <div class="col-md-10 col-md-offset-1">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content() ?>
                <?php endwhile; endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="contact-icon">
                        <i class="glyphicon glyphicon-home"></i>
                    </div>
                    <div class="contact-info">
                        1906 Blake Avenue<br />
                        Glenwood Springs, CO 81601
                    </div>
                    
                </div>
                <div class="col-sm-4">
                    <div class="contact-icon">
                        <i class="glyphicon glyphicon-earphone"></i>
                    </div>
                    <div class="contact-info">
                        970-384-7290
                    </div>
                    
                </div>
                <div class="col-sm-4">
                    <div class="contact-icon">
                        <i class="glyphicon glyphicon-envelope"></i>
                    </div>
                    <div class="contact-info">
                        ciri@vvh.org
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer('contact');
?>
