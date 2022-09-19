<div class="relative flex items-center hover:text-blue-500 mb-4">
  <a href="<?php echo get_home_url(); ?>" class="absolute-link"></a>
  <div class="mr-3">
    🏠
  </div>
  <div class="opacity-75 font-medium">Все</div>
</div>
<?php
$categories = get_terms( array( 
  'taxonomy' => 'category',
  'meta_key' => '_crb_category_show',
  'meta_value' => 'yes',
  'orderby' => 'count'
) );
foreach ($categories as $category){ ?>
<div class="relative flex items-center hover:text-blue-500 mb-4">
  <a href="<?php echo get_term_link($category->term_id, 'category') ?>" class="absolute-link"></a>
  <div class="mr-3">
    <?php echo carbon_get_term_meta( $category->term_id, 'crb_category_emoji' ); ?>
  </div>
  <div class="opacity-75 font-medium"><?php echo $category->name; ?></div>
</div>
<?php } ?>