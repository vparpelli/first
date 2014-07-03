<?php

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'main_menu' => __( 'Main Menu', 'cake' ),
		  'secondary_menu' => __( 'Secondary Menu', 'cake' ),
		)
	);
}

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

function register_my_menu() {
  register_nav_menu('banner-menu',__( 'Banner Menu' ));
}
add_action( 'init', 'register_my_menu' );


add_editor_style( '/css/editor-style.css' );

show_admin_bar( false );

add_theme_support( 'post-thumbnails', array( 'local_attractions' ) );

add_image_size( 'local-attractions', 366, 200, true ); //300 pixels wide (and unlimited height)

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'local_attractions',
		array(
			'labels' => array(
				'name' => __( 'Local Attractions' ),
				'singular_name' => __( 'Attraction' )
			),
		'public' => true,
		'has_archive' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions')
		)
	);
	
	register_post_type( 'q_and_a',
		array(
			'labels' => array(
				'name' => __( 'Q & A' ),
				'singular_name' => __( 'QandA' )
			),
		'public' => true,
		'has_archive' => false,
		'supports' => array('title', 'editor', 'revisions')
		)
	);
}


add_action('init', 'add_qa_buttons');
function add_qa_buttons() {
    if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
    {
        global $typenow;
        if (empty($typenow) && !empty($_GET['post'])) {
            $post = get_post($_GET['post']);
            $typenow = $post->post_type;
        }
        if ("q_and_a" == $typenow){
            add_filter( 'mce_external_plugins', 'add_plugin' );
            add_filter( 'mce_buttons', 'register_button' );
        }
   }else{
       return;
   }
}
function register_button($buttons) {
    array_push($buttons, "|", "question", "|", "full_answer", "|", "short_answer");
    return $buttons;
}
function add_plugin($plugin_array) {
    $plugin_array['question'] = get_bloginfo('template_url').'/js/customcodes.js';
    $plugin_array['short_answer'] = get_bloginfo('template_url').'/js/customcodes.js';
    $plugin_array['full_answer'] = get_bloginfo('template_url').'/js/customcodes.js';
    return $plugin_array;
}


add_shortcode("question", "question");
function question( $atts, $content = null ) {
    return 
    '<div class="row">
        <div class="col-md-1 col-xs-1">
            <span class="qa-letter">Q:</span>
        </div>
        <div class="col-md-11 col-xs-11">
            <p class="qa-text question">
            ' . $content . '
            </p>
        </div>
    </div>';
}

add_shortcode("short_answer", "short_answer");
function short_answer( $atts, $content = null ) {
    extract( shortcode_atts(
        array(
            'full_answer' => 'false',
        ), $atts));
    $linkcode = $full_answer;
    if($full_answer != 'false'){
        $post_id = get_the_ID();
        $permalink = get_permalink( $post_id );
        $linkcode = '<a class="btn btn-default pull-right" href="' . $permalink . '">View Full Answer</a>';
    }else{
        $linkcode = "";
    }
    if (!(is_singular('q_and_a'))) {
    return 
    '<div class="row">
        <div class="col-md-1 col-xs-1">
            <span class="qa-letter answer-letter">A:</span>
        </div>
        <div class="col-md-11 col-xs-11">
            <p class="qa-text">
            ' . $content . '                  
            </p>
            ' . $linkcode . '
        </div>
    </div>';
    }else{
        return '';
    }
}

add_shortcode("full_answer", "full_answer");
function full_answer( $atts, $content = null ) {
    if (is_singular('q_and_a')) {
        return 
        '<div class="row">
            <div class="col-md-1 col-xs-1">
                <span class="qa-letter answer-letter">A:</span>
            </div>
            <div class="col-md-11 col-xs-11">
                <p class="qa-text">
                ' . $content . '                  
                </p>
            </div>
        </div>';        
    }else{
        return '';
    }
    
}





//Featured Image support if needed
//add_theme_support( 'post-thumbnails' );

//Add image sizes
/*
// regular size
add_image_size( 'regular', 400, 350, true );

// medium size
add_image_size( 'medium', 650, 500, true );
	
// large thumbnails
add_image_size( 'large', 960, '' );
*/

// show custom image sizes on when inserting media
/*
function cake_show_image_sizes($sizes) {
    $sizes['regular'] = __( 'Our Regular Size', 'cake' );
    $sizes['medium'] = __( 'Our Medium Size', 'cake' );
    $sizes['large'] = __( 'Our Large Size', 'cake' );
    return $sizes;
}
add_filter('image_size_names_choose', 'cake_show_image_sizes');
*/
?>