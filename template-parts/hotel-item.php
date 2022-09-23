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
  <!-- price -->
  <div class="flex items-center mb-2">
    <div class="text-green-600 darl:text-green-800 mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
      </svg>
    </div>
    <div><span class="font-medium"><?php _e("Цена", "treba-wp"); ?></span>: <?php echo get_min_price(get_the_ID()); ?>00 — <?php echo get_max_price(get_the_ID()); ?>00 грн</div>
  </div>
  <!-- end price -->
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
