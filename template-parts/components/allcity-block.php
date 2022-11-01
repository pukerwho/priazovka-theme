<div class="text-lg font-medium opacity-75 mb-4">⛱️ <?php _e("Курорты", "treba-wp"); ?></div>
<div class="border-b pb-5 mb-5">
  <?php
  $cities = get_terms( array( 
    'taxonomy' => 'city',
    'orderby' => 'count',
    'parent' => 0
  ) );
  shuffle( $cities );
  foreach (array_slice($cities, 0, 6) as $city){ ?>
    <div class="relative bg-gray-200 dark:bg-gray-500 hover:bg-red-200 hover:dark:bg-red-300 hover:dark:text-gray-800 rounded-lg p-3 mb-3">
      <a href="<?php echo get_term_link($city->term_id, 'city') ?>" class="absolute-link"></a>
      <div class="font-medium text-sm">➡️ <?php echo $city->name; ?></div>
    </div>
  <?php } ?>
  <div class="relative bg-red-400 hover:bg-red-500 text-center text-white font-medium rounded-lg p-3">
    <a href="<?php echo get_page_url('page-allcity'); ?>" class="absolute-link"></a>
    <div><?php _e("Все курорты", "treba-wp"); ?></div>
  </div>
</div>