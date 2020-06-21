<?php
//-------------------- HEADER: STYLESHEETS, BOOTSTRAP AND JS-------------------//
function add_css_js() {
  //wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Roboto:wght@300;400&display=swap'); //google-fonts CDN
  //wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(),'5.13.0', false);//font awesome CDN
 
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 'false', 'all'); //boostrap CSS
  wp_enqueue_style('bootstrap');
//   wp_enqueue_style( 'style', get_stylesheet_uri()); //style.css
//   wp_enqueue_style('main',  get_stylesheet_directory_uri() . '/css/main.css');
wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
  wp_enqueue_style('main');

  wp_enqueue_script('jquery'); //jquery
  wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array('jquery'), '1.14', true); //Popper CDN
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.5.0', true); //bootstrap JS
  wp_enqueue_script('bootstrap');
  wp_enqueue_script( 'js', get_template_directory_uri() . '/js/script.js', array('jquery','bootstrap'), '1.0', true);//custom JS
}
add_action( 'wp_enqueue_scripts', 'add_css_js' );

// define( 'WP_DEBUG', true );

// //load stylesheets
// function load_css(){
//   wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
//   wp_enqueue_style('bootstrap');

//   //your own css must be last
//   wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
//   wp_enqueue_style('main');

// }
// add_action('wp_enqueue_scripts','load_css');


// //load javascript
// function load_js()
// {
// 		wp_enqueue_script('jquery');

// 		wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
// 		wp_enqueue_script('bootstrap');


// }
// add_action('wp_enqueue_scripts', 'load_js');


// theme options
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

//----------------------------- LOGO ------------------------------------//
function freedomflowtheme_custom_logo_setup() { //Adding custom logo with 5 arguments
    $defaults = array(
      'height'      => 50,
      'width'       => 50,
      'flex-height' => false,
      'flex-width'  => false,
      'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
  }
  add_action( 'after_setup_theme', 'freedomflowtheme_custom_logo_setup' );

//------------------------------ MENU ------------------------------------//
function themeval_register_my_menus() {
    register_nav_menus(
      array(
        'Principal menu' => __( 'Header Menu' )
        // 'extra-menu' => __( 'Extra Menu' )
      )
    );           
  }
  add_action( 'init', 'themeval_register_my_menus' );

// <a> CLASS (can be done in CSS)
    add_filter('nav_menu_link_attributes', 'a_class_nav', 10, 3);
      function a_class_nav ($atts, $item, $args){
        $class = 'nav-link';
        $atts ['class'] = $class;
        return $atts;
      } 

//----------------------------- Custom Post Type ------------------------------------//
function freedom_flow_post_type(){
    $args = array(
      'labels' => array(
          'name' => 'Freedom Flow Posts',
          'singular_name' => 'Post',
      ),
    'hierarchical' => true, //booleans value toggles between pages & posts without labels
    'menu_icon' => 'dashicons-format-aside',
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail','custom-fields'),// if one of the argument is  not mentioned,
    //if makes difference in features
  
  );
    register_post_type('freedomflowposts',$args);
  }
  add_action('init','freedom_flow_post_type');


//----------------------------- Taxonomy ------------------------------------//

function my_first_taxonomy(){
	$args = array(
	  'labels' => array(
		'name' => 'Types',
		'singular_name' => 'Type',
	  ),
  
	  'public' => true,
	  'hierarchical' => true,//false works like tags, true like catgories without labels
  
  
	);
	register_taxonomy('types', array('news'),$args);
  
  }
  
  add_action('init', 'my_first_taxonomy');

// Register Taxonomy Period Poverty Post
function create_periodpovertypost_tax() {

	$labels = array(
		'name'              => _x( 'Period Poverty Posts', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Period Poverty Post', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Period Poverty Posts', 'textdomain' ),
		'all_items'         => __( 'All Period Poverty Posts', 'textdomain' ),
		'parent_item'       => __( 'Parent Period Poverty Post', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Period Poverty Post:', 'textdomain' ),
		'edit_item'         => __( 'Edit Period Poverty Post', 'textdomain' ),
		'update_item'       => __( 'Update Period Poverty Post', 'textdomain' ),
		'add_new_item'      => __( 'Add New Period Poverty Post', 'textdomain' ),
		'new_item_name'     => __( 'New Period Poverty Post Name', 'textdomain' ),
		'menu_name'         => __( 'Period Poverty Post', 'textdomain' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Posts about Period Poverty', 'textdomain' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
		'show_in_rest' => true,
	);
	register_taxonomy( 'periodpovertypost', array('freedomflowposts'), $args );

}
add_action( 'init', 'create_periodpovertypost_tax' );

// Register Taxonomy Story
function create_story_tax() {

	$labels = array(
		'name'              => _x( 'Stories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Story', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Stories', 'textdomain' ),
		'all_items'         => __( 'All Stories', 'textdomain' ),
		'parent_item'       => __( 'Parent Story', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Story:', 'textdomain' ),
		'edit_item'         => __( 'Edit Story', 'textdomain' ),
		'update_item'       => __( 'Update Story', 'textdomain' ),
		'add_new_item'      => __( 'Add New Story', 'textdomain' ),
		'new_item_name'     => __( 'New Story Name', 'textdomain' ),
		'menu_name'         => __( 'Story', 'textdomain' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Freedom Flow stories', 'textdomain' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
		'show_in_rest' => true,
	);
	register_taxonomy( 'story', array('freedomflowposts'), $args );

}
add_action( 'init', 'create_story_tax' );

// theme options
add_theme_support('menus');
add_theme_support('post-thumbnails');

//----------------------------- Menu ------------------------------------//
register_nav_menus(
  array(
    'top-menu' => 'Top Menu Location',
    'mobile-menu' => 'Mobile Menu Location',
    'footer-menu' => 'Footer Menu Location',
  )
);

//----------------------------- Header Image ------------------------------------//
register_default_headers( array(
    'defaultImage' => array(
        'url'           => get_template_directory_uri() . '/images/background-image.jpeg',
        'thumbnail_url' => get_template_directory_uri() . '/images/background-image.jpeg',
        'description'   => __( 'The default image for the custom header.', 'hairsalonTheme' )
    )
) );
//Header Image
$customHeaderDefaults = array(
    'width' => 1350,
    'height' => 500,
    'default-image' => get_template_directory_uri() . '/images/background-image.jpeg'
);
add_theme_support('custom-header', $customHeaderDefaults);



//----------------------------- Woocommerce------------------------------------//

function wpdocs_excerpt_more( $more ) {
	return ' ...';
  }
  add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
  
  
//   function mytheme_add_woocommerce_support() {
// 	add_theme_support( 'woocommerce' );
//   }
//   add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
  

//   require get_template_directory() . '/includes/custom-customizer.php';


//----------------------------- Custom posts link classes ------------------------------------//

function posts_link_next_class($format){
	$format = str_replace('href=', 'class="btn" href=', $format);
	return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
	$format = str_replace('href=', 'class="btn" href=', $format);
	return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');


//----------------------------- Custom sidebar ------------------------------------//

function freedomflow_widgets_init() {
	register_sidebar( array(
		'name'          => 'Freedom Posts Righthand Sidebar',
		'id'            => 'freedomflow-posts-right',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="h3">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'freedomflow_widgets_init' );

require_once get_template_directory() . '/customizer.php';
  
?>