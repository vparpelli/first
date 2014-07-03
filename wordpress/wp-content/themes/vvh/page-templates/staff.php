<?php
/**
Template Name: Hospital Staff
*/ 

get_header();
?>
<div class="container main-contnent-margins">
    <div class="row">
        <div class="col-md-9 col-sm-9">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                    <div class="row staff-row">
                        <div class="col-md-12">
                            <div class="row main-doctor">
                                <div class="col-md-4 col-sm-5 col-xs-5">
                                    <img src="http://placehold.it/3x4" class="full-width" />
                                </div>
                                <div class="col-md-8 col-sm-7 col-xs-7">
                                    <h2 class="staff-name">Dr. FirstName Laws</h2>
                                    <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi eros, sodales ac neque eu, lacinia eleifend mi. Duis varius et ligula et iaculis. Sed accumsan velit eu bibendum facilisis. Integer adipiscing, lectus eget pulvinar varius, nisl leo aliquam sem, ut luctus eros sapien vel metus.
                                    </p>
                                    <a href="#" class="btn btn-default pull-right">See Bio</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-xs-5">
                                    <img src="http://placehold.it/3x4" class="full-width" />
                                </div>
                                <div class="col-xs-7">
                                    <h5 class="staff-name">Dr. FirstName LastName</h5>
                                    <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi eros, sodales ac neque eu.
                                    </p>
                                    <a href="#" class="btn btn-default pull-right">See Bio</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-xs-5">
                                    <img src="http://placehold.it/3x4" class="full-width" />
                                </div>
                                <div class="col-xs-7">
                                    <h5 class="staff-name">Dr. FirstName  LastName</h5>
                                    <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi eros, sodales ac neque eu.
                                    </p>
                                    <a href="#" class="btn btn-default pull-right">See Bio</a>
                                </div>
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
                    <div class="row staff-row">
                        <div class="col-sm-4 col-xs-4">
                            <img class="staff-quad-pic" src="http://placehold.it/3x4" />
                            <h5 class="staff-name text-center">FirstName LastName</h5>
                            <p class="text-center">Job Title</p>
                        </div>
                        <div class="col-sm-4 col-xs-4">
                            <img class="staff-quad-pic" src="http://placehold.it/3x4" />
                            <h5 class="staff-name text-center">FirstName LastName</h5>
                                <p class="text-center">Job Title</p>
                        </div>
                        <div class="col-sm-4 col-xs-4">
                            <img class="staff-quad-pic" src="http://placehold.it/3x4" />
                            <h5 class="staff-name text-center">FirstName LastName</h5>
                            <p class="text-center">Job Title</p>
                        </div>
                    </div>
                    <div class="row staff-row">
                        <div class="col-sm-4 col-xs-4">
                            <img class="staff-quad-pic" src="http://placehold.it/3x4" />
                            <h5 class="staff-name text-center">FirstName LastName</h5>
                            <p class="text-center">Job Title</p>
                        </div>
                        <div class="col-sm-4 col-xs-4">
                            <img class="staff-quad-pic" src="http://placehold.it/3x4" />
                            <h5 class="staff-name text-center">FirstName LastName</h5>
                            <p class="text-center">Job Title</p>
                        </div>
                        <div class="col-sm-4 col-xs-4">
                            <img class="staff-quad-pic" src="http://placehold.it/3x4" />
                            <h5 class="staff-name text-center">FirstName LastName</h5>
                            <p class="text-center">Job Title</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-xs-4">
                            <img class="staff-quad-pic" src="http://placehold.it/3x4" />
                            <h5 class="staff-name text-center">FirstName LastName</h5>
                            <p class="text-center">Job Title</p>
                        </div>
                        <div class="col-sm-4 col-xs-4">
                            <img class="staff-quad-pic" src="http://placehold.it/3x4" />
                            <h5 class="staff-name text-center">FirstName LastName</h5>
                            <p class="text-center">Job Title</p>
                        </div>
                        <div class="col-sm-4 col-xs-4">
                            <img class="staff-quad-pic" src="http://placehold.it/3x4" />
                            <h5 class="staff-name text-center">FirstName LastName</h5>
                            <p class="text-center">Job Title</p>
                        </div>
                    </div>
                
                
                <?php/*
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
                <?php endwhile; */?>                      
                </div>
            </div>
        </div>
        <?php include("current-studies.php"); ?>
    </div>
</div>
<?php
get_footer();
?>
