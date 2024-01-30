<?php get_header(); ?>

<div class="container py-6 xl:py-10">
  <div class="flex flex-wrap xl:-mx-3">
    <div class="w-full xl:w-2/12 xl:px-3">
      <!-- all categories -->
      <div class="hidden xl:block">
        <?php echo get_template_part('template-parts/components/allcategories-block'); ?>
        <?php echo get_template_part('template-parts/components/quiz-block'); ?>
      </div>
      <!-- end all categories -->
    </div>
    <div class="w-full xl:w-8/12 xl:px-3 mb-6 xl:mb-0">
      <div class="mb-8">
        <div class="italic opacity-75 mb-2"><?php _e("Обновлено", "treba-wp"); ?>: <?php echo get_the_date("d.m.Y"); ?></div>
        <?php echo get_template_part('template-parts/components/toptop-block'); ?>
      </div>
      <div>
        <div class="text-2xl xl:text-3xl font-medium mb-4">⚡ <?php _e("ТОП новости", "treba-wp"); ?>:</div>
        <div class="mb-8">
          <?php 
            $top_posts = new WP_Query( array( 
              'post_type' => 'post', 
              'posts_per_page' => 5,
              'meta_key' => 'post_count',
              'orderby' => 'meta_value_num',
              'order' => 'DESC',
              'meta_query' => array(
                array(
                  'key' => '_crb_post_mainhide',
                  'value' => 'yes',
                  'compare' => '!='
                ),
              ),
            ) );
            if ($top_posts->have_posts()) : while ($top_posts->have_posts()) : $top_posts->the_post(); 
          ?>
            <div class="flex flex-col xl:flex-row text-lg mb-2">
              <div class="flex text-base opacity-50">
                <div class="mr-2"><?php echo get_the_modified_time('d.m.Y') ?></div>
                <div class="xl:border-r border-gray-400 mr-2"></div>
              </div>
              <div><a href="<?php the_permalink(); ?>" class="hover:text-blue-500"><?php the_title(); ?></a></div>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
      <div>
        <div class="text-2xl xl:text-3xl font-medium mb-4">📝 <?php _e("Новые записи", "treba-wp"); ?></div>
        <div class="mb-10">
          <?php 
            $new_posts = new WP_Query( array( 
              'post_type' => 'post', 
              'posts_per_page' => 10,
              'meta_query' => array(
                array(
                  'key' => '_crb_post_mainhide',
                  'value' => 'yes',
                  'compare' => '!='
                ),
              ),
            ) );
            if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
          ?>
            <div class="border dark:border-gray-500 shadow-lg rounded-lg mb-6">
              <?php echo get_template_part('template-parts/post-item'); ?>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
        <div class="flex justify-center">
          <a href="<?php echo get_page_url('page-blog'); ?>" class="border border-red-400 bg-transparent hover:bg-red-400 text-gray-600 dark:text-gray-200 hover:text-gray-200 text-center font-medium rounded-lg px-6 py-3"><?php _e("Все записи", "treba-wp"); ?></a>
        </div>
      </div>
      
    </div>
    <div class="w-full xl:w-2/12 xl:px-3">
      <div>
        <?php echo get_template_part('template-parts/components/allcity-block'); ?>
        <?php echo get_template_part('template-parts/components/allhotels-block'); ?>
        <?php echo get_template_part('template-parts/components/sport-block'); ?>
        <?php echo get_template_part('template-parts/components/name-block'); ?>
        <?php echo get_template_part('template-parts/components/doglifespan-block'); ?>
        <?php echo get_template_part('template-parts/components/catlifespan-block'); ?>
      </div>
    </div>
  </div>
  
</div>

<?php get_footer(); ?>