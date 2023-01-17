<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <?php 
    $current_title = wp_get_document_title();
    $current_year = date("Y");

    // FOR Main Page
    if ( is_home() ) {
      $home_title = crb_get_i18n_theme_option('crb_seo_mainpage_title'); 
      $home_description = crb_get_i18n_theme_option('crb_seo_mainpage_description'); 
      if ($home_title) {
        $current_title = $home_title;
      }
      if ($home_description) {
        $current_description = $home_description;
      }
    }

    if ( is_singular( 'post' ) ) {
      if (carbon_get_the_post_meta('crb_post_title')) {
        $current_title = carbon_get_the_post_meta('crb_post_title');
      }
      if (carbon_get_the_post_meta('crb_post_title')) {
        $current_description = carbon_get_the_post_meta('crb_post_description');
      }
    }

    if ( is_singular( 'hotels' ) ) {
      //Название отеля
      $place_title = get_the_title();
      //Город
      $current_cities = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
      foreach (array_slice($current_cities, 0,1) as $city) {
        if ($city) {
          $current_city = $city->name;
        }	
      } 
      if (get_locale() === 'ru_RU') {
        $after_title = 'Отзывы, контакты, телефоны';
      } else {
        $after_title = 'Відгуки, контакти, телефони';
      }
      
      $current_title = $place_title . ' - ' . $after_title;
      if (get_locale() === 'ru_RU') {
        $current_description = $place_title . '. Реальные отзывы на сайте Priazovka.com. Актуальные цены в '. $current_year .' году. Вся информация здесь.';
      } else {
        $current_description = $place_title . '. Реальні відгуки на сайті Priazovka.com. Актуальні ціни '. $current_year .' року. Вся інформація тут.';
      }
    }

    if (is_tax( 'city' )) {
      $tax_title = single_term_title( "", false );
      $tax_id = get_queried_object_id();
      $paged = (get_query_var('page')) ? get_query_var('page') : 1;
      
      $term_header = get_term_by('slug', get_query_var('term'), 'city');

      if ($paged > 1) {
        $current_page = ' ᐈ №' . $paged;
        $get_seo_title = carbon_get_term_meta($tax_id, 'crb_category_title');
        $current_title = $get_seo_title . $current_page;
      } else {
        $current_title = carbon_get_term_meta($tax_id, 'crb_category_title');
      }

      if (carbon_get_term_meta($tax_id, 'crb_category_description')) {
        $current_description = carbon_get_term_meta($tax_id, 'crb_category_description');
      } 
          
    }
  ?>
  <title><?php echo $current_title; ?></title>
  <?php if ($current_description): ?>
    <meta name="description" content="<?php echo $current_description; ?>" />
  <?php endif; ?>

  <?php if (get_the_post_thumbnail_url()): ?>
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>">
  <?php else: ?>
    <meta property="og:image" content="https://priazovka.com/wp-content/uploads/cropped-sea-waves-270x270.png">
  <?php endif; ?>
  <?php if (is_singular()): ?>
    <meta property="og:title" content="<?php echo $current_title; ?>" />
    <?php if ($current_description): ?>
      <meta property="og:description" content="<?php echo $current_description; ?>" />
    <?php else: ?>
      <?php 
        $content_text_for_description = wp_strip_all_tags( get_the_content() );
      ?>
      <meta property="og:description" content="<?php echo mb_strimwidth($content_text_for_description, 0, 150, '...'); ?>" />
    <?php endif; ?>
    <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
    <meta property="og:url" content="<?php echo $actual_link; ?>" />
    <meta property="og:article:published_time" content="<?php echo get_post_time('Y/n/j'); ?>" />
    <meta property="og:article:article:modified_time" content="<?php echo get_the_modified_time('Y/n/j'); ?>" />
    
    <?php if (carbon_get_the_post_meta('crb_post_author')): ?>
      <meta property="og:article:author" content="<?php echo carbon_get_the_post_meta('crb_post_author'); ?>" />
    <?php else: ?>
      <meta property="og:article:author" content="<?php echo get_the_author(); ?>" />
    <?php endif; ?>
  <?php endif; ?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#1D1E22" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <header class="header">
    <div class="header-top text-gray-300 py-2">
      <div class="container">
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <div class="hidden lg:flex items-center border-r border-gray-400 pr-4 mr-4">
              <div class="mr-5">
                <a href="<?php echo get_page_url('page-allcity'); ?>"><?php _e("Курорты", "treba-wp"); ?></a>
              </div>
              <div>
                <a href="<?php echo get_post_type_archive_link('hotels'); ?>"><?php _e("Отели", "treba-wp"); ?></a>
              </div>
            </div>
            <div class="flex items-center -mx-2">
              <div class="px-2">
                <div class="relative">
                  <a href="http://facebook.com/priazovskayapravda" class="absolute-link" target="_blank"></a>
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook-logo.svg" width="20">
                </div>
              </div>
              <div class="px-2">
                <div class="relative">
                  <a href="https://t.me/joinchat/ULWsxKhqmr85YzQ6" class="absolute-link" target="_blank"></a>
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/telegram-logo.svg" width="20">
                </div>
              </div>
            </div>
          </div>
          <div class="flex items-center">
            <div class="cursor-pointer">
              <div class="hidden dark:block text-gray-200 js-toggle-light" data-light="off">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
              </div>
              <div class="block dark:hidden dark:text-gray-200 js-toggle-light" data-light="on">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
              </div>
            </div>
            <?php if (function_exists('pll_the_languages')): ?>
            <div class="lang hidden lg:flex items-center border-l border-gray-400 pl-4 ml-4">
              <?php
                pll_the_languages(); 
              ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-white dark:bg-zinc-800 text-gray-800 dark:text-gray-200 rounded-t-2xl">
      <div class="container py-4">
        <div class="w-full">
          <div class="flex justify-between items-center">
            <div class="flex items-center text-xl relative">
              <a href="<?php echo get_home_url(); ?>" class="absolute-link"></a>
              <span class="text-red-500 font-extrabold">П</span><?php _e("риазовская", "treba-wp"); ?> <span class="pl-2 text-red-500 font-extrabold"> П</span>равда
            </div>
            <div class="hidden xl:block mainmenu">
              <?php wp_nav_menu([
                'theme_location' => 'header',
                'container' => 'div',
                'menu_class' => 'flex top-menu'
              ]); ?> 
            </div>
            <div class="flex items-center">
              
              <div class="hidden xl:flex"><a href="<?php echo get_page_url('page-add'); ?>" class="bg-red-400 hover:bg-red-500 text-white font-medium rounded-lg px-6 py-2"><?php _e("Добавить", "treba-wp"); ?> +</a></div>
              <div class="xl:hidden text-blue-500 cursor-pointer modal-js" data-modal="menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
              </div>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="wrap">