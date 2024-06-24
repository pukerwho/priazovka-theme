<div class="text-lg font-medium opacity-75 mb-4">🐈 <?php _e("Сколько лет живут коты", "treba-wp"); ?></div>
<div>
  <?php
    $menu_name = 'catlifespan';
    $locations = get_nav_menu_locations();

    if( $locations && isset( $locations[ $menu_name ] ) ){
      $menu_items = wp_get_nav_menu_items( $locations[ $menu_name ] );

      $menu_list = '<ul id="menu-' . $menu_name . '" class="">';
      foreach ( (array) $menu_items as $key => $menu_item ){
        $menu_count = get_post_meta( $menu_item->object_id, 'post_count', true );
        $menu_list .= '<li class="flex flex-col border-b dark:border-gray-500 pb-3 mb-3 last-of-type:border-transparent dark:last-of-type:border-transparent last-of-type:mb-0 last-of-type:pb-0"><a href="' . $menu_item->url . '" class="hover:text-red-500 text-sm mb-1">' . $menu_item->title . '</a><span class="text-sm font-medium text-gray-500 dark:text-gray-400">' . __("Просмотров", "treba-wp") . ': ' . $menu_count . '</span></li>';
      }
      $menu_list .= '</ul>';
    }
    else {
      $menu_list = '<ul><li>Меню "' . $menu_name . '" не определено.</li></ul>';
    }

    echo $menu_list;
  ?>   
</div>