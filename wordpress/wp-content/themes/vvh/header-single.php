<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html>
<!--<![endif]-->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '', true, 'right' ); ?></title>
    
    
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.min.css">
    
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/normalize.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/main.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/local-attractions.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?php bloginfo('stylesheet_directory'); ?>/js/html5shiv.js"></script>
      <script src="<?php bloginfo('stylesheet_directory'); ?>/js/respond.min.js"></script>
      <script src="<?php bloginfo("template_directory") ?>/js/ie.js"></script>
      <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie.css">
    <![endif]-->	
    
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php bloginfo("template_directory") ?>/js/main.js"></script>

</head>

<body <?php body_class(); ?>>


<div class="container-fluid sticky-header full-width fixed adtl-horizontal-padding dark-bg">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <a href="http://www.vvh.org/" class="header-bug"><span id="VVH-text">Valley View Hospital</span></a>
                </div>
                <div class="col-md-9 col-xs-6">
                    <span class="header-number text-shadow pull-right">970-384-7290</span>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="container-fluid header-highlight full-width fixed"></div>
<div class="banner-spacer"></div>
<div class="container-fluid subpage-banner relative">
    <div class="adtl-horizontal-padding logo-nav-search relative">
        <div class="banner-logo absolute">
            <a href="<?php bloginfo('siteurl'); ?>"><img src="<?php bloginfo("template_directory") ?>/images/banner-logo.png" /></a>
        </div>
        <!--<div class="search absolute">
            <input type="text" class="search-box dark-bg pull-right" placeholder="Search" />
        </div>-->
        <div class="main-nav absolute dark-bg">
            <?php 
                if ( has_nav_menu( 'banner-menu' ) ) {
                    $defaults = array(
                    'theme_location'  => 'banner-menu',
                    'menu'            => '', 
                    'container'       => false, 
                    'echo'            => true,
                    'fallback_cb'     => false,
                    'items_wrap'      => '<ul class="banner-menu"> %3$s</ul>',
                    'depth'           => 0 );
                    wp_nav_menu( $defaults );
                }     
            ?>
        </div>
    </div>
    <div class="container relative full-height internal-page-header">
        <div class="row full-height">
            <div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1 full-height">
                <h1 class="page-name">
                    <?php 
                        global $post;
                        echo get_the_title($post->post_id);
                    ?>
                </h1>
            </div>
        </div>
    </div>
</div>
