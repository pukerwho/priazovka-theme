<?php
/*
Template Name: БЛОГ
*/
?>
<?php get_header(); ?>

<div class="container py-6 xl:py-10">
  <div class="flex flex-wrap xl:-mx-3">
    <div class="w-full xl:w-2/12 xl:px-3">
      <!-- all categories -->
      <div class="hidden xl:block sticky top-4">
        <?php echo get_template_part('template-parts/components/allcategories-block'); ?>
      </div>
      <!-- end all categories -->
    </div>
    <div class="w-full xl:w-8/12 xl:px-3 mb-6 xl:mb-0">
      <h1 class="text-2xl xl:text-3xl font-medium mb-6"><?php _e("Все новости", "treba-wp"); ?></h1>
      <?php 
        global $wp_query, $wp_rewrite;  
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        $new_posts = new WP_Query( array( 
          'post_type' => 'post', 
          'paged' => $current,
          'posts_per_page' => 10,
        ) );
        if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
      ?>
        <div class="border shadow-lg rounded-lg mb-6">
          <?php echo get_template_part('template-parts/post-item'); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
      <div class="theme-pagination">
        <?php 
          $big = 9999999991; // уникальное число
          echo paginate_links( array(
            'format'  => 'page/%#%',
            'total' => $new_posts->max_num_pages,
            'current' => $current,
            'prev_next' => true,
            'next_text' => (''),
            'prev_text' => (''),
          )); 
        ?>
      </div>
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