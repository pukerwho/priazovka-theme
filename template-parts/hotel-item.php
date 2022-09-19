<div class="border shadow-lg rounded-lg px-4 xl:px-6 py-3 xl:py-4 mb-6">
  <div class="mb-2">
    <?php 
      $city_terms = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
      foreach (array_slice($city_terms, 0,1) as $city_term):
      ?>
        <?php if ($city_term): ?>
          <a href="<?php echo get_term_link($city_term->term_id, 'city') ?>" class="text-sm inline-block bg-blue-100 dark:bg-gray-300 text-black dark:text-gray-600 rounded px-2 py-1"><?php echo $city_term->name; ?></a> 
        <?php endif; ?>
      <?php endforeach; ?>
  </div>
  <div class="text-xl font-medium mb-2"><a href="<?php the_permalink(); ?>" class="hover:text-blue-500"><?php the_title(); ?></a></div>
  <div class="flex flex-col xl:flex-row xl:justify-between">
    <div class="flex items-center mb-2 xl:mb-0">
      <div class="text-blue-500 mr-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
          <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
          <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
        </svg>
      </div>
      <div class="text-sm opacity-75"><?php _e("Дата", "treba-wp"); ?>: <?php echo get_the_date('d/m/Y'); ?></div>
    </div>
    <div class="flex items-center">
      <div class="text-yellow-400 mr-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
          <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
        </svg>
      </div>
      <div class="text-sm opacity-75"><?php _e("Рейтинг", "treba-wp"); ?>: <?php echo carbon_get_the_post_meta('crb_hotels_rating'); ?></div>
    </div>
  </div>
  
</div>
