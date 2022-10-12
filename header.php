<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <?php 
    $current_title = wp_get_document_title();
    $current_year = date("Y");
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
      $after_title = 'Отзывы, контакты, телефоны';
      
      $current_title = $place_title . ' (' . $current_city . ') - ' . $after_title;
      $current_description = $place_title . '. Реальные отзывы на сайте Priazovka.com. Актуальные цены в '. $current_year .' году. Вся информация здесь.';
    }
    if (is_tax( 'city' )) {
      $tax_title = single_term_title( "", false );
      $paged = (get_query_var('page')) ? get_query_var('page') : 1;
      
      $term_header = get_term_by('slug', get_query_var('term'), 'city');
      if((int)$term_header->parent) {
        // child
        $parent_term = get_term_by( 'id', $term_header->parent, 'city' );  
        $parent_name = $parent_term->name; 

        $help_title_text = ': снять жилье, цена на '. $current_year .' год';
        $help_description_text = '. Отзывы, комментарии, фото. Большой каталог на сайте Priazovka.com! Базы отдыха, пансионаты, отели.';
        $current_page = '. Страница №' . $paged;

        $current_title = $parent_name . ' (' . $tax_title  . ')' . $help_title_text;
        if ($paged > 1) {
          $current_title = $parent_name . ' (' . $tax_title . ')' . $help_title_text . '' . $current_page;
        }
        $current_description = $parent_name . ' (' . $tax_title  . ')' . $help_description_text;
      } else {
        // parent
        $help_title_text = 'отдых в '. $current_year .', цены на жилье';
        $help_description_text = 'снять жилье. Базы отдыха, отели, пансионаты. Цены на жилье в '. $current_year .'. Реальные отзывы на сайте Priazovka.com';
        $current_page = '. Страница №' . $paged;

        $current_title = $tax_title . ': ' . $help_title_text;
        if ($paged > 1) {
          $current_title = $tax_title . ': ' . $help_title_text . '' . $current_page;
        }
        $current_description = $tax_title . ': ' . $help_description_text;
      }     
    }
  ?>
  <title><?php echo $current_title; ?></title>
  <?php if ($current_description): ?>
    <meta name="description" content="<?php echo $current_description; ?>"/>
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
    <div class="container">
      <div class="w-full">
        <div class="flex justify-between items-center">
          <div class="flex items-center text-xl relative">
            <a href="<?php echo get_home_url(); ?>" class="absolute-link"></a>
            <span class="text-red-500 font-extrabold">П</span>риазовская <span class="pl-2 text-red-500 font-extrabold"> П</span>равда
          </div>
          <div class="hidden xl:block mainmenu">
            <?php wp_nav_menu([
              'theme_location' => 'header',
              'container' => 'div',
              'menu_class' => 'flex top-menu'
            ]); ?> 
          </div>
          <div class="flex items-center">
            <div class="cursor-pointer mr-6">
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
            <div class="hidden xl:flex"><a href="<?php echo get_page_url('page-add'); ?>" class="bg-red-400 hover:bg-red-500 text-white font-medium rounded-lg px-6 py-2"><?php _e("Додати", "treba-wp"); ?> +</a></div>
            <div class="xl:hidden text-blue-500 cursor-pointer modal-js" data-modal="menu">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
              </svg>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </header>