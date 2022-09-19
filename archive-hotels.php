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
      <h1 class="text-2xl xl:text-3xl font-medium mb-6"><?php the_archive_title(); ?></h1>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="mb-6">
          <?php get_template_part('template-parts/hotel-item'); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
      <div class="b_pagination text-center">
        <?php 
          $big = 9999999991; // уникальное число
          echo paginate_links( array(
            'format' => '?page=%#%',
            'total' => $query->max_num_pages,
            'current' => $current_page,
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