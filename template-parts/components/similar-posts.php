<div class="text-lg font-medium opacity-75 mb-4">📝 <?php _e("Похожие записи", "treba-wp"); ?></div>
<div class="border-b pb-5 mb-5">
  <?php 
    $new_posts = new WP_Query( array( 
      'post_type' => 'post', 
      'posts_per_page' => 5,
      'orderby' => 'rand'
    ) );
    if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
  ?>
    <div class="relative bg-gray-100 dark:bg-gray-500 hover:shadow-lg rounded-lg mb-6 last:mb-0">
      <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
      <div class="mb-1">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" loading="lazy" class="object-cover rounded-lg"> 
      </div>
      <div class="p-3">
        <div class="mb-1"><?php the_title(); ?></div>
        <div class="text-sm opacity-75"><?php _e("Просмотров", "treba-wp"); ?>: <?php echo get_post_meta( get_the_ID(), 'post_count', true ); ?></div>
      </div>
    </div>
  <?php endwhile; endif; wp_reset_postdata(); ?>      
</div>