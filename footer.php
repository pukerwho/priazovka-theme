</div>
<!-- footer links -->
<div class="bg-white dark:bg-zinc-800 text-gray-800 dark:text-gray-200 pb-10">
  <div class="container">
    <div class="text-lg font-medium opacity-75 mb-4">🔍 <?php _e("Популярные запросы", "treba-wp"); ?>:</div>
    <div class="border dark:border-gray-500 shadow-lg rounded-lg">
      <div class="flex flex-wrap lg:-mx-2 px-2 py-2">
        <?php 
          $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
          $footer_links = footer_links($current_url);
          foreach ($footer_links as $footer_link):
        ?>
          <div class="w-full lg:w-1/2 xl:w-1/3 text-sm px-2"><?php echo $footer_link->top_links; ?></div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<footer class="bg-gray-700 text-gray-200 py-12">
  <div class="container">
    <div class="flex flex-wrap flex-col xl:flex-row xl:-mx-4">
      <div class="w-full xl:w-1/2 xl:px-4 mb-6 xl:mb-0">
        <div class="flex items-center text-xl relative mb-4">
          <a href="<?php echo get_home_url(); ?>" class="absolute-link"></a>
          <span class="text-red-500 font-extrabold">П</span><?php _e("риазовская", "treba-wp"); ?> <span class="pl-2 text-red-500 font-extrabold"> П</span>равда
        </div>
        <div class="w-full xl:w-9/12 mb-4">
          <div class="opacity-75"><?php _e("Только правда, слухи и субъективное мнение", "treba-wp"); ?></div>
        </div>
        <div class="flex items-center">
          <a href="https://tarakan.org.ua/">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tarakan.jpg" width="20">
          </a>
          <?php if (is_home()): ?>
            <a href="https://webgolovolomki.com/" class="pl-2">
              <img src="https://priazovka.com/wp-content/uploads/web-g.jpg" width="20">
            </a>
          <?php endif; ?>
        </div>
      </div>
      <div class="w-full xl:w-1/4 xl:px-4 mb-6 xl:mb-0">
        <div class="text-xl font-bold mb-2"><?php _e("Меню", "treba-wp"); ?></div>
        <?php wp_nav_menu([
          'theme_location' => 'header',
          'container' => 'div',
          'menu_class' => 'flex flex-col'
        ]); ?> 
      </div>
      <div class="w-full xl:w-1/4 xl:px-4">
        <div class="text-xl font-bold mb-2"><?php _e("Для связи", "treba-wp"); ?></div>
        <div class="mb-4">✉️ hello@priazovka.com</div>
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
    </div>
  </div>
</footer>

<div class="modal" data-modal="menu">
  <div class="modal_content w-full h-screen">
    <div class="h-full bg-white rounded-xl p-4">
      <div class="flex items-center justify-between mb-12">
        <div class="flex items-center text-xl relative mb-4">
          <a href="<?php echo get_home_url(); ?>" class="absolute-link"></a>
          <span class="text-red-500 font-extrabold">П</span><?php _e("риазовская", "treba-wp"); ?> <span class="pl-2 text-red-500 font-extrabold"> П</span>равда
        </div>
        <div class="text-white text-lg modal-close-js">
          ✖️
        </div>
      </div>
      <div>
        <div class="text-2xl font-title mb-6"><?php _e("Меню", "treba-wp"); ?></div>
        <div class="mb-12">
          <?php wp_nav_menu([
            'theme_location' => 'header',
            'container' => 'div',
            'menu_class' => 'flex flex-col'
          ]); ?> 
        </div>
        <div class="text-2xl font-title mb-6"><?php _e("Категории", "treba-wp"); ?></div>
        <?php echo get_template_part('template-parts/components/allcategories-block'); ?>
      </div>
    </div>
  </div>  
</div>

<div class="modal-bg hidden"></div>

<?php wp_footer(); ?>

</body>
</html>