<?php get_header(); ?>

<div class="container py-6 xl:py-10">
  <div class="flex flex-wrap xl:-mx-3">
    <div class="w-full xl:w-2/12 xl:px-3">
      <!-- all categories -->
      <div class="hidden xl:block">
        <?php echo get_template_part('template-parts/components/allcategories-block'); ?>
      </div>
      <!-- end all categories -->
    </div>
    <div class="w-full xl:w-8/12 xl:px-3 mb-6 xl:mb-0">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php 
        $currentId = get_the_ID();
        $countNumber = tutCount($currentId);
      ?>
      <div>
        <h1 class="text-2xl xl:text-3xl border-b pb-3 mb-3"><?php the_title(); ?></h1>
        <!-- курорт -->
        <div class="text-sm opacity-75 mb-2">
          <span>⛱️ <?php _e("Курорт", "treba-wp"); ?>:</span>
          <?php 
          $city_terms = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
          foreach (array_slice($city_terms, 0,1) as $city_term):
          ?>
            <?php if ($city_term): ?>
              <a href="<?php echo get_term_link($city_term->term_id, 'city') ?>" class="text-blue-500 hover:text-blue-700"><?php echo $city_term->name; ?></a> 
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <!-- end курорт -->
        <!-- дата -->
        <div class="mb-2">
          <div class="flex items-center mb-2 xl:mb-0">
            <div class="text-blue-500 mr-1">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="text-sm opacity-75"><?php _e("Дата", "treba-wp"); ?>: <?php echo get_the_date('d/m/Y'); ?></div>
          </div>
        </div>
        <!-- end дата -->
        <!-- рейтинг -->
        <div class="flex items-center mb-6">
          <div class="text-yellow-400 mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="text-sm opacity-75"><?php _e("Рейтинг", "treba-wp"); ?>: <?php echo carbon_get_the_post_meta('crb_hotels_rating'); ?></div>
        </div>
        <!-- end рейтинг -->
        <!-- content -->
        <div class="mb-6">
          <h2 class="text-xl xl:text-2xl mb-2"><?php _e("Про отель", "treba-wp"); ?>:</h2>
          <div class="content">
            <?php the_content(); ?>
          </div>
        </div>
        <!-- end content -->
        <!-- контакт -->
        <div class="mb-6">
          <h2 class="text-xl xl:text-2xl mb-2"><?php _e("Контакты", "treba-wp"); ?>:</h2>
          <div class="mb-3">
            <div><span class="font-medium"><?php _e("Адрес", "treba-wp"); ?></span>: <span class="content"><?php echo carbon_get_the_post_meta('crb_hotels_address'); ?></span></div>
          </div>
          <div>
            <div><span class="font-medium"><?php _e("Телефоны", "treba-wp"); ?></span>: <span class="content"><?php echo carbon_get_the_post_meta('crb_hotels_phones'); ?></span></div>
          </div>
        </div>
        <!-- end контакт -->
        <!-- удобства -->
        <div class="mb-6">
          <h2 class="text-xl xl:text-2xl mb-2"><?php _e("В наличии", "treba-wp"); ?>:</h2>
          <table class="w-full table-auto">
            <thead class="bg-blue-100 dark:bg-gray-500 text-gray-500 dark:text-gray-200 border border-gray-300 uppercase">
              <tr>
                <th class="text-left whitespace-nowrap px-2 py-3">
                  <div class="text-left"><?php _e("Удобство", "tarakan"); ?></div>
                </th>
                <th class="text-left whitespace-nowrap px-2 py-3">
                  <div class="text-left"><?php _e("Наличие", "tarakan"); ?></div>
                </th>
              </tr>
            </thead>
            <tbody class="text-sm border border-gray-300">

              <!-- Ванна -->
              <tr class="border-b border-gray-300 ">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Ванна", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_vanna') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Ванна -->
              <!-- Фен -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Фен", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_fen') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Фен -->
              <!-- Шампунь -->
              <tr class="border-b border-gray-300 last:border-transparent">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Шампунь", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_shampoo') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Шампунь -->
              <!-- Горячая вода -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Горячая вода", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_hotwater') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Горячая вода -->
              <!-- Стиральная машина -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Стиральная машина", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_stiralka') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Стиральная машина -->
              <!-- Полотенца, мыло, бумага -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Полотенца, мыло, бумага", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_prostin') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Полотенца, мыло, бумага -->
              <!-- Плечики -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Плечики", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_plechiki') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Плечики -->
              <!-- Постельное белье -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Постельное белье", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_postel') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Постельное белье -->
              <!-- Жалюзи -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Жалюзи", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_jaluzi') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Жалюзи -->
              <!-- Утюг -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Утюг", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_utug') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Утюг -->
              <!-- Телевизор -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Телевизор", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_tv') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Телевизор -->
              <!-- Кондиционер -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Кондиционер", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_conder') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Кондиционер -->
              <!-- Отопление -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Отопление", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_otoplenie') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Отопление -->
              <!-- Wi-Fi -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Wi-Fi", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_wifi') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Wi-Fi -->
              <!-- Кухня -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Кухня", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_kitchen') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Кухня -->
              <!-- Микроволновая печь -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Микроволновая печь", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_microwave') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Микроволновая печь -->
              <!-- Мини-холодильник -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Мини-холодильник", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_mini_holod') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Мини-холодильник -->
              <!-- Электроплита -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Электроплита", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_plita') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Электроплита -->
              <!-- Чайник -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Чайник", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_chainik') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Чайник -->
              <!-- Мини-сейф -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Мини-сейф", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_miniseif') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Мини-сейф -->
              <!-- Кроватка -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Кроватка", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_krovatka') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Кроватка -->
              <!-- Огнетушитель -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Огнетушитель", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_ognetushitel') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Огнетушитель -->
              <!-- Аптечка -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Аптечка", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_aptechka') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Аптечка -->
              <!-- Бесплатная парковка -->
              <tr class="border-b border-gray-300">
                <td class="whitespace-nowrap px-2 py-3">
                  <div class="text-gray-500 dark:text-gray-300 font-medium"><?php _e("Бесплатная парковка", "treba-wp"); ?></div>
                </td>
                <td class="whitespace-nowrap px-2 py-3">
                  <?php if (carbon_get_the_post_meta('crb_hotels_parkovka') === 'yes'): ?>
                    <div class="text-gray-500 dark:text-gray-300">✅ <?php _e("Да", "treba-wp"); ?></div>
                  <?php else: ?>
                    <div class="text-red-400 ">❌ <?php _e("Нет", "treba-wp"); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <!-- END Бесплатная парковка -->
            </tbody>
          </table>
        </div>
        <!-- end удобства -->
        <div class="bg-blue-100 dark:bg-gray-500 dark:text-gray-200 rounded px-4 py-2 mb-6">
          <div class="opacity-75 mb-2">👁️ <?php _e("Просмотров", "treba-wp"); ?>: <?php echo get_post_meta( get_the_ID(), 'post_count', true ); ?></div>
          <div class="opacity-75">💬 <?php _e("Комментариев", "treba-wp"); ?>: <?php echo get_comments_number(); ?></div>
        </div>
        <!-- Хлебные крошки -->
        <div class="breadcrumbs text-sm text-gray-800 dark:text-gray-200 mb-6" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
          <ul class="flex items-center flex-wrap -mr-4">
            <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item px-4 pl-8">
              <a itemprop="item" href="<?php echo home_url(); ?>" class="text-indigo-400 dark:text-indigo-200">
                <span itemprop="name"><?php _e( 'Головна', 'treba-wp' ); ?></span>
              </a>                        
              <meta itemprop="position" content="1">
            </li>
            <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item px-4">
              <a itemprop="item" href="<?php echo get_post_type_archive_link('hotels'); ?>" class="text-indigo-400 dark:text-indigo-200">
                <span itemprop="name"><?php _e( 'Отели', 'treba-wp' ); ?></span>
              </a>                        
              <meta itemprop="position" content="2">
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item text-gray-600 px-4">
              <span itemprop="name"><?php the_title(); ?></span>
              <meta itemprop="position" content="3" />
            </li>
          </ul>
        </div>
        <!-- END Хлебные крошки -->
        <div>
          <div class="text-2xl mb-6"><span class="border-b-4 border-red-300 font-bold"><?php _e("Комментарии", "treba-wp"); ?></span></div>
          <div class="content">
              <?php comments_template(); ?>
          </div>
        </div> 
      </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
    <div class="w-full xl:w-2/12 xl:px-3">
      <div>
        <?php echo get_template_part('template-parts/components/allcity-block'); ?>
        <?php echo get_template_part('template-parts/components/allhotels-block'); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>