<?php

if ( ! defined( 'TREBAWP_VERSION' ) ) {
	define( 'TREBAWP_VERSION', '1.0.0' );
}

if ( ! function_exists( 'treba_wp_setup' ) ) :
	function treba_wp_setup() {
		load_theme_textdomain( 'treba-wp', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		// add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'header' => esc_html__( 'Header', 'treba-wp' ),
        'footer' => esc_html__( 'Footer', 'treba-wp' ),
        'sport' => esc_html__( 'Sport', 'treba-wp' ),
        'name' => esc_html__( 'Name', 'treba-wp' ),
        'doglifespan' => esc_html__( 'Dog lifespan', 'treba-wp' ),
        'catlifespan' => esc_html__( 'Cat lifespan', 'treba-wp' ),
        'mobile' => esc_html__( 'Mobile', 'treba-wp' ),
        'lang_header' => esc_html__( 'Lang', 'treba-wp' ),
			)
		);

		add_theme_support(
			'html5',
			array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script')
		);
	}
endif;
add_action( 'after_setup_theme', 'treba_wp_setup' );

include('inc/enqueues.php');
include('inc/share-social.php');
include('inc/comments-functions.php');
include('inc/create-custom-posts.php');
include('inc/create-custom-taxonomy.php');
include('inc/footer-links.php');

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once __DIR__ . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
    require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';
    require_once get_template_directory() . '/inc/custom-fields/settings-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/post-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/page-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/term-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/gutenberg-blocks.php';
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function itsme_disable_feed() {
 wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

/**
 * Enqueue scripts and styles.
 */
function trebawp_scripts() {
	wp_enqueue_style( 'tailwind', get_stylesheet_directory_uri() . '/build/tailwind.css', false, time() );
	wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/build/style.css', false, time() );
	
	wp_enqueue_script( 'all-scripts', get_template_directory_uri() . '/build/scripts.js', '','',true);

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'trebawp_scripts' );

// Создаем счетчик для записей
function tutCount($post_id) {
  
  if ( metadata_exists( 'post', $post_id, 'post_count' ) ) {
    $count_value = get_post_meta( $post_id, 'post_count', true );
    $count_value = $count_value + 1;
    update_post_meta( $post_id, 'post_count', $count_value );
  } else {
    $rand_post_count = mt_rand(50, 144);
    add_post_meta( $post_id, 'post_count', $rand_post_count, true);
  }
  $post_count = get_post_meta( $post_id, 'post_count', true );
  return $post_count;
  
}

function get_page_url($template_name) {
  $pages = get_posts([
    'post_type' => 'page',
    'post_status' => 'publish',
    'meta_query' => [
      [
        'key' => '_wp_page_template',
        'value' => $template_name.'.php',
        'compare' => '='
      ]
    ]
  ]);
  if(!empty($pages))
  {
    foreach($pages as $pages__value)
    {
      return get_permalink($pages__value->ID);
    }
  }
  return get_bloginfo('url');
}

//Add Ajax
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl() {
  echo '<script type="text/javascript">
    var ajaxurl = "' . admin_url('admin-ajax.php') . '";
  </script>';
}

//Update TimeToRead 
function update_time_read( ) {
  //Get data
  $post_id = stripslashes_deep($_POST['post_id']);
  $time_var = stripslashes_deep($_POST['time_var']);
  update_post_meta( $post_id, 'post_time_read', $time_var );
  wp_die();
}
add_action( 'wp_ajax_nopriv_update_time_read_action', 'update_time_read' );
add_action( 'wp_ajax_update_time_read_action', 'update_time_read' );

add_filter('get_the_archive_title', function ($title) {
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_author()) {
    $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif (is_tax()) { //for custom post types
    $title = sprintf(__('%1$s'), single_term_title('', false));
  } elseif (is_post_type_archive()) {
    $title = post_type_archive_title('', false);
  }
  return $title;
});


function get_min_price($post_id) {
  if ( metadata_exists( 'post', $post_id, 'hotel_min_price' ) ) {
    $hotel_min_price = get_post_meta( $post_id, 'hotel_min_price', true );
    return $hotel_min_price;
  } else {
    $rand_min_price = mt_rand(1, 5);
    add_post_meta( $post_id, 'hotel_min_price', $rand_min_price, true);
    $hotel_min_price = get_post_meta( $post_id, 'hotel_min_price', true );
    return $hotel_min_price;
  }
}
function get_max_price($post_id) {
  if ( metadata_exists( 'post', $post_id, 'hotel_max_price' ) ) {
    $hotel_max_price = get_post_meta( $post_id, 'hotel_max_price', true );
    return $hotel_max_price;
  } else {
    $rand_max_price = mt_rand(5, 9);
    add_post_meta( $post_id, 'hotel_max_price', $rand_max_price, true);
    $hotel_max_price = get_post_meta( $post_id, 'hotel_max_price', true );
    return $hotel_max_price;
  }
}

function get_city_min_price($query) {
  $posts = $query->posts;
  $min_value_array = [];
  foreach($posts as $post) {
    $post_id = $post->ID;
    $hotel_min_price = get_post_meta( $post_id, 'hotel_min_price', true );
    $hotel_min_price = (int)$hotel_min_price;
    array_push($min_value_array, $hotel_min_price);
  }
  return min($min_value_array);
}

function get_city_max_price($query) {
  $posts = $query->posts;
  $max_value_array = [];
  foreach($posts as $post) {
    $post_id = $post->ID;
    $hotel_max_price = get_post_meta( $post_id, 'hotel_max_price', true );
    $hotel_max_price = (int)$hotel_max_price;
    array_push($max_value_array, $hotel_max_price);
  }
  return max($max_value_array);
}

function get_city_rating($term_id) {
  if ( metadata_exists( 'term', $term_id, 'city_rating' ) ) {
    $city_rating = get_term_meta( $term_id, 'city_rating', true );
    return $city_rating;
  } else {
    $rand_rating = mt_rand(1, 9);
    add_term_meta( $term_id, 'city_rating', $rand_rating, true );
    $city_rating = get_term_meta( $term_id, 'city_rating', true );
    return $city_rating;
  }
}

function get_terms_links_array($hotel_id) {
  if ( metadata_exists( 'post', $hotel_id, 'hotel_links' ) ) {
    $hotel_links = get_post_meta( $hotel_id, 'hotel_links', true );
    return $hotel_links;
  } else {
    $get_terms = get_terms( array( 
      'taxonomy' => 'city',
    ) );
    $terms_length = count($get_terms);
    $keywords_array = [];
    $random_array = [];
    $links_iterator = 0;

    while ($links_iterator < 5) {
      $get_random_number = array_rand($get_terms);
      if (!in_array($get_random_number, $random_array)) {
        array_push($random_array, $get_random_number); 
        
        $get_term_id = $get_terms[$get_random_number]->term_id;
        $get_term_permalink = get_term_link($get_term_id, 'city');
        
        $get_term_keywords = carbon_get_term_meta($get_term_id, 'crb_category_keywords');
        // has meta
        if ($get_term_keywords) {
          $term_keywords_array = explode(",", $get_term_keywords);
          $get_random_number_keyword = array_rand($term_keywords_array);

          $get_term_keyword = $term_keywords_array[$get_random_number_keyword];
          $get_term_keyword = trim($get_term_keyword);
          
          $full_link = '<a href="' . $get_term_permalink . '">' . $get_term_keyword . '</a>'; 
          array_push($keywords_array, $full_link); 

          $links_iterator++;
        } 
      };
    }
    // $keywords_array = json_encode($keywords_array);
    add_post_meta( $hotel_id, 'hotel_links', $keywords_array);
    $hotel_links = get_post_meta( $hotel_id, 'hotel_links', true );
    return $hotel_links;
  }
}

function wpb_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );
     
    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

//Carbonfields + Polylang
function crb_get_i18n_suffix() {
    $suffix = '';
    if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
        return $suffix;
    }
    $suffix = '_' . ICL_LANGUAGE_CODE;
    return $suffix;
}

function crb_get_i18n_theme_option( $option_name ) {
    $suffix = crb_get_i18n_suffix();
    return carbon_get_theme_option( $option_name . $suffix );
}

// Задаємо дефолтное значення всім записам
// add_action( 'init', 'add_meta_query_mainhide');
// function add_meta_query_mainhide() {
//   $posts_args = array('numberposts' => -1);
//   $all_posts = get_posts($posts_args);
//   foreach ($all_posts as $post) {
//     $post_id = $post->ID;
//     update_post_meta($post_id, '_crb_post_mainhide', 'no');
//   }
// }