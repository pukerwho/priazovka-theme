<div class="text-lg font-medium opacity-75 mb-4">🏠 <?php _e("Отели", "treba-wp"); ?></div>
<?php 
  $new_posts = new WP_Query( array( 
    'post_type' => 'hotels', 
    'posts_per_page' => 5,
    'orderby' => 'rand'
  ) );
  if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
?>
  <div class="relative text-sm mb-2">
    <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
    <div class="font-medium"><?php the_title(); ?></div>
    <div class="opacity-75">Рейтинг: <?php echo carbon_get_the_post_meta('crb_hotels_rating'); ?></div>
    
  </div>
<?php endwhile; endif; wp_reset_postdata(); ?>      